<?php include('../../partials/header.php');?>

<style>
.select2-result-label .wrap:before{
    position:absolute;
    left:4px;
    font-family:fontAwesome;
    color:#999;
    content:"\f096";
    width:25px;
    height:25px;
    
}
.select2-result-label .wrap.checked:before{
    content:"\f14a";
}
.select2-result-label .wrap{
    margin-left:15px;
}

/* not required css */

/* .row
{
  padding: 10px;
} */
</style>
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
    /* .table td, .table th {
    border-bottom: 1px solid #E3EBF3;
    padding: .75rem 1rem;
} */

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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Retail Proforma Invoice</h4>
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
                                        <?php
                                            $get_order_no = "SELECT sr_no FROM mstr_data_series WHERE name='retail_proforma'";
                                            $res1 = mysqli_fetch_row(mysqli_query($db, $get_order_no));
                                        ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Order No.</label>
				                        	<div class="col-md-5">
												<input type="text" id="order_no" class="form-control " value="<?php echo date('y', strtotime('-1 year')).'-'.date('y').'/'.$res1[0] ?>" name="order_no" readonly value="" >
											</div>											
			                       		</div> 
                                    </div>
                                    <div class="col-md-6">
                                    <?php
                                    $test1='2010-04-19 18:31:27';
                                    $d =  date('d/m/Y',strtotime($test1));
                                    // $test1='2010-04-19 18:31:27';
                                    // echo $d =  date('d/m/Y',strtotime($test1));
                                    ?>
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-5">
												<input type="date" id="date" class="form-control " name="date" value="<?php echo date('Y-m-d'); ?>">
											</div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="Signature Concepts" selected>Signature Concepts</option>
												</select>
                                                <!-- <span id="branch_error" style="color:red;">Branch is Required</span> -->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block js-example-tags" id="customer" class="select2" data-toggle="select2" name="customer" onchange="fetchCustomerData(this.value)">
                                                <option value="" disabled selected>Select </option>
                                                <?php
                                                    $get_customer = "SELECT retail_cust_idpk,retail_cust_name FROM mstr_retail_customer WHERE status='1' AND flag='$flag'";
                                                    
                                                    $res2 = mysqli_query($db, $get_customer);
                                                    while($row = mysqli_fetch_row($res2))
                                                    { ?>
                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                                    <?php }
                                                ?>

												</select>
                                                <!-- <span id="customer_error" style="color:red;">Customer is Required</span> -->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" class="form-control " placeholder="0" name="mobile_no" readonly>
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >GST No.</label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control" value="0"  placeholder="0" name="gst_no" id="gst_no" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Sales Man <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="saleman" class="select2" data-toggle="select2" name="saleman">
                                                <option value="" disabled selected>Select </option>
                                                <?php
                                                    $get_employee = "SELECT emp_id_pk,emp_name FROM mstr_employee WHERE emp_designation='sales executive' and emp_status='1'";
                                                    $res3 = mysqli_query($db, $get_employee);
                                                    while($row = mysqli_fetch_row($res3))
                                                    { ?>
                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                                    <?php }
                                                ?>
												</select>
                                                <!-- <span id="saleman_error" style="color:red;">Saleman is Required</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Address </label>
                                            <div class="col-md-9 ">
                                                <textarea type="text" class="form-control" rows="4"  placeholder="" name="address" id="address" style="height: auto;" readonly></textarea>
                                            </div>
				                        </div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Remark</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Remark" name="remark" id="remark" />
											</div>
			                       		</div>
									</div>
		                        </div>
							</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control" for="userinput1">Product List <span style="color:red;">*</span></label>
                                        <div class="col-md-9 divcol">
                                            <select name="sel-03" id="sel-03" class="select2-original" multiple>
                                                <?php  
                                                    $m = "SELECT * FROM mstr_item WHERE delete_status!='1'";
                                                    $k = mysqli_query($db,$m);
                                                    while($kl = mysqli_fetch_array($k))
                                                    {
                                                        
                                                ?>
                                                <option value="<?php echo $kl['item_id_pk'];?>"><?php echo $kl['nks_code']."-".$kl['design_code'];?></option>
                                                <?php } ?>
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
                                            <button type="button" onClick="get_data123();" name="" class="btn btn-primary" >
                                                <i class="fa fa-check-square-o"></i> Get Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            <div class="row" id="display_data">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                     <div class="table-responsive">
                                                     <table class="display " id="tbl" style="width: 100%;font-size: larger;">
                                                    <!-- <table class="border-bottom-0 table table-hover table-responsive" id="tbl" > -->
                                                                <thead>
                                                                    <tr>
                                                                        <th>PRODUCT CAT </th>
                                                                        <th>PRODUCT DESIGN </th>
                                                                        <th>UOM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                                                                <!-- <tbody>
                                                                    <tr>
                                                                        <td>   
                                                                            <select class="form-control" id="category-0"  onchange="get_category(this.id)" >
                                                                                <option value="" disabled selected>Select Catergory </option>
                                                                                <?php
                                                                                    echo  $sql = "SELECT item_id_pk,item_type FROM mstr_item";
                                                                                    $result = mysqli_query($db,$sql);
                                                                                    while($row = mysqli_fetch_array($result))
                                                                                    {   
                                                                                ?>
                                                                                <option value="<?php  echo $row['1'];?>"><?php echo  $row['1']?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        <td>   
                                                                            <select class="form-control" id="item_id-0"  onchange="get_item(this.id)" >
                                                                                <option value="" disabled selected>Select Item </option>
                                                                                <?php
                                                                                    echo  $sql = "SELECT item_id_pk,final_product_code FROM mstr_item";
                                                                                    $result = mysqli_query($db,$sql);
                                                                                    while($row = mysqli_fetch_array($result))
                                                                                    {   
                                                                                ?>
                                                                                <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        <td><input type="text" id="size-0" value="0.00" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" /></td>
                                                                        <td><input type="text" id="quantity-0" class="form-control" value="1.00" onkeyup="get_quantity_value(this.id);"/></td>
                                                                        <td><input type="text" id="sqrft-0" class="form-control" value="0.00" /></td>
                                                                        <td><input type="text" id="rate-0" class="form-control" value="0.00" readonly/></td>
                                                                        <td><div class="input-group">
                                                                                <input type="text" class="form-control" id="table_discount_per-0" value="0"  onkeyup="get_row_discount_value1(this.id);">
                                                                                    
                                                                            </div>
                                                                        </td>
                                                                        <td><div class="input-group">
                                                                                    <input type="text" class="form-control" id="table_discount_rs-0" value="0" onkeyup="get_row_discount_value(this.id);">
                                                                                    
                                                                            </div>
                                                                        </td>
                                                                        <td><input type="text" id="amount-0" value="0.00" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';"/></td>
                                                                        <td><input type="text" id="remark-0" value="" class="input" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" /></td>

                                                                        
                                                                        <td>
                                                                            <input type="checkbox" name="po_yes" value="po_yes" id="myCheck-0" onclick="myFunction(this.id)">
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <select class="form-control" id="posupplier-0" onchange="Supplier_select_po_generation(this.id)">
                                                                            
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="pono-0" class="form-control" value=""/>
                                                                        </td>
                                                                    </tr>
                                                                </tbody> -->
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
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Quantity</b></label>
                                                            <input type="text" class="form-control" value="0" id="total_qty" name="total_qty" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Sq.ft.</b></label>
                                                            <input type="text" class="form-control" value="0" id="total_sqfit" name="total_sqfit" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Gross Amt.</b></label>
                                                            <input type="text" class="form-control" value="0" id="gross_amt" name="gross_amt" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Total</b></label>
                                                            <input type="text" class="form-control" value="0" id="total" name="total" readonly="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Discount(%)</b></label>
                                                            <input type="text" class="form-control" value="0" id="disc_percent" name="disc_percent" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Discount</b></label>
                                                            <input type="text" class="form-control" value="0" id="discount_final" name="discount_final" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Other(+/-)</b></label>
                                                            <input type="text" class="form-control" value="0" id="adjustment_final" name="adjustment_final" onkeyup='get_final_amount(this.value);' >
                                                        </div>
                                                        <div class="col-md-2 d-none">
                                                            <label class=" label-control" for="userinput1"><b>Pro Amt.</b></label>
                                                            <input type="text" class="form-control" value="0" id="process_amount" name="process_amount" onkeyup='get_final_amount(this.value);'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <!-- <div class="col-md-1">
                                                        </div> -->
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Payment Mode</b> 
                                                            <span style="color:red;">*</span> </label>
                                                            <select id="payment_mode" name="payment_mode" class="form-control" onchange="payment_mode_change();">
                                                                <option value="">--Select Payment Mode--</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="Cheque">Cheque</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Cheque No.</b> 
                                                            <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" id="advance_cheque_no" name="advance_cheque_no" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Cheque Date</b> 
                                                            <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" id="advance_cheque_date" name="advance_cheque_date" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" id="final_total" name="final_total" readonly="">
                                                            <!-- <span id="net_amt_error" style="color:red;">Net Amt is Required</span> -->
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Advance Amount</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" id="advance_amt" name="advance_amt" onkeyup="advance_enter();">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Balance Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" value="0" id="balance_amt" name="balance_amt">
                                                        </div>
                                                        <!-- <div class="col-md-3"></div> -->
                                                        
                                                    </div>
                                                </div>
                                            </div>

	                        <div class="form-actions right">
								
								<button type="button" name="add_retail_proforma" class="btn btn-primary" id="add_retail_proforma" >
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
    // document.getElementById("branch_error").style.display = "none";
    // document.getElementById("saleman_error").style.display = "none";
    // document.getElementById("customer_error").style.display = "none";
    // document.getElementById("net_amt_error").style.display = "none";
    ///////////////////////////
    
    var display_data = document.getElementById('display_data');
    display_data.style.display = 'none'; //or
    //link.style.visibility = 'hidden';

    $('.select2-original').select2({
    	placeholder: "Choose elements",
      width: "100%"
    })
    var test = $('#sel-03');
    $(test).change(function() {
        var ids = $(test).val(); // works
        //var selections = $(test).filter('option:selected').text(); // doesn't work
        //var ids = $(test).select2('data').id; // doesn't work (returns 'undefined')
        //var selections = $(test).select2('data').text; // doesn't work (returns 'undefined')
        //var selections = $(test).select2('data');
        var selections = ( JSON.stringify($(test).select2('data')) );
        console.log('Selected IDs: ' + ids);
        console.log('Selected options: ' + selections);
        //$('#selectedIDs').text(ids);
        $('#selectedText').text(selections);
    });

});

