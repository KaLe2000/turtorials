<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->name }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            total lessons: {{ $lessons->count() }}<br>
            @foreach($lessons as $lesson)
                <a href="{{ route('lesson.show', ['course' => $course,'lesson' => $lesson]) }}">{{ $lesson->name }}</a><br>
            @endforeach
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ route('lesson.create', $course) }}">Create lesson</a><br>
            <a href="{{ route('cabinet') }}">Return back!</a>
        </div>
    </div>
</x-app-layout>
