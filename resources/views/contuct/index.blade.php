@extends('layouts.user')
@section('content')
 

<body>
    <div class="container">
        <a href="/contuct/create" class="btn btn-primary">Add</a>
        <table class="table table-striped table-border table-hover">
            <thead>
                <tr> 
                    <th>Serial</th> 
                    <th>id</th>
                    <th>Name</th> 
                    <th>Email</th> 
                    <th>Number</th> 
                    <th>Subject</th> 
                    <th>Message</th> 
                    <th>Inserted</th>
                    <th>Option</th> 
                </tr>
            </thead>
            <tbody>
                @forelse($contuct as $key => $contuct)
                <tr> 
                    <td> {{$key+1}} </td>
                    <td> {{$contuct->id}}</td>
                    <td> {{$contuct->name}} </td>
                    <td> {{$contuct->email}} </td>
                    <td> {{$contuct->number}} </td>
                    <td> {{$contuct->subject}} </td>
                    <td> {!!$contuct->message!!} </td>
                    <td> {{$contuct->created_at->diffForHumans()}} </td>
                    <td>
                        <a href="/contuct/{{$contuct->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="/contuct/{{$contuct->id}}/edit" class="btn btn-success"><i class="fa fa-check"></i></a>

                        {{Form::open(['route' => ['contuct_delete', $contuct->id], 'method'=>'DELETE', 'style' => 'display:inline;'])}}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>                 
                        </button>
                    {{Form::close()}}
                                                
                    </td>
                </tr>
                @empty 
                <tr>
                    <td colspan="6">
                        <center>No Data</center>
                    </td>
                </tr>
                @endforelse
            </tbody>  
        </table>
    </div>
    
</body>

@endsection