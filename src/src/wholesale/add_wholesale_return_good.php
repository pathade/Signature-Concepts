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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Wholesale Return Goods</h4>
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

                                            $sql1 = "SELECT * FROM mstr_data_series where name='wholesale_return_good'";
                                            $result = mysqli_query($db,$sql1);
                                            $row6 = mysqli_fetch_array($result);
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Return No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="return_no" class="form-control " value="<?php echo date('y',strtotime('-1 year')).'-'.date('y').'/'.$row6['2']; ?>" placeholder="" name="return_no" readonly value="" >
											</div>
                                            <label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>">
											</div>											
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly >
                                                    <option value="" disabled selected>Signature Concepts LLP </option>
												</select>
                                            </div>
				                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onchange="select_cust(this.id);">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php

                                                        echo $sql = "SELECT distinct dc.cust_id_fk,c.cust_name FROM `wholesale_delivery_challan` as dc,tbl_wholesale_customer as c WHERE dc.cust_id_fk = c.wc_id_pk
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
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Challan No <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="pchallan_no" name="pchallan_no" class="select2" data-toggle="select2" onchange="fetch_dc_data();">
                                                    <option value="" disabled selected>Select </option>
                                                    <option value="CH/19-20/SC/197" >CH/19-20/SC/197 </option>
												</select>
                                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Address </label>
                                            <div class="col-md-9 ">
                                                <textarea type="text" class="form-control" rows="4"  placeholder="Address" name="address" id="address" style="height: auto;" readonly></textarea>
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
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Transporter</label>
				                        	<div class="col-md-3">
                                                <select class="form-control" id="transporter" name="transporter" >
                                                    <option value="" disabled selected>Select </option>
												</select>
                                            </div>
                                            <label class="col-md-2 label-control" for="userinput1">Vehicle</label>
				                        	<div class="col-md-4">
                                                <select class="form-control" id="vehicle" name="vehicle" >
                                                    <option value="" disabled selected>Select </option>
												</select>
                                            </div>
				                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Prepared By</label>
				                        	<div class="col-md-9">
                                                <!-- <select class="form-control" id="prepared_by" name="prepared_by" readonly >
                                                    <option value="" disabled selected>Select </option>
												</select> -->
                                                <input class="form-control" type="text" id="prepared_by" name="prepared_by" readonly />
                                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Work No</label>
				                        	<div class="col-md-3">
                                                <input class="form-control" type="text" id="work_no" name="work_no" readonly />
                                            </div>
                                            <label class="col-md-2 label-control" for="userinput1">Time</label>
				                        	<div class="col-md-4">
                                                <input type="text" class="form-control" id="time" name="time" readonly />
                                            </div>
				                        </div>
                                    </div>
		                        </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Stock Point </label>
                                            <div class="col-md-9 ">
                                                <!-- <select class="form-control" id="stock_point" name="stock_point" readonly>
                                                    <option value="" disabled selected>Select </option>
												</select> -->
                                                <input type="text" class="form-control" name="stock_point" id="stock_point" value="Signature Concepts">
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Trans. Amt.</label>
				                        	<div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="0" id="trans_amt" name="trans_amt" />
                                                <input type="text" class="form-control" placeholder="0" id="igst_app" name="igst_app" />
                                                
                                            </div>
                                        </div>
				                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Remark </label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" rows="2"  placeholder="" name="remark" id="remark" style="height: auto;"></textarea>
                                            </div>
				                        </div>
				                    </div>
                                </div>
							</div>
                            <br />
                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                        
                                                    <div class="table-responsive">
                                                    <table class="display" id="tbl" style="width: 100%;font-size: smaller;">
                                                            <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>PRODUCT CATEGORY </th>
                                                                        <th>PRODUCT DESIGN </th>
                                                                        <th>Size </th>
                                                                        <th>QUANTITY </th>
                                                                        <th>RETURN QUANTITY </th>
                                                                        <th>Remain QUANTITY </th>
                                                                        <th>Sqrft </th>
                                                                        <th>RATE </th>
                                                                        <th>DISCOUNT %</th>
                                                                        <th>DISCOUNT Rs</th>
                                                                        <th>AMOUNT</th>
                                                                        <th>RETURN AMOUNT </th>
                                                                        <th>REMARK</th>
                                                                        <th>HIdden</th>
                                                                        <th>GST %</th>
                                                                        <th>CGST AMT</th>
                                                                        <th>SGST AMT</th>
                                                                        <th>IGST AMT</th>
                                                                        <th>dc id hidden</th>
                                                                        <!-- <th>PO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PROCESS AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>SUPPLIER&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PONO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                    </tr>
                                                            </thead>
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
                                                <div class="col-md-9">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 mt-1">
                                                            <label class="label-control" for="userinput1" >Gross Amt <span style="color:red;">*</span></label>
												            <input type="text" class="form-control"  placeholder="0" name="gross_amt" id="gross_amt" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <label class="label-control" for="userinput1" >Total</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="total_cal" id="total_cal" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="col-md-4 mt-1" >
                                                            <label class="label-control" for="userinput1" >Tax %</label>
												            <input type="text" class="form-control"  placeholder="0" name="tax_per_cal" id="tax_per_cal" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4 mt-1" >
                                                            <label class="label-control" for="userinput1" >Quantity</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="quantity" id="quantity" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="col-md-4 mt-1" >
                                                            <label class="label-control" for="userinput1" >Tot Sqrft.</label>
												            <input type="text" class="form-control"  placeholder="0" name="tot_sqrft1" id="tot_sqrft1" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <label class="label-control" for="userinput1" >Process Amt</label>
												            <input type="text" class="form-control"  placeholder="0" name="process_amt1" id="process_amt1" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4 mt-1" >
                                                            <label class="label-control" for="userinput1" >Discount (%)</label>
												            <input type="text" class="form-control"  placeholder="0" name="disc_" id="disc_" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <label class="label-control" for="userinput1" >Discount</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="discount" id="discount" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="col-md-4 mt-1" >
                                                            <label class="label-control" for="userinput1" >Other(+/-)</label>
												            <input type="text" class="form-control" value="0"  placeholder="0" name="oth" id="oth" style="height: calc(2.75rem + -6px);" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="col-md-12">
                                                        <div class="form-group row mt-1" >
                                                            <label class="label-control" for="userinput1" >Tax Amt</label>
                                                            <input type="text" class="form-control"  placeholder="0" name="tax_amt_cal" id="tax_amt_cal" style="height: calc(2.75rem + -6px);" readonly/>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="label-control" for="userinput1" ><b>Net Amount <span style="color:red;">*</span></b></label>
                                                            <input type="text" class="form-control"  placeholder="0" name="net_amt_cal" id="net_amt_cal" style="height: calc(2.75rem + 10px);background: #000;color: #1ec20a;" />
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
  
