<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $patients=DB::table('patients')
       ->get();

       $patients2=DB::table('patients')
       ->join('diseases','patients.disease','=','diseases.id')
       ->select('patients.*','diseases.type')
       ->get();

       $patients3=DB::table('patients')
       ->join('diseases','patients.disease','=','diseases.id')
       ->select('patients.*','diseases.type')
       ->where('diseases.type','Dijabetes')
       ->get();

        return view('patients.index',
        ['patients' => $patients,
        'patients2' => $patients2,
        'patients3' => $patients3
    
    
    
    ]);
    }

    public function file_add(Request $request)
    {
        $id=$request->id;
        
        $patients = Patient::find($id);

        return view('patients.file_add', ['id' => $id , 'patients' => $patients]);

    }

    public function process(Request $request)
    {
        $id=$request->id;
        
        $patients = Patient::find($id);

        $folder_to_save = $patients->code;

        $file = $request->file('file');

        $filename = $patients->id . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folder_to_save, $filename);

        return redirect()->route('patients');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $diseases = DB::table('diseases')
        ->get();
        return view('patients.add', ['diseases'=>$diseases]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'disease' => 'required|string|max:255',
        ]);

        DB::table('patients')->insert([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birth' => $request->birth,
            'bloodType' => $request->bloodType,
            'disease' => $request->disease,
         ]);

        return redirect()->route('patients');
    }

    public function delete(Request $request){
        $id=$request->id;

        Patient::destroy($id);

        return redirect()->route('patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $patients = DB::table('patients')
        ->where('id', $id)
        ->get();

        $diseases = DB::table('diseases')
        ->get();
    
        return view('patients.edit', ['patients' => $patients , 'diseases' => $diseases]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'disease' => 'required|string|max:255',
           
        ]);

        $update_query = DB::table('patients')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birth' => $request->birth,
            'bloodType' => $request->bloodType,
            'disease' => $request->disease,
            ]);

        return redirect()->route('patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
