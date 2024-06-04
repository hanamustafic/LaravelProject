<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pocetna-Pacijenti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_patient" class="m-2 p-2 text-xl">Dodaj pacijenta</a>
            &nbsp
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                <div class ="p-2">
                    <h1 class="font-xl">Ovdje će biti izlistani pacijenti i njihovi podaci:</h1>

                @foreach($patients2 as $patient2)
                <div class="flex space-x-4">
                <div class="flex-1"> <p class="p-2">{{$patient2->name}}  {{$patient2->lastname}} {{$patient2->birth}}  {{$patient2->bloodType}} {{$patient2->type}}</p></div>
                <div class="flex-2">
                    <form method="POST" action="{{route('delete_patient')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$patient2->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Obriši')}}
                        </button>
                    </div>
        </form>
    </div>

    <div class="flex-2">
                    <form method="POST" action="{{route('edit_patient')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$patient2->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Uredi')}}
                        </button>
                    </div>
                    </form>
        </div>
</div>

<div class="flex-1">
    <form method="POST" action="{{ route('file_add') }}">
    @csrf
    <input type="hidden" name="id" value="{{$patient2->id}}">
    <div class="p-2">
        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md 
        font-semibold text-xs text-white uppercase">
            {{ __('Dodaj fajl') }}
        </button>
    </div>
    </form>
</div>

                @endforeach

            </div>

            <div class ="p-2">
                <h1 class="font-xl">Ovdje će biti izlistani pacijenti i bolesti pacijenata:</h1>

            @foreach($patients2 as $patient2)
            <div class="flex space-x-4">
            <div class="flex-1"> <p class="p-2">{{$patient2->name}}  {{$patient2->lastname}} - {{$patient2->type}}</p></div>
            
</div>

            @endforeach

        </div>

        <div class ="p-2">
            <h1 class="font-xl">Ovdje će biti izlistani pacijenti i krvne grupe pacijenata:</h1>

        @foreach($patients as $patient)
        <div class="flex space-x-4">
        <div class="flex-1"> <p class="p-2">{{$patient->name}}  {{$patient->lastname}} - {{$patient->bloodType}}</p></div>
        
</div>

        @endforeach

    </div>

    <div class ="p-2">
        <h1 class="font-xl">Ovdje će biti izlistani pacijenti koji imaju dijabetes:</h1>

    @foreach($patients3 as $patient3)
    <div class="flex space-x-4">
    <div class="flex-1"> <p class="p-2">{{$patient3->name}}  {{$patient3->lastname}} </p></div>
    
</div>

    @endforeach

</div>

        </div>
    </div>
</x-app-layout>

