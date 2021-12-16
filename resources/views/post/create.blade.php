@extends('layouts.admindb')
@section('content')

<body> 
    <div class="container">
        <h3 class="heading"><b>Create News</b></h3>

        {{Form::open(['route'=>'store', 'method'=>'POST' ,  'enctype' => 'multipart/form-data'])}}

            @csrf
            <div class="from-group">
                <input type="text" name="title" class="form-control" placeholder="Enter the Title">
            </div><br> 
            <div class="from-group">
                <textarea name="body" class="form-control" id="ckview" placeholder="Enter the BODY"></textarea>
            </div>
            <br>
            <div class="from-group">
                <select name="category_id" class="form-control">
                    <option value="null">Choose News Type</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>

                    @endforeach
                </select>
            </div>
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
