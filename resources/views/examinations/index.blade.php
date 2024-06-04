UPITI  - pregledi 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pregledi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_pregled" class="m-2 p-2 text-xl">Dodaj pregled</a>
            &nbsp
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                <div class ="p-2">
                    <h1 class="font-xl">Ovdje će biti izlistani pregledi:</h1>

                @foreach($examinations as $examination)
                <div class="flex space-x-4">
                <div class="flex-1"> <p class="p-2">{{$examination->name}}  {{$examination->lastname}} - {{$examination->named}}  {{$examination->lastnamed}} - {{$examination->type}} - {{$examination->medicineName}}</p></div>
                <div class="flex-2">
                    <form method="POST" action="{{route('delete_examination')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$examination->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Obriši')}}
                        </button>
                    </div>
        </form>
    </div>

    <div class="flex-2">
                    <form method="POST" action="{{route('edit_examination')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$examination->id}}">
                    <div class="p-2">
                        <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                            {{__('Uredi')}}
                        </button>
                    </div>
                    </form>
        </div>
</div>

                @endforeach

            </div>

            <div class ="p-2">
                <h1 class="font-xl">Ovdje će biti izlistani svi pregledi pacijenta Kelvin Stamm Auer:</h1>
        
            @foreach($examinations4 as $examination4)
            <div class="flex space-x-4">
                <div class="flex-1"> <p class="p-2">{{$examination4->name}}  {{$examination4->lastname}} - {{$examination4->named}}  {{$examination4->lastnamed}} - {{$examination4->type}} - {{$examination4->medicineName}}</p></div>
            
        </div>
        
            @endforeach
        
        
        </div>

            <div class ="p-2">
                <h1 class="font-xl">Ovdje će biti izlistani doktori pacijenta Kelvin Stamm Auer:</h1>
        
            @foreach($examinations2 as $examination2)
            <div class="flex space-x-4">
            <div class="flex-1"> <p class="p-2">{{$examination2->named}}  {{$examination2->lastnamed}} </p></div>
            
        </div>
        
            @endforeach
        
        
        </div>

        <div class ="p-2">
            <h1 class="font-xl">Ovdje će biti izlistane sve bolesti pacijenta Kelvin Stamm Auer:</h1>
    
        @foreach($examinations3 as $examination3)
        <div class="flex space-x-4">
        <div class="flex-1"> <p class="p-2">{{$examination3->type}}</p></div>
        
    </div>
    
        @endforeach
    
    
    </div>

    <div class ="p-2">
        <h1 class="font-xl">Ovdje će biti izlistani lijekovi pacijenta Kelvin Stamm Auer:</h1>

    @foreach($examinations5 as $examination5)
    <div class="flex space-x-4">
    <div class="flex-1"> <p class="p-2">{{$examination5->medicineName}}</p></div>
    
</div>

    @endforeach

</div>


 
        </div>
    </div>
</x-app-layout>

