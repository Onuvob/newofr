<!-- Conference -->
<div id="conference" class="animated fadeIn slower" style="display:none">


    <div class="border-bottom">
        <h4 class="header-shape">Conference</h4>
    </div>

    <div class="form-group row mt-3">
        

        <div class="col-sm-5">

            <h5>Type*</h5>

            <select id="get-conference-type" class="form-control col-sm-12" onclick="showHideFeeConference()">

                <option hidden selected>-Select-</option>
                <option>ISI/Scopus Indexed</option>
                <option>Non-Indexed</option>
                    
            </select>

        </div>



        <div id="apply-hide-conference" class="col-sm-5">

            <h5>Applying for<span class="text-danger">*</span></h5>

            <select id="conference-applying-for" class="form-control col-sm-12">
                <option hidden selected>-Select-</option>
                <option>Publication Fee</option>
                <option>Cash Reward</option>
            </select> 
        </div>



    </div>

    

    <div class="form-group">

        <h5>Article Titile<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-conference-article-title"></textarea>

    </div>


    <div class="form-group">

        <h5>List/Number of Authors<span class="text-danger">*</span></h5>

        <select id="get-conference-list-of-authors" class="form-control col-sm-5" onclick="addFieldsConf()">

            <option hidden selected>-Select-</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
                            
        </select>

    </div>

    <div id="fill-authors-form-conf">
        
    </div>


    <div class="form-group">

        <h5>Authors Affiliation<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-conference-authors-affiliation"></textarea>

    </div>


    <div class="form-group">

        <h5>Name of Conference<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-name-of-conference"></textarea>

    </div>


    <div class="form-group">

        <h5>Venue<span class="text-danger">*</span></h5>
        <input type="text" class="form-control col-sm-10" id="get-conference-venue">
                
    </div>


    <div class="form-group">

        <h5>ISSN/ISBN</h5>
        <input type="text" class="form-control col-sm-5" id="get-conference-isbn">
                
    </div>


    <div class="form-group">

        <h5>DOI</h5>
        <input type="text" class="form-control col-sm-10" id="get-conference-doi">
                
    </div>

    <!-- Form Submit button -->
    <div class="row justify-content-center">
              
        <button onclick="getConferenceForm()" type="button" class="btn btn-info" data-toggle="modal" data-target="#conference-modal">Submit</button>

    </div>
    <!--End Form Submit button-->

              
</div>
<!-- End Conference -->
