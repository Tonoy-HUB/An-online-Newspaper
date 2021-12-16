@extends('layouts.home')
@section('content')
<head>
    <style>
        .heading{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-7">
                <h2 class="heading">{{$category->title}}</h2>
                <hr>

                @foreach($events as $event)
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('/images/events/'.$event->image)}}" alt="Image" style="width:100%;">
                    </div>
                    <div class="col-md-8">
                        <h5>
                            <a href="/article/{{$event->id}}" style="color:#212121;">
                                {{$event->title}}
                            </a>
                        </h5>
                        <a href="#">{{$event->user->name}}</a>
                        |
                        <a href="#">{{$event->created_at->diffForHumans()}}</a>
                        <p>
                            
                            
                            {!! Str::limit($event->body, 150, $end=".See more...") !!}
                        </p>

                    </div>
                </div>
                <hr>
                @endforeach
            </div>


            <div class="col-lg-4">
                <h2 class="heading">Tags</h2>
                <hr>
                @php($categories = Category::all())
                @foreach($categories as $category)
                    <a href="/categorya/{{$category->id}}" class="btn btn-outline-secondary" style="margin:.25em;">
                        {{$category->title}}
                    </a>                   
                @endforeach               
            </div>
        </div>
        {{$events->links()}}
    </div>
</body>
@endsection