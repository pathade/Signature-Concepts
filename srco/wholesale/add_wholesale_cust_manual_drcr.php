<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Customer Manual Debit / Credit</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="com_loan_form">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Type<span style="color:red;">*</span></label>
                                                    <div style="display: flex;font-size: 16px;">
                                                    &nbsp;&nbsp;<input type="radio" class="form-control " name="type" id="debit" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="Debit">&nbsp; Debit 
                                                    </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div style="display: flex;font-size: 16px;">
                                                        <input type="radio" class="form-control " name="type" id="credit" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="Credit">&nbsp; Credit
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Customer Type <span style="color:red;">*</span></label>
                                                    <div style="display: flex;font-size: 16px;">
                                                    &nbsp;&nbsp;<input type="radio" class="form-control " name="customer_type" id="retailer" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="Retailer">&nbsp; Retailer 
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div style="display: flex;font-size: 16px;">
                                                        <input type="radio" class="form-control " name="customer_type" id="wholesaler" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="Wholesaler">&nbsp; Wholesaler
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch </label>
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
                                                    <label class="col-md-3 label-control" for="userinput1">Date </label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="date" name="date" readonly=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Customer Name <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="customer_name" class="select2" data-toggle="select2" name="customer_name">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                            <option value="" disabled selected>Select </option>
                                                            <?php 
                                                                $get_emp= "SELECT * from mstr_employee WHERE emp_status=1";
                                                                $res_emp = mysqli_query($db, $get_emp) or die(mysqli_error($db));
                                                                while($row1 = mysqli_fetch_row($res_emp))
                                                                    echo '<option>'.$row1[1].'</option>';
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Amount <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" id="amount" name="amount" placeholder="0" onkeyup="amount_entered()"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Trans Amount </label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" id="trans_amount" name="trans_amount" placeholder="0" />
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Tax% <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                    <select class="select2 form-control block" id="tax" class="select2" data-toggle="select2" name="tax" onchange="gettaxamount(this.value)">
                                                        <option value="" disabled selected>Select Tax </option>
                                                        <?php
                                                            $sql = "SELECT * FROM mstr_tax where active_status='1'";
                                                            $result = mysqli_query($db,$sql);
                                                            while($row = mysqli_fetch_array($result))
                                                            {   
                                                                ?>
                                                                <option value="<?php  echo $row['0'];?>"><?php echo  $row['2']?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Total <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" id="total" name="total" placeholder="0" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1" >Tax. Amt.</label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control"  placeholder="0" name="tax_amt" id="tax_amt" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1" >Other (+/-)</label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control" value="0" placeholder="0" name="other" id="other" onkeyup="other_entered();">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1" >Net Amount<span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="number" class="form-control"  placeholder="0" name="net_amt" id="net_amt" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-1 label-control" for="userinput1" >Reason </label>
				                        	<div class="col-md-10 ">
                                                <textarea type="text" class="form-control" rows="3" id="reason" name="reason" style="height: auto;"></textarea>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
	                        <div class="form-actions right">
								
                                <button type="button" id="btn" class="btn btn-primary" name="add" onClick="save_data()">
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
  
//   document.getElementById("name_error").style.display = "none";
//   document.getElementById("pay_error").style.display = "none";
//   document.getElementById("remark_error").style.display = "none";
//   document.getElementById("bank_error").style.display = "none";
//   document.getElementById("account_error").style.display = "none";
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
        var crdb_type = $('input[name="type"]:checked').val();
        var customer_type = $('input[name="customer_type"]:checked').val();
        //crdb_type:undefined
        var customer_name = document.getElementById("customer_name").value;
        var authorised_by = document.getElementById("authorised_by").value;
        var amount = document.getElementById("amount").value;
        var total = document.getElementById("total").value;
        var net_amt = document.getElementById("net_amt").value;
        var tax = document.getElementById("tax").value;
        
        if(crdb_type!='undefined' && customer_type!="undefined" && customer_name!="" 
        && amount!="" && total!="" && net_amt!="") 
        {
            $.ajax(
            {

                url: "../../api/wholesale/save_cust_manual_credit_debit.php",
                type: 'POST',
                data : $('#com_loan_form').serialize(),
                dataType:'text',  
                success: function(data)
                { 
                    //alert("HIIII");
                    console.log("console data is:"+data);
                    if(data == "1")
                    {
                        //alert("Data Added Successfully!");
                        //window.location.href="view_company_loan_advance.php";
                        $.toast({
                            heading: 'Success',
                            text: 'Customer Manual Debit Credit Added',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_cust_manual_drcr.php";    
                        }, 5000);
                        $('#btn').attr('disabled', true);
                    }
                    else
                    {
                        alert("Please Enter Valid Details");
                    }
                
                },
                
            });
        }
        else
        {
            //alert("jjjjj");
            if(crdb_type=="undefined")
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
            if(customer_type=="undefined")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Please Select Customer Type',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 5000,
                	icon: 'error'
                })
            }
            if(customer_name=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Please Select Customer',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 5000,
                	icon: 'error'
                })
            }
            if(amount=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Amount Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 5000,
                	icon: 'error'
                })
            }
            if(total=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Total Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 5000,
                	icon: 'error'
                })
            }
            if(net_amt=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Net Amount Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 5000,
                	icon: 'error'
                })
            }
            if(tax=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Tax% is Required',
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
$(document).ready(function() {
    $('input:radio[name=customer_type]').change(function() {
        //alert("hii:"+this.value);
        if (this.value == 'Retailer') 
        {
            //alert("retailer Thai Gayo Bhai");
            $.ajax(
            {
                url: "../../api/wholesale/get_customer.php",
                type: 'POST',
                data : 
                {
                    'action' : "retail"
                },
                dataType:'Text',
                success: function(data)
                {
                    //alert("data:"+data);
                    $('#customer_name').html(data);
                },
                error : function(request,error)
                {}
            }
            );
        }
        else if (this.value == 'Wholesaler') 
        {
            //alert("wholesaler Thai Gayo");
            $.ajax(
            {
                url: "../../api/wholesale/get_customer.php",
                type: 'POST',
                data : 
                {
                    'action' : "wholesale"
                },
                dataType:'Text',
                success: function(data)
                {
                    $('#customer_name').html(data);
                },
                error : function(request,error)
                {}
            }
            );
        }
    });
});
</script>
<script>
    function amount_entered()
    {
        var selected_tax = document.getElementById("tax").value;
        var other_amt = document.getElementById("other").value;
        if(selected_tax == "")
        {
            var transaction_amt = document.getElementById("amount").value;
            document.getElementById("net_amt").value = transaction_amt;
            document.getElementById("total").value = transaction_amt;
        }
        else
        {
            var selected_tax = document.getElementById("tax").value;
            var transaction_amt = document.getElementById("amount").value;
            var tax_amnt = parseInt(transaction_amt) * parseInt(selected_tax);
            var final_tax_amnt = parseInt(tax_amnt) / parseInt(100);
            document.getElementById("tax_amt").value = final_tax_amnt;

            var tax_plus_main_amt = parseInt(transaction_amt) + parseInt(final_tax_amnt);
            document.getElementById("net_amt").value = tax_plus_main_amt;
            document.getElementById("total").value = tax_plus_main_amt;
        
        }

        if(other_amt != "")
        {
            if(selected_tax == "")
            {
                var transaction_amt = document.getElementById("amount").value;

                
                document.getElementById("net_amt").value = parseInt(transaction_amt) + parseInt(other_amt);
                document.getElementById("total").value = transaction_amt;
            }
            else
            {
                var selected_tax = document.getElementById("tax").value;
                var transaction_amt = document.getElementById("amount").value;
                var tax_amnt = parseInt(transaction_amt) * parseInt(selected_tax);
                var final_tax_amnt = parseInt(tax_amnt) / parseInt(100);
                document.getElementById("tax_amt").value = final_tax_amnt;

                var tax_plus_main_amt = parseInt(transaction_amt) + parseInt(final_tax_amnt);
                document.getElementById("net_amt").value = tax_plus_main_amt;
                document.getElementById("total").value = tax_plus_main_amt;
            
            }
        }
    }
</script>
<script>
    function gettaxamount()
    {   
        // var selected_tax = document.getElementById("tax").value;
        // alert("selected_tax:"+selected_tax);
        var selected_tax = $( "#tax option:selected" ).text();
        //alert("selected_tax:"+selected_tax);

        var transaction_amt = document.getElementById("amount").value;
        var tax_amnt = parseInt(transaction_amt) * parseInt(selected_tax);
        var final_tax_amnt = parseInt(tax_amnt) / parseInt(100);
        document.getElementById("tax_amt").value = final_tax_amnt;

        var tax_plus_main_amt = parseInt(transaction_amt) + parseInt(final_tax_amnt);
        document.getElementById("net_amt").value = tax_plus_main_amt;
        document.getElementById("total").value = tax_plus_main_amt;

        var other_amt = document.getElementById("other").value;
        if(other_amt!="")
        {
            var a = parseInt(other_amt) * parseInt(selected_tax);
            var b =  parseInt(a) / parseInt(100);

            var total = document.getElementById("total").value;

            var u = parseInt(total) + parseInt(b) + parseInt(other_amt) ;
            document.getElementById("net_amt").value = u;
        }
        

    }

    function other_entered()
    {
        //var selected_tax = document.getElementById("tax").value;
        var selected_tax = $( "#tax option:selected" ).text();
        if(selected_tax == "")
        {
            var transaction_amt = document.getElementById("amount").value;
            // document.getElementById("net_amt").value = transaction_amt;
            // document.getElementById("total").value = transaction_amt;

            var other_charge = document.getElementById("other").value;
            var other_puls_total = parseInt(transaction_amt) + parseInt(other_charge);
            document.getElementById("net_amt").value = other_puls_total;
            document.getElementById("total").value = other_puls_total;
        }
        else
        {
            //var selected_tax = document.getElementById("tax").value;
            var selected_tax = $( "#tax option:selected" ).text();
            var transaction_amt = document.getElementById("amount").value;
            var other_amt = document.getElementById("other").value;

            var tax_amnt = parseInt(transaction_amt) * parseInt(selected_tax);
            var final_tax_amnt = parseInt(tax_amnt) / parseInt(100);

            document.getElementById("tax_amt").value = final_tax_amnt;

            var tax_plus_main_amt = parseInt(transaction_amt) + parseInt(final_tax_amnt);


            var other_tax_amnt = parseInt(other_amt) * parseInt(selected_tax);
            var final_other_tax_amnt = parseInt(other_tax_amnt) / parseInt(100);

            document.getElementById("tax_amt").value = final_tax_amnt;

            var tax_plus_other_amt = parseInt(other_amt) + parseInt(final_other_tax_amnt);

            var final_net_amount = parseInt(tax_plus_other_amt)+parseInt(tax_plus_main_amt)


            document.getElementById("net_amt").value = final_net_amount;
            //document.getElementById("total").value = tax_plus_main_amt;


        
        }
    }
</script>