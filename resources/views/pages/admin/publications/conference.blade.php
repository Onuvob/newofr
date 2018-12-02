@extends('layouts.app')

@section('title', 'OFR | Application Conference')

@section('content')

<div class="container mt-3">

	<h3 class="header-shape shadow animated fadeInLeft">Conference Publishes</h3>

	@if(count($conferences) > 0)

        <table class="table table-hover table-bordered table-striped shadow-lg bg-transparent">

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
                        @endif

                    </th>
                </tr>
                
            </thead>

            <tbody>

                @foreach($conferences as $conference)
                    
                    <tr>
                        <td class="text-center">{{ $conference->id }}</td>
                        <td>{{ $conference->article_title }}</td>
                        <td class="text-center">{{ $conference->first_name }} {{ $conference->last_name }}</td>
                        <td class="text-center">{{ $conference->pub_status }}</td>
                        <td class="text-center">

                            @if( Auth::user()->is_admin )
                                <a href="conferences/{{ $conference->id }}"><i class="fas fa-check-square"></i></a>
                            @else
                                <a href="conference/{{ $conference->id }}"><i class="fas fa-check-square"></i></a>
                            @endif
                            
                        </td>
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


@endsection