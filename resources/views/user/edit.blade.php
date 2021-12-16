@extends('layouts.admindb')
@section('content') 
 
<body> 
    <div class="container">
        {{Form::open(['route'=>['user_update', $user->id], 'method'=>'POST'])}}
        {{method_field('PUT')}}
            <div class="from-group">
                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter the Name">
            </div>
            <br>
            <div class="from-group">
                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter the Email">
            </div><br>
           

            <div class="form-group">
                <select name="role_id" class="form-control">
                    <option value="{{$user->role_id}}">Current User Role: 
                                    @if($user->role_id == 1)
                                        <span>Admin</span>
                                    @else
                                        <span>Reporter</span>
                                
                                    @endif
                    </option>
                    <option value="1">Admin</option> 
                    <option value="0">Reporter</option>
                    <option value="2">User</option>
                </select>
            </div><br>

            <input type="submit" value="Save" class="btn btn-primary">
        {{Form::close()}}

    </div>
</body>
@endsection
