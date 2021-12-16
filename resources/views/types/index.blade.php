@extends('layouts.admindb')
@section('content')
 

<body>
    <div class="container">
        <h3 class="heading">Category Index</h3>

        <table class="table table-striped table-border table-hover">
            <thead>
                <tr> 
                    <th>Serial</th> 
                    <th>id</th>
                    <th>Title</th> 
                    <th>Inserted</th>
                    <th>Option</th> 
                </tr>
            </thead>
            <tbody>
                @forelse($types as $key => $types)
                <tr>
                    <td> {{$key+1}} </td>
                    <td> {{$types->id}}</td>
                    <td> {{$types->title}} </td>
                    <td> {{$types->created_at->diffForHumans()}} </td>
                    <td>
                        <a href="/types/{{$types->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="/types/{{$types->id}}/edit" class="btn btn-success"><i class="fa fa-check"></i></a>

                        {{Form::open(['route' => ['category_delete', $types->id], 'method'=>'DELETE', 'style' => 'display:inline;'])}}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>                 
                        </button>
                    {{Form::close()}}
                                                
                    </td>
                </tr>
                @empty 
                <tr>
                    <td colspan="6">
                        No Data
                    </td>
                </tr>
                @endforelse
            </tbody>  
        </table>
    </div>
    
</body>

@endsection