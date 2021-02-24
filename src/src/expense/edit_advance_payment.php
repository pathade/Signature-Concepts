<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM exp_advance_payment where id_pk = '$edit_id'";
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
</style>

<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Update Advance Payment</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="adv_pay_form1">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1"> </label>
                                                    <?php 
                                                                if($row[1] == "Finance" )
                                                                {?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="type" onchange="getSuppVendName(this.value)" id="recfinanceeipt" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="Finance" checked>&nbsp; Finance
                                                                    </div>
                                                            <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="type" onchange="getSuppVendName(this.value)" id="finance" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="Finance" >&nbsp; Finance
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($row[1] == "Expense" )
                                                                {
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="type" onchange="getSuppVendName(this.value)" id="expenses" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="Expense" checked>&nbsp; Expenses
                                                                    </div>
                                                                    <?php

                                                                }
                                                                else{
                                  
                                                            ?>
                                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                <input type="radio" class="form-control " name="type" id="expenses" onchange="getSuppVendName(this.value)" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="Expense" >&nbsp; Expenses
                                                            </div>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Cheque Date <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" value="<?php echo $row[2]; ?>" id="cheque_date" name="cheque_date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
				                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1">Payment Type <span style="color:red;">*</span></label>
				                        	<div class="col-md-10 divcol">
												<select class="form-control" id="payment_type" name="payment_type">
                                                    <option value="<?php echo $row[3]; ?>" selected disabled><?php echo $row[3]; ?></option>
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
                                                    <?php 
                                                        if($row[1] == "Expense" )
                                                        {
                                                            echo $sql1 = "SELECT DISTINCT vendor_id_pk,saturation, first_name, 
                                                            last_name FROM mstr_vendor WHERE vendor_id_pk = $row[4]";
                                                            $result1 = mysqli_query($db, $sql1);
                                                            if($result1 != "")
                                                            {
                                                                $row6=mysqli_fetch_row($result1);
                                                                $sat = $row6['1'];
                                                                $first = $row6['2'];
                                                                $last = $row6['3'];
                                                            }

                                                        }
                                                        else if($row[1] == "Finance")
                                                        {
                                                            echo $sql1 = "SELECT DISTINCT supplier_id_fk,name FROM mstr_supplier 
                                                            WHERE supplier_id_fk = $row[4]";
                                                            $result1 = mysqli_query($db, $sql1);
                                                            if($result1 != "")
                                                            {
                                                                $row6=mysqli_fetch_row($result1);
                                                                $sat = "";
                                                                $first = $row6['1'];
                                                                $last = "";
                                                            }
                                                        }
                                                        
                                                    ?>
                                                    <option value="<?php echo $row[4]; ?>" selected disabled><?php echo  $first." ".$last;?></option>
                                                    
                                                    <?php
                                                        $sql = "SELECT  * FROM mstr_vendor";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'].". ".$row1['2']." ".$row1['3'];?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Manual Credit No <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<select class="form-control" id="manual_credit_no" name="manual_credit_no" >
                                                    <option value="<?php echo $row[5]; ?>" selected disabled><?php echo $row[5]; ?></option>
                                                    <option value="ABC123">ABC123 </option>
                                                    <option value="SDF123">SDF123 </option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Manual Credit Amt <span style="color:red;">*</span> </label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control" placeholder="0" id="manual_credit_amt" name="manual_credit_amt" value="<?php echo $row[6]; ?>" />
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">PO NO <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no">
                                                    <?php
                                                        $sql6 = "SELECT * FROM exp_purchase_order WHERE id='".$row[7]."'";
                                                        $result6 = mysqli_query($db,$sql6);
                                                        while($row26 = mysqli_fetch_array($result6))
                                                        {
                                                            $povb = $row26['po_no']  ; 
                                                        
                                                        }

                                                    ?>
                                                    <option value="<?php echo $row[7]; ?>" selected disabled><?php echo $povb; ?></option>
                                                    <?php// } ?>
                                                    <?php

                                                        $sql = "SELECT * FROM exp_purchase_order";
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
												<input type="text" class="form-control" placeholder="0" id="amount" name="amount" value="<?php echo $row[8]; ?>" />
				                            </div>
				                        </div>
				                    </div>
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Bank <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <?php 
                                                    $sql1 = "SELECT DISTINCT bank_idpk, bank_name FROM mstr_bank WHERE bank_idpk = $row[9]";
                                                    $result1 = mysqli_query($db, $sql1);
                                                    if($result1 != "")
                                                    {
                                                        $row5=mysqli_fetch_row($result1);
                                                        ?>
                                                    <option value="<?php echo $row[9]; ?>" selected disabled><?php echo $row5[1]; ?></option>
                                                    <?php
                                                        } 
                                                        else {
                                                        ?>
                                                        <option value="<?php echo $row[9]; ?>" selected disabled></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    <?php
                                                        $sql =  "SELECT distinct bank_name FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                        $result = mysqli_query($db, $sql);
                                                        while($row3 = mysqli_fetch_array($result))
                                                        {
                                                            $option="<option value='".$row3['bank_name']."'>".$row3['bank_name']."</option>";
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
												<select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" >
                                                    <?php 
                                                    $sql1 = "SELECT DISTINCT bank_idpk, bank_name, account_no FROM mstr_bank WHERE bank_idpk = $row[9]";
                                                    $result1 = mysqli_query($db, $sql1);
                                                    if($result1 != "")
                                                    {
                                                        $row5=mysqli_fetch_row($result1);
                                                        ?>
                                                    <option value="<?php echo $row[9]; ?>" selected disabled><?php echo $row5[2]; ?></option>
                                                    <?php
                                                        } 
                                                        else {
                                                        ?>
                                                        <option value="<?php echo $row[9]; ?>" selected disabled></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Cheque No<span style="color:red;">*</span></label>
											<div class="col-md-9">
											    <input type="text" id="cheque_no" class="form-control " placeholder="0" name="cheque_no" value="<?php echo $row[10]; ?>" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <?PHP 
                                                $h1 = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk= $row[11]";
                                                $jk1 = mysqli_query($db,$h1);
                                                $ml1 = mysqli_fetch_array($jk1);
                                                ?>
                                                <select class="form-control block" id="authorised_by" name="authorised_by">
                                                    <option value="<?php echo $row[11]; ?>" selected disabled><?php echo $ml1[0]; ?></option>
                                                    <?php 
                                                            $h = "SELECT * FROM mstr_employee";
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
                                                <textarea type="text" class="form-control" id="remark" name="remark" value="<?php echo $row[12]; ?>"><?php echo $row[12]; ?></textarea>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
	                        <div class="form-actions right">
								
                                <button type="button" class="btn btn-primary" name="add" onClick="save_data()">
                                    <i class="fa fa-check-square-o"></i> Update
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
	function getAccountNo()
  {
     
    var bid = document.getElementById("bank_name").value;
    document.getElementById("account_no").length = 0;
    $.ajax(
      {
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid
        },
        dataType:'json',
        success: function(data)
        {
          $.each(data, function(index) 
          {
            var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
            $('#account_no').append(newOption).trigger('change.select2');
           
          });
        },
        error : function(request,error)
        {}
      }
    );
  }

function save_data()
{
    var authorised_by = document.getElementById("authorised_by").value;
    var account_no = document.getElementById("account_no").value;
    var po_no = document.getElementById("po_no").value;
    var manual_credit_no = document.getElementById("manual_credit_no").value;
    var vendor_id_fk = document.getElementById("vendor_id_fk").value;
    var payment_type = document.getElementById("payment_type").value;
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);

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
    // alert("bank_name:"+bank_name);
    // alert("account_no:"+account_no);
    var paytype = $("input[name='type']:checked").val();
    // alert("paytype:"+paytype);
    // alert("po_no:"+po_no);

    if(paytype!=undefined && payment_type!="" && vendor_id_fk!="" && 
    manual_credit_no!="" && manual_credit_amt!="" && authorised_by!="")
    {
        if(paytype == "Cheque")
        {
            if(bank_name!="" && account_no!="" && cheque_no!="" && cheque_date!="")
            {
                $.ajax(
                {

                    url: "../../api/expense/update_advance_payment.php",
                    type: 'POST',
                    data : $('#adv_pay_form1').serialize()+'&authorised_by='+authorised_by+ '&account_no='+account_no + '&po_no='+po_no
                    + '&manual_credit_no='+manual_credit_no+ '&vendor_id_fk='+vendor_id_fk+ '&payment_type='+payment_type+ "&edit_id=" + <?php echo $edit_id;?>+'&paytype='+paytype+'&cheque_no='+cheque_no+'&cheque_date='+cheque_date,
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
        else
        {
            $.ajax(
                {

                    url: "../../api/expense/update_advance_payment.php", 
                    type: 'POST',
                    data : $('#adv_pay_form1').serialize()+'&authorised_by='+authorised_by+ '&account_no='+account_no + '&po_no='+po_no
                    + '&manual_credit_no='+manual_credit_no+ '&vendor_id_fk='+vendor_id_fk+ '&payment_type='+payment_type+ "&edit_id=" + <?php echo $edit_id;?>+'&paytype='+paytype+'&cheque_no='+cheque_no+'&cheque_date='+cheque_date,
                    dataType:'text',  
                    success: function(data)
                    { 
                        console.log("console data is:"+data);
                        if(data == "1")
                        {
                            // alert("Data Updated Successfully!");
                            // window.location.href="view_advance_payment.php";
                            $.toast({
                                    heading: 'Success',
                                    text: 'Data Updated Successfully!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_advance_payment.php";    
                                }, 5000);
                        }
                        else
                        {
                            //alert("Please Enter Valid Details");
                            $.toast({
                                heading: 'Error',
                                text: 'Please Enter Valid Details',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
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

</script>
<?php
if($row[3] == "Cash")
        {
            ?>
            <script>
                document.getElementById("bank_name").disabled = true;
                document.getElementById("account_no").disabled = true;
                document.getElementById("cheque_no").disabled = true;
                document.getElementById("cheque_date").disabled = true;
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                document.getElementById("bank_name").disabled = false;
                document.getElementById("account_no").disabled = false;
                document.getElementById("cheque_no").disabled = false;
                document.getElementById("cheque_date").disabled = false;
            </script>
            <?php
        }
        ?>

<?php } ?>