@extends('layouts.admindb')
@section('content')

<body>
    <div class="container">
        <div class="card"> 
            <div class="card-header">
             <p><h4> {{$types->title}} </h4></p>
             <p><h6>{{$types->created_at->diffForHumans()}}</h6></p>

            </div>
        </div>
    </div>
</body>
@endsection

