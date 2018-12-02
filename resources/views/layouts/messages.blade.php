@if(session('success'))

<div class="alert alert-success fade-away text-center col-md-8 mx-auto">
	{{session('success')}}
</div>

@endif