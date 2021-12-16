@extends('layouts.reporter')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="com-md-4">
                <h3 class="heading"><b>News Index</b> <small> - {{Event::count()}} Total News</small></h3>
            </div>
            <div class="col-md-4">
                {{Form::open(['route'=>'reporters.news_search', 'method'=>'POST'])}}
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
                @forelse($news as $key => $news)
                <tr>
                    <td> {{$key+1}} </td>
                    <td> {{$news->id}}</td> 
                    <td> {{$news->title}} </td>
                    <td> {!!Str::limit($news->body, 100, $end='...')!!} </td>
                    <td>
                        @if($news->category_id != 'null') 
                            {{$news->category->title}}
                        @else 
                         No News
                        @endif
                    </td>
                    <td> {{$news->created_at->diffForHumans()}} </td>
                    <td>
                        <a href="/reporter/news/{{$news->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                        <a href="/reporter/news/{{$news->id}}/edit" class="btn btn-success"><i class="fa fa-check"></i></a>
                        
                        {{Form::open(['route' => ['reporters.news_delete', $news->id], 'method'=>'DELETE', 'style' => 'display:inline;'])}}
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
      
    </div>
    
</body>

@endsection
