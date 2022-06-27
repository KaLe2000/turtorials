<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $lesson->name }}&nbsp;<small class="font-normal">({{ trans('lesson.' . $lesson->status) }})</small>
        </h2>
        {{-- todo blade directive isStudent --}}
        @include('layouts.header-actions-' . Auth::user()->type, [
            'user' => Auth::user(),
            'course' => $course,
            'lesson' => $lesson,
        ])
    </x-slot>

    <main class="flex">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
{{--                <img src="/image/teacher-cam.jpg" alt="teacher">--}}
                <div class="camera">
                    <video id="video" onclick="loadVid();">Video stream not available.</video>
                </div>
                <canvas id="canvas">
                </canvas>
                <div>
                    {{ $lesson->description }}
                </div>
            </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('course.show', $course) }}">Return Back!</a>
            </div>
        </div>
        <div id="chatbox">
            <div class="bg-white p-3 rounded-lg card-shadow">
                <h3 class="font-normal text-xl py-4 -ml-3 mb-3 border-l-4 border-green-300 pl-4">Чат с учителем</h3>
                <div class="text-gray-500 pl-2">
                    Сообщения...
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-input id="msg" class="block mt-1 w-full" type="text" name="msg" autofocus placeholder="Сообщение"/>
                    <x-button class="ml-3 btn-blue">
                        {{ __('Отправить') }}
                    </x-button>
                </div>
            </div>
        </div>
        {{-- todo teacher sidebar with signed to lesson students --}}
        <div id="sidebar">
            @include('layouts.lesson-sidebar')
        </div>
    </main>
    <script>
        (function() {
            // The width and height of the captured photo. We will set the
            // width to the value defined here, but the height will be
            // calculated based on the aspect ratio of the input stream.

            let width = 320;    // We will scale the photo width to this
            let height = 0;     // This will be computed based on the input stream

            // |streaming| indicates whether or not we're currently streaming
            // video from the camera. Obviously, we start at false.

            let streaming = false;

            // The various HTML elements we need to configure or control. These
            // will be set by the startup() function.

            let video = null;
            let canvas = null;

            function startup() {
                video = document.getElementById('video');
                canvas = document.getElementById('canvas');

                navigator.mediaDevices.getUserMedia({video: true, audio: false})
                    .then(function(stream) {
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function(err) {
                        console.log("An error occurred: " + err);
                    });

                video.addEventListener('canplay', function(ev){
                    if (!streaming) {
                        height = video.videoHeight / (video.videoWidth/width);

                        // Firefox currently has a bug where the height can't be read from
                        // the video, so we will make assumptions if this happens.

                        if (isNaN(height)) {
                            height = width / (4/3);
                        }

                        video.setAttribute('width', width);
                        video.setAttribute('height', height);
                        canvas.setAttribute('width', width);
                        canvas.setAttribute('height', height);
                        streaming = true;
                    }
                }, false);
            }

            // Set up our event listener to run the startup process
            // once loading is complete.
            window.addEventListener('load', startup, false);
        })();
    </script>
</x-app-layout>
