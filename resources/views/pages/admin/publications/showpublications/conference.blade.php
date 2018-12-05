@extends('layouts.app')

@section('title', 'OFR | Application Conference')

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
            <h5 class="text-light">Applied Claim</h5>
        </div>
        <div id="showAppDetails" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Application Details</h5>

                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th class="table-header-color col-sm-2">Application Type :</th>
                        <td>Conference</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Conferece Type :</th>
                        <td>{{ $conference->conference_type}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Applying for :</th>
                        <td class="header-shape">{{ $conference->applying_for }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Application Status :</th>
                        <td>{{ $conference->pub_status}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Article Title :</th>
                        <td>{{ $conference->article_title}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">List of Authors :</th>
                        <td>{{ $conference->list_of_authors}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Name of conference :</th>
                        <td>{{ $conference->name_of_conference}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Venue :</th>
                        <td>{{ $conference->venue}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">ISBN/ISSN :</th>
                        <td>{{ $conference->isbn}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">DOI :</th>
                        <td>{{ $conference->doi}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Submitted at :</th>
                        <td>{{ $conference->created_at}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>

        <!-- Author -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Author Info</h5>

                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th class="table-header-color col-sm-2">Name :</th>
                        <td>{{ $conference->prefix }} {{ $conference->first_name }} {{ $conference->last_name }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Designation :</th>
                        <td>{{ $conference->designation }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Department :</th>
                        <td>{{ $conference->department }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Email :</th>
                        <td>{{ $conference->email}}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Another Authors :</th>
                        <td>{{ $conference->list_of_authors}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>

        <!--Other Author -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Other Authors Info</h5>

                <table class="table table-bordered table-sm table-striped">

                    @foreach($coUsers as $num => $author)

                        <thead class="thead-dark text-center">
                    
                            <tr>
                                <th>Co-Author {{ $num+1 }}</th>
                            </tr>
                                
                        </thead>
                    
                        <tr>
                            <th class="table-header-color col-sm-2">Name :</th>
                            <td>{{ $author['first_name'] }} {{ $author['last_name'] }}</td>
                        </tr>

                        <tr>
                            <th class="table-header-color">Email :</th>
                            <td>{{ $author['email'] }}</td>
                        </tr>

                    @endforeach
                    
                       
                </table>

            </div>

        </div>



        <div id="showReport" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Evaluation Report</h5>

                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th class="table-header-color col-sm-2">Uploaded file :</th>
                        <td><a href="{{ asset('storage/conference/'. $conference->file_name) }}">Open the file!</a></td>
                    </tr>
                </table>

            </div>

        </div> 

    </div>


    @if( $conference->pub_status == 'Pending' and Auth::user()->is_admin)
        <div class="text-center mt-3 mb-5">
            
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectClaim">Reject the Application</button>
        </div>
    @endif

    

    <div class="card-deck mt-5 text-center">

        <div class="card shadow-lg bg-transparent">
            
            <div class="card-header bg-dark border-danger text-light ">Cash Rewards</div>

            <div class="card-body">
              
                <input id="get-cash-rewards" class="text-center" type="number" name="cashReward" value="{{ $conference->cash_rewards }}" {{ ($conference->pub_status == 'Accepted')? 'readonly="readonly"' : '' }} {{ (Auth::user()->is_admin)? '' : 'readonly="readonly"' }} {{ ($conference->pub_status == 'Rejected')? 'readonly="readonly"' : '' }}>

            </div>
        
        </div>

        <div class="card shadow-lg bg-transparent">

            <div class="card-header bg-dark border-danger text-light">Reward Points</div>
        
            <div class="card-body">
              
                <input id="get-reward-points" class="text-center" type="number" name="rewardPoint" value="{{ $conference->reward_points }}" {{ ($conference->pub_status == 'Accepted')? 'readonly="readonly"' : '' }} {{ (Auth::user()->is_admin)? '' : 'readonly="readonly"' }} {{ ($conference->pub_status == 'Rejected')? 'readonly="readonly"' : '' }}>

            </div>
        
        </div>

        <div class="card shadow-lg bg-transparent">

            <div class="card-header bg-dark border-danger text-light ">Remarks</div>
        
            <div class="card-body">

                <textarea id="get-remarks" class="text-center" type="text" value="{{ $conference->remarks }}" {{ ($conference->pub_status == 'Accepted')? 'readonly="readonly"' : '' }} {{ (Auth::user()->is_admin)? '' : 'readonly="readonly"' }} {{ ($conference->pub_status == 'Rejected')? 'readonly="readonly"' : '' }}>{{ $conference->remarks }}</textarea>

            </div>
        
        </div>
      
    </div>

    @if( $conference->pub_status == 'Pending' and Auth::user()->is_admin )
        <div class="text-center mt-3 mb-5">
            
            <button onclick="getRewards()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Accept & Submit</button>
        </div>
    @endif
            
</div>

<!-- Modal -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Reward Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('user/' . $conference->email) }}">

                    @csrf
                    {{ method_field('PATCH') }}
                    
                    <div id="" class="">

                        <input style="display: none;" name="conference_ID" type="number" class="form-control" readonly="readonly" value="{{ $conference->id }}">

                        <input style="display: none;" name="numCoAuthors" type="number" class="form-control" readonly="readonly" value="{{ $conference->list_of_authors }}">


                        @foreach($coUsers as $num => $author)
                    
                            <input style="display: none;" name="emailCoAuthors{{$num}}" type="text" class="form-control" readonly="readonly" value="{{ $author['email'] }}">

                        @endforeach
 
                        <div class="form-group row text-center">

                            <div class="col-sm-5">
                                <label>Cash Rewards</label>
                            </div>

                            <div class="col-sm-5">
                                <input id="set-cash-rewards" name="cashRewards" type="number" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group row text-center">

                            <div class="col-sm-5">
                                <label>Reward Points</label>
                            </div>

                            <div class="col-sm-5">
                                <input id="set-reward-points" name="rewardPoints" type="number" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group row text-center">

                            <div class="col-sm-5">
                                <label>Remarks</label>
                            </div>

                            <div class="col-sm-5">
                                <textarea id="set-remarks" name="remarks" type="number" class="form-control" readonly="readonly"></textarea>
                            </div>

                        </div>
                        
                        
                        <!-- Form Submit button -->
                        <div class="row justify-content-center">
                                  
                            <button type="submit" class="btn btn-info text-light">Submit</button>

                        </div>
                        <!--End Form Submit button-->

                    </div>
                    <!-- End Journal -->
                </form>

            </div>
      
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rejectClaim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Reject Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('publication/conferences/' . $conference->email) }}">

                    @csrf
                    {{ method_field('PATCH') }}
                    
                    <div id="" class="">

                        <input style="display: none;" name="reject_conference_ID" type="number" class="form-control" readonly="readonly" value="{{ $conference->id }}">

                        <!-- Form Submit button -->
                        <div class="row justify-content-center">
                                  
                            <button type="submit" class="btn btn-danger text-light">Reject</button>

                        </div>
                        <!--End Form Submit button-->

                    </div>
                    <!-- End Journal -->
                </form>

            </div>
      
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('/js/admin.js') }}"></script>

@endsection