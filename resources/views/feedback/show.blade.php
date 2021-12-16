@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    Created At: {{$feedback->created_at->diffForHumans()}}
                </div>
                <div class="col-sm-6">
                    Created At: {{$feedback->updated_at}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong>Name:</strong> {{$feedback->name}}
                    <br>
                    <strong>Email:</strong> {{$feedback->email}}
                    <br>
                    <strong>Phone:</strong> {{$feedback->phone}}
                    <br>
                </div>
                <div class="col-md-6">
                    <strong>Message:</strong><br>
                    {{$feedback->message}}
                </div>
            </div>
        </div>
    </div>
</body>



@endsection