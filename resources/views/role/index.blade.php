@extends('layouts.admindb')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Roles Index</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>DB ID</th>
                        <th>Role Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $key => $role)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$role->id}} </td>
                            <td> {{$role->name}} </td>
                            <td>
                                @if($role->status == 1)
                                    <span style="color:rgb(89, 231, 45)">Active</span>
                                @else 
                                    <span style="color:rgb(231, 45, 107)">Disable</span>
                                @endif
                            </td>
                            <td> {{$role->created_at}} </td>
                            <td>
                                <a href="/role/{{$role->id}}/edit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                {{Form::open(['route'=>['role_disable', $role->id], 'method'=>'PUT', 'style'=>'display:inline;'])}}
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
            {{$roles->links()}}
        </div>
    </div>
</body>
@endsection