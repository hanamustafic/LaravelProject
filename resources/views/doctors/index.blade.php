<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pocetna-Doktori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_doctor" class="m-2 p-2 text-xl">Dodaj doktora</a>
            &nbsp
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                <div class ="p-2">
                    <h1 class="font-xl">Ovdje će biti izlistani doktori i njihovi podaci:</h1>

                @foreach($doctors as $doctor)
                <div class="flex space-x-4">
                <div class="flex-1"> <p class="p-2">{{$doctor->named}}  {{$doctor->lastnamed}} - {{$doctor->specialization}} - {{$doctor->birth}}</p></div>
                <div class="flex-2">
                    <form method="POST" action="{{route('delete_doctor')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$doctor->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Obriši')}}
                        </button>
                    </div>
        </form>
    </div>

    <div class="flex-2">
                    <form method="POST" action="{{route('edit_doctor')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$doctor->id}}">
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
    <input type="hidden" name="id" value="{{$doctor->id}}">
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
                <h1 class="font-xl">Ovdje će biti izlistani onkolozi:</h1>
        
            @foreach($doctors2 as $doctor2)
            <div class="flex space-x-4">
            <div class="flex-1"> <p class="p-2">{{$doctor2->named}}  {{$doctor2->lastnamed}} </p></div>
            
        </div>
        
            @endforeach
        
        
        </div>
        </div>
    </div>
</x-app-layout>
