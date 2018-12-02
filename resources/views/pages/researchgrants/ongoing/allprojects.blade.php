@extends('layouts.app')

@section('title', 'OFR | Research Grant Application')

@section('content')

<div class="container mt-3">

	<h3 class="header-shape shadow animated fadeInLeft">Ongoing Research Grants</h3>

    @if(count($researchgrants) > 0)

        <table class="table table-hover table-bordered table-striped shadow-lg bg-transparent">

            <thead class="thead-dark text-center">
            
                <tr>
                    <th scope="col">Application ID</th>
                    <th scope="col">Applicant</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Area</th>
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

                @foreach($researchgrants as $researchgrant)
            
                    <tr>
                        <td class="text-center">{{ $researchgrant->id }}</td>
                        <td class="text-center">{{ $researchgrant->first_name }} {{ $researchgrant->last_name }}</td>
                        <td class="text-center">{{ $researchgrant->topic }}</td>
                        <td class="text-center">{{ $researchgrant->area }}</td>
                        <td class="text-center">{{ $researchgrant->pub_status }}</td>
                        <td class="text-center">

                            <a href="ongoingresearch/{{ $researchgrant->id }}"><i class="fas fa-check-square"></i></a>

                        </td>
                    </tr>
            
                @endforeach


            </tbody>

        </table>

        <div class="row">
            <div class="mx-auto">
                {{ $researchgrants->links() }}
            </div>
        </div>

    @else       

        <div class="row mb-3">
                    
            <div class="col-md-10 mx-auto text-center">
                                    
                <h3><strong class="bg-danger text-white" style="border-radius: 5px 5px 5px 5px;">No Research Grant Publication</strong></h3>
                            
            </div>

        </div>
                
    @endif
        

</div>


@endsection