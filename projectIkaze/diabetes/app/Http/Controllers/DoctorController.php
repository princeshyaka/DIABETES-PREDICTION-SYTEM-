<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rules\checkPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
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
        $doctors=User::with('test')->get();

        return view('doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor=User::with('test','test.patient')->findOrfail($id);
        return view('doctor.single',compact('doctor'));
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
    public function pdf(){
        $docters=User::all();
        $pdf=PDF::loadView('doctor.pdf',compact('doctors'));
       
        return $pdf->download("doctors.pdf");
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
    
    
    
    public function editProfile(){
        $user = Auth::user();
        return view('doctor.doctorProfile',compact('user'));

    }
    public function updateEmail(Request $request)
    {
        $user = Auth::user();
       
        
        Validator::make($request->all(), [
           
            'password' => ['required', 'string', 'max:255',new checkPassword],
            'email'=>['bail','email','unique:users,email,'.$user->id],
            
        ])->validate();
        
       
       
        
         
          $user->email=$request->email;
         
          $user->save();
          return redirect()->back()->with("success","email updated successfully");
    }
    
    public function updatePassword(Request $request){
        Validator::make($request->all(), [
           
            'current' => ['required', 'string',new checkPassword],
            'new'=>'required|min:8|max:255',
            'password_confirmation' => 'same:new',
            
            
        ])->validate();
        $user = Auth::user();
        
           $user->password= Hash::make($request->new);
           $user->save();
           return redirect()->back()->with("success","password updated successfully");
    }
}