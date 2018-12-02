@extends('layouts.app')

@section('title', 'OFR | Application Research Project')

@section('content')

<div class="container mt-3">

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
                        <td>Research Project</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Research Project Type :</th>
                        <td>{{ $research->chapter_type }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Applying for :</th>
                        <td class="header-shape">{{ $research->applying_for }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Application Status :</th>
                        <td>{{ $research->pub_status }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Research Project Name :</th>
                        <td>{{ $research->project_name }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Status PI :</th>
                        <td>{{ $research->status_pi }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Funding Authority :</th>
                        <td>{{ $research->funding_authority }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Funding Amount :</th>
                        <td>{{ $research->funding_amount }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Date of Award :</th>
                        <td>{{ $research->date_of_award }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Status :</th>
                        <td>{{ $research->status }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Submitted at :</th>
                        <td>{{ $research->created_at}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>

        <!-- Author -->
        <div id="showAuthorDetials" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Applicant Info</h5>

                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th class="table-header-color col-sm-2">Name :</th>
                        <td>{{ $research->prefix }} {{ $research->first_name }} {{ $research->last_name }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Designation :</th>
                        <td>{{ $research->designation }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Department :</th>
                        <td>{{ $research->department }}</td>
                    </tr>

                    <tr>
                        <th class="table-header-color">Email :</th>
                        <td>{{ $research->email}}</td>
                    </tr>
                       
                </table>

            </div>

        </div>


        <div id="showReport" class="card-body">
     
            <div>

                <h5 class="text-light header-shape">Evaluation Report</h5>

                <table class="table table-bordered table-sm table-striped">
                    <tr>
                        <th class="table-header-color col-sm-2">Uploaded file :</th>
                        <td><a href="{{ asset('storage/research/'. $research->file_name) }}">Open the file!</a></td>
                    </tr>
                </table>

            </div>

        </div> 

    </div>

    @if( $research->pub_status == 'Pending' and Auth::user()->is_admin)
        <div class="text-center mt-3 mb-5">
            
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectClaim">Reject the Application</button>
        </div>
    @endif


    <div class="card-deck mt-5 text-center">

        <div class="card shadow-lg bg-transparent">
            
            <div class="card-header bg-dark border-danger text-light ">Cash Rewards</div>

            <div class="card-body">
              
                <input id="get-cash-rewards" class="text-center" type="number" name="cashReward" value="{{ $research->cash_rewards }}" {{ ($research->pub_status == 'Accepted')? 'readonly="readonly"' : '' }} {{ (Auth::user()->is_admin)? '' : 'readonly="readonly"' }} {{ ($research->pub_status == 'Rejected')? 'readonly="readonly"' : '' }}>

            </div>
        
        </div>

        <div class="card shadow-lg bg-transparent">

            <div class="card-header bg-dark border-danger text-light">Reward Points</div>
        
            <div class="card-body">
              
                <input id="get-reward-points" class="text-center" type="number" name="rewardPoint" value="{{ $research->reward_points }}" {{ ($research->pub_status == 'Accepted')? 'readonly="readonly"' : '' }} {{ (Auth::user()->is_admin)? '' : 'readonly="readonly"' }} {{ ($research->pub_status == 'Rejected')? 'readonly="readonly"' : '' }}>

            </div>
        
        </div>

        <div class="card shadow-lg bg-transparent">

            <div class="card-header bg-dark border-danger text-light ">Remarks</div>
        
            <div class="card-body">
                
                <textarea id="get-remarks" class="text-center" type="text" value="{{ $research->remarks }}" {{ ($research->pub_status == 'Accepted')? 'readonly="readonly"' : '' }} {{ (Auth::user()->is_admin)? '' : 'readonly="readonly"' }} {{ ($research->pub_status == 'Rejected')? 'readonly="readonly"' : '' }}>{{ $research->remarks }}</textarea>

            </div>
        
        </div>
      
    </div>

    @if( $research->pub_status == 'Pending' and Auth::user()->is_admin )
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

                <form method="POST" action="{{ url('user/' . $research->email) }}">

                    @csrf
                    {{ method_field('PATCH') }}
                    
                    <div id="" class="">

                        <input style="display: none;" name="research_ID" type="number" class="form-control" readonly="readonly" value="{{ $research->id }}">
 
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
                                <textarea id="set-remarks" name="remarks" type="text" class="form-control" readonly="readonly"></textarea>
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

                <form method="POST" action="{{ url('publication/researches/' . $research->email) }}">

                    @csrf
                    {{ method_field('PATCH') }}
                    
                    <div id="" class="">

                        <input style="display: none;" name="reject_research_ID" type="number" class="form-control" readonly="readonly" value="{{ $research->id }}">

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