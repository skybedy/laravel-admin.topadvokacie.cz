<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Smlouvy') }}
        </h2>
    </x-slot>

    <div class="mt-6 p-6 bg-white">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-2xl p-6">
            <!-- Nadpis -->
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail uživatele</h2>

            <!-- Obsah karty -->
            <div class="grid grid-cols-2 gap-y-3 text-gray-700">
                <div class="font-medium">Jméno a příjmení:</div>
                <div>{{ $customer[0]->firstname }} {{ $customer[0]->lastname }}</div>
                <div class="font-medium">Datum narození:</div>
                <div>{{ $customer[0]->date_of_birth }}</div>
                <div class="font-medium">Telefon:</div>
                <div>+420 123 456 789</div>
                <div class="font-medium">Role:</div>
                <div>Právník</div>
                <div class="font-medium">Status:</div>
                <div class="text-green-600 font-semibold">✅ Aktivní</div>
            </div>

            <!-- Akční tlačítka -->
            <div class="mt-6 flex justify-end gap-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                    Deaktivovat
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Upravit
                </button>
            </div>
        </div>

    </div>
</x-app-layout>
