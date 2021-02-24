<?php include('../../partials/header.php');?>
<?php
$edit_id = $_GET['id'];

///query for pushing  po order items into array
    // $po_sql = "SELECT wo.work_order_id,po.id as purchase_order_id,po.supplier_id_fk FROM `purchase_order` 
    // as po ,purchase_order_items as poi,wholesale_work_order as wo WHERE wo.work_order_id = po.work_no 
    // AND po.id = poi.purchase_order_id_fk AND wo.work_order_id = '$edit_id'";

    $po_sql = "SELECT max(po.id) FROM `purchase_order` as po ,purchase_order_items as poi,wholesale_work_order 
    as wo WHERE wo.work_order_id = po.work_no AND po.id = poi.purchase_order_id_fk AND wo.work_order_id = '$edit_id'";
    $previous_array = array();
    $po_res = mysqli_query($db,$po_sql);
    while($porw = mysqli_fetch_array($po_res))
    {
        // echo $purchase_order_id = $porw['purchase_order_id'];echo "\n";
        // echo $supplier_id_fk = $porw['supplier_id_fk'];echo "\n";
        // $previous_array['supplier_id']=$supplier_id_fk;
        // $previous_array['po_no_fetch']=$purchase_order_id;
        // //array_push($previous_array,)
        // print_r($previous_array);
        $max_po = $porw['max(po.id)'];
    }

    $sql = "SELECT * FROM mstr_data_series WHERE name='purchase_order'";
    $h = mysqli_query($db,$sql);
    while($hu = mysqli_fetch_array($h))
    {
        $max_po1 = $hu['sr_no'];
    }

    // echo "\n";
    // foreach($previous_array as $key => $value) 
    // {
    //     echo "$key is at $value";
    // }
    //print_r($previous_array);
    //foreach($previous_array as $key=>$val) echo "$key, $val; ";
    
    $sql_charges = "SELECT work_order_id,work_no,branch,pono,cust_id_fk,site_id_fk,remark,salesman_id_fk,transporter_id_fk,qty,sq_ft,gross_amt,total, 
    disc_per,disc_rs,other,process_amt , net_amt,cust_name ,site_name ,name ,wo.add_date,wc.mob_number,wc.office_address,wcsd.site_landline,wcsd.site_person_name
    FROM wholesale_work_order as wo,
        tbl_wholesale_customer as wc,tbl_wholesale_customer_site_details 
        as wcsd ,mstr_transporter as tr WHERE wo.cust_id_fk = wc.wc_id_pk AND 
        wo.site_id_fk = wcsd.site_id_pk AND wo.work_order_id='$edit_id' AND wo.transporter_id_fk = tr.t_id_pk ORDER BY wo.work_order_id DESC";
    $result_charges = mysqli_query($db, $sql_charges);
    while ($row=mysqli_fetch_array($result_charges))
    {
        $sales_id = $row['salesman_id_fk'];
        $sq = "SELECT * FROM mstr_employee WHERE emp_id_pk='$sales_id'";
        $j = mysqli_query($db,$sq);
        while($f = mysqli_fetch_array($j))
        {
            $sales_name = $f['emp_name'];
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Work Order</h4>
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

                                            $sql = "SELECT * FROM mstr_data_series where name='wholesale_work_order'";
                                            $result = mysqli_query($db,$sql);
                                            $row1 = mysqli_fetch_array($result);
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Work No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="work_no" class="form-control " placeholder="" name="work_no" value="<?php echo $row['work_no']; ?>" readonly="">
											</div>
											<label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="text" id="date" class="form-control " placeholder="" name="date" value="<?php echo $row['add_date']; ?>" readonly="">
											</div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Branch </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch123" >
                                                    <option value="<?php echo $row['branch']; ?>" selscted><?php echo $row['branch']; ?></option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">PO NO.</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php echo $row['pono']; ?>" placeholder="PO No." id="pono_final1" name="pono_final1">
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6" style="display:none;">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Length</label>
				                        	<div class="col-md-3">
												<input type="text" id="lenght" class="form-control " placeholder="" name="length" value="<?php echo $row['length']; ?>">
											</div>
											<label class="col-md-2 label-control" for="userinput1">Width</label>
				                        	<div class="col-md-4">
												<input type="text" id="width" class="form-control " placeholder="" name="width" value="<?php echo $row['width']; ?>">
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer1" onChange="customer_select(this.id);">
                                                <option value="<?php echo $row['cust_id_fk']; ?>" disabled selected><?php echo $row['cust_name']; ?> </option>
                                                <?php

                                                    $sql = "SELECT * FROM tbl_wholesale_customer";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row1 = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1']?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Site</label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="customer_site" class="select2" data-toggle="select2" name="customer_site1" onChange="site_select();">
                                                <option value="<?php echo $row['site_id_fk']; ?>" disabled selected><?php echo $row['site_name']; ?></option>
											</select>
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" readonly="" class="form-control " placeholder="0" name="mobile_no" value="<?php echo $row['mob_number']; ?>">
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <input type="text" readonly="" class="form-control"  placeholder="Address" name="address" id="address" value="<?php echo $row['office_address']; ?>"/>
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Remark</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Remark" name="remark" id="remark" value="<?php echo $row['remark']; ?>"/>
											</div>
			                       		</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Site Description</label>
				                        	<div class="col-md-9">
                                                <!-- <input type="text" class="form-control"  placeholder="Site Description" name="des" id="des" /> -->
                                                <textarea readonly="" style="height:120px;" type="text" class="form-control"  placeholder="Site Description" name="des" id="des" rows="10" cols="10"><?php echo "Site Landline: ".$row['site_landline']."\nSite Contact Person: ".$row['site_person_name']; ?></textarea>
											</div>
			                       		</div>
									</div>
		                        </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Salesman</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="salesman" class="select2" data-toggle="select2" name="salesman1">
                                                    <option value="<?php echo $row['salesman_id_fk']; ?>" disabled selected><?php echo $sales_name; ?> </option>
                                                    <?php
                                                        $sql = "SELECT * FROM tbl_wholesale_customer";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row9 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row9['0'];?>"><?php echo  $row9['1']?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
											</div>
			                       		</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Transporter</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="transporter" class="select2" data-toggle="select2" name="transporter1">
                                                    <option value="<?php echo $row['transporter_id_fk'] ?>" disabled selected ><?php echo $row['name'] ?></option>
                                                    <?php
                                                        $sql = "SELECT * FROM mstr_transporter";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row7 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row7['0'];?>"><?php echo  $row7['1']?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
											</div>
			                       		</div>
									</div>
		                        </div>
							</div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-1 label-control" for="userinput1">Product List</label>
                                        <div class="col-md-9">
                                            <select name="sel-03" id="sel-03" class="select2-original" multiple>
                                                <?php  
                                                    $edit_id = $_GET['id'];
                                                    $m = "SELECT * FROM mstr_item";
                                                    $k = mysqli_query($db,$m);
                                                    while($kl = mysqli_fetch_array($k))
                                                    {
                                                        $m1 = "SELECT * FROM wholesale_work_order_items WHERE work_order_no_id_fk='$edit_id'";
                                                        $k1 = mysqli_query($db,$m1) or die(mysqli_error($db));
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
                            
                                                    
                                                        
                                                    <div class="table-responsive">
                                                    <table class="border-bottom-0 table table-hover" id="tbl" >
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>PRODUCT CATEGORY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>PRODUCT DESIGN &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Size &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>QUANTITY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Sqrft &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>RATE &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT %&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT Rs&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>REMARK&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>PROCESS&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <th>PO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>PROCESS AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <th>SUPPLIER&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>PONO&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>hidden&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add another line</button>
                                                        </div>
                                                    </div>
                                                </div>
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                    <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Quantity</b></label>
                                                            <input type="text" class="form-control" value="0" id="total_qty" name="total_qty" readonly="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Sq.ft.</b></label>
                                                            <input type="text" class="form-control" value="0" id="total_sqfit" name="total_sqfit" readonly="">
                                                        </div>
                                                        <div class="col-md-2 d-none">
                                                            <label class=" label-control" for="userinput1"><b>Total</b></label>
                                                            <input type="text" class="form-control" value="0" id="total" name="total" readonly="">
                                                        </div>
                                                        <div class="col-md-1 d-none">
                                                            <label class=" label-control" for="userinput1"><b>Discount(%)</b></label>
                                                            <input type="text" class="form-control" value="0" id="disc_percent" name="disc_percent" readonly="">
                                                        </div>
                                                        <!--<div class="col-md-2" style="display: none">
                                                            <label class=" label-control" for="userinput1"><b>Pro Amt.</b></label>
                                                            <input type="text" class="form-control" value="0" id="process_amount" name="process_amount" onkeyup='get_final_amount(this.value);'>
                                                        </div> -->

                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Gross Amount</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="gross_amt" id="gross_amt" style="" readonly/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Disc Amt.</label>
												            <input type="text" class="form-control"  placeholder="0" name="discount_final" id="discount_final" readonly value="0" onkeyup="get_discount_amt_value(this.id);" />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Transportation Amt.</label>&nbsp;
												            <input type="text" class="form-control" value="0"  placeholder="0" name="trans" id="trans" />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Load /Unload</label>&nbsp;
												            <input type="text" class="form-control" value="0"   placeholder="0" name="unload" id="unload" />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Insurance</label>&nbsp; 
												            <input type="text" class="form-control"  placeholder="0" name="insurance" id="insurance" style="" value="0">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >TCS</label>&nbsp;
												            <input type="text" class="form-control"  placeholder="0" name="tcs" id="tcs" style="" value="0">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="label-control" for="userinput1" >Others +/-</label>&nbsp;
												            <input type="text" class="form-control" value="0"  placeholder="0" name="adjustment_final" id="other" onkeyup="get_final_amount(this.value);" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b></label>
                                                            <input type="text" class="form-control" value="" id="final_total" name="final_total" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
	                        <div class="form-actions right">
								
								<button type="button" name="add_work_order" class="btn btn-primary" id="add_work_order" >
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
<script type="application/javascript">
    var x =0;
    var table="";
    $(document).ready(function()
    {
        $('.select2-original').select2({
            placeholder: "Choose elements",
            width: "100%"
        })
        var edit_id='<?php echo $edit_id; ?>';

//         table = $('#tbl').DataTable( {
    
//         searching:true,
//         ajax: 
//         {
//             "url": "../../api/wholesale/fetch_wholesale_work_order_items5.php",
//             "type": "POST",
//             data : 
//              {
//              'edit_id' : edit_id
//              },
//         },
//         deferRender: true,
//         "columnDefs": 
//         [ 
      
//           {
//               "targets": 0,
//               "data": null,
//               "defaultContent": ""
//           }
        
//         ],
//         destroy:true,
//  });
    var test = $('#sel-03');
        var ids = $(test).val(); // works
        console.log('Selected IDs123: ' + ids);
        table = $('#tbl').DataTable( {
        searching:false,   
        ajax: {
                "url": '../../api/wholesale/get_woi_table_items.php',
                //"url": '../../api/retail/get_rpi_table_items.php', 
                "type": "POST",
                data : 
                {
                'itemId' : edit_id, 
                'ids' : ids
                },
                // dataType:'text',  
                // success: function(data)
                // { 
                //     console.log(data);
                // },
            },
            deferRender: true,
            
        destroy:true,
        }); 

 $('#tbl tbody').on( 'click', 'button', function () 
    {
      var action = this.name;
      if(action=="edit")
      {
        var data = table.row( $(this).parents('tr') ).data();
  
        // var newOption = new Option(data[3], data[2], true, true);
        // $('#comboItemCode').append(newOption).trigger('change');

          document.getElementById('site_name').value = data[3];
          document.getElementById('site_address').value = data[4];
          document.getElementById('site_landline_no').value = data[5];
          document.getElementById('account_mobile_no').value = data[6];
          document.getElementById('site_person_name').value = data[7];
          document.getElementById('site_mobile_no').value = data[8];
          document.getElementById('account_person_name').value = data[9];
          document.getElementById('account_landline_no').value = data[10];
          document.getElementById('second_authority').value = data[11];
          document.getElementById('smobile_no').value = data[12];
          document.getElementById('final_authority').value = data[13];
          
          document.getElementById('fmobile_no').value = data[14];

        
        
          table.row( $(this).parents('tr') ).remove().draw();
        
   
      }
      else if(action=="delete")
      {
        var pc = sessionStorage.getItem("prev_count"); 
        alert("pc:"+pc);
        table.row( $(this).parents('tr') ).remove().draw();
        var npc = parseInt(pc) - parseInt(1);
        sessionStorage.setItem("prev_count", npc);
      }
    } );

  });
 </script>
<script>
    $(document).ready(function()
    {
        var prev_cnt = sessionStorage.getItem("prev_count");
        //alert("prev_count:"+prev_cnt);
        var i=parseInt(prev_cnt);//+parseInt(1);
        $('#add_new_line').click(function() {
            
            <?php $sql = 'SELECT item_id_pk,item_type FROM mstr_item';
            $result = mysqli_query($db,$sql);?>
            var category="<select class='form-control block'  id='category-"+i+"' onchange='get_category(this.id)'><option value='' disabled selected>Select Category </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['1']?>'><?php echo $row['1'];?></option><?php } ?></select>";
            <?php $sql = 'SELECT item_id_pk,final_product_code FROM mstr_item';
            $result = mysqli_query($db,$sql);?>
            var item="<select class='form-control block'  id='item_id-"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
            var quantity="<input type='text' id='quantity-"+i+"' class='form-control' value='1.00' onkeyup='get_quantity_value(this.id);'>"
            var rate= "<input type='text' id='rate-"+i+"' class='form-control' value='0.00' readonly>"
            var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per-"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value12(this.id)';></div>";
            var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs-"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
            var amount="<input type='text' id='amount-"+i+"' class='form-control' value='0.00'>";
            var size="<input type='text' id='size-"+i+"' class='form-control' value='0.00' />";
            var sqrft="<input type='text' id='sqrft-"+i+"' class='form-control' value='0.00' />";
            var remark="<input type='text' id='remark-"+i+"' class='form-control' value=''>"; 
            var checkbox = "<input type='checkbox' name='po_yes' value='po_yes' id='myCheck-"+i+"' onclick='myFunction(this.id)'>";
            var posupp = "<select class='form-control' id='posupplier-"+i+"' onchange='Supplier_select_po_generation(this.id)'><option value='' disabled selected>Select Supplier </option></select>"
            var pono = '<input type="text" id="pono-'+i+'" class="form-control" value="" />';  
            var item_hidden = '<input type="text" id="item_hidden-'+i+'" class="form-control" value="" style="display:none;/>';  
            var checki = i-1;
            var checkBox_val = document.getElementById('myCheck-'+checki);
            table.row.add( [
                            '',
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
                    checkbox,
                    posupp,
                    pono,
                    item_hidden
                    ] ).draw( false );
                    sessionStorage.setItem("prev_count", i);
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

            for(var i=0;i<count;i++)
            {
                
                var tblamt=table.cell(i,9).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var tbl5=table.cell(i,8).nodes().to$().find('input').val()
    
                var discount= parseInt(discount) +parseInt(tbl5);
            
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

        
            document.getElementById('total').value=amount;
            document.getElementById('discount_final').value=discount;
            document.getElementById('total_qty').value=totalqty;
            document.getElementById('total_sqfit').value=totalsqft;
            document.getElementById('disc_percent').value=totaldisc;
            document.getElementById('gross_amt').value=amount;
            // document.getElementById('final_total').value=amount;


        
        },1000
        );
    });

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
            var quantity_value =document.getElementById(quantity).value;

            $('#'+rate).val(d[0]);
            var amount_value=d[0]*quantity_value;
            var amount="amount-".concat(get_id);
            $('#'+amount).val(amount_value);

        }
        });
    }      
    function get_row_discount_value(e) 
    {
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
    function get_row_discount_value12(e) 
    {
        alert("hii");
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
            
            //alert("kkkk");
            //var get_id= e.slice(e.length - 1);
            var get_id = e.split("-");
            var get_id = get_id[1];
            
            //alert("get_id:"+get_id);
            var quantity_value=document.getElementById(e).value;
            //alert("quantity_value:"+quantity_value);
            var rate = "rate-".concat(get_id);
            //alert("rate is:"+rate);
            var table_discount_rs="table_discount_rs-".concat(get_id);
            var rate=document.getElementById(rate).value;
            ///alert("rate_value:"+rate);
            var table_discount_rs_value=document.getElementById(table_discount_rs).value;
            var amount_value=rate*quantity_value;
            //alert("aaaaaa:"+amount_value);
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
    function get_final_amount(e) 
    {

            var total=document.getElementById('gross_amt').value;
            var adjustment_final=document.getElementById('other').value;
            var trans=document.getElementById('trans').value;
            var unload=document.getElementById('unload').value;
            var tcs=document.getElementById('tcs').value;
            var insurance=document.getElementById('insurance').value;
            // var process_amount=document.getElementById('process_amount').value;
            if(adjustment_final=='')
            {
                var final_amount=parseFloat(total)+parseFloat(trans)+parseFloat(unload)+parseFloat(tcs)+parseFloat(insurance);
                document.getElementById("final_total").value=final_amount;
            }
                                                
            else{
                var final_amount=parseFloat(total)+parseFloat(adjustment_final)+parseFloat(trans)+parseFloat(unload)+parseFloat(tcs)+parseFloat(insurance);
                document.getElementById("final_total").value=final_amount;
            }

    }               
</script>
<script>
    $(document).ready(function(){
        
        $('#add_work_order').on('click', function () {
        // Add table data to JS array
        var rawItemArray = [];
        var count=table.rows().count();
        var i=0;
        var check_count=0;
        var edit_id = <?php echo $edit_id;?>;
        var customer1 = document.getElementById('customer').value;
        var customer_site1 = document.getElementById('customer_site').value;
        var salesman1  = document.getElementById('salesman').value;
        var transporter1  = document.getElementById('transporter').value;
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();

            
            var prodect_category =table.cell(i,1).nodes().to$().find('input').val();
            //alert("pro cat:"+prodect_category);
            
            if(prodect_category != undefined)
            {
                fproduct_cat = prodect_category;
            }
            else
            {
                var prodect_category =table.cell(i,1).nodes().to$().find('select').val();
                fproduct_cat = prodect_category;
            }
            //alert("fprocat:"+fproduct_cat);

            var item_id_fk =table.cell(i,2).nodes().to$().find('select').val();
            //var item_id_fk =table.cell(i,2).nodes().to$().find('input').val();
            //alert("item_id_select:"+item_id_fk);
            if(item_id_fk == undefined)
            {
                var item_id_fk =table.cell(i,14).nodes().to$().find('input').val();
                fitem_id_fk = item_id_fk;
                //alert("fid input:"+fitem_id_fk);
            }
            else
            {
                var item_id_fk =table.cell(i,2).nodes().to$().find('select').val();
                fitem_id_fk = item_id_fk;
                //alert("fid select:"+fitem_id_fk);
            }
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
            //alert("checkbbx:"+checkbbx);
            
            // if(checkbbx.checked == true)
            // {
            //     check_count=check_count+1;
            //     checkbox_val = "po_yes";
            // }
            // else
            // {
            //     check_count=check_count+1;
            //     checkbox_val = "po_no";
            // }
            var check_count = document.querySelectorAll('input[type="checkbox"]:checked').length;
            //alert("whole check:"+document.querySelectorAll('input[type="checkbox"]:checked').length);
            //alert(" whole check_count:"+check_count);
            rawItemArray.push({
                prodect_category : fproduct_cat,
                item_id_fk : fitem_id_fk,
                size:length,
                quantity:quantity,
                sqrft:sqrft,
                rate:rate,
                discount_per:discount_per,
                discount_rs:discount_rs,
                amount:amount,
                remark:remark,
                checkbox_val:checkbox_val,
                posupp:posupp,
                pono_tbl:pono_tbl
                
            });
            i++;
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        //console.log(newRawItemArray);
        var final_total = document.getElementById("final_total").value;
        if(final_total !="")
        {
            //alert("fffffffff whole check_count:"+check_count);
            $.ajax(
            {

                url: "../../api/wholesale/update_work_order1.php",
                type: 'POST',
                data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&edit_id='+edit_id + 
                '&customer1=' + customer1 + '&customer_site1=' + customer_site1 +'&salesman1=' + salesman1  + '&transporter1='+transporter1 ,
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    if(data == "100")
                    {
                        //alert("Purchase Order And Work Order Updated!");
                        //window.location.href="view_wholesale_work_order.php";
                        $.toast({
                            heading: 'Success',
                            text: 'Purchase Order And Work Order Updated!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_work_order.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
                    }
                    else if(data == "200")
                    {
                        //alert("Please Enter Valid Details");
                        //window.location.href="view_wholesale_work_order.php";
                        $.toast({
                            heading: 'Success',
                            text: 'Work Order Updated!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_wholesale_work_order.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
                    }
                    else
                    {
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
            alert("Please Enter Final Amount");
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
<?php 
    }
?>
<script>
//var po_array = [];
//var arr = [];
//console.log("array is:"+arr);
var last_po_assigned = "<?php echo $max_po1;?>";
var arr = [];
//$(document).ready(function() {
            setTimeout(function() {
                
                var count1=table.rows().count();
                

                var i1=0;
                //alert("count1 is:"+count1);
                //$("#signInButton").trigger('click');
                //alert("hii time out");
                sessionStorage.setItem("prev_count", count1);
                table.rows().eq(0).each( function ( index ) 
                { 
                    var row1 = table.row( index );
                    var data = row1.data();
                    //alert("i1:"+ i1);
                    //var process1 = table.cell(i,10).nodes().to$().find('input').val();
                     var checkbox_val = table.cell(i1,11).nodes().to$().find('input:checkbox').val();
                    //var poamt = table.cell(i,12).nodes().to$().find('input').val();
                    var posupp = table.cell(i1,12).nodes().to$().find('select').val();
                    var pono_tbl = table.cell(i1,13).nodes().to$().find('input').val();

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
        //});
        console.log(arr);
function Supplier_select_po_generation(id)
{   
    
    console.log("array is :"+arr);
    var supp_id = document.getElementById(id).value;
    var ds = id.split("-");
    add(supp_id);

    var ds = id.split("-");
    var fin_yr = '<?php echo date("y",strtotime("-1 year"))."-".date("y")."/" ?>';

    function add(supp_id) 
    {
        if (arr.filter(item=> item.supplier_id == supp_id).length == 0)
        {
            //alert("supplier not exist");
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
                    //alert("fetch_po is:"+data);
                    console.log("fetch_po is:"+data);
                    var inbox_val = document.getElementById("pono-"+ds[1]).value;
                    //alert("inbox val:"+inbox_val);
                    if(arr.length <= 0) 
                    { 
                        //alert("array empty");
                        //push value if array empty
                        if (arr.filter(item=> item.id == ds[1]).length == 0)
                        {
                            //check index exist
                            //alert("index not exist1");
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
                        //alert("array Not Empty");
                        if (arr.filter(item=> item.id == ds[1]).length == 0)
                        {
                            //alert(ds[1]+"index not exist");
                            console.log("arr is:"+arr);
                            //alert("ds1:"+ds[1]);
                            //alert("last_po_assign:"+last_po_assigned);
                            //var inc_po = parseInt(last_po_assigned) + parseInt(1);
                            var inc_po = parseInt(last_po_assigned) + parseInt(1) ;
                            arr.push({ id: ds[1], supplier_id: supp_id,po_no_fetch:inc_po});
                            last_po_assigned = inc_po;
                            document.getElementById("pono-"+ds[1]).value=fin_yr+inc_po;
                        }
                        else
                        {
                            //alert(ds[1]+"index exist");
                            //alert("ds 1:"+ds[1]);
                            search_index(ds[1],arr);
                            
                            function search_index(nameKey, myArray)
                            {
                                //alert("inside  search index");
                                for (var i=0; i < myArray.length+1; i++) 
                                {
                                    //alert("i is:"+i);
                                    //alert("nameKey is:"+nameKey);
                                    if (parseInt(myArray[i].id) == parseInt(nameKey)) 
                                    {
                                        var exist_po_id = myArray[i].po_no_fetch;
                                        //alert("po_no_fetch is:"+myArray[i].po_no_fetch);
                                        myArray[i].supplier_id = supp_id;

                                        if(parseInt(exist_po_id) != parseInt(0))
                                        {
                                            //alert("hii");
                                            document.getElementById("pono-"+ds[1]).value=fin_yr+exist_po_id;
                                            last_po_assigned = exist_po_id;
                                        }
                                        else
                                        {
                                            //alert("bye");
                                            document.getElementById("pono-"+ds[1]).value=fin_yr+data;
                                            last_po_assigned = data;
                                        }
                                        
                                        //alert("inside_search inner");
                                    }
                                    else
                                    {
                                        //alert("function fail");
                                    }
                                }
                                //alert("out  search index");
                            }
                            // last_po_assigned = data;
                            // document.getElementById("pono-"+ds[1]).value=data;
                            // console.log("search array:"+arr);
                        }
                    }
                },
            });
            
        }
        else
        {
            //alert("supplier exist");
            
            function search_supp_id(nameKey, myArray)
            {
                for (var i=0; i < myArray.length; i++) {
                    if (myArray[i].supplier_id === nameKey) 
                    {
                        var exist_po_id = myArray[i].po_no_fetch;
                        alert("po_no_fetch is:"+myArray[i].po_no_fetch);
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
                    "url": "../../api/wholesale/get_woi_table_items.php",
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

function myFunction(id) {

  var checkBox = document.getElementById(id);
  var text = document.getElementById("text");
  //alert("id is:"+id);
  if (checkBox.checked == true)
  {
    //text.style.display = "block";
    //alert("yess");
    var ds = id.split("-");
    //var ref_amt = document.getElementById("amount-"+ds[1]).value;
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
    document.getElementById("pono_final").value="";
    //remove item 

  }
}
</script>