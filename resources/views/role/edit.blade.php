@extends('layouts.admindb')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3 class="heading">Edit User Role</h3>
        </div>
    </div>
    <div class="card-body">
        {{Form::open(['route'=>['role_update', $role->id], 'method'=>'POST'])}}
        {{method_field('PUT')}}

        <div class="form-group">
            <input type="text" name="name" value="{{$role->name}}" placeholder="Enter Name" class="form-control" required>
        </div><br>

        <div class="form-group">
            <select name="status" class="form-control">
                <option value="{{$role->status}}">Current Status: 
                                @if($role->status == 1)
                                    <span style="color:rgb(89, 231, 45)">Active</span>
                                @else 
                                    <span style="color:rgb(231, 45, 107)">Disable</span>
                                @endif
                </option>
                <option value="0">Disable</option>
                <option value="1">Active</option>
            </select>
        </div><br>

        <input type="submit" value="Save" class="btn btn-primary" style="width: 100%">
        {{FOrm::close()}}
    </div>
</body>

@endsection