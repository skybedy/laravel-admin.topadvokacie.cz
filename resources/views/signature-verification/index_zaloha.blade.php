<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Smlouvy</h2>
    </x-slot>

    <div class="p-6 flex flex-col justify-center items-center" x-data="{ showFormX: false, signatureCount: 1, signatures: [] }">





        <!-- Počet podpisů a tlačítko -->
        <div class="flex items-center space-x-2">
            <label for="signature_count" class="text-sm font-medium">Počet podpisů:</label>

            <input type="number" x-model="signatureCount" min="1" class="border border-gray-300 rounded p-2 w-20 text-center">

            <button type="button"
                @click="showFormX = true; signatures = Array.from({ length: signatureCount }, () => ({ name: '', date: '' }))"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Přidat ověření podpisu
            </button>
        </div>







        <!-- Dynamicky generovaný formulář (zobrazí se po kliknutí na tlačítko) -->
           <template <template  x-if="showFormX">
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











        <!-- Tabulka s existujícími podpisy (skryje se po kliknutí na tlačítko) -->
        <table class="table-auto border-collapse my-4 border border-black" x-show="!showFormX">
            <tr>
                <th class="border border-black px-4 py-2">Klient</th>
                <th class="border border-black px-4 py-2">Datum</th>
                <th class="border border-black px-4 py-2">Možnosti</th>
            </tr>

            @foreach($signatureVerifications as $signatureVerification)
                <tr>
                    <td class="border border-black px-4 py-2">{{ $signatureVerification->lastname }} {{ $signatureVerification->firstname }}</td>
                    <td class="border border-black px-4 py-2">{{ $signatureVerification->formatted_signature_created_date }}</td>
                    <td class="border border-black px-4 py-2">
                        <a target="_blank" href="{{ route('signature_verification.show', ['id' => $signatureVerification->id ]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                        <a href="{{ route('signature_verification.edit', $signatureVerification->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upravit</a>
                        <form action="{{ route('signature_verification.destroy', $signatureVerification->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Smazat</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>



    </div>
</x-app-layout>
