<?php
include 'header.php';
?>


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Horizontal Forms</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                  </li>
                  <li class="breadcrumb-item active">Horizontal Forms
                  </li>
                </ol>
              </div>
            </div>
          </div>
      
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls">User Profile</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <li><a data-action="close"><i class="ft-x"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-content collpase show">
	                <div class="card-body">
						
	                    <form class="form form-horizontal">
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-eye"></i> About User</h4>
	                    		<div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Fist Name</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput1" class="form-control border-primary" placeholder="First Name" name="firstname">
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput2">Last Name</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput2" class="form-control border-primary" placeholder="Last Name" name="lastname">
			                        		</div>
				                        </div>
			                        </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput3">Username</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput3" class="form-control border-primary" placeholder="Username" name="username">
			                        		</div>
			                       		</div>
			                       	</div>
			                       	<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput4">Nick Name</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput4" class="form-control border-primary" placeholder="Nick Name" name="nickname">
			                        		</div>
				                        </div>
				                    </div>
		                        </div>

		                        <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4>

		                        <div class="row">
		                        	<div class="col-md-6">
		                        		<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput5">Email</label>
				                        	<div class="col-md-9">
												<input class="form-control border-primary" type="email" placeholder="email" id="userinput5">
				                        	</div>
					                    </div>

					                    <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput6">Website</label>
				                        	<div class="col-md-9">
												<input class="form-control border-primary" type="url" placeholder="http://" id="userinput6">
											</div>
										</div>

										<div class="form-group row">
				                        	<label class="col-md-3 label-control">Contact Number</label>
				                        	<div class="col-md-9">
												<input class="form-control border-primary" type="tel" placeholder="Contact Number" id="userinput7">
											</div>
				                        </div>
		                        	</div>
		                        	<div class="col-md-6">
		                        		<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput8">Bio</label>
				                        	<div class="col-md-9">
				                            	<textarea id="userinput8" rows="6" class="form-control border-primary" name="bio" placeholder="Bio"></textarea>
				                           	</div>
				                        </div>
		                        	</div>
		                        </div>
							</div>

	                        <div class="form-actions right">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            <button type="submit" class="btn btn-primary">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
	                        </div>
	                    </form>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>

</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php

include 'footer.php';
?>