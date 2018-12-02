<!-- Modal -->
<div class="modal fade" id="resgrant-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Research Grant Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="researchgrantapplication" enctype="multipart/form-data">

                    @csrf
                    
                    <div>

                        <div class="border-bottom mb-2">
                            <h4 class="header-shape">Research Title and Area</h4>
                        </div>

                        <h5>Proposed Research Topic<span class="text-danger">*</span></h5>

                        <div class="form-group">

                            <input name="resGrantTopic" id="set-res-grant-title" type="text" class="form-control" readonly="readonly">

                        </div>

                        <h5>Research Area<span class="text-danger">*</span></h5>

                        <div class="form-group">

                            <input name="resGrantArea" id="set-research-grant-area" type="text" class="form-control" readonly="readonly">

                        </div>

                        <!-- Primary Investigator Start -->
                        <div class="border-bottom mb-2">
                            <h4 class="header-shape">Primary Investigator's Details</h4>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-2">

                                <h5>Prefix<span class="text-danger">*</span></h5>

                                <input id="set-research-investigator-prefix" type="text" name="pmInvesPrefix" class="form-control" readonly="readonly">
                                
                            </div>

                            <div class="col-sm-5">
                                <h5>First Name<span class="text-danger">*</span></h5>
                                <input id="set-research-investigator-first-name" type="text" name="pmInvesFirstName" class="form-control" readonly="readonly">
                            </div>

                            <div class="col-sm-5">
                                <h5>Last Name<span class="text-danger">*</span></h5>
                                <input id="set-research-investigator-last-name" type="text" name="pmInvesLastName" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6">
                                
                                <h5>Designation<span class="text-danger">*</span></h5>

                                <input id="set-research-investigator-designation" type="text" name="pmInvesDesignation" class="form-control" readonly="readonly">

                            </div>

                            <div class="col-sm-6">

                                <h5>Department<span class="text-danger">*</span></h5>

                                <input id="set-research-investigator-department" type="text" name="pmInvesDepartment" class="form-control" readonly="readonly">

                            </div>
                            
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6">
                                
                                <h5>Email<span class="text-danger">*</span></h5>
                                
                                <input id="set-research-investigator-email" type="email" name="pmInvesEmail" class="form-control" readonly="readonly">

                            </div>

                            <div class="col-sm-6">
                                <h5>Contact no<span class="text-danger">*</span></h5>

                                <input id="set-research-investigator-contact" type="text" name="pmInvesContact" class="form-control" readonly="readonly">
                            </div>

                            
                        </div>


                        <div class="form-group mb-5">
                            <div>
                                <label><strong>CV of Primary Investigator </strong><span class="text-danger">*</span></label>
                            </div>
                            <div class="header-shape-border">
                                <label class="text-danger"><strong>Upload file</strong></label>
                                <input id="set-res-upload-file-pi" type="file" name="pmInvesFile" accept=".doc, .docx, .pdf">
                            </div>
                        </div>
                        <!-- Primary Investigator End -->

                        <!-- Co Investigator Start -->
                        <div class="mt-3">
                            <h4 class="header-shape">Co-Investigator's Details</h4>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6">
                                <h5>Number of Co-Investigators</h5>
                                <input id="set-resgrant-form-list-of-authors" type="number" name="conInvesNum" class="form-control" readonly="readonly">
                            </div>

                        </div>


                        <div class="mb-5" id="fill-up-authors-form-resgrant">
        
                        </div>
                        <!-- Co Investigator End -->


                        <!-- Research Proposal -->
                        <div class="border-bottom mb-2">
                            <h4 class="header-shape">Research Proposal Details</h4>
                        </div>

                        <div class="form-group">

                            <label><strong>Introduction & Research Background </strong><span class="text-danger">*</span></label>
                            <textarea name="resGrantIntroBack" class="form-control col-sm-12" rows="5" id="set-research-intro-back" readonly="readonly"></textarea>
                        </div>


                        <div class="form-group">

                            <label><strong>Research Question(s) </strong><span class="text-danger">*</span></label>
                            <textarea name="resGrantQuestion" id="set-research-question" class="form-control col-sm-12" rows="3" readonly="readonly"></textarea>
                
                        </div>

                        <div class="form-group">

                            <label><strong>Seminal Work(s)/ Biblography </strong><span class="text-danger">*</span></label>
                            <textarea name="resGrantBiblography" id="set-research-biblography" class="form-control col-sm-12" rows="3" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group mb-5">

                            <label><strong>Proposed Methodology </strong><span class="text-danger">*</span></label>
                            <textarea name="resGrantMethodology" id="set-research-methodology" class="form-control col-sm-12" rows="3" readonly="readonly"></textarea>

                        </div>

                        <!-- Resarch Proposal End -->

                        <!-- Resarch Outcome Start -->

                        <div class="border-bottom mb-2">
                            <h4 class="header-shape">Expected Outcome</h4>
                        </div>


                        <div class="row mb-3">

                            <div class="col-sm-7">
                                <h5 class="ps-top-to-bottom  text-center">Name of Journals/ Conference Proceedings/ Publishers<span class="text-danger">*</span></h5>
                            </div>

                            <div class="col-sm-5">
                                <h5 class="ps-top-to-bottom  text-center">Indexed In (If Known and/or Applicable)</h5>
                            </div>

                        </div>


                        <div class="row mb-2">

                            <div class="col-sm-7">
                                <input name="resGrantJCP1name" id="set-res-name-of-jcp1" type="text" class="form-control mb-2" readonly="readonly">
                            </div>

                            <div class="col-sm-5">
                                <input name="resGrantJCP1index" id="set-res-name-of-jcp1-index" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <div class="col-sm-7">
                                <input name="resGrantJCP2name" id="set-res-name-of-jcp2" type="text" class="form-control mb-2" readonly="readonly">
                            </div>

                            <div class="col-sm-5">
                                <input name="resGrantJCP2index" id="set-res-name-of-jcp2-index" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-sm-7">
                                <input name="resGrantJCP3name" id="set-res-name-of-jcp3" type="text" class="form-control mb-2" readonly="readonly">
                            </div>

                            <div class="col-sm-5">
                                <input name="resGrantJCP3index" id="set-res-name-of-jcp3-index" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <div class="row mb-5">

                            <div class="col-sm-7">
                                <label>Patent Information</label>
                                <input name="resGrantPatentInfo" id="set-research-patent-info" type="text" class="form-control" readonly="readonly">
                            </div>

                            <div class="col-sm-5">
                                <label>Publishing Country</label>
                                <input name="resGrantPubCountry" id="set-research-publishing-country" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>
                        <!-- Resarch Outcome End -->

                        <!-- Resarch Cost Start -->
                        <div class="border-bottom mb-2">
                            <h4 class="header-shape">Research Cost</h4>
                        </div>

                        <label><strong>Tentative Budget </strong><span class="text-danger">*</span></label>

                        <div class="form-group row mb-5">

                            <div class="col-sm-5">
                                <input name="resGrantTentativeBudget" id="set-research-tentative-budget" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>

                        <label><strong>Is the co-investigator(s) of the proposed research affiliated with a different institution? </strong><span class="text-danger">*</span></label>

                        <div class="form-group row">
                            <div class="col-sm-5">
                                <input name="resGrantCoInvesDifIns" id="set-research-co-investigator-dif-inst" class="form-control" readonly="readonly"> 
                            </div>
                        </div>

                        <div class="form-group mb-5">

                            <label><strong>Does this research project have any prospect to get additional support from sources other than ULAB Research Grant? If yes, please provide detail of this opportunity.</strong></label>
                            <textarea name="resGrantProjProspect" id="set-research-detail-opportunity" class="form-control col-sm-12" rows="3" readonly="readonly"></textarea>

                        </div>
                    
                        <!-- Resarch Cost End -->

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




