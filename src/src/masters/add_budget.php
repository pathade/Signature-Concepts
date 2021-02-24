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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Budget Master</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form" method="POST">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch">
                                                    <option value="NKS AROMAS">NKS AROMAS</option>
												</select>
				                            </div>
				                        </div>
				                    </div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Expense Head</label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="exphead" class="select2" data-toggle="select2" name="exphead" required>
												<option value="">select</option>
												<option value="ASSEST">ASSEST</option>
												<option value="BAD DEBTS">BAD DEBTS</option>
												<option value="CA FEES">CA FESS</option>
												<option value="CHECQUE ENTRY">CHEQUE ENTRY</option>
												<option value="COMMISION">COMMISION</option>
												<option value="CUSTOMER ADVANCE">CUSTOMER ADVANCE</option>
												<option value="DISCOUNT">DISCOUNT</option>
												<option value="EXTRA ACCOUNT">EXTRA ACCOUNT</option>
												<option value="EXTRA ACCOUNT-OLD">EXTRA ACCOUNT-OLD</option>
												<option value="FOOD/CAFETERIA">FOOD/CAFETERIA</option>
												<option value="GROWDOWN RATE">GROWDOWN RATE</option>
												<option value="GST">GST</option>
												<option value="INCOME TAX">INCOME TAX</option>
												<option value="IT EXPENSES">IT EXPENSES</option>
												<option value="LIGHT BILL">LIGHT BILL</option>
												<option value="MIX">MIX</option>
												<option value="MOBILE/INTERNET">MOBILE/INTERNET</option>
												<option value="OFFICE EXPENSES">OFFICE EXPENSES</option>
												<option value="OPENING BAL">OPENING BAL</option>
												<option value="PETROL">PETROL</option>
												<option value="RENT">RENT</option>
												<option value="RENT TDS">RENT TDS</option>
												<option value="SALARY">SALARY</option>
												<option value="SHOWROOM RENOVATION">SHOWROOM RENOVATION</option>
												<option value="SUPPLIER PAYMENT">SUPPLIER PAYMENT</option>
												<option value="TRANSPORT">TRANSPORT</option>
												</select>
												<div id="exphead_error">
                                                    <span class="alert alert-danger p-0">Expense head is Require</span> 
                                                </div>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">For Month</label>
											<div class="col-md-9">
											    <select class="select2 form-control block" id="month" class="form-control " placeholder="" name="month" >
													<option value="NOV/2020">NOV/2020</option>
													<option value="DEC/2020">DEC/2020</option>
												</select>

				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Amt Per Month</label>
											<div class="col-md-9">
                                                <input type="number" id="amt_per_month" class="form-control " placeholder="" name="amt_per_month" min=0 required/>
												<div id="amt_per_month_error">
                                                    <span class="alert alert-danger p-0">Amt per month is Require</span> 
                                                </div>
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark </label>
				                        	<div class="col-md-10 divcol">
												<input type="text" class="form-control"  placeholder="" name="remark" id="remark" required>
												<div id="remark_error">
                                                    <span class="alert alert-danger p-0">Remark is Require</span> 
                                                </div>
				                            </div>
				                        </div>
									</div>
		                        </div>
							</div>
	                        <div class="form-actions right">
								
								<button type="button" class="btn btn-primary" id="btn" onclick="save_data();">
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
	$(document).ready(function()
{
  

  //hide all error span
  
  document.getElementById("exphead_error").style.display = "none";
  document.getElementById("amt_per_month_error").style.display = "none";
  document.getElementById("remark_error").style.display = "none";
  ///////////////////////////
});
</script>
<script>
	function save_data()
	{
		var branch = $('#branch').val();
		var exphead = $('#exphead').val();
		var month = document.getElementById('month').value;
		var amt_per_month = $('#amt_per_month').val();
		var remark = $('#remark').val();

		if(exphead == null || exphead.length == 0)
			document.getElementById("exphead_error").style.display = "block";
		if(amt_per_month == null || amt_per_month.length == 0)
			document.getElementById("amt_per_month_error").style.display = "block";
		if(remark == null || remark.length == 0)
			document.getElementById("remark_error").style.display = "block";

		if((exphead != "" || exphead.length > 0) && (amt_per_month != "" || amt_per_month.length > 0) && (remark != "" || remark.length > 0))
		{

			
			$.ajax({
				url: '../../api/budget/save_budget.php',
				type: "POST",
				data: $('#form').serialize(),
				success: function(data)
				{ 

					console.log(data);

					if(data == "1")
					{
						$.toast({
							heading: 'Success',
							text: 'Budget Added Successfully...!!',
							showHideTransition: 'slide',
							position: 'top-right',
							hideAfter: 5000,
							icon: 'success'
						})
						setTimeout(() => {
							window.location.href = "view_budget.php";	
						}, 5000);

						// disable button after inserting to avoid re-submission
						$('#btn').attr('disabled', true);
						// alert('Record Saved!');
						// window.location.href = "view_budget.php";
						
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
	}
</script>