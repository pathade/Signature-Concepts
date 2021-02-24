<?php include('../../partials/header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

.dc_box {
    height: 250px;
    overflow-y: auto;
    border: 1px solid #c0c0c0;
    padding: 10px;
}

@media (min-width:768px) {
    .right-border {
        border-right: 3px solid #787878;
    }
}
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form1">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Receipt</h4>
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
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch123"  >
                                                            <option value="Signature Concepts LLP"  selected>Signature Concepts LLP </option>
                                                        </select>
                                                    </div>										
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Cust Name <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                            <option value="" disabled selected>Select </option>
                                                            <?php

                                                                $sql = "SELECT distinct cust_id_fk,cust_name 
                                                                        FROM `wholesale_tax_invoice` as tinv,
                                                                              tbl_wholesale_customer as c 
                                                                        WHERE tinv.cust_id_fk = c.wc_id_pk AND receipt_status!='1'
                                                                ";
                                                                $result = mysqli_query($db,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row['cust_id_fk'];?>"><?php echo  $row['cust_name'] ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>										
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Receipt Date</label>
                                                    <div class="col-md-9">
                                                    <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="bill_date" name="bill_date" />
                                                    </div>											
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bank Name </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="bank_name" onchange="getAccountNo()" name="bank_name" >
                                                            <?php
                                                                $option="<option value=''>Select Bank</option>";
                                                                echo $option;
                                                                $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                                $result = mysqli_query($db, $sql);
                                                                while($row2 = mysqli_fetch_array($result))
                                                                {
                                                                    $option="<option value='".$row2['bank_idpk']."'>".$row2['bank_name']."</option>";
                                                                    echo $option;
                                                                }
                                                            ?>  												
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Account No</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="account_no" name="account_no" data-placeholder="Select Account No" onchange="acc_click();" >
                                                        <!-- -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <button type="button" class="btn btn-primary" name="show" onClick="show_data()">
                                                    Show
                                                </button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-md-2 label-control" for="userinput1">Remarks</label>
                                            <div class="col-md-10">
                                                <input type="text" id="remark" class="form-control " name="remark">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <br />

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3><b>Payment</b></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="radio" value="Cash/Card" name="payment_method" id="cash" style="height: 15px;width: 17px;"> &nbsp;Cash/Card
                                                <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Cash Amt</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"  placeholder="0" name="cash_amt" id="cash_amt" />
                                                            </div>
                                                            <label class="col-md-4 label-control mt-1" for="userinput1">Card No</label>
                                                            <div class="col-md-8 mt-1">
                                                                <input type="text" class="form-control"  placeholder="0" name="card_no" id="card_no" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Card Amt</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"  placeholder="0" name="card_amt" id="card_amt" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" value="Cheque" name="payment_method" id="cash" style="height: 15px;width: 17px;" > &nbsp;Cheque
                                                <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Cheque Amt</label>
                                                            <div class="col-md-8">
                                                            <?php 
                                                                //$sql = "SELECT "
                                                            ?>
                                                                <input type="text" class="form-control"  placeholder="0" name="cheque_amt" id="cheque_amt" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Cheque No</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"  placeholder="0" name="cheque_no" id="cheque_no" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-2 label-control" for="userinput1">Date</label>
                                                            <div class="col-md-7">
                                                                <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="<?php echo date('Y-m-d'); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <br />

                                <div class="row">
                                    <h3><b>Receipt Details</b></h3>
                                    <div class="col-md-12">
                                        <!-- <div class="form-group row"> -->
                                            <div class="table-responsive">
                                            <table class="display" id="tbl" style="width: 100%;font-size: smaller;">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Inv. No </th>
                                                            <th>Inv. Date </th>
                                                            <th>FinYr</th>
                                                            <th>Amount </th>
                                                            <th>PreviousPaid </th>
                                                            <th>BalanceAmt</th>
                                                            <th>Advance</th>
                                                            <th>Credit </th>
                                                            <th>Debit </th>
                                                            <th>ReturnGoods </th>
                                                            <th>Discount </th>
                                                            <th>Total Balance </th>
                                                            <th>PaidAmt </th>
                                                            <th>OutStanding </th>
                                                            <th>Advance No </th>
                                                            <th>Credit No </th>
                                                            <th>Debit No </th>
                                                            <th>Branch </th>
                                                            <!-- <th>Advance Amt &nbsp;&nbsp;&nbsp;</th>
                                                            <th>Credit Amt &nbsp;&nbsp;&nbsp;</th>
                                                            <th>Debit Amt &nbsp;&nbsp;&nbsp;</th> -->
                                                            <th>Returns No </th>
                                                            <!-- <th>Returns Amt &nbsp;&nbsp;&nbsp;</th> -->
                                                            <th>Bank Charges </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <br /><br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <h3><b>Customer Goods Return (Less)</b></h3>
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="border-bottom-0 table table-hover" id="tbl1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>No</th>
                                                                    <th>Amount</th>
                                                                    <th>Balance</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="goods_body">
                                                                <tr>
                                                                    <td><input type="checkbox" style="height: 20px;width: 20px;" /></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3><b>Customer Advance (Less)</b></h3>
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="border-bottom-0 table table-hover" id="tbl1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Balance Redeem&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="advance_body">
                                                                <tr>
                                                                    <td><input type="checkbox" style="height: 20px;width: 20px;" /></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3><b>Manual Debit(Add) / Credit(Less) Note</b></h3>
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="border-bottom-0 table table-hover" id="tbl2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>Debit/Credit No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Dr Cr Amt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Credit Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Debit Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Balance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="crdr_body">
                                                                <tr>
                                                                    <td><input type="checkbox" style="height: 20px;width: 20px;" /></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="add_purchase_order" >
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
  
//   document.getElementById("cash_amt").disabled = true;
//   document.getElementById("card_amt").disabled = true;
//   document.getElementById("card_no").disabled = true;
//   document.getElementById("cheque_amt").disabled = true;
//   document.getElementById("cheque_no").disabled = true;
//   document.getElementById("cheque_date").disabled = true;
//   document.getElementById("add_purchase_order").disabled = true;
  
  ///////////////////////////

                                // var table="";
                                   
                                //  table= $('#tbl').DataTable( {
                                    
                                //         paginate: false,
                                //         lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                                //         buttons: [],
                                //         searching:false,
                                //         language : {
                                //         "zeroRecords": " "             
                                //     },
                                    
                                
                                    
                                //     });
});
</script>

