@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
          
         
        

       
            @include('includes.errors')

            <h3>update email</h3>
        <!-- Form -->
        {!! Form::model($user,['method'=>'PATCH','route'=>['doctor.updateEmail'],'class'=>'mb-4']) !!}
        

        <div class="row">
                <div class="col-12">
                  
                  <!-- Last name -->
                  <div class="form-group">
    
                    <!-- Label -->
                    <label>
                    Email address
                    </label>
    
                    <!-- Input -->
                    {!!Form::text('email',null,['class'=>'form-control'])!!}
    
                  </div>
    
                </div>
                </div>
          <div class="row">
            <div class="col-12">
              
              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label>
                CURRENT  PASSWORD
                </label>

                <!-- Input -->
                <input type="password" name="password" class="form-control" />
              

              </div>

            </div>
          </div>
            
            
          
            {!!Form::submit('save email',['class'=>'btn btn-primary'])!!}
              <!-- Submit -->
             
         
          {!! Form::close() !!}
        
    </div> <!-- / .row -->
    </div>
</div>
<div class="row justify-content-center">
  <div class="col-12 col-lg-10 col-xl-8">
    <h3 class="mt-3">update  password</h3>
    <hr>
    {!! Form::open(['method'=>'PATCH','route'=>['doctor.updatePassword'],'class'=>'mb-4']) !!}
        
        <div class="row">
                <div class="col-12 ">
                  
                  <!-- Last name -->
                  <div class="form-group row">
                        <label for="current" class="col-sm-5 col-form-label">CURRENT PASSWORD</label>
                        <div class="col-sm-7">
                          <input type="password" name="current" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="new" class="col-sm-5 col-form-label">NEW PASSWORD</label>
                            <div class="col-sm-7">
                              <input type="password" name="new" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                                <label for="new" class="col-sm-5 col-form-label">CONFIRM PASSWORD</label>
                                <div class="col-sm-7">
                                  <input type="password" name="password_confirmation" class="form-control">
                                </div>
                              </div>
                      
            
          
            {!!Form::submit('save password',['class'=>'btn btn-primary'])!!}
              <!-- Submit -->
             
         
          {!! Form::close() !!}
        
    </div> <!-- / .row -->

    </div>
        
  </div>
  @endsection