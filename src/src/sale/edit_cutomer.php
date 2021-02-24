<?php 
    include('../../partials/header.php');
    //$edit_id = $_GET['id'];
    $edit_id = 5;
	$sql = "SELECT saturation,first_name,last_name,company_name,cust_display_name,cust_email,cust_phone,cust_mobile,website,
    c.currency,opening_balance,payment_terms,bill_address_line1,bill_address_line2,bill_address_line3,bill_country,bill_city,
    bill_state,bill_pin,ship_address_line1,ship_address_line2,ship_address_line3,ship_country,ship_city,ship_state,
    ship_pin,remarks,gstin,country,cur.currency as main_cur,s.name as state_name,country.name as country_name
     FROM mstr_customer as c,mstr_currency as cur,mstr_country as country,mstr_state as s 
     where c.currency=cur.id AND  
           c.bill_country = country.id AND 
           c.bill_state = s.id AND
           
           c.ship_country = country.id AND 
           c.ship_state = s.id AND 
     cust_id_pk = '$edit_id'";
	
    $f = mysqli_query($db,$sql);
    while($rw = mysqli_fetch_array($f))
    {
        $saturation =  $rw['saturation'];
        $first_name =  $rw['first_name'];
        $last_name =  $rw['last_name'];
        $company_name =  $rw['company_name'];
        $cust_display_name =  $rw['cust_display_name'];
        $cust_email =  $rw['cust_email'];
        $cust_phone =  $rw['cust_phone'];
        $cust_mobile =  $rw['cust_mobile'];
        $website =  $rw['website'];
        $currency =  $rw['currency'];
        $opening_balance =  $rw['opening_balance'];
        $payment_terms =  $rw['payment_terms'];
        $bill_address_line1 =  $rw['bill_address_line1'];
        $bill_address_line2 =  $rw['bill_address_line2'];
        $bill_address_line3 =  $rw['bill_address_line3'];

        $bill_country =  $rw['bill_country'];
        $bill_city =  $rw['bill_city'];
        $bill_state =  $rw['bill_state'];
        $bill_pin =  $rw['bill_pin'];
        $ship_address_line1 =  $rw['ship_address_line1'];
        $ship_address_line2 =  $rw['ship_address_line2'];
        $ship_address_line3 =  $rw['ship_address_line3'];
        $ship_country =  $rw['ship_country'];
        $ship_city =  $rw['ship_city'];
        $ship_state =  $rw['ship_state'];
        $ship_pin =  $rw['ship_pin'];
        $remarks =  $rw['remarks'];
        $gstin =  $rw['gstin'];


        $country =  $rw['country'];
        $main_curr =  $rw['main_cur'];
        $state_name =  $rw['state_name'];
        $country_name =  $rw['country_name'];
    }


?>

