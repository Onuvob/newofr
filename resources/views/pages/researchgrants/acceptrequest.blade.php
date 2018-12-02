@extends('layouts.app')

@section('title', 'OFR | Research Grant Application')

@section('content')

<div class="container mt-3">

	
    <div class="text-center card">
        <div class="card-header">
            Would you like to accept ?
        </div>
        <div class="card-body">
            
            <form method="POST" action="{{ url('http://localhost:8000/reviewerreports/' . $id ) }}" enctype="multipart/form-data">

                @csrf
                {{ method_field('PATCH') }}

                <input style="display: none;" name="researchAccept" type="text" class="form-control" readonly="readonly" value="Accept">


                <button type="submit" class="btn btn-info text-light">Accept</button>
            
                            
            </form>

            
        </div>
    </div>

        

</div>


@endsection