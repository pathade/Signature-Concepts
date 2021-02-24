<?php include('../../partials/header.php');
 $flag = $_SESSION['flag'];
?>
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Daily Petty Expenses</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
								<div class="row" style="display:none;">
                                    <div class="col-md-6">
                                        <?php
											if ( $flag == 0) {
											$sql = "SELECT * FROM mstr_data_series where name='exp_daily_petty' and flag = '0' ";
											}
											else {
												$sql = "SELECT * FROM mstr_data_series where name='exp_daily_petty' and flag = '1' ";
											}
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">dp No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="dp_no" class="form-control " placeholder="" name="dp_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
										<!-- <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >ID</label>
				                        	<div class="col-md-10 divcol">
												<input type="text" class="form-control"  placeholder="ID" name="id" id="id" />
				                            </div>
                                        </div> -->
                                        
                                <div class="row">
	                    			<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Type<span style="color:red;">*</span></label>
                                            <div class="col-md-3" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="active123" onclick="type_click(this);" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="Payment" checked>&nbsp; Payment
                                            </div>
                                            <div class="col-md-3" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="active123" onclick="type_click(this);" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="Receipt">&nbsp; Receipt
                                            </div>
				                        </div>
									</div>
				                    <div class="col-md-6 d-none">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Against Ref.</label> 
											<div class="col-md-9">
												<select class="select2 form-control" id="against_ref" name="against_ref" >
                                                    <option value="" >Select</option>
												</select>
											</div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Branch<span style="color:red;">*</span></label>
											<div class="col-md-9">
												<select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="Signature Concepts LLP" selected>Signature Concepts LLP</option>
                                                    <!-- <option value="Shree">Shree </option>  -->
												</select>
				                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Date<span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="date" class="form-control"name="date" id="date" value='<?php echo date('Y-m-d');?>'>
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
		                        <div class="row">
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">To<span style="color:red;">*</span></label>
											<div class="col-md-9">
												<!-- <select class="select2 form-control block" id="vendor_id_fk" name="vendor_id_fk" class="select2" data-toggle="select2"> -->
												<select class="select2 form-control block js-example-tags" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
														if ( $flag == 0) {
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
                                                    ?>
												</select>
				                            </div>
										</div>
									</div>		
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Amount<span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="number" class="form-control" name="amount" id="amount" />
                                            </div>
										</div>
									</div>									
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Expenses Head <span style="color:red;">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="expense_head_id_fk" class="select2" data-toggle="select2" name="expense_head_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
														if ( $flag == 0) {
														$sql = "SELECT * FROM mstr_expense where flag = '0' ";
														}
														else 
														{
															$sql = "SELECT * FROM mstr_expense where flag = '1' ";
														}
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;">*</span></span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" 
												id="authorised_by" 
												name="authorised_by">
												<option value="" disabled selected>Select </option>
												<?php 
													if ( $flag == 0) {
													$h = "SELECT * FROM mstr_employee where flag = '0'";
													}
													else {
														$h = "SELECT * FROM mstr_employee where flag = '1'";
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
									</div>

									<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1">Remark</label>
                                            <div class="col-md-10 divcol">
                                                <textarea id="Remark" name="remark" rows="4" style="width:100%;"></textarea>
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
<script>
$(document).ready(function()
{
	$(".js-example-tags").select2({
  		tags: true
	});
});

function submit_data()
{
	
	var payval = $("input[name='type']:checked").val();
	// alert("payval:"+payval);
	//undefined
	var dt = document.getElementById("date").value;
	var vendor_id_fk = document.getElementById("vendor_id_fk").value;
	var amount = document.getElementById("amount").value;
	var expense_head_id_fk = document.getElementById("expense_head_id_fk").value;
	var authorised_by = document.getElementById("authorised_by").value;
	//var authorised_by = document.getElementById("authorised_by").value;
	
	if(payval!= undefined && vendor_id_fk!="" && amount!="" && expense_head_id_fk!="" && authorised_by!="")
	{
		$.ajax({ 
			url: '../../api/expense/add_daily_petty_expenses.php',
			type: "POST",
			data: $('#form').serialize(),   
			success: function(data)
			{
				console.log(data);
				//alert("jjjjj");

				if(data ="1")
				{
					//alert('Daily Petty Expenses Record Saved!');
					$.toast({
						heading: 'success',
						text: 'Daily Petty Expenses Added !!',
						showHideTransition: 'slide',
						position: 'top-right',
						hideAfter: 5000,
						icon: 'success'
					})
					setTimeout(() => {
						window.location.href = 'view_daily_petty_expense.php';    
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
		if(payval == undefined)
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
		if(vendor_id_fk == "")
		{
			$.toast({
				heading: 'Error',
				text: 'Please Select To',
				showHideTransition: 'slide',
				position: 'top-right',
				hideAfter: 5000,
				icon: 'error'
			})
		}
		if(amount == "")
		{
			$.toast({
				heading: 'Error',
				text: 'Please Enter Amount',
				showHideTransition: 'slide',
				position: 'top-right',
				hideAfter: 5000,
				icon: 'error'
			})
		}
		if(expense_head_id_fk == "")
		{
			$.toast({
				heading: 'Error',
				text: 'Please Select Expense head',
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
</script>
<script>
	function type_click(id)
    {
       // var type_c = document.getElementById("pay_type").value;
        var alert_val = id.value;
        if(alert_val == "cheque_back")
        {
            //document.getElementById("cheque_no").readOnly = false;
            $("#bank").prop("disabled", false);
            $("#account_no").prop("disabled", false);
        }
        else
        {
           // document.getElementById("cheque_no").readOnly = true;
            $("#bank").prop("disabled", true);
            $("#account_no").prop("disabled", true);
        }
    }
</script>
