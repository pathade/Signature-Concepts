<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT DISTINCT ca.*, mca.LAM_id_pk , mca.name FROM exp_company_loan_advance ca,mstr_bank mb, mstr_loan_advance_master mca where ca.vendor_id_fk= mca.LAM_id_pk and com_id_pk = '$edit_id'";
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Company Loans And Advances</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="com_loan_form1">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Type </label>
                                                        <?php 
                                                                if($row[1] == 1 )
                                                                {?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                        <input type="radio" class="form-control " name="type" id="receipt" style="height: calc(2.75rem + -13px);width: 20px"  value="1" checked>&nbsp; Receipt
                                                                    </div>
                                                            <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                        <input type="radio" class="form-control " name="type" id="receipt" style="height: calc(2.75rem + -13px);width: 20px"  value="1" >&nbsp; Receipt
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($row[1] == 0 )
                                                                {
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                        <input type="radio" class="form-control " name="type" id="payment" style="height: calc(2.75rem + -13px);width: 20px" value="0" checked>&nbsp; Payment
                                                                    </div>
                                                                    <?php

                                                                }
                                                                else{
                                  
                                                            ?>
                                                            <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                <input type="radio" class="form-control " name="type" id="payment" style="height: calc(2.75rem + -13px);width: 20px" value="0" >&nbsp; Payment
                                                            </div>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch </label>
				                        	<div class="col-md-9">
												<select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="Signature Concepts LLP" selected><?php echo $row[2];?></option>
                                                    <!-- <option value="Shree">Shree </option>  -->
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Name <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<select class=" form-control block" id="name" name="name">
                                                    <option value="<?php echo $row[3];?>" selected><?php echo $row[21];?> </option>
                                                    <?php

                                                        $sql = "SELECT * FROM exp_advance_payment";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
                                                <span id="name_error" style="color:red;">Name is required.</span>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Pay Mode <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<select class="form-control" id="pay_mode" name="pay_mode" readonly>
                                                    <!-- <option value="<?php echo $row[4];?>" selected disabled><?php echo $row[4]; ?></option> -->
                                                    <?php
                                                    if($row[4]=="Cash")
                                                    {
                                                    ?>
                                                    <option value="Cash" selected="selected">Cash </option>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>

                                                    <option value="Cheque" selected="selected">Cheque </option>

                                                    <?php
                                                    }
                                                    ?>
												</select>
                                                <span id="pay_error" style="color:red;">Pay Mode is required.</span>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Transaction Date </label>
				                        	<div class="col-md-9">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="transaction_date" name="transaction_date" readonly />
				                            </div>
				                        </div>
				                    </div>
                                    <?php 
                                        $sql1 = "SELECT DISTINCT bank_idpk, bank_name, account_no FROM mstr_bank WHERE bank_idpk = $row[6]";
                                        $result1 = mysqli_query($db, $sql1);
                                        if($result1 != "")
                                        {
                                            $row5=mysqli_fetch_row($result1);
                                            ?>
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Bank Name </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <option value="<?php echo $row5[1];?>" selected disabled><?php echo $row5[1]; ?></option>
                                                    <?php
                                                        echo $option;
                                                        $sql =  "SELECT distinct bank_name FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                        $result = mysqli_query($db, $sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {
                                                            $option="<option value='".$row2['bank_name']."'>".$row2 ['bank_name']."</option>";
                                                            echo $option;
                                                        }
                                                    ?>  												
												</select>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Account No</label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" >
                                                    <option selected value="<?php echo $row5[2];?>"><?php echo $row5[2];?></option>
                                                        <?php 
                                                                $sql = " SELECT mb.account_no,mb.bank_idpk FROM mstr_bank mb where mb.bank_name='$row[13]'";
                                                                $res = mysqli_query($db,$sql);
                                                                while($rw1 = mysqli_fetch_array($res))
                                                                {
                                                            ?>
                                                                
                                                                <option value="<?php echo $rw1['bank_idpk'];?>"><?php echo $rw1['account_no'];?></option>
                                                                                                                
												
													<?php } ?>
                                                </select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Cheque No</label>
											<div class="col-md-9">
											<input type="number" id="cheque_no" class="form-control " placeholder="" name="cheque_no" value="<?php echo $rw1[8];?>">
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Cheque Date </label>
				                        	<div class="col-md-9">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="cheque_date" name="cheque_date" />
				                            </div>
				                        </div>
				                    </div>
                                    <?php
                                    } 
                                    else {
                                           ?>
                                           
                                           <?php
                                    }
                                         ?>
                                    <div class="col-md-6">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Amount</label>
				                        	<div class="col-md-9">
												<input type="number" class="form-control"  placeholder="" name="amount" id="amount" value="<?php echo $rw1[10];?>" >
				                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Against Ref.</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="against_ref" name="against_ref" >
                                                    <option value="<?php echo $row[11];?>" > <?php echo $row[11];?></option>
												</select>
				                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark <span style="color:red;"> *</span></label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" id="remark" name="remark" value="<?php echo $row[12];?>" ><?php echo $row[12];?></textarea>
                                                <span id="remark_error" style="color:red;">Remark is required.</span>
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

function readonly_select(objs, action) {
    if (action===true)
        objs.prepend('<div class="disabled-select"></div>');
    else
        $(".disabled-select", objs).remove();
}
$(document).ready(function()
{
  //hide all error span
  
  document.getElementById("name_error").style.display = "none";
  document.getElementById("pay_error").style.display = "none";
  document.getElementById("remark_error").style.display = "none";
  ///////////////////////////

  var paymode = document.getElementById("pay_mode").value;
  if(paymode == "") {
           readonly_select($(".select2"), true);
            document.getElementById("cheque_no").readOnly = true;
            document.getElementById("cheque_date").readOnly = true;
        }
        else {
            readonly_select($(".select2"), false);
            document.getElementById("cheque_no").readOnly = false;
            document.getElementById("cheque_date").readOnly = false;
        }
});

function getpaymode(id)
	{
        var paymode = document.getElementById("pay_mode").value;
        alert(paymode);
        if(paymode == "Cash" ) {
            readonly_select($(".select2"), true);
            document.getElementById("cheque_no").readOnly = true;
            document.getElementById("cheque_date").readOnly = true;
        }
        else {
            readonly_select($(".select2"), false);
            document.getElementById("cheque_no").readOnly = false;
            document.getElementById("cheque_date").readOnly = false;
        }
    }
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
  var name = document.getElementById("name").value;
  var branch = document.getElementById("branch").value;
  var pay_mode = document.getElementById("pay_mode").value;
  var transaction_date = document.getElementById("transaction_date").value;
  var bank_name = document.getElementById("bank_name").value;
  var account_no = document.getElementById("account_no").value;
  var cheque_no = document.getElementById("cheque_no").value;
  var remark = document.getElementById("remark").value;
  var cheque_date = document.getElementById("cheque_date").value;
  var amount = document.getElementById("amount").value;
  var against_ref = document.getElementById("against_ref").value;
  var type = $('input[name=type]:checked').val();
  if(pay_mode!='' && remark!='')
  {
  $.ajax(
          {

          url: "../../api/expense/update_company_loan_advance.php",
          type: 'POST',
          data : $('#com_loan_form1').serialize() +"&edit_id=" + <?php echo $edit_id;?>,
          dataType:'text',  
          success: function(data)
          { 
              //console.log("console data is:"+data);
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

          if(name == "")
        {
            document.getElementById("name_error").style.display = "block";
        }
        if(pay_mode == "")
        {
            document.getElementById("pay_error").style.display = "block";
        }
        if(remark == "")
        {
            document.getElementById("remark_error").style.display = "block";
        }
}
</script>
<?php } ?>