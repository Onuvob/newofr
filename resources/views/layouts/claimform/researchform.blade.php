<!-- Research -->
<div id="research" class="animated fadeIn slower" style="display:none">
              

    <div class="border-bottom">
        <h4 class="header-shape">Research</h4>
    </div>


    <div class="form-group mt-3">

        <h5>Project Name<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-project-name"></textarea>

    </div>


    <div id="apply-hide-research" class="form-group">

        <h5>Applying for<span class="text-danger">*</span></h5>

        <select id="research-applying-for" class="form-control col-sm-5">
            <option hidden selected>-Select-</option>
            <option>Publication Fee</option>
            <option>Cash Reward</option>
        </select> 
    </div>


    <div class="form-group">

        <h5>Status(PI/COI)<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-project-status-pi"></textarea>
                
    </div>


    <div class="form-group">

        <h5>Funding Authority<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-project-funding-authority"></textarea>

    </div>


    <div class="form-group">

        <h5>Funding Amount<span class="text-danger">*</span></h5>
        <input type="text" class="form-control col-sm-10" id="get-project-funding-amount">

    </div>


    <div class="form-group">

        <h5>Date of Award<span class="text-danger">*</span></h5>
        <input type="text" class="form-control col-sm-10" id="get-project-date-of-award">
                
    </div>


    <div class="form-group">

        <h5>Project Status<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-project-status"></textarea>
                
    </div>


    <!-- Form Submit button -->
    <div class="row justify-content-center">
              
        <button onclick="getResearchForm()" type="button" class="btn btn-info" data-toggle="modal" data-target="#research-modal">Submit</button>

    </div>
    <!--End Form Submit button-->

</div>
            <!-- End Research -->