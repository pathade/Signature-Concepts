<?php include('../../partials/header.php');?>

<style>
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
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Bank Master</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
                            <!-- select bank id -->
                            <?php
                                $select_id = "SELECT * FROM mstr_bank WHERE bank_idpk='".$_GET['id']."'";
                                $rows = mysqli_fetch_row(mysqli_query($db, $select_id));
                             ?>
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
									<div class="col-md-12" >
                                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="bank_id" >Bank Id</label>
				                        	<div class="col-md-10 divcol">
                                                <input type="text" class="form-control" value="<?php echo $_GET['id']; ?>" name="bank_id" id="bank_id" readonly/>
				                            </div>
                                        </div>
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="bank_name" >Bank Name <span style="color:red;"> *</span></label>
				                        	<div class="col-md-10 divcol">
                                                <input type="text" class="form-control"  value="<?php echo $rows[2]; ?>" name="bank_name" id="bank_name"/>
                                                <!-- <div id="name_error">
                                                    <span class="alert alert-danger p-0">Name is Require</span> 
                                                </div> -->
				                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="acc_no" >Account no. <span style="color:red;"> *</span></label>
                                            <div class="col-md-10 divcol">
                                            <input type="text" class="form-control"  value="<?php echo $rows[1]; ?>" name="account_no" id="acc_no" />
                                            <!-- <div id="account_no_error">
                                                <span class="alert alert-danger p-0">Account No Require</span> 
                                            </div> -->
                                            </div>
				                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="bank_address" >Bank Address <span style="color:red;"> *</span></label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" name="bank_address" id="bank_address"><?php echo $rows[3]; ?></textarea>
                                                <!-- <div id="address_error">
                                                    <span class="alert alert-danger p-0">Address is Require</span> 
                                                </div> -->
                                            </div>
				                        </div>
									</div>
		                        </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="phone_no1">Phone No 1 <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <input type="number" class="form-control"  value="<?php echo $rows[4]; ?>" name="phone_no1" id="phone_no1" />
                                                <!-- <div id="phone_no1_error">
                                                    <span class="alert alert-danger p-0">Phone No Require</span> 
                                                </div> -->
				                            </div>
				                        </div>
				                    </div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="phone_no2">Phone 2 <span style="color:red;"> *</span></label>
											<div class="col-md-9">
                                                <input type="number" class="form-control"  value="<?php echo $rows[5]; ?>" name="phone_no2" id="phone_no2" />
                                                <!-- <div id="phone_no2_error">
                                                    <span class="alert alert-danger p-0">Phone No Require</span> 
                                                </div> -->
                                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="ifsc_code">IFSC Code <span style="color:red;"> *</span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  value="<?php echo $rows[6]; ?>" name="ifsc_code" id="ifsc_code" />
                                                <!-- <div id="ifsc_error">
                                                    <span class="alert alert-danger p-0">IFSC code Require</span> 
                                                </div> -->
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
                                
                                <div class="col-md-6">
                                        <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Status </label>
                                  <?php 
                                    if($rows[7] == 1 )
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
                                    if($rows[7] == 0 )
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
                            
	                        <div class="form-actions right">
								
								<button type="button" class="btn btn-primary" onclick="submit_data()">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
								
	                            <button type="reset" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
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

<script language="javascript">
$(document).ready(function()
{
  //hide all error span
  
//   document.getElementById("name_error").style.display = "none";
//   document.getElementById("account_no_error").style.display = "none";
//   document.getElementById("address_error").style.display = "none";
//   document.getElementById("phone_no1_error").style.display = "none";
//   document.getElementById("phone_no2_error").style.display = "none";
//   document.getElementById("ifsc_error").style.display = "none";
  ///////////////////////////

});

function submit_data()
{
    var bank_name = document.getElementById("bank_name").value;
    var account_no = document.getElementById("acc_no").value;
    var bank_address = document.getElementById("bank_address").value;
    var phone_no1 = document.getElementById("phone_no1").value;
    var phone_no2 = document.getElementById("phone_no2").value;
    var ifsc_code = document.getElementById("ifsc_code").value;
    var expression = /^[0]*[789]{1}[0-9]{9}$/;
    if(bank_name!="" && account_no!="" && bank_address!="" && phone_no1!="" && ifsc_code!="" && expression.test(phone_no1) && expression.test(phone_no2))
    {
        $.ajax({
            url: '../../api/bank/edit_bank.php',
            type: "POST",
            data: $('#form').serialize(),
            success: function(data)
            { 
                console.log(data);
                if(data == "1")
                {
                    $.toast({
                        heading: 'Success',
                        text: 'Bank Edited Successfully...!!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'success'
                    })
                    setTimeout(() => {
                        window.location.href = "view_bank.php";    
                    }, 5000);
                }
                else
                {
                    //alert('something went wrong');
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
        if(bank_name == "")
        {
            //document.getElementById("name_error").style.display = "block";
            ///return false;
            $.toast({
                        heading: 'Error',
                        text: 'Bank Name Require!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
        }

        if(account_no == "")
        {
            //document.getElementById("account_no_error").style.display = "block";
            //return false;
            $.toast({
                        heading: 'Error',
                        text: 'Account Number Require!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
        }

        if(bank_address == "")
        {
            //document.getElementById("address_error").style.display = "block";
            //return false;
            $.toast({
                        heading: 'Error',
                        text: 'Bank Address Require!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
        }

        if(phone_no1 == "" || !expression.test(phone_no1))
        {
            //document.getElementById("phone_no1_error").style.display = "block";
            //return false;
            $.toast({
                        heading: 'Error',
                        text: 'Please Enter Valid Phone Number!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
        }

        if(phone_no2 == "" || !expression.test(phone_no2))
        {
           // document.getElementById("phone_no2_error").style.display = "block";
           // return false;
           $.toast({
                        heading: 'Error',
                        text: 'Please Enter Valid Phone Number 2!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
        }

        if(ifsc_code == "")
        {
            //document.getElementById("ifsc_error").style.display = "block";
            //return false;
            $.toast({
                        heading: 'Error',
                        text: 'IFSC Code Require!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
        }
        
    }
}
</script>


