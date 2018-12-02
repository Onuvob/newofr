<div class="border-bottom mb-2">
    <h4 class="header-shape">Research Title and Area</h4>
</div>

<h5>Proposed Research Topic<span class="text-danger">*</span></h5>

<div class="form-group">

    <input id="res-grant-title" type="text" class="form-control" placeholder="Title of the Research">

</div>

<h5>Research Area<span class="text-danger">*</span></h5>

<div class="form-group">

    <input id="research-grant-area" type="text" class="form-control" value="" placeholder="Research_Area 1; Research_Area 2; Research_Area 3">
    <span style="color: #737373;">Please mention the discipline(s) your research can be categorised best. (i.e. Machine Learning; Cultural Studies; Business Ethics; Comparative Historiography)</span>

</div>

<div class="border-bottom mb-2">
    <h4 class="header-shape">Primary Investigator's Details</h4>
</div>


<div class="form-group row">

    <div class="col-sm-5">

        <h5>Prefix<span class="text-danger">*</span></h5>

        <select id="research-investigator-prefix" class="form-control col-sm-12">
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

    <div class="col-sm-5">
        
        <h5>Designation<span class="text-danger">*</span></h5>
        
        <select id="research-investigator-designation" class="form-control col-sm-12">
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
    
</div>

<div class="row form-group">

    <div class="col-sm-5">
        <h5>First Name<span class="text-danger">*</span></h5>
        <input id="research-investigator-first-name" type="text" class="form-control" value="{{ Auth::user()->first_name }}">
    </div>

    <div class="col-sm-5">
        <h5>Last Name<span class="text-danger">*</span></h5>
        <input id="research-investigator-last-name" type="text" class="form-control" value="{{ Auth::user()->last_name }}">
    </div>

</div>



<div class="form-group row">

    <div class="col-sm-5">

        <h5>Department<span class="text-danger">*</span></h5>

        <select id="research-investigator-department" class="form-control col-sm-12">
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

    <div class="col-sm-5">
        
        <h5>Email<span class="text-danger">*</span></h5>
        
        <input id="research-investigator-email" type="email" class="form-control col-sm-12" value="{{ Auth::user()->email }}">

    </div>
    
</div>


<h5>Contact no<span class="text-danger">*</span></h5>

<div class="form-group row  mb-5">

    <div class="col-sm-5">
        <input id="research-investigator-contact" type="text" class="form-control" value="{{ Auth::user()->contact }}">
    </div>

</div>
