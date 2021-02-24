<?php include('../../partials/header.php');?>
<?php $flag = $_SESSION['flag']; ?>

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
    height: 125px;
    overflow-y: auto;
    border: 1px solid #c0c0c0;
    padding: 10px;
}

@media (min-width:768px) {
    .right-border {
        border-right: 3px solid #787878;
    }
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
	
<form method="post" id="form1" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Payment Advice</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="purchase_invocie_form">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <?php
                                                if($flag == 0) {
                                                $sql = "SELECT * FROM mstr_data_series where name='fin_payment_advice' and flag='0' ";
                                                }
                                                else {
                                                    $sql = "SELECT * FROM mstr_data_series where name='fin_payment_advice' and flag='1' ";
                                                }
                                                $result = mysqli_query($db,$sql);
                                                $row = mysqli_fetch_array($result);
                                                ?>
                                            <label class="col-md-3 label-control" for="userinput1">Payment Advice Id</label>
                                            <div class="col-md-9">
                                            <input type="text" id="pa_no" class="form-control " placeholder="" name="pa_no" readonly value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly >
                                                            <option value="Signature Concepts LLP" disabled selected>Signature Concepts LLP </option>
                                                        </select>
                                                    </div>										
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Fin Yr <span style="color:red;"> *</span></label>
                                                    <?php
                                                        if (date('m') > 6) {
                                                            $year = date('Y')."-".(date('Y') +1);
                                                        }
                                                        else {
                                                            $year = (date('Y')-1)."-".date('Y');
                                                        }
                                                        
                                                    ?>
                                                    <div class="col-md-9">
                                                    <select class="select2 form-control block" id="fin_yr" class="select2" data-toggle="select2" name="fin_yr" >
                                                        <option value="<?php echo $year; ?>" selected disabled><?php echo $year; ?></option>
                                                    </select>
                                                    </div>											
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Supplier <span style="color:red;"> *</span></label>
                                                    <div class="col-md-9">
                                                    <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier" >
                                                        <option value="" selected disabled>Select</option>
                                                        <?php
                                                            if($flag == 0) {
                                                            $sql = "SELECT supplier_id_fk FROM fin_purchase_invoice where flag='0' ";
                                                            }
                                                            else {
                                                                $sql = "SELECT supplier_id_fk FROM fin_purchase_invoice where flag='1' ";
                                                            }
                                                            $result = mysqli_query($db,$sql);
                                                            while($row1 = mysqli_fetch_row($result))
                                                            {   
                                                                if($flag == 0) {
                                                                $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$row1[0]' and flag='0' ";
                                                                }
                                                                else {
                                                                    $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$row1[0]' and flag='1' "; 
                                                                }
                                                                $res_supplier = mysqli_fetch_row(mysqli_query($db, $get_supplier));
                                                                ?>
                                                                <option value="<?php echo $row1[0];?>"><?php echo $res_supplier[1];?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Authorised By <span style="color:red;"> *</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                            <option value="" disabled selected>Select Authorised By </option>
                                                            <?php
                                                                if($flag == 0) {
                                                                $sql = "SELECT * FROM mstr_employee WHERE emp_status = 1 and flag='0' ";
                                                                }
                                                                else {
                                                                    $sql = "SELECT * FROM mstr_employee WHERE emp_status = 1 and flag='1' ";
                                                                }
                                                                $result = mysqli_query($db,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Date <span style="color:red;"> *</span></label>
                                            <div class="col-md-9">
                                                <input type="date" id="date" class="form-control " name="date" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group " style="text-align: center;">
                                            <button style="height: fit-content;" type="button" name="purchase_invoice_show" class="btn btn-primary" id="purchase_invoice_show" onclick="getPiTable();">
                                                    <i class="fa fa-check-square-o"></i> Show
                                            </button>
                                        </div>
							</div>
                            <br />
                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                    <div class="table-responsive">
                                                    <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                    <!-- <table class="border-bottom-0 table table-hover" id="tbl" > -->
                                                                <thead>
                                                                    <tr>
                                                                        <!-- <th></th> -->
                                                                        <th>Select </th>
                                                                        <th>PI Id </th>
                                                                        <th>Supplier Name </th>
                                                                        <th>Bill No </th>
                                                                        <th>Bill Amt </th>
                                                                        <th>Previous Paid </th>
                                                                        <th>Total </th>
                                                                        <th>GRR Ids</th>
                                                                        <th>GRR </th>
                                                                        <th>NetPay To Supplier</th>
                                                                        <th>Manual Dr Ids</th>
                                                                        <th>Manual Dr</th>
                                                                        <th>Manual Cr Ids</th>
                                                                        <th>Manual Cr</th>
                                                                        <th>Advance Payment</th>
                                                                        <th>Amount</th>
                                                                        <th>Discount</th>
                                                                        <th>Total Pay</th>
                                                                        <th>Other +/-</th>
                                                                        <th>Pay Amount</th>
                                                                        <th></th>
                                                                        <th>Remark</th>
                                                                        <th>Grr Date</th>
                                                                        <th>Grr Display nos</th>
                                                                        <th>Drr Display Amt</th>
                                                                        <th>Pi Dr Per</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        <!-- </div> -->
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <br /><br />
                                            
                                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <h3><b>Supplier Return Goods</b></h3>
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="border-bottom-0 table table-hover" id="tbl1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>Supplier Name</th>
                                                                    <th>GRR No</th>
                                                                    <th>Actual Amt</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="srg_body">
                                                                <tr>
                                                                    <td><input type="checkbox" style="height: 20px;width: 20px;" /></td>
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
                                        <div class="col-md-4">
                                            <h3><b>Manual Dr Cr</b></h3>
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="border-bottom-0 table table-hover" id="tbl1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>Debit/Credit No</th>
                                                                    <th>Dr Cr Amt</th>
                                                                    <th>Debit Amount</th>
                                                                    <th>Credit Amount</th>
                                                                    <th>Balance</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="mdr_body">
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
                                        <div class="col-md-4">
                                            <h3><b>Advance Payment Deduction</b></h3>
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="border-bottom-0 table table-hover" id="tbl2">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>Supplier Name</th>
                                                                    <th>Advance No</th>
                                                                    <th>Actual Amount</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="advance_body">
                                                                <tr>
                                                                    <td><input type="checkbox" style="height: 20px;width: 20px;" /></td>
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
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="add_purchase_order"  >
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>

                                <a href="view_finance_payment_advice_reprint.php" name="print_payment_advice" class="btn btn-primary" id="print_payment_advice" >
	                                <i class="fa fa-check-square-o"></i> Print payment advice
	                            </a>
								
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
    var table="";
    $(document).ready(function()
    {
        table= $('#tbl').DataTable( {
        
            paginate: false,
            lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            buttons: [],
            searching:false,
            language : {
                "zeroRecords": " "             
            },
        });

    });

    $('#add_purchase_order').click(function(){
        //alert('dsfgd');
        var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            //alert("rowww:"+row);
            pi_id = row.cells[1].childNodes[0].value;
            supplier_name = row.cells[2].childNodes[0].value;
            bill_no = row.cells[3].childNodes[0].value;
            bill_amt = row.cells[4].childNodes[0].value;
            previous_paid = row.cells[5].childNodes[0].value;
            total = row.cells[6].childNodes[0].value;
            grr_id = row.cells[7].childNodes[0].value;
            grr_amt = row.cells[8].childNodes[0].value;
            net_payto_supp = row.cells[9].childNodes[0].value;
            dr_id = row.cells[10].childNodes[0].value;
            dr_amt = row.cells[11].childNodes[0].value;
            cr_id = row.cells[12].childNodes[0].value;
            cr_amt = row.cells[13].childNodes[0].value;
            adv_payment = row.cells[14].childNodes[0].value;
            amount = row.cells[15].childNodes[0].value;
            discount = row.cells[16].childNodes[0].value;
            total_pay = row.cells[17].childNodes[0].value;
            other = row.cells[18].childNodes[0].value;
            pay_amt = row.cells[19].childNodes[0].value;
            remark = row.cells[21].childNodes[0].value;
            // grr_date = row.cells[20].childNodes[0].value;
            // grr_disp_no = row.cells[21].childNodes[0].value;
            // grr_disp_amt = row.cells[22].childNodes[0].value;
            // pi_dr_per = row.cells[23].childNodes[0].value;

            rawItemArray.push({
                pi_id: pi_id,
                supplier_name: supplier_name,
                bill_no: bill_no,
                bill_amt: bill_amt,
                prev_paid: previous_paid,
                total: total,
                grr_id: grr_id,
                grr_amt: grr_amt,
                net_payto_supp: net_payto_supp,
                dr_id: dr_id,
                dr_amt: dr_amt,
                cr_id: cr_id,
                cr_amt: cr_amt,
                adv_payment: adv_payment,
                amount: amount,
                discount: discount,
                total_pay: total_pay,
                other: other,
                pay_amt: pay_amt,
                remark: remark,
                
            });
        });
            var newRawItemArray = JSON.stringify(rawItemArray);
            console.log(newRawItemArray);

            var branch = document.getElementById('branch').value;
            var fin_yr = document.getElementById('fin_yr').value;
            var date = document.getElementById('date').value;
            var supplier = document.getElementById('supplier').value;
            var authorised_by = document.getElementById('authorised_by').value;
        if (branch != "" && fin_yr != "" && date != "" && supplier != "" && authorised_by != "") 
        {
            $.ajax({
                url: '../../api/finance/add_fin_payment_advice.php',
                type: 'POST',
                data: {
                    'newRawItemArray': newRawItemArray,
                    'branch': branch,
                    'fin_yr': fin_yr,
                    'date': date,
                    'supplier': supplier,
                    'authorised_by': authorised_by
                },
                success: function(data){
                    console.log(data);
                    if(data == 1)
                    {
                        $.toast({
                            heading: 'Success',
                        text: 'Data Added Successfully!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'success'
                        })
                        setTimeout(() => {
                            window.location.href="view_finance_payment_advice.php";                                
                        }, 5000);
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid Details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                    }
                }

            })
            
        }
        else 
        {
            if (branch == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Select Branch',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (fin_yr == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Select Financial Year',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (date == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Enter Date',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (supplier == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Select Supplier',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (authorised_by == "") {
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
        // var newRawItemArray = JSON.stringify(rawItemArray);
        // console.log(newRawItemArray);
    })
    
</script>

<script>
    function getPiTable()
    {
        var supplier = document.getElementById('supplier').value;
        if(supplier == '')
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Supplier',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
           // alert('select supplier');
            return;
        }
        table.clear().draw();

        $.ajax({
            type: "POST",
            url:"../../api/finance/get_pi_table.php",
            data : 
            {
                'supplier': supplier
            },
            dataType:'json',

            success:function(data){
            console.log(data);
            var i = 1;  
            $.each(data, function(index) 
            {
                var start = data[index].start;
                var select = `<input type="checkbox" value="${start}" id="row_check-${index}" onchange="tax_invoice_click(this.id)" />`;
                var pi_id = `<input type="text" value="${data[index].pi_id}" id="pi_id-${index}" class="form-control" />`;
                var supplier = `<input type="text" value="${data[index].supplier}" id="supplier-${index}" class="form-control" />`;
                var bill_no = `<input type="text" value="${data[index].bill_no}" id="bill_no-${index}" class="form-control" />`;
                var bill_amt = `<input type="text" value="${data[index].bill_amt}" id="bill_amt-${index}" class="form-control" />`;
                var prev_paid = `<input type="text" value="${data[index].prev_paid}" id="prev_paid-${index}" class="form-control" onkeyup="getAmount(this.id)" />`;
                var total = `<input type="text" value="${data[index].total}" id="total-${index}" class="form-control" />`;
                var grr_id = `<input type="text" value="${data[index].grr_id}" id="grr_id-${index}" class="form-control" />`;
                var grr = `<input type="text" value="${data[index].grr}" id="grr-${index}" class="form-control" />`;
                var netpayto_supplier = `<input type="text" value="${data[index].netpayto_supplier}" id="netpayto_supplier-${index}" class="form-control" />`;
                var manual_drid = `<input type="text" value="${data[index].manual_drid}" id="manual_drid-${index}" class="form-control" />`;
                var manual_dr = `<input type="text" value="${data[index].manual_dr}" id="debit-${index}" class="form-control" />`;
                var manual_crid = `<input type="text" value="${data[index].manual_crid}" id="manual_crid-${index}" class="form-control" />`;
                var manual_cr = `<input type="text" value="${data[index].manual_cr}" id="credit-${index}" class="form-control" />`;
                var adv_payment = `<input type="text" value="${data[index].adv_payment}" id="adv_payment-${index}" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
                var amount = `<input type="text" value="${data[index].amount}" id="amount-${index}" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
                var discount = `<input type="text" value="${data[index].discount}" id="discount-${index}" class="form-control" onkeyup="getRowDiscountValue(this.id)" />`;
                var total_pay = `<input type="text" value="${data[index].total_pay}" id="total_pay-${index}" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
                var other = `<input type="text" value="${data[index].other}" id="other-${index}" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
                var pay_amt = `<input type="text" value="${data[index].pay_amount}" id="pay_amount-${index}" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
                var apply_credit = `<input type="checkbox" class="d-none" id="apply_credit-${index}" />`;
                var remark = `<input type="text" value="${data[index].remark}" id="remark-${index}" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
                var grr_date = `<input type="text" value="${data[index].grr_date}" id="grr_date-${index}" class="form-control" />`;
                var grr_disp_no = `<input type="text" value="${data[index].grr_disp_no}" id="grr_disp_no-${index}" class="form-control" />`;
                var grr_disp_amt = `<input type="text" value="${data[index].grr_disp_amt}" id="grr_disp_amt-${index}" class="form-control" />`;
                var p_drper = `<input type="text" value="${data[index].pi_drper}" id="pi_drper-${index}" class="form-control" />`;

                table.row.add([
                    // start,
                    select,
                    pi_id,
                    supplier,
                    bill_no,
                    bill_amt,
                    prev_paid,
                    total,
                    grr_id,
                    grr,
                    netpayto_supplier,
                    manual_drid,
                    manual_dr,
                    manual_crid,
                    manual_cr,
                    adv_payment,
                    amount,
                    discount,
                    total_pay,
                    other,
                    pay_amt,
                    apply_credit,
                    remark,
                    grr_date,
                    grr_disp_no,
                    grr_disp_amt,
                    p_drper
                ]).draw(false);
                i++;
                }); 
            }
        });

        $.ajax(
            {
                
                url: "../../api/finance/fetch_customer_advance.php",
                type: 'POST',
                data : 'supplier_id='+supplier,
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    // if(data == "1")
                    // {
                        //advance_body
                        var d = data.split("#");
                        $("#srg_body").html(d[0]);
                        $("#mdr_body").html(d[1]);
                        $("#advance_body").html(d[2]);
                
                },
            });

    }

    function getRowDiscountValue(id)
    {
        var get_id = id.slice(id.length-1);
        var discount = "discount-".concat(get_id);
        var bill = "bill_amt-".concat(get_id);
        var bill_amt = $(`#${bill}`).val();

        var disc_val = $(`#${discount}`).val();
        if(disc_val == '')
            disc_val = 0;

        var total_pay = "total_pay-".concat(get_id);
        var total_pay_val = $(`#${total_pay}`).val();

        var amount = parseFloat(bill_amt) - parseFloat(disc_val);
        $(`#${total_pay}`).val(amount);

    }

    function getAmount(id)
    {
        var get_id = id.slice(id.length-1);
        var prev_paid = "prev_paid-".concat(get_id);
        var bill = "bill_amt-".concat(get_id);
        var bill_amt = $(`#${bill}`).val();

        var prev_paid_val = $(`#${prev_paid}`).val();
        if(prev_paid_val == '')
            prev_paid_val = 0;

        var total = "total-".concat(get_id);
        var total_val = $(`#${total}`);

        var amount = parseFloat(bill_amt) - parseFloat(prev_paid_val);
        total_val.val(amount);

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
        var amt =  document.getElementById("amount-"+row_id).value;
        var check_adv_payment =  document.getElementById("adv_payment-"+row_id).value;
        var credit_check =  document.getElementById("credit-"+row_id).value;
        var debit_check =  document.getElementById("debit-"+row_id).value;
        var grr_check =  document.getElementById("grr-"+row_id).value;

        
        if(return_ch == true)
        {
            
            //alert("row id:"+row_id);
            if (return_array.filter(item=> item.id == get_id).length == 0)
            {
                
                var return_good = document.getElementById("grr-"+row_id).value;
                var new_return = parseInt(return_good) + parseInt(return_bal);
                document.getElementById("grr-"+row_id).value = new_return;
                var bal_amt = document.getElementById("amount-"+row_id).value ;

                var n = parseInt(amt) - parseInt(new_return) - parseInt(check_adv_payment) - parseInt(credit_check) + parseInt(debit_check);
                //alert("nnnnnnnn:"+n);
                document.getElementById("total_pay-"+row_id).value = n;
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
                var return_good = document.getElementById("grr-"+row_id).value;
                //alert("return_good amt:"+return_good);
                var new_return = parseInt(return_good) - parseInt(minus_amt);
                //alert("new_return:"+new_return);
                document.getElementById("grr-"+row_id).value = new_return;
                var bal_amt = document.getElementById("amount-"+row_id).value ;
                //var n = parseInt(total_balace_new) - parseInt(new_return);
                var n = parseInt(amt) - parseInt(new_return) - parseInt(check_adv_payment) - parseInt(credit_check) + parseInt(debit_check);
                document.getElementById("total_pay-"+row_id).value = n;
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
            }
        }
        else
        {
            //alert("error");
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
        var balamt =  document.getElementById("amount-"+row_id).value;
        var check_advance =  document.getElementById("adv_payment-"+row_id).value;
        var credit_check =  document.getElementById("credit-"+row_id).value;
        var debit_check =  document.getElementById("debit-"+row_id).value;
        var returngood_check =  document.getElementById("grr-"+row_id).value;

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
                    document.getElementById("total_pay-"+row_id).value = value_to_add ;
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
                    document.getElementById("total_pay-"+row_id).value = value_to_add ;

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
                    document.getElementById("total_pay-"+row_id).value = value_to_add ;

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
                    document.getElementById("total_pay-"+row_id).value = value_to_add ;

                    for(var i = 0; i < crdr_array.length; i++) 
                    {
                        if(crdr_array[i].id == get_id) {
                            crdr_array.splice(i, 1);
                            break;
                        }
                    }
                    var drln =  crdr_array.length;
                  //  alert("drln:"+drln);
                    console.log("crdr_array:"+crdr_array);
                    var selected_debit_no = "";
                   // alert("selected_debit_no:"+selected_debit_no);
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
                       // alert("selected_debit_no11111111111111:"+selected_debit_no);
                        
                        //console.log("selected_debit_no:"+selected_debit_no);
                        //document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                    if(selected_debit_no!= "")
                    {   
                        //alert("inside:");
                        document.getElementById("debit_no-"+row_id).value = selected_debit_no;
                    }
                    else if(selected_debit_no== "")
                    {
                        //alert("outside:");
                        document.getElementById("debit_no-"+row_id).value = 0;
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Error',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })          
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

</script>

