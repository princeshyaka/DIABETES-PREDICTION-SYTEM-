@extends('layouts.admin')
@section('content')
    

<div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 col-xl-6">
             
               
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">
                    
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                     Doctor
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      doctor Details
                    </h1>

                  </div>
                  
                </div> <!-- / .row -->
              </div>
            </div>
            <div class="col-12 col-xl-10">

                <!-- Card -->
                <div class="card">
                  <div class="card-body">
    
                    <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Names
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                             {{$doctor->fullName}} 
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              email
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Time -->
                            <small class="text-muted" >
                              {{$doctor->email}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                              Gender
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                                @if($doctor->gender==1)
                                  Male
                                  @else 
                                  Female
                                  @endif
                             
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Role
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Text -->
                            <small class="text-muted">
                              {{$doctor->role}}
                            </small>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                    
                      
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col">
    
                            <!-- Title -->
                            <h5 class="mb-0">
                             Tests
                            </h5>
    
                          </div>
                          <div class="col-auto">
    
                            <!-- Link -->
                            <a href="#!" class="small">
                              {{$doctor->test->count()}}
                            </a>
    
                          </div>
                        </div> <!-- / .row -->
                      </div>
                    
                    </div>
    
                  </div>
                </div>
    
                <!-- Weekly Hours -->
               @if($doctor->test->count()>0)
                <div class="card" id="paymentTable" >
                   
                    
                            <div class="table-responsive mt-5" data-toggle="lists" data-lists-values='["No", "Date","patient"]'>
                                    <table class="table  table-nowrap card-table">
                                      <thead>
                                        <tr>
                                          <th scope="col">
                                            <a href="#" class="text-muted sort" data-sort="No">#</a>
                                          </th>
                                          <th scope="col">
                                            <a href="#" class="text-muted sort" data-sort="Date">Date</a>
                                          </th>
                                          <th scope="col">
                                            <a href="#" class="text-muted sort" data-sort="Doctor">patient</a>
                                          </th>
                                       
                                        
                                         
                                          
                                          
                                         
                                         
                                          
                                        </tr>
                                      </thead>
                                      <tbody class="list">
        
                                         
                                            @foreach ($doctor->test->sortByDesc('created_at') as $c)
                                        <tr>
        
                                          <td  class="No">{{$loop->index+1}}</td>
                                          <td class="Date">{{$c->created_at->format('d M y')}}</td>
                                     
                                          <td class="Doctor">{{$c->patient->fullName}}</td>
                                           
                                          <td class="text-right">  <a href="{{route('examination.show',$c->id)}}" class="btn btn-primary">
                                                              view
                                                            </a></td>
                                       
                                     
                                          
                                          
                                        
                                        
                                         
                                         
                                                
                                                                  
                                                    @endforeach
                                                      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                           
                                                    <td>
                                                            <nav aria-label="Page navigation example">
                                                                    
                                                      <ul class="pagination">
                                                          
                                                      </ul>
                                                            </nav>
                                                    </td>
                                                  
                                        </tr>
                                    </tfoot>
                                    </table>
                                  </div>
                    </div>
                    @endif
                    </div>
                </div>
              </div>
          </div>
        </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

var userList = new List('paymentTable', { 
    valueNames: ["no", "date","patient"],
  page: 5,
  pagination: true
});	

</script>
@endsection