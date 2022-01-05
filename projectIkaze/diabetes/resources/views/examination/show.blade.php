@extends('layouts.admin')
@section('css')
   <style>
     body{
       
     }
   </style>
@endsection
@section('content')

    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-6">
            
              @if(Session::has('success'))
              <div class="mt-3 col-12 col-md-8 ">
                  <div class="alert alert-success">
                                     {{ session('success')}}
                    </div>
              </div>
              @endif
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h3 class="header-pretitle">
                     Laboratory Test result #{{$ex->id}}
                    </h3>

                    <!-- Title -->
                   

                  </div>
                  <div class="col-auto">
                  
                    <!-- Button -->
                  <a href="{{route('examination.pdf',$ex->id)}}" class="btn btn-primary">
                     print
                    </a>
                    
                  </div>
                  
                </div> <!-- / .row -->
              </div>
            </div>
            <div class="col-12 m-4">
                <div class="header">
                   <div class="header-body"> 
                <div class="row align-items-center">
                    <div class="col">
                        <p class="mb-2">
                            Patient Id: {{$ex->patient->id}}
                            </p>
                    
                      <p class="mb-2">
                       Patient Names: {{$ex->patient->fullName}}
                      </p>
                      
                      <p class="mb-2">
                        Date: {{$ex->created_at->format('d M Y , H:m')}}
                       </p>
                       <p class="mb-2">
                       Address: {{$ex->patient->address}}
                       </p>
  
                      <!-- Title -->
                     
  
                    </div>
                    <div class="col-auto">
                      
                        <!-- Pretitle -->
                        <p class="mb-2">
                          age: {{$ex->age}}
                        </p>
                      
                         <p class="mb-2">
                          phone: {{$ex->patient->phone}}
                         </p>
    
                        <!-- Title -->
                       
    
                      </div>
                    
                  </div> <!-- / .row -->
                   </div>
                </div>
                
 
                    </div>
                    <div class="col-12">
                         <!-- Card -->
                         <div class="header">
                           <div class="header-body">
                <div class="card ">
                    <div class="card-body">
      
                      <!-- List group -->
                      <div class="list-group list-group-flush my-n3">
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                               glucose
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Time -->
                              <small class="text-muted"  >
                               {{$ex->glucose}} 
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                               blood pressure
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Time -->
                              <small class="text-muted" >
                                {{$ex->bloodPressure}} 
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                                skin thickness
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Text -->
                              <small class="text-muted">
                                {{$ex->skinThickness}}
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                                insulin
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Text -->
                              <small class="text-muted">
                                 {{$ex->insulin}}
                               
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                              BMI
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Text -->
                              <small class="text-muted">
                                 {{$ex->BMI}}
                               
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                              Diabetes Predigree function
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Text -->
                              <small class="text-muted">
                                {{$ex->diabetesPedigreeFunction}}
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                       
                        
                        
                        @if($ex->patient->gender==2)
                      
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col">
      
                              <!-- Title -->
                              <p class="mb-0">
                              Pregnancies
                              </p>
      
                            </div>
                            <div class="col-auto">
      
                              <!-- Link -->
                              <small  class="text-muted">
                                {{$ex->pregnancies}}
                              </small>
      
                            </div>
                          </div> <!-- / .row -->
                        </div>
                        
                    @endif
                      </div>
      
                    </div>
                  </div>
                           </div>
                         </div>
                  <div class="">
                    <div class="row align-items-center">
                      <div class="col">
                          <p class="mb-5">
                              Collected by: {{$ex->doctor->fullName}}
                              </p>
                      
                        <p class="mb-2">
                             Test results interpretation:
                        </p>
                        
                        <p class="mb-2">
                        Diabetes disease: {{$ex->outcome?'Positive':'Negative'}}
                         </p>
                         <div class="mb-2">
                           BMI: {{$ex->getBMI()}}<br>
                           @if($ex->BMI>=25 || $ex->BMI<18.5)
                           suggestions: 
                           <ul>
                           @foreach ($ex->getBMISuggestion() as $x)
                           <li>{{$x}}</li>
                           @endforeach
                           </ul>
                           @endif
                           
                         </div>

                         <div class="mb-2">
                          Glucose: {{$ex->getGlucose()}}<br>
                          @if($ex->glucose>139)
                          suggestions: 
                          <ul>
                          @foreach ($ex->getGlucoseSuggestion() as $x)
                          <li>{{$x}}</li>
                          @endforeach
                          </ul>
                          @endif
                        </div>
                       
    
                        <!-- Title -->
                       
    
                      </div>
                  </div>
      
                    </div>
                   
                </div>
              </div>
          </div>
        </div>
</div>
@endsection
