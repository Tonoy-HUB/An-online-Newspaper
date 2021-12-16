@extends('layouts.admindb')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="com-md-4">
                <h3 class="heading"><b>News Index</b> <small> - {{Event::count()}} Total News</small></h3>
            </div>
            <div class="col-md-4">
                {{Form::open(['route'=>'admin.event_search', 'method'=>'POST'])}}
                <input type="text" name="search" placeholder="searching keyword" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
                {{Form::close()}}

            </div>
        </div>
        <table class="table table-striped table-border table-hover">
            <thead> 
                <tr>
                    <th>Serial</th> 
                    <th>id</th>
                    <th>Title</th> 
                    <th>Body</th> 
                    <th>Type</th> 
                    <th>Inserted</th>
                    <th>Option</th>  
                </tr> 
            </thead>
            <tbody>
                @forelse($posts as $key => $post)
                <tr>
                    <td> {{$key+1}} </td>
                    <td> {{$post->id}}</td> 
                    <td> {{$post->title}} </td>
                    <td> {!!Str::limit($post->body, 100, $end='...')!!} </td>
                    <td>
                        @if($post->category_id != 'null') 
                            {{$post->category->title}}
                        @else 
                         No Type
                        @endif
                    </td>
                    <td> {{$post->created_at->diffForHumans()}} </td>
                    <td>
                        <a href="/event/{{$post->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                        <a href="/post/{{$post->id}}/edit" class="btn btn-success"><i class="fa fa-check"></i></a>
                        
                        {{Form::open(['route' => ['event_delete', $post->id], 'method'=>'DELETE', 'style' => 'display:inline;'])}}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>                 
                        </button>
                    {{Form::close()}}
                          
                    </td>

                </tr>
                @empty 
                <tr>
                    <td colspan="6">
                        No News
                    </td>
                </tr>
                @endforelse
            </tbody> 

        </table>
        {{$posts->links()}}
    </div>
    
</body>

@endsection
