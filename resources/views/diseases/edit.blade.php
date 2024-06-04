<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Bolesti-Uredi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($diseases as $disease)
                    <form method="POST" action="{{ route('update_disease') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$disease->id}}"/>
                        <div>
                            <x-label for="type" value="{{ __('Vrsta') }}" />
                            <x-input id="type" class="block mt-1 w-full" type="text" name="type" value="{{$disease->type}}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-label for="symptoms" value="{{ __('Simptomi') }}" />
                            <x-input id="symptoms" class="block mt-1 w-full" type="text" name="symptoms" value="{{$disease->symptoms}}" required autofocus />
                        </div>
                      
                        <div class="mt-4">
                            <x-label for="medicine" value="{{ __('Lijek') }}" />
                            <select id="medicine" name="medicine" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option>Odaberi</option>
                                @foreach($medicines as $medicine)
                                <option value="{{$medicine->id}}" 
                                @if($disease->medicine == $medicine->id) selected 
                                @endif>{{$medicine->medicineName}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Spremi') }}
                            </x-button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>