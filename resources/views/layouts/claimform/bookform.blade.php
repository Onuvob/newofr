<!-- Book -->
<div id="book" class="animated fadeIn slower" style="display:none">
              

    <div class="border-bottom">
        <h4 class="header-shape">Book</h4>
    </div>


    <div class="form-group row mt-3">


        <div class="col-sm-5">

            <h5>Type<span class="text-danger">*</span></h5>

            <select id="get-book-type" class="form-control col-sm-12">

                <option hidden selected>-Select-</option>
                <option>Local/Non-recognized Publisher</option>
                <option>International Publisher</option>
                    
            </select>

        </div>

        <div id="apply-hide-book" class="col-sm-5">

            <h5>Applying for<span class="text-danger">*</span></h5>

            <select id="book-applying-for" class="form-control col-sm-12">
                <option hidden selected>-Select-</option>
                <option>Publication Fee</option>
                <option>Cash Reward</option>
            </select> 
        </div>
        

    </div>

    <div class="form-group">

        <h5>Book Name<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-book-name"></textarea>

    </div>

    <div class="form-group">

        <h5>List/Number of Authors<span class="text-danger">*</span></h5>

        <select id="get-book-list-of-authors" class="form-control col-sm-5" onclick="addFieldsBook()">

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

    <div id="fill-authors-form-book">
        
    </div>


    <div class="form-group">

        <h5>Authors Affiliation<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-book-authors-affiliation"></textarea>

    </div>


    <div class="form-group">

        <h5>Publisher<span class="text-danger">*</span></h5>
        <input type="text" class="form-control col-sm-10" id="get-book-publisher">
                
    </div>


    <div class="form-group">

        <h5>ISSN/ISBN</h5>
        <input type="text" class="form-control col-sm-5" id="get-book-isbn">
                
    </div>

    <!-- Form Submit button -->
    <div class="row justify-content-center">
              
        <button onclick="getBookForm()" type="button" class="btn btn-info" data-toggle="modal" data-target="#book-modal">Submit</button>

    </div>
    <!--End Form Submit button-->

</div>
<!-- End Book -->