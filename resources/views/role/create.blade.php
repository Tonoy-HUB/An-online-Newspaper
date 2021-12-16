@extends('layouts.admindb')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3 class="heading">Create New User Role</h3>
        </div>
    </div>
    <div class="card-body">
        {{Form::open(['route'=>'role_store', 'method'=>'POST'])}}

        <div class="form-group">
            <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
        </div><br>

        <div class="form-group">
            <select name="status" class="form-control">
                <option value="null">Choose Status</option>
                <option value="0">Disable</option>
                <option value="1">Active</option>
            </select>
        </div><br>

        <input type="submit" value="Save" class="btn btn-primary" style="width: 100%">
        {{FOrm::close()}}
    </div>
</body>
@endsection