

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
	{{$error}}	
</div>
@endforeach
@endif

@if(session('success'))
<div class="container">	
<div class="alert alert-success">
	{{session('success')}}	
</div>
</div>
@endif

@if(session('warning'))
<div class="container">	
<div class="alert alert-warning">
	{{session('warning')}}	
</div>
</div>
@endif

@if(session('error'))
<div class="container">
<div class="alert alert-danger">
	{{session('error')}}	
</div>
</div>
@endif