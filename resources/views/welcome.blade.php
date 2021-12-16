@extends('layouts.home')
@section('content')
<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset="utf-8">
        <title>STNEWS</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">
        <link href="img/favicon.ico" rel="icon">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('/css/user/slick.css')}}" rel="stylesheet" />
        <link href="{{asset('/css/user/slick-theme.css')}}" rel="stylesheet" />
        <link href="{{asset('/css/user/style.css')}}" rel="stylesheet" />
        <style>
            #featured{
                overflow: scroll;
                height: 400px;
            }
            #popular{
                overflow: scroll;
                height: 400px;
            }
            #m-viewed{
                overflow: scroll;
                height: 400px; 
            }
            .mn-list{
                overflow: scroll;
                height: 400px; 
            }
        </style>
    </head>
    <body>       
        <div class="container">
            <div class="show_text "> 
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5" vspace="2px">
                <B style="color:#e40909;">Breaking News:</B>Another 140 dengue patients were admitted to the hospital  ->Raida Paribahan agrees to hire half of the students
                </marquee>
            </div>
       </div>

        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            @foreach($latest as $item)
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="tn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-md-6 tn-right">
                        <div class="row">
                            @foreach($breaking as $item)
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="tn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">                        
                        <h2>Sports</h2>
                        <div class="row cn-slider">
                            @foreach($sports as $item)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="cn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                         
                        </div
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Technology</h2>
                        <div class="row cn-slider">
                            @foreach($technology as $item)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="cn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Business</h2>
                        <div class="row cn-slider">
                            @foreach($business as $item)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="cn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                         
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Entertainment</h2>
                        <div class="row cn-slider">
                            @foreach($entertainments as $item)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="cn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">Featured News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#popular">Most Views </a>
                            </li>                           
                        </ul>
                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
                                @foreach($featured as $item)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                                @endforeach                         
                            </div>
                            <div id="popular" class="container tab-pane fade">
                                @foreach($popular as $item)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div> 
                                @endforeach                             
                            </div>                 
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#m-viewed">International Market Rate
                                </a>
                            </li>                         
                        </ul>
                        <div class="tab-content">
                            <div id="m-viewed" class="container tab-pane active">
                                @foreach($market_rate as $item)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div> 
                                @endforeach                                                      
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab News Start-->

        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Horoscope</h2>
                        <div class="row cn-slider">
                            @foreach($horoscope as $item)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="cn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                         
                        </div>
                    </div>



                    <div class="col-md-6">
                        <h2>Today in History</h2>
                        <div class="row cn-slider">
                            @foreach($history as $item)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="cn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                         
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <h2>Lifestyle</h2>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach($lifestyle as $item)
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="images/events/{{$item->image}}" style="height: 100%;" />
                                    <div class="mn-title">
                                        <a href="/article/{{$item->id}}"> {{$item->title}} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach                                                                           
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>Read More</h2>
                            <ul>
                                <li><a href="">Municipal executive engineer jailed in ACC case</a></li>
                                <li><a href="">The court will be opened in physical presence</a></li>
                                <li><a href="">Shakil used to say I can't breathe in my house: Dr. Grass</a></li>
                                <li><a href="">Duis semper sapien in eros euismod sodales</a></li>
                                <li><a href="">Vestibulum cursus lorem nibh</a></li>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/css/user/easing.min.js')}}"></script>
        <script src="{{asset('/css/user/slick.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('/css/user/main.js')}}"></script>
    </body>
</html>
@endsection
