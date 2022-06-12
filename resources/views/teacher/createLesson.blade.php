<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание Урока') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('lesson.store', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" value="" placeholder="Lesson Name" name="name">
                <input type="text" value="" placeholder="Lesson Description" name="description">
                <input type="date" value="" name="date">
                <input type="file" value="" name="image">
                <input type="submit">
            </form>
        </div>
    </div>
</x-app-layout>
