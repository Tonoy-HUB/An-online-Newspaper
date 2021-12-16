@extends('layouts.admindb')
@section('content')

<body>
    <div class="container">
        <div class="card"> 
            <div class="card-header">
             <p><h4> {{$user->name}} </h4></p>
             <p><h4> {{$user->email}} </h4></p>
             <p><h6>{{$user->created_at->diffForHumans()}}</h6></p>

            </div>
        </div>
    </div>
</body>
@endsection

