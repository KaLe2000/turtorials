<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Кабинет учащегося') }}
        </h2>
        <a href="{{ route('cashFlow.create', Auth::user()) }}">
            {{ __('Пополнить баланс') }}
        </a>
    </x-slot>

    <div class="lg:flex lg:flex-wrap -mx-3">
        @forelse($courses as $course)
            <x-card>
                <x-slot name="name">{{ $course->name }}</x-slot>
                <x-slot name="link">{{ route('course.show', $course) }}</x-slot>
                {{ $course->description }}
            </x-card>
        @empty
            <div>Нет предметов для изучения.</div>
        @endforelse
    </div>
</x-app-layout>
