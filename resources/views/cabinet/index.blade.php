<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Кабинет учащегося') }}
        </h2>
        <a href="{{ route('cashFlow.create', Auth::user()) }}">
            {{ __('Пополнить баланс') }}
        </a>
    </x-slot>

    <div class="flex flex-wrap -mx-3">
        @forelse($courses as $course)
            <div class="w-1/3 px-3 pb-6 ">
                <div class="bg-white p-3 rounded shadow">
                    <h3 class="font-normal text-xl py-4"><a href="{{ route('course.show', $course) }}">{{ $course->name }}</a></h3>
                    <div class="text-gray-500">{{ $course->description }}</div>
                </div>
            </div>
        @empty
            <div>Нет предметов для изучения.</div>
        @endforelse
    </div>
</x-app-layout>
