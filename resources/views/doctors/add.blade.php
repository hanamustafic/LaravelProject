<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Doktori-Dodavanje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <form method="POST" action="{{ route('store_doctor') }}">
                        @csrf
                        <div>
                            <x-label for="named" value="{{ __('Ime') }}" />
                            <x-input id="named" class="block mt-1 w-full" type="text" name="named" :value="old('named')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="lastnamed" value="{{ __('Prezime') }}" />
                            <x-input id="lastnamed" class="block mt-1 w-full" type="text" name="lastnamed" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="birth" value="{{ __('Datum rodjenja') }}" />
                            <x-input id="birth" class="block mt-1 w-full" type="date" name="birth" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="specialization" value="{{ __('Specijalizacija') }}" />
                            <x-input id="specialization" class="block mt-1 w-full" type="text" name="specialization" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="examination" value="{{ __('Pregled') }}" />
                            <select id="examination" name="examination" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Odaberi</option>
                                @foreach($examinations as $examination)
                                <option value="{{$examination->id}}">{{$examination->patient}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Spremi') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>