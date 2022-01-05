<?php

namespace App\Http\Controllers\Administrator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Rules\checkAdminPassword;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{

    protected $redirectTo = '/administrator/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrator.auth:administrator');
    }
    

    /**
     * Show the Administrator dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $doctors=User::with('test')->get()->SortByDesc('created_at');

        return view('administrator.doctor.index',compact('doctors'));
    }
    public function editProfile(){
        $user = Auth::guard('administrator')->user();
        return view('administrator.profile',compact('user'));

    }
    public function doctorStore(Request $request)
    {
      
        Validator::make($request->all(),[
            'first_name'=>'required|string|min:2|max:100',
            'last_name'=>'required|string|min:2|max:100',
            'role'=>'required|string|min:2|max:100',
            'phone'=>'bail|required|string|min:2|max:100|unique:users,phone',
            'email'=>'bail|required|email|unique:users,email',
            'password'=>'bail|required|min:8',
            'gender'=>'required',
         
             
           

        ])->validate();
      
     
        DB::beginTransaction();
        $user=new User;
        try{
           
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->gender=$request->gender;
            $user->email=$request->email;
            $user->role=$request->role;
     
            $user->phone=$request->phone;
           
            $user->password=Hash::make($request->password);
          
            $user->save();
     
        
      
         DB::commit();
         return redirect()->route('admin.doctor.show', $user->id);
         } catch(\Exception $e)
         {
            DB::rollback();
            throw $e;
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doctorShow($id)
    {
        $doctor=User::with('test','test.patient')->findOrfail($id);
        return view('administrator.doctor.show',compact('doctor'));
    }
    
    public function updateEmail(Request $request)
    {
        $user = Auth::guard('administrator')->user();
       
        
        Validator::make($request->all(), [
           
            'password' => ['required', 'string', 'max:255',new checkAdminPassword],
            'email'=>['bail','email','unique:administrators,email,'.$user->id],
            
        ])->validate();
        
       
       
        
         
          $user->email=$request->email;
         
          $user->save();
          return redirect()->back()->with("success","email updated successfully");
    }
    
    public function updatePassword(Request $request){
        Validator::make($request->all(), [
           
            'current' => ['required', 'string',new checkAdminPassword],
            'new'=>'required|min:8|max:255',
            'password_confirmation' => 'same:new',
            
            
        ])->validate();
        $user = Auth::guard('administrator')->user();
        
           $user->password= Hash::make($request->new);
           $user->save();
           return redirect()->back()->with("success","password updated successfully");
    }
    public function doctorCreate()
    {
        
        return view('administrator.doctor.create');
    }
    public function access($id)
    {
       $user=User::findOrFail($id);
       $user->active=!$user->active;
       $message=$user->active?"doctor granted access successfully":"doctor suspended successfully";
       $user->save();
        return redirect()->back()->with("success",$message);
    }
    public function createDoctor()
    {
        
        return view('administrator.doctor.create');
    }
    public function getUpdateDoctor($id)
    {
       
        
        $user=User::findOrFail($id);
        return view('administrator.doctor.edit',compact('user'));
    }
    public function updateDoctor(Request $request,$id   )
    {
       
        Validator::make($request->all(),[
            'first_name'=>'required|string|min:2|max:100',
            'last_name'=>'required|string|min:2|max:100',
            'role'=>'required|string|min:2|max:100',
            'phone'=>'bail|required|string|min:2|max:100|unique:users,phone,'.$id,
            'email'=>'bail|required|email|unique:users,email,'.$id,
            'gender'=>'required',
           
         
             
           

        ])->validate();
      
     
        DB::beginTransaction();
        $user=User::findOrFail($id);
        try{
           
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->gender=$request->gender;
            $user->email=$request->email;
            $user->role=$request->role;
     
            $user->phone=$request->phone;
           
          
          
            $user->save();
     
        
      
         DB::commit();
         return redirect()->route('admin.doctor.show', $user->id)->with('success','doctor updated successfully');
         } catch(\Exception $e)
         {
            DB::rollback();
            throw $e;
        }
       
    }

}