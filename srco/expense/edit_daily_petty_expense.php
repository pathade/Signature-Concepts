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
                                        
                                <div class="row">
	                    			<div class="col-md-6">
										<div class="form-group row">
									<?php include('../../database/dbconnection.php');

			                       		$id=$_GET['id'];
										   //$sql="SELECT * From `daily_petty` WHERE id='$id'";
										   $sql = "SELECT *,eh.expense_head as df,d.type as dte,d.remark as k 
										   FROM `daily_petty` as d,mstr_vendor as v,mstr_employee as e,mstr_expense as eh 
										   where d.to1 = v.vendor_id_pk AND 
										   		d.authorised_by = e.emp_id_pk AND 
												   d.expenses_head = eh.expense_idpk AND
												   d.id='$id'";
			                       		$res=mysqli_query($db,$sql);
			                       		while($row=mysqli_fetch_array($res))
			                       		{
			                       			$type=$row['dte'];
			                       			//$against_ref=$row['against_ref'];
			                       			$branch=$row['branch'];
			                       			$date=$row['date'];
											   $to=$row['to1'];
											   $name = $row['first_name']." ".$row['last_name'];
			                       			$amount=$row['amount'];
			                       			$expenses_head=$row['expenses_head'];
			                       			$expenses_head_name=$row['df'];
			                       			$authorised_by=$row['authorised_by'];
											   $remark=$row['k'];
											   $emp_name = $row['emp_name'];
			                       		}
			                       		?>
			                       		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                                            <label class="col-md-3 label-control" for="userinput1" >Type <span style="color:red;">*</span></label>
                                            <div class="col-md-3" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" value="Payment" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" <?php if($type=='Payment'){ ?>
                                                	checked <?php } ?>
                                                	>&nbsp; Payment
                                            </div>
                                            <div class="col-md-3" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="inactive" value ="Receipt"style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" <?php if($type=='Receipt'){ ?> checked <?php } ?>>&nbsp; Receipt
                                            </div>
				                        </div>
									</div>
				                    <div class="col-md-6 d-none">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Against Ref.</label>
											<div class="col-md-9">
												<select class="select2 form-control" id="against_ref" name="against_ref" >
													<option value="<?php echo $against_ref;?>"><?php echo $against_ref; ?></option>
													<option></option>
												</select>
												<!-- <div id="against_ref_error">
													<span class="alert-danger">Against Ref. Required.</span>
												</div> -->
											</div>
			                       		</div>
			                       		



			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Branch <span style="color:red;">*</span></label>
											<div class="col-md-9">
												<select class="form-control"id="branch" name="branch">
													<option value="<?php echo $branch; ?>"><?php echo $branch; ?></option>
													
													<option selected="">Signature Concepts LLP</option>
												</select>
												<div id="branch_error">
													<span class="alert-danger">Branch is required</span>
												</div>
                                                
				                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Date <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="date" class="form-control"name="date" id="date" value='<?php echo date('Y-m-d');?>' >
                                                <span id="date_error" style="color:red;">Date Required</span>
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
		                        <div class="row">
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">To <span style="color:red;">*</span></label>
											<div class="col-md-9">
												<select class="form-control js-example-tags select2" data-toggle="select2" name="to1" id="vendor_id_fk">
													<option value="<?php echo $to; ?>"><?php echo $name; ?></option>
													<!-- <option>1</option> -->
												</select>
												<div id="to_error">
													
												</div>
											</div>
										</div>
									</div>		
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Amount <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <input type="number" class="form-control" name="amount" id="amount"  value="<?php echo $amount; ?>">
                                                <div id="amount_error">
                                                	
                                                </div>
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
                                                    <option value="<?php echo $expenses_head;?>" disabled selected><?php echo $expenses_head_name;?> </option>
                                                    <?php

                                                        $sql = "SELECT * FROM mstr_expense";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
												<div id="expenses_head_error">
													<span class="alert-danger">Expenses Head is Require</span>
												</div>
				                            </div>
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;">*</span></label>
											<div class="col-md-9">
                                                <select class="select2 form-control"id="authorised_by" name="authorised_by">
												<option value="<?php echo $authorised_by;?>" disabled selected><?php echo $emp_name;?> </option>
												<?php

													$sql = "SELECT * FROM mstr_expense";
													$result = mysqli_query($db,$sql);
													while($row1 = mysqli_fetch_array($result))
													{   
														?>
														<option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'] ?></option>
														<?php
													}
												?>
                                                </select>
                                                <div id="authorised_by_error">
                                                	<span class="alert-danger">Authorised By is Required</span>
                                                </div>
                                            </div>
										</div>
									</div>		
									</div>

									<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Remark</label>
                                            <div class="col-md-9">
                                                <textarea id="remark" name="remark1" rows="4" style="width:100%;margin-left: -153px;" value="<?php echo $remark; ?>"><?php echo $remark ;?><?php echo $remark;?></textarea>
                                                <div id="remark_error">
                                                	<span class="alert-danger">Remark is Required</span>
                                                </div>
                                            </div>
                                        </div>
							        </div>
							    </div>
	                        <div class="form-actions right">
								
								<button type="button" name="add_supplier" class="btn btn-primary" onclick="submit_data();">
	                                <i class="fa fa-check-square-o"></i> save
	                            </button>
								
	                            <a href="view_daily_petty_expense.php"><button type="button" class="btn btn-warning mr-1">Cancel</button></a>
	                            
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
	$('.js-example-tags').select2({
		tags: true
	})

  //hide all error span
  
//   document.getElementById("against_ref_error").style.display = "none";
  document.getElementById("branch_error").style.display = "none";
  document.getElementById("date_error").style.display = "none";
  document.getElementById("amount_error").style.display = "none";
  document.getElementById("to_error").style.display = "none";
  document.getElementById("expenses_head_error").style.display = "none";
  document.getElementById("authorised_by_error").style.display = "none";
  document.getElementById("remark_error").style.display = "none";
  ///////////////////////////
});

function submit_data()
{
 
	var payval = $("input[name='type']:checked").val();
	//alert("payval:"+payval);
	//undefined
	var dt = document.getElementById("date").value;
	var vendor_id_fk = document.getElementById("vendor_id_fk").value;
	var amount = document.getElementById("amount").value;
	var expense_head_id_fk = document.getElementById("expense_head_id_fk").value;
	var authorised_by = document.getElementById("authorised_by").value;
	//var authorised_by = document.getElementById("authorised_by").value;
	//alert("expense_head_id_fk:"+expense_head_id_fk);
	
	if(payval!= undefined && vendor_id_fk!="" && amount!="" && expense_head_id_fk!="" && authorised_by!="")
	{

		$.ajax({
			url: "../../api/expense/update_daily_petty_expenses.php",
			type: "POST",
			data: $('#form').serialize()+"&authorised_by=" +authorised_by +"&expense_head_id_fk="+expense_head_id_fk ,
			success: function(data)
			{
				console.log(data);
				// alert(data);
				if(data ="1")
				{
					//alert('Record Updated!');
					$.toast({
						heading: 'success',
						text: 'Daily Petty Expenses Updated !!',
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