<?php include('../../partials/header.php');?>

<?php 
    $edit_id = $_GET['id'];

    $sql = "SELECT *,wdc.add_date as da,
    wdc.add_date as dt,
    wdc.qty as q,
    wdc.disc_per as dp,
    wdc.disc_rs as dr,
    wdc.other as o,
    wdc.process_amt as pa,
    wdc.net_amt as na,
    wdc.sq_ft as sqft
    
    
    FROM `wholesale_delivery_challan` as wdc,
    wholesale_work_order as wwo,
    mstr_transporter as t,
    mstr_transporter_vehicle as v ,
    tbl_wholesale_customer as c,
    tbl_wholesale_customer_site_details as cs 
    WHERE wdc.wh_wo_id_fk = wwo.work_order_id AND 
    wdc.t_id_fk = t.t_id_pk AND 
    wdc.v_id_fk = v.tv_id_pk AND 
    wwo.cust_id_fk = c.wc_id_pk AND 
    wwo.site_id_fk = cs.site_id_pk
    ORDER BY wdc.wd_ch_id_pk DESC";

    $res = mysqli_query($db,$sql);
    
    while($rw = mysqli_fetch_array($res))
    {
        $challan_no = $rw['challan_no'];
        $challan_date = $rw['dt'];
        $cust_id_fk = $rw['cust_id_fk'];
        $cust_name = $rw['cust_name'];
        $wh_wo_id_fk = $rw['wh_wo_id_fk'];
        $work_no = $rw['work_no'];

        $mob_number = $rw['mob_number'];
        $office_address = $rw['office_address'];
        $branch = $rw['branch'];
        $prepared_by = $rw['prepared_by'];
        $t_id_fk = $rw['t_id_fk'];
        $name = $rw['name'];
        $v_id_fk = $rw['v_id_fk'];
        $v_no = $rw['v_no'];
        $site_id_fk = $rw['site_id_fk'];
        $site_name = $rw['site_name'];
        $site_address = $rw['site_address'];
        $pono = $rw['pono'];
        $add_time = $rw['add_time'];
        $ledger_balance = $rw['ledger_balance'];
        $sqft = $rw['sqft'];

        $q = $rw['q'];
        $dp = $rw['dp'];
        $dr = $rw['dr'];
        $o = $rw['o'];
        $pa = $rw['pa'];
        $na = $rw['na'];
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
												<input type="text" id="challan_no" class="form-control " placeholder="" name="challan_no" value="<?php echo "".$challan_no; ?>" readonly="">
											</div>
											<!-- <label class="col-md-0 label-control" for="userinput1"></label> -->
				                        	<div class="col-md-5">
												<input type="text" id="date" class="form-control " placeholder="" name="date" value="<?php echo $challan_date; ?>" readonly="">
											</div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onChange="customer_select(this.id);">
                                                <option value="<?php echo $cust_id_fk;?>" disabled selected><?php echo $cust_name;?> </option>
                                                <?php

                                                    $sql = "SELECT * FROM tbl_wholesale_customer";
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
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Work NO.</label>
				                        	<div class="col-md-9">
                                                <select name="work_no_select" id="work_no_select" onchange="select_work_no();" class="form-control">
                                                <option  value="<?php echo $wh_wo_id_fk;?>" selected><?php echo $work_no;?></option>
                                                    <?php 
                                                        $work_sql = "SELECT * FROM wholesale_work_order order by work_order_id DESC";
                                                        $work_res = mysqli_query($db,$work_sql);
                                                        while($work_row = mysqli_fetch_array($work_res))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $work_row['work_order_id'];?>"><?php echo $work_row['work_no'];?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" readonly="" class="form-control " placeholder="0" name="mobile_no" value="<?php echo $mob_number;?>">
                                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Address" name="address" id="address" value="<?php echo $office_address;?>"/>
											</div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Branch <span style="color:red;">*</span> </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch123" >
                                                    <option value="NKS Aromas" selected>NKS Aromas</option>
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
												<input type="text" class="form-control" value="<?php echo $prepared_by;?>" id="preapared_by" name="prepared_by" >
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Transporter & Vehicle</label>
				                        	<div class="col-md-5">
                                                <select class="select2 form-control block js-example-tags" id="transporter" class="select2" data-toggle="select2" name="transporter" onchange="select_transporter();">
                                                    <option value="<?php echo $t_id_fk; ?>" disabled selected><?php echo $name;?></option>
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
                                                    <option value="<?php echo $v_id_fk;?>" ><?php echo $v_no;?></option>
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
			                       		</div>
									</div>
		                        </div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Site</label>
                                                <div class="col-md-9">
                                                <select class="select2 form-control block" id="customer_site" class="select2" data-toggle="select2" name="customer_site" onChange="site_select();">
                                                    <option value="<?php echo $site_id_fk;?>" disabled selected><?php echo $site_name;?></option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">PO No & Time</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="pono" id="pono" value="<?php echo $pono;?>">
                                                </div>
                                                <!-- <label class="col-md-2 label-control" for="userinput1">Time</label> -->
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="time" id="time" value="<?php echo $add_time;?>">
                                                </div>
                                            </div>
                                        </div>
								</div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Site Address</label>
                                                <div class="col-md-9">
                                                <textarea class="form-control" name="site_add" id="site_add"><?php echo $site_address;?></textarea>
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
                                                    <span style="color:red;font-weight: bolder;" id="ledger_bal">Ledger Balance:<?php echo $ledger_balance;?></span>
                                                    
                                                </div>
                                            </div>
                                        </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="table-responsive">
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
                                                                        <th>HIdden&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>PROCESS&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
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
                                                       
                                                    </div>
                                        </div>       
                                    </div>
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2">
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b></label>
                                                            <input type="text" class="form-control" value="0" id="final_total" name="final_total" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
	                        <div class="form-actions right">
								
								<button type="button" name="add_work_order" class="btn btn-primary" id="add_delivery_challan" >
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
    
</script>

<script>
    var table="";
    
    $(document).ready(function()
    {
        // table= $('#tbl').DataTable( {
        
        //     paginate: false,
        //     lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        //     buttons: [],
        //     searching:false,
        //     language : {
        //     "zeroRecords": " ",
            
        // },
        $(document).ready(function()
    {
        table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:true,
            ajax: 
            {
                "url": "../../api/wholesale/fetch_dc_item.php",
                "type": "POST",
                data : 
                {
                'dc_id' : <?php echo $edit_id;?>
                },
                /*dataType: 'text',
                 success: function(data)
                { 
                    console.log(data);
                
                
                },*/
            },
            deferRender: true,
            "columnDefs": 
            [ 
            {
                "targets": 0,
                "data": null,
                "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
            },
            ],
            destroy:true,
        });
   // });
    
        
    });
    

        
    var i=1;
    $('#add_new_line').click(function() {
        
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

        });
        
        window.setInterval(function()
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
                
                var tblamt=table.cell(i,9).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var tbldiscrs=table.cell(i,8).nodes().to$().find('input').val()
    
                var discount= parseInt(discount) +parseInt(tbldiscrs);
            
                var tblqty=table.cell(i,4).nodes().to$().find('input').val()
                
                var totalqty= parseInt(totalqty) +parseInt(tblqty);

                var tblsqrft=table.cell(i,5).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tblsqrft);

                var tbldiscper=table.cell(i,7).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldiscper);

                var q = table.cell(i,4).nodes().to$().find('input').val();
                var r =  table.cell(i,6).nodes().to$().find('input').val();
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
        var rate = "rate-".concat(get_id);
        var quantity="quantity-".concat(get_id);
        alert("qty:"+quantity);
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
                
                var tblamt=table.cell(i,9).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var tbldiscrs=table.cell(i,8).nodes().to$().find('input').val()
    
                var discount= parseInt(discount) +parseInt(tbldiscrs);
            
                var tblqty=table.cell(i,4).nodes().to$().find('input').val()
                
                var totalqty= parseInt(totalqty) +parseInt(tblqty);

                var tblsqrft=table.cell(i,5).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tblsqrft);

                var tbldiscper=table.cell(i,7).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldiscper);

                var q = table.cell(i,4).nodes().to$().find('input').val();
                var r =  table.cell(i,6).nodes().to$().find('input').val();
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
                remark:remark
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
            //alert("all correct");
            $.ajax(
            {
                
                url: "../../api/wholesale/update_wholesale_delivery_challan.php",
                type: 'POST',
                data : $('#form1').serialize() 
                + "&newRawItemArray=" + newRawItemArray 
                + '&vehicle_select='+vehicle_select + '&edit_id='+<?php echo $_GET['id'];?>,
                dataType:'text',  
                success: function(data)
                { 
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Wholesale Delivery Challan Updated',
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
                            alert("Please Enter Valid Details");
                    }
                
                },
            });
        }
        else
        {
            alert("not correct");
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
            if(total_qty=="")
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
            if(final_total=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Net Amount Required',
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
            document.getElementById("ledger_bal").textContent=d[27];
            $('#total_qty').val(d[8]);
            $('#total_sqfit').val(d[9]);
            $('#gross_amt').val(d[10]);
            $('#total').val(d[11]);
            $('#disc_percent').val(d[12]);
            $('#discount_final').val(d[13]);
            $('#adjustment_final').val(d[14]);
            $('#process_amount').val(d[15]);
            $('#final_total').val(d[16]);
            

        }
        });
        //var edit_id='<?php //echo $edit_id; ?>';
        //var x =0;
        //var table="";
        table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:true,
            ajax: 
            {
                "url": "../../api/wholesale/fetch_dc_items_for_tax_invoice.php",
                "type": "POST",
                data : 
                {
                'edit_id' : <?php echo $edit_id;?>
                },
            },
            deferRender: true,
            "columnDefs": 
            [ 
            {
                "targets": 0,
                "data": null,
                "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
            },
            ],
            destroy:true,
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
        alert("transport clicked");
        var trans = document.getElementById("transporter").value;
        alert("trans is:"+trans);
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