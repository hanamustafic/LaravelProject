<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases=DB::table('diseases')
        ->orderBy('type')
        ->get();

        $diseases1=DB::table('diseases')
        ->join('medicines','medicines.id','=','diseases.medicine')
        ->select('diseases.*','medicines.medicineName')
        ->get();

        $diseases2=DB::table('diseases')
        ->join('medicines','medicines.id','=','diseases.medicine')
        ->select('diseases.type','medicines.medicineName')
        ->where('medicines.medicineName','Panadol')
        ->get();

       return view('diseases.index',['diseases' => $diseases,'diseases1' => $diseases1,'diseases2' => $diseases2]);
    }

    public function file_add(Request $request)
    {
        $id=$request->id;
        
        $diseases = Disease::find($id);

        return view('diseases.file_add', ['id' => $id , 'diseases' => $diseases]);

    }

    public function process(Request $request)
    {
        $id=$request->id;
        
        $diseases = Disease::find($id);

        $folder_to_save = $diseases->code;

        $file = $request->file('file');

        $filename = $diseases->id . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folder_to_save, $filename);

        return redirect()->route('diseases');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = DB::table('medicines')
        ->get();
        return view('diseases.add', ['medicines'=>$medicines]);
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
            'type' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'medicine' => 'required|string|max:255',
        ]);

        DB::table('diseases')->insert([
            'type' => $request->type,
            'symptoms' => $request->symptoms,
            'medicine' => $request->medicine,
            
         ]);

        return redirect()->route('diseases');
    }

    public function delete(Request $request){
        $id=$request->id;

        Disease::destroy($id);

        return redirect()->route('diseases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $diseases = DB::table('diseases')
        ->where('id', $id)
        ->get();

        $medicines = DB::table('medicines')
        ->get();
    
        return view('diseases.edit', ['diseases' => $diseases , 'medicines' => $medicines]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'type' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'medicine' => 'required|string|max:255',
           
        ]);

        $update_query = DB::table('diseases')
        ->where('id', $id)
        ->update([
            'type' => $request->type,
            'symptoms' => $request->symptoms,
            'medicine' => $request->medicine,
            ]);

        return redirect()->route('diseases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        //
    }
}
