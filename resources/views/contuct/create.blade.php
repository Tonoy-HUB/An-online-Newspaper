@extends('layouts.user')
@section('content')

<body> 
    <div class="container">
        {{Form::open(['route'=>'contuct_store','method'=>'POST' ,  'enctype' => 'multipart/form-data'])}}

            @csrf 
            <div class="from-group">
                <input type="text" name="name" class="form-control" placeholder="Enter the Name">
            </div>
            <br>
            <div class="from-group">
                <input type="text" name="email" class="form-control" placeholder="Enter the Email">
            </div>
            <br>
            <div class="from-group">
                <input type="number" name="number" class="form-control" placeholder="Enter the Number">
            </div>
            <br>
            <div class="from-group">
                <input type="text" name="subject" class="form-control" placeholder="Enter the Subject">
            </div>
            <br>
            <div class="from-group">
                <textarea name="message" class="form-control" id="ckview" placeholder="Enter the Message"></textarea>
            </div>
            <br>          
            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}
    </div>
</body>
@endsection
