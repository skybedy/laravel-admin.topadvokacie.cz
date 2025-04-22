<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Smlouvy</h2>
    </x-slot>





    <div x-data="{ showForm: false,signatureCount: 1}">


        <div class="p-6 flex flex-col justify-center items-center">





        <!-- Počet podpisů a tlačítko -->
        <div class="flex items-center space-x-2">
            <label for="signature_count" class="text-sm font-medium">Počet podpisů:</label>
            <input type="number" x-model.number="signatureCount" min="1" max="4" class="border border-gray-300 rounded p-2 w-20 text-center">
            <button type="button" x-on:click="showForm = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Přidat ověření podpisu
            </button>
        </div>





















        <!-- Tabulka s existujícími podpisy (skryje se po kliknutí na tlačítko) -->
        <table class="table-auto border-collapse my-4 border border-black" x-show="!showForm">
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

    <div class="p-1">
    <form x-show="showForm" class="flex justify-center space-x-2 mt-10">


        <template x-for="i in signatureCount" :key="i">
            <div class=" w-1/4 bg-gray-50 border border-gray-300 p-5 flex flex-col space-y-3 rounded-md">

                <div class="flex space-x-2">
                    <div class="test w-1/2">
                        <label for="title_before" class="block text-gray-700 text-sm font-medium">Titul pred</label>
                        <input id="title_before" type="text" class="border border-gray-300 rounded-md w-full p-2">
                    </div>
                    <div class="test w-1/2">
                        <label for="title_behind" class="block text-gray-700 text-sm font-medium">Titul za</label>
                        <input id="title_behind" type="text" class="border border-gray-300  rounded-md w-full p-2">
                    </div>
                </div>

                <div>
                    <label for="" class="block text-gray-700 text-sm font-medium">Příjmení</label>
                    <input type="text" name="lastname" class="border border-gray-300 rounded-md w-full"  />
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-medium">Jméno</label>
                    <input type="text" class="border border-gray-300 rounded-md w-full"  />
                </div>


                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700">Datum narození</label>
                    <input type="text" id="dob" name="dob"
                        placeholder="DD.MM.RRRR"
                        pattern="\d{2}\.\d{2}\.\d{4}"
                        class="border border-gray-300 rounded-md w-full focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="place_of_birth" class="block text-gray-700 text-sm font-medium">Místo narození</label>
                    <input type="text" id="place_of_birth" class="border border-gray-300  rounded-md w-full"  />
                </div>



                <div>
                    <label class="block text-gray-700 text-sm font-medium">Ulice</label>
                    <input type="text" class="border border-gray-300 rounded-md w-full"  />
                </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium">Město/Obec</label>
                        <input type="text"  class="border border-gray-200  rounded-md w-full p-2">
                    </div>

                <div>
                    <label class="block text-gray-700 text-sm font-medium">PSČ</label>
                    <input type="text"  class="border border-gray-300  rounded-md w-full p-2">
                </div>


                <div class="flex space-x-2">
                    <div class="test text-gray-700 w-1/4">
                        <label class="block text-sm font-medium">Doklad</label>
                        <select  class="border border-gray-300 rounded-md w-full p-2 mb-2">
                            <option value=""></option>
                            <option value="OP">OP</option>
                            <option value="Pas">Pas</option>
                        </select>
                    </div>
                    <div class="test w-3/4">
                        <label class="block text-gray-700 text-sm font-medium">Číslo dokladu</label>
                        <input type="text"  class="border border-gray-200  rounded-md w-full p-2 mb-2">
                    </div>
                </div>



            </div>
        </template>
</form>
</div>


    </div
</x-app-layout>
