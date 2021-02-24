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

.dc_box {
    height: 150px;
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
	
<form method="post" id="form1" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Wholesale Tax Invoice</h4>
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
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Fin. Yr.</label>
                                                    <?php
                                                        if (date('m') > 6) {
                                                            $year = date('Y')."-".(date('Y') +1);
                                                        }
                                                        else {
                                                            $year = (date('Y')-1)."-".date('Y');
                                                        }
                                                        //echo $year; // 2015-2016
                                                    ?>

                                                    <div class="col-md-9">
                                                        <input type="year" id="fin_yr" class="form-control " placeholder="" name="fin_yr" value="<?php echo $year; ?>">
                                                    </div>											
                                                </div>
                                            </div>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">SO Id <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="work_no_select" class="form-control " placeholder="0" name="wo_id">
                                                        <!-- <select id="work_no_select" name="work_no_select" class="form-control"> 
                                                            <option></option>
                                                        </select> -->
                                                        <input type="hidden" id="work_no_select_hidden" name="work_no_select_hidden" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                $sql1 = "SELECT * FROM mstr_data_series where name='wholesale_tax_invoice'";
                                                $result = mysqli_query($db,$sql1);
                                                $row6 = mysqli_fetch_array($result);
                                                ?>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Tax Inv No.</label>
                                                    <div class="col-md-9">
                                                        <input type="number" id="tax_inv_no" class="form-control " name="tax_inv_no" value="<?php echo $row6['sr_no']; ?>" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bill Date</label>
                                                    <div class="col-md-9">
                                                        <input type="date" id="bill_date" class="form-control " name="bill_date" value="<?php echo date('Y-m-d');?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Site</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="site" class="form-control " name="site" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Vehicle No</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="vehicle_no" class="form-control " name="vehicle_no" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Transporter</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="transporter" class="form-control " name="transporter" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1">Remarks</label>
                                                    <div class="col-md-10 divcol">
                                                        <input type="text" id="remark" class="form-control " name="remark">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1">Billing Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="billing_name" class="form-control " name="billing_name" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onChange="customer_select(this.id);">
                                                    <option value="" disabled selected>Select Customer </option>
                                                    <?php
                                                        $sql = "SELECT DISTINCT cust_id_fk FROM wholesale_delivery_challan WHERE tax_invoice_status='0'";
                                                        $g = mysqli_query($db,$sql);
                                                        while($h = mysqli_fetch_array($g))
                                                        {
                                                            $cust_id_fk = $h['cust_id_fk'];
                                                            $f = "SELECt wc_id_pk,cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='$cust_id_fk'";
                                                            $k = mysqli_query($db,$f);
                                                            while($kg = mysqli_fetch_array($k))
                                                            {
                                                                $wc_id_pk = $kg['wc_id_pk'];
                                                        ?>
                                                        <option value="<?php echo $wc_id_pk;?>"><?php echo $kg['cust_name'];?></option>
                                                        <?php 
                                                            } 
                                                        }
                                                    ?>
												</select>
                                            </div>										
                                        </div>
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">DC No.</label>
				                        	<div class="col-md-9">
                                                <div id="dc_no" class="dc_box" name="dc_no" >
                                                    <!-- <input type="checkbox" id="tax_inv_no1" name="tax_inv_no1">&nbsp; CH/20-21/SC/205 -->
                                                </div>
                                                <!-- <button class="btn btn-success" id="show_dc_items" onclick="show_dc_items();">Show</button> -->
                                                <button type="button" name="add_purchase_order" class="btn btn-primary" id="show_dc_item" onclick="show_data();">
                                                    <i class="fa fa-check-square-o"></i> Show
                                                </button>
                                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
                            <br />
                            <div class="row mt-1">
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
                                                                        <th>Sqrft </th>
                                                                        <th>RATE </th>
                                                                        <th>DISCOUNT %</th>
                                                                        <th>DISCOUNT Rs</th>
                                                                        <th>AMOUNT</th>
                                                                        <th>REMARK</th>
                                                                        <th></th>
                                                                        <th>GST %</th>
                                                                        <th>CGST AMT</th>
                                                                        <th>SGST AMT</th>
                                                                        <th>IGST AMT</th>
                                                                        <th></th>
                                                                        <!-- <th>PO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PROCESS AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>SUPPLIER&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PONO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <!-- <tbody>
                                                                    <tr>
                                                                        <td>   
                                                                            <select class="form-control" id="category-0"  onchange="get_category(this.id)" >
                                                                                <option value="" disabled selected>Select Catergory </option>
                                                                                <?php
                                                                                    // echo  $sql = "SELECT item_id_pk,item_type FROM mstr_item";
                                                                                    // $result = mysqli_query($db,$sql);
                                                                                    // while($row = mysqli_fetch_array($result))
                                                                                    // {   
                                                                                ?>
                                                                                <option value="<?php  echo $row['1'];?>"><?php echo  $row['1']?></option>
                                                                                <?php //} ?>
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
                                                                        <td><input type="text" id="size-0" class="form-control" value="0.00" /></td>
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
                                                                        <td><input type="text" id="amount-0" class="form-control" value="0.00" /></td>
                                                                        <td><input type="text" id="remark-0" class="form-control" value="" /></td>

                                                                        <td><input type="text" id="poprocess-0" class="form-control" value=""/></td>
                                                                        <td>
                                                                            <input type="checkbox" name="po_yes" value="po_yes" id="myCheck-0" onclick="myFunction(this.id)">
                                                                        </td>
                                                                        <td><input type="text" id="poamt-0" class="form-control" value="0.00" /></td>
                                                                        <td>
                                                                            <select class="form-control" id="posupplier-0" >
                                                                            <option value=""><?php echo "Select Supplier";?></option>
                                                                            <?php 
                                                                                $sup_sql = "SELECT * FROM mstr_supplier order BY supplier_id_fk DESC";
                                                                                $sres = mysqli_query($db,$sup_sql);
                                                                                while($srw = mysqli_fetch_array($sres))
                                                                                {
                                                                            ?>
                                                                                <option value="<?php echo $srw['supplier_id_fk'];?>"><?php echo $srw['name'];?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        <td> 
                                                                            <?php 
                                                                                $fetch_sql = "SELECT * FROM mstr_data_series WHERE name='purchase_order'";
                                                                                $fetch_res = mysqli_query($db,$fetch_sql);
                                                                                while($frw = mysqli_fetch_array($fetch_res))
                                                                                {
                                                                                    $sr = $frw['sr_no'];
                                                                                    $fsr = $sr + 1;
                                                                                }
                                                                            ?>
                                                                            <input type="text" id="pono-0" class="form-control" value="PO-<?php echo $fsr;?>"/>
                                                                        </td>
                                                                    </tr>
                                                                </tbody> -->
                                                            </table>
                                                        </div>
                                                       
                                                    <!-- </div> -->
                                                    <!-- <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add Row</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12 right-border">
                                                    <div class="form-group row">
                                                        <div class="col-md-1">
                                                            <label class="label-control" for="userinput1" >Disc Amt.</label>
												            <input type="text" class="form-control"  placeholder="0" name="final_disc_amt" id="final_disc_amt" style="" readonly value="0"/>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="label-control" for="userinput1" >Other Disc.</label>
												            <input type="text" class="form-control"  placeholder="0" name="other_disc_amt" id="other_disc_amt" value="0"/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Transportation Amt.</label>&nbsp;
												            <input type="text" class="form-control" value="0"  placeholder="0" name="final_trans_amt" id="final_trans_amt" style="" onkeyup="trans_amt()"/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Load /Unload</label>&nbsp;
												            <input type="text" class="form-control" value="0"   placeholder="0" name="load_unload" id="load_unload" style="" onkeyup="trans_amt()"/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Others +/-</label>&nbsp;
												            <input type="text" class="form-control" value="0"  placeholder="0" name="other" id="other" style="" onkeyup="trans_amt()"/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <!--height: calc(2.75rem + -6px);-->
                                                            <label class="label-control" for="userinput1" >Gross Amount <span style="color:red;">*</span></label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="gross_amt" id="gross_amt" style="" readonly/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Tax Amount</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="tax_amt" id="tax_amt" style="" readonly value="0">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 right-border">
                                                    <div class="form-group row">
                                                        <div class="col-md-10">
                                                            <!-- <label class="label-control" for="userinput1" >Disc Amt.</label>
												            <input type="text" class="form-control"  placeholder="0" name="final_disc_amt" id="final_disc_amt" style="" readonly/> -->
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Net Amount</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="net_amt" id="net_amt" style="" readonly/>
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
  window.setInterval(function()
        {
            var count=table.rows().count();


            var amount=0;
            var discount_rs=0;
            var totalqty=0;
            var totalsqft = 0;
            var totaldisc = 0;
            var gross = 0;
            var tgross = 0;
            var ftotal_trans_amt = 0;

            for(var i=0;i<count;i++)
            {
                
                var tblamt=table.cell(i,8).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var drs=table.cell(i,8).nodes().to$().find('input').val()
    
                var discount_rs= parseInt(discount_rs) +parseInt(drs);
            
                var tbl2=table.cell(i,3).nodes().to$().find('input').val()
    
                var totalqty= parseInt(totalqty) +parseInt(tbl2);

                var tbl89=table.cell(i,5).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tbl89);

                var tbldisc=table.cell(i,6).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldisc);

                var q = table.cell(i,4).nodes().to$().find('input').val();
                var r =  table.cell(i,6).nodes().to$().find('input').val();
                var gross = parseFloat(q) * parseFloat(r);
                var tgross= parseFloat( tgross) +parseFloat(gross);

                //gst_per 
                var gst_per = table.cell(i,12).nodes().to$().find('input').val();
                var famt = table.cell(i,9).nodes().to$().find('input').val();

                var ftotal_trans_amt = parseFloat(gst_per) * parseFloat(tgross);
                var ftotal_trans_amt = parseFloat(ftotal_trans_amt) / parseInt(100);



            }

        
            //document.getElementById('total').value=amount;
            document.getElementById('final_disc_amt').value=discount_rs;
            //document.getElementById('total_qty').value=totalqty;
            //document.getElementById('total_sqfit').value=totalsqft;
            //document.getElementById('disc_percent').value=totaldisc;
            document.getElementById('gross_amt').value=tgross;
            document.getElementById('tax_amt').value=ftotal_trans_amt;


        
        },1000
        );
});


	
</script>


                                <script>
                                var table="";

                                var i=1;
                                // $('#add_new_line').click(function() {
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
                                    var process ="<input type='text' id='process"+i+"' class='form-control' value='0' />";
                                    var pro_amt = "<input type='text' id='pro_amt"+i+"' class='form-control' value='0' />";
                                    var dtlid = "<input type='text' id='dtlid"+i+"' class='form-control' value='0' />";                                   
                                    var bill_dis = "<input type='text' id='billdis"+i+"' class='form-control' value='0' />";
                                    var tax_per = "<input type='text' id='taxper"+i+"' class='form-control' value='0' />";
                                    var tax_amt = "<input type='text' id='taxamt"+i+"' class='form-control' value='0' />";
                                    var net_amt = "<input type='text' id='netamt"+i+"' class='form-control' value='0' />";
                                    var italian_sqrft = "<input type='text' id='italiansqrft"+i+"' class='form-control' value='0' />";
                                    var italian_side = "<input type='text' id='italianside"+i+"' class='form-control' value='0' />";
                                    var po_update_qty = "<input type='text' id='opoupdateqty"+i+"' class='form-control' value='0' />";
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
                                        process,pro_amt,dtlid, bill_dis, tax_per,tax_amt,
                                        net_amt,italian_sqrft, italian_side, po_update_qty, gst, cgst_amt, sgst_amt, igst_amt, cess_per, cess_amt
                                        
                                    
                                        ] ).draw( false );

                                        i++; 
                                    };
                                // });
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

                                  
                                // var i=1;
                                // $('#add_new_line').click(function() {
                                    
                                //     <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
                                //     $result = mysqli_query($db,$sql);?>
                                //     var item="<select class='form-control block'  id='item_id"+i+"'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
                                //     var type="<select class=' form-control block' id='type"+i+"'  > <option value='' disabled selected>Select Type</option><option value=''>8.Qty(Pcs)</option><option value='12'>12.Boxes qty</option><option value='13'>13.ML</option></select>"
                                //     var length="<input type='text' id='length"+i+"' class='form-control' value='0' onkeyup='get_quantity_value(this.id);'>"
                                //     var breath= "<input type='text' id='breath"+i+"' class='form-control' value='0' >"
                                //     var qty="<input type='text' class='form-control' id='qty"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';>";
                                //     var sqrft="<input type='text' class='form-control' id='sqrft"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';>";
                                //     var rate="<input type='text' id='rate"+i+"' class='form-control' value='0'>";
                                //     var amount ="<input type='text' id='amount"+i+"' class='form-control' value='0' />";
                                //     var discount = "<input type='text' id='discount"+i+"' class='form-control' value='0' />";
                                //     var dis_amt = "<input type='text' id='discamt"+i+"' class='form-control' value='0' />";
                                //     var process ="<input type='text' id='process"+i+"' class='form-control' value='0' />";
                                //     var pro_amt = "<input type='text' id='pro_amt"+i+"' class='form-control' value='0' />";
                                //     var dtlid = "<input type='text' id='dtlid"+i+"' class='form-control' value='0' />";                                   
                                //     var bill_dis = "<input type='text' id='billdis"+i+"' class='form-control' value='0' />";
                                //     var tax_per = "<input type='text' id='taxper"+i+"' class='form-control' value='0' />";
                                //     var tax_amt = "<input type='text' id='taxamt"+i+"' class='form-control' value='0' />";
                                //     var net_amt = "<input type='text' id='netamt"+i+"' class='form-control' value='0' />";
                                //     var italian_sqrft = "<input type='text' id='italiansqrft"+i+"' class='form-control' value='0' />";
                                //     var italian_side = "<input type='text' id='italianside"+i+"' class='form-control' value='0' />";
                                //     var po_update_qty = "<input type='text' id='opoupdateqty"+i+"' class='form-control' value='0' />";
                                //     var gst ="<input type='text' id='gst"+i+"' class='form-control' value='0' />";
                                //     var cgst_amt = "<input type='text' id='cgstamt"+i+"' class='form-control' value='0' />";
                                //     var sgst_amt = "<input type='text' id='sgstamt"+i+"' class='form-control' value='0' />";
                                //     var igst_amt = "<input type='text' id='igstamt"+i+"' class='form-control' value='0' />";
                                //     var cess_per = "<input type='text' id='cessper"+i+"' class='form-control' value='0' />";
                                //     var cess_amt = "<input type='text' id='cessamt"+i+"' class='form-control' value='0' />";
                                //     table.row.add( [
  
                                //         item, type, length, breath,
                                //         qty,sqrft,rate, amount ,discount ,
                                //         dis_amt ,
                                //         process,pro_amt,dtlid, bill_dis, tax_per,tax_amt,
                                //         net_amt,italian_sqrft, italian_side, po_update_qty, gst, cgst_amt, sgst_amt, igst_amt, cess_per, cess_amt
                                        
                                    
                                //         ] ).draw( false );

                                //         i++; 

                                // });

                                  


                                    // window.setInterval(function()
                                    // {
                                    //     var count=table.rows().count();


                                    //     var amount=0;
                                    //     var discount=0;

                                    //  for(var i=0;i<count;i++)
                                    // {
                                        
                                    //     var tbl4=table.cell(i,6).nodes().to$().find('input').val()
                              
                                    //     var amount= parseInt(amount) +parseInt(tbl4);

                                    //     var tbl5=table.cell(i,5).nodes().to$().find('input').val()
                              
                                    //     var discount= parseInt(discount) +parseInt(tbl5);
                                    
                                    
                                    // }

                                  
                                    // document.getElementById('total').value=amount;
                                  
                                    // document.getElementById('discount_final').value=discount;
                                    // // document.getElementById('final_total').value=amount;


                                  
                                    // },1000
                                    //);
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


                                                        get_new_line();

                                                      
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
    //Script fot fetching customer site details
    function customer_select(id)
    {
        var cust_id = document.getElementById('customer').value;
        $.ajax(
                {

                url: "../../api/wholesale/fetch_work_order_no_for_tax_invoice.php",
                type: 'POST',
                data : 
                {
                    'cust_id' : cust_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    //alert("data:"+data);
                    $('#work_no_select').html(data);
                },
                
                });
    }
