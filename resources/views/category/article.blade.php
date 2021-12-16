@extends('layouts.home')
@section('content')

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>STNEWS</title>
<link href="{{asset('/css/category/article/styles.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Germania+One|Open+Sans:400,400i,700,700i|Roboto+Condensed:400,700&display=swap" rel="stylesheet">
</head>
<style>
    p{
        text-align: justify;
    }
</style>
<body>
	
	<div class="main-body-article">
		<h3 class="headline"> {{$event->title}} </h3>
		
		<img src="{{asset('images/events/'.$event->image)}}" class="article-photo" >
		<p class="caption">

        </p>
		
		<div class="article-text">
		
			<p class="bold"><a class="red" href="mailto:">@if($event->user_id != 0){{$event->user->name}}@endif</a> | @if($event->user_id != 0){{$event->user->role->name}} @endif | {{$event->created_at->diffForHumans()}} | {{date('F d, Y', strtotime($event->created_at))}} </p>
						
			<br>
		
			<article>
				{!!$event->body!!}
			</article>
				
		</div>
		</div>
</body>
</html>
@endsection