//   document.getElementById("supplier_name_error").style.display = "none";
//   document.getElementById("supplier_address_error").style.display = "none";
//   document.getElementById("phone_no1_error").style.display = "none";
//   document.getElementById("phone_no2_error").style.display = "none";
//   document.getElementById("contact_person_error").style.display = "none";
//   document.getElementById("pan_error").style.display = "none";
//   document.getElementById("gst_no_error").style.display = "none";
  ///////////////////////////
});
</script>


<script>
    var table="";
    var i=1;
    function get_new_line() {
        <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
            $result = mysqli_query($db,$sql);?>
            var item="<select class='form-control block'  id='item_id"+i+"'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
            var type="<select class=' form-control block' id='type"+i+"'  > <option value='' disabled selected>Select Type</option><option value=''>8.Qty(Pcs)</option><option value='12'>12.Boxes qty</option><option value='13'>13.ML</option></select>"
            var length="<input type='text' id='length"+i+"' class='form-control' value='0' onkeyup='get_quantity_value(this.id);'>"
            var breath= "<input type='text' id='breath"+i+"' class='form-control' value='0' >"
            var qty="<input type='text' class='form-control' id='qty"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';>";
            var sqrft="<input type='text' class='form-control' id='sqrft"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';>";
            var rate="<input type='text' id='rate"+i+"' class='form-control' value='0'>";
            var amount ="<input type='text' id='amount"+i+"' class='form-control' value='0' />";
            var discount = "<input type='text' id='discount"+i+"' class='form-control' value='0' />";
            var dis_amt = "<input type='text' id='discamt"+i+"' class='form-control' value='0' />";
            var total = "<input type='text' id='total"+i+"' class='form-control' value='0' />";
            var process ="<input type='text' id='process"+i+"' class='form-control' value='0' />";
            var pro_amt = "<input type='text' id='pro_amt"+i+"' class='form-control' value='0' />";                                    
            var bill_disc_per = "<input type='text' id='billdiscper"+i+"' class='form-control' value='0' />";
            var bill_disc_amt = "<input type='text' id='billdiscamt"+i+"' class='form-control' value='0' />";
            var tax_per = "<input type='text' id='taxper"+i+"' class='form-control' value='0' />";
            var tax_amt = "<input type='text' id='taxamt"+i+"' class='form-control' value='0' />";
            var net_amt = "<input type='text' id='netamt"+i+"' class='form-control' value='0' />";
            var oct_trn_char = "<input type='text' id='octtrnchr"+i+"' class='form-control' value='0' />";
            var italian_sqrft = "<input type='text' id='italiansqrft"+i+"' class='form-control' value='0' />";
            var italian_side = "<input type='text' id='italianside"+i+"' class='form-control' value='0' />";
            var gst ="<input type='text' id='gst"+i+"' class='form-control' value='0' />";
            var cgst_amt = "<input type='text' id='cgstamt"+i+"' class='form-control' value='0' />";
            var sgst_amt = "<input type='text' id='sgstamt"+i+"' class='form-control' value='0' />";
            var igst_amt = "<input type='text' id='igstamt"+i+"' class='form-control' value='0' />";
            var cess_per = "<input type='text' id='cessper"+i+"' class='form-control' value='0' />";
            var cess_amt = "<input type='text' id='cessamt"+i+"' class='form-control' value='0' />";
            table.row.add( [

                item, type, length, breath,
                qty,sqrft,rate, amount ,discount ,
                dis_amt ,
                total, process,pro_amt,bill_disc_per, bill_disc_amt, tax_per,tax_amt,
                net_amt, oct_trn_char, italian_sqrft, italian_side, gst, cgst_amt, sgst_amt, igst_amt, cess_per, cess_amt
                
            
                ] ).draw( false );
                i++; 
    };
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
                                  
        var i=1;
        $('#add_new_line').click(function() {
            
            <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
            $result = mysqli_query($db,$sql);?>
            var item="<select class='form-control block'  id='item_id"+i+"'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
            var type="<select class=' form-control block' id='type"+i+"'  > <option value='' disabled selected>Select Type</option><option value=''>8.Qty(Pcs)</option><option value='12'>12.Boxes qty</option><option value='13'>13.ML</option></select>"
            var length="<input type='text' id='length"+i+"' class='form-control' value='0' onkeyup='get_quantity_value(this.id);'>"
            var breath= "<input type='text' id='breath"+i+"' class='form-control' value='0' >"
            var qty="<input type='text' class='form-control' id='qty"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';>";
            var sqrft="<input type='text' class='form-control' id='sqrft"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';>";
            var rate="<input type='text' id='rate"+i+"' class='form-control' value='0'>";
            var amount ="<input type='text' id='amount"+i+"' class='form-control' value='0' />";
            var discount = "<input type='text' id='discount"+i+"' class='form-control' value='0' />";
            var dis_amt = "<input type='text' id='discamt"+i+"' class='form-control' value='0' />";
            var total = "<input type='text' id='total"+i+"' class='form-control' value='0' />";
            var process ="<input type='text' id='process"+i+"' class='form-control' value='0' />";
            var pro_amt = "<input type='text' id='pro_amt"+i+"' class='form-control' value='0' />";                                    
            var bill_disc_per = "<input type='text' id='billdiscper"+i+"' class='form-control' value='0' />";
            var bill_disc_amt = "<input type='text' id='billdiscamt"+i+"' class='form-control' value='0' />";
            var tax_per = "<input type='text' id='taxper"+i+"' class='form-control' value='0' />";
            var tax_amt = "<input type='text' id='taxamt"+i+"' class='form-control' value='0' />";
            var net_amt = "<input type='text' id='netamt"+i+"' class='form-control' value='0' />";
            var oct_trn_char = "<input type='text' id='octtrnchr"+i+"' class='form-control' value='0' />";
            var italian_sqrft = "<input type='text' id='italiansqrft"+i+"' class='form-control' value='0' />";
            var italian_side = "<input type='text' id='italianside"+i+"' class='form-control' value='0' />";
            var gst ="<input type='text' id='gst"+i+"' class='form-control' value='0' />";
            var cgst_amt = "<input type='text' id='cgstamt"+i+"' class='form-control' value='0' />";
            var sgst_amt = "<input type='text' id='sgstamt"+i+"' class='form-control' value='0' />";
            var igst_amt = "<input type='text' id='igstamt"+i+"' class='form-control' value='0' />";
            var cess_per = "<input type='text' id='cessper"+i+"' class='form-control' value='0' />";
            var cess_amt = "<input type='text' id='cessamt"+i+"' class='form-control' value='0' />";
            table.row.add( [

                item, type, length, breath,
                qty,sqrft,rate, amount ,discount ,
                dis_amt ,
                total, process,pro_amt,bill_disc_per, bill_disc_amt, tax_per,tax_amt,
                net_amt, oct_trn_char, italian_sqrft, italian_side, gst, cgst_amt, sgst_amt, igst_amt, cess_per, cess_amt
                
            
                ] ).draw( false );
                i++; 
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
            var total_tax_per = 0;
            var net_amount = 0;
            

            for(var i=0;i<count;i++)
            {
                
                var tblamt=table.cell(i,12).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var drs=table.cell(i,10).nodes().to$().find('input').val()
    
                var discount_rs= parseInt(discount) +parseInt(drs);
            
                var tblqty=table.cell(i,5).nodes().to$().find('input').val()
    
                var totalqty= parseInt(totalqty) +parseInt(tblqty);

                var tblsqft=table.cell(i,7).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tblsqft);

                var tbldisc=table.cell(i,9).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldisc);

                var q = table.cell(i,5).nodes().to$().find('input').val();
                var r =  table.cell(i,8).nodes().to$().find('input').val();
                var gross = parseFloat(q) * parseFloat(r);
                var tgross= parseFloat( tgross) +parseFloat(gross);

                //gst_per 
                var gst_per = table.cell(i,15).nodes().to$().find('input').val();
                var famt = table.cell(i,9).nodes().to$().find('input').val();

                var total_trans_amt = parseFloat(gst_per) * parseFloat(tgross);
                var ftotal_trans_amt = parseFloat(total_trans_amt) / parseInt(100);

                var tax_per = table.cell(i,15).nodes().to$().find('input').val();
                var total_tax_per = parseInt(total_tax_per) + parseInt(tax_per);

                var oth = document.getElementById("oth").value;
                // alert("oth:"+oth);
                // alert("oth:"+ftotal_trans_amt);
                //alert("oth:"+oth);

                var net_amount = parseInt(ftotal_trans_amt) + parseInt(oth) + parseInt(amount);



            }

        
            document.getElementById('total_cal').value=amount;
            //document.getElementById('final_disc_amt').value=discount_rs;
            document.getElementById('tax_per_cal').value=total_tax_per;
            document.getElementById('tax_amt_cal').value=ftotal_trans_amt;
            document.getElementById('quantity').value=totalqty;
            document.getElementById('gross_amt').value=tgross;
            document.getElementById('tax_amt_cal').value=ftotal_trans_amt;
            document.getElementById('tot_sqrft1').value=totalsqft;
            document.getElementById('disc_').value=totaldisc;
            document.getElementById('discount').value=discount_rs;
            document.getElementById('net_amt_cal').value=net_amount;
            
            
            


        
        },1000
        );
        });                     
        function get_item(e) 
        {                             
            var id=document.getElementById(e).value;
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
                    var rate = "rate".concat(get_id);
                    var quantity="quantity".concat(get_id);
                    var quantity_value =document.getElementById(quantity).value;
                    $('#'+rate).val(d[0]);
                    var amount_value=d[0]*quantity_value;
                    var amount="amount".concat(get_id);
                    $('#'+amount).val(amount_value);
                }
            });      
            
          
        }      
        function get_row_discount_value(e) 
        {

            //var get_id= e.slice(e.length - 1);
            var get_id = e.split("-");
            var get_id = get_id[1];
            var table_discount=document.getElementById(e).value;
            var quantity = "return_quantity-".concat(get_id);
            var quantity_value=document.getElementById(quantity).value;
            var rate = "rate-".concat(get_id);
            var rate=document.getElementById(rate).value;
            var amount_value=rate*quantity_value;
            var amount = "return_amt-".concat(get_id);
            var disc_per=(table_discount/amount_value) * 100;
            var disc_per= parseFloat(disc_per).toFixed(2)
            var table_discount_per = "table_discount_per-".concat(get_id);
            if(table_discount=='')
            {
                var total=parseFloat(amount_value)-0;
                document.getElementById(amount).value=total;
                document.getElementById(table_discount_per).value='0'
            }
            else
            {
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
            
            var quantity = "return_quantity-".concat(get_id);
            var quantity_value=document.getElementById(quantity).value;
            var rate = "rate-".concat(get_id);

            var rate=document.getElementById(rate).value;
            
            var amount_value=rate*quantity_value;

            var amount = "return_amt-".concat(get_id);

            
            var disc_rs=parseFloat(table_discount)*parseFloat(amount_value)/100;

            var disc_rs= parseFloat(disc_rs).toFixed(2)
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
        }
        function get_quantity_value(e) 
        {
            
            //var get_id= e.slice(e.length - 1);
            var get_id = e.split("-");
            var get_id = get_id[1];
            var quantity_value=document.getElementById(e).value;
            var rate = "rate-".concat(get_id);
            var table_discount_rs="table_discount_rs-".concat(get_id);
            var rate=document.getElementById(rate).value;
            var table_discount_rs_value=document.getElementById(table_discount_rs).value;
            var amount_value=rate*quantity_value;
            var amount="return_amt-".concat(get_id);
            $('#'+amount).val(amount_value);
            
            var count=table.rows().count();
            // var disc_per=(table_discount_rs_value/amount_value) * 100;
            // var disc_per= parseFloat(disc_per).toFixed(2);
            var table_discount_per = "table_discount_per-".concat(get_id);
            document.getElementById(table_discount_per).value=0;
            var table_discount_rs = "table_discount_rs-".concat(get_id);
            document.getElementById(table_discount_rs).value=0;

            get_new_line();
        }
        function return_qty(e)
        {
            var get_id = e.split("-");
            var get_id = get_id[1];

            var actual_qty = "quantity-".concat(get_id);
            var return_qty=document.getElementById(e).value;
            var actual_qty1=document.getElementById(actual_qty).value;
            //var table_discount_rs="table_discount_rs".concat(get_id);
            
            //alert("actual qty:"+actual_qty1);
            //alert("return_qty qty:"+return_qty);

            var remain_qty = parseInt(actual_qty1) - parseInt(return_qty);
            //alert("remain_qty qty:"+remain_qty);
            var rq = "remain_quantity-".concat(get_id);
            document.getElementById(rq).value = remain_qty;


            var rate = "rate-".concat(get_id);
            var table_discount_rs="table_discount_rs-".concat(get_id);
            var rate=document.getElementById(rate).value;
            var table_discount_rs_value=document.getElementById(table_discount_rs).value;
            var amount_value=rate*return_qty;
            var return_amt="return_amt-".concat(get_id);
            $('#'+return_amt).val(amount_value);

            var igper = "gst_per-".concat(get_id);
            //alert("igper:"+igper);

            var igper=document.getElementById(igper).value;

            //cgst calculations
            var ig = document.getElementById("igst_app").value;
            if(ig == "0")
            {
                var a = parseInt(igper) * parseInt(amount_value);
                var b = parseInt(a) / 100;

                var g = parseInt(b)/2;

                var cgst = "cgst_amt-".concat(get_id);
                var sgst = "agst_amt-".concat(get_id);
                var igst = "igst_amt-".concat(get_id);
                

                document.getElementById(cgst).value = g;
                document.getElementById(sgst).value = g;
                document.getElementById(igst).value = 0;


            }
            else
            {
                var a = parseInt(igper) * parseInt(amount_value);
                var b = parseInt(a) / 100;

                var g = parseInt(b)/2;

                var cgst = "cgst_amt-".concat(get_id);
                var sgst = "agst_amt-".concat(get_id);
                var igst = "igst_amt-".concat(get_id);
                

                document.getElementById(cgst).value = 0;
                document.getElementById(sgst).value = 0;
                document.getElementById(igst).value = b;
            }
            


        }

        function get_final_amount(e) 
        {
            var total=document.getElementById('total').value;
            var adjustment_final=document.getElementById('adjustment_final').value;
            var process_amount=document.getElementById('process_amount').value;
            if(adjustment_final=='' && process_amount=='' )
            {
                var final_amount=parseFloat(total);
                document.getElementById("final_total").value=final_amount;
            }
            else if(adjustment_final=='')
            {
                var final_amount=parseFloat(total)+0+parseInt(process_amount);
                document.getElementById("final_total").value=final_amount;
            }
            else if( process_amount=='' )
            {
                var final_amount=parseFloat(total)+parseFloat(adjustment_final)+0;
                document.getElementById("final_total").value=final_amount;
            }                                   
            else
            {
                var final_amount=parseFloat(total)+parseFloat(adjustment_final)+parseInt(process_amount);
                document.getElementById("final_total").value=final_amount;
            }                     
        }                                           
</script>
<script>
    function select_cust(id)
    {
        var cust_id = document.getElementById("customer").value;
        //alert("cust_id :"+cust_id);

        $.ajax(
        {

            url: "../../api/wholesale/get_dc_no_for_return_good.php",
            type: 'POST',
            data : 'cust_id='+cust_id,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data);
                
                $('#pchallan_no').html(data)
            },
            
        });

    }
    function fetch_dc_data()
    {
        var dc_id = document.getElementById("pchallan_no").value;
        //alert("dc_id :"+dc_id);

        $.ajax(
        {

            url: "../../api/wholesale/get_dc_details_for_return_good.php",
            type: 'POST',
            data : 'dc_id='+dc_id,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data);
                var d = data.split("#");
                //alert("d 0:"+d[0]);
                $('#address').val(d[0]);
                $('#mobile_no').val(d[1]);
                $('#transporter').html(d[2]);
                $('#vehicle').html(d[3]);
                $('#prepared_by').val(d[4]);
                $('#work_no').val(d[5]);
                $('#time').val(d[6]);
                $('#trans_amt').val(d[7]);
                $('#igst_app').val(d[8]);
                
                //$('#pchallan_no').html(data)
            },
            
        });

        table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:false,
            lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            buttons: [],
            ajax: 
            {
                "url": "../../api/wholesale/fetch_dc_items_for_return_goods.php",
                "type": "POST",
                data : 
                {
                'dc_id' : dc_id
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
            {
                "targets": 0,
                "data": null,
                "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
            },
            ],
            destroy:true,
            /*"fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
            },*/
        });
    }
