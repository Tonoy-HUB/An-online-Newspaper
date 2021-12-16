@extends('layouts.admindb')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
                <a href="/reporter/create"></a>

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
                    @forelse($reporters as $key => $reporter)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$reporter->id}} </td>
                            <td> {{$reporter->name}} </td>
                            <td>
                                @if($reporter->role_id != '')
                                 {{$reporter->role->name}} 
                                 @else New Reporter
                                @endif
                            </td>
                            <td> {{$reporter->created_at}} </td>
                            <td>
                                <a href="/reporter/{{$reporter->id}}/edit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                {{Form::open(['route' => ['reporter_delete', $reporter->id], 'method'=>'DELETE', 'style' => 'display:inline;'])}}
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
            {{$reporters->links()}}
        </div>
    </div>
</body>
@endsection