
@extends('layouts.app')

@section('title', 'OFR | Home')

@section('content')

<div class="container">

    @if( session('success') )

        <div class="row">

            <div class="mx-auto col-sm-8 alert alert-success">
                {{ session('success')}}
            </div>
            
        </div>


    @endif

    <div class="row justify-content-center">

        <div class="col-md-11">

            <div class="card-deck center-div">

                @if( Auth::user()->is_user )
                    
                    <div class="card shadow animated fadeInLeft bg-transparent">
                        <h5 class="card-header bg-info text-center text-light shadow">Reward Claim</h5>

                        <div class="card-body">
                            <ul>
                                <li>
                                    <a class="text-dark" href="{{ url('/claim') }}">Applicaton</a>
                                </li>
                                <li>
                                    <a class="text-dark" href="{{ url('publications/journal') }}">View Status</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    
                    
                    <div class="card shadow animated fadeInRight bg-transparent">
                        <h5 class="card-header bg-info text-center text-light shadow">Research Grant</h5>

                        <div class="card-body">
                            <ul>
                                <li>
                                    <a class="text-dark" href="{{ url('researchgrantapplication') }}">New Application</a>
                                </li>
                                <li>
                                    <a class="text-dark" href="{{ url('ongoingresearch') }}">Ongoing Project</a>
                                </li>

                                <li>
                                    <a class="text-dark" href="{{ url('reviewerreports') }}">Reviewer Reports</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                @elseif( Auth::user()->is_admin )

                    <div class="card shadow animated fadeInDown bg-transparent">
                        <h5 class="card-header bg-info text-center text-light shadow">Applied Publications</h5>

                        <div class="card-body">
                          
                            <ul>
                                <li>
                                    <a class="text-dark" href="{{ url('publication/journals') }}">Journal</a>
                                </li>
                                <li>
                                    <a class="text-dark" href="{{ url('publication/conferences') }}">Conference</a>
                                </li>
                                <li>
                                    <a class="text-dark" href="{{ url('publication/books') }}">Book</a>
                                </li>
                                <li>
                                    <a class="text-dark" href="{{ url('publication/bookchapters') }}">Book Chapter</a>
                                </li>
                                <li>
                                    <a class="text-dark" href="{{ url('publication/researches') }}">Research</a>
                                </li>
                            </ul>

                        </div>

                    </div>
                    
                    <div class="card shadow animated fadeInRight bg-transparent">
                        <h5 class="card-header bg-info text-center text-light shadow">Research Grant</h5>

                        <div class="card-body">
                            <ul>
                                <li>
                                    <a class="text-dark" href="{{ url('ongoingresearch') }}">Ongoing Project</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                @elseif( Auth::user()->is_reviewer )
                    

                        <div class="card shadow animated fadeInDown bg-transparent">
                            <h5 class="card-header bg-info text-center text-light shadow">Research Grant</h5>

                            <div class="card-body">
                                <ul>
                                    <li>
                                        <a class="text-dark" href="{{ url('reviewerreports') }}">Reviewer Reports</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                

                @endif
            </div>
        </div>
    </div>
</div>

@endsection

