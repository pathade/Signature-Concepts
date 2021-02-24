<?php include('../../partials/header.php');?>

<?php 
    $id = $_GET['id'];

    $sql = "SELECT *,cust_name  FROM `wholesale_receipt` as wr,tbl_wholesale_customer as wc 
    where wr.cust_id_fk = wc.wc_id_pk AND wr.rec_id_pk='$id'";

    echo $sql = "SELECT *,cust_name,b.bank_name as bname123 ,b.bank_idpk as bid 
    FROM `wholesale_receipt` as wr,tbl_wholesale_customer as wc ,mstr_bank as b
    where wr.cust_id_fk = wc.wc_id_pk AND 
    wr.bank_name = b.bank_idpk AND 
    wr.rec_id_pk='$id'";
    $bh = mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($bh))
    {
        echo $row['bname123'];

        if($row['payment_type'] == "Cash/Card")
        {
            $cheque_amt = 0;
            $cheque_no = 0;
            $cheque_dt = 0;

            $cash_amount = $row['cash_amount'];
            $card_amount = $row['card_amount'];
            $card_no = $row['card_no'];
        }
        else if($row['payment_type'] == "Cheque")
        {
            $cheque_amt = $row['cheque_amt'];
            $cheque_no = $row['cheque_no'];
            $cheque_dt = $row['cheque_dt'];

            $cash_amount = $row['cash_amount'];
            $card_amount = $row['card_amount'];
            $card_no = $row['card_no'];
        }
        else
        {
            
        }
        

?>


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
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Update Wholesale Receipt</h4>
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
	                    <form class="form form-horizontal" id="form1" data-toggle="validator" role="form">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly >
                                                            <option value="Signature Concepts LLP" disabled selected>Signature Concepts LLP </option>
                                                        </select>
                                                    </div>										
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Cust Name</label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                            <option value="<?php echo $row['cust_id_fk'];?>" disabled selected><?php echo $row['cust_name'];?> </option>
                                                            <?php

                                                                $sql = "SELECT * FROM tbl_wholesale_customer";
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
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bill Date</label>
                                                    <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $row['receipt_date']; ?>" id="bill_date" name="bill_date" />
                                                    </div>											
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bank Name </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="bank_name" onchange="getAccountNo()" name="bank_name" readonly>
                                                                <option value="<?php echo $row['bid'];?>"><?php echo $row['bname123'];?></option>
                                                            <?php
                                                                //$option="<option value=''>".$row['bname']."</option>";
                                                                //echo $option;
                                                                $sql =  "SELECT distinct bank_name FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                                $result = mysqli_query($db, $sql);
                                                                while($row2 = mysqli_fetch_array($result))
                                                                {
                                                                    $option="<option value='".$row2['bank_name']."'>".$row2['bank_name']."</option>";
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
                                                        <select class="form-control" id="account_no" name="account_no" data-placeholder="Select Account No"  readonly>
                                                        <option value="<?php echo $row['account_no'];?>"><?php echo $row['account_no'];?></option>
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
                                                <input type="text" id="remark" class="form-control " name="remark" value="<?php echo $row['remark'];?>">
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
                                            <?php 
                                                if($row['payment_type'] == "Cash/Card")
                                                {
                                                    ?>
                                                        <input type="radio" name="payment_method" id="cash" value="Cash/Card" style="height: 15px;width: 17px;" checked > &nbsp;Cash/Card
                                                    <?php

                                                }
                                                else
                                                {
                                                    ?>
                                                    <input type="radio" name="payment_method" id="cash" value="Cash/Card" style="height: 15px;width: 17px;"  > &nbsp;Cash/Card
                                                    <?php

                                                }
                                            
                                            ?>
                                                
                                                
                                                <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Cash Amt</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="<?php echo $cash_amount; ?>" placeholder="0" name="cash_amt" id="cash_amt" />
                                                            </div>
                                                            <label class="col-md-4 label-control mt-1" for="userinput1">Card No</label>
                                                            <div class="col-md-8 mt-1">
                                                                <input type="text" class="form-control" value="<?php echo $card_no; ?>" placeholder="0" name="card_no" id="card_no" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Card Amt</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="<?php echo $card_amount; ?>" placeholder="0" name="card_amt" id="card_amt" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <?php 
                                                if($row['payment_type'] == "Cheque")
                                                {
                                                    ?>
                                                        <input type="radio" name="payment_method" value="Cheque" id="cash" style="height: 15px;width: 17px;" checked> &nbsp;Cheque
                                                    <?php

                                                }
                                                else
                                                {
                                                    ?>
                                                    <input type="radio" name="payment_method" value="Cheque" id="cash" style="height: 15px;width: 17px;" > &nbsp;Cheque
                                                    <?php

                                                }
                                            
                                            ?>
                                                
                                                <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Cheque Amt</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="<?php echo $cheque_amt; ?>"  placeholder="0" name="cheque_amt" id="cheque_amt" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput1">Cheque No</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="<?php echo $cheque_no; ?>" placeholder="0" name="cheque_no" id="cheque_no" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row mb-1">
                                                            <label class="col-md-2 label-control" for="userinput1">Date</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"  value="<?php echo $cheque_dt; ?>" name="cheque_date" id="cheque_date" value="<?php echo date('Y-m-d'); ?>" />
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
                                        <div class="form-group row">
                                            <div class="table-responsive">
                                                <table class="border-bottom-0 table table-hover" id="tbl">
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
                                        </div>
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
                                                            <tbody>
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
                                                                    <th>No</th>
                                                                    <th>Amount</th>
                                                                    <th>Balance Redeem</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
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
                                                                    <th>Debit/Credit No</th>
                                                                    <th>Dr Cr Amt</th>
                                                                    <th>Credit Amount</th>
                                                                    <th>Debit Amount</th>
                                                                    <th>Balance</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
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
</form>
</section>
</div>
</div>
</div>

<?php include('../../partials/footer.php');?>
<script>

$(document).ready(function()
{
    // $("#tbl input[type=checkbox]:checked").each(function () {
    //         var row = $(this).closest("tr")[0];
    //         //alert("rowww:"+row);
    //         invoice_id_pk = row.cells[0].childNodes[0].value;

    //         rawItemArray.push({
    //             invoice_id_pk : invoice_id_pk
    //         });
            
    //     });
    //     var newRawItemArray = JSON.stringify(rawItemArray);
    //     console.log(newRawItemArray);

  table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:true,
            ajax: 
            {
                "url": "../../api/wholesale/fetch_receipt_items_for_update.php",
                "type": "POST",
                data : 
                {
                    'receipt_id' : <?php echo $_GET['id'];?>
                },
                // dataType: 'text',
                // success: function(data)
                // { 
                //     alert("hii");
                //     console.log("reverse data:"+data);
                
                
                // },
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
  
});
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
//invoice_array
$(document).ready(function () {
    $('#add_purchase_order').on('click', function () {
        //alert("hhhhhhhhhhhhhhhhhh");
        //console.log(invoice_array);
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
        var account_no123 = document.getElementById("account_no").value;
        var an = document.getElementById("account_no").value;
        alert("account_no:"+account_no123);
        var remark = document.getElementById("remark").value;
        var cheque_amt = document.getElementById("cheque_amt").value;
        var cheque_no = document.getElementById("cheque_no").value;
        var cheque_dt = document.getElementById("cheque_date").value;
        //pay type:
        if(cust != "" && pay_type!=undefined && bank_name!="" && account_no!="")
        {
            $.ajax(
            {
                url: "../../api/wholesale/update_wholesale_receipt.php",
                type: 'POST',
                data : $('#form1').serialize() + 
                "&newRawItemArray=" + newRawItemArray +'&edit='+<?php echo $_GET['id'];?> +'&payment_method='+pay_type
                +'&customer='+cust + '&bank_name='+bank_name+'&account_no1 ='+account_no123 +'&remark='+remark
                +'&cheque_amt='+cheque_amt+'&cheque_no='+cheque_no+'&cheque_date='+cheque_dt+'&an='+an,
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
                        $('#btn').atrr('disabled', true);
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

<?php } ?> 