<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pocetna-Lijekovi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_medicine" class="m-2 p-2 text-xl">Dodaj lijek</a>
            &nbsp
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                <div class ="p-2">
                    <h1 class="font-xl">Ovdje će biti izlistani lijekovi, vrsta lijeka i za šta se koristi:</h1>

                @foreach($medicines as $medicine)
                <div class="flex space-x-4">
                <div class="flex-1"> <p class="p-2">{{$medicine->medicineName}} - {{$medicine->medicineType}} - {{$medicine->usage}} </p></div>
                <div class="flex-2">
                    <form method="POST" action="{{route('delete_medicine')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$medicine->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Obriši')}}
                        </button>
                    </div>
        </form>
    </div>

    <div class="flex-2">
                    <form method="POST" action="{{route('edit_medicine')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$medicine->id}}">
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
    <input type="hidden" name="id" value="{{$medicine->id}}">
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
                <h1 class="font-xl">Ovdje će biti izlistane kapsule:</h1>
        
            @foreach($medicines2 as $medicine2)
            <div class="flex space-x-4">
            <div class="flex-1"> <p class="p-2">{{$medicine2->medicineName}}</p></div>
            
        </div>
        
            @endforeach
        
        
        </div>
        </div>
    </div>
</x-app-layout>
