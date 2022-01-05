<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
  
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" id="stylesheetLight">
    @yield('css')
    
    
</head>
<body style="display:block;">
        <nav class="navbar navbar-expand-lg  navbar-light " id="topnav">
                <div class="container">
        
                  <a class="navbar-brand" href="#" style="font-weight: 500">
                    {{ config('app.name', 'Laravel') }}
                </a> 
                  <button class="navbar-toggler mr-auto collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
        
                  
                
        
                  
                  
        
                  
                  <div class="navbar-user" >
              
                    
                    
        
                    <div class="dropdown">
                
                      <!-- Toggle -->
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{  Auth::guard('administrator')->user()->email }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{route('admin.profile')}}" class="dropdown-item">profile</a>
                    
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                      </div>
        
                    </div>
                 
                  
                  </div>

                  <div class="navbar-collapse mr-auto order-lg-first collapse" id="navbar" >
        
                    <!-- Form -->
                    
        
                    <!-- Navigation -->
                    <ul class="navbar-nav mr-auto">
                      
                    
                      
                      
                      
                      
                     
                     
                   
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle " href="#" id="topnavUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Doctor
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="topnavUsers">
                                <li>
                                  <a class="dropdown-item " href="{{route('admin.doctor.index')}}">
                                    Overview
                                  </a>
                                </li>
                                <li>
                                  <a class="dropdown-item " href="{{route('admin.doctor.create')}}">
                                    create
                                  </a>
                                </li>
                               
                              </ul>
                            </li>

                            
                        
                           
                      </ul>
                    
          
                    
          
                  </div> <!-- / .container -->
                  </div>
                </nav>
               
                <div class="main-content">
                @yield('content')
                </div>
                <footer  class ="mt-5" style="padding: 60px 0;  width:100%;background-color: black">

<!-- Triangles -->


<!--Content -->
<div class="container footer-g">
  <div class="row justify-content-center">
   
    <br>
    <div class="col-12 col-sm-6">
          
                   
      
      <br>
      <p class="text-white text-muted text-center  text-md-right " >
            <small>
              ©  {{ date('Y') }} Diabetes. 
            </small>
          </p>
</div>
   <!-- / .row -->
 
    
  </div> <!-- / .row -->
</div> <!-- / .container -->

</footer>
<script src="{{asset('js/all.js')}}"></script>

@yield('scripts')
</body>
</html>
                
              
                    