<!-- Modal -->
<div class="modal fade" id="conference-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Conference</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form method="POST" action="publications/conference" enctype="multipart/form-data">

                    @csrf

                    <div>

                        @include('layouts.claimformmodal.headermodal')

                        <h5>Type<span class="text-danger">*</span></h5>

                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="conferenceType" id="set-conference-type" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <h5>Applying for<span class="text-danger">*</span></h5>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="conferenceApplyingFor" id="set-conference-applying-for" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group">

                            <h5>Article Titile<span class="text-danger">*</span></h5>
                            <textarea name="conferenceArticleTitle" class="form-control col-sm-10" rows="4" id="set-conference-article-title" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>List of Authors<span class="text-danger">*</span></h5>
                            <input name="conferenceListOfAuthors" class="form-control col-sm-10" rows="4" id="set-conference-list-of-authors" readonly="readonly">

                        </div>

                        <div id="set-authors-form-conf">
        
                        </div>


                        <div class="form-group">

                            <h5>Authors Affiliation<span class="text-danger">*</span></h5>
                            <textarea name="conferenceAuthorsAffiliation" class="form-control col-sm-10" rows="4" id="set-conference-authors-affiliation" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Name of Conference<span class="text-danger">*</span></h5>
                            <textarea name="nameOfConference" class="form-control col-sm-10" rows="4" id="set-name-of-conference" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Venue<span class="text-danger">*</span></h5>
                            <input name="conferenceVenue" type="text" class="form-control col-sm-10" id="set-conference-venue" readonly="readonly">
                                    
                        </div>


                        <div class="form-group">

                            <h5>ISSN/ISBN</h5>
                            <input name="conferenceISBN" type="text" class="form-control col-sm-5" id="set-conference-isbn" readonly="readonly">
                                    
                        </div>


                        <div class="form-group">

                            <h5>DOI</h5>
                            <input name="conferenceDOI" type="text" class="form-control col-sm-10" id="set-conference-doi" readonly="readonly">
                                    
                        </div>

                        <div class="header-shape-border">
                            <label><strong>Upload file</strong></label>
                            <input  type="file" name="confFile" id="upload_file" accept=".doc, .docx, .pdf">
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