</script>
<script>
    //Script fot fetching customer site details
    function customer_select(id)
    {
        var cust_id = document.getElementById('customer').value;
        $.ajax(
                {

                url: "../../api/wholesale/fetch_work_dc_no_for_tax_invoice.php",
                type: 'POST',
                data : 
                {
                    'cust_id' : cust_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    //alert("data is:"+data);
                    $('#dc_no').html(data);
                },
                
                });
    }
    //var check_count = 0;
    sessionStorage.setItem("check_count", 0);

    function doalert(checkboxElem) 
    {
        //alert("hiii:"+checkboxElem);
        if($('#' + checkboxElem).is(":checked"))
        {
            //alert("checkkeeedd");
            var c = sessionStorage.getItem("check_count");
            var fina = parseInt(c)+parseInt(1);
            sessionStorage.setItem("check_count", fina);
            var dv = sessionStorage.getItem("check_count");
            //alert("checked:"+dv);

            var checked_val = document.getElementById(checkboxElem).value;
            //alert("checked_val :"+checked_val);

            $.ajax(
            {

                url: "../../api/wholesale/fetch_details_for_tax_invoice.php",
                type: 'POST',
                data : 
                {
                    'delevery_challan_id' : checked_val,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    //alert("data is:"+data);
                    //$('#dc_no').html(data);
                    var d = data.split("#");

                    $('#site').val(d[1]);
                    $('#vehicle_no').val(d[3]);
                    $('#transporter').val(d[2]);
                    $('#billing_name').val(d[0]);
                    $('#work_no_select').val(d[4]);
                    $('#work_no_select_hidden').val(d[5]);

                    
                    // $('#mobile_no').val(d[20]);
                    // $('#address').val(d[21]);
                    // $('#customer_site').html(d[4]);
                    // $('#pono').val(d[3]);
                    // $('#time').val(d[24]);
                },
            
            });

            
        }
        else
        {
            //alert("noooooooooooocheckkeeedd");
            var c = sessionStorage.getItem("check_count");
            var fina = parseInt(c)-parseInt(1);
            sessionStorage.setItem("check_count", fina);
            var dv = sessionStorage.getItem("check_count");
            //alert("not checked:"+dv);

        }
    }
    
    function show_data() 
    {
        var yourArray = [];
        //alert("hii");
        $("input:checkbox[name=dc]:checked").each(function(){
            
                yourArray.push($(this).val());
            
        });
        console.log("arr is:"+yourArray);

        var newRawItemArray = JSON.stringify(yourArray);
        console.log(newRawItemArray);

        /*$.ajax(
        {

            url: "../../api/wholesale/fetch_dc_items_for_tax_invoice.php",
            type: 'POST',
            data : 
            {
                'dc_id_array' : newRawItemArray,
            },
            dataType:'text',  
            success: function(data)
            { 
                console.log("reverse data is:"+data);
                // //alert("data is:"+data);
                // //$('#dc_no').html(data);
                // var d = data.split("#");

                // $('#site').val(d[1]);
                // $('#vehicle_no').val(d[3]);
                // $('#transporter').val(d[2]);
                // $('#billing_name').val(d[0]);
                // $('#work_no_select').val(d[4]);

                
                // // $('#mobile_no').val(d[20]); 
                // // $('#address').val(d[21]);
                // // $('#customer_site').html(d[4]);
                // // $('#pono').val(d[3]);
                // // $('#time').val(d[24]);
            },
        
        });*/

        table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:true,
            ajax: 
            {
                "url": "../../api/wholesale/fetch_dc_items_for_tax_invoice.php",
                "type": "POST",
                data : 
                {
                'dc_id_array' : newRawItemArray
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
                //alert("hii");
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
    function trans_amt()              
    {
        var trans_amt = document.getElementById("final_trans_amt").value;
        var gross_amt = document.getElementById("gross_amt").value;
        var tax_amt = document.getElementById("tax_amt").value;
        var load_unload = document.getElementById("load_unload").value;
        var other = document.getElementById("other").value;
        var other_disc_amt = document.getElementById("other_disc_amt").value;

        var net_amt = parseFloat(trans_amt) + parseFloat(gross_amt) + parseFloat(tax_amt) + parseFloat(load_unload) + parseFloat(other) + parseFloat(other_disc_amt) ;
        document.getElementById("net_amt").value = net_amt;
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
         var wo_id = document.getElementById("work_no_select_hidden").value;
        //alert("wo_id:"+wo_id); 
        
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();
            var category =table.cell(i,1).nodes().to$().find('input').val();
            var item_id_fk =table.cell(i,11).nodes().to$().find('input').val();
            var size=table.cell(i,3).nodes().to$().find('input').val();
            var quantity =table.cell(i,4).nodes().to$().find('input').val();
            var sqrft=table.cell(i,5).nodes().to$().find('input').val();
            var rate =table.cell(i,6).nodes().to$().find('input').val();
            var discount_per=table.cell(i,7).nodes().to$().find('input').val();
            var discount_rs =table.cell(i,8).nodes().to$().find('input').val();
            var amount=table.cell(i,9).nodes().to$().find('input').val();
            var remark=table.cell(i,10).nodes().to$().find('input').val();
            var gst_per=table.cell(i,12).nodes().to$().find('input').val();
            var cgst_amt=table.cell(i,13).nodes().to$().find('input').val();
            var sgst_amt=table.cell(i,14).nodes().to$().find('input').val();
            var igst_amt=table.cell(i,15).nodes().to$().find('input').val();
            var dc_id=table.cell(i,16).nodes().to$().find('input').val();
            


            rawItemArray.push({
                product_category : category,
                item_id_fk_s : item_id_fk,
                size:size,  
                quantity:quantity,
                sqrft:sqrft,
                rate:rate,
                discount_per:discount_per,
                discount_rs:discount_rs,
                amount:amount,
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
        var work_no_select = document.getElementById("work_no_select").value;
        var bill_date = document.getElementById("bill_date").value;
        var final_disc_amt = document.getElementById("final_disc_amt").value;
        var final_trans_amt = document.getElementById("final_trans_amt").value;
        var load_unload = document.getElementById("load_unload").value;
        var other = document.getElementById("other").value;
        var other_disc_amt = document.getElementById("other_disc_amt").value;
        var gross_amt = document.getElementById("gross_amt").value;
        var tax_amt = document.getElementById("tax_amt").value;
        var net_amt = document.getElementById("net_amt").value;
        
        if(customer !="" && work_no_select!="" && bill_date!="" && 
        final_disc_amt!="" && final_trans_amt!="" && load_unload!="" && other!="" 
        && gross_amt!="" && tax_amt!="" && net_amt!="0" ) 
        {
            //alert("all correct");
            $.ajax(
            {
                
                url: "../../api/wholesale/add_wholesale_tax_invoice.php",
                type: 'POST',
                data : $('#form1').serialize() + 
                "&newRawItemArray=" + newRawItemArray ,
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Wholesale Tax Invoice Added',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_tax_invoice.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
                        //window.location.href="view_wholesale_delivery_challan.php";
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Select Valid Details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                           // alert("Please Enter Valid Details");
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