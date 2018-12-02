@extends('layouts.app')

@section('title', 'OFR | Research Grant')

@section('content')

<div class="container">
    
	<div class="row mt-5 mb-5">

		<div class="col-md-10 mx-auto">

		    <div class="card shadow animated fadeInUp bg-transparent">

		    	<h2 class="card-header bg-info text-light text-center shadow">Submission of Research Intent</h2>
		        
		        <div class="card-body">

		          	<form>

		          		@csrf
		          		<!-- Header -->
		          		@include('layouts.researchgrant.researchgrantheader')


		          		<!-- Co-Investor form -->
		          		@include('layouts.researchgrant.coinvestigatorform')

		          		<!-- Research Proposal form -->
		          		@include('layouts.researchgrant.researchproposal')

		          		<!-- Research Outcome form -->
		          		@include('layouts.researchgrant.researchoutcome')

		          		<div class="row justify-content-center">
                                  
                            <button onclick="getResGrantForm()" type="button" class="btn btn-info" data-toggle="modal" data-target="#resgrant-modal">Submit</button>

                        </div>


		          	</form> 
		          

		        </div>

		    </div>

	    </div>

	</div>

	@include('layouts.researchgrant.resgrantmodal.resgrantmodal')

</div>

<script type="text/javascript" src="{{ URL::asset('/js/researchgrant.js') }}"></script>

@endsection