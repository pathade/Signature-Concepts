<?php include('../../partials/header.php');?>
<?php 
    $flag=$_SESSION['flag'];
    $get_retail_tax_invoice = "SELECT * FROM retail_tax_invoice WHERE id_pk='".$_GET['id']."'";
    $res_retail_tax_invoice = mysqli_query($db, $get_retail_tax_invoice) or die(mysqli_error($db));
    $row = mysqli_fetch_array($res_retail_tax_invoice);
    
    $ds = "SELECT * FROM retail_proforma WHERE id_pk='".$row['2']."'";
    $fg = mysqli_query($db,$ds);
    while($ml = mysqli_fetch_array($fg))
    {
        $pono123 = $ml['order_no'];
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Retail Tax Invoice</h4>
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
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <div class="d-none"> 
                                            <label class="col-md-3 label-control" for="userinput1">ID</label>
				                        	<div class="col-md-3">
												<input type="text" id="rti_id" class="form-control " name="pi_no" readonly value="<?php echo $row['0'] ?>" >
											</div>
                                            </div>
                                        	<label class="col-md-3 label-control" for="userinput1">PI No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="pi_no" class="form-control " name="pi_no" readonly value="<?php echo $row['1'] ?>" >
											</div>
                                            <label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="date" id="date" class="form-control " name="date" value="<?php echo date('Y-m-d'); ?>">
											</div>											
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onchange="fetchCustomerData(this.value)">
                                            <?php
                                            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['3']."'";
                                            $res_customer = mysqli_fetch_array(mysqli_query($db, $get_customer));
                                            ?>
                                                <option value="<?php echo $row['3'] ?>" selected><?php echo $res_customer['0'] ?></option>
                                                
												</select>
                                                <span id="customer_error" style="color:red;">Customer is required!</span>
                                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Pur. Order No <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="pur_order_no" name="pur_order_no" class="select2" data-toggle="select2" >
                                                <option value="<?php echo $row['2'] ?>" selected><?php echo $pono123; ?></option>
                                                
												</select>
                                                <span id="pono_error" style="color:red;">Purchase Order no. is required!</span>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" class="form-control " value="<?php echo $row['4'] ?>" name="mobile_no" readonly>
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Address </label>
                                            <div class="col-md-9 ">
                                                <textarea type="text" class="form-control" rows="7" name="address" id="address" style="height: auto;" readonly><?php echo $row['5'] ?></textarea>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly >
                                                    <option value="Signature Concepts" selected>Signature Concepts</option>
												</select>
                                            </div>
				                        </div>
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Transporter <span style="color:red;">*</span></label>
				                        	<div class="col-md-3">
                                                <select class="form-control" id="transporter" name="transporter" >
                                                <?php
                                                $get_transporter = "SELECT name FROM mstr_transporter WHERE t_id_pk='".$row['7']."'";
                                                $res_transporter = mysqli_fetch_array(mysqli_query($db, $get_transporter));
                                                ?>
                                                    <option value="<?php echo $row['7'] ?>" selected><?php echo $res_transporter['0'] ?></option>
                                                  
												</select>
                                                <span id="transporter_error" style="color:red;">Transporter is required!</span>
                                            </div>
                                            <label class="col-md-2 label-control" for="userinput1">Vehicle <span style="color:red;">*</span></label>
				                        	<div class="col-md-4">
                                                <select class="form-control" id="vehicle" name="vehicle" >
                                                <?php
                                                echo $get_tvehicle = "SELECT v_no FROM mstr_transporter_vehicle WHERE tv_id_pk='".$row['8']."'";
                                                $res_tvehicle = mysqli_fetch_array(mysqli_query($db, $get_tvehicle));
                                                ?>
                                                    <option value="<?php echo $row['8'] ?>" selected><?php echo $res_tvehicle['0'] ?></option>
												</select>
                                                <span id="vehicle_error" style="color:red;">Vehicle is required!</span>
                                            </div>
				                        </div>
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Prepared By <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
				                        	    <select class="form-control" id="prepared_by" name="prepared_by" >
				                        	   <option value="" selected>--Select Prepared By--</option>
				                        	    <?php 
				                        	        $df = "SELECT * FROM mstr_employee";
				                        	        $df_res = mysqli_query($db,$df);
				                        	        while($df_row = mysqli_fetch_array($df_res))
				                        	        {
				                        	            ?>
				                        	            <option value="<?php echo $df_row['emp_id_pk'];?>" ><?php echo $df_row['emp_name'];?></option>
				                        	            <?php
				                        	        }
				                        	    ?>
                                                
                                                    
												</select>
                                            </div>
				                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Stock Point</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="stock_point" name="stock_point" readonly >
                                                    <option value="Signature LLP" selected>Signature LLP</option>
												</select>
                                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 7px;font-size: 16px;">
                                        <label style="color: red;"><b>Ledger Balance 0 </b></label>
									</div>
		                        </div>
							</div>
                            <div class="row">
                            <div class="col-md-12">
                                                    <div class="form-group row">
                                                        
                                                    <div class="table-responsive">
                                                    <table class="border-bottom-0 table table-hover table-responsive" id="tbl" >
                                                                <thead>
                                                                    <?php
                                                                    if($flag==0)
                                                                    {
                                                                    echo '<tr>
                                                                        <th>CAT &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DESIGN &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Size &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>UOM &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>QUANTITY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Sqrft &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>RATE &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT %&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT Rs&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>GST%&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>CGST Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>SGST Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>IGST Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>REMARK&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>PROCESS&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                    </tr>';
                                                                    }
                                                                    else
                                                                    {
                                                                    echo '<tr>
                                                                        <th>CAT &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DESIGN &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Size &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>UOM &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>QUANTITY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Sqrft &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>RATE &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT %&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT Rs&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th>REMARK&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>PROCESS&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                    </tr>';
                                                                    }
                                                                    ?>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Quantity</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['13'] ?>" id="total_qty" name="total_qty" readonly="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Sq.ft.</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['14'] ?>" id="total_sqfit" name="total_sqfit" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Gross Amt.</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['15'] ?>" id="gross_amt" name="gross_amt" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Total</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['16'] ?>" id="total" name="total" readonly="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Discount(%)</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['17'] ?>" id="disc_percent" name="disc_percent" readonly="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Discount</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['18'] ?>" id="discount_final" name="discount_final" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Other(+/-)</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['19'] ?>" id="adjustment_final" name="adjustment_final" onkeyup='get_final_amount(this.value);' >
                                                        </div>
                                                        <div class="col-md-1 d-none">
                                                            <label class=" label-control" for="userinput1"><b>Pro Amt.</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['20'] ?>" id="process_amount" name="process_amount" onkeyup='get_final_amount(this.value);'>
                                                        </div>
                                                        <?php if($flag==0)
                                                        { ?>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Tax Amt.</b></label>
                                                            <input type="text" class="form-control" value="0" id="tax_amount" name="tax_amount" readonly>
                                                        </div>
                                                        <?php 
                                                        }
                                                        else { ?>
                                                        <div class="col-md-2 d-none">
                                                            <label class=" label-control" for="userinput1"><b>Tax Amt.</b></label>
                                                            <input type="text" class="form-control" value="0" id="tax_amount" name="tax_amount" readonly>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" id="final_total" name="final_total" readonly="">
                                                            <span id="net_amt_error" style="color:red;">Net Amt is Required</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

	                        <div class="form-actions right">
								<?php 
								    if($row['receipt_added']=='0')
								    {
								        ?>
								        <button type="button" name="add_retail_tax_invoice" class="btn btn-primary" id="add_retail_tax_invoice" >
        	                                <i class="fa fa-check-square-o"></i> Update
        	                            </button>
								        <?php
								        
								    }
								    else
								    {
								        ?>
								        <button type="button" name="" class="btn btn-primary" id="" onclick="display_msg();">
        	                                <i class="fa fa-check-square-o"></i> Update
        	                            </button>
								        <?php
								        
								    }
								?>
								
								
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
    document.getElementById("customer_error").style.display = "none";
    document.getElementById("transporter_error").style.display = "none";
    document.getElementById("vehicle_error").style.display = "none";
    document.getElementById("pono_error").style.display = "none";
    document.getElementById("net_amt_error").style.display = "none";
    ///////////////////////////
});
</script>
<script>
    var table="";
    $(document).ready(function()
    {
        var updateItemId = '<?php echo $_GET['id'] ?>';
        table = $('#tbl').DataTable( {
        searching:true,   
        ajax: {
                "url": '../../api/retail/get_rti_table.php',
                "type": "POST",
                data : 
                {
                'itemId' : updateItemId,
                },
            },
            deferRender: true,
        destroy:true,
    });    

    
    
    window.setInterval(function()
        {
            var count=table.rows().count();


            var amount=0;
            var discount=0;
            var totalqty=0;
            var totalsqft = 0;
            var totaldisc = 0;
            var gross = 0;
            var tgross = 0;
            var tax_amt = 0;

            for(var i=0;i<count;i++)
            {
                
                var tblamt=table.cell(i,9).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var tbl5=table.cell(i,8).nodes().to$().find('input').val()
    
                var discount= parseInt(discount) +parseInt(tbl5);
            
                var tbl2=table.cell(i,4).nodes().to$().find('input').val()
    
                var totalqty= parseInt(totalqty) +parseInt(tbl2);

                var tbl89=table.cell(i,6).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tbl89);

                var tbldisc=table.cell(i,7).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldisc);

                var q = table.cell(i,4).nodes().to$().find('input').val();
                var r =  table.cell(i,6).nodes().to$().find('input').val();
                var gross = parseFloat(q) * parseFloat(r);
                var tgross= parseFloat( tgross) +parseFloat(gross);

                var tbl12 = table.cell(i, 13).nodes().to$().find('input').val();
                var tax_amt = parseFloat(tax_amt) + parseFloat(tbl12);


            }

        
            document.getElementById('total').value=amount;
            document.getElementById('discount_final').value=discount;
            document.getElementById('total_qty').value=totalqty;
            document.getElementById('total_sqfit').value=totalsqft;
            document.getElementById('disc_percent').value=totaldisc;
            document.getElementById('gross_amt').value=tgross;
            document.getElementById('tax_amount').value=tax_amt;
            // document.getElementById('final_total').value=amount;


        
        },1000
        );
    });
    function get_category(e)
    {
        //alert("e is:"+e);
        var category_name = document.getElementById(e).value;
        //alert("category_name:"+category_name);

        //var get_id= e.slice(e.length - 1);
        var get_id = e.split("-");
        var get_id = get_id[1];
        
        $.ajax({
            type: "POST",
            url: '../../api/item/fetch_items.php',
            data: "category_name="+category_name ,
            success: function(data)
            { 
                //alert("result is:"+data);
                var d = data.split("#");
                var item_id = "item_id-".concat(get_id);
                //alert("custom id is:"+item_id);
                //document.getElementById(item_id).html = data;
                $('#'+item_id).html(d[0]);
            }
        });
    }
    function get_item(e) 
    {
        
        var id=document.getElementById(e).value;
        //alert("id:"+id);
        
        //var get_id= e.slice(e.length - 1);
        var get_id = e.split("-");
        var get_id = get_id[1];
    
        $.ajax({
            type: "POST",
            url: '../../api/item/fetch_item_purchase_rate.php',
            data: "id="+id ,
            success: function(data)
            { 
                var d = data.split("#");
                var rate = "rate-".concat(get_id);
                var quantity="quantity-".concat(get_id);
                //alert("qty:"+quantity);
                var quantity_value =document.getElementById(quantity).value;

                $('#'+rate).val(d[0]);
                var amount_value=d[0]*quantity_value;
                var amount="amount-".concat(get_id);
                $('#'+amount).val(amount_value);

                //assign size to textbox
                var size = "size-".concat(get_id);
                // alert("size:"+size);
                // alert(d[1]);
                $('#'+size).val(d[1]);

                // gst calculation
                var gst_per = "gst_per-".concat(get_id);
                var cgst = "cgst-".concat(get_id);
                var sgst = "sgst-".concat(get_id);
                var igst = "igst-".concat(get_id);

                var gst = amount_value * $('#'+gst_per).val()/100;
                gst = gst.toFixed(2);  // show 2 digits after decimal point
                $('#'+cgst).val(gst);
                $('#'+sgst).val(gst);
                var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val());
                igst_val = igst_val.toFixed(2);
                $('#'+igst).val(igst_val);

            } 
        });
    
    }      
    function get_row_discount_value(e) 
    {

        //var get_id= e.slice(e.length - 1);
        var get_id = e.split("-");
        var get_id = get_id[1];



        var table_discount=document.getElementById(e).value;
        
        var quantity = "quantity-".concat(get_id);
        var quantity_value=document.getElementById(quantity).value;
        var rate = "rate-".concat(get_id);

        var rate=document.getElementById(rate).value;
        
        var amount_value=rate*quantity_value;
    
        var amount = "amount-".concat(get_id);
    
        var disc_per=(table_discount/amount_value) * 100;

        var disc_per= parseFloat(disc_per).toFixed(2)
        var table_discount_per = "table_discount_per-".concat(get_id);
        // alert(table_discount_per);
        if(table_discount==''){
            var total=parseFloat(amount_value)-0;
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_per).value='0'
        }
        else{
            var total=parseFloat(amount_value)-parseFloat(table_discount);
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_per).value=disc_per;
        }

            var gst_per = "gst_per-".concat(get_id);
            var cgst = "cgst-".concat(get_id);
            var sgst = "sgst-".concat(get_id);
            var igst = "igst-".concat(get_id);

            var gst = total * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(gst);
            $('#'+sgst).val(gst);
            var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(igst_val);

        }
            

            function get_row_discount_value1(e) {

            //var get_id= e.slice(e.length - 1);
            var get_id = e.split("-");
            var get_id = get_id[1];



            var table_discount=document.getElementById(e).value;
            
            var quantity = "quantity-".concat(get_id);
            var quantity_value=document.getElementById(quantity).value;
            var rate = "rate-".concat(get_id);

            var rate=document.getElementById(rate).value;
            
            var amount_value=rate*quantity_value;

            var amount = "amount-".concat(get_id);

            
            var disc_rs=parseFloat(table_discount)*parseFloat(amount_value)/100;

            var disc_rs= parseFloat(disc_rs).toFixed(2)
            var table_discount_rs = "table_discount_rs-".concat(get_id);
            if(table_discount==''){
                var total=parseFloat(amount_value)-0;
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_rs).value='0';
            }
            else{
            var total=parseFloat(amount_value)-parseFloat(disc_rs);
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_rs).value=disc_rs;
            }

            // gst calculation
                var gst_per = "gst_per-".concat(get_id);
                var cgst = "cgst-".concat(get_id);
                var sgst = "sgst-".concat(get_id);
                var igst = "igst-".concat(get_id);

                var gst = total * $('#'+gst_per).val()/100;
                gst = gst.toFixed(2);  // show 2 digits after decimal point
                $('#'+cgst).val(gst);
                $('#'+sgst).val(gst);
                var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
                igst_val = igst_val.toFixed(2);
                $('#'+igst).val(igst_val);


            }
            function get_quantity_value(e) {
                //alert("e is:"+e);
                //var get_id= e.slice(e.length - 1);
                var get_id = e.split("-");
                var get_id = get_id[1];
                var quantity_value=document.getElementById(e).value;
                var rate = "rate-".concat(get_id);
                var table_discount_rs="table_discount_rs-".concat(get_id);
                var rate=document.getElementById(rate).value;
                var table_discount_rs_value=document.getElementById(table_discount_rs).value;
                var amount_value=rate*quantity_value;
                var amount="amount-".concat(get_id);
                $('#'+amount).val(amount_value);
                
                var count=table.rows().count();
                // var disc_per=(table_discount_rs_value/amount_value) * 100;
                // var disc_per= parseFloat(disc_per).toFixed(2);
                var table_discount_per = "table_discount_per-".concat(get_id);
                document.getElementById(table_discount_per).value=0;
                var table_discount_rs = "table_discount_rs-".concat(get_id);
                document.getElementById(table_discount_rs).value=0;

                // gst calculation
                var gst_per = "gst_per-".concat(get_id);
                var cgst = "cgst-".concat(get_id);
                var sgst = "sgst-".concat(get_id);
                var igst = "igst-".concat(get_id);

                var gst = amount_value * $('#'+gst_per).val()/100;
                gst = gst.toFixed(2);  // show 2 digits after decimal point
                $('#'+cgst).val(gst);
                $('#'+sgst).val(gst);
                var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
                igst_val = igst_val.toFixed(2);
                $('#'+igst).val(igst_val);



                
            }

            function get_final_amount(e) {

                var total=document.getElementById('total').value;
                var tax_amt=document.getElementById('tax_amount').value;
                var adjustment_final=document.getElementById('adjustment_final').value;
                var process_amount=document.getElementById('process_amount').value;
                if(adjustment_final=='' && process_amount=='' ){
                    var final_amount=parseFloat(total) + parseFloat(tax_amt);
                    document.getElementById("final_total").value=final_amount;
                }
                else if(adjustment_final=='')
                {
                    var final_amount=parseFloat(total)+0+parseInt(process_amount) + parseFloat(tax_amt);
                    document.getElementById("final_total").value=final_amount;
                }
                else if( process_amount=='' ){
                    var final_amount=parseFloat(total)+parseFloat(adjustment_final)+0 + parseFloat(tax_amt);
                    document.getElementById("final_total").value=final_amount;
                }
                                                    
                else{
                    var final_amount=parseFloat(total)+parseFloat(adjustment_final)+parseInt(process_amount) + parseFloat(tax_amt);
                    document.getElementById("final_total").value=final_amount;
                }

            }                     
