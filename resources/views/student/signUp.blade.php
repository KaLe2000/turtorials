<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Записаться на урок') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('course.store') }}" method="POST">
                @csrf
                <input type="text" value="" placeholder="Course Name" name="name">
                <input type="submit">
            </form>
        </div>
    </div>
</x-app-layout>
