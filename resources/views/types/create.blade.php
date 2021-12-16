@extends('layouts.admindb')
@section('content')

<body> 
    <div class="container">
        <h3 class="heading">Create Category</h3>

        {{Form::open(['route'=>'type_store', 'method'=>'POST' ,  'enctype' => 'multipart/form-data'])}}

            @csrf
            <div class="from-group">
                <input type="text" name="title" class="form-control" placeholder="Enter the Category">
            </div><br>
        
            <br>
            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}
    </div>
</body>
@endsection
