<?php

namespace App\Http\Controllers;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PDF;


class PatientController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $patients=Patient::with('test')->get();

        return view('patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('patient.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        Validator::make($request->all(),[
            'first_name'=>'required|string|min:2|max:100',
            'last_name'=>'required|string|min:2|max:100',
            'address'=>'required|string|min:2|max:100',
            'phone'=>'bail|required|string|min:2|max:100,phone',
            'email'=>'bail|required|email|unique:patients,email',
            'gender'=>'required|in:1,2',
            'DOB'=>'required|date',
             
           

        ])->validate();
        
        $dob=Carbon::createFromFormat('Y-m-d',  $request->DOB);
        if($dob>Carbon::now()){
            throw new \Exception('invalid date of birth');
       }
        $patient=new Patient;
        $patient->first_name=$request->first_name;
        $patient->last_name=$request->last_name;
        $patient->gender=$request->gender;
        $patient->email=$request->email;
        $patient->address=$request->address;
        $patient->phone=$request->phone;
        $patient->DOB=$dob;
        $patient->save();
         return redirect()->route('patient.show', $patient->id);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient=Patient::with('test','test.doctor')->findOrfail($id);
        return view('patient.single',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=Patient::findOrFail($id);
        
        return view('patient.edit',compact('patient'));
    }
    public function pdf(){
        $docters=Patient::all();
        $pdf=PDF::loadView('patient.pdf',compact('docters'));
        return $pdf->download("patients.pdf");
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(),[
            'first_name'=>'required|string|min:2|max:100',
            'last_name'=>'required|string|min:2|max:100',
            'address'=>'required|string|min:2|max:100',
            'phone'=>'bail|required|string|min:2|max:100,phone',
            'email'=>'bail|required|email|unique:patients,email,'.$id,
            'gender'=>'required|in:1,2',
            'DOB'=>'required|date',
             
           

        ])->validate();
        
        $dob=Carbon::createFromFormat('Y-m-d',  $request->DOB);
        if($dob>Carbon::now()){
            throw new \Exception('invalid date of birth');
       }
        $patient=Patient::findOrFail($id);
        $patient->first_name=$request->first_name;
        $patient->last_name=$request->last_name;
        $patient->gender=$request->gender;
        $patient->email=$request->email;
        $patient->address=$request->address;
        $patient->phone=$request->phone;
        $patient->DOB=$dob;
        $patient->save();
         return redirect()->route('patient.show', $patient->id)->with('success','patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $patient=Patient::findOrFail($id);
        DB::beginTransaction();
        try {
        $patient->test()->delete();
        $patient->delete();
        DB::commit();
        return redirect()->route('patient.index')->with('success','patient deleted successfully');
        
    } catch (\Exception $e) {
        DB::rollback();
        // something went wrong
    }

    }
    public function searchID(Request $request){
        Validator::make($request->all(),[
            'id'=>'required',

        ])->validate();
        $patient=Patient::find($request->id);
        if($patient){
            return redirect()->route('patient.show', $patient->id);
        }else{
            return redirect()->back()->withErrors("Sorry - we're unable to find a patient with this information. Please check that the information is correct and try again.")->withInput();
        }


    }
    public function searchByNames(Request $request){
        Validator::make($request->all(),[
           
            'last_name'=>'required',
            'first_name'=>'required',
            'phone'=>'required',

        ])->validate();
        $patient=Patient::where('last_name','=',$request->last_name)->where('first_name',$request->first_name)->where('phone',$request->phone)->first();
        if($patient){
            
            return redirect()->route('patient.show', $patient->id);
        }else{
            return redirect()->back()->withErrors("Sorry - we're unable to find a patient with this information. Please check that the information is correct and try again.")->withInput();
        }

    }
    public function getUpdateDoctor($id)
    {
       
       
        $patient=Patient::findOrFail($id);
        return view('patient.edit',compact('patient'));
    }
    
}

