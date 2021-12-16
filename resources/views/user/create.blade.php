@extends('layouts.admindb')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3 class="heading">Create New User</h3>
        </div>
    </div>
    <div class="card-body">
        {{Form::open(['route'=>'user_store', 'method'=>'POST'])}}

        <div class="form-group">
            <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
        </div><br>
        <div class="form-group">
            <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
        </div><br>
        <div class="form-group">
            <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
        </div><br>

        <div class="form-group">
            <select name="role_id" class="form-control">
                <option value="null">Choose User Role</option>
                @forelse($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @empty 
                <option value="null">No User Role Available</option>
                @endforelse
            </select>
        </div><br>

        <input type="submit" value="Save" class="btn btn-primary" style="width: 100%">
        {{Form::close()}}
    </div>
</body>

@endsection