<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $doctors=DB::table('doctors')
       ->get();

       $doctors2=DB::table('doctors')
       ->select('doctors.*')
       ->where('doctors.specialization','Onkolog')
       ->get();

       return view('doctors.index', ['doctors'=>$doctors, 'doctors2'=>$doctors2]);

    }

    public function file_add(Request $request)
    {
        $id=$request->id;
        
        $doctors = Doctor::find($id);

        return view('doctors.file_add', ['id' => $id , 'doctors' => $doctors]);

    }

    public function process(Request $request)
    {
        $id=$request->id;
        
        $doctors = Doctor::find($id);

        $folder_to_save = $doctors->code;

        $file = $request->file('file');

        $filename = $doctors->id . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folder_to_save, $filename);

        return redirect()->route('doctors');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examinations = DB::table('examinations')
        ->get();
        return view('doctors.add', ['examinations'=>$examinations]);
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
            'named' => 'required|string|max:255',
            'lastnamed' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'examination' => 'required|string|max:255',
        ]);

        DB::table('doctors')->insert([
            'named' => $request->named,
            'lastnamed' => $request->lastnamed,
            'birth' => $request->birth,
            'specialization' => $request->specialization,
            'examination' => $request->examination,
         ]);

        return redirect()->route('doctors');
    }

    public function delete(Request $request){
        $id=$request->id;

        Doctor::destroy($id);

        return redirect()->route('doctors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $doctors = DB::table('doctors')
        ->where('id', $id)
        ->get();

        $examinations = DB::table('examinations')
        ->get();
    
        return view('doctors.edit', ['doctors' => $doctors , 'examinations' => $examinations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $id = $request->id;

        $request->validate([
            'named' => 'required|string|max:255',
            'lastnamed' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'examination' => 'required|string|max:255',
        ]);

        $update_query = DB::table('doctors')
        ->where('id', $id)
        ->update([
            'named' => $request->named,
            'lastnamed' => $request->lastnamed,
            'birth' => $request->birth,
            'specialization' => $request->specialization,
            'examination' => $request->examination,
            ]);

        return redirect()->route('doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
