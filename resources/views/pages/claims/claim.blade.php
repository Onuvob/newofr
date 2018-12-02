@extends('layouts.app')

@section('title', 'OFR | Claim')

@section('content')
<div class="container">
    
	<div class="row mt-5 mb-5">
		<div class="col-md-8 mx-auto">
		    <div class="card shadow animated fadeInUp bg-transparent">

		    	<h2 class="card-header bg-info text-light text-center shadow">Claim</h2>
		        
		        <div class="card-body">

		          	<form>

		          		<!-- Header -->
		          		@include('layouts.claimform.headerform')


		          		<!-- Journal -->
		          		@include('layouts.claimform.journalform')


		          		<!-- Conference -->
		          		@include('layouts.claimform.conferenceform')


		          		<!-- Book -->
		          		@include('layouts.claimform.bookform')


		          		<!-- Book Chapter -->
		          		@include('layouts.claimform.bookchapterform')


		          		<!-- Research -->
		          		@include('layouts.claimform.researchform')


		          	</form> 
		          

		        </div>

		    </div>
	    </div>
	</div>

	@include('layouts.claimformmodal.journalmodal')
	@include('layouts.claimformmodal.conferencemodal')
	@include('layouts.claimformmodal.bookmodal')
	@include('layouts.claimformmodal.bookchaptermodal')
	@include('layouts.claimformmodal.researchmodal')


</div>
<script type="text/javascript" src="{{ URL::asset('/js/claim.js') }}"></script>
@endsection