</script>
<script>
    $(document).ready(function(){
        $('#add_retail_tax_invoice').click(function () {
        // Add table data to JS array
        var rawItemArray = [];
        var count=table.rows().count();
        var i=0;
        var check_count = 0;
        var posupplier = "";
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();

            var product_category =table.cell(i,0).nodes().to$().find('select').val();
            var item_id_fk =table.cell(i,1).nodes().to$().find('select').val();
            var size=table.cell(i,2).nodes().to$().find('input').val();
            var uom=table.cell(i,3).nodes().to$().find('select').val();
            var quantity =table.cell(i,4).nodes().to$().find('input').val();
            var sqfit=table.cell(i,5).nodes().to$().find('input').val();
            var rate =table.cell(i,6).nodes().to$().find('input').val();
            var discount_per=table.cell(i,7).nodes().to$().find('input').val();
            var discount_rs =table.cell(i,8).nodes().to$().find('input').val();
            var amount=table.cell(i,9).nodes().to$().find('input').val();
            var gst_per=table.cell(i,10).nodes().to$().find('input').val();
            var cgst=table.cell(i,11).nodes().to$().find('input').val();
            var sgst=table.cell(i,12).nodes().to$().find('input').val();
            var igst=table.cell(i,13).nodes().to$().find('input').val();
            var remark=table.cell(i,14).nodes().to$().find('input').val();
        

            rawItemArray.push({
                product_category : product_category,
                item_id_fk : item_id_fk,
                size:size,
                uom:uom,
                quantity:quantity,
                sqfit:sqfit,
                rate:rate,
                discount_per:discount_per,
                discount_rs:discount_rs,
                amount:amount,
                gst_per:gst_per,
                cgst:cgst,
                sgst:sgst,
                igst:igst,
                remark:remark,
                
            });
            i++;
        });
        //alert("posupp baher:"+posupp);
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

        var branch = document.getElementById('branch').value;
        var rti_id = document.getElementById('rti_id').value;
        var pi_no = document.getElementById('pi_no').value;
        var po_no = document.getElementById('pur_order_no').value;
        var date = document.getElementById('date').value;
        var customer = document.getElementById('customer').value;
        var mobile_no = document.getElementById('mobile_no').value;
        var transporter = document.getElementById('transporter').value;
        var address = document.getElementById('address').value;
        var vehicle = document.getElementById('vehicle').value;
        var prepared_by = document.getElementById('prepared_by').value;
        var stock_point = document.getElementById('stock_point').value;

        var total_qty = document.getElementById('total_qty').value;
        var total_sqfit = document.getElementById('total_sqfit').value;
        var gross_amt = document.getElementById('gross_amt').value;
        var total = document.getElementById('total').value;
        var disc_percent = document.getElementById('disc_percent').value;
        var discount_final =document.getElementById('discount_final').value;
        var adjustment_final = document.getElementById('adjustment_final').value;
        var process_amount = document.getElementById('process_amount').value;
        var tax_amt = document.getElementById('tax_amount').value;
        var final_total =document.getElementById('final_total').value;

        if(final_total == '')
        {
            alert('Please check net amount!');
            return;
        }

        if(customer!="" && po_no!="" && transporter!="" && vehicle!="" && prepared_by!="")
        {
            $.ajax(
            {
    
                url: "../../api/retail/edit_retail_tax_invoice.php",
                type: 'POST',
                data : {
                    "newRawItemArray": newRawItemArray,
                    "branch": branch,
                    "rti_id": rti_id,
                    "pi_no": pi_no,
                    "po_no": po_no,
                    "date": date,
                    "customer": customer,
                    "mobile_no": mobile_no,
                    "address": address,
                    "transporter": transporter,
                    "vehicle": vehicle,
                    "prepared_by": prepared_by,
                    "stock_point": stock_point,
                    "total_qty": total_qty,
                    "total_sqfit": total_sqfit,
                    "gross_amt": gross_amt,
                    "total": total,
                    "disc_percent": disc_percent,
                    "discount_final": discount_final,
                    "adjustment_final": adjustment_final,
                    "process_amount": process_amount,
                    "tax_amt": tax_amt,
                    "final_total": final_total 
                },
                dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data);
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                                    heading: 'Success',
                                    text: 'Tax Invoice Updated!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_retail_tax_invoice.php";    
                                }, 5000);
                                $('#btn').atrr('disabled', true);
                        // alert("Retail Tax Invoice Edited!")
                        // window.location.href="view_retail_tax_invoice.php";
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
           var branch = document.getElementById("branch").value;
                        var pono = document.getElementById("pur_order_no").value;
                        var customer = document.getElementById("customer").value;
                        var final_total = document.getElementById("final_total").value;
                
                        if(branch == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Branch',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("branch_error").style.display = "block";
                        }
                        if(pono == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Pro. Order No.',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("pono_error").style.display = "block";
                        }
                        if(customer == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Customer',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("customer_error").style.display = "block";
                        }
                        if(vehicle == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Vehicle',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("net_amt_error").style.display = "block";
                        }
                        if(transporter == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Transporter',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("net_amt_error").style.display = "block";
                        }
                        if(final_total == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Enter Net Amt',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("net_amt_error").style.display = "block";
                        }
                        
                        if(prepared_by == "")
                        {
                            $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Prepared By',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                           // document.getElementById("net_amt_error").style.display = "block";
                        }
        }

        

        }); 
    });
