
@extends('layouts.app')

@section('title', 'OFR | View Journals')

@section('content')

<div class="container">

    @if( Auth::user()->is_admin )
        <h4 class="header-shape shadow animated fadeInLeft">Publication Claim Accepted Journals</h4>

    @else
        <h4 class="header-shape shadow animated fadeInLeft">Publication Claim Journals</h4>

    @endif

    <div class="card text-center shadow animated fadeIn bg-transparent">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    @if( Auth::user()->is_admin )
                        <a class="nav-link active" href="/acceptedjournals">Journal</a>
                    @else
                        <a class="nav-link active" href="{{ url('publications/journal') }}">Journal</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if( Auth::user()->is_admin )
                        <a class="nav-link" href="/acceptedconferences">Conference</a>
                    @else
                        <a class="nav-link" href="{{ url('publications/conference') }}">Conference</a>
                    @endif
                    
                </li>

                <li class="nav-item">
                    @if( Auth::user()->is_admin )
                        <a class="nav-link" href="/acceptedbooks">Book</a>
                    @else
                        <a class="nav-link" href="{{ url('publications/book') }}">Book</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if( Auth::user()->is_admin )
                        <a class="nav-link" href="/acceptedbookchapters">Book Chapter</a>
                    @else
                        <a class="nav-link" href="{{ url('publications/bookchapter') }}">Book Chapter</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if( Auth::user()->is_admin )
                        <a class="nav-link" href="/acceptedresearches">Research</a>
                    @else
                        <a class="nav-link" href="{{ url('publications/research') }}">Research</a>
                    @endif
                </li>
            </ul>
        </div>
        <div class="card-body">
            
            @if(count($journals) > 0)

                <table class="table table-hover table-bordered table-striped shadow-lg">

                    <thead class="thead-dark text-center">
                    
                        <tr>
                            <th scope="col">Application ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Applicant</th>
                            <th scope="col">Status</th>
                            <th scope="col">
                            @if( Auth::user()->is_admin )
                                Take Action
                            @else
                                View
                            @endif</th>
                        </tr>
                
                    </thead>

                    <tbody>

                        @foreach($journals as $journal)
                    
                            <tr>
                                <td class="text-center">{{ $journal->id }}</td>
                                <td>{{ $journal->article_title }}</td>
                                <td class="text-center">{{ $journal->first_name }} {{ $journal->last_name }}</td>
                                <td class="text-center">{{ $journal->pub_status }}</td>
                                <td class="text-center">

                                    @if( Auth::user()->is_admin )
                                        <a href="acceptedjournals/{{ $journal->id }}"><i class="fas fa-check-square"></i></a>
                                    @else
                                        <a href="journal/{{ $journal->id }}"><i class="fas fa-check-square"></i></a>
                                    @endif

                                    
                                </td>
                            </tr>
                    
                        @endforeach

                        <div class="row">
                            <div class="mx-auto">
                                {{ $journals->links() }}
                            </div>
                        </div>

                    </tbody>

                </table>

            @else       

                <div class="row mb-3">
                            
                    <div class="col-md-10 mx-auto text-center">
                                            
                        <h3><strong class="bg-danger text-white" style="border-radius: 5px 5px 5px 5px;">No Journal Publication</strong></h3>
                                    
                    </div>

                </div>
                        
            @endif

        </div>
    </div>
</div>


@endsection



