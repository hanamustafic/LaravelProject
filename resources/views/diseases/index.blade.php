<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pocetna-Bolesti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_disease" class="m-2 p-2 text-xl">Dodaj bolest</a>
            &nbsp
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                <div class ="p-2">
                    <h1 class="font-xl">Ovdje će biti izlistane bolesti, njihovi simptomi i lijek:</h1>

                @foreach($diseases1 as $disease1)
                <div class="flex space-x-4">
                <div class="flex-1"> <p class="p-2">{{$disease1->type}} - {{$disease1->symptoms}} - {{$disease1->medicineName}} </p></div>
                <div class="flex-2">
                    <form method="POST" action="{{route('delete_disease')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$disease1->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Obriši')}}
                        </button>
                    </div>
        </form>
    </div>

    <div class="flex-2">
                    <form method="POST" action="{{route('edit_disease')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$disease1->id}}">
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
    <input type="hidden" name="id" value="{{$disease1->id}}">
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
                <h1 class="font-xl">Ovdje će biti izlistane bolesti za koje je lijek panadol:</h1>
        
            @foreach($diseases2 as $disease2)
            <div class="flex space-x-4">
            <div class="flex-1"> <p class="p-2">{{$disease2->type}} </p></div>
            
        </div>
        
            @endforeach
        
        
        </div>
        
        </div>
    </div>
</x-app-layout>

