<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Smlouvy</h2>
  </x-slot>

  <div id="signature-app">
    
    <div class="p-6 flex flex-col justify-center items-center">
      <div class="flex items-center space-x-2">
        <label for="signature-count" class="text-sm font-medium">Počet podpisů:</label>
        <input type="number" id="signature-count" min="1" max="4" value="1"
               class="border border-gray-300 rounded p-2 w-20 text-center">
        <button type="button" id="show-form"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
          Přidat ověření podpisu
        </button>
      </div>
    </div>

    <div class="p-1">
      <form id="signature-form"
            action="{{ route('signature_verification.store') }}"
            method="POST"
            class="hidden">
        @csrf
        <div id="signature-blocks" class="flex justify-center space-x-2 mt-10"></div>


        <!-- Odesílací tlačítko -->
        <div class="flex justify-center mt-10 w-full">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Odeslat formulář
          </button>
        </div>
      </form>                  
    </div>
  </div>

  <!-- Šablona jednoho bloku -->
  <template id="signature-template">    
    <div data-signature-block class="relative w-1/4 bg-gray-50 border border-gray-300 p-5 flex flex-col space-y-3 rounded-md">
      <input type="hidden" name="signatures[][id]" class="id-input">
      <button type="button" data-close-btn class="absolute top-2 right-2 text-gray-400 bg-gray-50 text-2xl font-bold w-5 h-5 leading-none flex items-center justify-center border-2 border-gray-400 rounded-md">&times;</button>
      <div class="flex space-x-2">
        
        <div class="w-1/2">
          <label class="block text-gray-700 text-sm font-medium">Titul před</label>
          <input type="text" name="signatures[][title_before]" class="title_before-input border border-gray-300 rounded-md w-full p-2">
        </div>
        <div class="w-1/2">
          <label class="block text-gray-700 text-sm font-medium">Titul za</label>
          <input type="text" name="signatures[][title_after]" class="title_after-input border border-gray-300 rounded-md w-full p-2">
        </div>
      </div>

      <div class="relative">
        <label class="block text-gray-700 text-sm font-medium">Příjmení</label>
        <input type="text" name="signatures[][lastname]" class="lastname-input border border-gray-300 rounded-md w-full" autocomplete="off">
        
        <div class="suggestions hidden absolute z-10 bg-white border border-gray-300 mt-1 rounded shadow w-full">
            <div class="flex justify-end pt-2 pr-2">
              <button type="button" data-suggestion-close-btn class="text-gray-400 bg-gray-50 text-2xl font-bold w-5 h-5 leading-none flex items-center justify-center border-2 border-gray-400 rounded-md">&times;</button>
            </div>
            <div class="suggestion-box"></div>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-medium">Jméno</label>
        <input type="text" name="signatures[][firstname]" class="firstname-input border border-gray-300 rounded-md w-full" required>
      </div>

      <div class="flex space-x-2">
        <div class="w-3/4">
          <label class="block text-sm font-medium text-gray-700">Datum narození</label>
          <input type="text" name="signatures[][dob]" placeholder="DD.MM.RRRR" class="dob-input border border-gray-300 rounded-md w-full focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="w-1/4 text-gray-700">
            <label class="block text-sm font-medium">Pohlaví</label>
            <select name="signatures[][gender]" class="gender-select border border-gray-300 rounded-md w-full p-2 mb-2">
              <option value=""></option>
              <option value="M">Muž</option>
              <option value="Z">Žena</option>
            </select>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-medium">Místo narození</label>
        <input type="text" name="signatures[][pob]" class="pob-input border border-gray-300 rounded-md w-full">
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-medium">Ulice</label>
        <input type="text" name="signatures[][street]" class="street-input border border-gray-300 rounded-md w-full">
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-medium">Město/Obec</label>
        <input type="text" name="signatures[][city]" class="city-input border border-gray-200 rounded-md w-full p-2">
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-medium">PSČ</label>
        <input type="text" name="signatures[][postcode]" class="postcode-input border border-gray-300 rounded-md w-full p-2">
      </div>

      <div class="flex space-x-2">
        <div class="text-gray-700 w-1/4">
          <label class="block text-sm font-medium">Doklad</label>
          <select name="signatures[][document_type]" class="document-type-select border border-gray-300 rounded-md w-full p-2 mb-2">
            <option value=""></option>
            <option value="1">OP</option>
            <option value="2">Pas</option>
          </select>
        </div>
        <div class="w-3/4">
          <label class="block text-gray-700 text-sm font-medium">Číslo dokladu</label>
          <input type="text" name="signatures[][document_number]" class="document_number-input border border-gray-200 rounded-md w-full p-2 mb-2">
        </div>
      </div>

    </div>
  </template>

  <!-- Šablona návrhu pro autocomplete -->
  <template id="suggestion-template">
    
      <div class="suggestion-item cursor-pointer hover:bg-gray-100 px-2 py-1">
        <strong class="name"></strong>
        <strong class="dob"></strong>
      </div>
  </template>
</x-app-layout>
      