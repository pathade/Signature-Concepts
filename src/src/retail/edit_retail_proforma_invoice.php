<?php include('../../partials/header.php');?>
<?php
    $sql = "SELECT * FROM mstr_data_series WHERE name='purchase_order'";
    $h = mysqli_query($db,$sql);
    while($hu = mysqli_fetch_array($h))
    {
        $max_po1 = $hu['sr_no'];
    }
    $get_retail_proforma = "SELECT * FROM retail_proforma WHERE id_pk='".$_GET['id']."'";
    $res_retail_proforma = mysqli_query($db, $get_retail_proforma) or die(mysqli_error($db));
    $row = mysqli_fetch_array($res_retail_proforma);
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
	
<!-- <form method="post" action="<?php //echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form1"> -->
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Retail Proforma Invoice</h4>
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
	                    <!-- <form class="form form-horizontal" id="form2" data-toggle="validator" role="form"> -->
                        <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form2">
	                    	<div class="form-body">
                            
                                <div class="row">
                                    <div class="col-md-6 d-none">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">ID</label>
				                        	<div class="col-md-5">
												<input type="text" id="order_id" class="form-control" name="order_id" value="<?php echo $row['0']; ?>" readonly>
											</div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Order No.</label>
				                        	<div class="col-md-5">
												<input type="text" id="order_no" class="form-control" value="<?php echo $row['2']; ?>" name="order_no" readonly>
											</div>											
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-5">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
											</div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="Signature Concepts" selected>Signature Concepts</option>
												</select>
                                                <span id="branch_error" style="color:red;">Branch is Required</span>
                                                <input type="hidden" value="<?php echo $_GET['id'];?>" id="edit_id">
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block js-example-tags" id="customer" class="select2" data-toggle="select2" name="customer" onchange="fetchCustomerData(this.value)">
                                                <?php
                                                $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['3']."'";
                                                $res_customer = mysqli_fetch_array(mysqli_query($db, $get_customer));
                                                ?>
                                                    <option value="<?php echo $row['3']; ?>" selected><?php echo $res_customer['0']; ?></option>
												</select>
                                                <span id="customer_error" style="color:red;">Customer is Required</span>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="text" id="mobile_no" class="form-control" value="<?php echo $row['4']; ?>" name="mobile_no" readonly />
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >GST No.</label>
				                        	<div class="col-md-9 ">
												<input type="text" class="form-control" value="<?php echo $row['6']; ?>" name="gst_no" id="gst_no" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Sales Man</label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="saleman" class="select2" data-toggle="select2" name="saleman">
                                                <?php
                                                    $get_employee = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['7']."'";
                                                    $res_employee = mysqli_fetch_array(mysqli_query($db, $get_employee));
                                                ?>
                                                <option value="<?php echo $row['7'] ?>" selected><?php echo $res_employee['0'] ?></option>
												</select>
                                                <span id="saleman_error" style="color:red;">Saleman is Required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Address </label>
                                            <div class="col-md-9 ">
                                                <textarea type="text" class="form-control" rows="4"  name="address" id="address" style="height: auto;" readonly><?php echo $row['5'] ?></textarea>
                                            </div>
				                        </div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Remark</label>
				                        	<div class="col-md-9">
                                                <input type="text" readonly class="form-control" value="<?php echo $row['8'] ?>" name="remark" id="remark" />
											</div>
			                       		</div>
									</div>
		                        </div>
							</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control" for="userinput1">Product List</label>
                                        <div class="col-md-9 divcol">
                                            <select name="sel-03" id="sel-03" class="select2-original" multiple>
                                                <?php  
                                                    $edit_id = $_GET['id'];
                                                    $m = "SELECT * FROM mstr_item";
                                                    $k = mysqli_query($db,$m);
                                                    while($kl = mysqli_fetch_array($k))
                                                    {
                                                        $m1 = "SELECT * FROM retail_proforma_items WHERE rpi_id_fk='$edit_id'";
                                                        $k1 = mysqli_query($db,$m1);
                                                        while($kl1 = mysqli_fetch_array($k1))
                                                        {
                                                            $item = $kl1['item_id_fk'];
                                                        

                                                        
                                                ?>
                                                <option value="<?php echo $kl['item_id_pk'];?>"  <?php if($kl['item_id_pk'] == $item) { ?>selected="selected" <?php } ?>><?php echo $kl['nks_code']."-".$kl['design_code'];?></option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <!-- <button type="button" id="get_data" onClick="get_data123();">Show </button> -->
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <button type="button" onClick="get_data123();" name="" class="btn btn-primary" id="" >
                                                <i class="fa fa-check-square-o"></i> Get Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                     <div class="table-responsive">
                                                     <table class="display" id="tbl" style="width: 100%;font-size: smaller;">
                                                    <!-- <table class="border-bottom-0 table table-hover table-responsive" id="tbl" > -->
                                                                <thead>
                                                                    <tr>
                                                                        <th>PRODUCT CAT </th>
                                                                        <th>PRODUCT DESIGN </th>
                                                                        <th>UOM</th>
                                                                        <th>Size </th>
                                                                        <th>QTY </th>
                                                                        <th>Sqrft </th>
                                                                        <th>RATE </th>
                                                                        <th>DISC %</th>
                                                                        <th>DISC Rs</th>
                                                                        <th>AMT</th>
                                                                        <th>REMARK</th>
                                                                        <!-- <th>PROCESS&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <th>PO</th>
                                                                        <!-- <th>PROCESS AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <th>SUPPLIER</th>
                                                                        <th>PONO</th>
                                                                        <!--<th>Product discount lock</th>-->
                                                                        <th></th>
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
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Quantity</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['10'] ?>" id="total_qty" name="total_qty" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Sq.ft</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['11'] ?>" id="total_sqfit" name="total_sqfit" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Gross Amt.</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['12'] ?>" id="gross_amt" name="gross_amt" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Total</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['13'] ?>" id="total" name="total" readonly="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Discount(%)</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['14'] ?>" id="disc_percent" name="disc_percent" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Discount</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['15'] ?>" id="discount_final" name="discount_final" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Other(+/-)</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['16'] ?>" id="adjustment_final" name="adjustment_final" onkeyup='get_final_amount(this.value);' >
                                                        </div>
                                                        <div class="col-md-2 d-none">
                                                            <label class=" label-control" for="userinput1"><b>Pro Amt.</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $row['17'] ?>" id="process_amount" name="process_amount" onkeyup='get_final_amount(this.value);'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" value="<?php echo $row['18'] ?>" id="final_total" name="final_total" readonly="">
                                                            <span id="net_amt_error" style="color:red;">Net Amt is Required</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <!-- <div class="col-md-1">
                                                        </div> -->
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Payment Mode</b> 
                                                            <span style="color:red;">*</span> </label>
                                                            <select id="payment_mode" name="payment_mode" class="form-control" onchange="payment_mode_change();">
                                                                <option value="<?php echo $row['payment_mode']; ?>"><?php echo $row['payment_mode']; ?></option>
                                                                <option value="cash">Cash</option>
                                                                <option value="Cheque">Cheque</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Cheque No.</b> 
                                                            <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" value="<?php echo $row['ch_no']; ?>" placeholder="0" id="advance_cheque_no" name="advance_cheque_no" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Cheque Date</b> 
                                                            <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" value="<?php echo $row['ch_date']; ?>" id="advance_cheque_date" name="advance_cheque_date" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" value="<?php echo $row['18'] ?>" placeholder="0" id="final_total" name="final_total" readonly="">
                                                            <span id="net_amt_error" style="color:red;">Net Amt is Required</span>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Advance Amount</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" value="<?php echo $row['advance_amt']; ?>" id="advance_amt" name="advance_amt" onkeyup="advance_enter();">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Balance Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" value="<?php echo $row['balance_amt']; ?>" value="0" id="balance_amt" name="balance_amt">
                                                        </div>
                                                        <!-- <div class="col-md-3"></div> -->
                                                        
                                                    </div>
                                                </div>
                                            </div>

	                        <div class="form-actions right">
								
                                <?php 
                                    if($row['tax_invoice_added'] == 0 || $row['status'] == 1) 
                                    {         
                                ?>
								<button type="button" name="add_retail_proforma" class="btn btn-primary" id="add_retail_proforma" >
	                                <i class="fa fa-check-square-o"></i> Update
	                            </button>
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                            <button type="button" name="" class="btn btn-success" id=""  onclick="edit_check();">
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
<!-- </form> -->
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>

<script>
$(document).ready(function()
{ 
    document.getElementById("branch_error").style.display = "none";
    document.getElementById("saleman_error").style.display = "none";
    document.getElementById("customer_error").style.display = "none";
    document.getElementById("net_amt_error").style.display = "none";
    ///////////////////////////
    $('.select2-original').select2({
    	placeholder: "Choose elements",
      width: "100%"
    })
    
});

           
</script>
<script>
    var table="";
    $(document).ready(function()
    {
        var updateItemId = "<?php echo $_GET['id'] ?>";
        // var url = '';
        // var updateItemId = '';
        // if(document.getElementById('work_no').value == '')
        // {
        //     url = "../../api/purchase/get_supplier_po_table.php";
        //     updateItemId = '<?php echo $_GET['id']; ?>';
        // }
        // else 
        // {
        //     url = "../../api/wholesale/get_woi_table.php";
        //     updateItemId = document.getElementById('work_no').value;
        // }
        // var po_notbl = document.getElementById('po_no').value; 
        var test = $('#sel-03');
        var ids = $(test).val(); // works
        console.log('Selected IDs123: ' + ids);
        table = $('#tbl').DataTable( {
        searching:false,   
        ajax: {
                "url": '../../api/retail/get_rpi_table_items.php',
                //"url": '../../api/retail/get_rpi_table_items.php',
                "type": "POST",
                data : 
                {
                'itemId' : updateItemId,
                'ids' : ids
                },
                /*dataType: 'text',
                success: function(data)
                { 
                    console.log(data);
                    //alert("data is:"+data);
                },*/
            },
            deferRender: true,
            
            // "columnDefs": 
            // [ 
            
            // {
            //     "targets": 1,
            //     "data": null,
            //     // "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn action-icon mdi mdi-delete\"></button>"
            // } 
            // ],
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

            for(var i=0;i<count;i++)
            {
                
                var tblamt=table.cell(i,9).nodes().to$().find('input').val()
    
                var amount= parseFloat(amount) +parseFloat(tblamt);

                var tbl5=table.cell(i,8).nodes().to$().find('input').val()
    
                var discount= parseFloat(discount) +parseFloat(tbl5);
            
                var tbl2=table.cell(i,4).nodes().to$().find('input').val()
    
                var totalqty= parseInt(totalqty) +parseInt(tbl2);

                var tbl89=table.cell(i,5).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tbl89);

                var tbldisc=table.cell(i,7).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldisc);

                var q = table.cell(i,4).nodes().to$().find('input').val();
                var r =  table.cell(i,6).nodes().to$().find('input').val();
                var gross = parseFloat(q) * parseFloat(r);
                var tgross= parseFloat( tgross) +parseFloat(gross);

            }

        
            document.getElementById('total').value=amount.toFixed(2);
            document.getElementById('discount_final').value=discount.toFixed(2);
            document.getElementById('total_qty').value=totalqty;
            document.getElementById('total_sqfit').value=totalsqft.toFixed(2);
            document.getElementById('disc_percent').value=totaldisc.toFixed(2);
            document.getElementById('gross_amt').value=tgross.toFixed(2);
            document.getElementById('final_total').value=amount+parseFloat(document.getElementById('adjustment_final').value);
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

            } 
        });
    
    }      
    function get_row_discount_value1(e) 
            {
                //var get_id= e.slice(e.length - 1);
                var get_id = e.split("-");
                var get_id = get_id[1];
                var table_discount=document.getElementById(e).value;
                //var dicount_lock = "discount_lock-".concat(get_id);
                //var discount_lock_value=document.getElementById(dicount_lock).value;
                var dic_rs = "table_discount_rs-".concat(get_id);
                // if(parseInt(table_discount) > parseInt(discount_lock_value))
                // {
                //     //get_row_discount_value1
                //     document.getElementById(e).value = 0;
                //     document.getElementById(dic_rs).value = 0;
                //     $.toast({
                //                 heading: 'Error',
                //                 text: 'Discount Value Cant Be Greater than' + discount_lock_value,
                //                 showHideTransition: 'slide',
                //                 position: 'top-right',
                //                 hideAfter: 5000,
                //                 icon: 'error'
                //     })
                //     return;
                    
                    
                // }
                // else
                // {
                    var quantity = "quantity-".concat(get_id);
                    var quantity_value=document.getElementById(quantity).value;
                     //alert("quantity_value:"+quantity_value);
                    var rate = "rate-".concat(get_id);
                    var rate=document.getElementById(rate).value;
                    //alert("rate:"+rate);
                    var amount_value=rate*quantity_value;
                    var amount = "amount-".concat(get_id);
                    var disc_rs=parseFloat(table_discount)*parseFloat(amount_value)/100;
                    var disc_rs= parseFloat(disc_rs).toFixed(2)
                    //alert("disc_rs:"+disc_rs);
                    var table_discount_rs = "table_discount_rs-".concat(get_id);
                    if(table_discount=='')
                    {
                        var total=parseFloat(amount_value)-0;
                        document.getElementById(amount).value=total;
                        document.getElementById(table_discount_rs).value='0';
                    }
                    else
                    {
                        var total=parseFloat(amount_value)-parseFloat(disc_rs);
                        document.getElementById(amount).value=total;
                        document.getElementById(table_discount_rs).value=disc_rs;
                    }
                //}
                
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




                
            }

            function get_final_amount(e) {

                var total=document.getElementById('total').value;
                var adjustment_final=document.getElementById('adjustment_final').value;
                var process_amount=document.getElementById('process_amount').value;
                if(adjustment_final=='' && process_amount=='' ){
                    var final_amount=parseFloat(total);
                    document.getElementById("final_total").value=final_amount;
                }
                else if(adjustment_final=='')
                {
                    var final_amount=parseFloat(total)+0+parseInt(process_amount);
                    document.getElementById("final_total").value=final_amount;
                }
                else if( process_amount=='' ){
                    var final_amount=parseFloat(total)+parseFloat(adjustment_final)+0;
                    document.getElementById("final_total").value=final_amount;
                }
                                                    
                else{
                    var final_amount=parseFloat(total)+parseFloat(adjustment_final)+parseInt(process_amount);
                    document.getElementById("final_total").value=final_amount;
                }

    }                   
</script>
<script>
    $(document).ready(function(){
        $('#add_retail_proforma').click(function () {
            //alert("hhiii");
            var rawItemArray = [];
            var count=table.rows().count();
            var i=0;
            var check_count = 0;
            var posupplier = "";
            table.rows().eq(0).each( function ( index ) 
            { 
                var row = table.row( index );
                var data = row.data();
                //product_id
                var prodect_category =table.cell(i,0).nodes().to$().find('input').val();
                var item_id_fk =table.cell(i,14).nodes().to$().find('input').val();
                var size=table.cell(i,3).nodes().to$().find('input').val();
                var quantity =table.cell(i,4).nodes().to$().find('input').val();
                var sqrft=table.cell(i,5).nodes().to$().find('input').val();
                var rate =table.cell(i,6).nodes().to$().find('input').val();
                var discount_per=table.cell(i,7).nodes().to$().find('input').val();
                var discount_rs =table.cell(i,8).nodes().to$().find('input').val();
                var amount=table.cell(i,9).nodes().to$().find('input').val();
                var remark=table.cell(i,10).nodes().to$().find('input').val();
                var checkbox_val = table.cell(i,11).nodes().to$().find('input:checkbox').val();
                var posupp = table.cell(i,12).nodes().to$().find('select').val();
                var pono_tbl = table.cell(i,13).nodes().to$().find('input').val();
                var checkbbx = document.getElementById("myCheck-"+i);
                //alert("posupp:"+ posupp);
                if ($('#myCheck-'+i).is(":checked"))
                {
                    // it is checked
                    checkbox_val = "po_yes";
                }
                else
                {
                    checkbox_val = "po_no";
                }
                //alert("checkbox_val123:"+ checkbox_val);         
                //alert("posupp: ccccccccc"+ posupp);
                rawItemArray.push({
                    prodect_category : prodect_category,
                    item_id_fk : item_id_fk,
                    size:size,
                    quantity:quantity,
                    sqrft:sqrft,
                    rate:rate,
                    discount_per:discount_per,
                    discount_rs:discount_rs,
                    amount:amount,
                    remark:remark,
                    //process1:process1,
                    checkbox_val:checkbox_val,
                    //poamt:poamt,
                    posupp:posupp,
                    pono_tbl:pono_tbl
                    
                });
                i++;
            });
            //alert("posupp baher:"+posupp);
            var newRawItemArray = JSON.stringify(rawItemArray);
            console.log(newRawItemArray);
            var edit_id =document.getElementById('edit_id').value;
            //var cust = document.getElementById("customer").value;
            //alert("cust:"+cust);

            var branch = document.getElementById('branch').value;
            var order_no = document.getElementById('order_no').value;
            var date = document.getElementById('date').value;
            var customer = document.getElementById('customer').value;
            //alert("customer:"+customer);
            var mobile_no = document.getElementById('mobile_no').value;
            var gst_no = document.getElementById('gst_no').value;
            var address = document.getElementById('address').value;
            var saleman = document.getElementById('saleman').value;
            var remark = document.getElementById('remark').value;
            var total_qty = document.getElementById('total_qty').value;
            var total_sqfit = document.getElementById('total_sqfit').value;
            var gross_amt = document.getElementById('gross_amt').value;
            var total = document.getElementById('total').value;
            var disc_percent = document.getElementById('disc_percent').value;
            var discount_final =document.getElementById('discount_final').value;
            var adjustment_final = document.getElementById('adjustment_final').value;
            var process_amount = document.getElementById('process_amount').value;
            var final_total =document.getElementById('final_total').value;
            var advance_amt =document.getElementById('advance_amt').value;
            var payment_mode =document.getElementById('payment_mode').value;
            var balance_amt =document.getElementById('balance_amt').value;
            var advance_cheque_no =document.getElementById('advance_cheque_no').value;
            var advance_cheque_date =document.getElementById('advance_cheque_date').value;
            

            if(isNaN(customer))
            {
                //alert("bbb");
                var cust_name = $("#customer option:selected").text();
                //alert("cust name:"+cust_name);
                //alert("cust 123:"+customer);
                customer_name = cust_name;
            }
            else
            {
                //alert("jjjj");
                //alert("cust:"+customer);
                customer = customer;
                customer_name = "";

            }

                var advance_amt =document.getElementById('advance_amt').value;
                var payment_mode =document.getElementById('payment_mode').value;
                var balance_amt =document.getElementById('balance_amt').value;
                var advance_cheque_no =document.getElementById('advance_cheque_no').value;
                var advance_cheque_date =document.getElementById('advance_cheque_date').value;

                var net_amt = document.getElementById("final_total").value;
                            var advance_amt = document.getElementById("advance_amt").value;
                            var ten_per_amt = (parseFloat(net_amt) * parseFloat(10)) / parseFloat(100);
            
            /*$.ajax({
                url: "../../api/retail/edit_retail_proforma1.php",
                type: 'POST',
                data : $('#form2').serialize() + "&newRawItemArray=" + newRawItemArray + '&edit_id=' +edit_id ,
                dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data);
                    console.log(data);
                    if(data == "100")
                    {
                        $.toast({
                                heading: 'Success',
                                text: 'Purchase Order And Retail Proforma Updated!',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'success'
                            })
                            setTimeout(() => 
                            {
                                window.location.href="view_retail_proforma_invoice.php";    
                            }, 5000);
                            $('#btn').atrr('disabled', true);
                    }
                    else if(data == "200")
                    {
                        // alert("Work Order Added!")
                        // window.location.href="view_wholesale_work_order.php";
                        $.toast({
                                heading: 'Success',
                                text: 'Retail Proforma Updated!',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_retail_proforma_invoice.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
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
            });*/
            //alert("customer123 : "+customer123);
            if(isNaN(customer))
            {
                if(gst_no!="" && mobile_no!="" && address!="")
                {
                    if(branch!="" && customer!="" && saleman!="" && final_total!=0 &&  advance_amt>=ten_per_amt && payment_mode!="")
                    {
                        if(payment_mode == "Cheque")
                        {
                            var advance_cheque_no =document.getElementById('advance_cheque_no').value;
                            var advance_cheque_date =document.getElementById('advance_cheque_date').value;
                            if(advance_cheque_no != "" && advance_cheque_date!="")
                            {
                                $.ajax(
                                {

                                    url: "../../api/retail/edit_retail_proforma1.php", 
                                    type: 'POST',
                                    data : {
                                        "newRawItemArray": newRawItemArray,
                                        "branch": branch,
                                        "order_no": order_no,
                                        "date": date,
                                        "customer": customer,
                                        "customer_name123" : customer_name,
                                        "mobile_no": mobile_no,
                                        "gst_no": gst_no,
                                        "address": address,
                                        "saleman": saleman,
                                        "remark": remark,
                                        "total_qty": total_qty,
                                        "total_sqfit": total_sqfit,
                                        "gross_amt": gross_amt,
                                        "total": total,
                                        "disc_percent": disc_percent,
                                        "discount_final": discount_final,
                                        "adjustment_final": adjustment_final,
                                        "process_amount": process_amount,
                                        "final_total": final_total,
                                        "payment_mode" : payment_mode,
                                        "advance_amt" : advance_amt,
                                        "balance_amt" : balance_amt,
                                        "advance_cheque_no" : advance_cheque_no,
                                        "advance_cheque_date" : advance_cheque_date,
                                        "edit_id" : edit_id
                                    },
                                    dataType:'text',  
                                    success: function(data)
                                    { 
                                        //alert("data:"+data);
                                        console.log(data);
                                        if(data == "100")
                                        {
                                            $.toast({
                                                heading: 'Success',
                                                text: 'Purchase Order And Retail Proforma Updated!!',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'success'
                                            })
                                            setTimeout(() => 
                                            {
                                                window.location.href="view_retail_proforma_invoice.php";    
                                            }, 5000);
                                            $('#btn').atrr('disabled', true);
                                            // alert("Purchase Order And Retail Proforma Added!")
                                            // window.location.href="view_retail_proforma_invoice.php";
                                        }
                                        else if(data == "200")
                                        {
                                            $.toast({
                                                heading: 'Success',
                                                text: 'Retail Proforma Added!',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'success'
                                            })
                                            setTimeout(() => 
                                            {
                                                window.location.href="view_retail_proforma_invoice.php";    
                                            }, 5000);
                                            $('#btn').atrr('disabled', true);
                                            //alert("Retail Proforma Added!")
                                            // window.location.href="view_wholesale_work_order.php";
                                        }
                                        else
                                        {
                                            $.toast({
                                                heading: 'Error',
                                                text: 'Please Enter Valid Details.',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'error'
                                            })
                                            //alert("Please Enter Valid Details");
                                        }
                                    
                                    },
                                    
                                    //});


                                });
                            }
                            else
                            {
                                if(advance_cheque_no == "" || advance_cheque_no == 0)
                                {
                                    $.toast({
                                        heading: 'Error',
                                        text: 'Advance Cheque Number Require.',
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        hideAfter: 5000,
                                        icon: 'error'
                                    })
                                    return;
                                }
                                if(advance_cheque_date == "" || advance_cheque_date == 0)
                                {
                                    $.toast({
                                        heading: 'Error',
                                        text: 'Advance Cheque Date Require.',
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        hideAfter: 5000,
                                        icon: 'error'
                                    })
                                    return;
                                }
                            }
                        }
                        else
                        {
                            $.ajax(
                            {

                                url: "../../api/retail/edit_retail_proforma1.php", 
                                type: 'POST',
                                data : {
                                    "newRawItemArray": newRawItemArray,
                                    "branch": branch,
                                    "order_no": order_no,
                                    "date": date,
                                    "customer": customer,
                                    "customer_name123" : customer_name,
                                    "mobile_no": mobile_no,
                                    "gst_no": gst_no,
                                    "address": address,
                                    "saleman": saleman,
                                    "remark": remark,
                                    "total_qty": total_qty,
                                    "total_sqfit": total_sqfit,
                                    "gross_amt": gross_amt,
                                    "total": total,
                                    "disc_percent": disc_percent,
                                    "discount_final": discount_final,
                                    "adjustment_final": adjustment_final,
                                    "process_amount": process_amount,
                                    "final_total": final_total,
                                    "payment_mode" : payment_mode,
                                        "advance_amt" : advance_amt,
                                        "balance_amt" : balance_amt,
                                        "advance_cheque_no" : advance_cheque_no,
                                        "advance_cheque_date" : advance_cheque_date ,
                                        "edit_id" : edit_id
                                },
                                dataType:'text',  
                                success: function(data)
                                { 
                                    //alert("data:"+data);
                                    console.log(data);
                                    if(data == "100")
                                    {
                                        $.toast({
                                            heading: 'Success',
                                            text: 'Purchase Order And Retail Proforma Updated!!',
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            hideAfter: 5000,
                                            icon: 'success'
                                        })
                                        setTimeout(() => 
                                        {
                                            window.location.href="view_retail_proforma_invoice.php";    
                                        }, 5000);
                                        $('#btn').atrr('disabled', true);
                                        // alert("Purchase Order And Retail Proforma Added!")
                                        // window.location.href="view_retail_proforma_invoice.php";
                                    }
                                    else if(data == "200")
                                    {
                                        $.toast({
                                            heading: 'Success',
                                            text: 'Retail Proforma Added!',
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            hideAfter: 5000,
                                            icon: 'success'
                                        })
                                        setTimeout(() => 
                                        {
                                            window.location.href="view_retail_proforma_invoice.php";    
                                        }, 5000);
                                        $('#btn').atrr('disabled', true);
                                        //alert("Retail Proforma Added!")
                                        // window.location.href="view_wholesale_work_order.php";
                                    }
                                    else
                                    {
                                        $.toast({
                                                heading: 'Error',
                                                text: 'Please Enter Valid Details.',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'error'
                                            })
                                       // alert("Please Enter Valid Details");
                                    }
                                
                                },
                                
                                //});


                            }); 
                        }
                        
                    }
                    else
                    {
                        if(customer == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Customer Require.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        if(saleman == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Salesman Require.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        if(final_total == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Net Amount Cant be 0.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        if(advance_amt != ten_per_amt || advance_amt==""  || advance_amt<ten_per_amt)
                        {
                            var net_amt = document.getElementById("final_total").value;
                            var advance_amt = document.getElementById("advance_amt").value;
                            var ten_per_amt = (parseFloat(net_amt) * parseFloat(10)) / parseFloat(100);
                            
                            //alert("ten_per_amt111:"+ten_per_amt);
                            if(parseFloat(advance_amt) != parseFloat(ten_per_amt))
                            {
                                $.toast({
                                    heading: 'Error',
                                    text: 'Sorry Cant Add proforma,Minimum 10% Amount Require of Net Amount i.e. '+ten_per_amt+" Rs.",
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                                return;
                            }
                        }
                        if(payment_mode == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Payment Mode Require',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }

                    }
                }
                else
                {
                    if(!$('#mobile_no').val().match('[7-9]{1}[0-9]{9}'))  
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please put 10 digit valid mobile number...!!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        return;
                    }
                    if(gst_no == "") 
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'GST Number Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        return;
                    }
                    if(address == "") 
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Customer Address Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        return;
                    }
                    
                }
            }
            else
            {
                // alert("advance_amt:"+advance_amt);
                // alert("ten_per_amt:"+ten_per_amt);
                if(branch!="" && customer!="" && saleman!="" && final_total!=0 &&  advance_amt>=ten_per_amt  && payment_mode!="")
                {
                    //alert("inside");
                    /*$.ajax(
                    {

                        url: "../../api/retail/edit_retail_proforma1.php", 
                        type: 'POST',
                        data : {
                            "newRawItemArray": newRawItemArray,
                            "branch": branch,
                            "order_no": order_no,
                            "date": date,
                            "customer": customer123,
                            "customer_name123" : customer_name,
                            "mobile_no": mobile_no,
                            "gst_no": gst_no,
                            "address": address,
                            "saleman": saleman,
                            "remark": remark,
                            "total_qty": total_qty,
                            "total_sqfit": total_sqfit,
                            "gross_amt": gross_amt,
                            "total": total,
                            "disc_percent": disc_percent,
                            "discount_final": discount_final,
                            "adjustment_final": adjustment_final,
                            "process_amount": process_amount,
                            "final_total": final_total 
                        },
                        dataType:'text',  
                        success: function(data)
                        { 
                            //alert("data:"+data);
                            console.log(data);
                            if(data == "100")
                            {
                                $.toast({
                                    heading: 'Success',
                                    text: 'Purchase Order And Retail Proforma Added!!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_retail_proforma_invoice.php";    
                                }, 5000);
                                $('#btn').atrr('disabled', true);
                                // alert("Purchase Order And Retail Proforma Added!")
                                // window.location.href="view_retail_proforma_invoice.php";
                            }
                            else if(data == "200")
                            {
                                $.toast({
                                    heading: 'Success',
                                    text: 'Retail Proforma Added!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_retail_proforma_invoice.php";    
                                }, 5000);
                                $('#btn').atrr('disabled', true);
                                //alert("Retail Proforma Added!")
                                // window.location.href="view_wholesale_work_order.php";
                            }
                            else
                            {
                                alert("Please Enter Valid Details");
                            }
                        
                        },
                        
                        //});


                    }); */
                    //alert("payment_mode123:"+payment_mode);
                        if(payment_mode == "Cheque")
                        {
                            //alert("hii");
                            var advance_cheque_no =document.getElementById('advance_cheque_no').value;
                            var advance_cheque_date =document.getElementById('advance_cheque_date').value;
                            if(advance_cheque_no != "" && advance_cheque_date!="")
                            {
                                $.ajax(
                                {

                                    url: "../../api/retail/edit_retail_proforma1.php", 
                                    type: 'POST',
                                    data : {
                                        "newRawItemArray": newRawItemArray,
                                        "branch": branch,
                                        "order_no": order_no,
                                        "date": date,
                                        "customer": customer,
                                        "customer_name123" : customer_name,
                                        "mobile_no": mobile_no,
                                        "gst_no": gst_no,
                                        "address": address,
                                        "saleman": saleman,
                                        "remark": remark,
                                        "total_qty": total_qty,
                                        "total_sqfit": total_sqfit,
                                        "gross_amt": gross_amt,
                                        "total": total,
                                        "disc_percent": disc_percent,
                                        "discount_final": discount_final,
                                        "adjustment_final": adjustment_final,
                                        "process_amount": process_amount,
                                        "final_total": final_total ,
                                        "payment_mode" : payment_mode,
                                        "advance_amt" : advance_amt,
                                        "balance_amt" : balance_amt,
                                        "advance_cheque_no" : advance_cheque_no,
                                        "advance_cheque_date" : advance_cheque_date,
                                        "edit_id" : edit_id
                                    },
                                    dataType:'text',  
                                    success: function(data)
                                    { 
                                        //alert("data:"+data);
                                        console.log(data);
                                        if(data == "100")
                                        {
                                            $.toast({
                                                heading: 'Success',
                                                text: 'Purchase Order And Retail Proforma Updated!!',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'success'
                                            })
                                            setTimeout(() => 
                                            {
                                                window.location.href="view_retail_proforma_invoice.php";    
                                            }, 5000);
                                            $('#btn').atrr('disabled', true);
                                            // alert("Purchase Order And Retail Proforma Added!")
                                            // window.location.href="view_retail_proforma_invoice.php";
                                        }
                                        else if(data == "200")
                                        {
                                            $.toast({
                                                heading: 'Success',
                                                text: 'Retail Proforma Updated!',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'success'
                                            })
                                            setTimeout(() => 
                                            {
                                                window.location.href="view_retail_proforma_invoice.php";    
                                            }, 5000);
                                            $('#btn').atrr('disabled', true);
                                            //alert("Retail Proforma Added!")
                                            // window.location.href="view_wholesale_work_order.php";
                                        }
                                        else
                                        {
                                            $.toast({
                                                heading: 'Error',
                                                text: 'Please Enter Valid Details.',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'error'
                                            })
                                           // alert("Please Enter Valid Details");
                                        }
                                    
                                    },
                                    
                                    //});


                                });
                            }
                            else
                            {
                                if(advance_cheque_no == "" || advance_cheque_no == 0)
                                {
                                    $.toast({
                                        heading: 'Error',
                                        text: 'Advance Cheque Number Require.',
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        hideAfter: 5000,
                                        icon: 'error'
                                    })
                                    return;
                                }
                                if(advance_cheque_date == "" || advance_cheque_date == 0)
                                {
                                    $.toast({
                                        heading: 'Error',
                                        text: 'Advance Cheque Date Require.',
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        hideAfter: 5000,
                                        icon: 'error'
                                    })
                                    return;
                                }
                            }
                        }
                        else
                        {
                            //alert("byee");
                            $.ajax(
                            {

                                url: "../../api/retail/edit_retail_proforma1.php", 
                                type: 'POST',
                                data : {
                                    "newRawItemArray": newRawItemArray,
                                    "branch": branch,
                                    "order_no": order_no,
                                    "date": date,
                                    "customer": customer,
                                    "customer_name123" : customer_name,
                                    "mobile_no": mobile_no,
                                    "gst_no": gst_no,
                                    "address": address,
                                    "saleman": saleman,
                                    "remark": remark,
                                    "total_qty": total_qty,
                                    "total_sqfit": total_sqfit,
                                    "gross_amt": gross_amt,
                                    "total": total,
                                    "disc_percent": disc_percent,
                                    "discount_final": discount_final,
                                    "adjustment_final": adjustment_final,
                                    "process_amount": process_amount,
                                    "final_total": final_total ,
                                    "payment_mode" : payment_mode,
                                        "advance_amt" : advance_amt,
                                        "balance_amt" : balance_amt,
                                        "advance_cheque_no" : advance_cheque_no,
                                        "advance_cheque_date" : advance_cheque_date,
                                        "edit_id" : edit_id
                                },
                                dataType:'text',  
                                success: function(data)
                                { 
                                    //alert("data:"+data);
                                    console.log(data);
                                    if(data == "100")
                                    {
                                        $.toast({
                                            heading: 'Success',
                                            text: 'Purchase Order And Retail Proforma Updated!!',
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            hideAfter: 5000,
                                            icon: 'success'
                                        })
                                        setTimeout(() => 
                                        {
                                            window.location.href="view_retail_proforma_invoice.php";    
                                        }, 5000);
                                        $('#btn').atrr('disabled', true);
                                        // alert("Purchase Order And Retail Proforma Added!")
                                        // window.location.href="view_retail_proforma_invoice.php";
                                    }
                                    else if(data == "200")
                                    {
                                        $.toast({
                                            heading: 'Success',
                                            text: 'Retail Proforma Updated!',
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            hideAfter: 5000,
                                            icon: 'success'
                                        })
                                        setTimeout(() => 
                                        {
                                            window.location.href="view_retail_proforma_invoice.php";    
                                        }, 5000);
                                        $('#btn').atrr('disabled', true);
                                        //alert("Retail Proforma Added!")
                                        // window.location.href="view_wholesale_work_order.php";
                                    }
                                    else
                                    {
                                        $.toast({
                                                heading: 'Error',
                                                text: 'Please Enter Valid Details.',
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                hideAfter: 5000,
                                                icon: 'error'
                                            })
                                        //alert("Please Enter Valid Details");
                                    }
                                
                                },
                                
                                //});


                            }); 
                        }
                        
                }
                else
                {
                    //alert("outside");
                        if(customer == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Customer Require.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        if(saleman == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Salesman Require.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        if(final_total == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Net Amount Cant be 0.',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        if(payment_mode == "") 
                        {
                            $.toast({
                                heading: 'Error',
                                text: 'Payment Mode Require',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                            return;
                        }
                        var net_amt = document.getElementById("final_total").value;
                            var advance_amt = document.getElementById("advance_amt").value;
                            var ten_per_amt = (parseFloat(net_amt) * parseFloat(10)) / parseFloat(100);
                        //alert("") advance_amt != ten_per_amt ||
                        // alert("advance_amt:"+ advance_amt);
                        // alert("ten_per_amt:"+ ten_per_amt);

                        if( advance_amt=="" || advance_amt<ten_per_amt)
                        {
                            
                            
                            //alert("ten_per_amt222:"+ten_per_amt);
                            
                            if(parseFloat(advance_amt) != parseFloat(ten_per_amt))
                            {
                                $.toast({
                                    heading: 'Error',
                                    text: 'Sorry Cant Add proforma,Minimum 10% Amount Require of Net Amount i.e. '+ten_per_amt+" Rs.",
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                                return;
                            }
                        }
                }
            }

            //data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&transporter=' +transporter_select,

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
    //alert("id:"+id);

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
    var fin_yr = '<?php echo date("y",strtotime("-1 year"))."-".date("y")."/" ?>';
    var supp_id = document.getElementById(id).value;
    var ds = id.split("-");
    var fin_yr = '<?php echo date("y",strtotime("-1 year"))."-".date("y")."/" ?>';
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
                            document.getElementById("pono-"+ds[1]).value=fin_yr+data;
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
                            //var inc_po = parseInt(last_po_assigned) + parseInt(1);
                            var inc_po = parseInt(last_po_assigned) ;
                            arr.push({ id: ds[1], supplier_id: supp_id,po_no_fetch:inc_po});
                            last_po_assigned = inc_po;
                            document.getElementById("pono-"+ds[1]).value=fin_yr+inc_po;
                        }
                        else
                        {
                            //alert("index exist");
                            search_index(ds[1],arr);
                            function search_index(nameKey, myArray)
                            {
                              //  alert("inside  search index");
                                for (var i=0; i < myArray.length; i++) {
                                    if (myArray[i].id === nameKey) 
                                    {
                                        var exist_po_id = myArray[i].po_no_fetch;
                                       // alert("po_no_fetch is:"+myArray[i].po_no_fetch);
                                        myArray[i].supplier_id = supp_id;
                                        document.getElementById("pono-"+ds[1]).value=fin_yr+exist_po_id;

                                    }
                                }
                            }
                            last_po_assigned = data;
                            document.getElementById("pono-"+ds[1]).value=fin_yr+data;
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
                        document.getElementById("pono-"+ds[1]).value=fin_yr+exist_po_id;

                    }
                }
            }
            var resultObject = search_supp_id(supp_id, arr);
            //alert("resultObject:"+resultObject);
        }
    }
}
</script>
<script>
    $(".js-example-tags").select2({
    tags: true
    });

    function get_data123()
    {
        var test = $('#sel-03');
        var ids = $(test).val(); // works
        console.log('Selected IDs123: ' + ids);
        // var display_data = document.getElementById('display_data');
        // display_data.style.display = 'block'; //or
        var updateItemId = "<?php echo $_GET['id'] ?>";
        table = $('#tbl').DataTable( {  
                dom: 'Bfrtip',
                searching:false,
                ajax: 
                {
                    "url": "../../api/retail/get_rpi_table_items.php",
                    "type": "POST",
                    data : 
                    {
                        'itemId' : updateItemId,
                        'ids' : ids
                    },
                    /*dataType: 'text',
                    success: function(data)
                    { 
                        console.log(data);
                        alert("data is:"+data);
                    },*/
                },
                deferRender: true,
                "columnDefs": 
                [ {},],
                destroy:true,
            });

    }
</script>
<script>
    function rate_enter(e)
    {
        var get_id = e.split("-");
        var get_id = get_id[1];
        var quantity = "quantity-".concat(get_id);
        var quantity_value=document.getElementById(quantity).value;
        var rate = "rate-".concat(get_id);
        var rate_value=document.getElementById(rate).value;
        var final_amt = parseInt(quantity_value) * parseInt(rate_value);
        var amt = "amount-".concat(get_id);
        document.getElementById(amt).value = final_amt;
    }

    var last_po_assigned = "<?php echo $max_po1;?>";
            var arr = [];
            setTimeout(function() {
                var count1=table.rows().count();
                //alert("count1:"+count1);
                var i1=0;
                sessionStorage.setItem("prev_count", count1);
                table.rows().eq(0).each( function ( index ) 
                { 
                    var row1 = table.row( index );
                    var data = row1.data();
                     var checkbox_val = table.cell(i1,10).nodes().to$().find('input:checkbox').val();
                    var posupp = table.cell(i1,11).nodes().to$().find('select').val();
                    var pono_tbl = table.cell(i1,12).nodes().to$().find('input').val();

                    // alert("check_val:"+checkbox_val);
                    // alert("posupp:"+posupp);
                    // alert("pono_tbl:"+pono_tbl);

                    arr.push({
                        id : i1,
                        supplier_id:posupp,  
                        po_no_fetch:pono_tbl,
                    });
                    i1++;
                });
            }, 2000);
            console.log(arr);
</script>
<script>
    function payment_mode_change()
    {
        //alert("hii");
        var pay_mode = document.getElementById("payment_mode").value;
        if(pay_mode == "Cheque")
        {
            document.getElementById("advance_cheque_no").readOnly = false;
            document.getElementById("advance_cheque_date").readOnly = false;
        }
        else
        {
            document.getElementById("advance_cheque_no").readOnly = true;
            document.getElementById("advance_cheque_date").readOnly = true;
        }
    }
    function advance_enter()
    {
        var net_amt = document.getElementById("final_total").value;
        var advance_amt = document.getElementById("advance_amt").value;

        var bal_amt = parseFloat(net_amt) - parseFloat(advance_amt);
        document.getElementById("balance_amt").value = bal_amt;
        
    }
    function edit_check()
    {
        //alert("hii");
        $.toast({
            heading: 'Error',
            text: 'Can Not Update..Tax invoice Generated Or Proforma Invoice Deleted',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
    }
</script>