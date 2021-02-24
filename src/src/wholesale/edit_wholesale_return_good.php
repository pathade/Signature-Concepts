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
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Wholesale Return Goods</h4>
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
                                        	<label class="col-md-3 label-control" for="userinput1">Return No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="return_no" class="form-control " placeholder="" name="return_no" readonly value="" >
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
                                            <label class="col-md-3 label-control" for="userinput1">Customer</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                <option value="" disabled selected>Select </option>
                                               
												</select>
                                            </div>
				                        </div>
				                    </div>
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Challan No</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="pchallan_no" name="pchallan_no" class="select2" data-toggle="select2" >
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
                                                <select class="form-control" id="prepared_by" name="prepared_by" readonly >
                                                    <option value="" disabled selected>Select </option>
												</select>
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
                                                <select class="form-control" id="stock_point" name="stock_point" readonly>
                                                    <option value="" disabled selected>Select </option>
												</select>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Trans. Amt.</label>
				                        	<div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="0" id="trans_amt" name="trans_amt" />
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
                                                    <div class="form-group row">
                                                        
                                                    <div class="table-responsive">
                                                             <table class="border-bottom-0 table table-hover" id="tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Length </th>
                                                                        <th>Breath</th>
                                                                        <th>Qty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Sqrft&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Rate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Dis Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Process</th>
                                                                        <th>Process Amt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>BillDiscPer &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>BillDiscAmt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>TaxPer &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>TaxAmt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>NetAmt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Oct Trn Char &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Italian Sqrft &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Italian Sides &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Gst % &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>CGSTAmt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>SGSTAmt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>IGSTAmt &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>CESSPer &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>CESSAmt &nbsp;&nbsp;&nbsp;</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>   
                                                                            <select class="form-control" id="item_id0"  onchange="get_item(this.id)" >
                                                                            <option value="" disabled selected>Select Item </option>
                                                                            <?php

                                                                            echo  $sql = "SELECT item_id_pk,final_product_code FROM mstr_item";
                                                                            $result = mysqli_query($db,$sql);
                                                                            while($row = mysqli_fetch_array($result))
                                                                            {   
                                                                                ?>
                                                                                <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select class=" form-control block" id="type0">
                                                                                <option value="" disabled selected>Select Type</option>
                                                                                <option value="8">8.Qty(Pcs)</option>
                                                                                <option value="12">12.Boxes qty</option>
                                                                                <option value="13">13.ML</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><input type="text" id="length0" class="form-control" value="0" onkeyup="get_quantity_value(this.id);"/></td>
                                                                        <td><input type="text" id="breath0" class="form-control" value="0"/></td>                                                                        
                                                                        <td><input type="text" class="form-control" id="qty0" value="0"  onkeyup="get_row_discount_value1(this.id);">
                                                                        </td>
                                                                        <td><input type="text" class="form-control" id="sqrft0" value="0" onkeyup="get_row_discount_value(this.id);">
                                                                        </td>
                                                                        <td><input type="text" id="rate0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="amount0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="discount0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="discamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="total0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="process0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="proamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="billdiscper0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="billdiscamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="taxper0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="taxamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="netamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="octtrnchr0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="italiansqrft0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="italianside0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="gst0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="cgstamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="sgstamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="igstamt0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="cessper0" class="form-control" value="0" /></td>
                                                                        <td><input type="text" id="cessamt0" class="form-control" value="0" /></td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add Row</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 mt-1">
                                                            <label class="label-control" for="userinput1" >Gross Amt</label>
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
												            <input type="text" class="form-control"  placeholder="0" name="oth" id="oth" style="height: calc(2.75rem + -6px);" />
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
                                                            <label class="label-control" for="userinput1" ><b>Net Amount</b></label>
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
  
  document.getElementById("supplier_name_error").style.display = "none";
  document.getElementById("supplier_address_error").style.display = "none";
  document.getElementById("phone_no1_error").style.display = "none";
  document.getElementById("phone_no2_error").style.display = "none";
  document.getElementById("contact_person_error").style.display = "none";
  document.getElementById("pan_error").style.display = "none";
  document.getElementById("gst_no_error").style.display = "none";
  ///////////////////////////
});


	
</script>


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

                                     for(var i=0;i<count;i++)
                                    {
                                        
                                        var tbl4=table.cell(i,6).nodes().to$().find('input').val()
                              
                                        var amount= parseInt(amount) +parseInt(tbl4);

                                        var tbl5=table.cell(i,5).nodes().to$().find('input').val()
                              
                                        var discount= parseInt(discount) +parseInt(tbl5);
                                    
                                    
                                    }

                                  
                                  
                                    },1000
                                    );
                                });


                                
                                          function get_item(e) {
                                      
                                      var id=document.getElementById(e).value;
                                     
                                     
                                     var get_id= e.slice(e.length - 1);
                                  
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
                                            function get_row_discount_value(e) {

                                            var get_id= e.slice(e.length - 1);



                                                var table_discount=document.getElementById(e).value;
                                                
                                                var quantity = "quantity".concat(get_id);
                                                var quantity_value=document.getElementById(quantity).value;
                                                var rate = "rate".concat(get_id);

                                                var rate=document.getElementById(rate).value;
                                                
                                                var amount_value=rate*quantity_value;
                                            
                                                var amount = "amount".concat(get_id);
                                         
                                                var disc_per=(table_discount/amount_value) * 100;
                              
                                                var disc_per= parseFloat(disc_per).toFixed(2)
                                                var table_discount_per = "table_discount_per".concat(get_id);
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
                                                 

                                                 function get_row_discount_value1(e) {

                                                var get_id= e.slice(e.length - 1);



                                                    var table_discount=document.getElementById(e).value;
                                                    
                                                    var quantity = "quantity".concat(get_id);
                                                    var quantity_value=document.getElementById(quantity).value;
                                                    var rate = "rate".concat(get_id);

                                                    var rate=document.getElementById(rate).value;
                                                    
                                                    var amount_value=rate*quantity_value;

                                                    var amount = "amount".concat(get_id);

                                                    
                                                    var disc_rs=parseFloat(table_discount)*parseFloat(amount_value)/100;

                                                    var disc_rs= parseFloat(disc_rs).toFixed(2)
                                                    var table_discount_rs = "table_discount_rs".concat(get_id);
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
                                                        
                                                        var get_id= e.slice(e.length - 1);
                                                        var quantity_value=document.getElementById(e).value;
                                                        var rate = "rate".concat(get_id);
                                                        var table_discount_rs="table_discount_rs".concat(get_id);
                                                        var rate=document.getElementById(rate).value;
                                                        var table_discount_rs_value=document.getElementById(table_discount_rs).value;
                                                        var amount_value=rate*quantity_value;
                                                        var amount="amount".concat(get_id);
                                                        $('#'+amount).val(amount_value);
                                                        
                                                        var count=table.rows().count();
                                                        // var disc_per=(table_discount_rs_value/amount_value) * 100;
                                                        // var disc_per= parseFloat(disc_per).toFixed(2);
                                                        var table_discount_per = "table_discount_per".concat(get_id);
                                                        document.getElementById(table_discount_per).value=0;
                                                        var table_discount_rs = "table_discount_rs".concat(get_id);
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
                                    