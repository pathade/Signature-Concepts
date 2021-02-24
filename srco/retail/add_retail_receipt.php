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

    .table td {
        border-bottom: 1px solid #E3EBF3;
        padding: .75rem 1rem;
    }

    .btn-show {
        padding: 10px 25px;
        font-size: 15px;
        border: 1px solid #787878;
    }

    #tbl thead tr th {
        padding: 0px 7px;
    }

    div.container {
        width: 80%;
    }

    td .input1 {
        max-width: 100px;
    min-width: 50px;
    width: 50px;
    }

    td .input {
    width: 50px;
    height: calc(2.45rem + 0px);
    padding: 0.5rem 0.5rem;
    font-size: 17px;
    line-height: 1.25;
    color: #4E5154;
    background-color: #FFF;
    border: 1px solid #ADB5BD;
    border-radius: .21rem;
    /* min-width:50px;
    width:50px;
    max-width:100px;
    resize:none;
    font-size:15px;
    overflow-x:hidden;
    overflow-y:auto;    
    min-height:1.2em;
    height:2.2em;
    padding:2px;
    max-height:5em;  */
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Retail Receipt</h4>
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
	                    <form class="form form-horizontal" id="form11" data-toggle="validator" role="form">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
                                    <div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="" disabled selected>Signature Concepts LLP </option>
												</select>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Cust. Name <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                <option value="" disabled selected>Select </option>
                                                <?php

                                                    $sql = "SELECT distinct customer,retail_cust_name 
                                                    FROM `retail_tax_invoice` as tinv,mstr_retail_customer as mrc 
                                                    WHERE tinv.customer = mrc.retail_cust_idpk AND tinv.receipt_added='0'
                                                    ";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row['customer'];?>"><?php echo  $row['retail_cust_name'] ?></option>
                                                        <?php
                                                    }
                                                ?>
												</select>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-4">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Receipt Date</label>
				                        	<div class="col-md-9">
												<input type="date" id="bill_date" class="form-control " value="<?php echo date('Y-m-d') ?>" name="bill_date" readonly>
											</div>											
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Bank <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="bank" name="bank"  onchange="getAccountNo(this.value)">
                                                    <option value=""  selected>Select </option>
                                                    <?php
                                                        $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                        $result = mysqli_query($db, $sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {
                                                            echo "<option value='".$row2['bank_idpk']."'>".$row2['bank_name']."</option>";

                                                        }
                                                    ?>
												</select>
                                            </div>
				                        </div>
				                    </div>
	                    			<div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">A/C No. <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="ac_no" name="ac_no" >
                                                    <option value=""  selected>Select </option>
												</select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-4">
                                        <button type="button" class="btn btn-show" onclick="show_data()"> Show</button>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-8">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Remark </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" rows="7"  placeholder="" name="remark" id="remark" />
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">OutStanding</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="0" name="out_standing" id="out_standing" style="background: #000;color: #1ec20a;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>                        
                            <hr />
                            <!-- <br/> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <label><b>Payment</b></label>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="radio" name="payment_method" id="cash" style="height: 13px;width: 13px;" checked value="Cash/Card"> &nbsp;Cash/Card
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Cash Amt</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="cash_amt" id="cash_amt" value="0"/>
                                                        </div>
                                                        <label class="col-md-4 label-control mt-1" for="userinput1">Card No</label>
                                                        <div class="col-md-8 mt-1">
                                                            <input type="text" class="form-control"  placeholder="0" name="card_no" id="card_no" value="0"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Card Amt</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="card_amt" id="card_amt" value="0"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="payment_method" id="cash" style="height: 13px;width: 13px;" value="Cheque"> &nbsp;Cheque
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Cheque Amt</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="cheque_amt" id="cheque_amt" value="0"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Cheque No</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="cheque_no" id="cheque_no" value="0"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row mb-1">
                                                        <label class="col-md-2 label-control" for="userinput1">Date</label>
                                                        <div class="col-md-7">
                                                            <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="<?php echo date('Y-m-d') ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr />
                            <br/> -->
                            
                            <div class="row">
                                <label><b>Receipt Details</b></label>
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                    <div class="table-responsive">
                                                    <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                             <!-- <table class="border-bottom-0 table table-hover" id="tbl"> -->
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Pur.Order No </th>
                                                                        <th>PoDate </th>
                                                                        <th>FinYr </th>
                                                                        <th>PoAmt </th>
                                                                        <th>PreviousPaid </th>
                                                                        <th>BalanceAmt</th>
                                                                        <th>Credit </th>
                                                                        <th>Debit </th>
                                                                        <th>ReturnGoods </th>
                                                                        <th>Discount </th>
                                                                        <th>Total Balance </th>
                                                                        <th>PaidAmt </th>
                                                                        <th>OutStanding &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Credit No &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Debit No &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Return No &nbsp;&nbsp;&nbsp;</th>
                                                                        <!-- <th>Advance Amt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Credit Amt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Debit Amt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Bank Charges &nbsp;&nbsp;&nbsp;</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
                                                            </table>
                                                        <!-- </div> -->
                                                       
                                                    </div>
                                                    <!-- <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add Row</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <!-- <hr /> -->
                                            <br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label><b>Customer Goods Return (Less)</b></label>
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
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><b>Manual Debit(Add) / Credit(Less) Note</b></label>
                                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="border-bottom-0 table table-hover" id="tbl2">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Select</th>
                                                                                    <th>Debit/Credit No</th>
                                                                                    <th>Dr Cr Amt</th>
                                                                                    <th>Credit Amount</th>
                                                                                    <th>Debit Amount</th>
                                                                                    <th>Balance</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="mdcn_body">
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

function getAccountNo(bank_id)
{
    $.ajax({
        url: '../../api/bank/get_account_no.php',
        //url: '../../api/bank/get_account_by_bank.php',
        type: 'POST',
        data: { id: bank_id },
        success: function(data) {
            $('#ac_no').html(data);
        }
    })
}

function show_data()
{
    var customer = document.getElementById("customer").value;
    if(customer != "")
    {
        //alert("showww");
        table = $('#tbl').DataTable( { 
        dom: 'Bfrtip',
        searching:false,
        paginate: false,
            lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            buttons: [],
            language : {
            "zeroRecords": " ",
        },
        ajax: 
        {
                "url": "../../api/retail/fetch_tax_invoice_items_for_receipt.php",
                "type": "POST",
                data : 
                {
                'customer_id' : customer,
                },
            },
            deferRender: true,
            "columnDefs": 
            [ 
            ],
            destroy:true, 
        });

        $.ajax( 
        {
            
            url: "../../api/retail/fetch_customer_advance.php",
            type: 'POST',
            data : 'customer_id='+customer,
            dataType:'text',  
            success: function(data)
            { 
                console.log(data);
                var d = data.split("#");
                // $("#advance_body").html(d[0]);
                $("#goods_body").html(d[1]);
                $("#mdcn_body").html(d[2]);
            },
        });
    }
    else{
        $.toast({
                heading: 'Error',
                text: 'Please Select Customer',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
       // alert("select customer");
    }
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
$(document).ready(function () {
    $('#add_purchase_order').on('click', function () {
        //alert("hhhhhhhhhhhhhhhhhh");
        //Loop through all checked CheckBoxes in GridView.

        

        // var payment_method = document.getElementById('payment_method').value;
        // var cash_amt = document.getElementById('cash_amt').value;
        // var card_amt = document.getElementById('card_amt').value;
        // var card_no = document.getElementById('card_no').value;
        // var cheque_amt = document.getElementById('cheque_amt').value;
        // var cheque_no = document.getElementById('cheque_no').value;
        // var cheque_date = document.getElementById('cheque_date').value;
    

        var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            invoice_id_pk = row.cells[0].childNodes[0].value;
            PO_no = row.cells[1].childNodes[0].value;
            PO_date = row.cells[2].childNodes[0].value;
            fin_yr = row.cells[3].childNodes[0].value;
            Amount = row.cells[4].childNodes[0].value;
            previous_paid = row.cells[5].childNodes[0].value;
            balance_amt = row.cells[6].childNodes[0].value;
            credit = row.cells[7].childNodes[0].value;
            debit = row.cells[8].childNodes[0].value;
            ret_good_amt = row.cells[9].childNodes[0].value;
            discount = row.cells[10].childNodes[0].value;
            tot_bal = row.cells[11].childNodes[0].value;
            paid_amt = row.cells[12].childNodes[0].value;
            outstanding = row.cells[13].childNodes[0].value;
            credit_no = row.cells[14].childNodes[0].value;
            debit_no = row.cells[15].childNodes[0].value;
            return_no = row.cells[16].childNodes[0].value;
            // advance = row.cells[17].childNodes[0].value;
            // credit_amt = row.cells[18].childNodes[0].value;
            // debit_amt = row.cells[19].childNodes[0].value;
            // bank_charge = row.cells[20].childNodes[0].value;

            rawItemArray.push({
                invoice_id_pk : invoice_id_pk,
                PO_no : PO_no,
                PO_date:PO_date,
                fin_yr:fin_yr,
                Amount:Amount,
                previous_paid:previous_paid,
                balance_amt:balance_amt,
                credit:credit,
                debit:debit,
                ret_good_amt:ret_good_amt,
                discount:discount,
                tot_bal:tot_bal,
                paid_amt:paid_amt,
                outstanding:outstanding,
                credit_no:credit_no,
                debit_no:debit_no,
                return_no:return_no,
                // advance:advance,
                // credit_amt:credit_amt,
                // debit_amt:debit_amt,
                // bank_charge:bank_charge
                
            });
            
        });
        var newRawItemArray = JSON.stringify(rawItemArray); 
        console.log(newRawItemArray);

        var bill_date = document.getElementById('bill_date').value;
        var bank = document.getElementById('bank').value;
        var ac_no = document.getElementById('ac_no').value;
        var remark = document.getElementById('remark').value;
        var payment_method = document.getElementById('cash').value;
        var cash_amt = document.getElementById('cash_amt').value;
        var card_amt = document.getElementById('card_amt').value;
        var card_no = document.getElementById('card_no').value;
        var cheque_amt = document.getElementById('cheque_amt').value;
        var cheque_no = document.getElementById('cheque_no').value;
        var cheque_date = document.getElementById('cheque_date').value;
        var customer = document.getElementById('customer').value;
        var branch = document.getElementById('branch').value;
        //alert("payment_method:"+payment_method);
        var payment_method = $("input[name='payment_method']:checked").val();
        //alert("payment_method:"+payment_method);

        $.ajax(
        {
            url: "../../api/retail/add_retail_receipt.php",
            type: 'POST',
            data : $('#form11').serialize() + "&newRawItemArray=" + newRawItemArray + '&bill_date=' + bill_date
            + "&bank=" + bank + '&ac_no=' + ac_no
            + "&remark=" + remark + '&payment_method=' + payment_method
            + "&cash_amt=" + cash_amt + '&card_amt=' + card_amt
            + "&card_no=" + card_no + '&cheque_amt=' + cheque_amt
            + "&cheque_no=" + cheque_no + '&cheque_date=' + cheque_date +'&customer='+customer+'&branch='+branch,
            dataType:'text',  
            success: function(data) 
            { 
                //alert("data:"+data);
                console.log(data);
                if(data == "1")
                {
                    // $.toast({
                    // heading: 'Success',
                    // text: 'Work Order Added Sussesfully',
                    // showHideTransition: 'slide',
                    // position: 'top-right',
                    // hideAfter: 5000,
                    // icon: 'error'
                    // })
                    // alert("Retail Receipt Added!")
                    // window.location.href="view_retail_receipt.php";
                    $.toast({
                                    heading: 'Success',
                                    text: 'Retail Receipt Added!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_retail_receipt.php";    
                                }, 5000);
                                $('#btn').atrr('disabled', true);
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
        if(ac_no == "") {
            $.toast({
                heading: 'Error',
                text: 'Please Select Account No.',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if(bank == "") {
            $.toast({
                heading: 'Error',
                text: 'Please Select Bank',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
    });
});
</script>
<script>
$('input[type=radio][name=payment_method]').change(function() {
    if (this.value == 'Cheque') 
    {
        //alert("Cheque");

        
        document.getElementById("cheque_amt").disabled = false;
        document.getElementById("cheque_no").disabled = false;
        document.getElementById("cheque_date").disabled = false;
    }
    else if (this.value == 'Cash/Card') 
    {
        //alert("Cash/Card");
        document.getElementById("cash_amt").disabled = false;
        document.getElementById("card_amt").disabled = false;
        document.getElementById("card_no").disabled = false;
    }
});
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
        //var check_advance =  document.getElementById("advance-"+row_id).value;
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
                //parseInt(check_advance)
                var n = parseInt(amt) - parseInt(new_return) -  parseInt(credit_check) + parseInt(debit_check);
                //alert("nnnnnnnn:"+n);
                if(n<0)
                    n = -(n);
                document.getElementById("total_bal-"+row_id).value = n;
                return_array.push({ id: get_id,ret_no:return_no,amount:return_amt,balance:return_bal});
                console.log("return Array:"+return_array);
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
                //- parseInt(check_advance)
                var n = parseInt(amt) - parseInt(new_return)  - parseInt(credit_check) + parseInt(debit_check);
                if(n<0)
                    n = -(n);
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
                if(n<0)
                    n = -(n);
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
                if(n<0)
                    n = -(n);
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
        //var check_advance =  document.getElementById("advance-"+row_id).value;
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
                    //alert("credit:"+credit);
                    var new_credit = parseInt(credit) + parseInt(crdt_bal);
                    
                    //alert("cr amt inside");
                    //- parseInt(check_advance) 
                    document.getElementById("credit-"+row_id).value = new_credit ;
                    var value_to_add = parseInt(balamt) - parseInt(new_credit) - parseInt(returngood_check) + parseInt(debit_check);
                    if(value_to_add<0)
                    value_to_add = -(value_to_add);
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
                    //- parseInt(check_advance)
                    var new_debit = parseInt(debit) + parseInt(crdt_bal);
                    //alert("dr amt inside");
                    document.getElementById("debit-"+row_id).value = new_debit ;
                    var value_to_add = parseInt(balamt)  - parseInt(credit_check) - parseInt(returngood_check) + parseInt(new_debit);
                    
                    //alert("debit_check:"+debit_check);
                    //alert("value_to_add:"+value_to_add);
                    if(value_to_add<0)
                        value_to_add = -(value_to_add);
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
                    //- parseInt(check_advance)
                    document.getElementById("credit-"+row_id).value = cr_amt ;
                    var value_to_add = parseInt(balamt)  - parseInt(new_cred) - parseInt(returngood_check) + parseInt(debit_check);
                    if(value_to_add<0)
                        value_to_add = -(value_to_add);
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
                    //- parseInt(check_advance)
                    var value_to_add = parseInt(balamt)  - parseInt(credit_check) - parseInt(returngood_check) + parseInt(new_deb);
                    
                    //alert("debit_check:"+debit_check);
                    //alert("value_to_add:"+value_to_add);
                    if(value_to_add<0)
                        value_to_add = -(value_to_add);
                    document.getElementById("total_bal-"+row_id).value = value_to_add ;

                    for(var i = 0; i < crdr_array.length; i++) 
                    {
                        if(crdr_array[i].id == get_id) {
                            crdr_array.splice(i, 1);
                            break;
                        }
                    }
                    var drln =  crdr_array.length;
                    //alert("drln:"+drln);
                    console.log("crdr_array:"+crdr_array);
                    var selected_debit_no = "";
                    //alert("selected_debit_no:"+selected_debit_no);
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
                        //alert("selected_debit_no11111111111111:"+selected_debit_no);
                        
                        //console.log("selected_debit_no:"+selected_debit_no);
                        //document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                    if(selected_debit_no!= "")
                    {   
                       // alert("inside:");
                        document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                    else if(selected_debit_no== "")
                    {
                       // alert("outside:");
                        document.getElementById("debit_no-"+row_id).value = 0;
                    }
                    else
                    {
                        //alert("error");
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