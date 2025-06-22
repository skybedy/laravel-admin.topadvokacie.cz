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


        <form x-show="showForm" x-data action="{{ route('signature_verification.store') }}" method="POST" class="max-w-xl mx-auto space-y-6 mt-10">
            @csrf

            <div x-data="personSearch()" x-init="$watch('lastname', search)" class="bg-gray-50 border border-gray-300 p-5 rounded-md space-y-4">

            <!-- Příjmení -->
            <div>
                <label class="block text-sm font-medium">Příjmení</label>
                <input type="text" name="signatures[0][lastname]" x-model="lastname"
                    @input.debounce.300ms="search"
                    class="border rounded-md w-full p-2" autocomplete="off">
            </div>

            <!-- Výsledky hledání -->
            <template x-if="results.length > 0">
                <ul class="bg-white border rounded shadow p-2 max-h-40 overflow-y-auto">
                    <template x-for="person in results" :key="person.id">
                        <li @click="select(person)" class="cursor-pointer hover:bg-blue-100 px-2 py-1" x-text="person.firstname + ' ' + person.lastname"></li>
                    </template>
                </ul>
            </template>

            <!-- Jméno -->
            <div>
                <label class="block text-sm font-medium">Jméno</label>
                <input type="text" name="signatures[0][firstname]" x-model="firstname"
                    class="border rounded-md w-full p-2">
            </div>

        <!-- Datum narození -->
        <div>
            <label class="block text-sm font-medium">Datum narození</label>
            <input type="text" name="signatures[0][dob]" x-model="dob"
                   placeholder="DD.MM.RRRR"
                   class="border rounded-md w-full p-2">
        </div>

        <!-- Místo narození -->
        <div>
            <label class="block text-sm font-medium">Místo narození</label>
            <input type="text" name="signatures[0][place_of_birth]" x-model="place_of_birth"
                   class="border rounded-md w-full p-2">
        </div>

        <!-- Město -->
        <div>
            <label class="block text-sm font-medium">Město</label>
            <input type="text" name="signatures[0][city]" x-model="city"
                   class="border rounded-md w-full p-2">
        </div>

        <!-- Ulice -->
        <div>
            <label class="block text-sm font-medium">Ulice</label>
            <input type="text" name="signatures[0][street]" x-model="street"
                   class="border rounded-md w-full p-2">
        </div>

        <!-- PSČ -->
        <div>
            <label class="block text-sm font-medium">PSČ</label>
            <input type="text" name="signatures[0][zip]" x-model="zip"
                   class="border rounded-md w-full p-2">
        </div>

        <!-- Doklad -->
        <div>
            <label class="block text-sm font-medium">Druh dokladu</label>
            <select name="signatures[0][document_type]" x-model="document_type"
                    class="border rounded-md w-full p-2">
                <option value="">-- vyber --</option>
                <option value="OP">OP</option>
                <option value="Pas">Pas</option>
            </select>
        </div>

        <!-- Číslo dokladu -->
        <div>
            <label class="block text-sm font-medium">Číslo dokladu</label>
            <input type="text" name="signatures[0][document_number]" x-model="document_number"
                   class="border rounded-md w-full p-2">
        </div>

    </div>

    <!-- Odesílací tlačítko -->
    <div class="flex justify-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Odeslat formulář
        </button>
    </div>
</form>

<!-- Alpine.js komponenta -->
<script>
    function personSearch() {
        return {
            lastname: '',
            firstname: '',
            dob: '',
            place_of_birth: '',
            city: '',
            street: '',
            zip: '',
            document_type: '',
            document_number: '',
            results: [],

            search() {
                alert();
               if (!this.lastname || this.lastname.length < 2) {
                    this.results = [];
                 return;
                }

                fetch(`/api/autocomplete-customer?lastname=${encodeURIComponent(this.lastname)}`)
                    .then(res => res.json())
                    .then(data => this.results = data)
                    .catch(e => console.error('Chyba při načítání dat:', e));
            },

            select(person) {
                this.firstname = person.firstname;
                this.lastname = person.lastname;
                this.dob = person.dob;
                this.place_of_birth = person.place_of_birth;
                this.city = person.city;
                this.street = person.street;
                this.zip = person.zip;
                this.document_type = person.document_type;
                this.document_number = person.document_number;

                this.results = [];
            }
        }
    }
</script>

 

    </div>


</div>
</x-app-layout>


