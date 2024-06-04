<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Lijekovi-Dodavanje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <form method="POST" action="{{ route('store_medicine') }}">
                        @csrf
                        <div>
                            <x-label for="medicineName" value="{{ __('Ime') }}" />
                            <x-input id="medicineName" class="block mt-1 w-full" type="text" name="medicineName" :value="old('medicineName')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="medicineType" value="{{ __('Vrsta lijeka') }}" />
                            <x-input id="medicineType" class="block mt-1 w-full" type="text" name="medicineType" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="usage" value="{{ __('Upotreba') }}" />
                            <x-input id="usage" class="block mt-1 w-full" type="text" name="usage" required autofocus />
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