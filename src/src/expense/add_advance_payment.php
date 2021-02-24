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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:20px;">New Advance Payment</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="adv_pay_form">
	                    	<div class="form-body">
                                <div class="row" style="display:none;">
                                    <div class="col-md-6">
                                        <?php
                                            if ($flag == 0) {
                                            $sql = "SELECT * FROM mstr_data_series where name='exp_advance_payment' and flag = '0' ";
                                            }
                                            else {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_advance_payment' and flag = '1' ";
                                            }
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Advacne Payment No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="ap_no" class="form-control " placeholder="" name="ap_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1"> Type <span style="color:red;">*</span></label>
                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                        <input type="radio" class="form-control " name="type" id="finance" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="Finance" onchange="getSuppVendName(this.value)">&nbsp; Finance 
                                                    </div>
                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                        <input type="radio" class="form-control " name="type" id="expenses" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="Expense" onchange="getSuppVendName(this.value)">&nbsp; Expenses
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Cheque Date <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="cheque_date" name="cheque_date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
				                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1">Payment Type <span style="color:red;">*</span></label>
				                        	<div class="col-md-10 divcol">
												<select class="form-control" id="payment_type" name="payment_type"  onchange="getpaymode(this.value)">
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Cheque">Cheque</option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-12">
				                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1">Supplier/Vendor Name <span style="color:red;">*</span></label>
				                        	<div class="col-md-10 divcol">
                                                <select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <!-- <?php
                                                        if ($flag == 0) {
                                                        $sql = "SELECT  * FROM mstr_vendor where flag = '0' ";
                                                        }
                                                        else {
                                                            $sql = "SELECT  * FROM mstr_vendor where flag = '1' ";
                                                        }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'].". ".$row1['2']." ".$row1['3'];?></option>
                                                            <?php
                                                        }
                                                    ?> -->
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Manual Credit No <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                            <input type="text" class="form-control" id="manual_credit_no" value="0">
												<!-- <select class="form-control" id="manual_credit_no" name="manual_credit_no" >
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="ABC123">ABC123 </option>
                                                    <option value="SDF123">SDF123 </option>
												</select> -->
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Manual Credit Amt <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control" placeholder="0" id="manual_credit_amt" name="manual_credit_amt" />
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">PO NO <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
                                                         if ($flag == 0) {
                                                        $sql = "SELECT * FROM exp_purchase_order where flag = '0' ";
                                                         }
                                                         else {
                                                            $sql = "SELECT * FROM exp_purchase_order where flag = '1' ";
                                                         }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row2['0'];?>"><?php echo  $row2['20'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Amount <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control" placeholder="0" id="amount" name="amount" />
				                            </div>
				                        </div>
				                    </div>
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Bank <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <?php
                                                        $option="<option value=''>Select Bank</option>";
                                                        echo $option;
                                                        if ($flag == 0) {
                                                        $sql =  "SELECT distinct bank_idpk,bank_name FROM mstr_bank where flag = '0' order by bank_name asc";  // Use select query here 
                                                        }
                                                        else {
                                                            $sql =  "SELECT distinct bank_idpk,bank_name FROM mstr_bank where flag = '1' order by bank_name asc";
                                                        }
                                                        $result = mysqli_query($db, $sql);
                                                        while($row3 = mysqli_fetch_array($result))
                                                        {
                                                            $option="<option value='".$row3['bank_idpk']."'>".$row3['bank_name']."</option>";
                                                            echo $option;
                                                        } 
                                                    ?>  												
												</select>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Account No <span style="color:red;">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" >
                                                
                                                </select>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Cheque No <span style="color:red;">*</span></label>
											<div class="col-md-9">
											<input type="text" id="cheque_no" class="form-control " placeholder="0" name="cheque_no" >
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control block" id="authorised_by" name="authorised_by">
                                                        <option value="" disabled selected>Select </option>
                                                        <?php 
                                                        if ($flag == 0) {
                                                            $h = "SELECT * FROM mstr_employee where flag ='0' ";
                                                        }
                                                        else {
                                                            $h = "SELECT * FROM mstr_employee where flag ='1' ";
                                                        }
                                                            $jk = mysqli_query($db,$h);
                                                            while($ml = mysqli_fetch_array($jk))
                                                            {
                                                        ?>
                                                                <option value="<?php echo $ml['emp_id_pk']?>"><?php echo $ml['emp_name']?></option>
                                                                
                                                        <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
				                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark </label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" id="remark" name="remark"></textarea>
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

    function getSuppVendName(val)
    {
        
            $.ajax({
                url: '../../api/expense/get_supp_vend_name.php',
                type: 'POST',
                data: { 'val': val },
                success: function (data){
                    $('#vendor_id_fk').html(data); 
                }
            })
       
        
    }


	function getAccountNo()
  {
     
    var bid = document.getElementById("bank_name").value;
    //alert(bid)
    document.getElementById("account_no").length = 0;
    // $.ajax(
    //   {
    //     url: "../../api/global/get_account_by_bank.php",
    //     type: 'GET',
    //     data : 
    //     {
    //       'bank_name' : bid
    //     },
    //     success: function(data)
    //     {
    //     //   $.each(data, function(index) 
    //     //   {
    //     //     var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
    //     //     $('#account_no').append(newOption).trigger('change.select2');
           
    //     //   });
    //         $('#account_no').html(data);
    //     },
    //   }
    // );
    // var bid1 = document.getElementById("bank_name1").value;
    // document.getElementById("account_no1").length = 0;
    $.ajax(
      { 
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid
        },
        dataType:'text',
        success: function(data)
        {
          //alert(data);
          $('#account_no').html(data);
          // $.each(data, function(index) 
          // {
          //   var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
          //   $('#account_no').append(newOption).trigger('change.select2');
           
          // });
        },
        error : function(request,error)
        {}
      }
    );
  }

  function save_data()
{
    //alert("hii");
    var authorised_by = document.getElementById("authorised_by").value;
    var account_no = document.getElementById("account_no").value;
    var po_no = document.getElementById("po_no").value;
    var manual_credit_no = document.getElementById("manual_credit_no").value;
    var vendor_id_fk = document.getElementById("vendor_id_fk").value;
    var payment_type = document.getElementById("payment_type").value;
    var manual_credit_amt = document.getElementById("manual_credit_amt").value;
    
    var bank_name = document.getElementById("bank_name").value;
    var account_no = document.getElementById("account_no").value;
    var cheque_no = document.getElementById("cheque_no").value;
    var cheque_date = document.getElementById("cheque_date").value;
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
    //alert("bank_name:"+bank_name);
    //alert("account_no:"+account_no);

    var paytype = $("input[name='type']:checked").val();
    //alert("paytype:"+paytype);
    
    //alert("po_no:"+po_no);

    if(paytype!=undefined && payment_type!="" && vendor_id_fk!="" && 
    manual_credit_no!="" && manual_credit_amt!="" && authorised_by!="")
    {
        if(payment_type == "Cheque")
        {
            if(bank_name!="" && account_no!="" && cheque_no!="" && cheque_date!="")
            {
                $.ajax(
                { 

                    url: "../../api/expense/save_advance_payment.php",
                    type: 'POST',
                    data : $('#adv_pay_form').serialize()+'&authorised_by='+authorised_by+ '&account_no='+account_no + '&bank_name=' + bank_name + '&po_no='+po_no
                    + '&manual_credit_no='+manual_credit_no+ '&vendor_id_fk='+vendor_id_fk+ '&payment_type='+payment_type+'&paytype='+paytype,
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
                                    window.location.href="view_advance_payment.php";    
                                }, 5000);
                            // alert("Data Added Successfully!");
                            // window.location.href="view_advance_payment.php";
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
                if(bank_name == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Select Bank',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }
                if(account_no == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Select Account Number',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }
                if(cheque_no == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Enter Cheque Number',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }
                if(cheque_date == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Enter Cheque Date',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }
            }

        }
        else if(payment_type == "Cash")
        {
            $.ajax(
                {

                    url: "../../api/expense/save_advance_payment.php",
                    type: 'POST',
                    data : $('#adv_pay_form').serialize()+'&authorised_by='+authorised_by+ '&account_no='+account_no + '&bank_name=' + bank_name + '&po_no='+po_no 
                    + '&manual_credit_no='+manual_credit_no+ '&vendor_id_fk='+vendor_id_fk+ '&payment_type='+payment_type+'&paytype='+paytype,
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
                                    window.location.href="view_advance_payment.php";    
                                }, 5000);
                            // alert("Data Added Successfully!");
                            // window.location.href="view_advance_payment.php";
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

    }
    else
    {
        if(manual_credit_amt == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Enter Manual credit Amount',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(manual_credit_no == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Manual credit Number',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(vendor_id_fk == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Vendor/Supplier',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(paytype == undefined)
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Type',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(payment_type == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Payment Type',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(authorised_by == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Authorised By',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        
    }
    
}
    function getpaymode(id)
	{
        var paymode = document.getElementById("payment_type").value;
       // alert(paymode);
        if(paymode == "Cash" ) {
            //readonly_select($(".select2"), true);
            document.getElementById("cheque_no").readOnly = true;
            document.getElementById("cheque_date").readOnly = true;
            //document.getElementById("bank_name").readOnly = true;
            //document.getElementById("account_no").readOnly = true;
            document.getElementById("bank_name").disabled=true;
            document.getElementById("account_no").disabled=true;
            
            
        }
        else 
        {
            //readonly_select($(".select2"), false);
            document.getElementById("cheque_no").readOnly = false;
            document.getElementById("cheque_date").readOnly = false;
            // document.getElementById("bank_name").readOnly = false;
            // document.getElementById("account_no").readOnly = false;
            document.getElementById("bank_name").disabled=false;
            document.getElementById("account_no").disabled=false;
        }
    }
</script>