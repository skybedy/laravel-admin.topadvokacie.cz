<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Smlouvy') }}
        </h2>
    </x-slot>

    <div class="mt-6 p-6 bg-white">
                    <table class="table-auto border-collapse w-full my-4 border border-black">
                        <tr>
                            <th class="border border-black px-4 py-2">ID</th>
                            <th class="border border-black px-4 py-2">Název</th>
                            <th class="border border-black px-4 py-2">Popis</th>
                            <th class="border border-black px-4 py-2">Datum</th>
                            <th></th>
                        </tr>

                    <tr>
                        <td>1</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>2021-10-10</td>
                        <td>
                            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                            <a href="" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Upravit</a>
                            <form action="" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Smazat</button>
                            </form>
                        </td>
                    </tr>
                </table>

    </div>
</x-app-layout>
