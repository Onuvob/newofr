<!-- Journal -->
<div id="journal" class="animated fadeIn slower" style="display:none">
              
    
    <div class="border-bottom">
        <h4 class="header-shape">Journal</h4>
    </div>

    <div class="form-group row mt-3">
        

        <div class="col-sm-5">

            <h5>Type<span class="text-danger">*</span></h5>

            <select id="journal-form-type" class="form-control col-sm-12" onclick="showHideFeeJournal()">

                <option hidden selected>-Select-</option>
                <option>Web of Science Indexed</option>
                <option>Scopus Indexed</option>
                <option>Non-Indexed Peer Reviewed</option>
                                
            </select>

        </div>


        <div id="apply-hide-journal" class="col-sm-5">

            <h5>Applying for<span class="text-danger">*</span></h5>

            <select id="journal-applying-for" class="form-control col-sm-12">
                <option hidden selected>-Select-</option>
                <option>Publication Fee</option>
                <option>Cash Reward</option>
            </select> 
        </div>



    </div>
                


    <div class="form-group">

        <h5>Article Titile<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="journal-form-article-title"></textarea>

    </div>


    <div class="form-group">

        <h5>List/Number of Authors<span class="text-danger">*</span></h5>

        <select id="journal-form-list-of-authors" class="form-control col-sm-5" onclick="addFieldsJour()">

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

    <div id="fill-authors-form-jour">
        
    </div>



    <div class="form-group">

        <h5>Authors Affiliation<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="journal-form-authors-affiliation"></textarea>

    </div>


    <div class="form-group">

        <h5>Name of Journal<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="journal-form-name-of-journal"></textarea>

    </div>


    <div class="form-group">

        <h5>Publisher<span class="text-danger">*</span></h5>
        <input type="text" class="form-control col-sm-10" id="journal-form-publisher">
                    
    </div>


    <div class="form-group">

        <h5>ISSN/ISBN</h5>
        <input type="text" class="form-control col-sm-5" id="journal-form-isbn">
                    
    </div>


    <div class="form-group">

        <h5>DOI</h5>
        <input type="text" class="form-control col-sm-10" id="journal-form-doi">
                    
    </div>


    <div class="form-group">

        <h5>Impact Factor</h5>
        <input type="text" class="form-control col-sm-10" id="journal-form-impact-factor">
                    
    </div>

    <!-- Form Submit button -->
    <div class="row justify-content-center">
              
        <button onclick="getJournalForm()" type="button" class="btn btn-info" data-toggle="modal" data-target="#journal-modal">Submit</button>

    </div>
    <!--End Form Submit button-->

</div>
<!-- End Journal -->
