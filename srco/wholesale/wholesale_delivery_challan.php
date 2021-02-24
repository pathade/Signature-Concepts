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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Wholesale Delivery Challan</h4>
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
                                <div class="row">
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <?php
                                                $sql1 = "SELECT * FROM mstr_data_series where name='wholesale_delivery_challan'";
                                                $result = mysqli_query($db,$sql1);
                                                $row6 = mysqli_fetch_array($result);
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Challan No.</label>
				                        	<div class="col-md-4">
												<input type="text" id="challan_no" class="form-control " placeholder="" name="challan_no" value="<?php echo date('y', strtotime('-1 year')).'-'.date('y').'/'.$row6['2']; ?>" readonly="">
											</div>
											<!-- <label class="col-md-0 label-control" for="userinput1"></label> -->
				                        	<div class="col-md-5">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>" readonly="">
											</div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onChange="customer_select(this.id);">
                                                <option value="" disabled selected>Select Customer </option>
                                                <?php

                                                    //$sql = "SELECT * FROM tbl_wholesale_customer";
                                                    $sql = "SELECT Distinct cust_id_fk,cust_name  FROM wholesale_work_order as wo,tbl_wholesale_customer as c 
                                                            where c.wc_id_pk = wo.cust_id_fk ";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row['cust_id_fk'];?>"><?php echo  $row['cust_name']?></option>
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
				                        	<label class="col-md-3 label-control" for="userinput1">Work No. <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select name="work_no_select" id="work_no_select" onchange="select_work_no();" class="form-control">
                                                <option  disabled selected>Select Work No</option>
                                                    <?php 
                                                        // $work_sql = "SELECT * FROM wholesale_work_order order by work_order_id DESC";
                                                        // $work_res = mysqli_query($db,$work_sql);
                                                        // while($work_row = mysqli_fetch_array($work_res))
                                                        // {
                                                            ?>
                                                            <option value="<?php //echo $work_row['work_order_id'];?>"><?php// echo $work_row['work_no'];?></option>
                                                            <?php
                                                        // }
                                                    ?>
                                                </select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" readonly="" class="form-control " placeholder="0" name="mobile_no" >
                                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Address" name="address" id="address" />
											</div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Branch <span style="color:red;">*</span> </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch123" >
                                                    <option value="NKS Aromas" selscted>NKS Aromas</option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Prepared By <span style="color:red;">*</span> </label>
				                        	<div class="col-md-9">
												<!-- <input type="text" class="form-control" value="" id="preapared_by" name="prepared_by"> -->
                                                <select class="form-control" id="preapared_by" name="prepared_by">
                                                        <?php
                                                            $show_emp = "SELECT * FROM mstr_employee";
                                                            $res_emp = mysqli_query($db, $show_emp) or die(mysqli_error($db));
                                                            while($row1=mysqli_fetch_row($res_emp))
                                                                echo '<option>'.$row1[1].'</option>';
                                                        ?>
                                                </select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Transporter & Vehicle <span style="color:red;">*</span></label>
				                        	<div class="col-md-5">
                                                <select class="select2 form-control block js-example-tags" id="transporter" class="select2" data-toggle="select2" name="transporter" onchange="select_transporter();">
                                                    <option value="" disabled selected>Select Transporter</option>
                                                    <?php
                                                        $sql = "SELECT * FROM mstr_transporter";
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
				                        	<div class="col-md-4">
                                                <select class="select2 form-control block js-example-tags" id="vehicle" class="select2" data-toggle="select2" name="vehicle_select">
                                                    <!-- <option value="" >Select Vehicle</option> -->
                                                    <?php
                                                        // $sql = "SELECT * FROM mstr_transporter";
                                                        // $result = mysqli_query($db,$sql);
                                                        // while($row = mysqli_fetch_array($result))
                                                        // {   
                                                            ?>
                                                            <!-- <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option> -->
                                                            <?php
                                                       // }
                                                    ?>
												</select>
											</div>
			                       		</div>
									</div>
		                        </div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Site</label>
                                                <div class="col-md-9">
                                                <select class="select2 form-control block" id="customer_site" class="select2" data-toggle="select2" name="customer_site" onChange="site_select();">
                                                    <option value="" disabled selected>Select Customer Site</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="display:none;">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">PO No & Time</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="pono" id="pono">
                                                </div>
                                                <!-- <label class="col-md-2 label-control" for="userinput1">Time</label> -->
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="time" id="time">
                                                </div>
                                            </div>
                                        </div>
								</div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Site Address</label>
                                                <div class="col-md-9">
                                                <textarea class="form-control" name="site_add" id="site_add"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Stock Point</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="stock_point" id="stock_point" value="Signature Concepts">
                                                </div>
                                                <!-- <label class="col-md-2 label-control" for="userinput1">Time</label> -->
                                                <div class="col-md-4">
                                                    <span style="color:red;font-weight: bolder;" id="ledger_bal">Ledger Balance:</span>
                                                    
                                                </div>
                                            </div>
                                        </div>
								</div>
							</div>
                            <div class="row mt-1" >
                                <div class="col-md-12">
                                    <!-- <div class="form-group row"> -->
                                        <!-- <div class="table-responsive"> -->
                                        <div class="table-responsive">
                                        <table class="display" id="tbl" style="width: 100%;font-size: smaller;">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>PRODUCT CATEGORY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>PRODUCT DESIGN &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Size &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Actual Qty &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>QUANTITY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Sqrft &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>RATE &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT %&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT Rs&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>REMARK&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th style="display:none;">HIdden&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th style="display:none;">HIdden qty&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>hidden work order item id&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PROCESS AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>SUPPLIER&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <!-- <th>PONO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        <!-- </div>
                                                       
                                                    </div> -->
                                        <!-- </div>        -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add another line</button>
                                </div>
                            </div> -->
                        </div>
                    
                                            <!-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-5">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-6">
                                                        <div class="card" style="background: #fbfafa;">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-9 label-control" for="userinput1" style="font-size: 18px;">Subtotal</label>
                                                                    <div class="col-md-3">
                                                                    <input type="text" class="form-control " placeholder="" name="total" id="total" value="0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" id="discount_row_hide">
                                                                    <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Discount</label>
                                                                    <div class="col-md-5">
                                                                  
                                                                   </div>
                                                                        
                                                                     
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="discount_final" id="discount_final" value="" readonly>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-group row">
                                                                <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Other +/-</label>
                                                                  
                                                                    <div class="col-md-5">
                                                                        
                                                                    </div>
                                                                 
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="adjustment_final" id="adjustment_final" value="0" onkeyup='get_final_amount(this.value);' >
                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="form-group row">
                                                                <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Process Amount</label>
                                                                  
                                                                    <div class="col-md-5">
                                                                        
                                                                    </div>
                                                                 
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="process_amount" id="process_amount" value="0" onkeyup='get_final_amount(this.value);' >
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-9 ">
                                                                        <b style="font-size: 22px;">Total</b>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="final_total" id="final_total" value="" readonly>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <hr>
                                            <div class="row" style="margin: 0">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Quantity <span style="color:red;">*</span></b></label>
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
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Discount</b></label>
                                                            <input type="text" class="form-control" value="0" id="discount_final" name="discount_final" readonly="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class=" label-control" for="userinput1"><b>Other(+/-)</b></label>
                                                            <input type="text" class="form-control" value="0" id="adjustment_final" name="adjustment_final" onkeyup='get_final_amount(this.value);' >
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Pro Amt.</b></label>
                                                            <input type="text" class="form-control" value="0" id="process_amount" name="process_amount" onkeyup='get_final_amount(this.value);'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin: 0">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt <span style="color:red;">*</span></b></label>
                                                            <input type="text" class="form-control" value="0" id="final_total" name="final_total" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
	                        <div class="form-actions right">
								
								<button type="button" name="add_work_order" class="btn btn-primary" id="add_delivery_challan" >
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
	</div>