</script>                                    

<script>
    $(document).ready(function(){
        //$("#vehicle").prop("disabled", true);
        
        $('#add_purchase_order').on('click', function () {
        // Add table data to JS array
        var rawItemArray = [];
        var count=table.rows().count();
        var i=0;
        
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();
            var category =table.cell(i,1).nodes().to$().find('input').val();
            var item_id_fk =table.cell(i,14).nodes().to$().find('input').val();
            var size=table.cell(i,3).nodes().to$().find('input').val();
            var quantity =table.cell(i,4).nodes().to$().find('input').val();
            var return_quantity =table.cell(i,5).nodes().to$().find('input').val();
            var remain_quantity =table.cell(i,6).nodes().to$().find('input').val();
            var sqrft=table.cell(i,7).nodes().to$().find('input').val();
            var rate =table.cell(i,8).nodes().to$().find('input').val();
            var discount_per=table.cell(i,9).nodes().to$().find('input').val();
            var discount_rs =table.cell(i,10).nodes().to$().find('input').val();
            var amount=table.cell(i,11).nodes().to$().find('input').val();
            var return_amount=table.cell(i,12).nodes().to$().find('input').val();
            var remark=table.cell(i,13).nodes().to$().find('input').val();
            var gst_per=table.cell(i,15).nodes().to$().find('input').val();
            var cgst_amt=table.cell(i,16).nodes().to$().find('input').val();
            var sgst_amt=table.cell(i,17).nodes().to$().find('input').val();
            var igst_amt=table.cell(i,18).nodes().to$().find('input').val();
            var dc_id=table.cell(i,19).nodes().to$().find('input').val();
            


            rawItemArray.push({
                product_category : category,
                item_id_fk_s : item_id_fk,
                size:size,  
                quantity:quantity,
                return_quantity:return_quantity,
                remain_quantity:remain_quantity,
                sqrft:sqrft,
                rate:rate,
                discount_per:discount_per,
                discount_rs:discount_rs,
                amount:amount,
                return_amount:return_amount,
                remark:remark,
                gst_per:gst_per,
                cgst_amt:cgst_amt,
                sgst_amt:sgst_amt,
                igst_amt:igst_amt,
                dc_id:dc_id
            });
            i++;
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

        //get id for vallidation
        var customer = document.getElementById("customer").value;
        var pchallan_no = document.getElementById("pchallan_no").value;
        var gross_amt = document.getElementById("gross_amt").value;
        var total_cal = document.getElementById("total_cal").value;
        var tax_per_cal = document.getElementById("tax_per_cal").value;
        var tax_amt_cal = document.getElementById("tax_amt_cal").value;
        var quantity = document.getElementById("quantity").value;
        var tot_sqrft1 = document.getElementById("tot_sqrft1").value;
        var process_amt1 = document.getElementById("process_amt1").value;
        var disc_per = document.getElementById("disc_").value;
        var discount_rs = document.getElementById("discount").value;
        var other = document.getElementById("oth").value;
        var net_amt_cal = document.getElementById("net_amt_cal").value;

        if(customer !="" && pchallan_no!="" && net_amt_cal!="" )
        {
            //alert("all correct");
            $.ajax(
            {
                
                url: "../../api/wholesale/add_wholesale_return_good.php",
                type: 'POST',
                data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray ,
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Wholesale Return Good Added',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_return_good.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
                        //window.location.href="view_wholesale_delivery_challan.php";
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid Details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 10000,
                            icon: 'error'
                        })
                         //   alert("Please Enter Valid Details");
                    }
                
                },
            });
        }
        else
        {
            //alert("not correct");
            if(customer=="")
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
            if(work_no_select=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Sales order No Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(bill_date=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Bill Date Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(net_amt=="0")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Please Check Net Amount',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            
            if(gross_amt=="0")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Gross Amount Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            
        }

        }); 
    });
</script>