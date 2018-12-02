<!-- Modal -->
<div class="modal fade" id="book-chapter-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Book Chapter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="publications/bookchapter" enctype="multipart/form-data">

                    @csrf

                    <div>

                        @include('layouts.claimformmodal.headermodal')

                        <h5>Type<span class="text-danger">*</span></h5>

                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="bookChapterType" id="set-book-chapter-type" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <h5>Applying for<span class="text-danger">:</span></h5>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="bookChapterApplyingFor" id="set-bookchapter-applying-for" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group">

                            <h5>Article Titile<span class="text-danger">*</span></h5>
                            <textarea name="bookChapterArticleTitle" class="form-control col-sm-10" rows="4" id="set-book-chapter-article-title" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>List of Authors<span class="text-danger">*</span></h5>
                            <input name="bookChapterListOfAuthors" class="form-control col-sm-10" rows="4" id="set-book-chapter-list-of-authors" readonly="readonly">

                        </div>

                        <div id="set-authors-form-bookchapter">
        
                        </div>


                        <div class="form-group">

                            <h5>Authors Affiliation<span class="text-danger">*</span></h5>
                            <textarea name="bookChapterAuthorsAffiliation" class="form-control col-sm-10" rows="4" id="set-book-chapter-authors-affiliation" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Book Title<span class="text-danger">*</span></h5>
                            <textarea name="bookChapterBookTitle" class="form-control col-sm-10" rows="4" id="set-book-chapter-book-title" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Publisher<span class="text-danger">*</span></h5>
                            <input name="bookChapterPublisher" type="text" class="form-control col-sm-10" id="set-book-chapter-publisher" readonly="readonly">
                                    
                        </div>


                        <div class="form-group">

                            <h5>ISBN</h5>
                            <input name="bookChapterISBN" type="text" class="form-control col-sm-5" id="set-book-chapter-isbn" readonly="readonly">
                                    
                        </div>


                        <div class="form-group">

                            <h5>DOI</h5>
                            <input name="bookChapterDOI" type="text" class="form-control col-sm-10" id="set-book-chapter-doi" readonly="readonly">
                                    
                        </div>

                        <div>
                            <label><strong>Upload file</strong></label>
                            <input  type="file" name="bookCFile" id="upload_file" accept=".doc, .docx, .pdf">
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