</script>                           
<script>
    function fetchCustomerData(name)
    {
        $.ajax({
            url: '../../api/customer/fetch_customer_data.php',
            type: 'POST',
            data: { 'name': name },
            success: function (data) {
                console.log(data);
                var d = JSON.parse(data);
                $('#mobile_no').val(d.phone);
                $('#address').val(d.address);
                $('#gst_no').val(d.gst_no);
            }
        })
    }

    //Script fot fetching customer site details
    function customer_select(id)
    {
        var cust_id = document.getElementById('customer').value;
        $.ajax(
                { 

                url: "../../api/wholesale/fetch_customer_site.php",
                type: 'POST',
                data : 
                {
                    'cust_id' : cust_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    var d = data.split("#");
                    $('#customer_site').html(d[0]);
                    $('#mobile_no').val(d[1]);
                    $('#address').val(d[2]);
                },
                
                });
    }

    function site_select()
    {
        
        var site_id = document.getElementById('customer_site').value;
        $.ajax(
                {

                url: "../../api/wholesale/fetch_customer_site_details.php",
                type: 'POST',
                data : 
                {
                    'site_id' : site_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    var d = data.split("#");
                    //$('#address').val(d[0]);//site_address
                    $('#des').val(d[1]);      //site Des
                },
                
                });
    }
