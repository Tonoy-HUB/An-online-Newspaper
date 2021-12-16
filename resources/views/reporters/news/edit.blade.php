@extends('layouts.reporter')
@section('content') 
 
<body> 
    <div class="container">
        {{Form::open(['route' => ['reporters.news_update', $news->id], 'method'=>'POST' ,  'enctype' => 'multipart/form-data'])}} 
            @csrf
            {{method_field('PUT')}}
            <div class="from-group">
                <input type="text" name="title" value="{{$news->title}}" class="form-control" placeholder="Enter the Title">
            </div>
            <br>
            <div class="from-group">
                <textarea name="body" id="ckview" class="form-control" placeholder="Enter the Body">
                    {{$news->body}}
                </textarea> 
            </div>  
            
        <br>
            <div class="from-group">
                <select name="category_id" class="form-control">
                    <option value="xyz">Choose News Type</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
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
