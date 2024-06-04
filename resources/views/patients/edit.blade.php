<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Pacijenti-Uredi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($patients as $patient)
                    <form method="POST" action="{{ route('update_patient') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$patient->id}}"/>
                        <div>
                            <x-label for="name" value="{{ __('Ime') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$patient->name}}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-label for="lastname" value="{{ __('Prezime') }}" />
                            <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{$patient->lastname}}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="birth" value="{{ __('Datum rodjenja') }}" />
                            <x-input id="birth" class="block mt-1 w-full" type="date" name="birth" value="{{$patient->birth}}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="bloodType" value="{{ __('Krvna grupa') }}" />
                            <x-input id="bloodType" class="block mt-1 w-full" type="text" name="bloodType" value="{{$patient->bloodType}}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-label for="disease" value="{{ __('Bolest') }}" />
                            <select id="disease" name="disease" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option>Odaberi</option>
                                @foreach($diseases as $disease)
                                <option value="{{$disease->id}}" 
                                @if($patient->disease == $disease->id) selected 
                                @endif>{{$disease->type}}</option>
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