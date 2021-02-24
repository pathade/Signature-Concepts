<?php include('../../partials/header.php');?>

<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Customer</h4>
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
	                    <form class="form form-horizontal">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                               
	                    		<div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" style="color:red;">Primary Contact *</label>
				                        	<div class="col-md-3">
                                            <select class="select2 form-control block" id="Salutation" class="select2" data-toggle="select2" >
                                              <option value="" disabled selected>Salutation </option>
											   <option value="PCS">Mr</option>
											   <option value="Mrs">Mrs</option>
											   <option value="Ms">Ms</option>
											   
											   <option value="Miss">Miss</option>
											   <option value="Dr">Dr</option>
											

											</select>
				                            </div>
                                            <div class="col-md-3">
				                            	<input type="text" class="form-control " placeholder="First Name" name="first_name" id="first_name">
				                            </div>
                                            <div class="col-md-3">
				                            	<input type="text" class="form-control " placeholder="Last Name" name="last_name" id="last_name">
				                            </div>
				                        </div>
				                    </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Company Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " placeholder="Company Name" name="company_name" id="company_name">
                                                </div>
			                       		</div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer Display Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " placeholder="Vender Display Name" name="vender_display_name" id="vender_display_name">
                                                </div>
			                       		</div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " placeholder="Vender Email" name="vender_email" id="vender_email">
                                                </div>
			                       		</div>
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer Phone </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control " placeholder="Work Phone" name="vender_work_phone" id="vender_work_phone">
                                                </div>
												<div class="col-md-5">
                                                    <input type="text" class="form-control " placeholder="Mobile" name="vender_mobile" id="vender_mobile">
                                                </div>
			                       		</div>
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Website</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " placeholder="Website" name="vender_website" id="vender_website">
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
																		<label class="col-md-3 label-control" for="userinput1">Company Name</label>
																			<div class="col-md-9">
																			<select  class="form-control" id="comboCustomerOrderingCurrency" name ="comboCustomerOrderingCurrency" data-toggle="select2">
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
																				<input type="text" class="form-control " placeholder="Opening Balance" name="vender_opening_balance" id="vender_opening_balance">
																			</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="userinput1">Payment Terms</label>
																			<div class="col-md-9">
																				<input type="text" class="form-control " placeholder="Payment Terms" name="payment_terms" id="payment_terms">
																			</div>
																	</div>
														
																	<div class="form-group row">
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
																	</div>
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
                    <label for="txtCustomerBillingAddressLine1" class="col-lg-4 col-form-label ">Address Line 1</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine1" id="txtCustomerBillingAddressLine1" placeholder="Address Line 1"  >
                    </div>
                </div>
               

                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine2" class="col-lg-4 col-form-label ">Address Line 2</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine2" id="txtCustomerBillingAddressLine2" placeholder="Address Line 2" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingAddressLine3" class="col-lg-4 col-form-label ">Address Line 3</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingAddressLine3" id="txtCustomerBillingAddressLine3" placeholder="Address Line 3" >
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >Country</label>
                    <div class="col-lg-8">

					  <select class=" form-control block" id="comboBillingCountry"  onchange="getStates()" >
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
                  <label  class="col-lg-4 col-form-label" >State</label>
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
                    <label for="txtCustomerBillingCity" class="col-lg-4 col-form-label">City</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingCity" id="txtCustomerBillingCity" placeholder="City"  >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerBillingPin" class="col-lg-4 col-form-label">PIN</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerBillingPin" id="txtCustomerBillingPin" placeholder="PIN"  >
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
                    <label for="txtCustomerShippingAddressLine1" class="col-lg-4 col-form-label">Address Line 1</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine1" id="txtCustomerShippingAddressLine1" placeholder="Address Line 1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine2" class="col-lg-4 col-form-label">Address Line 2</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine2" id="txtCustomerShippingAddressLine2" placeholder="Address Line 2"  >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingAddressLine3" class="col-lg-4 col-form-label">Address Line 3</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingAddressLine3" id="txtCustomerShippingAddressLine3" placeholder="Address Line 3" >
                    </div>
                </div>
                <div class="form-group row">
                  <label  class="col-lg-4 col-form-label" >Country</label>
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
                  <label  class="col-lg-4 col-form-label" >State</label>
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
                    <label for="txtCustomerShippingCity" class="col-lg-4 col-form-label">City</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingCity" id="txtCustomerShippingCity" placeholder="City"  >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtCustomerShippingPin" class="col-lg-4 col-form-label">PIN</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="txtCustomerShippingPin" id="txtCustomerShippingPin" placeholder="PIN" >
                    </div>
                </div>
          </div>
        </div>
														</div>
														<div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
														<div class="form-row">
                                                        <div class="table-responsive">
                                                            <table id="tblCustomers" cellpadding="0" cellspacing="0" border="1">
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
                                                                        <td><input type="text" id="txtSalutation" /></td>
                                                                        <td><input type="text" id="txtFirstName" /></td>
                                                                        <td><input type="text" id="txtLastName" /></td>
                                                                        <td><input type="text" id="txtEmail" /></td>
                                                                        <td><input type="text" id="txtWorkPhone" /></td>
                                                                        <td><input type="text" id="txtMobile" /></td>
                                                                        <td><input type="button" onclick="Add()" value="Add" /></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
    
                                                <script type="text/javascript">
                                                    window.onload = function () {
                                                        //Build an array containing Customer records.
                                                        var customers = new Array();
                                                        // customers.push(["John Hammond", "United States"]);
                                                        // customers.push(["Mudassar Khan", "India"]);
                                                        // customers.push(["Suzanne Mathews", "France"]);
                                                        // customers.push(["Robert Schidner", "Russia"]);
                                             
                                                        //Add the data rows.
                                                        for (var i = 0; i < customers.length; i++) {
                                                            AddRow(customers[i][0], customers[i][1],customers[i][2],customers[i][3],customers[i][4]);
                                                        }
                                                    };
                                             
                                                    function Add() {
                                                        var txtSalutation = document.getElementById("txtSalutation");
                                                        var txtFirstName = document.getElementById("txtFirstName");
                                                        var txtLastName = document.getElementById("txtLastName");
                                                        var txtEmail = document.getElementById("txtEmail");
														var txtWorkPhone = document.getElementById("txtWorkPhone");
														var txtMobile = document.getElementById("txtMobile");
														
                                                        AddRow(txtSalutation.value,txtFirstName.value, txtLastName.value,txtEmail.value,txtWorkPhone.value,txtMobile.value);
                                                        txtSalutation.value = "";
                                                        txtFirstName.value = "";
                                                        txtLastName.value = "";
                                                        txtEmail.value = "";
														txtWorkPhone.value = "";
														txtMobile.value = "";
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
                                             
                                                    function AddRow(sr,name, country,fromdate,todate) {
                                                        //Get the reference of the Table's TBODY element.
                                                        var tBody = document.getElementById("tblCustomers").getElementsByTagName("TBODY")[0];
                                             
                                                        //Add Row.
                                                        row = tBody.insertRow(-1);

                                                        //Add sr cell.
                                                        var cell = row.insertCell(-1);
                                                        cell.innerHTML = txtSalutation.value;
                                             
                                                        //Add Name cell.
                                                        var cell = row.insertCell(-1);
                                                        cell.innerHTML = txtFirstName.value;
                                             
                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
                                                        cell.innerHTML = txtLastName.value;

                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
                                                        cell.innerHTML = txtEmail.value;

                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
														cell.innerHTML = txtWorkPhone.value;
														
														cell = row.insertCell(-1);
                                                        cell.innerHTML = txtMobile.value;
                                             
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
														<div class="row"><div class="col-lg-8"><label class="col-form-label"> Remarks <span class="text-muted">(For Internal Use)</span></label> <textarea rows="3" id="ember2513" class="form-control ember-text-area ember-view"></textarea> </div></div>	
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
alert(saddr2);
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