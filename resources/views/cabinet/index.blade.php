<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            @foreach($courses as $course)
                <a href="{{ route('course.show', $course) }}">{{ $course->name }}</a><br>
            @endforeach
        </div>
    </div>
</x-app-layout>
