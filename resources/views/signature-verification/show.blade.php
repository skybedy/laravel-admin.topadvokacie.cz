<x-blank-layout>

    <div class="px-5 py-2">

        @foreach($customers as $customer)
        
        
        
        <h2 class="text-xl font-black border-b-2 border-black text-center mb-5">Prohlášení o pravosti podpisu </h2>

        <p class="font-black w-full mb-5">Běžné číslo knihy o prohlášeních o pravosti podpisu: <span class="m-10">017410/462/2024</span></p>

        <p class="mb-5"> Já, <strong>JUDr. Filip Štípek, advokát,</strong> se sídlem v Ústí nad Labem, Hradiště 96/6-8, zapsaný v seznamu advokátů vedeném Českou advokátní komorou pod ev.č. 10621, prohlašuji, že: </p>


        <table class="w-full border border-gray-300 border-collapse mb-5">
            <tbody>
                <tr>
                    <td class="p-1 border border-gray-300">Jméno a příjmení:</td>
                    <td colspan="2" class="p-1 border border-gray-300 w-1/2">
                        @if(!empty($customer->title_before))
                            {{ $customer->title_before ." " }}
                        @endif
                         {{ $customer->firstname }} {{ $customer->lastname }} 
                    </td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-300">Datum narození:</td>
                    <td colspan="2" class="p-1 border border-gray-300">{{ $customer->dob }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-300">Místo narození:</td>
                    <td colspan="2" class="p-1 border border-gray-300">{{ $customer->pob }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-300">Pobyt v ČR:</td>
                    <td colspan="2" class="p-1 border border-gray-300">{{ $customer->street }}, {{ $customer->postcode }} {{ $customer->city }}</td>
                </tr>
                <td class="p-1 border border-gray-300">{{ $customer->gender == "M" ?  "Jehož totožnost jsem zjistil z jeho:" : "Jejíž totožnost jsem zjistil z jejího:" }}</td>
                <td class="p-1 border border-gray-300">{{ $customer->document_type}} č.:</td>
                <td class="p-1 border border-gray-300 text-center">{{ $customer->document_number }}</td>
            </tbody>
        </table>

        <p class="mb-5">Tuto listinu v jednom vyhotovení přede mnou vlastnoručně {{ $customer->gender == "M" ?  "podepsal" : "podepsala" }}</p>
        <p class="mb-5">V Ústí nad Labem, {{ $customer->signature_created_date }} </p>
        <p class="mb-20">JUDr. Filip Štípek, advokát</p>

        @endforeach
        




        </div>





</x-blank-layout>