<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Customer</h4>
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
				                        	<label class="col-md-3 label-control" for="userinput1" >Primary Contact <span style="color:red;"> *</span></label>
				                        	<div class="col-md-3">
                                            <select class="select2 form-control block" name="Salutation" id="Salutation" class="select2" data-toggle="select2" onchange="salchange();">
                                              <option value="<?php echo $saturation;?>" ><?php echo $saturation;?> </option>
                                              <option value="Mr">Mr</option>
                                              <option value="Mrs">Mrs</option>
                                              <option value="Ms">Ms</option>
                                              <option value="Miss">Miss</option>
                                              <option value="Dr">Dr</option>
                                            </select>
                                            <span id="sal_error" style="color:red;"></span>
				                            </div>
                                            <div class="col-md-3">
				                            	<input type="text" class="form-control " value="<?php echo $first_name;?>" placeholder="First Name" name="first_name" id="first_name" onkeyup="written(this.id);">
                                      <span id="fname_error" style="color:red;"></span>
				                            </div>
                                            <div class="col-md-3">
				                            	<input type="text" class="form-control " value="<?php echo $last_name;?>" placeholder="Last Name" name="last_name" id="last_name" onkeyup="written(this.id);">
                                      <span id="lname_error" style="color:red;"></span>
				                            </div>
				                        </div>
				                    </div>
                            <div class="col-md-6">
                              <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >GSTIN <span style="color:red;"> *</span></label>
                                  <div class="col-md-5">
				                            	<input type="text" class="form-control " value="<?php echo $gstin;?>" placeholder="GST" name="gstin" id="gstin" onkeyup="written(this.id);">
                                      <span id="gstin_error" style="color:red;"></span>
				                          </div>
                              </div>
                            </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Company Name<span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " value="<?php echo $company_name;?>" placeholder="Company Name" name="company_name" id="company_name" onkeyup="written(this.id);">
                                                    <span id="cname_error" style="color:red;"></span>
                                                </div>
			                       		</div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer Display Name<span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " value="<?php echo $cust_display_name;?>" placeholder="Company Display Name" name="Company_display_name" id="Company_display_name" onkeyup="written(this.id);">
                                                    <span id="cdname_error" style="color:red;"></span>
                                                </div>
			                       		</div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer Email<span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " value="<?php echo $cust_email;?>" placeholder="Customer Email" name="Customer_email" id="Customer_email" onkeyup="written(this.id);">
                                                    <span id="cemail_error" style="color:red;"></span>
                                                </div>
			                       		</div>
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer Phone<span style="color:red;"> *</span> </label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control " value="<?php echo $cust_phone;?>" placeholder="Work Phone" name="Customer_work_phone" id="Customer_work_phone" onkeyup="written(this.id);">
                                                    <span id="cphone_error" style="color:red;"></span>
                                                </div>
												<div class="col-md-5">
                                                    <input type="number" class="form-control " value="<?php echo $cust_mobile;?>" placeholder="Mobile" name="Customer_mobile" id="Customer_mobile" onkeyup="written(this.id);">
                                                    <span id="cmob_error" style="color:red;"></span>
                                                </div>
			                       		</div>
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Website</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " value="<?php echo $website;?>" placeholder="Website" name="Customer_website" id="Customer_website" >
                                                </div>
												
			                       		</div>
			                       	</div>
		                        </div>
                                <hr>

		                        <!-- <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4> -->

		                        <div class="row">
									<div class="col-lg-10">
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
													<div class="tab-content px-1 mt-3">
														<div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
															<div class="row">
																<div class="col-md-6">
																	
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Currency</label>
																			<div class="col-md-9">
																			<select  class="form-control" name="comboCustomerOrderingCurrency" id="comboCustomerOrderingCurrency" onChange="curchange();" data-toggle="select2">
																				<option value="<?php echo $currency;?>" ><?php echo $country." ".$main_curr;?></option>
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
                                                <span id="currency_error" style="color:red;"></span>
																			</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Opening Balance</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control " value="<?php echo $opening_balance;?>" placeholder="Opening Balance" value="0" name="Customer_opening_balance" id="Customer_opening_balance">
                                        <span id="bal_error" style="color:red;"></span>
																			</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Payment Terms</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control " value="<?php echo $payment_terms;?>" placeholder="Payment Terms" name="payment_terms" id="payment_terms">
                                        <span id="pt_error" style="color:red;"></span>
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
            <div class="col-lg-6 mt-3">
                <label for="txtb_address1" class="ml-3">Billing Address</label>
                 <hr/>
                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine1" class="col-lg-4 col-form-label ">Address Line 1<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine1" value="<?php echo $bill_address_line1;?>" id="txtCustomerBillingAddressLine1" onkeyup="written(this.id);" placeholder="Address Line 1"  >
                        <span id="badd1_error" style="color:red;"></span>
                    </div>
                </div>
               

                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine2" class="col-lg-4 col-form-label ">Address Line 2<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine2" value="<?php echo $bill_address_line2;?>" id="txtCustomerBillingAddressLine2" onkeyup="written(this.id);" placeholder="Address Line 2" >
                        <span id="badd2_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine3" class="col-lg-4 col-form-label ">Address Line 3</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine3" value="<?php echo $bill_address_line3;?>" id="txtCustomerBillingAddressLine3" placeholder="Address Line 3" >
                        <span id="badd3_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >Country<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">

					  <select class=" form-control block" id="comboBillingCountry" name="comboBillingCountry"  onchange="getStates()" >
                      <option value="<?php echo $bill_country;?>"><?php echo $country_name;?></option>
						<?php
                        
                        //   $option="<option value='101'>India<option>";
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
                      <span id="bcon_error" style="color:red;"></span>
                    </div>
                </div>
               
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >State<span style="color:red;"> *</span></label>
                  <div class="col-lg-8 text-left">
                    <select id="comboBillingState" name="comboBillingState" class="form-control block"  data-placeholder="Select State">
                    <option value="<?php echo $bill_state;?>"><?php echo $state_name;?></option>
                      <?php

                        // $option="<option value='22'>Maharashtra<option>";
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
                    <span id="bstate_error" style="color:red;"></span>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingCity" class="col-lg-4 col-form-label">City<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingCity" value="<?php echo $bill_city;?>" id="txtCustomerBillingCity"  onkeyup="written(this.id);" placeholder="City"  >
                        <span id="bcity_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingPin" class="col-lg-4 col-form-label">PIN<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingPin"  value="<?php echo $bill_pin;?>" onkeyup="written(this.id);" id="txtCustomerBillingPin" placeholder="PIN"  >
                        <span id="bpin_error" style="color:red;"></span>
                    </div>
                </div>
            </div>       
          <!-- Right Details -->
            <div class="col-lg-6 mt-3">
             <div class="form-group row">
                <label for="lblshipping_address" class="col-6 col-lg-4 col-form-labelml-3">Shipping Address</label>
                  <div class="col-8 col-xs-8 mt-1 custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input " id="chkSameAddress" onchange="setSameAddress(this)">
                      <label class="custom-control-label float-right" for="chkSameAddress">Same as Above</label>
                  </div>
             </div>
             <hr/>
             <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine1" class="col-lg-4 col-form-label">Address Line 1<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine1" value="<?php echo $ship_address_line1;?>" onkeyup="written(this.id);" id="txtCustomerShippingAddressLine1" placeholder="Address Line 1" >
                        <span id="sadd1_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine2" class="col-lg-4 col-form-label">Address Line 2<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine2" value="<?php echo $ship_address_line2;?>" onkeyup="written(this.id);" id="txtCustomerShippingAddressLine2" placeholder="Address Line 2"  >
                        <span id="sadd2_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine3" class="col-lg-4 col-form-label">Address Line 3</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine3" value="<?php echo $ship_address_line3;?>" id="txtCustomerShippingAddressLine3" placeholder="Address Line 3" >
                        <span id="sadd3_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >Country<span style="color:red;"> *</span></label>
                    <div class="col-lg-8 text-left">
                      <select id="comboShippingCountry" name="comboShippingCountry" class="form-control"  data-placeholder="Select Country" onchange="getStates1()">
                      <option value="<?php echo $ship_country;?>"><?php echo $country_name;?></option>
                        <?php
                          //$option="<option value='101'>India<option>";
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
                      <span id="scon_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >State<span style="color:red;"> *</span></label>
                  <div class="col-lg-8 text-left">
                    <select id="comboShippingState" name="comboShippingState" class="form-control" data-placeholder="Select State">
                    <option value="<?php echo $bill_state;?>"><?php echo $state_name;?></option>
                      <?php
                        //$option="<option value='22'>Maharashtra<option>";
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
                    <span id="sstate_error" style="color:red;"></span>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingCity" class="col-lg-4 col-form-label">City<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingCity" value="<?php echo $ship_city;?>" onkeyup="written(this.id);" id="txtCustomerShippingCity" placeholder="City"  >
                        <span id="scity_error" style="color:red;"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingPin" class="col-lg-4 col-form-label">PIN<span style="color:red;"> *</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingPin" value="<?php echo $ship_pin;?>" onkeyup="written(this.id);" id="txtCustomerShippingPin" placeholder="PIN" >
                        <span id="spin_error" style="color:red;"></span>
                    </div>
                </div>
          </div>
        </div>
														</div>
														<div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
														<div class="form-row">
                                                        <div class="table-responsive"> 
                                                            <table id="tblCustomers" cellpadding="0" cellspacing="0" border="1" class="border-bottom-0 table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Salutation</th>
                                                                        <th>First Name</th>
                                                                        <th>Last Name</th>
                                                                        <th>Email Address</th>
                                                                        <th>Work Phone</th>
                                                                        <th>Mobile</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td>
                                                                          <!-- <input type="text" id="txtSalutation" /> -->
                                                                          <select class="select2 form-control block" name="txtSalutation" id="txtSalutation" class="select2" data-toggle="select2" >
                                                                            <option value="" disabled selected>Salutation </option>
                                                                            <option value="Mr">Mr</option>
                                                                            <option value="Mrs">Mrs</option>
                                                                            <option value="Ms">Ms</option>
                                                                            <option value="Miss">Miss</option>
                                                                            <option value="Dr">Dr</option>
                                                                          </select>
                                                                        </td>
                                                                        <td><input type="text" id="txtFirstName" class="form-control" /></td>
                                                                        <td><input type="text" id="txtLastName" class="form-control"/></td>
                                                                        <td><input type="email" id="txtEmail" class="form-control"/></td>
                                                                        <td><input type="number" id="txtWorkPhone" class="form-control"/></td>
                                                                        <td><input type="number" id="txtMobile" class="form-control"/></td>
                                                                        <td><input type="button" onclick="Add()" value="Add" class="btn btn-primary"/></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    <div id="res_cp"></div>
                                                <script type="text/javascript">
                                                    /*window.onload = function () {
                                                        //Build an array containing Customer records.
                                                        var customers = new Array();
                                                        customers.push(["1", "1", "1", "1", "1","1"]);
                                                        // customers.push(["John Hammond", "United States", "United States", "United States", "United States"]);
                                                        // customers.push(["John Hammond", "United States", "United States", "United States", "United States"]);
                                                        // customers.push(["John Hammond", "United States", "United States", "United States", "United States"]);

                                                        $.ajax({
                                                            type: "POST",
                                                            url: '../../api/customer/fetch_contact_person.php',
                                                            data:  "edit_id=" + <?php echo $edit_id;?> ,
                                                            success: function(data)
                                                            { 
                                                                alert("result is:"+data);
                                                                document.getElementById("res_cp").innerText = data;
                                                            }
	                                                    });
                                                        
                                                        var customers = document.getElementById("res_cp").innerHTML;
                                                        alert("cust:"+customers);
                                                        //Add the data rows.
                                                        for (var i = 0; i < customers.length; i++) 
                                                        {
                                                            AddRow(customers[i][0], customers[i][1],customers[i][2],customers[i][3],customers[i][4],customers[i][5]);
                                                        }
                                                    };*/
                                             
                                                    function Add() {
                                                        var txtSalutation = document.getElementById("txtSalutation");
                                                        var txtFirstName = document.getElementById("txtFirstName");
                                                        var txtLastName = document.getElementById("txtLastName");
                                                        var txtEmail = document.getElementById("txtEmail");
                                                        var txtWorkPhone = document.getElementById("txtWorkPhone");
                                                        var txtMobile = document.getElementById("txtMobile");

                                                        //alert("txtSalutation:"+txtSalutation);

                                                        if(txtSalutation.value!="" && txtFirstName.value!="" && txtLastName.value!="" && txtEmail.value!="" && txtWorkPhone.value!="" && txtMobile.value!="")
                                                        {
                                                          AddRow(txtSalutation.value,txtFirstName.value, txtLastName.value,txtEmail.value,txtWorkPhone.value,txtMobile.value);
                                                          txtSalutation.value = "";
                                                          txtFirstName.value = "";
                                                          txtLastName.value = "";
                                                          txtEmail.value = "";
                                                          txtWorkPhone.value = "";
                                                          txtMobile.value = "";
                                                        }
                                                        else
                                                        {
                                                          alert("Please Fill out all Contact Information ");
                                                        }
														
                                                        
                                                    };
                                             
                                                    function Remove(button) {
                                                        //Determine the reference of the Row using the Button.
                                                        var row = button.parentNode.parentNode;
                                                        var name = row.getElementsByTagName("TD")[0].innerHTML;
                                                        if (confirm("Do you want to delete: " + name)) {
                                             
                                                            //Get the reference of the Table.
                                                            var table = document.getElementById("tblCustomers");
                                             
                                                            //Delete the Table row using it's Index.
                                                            table.deleteRow(row.rowIndex);
                                                        }
                                                    };
                                             
                                                    function AddRow(salutation,firstname, lastname,email,phone,mobile) {
                                                        //Get the reference of the Table's TBODY element.
                                                        var tBody = document.getElementById("tblCustomers").getElementsByTagName("TBODY")[0];
                                             
                                                        //Add Row.
                                                        row = tBody.insertRow(-1);

                                                        //Add salutation cell.
                                                        var cell = row.insertCell(-1);
                                                        cell.innerHTML = salutation;
                                             
                                                        //Add Name cell.
                                                        var cell = row.insertCell(-1);
                                                        cell.innerHTML = firstname;
                                             
                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
                                                        cell.innerHTML = lastname;

                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
                                                        cell.innerHTML = email;

                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
														cell.innerHTML = phone;
														
														cell = row.insertCell(-1);
                                                        cell.innerHTML = mobile;
                                             
                                                        //Add Button cell.
                                                        cell = row.insertCell(-1);
                                                        var btnRemove = document.createElement("INPUT");
                                                        btnRemove.type = "button";
                                                        btnRemove.value = "Remove";
                                                        btnRemove.setAttribute("onclick", "Remove(this);");
														                            cell.appendChild(btnRemove);
														

                                                    }
                                                </script>
    
                                            </div>

														</div>
														
														<div class="tab-pane" id="tabIcon26" aria-labelledby="baseIcon-tab26">
														<div class="row"><div class="col-lg-8"><label class="col-form-label"> Remarks <span class="text-muted">(For Internal Use)</span></label> <textarea rows="3" id="ember2513" name="ember2513" class="form-control ember-text-area ember-view"><?php echo $remarks;?></textarea> </div></div>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
		                        </div>
							</div>

	                        <div class="form-actions right">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            <button type="button" class="btn btn-primary" onclick="Save_data();">
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
    var Salutation = document.getElementById("Salutation").value;
		var first_name = document.getElementById("first_name").value;
 		var last_name = document.getElementById("last_name").value;
 		var company_name = document.getElementById("company_name").value;
 		var Company_display_name = document.getElementById("Company_display_name").value;
		var Customer_work_phone = document.getElementById("Customer_work_phone").value;
		var Customer_mobile = document.getElementById("Customer_mobile").value;
		var Customer_website = document.getElementById("Customer_website").value;


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
    

    var convertedIntoArray = [];
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
    }

    if(Salutation!="" && first_name!="" && last_name!=""  && company_name!="" && Company_display_name!="" && Customer_work_phone!="" && Customer_mobile!=""
     && comboCustomerOrderingCurrency!=""    
    && bill_add1!="" && bill_add2!=""  && bill_country!=""  && bill_state!="" && bill_city!="" && bill_pin!="" && ship_add1!=""
    && ship_add2!=""  && ship_country!="" && ship_state!="" 
    && ship_city!="" && ship_pin!="" && gstin!="")
		{
      $.ajax({
							type: "POST",
							url: '../../api/customer/update_customer.php',
							data: $('#form').serialize()+'&contact_person_array=' + convertedIntoArray+'&edit_id='+<?php echo $edit_id;?>,
							success: function(data)
							{ 
								//console.log("result is:"+data);
								 if(data == "1")
								 {
									alert('Record Updated!');
								//window.location.href = "view_customer.php";
								 }
								 else
								 {
								 	alert('something went wrong');
								 }
							}
			});
    }
    else
    {
      //alert("please fill required feilds");
			if(Salutation == "")
			{
				$("#sal_error").text( "Salutation Require" );
			}
			if(first_name == "")
			{
				$("#fname_error").text( "First Name Require" );
			}
			if(last_name == "")
			{
				$("#lname_error").text( "Last Name Require" );
			}
			if(company_name == "")
			{
				$("#cname_error").text( "Company Name Require" );
			}
			if(Company_display_name == "")
			{
				$("#cdname_error").text( "Company Display Name Require" );
			}
			if(Customer_work_phone == "")
			{
				$("#cphone_error").text( "Phone Require" );
			}
      else
      {
        if (/^\d{10}$/.test(Customer_work_phone)) 
        {
          //$("#cphone_error").text( "10 Digit Mobile Require" );
        } 
        else{
          $("#cphone_error").text( "10 Digit Mobile Require" );
        }
      }
			if(Customer_mobile == "")
			{
				$("#cmob_error").text( "Customer Mobile Require" );
			}
      else
      {
        if (/^\d{10}$/.test(Customer_mobile)) 
        {
          
        } 
        else{
          $("#cmob_error").text( "10 Digit Mobile Require" );
        }
      }
			if(bill_add1 == "")
			{
				$("#badd1_error").text( "Require" );
			}
			if(bill_add2 == "")
			{
				$("#badd2_error").text( "Require" );
			}
			if(bill_pin == "")
			{
				$("#bpin_error").text( "Require" );
			}
			if(ship_add1 == "")
			{
				$("#sadd1_error").text( "Require" );
			}
			if(ship_add2 == "")
			{
				$("#sadd2_error").text( "Require" );
			}
			if(bill_pin == "")
			{
				$("#spin_error").text( "Require" );
			}
      
      if(comboCustomerOrderingCurrency == "")
      {
        $("#currency_error").text( "Require" );
      }
      if(gstin == "")
      {
        $("#gstin_error").text( "Require" );
      }
    }
}
function written(id)
	{
		//alert("id is:"+id);
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
		if(id == "Company_display_name")
		{
			$("#cdname_error").text( "" );
		}
		if(id == "Customer_email")
		{
			$("#cemail_error").text( "" );
		}
		if(id == "Customer_work_phone")
		{
			$("#cphone_error").text( "" );
		}
		if(id == "Customer_mobile")
		{
			$("#cmob_error").text( "" );
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
    if(id == "gstin")
		{
			$("#gstin_error").text( "" );
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