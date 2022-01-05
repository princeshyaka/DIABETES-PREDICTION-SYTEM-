<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diabetes</title>
  
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
              
                    
                    
        
                      @guest
                      <ul class="navbar-nav  d-none d-md-flex">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                     
                      
                
                     
                     
                    </ul>
                  @else
              
                    <div class="dropdown">
                
                      <!-- Toggle -->
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->email }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{route('doctor.profile')}}" class="dropdown-item">profile</a>
                    
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
                 
                   @endguest
                  </div>

                  <div class="navbar-collapse mr-auto order-lg-first collapse" id="navbar" >
        
                    <!-- Form -->
                    
        
                    <!-- Navigation -->
                    <ul class="navbar-nav mr-auto">
                      @auth
                          
                    
                      
                      
                      
                      
                     
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="topnavDashboards" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Test
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="topnavDashboards">

                            <li>
                            <a class="dropdown-item " href="{{route('examination.index')}}">
                                Overview
                              </a>
                            </li>
                           
                            <li>
                                <a class="dropdown-item " href="{{route('new.exam')}}">
                                New Test
                                </a>
                              </li>
                           
                          </ul>
                        </li>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle " href="#" id="topnavClient" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Patient
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="topnavClient">
                            <li>
                              <a class="dropdown-item " href="{{route('patient.index')}}">
                                Overview
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item " href="{{route('patient.create')}}">
                                create
                              </a>
                            </li>
            
                               
                          </ul>
                        </li>
                       
                              @endauth
                              @guest
                              <li class="nav-item d-md-none">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                             
                              @endguest
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
          
                   
      <!-- Links -->
    
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
                
              
                    