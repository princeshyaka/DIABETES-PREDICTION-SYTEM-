@extends('administrator.layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            
                <div class="mt-3">
                @include('includes.errors')
                </div>
              
       
               
            <!-- Header -->
            <div class="header mt-md-5 mb-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                       Doctor
                    </h6>

                    <!-- Title -->
                    <h4 class="header-title">
                     update Doctor
                    </h4>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::model($user,['method'=>'PATCH','route'=>['doctor.updateDoctor',$user->id]]) !!}
      
<div class="form-group row" >
                <label class="col-sm-4 col-form-label">
    First Name:
  </label>
  <div class="col-sm-8">
  {!!Form::text('first_name',null,['class'=>'form-control','required'])!!}
 </div>
</div>
<div class="form-group row" >
                <label class="col-sm-4 col-form-label">
    last Name:
  </label>
  <div class="col-sm-8">
  {!!Form::text('last_name',null,['class'=>'form-control','required'])!!}
  </div>
</div>

              <div class="form-group row" >
                <label class="col-sm-4 col-form-label">
                 Email:
                </label>
                <div class="col-sm-8">
                {!!Form::email('email',null,['class'=>'form-control','required'])!!}
                </div>
              </div>
              
              <div class="form-group row" >
                <label class="col-sm-4 col-form-label">
                  Phone:
                </label>
                <div class="col-sm-8">

                {!!Form::text('phone',null,['class'=>'form-control','required'])!!}
               </div>
              </div>

              <div class="form-group row" >
                <label class="col-sm-4 col-form-label">
                 role:
                </label>
                <div class="col-sm-8">
                {!!Form::text('role',null,['class'=>'form-control','required'])!!}
               </div>
              </div>

              <div class="form-group row" >
              <label class="col-sm-4 col-form-label">Gender </label>
                    <div class="col-sm-8">
                    {!!Form::select('gender', [''=>'select gender','1' => 'Male', '2' => 'Female'],$user->gender,['class'=>'form-control','required'])!!}
                </div>
              </div>
             





              <!-- Divider -->
              <hr class="mt-4 mb-5">

              <!-- Project cover -->
              
             
              <div class="form-group">
                 
                    {!!Form::submit('Save',['class'=>'btn btn-block btn-primary'])!!}
           </div>

           {!! Form::close() !!}

          </div>
        </div> <!-- / .row -->
      </div>
      @endsection
     