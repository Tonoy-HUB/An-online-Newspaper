@extends('layouts.admindb')
@section('content')

<body>
    <div class="container"> 
        <div class="card">
            <div class="card-header">
             <p><h4> {{$post->title}} </h4></p>
            </div>
            <div class="card-body">
                <p><h5> {!!$post->body!!} </h5></p>
                <p><h6>{{$post->created_at->diffForHumans()}}</h6></p>
                <br>
                <img src="{{asset('images/'.$post->image)}}" style="width:40%;" alt="No_Image">
            </div>
        </div>
    </div>
</body>
@endsection

