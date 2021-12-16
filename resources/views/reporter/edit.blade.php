@extends('layouts.admindb')
@section('content') 
 
<body> 
    <div class="container">
        {{Form::open(['route'=>['reporter_update', $reporter->id], 'method'=>'POST'])}}
        {{method_field('PUT')}}
            <div class="from-group">
                <input type="text" name="name" value="{{$reporter->name}}" class="form-control" placeholder="Enter the Name">
            </div>
            <br>
            <div class="from-group">
                <input type="email" name="email" value="{{$reporter->email}}" class="form-control" placeholder="Enter the Email">
            </div><br>
           

            <div class="form-group">
                <select name="role_id" class="form-control">
                    <option value="{{$reporter->role_id}}">Current User Role: 
                                    @if($reporter->role_id == 1)
                                        <span>Admin</span>
                                    @elseif($reporter->role_id == 3)
                                        <span>Reporter</span>
                                    @elseif($reporter->role_id == 2)
                                        <span>User</span>
                                    @else
                                        <span>No Role</span>
                                    @endif
                    </option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                    <option value="3">Reporter</option>
                </select>
            </div><br>

            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}

    </div>
</body>
@endsection
