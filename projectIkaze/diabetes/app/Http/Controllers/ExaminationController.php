<?php

namespace App\Http\Controllers;

use PDF;
use App\Patient;
use App\Test;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $exs=Test::with('doctor','patient')->get();
        return view('examination.list',compact('exs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ex=Test::with('patient','doctor')->findOrfail($id);
        return view('examination.show',compact('ex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createPrediction($id){
        $patient=Patient::findOrfail($id);
        return view('examination.create',compact('patient'));
    }
    public function predict($id,Request $request){
        $patient=Patient::findOrfail($id);
        Validator::make($request->all(),[
            
            'pregnancies'=>'required_if:gender,==,2|numeric',
            'glucose'=>'required|integer',
            'bloodPressure'=>'required|integer',
            'skinThickness'=>'required|integer',
            'insulin'=>'required|numeric',
            'BMI'=>'required|numeric',
            'diabetesPedigreeFunction'=>'required|numeric',
       
            
             
           

        ])->validate();
        
        $diabetesArray=array("age"=>$patient->DOB->age,
        "pregnancies"=>$request->pregnancies?$request->pregnancies:0,
        "glucose"=>$request->glucose,
        "bloodPressure"=>$request->bloodPressure,
        "skinThickness"=>$request->skinThickness,
        "insulin"=>$request->insulin,
        'BMI'=>$request->BMI,

        "diabetesPedigreeFunction"=>$request->diabetesPedigreeFunction,

      );
    
         $diabetes=json_encode($diabetesArray);
       
       
         $headers = [
                        'Content-Type' => 'application/json',
                  ];
                  $client = new Client([
                               'headers' => $headers
                             ]);      

     
      try {
        $res = $client->request('POST', env('prediction'), [
            'body' => $diabetes,
        ]);
       if($res->getStatusCode()==200){
          
        $diabetesArray+=array('outcome'=>$res->getBody()->getContents(),'user_id'=>auth()->user()->id,'patient_id'=>$patient->id);
            $ex=new Test;
            $ex->fill($diabetesArray);
            $ex->save();
            $patient->diabete=$ex->outcome;
            $patient->BMI=$ex->BMI;
            $patient->glucose=$ex->glucose;
            $patient->save();
            return redirect()->route('examination.show', $ex->id);
       }else{
        throw new \Exception('error occured');
       }
                     
      } catch (\GuzzleHttp\Exception\ClientException $e) {
        return Redirect::back()->withErrors(($e->getResponse()->getBody()->getContents()))->withInput();
      }catch(\Exception $e){
        return Redirect::back()->withErrors($e->getMessage())->withInput();
      }
      return boolean($res->getResponse()->getBody()->getContents());
    
                      
      
   }
   public function downloadPdf($id){
    $ex=Test::with('patient','doctor')->findOrfail($id);
       $pdf=PDF::loadView('examination.pdf',compact('ex'));
       $name="report".$ex->id.".pdf";
       return $pdf->download($name);
  
   }
   public function comment($id, Request $request){
       $ex=Test::findOrfail($id);
       Validator::make($request->all(),[
            
        'comment'=>'required|min:10',
        
        'doctorAnalysis'=>'required|boolean',
        
       

    ])->validate();
    $ex->feedback=$request->comment;
    $ex->doctorAnalysis=$request->doctorAnalysis;
    $ex->save();
    return redirect()->route('examination', $ex->id)->withSuccess('feedback created successfully');;


   }
   public function getcomment($id){
    $ex=Test::with('patient','doctor')->findOrfail($id);
    return view('examination.comment',compact('ex'));
   }
  
      
   public function dataset(){
         
    
   }
   public function printPDF(){
    $exs=Test::with('doctor','patient')->get();
    $pdf=PDF::loadView('examination.listPDF',compact('exs'));
   
    return $pdf->download('examinations.pdf');
   }
    
      
    
    
}