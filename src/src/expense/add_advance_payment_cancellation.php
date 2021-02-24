<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Advance Payment Cancellation</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="adv_pay_cancel_form">
	                    	<div class="form-body">
                                <div class="row" style="display:none;">
                                    <div class="col-md-6">
                                        <?php
                                             if ($flag == 0) {
                                            $sql = "SELECT * FROM mstr_data_series where name='exp_advance_pay_cancel' and flag='0' ";
                                             }
                                             else {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_advance_pay_cancel' and flag='1' ";
                                             }
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Advance Pay Cancel No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="apc_no" class="form-control " placeholder="" name="apc_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1">Type<span style="color:red;">* </span> </label>
                                                    <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                        <input type="radio" class="form-control " name="type" id="type" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="Finance" >&nbsp; Finance 
                                                    </div>
                                                    <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                        <input type="radio" class="form-control " name="type" id="type" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="Expense">&nbsp; Expenses
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly>
                                                            <option value="Signature Concepts LLP" selected disabled>Signature Concepts LLP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Advance Payment No</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="ad_no" class="select2" data-toggle="select2" name="ad_no" onchange="getDetails1()">
                                                    <!-- <option value="" disabled selected>Select </option> -->
                                                    <?php

                                                    //     $sql = "SELECT * FROM exp_advance_payment where cancel_status != 1";
                                                    //     $result = mysqli_query($db,$sql);
                                                    //     while($row2 = mysqli_fetch_array($result))
                                                    //     {   
                                                    //         ?>
                                                    <!-- //         <option value="<?php  //echo $row2['0'];?>"><?php //echo  $row2['0'] ?></option> -->
                                                             <?php
                                                    //     }
                                                    // ?>
												</select>
                                                <input type="hidden" class="form_control" id="ad_no_hidden">
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Amount </label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control" placeholder="0" id="amount" name="amount" />
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-12">
				                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1">Supplier/Vendor Name </label>
				                        	<div class="col-md-10 divcol">
                                                <select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-12">
				                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1">Payment Type </label>
				                        	<div class="col-md-10 divcol">
                                                <input type="text" class="form_control" id="pay_type" name="pay_type" style="border: none;" />
                                                    
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Payment Type Cancellation Reason <span style="color:red;">* </span></label>
				                        	<div class="col-md-9 divcol">
                                                <textarea type="text" class="form-control" rows="2" id="pay_type_cancel_reason" name="pay_type_cancel_reason"></textarea>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
	                        <div class="form-actions right">
								
                                <button type="button" class="btn btn-primary" name="add" onClick="save_data()">
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
</section>
</div>
	    </div>
    </div>
    
    

<?php include('../../partials/footer.php');?>

<script>
function getDetails1()
  {
      //alert("hii");
    var advance_pay_id1 = document.getElementById("ad_no").value;
    document.getElementById("ad_no_hidden").value = advance_pay_id1;
    //alert("advance_pay_id:"+advance_pay_id1);
    $.ajax(
            {
                url: "../../api/global/get_exp_adv_pay_details.php",
                type: 'POST',
                data : "adv_pay_id_fk=" + advance_pay_id1 ,
                dataType:'text',  
                success: function(data) 
                { 
                    // alert("data:"+data);
                    console.log(data);
                    var g = data.split("#");
                    $('#vendor_id_fk').html(g[0]);
                    document.getElementById("ad_no").value = g[1];
                    document.getElementById("amount").value = g[1];
                    document.getElementById("pay_type").value = g[2];
                },
            });
  }

  function save_data()
{
      var branch = document.getElementById("branch").value;
      var adv_pay_id_fk1 = document.getElementById("ad_no").value;
      var vendor_id_fk = document.getElementById("vendor_id_fk").value;
      var amount = document.getElementById("amount").value;
      var type = document.getElementById("type").value;
      var pay_type = document.getElementById("pay_type").value;
      var apc_no = document.getElementById("apc_no").value;
      var ad_no = document.getElementById("ad_no_hidden").value;
      var pay_type_cancel_reason = document.getElementById("pay_type_cancel_reason").value;
    //alert("ad_no:"+ad_no);
    //alert("branch:"+branch);

    var paytype = $("input[name='type']:checked").val();
    // alert("paytype:"+paytype);

    if(branch!="" && paytype!= undefined && pay_type_cancel_reason!="")
    {
        $.ajax(
        {
            url: "../../api/expense/save_advance_payment_cancellation.php",
            type: 'POST',
            data : $('#adv_pay_cancel_form').serialize()+'&branch='+branch+ '&adv_pay_id_fk='+ad_no + '&vendor_id_fk='+vendor_id_fk
            + '&amount='+amount+ '&type='+type+ '&pay_type='+pay_type,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data);
                if(data == "1")
                {
                    $.toast({
                            heading: 'Success',
                            text: 'Data Added Successfully!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_advance_payment_cancellation.php";    
                        }, 5000);
                    // alert("Data Added Successfully!");
                    // window.location.href="view_advance_payment_cancellation.php";
                }
                else
                {
                    $.toast({
                        heading: 'Error',
                        text: 'Please Enter Valid Details',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                    //   alert("Please Enter Valid Details");
                }
            
            },
            
        });
    }
    else
    {
        if(paytype == undefined)
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Type as finance or Expense',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(pay_type_cancel_reason == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Enter Advance Payment Cancellation Reason',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        
    }
    
}
</script>
<script>
$('input[type=radio][name=type').change(function() {
    var pay_type = $("input[name='type']:checked").val();

    $.ajax(
            {
                url: "../../api/expense/fetch_advance_payment_no.php", 
                type: 'POST',
                data : "pay_type=" + pay_type ,
                dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data);
                    console.log(data);
                    $('#ad_no').html(data); 
                    
                },
                
            });
    if (this.value == 'Cheque') 
    {
        //finance = 1;
        //alert("Allot Thai Gayo Bhai Cheque");
        document.getElementById("cheque_amt").disabled = false;
        document.getElementById("cheque_no").disabled = false;
        document.getElementById("cheque_date").disabled = false;
    }
    else if (this.value == 'Cash/Card') 
    {
        //alert("Transfer Thai Gayo Cash/Card");
        document.getElementById("cash_amt").disabled = false;
        document.getElementById("card_amt").disabled = false;
        document.getElementById("card_no").disabled = false;
    }
});
</script>