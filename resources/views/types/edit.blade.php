@extends('layouts.admindb')
@section('content') 
 
<body> 
    <div class="container">
        {{Form::open(['route' => ['types.update', $Category->id], 'method'=>'POST' ,  'enctype' => 'multipart/form-data'])}} 
            @csrf
            {{method_field('PUT')}}
            <div class="from-group">
                <input type="text" name="title" value="{{$Category->title}}" class="form-control" placeholder="Enter the Title">
            </div>
            <br>
            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}

    </div>
</body>
@endsection
