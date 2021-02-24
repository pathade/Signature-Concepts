<?php include('../../partials/header.php');
$flag = $_SESSION['flag']; ?>

<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Vendor</h4>
                    <hr>
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
						<div class="card-text">
						</div>
            
	                    <form class="form form-horizontal" id="form">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                               
	                    		<div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
                                                <label class="col-md-4 label-control" for="userinput1">Type <span style="color:red;"> *</span></label>
                                                <div class="col-md-8">
                                                <select class="select2 form-control block" name="type" id="type" class="select2" data-toggle="select2" >
                                                  <option value="" disabled selected>Select </option>
                                                  <option value="Fixed Vendor">Fixed Vendor</option>
                                                  <option value="Variable Vendor">Variable Vendor</option>
                                                </select>
                                                <!-- <span id="type_error" style="color:red;"></span> -->
                                                </div>

                                                
				                        	
                                            <!-- <div class="col-md-3">
				                            	<input type="text" class="form-control " placeholder="Last Name" name="last_name" id="last_name" onkeyup="written(this.id);">
                                      <span id="lname_error" style="color:red;"></span>
				                            </div> -->
				                        </div>
				                    </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                            <!-- <label class="col-md-2 label-control" for="userinput1">Company Name<span style="color:red;"> *</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="Company Name" name="company_name" id="company_name" onkeyup="written(this.id);">
                                                    <span id="cname_error" style="color:red;"></span>
                                                </div> -->
                                                <label class="col-md-2 label-control" for="userinput1">Company Name<span style="color:red;"> *</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control " placeholder="Company Name" name="company_name" id="company_name" onkeyup="written(this.id);">
                                                    <!-- <span id="cname_error" style="color:red;"></span> -->
                                                </div>
                                                <!-- <label class="col-md-2 label-control" for="userinput1" >Primary Contact <span style="color:red;"> *</span></label>
				                        	
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control " placeholder="Name" name="first_name" id="first_name" onkeyup="written(this.id);">
                                                  <span id="fname_error" style="color:red;"></span>
                                                </div> -->
				                        	
                                  
                              </div>
                            </div>
		                        </div>
		                        <div class="row"> 
		                        	<div class="col-md-12">
			                        	
                                        <div class="form-group row">
                                        <label class="col-md-2 label-control" for="userinput1" >Primary Contact <span style="color:red;"> *</span></label>
				                        	
                                        <div class="col-md-4">
                                          <input type="text" class="form-control " placeholder="Name" name="first_name" id="first_name" onkeyup="written(this.id);">
                                          <!-- <span id="fname_error" style="color:red;"></span> -->
                                        </div>
                                                
                                                <label class="col-md-1 label-control" for="userinput1" >GSTIN <span style="color:red;"> *</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="GST" name="gstin" id="gstin" onkeyup="written(this.id);">
                                                  
                                                </div>
                                                
                                                <!-- <label class="col-md-1 label-control" for="userinput1">Party<span style="color:red;"> *</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="Party" name="party_name" id="party_name" onkeyup="written(this.id);">
                                                    <span id="party_error" style="color:red;"></span>
                                                </div> -->
			                       	          </div>

                                        <div class="form-group row">
                                            <!-- <label class="col-md-2 label-control" for="userinput1">Vendor Display Name<span style="color:red;"> *</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="Company Display Name" name="Company_display_name" id="Company_display_name" onkeyup="written(this.id);">
                                                    <span id="cdname_error" style="color:red;"></span>
                                                </div> -->
                                                <label class="col-md-2 label-control" for="userinput1">PAN No <span style="color:red;"> *</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="PAN No" name="pan_no" id="pan_no" onkeyup="written(this.id);">
                                                    
                                                </div>
                                                <label class="col-md-1 label-control" for="userinput1">Email</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="Email" name="Customer_email" id="Customer_email" onkeyup="written(this.id);">
                                                    
                                                </div>
			                       		        </div>  
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1">Phone <span style="color:red;"> *</span></label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control " placeholder="Work Phone" name="Customer_work_phone" id="Customer_work_phone" onkeyup="written(this.id);">
                                                    
                                                </div>

                                                <label class="col-md-1 label-control" for="userinput1">Mobile <span style="color:red;"> *</span></label>
                                              <div class="col-md-4">
                                                <input type="number" class="form-control " placeholder="Mobile" name="Customer_mobile" id="Customer_mobile" onkeyup="written(this.id);">
                                                
                                              </div>
                                              
			                       	        	</div>
                                      
									               	
			                       	</div>
		                        </div>
                                <hr>

		                        <!-- <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4> -->

		                        <div class="row">
									<div class="col-lg-12">
										<div class="card">
											
											<div class="card-content">
												<div class="card-body">
													<ul class="nav nav-tabs nav-underline">
														<li class="nav-item">
														<a class="nav-link active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" aria-expanded="true">Other Details</a>
														</li>
														<li class="nav-item">
														<a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" aria-expanded="false">Address</a>
														</li>
														<li class="nav-item">
														<a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" aria-expanded="false">Contact Persons</a>
														</li>
														<li class="nav-item">
														<a class="nav-link" id="baseIcon-tab26" data-toggle="tab" aria-controls="tabIcon26" href="#tabIcon26" aria-expanded="false"> Remarks</a>
														</li>
														
													</ul>
													<div class="tab-content px-1 mt-1">
														<div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
															<div class="row">
																<div class="col-md-6">
																	
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Currency <span style="color:red;"> *</span></label>
																			<div class="col-md-9">
																			<select  class="form-control" id="comboCustomerOrderingCurrency" onChange="curchange();" name ="comboCustomerOrderingCurrency" data-toggle="select2">
																				<option value="" selected disabled> Select Currency </option>
																				<option value="53" > India Rupees </option>
																					<?php
																						$sql = "SELECT * FROM mstr_currency";
																						$result = mysqli_query($db,$sql);
																						while($rs1 = mysqli_fetch_array($result))
																						{
																							?>
																							<option value="<?php echo $rs1["id"]; ?>"><?php echo $rs1["country"]." ".$rs1["currency"]; ?></option>
																							<?php
																						}
																					?>
                    														</select>
																			</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Opening Balance</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control " placeholder="Opening Balance" value="0" name="Customer_opening_balance" id="Customer_opening_balance">
                                       
																			</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Payment Terms</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control " placeholder="Payment Terms" name="payment_terms" id="payment_terms">
                                     
																			</div>
																	</div>
														
																	<!-- <div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">TDS</label>
																			<div class="col-md-9">
																			<select class="select2 form-control " id="tds" class="select2" data-toggle="select2" >
																				<option value="" disabled selected>Select a Tax </option>
																				<option value="Mr">Commission or Brokerage -[5 %]</option>
																				<option value="Mrs">Commission or Brokerage (Reduced) - [3.75 %]</option>
																				<option value="Ms">Divident -[10 %]</option>	
																			</select>
																			</div>	
																	</div>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Price List</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control " placeholder="Price List" name="payment_terms" id="payment_terms">
																			</div>
																	</div> -->
																</div>
															</div>
														</div>
														<div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
														<div class="row mr-1 ml-1 text-left">
          <!-- Left Details-->
            <div class="col-lg-6 mt-1">
                <label for="txtb_address1" class="ml-3">Billing Address</label>
                 <hr/>
                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine1" class="col-lg-4 col-form-label ">Address Line 1 <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine1" id="txtCustomerBillingAddressLine1" onkeyup="written(this.id);" placeholder="Address Line 1"  >
                       
                    </div>
                </div>
               

                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine2" class="col-lg-4 col-form-label ">Address Line 2 <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine2" id="txtCustomerBillingAddressLine2" onkeyup="written(this.id);" placeholder="Address Line 2" >
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine3" class="col-lg-4 col-form-label ">Address Line 3</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine3" id="txtCustomerBillingAddressLine3" placeholder="Address Line 3" >
                        
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >Country <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">

					  <select class=" form-control block" id="comboBillingCountry" name="comboBillingCountry"  onchange="getStates()" >
						<?php
                          $option="<option value='101'>India<option>";
                          echo $option;
                          $sql = "select * from mstr_country where d=1 and id!=101 order by id asc";
                          $result = mysqli_query($db, $sql);
                          while($row = mysqli_fetch_array($result))
                          {
                            $option="<option value='".$row["id"]."'>".$row['name']."</option>";
                            echo $option;
                          }
                        ?>
                      </select>
                    </div>
                </div>
               
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >State <span style="color:red;"> *</span></label>
                  <div class="col-lg-8 text-left">
                    <select id="comboBillingState" name="comboBillingState" class="form-control block"  data-placeholder="Select State">
                      <?php
                        $option="<option value='22'>Maharashtra<option>";
                        echo $option;
                        $sql = "select * from mstr_state where d=1 and id!=22 and country_id=101 order by id asc";
                        $result = mysqli_query($db, $sql);
                        while($row = mysqli_fetch_array($result))
                        {
                          $option="<option value='".$row["id"]."'>".$row['name']."</option>";
                          echo $option;
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingCity" class="col-lg-4 col-form-label">City <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingCity" id="txtCustomerBillingCity"  onkeyup="written(this.id);" placeholder="City"  >
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingPin" class="col-lg-4 col-form-label">PIN <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingPin" onkeyup="written(this.id);" id="txtCustomerBillingPin" placeholder="PIN"  >
                        
                    </div>
                </div>
            </div>       
          <!-- Right Details -->
            <div class="col-lg-6 mt-1">
             <div class="form-group row">
                <label for="lblshipping_address" class="col-6 col-lg-4 col-form-labelml-3">Shipping Address</label>
                  <div class="col-8 col-xs-8 mt-1 custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input " id="chkSameAddress" onchange="setSameAddress(this)">
                      <label class="custom-control-label float-right" for="chkSameAddress">Same as Above</label>
                  </div>
             </div>
             <hr/>
             <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine1" class="col-lg-4 col-form-label">Address Line 1 <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine1" onkeyup="written(this.id);" id="txtCustomerShippingAddressLine1" placeholder="Address Line 1" >
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine2" class="col-lg-4 col-form-label">Address Line 2 <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine2" onkeyup="written(this.id);" id="txtCustomerShippingAddressLine2" placeholder="Address Line 2"  >
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine3" class="col-lg-4 col-form-label">Address Line 3</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine3" id="txtCustomerShippingAddressLine3" placeholder="Address Line 3" >
                       
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >Country <span style="color:red;"> *</span></label>
                    <div class="col-lg-8 text-left">
                      <select id="comboShippingCountry" name="comboShippingCountry" class="form-control" data-placeholder="Select Country" onchange="getStates1()">
                        <?php
                          $option="<option value='101'>India<option>";
                          echo $option;
                          $sql = "select * from mstr_country where d=1 and id!=101 order by id asc";
                          $result = mysqli_query($db, $sql);
                          while($row = mysqli_fetch_array($result))
                          {
                            $option="<option value='".$row["id"]."'>".$row['name']."</option>";
                            echo $option;
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >State <span style="color:red;"> *</span></label>
                  <div class="col-lg-8 text-left">
                    <select id="comboShippingState" name="comboShippingState" class="form-control" data-placeholder="Select State">
                      <?php
                        $option="<option value='22'>Maharashtra<option>";
                        echo $option;
                        $sql = "select * from mstr_state where d=1 and id!=22 and country_id=101 order by id asc";
                        $result = mysqli_query($db, $sql);
                        while($row = mysqli_fetch_array($result))
                        {
                          $option="<option value='".$row["id"]."'>".$row['name']."</option>";
                          echo $option;
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingCity" class="col-lg-4 col-form-label">City <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingCity" onkeyup="written(this.id);" id="txtCustomerShippingCity" placeholder="City"  >
         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingPin" class="col-lg-4 col-form-label">PIN <span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingPin" onkeyup="written(this.id);" id="txtCustomerShippingPin" placeholder="PIN" >
                        
                    </div>
                </div>
          </div>
        </div>
														</div>
														<div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-md-2 label-control" for="userinput1" >Salutation</label>
                                  <div class="col-md-1 divcol">
                                  <select class="select2 form-control block" name="Salutationcp" id="Salutationcp" class="select2" data-toggle="select2" onchange="salchange();">
                                              <option value="" >Salutation </option>
                                              <option value="Mr">Mr</option>
                                              <option value="Mrs">Mrs</option>
                                              <option value="Ms">Ms</option>
                                              
                                              <option value="Miss">Miss</option>
                                              <option value="Dr">Dr</option>
                                            

                                            </select>
                                  </div>
                                  <div class="col-md-4 divcol">
                                  <!-- <label>Firstname</label> -->
                                  <input type="text" id="txtFirstName" class="form-control" Placeholder="First Name">
                                  </div>
                                  <div class="col-md-4 divcol">
                                  <!-- <label>Firstname</label> -->
                                  <input type="text" id="txtlastName" class="form-control" Placeholder="Last Name">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-2 label-control" for="userinput1" >Email Address</label>
                                  <div class="col-md-5 divcol">
                                    <input type="email" class="form-control " placeholder="Email" name="email_cp" id="email_cp">
                                  </div>
                                  <!-- <label class="col-md-2 label-control" for="userinput1" >Work Phone</label> -->
                                  <div class="col-md-4 divcol">
                                    <input type="number" class="form-control " placeholder="Work Phone" name="work_ph_cp" id="work_ph_cp">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-4 label-control" for="userinput1" >Mobile</label>
                                  <div class="col-md-8">
                                    <input type="number" class="form-control " placeholder="Mobile" name="mobile_cp" id="mobile_cp">
                                  </div>
                                </div>
                              </div>
                            </div>

	                        <div class="form-actions center">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Reset
	                            </button>
                              
	                            <button type="button" class="btn btn-primary" name="addRow" id="addRow">
	                                <i class="fa fa-check-square-o" ></i> Add Row
	                            </button>
	                        </div>
                          <hr />
                          <div class="row m-1">
                            <div class="table-responsive">
                              <table id="tbl" class="table table-striped table-bordered responsive">
                                <tbody>
                                  <thead>
                                    <tr>
                                      <th>Salutation</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email Address</th>
                                      <th>Work Phone</th>
                                      <th>Mobile</th>
                                    </tr>
                                  </thead>
                                </tbody>
                              </table>
                            </div>
                          </div>
														</div>
														
														<div class="tab-pane" id="tabIcon26" aria-labelledby="baseIcon-tab26">
														<div class="row"><div class="col-lg-8"><label class="col-form-label"> Remarks <span class="text-muted">(For Internal Use)</span></label> <textarea rows="3" id="ember2513" name="ember2513" class="form-control ember-text-area ember-view"></textarea> </div></div>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
		                        </div>
							</div>

	                        <div class="form-actions center">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            <button type="button" class="btn btn-primary" id="btn" onclick="Save_data();">
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
</div>
	    </div>
	</div>

    <?php include('../../partials/footer.php');?>
	<script>

function getStates()
  {
    var cid = document.getElementById("comboBillingCountry");

    document.getElementById("comboBillingState").length = 0;
    $.ajax(
      {
        url: "../../api/global/get-states-by-country.php",
        type: 'GET',
        data : 
        {
          'country_id' : cid.value
        },
        dataType:'json',
        success: function(data)
        {
          $.each(data, function(index) 
          {
            var newOption = new Option(data[index].text, data[index].id, false, false);
            $('#comboBillingState').append(newOption).trigger('change.select2');
          });
        },
        error : function(request,error)
        {}
      }
    );
  }

  function getStates1()
  {
    var chk = document.getElementById("chkSameAddress");
    if(chk.checked != true)
    {
      var cid = document.getElementById("comboShippingCountry");    
      document.getElementById("comboShippingState").length = 0;
      $.ajax(
        {
          url: "../../api/global/get-states-by-country.php",
          type: 'GET',
          data : 
          {
            'country_id' : cid.value
          },
          dataType:'json',
          success: function(data)
          {
            $.each(data, function(index) 
            { 
              var newOption = new Option(data[index].text, data[index].id, false, false);
              $('#comboShippingState').append(newOption).trigger('change.select2');
            });
          },
          error : function(request,error)
          {}
        }
      );
    }
  }

function setSameAddress(chk)
  {
    var saddr2 = document.getElementById("txtCustomerShippingAddressLine2");
    var saddr3 = document.getElementById("txtCustomerShippingAddressLine3");
    var saddr1 = document.getElementById("txtCustomerShippingAddressLine1");
    var scity = document.getElementById("txtCustomerShippingCity");
    var spin = document.getElementById("txtCustomerShippingPin");
    //alert(saddr2);
    var scountry = document.getElementById("comboShippingCountry");
    var sstate = document.getElementById("comboShippingState");

    if(chk.checked == true)
    {
      var baddr1 = document.getElementById("txtCustomerBillingAddressLine1");
      var baddr2 = document.getElementById("txtCustomerBillingAddressLine2");
      var baddr3 = document.getElementById("txtCustomerBillingAddressLine3");
      var bcountry = document.getElementById("comboBillingCountry");
      var bstate = document.getElementById("comboBillingState");
      var bcity = document.getElementById("txtCustomerBillingCity");
      var bpin = document.getElementById("txtCustomerBillingPin");

      saddr1.value = baddr1.value;
      saddr2.value = baddr2.value;
      saddr3.value = baddr3.value;
      scity.value = bcity.value;;
      spin.value = bpin.value;;

      var temp = bcountry.value;
      $('#comboShippingCountry').val(temp).trigger('change.select2');

      var temp1 = bstate.value;
      $.ajax(
      {
        url: "../../api/global/get-states-by-country.php",
        type: 'GET',
        data : 
        {
          'country_id' : temp
        },
        dataType:'json',
        success: function(data)
        {
          $.each(data, function(index) 
          {
            if(data[index].id == temp1)
            {
              var newOption = new Option(data[index].text, data[index].id, true, true);
              $('#comboShippingState').append(newOption).trigger('change.select2');
            }
            else
            {
              var newOption = new Option(data[index].text, data[index].id, false, false);
              $('#comboShippingState').append(newOption).trigger('change.select2');
            }
          });
        },
        error : function(request,error)
        {}
      }
      );

   
    }
    else
    {
      
    }
  }
  
</script>
<script>
function Save_data()
{
    //alert("hii");
		var first_name = document.getElementById("first_name").value;
 		var company_name = document.getElementById("company_name").value;
 		// var Company_display_name = document.getElementById("Company_display_name").value;
    // var vat_no = document.getElementById("vat_no").value;
		var Customer_work_phone = document.getElementById("Customer_work_phone").value;
		var Customer_mobile = document.getElementById("Customer_mobile").value;
    var pan_no = document.getElementById("pan_no").value;
    var type = document.getElementById("type").value;

		var comboCustomerOrderingCurrency = document.getElementById("comboCustomerOrderingCurrency").value;
		var Customer_opening_balance = document.getElementById("Customer_opening_balance").value;
		var payment_terms = document.getElementById("payment_terms").value;

		var bill_add1 = document.getElementById("txtCustomerBillingAddressLine1").value;
    var bill_add2 = document.getElementById("txtCustomerBillingAddressLine2").value;
		var bill_add3 = document.getElementById("txtCustomerBillingAddressLine3").value;
 		var bill_country = document.getElementById("comboBillingCountry").value;
 		var bill_state = document.getElementById("comboBillingState").value;
 		var bill_city = document.getElementById("txtCustomerBillingCity").value;
		var bill_pin = document.getElementById("txtCustomerBillingPin").value;


		var ship_add1 = document.getElementById("txtCustomerShippingAddressLine1").value;
		var ship_add2 = document.getElementById("txtCustomerShippingAddressLine2").value;
    var ship_add3 = document.getElementById("txtCustomerShippingAddressLine3").value;
		//var currency = document.getElementById("comboCustomerOrderingCurrency").value;
		
		var ship_country = document.getElementById("comboShippingCountry").value;
		var ship_state = document.getElementById("comboShippingState").value;
    var ship_city = document.getElementById("txtCustomerShippingCity").value;
		var ship_pin = document.getElementById("txtCustomerShippingPin").value;
		var remark = document.getElementById("ember2513").value;
    var gstin = document.getElementById("gstin").value;

// alert(company_name);
    /*var convertedIntoArray = [];
    var table = document.getElementById("tblCustomers");
    for (var i = 1, row; row = table.rows[i]; i++) 
    {
      //iterate through rows
      //rows would be accessed using the "row" variable assigned in the for loop
      for (var j = 0, col; col = row.cells[j]; j++) 
      {
        if(col.innerText == "")
        {

        }
        else
        {
          convertedIntoArray.push(col.innerText);
        }
      }  
      convertedIntoArray.push("#");
    }*/

    var rawItemArray = [];
  var count=t.rows().count();               
  var i=0;
  
  t.rows().eq(0).each( function ( index ) 
  { 
      // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
      var row = t.row( index );
      var data = row.data();
      var sat =data[0];
      var fname =data[1];
      var last_name =data[2];
      var email =data[3];
      var workph =data[4];
      var phone =data[5];
      rawItemArray.push({
          sat : sat,
          fname:fname,  
          last_name:last_name,
          email:email,
          workph:workph,
          phone:phone,
      });
      i++;
  });
  var newRawItemArray = JSON.stringify(rawItemArray);
  //alert("newRawItemArray:"+newRawItemArray);

    if(first_name!=""  && company_name!="" && Customer_work_phone!="" && Customer_mobile!="" && pan_no!=""
     && comboCustomerOrderingCurrency!=""    
    && bill_add1!="" && bill_add2!=""  && bill_country!=""  && bill_state!="" && bill_city!="" && bill_pin!="" && ship_add1!=""
    && ship_add2!=""  && ship_country!="" && ship_state!="" 
    && ship_city!="" && ship_pin!="" && gstin!="" && type!="")
		{
      $.ajax({
							type: "POST",
							url: '../../api/vendor/save_vendor.php',
							data: $('#form').serialize()+'&contact_person_array=' + newRawItemArray,
							success: function(data)
							{ 
								console.log("result is:"+data);
								if(data == "1")
								{
                  $.toast({
                    heading: 'Success',
                    text: 'Vendor Added Successfully...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                  window.location.href="view_vendor.php";
                }, 5000);
									// alert('Vendor Added!');
								  // window.location.href = "view_vendor.php";
								}
								else
								{
								  // alert('something went wrong');
                  $.toast({
                    heading: 'Error',
                    text: 'Something went wrong...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
								}
							}
			});
    }
    else
    {
      //alert("please fill required feilds");
      if(gstin == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'GSTIN Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
       // $("#gstin_error").text( "Require" );
      }
      if (bill_country == ""){
        $.toast({
                    heading: 'Error',
                    text: 'Billing Country Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      }
      if (bill_state == ""){
        $.toast({
                    heading: 'Error',
                    text: 'Billing State Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      }
      if (bill_city == ""){
        $.toast({
                    heading: 'Error',
                    text: 'Billing City Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      }
      if(type == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Type Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
				//$("#type_error").text( "Vendor Type Require" );
			}
			if(first_name == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'First Name Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#fname_error").text( "First Name Require" );
			}
			if(company_name == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Company name Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#cname_error").text( "Company Name Require" );
			}
			// if(Company_display_name == "")
			// {
			// 	$("#cdname_error").text( "Company Display Name Require" );
			// }
			if(Customer_work_phone == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Customer Phone Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#cphone_error").text( "Phone Require" );
			}
      else
      {
        if (/^\d{10}$/.test(Customer_work_phone)) 
        {
          //$("#cphone_error").text( "10 Digit Mobile Require" );
        } 
        else{
          $.toast({
                    heading: 'Error',
                    text: 'Phone is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
         // $("#cphone_error").text( "10 Digit Mobile Require" );
        }
      }
			if(Customer_mobile == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Customer Mobile Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#cmob_error").text( "Customer Mobile Require" );
			}
      else
      {
        if (/^\d{10}$/.test(Customer_mobile)) 
        {
          
        } 
        else{
          $.toast({
                    heading: 'Error',
                    text: '10 Digit Mobile No Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //  $("#cmob_error").text( "10 Digit Mobile Require" );
        }
      }
			if(bill_add1 == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Customer Billing Address1 Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#badd1_error").text( "Require" );
			}
			if(bill_add2 == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Customer Billing Address2 Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#badd2_error").text( "Require" );
			}
			if(ship_pin == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Shipping Address Pin No is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
				//$("#bpin_error").text( "Require" );
			}
//       if(pin_no == "")
// 			{
//         $.toast({
//                     heading: 'Error',
//                     text: 'Pin No is Required...!!',
//                     showHideTransition: 'slide',
//                     position: 'top-right',
//                     hideAfter: 5000,
//                     icon: 'error'
//                 })
// 				//$("#bpin_error").text( "Require" );
// 			}
			if(ship_add1 == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Shipping Address1 Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#sadd1_error").text( "Require" );
			}
      if (ship_country == ""){
        $.toast({
                    heading: 'Error',
                    text: 'Shipping Country Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      }
      if (ship_state == "") {
        $.toast({
                    heading: 'Error',
                    text: 'Shipping State Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      }
      if (ship_city == "") {
        $.toast({
                    heading: 'Error',
                    text: 'Shipping City Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      }
			if(ship_add2 == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Shipping Address2 Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#sadd2_error").text( "Require" );
			}
			if(bill_pin == "")
			{
        $.toast({
                    heading: 'Error',
                    text: 'Bill Pin Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
			//	$("#spin_error").text( "Require" );
			}
      
      if(comboCustomerOrderingCurrency == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'Currency Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
       // $("#currency_error").text( "Require" );
      }
    }
}
function written(id)
	{
		//alert("id is:"+id);
    if(id == "gstin")
		{
			$("#gstin_error").text( "" );
		}
		if(id == "first_name")
		{
			$("#fname_error").text( "" );
		}
		if(id == "last_name")
		{
			$("#lname_error").text( "" );
		}
		if(id == "company_name")
		{
			$("#cname_error").text( "" );
		}
		// if(id == "Company_display_name")
		// {
		// 	$("#cdname_error").text( "" );
		// }
    // if(id == "vat_no")
		// {
		// 	$("#vat_no_error").text( "" );
		// }
		if(id == "Customer_email")
		{
			$("#cemail_error").text( "" );
		}
    // if(id == "tan_no")
		// {
		// 	$("#tan_no_error").text( "" );
		// }
		if(id == "Customer_work_phone")
		{
			$("#cphone_error").text( "" );
		}
		if(id == "Customer_mobile")
		{
			$("#cmob_error").text( "" );
		}
    if(id == "pan_no")
		{
			$("#pan_no_error").text( "" );
		}
		if(id == "comboCustomerOrderingCurrency")
		{
			$("#currency_error").text( "" );
		}
		
		
		if(id == "txtCustomerBillingAddressLine1")
		{
			$("#badd1_error").text( "" );
		}
    if(id == "txtCustomerBillingAddressLine2")
		{
			$("#badd2_error").text( "" );
		}
    if(id == "txtCustomerBillingCity")
		{
			$("#bcity_error").text( "" );
		}
    if(id == "txtCustomerBillingPin")
		{
			$("#bpin_error").text( "" );
		}

    if(id == "txtCustomerShippingAddressLine1")
		{
			$("#sadd1_error").text( "" );
		}
    if(id == "txtCustomerShippingAddressLine2")
		{
			$("#sadd2_error").text( "" );
		}
    if(id == "txtCustomerShippingCity")
		{
			$("#scity_error").text( "" );
		}
    if(id == "txtCustomerShippingPin")
		{
			$("#spin_error").text( "" );
		}
	}
  function salchange()
  {
    $("#sal_error").text( "" );

  }
  function curchange()
  {
    $("#currency_error").text( "" );

  }
  
</script>
<script>
var t="";
$(document).ready(function()
{
  //var table="";
 t= $('#tbl').DataTable( {
     
      paginate: true,
      lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {extend: 'pdf', exportOptions: { columns: ''}}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
      searching:true,
   
      select: { style: 'multi', selector: 'td:nth-child(0)'},
      select: { style: 'multi'},
      destroy:false,
      drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
  });


//     $('#tbl').on('click', 'tbody td', function(){
//    window.location = $(this).closest('tr').find('td:eq(0) a').attr('import');
// });

  $('#addRow').on( 'click', function () {
      //alert("hii");
      
      
          //alert("hii123");
                var td0 = document.getElementById('Salutationcp').value;
                var td1 = document.getElementById('txtFirstName').value;
                var td2 = document.getElementById('txtlastName').value;
                var td3 = document.getElementById('email_cp').value;
                var td4 = document.getElementById('work_ph_cp').value;
                var td5 = document.getElementById('mobile_cp').value;
               
              if(td0!="" && td1!="" )
              {

              
                t.row.add( [
                          td0,
                          td1,
                          td2,
                          td3,
                          td4,
                          td5,
                ] ).draw( false );
                resetData();
              }
              else
              {

              }
       
    } );

    function resetData()
  {
    
   // $('#saleexecutive').val('Select').trigger('change.select2');
    document.getElementById('Salutationcp').value = '';
    document.getElementById('txtFirstName') = '';
    document.getElementById('txtlastName').value= '';
    document.getElementById('email_cp').value = '';
    document.getElementById('work_ph_cp').value = '';
    document.getElementById('mobile_cp').value = '';
  }
});

</script>