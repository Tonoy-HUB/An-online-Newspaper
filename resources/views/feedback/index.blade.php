@extends('layouts.user')
@section('content')
<body>
    <div class="container">
        <div class="card-header">
        </div>
        
        <table class="table table-striped table-border table-hover">
            <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($feedback as $key => $feedback)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$feedback->name}} </td>
                        <td> {{$feedback->email}} </td>
                        <td> {{$feedback->phone}} </td>
                        <td>
                            <a href="/feedback/{{$feedback->id}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            {{Form::open(['method'=>'DELETE', 'route'=>['feedback_delete',$feedback->id],'style'=>'display:inline;']) }}
                            <button type="submit" style="display:inline;" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            {{Form::close()}}
                        </td>
                    </tr>
                    @empty
                    <tr class="table-warning">
                        <td colspan="6">
                            <center><h4><b>Coming Soon</b></h4></center>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        
    </div>
</body>


@endsection