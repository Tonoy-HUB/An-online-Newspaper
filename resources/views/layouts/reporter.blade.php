<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporter Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('/css/admin/bootstrap.css')}}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('/css/admin/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- MORRIS CHART STYLES-->
    <link href="{{asset('/css/admin/morris-0.4.3.min.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('/css/admin/custom.css')}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style> 
       .fa{
           margin-left: 5px;
       }
       .heading{
           margin-left: 1.5rem;
           background: #202020;
           color:antiquewhite;
           padding: 1em;
       }
   </style>
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/home">Reporter Panel</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> First Login : {{Auth::user()->created_at->diffForHumans()}} &nbsp; 
<a href="{{ route('logout') }}" class="btn btn-danger square-btn-adjust" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">Logout
</a> 
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>


</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="images/white_logo.png" class="user-image img-responsive"/>
                        </li>

                    @if(Auth::user()->role->status != true)
                    
                    <li>
                        <a href="#">You are blocked</a>
                    </li>
                    @else
                    <li>
                        <a class="{{ Route::is('admin') ? 'active-menu' : '' }}" href="/admin/home"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>


                    <li>
                        <a class="{{ Route::is('') ? 'active-menu' : '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> News<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/reporter/news/create">
                                    <i class="fa fa-plus"></i> Add News
                                </a>
                            </li>
                            <li>
                                <a href="/reporter/news">  
                                    <i class="fa fa-check"></i> Manage News
                                </a>
                            </li>
                        </ul>
                      </li>
                  <li>
                        <a href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>
                    @endif	
                </ul>
               
            </div>
            
        </nav>                 
        </div>
        
            <div style="margin-left: 18em;">
                @yield('content')
            </div>
        
       
  
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('js/admin/jquery-1.10.2.js')}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('js/admin/jquery.metisMenu.js')}}"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="{{asset('js/admin/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('js/admin/morris.js')}}"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('js/admin/custom.js')}}"></script>




    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <script>
      var ckview = document.getElementById("ckview");
       CKEDITOR.replace(ckview,{
         language:'en-gb'
       });
    </script>
    
    
</body>
</html>