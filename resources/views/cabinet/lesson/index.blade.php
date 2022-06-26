<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $lesson->name }}
        </h2>
        @include('layouts.header-actions', [
            'user' => Auth::user(),
            'course' => $course,
            'lesson' => $lesson,
        ])
    </x-slot>

    <main class="flex">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <img src="/image/teacher-cam.jpg" alt="teacher">
            </div>
            <div class="p-6 bg-white border-b border-gray-200">
                {{ $lesson->description }}<br><br>
                <br>
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
    </main>
</x-app-layout>
