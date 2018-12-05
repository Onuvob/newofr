<!-- Modal -->
<div class="modal fade" id="book-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="publications/book" enctype="multipart/form-data">

                    @csrf

                    <div>

                        @include('layouts.claimformmodal.headermodal')

                        <h5>Type<span class="text-danger">*</span></h5>

                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="bookType" id="set-book-type" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <h5>Applying for<span class="text-danger">:</span></h5>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="bookApplyingFor" id="set-book-applying-for" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group">

                            <h5>Book Name<span class="text-danger">*</span></h5>
                            <textarea name="bookName" class="form-control col-sm-10" rows="4" id="set-book-name" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>List of Authors<span class="text-danger">*</span></h5>
                            <input name="bookListOfAuthors" class="form-control col-sm-10" rows="4" id="set-book-list-of-authors" readonly="readonly">

                        </div>


                        <div id="set-authors-form-book">
        
                        </div>


                        <div class="form-group">

                            <h5>Authors Affiliation<span class="text-danger">*</span></h5>
                            <textarea name="bookAuthorsAffiliation" class="form-control col-sm-10" rows="4" id="set-book-authors-affiliation" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Publisher<span class="text-danger">*</span></h5>
                            <input name="bookPublisher" type="text" class="form-control col-sm-10" id="set-book-publisher" readonly="readonly">
                                    
                        </div>


                        <div class="form-group">

                            <h5>ISSN/ISBN</h5>
                            <input name="bookISBN" type="text" class="form-control col-sm-5" id="set-book-isbn" readonly="readonly">
                                    
                        </div>

                        <div class="header-shape-border">
                            <label><strong>Upload file</strong></label>
                            <input  type="file" name="bookFile" id="upload_file" accept=".doc, .docx, .pdf">
                        </div>

                        <!-- Form Submit button -->
                        <div class="row justify-content-center">
                                  
                            <button type="submit" class="btn btn-info">Submit</button>

                        </div>
                        <!--End Form Submit button-->

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>