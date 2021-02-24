<?php include('../../partials/header.php');?>


<div class="app-content content">
      <div class="content-wrapper">
		<div class="content-body"><!-- Basic form layout section start -->

		<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form wizard with number tabs</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form action="#" class="number-tab-steps wizard-circle">

                            <!-- Step 1 -->
                            <h6>Configure</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Download a <a href="sample.csv">sample file</a> and compare it to your import file to ensure you have the file perfect for the import.</p>
                                    </div>

                                    <div class="col-md-4">
                                       
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <label class="required mt-2 text-danger">Upload file*</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-block">
                                                    <div class="card-body">
                                                        <fieldset class="form-group">
                                                            <input type="file" class="form-control-file" id="exampleInputFile">
                                                        </fieldset>
                                                    </div>
                                                    <div> <small> Maximum File Size: 5 MB </small>&nbsp;|&nbsp; <small> File Format: CSV or TSV or XLS </small> </div>
                                            </div> 
                                        </div>

                                    </div>

                                    </div>

                                    <div class="col-md-4">
                                        <!-- <div class="form-group">
                                            <label for="location1">Select City :</label>
                                            <select class="custom-select form-control" id="location1" name="location">
                                                <option value="">Select City</option>
                                                <option value="Amsterdam">Amsterdam</option>
                                                <option value="Berlin">Berlin</option>
                                                <option value="Frankfurt">Frankfurt</option>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phoneNumber1">Phone Number :</label>
                                            <input type="tel" class="form-control" id="phoneNumber1" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date1">Date of Birth :</label>
                                            <input type="date" class="form-control" id="date1" >
                                        </div>
                                    </div>
                                </div> -->
                            </fieldset>

                            <!-- Step 2 -->
                            <h6>Map Fields</h6>
                            <fieldset>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="proposalTitle1">Proposal Title :</label>
                                            <input type="text" class="form-control" id="proposalTitle1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress2">Email Address :</label>
                                            <input type="email" class="form-control" id="emailAddress2" >
                                        </div>
                                        <div class="form-group">
                                            <label for="videoUrl1">Video URL :</label>
                                            <input type="url" class="form-control" id="videoUrl1" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobTitle1">Job Title :</label>
                                            <input type="text" class="form-control" id="jobTitle1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="shortDescription1">Short Description :</label>
                                            <textarea name="shortDescription" id="shortDescription1" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div> -->
                            </fieldset>

                            <!-- Step 3 -->
                            <h6>Preview</h6>
                            <fieldset>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventName1">Event Name :</label>
                                            <input type="text" class="form-control" id="eventName1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="eventType1">Event Type :</label>
                                            <select class="custom-select form-control" id="eventType1" data-placeholder="Type to search cities" name="eventType1">
                                                <option value="Banquet">Banquet</option>
                                                <option value="Fund Raiser">Fund Raiser</option>
                                                <option value="Dinner Party">Dinner Party</option>
                                                <option value="Wedding">Wedding</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventLocation1">Event Location :</label>
                                            <select class="custom-select form-control" id="eventLocation1" name="location">
                                                <option value="">Select City</option>
                                                <option value="Amsterdam">Amsterdam</option>
                                                <option value="Berlin">Berlin</option>
                                                <option value="Frankfurt">Frankfurt</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobTitle2">Event Date - Time :</label>
                                            <div class='input-group'>
                                                <input type='text' class="form-control datetime" id="jobTitle2" />
                                                <span class="input-group-addon">
                                                    <span class="ft-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventStatus1">Event Status :</label>
                                            <select class="custom-select form-control" id="eventStatus1" name="eventStatus">
                                                <option value="Planning">Planning</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Finished">Finished</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Requirements :</label>
                                            <div class="c-inputs-stacked">
                                                <div class="d-inline-block custom-control custom-checkbox">
                                                    <input type="checkbox" name="status1" class="custom-control-input" id="staffing1">
                                                    <label class="custom-control-label" for="staffing1">Staffing</label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-checkbox">
                                                    <input type="checkbox" name="status1" class="custom-control-input" id="catering1">
                                                    <label class="custom-control-label" for="catering1">Catering</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
</div>
</div>
    <?php include('../../partials/footer.php');?>