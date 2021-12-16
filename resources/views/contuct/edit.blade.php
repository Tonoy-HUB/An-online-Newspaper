@extends('layouts.user')
@section('content') 
 
<body> 
    <div class="container">
        {{Form::open(['route' => ['contuct.update', $contuct->id], 'method'=>'POST' ,  'enctype' => 'multipart/form-data'])}} 
            @csrf
            {{method_field('PUT')}}
            <div class="from-group">
                <input type="text" name="name" value="{{$contuct->name}}" class="form-control" placeholder="Enter the Name">
            </div>
            <br>
            <div class="from-group">
                <input type="text" name="email" value="{{$contuct->email}}" class="form-control" placeholder="Enter the Email">
            </div><br>
            <div class="from-group">
                <input type="text" name="number" value="{{$contuct->number}}" class="form-control" placeholder="Enter the Number">
            </div><br>
            <div class="from-group">
                <input type="text" name="subject" value="{{$contuct->subject}}" class="form-control" placeholder="Enter the Subject">
            </div><br>

            <div class="from-group">
                <textarea name="message" id="ckview" class="form-control" placeholder="Message">
                    {{$contuct->message}}
                </textarea> 
            </div> 
            <br>
            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}

    </div>
</body>
@endsection
