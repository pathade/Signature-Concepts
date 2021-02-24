<?php include('../../partials/header.php');?>

<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM mstr_supplier where supplier_id_fk='$edit_id'";
    $result_charges = mysqli_query($db, $sql_charges);
    while ($row=mysqli_fetch_row($result_charges))
    {

?>
<style>
    @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
    }

    .alert-danger {
        background-color: #E6808A!important;
        color: #5A1219!important;
        padding: 1px;
    }
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form1">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Supplier</h4>
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
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Supplier Name <span style="color:red;">*</span></label>
				                        	<div class="col-md-10 divcol">
												<input type="text" class="form-control"  placeholder="Supplier Name" name="supplier_name" id="supplier_name" value="<?php echo $row[1];?>" />
                                                <!--<div id="supplier_name_error">-->
                                                <!--    <span class="alert alert-danger">Supplier Name is Require</span> -->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Supplier Address <span style="color:red;">*</span></label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control"  placeholder="Supplier Address" name="supplier_address" id="supplier_address" value=""><?php echo $row[2];?></textarea>
                                                <!--<div id="supplier_address_error">-->
                                                <!--    <span class="alert alert-danger">Supplier Address is Require</span> -->
                                                <!--</div>-->
                                            </div>
				                        </div>
									</div>
		                        </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Phone No 1 <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Phone No 1" name="phone_no_1" id="phone_no_1" value="<?php echo $row[3];?>"/>
                                                <!--<div id="phone_no1_error">-->
                                                <!--    <span class="alert alert-danger">Phone No 1 Require</span> -->
                                                <!--</div>-->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Phone No 2 </label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Phone No 2" name="phone_no_2" id="phone_no_2" value="<?php echo $row[4];?>"/>
                                                <!-- <div id="phone_no2_error">
                                                    <span class="alert alert-danger">Phone No 2 Require</span> 
                                                </div> -->
                                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Mobile No.</label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Mobile No" name="mobile_no" id="mobile_no" value="<?php echo $row[5];?>"/>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Contact Person <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Contact Person" name="contact_person" id="contact_person" value="<?php echo $row[6];?>"/>
                                                <!--<div id="contact_person_error">-->
                                                <!--    <span class="alert alert-danger">Contact Person Require</span> -->
                                                <!--</div>-->
                                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">E-mail ID</label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Email" name="email" id="email" value="<?php echo $row[7];?>"/>
				                            </div>
			                       		</div>
			                       	</div>
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                            <!-- <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -13px);width: 20px" value="1" checked>&nbsp; Active
                                            </div>
                                            <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -13px);width: 20px" value="0">&nbsp; InActive
                                            </div> -->
                                            <?php 
                                    if($row[10] == 1 )
                                    {?>
                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" checked>&nbsp; Active
                                        </div>
                                  <?php
                                    }
                                    else{
                                        ?>
                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" >&nbsp; Active
                                        </div>
                                        <?php
                                    }
                                    if($row[10] == 0 )
                                    {
                                        ?>
                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" checked>&nbsp; InActive
                                        </div>
                                        <?php

                                    }
                                    else{

                                    
                                  
                                  ?>
                                  
                                  <div class="col-md-4" style="display: flex;font-size: 16px;">
                                    <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" >&nbsp; InActive
                                  </div>
                                    <?php } ?>
				                        </div>
									</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">PAN <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
				                        	    <input type="text" class="form-control" placeholder="PAN" name="pan" id="pan" value="<?php echo $row[8];?>"/>
                                                <!--<div id="pan_error">-->
                                                <!--    <span class="alert alert-danger">PAN Require</span> -->
                                                <!--</div>-->
                                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">IGST App.</label>
											<div class="col-md-9" style="display: flex;font-size: 16px;">
                                            <?php 
                                    if($row[18]==1)
                                    {
                                  ?>
                                    <input type="checkbox" class="form-control " value="1" name="igst_app" id="igst" style="height: calc(2.75rem + -15px);width: 15px" checked>&nbsp; Applicable
                                    <?php }
                                    else{
                                        ?>
                                        <input type="checkbox" class="form-control " value="1" name="igst_app" id="igst" style="height: calc(2.75rem + -15px);width: 15px">&nbsp; Applicable
                                        <?php
                                    }
                                    ?>
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">GST No. <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control" name="gst_no" id="gst_no" value="<?php echo $row[9];?>"/>
                                                <!--<div id="gst_no_error">-->
                                                <!--    <span class="alert alert-danger">GST No. Require</span> -->
                                                <!--</div>-->
				                            </div>
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
  
//   document.getElementById("supplier_name_error").style.display = "none";
//   document.getElementById("supplier_address_error").style.display = "none";
//   document.getElementById("phone_no1_error").style.display = "none";
// //   document.getElementById("phone_no2_error").style.display = "none";
//   document.getElementById("contact_person_error").style.display = "none";
//   document.getElementById("pan_error").style.display = "none";
//   document.getElementById("gst_no_error").style.display = "none";
  ///////////////////////////
});

