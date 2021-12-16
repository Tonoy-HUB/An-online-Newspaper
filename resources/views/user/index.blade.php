@extends('layouts.admindb')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
                <a href="/user/create"></a>

            <h3>User Index</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>DB ID</th>
                        <th>User Name</th>
                        <th>User Role</th>
                        <th>First Login</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$user->id}} </td>
                            <td> {{$user->name}} </td>
                            <td>
                                @if($user->role_id != '')
                                 {{$user->role->name}} 
                                 @else New User
                                @endif
                            </td>
                            <td> {{$user->created_at}} </td>
                            <td>
                                <a href="/user/{{$user->id}}/edit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="/user/{{$user->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>

                                {{Form::open(['route' => ['user_delete', $user->id], 'method'=>'DELETE', 'style' => 'display:inline;'])}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>                 
                                </button>
                            {{Form::close()}}
                                
                            </td>
                        </tr>
                    @empty 
                        <tr class="text-center">
                            <td colspan="6">No Data</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
            <br>
            {{$users->links()}}
        </div>
    </div>
</body>
@endsection