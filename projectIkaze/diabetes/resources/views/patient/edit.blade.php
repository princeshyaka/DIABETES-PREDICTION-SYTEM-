@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-6">
             
                <div class="mt-5">
                @include('includes.errors')
                </div>
              
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      patient
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                     update Patient
                    </h1>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
            {!! Form::model($patient,['method'=>'PATCH','route'=>['patient.update',$patient->id]]) !!}
                   
              <div class="form-group" >
                <label>
                  Last Name:
                </label>
                {!!Form::text('last_name',null,['class'=>'form-control','required'])!!}
               
              </div>
              <div class="form-group" >
                <label>
                  First Name:
                </label>
                {!!Form::text('first_name',null,['class'=>'form-control','required'])!!}
               
              </div>
              <div class="form-group" >
                <label>
                 Email:
                </label>
                {!!Form::email('email',null,['class'=>'form-control','required'])!!}
               
              </div>
              <div class="form-group" >
                <label>
                  Address:
                </label>
                {!!Form::text('address',null,['class'=>'form-control','required'])!!}
               
              </div>
              <div class="form-group" >
                <label>
                  Phone:
                </label>
                {!!Form::text('phone',null,['class'=>'form-control','required'])!!}
               
              </div>
           


              <div class="form-row">
                <div class="col">
                    {!!Form::label('gender','Gender:')!!}
                </div>
                <div class="col">
                    {!!Form::select('gender', [''=>'select gender','1' => 'Male', '2' => 'Female'],$patient->gender,['class'=>'form-control'])!!}
                </div>
              </div>
              <div class="form-group">
                    {!!Form::label('DOB','DOB')!!}

                    <div class="form-row">
                      <div class="col">
                      {!!Form::date('DOB',$patient->DOB,['class'=>'form-control','required'])!!}
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
     