function submit_data()
{
    var supplier_name = document.getElementById("supplier_name").value;
    var supplier_address = document.getElementById("supplier_address").value;
    var phone_no_1 = document.getElementById("phone_no_1").value;
    var phone_no_2 = document.getElementById("phone_no_2").value;
    var gst_no = document.getElementById("gst_no").value;
    var pan = document.getElementById("pan").value;
    var contact_person = document.getElementById("contact_person").value;

    if(!$('#mobile_no').val().match('[7-9]{1}[0-9]{9}'))  
        {
            // alert("noo");
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

    if(supplier_name != "" && supplier_address!="" && phone_no_1!="" && gst_no!="" && pan!="" && contact_person!="" && $('#mobile_no').val().match('[7-9]{1}[0-9]{9}') 
    && $('#email').val().match('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'))
    {
        $.ajax(
        {

            url: "../../api/supplier/update_supplier.php",
            type: 'POST',
            data : $('#form1').serialize() + '&edit_id=' + <?php echo $edit_id;?>,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data);
                if(data == "1")
                {
                    //alert("Supplier Updated!");
                    //window.location.href="view_supplier.php";
                    $.toast({
                        heading: 'Success',
                        text: 'Supplier Updated!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'success'
                    })
                    setTimeout(() => {
                        window.location.href = "view_supplier.php";    
                    }, 5000);
                }
                else
                {
                    //alert("Please Enter Valid Details");
                    $.toast({
                        heading: 'Error',
                        text: 'Something went wrong...!!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                }

            },
          
        });
    }
    else
    {
        if(supplier_name == "")
        {
            //document.getElementById("supplier_name_error").style.display = "block";
            $.toast({
                        heading: 'Error',
                        text: 'Supplier Name Require.',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        if(supplier_address == "")
        {
            //document.getElementById("supplier_address_error").style.display = "block";
            $.toast({
                        heading: 'Error',
                        text: 'Supplier Address Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        if(phone_no_1 == "")
        {
            //document.getElementById("phone_no1_error").style.display = "block";
            $.toast({
                        heading: 'Error',
                        text: 'Phone1 Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        // if(phone_no_2 == "")
        // {
        //     //document.getElementById("phone_no2_error").style.display = "block";
        //     $.toast({
        //                 heading: 'Error',
        //                 text: 'Phone2 Require',
        //                 showHideTransition: 'slide',
        //                 position: 'top-right',
        //                 hideAfter: 5000,
        //                 icon: 'error'
        //             })
        // }
        if(contact_person == "")
        {
            // document.getElementById("contact_person_error").style.display = "block";
            $.toast({
                        heading: 'Error',
                        text: 'Contact Person Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        if(pan == "")
        {
            //document.getElementById("pan_error").style.display = "block";
            $.toast({
                        heading: 'Error',
                        text: 'PAN Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        if(gst_no == "")
        {
            //document.getElementById("gst_no_error").style.display = "block";
            $.toast({
                        heading: 'Error',
                        text: 'GST No. Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }

        if(!$('#mobile_no').val().match('[7-9]{1}[0-9]{9}'))  
        {
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
        if(!$('#email').val().match('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'))  
        {
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
    }


    

}

</script>
<?php
  if (isset($_POST['add_supplier']))
  {
    extract($_POST);
    // $uid = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    
 $sql = "INSERT INTO `mstr_supplier`(`name`, `address`, `phone_1`, `phone_2`, `mobile_no`, `contact_person`, `email`, `pan`, `gst_no`, 
										`status`, `add_date`, `add_time`, `added_by`, `update_date`, `update_time`, `updated_by`) 
			VALUES ('$supplier_name','$supplier_address','$phone_no_1','$phone_no_2','$mobile_no','$contact_person','$email','$pan','$gst_no',
			'0','','','','','','')";
    $result = mysqli_query($db, $sql);
    if($result)
    {
    //   $sql="select sno from mstr_data_series where name='tax' and d='1' LIMIT 1;";
    //   $result = mysqli_query($db, $sql);
    //   $row = mysqli_fetch_assoc($result);
    //   $sno = $row['sno'];
    //   $sno = $sno + 1;
    //   $sql = "update mstr_data_series set sno='$sno' where name='tax'";
    //   mysqli_query($db, $sql);
      ?>
        <script language="javascript">
		
          $.toast({
                  heading: 'Success',
                  text: 'Supplier Added successfully..!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: false,
                  icon: 'success'
              })
        </script>
      <?php
    }
    else
    {
      ?>
        <script language="javascript">
        $.toast({
                heading: 'Error',
                text: 'Please try Again..!!',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: false,
                icon: 'error'
            })
        </script>
      <?php
    }
  }
?>
<?php } ?>