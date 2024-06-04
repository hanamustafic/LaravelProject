<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Lijekovi-Uredi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($medicines as $medicine)
                    <form method="POST" action="{{ route('update_medicine') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$medicine->id}}"/>
                        <div>
                            <x-label for="medicineName" value="{{ __('Ime') }}" />
                            <x-input id="medicineName" class="block mt-1 w-full" type="text" name="medicineName" value="{{$medicine->medicineName}}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-label for="medicineType" value="{{ __('Vrsta lijeka') }}" />
                            <x-input id="medicineType" class="block mt-1 w-full" type="text" name="medicineType" value="{{$medicine->medicineType}}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="usage" value="{{ __('Upotreba') }}" />
                            <x-input id="usage" class="block mt-1 w-full" type="text" name="usage" value="{{$medicine->usage}}" required autofocus />
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