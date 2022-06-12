<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Пополнить баланс') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('cashFlow.store', $user) }}" method="POST">
                @csrf
                <input type="text" name="amount" placeholder="Сумма">
                <input type="submit">
            </form>
        </div>
    </div>
</x-app-layout>
