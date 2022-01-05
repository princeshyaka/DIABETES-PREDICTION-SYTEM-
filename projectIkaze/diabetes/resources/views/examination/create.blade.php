@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8">
              @if(!$errors->isEmpty())
                <div class="mt-3">
                @include('includes.errors')
                </div>
              
              @endif
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      New Examination
                    </h6>

                    <!-- Title -->
                    <h3 class="header-title">
                      {{$patient->fullName}}<br>
                      @if($patient->gender==1)
                      Male
                      @else 
                      Female
                      @endif
                      <br>{{$patient->DOB->age}} years old

                    </h3>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

            <!-- Form -->
           
{!! Form::open(['method'=>'POST','action'=>['ExaminationController@predict',$patient->id]]) !!}

    

  
  

       
        <div class="row mt-5">
        {!!Form::hidden('gender',$patient->gender==2,['class'=>'form-control','required','min' => '0'])!!}
        @if($patient->gender==2)
              <div class="col-12 col-md-6">
                  <label for="pregnancies" class=" col-form-label text-md-right">pregnancies </label>

                  {!!Form::number('pregnancies',null,['class'=>'form-control','required','min' => '0'])!!}
  
                                          
              </div>
          
                                         
             @endif
             
              <div class="col-12 col-md-6">
                  <label for="glucose" class=" col-form-label text-md-right">glucose </label>

                  {!!Form::number('glucose',null,['class'=>'form-control','required','min' => '0'])!!}
  
                                          
              </div>
            
                                         
              </div>
              <div class="row mt-5">
              <div class="col-12 col-md-6">
                  <label for="bloodPressure" class=" col-form-label text-md-right">bloodPressure </label>

                  {!!Form::number('bloodPressure',null,['class'=>'form-control','required','min' => '0'])!!}
  
                                          
              </div>
            
             
              <div class="col-12 col-md-6">
                  <label for="skinThickness" class=" col-form-label text-md-right">skinThickness </label>

                  {!!Form::number('skinThickness',null,['class'=>'form-control','required','min' => '0'])!!}
  
                                          
              </div>
            
                                         
              </div>
              <div class="row mt-5">
              <div class="col-12 col-md-6">
                  <label for="insulin" class=" col-form-label text-md-right">insulin </label>

                  {!!Form::number('insulin',null,['class'=>'form-control','required','min' => '0','step'=>'.1'])!!}
  
                                          
              </div>
            
              
              <div class="col-12 col-md-6">
                  <label for="BMI" class=" col-form-label text-md-right">BMI </label>

                  {!!Form::number('BMI',null,['class'=>'form-control','required','min' => '0','step'=>'.1'])!!}
  
                                          
              </div>
            
                                         
              </div>
             
              <div class="row mt-5">
              <div class="col-12 col-md-6">
                  <label for="diabetesPedigreeFunction" class=" col-form-label text-md-right">diabetes Pedigree Function </label>

                  {!!Form::number('diabetesPedigreeFunction',null,['class'=>'form-control','required','min' => '0','step'=>'.001'])!!}
  
                                          
              </div>
            
                                         
           
           </div>
           <div class="row mt-5">
            <div class="form-group">
      
                  {!!Form::submit('predict',['class'=>'text-center btn  btn-primary'])!!}
         </div>
</div>
         {!! Form::close() !!}

        
      </div> <!-- / .row -->
    </div>
    @endsection
    @section('scripts')

@endsection
