<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Examination;
use Illuminate\Http\Request;


class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations=DB::table('examinations')
        ->join('doctors','examinations.doctor1','=','doctors.id')
        ->join('patients','examinations.patient1','=','patients.id')
        ->join('diseases','examinations.disease1','=','diseases.id')
        ->join('medicines','examinations.medicine1','=','medicines.id')
        ->select('examinations.*','doctors.named','doctors.lastnamed','patients.name','patients.lastname','diseases.type','medicines.medicineName')
        ->get();

        $examinations2=DB::table('examinations')
        ->join('doctors','examinations.doctor1','=','doctors.id')
        ->select('examinations.*','doctors.named','doctors.lastnamed')
        ->where('examinations.patient1','5')
        ->get();

        $examinations3=DB::table('examinations')
        ->join('diseases','examinations.disease1','=','diseases.id')
        ->select('examinations.*','diseases.type')
        ->where('examinations.patient1','5')
        ->get();

        $examinations4=DB::table('examinations')
        ->join('doctors','examinations.doctor1','=','doctors.id')
        ->join('patients','examinations.patient1','=','patients.id')
        ->join('diseases','examinations.disease1','=','diseases.id')
        ->join('medicines','examinations.medicine1','=','medicines.id')
        ->select('examinations.*','doctors.named','doctors.lastnamed','patients.name','patients.lastname','diseases.type','medicines.medicineName')
        ->where('examinations.patient1','5')
        ->get();
       
        $examinations5=DB::table('examinations')
        ->join('medicines','examinations.medicine1','=','medicines.id')
        ->select('examinations.*','medicines.medicineName')
        ->where('examinations.patient1','5')
        ->get();

        return view('examinations.index',
        ['examinations' => $examinations,
        'examinations2' => $examinations2,
        'examinations3' => $examinations3,
        'examinations4' => $examinations4,
        'examinations5' => $examinations5,
       
    
    
    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=DB::table('patients') ->get();
        $doctors=DB::table('doctors') ->get();
        $diseases=DB::table('diseases') ->get();
        $medicines=DB::table('medicines') ->get();


        return view('examinations.add',['doctors'=> $doctors,'patients'=> $patients,'diseases'=>$diseases,'medicines'=> $medicines]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor1'=>'required|integer',
            ]);
            DB::table('examinations')->insert([
                'doctor1'=>$request->doctor1,
                'patient1'=>$request->patient1,
                'disease1'=>$request->disease1,
                'medicine1'=>$request->medicine1,
                
            ]);
            return redirect()->route('examinations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        $examinations=DB::table('examinations')
        ->where('id',$id)
        ->get();
        
        $doctors=DB::table('doctors')
        ->get();

        $patients=DB::table('patients')
        ->get();

        $diseases=DB::table('diseases')
        ->get();

        $medicines=DB::table('medicines')
        ->get();
   
        return view('examinations.edit',['examinations'=> $examinations,'doctors'=> $doctors,'patients'=> $patients,'diseases'=>$diseases,'medicines'=> $medicines]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $request->validate([
            'doctor1'=>'required|integer',
            'patient1'=>'required|integer',
            'disease1'=>'required|integer',
            'medicine1'=>'required|integer',
    
        ]);
        $update_query=DB::table('examinations')
        ->where('id',$id)
        ->update([
            'doctor1'=>$request->doctor1,
            'patient1'=>$request->patient1,
            'disease1'=>$request->disease1,
            'medicine1'=>$request->medicine1,
        ]);
        return redirect()->route('examinations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
        //
    }

    public function delete(Request $request){
        $id=$request->id;
        Examination::destroy($id);
        return redirect()->route('examinations');
    }
}

