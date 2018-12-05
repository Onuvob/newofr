@extends('layouts.app')

@section('title', 'OFR | Research Grant Application')

@section('content')

<div class="container mt-3">

    @if( session('success') )

        <div class="row">

            <div class="mx-auto col-sm-8 alert alert-success">
                {{ session('success')}}
            </div>
            
        </div>


    @endif

	<div class="card shadow animated fadeIn bg-transparent">
        <div class="card-header bg-dark text-center">
            <h5 class="text-light">Applied Research Grant Application</h5>
        </div>
        <div id="showAppDetails" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Application Details</h5>

                <table class="table table-bordered table-sm table-striped">

                    <tr>
                        <th class="table-header-color col-sm-2">Application Id :</th>
                        <td>{{ $researchgrant->id }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color col-sm-2">Application Type :</th>
                        <td>Research Grant</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Research Topic :</th>
                        <td>{{ $researchgrant->topic}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Research Area :</th>
                        <td>{{ $researchgrant->area }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Application Status :</th>
                        <td>{{ $researchgrant->pub_status}}</td>
                    </tr>

                </table>

            </div>

        </div>

        <!-- Proposal Details -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Research Proposal Details</h5>

                <table class="table table-bordered table-sm table-striped">

                    <tr>
                        <th class="table-header-color col-sm-2">Introduction & Research Background :</th>
                        <td>{{ $researchgrant->intro_back}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Research Question(s) :</th>
                        <td>{{ $researchgrant->question}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Seminal Work(s)/Biblography :</th>
                        <td>{{ $researchgrant->biblography}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Proposed Methodology :</th>
                        <td>{{ $researchgrant->methodology}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>

        <!-- Expected Outcome -->
        @if( $researchgrant->jcp1_name )

        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Expected Outcome</h5>

                <table class="table table-bordered table-sm table-striped">

                    <thead class="thead-dark text-center">
                    
		                <tr>
		                    <th scope="col">Name of Journals/Conference Proceedings/ Publishers</th>
		                    <th scope="col">Indexed In (If Known and/or Applicable)</th>
		                </tr>
		                
		            </thead>

		            <tbody>
  
		                    <tr>
		                        <td class="text-center">{{ $researchgrant->jcp1_name}}</td>
		                        <td class="text-center">{{ $researchgrant->jcp1_index}}</td>
		                    </tr>

		                    @if( $researchgrant->jcp2_name )
		                    <tr>
		                        <td class="text-center">{{ $researchgrant->jcp2_name}}</td>
		                        <td class="text-center">{{ $researchgrant->jcp2_index}}</td>
		                    </tr>
		                    @endif

		                    @if( $researchgrant->jcp3_name )
		                    <tr>
		                        <td class="text-center">{{ $researchgrant->jcp3_name}}</td>
		                        <td class="text-center">{{ $researchgrant->jcp3_index}}</td>
		                    </tr>
		                    @endif

		            </tbody>
                       
                </table>

            </div>

        </div>
        @endif


        <!-- Proposal Details -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Research Cost</h5>

                <table class="table table-bordered table-sm table-striped">

                    <tr>
                        <th class="table-header-color col-sm-2">Tentative Budget :</th>
                        <td>{{ $researchgrant->tentative_budget}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>


        <!-- Collaboration -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Collaboration</h5>

                <table class="table table-bordered table-sm table-striped">

                    <tr>
                        <th class="table-header-color col-sm-5">Is the co-investigator(s) of the proposed research affiliated with a different institution? :</th>
                        <td>{{ $researchgrant->diff_institution}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Does this research project have any prospect to get additional support from sources other than ULAB Research Grant? If yes, please provide detail of this opportunity :</th>
                        <td>{{ $researchgrant->project_prospect}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>




        <!-- Author -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Primary Investigator</h5>

                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th class="table-header-color col-sm-2">Name :</th>
                        <td>{{ $researchgrant->prefix }} {{ $researchgrant->first_name }} {{ $researchgrant->last_name }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Designation :</th>
                        <td>{{ $researchgrant->designation }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Department :</th>
                        <td>{{ $researchgrant->department }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Email :</th>
                        <td>{{ $researchgrant->email}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Contact :</th>
                        <td>{{ $researchgrant->email}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Another Investigators :</th>
                        <td>{{ $researchgrant->list_of_inves }}</td>
                    </tr>

                    @if( $researchgrant->file_name != "NoFile" )
						<tr>
		                    <th class="table-header-color">Primary Investigator CV :</th>
		                    <td><a href="{{ asset('storage/primaryinvestigator/'. $researchgrant->file_name ) }}">Open the file!</a></td>
		                </tr>
					@endif
                       
                </table>

            </div>

        </div>

        <!--Other Author -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Other Investigators</h5>

                <table class="table table-bordered table-sm table-striped">

                    @foreach($coInves as $num => $coInv)
                    	
                    	@foreach($coInv as $co)

                    		<thead class="thead-dark text-center">
                    
				                <tr>
				                    <th>Co-Investigator {{ $num+1 }}</th>
				                </tr>
				                
				            </thead>

	                        <tr>
	                            <th class="table-header-color col-sm-2">Name :</th>
	                            <td>{{ $co->prefix }} {{ $co->first_name }} {{ $co->last_name }}</td>
	                        </tr>

	                        <tr>
	                            <th class="table-header-color">Designation :</th>
	                            <td>{{ $co->designation }}</td>
	                        </tr>

	                        <tr>
	                            <th class="table-header-color">Department :</th>
	                            <td>{{ $co->department }}</td>
	                        </tr>

	                        <tr>
	                            <th class="table-header-color">Status :</th>
	                            <td>{{ $co->status }}</td>
	                        </tr>

		                    @if( $co->status_specify )
						        <tr>
		                            <th class="table-header-color">Status Specify :</th>
		                            <td>{{ $co->status_specify }}</td>
		                        </tr>
						    @endif

						    @if( $coCV[$num]->file_name != "NoFile" )
						        <tr>
		                            <th class="table-header-color">CV :</th>
		                            <td><a href="{{ asset('storage/coinves/'. $coCV[$num]->file_name) }}">Open the file!</a></td>
		                        </tr>
						    @endif

						  
					    @endforeach



                    @endforeach
                    
                       
                </table>

            </div>

        </div>


        @if( Auth::user()->is_admin )

            <!--Reviewer -->
            <div id="showAuthorDetials" class="card-body">
         
                <div>

                    <h5 class="text-light header-shape">Reviewer Lists</h5>

                    <table class="table table-bordered table-sm table-striped">

                        @if( count($reviewerList) > 0)

                            @foreach($reviewerList as $num => $reviewer)

                                <thead class="thead-dark text-center">
                    
                                    <tr>
                                        <th>Reviewer {{ $num+1 }}</th>
                                    </tr>
                                        
                                </thead>

                                <tr>
                                    <th class="table-header-color col-sm-2">Email :</th>
                                    <td>{{ $reviewer->email }} </td>
                                </tr>
                                <tr>
                                    <th class="table-header-color col-sm-2">Review Status :</th>
                                    <td>{{ $reviewer->review_status }} </td>
                                </tr>
                                <tr>
                                    <th class="table-header-color col-sm-2">Report Status :</th>
                                    <td>{{ $reviewer->report_status }} </td>
                                </tr>

                                @if( $reviewer->file_name )
                                    <tr>
                                        <th class="table-header-color col-sm-2">Intent Evaluation Report :</th>
                                        <td><a href="{{ asset('storage/reviewerfile/submittedreport/'. $reviewer->file_name) }}">Open the file!</a></td>
                                    </tr>
                                @endif


                            @endforeach

                        @else
                            <h5 class="text-danger text-center"><b>No Reviewer Added</b></h5>

                        @endif
                    </table>

                </div>

            </div>


        @endif

    </div>



    @if( ($researchgrant->pub_status == 'Pending' or $researchgrant->pub_status == 'Reviewing') and Auth::user()->is_admin)

    	<div class="text-center mt-3 mb-5">
            
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addReviewer">Add Reviewer</button>

        </div>

    @endif


    @if( ($researchgrant->pub_status == 'Pending' or $researchgrant->pub_status == 'Reviewing') and Auth::user()->is_admin)

    	<div class="text-center mt-3 mb-5">
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#acceptResearch">Accept</button>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectResearch">Reject</button>
            
        </div>

    @endif
    
            
</div>


<!-- Modal -->
<div class="modal fade" id="addReviewer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Add Reviewer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

				<form method="POST" action="{{ url('sendmail') }}">
                    @csrf
				  	<div class="form-group">
				    	<label for="exampleInputEmail1">Email address</label>
				    	<input name="reviewerEmail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				  	</div>

                    <input style="display: none;" name="researchGrantId" type="text" class="form-control" readonly="readonly" value="{{ $researchgrant->id }}">

                    <div class="row justify-content-center">
                                  
                        <button type="submit" class="btn btn-info text-light">Send</button>

                    </div>

				</form>
                
            </div>
      
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="acceptResearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Accept Research Grant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

				<form method="POST" action="{{ url('ongoingresearch/' . $researchgrant->id) }}">

                    @csrf
                    {{ method_field('PATCH') }}

                    <input style="display: none;" name="researchAccept" type="text" class="form-control" readonly="readonly" value="Accept">
                    
                    <!-- Form Submit button -->
                    <div class="row justify-content-center">
                                  
                        <button type="submit" class="btn btn-info text-light">Accept</button>

                    </div>
                    <!--End Form Submit button-->
                </form>
                
            </div>
      
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="rejectResearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Reject Research Grant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

				<form method="POST" action="{{ url('ongoingresearch/' . $researchgrant->id) }}">

                    @csrf
                    {{ method_field('PATCH') }}

                    <input style="display: none;" name="researchReject" type="text" class="form-control" readonly="readonly" value="Reject">

				  	<!-- Form Submit button -->
                    <div class="row justify-content-center">
                                  
                        <button type="submit" class="btn btn-info text-light">Reject</button>

                    </div>
                    <!--End Form Submit button-->
				</form>
                
            </div>
      
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ URL::asset('/js/admin.js') }}"></script>
@endsection