</form>
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>

<script>
    var table="";
    var i=1;
    function get_new_line() {
          
        <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
        $result = mysqli_query($db,$sql);?>
        var item="<select class='form-control block'  id='item_id-"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
        var account="<select class=' form-control block' id='account-"+i+"'  ><option value='' disabled selected>Select Account</option><option value='Advance Tax'>Advance Tax</option><option value='Employee'>Employee</option><option value='Prepaid Expenses'>Prepaid Expenses</option><option value='TDS Receivable'>TDS Receivable</optio</select>"
        var quantity="<input type='text' id='quantity-"+i+"' class='form-control' value='1.00' onkeyup='get_quantity_value(this.id);'>"
        var rate= "<input type='text' id='rate-"+i+"' class='form-control' value='0.00' readonly>"
        var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per-"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';></div>";
        var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs-"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
        var amount="<input type='text' id='amount-"+i+"' class='form-control' value='0.00'>";
        var length="<input type='text' id='length-"+i+"' class='form-control' value='0.00' />";
        var breath="<input type='text' id='breath-"+i+"' class='form-control' value='0.00' />";
        var sqrft="<input type='text' id='sqrft-"+i+"' class='form-control' value='0.00' />";
                                    
        table.row.add( [

            item,
            account,  
            quantity,
            length,
            breath,
            sqrft,
            rate,
            discount_per ,
            discount_rs ,
            amount ,
        
            ] ).draw( false );

            i++; 
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
        
    //     <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
    //     $result = mysqli_query($db,$sql);?>
    //     var item="<select class='form-control block'  id='item_id-"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
    //     var account="<select class=' form-control block' id='account-"+i+"'  ><option value='' disabled selected>Select Account</option><option value='Advance Tax'>Advance Tax</option><option value='Employee'>Employee</option><option value='Prepaid Expenses'>Prepaid Expenses</option><option value='TDS Receivable'>TDS Receivable</optio</select>"
    //     var quantity="<input type='text' id='quantity-"+i+"' class='form-control' value='1.00' onkeyup='get_quantity_value(this.id);'>"
    //     var rate= "<input type='text' id='rate-"+i+"' class='form-control' value='0.00' readonly>"
    //     var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per-"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';></div>";
    //     var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs-"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
    //     var amount="<input type='text' id='amount-"+i+"' class='form-control' value='0.00'>";
    //     var length="<input type='text' id='length-"+i+"' class='form-control' value='0.00' />";
    //     var breath="<input type='text' id='breath-"+i+"' class='form-control' value='0.00' />";
    //     var sqrft="<input type='text' id='sqrft-"+i+"' class='form-control' value='0.00' />";
                                    
    //     table.row.add( [

    //         item,
    //         account,  
    //         quantity,
    //         length,
    //         breath,
    //         sqrft,
    //         rate,
    //         discount_per ,
    //         discount_rs ,
    //         amount ,
        
    //         ] ).draw( false );

    //         i++; 

    //     });
        
        // window.setInterval(function()
        // {
        //     var count=table.rows().count();


        //     var amount=0;
        //     var discount=0;
        //     var totalqty=0;
        //     var totalsqft = 0;
        //     var totaldisc = 0;
        //     var gross = 0;
        //     var tgross = 0;

        //     for(var i=0;i<count;i++)
        //     {
                
        //         var tblamt=table.cell(i,10).nodes().to$().find('input').val()
    
        //         var amount= parseInt(amount) +parseInt(tblamt);

        //         var tbldiscrs=table.cell(i,9).nodes().to$().find('input').val()
    
        //         var discount= parseInt(discount) +parseInt(tbldiscrs);
            
        //         var tblqty=table.cell(i,3).nodes().to$().find('input').val()
                
        //         var totalqty= parseInt(totalqty) +parseInt(tblqty);

        //         var tblsqrft=table.cell(i,6).nodes().to$().find('input').val()
    
        //         var totalsqft= parseFloat(totalsqft) +parseFloat(tblsqrft);

        //         var tbldiscper=table.cell(i,8).nodes().to$().find('input').val()
    
        //         var totaldisc= parseFloat( totaldisc) +parseFloat(tbldiscper);

        //         var q = table.cell(i,3).nodes().to$().find('input').val();
        //         var r =  table.cell(i,7).nodes().to$().find('input').val();
        //         var gross = parseFloat(q) * parseFloat(r);
        //         var tgross= parseFloat( tgross) +parseFloat(gross);

        //     }

        
        //     document.getElementById('total').value=amount;
        //     document.getElementById('discount_final').value=discount;
        //     document.getElementById('total_qty').value=totalqty;
        //     //alert("total_qty:"+totalqty);
        //     document.getElementById('total_sqfit').value=totalsqft;
        //     document.getElementById('disc_percent').value=totaldisc;
        //     document.getElementById('gross_amt').value=tgross;
        //     // document.getElementById('final_total').value=amount;


        
        // },1000
        // );
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
        var rate = "rate-".concat(get_id);
        var quantity="quantity-".concat(get_id);
        //alert("qty:"+quantity);
        var quantity_value =document.getElementById(quantity).value;

        $('#'+rate).val(d[0]);
        var amount_value=d[0]*quantity_value;
        var amount="amount-".concat(get_id);
        $('#'+amount).val(amount_value);

        }
        });
    
    }  
    function gobal_calc()
    {
        var table1 = $('#tbl').dataTable();
        //Get the total rows
        var count=table1.fnGetData().length;
        //alert(table1.fnGetData().length);

            //var count=table.rows().count();
            //alert("count:"+count);

            var amount=0;
            var discount=0;
            var totalqty=0;
            var totalsqft = 0;
            var totaldisc = 0;
            var gross = 0;
            var tgross = 0;
            // var x =0;
            // var table="";

            for(var i=0;i<count;i++)
            {
                
                var tblamt=table.cell(i,10).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var tbldiscrs=table.cell(i,9).nodes().to$().find('input').val()
    
                var discount= parseInt(discount) +parseInt(tbldiscrs);
            
                var tblqty=table.cell(i,5).nodes().to$().find('input').val()
                
                var totalqty= parseInt(totalqty) +parseInt(tblqty);

                var tblsqrft=table.cell(i,6).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tblsqrft);

                var tbldiscper=table.cell(i,8).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldiscper);

                var q = table.cell(i,6).nodes().to$().find('input').val();
                var r =  table.cell(i,8).nodes().to$().find('input').val();
                var gross = parseFloat(q) * parseFloat(r);
                var tgross= parseFloat( tgross) +parseFloat(gross);

            }
            document.getElementById('total').value=amount;
            document.getElementById('final_total').value=amount;
            document.getElementById('discount_final').value=discount;
            document.getElementById('total_qty').value=totalqty;
            //alert("total_qty:"+totalqty);
            document.getElementById('total_sqfit').value=totalsqft;
            document.getElementById('disc_percent').value=totaldisc;
            document.getElementById('gross_amt').value=tgross;
            // document.getElementById('final_total').value=amount;
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
                gobal_calc();


            }
            function get_quantity_value(e) {
                //alert("e is:"+e);
                //var get_id= e.slice(e.length - 1);
                var get_id = e.split("-");
                var get_id = get_id[1];
                var quantity_value=document.getElementById(e).value;
                //alert("get id:"+get_id);
                var hidden_remain_qty = document.getElementById("hidden_remain_qty-"+get_id).value;
                //alert("Entered qty:"+quantity_value);
                //alert("hidden_remain_qty qty:"+hidden_remain_qty);
                var actual_qty = document.getElementById("actual_qty-"+get_id).value;
                //alert("actual_qty qty:"+actual_qty);

                if(parseInt(quantity_value)<=parseInt(hidden_remain_qty))
                {
                    //alert("hii");
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
                    gobal_calc ();
                }
                else
                {
                    //alert("byeee");
                    //alert("You cant enter quantity value grater than "+hidden_remain_qty+" for table row "+get_id);
                    $.toast({
                            heading: 'Error',
                            text: 'You cant enter quantity value grater than '+actual_qty+' for table row '+get_id,
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        setTimeout(() => 
                        {
                            //window.location.href="view_wholesale_delivery_challan.php";    
                        }, 5000);
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
                //gobal_calc();

            }                   
</script>
<script>
    $(document).ready(function(){
        //$("#vehicle").prop("disabled", true);
        
        $('#add_delivery_challan').on('click', function () {
        // Add table data to JS array
        var rawItemArray = [];
        var count=table.rows().count();
        var i=0;
        var vehicle_select = document.getElementById("vehicle").value;
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();
            var id =table.cell(i,0).nodes().to$().find('input').val();
            var category =table.cell(i,1).nodes().to$().find('input').val();
            var item_id_fk =table.cell(i,12).nodes().to$().find('input').val();
            var size=table.cell(i,3).nodes().to$().find('input').val();
            var quantity =table.cell(i,5).nodes().to$().find('input').val();
            var sqrft=table.cell(i,6).nodes().to$().find('input').val();
            var rate =table.cell(i,7).nodes().to$().find('input').val();
            var discount_per=table.cell(i,8).nodes().to$().find('input').val();
            var discount_rs =table.cell(i,9).nodes().to$().find('input').val();
            var amount=table.cell(i,10).nodes().to$().find('input').val();
            var remark=table.cell(i,11).nodes().to$().find('input').val();
            var total_qty=table.cell(i,13).nodes().to$().find('input').val();
            //alert("id is:"+id);


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
                total_qty:total_qty,
                work_order_item_id:id
            });
            i++;
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

        //get id for vallidation
        var customer = document.getElementById("customer").value;
        var preapared_by = document.getElementById("preapared_by").value;
        var transporter = document.getElementById("transporter").value;
        var vehicle = document.getElementById("vehicle").value;
        var customer_site = document.getElementById("customer_site").value;
        var total_qty = document.getElementById("total_qty").value;
        var total_sqfit = document.getElementById("total_sqfit").value;
        var gross_amt = document.getElementById("gross_amt").value;
        var total = document.getElementById("total").value;
        var disc_percent = document.getElementById("disc_percent").value;
        var discount_final = document.getElementById("discount_final").value;
        var adjustment_final = document.getElementById("adjustment_final").value;
        var process_amount = document.getElementById("process_amount").value;
        var final_total = document.getElementById("final_total").value;

        if(customer !="" && preapared_by!="" && transporter!="" && 
        vehicle!="" && total_qty!="" && total_sqfit!="" && gross_amt!="" 
        && total!="" && disc_percent!="" && adjustment_final!="" && process_amount!=""
        && final_total!="")
        {
           // alert("all correct");
            $.ajax(
            {
                
                url: "../../api/wholesale/add_wholesale_delivery_challan_new.php",
                type: 'POST',
                data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&vehicle_select='+vehicle_select,
                dataType:'text',  
                success: function(data)
                { 
                    //alert("dat is:"+data);
                    console.log(data);
                    data = data.trim();
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Wholesale Delivery Challan Added',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_delivery_challan.php";    
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
            if(preapared_by=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Prepared By Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(transporter=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Transporter Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(vehicle=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Vehicle Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(total_qty==0)
            {
                $.toast({
                	heading: 'Error',
                	text: 'Total Quantity Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(total_sqfit=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Total Squarefit Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(gross_amt=="")
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
            if(total=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Total Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(disc_percent=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Discount Percent Required',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 10000,
                	icon: 'error'
                })
            }
            if(final_total==0)
            {
                $.toast({
                	heading: 'Error',
                	text: 'Net Amount Cant be 0',
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
<script>
    //Script fot fetching customer site details
    function customer_select(id)
    {
        var cust_id = document.getElementById('customer').value;
        $.ajax(
                {

                url: "../../api/wholesale/fetch_work_order_no_for_dc.php",
                type: 'POST',
                data : 
                {
                    'cust_id' : cust_id,
                },
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    $('#work_no_select').html(data);
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
                    $('#address').val(d[0]);//site_address
                    $('#des').val(d[1]);      //site Des
                },
                
                });
    }
</script>
<script>
    function select_work_no()
    {
        var selected_work_no =  document.getElementById('work_no_select').value;
        //alert("selected_work_no:"+selected_work_no);
        $.ajax({
        type: "POST",
        url: '../../api/wholesale/fetch_work_order_for_DC.php',
        data: "selected_work_no="+selected_work_no ,
        success: function(data)
        { 
            console.log(data);
            var d = data.split("#");
            $('#customer').html(d[4]);
            $('#mobile_no').val(d[20]);
            $('#address').val(d[21]);
            $('#customer_site').html(d[4]);
            $('#pono').val(d[3]);
            $('#time').val(d[24]);
            $('#site_add').val(d[25]);
            $('#transporter').html(d[7]);
            $('#vehicle').html(d[26]);
            //alert("v is:"+d[26]);
            document.getElementById("ledger_bal").textContent=d[27];
            // $('#total_qty').val(d[8]);
            // $('#total_sqfit').val(d[9]);
            // $('#gross_amt').val(d[10]);
            // $('#total').val(d[11]);
            // $('#disc_percent').val(d[12]);
            // $('#discount_final').val(d[13]);
            // $('#adjustment_final').val(d[14]);
            // $('#process_amount').val(d[15]);
            // $('#final_total').val(d[16]);
            

        }
        });
        //var edit_id='<?php //echo $edit_id; ?>';
        //var x =0;
        //var table="";
        table = $('#tbl').DataTable( {  
            dom: 'Bfrtip',
            searching:false,
            ajax: 
            {
                "url": "../../api/wholesale/fetch_wholesale_work_order_items_for_dc_new.php",
                "type": "POST",
                data : 
                {
                'edit_id' : selected_work_no
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
            [ 
            //   {
            //   "targets": 1,
            //   "data": null,
            //   "defaultContent": "<button type=\"button\" name=\"edit\" class=\"btn btn-success btn-sm\"><i class='fa fa-pencil' aria-hidden='true'></i></button>"
            //   },
            {
                // "targets": 0,
                // "data": null,
                // "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
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
$(".js-example-tags").select2({
  tags: true
});
</script>
<script>
    function select_transporter()
    {
        //alert("transport clicked");
        var trans = document.getElementById("transporter").value;
        //alert("trans is:"+trans);
        if(trans !="")
        {
            if(isNaN(trans))
            {
                //document.write(str1 + " is not a number <br/>");
                //its not a number
            }
            else
            {
                //its a number
                //document.write(str1 + " is a number <br/>");
                $.ajax({
                    type: "POST",
                    url: '../../api/wholesale/fetch_vehicle.php',
                    data: "transporter_id="+trans ,
                    success: function(data)
                    {
                        $('#vehicle').html(data);
                    }
                });
            }
            $("#vehicle").prop("disabled", false);
        }
        else
        {
            $("#vehicle").prop("disabled", true);  
        }
    }
</script>
<!-- <script>
$('.js-example-tags').select2({
  dropdownCssClass: "custom-dropdown"
}).on("select2:open", function (e) {
  var self = $(this);
  self.on('keyup', function(){
    console.log(self.val());
    console.log('fru');
  })
});
 
$(document).on('keydown', '.custom-dropdown .select2-search__field', function (ev) {
  var self = $(this);
  if( self.val().length > 5) {
    console.log(self.val());
  }
});
</script> -->