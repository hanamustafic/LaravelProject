<x-app-layout>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-2">
                @foreach($examinations as $examination)
                <form action="{{route('update_examination')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$examination->id}}">
    
                    <div>
                        <x-label for="patient1" value="{{__('Pacijent')}}"/>
                        <select id="patient1" name="patient1" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option>Odaberi</option>
                        @foreach($patients as $patient)
                        <option value="{{$patient->id}}"
                        @if($examination->patient1==$patient->id) selected
                        @endif>{{$patient->name}} {{$patient->lastname}}
                        </option>
                        @endforeach
                            </select>
                    </div> 

                    <div>
                        <x-label for="doctor1" value="{{__('Doktor')}}"/>
                        <select id="doctor1" name="doctor1" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option>Odaberi</option>
                        @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}"
                        @if($examination->doctor1==$doctor->id) selected
                        @endif>{{$doctor->name}} {{$doctor->lastname}}
                        </option>
                        @endforeach
                            </select>
                    </div> 

                    <div>
                        <x-label for="disease1" value="{{__('Bolest')}}"/>
                        <select id="disease1" name="disease1" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option>Odaberi</option>
                        @foreach($diseases as $disease)
                        <option value="{{$disease->id}}"
                        @if($examination->disease1==$disease->id) selected
                        @endif>{{$disease->type}}
                        </option>
                        @endforeach
                            </select>
                    </div> 

                    <div>
                        <x-label for="medicine1" value="{{__('Lijek')}}"/>
                        <select id="medicine1" name="medicine1" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option>Odaberi</option>
                        @foreach($medicines as $medicine)
                        <option value="{{$medicine->id}}"
                        @if($examination->medicine1==$medicine->id) selected
                        @endif>{{$medicine->medicineName}}
                        </option>
                        @endforeach
                            </select>
                    </div> 
    
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4"> 
                            {{__('Spremi')}}
                    </x-button>
                    </div>
                 </form>
                 @endforeach 
            </div>
        </div>
    </div>
    </div>
    </x-app-layout>

