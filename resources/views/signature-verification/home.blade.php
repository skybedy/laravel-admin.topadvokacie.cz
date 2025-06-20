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
