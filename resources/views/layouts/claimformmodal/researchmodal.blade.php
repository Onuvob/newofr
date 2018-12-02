<!-- Modal -->
<div class="modal fade" id="research-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLongTitle">Research</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="publications/research" enctype="multipart/form-data">

                    @csrf

                    <div>

                        @include('layouts.claimformmodal.headermodal')
                        <div class="form-group">

                            <h5>Project Name<span class="text-danger">*</span></h5>
                            <textarea name="projectName" class="form-control col-sm-10" rows="4" id="set-project-name" readonly="readonly"></textarea>

                        </div>

                        <h5>Applying for<span class="text-danger">:</span></h5>
                        <div class="form-group row">

                            <div class="col-sm-10">
                                <input name="researchApplyingFor" id="set-research-applying-for" type="text" class="form-control" readonly="readonly">
                            </div>

                        </div>


                        <div class="form-group">

                            <h5>Status(PI/COI)<span class="text-danger">*</span></h5>
                            <textarea name="projectStatusPI" class="form-control col-sm-10" rows="4" id="set-project-status-pi" readonly="readonly"></textarea>
                                    
                        </div>


                        <div class="form-group">

                            <h5>Funding Authority<span class="text-danger">*</span></h5>
                            <textarea name="projectFundingAuthority" class="form-control col-sm-10" rows="4" id="set-project-funding-authority" readonly="readonly"></textarea>

                        </div>


                        <div class="form-group">

                            <h5>Funding Amount<span class="text-danger">*</span></h5>
                            <input name="projectFundingAmount" type="text" class="form-control col-sm-10" id="set-project-funding-amount" readonly="readonly">

                        </div>


                        <div class="form-group">

                            <h5>Date of Award<span class="text-danger">*</span></h5>
                            <input name="projectDateOfAward" type="text" class="form-control col-sm-10" id="set-project-date-of-award" readonly="readonly">
                                    
                        </div>


                        <div class="form-group">

                            <h5>Project Status<span class="text-danger">*</span></h5>
                            <textarea name="projectStatus" class="form-control col-sm-10" rows="4" id="set-project-status" readonly="readonly"></textarea>
                                    
                        </div>

                        <div>
                            <label><strong>Upload file</strong></label>
                            <input  type="file" name="resFile" id="upload_file" accept=".doc, .docx, .pdf">
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