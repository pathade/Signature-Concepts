<?php include('../../partials/header.php');?>


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
    .table td, .table th {
    border-bottom: 1px solid #E3EBF3;
    padding: .75rem 1rem;
}

    .radio-row {
        font-size: 18px;
        width: 100%;
        display: flex;
        margin-left: 15px;
    }
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Customer Advance</h4>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="" disabled selected>Signature Concepts LLP </option>
												</select>
                                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php

                                                        $sql = "SELECT * FROM tbl_wholesale_customer";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row['0'];?>"><?php echo  $row['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span id="customer_error" style="color:red;">Customer name is required.</span>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Pay Mode <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<select class="form-control" id="pay_mode" name="pay_mode" >
                                                    <option value="" >Select</option>
                                                    <option value="Cash">Cash </option>
                                                    <option value="Cheque">Cheque </option>
												</select>
                                                <span id="pay_error" style="color:red;">Pay Mode is required.</span>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-9">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>" >
											</div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 d-none">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Manual Debit No.</label>
				                        	<div class="col-md-9">
												<select class="form-control" id="manual_debit_no" name="manual_debit_no" value="0" >
                                                    <option value="" >Select</option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 d-none">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Manual Debit Amt.</label>
				                        	<div class="col-md-9">
												<input type="number" id="manual_debit_amt" class="form-control " value="0" name="manual_debit_amt" readonly  />
											</div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Bank Name <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <?php
                                                        $option="<option value=''>Select Bank</option>";
                                                        echo $option;
                                                        $sql =  "SELECT distinct bank_name FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                        $result = mysqli_query($db, $sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {
                                                            $option="<option value='".$row2['bank_name']."'>".$row2['bank_name']."</option>";
                                                            echo $option;
                                                        }
                                                    ?>  												
												</select>
                                                <span id="bank_error" style="color:red;">Bank  is required.</span>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Account No <span style="color:red;"> *</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" >
                                                <!-- -->
                                                </select>
												<span id="account_error" style="color:red;">Account No is Required. </span>
				                            </div>
			                       		</div>
			                       	</div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Cheque No</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="cheque_no" name="cheque_no" readonly>
                                                <option value="" disabled selected>Select </option>
                                               
												</select>
                                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Cheque Date</label>
				                        	<div class="col-md-9">
                                                <input type="date" id="cheque_date" class="form-control " placeholder="" name="cheque_date" value="<?php echo date('Y-m-d'); ?>" readonly>
                                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Amount</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="amount" class="form-control " placeholder="0" name="amount" />
                                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark <span style="color:red;"> *</span></label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" id="remark" name="remark"></textarea>
                                                <span id="remark_error" style="color:red;">Remark is required.</span>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
                            <br />
	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="add_delete_pending_qua" >
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
  
  document.getElementById("customer_error").style.display = "none";
  document.getElementById("pay_error").style.display = "none";
  document.getElementById("remark_error").style.display = "none";
  document.getElementById("bank_error").style.display = "none";
  document.getElementById("account_error").style.display = "none";
  ///////////////////////////
});	
</script>

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
  //alert("submit");
  
  // Add table data to JS array
  


  //console.log(newRawItemArray);
  var customer = document.getElementById("customer").value;
  var branch = document.getElementById("branch").value;
  var pay_mode = document.getElementById("pay_mode").value;
  var date = document.getElementById("date").value;
  var bank_name = document.getElementById("bank_name").value;
  var account_no = document.getElementById("account_no").value;
  var cheque_no = document.getElementById("cheque_no").value;
  var remark = document.getElementById("remark").value;
  var cheque_date = document.getElementById("cheque_date").value;
  var amount = document.getElementById("amount").value;
  var manual_debit_no = document.getElementById("manual_debit_no").value;
  var manual_debit_amt = document.getElementById("manual_debit_amt").value;
  console.log (name + account_no);
  if(pay_mode!='')
  {

  $.ajax(
          {

          url: "../../api/expense/save_company_loan_advance.php",
          type: 'POST',
          data : $('#com_loan_form').serialize(),
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              if(data == "1")
              {
                alert("Data Added Successfully!");
                window.location.href="view_company_loan_advance.php";
              }
              else
              {
                  alert("Please Enter Valid Details");
              }
          
          },
          
          });

}

        if(customer == "")
        {
            document.getElementById("customer_error").style.display = "block";
        }
        if(pay_mode == "")
        {
            document.getElementById("pay_error").style.display = "block";
        }
        if(remark == "")
        {
            document.getElementById("remark_error").style.display = "block";
        }
        if(bank_name == "")
        {
            document.getElementById("bank_error").style.display = "block";
        }
        if(account_no == "")
        {
            document.getElementById("account_error").style.display = "block";
        }
}
</script>
                        