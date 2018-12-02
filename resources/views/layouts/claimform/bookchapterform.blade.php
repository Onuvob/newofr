<!-- Book Chapter -->
<div id="bookChapter" class="animated fadeIn slower" style="display:none">
              
    <div class="border-bottom">
        <h4 class="header-shape">Book Chapter</h4>
    </div>



    <div class="form-group row mt-3">
        
        <div class="col-sm-5">

            <h5>Type<span class="text-danger">*</span></h5>

            <select id="get-book-chapter-type" class="form-control col-sm-12">

                <option hidden selected>-Select-</option>
                <option>Publisher Indexed in Clarivate(Web of Science)</option> 
                <option>Local/Non-recognized Publisher</option>
                <option>International Publisher</option>   
                        
            </select>

        </div>


        <div id="apply-hide-bookchapter" class="col-sm-5">

            <h5>Applying for<span class="text-danger">*</span></h5>

            <select id="bookchapter-applying-for" class="form-control col-sm-12">
                <option hidden selected>-Select-</option>
                <option>Publication Fee</option>
                <option>Cash Reward</option>
            </select> 
        </div>

    </div>
            
    

    <div class="form-group">

        <h5>Article Titile<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-book-chapter-article-title"></textarea>

    </div>

    <div class="form-group">

        <h5>List/Number of Authors<span class="text-danger">*</span></h5>

        <select id="get-book-chapter-list-of-authors" class="form-control col-sm-5" onclick="addFieldsBookChapter()">

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

    <div id="fill-authors-form-bookchapter">
        
    </div>


    <div class="form-group">

        <h5>Authors Affiliation<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-book-chapter-authors-affiliation"></textarea>

    </div>


    <div class="form-group">

        <h5>Book Title<span class="text-danger">*</span></h5>
        <textarea class="form-control col-sm-10" rows="4" id="get-book-chapter-book-title"></textarea>

    </div>


    <div class="form-group">

        <h5>Publisher<span class="text-danger">*</span></h5>
        <input type="text" class="form-control col-sm-10" id="get-book-chapter-publisher">
                
    </div>


    <div class="form-group">

        <h5>ISBN</h5>
        <input type="text" class="form-control col-sm-5" id="get-book-chapter-isbn">
                
    </div>


    <div class="form-group">

        <h5>DOI</h5>
        <input type="text" class="form-control col-sm-10" id="get-book-chapter-doi">
                
    </div>

    <!-- Form Submit button -->
    <div class="row justify-content-center">
              
        <button onclick="getBookChapterForm()" type="button" class="btn btn-info" data-toggle="modal" data-target="#book-chapter-modal">Submit</button>

    </div>
    <!--End Form Submit button-->


</div>
<!-- End Book Chapter -->