<script>
    function show_data() 
    {
        //alert("jjj");
        var customer = document.getElementById("customer").value;
        if(customer != "")
        {
            //alert("showww");
            table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:false, 
            lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                                        buttons: [],
            ajax: 
            {
                    "url": "../../api/wholesale/fetch_tax_invoice_items_for_receipt.php",
                    "type": "POST",
                    data : 
                    {
                    'customer_id' : customer,
                    },
                    /*dataType: 'text',
                    success: function(data)
                    { 
                        console.log("reverse data:"+data);
                    
                    
                    },*/
                },
                deferRender: true,
                "columnDefs": 
                [ 
                //   {
                //   "targets": 1,
                //   "data": null,
                //   "defaultContent": "<button type=\"button\" name=\"edit\" class=\"btn btn-success btn-sm\"><i class='fa fa-pencil' aria-hidden='true'></i></button>"
                //   },
                // {
                //     "targets": 0,
                //     "data": null,
                //     "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
                // },
                ],
                destroy:true,
                /*"fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;
                },*/
            });
            document.getElementById("add_purchase_order").disabled = false;
            $.ajax(
            {
                
                url: "../../api/wholesale/fetch_customer_advance.php",
                type: 'POST',
                data : 'customer_id='+customer,
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    // if(data == "1")
                    // {
                        //advance_body
                        var d = data.split("#");
                        $("#advance_body").html(d[0]);
                        $("#goods_body").html(d[1]);
                        $("#crdr_body").html(d[2]);

                        
                        // $.toast({
                        //     heading: 'Success',
                        //     text: 'Wholesale Tax Invoice Added',
                        //     showHideTransition: 'slide',
                        //     position: 'top-right',
                        //     hideAfter: 5000,
                        //     icon: 'success'
                        // })
                        // setTimeout(() => 
                        // {
                        //     window.location.href="view_wholesale_tax_invoice.php";    
                        // }, 5000);
                        // $('#btn').atrr('disabled', true);
                        //window.location.href="view_wholesale_delivery_challan.php";
                    // }
                    // else
                    // {
                    //         alert("Please Enter Valid Details");
                    // }
                
                },
            });
        }
        else{
            $.toast({
                            heading: 'Error',
                            text: 'Select Customer..',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
            //alert("select customer");
        }
    }
</script>
<script>
    var return_array = [];
    function return_click1(id)
    {
        var get_id = id.split("-"); 
        var get_id = get_id[1];
        //alert("get id:"+get_id);
        var return_no = document.getElementById("return_no_p-"+get_id).value; 
        //alert("return_no:"+return_no);
        var return_amt = document.getElementById("return_amount-"+get_id).value;
        var return_bal = document.getElementById("return_balance-"+get_id).value;
        var return_ch = document.getElementById("return-"+get_id).checked;
        //alert("return_ch:"+return_ch);
        var row_id = invoice_array[0]['id'];
        var amt =  document.getElementById("amt-"+row_id).value;
        var check_advance =  document.getElementById("advance-"+row_id).value;
        var credit_check =  document.getElementById("credit-"+row_id).value;
        var debit_check =  document.getElementById("debit-"+row_id).value;
        var returngood_check =  document.getElementById("returngood-"+row_id).value;

        
        if(return_ch == true)
        {
            
            //alert("row id:"+row_id);
            if (return_array.filter(item=> item.id == get_id).length == 0)
            {
                
                var return_good = document.getElementById("returngood-"+row_id).value;
                var new_return = parseInt(return_good) + parseInt(return_bal);
                document.getElementById("returngood-"+row_id).value = new_return;
                var bal_amt = document.getElementById("amt-"+row_id).value ;
                //alert("total_balace_new:"+total_balace_new);
                //alert("new_return:"+new_return);
                //alert("total_balace_new yyyyyyyyyyyy:"+total_balace_new);
                var n = parseInt(amt) - parseInt(new_return) - parseInt(check_advance) - parseInt(credit_check) + parseInt(debit_check);
                //alert("nnnnnnnn:"+n);
                document.getElementById("total_bal-"+row_id).value = n;
                return_array.push({ id: get_id,ret_no:return_no,amount:return_amt,balance:return_bal});
                console.log(return_array);
                var selected_return_no = "";
                for(let i = 0; i < return_array.length; i++)
                { 
                    console.log(return_array[i]['ret_no']);
                    if(selected_return_no!= "")
                    {
                        var selected_return_no = selected_return_no + ","+return_array[i]['ret_no'];
                    }
                    else
                    {
                        var selected_return_no = return_array[i]['ret_no'];
                    }
                    
                    console.log("selected_return_no:"+selected_return_no);
                    document.getElementById("return_no-"+row_id).value = selected_return_no;
                }
            }
            else
            {
                //alert("index exist");
            }
        }
        else if(return_ch == false)
        {
            var row_id = invoice_array[0]['id'];
            //alert("row id:"+row_id);
            if (return_array.filter(item=> item.id == get_id).length == 1)
            {
                var minus_amt = document.getElementById("return_balance-"+get_id).value; 
                var return_good = document.getElementById("returngood-"+row_id).value;
                //alert("return_good amt:"+return_good);
                var new_return = parseInt(return_good) - parseInt(minus_amt);
                //alert("new_return:"+new_return);
                document.getElementById("returngood-"+row_id).value = new_return;
                var bal_amt = document.getElementById("amt-"+row_id).value ;
                //var n = parseInt(total_balace_new) - parseInt(new_return);
                var n = parseInt(amt) - parseInt(new_return) - parseInt(check_advance) - parseInt(credit_check) + parseInt(debit_check);
                document.getElementById("total_bal-"+row_id).value = n;
            }
            for(var i = 0; i < return_array.length; i++) {
                if(return_array[i].id == get_id) {
                    return_array.splice(i, 1);
                    break;
                }
            }
            var selected_return_no = "";
            var rl = return_array.length;
            for(let i = 0; i <= return_array.length; i++)
            { 
                if(selected_return_no!= "")
                {
                    var selected_return_no = selected_return_no + ","+return_array[i]['ret_no'];
                }
                else
                {
                    var selected_return_no = "";
                }
                
                //alert("rl:"+rl);
                if(rl!= 0)
                {   
                    //alert("inside:");
                    document.getElementById("return_no-"+row_id).value = selected_return_no;
                }
                else
                {
                    //alert("outside:");
                    document.getElementById("return_no-"+row_id).value = "0";
                }
                //console.log("selected_return_no:"+selected_return_no);
                //document.getElementById("return_no-"+row_id).value = selected_return_no;
            }
            //console.log("delete array is:"+return_array);
        }
        else
        {
            //alert("error");
        }
        
    }
    var advance_array = [];
    function advance_clicked(id)
    {
        var get_id = id.split("-");
        var get_id = get_id[1];
        var adno = document.getElementById("adno-"+get_id).value;
        var ad_amt = document.getElementById("ad_amt-"+get_id).value;
        var ad_bal = document.getElementById("ad_bal-"+get_id).value;
        var advance_ch = document.getElementById("ad-"+get_id).checked;
        var row_id = invoice_array[0]['id'];
        var amt =  document.getElementById("amt-"+row_id).value;
        var check_advance =  document.getElementById("advance-"+row_id).value;
        var credit_check =  document.getElementById("credit-"+row_id).value;
        var debit_check =  document.getElementById("debit-"+row_id).value;
        var returngood_check =  document.getElementById("returngood-"+row_id).value;
        if(advance_ch == true)
        {
            
            if (advance_array.filter(item=> item.id == get_id).length == 0)
            {
                //alert("index not exist");
                //alert("row id1:"+row_id);
                var advance = document.getElementById("advance-"+row_id).value;
                //alert("return_good amt:"+return_good);
                var new_advance = parseInt(advance) + parseInt(ad_bal);
                //alert("new_return:"+new_return);
                document.getElementById("advance-"+row_id).value = new_advance;
                var bal_amt = document.getElementById("amt-"+row_id).value ;

                //alert("total_balace_new:"+total_balace_new);
                //alert("new_return:"+new_return);
                var n = parseInt(amt) - parseInt(credit_check) - parseInt(returngood_check) - parseInt(new_advance)  + parseInt(debit_check);
                //var n = parseInt(total_balace_new) - parseInt(new_advance);
                document.getElementById("total_bal-"+row_id).value = n;

                //alert("nnnnnnnn:"+n);

                advance_array.push({ id: get_id,adno:adno,ad_amt:ad_amt,ad_bal:ad_bal});
                console.log(advance_array);

                var selected_advance_no = "";
                for(let i = 0; i < advance_array.length; i++)
                { 
                    console.log(advance_array[i]['adno']);
                    if(selected_advance_no!= "")
                    {
                        var selected_advance_no = selected_advance_no + ","+advance_array[i]['adno'];
                    }
                    else
                    {
                        var selected_advance_no = advance_array[i]['adno'];
                    }
                    
                    console.log("selected_advance_no:"+selected_advance_no);
                    document.getElementById("advance_no-"+row_id).value = selected_advance_no;
                }
            }
            else
            {
                alert("index exist");
            }
        }
        else if(advance_ch == false)
        {
            var row_id = invoice_array[0]['id'];
            //alert("row id:"+row_id);
            if (advance_array.filter(item=> item.id == get_id).length == 1)
            {
                var ad_bal = document.getElementById("ad_bal-"+get_id).value; 
                
                var advance = document.getElementById("advance-"+row_id).value;
                //alert("return_good amt:"+return_good);
                var new_advance = parseInt(advance) - parseInt(ad_bal);
                //alert("new_return:"+new_return);
                document.getElementById("advance-"+row_id).value = new_advance;
                var bal_amt = document.getElementById("amt-"+row_id).value ;
                var n = parseInt(bal_amt) - parseInt(new_advance) - parseInt(returngood_check) + parseInt(debit_check) -parseInt(credit_check);
                document.getElementById("total_bal-"+row_id).value = n;
            }
            for(var i = 0; i < advance_array.length; i++) 
            {
                if(advance_array[i].id == get_id) {
                    advance_array.splice(i, 1);
                    break;
                }
            }
            console.log(advance_array);
            var dl = advance_array.length;
            //alert("dl:"+dl);
            var selected_advance_no = "";
            for(let i = 0; i <= advance_array.length; i++)
            { 
                //console.log(advance_array[i]['adno']);
                if(selected_advance_no!= "")
                {
                    var selected_advance_no = selected_advance_no + ","+advance_array[i]['adno'];
                }
                else
                {
                    var selected_advance_no = "";
                }
                
                //console.log("selected_advance_no:"+selected_advance_no);
                //alert("dl:"+dl);
                if(dl!= "0")
                {   
                    //alert("inside:");
                    document.getElementById("advance_no-"+row_id).value = selected_advance_no;
                }
                else
                {
                    //alert("outside:");
                    document.getElementById("advance_no-"+row_id).value = 0;
                }
                
            }
            //console.log("delete array is:"+return_array);
        }
        else
        {

        }
        
    }
    var crdr_array = [];
    function crdt_click(id)
    {
        //alert("hhhhh");
        var get_id = id.split("-");
        var get_id = get_id[1];


        var crdt_no = document.getElementById("crdt_no-"+get_id).value;
        var crdt_amt = document.getElementById("crdt_amt-"+get_id).value;
        var cr_amt = document.getElementById("cr_amt-"+get_id).value;
        var dt_amt = document.getElementById("dt_amt-"+get_id).value;
        var crdt_bal = document.getElementById("crdt_bal-"+get_id).value;

        var row_id = invoice_array[0]['id'];
        var balamt =  document.getElementById("amt-"+row_id).value;
        var check_advance =  document.getElementById("advance-"+row_id).value;
        var credit_check =  document.getElementById("credit-"+row_id).value;
        var debit_check =  document.getElementById("debit-"+row_id).value;
        var returngood_check =  document.getElementById("returngood-"+row_id).value;

        var crdt = document.getElementById("crdt-"+get_id).checked;

        //var crdt =  document.getElementById("crdt-"+row_id).value;
        //alert("crdet :"+crdt);

        if(crdt == true)
        {
            if (crdr_array.filter(item=> item.id == get_id).length == 0)
            {
                if(cr_amt != 0)
                {
                    var credit = document.getElementById("credit-"+row_id).value;
                    alert("credit:"+credit);
                    var new_credit = parseInt(credit) + parseInt(crdt_bal);
                    
                    //alert("cr amt inside");
                    document.getElementById("credit-"+row_id).value = new_credit ;
                    var value_to_add = parseInt(balamt) - parseInt(check_advance) - parseInt(new_credit) - parseInt(returngood_check) + parseInt(debit_check);
                    document.getElementById("total_bal-"+row_id).value = value_to_add ;
                    crdr_array.push({ id: get_id,crdt_no:crdt_no,cr_amt:cr_amt,dt_amt:dt_amt,crdt_bal:crdt_bal});
                    var selected_credit_no = "";
                    for(let i = 0; i < crdr_array.length; i++)
                    { 
                        //console.log(crdr_array[i]['adno']);
                        if(selected_advance_no!= "")
                        {
                            var selected_credit_no = selected_credit_no + ","+crdr_array[i]['crdt_no'];
                        }
                        else
                        {
                            var selected_credit_no = crdr_array[i]['crdt_no'];
                        }
                        
                        console.log("selected_credit_no:"+selected_credit_no);
                        document.getElementById("credit_no-"+row_id).value = selected_credit_no;
                    }
                }
                else if(dt_amt != 0)
                {
                    var debit = document.getElementById("debit-"+row_id).value;
                    //alert("debit:"+debit);
                    var new_debit = parseInt(debit) + parseInt(crdt_bal);
                    //alert("dr amt inside");
                    document.getElementById("debit-"+row_id).value = new_debit ;
                    var value_to_add = parseInt(balamt) - parseInt(check_advance) - parseInt(credit_check) - parseInt(returngood_check) + parseInt(new_debit);
                    
                    //alert("debit_check:"+debit_check);
                    //alert("value_to_add:"+value_to_add);
                    document.getElementById("total_bal-"+row_id).value = value_to_add ;

                    crdr_array.push({ id: get_id,crdt_no:crdt_no,cr_amt:cr_amt,dt_amt:dt_amt,crdt_bal:crdt_bal});

                    var selected_debit_no = "";
                    for(let i = 0; i < crdr_array.length; i++)
                    { 
                        //console.log(crdr_array[i]['adno']);
                        if(selected_debit_no!= "")
                        {
                            var selected_debit_no = selected_debit_no + ","+crdr_array[i]['crdt_no'];
                        }
                        else
                        {
                            var selected_debit_no = crdr_array[i]['crdt_no'];
                        }
                        
                        console.log("selected_debit_no:"+selected_debit_no);
                        document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                }
                else
                {

                }
                //crdr_array.push({ id: get_id,crdt_no:crdt_no,cr_amt:cr_amt,dt_amt:dt_amt,crdt_bal:crdt_bal});
                console.log(crdr_array);
            }
            else
            {
                //alert("index exist");
            }
        }
        else if(crdt == false)
        {
            var row_id = invoice_array[0]['id'];
            if (crdr_array.filter(item=> item.id == get_id).length == 1)
            {
                if(cr_amt != 0)
                {
                    var tbl_main_credit = document.getElementById("credit-"+row_id).value ;
                    var crdt_bal = document.getElementById("crdt_bal-"+get_id).value ;

                    var new_cred = parseInt(tbl_main_credit) -  parseInt(crdt_bal);
                    //alert("cr amt inside");
                    document.getElementById("credit-"+row_id).value = cr_amt ;
                    var value_to_add = parseInt(balamt) - parseInt(check_advance) - parseInt(new_cred) - parseInt(returngood_check) + parseInt(debit_check);
                    document.getElementById("total_bal-"+row_id).value = value_to_add ;

                    for(var i = 0; i < crdr_array.length; i++) 
                    {
                        if(crdr_array[i].id == get_id) {
                            advance_array.splice(i, 1);
                            break;
                        }
                    }
                    var crln = crdr_array.length;
                    var selected_credit_no = "";
                    for(let i = 0; i < crdr_array.length; i++)
                    { 
                        //console.log(crdr_array[i]['adno']);
                        if(selected_advance_no!= "")
                        {
                            var selected_credit_no = selected_credit_no + ","+crdr_array[i]['crdt_no'];
                        }
                        else
                        {
                            var selected_credit_no = crdr_array[i]['crdt_no'];
                        }

                        if(crln!= "0")
                        {   
                            //alert("inside:");
                            document.getElementById("credit_no-"+row_id).value = selected_credit_no;
                        }
                        else
                        {
                            //alert("outside:");
                            document.getElementById("credit_no-"+row_id).value = 0;
                        }
                        
                        console.log("selected_credit_no:"+selected_credit_no);
                        //document.getElementById("credit_no-"+row_id).value = selected_credit_no;
                    }

                    
                }
                else if(dt_amt != 0)
                {
                    var tbl_main_debit = document.getElementById("debit-"+row_id).value ;
                    var crdt_bal = document.getElementById("crdt_bal-"+get_id).value ;
                    //alert("tbl_main_debit:"+tbl_main_debit);
                    //alert("crdt_bal:"+crdt_bal);
                    
                    var new_deb = parseInt(tbl_main_debit) -  parseInt(crdt_bal);
                    //alert("new_deb:"+new_deb);
                    document.getElementById("debit-"+row_id).value = new_deb;
                    //alert("dr amt inside");
                    //document.getElementById("debit-"+row_id).value = dt_amt ;
                    var value_to_add = parseInt(balamt) - parseInt(check_advance) - parseInt(credit_check) - parseInt(returngood_check) + parseInt(new_deb);
                    
                    //alert("debit_check:"+debit_check);
                    //alert("value_to_add:"+value_to_add);
                    document.getElementById("total_bal-"+row_id).value = value_to_add ;

                    for(var i = 0; i < crdr_array.length; i++) 
                    {
                        if(crdr_array[i].id == get_id) {
                            crdr_array.splice(i, 1);
                            break;
                        }
                    }
                    var drln =  crdr_array.length;
                    alert("drln:"+drln);
                    console.log("crdr_array:"+crdr_array);
                    var selected_debit_no = "";
                    alert("selected_debit_no:"+selected_debit_no);
                    for(let i = 0; i < crdr_array.length; i++)
                    { 
                        //console.log(crdr_array[i]['adno']);
                        if(selected_debit_no!= "")
                        {
                            var selected_debit_no = selected_debit_no + ","+crdr_array[i]['crdt_no'];
                        }
                        else
                        {
                            var selected_debit_no = crdr_array[i]['crdt_no'];
                        }
                        alert("selected_debit_no11111111111111:"+selected_debit_no);
                        
                        //console.log("selected_debit_no:"+selected_debit_no);
                        //document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                    if(selected_debit_no!= "")
                    {   
                        alert("inside:");
                        document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                    else if(selected_debit_no== "")
                    {
                        alert("outside:");
                        document.getElementById("debit_no-"+row_id).value = 0;
                    }
                    else
                    {
                        alert("error");
                    }
                }
                else
                {

                }
            }
        }
        else
        {

        }
    }
    var invoice_array = [];
    function tax_invoice_click(id)
    {
        var get_id = id.split("-");
        var get_id = get_id[1];
        if (invoice_array.filter(item=> item.id == get_id).length == 0)
        {
            invoice_array.push({ id: get_id});
            console.log(invoice_array);
        }
        else
        {
            //alert("index exist");
        }
    }
</script>                                    
<script>
//invoice_array
$(document).ready(function () {
    $('#add_purchase_order').on('click', function () {
        //alert("hhhhhhhhhhhhhhhhhh");
        console.log(invoice_array);
        //Loop through all checked CheckBoxes in GridView.
        var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            //alert("rowww:"+row);
            invoice_id_pk = row.cells[0].childNodes[0].value;
            invoice_no = row.cells[1].childNodes[0].value;
            invoice_date = row.cells[2].childNodes[0].value;
            fin_yr = row.cells[3].childNodes[0].value;
            Amount = row.cells[4].childNodes[0].value;
            previous_paid = row.cells[5].childNodes[0].value;
            balance_amt = row.cells[6].childNodes[0].value;
            advance = row.cells[7].childNodes[0].value;
            credit_amt = row.cells[8].childNodes[0].value;
            debit_amt = row.cells[9].childNodes[0].value;
            ret_good_amt = row.cells[10].childNodes[0].value;
            discount = row.cells[11].childNodes[0].value;
            tot_bal = row.cells[12].childNodes[0].value;
            paid_amt = row.cells[13].childNodes[0].value;
            outstanding = row.cells[14].childNodes[0].value;
            advance_no = row.cells[15].childNodes[0].value;
            credit_no = row.cells[16].childNodes[0].value;
            debit_no = row.cells[17].childNodes[0].value;
            branch = row.cells[18].childNodes[0].value;
            ret_no = row.cells[19].childNodes[0].value;
            bank_charge = row.cells[20].childNodes[0].value;

            rawItemArray.push({
                invoice_id_pk : invoice_id_pk,
                invoice_no : invoice_no,
                invoice_date:invoice_date,
                fin_yr:fin_yr,
                Amount:Amount,
                previous_paid:previous_paid,
                balance_amt:balance_amt,
                advance:advance,
                credit_amt:credit_amt,
                debit_amt:debit_amt,
                ret_good_amt:ret_good_amt,
                discount:discount,
                tot_bal:tot_bal,
                paid_amt:paid_amt,
                outstanding:outstanding,
                advance_no:advance_no,
                credit_no:credit_no,
                debit_no:debit_no,
                branch:branch,
                ret_no:ret_no,
                bank_charge:bank_charge
                
            });
            
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

        var cust = document.getElementById("customer").value;
        //alert("cust:"+cust);
        //var pay_type = document.getElementById("cash").value;
        var pay_type = $("input[name='payment_method']:checked").val();
        //alert("pay type:"+pay_type);
        var bank_name = document.getElementById("bank_name").value;
        var account_no = document.getElementById("account_no").value;
        //pay type:
        if(cust != "" && pay_type!=undefined && bank_name!="" && account_no!="")
        {
            $.ajax(
            {
                url: "../../api/wholesale/add_wholesale_receipt.php",
                type: 'POST',
                data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray ,
                dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data); 
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Wholesale Receipt Added',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_receipt.php";    
                        }, 5000);
                        $('#add_purchase_order').attr('disabled', true);
                    }
                    else if(data == "0")
                    {
                        //alert("Please Enter Valid details");
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        //window.location.href="view_wholesale_work_order.php";
                    }
                    else
                    {
                        //alert("Please Enter Valid Details");
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid details',
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
            if(cust=="")
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
            // if(!($("#cash").is(":checked")))
            // {
            //     $.toast({
            //     	heading: 'Error',
            //     	text: 'Please Select Payment',
            //     	showHideTransition: 'slide',
            //     	position: 'top-right',
            //     	hideAfter: 5000,
            //     	icon: 'error'
            //     })
            // }
            if(pay_type == "Cash/Card")
            {
                var cash_amt = document.getElementById("cash_amt").value;
                var card_amt = document.getElementById("card_amt").value;
                var card_no = document.getElementById("card_no").value;
                if(cash_amt == "")
                {
                    $.toast({
                        heading: 'Error',
                        text: 'Cash Amount Required',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                }
                if(card_amt == "")
                {
                    $.toast({
                        heading: 'Error',
                        text: 'Card Amount Required',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                }
                if(card_no == "")
                {
                    $.toast({
                        heading: 'Error',
                        text: 'Card Number Required',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                }
            }
            if(pay_type == "Cheque")
            {
                var cheque_amt = document.getElementById("cheque_amt").value;
                var cheque_no = document.getElementById("cheque_no").value;
                var cheque_date = document.getElementById("cheque_date").value;
                if(cheque_amt == "")
                {
                    $.toast({
                        heading: 'Error',
                        text: 'Cash Amount Required',
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
                        text: 'Card Amount Required',
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
                        text: 'Card Number Required',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                }
            }
            if(bank_name=="")
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
            if(account_no=="")
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
            
        }
    });
});
</script>
<script>
$('input[type=radio][name=payment_method]').change(function() {
    if (this.value == 'Cheque') 
    {
        //alert("Allot Thai Gayo Bhai Cheque");
        document.getElementById("cheque_amt").disabled = false;
        document.getElementById("cheque_no").disabled = false;
        document.getElementById("cheque_date").disabled = false;
    }
    else if (this.value == 'Cash/Card') 
    {
        //alert("Transfer Thai Gayo Cash/Card");
        document.getElementById("cash_amt").disabled = false;
        document.getElementById("card_amt").disabled = false;
        document.getElementById("card_no").disabled = false;
    }
});
</script>
<script>
function getAccountNo()
{
     
    var bid = document.getElementById("bank_name").value;
    //alert("bid:"+bid);
    document.getElementById("account_no").length = 0;
    $.ajax(
      {
        url: "../../api/wholesale/get_account_by_bank.php",
        type: 'POST',
        data : 
        {
          'bank_name' : bid
        },
        dataType:'Text',
        success: function(data)
        {
            //alert("data is:"+data);
            $("#account_no").html(data);
        },
        error : function(request,error)
        {}
      }
    );
}
</script>
<script>
    function paid_amt(id)
    {
        //alert("hiii:"+id);
        var get_id = id.split("-");
        get_id = get_id[1];
        //alert(get_id)
        var total_bal = document.getElementById("total_bal-"+get_id).value;
        var paid_amt = document.getElementById(id).value;
        var new_outstanding = parseInt(total_bal) - parseInt(paid_amt);
        document.getElementById("outstanding-"+get_id).value = new_outstanding;
    }
</script>
<script>
    function acc_click()
    {
        var bank_id = document.getElementById("bank_name").value;
        var acc_no = document.getElementById("account_no").value; 

        $.ajax(
        {
            url: "../../api/global/get_cheque_no.php",
            type: 'POST',
            data : 'bank_id='+bank_id+'&acc_no='+acc_no,
            dataType:'text',  
            success: function(data)
            { 
               // document.getElementById("cheque_no").value = data;
            },
    
        });

    }
</script>