function get_data123()
{
    var test = $('#sel-03');
    var ids = $(test).val(); // works
    if (ids == "") {
        $.toast({
            heading: 'Error',
            text: 'Please Enter Product List...!!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
    }
    console.log('Selected IDs123: ' + ids);
    var display_data = document.getElementById('display_data');
    display_data.style.display = 'block'; //or

    table = $('#tbl').DataTable( {  
            dom: 'Bfrtip',
            searching:false,
            ajax: 
            {
                "url": "../../api/retail/fetch_items_row_for_proforma_invoice.php",
                "type": "POST", 
                data : 
                {
                    'edit_id' : ids
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
    var table="";
    var i=1;

    function get_new_line() {
        <?php $sql = 'SELECT item_id_pk,item_type FROM mstr_item';
        $result = mysqli_query($db,$sql);?>
        var category="<select class='form-control block'  id='category-"+i+"' onchange='get_category(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['1']?>'><?php echo $row['1'];?></option><?php } ?></select>";
        <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
        $result = mysqli_query($db,$sql);?>
        var item="<select class='form-control block'  id='item_id-"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
        var quantity="<input type='text' id='quantity-"+i+"' class='form-control' value='0' onkeyup='get_quantity_value(this.id);'>"
        var rate= "<input type='text' id='rate-"+i+"' class='form-control' value='0.00' readonly>"
        var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per-"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';></div>";
        var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs-"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
        var amount="<input type='text' id='amount-"+i+"' class='form-control' value='0.00'>";
        var size="<input type='text' id='size-"+i+"' class='form-control' value='0.00' />";
        var sqrft="<input type='text' id='sqrft-"+i+"' class='form-control' value='0.00' />";
        var remark="<input type='text' id='remark-"+i+"' class='form-control' value=''>"; 
        // var process1="<input type='text' id='poprocess-"+i+"' class='form-control' value=''>";
        var checkbox = "<input type='checkbox' name='po_yes' value='po_yes' id='myCheck-"+i+"' onclick='myFunction(this.id)'>";
        // var poamt = "<input type='text' id='poamt-"+i+"' class='form-control' value='0.00' />";
        
        <?php 
            // $sup_sql = "SELECT * FROM mstr_supplier order BY supplier_id_fk DESC";
            // $sres = mysqli_query($db,$sup_sql);?>
        var posupp = "<select class='form-control' id='posupplier-"+i+"' onchange='Supplier_select_po_generation(this.id)'><option value='' disabled selected>Select Supplier </option></select>"
        var pono = '<input type="text" id="pono-'+i+'" class="form-control" value="" />';  
            
        //alert("i is:"+i);
        var checki = i-1;
        //alert("checki:"+checki);
        var checkBox_val = document.getElementById('myCheck-'+checki);
        //var checkBox = document.getElementById(id);
        //alert("checkbox val:"+checkBox_val);
        if(checkBox_val.checked == true)
        {
            var sup_code = document.getElementById('posupplier-'+checki).value;
            //alert("sup_code is:"+sup_code);
            if(sup_code == "")
            {
                alert("Cant Add Another Row!Supplier Not Selected for row "+i+"");
            }
            else
            {
                    //alert("supp selected");
                    table.row.add( [
                category, 
                item,  
                size,  
                quantity,
                sqrft, 
                rate,
                discount_per ,
                discount_rs ,
                amount ,
                remark,
                //process1,
                checkbox,
                //poamt,
                posupp,
                pono
                ] ).draw( false );

                i++; 
            }
        }
        else
        {

        
            table.row.add( [category, item,  size,  quantity,sqrft, rate,
            discount_per ,
            discount_rs ,
            amount ,
            remark,
            //process1,
            checkbox,
            //poamt,
            posupp,
            pono
            ] ).draw( false );

            i++; 
        }
    }

    $(document).ready(function()
    {
        table= $('#tbl').DataTable( {
        
            paginate: false,
            lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            buttons: [],
            searching:false,
            language : {
            "zeroRecords": " ",
            
        },
        });

        
    // var i=1;
    // $('#add_new_line').click(function() {
        
    //     <?php $sql = 'SELECT item_id_pk,item_type FROM mstr_item';
    //     $result = mysqli_query($db,$sql);?>
    //     var category="<select class='form-control block'  id='category-"+i+"' onchange='get_category(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['1']?>'><?php echo $row['1'];?></option><?php } ?></select>";
    //     <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
    //     $result = mysqli_query($db,$sql);?>
    //     var item="<select class='form-control block'  id='item_id-"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
    //     var quantity="<input type='text' id='quantity-"+i+"' class='form-control' value='1.00' onkeyup='get_quantity_value(this.id);'>"
    //     var rate= "<input type='text' id='rate-"+i+"' class='form-control' value='0.00' readonly>"
    //     var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per-"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';></div>";
    //     var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs-"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
    //     var amount="<input type='text' id='amount-"+i+"' class='form-control' value='0.00'>";
    //     var size="<input type='text' id='size-"+i+"' class='form-control' value='0.00' />";
    //     var sqrft="<input type='text' id='sqrft-"+i+"' class='form-control' value='0.00' />";
    //     var remark="<input type='text' id='remark-"+i+"' class='form-control' value=''>"; 
    //     // var process1="<input type='text' id='poprocess-"+i+"' class='form-control' value=''>";
    //     var checkbox = "<input type='checkbox' name='po_yes' value='po_yes' id='myCheck-"+i+"' onclick='myFunction(this.id)'>";
    //     // var poamt = "<input type='text' id='poamt-"+i+"' class='form-control' value='0.00' />";
        
    //     <?php 
    //         // $sup_sql = "SELECT * FROM mstr_supplier order BY supplier_id_fk DESC";
    //         // $sres = mysqli_query($db,$sup_sql);?>
    //     var posupp = "<select class='form-control' id='posupplier-"+i+"' onchange='Supplier_select_po_generation(this.id)'><option value='' disabled selected>Select Supplier </option></select>"
    //     var pono = '<input type="text" id="pono-'+i+'" class="form-control" value="" />';  
            
    //     //alert("i is:"+i);
    //     var checki = i-1;
    //     //alert("checki:"+checki);
    //     var checkBox_val = document.getElementById('myCheck-'+checki);
    //     //var checkBox = document.getElementById(id);
    //     //alert("checkbox val:"+checkBox_val);
    //     if(checkBox_val.checked == true)
    //     {
    //         var sup_code = document.getElementById('posupplier-'+checki).value;
    //         //alert("sup_code is:"+sup_code);
    //         if(sup_code == "")
    //         {
    //             alert("Cant Add Another Row!Supplier Not Selected for row "+i+"");
    //         }
    //         else
    //         {
    //                 //alert("supp selected");
    //                 table.row.add( [
    //             category, 
    //             item,  
    //             size,  
    //             quantity,
    //             sqrft, 
    //             rate,
    //             discount_per ,
    //             discount_rs ,
    //             amount ,
    //             remark,
    //             //process1,
    //             checkbox,
    //             //poamt,
    //             posupp,
    //             pono
    //             ] ).draw( false );

    //             i++; 
    //         }
    //     }
    //     else
    //     {

        
    //         table.row.add( [category, item,  size,  quantity,sqrft, rate,
    //         discount_per ,
    //         discount_rs ,
    //         amount ,
    //         remark,
    //         //process1,
    //         checkbox,
    //         //poamt,
    //         posupp,
    //         pono
    //         ] ).draw( false );

    //         i++; 
    //     }
    //     });
    
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

        get_new_line();
    
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

                var net_amt = document.getElementById("final_total").value;
                            var advance_amt = document.getElementById("advance_amt").value;
                            var ten_per_amt = (parseFloat(net_amt) * parseFloat(10)) / parseFloat(100);
                            //alert("ten_per_amt:"+ten_per_amt);

    }                   
</script>
<script>
    $(document).ready(function(){
        $('#add_retail_proforma').click(function () {

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
                //product_id
                var prodect_category =table.cell(i,0).nodes().to$().find('input').val();
                var item_id_fk =table.cell(i,14).nodes().to$().find('input').val();
                var uom=table.cell(i,2).nodes().to$().find('select').val();
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
                    uom: uom,
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

            var branch = document.getElementById('branch').value;
            var order_no = document.getElementById('order_no').value;
            var date = document.getElementById('date').value;
            var customer = document.getElementById('customer').value;
            //alert("customer:"+customer);
            

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
            //alert("customer_name 123:"+customer_name);
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
            //alert("payment_mode:"+payment_mode);
            

            var net_amt = document.getElementById("final_total").value;
                            var advance_amt = document.getElementById("advance_amt").value;
                            var ten_per_amt = (parseFloat(net_amt) * parseFloat(10)) / parseFloat(100);
            
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

                                    url: "../../api/retail/add_retail_proforma.php", 
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
                                        "advance_cheque_date" : advance_cheque_date
                                        
                                        
                                        
                                        
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
                                                //window.location.href="view_retail_proforma_invoice.php";    
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

                                url: "../../api/retail/add_retail_proforma.php", 
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
                                        "advance_cheque_date" : advance_cheque_date 
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

                        url: "../../api/retail/add_retail_proforma.php", 
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
                                    url: "../../api/retail/add_retail_proforma.php", 
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
                                        "advance_cheque_date" : advance_cheque_date
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

                                url: "../../api/retail/add_retail_proforma.php", 
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
                                        "advance_cheque_date" : advance_cheque_date
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
            

        });
    });
</script>                           
<script>
    function fetchCustomerData(name)
    {
        if(isNaN(name))
        {
            //alert("hii");
            document.getElementById("mobile_no").readOnly = false;
            document.getElementById("address").readOnly = false;
            document.getElementById("gst_no").readOnly = false;

            document.getElementById("gst_no").value = "";
            document.getElementById("mobile_no").value = "";
            document.getElementById("address").value = "";
            /*var date = document.getElementById("date").value;

            if(gst_no!="" && mobile_no!="" && address!="")
            {

                $.ajax({
                    url: '../../api/retail/add_retail_customer_from_proforma.php',
                    type: 'POST',
                    // data: { 'name='+ name + '&gst_no='+ gst_no + 
                    //         '&mobile_no=' + mobile_no + 
                    //         '&address=' +address 
                    //       },
                    data :"name=" + name + '&gst_no=' +gst_no + '&mobile_no=' +mobile_no 
                    + '&address='+address + '&date=' +date,
                    success: function (data) 
                    {
                        alert("data:"+data);
                        console.log(data);
                        var cust_reflect =  "<option value='" + data + "'>" + name + "</option>";
                        $('#mobile_no').val(mobile_no);
                        $('#address').val(address);
                        $('#gst_no').val(gst_no);

                        document.getElementById("mobile_no").readOnly = true;
                        document.getElementById("address").readOnly = true;
                        document.getElementById("gst_no").readOnly = true;

                    }
                })
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
                
            }*/
        }
        else
        {
            //alert("bbbyyee");
            //document.write(num1 + " is a number <br/>");
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
  var ds = id.split("-");
  if (checkBox.checked == true)
  {
    //text.style.display = "block";
    //alert("yess");
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
    $('#pono-'+ds[1]).val('');
    $('#posupplier-'+ds[1]).html(null);

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
                            var inc_po = parseInt(last_po_assigned) + parseInt(1);
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
                                alert("inside  search index");
                                for (var i=0; i < myArray.length; i++) {
                                    if (myArray[i].id === nameKey) 
                                    {
                                        var exist_po_id = myArray[i].po_no_fetch;
                                        alert("po_no_fetch is:"+myArray[i].po_no_fetch);
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
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="date.js"></script>
</script>
<script>
    $(".js-example-tags").select2({
    tags: true
    });
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
</script>