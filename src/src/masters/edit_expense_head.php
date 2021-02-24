<?php include('../../partials/header.php');?>

<style>
	 @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
		}
		.text {
			text-align: right !important;
		}
	}
	.text {
		text-align: left ;
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Update Expense</h4>
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
                                    <?php 
                                        // select expense to edit
                                        $select_expense = "SELECT * FROM mstr_expense WHERE expense_idpk='".$_GET['id']."'";
                                        $row = mysqli_fetch_array(mysqli_query($db, $select_expense));
                                    ?>
	                    			<div class="col-md-12">
                                        <div class="form-group row" style="display: none">
				                        	<label class="col-md-4 text" for="userinput1">Expense Id </label>
				                        	<div class="col-md-6">
												<input type="text" readonly class="form-control" value="<?php echo $_GET['id'] ?>" name="expense_id">
				                            </div>
				                        </div>
				                        <div class="form-group row">
                                       
				                        	<label class="col-md-4 text" for="userinput1">Expense Head <span style="color:red;"> *</span></label>
				                        	<div class="col-md-6">
												<select class="select2 form-control block" id="exphead" class="select2" data-toggle="select2" name="exphead">
												<option value="<?php echo $row['expense_head'] ?>"><?php echo $row['expense_head'] ?></option>
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
												<!-- <div id="exphead_error">
                                                    <span class="alert alert-danger p-0">Expense head is Require</span> 
                                                </div> -->
				                            </div>
				                        </div>
				                    </div>
									<div class="col-md-12">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 text" for="userinput1">Expense Name <span style="color:red;"> *</span></label>
											<div class="col-md-6">
                                                <input type="text" id="expname" class="form-control " placeholder="" name="expname" value="<?php echo $row['expense_name'] ?>" />
												<!-- <div id="expname_error">
                                                    <span class="alert alert-danger p-0">Expense Name is Require</span> 
                                                </div> -->
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-12">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 text" for="userinput1">Expense Description <span style="color:red;"> *</span></label>
											<div class="col-md-6">
											    <input type="text" id="expdescription" class="form-control " placeholder="" name="expdescription" value="<?php echo $row['expense_desc'] ?>" />
												<!-- <div id="expdesc_error">
                                                    <span class="alert alert-danger p-0">Expense Desciption is Require</span> 
                                                </div> -->
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
							</div>
	                        <div class="form-actions right">
								
								<button type="button" class="btn btn-primary" onClick="save_data();">
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
  
//   document.getElementById("exphead_error").style.display = "none";
//   document.getElementById("expname_error").style.display = "none";
//   document.getElementById("expdesc_error").style.display = "none";
  ///////////////////////////
});
</script>
<script>
	function save_data()
	{
		var exphead = $('#exphead').val();
		var expname = $('#expname').val();
		var expdescription = $('#expdescription').val();

		if(exphead == null || exphead.length == 0){
			$.toast({
				heading: 'Error',
				text: 'Expense Head Required...!!',
				showHideTransition: 'slide',
				position: 'top-right',
				hideAfter: 5000,
				icon: 'error'
			})
		}
			//document.getElementById("exphead_error").style.display = "block";
		if(expname == null || expname.length == 0){
			$.toast({
				heading: 'Error',
				text: 'Expense Name Required...!!',
				showHideTransition: 'slide',
				position: 'top-right',
				hideAfter: 5000,
				icon: 'error'
			})
		}
		//	document.getElementById("expname_error").style.display = "block";
		if(expdescription == null || expdescription.length == 0){
			$.toast({
				heading: 'Error',
				text: 'Description Required...!!',
				showHideTransition: 'slide',
				position: 'top-right',
				hideAfter: 5000,
				icon: 'error'
			})
		}
			//document.getElementById("expdesc_error").style.display = "block";

		if((exphead != "" || exphead.length > 0) && (expname != "" || expname.length > 0) && (expdescription != "" || expdescription.length > 0))
		{

			
			$.ajax({
				url: '../../api/expense/edit_expense_head.php',
				type: "POST",
				data: $('#form').serialize(),
				success: function(data)
				{
					console.log(data);

					if(data == "1")
					{
						$.toast({
							heading: 'Success',
							text: 'Expense Head Edited Successfully...!!',
							showHideTransition: 'slide',
							position: 'top-right',
							hideAfter: 5000,
							icon: 'success'
						})
						setTimeout(() => {
							window.location.href = "view_expense_head.php";	
						}, 5000);

						// alert('Expense Head Updated!');
						// window.location.href="view_expense_head.php";
						
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