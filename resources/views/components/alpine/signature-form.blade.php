<template  x-if="showFormX">
    <form action="{{ route('signature_verification.store') }}" method="POST" class="w-full  mt-4 bg-slate-200" x-show="showFormX">
        @csrf

        <div x-for="(signature, index) in signatures" :key="index" class="test  mt-4 flex justify-around gap-x-1 bg-red-200">

            <div class="border p-4 rounded mb-4 bg-gray-50 w-full">
                <h3 class="text-lg font-bold text-center border-b border-gray-200 mb-6">Klient <span x-text="index + 1"></span></h3>

                <label class="block text-sm font-medium">Titul:</label>
                <input type="text" x-model="signatures[index].title" name="signatures[][title]" class="border rounded w-1/4 p-2 mb-2">

                <label class="block text-sm font-medium">Jméno:</label>
                <input type="text" x-model="signatures[index].firstname" name="signatures[][firstname]" class="border rounded w-full p-2 mb-2">

                <label class="block text-sm font-medium">Příjmení:</label>
                <input type="text" x-model="signatures[index].lastname" name="signatures[][lastname]" class="border rounded w-full p-2 mb-2">

                <label class="block text-sm font-medium">Ulice:</label>
                <input type="text" x-model="signatures[index].street" name="signatures[][street]" class="border rounded w-full p-2 mb-2">

                <label class="block text-sm font-medium">Město/Obec:</label>
                <input type="text" x-model="signatures[index].city" name="signatures[][city]" class="border rounded w-full p-2 mb-2">

                <label class="block text-sm font-medium">PSČ:</label>
                <input type="text" x-model="signatures[index].postcode" name="signatures[][postcode]" class="border rounded w-1/4 p-2 mb-2">

                <label class="block text-sm font-medium">Místo narození:</label>
                <input type="text" x-model="signatures[index].place_of_code" name="signatures[][place_of_code]" class="border rounded w-full p-2 mb-2">

                <label class="block text-sm font-medium">Datum narození:</label>
                <input type="date" x-model="signatures[index].date_of_birth" name="signatures[][date_of_birth]" class="border rounded w-full p-2">

                <button type="button" @click="signatures.splice(index, 1)"
                    class="mt-2 bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                    Odebrat
                </button>
            </div>



        </div>

        <div class="flex justify-between mt-4">
            <button type="button" @click="showFormX = false" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Zpět k seznamu
            </button>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Odeslat podpisy
            </button>
        </div>
    </form>
</template>
