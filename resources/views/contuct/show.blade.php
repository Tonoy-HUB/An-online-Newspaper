@extends('layouts.user')
@section('content')

<body>
    <div class="container">
        <div class="card"> 
         <div class="card-header">
             <p><h4> {{$contuct->name}} </h4></p>
             <p><h5> {{$contuct->email}} </h5></p>
             <p><h5> {{$contuct->number}} </h5></p>
             <p><h5> {{$contuct->subject}} </h5></p>
             <p><h5> {!!$contuct->message!!} </h5></p>
             <p><h6>{{$contuct->created_at->diffForHumans()}}</h6></p>
         </div>
        </div>
    </div>
</body>
@endsection
