@extends('layouts.reporter')
@section('content')

<body>
    <div class="container"> 
        <div class="card">
            <div class="card-header">
                <p><h4> {{$news->title}} </h4></p>
            </div>
            <div class="card-body">
                <p><h5> {!!$news->body!!} </h5></p>
                <p><h6>{{$news->created_at->diffForHumans()}}</h6></p>
                <br>
                <img src="{{asset('images/'.$news->image)}}" style="width:40%;" alt="No_Image">
            </div>
        </div>
    </div>
</body>
@endsection

