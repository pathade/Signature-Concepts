<?php include('../../partials/header.php');?>
<style>
     .alert-danger {
        background-color: #E6808A!important;
        color: #5A1219!important;
        padding: 1px;
    }
    @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
    }    
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Retail Customer</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
									<div class="col-md-12">
										<!-- <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >ID</label>
				                        	<div class="col-md-10 divcol">
												<input type="text" class="form-control"  placeholder="ID" name="id" id="id" />
				                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Name <span style="color:red;">*</span></label>
                                            <div class="col-md-10 divcol">
                                                <input type="text" class="form-control"  placeholder="Name" name="name" id="name" />
                                                <!-- <div id="name_error">
                                                    <span class="alert alert-danger">Name is Require</span> 
                                                </div> -->
                                            </div>
				                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Address <span style="color:red;">*</span></label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control"  placeholder="Address" name="address" id="address"></textarea>
                                                <!-- <div id="address_error">
                                                    <span class="alert alert-danger">Address is Require</span> 
                                                </div> -->
                                            </div>
				                        </div>
									</div>
		                        </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Phone No <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <input type="number" min=0 class="form-control"  placeholder="0" name="phone_no" id="phone_no" />
                                                <!-- <div id="phone_no_error">
                                                    <span class="alert alert-danger">Phone No Require</span> 
                                                </div> -->
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Mobile No. <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="number" min=0 class="form-control" pattern="[7-9]{1}[0-9]{9}"  placeholder="0" name="mobile_no" id="mobile_no" />
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Email ID <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
				                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Leadger Balance <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="leadger_balance" id="leadger_balance" />
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
		                        <div class="row">
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">IGST App.</label>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="checkbox" class="form-control" name="igst" id="igst" style="height: calc(2.75rem + -15px);width: 15px" value=1 />&nbsp; Applicable
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">GST No. <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control" name="gst_no" id="gst_no" />
                                                <!-- <div id="gst_no_error">
                                                    <span class="alert alert-danger">GST No Require</span> 
                                                </div> -->
				                            </div>
										</div>
									</div>									
                                </div>
                                <div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; Active
                                            </div>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0">&nbsp; InActive
                                            </div>
				                        </div>
									</div>
							</div>
	                        <div class="form-actions right">
								
								<button type="button" name="add_supplier" class="btn btn-primary" id="btn" onclick="submit_data();">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
								
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            
	                        </div>
	                    </form>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</form>
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>
<script>
$(document).ready(function()
{
  

  //hide all error span
  
//   document.getElementById("name_error").style.display = "none";
//   document.getElementById("address_error").style.display = "none";
//   document.getElementById("phone_no_error").style.display = "none";
//   document.getElementById("gst_no_error").style.display = "none";
  ///////////////////////////
});

function submit_data()
{
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var phone_no = document.getElementById("phone_no").value;
    var gst_no = document.getElementById("gst_no").value;
    var igst = document.getElementById("igst");
	var email = document.getElementById("email").value;
	var leadger_balance = document.getElementById("leadger_balance").value;
	if(igst.checked)
		igst.value="1";
	else 
		igst.value="0";
	console.log("IGST: "+ igst);
	
    if(name == "")
    {
		$.toast({
                  heading: 'Error',
                  text: 'Please Enter Name!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
       // document.getElementById("name_error").style.display = "block";
		return;
    }
    if(address == "")
    {
		$.toast({
                  heading: 'Error',
                  text: 'Please Enter Address!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      //  document.getElementById("address_error").style.display = "block";
		return;
    }
	if (leadger_balance == "") {
		$.toast({
                  heading: 'Error',
                  text: 'Ledger Balance is required.!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
	}
    if(phone_no == "")
    {
		$.toast({
                  heading: 'Error',
                  text: 'Please Enter Phone No.!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
       // document.getElementById("phone_no_error").style.display = "block";
		return;
    }
    if(gst_no == "")
    {
		$.toast({
                  heading: 'Error',
                  text: 'Please Enter GST No.!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
        //document.getElementById("gst_no_error").style.display = "block";
		return;
    }
    if(!$('#mobile_no').val().match('[7-9]{1}[0-9]{9}'))  {
        $.toast({
                  heading: 'Error',
                  text: 'Please put 10 digit valid mobile number...!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
        return;
    } 
    if(!$('#email').val().match('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'))  {
        $.toast({
                  heading: 'Error',
                  text: 'Please enter valid Email Address...!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
        return;
    }  

	$.ajax({
		url: '../../api/customer/add_retail_customer.php',
		type: "POST",
		data: $('#form').serialize(),
		success: function(data)
		{
			console.log(data);

			if(data == "1")
			{
				$.toast({
					heading: 'Success',
					text: 'Retail Customer Added Successfully...!!',
					showHideTransition: 'slide',
					position: 'top-right',
					hideAfter: 5000,
					icon: 'success'
				})
				setTimeout(() => {
					window.location.href = "view_retail_customer.php";	
				}, 5000);

				// disable button after inserting to avoid re-submission
				$('#btn').attr('disabled', true);
				// alert('Record Saved!');
				// window.location.href="view_retail_customer.php";
				
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
</script>
<script>

	function written(id)
	{
		//alert("id is:"+id);
		if(id == "item_name")
		{
			$("#iname_error").text( "" );
		}
		if(id == "HSN")
		{
			$("#hsn_error").text( "" );
		}
		if(id == "nks_code")
		{
			$("#nkscode_error").text( "" );
		}
		if(id == "design_code")
		{
			$("#designcode_error").text( "" );
		}
		if(id == "final_product")
		{
			$("#finalcode_error").text( "" );
		}
		if(id == "size")
		{
			$("#size_error").text( "" );
		}
		if(id == "gst_group")
		{
			$("#GST_error").text( "" );
		}
		if(id == "sale_rate")
		{
			$("#sale_error").text( "" );
		}
		if(id == "purchase_rate")
		{
			$("#purchase_error").text( "" );
		}
		
		
		if(id == "HSN")
		{
			$("#hsn_error").text( "" );
		}if(id == "HSN")
		{
			$("#hsn_error").text( "" );
		}
	}
</script>