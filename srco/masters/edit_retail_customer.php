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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Retail Customer</h4>
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
                            <?php 
                                // select retail customer to edit
                                $select_retail_customer = "SELECT * FROM mstr_retail_customer WHERE retail_cust_idpk='".$_GET['id']."'";
                                $row = mysqli_fetch_row(mysqli_query($db, $select_retail_customer));
                            ?>
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row" style="display:none">
				                        	<label class="col-md-2 label-control" for="userinput1" >ID</label>
				                        	<div class="col-md-10 divcol">
												<input type="text" readonly class="form-control" value="<?php echo $_GET['id'] ?>" name="retail_id" id="id" />
				                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Name <span style="color:red;">*</span></label>
                                            <div class="col-md-10 divcol">
                                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $row[1]?>" />
                                                <!--<div id="name_error">-->
                                                <!--    <span class="alert alert-danger">Name is Require</span> -->
                                                <!--</div>-->
                                            </div>
				                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1">Address <span style="color:red;">*</span></label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control"  placeholder="Address" name="address" id="address"><?php echo $row[2] ?></textarea>
                                                <!--<div id="address_error">-->
                                                <!--    <span class="alert alert-danger">Address is Require</span> -->
                                                <!--</div>-->
                                            </div>
				                        </div>
									</div>
		                        </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Phone No <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="phone_no" id="phone_no" value="<?php echo $row[3] ?>" />
                                                <!--<div id="phone_no_error">-->
                                                <!--    <span class="alert alert-danger">Phone No Require</span> -->
                                                <!--</div>-->
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Mobile No.</label>
											<div class="col-md-9">
                                                <input type="number" class="form-control" pattern="[7-9]{1}[0-9]{9}"  placeholder="0" name="mobile_no" id="mobile_no" value="<?php echo $row[4] ?>" />
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Email ID</label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $row[5] ?>"/>
				                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Leadger Balance</label>
											<div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="leadger_balance" id="leadger_balance" value="<?php echo $row[6] ?>" />
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
		                        <div class="row">
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">IGST App.</label>
											<?php
											if($row[7] == 1) { ?>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="checkbox" class="form-control" name="igst" id="igst" style="height: calc(2.75rem + -15px);width: 15px" value="1" checked />&nbsp; Applicable
				                            </div>
											<?php } 
											else { ?>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="checkbox" class="form-control" name="igst" id="igst" style="height: calc(2.75rem + -15px);width: 15px" value="1" />&nbsp; Applicable
				                            </div>
											<?php } ?>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">GST No. <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control" name="gst_no" id="gst_no" value="<?php echo $row[8] ?>" />
                                                <!--<div id="gst_no_error">-->
                                                <!--    <span class="alert alert-danger">GST No Require</span> -->
                                                <!--</div>-->
				                            </div>
										</div>
									</div>									
                                </div>
                                <div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <?php
                                            if($row[9] == 1) { ?>
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; Active
                                            <?php } 
                                            else { ?>
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1">&nbsp; Active
                                            <?php } ?>
                                            </div>

                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <?php
                                            if($row[9] == 0) { ?>
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" checked>&nbsp; Inactive
                                            <?php } 
                                            else { ?>
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0">&nbsp; Inactive
                                            <?php } ?>
                                            </div>
				                        </div>
									</div>
							</div>
	                        <div class="form-actions right">
								
								<button type="button" name="add_supplier" class="btn btn-primary" onclick="submit_data();">
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
	if(igst.checked)
		igst.value="1";
	else 
		igst.value="0";
	console.log("IGST: "+ igst);
	
    if(name == "")
    {
        document.getElementById("name_error").style.display = "block";
		return;
    }
    if(address == "")
    {
        document.getElementById("address_error").style.display = "block";
		return;
    }
    if(phone_no == "")
    {
        document.getElementById("phone_no_error").style.display = "block";
		return;
    }
    if(gst_no == "")
    {
        document.getElementById("gst_no_error").style.display = "block";
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
		url: '../../api/customer/update_retail_customer.php',
		type: "POST",
		data: $('#form').serialize(),
		success: function(data)
		{
			console.log(data);

			if(data == "1")
			{
				// alert('Record Saved!');
				$.toast({
					heading: 'Success',
					text: 'Retail Customer Edited Successfully...!!',
					showHideTransition: 'slide',
					position: 'top-right',
					hideAfter: 5000,
					icon: 'success'
				})
				setTimeout(() => {
					window.location.href = "view_retail_customer.php";	
				}, 5000);
				
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