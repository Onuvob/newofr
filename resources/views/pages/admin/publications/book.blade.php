@extends('layouts.app')

@section('title', 'OFR | Application Book')

@section('content')

<div class="container mt-3">

	<h3 class="header-shape shadow animated fadeInLeft">Book Publishes</h3>

	@if(count($books) > 0)

        <table class="table table-hover table-bordered table-striped shadow-lg bg-transparent">

            <thead class="thead-dark text-center">
                    
                <tr>
                    <th scope="col">Application ID</th>
                    <th scope="col">Book Name</th>
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

                @foreach($books as $book)
                    
                    <tr>
                        <td class="text-center">{{ $book->id }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td class="text-center">{{ $book->first_name }} {{ $book->last_name }}</td>
                        <td class="text-center">{{ $book->pub_status }}</td>
                        <td class="text-center">

                            @if( Auth::user()->is_admin )
                                <a href="books/{{ $book->id }}"><i class="fas fa-check-square"></i></a>
                            @else
                                <a href="book/{{ $book->id }}"><i class="fas fa-check-square"></i></a>
                            @endif
                        </td>
                    </tr>
                    
                @endforeach

                    <div class="row">
                        <div class="mx-auto">
                            {{ $books->links() }}
                        </div>
                    </div>

            </tbody>

        </table>

    @else       

        <div class="row mb-3">
                            
            <div class="col-md-10 mx-auto text-center">
                                            
                <h3><strong class="bg-danger text-white" style="border-radius: 5px 5px 5px 5px;">No Books Publication</strong></h3>
                                    
            </div>

        </div>
                        
    @endif

</div>


@endsection