
@extends('layouts.app')

@section('title', 'OFR | View Rejected Conferences')

@section('content')

<div class="container">

    <h4 class="header-shape shadow animated fadeInLeft">Publication Claim Rejected Conferences</h4>

    <div class="card text-center shadow animated fadeIn bg-transparent">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/rejectedjournals">Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/rejectedconferences">Conference</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rejectedbooks">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rejectedbookchapters">Book Chapter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rejectedresearches">Research</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            
            @if(count($conferences) > 0)

                <table class="table table-hover table-bordered table-striped shadow-lg">

                    <thead class="thead-dark text-center">
                    
                        <tr>
                            <th scope="col">Application ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Applicant</th>
                            <th scope="col">Status</th>
                            <th scope="col">Take Action</th>
                        </tr>
                
                    </thead>

                    <tbody>

                        @foreach($conferences as $conference)
                    
                            <tr>
                                <td class="text-center">{{ $conference->id }}</td>
                                <td>{{ $conference->article_title }}</td>
                                <td class="text-center">{{ $conference->first_name }} {{ $conference->last_name }}</td>
                                <td class="text-center">{{ $conference->pub_status }}</td>
                                <td class="text-center"><a href="rejectedconferences/{{ $conference->id }}"><i class="fas fa-check-square"></i></a></td>
                            </tr>
                    
                        @endforeach

                        <div class="row">
                            <div class="mx-auto">
                                {{ $conferences->links() }}
                            </div>
                        </div>

                    </tbody>

                </table>

            @else       

                <div class="row mb-3">
                            
                    <div class="col-md-10 mx-auto text-center">
                                            
                        <h3><strong class="bg-danger text-white" style="border-radius: 5px 5px 5px 5px;">No Conferences Publication</strong></h3>
                                    
                    </div>

                </div>
                        
            @endif

        </div>
    </div>
</div>


@endsection

