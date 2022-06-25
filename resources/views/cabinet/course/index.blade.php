<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('cabinet') }}">{{ $course->name }}</a>
        </h2>
        <a href="{{ route('lesson.create', $course) }}" class="btn-green">
            {{ __('Создать урок') }}
        </a>
    </x-slot>

    <div class="flex flex-wrap -mx-3">
        @foreach($lessons as $lesson)
            <x-card>
                <x-slot name="name">{{ $lesson->name }}</x-slot>
                <x-slot name="link">{{ route('lesson.show', ['course' => $course,'lesson' => $lesson]) }}</x-slot>
                {{ $lesson->description }}
            </x-card>
        @endforeach
    </div>
</x-app-layout>
