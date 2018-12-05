@extends('layouts.app')

@section('title', 'OFR | Reviewer Reports')

@section('content')

<div class="container mt-3">


    @if( session('success') )

        <div class="row">

            <div class="mx-auto col-sm-8 alert alert-success">
                {{ session('success')}}
            </div>
            
        </div>


    @endif

	<h3 class="header-shape shadow animated fadeInLeft">Reviewer Reports Research Grants</h3>

    @if(count($reviewers) > 0)

        <table class="table table-hover table-bordered table-striped shadow-lg bg-transparent">

            <thead class="thead-dark text-center">
            
                <tr>
                    <th scope="col">Application ID</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Applicant</th>
                    <th scope="col">Review Status</th>
                    <th scope="col">Report Status</th>
                    <th scope="col">View</th>
                </tr>
        
            </thead>

            <tbody>

                @foreach($reviewers as $reviewer)
            
                    <tr>
                        <td class="text-center">{{ $reviewer->res_id }}</td>
                        <td class="text-center">{{ $reviewer->topic }}</td>
                        <td class="text-center">{{ $reviewer->applicant }}</td>
                        <td class="text-center">{{ $reviewer->review_status }}</td>

                        @if( $reviewer->review_status == "Pending")

                            <td class="text-center">Take action first</td>

                            <td class="text-center">              
                                <button class="bg-danger text-light" data-toggle="modal" data-target="#acceptReport" type="submit">Take Action</button>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="acceptReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title text-light" id="exampleModalLongTitle">Accept Research Grant Report</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="{{ url('reviewerreports/' . $reviewer->res_id) }}">

                                                @csrf
                                                {{ method_field('PATCH') }}

                                                <input style="display: none;" name="researchAccept" type="text" class="form-control" readonly="readonly" value="Accept">

                                                <h4 class="text-center"><b>Would you like to accept the report?</b></h4>
                                                
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


                        @else
                            
                            <td class="text-center">{{ $reviewer->report_status }}</td>

                            <td class="text-center">

                                <a href="{{ url('reviewerreports/'. $reviewer->res_id ) }}"><i class="fas fa-check-square"></i></a>

                            </td>

                        @endif
                
                    </tr>
            
                @endforeach



            </tbody>

        </table>

        <div class="row">
            <div class="mx-auto">
                {{ $reviewers->links() }}
            </div>
        </div>

    @else       

        <div class="row mb-3">
                    
            <div class="col-md-10 mx-auto text-center">
                                    
                <h3><strong class="bg-danger text-white" style="border-radius: 5px 5px 5px 5px;">No Reviewer Reports</strong></h3>
                            
            </div>

        </div>
                
    @endif
        

</div>



@endsection