</script>
<script>
function myFunction(id) {

  var checkBox = document.getElementById(id);
  //var text = document.getElementById("text");
  //alert("id is:"+id);
  if (checkBox.checked == true)
  {
    //text.style.display = "block";
    //alert("yess");
    var ds = id.split("-");
    var ref_amt = document.getElementById("amount-"+ds[1]).value;
    //alert("ds1:"+ds[1]);
    //alert("ref_amt:"+ref_amt);
    //document.getElementById("poamt-"+ds[1]).value=ref_amt;

    //document.getElementById("pono_final").value=<?php// echo $fsr;?>;

    //id="posupplier-0" 

    $.ajax(
                {

                url: "../../api/wholesale/fetch_supplier_for_po_generation.php",
                type: 'POST',
                data : 
                {
                    //'site_id' : site_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data);
                    console.log(data);
                    //var d = data.split("#");
                    //$('#address').val(d[0]);//site_address
                    //$('#des').val(d[1]);      //site Des
                    $('#posupplier-'+ds[1]).html(data);
                },
                
                });
  } 
  else 
  {
    // text.style.display = "none";
    //alert("o");
    // document.getElementById("pono_final").value="";

  }
}
</script>
<script>
$(".js-example-tags").select2({
  tags: true
});
</script>
<script>
var po_array = [];
var arr = [];
var last_po_assigned = "";
function Supplier_select_po_generation(id)
{   
    var supp_id = document.getElementById(id).value;
    var ds = id.split("-");
    add(supp_id);
    function add(supp_id) 
    {
        if (arr.filter(item=> item.supplier_id == supp_id).length == 0)
        {
            //alert("not exist");
            //fetch purchase oder number
            $.ajax(
            {
                url: "../../api/wholesale/fetch_pono_for_po_generation.php",
                type: 'POST',
                data : 
                {
                    //'site_id' : site_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    var inbox_val = document.getElementById("pono-"+ds[1]).value;
                    if(arr.length <= 0) 
                    { 
                        if (arr.filter(item=> item.id == ds[1]).length == 0)
                        {
                            //alert("index not exist");
                            arr.push({ id: ds[1], supplier_id: supp_id,po_no_fetch:data });
                            last_po_assigned = data;
                            document.getElementById("pono-"+ds[1]).value=data;
                        }
                        else
                        {
                            //alert("index exist")
                        }
                    }
                    else
                    {
                        if (arr.filter(item=> item.id == ds[1]).length == 0)
                        {
                            //alert("index not exist");
                            var inc_po = parseInt(last_po_assigned) + parseInt(1);
                            arr.push({ id: ds[1], supplier_id: supp_id,po_no_fetch:inc_po});
                            last_po_assigned = inc_po;
                            document.getElementById("pono-"+ds[1]).value=inc_po;
                        }
                        else
                        {
                            //alert("index exist");
                            search_index(ds[1],arr);
                            function search_index(nameKey, myArray)
                            {
                                alert("inside  search index");
                                for (var i=0; i < myArray.length; i++) {
                                    if (myArray[i].id === nameKey) 
                                    {
                                        var exist_po_id = myArray[i].po_no_fetch;
                                        alert("po_no_fetch is:"+myArray[i].po_no_fetch);
                                        myArray[i].supplier_id = supp_id;
                                        document.getElementById("pono-"+ds[1]).value=exist_po_id;

                                    }
                                }
                            }
                            last_po_assigned = data;
                            document.getElementById("pono-"+ds[1]).value=data;
                        }
                    }
                },
            });
            
        }
        else
        {
            //alert("exist");
            
            function search_supp_id(nameKey, myArray)
            {
                for (var i=0; i < myArray.length; i++) {
                    if (myArray[i].supplier_id === nameKey) 
                    {
                        var exist_po_id = myArray[i].po_no_fetch;
                        //alert("po_no_fetch is:"+myArray[i].po_no_fetch);
                        document.getElementById("pono-"+ds[1]).value=exist_po_id;

                    }
                }
            }
            var resultObject = search_supp_id(supp_id, arr);
            //alert("resultObject:"+resultObject);
        }
    }
}

function display_msg()
{
    //alert("hiii");
    $.toast({
        heading: 'error',
        text: 'Cant Update Tax Invoice Receipt Generated!',
        showHideTransition: 'slide',
        position: 'top-right',
        hideAfter: 5000,
        icon: 'error'
    })
    setTimeout(() => 
    {
        window.location.href="view_retail_tax_invoice.php";    
    }, 5000);
    $('#btn').atrr('disabled', true);
}
</script>