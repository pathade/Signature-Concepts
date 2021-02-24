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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Supplier Manual Credit/Debit</h4>
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
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Type <span style="color:red;"> *</span></label>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px" value="debit" checked >&nbsp; Debit
                                            </div>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="credit" >&nbsp; Credit
                                            </div>
                                            <!-- <span id="type_error" style="color:red;">Type is required.</span> -->
				                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Date <span style="color:red;"> *</span></label>
                                        <div class="col-md-9">
                                            <input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <!-- <span id="date_error" style="color:red;">Date is required.</span> -->
                                    </div>
                                    </div>
                                </div>
                         
                                <div class="row">
	                    			<div class="col-md-6">
                                    <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Supplier <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier">
                                                <option value="" disabled selected>Select Supplier </option>
                                                <?php

                                                    $sql = "SELECT * FROM mstr_supplier WHERE status=1";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
                                                <!-- <span id="supplier_error" style="color:red;">Supplier is required.</span> -->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                    <div class="form-group row">
                                        <?php

                                            $sql = "SELECT * FROM mstr_data_series where name='supplier_manual_credit_debit'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Debit/Credit No. <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<input type="text" id="credit_debit_no" class="form-control " readonly placeholder="" name="credit_debit_no" value="<?php echo date('y',strtotime("-1 year"))."-".date('y')."/".$row['2']; ?>" >
											</div>
											<!-- <span id="debit_credit_no_error" style="color:red;">Debit/Credit No. is required.</span> -->
			                       	</div>
                                       </div>
									<div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                        <option value="" disabled selected>Select Authorised By </option>
                                                        <?php

                                                            $sql = "SELECT * FROM mstr_employee WHERE emp_status = 1";
                                                            $result = mysqli_query($db,$sql);
                                                            while($row = mysqli_fetch_array($result))
                                                            {   
                                                                ?>
                                                                <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                    </select>
                                                    <!-- <span id="auth_error" style="color:red;">Authorised required.</span> -->
                                                </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Branch <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch">
                                                    <option value="Signature Concepts">Signature Concepts LLP</option>
                                                    <option value="NKS Aromas">NKS Aromas</option>
												</select>
                                                <!-- <span id="branch_error" style="color:red;">Branch is required.</span> -->
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Transaction Amount <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
												    <input type="text" id="transaction_amount" class="form-control " placeholder="Transaction Amount" name="transaction_amount" value="<?php echo '0'?>" onkeyup="get_amount(this.value);">
                                                </div>
                                                <!-- <span id="transaction_amt_error" style="color:red;">Transaction Amount is required.</span> -->
                                        </div>
				                    </div>
                                    <div class="col-md-6">
                                    <!-- <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Amount <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                
												    <input type="text" id="amount" class="form-control " placeholder="Amount" name="amount" value="<?php echo '0'?>">
											
                                                </div>
                                                <span id="amt_error" style="color:red;">Amount is required.</span>
                                        </div> -->
				                    </div>
                                    
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Total <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                
												    <input type="text" id="total" class="form-control " placeholder="Total" name="total" value="<?php echo '0'?>">
											
                                                </div>
                                                <!-- <span id="total_error" style="color:red;">Total is required.</span> -->
                                        </div>
				                    </div>
                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Tax</label>
                                                <div class="col-md-9">
                                                
                                                <select class="select2 form-control block" id="tax" class="select2" data-toggle="select2" name="tax" onchange="gettaxamount(this.value)">
                                                <option value="" disabled selected>Select Tax </option>
                                                <?php

                                                    $sql = "SELECT * FROM mstr_tax where active_status='1'";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
                                                </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Tax Amount <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="tax_amount" class="form-control " placeholder="Total" name="tax_amount" value="<?php echo '0'?>">
											
                                                </div>
                                                <!-- <span id="tax_amt_error" style="color:red;">Tax Amount is required.</span> -->
                                        </div>
				                    </div>
                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Other(+/-)</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="other" class="form-control " placeholder="Other(+/-)" name="other" value="<?php echo '0'?>" onkeyup="getotheramount(this.value);">
											
                                                </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Final Amount <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="final_amount" class="form-control " placeholder="Final Amount" name="final_amount" value="<?php echo '0'?>">
											
                                                </div>
                                                <!-- <span id="final_amt_error" style="color:red;">Final Amount is required.</span> -->
                                        </div>
				                    </div>
                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                                <label class="col-md-2 label-control" for="userinput1">Remark <span style="color:red;"> *</span></label>
                                                <div class="col-md-10 divcol">
                                                
                                                <textarea type="text" class="form-control" name="remark" id="remark"></textarea>
                                                <!-- <span id="remark_error" style="color:red;">Remark is required.</span> -->
                                                </div>
                                                
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
<!-- <script src="../js/fin_yr.js"></script> -->
<script>
$(document).ready(function()
{
  
  

//   //hide all error span
  
//   document.getElementById("type_error").style.display = "none";
//   document.getElementById("remark_error").style.display = "none";
//   document.getElementById("final_amt_error").style.display = "none";
//   document.getElementById("tax_amt_error").style.display = "none";
// //   document.getElementById("tax_error").style.display = "none";
//   document.getElementById("total_error").style.display = "none";
//   document.getElementById("transaction_amt_error").style.display = "none";
// //   document.getElementById("amt_error").style.display = "none";
//   document.getElementById("date_error").style.display = "none";
//   document.getElementById("branch_error").style.display = "none";
//   document.getElementById("debit_credit_no_error").style.display = "none";
//   document.getElementById("auth_error").style.display = "none";
//   document.getElementById("supplier_error").style.display = "none";
  ///////////////////////////
});

</script>
<script>

    function get_amount(id)

    {


document.getElementById('final_amount').value=id;
document.getElementById('total').value=id;
    }

    function gettaxamount(id)
    {

    
                                      
                                   var total=  document.getElementById('total').value;
                                  
                                       $.ajax({
                                        type: "POST",
                                        url: '../../api/purchase/fetch_tax_amount.php',
                                        data: "id="+id+"&total="+total,
                                        success: function(data)
                                        { 
                                            var d = data.split("#");

                                            
                                            document.getElementById('tax_amount').value=d[0];
                                            document.getElementById('final_amount').value=d[1];
                                        
                                        }
                                    });
                                  
                               
    }

                                function getotheramount(id)
                                {

    
                                      if(id!=''){
                                   var total=  document.getElementById('total').value;
                                   var tax_amount=document.getElementById('tax_amount').value;
                                   var tax=document.getElementById('tax').value;

                                   var other_gst = 0;
                                   if(tax != '')
                                    other_gst = parseFloat(id) * 18 / 100;

                                    tax_amount = parseFloat(other_gst)+parseFloat(tax_amount); 
                                      
                                    var final_total=parseFloat(total)+parseFloat(id)+parseFloat(tax_amount);

                                    document.getElementById('final_amount').value=final_total;
                                 
                                      }

                                      else{
                                        var total=  document.getElementById('total').value;
                                        var tax_amount=  document.getElementById('tax_amount').value;

                                        var final_total=parseFloat(total)+parseFloat(tax_amount);   
                                        document.getElementById('final_amount').value=final_total;

                                      }
                                      
                                }
                                    function submit_data()
                                    {

                                        var supplier = document.getElementById('supplier').value;
                                        var credit_debit_no = document.getElementById('credit_debit_no').value;
                                        var authorised_by = document.getElementById('authorised_by').value;
                                        var date = document.getElementById('date').value;
                                        var branch = document.getElementById('branch').value;
                                        var transaction_amount=document.getElementById('transaction_amount').value;
                                        var total=document.getElementById('total').value;

                                        var tax=document.getElementById('tax').value;
                                        var tax_amount=document.getElementById('tax_amount').value;
                                        var other=document.getElementById('other').value;
                                        var final_amount=document.getElementById('final_amount').value;
                                        var remark=document.getElementById('remark').value;
                                        var type=$("input[name='type']:checked").val();

                                       
                                    if (credit_debit_no != "" && type != "" && authorised_by != "" && date != "" &&
                                    branch != "" && transaction_amount != "" && tax_amount != "" && total !="" &&
                                    final_amount != "" && remark != "" && supplier != "" ) {
                                        $.ajax(
                                            {

                                            url: "../../api/purchase/add_supplier_manual_credit_debit.php",
                                            type: 'POST',
                                            data : 
                                            {
                                            
                                                'supplier':  supplier,
                                                'credit_debit_no':  credit_debit_no,
                                                'authorised_by':  authorised_by,
                                                'date':  date,
                                                'branch':  branch,
                                                'transaction_amount': transaction_amount,
                                                'total': total,
                                                'tax': tax,
                                                'tax_amount': tax_amount,
                                                'other': other,
                                                'final_amount': final_amount,
                                                'remark': remark,
                                                'type':type
                                             },
                                            dataType:'text',  
                                            success: function(data)
                                            { 
                                                console.log(data);
                                                if(data == "1")
                                                {
                                                    $.toast({
                                                    heading: 'Success',
                                                    text: 'Supplier Manual Credit Debit Added Sussesfully',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'success'
                                                })
                                                // disable button after inserting to avoid re-submission
                                                $('#btn').attr('disabled', true);
                                                setTimeout(() => {
                                                    window.location.href = 'view_supplier_manual_credit_debit.php';    
                                                }, 5000);
                                                
                                                }
                                                else
                                                {
                                                    $.toast({
                                                    heading: 'Error',
                                                    text: 'Someting went wrong',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                }
                                            
                                            },
                                        });
                                        }   
                                        else {
                                            if(type == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Select Type',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("type_error").style.display = "block";
                                            }
                                            if(credit_debit_no == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Enter Debit/Credit No.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("debit_credit_no_error").style.display = "block";
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
                                               // document.getElementById("auth_error").style.display = "block";
                                            }
                                            if(date == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Select Date.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("date_error").style.display = "block";
                                            }
                                            if(branch == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Select Branch.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("branch_error").style.display = "block";
                                            }
                                            if(transaction_amount == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Enter Transaction Amount.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                               // document.getElementById("transaction_amt_error").style.display = "block";
                                            }
                                            if(total == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Enter Total.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                               // document.getElementById("total_error").style.display = "block";
                                            }
                                            if(tax_amount == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Enter Tax Amount.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("tax_amt_error").style.display = "block";
                                            }
                                            if(final_amount == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Enter Final Amount.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("final_amt_error").style.display = "block";
                                            }
                                            if(remark == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Remark is Required.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("remark_error").style.display = "block";
                                            }
                                            if(supplier == "")
                                            {
                                                $.toast({
                                                    heading: 'Error',
                                                    text: 'Please Select Supplier.',
                                                    showHideTransition: 'slide',
                                                    position: 'top-right',
                                                    hideAfter: 5000,
                                                    icon: 'error'
                                                })
                                                //document.getElementById("supplier_error").style.display = "block";
                                            }
                                        }
                                            
                                        
                                    }  
                               
    
</script>