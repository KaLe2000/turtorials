<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $lesson->name }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            {{ $lesson->description }}<br><br>
            <form action="{{ route('lesson.sign', $lesson) }}" method="POST">
                @csrf
                <input type="submit" value="Sign up Lesson">
            </form>
            <br>
            <form action="{{ route('lesson.start', ['course' => $course,'lesson' => $lesson]) }}" method="POST">
                @csrf
                <input type="submit" value="Start Lesson">
            </form>
            <br>
            <form action="{{ route('lesson.complete', ['course' => $course,'lesson' => $lesson]) }}" method="POST">
                @csrf
                <input type="submit" value="Complete Lesson">
            </form>
            <br>
            <a href="{{ route('course.show', $course) }}">Return Back!</a>
        </div>
    </div>
</x-app-layout>
