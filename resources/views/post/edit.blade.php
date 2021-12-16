@extends('layouts.admindb')
@section('content') 
 
<body> 
    <div class="container">
        {{Form::open(['route' => ['post.update', $event->id], 'method'=>'POST' ,  'enctype' => 'multipart/form-data'])}} 
            @csrf
            {{method_field('PUT')}}
            <div class="from-group">
                <input type="text" name="title" value="{{$event->title}}" class="form-control" placeholder="Enter the Title">
            </div>
            <br>
            <div class="from-group">
                <textarea name="body" id="ckview" class="form-control" placeholder="Enter the Body">
                    {{$event->body}}
                </textarea> 
            </div>  
            
        <br>
        <div class="form-group">
            <select name="category_id" class="form-control">
                <option value="{{$event->category_id}}">Current Category: </option>
                
                
            </select>
        </div><br>
            <br>
            <div class="from-group">
                <input type="file" name="image" class="form-control">
            </div>
            <br>
            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}

    </div>
</body>
@endsection
