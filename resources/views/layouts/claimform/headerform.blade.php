
<div class="border-bottom">
    <h4 class="header-shape">Personal Info</h4>
</div>

<h5>Prefix<span class="text-danger">*</span></h5>

<div class="form-group">
    <select class="form-control col-sm-4 get-prefix">
        @if( Auth::user()->prefix )
            <option value="{{ Auth::user()->prefix }}" hidden selected>{{ Auth::user()->prefix }}</option>
        @else
            <option hidden selected>-Select-</option>
        @endif
        <option>Dr.</option>
        <option>Prof.</option>
        <option>Mr.</option>
        <option>Ms.</option>
    </select> 
</div>



<div class="row form-group">

    <div class="col-sm-5">
        <h5>First Name<span class="text-danger">*</span></h5>
        <input id="" type="text" class="form-control get-first-name" value="{{ Auth::user()->first_name }}">
    </div>

    <div class="col-sm-5">
        <h5>Last Name<span class="text-danger">*</span></h5>
        <input id="" type="text" class="form-control get-last-name" value="{{ Auth::user()->last_name }}">
    </div>

</div>


<div class="row form-group">
    
    <div class="col-sm-5">

        <h5>Designation<span class="text-danger">*</span></h5>

        
        <select id="" class="form-control col-sm-12 get-designation">

            @if( Auth::user()->designation )
                <option value="{{ Auth::user()->designation }}" hidden selected>{{ Auth::user()->designation }}</option>
            @else
                <option hidden selected>-Select-</option>
            @endif
            <option>Professor</option>
            <option>Associate Professor</option>
            <option>Assistant Professor</option>
            <option>Senior Lecturer</option>
            <option>Lecturer</option>
        </select> 
        
        
    </div>

    <div class="col-sm-5">

        <h5>Department<span class="text-danger">*</span></h5>

        <select id="" class="form-control col-sm-12 get-department">
            
            @if( Auth::user()->department )
                <option value="{{ Auth::user()->department }}" hidden selected>{{ Auth::user()->department }}</option>
            @else
                <option hidden selected>-Select-</option>
            @endif
            <option>Computer Science & Engineering</option>
            <option>Electrical & Electronics Engineering</option>
            <option>Electrical & Telecommunication Engineering</option>
            <option>Media Studies & Journalism</option>
            <option>Business Administration</option>
            <option>English & Humanities</option>
        </select>

    </div>

</div>





<h5>Claim Type<span class="text-danger">*</span></h5>

<div class="form-group">

    <select id="claimType" class="form-control col-sm-4 get-claim-type" onclick="showHideClaim()">
        <option hidden selected>-Select-</option>
        <option value="Journal">Journal</option>
        <option value="Conference">Conference</option>
        <option value="Book">Book</option>
        <option value="Book Chapter">Book Chpater</option>
        <option value="Research">Research</option>
    </select>

</div>


            