<!-- Modal -->
<div class="modal fade" id="journal-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Journal Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="publications/journal" enctype="multipart/form-data">

                    @csrf
                    
                    <div id="" class="">

                        @include('layouts.claimformmodal.headermodal')
                        
                        <h5>Type<span class="text-danger">:</span></h5>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="journalType" id="set-journal-type" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <h5>Applying for<span class="text-danger">:</span></h5>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="journalApplyingFor" id="set-journal-applying-for" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group">

                            <h5>Article Titile<span class="text-danger">:</span></h5>
                            <textarea name="journalArticleTitle" class="form-control col-sm-10" rows="4" id="set-journal-article-title" readonly="readonly"></textarea>

                        </div>

                        <div class="form-group">

                            <h5>List of Authors<span class="text-danger">:</span></h5>
                            <input name="journalListOfAuthors" class="form-control col-sm-10" rows="4" id="set-journal-list-of-authors" readonly="readonly">

                        </div>


                        <div id="set-authors-form-jour">
        
                        </div>


                        <div class="form-group">

                            <h5>Authors Affiliation<span class="text-danger">:</span></h5>
                            <textarea name="journalAuthorsAffiliation" class="form-control col-sm-10" rows="4" id="set-journal-authors-affiliation" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Name of Journal<span class="text-danger">:</span></h5>
                            <textarea name="nameOfJournal" class="form-control col-sm-10" rows="4" id="set-name-of-journal" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Publisher<span class="text-danger">:</span></h5>
                            <input name="journalPublisher" type="text" class="form-control col-sm-10" id="set-journal-publisher" readonly="readonly">
                                        
                        </div>


                        <div class="form-group">

                            <h5>ISSN/ISBN</h5>
                            <input name="journalISBN" type="text" class="form-control col-sm-5" id="set-journal-isbn" readonly="readonly">
                                        
                        </div>


                        <div class="form-group">

                            <h5>DOI</h5>
                            <input name="journalDOI" type="text" class="form-control col-sm-10" id="set-journal-doi" readonly="readonly">
                                        
                        </div>


                        <div class="form-group">

                            <h5>Impact Factor</h5>
                            <input name="journalImpactFactor" type="text" class="form-control col-sm-10" id="set-journal-impaxt-factor" readonly="readonly">
                                        
                        </div>

                        <div class="header-shape-border">
                            <label class="text-danger"><strong>Upload file</strong></label>
                            <input type="file" name="jourFile" id="upload_file" accept=".doc, .docx, .pdf">
                        </div>

                        <!-- Form Submit button -->
                        <div class="row justify-content-center">
                                  
                            <button type="submit" class="btn btn-info">Submit</button>

                        </div>
                        <!--End Form Submit button-->

                    </div>
                    <!-- End Journal -->
                </form>
            </div>
    
        </div>
    </div>
</div>




