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

    /* textarea {
    min-width:50px;
    width:50px;
    max-width:100px;
    resize:none;
    font-size:15px;
    overflow-x:hidden;
    overflow-y:auto;    
    min-height:1.2em;
    height:2.2em;
    padding:2px;
    max-height:5em;    
} */
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Sales Order</h4>
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

                                            $sql1 = "SELECT * FROM mstr_data_series where name='wholesale_work_order'";
                                            $result = mysqli_query($db,$sql1);
                                            $row6 = mysqli_fetch_array($result);
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Work No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="work_no" class="form-control " placeholder="" name="work_no" value="<?php echo date('y', strtotime('-1 year')).'-'.date('y').'/'.$row6['2']; ?>" readonly="">
											</div>
											<label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>" >
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
                                                <!-- <span id="branch_error" style="color:red;">Branch is Required</span> -->
				                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">PO NO. <span style="color:red;">*</span> </label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control" value="" placeholder="PO No." id="pono_final1" name="pono_final1" >
                                                <!-- <span id="po_no_error" style="color:red;">PO NO. is Required</span> -->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6" style="display:none;">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Length</label>
				                        	<div class="col-md-3">
												<input type="text" id="lenght" class="form-control " placeholder="" name="length" value="0">
											</div>
											<label class="col-md-2 label-control" for="userinput1">Width</label>
				                        	<div class="col-md-4">
												<input type="text" id="width" class="form-control " placeholder="" name="width" value="0">
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
                                            <!-- <input type="hidden" id="posupplier" name="posupplier"> -->
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onChange="customer_select(this.id);">
                                                <option value="" disabled selected>Select Customer </option>
                                                <?php

                                                    $sql = "SELECT * FROM tbl_wholesale_customer WHERE active_status='1'";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
                                                <!-- <span id="customer_error" style="color:red;">Customer is Required</span> -->
                                            </div>
				                        </div>
				                    </div>
				                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Address" name="address" id="address" readonly=""/>
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" readonly="" class="form-control " placeholder="0" name="mobile_no" >
                                            </div>
				                        </div>
				                    </div>
				                    <!-- <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Address" name="address" id="address" />
											</div>
			                       		</div>
                                    </div> -->
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Site <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="customer_site" class="select2" data-toggle="select2" name="customer_site" onChange="site_select();">
                                                <option value="" disabled selected>Select Customer Site</option>
											</select>
                                            <!-- <span id="site_error" style="color:red;">Site is Required</span> -->
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Remark</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Remark" name="remark" id="remark" />
											</div>
			                       		</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Site Description</label>
				                        	<div class="col-md-9">
                                                <!-- <input type="text" class="form-control"  placeholder="Site Description" name="des" id="des" /> -->
                                                <textarea style="max-width: 100%;" type="text" class="form-control"  placeholder="Site Description" name="des" id="des" rows="10" cols="10" readonly=""></textarea>
											</div>
			                       		</div>
									</div>
		                        </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Salesman <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="salesman" class="select2" data-toggle="select2" name="salesman">
                                                    <option value="" disabled selected>Select Salesman</option>
                                                    <?php
                                                        $sql = "SELECT * FROM mstr_employee WHERE emp_designation='sales executive' AND emp_status='1'";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
                                                <!-- <span id="saleman_error" style="color:red;">Saleman is Required</span> -->
											</div>
			                       		</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Transporter <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block js-example-tags" id="transporter_select" class="select2" data-toggle="select2" name="transporter">
                                                    <option value="101"  selected>Select Transporter</option>
                                                    <?php
                                                        $sql = "SELECT * FROM mstr_transporter WHERE tactive_status='1'";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
                                                <!-- <span id="transporter_error" style="color:red;">Transporter is Required</span> -->
											</div>
			                       		</div>
                                    </div>
		                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control" for="userinput1">Product List</label>
                                        <div class="col-md-9">
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
                                                <div class="col-md-12" style="margin-top: 25px;">
                                                    <!-- <div class="form-group row"> -->
                                                        
                                                    <!-- <div class="container"> -->
                                                            <table class="display" id="tbl" style="width: 100%;font-size: smaller;">
                                                                <thead>
                                                                    <tr>
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
                                                                        <!-- <th>PROCESS&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <th>PO</th>
                                                                        <!-- <th>PROCESS AMOUNT&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th> -->
                                                                        <th>SUPPLIER</th>
                                                                        <th>PONO</th>
                                                                        <th style="display: none">hidden product id</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
                                                            </table>
                                                        <!-- </div> -->
                                                       
                                                    <!-- </div> -->
                                                    <!-- <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add another line</button>
                                                        </div>
                                                    </div> -->
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
                                                            <label class=" label-control" for="userinput1"><b>Net Amt</b> <span style="color:red;">*</span> </label>
                                                            <input type="text" class="form-control" placeholder="0" id="final_total" name="final_total" readonly="">
                                                            <!-- <span id="net_amt_error" style="color:red;">Net Amt is Required</span> -->
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
    console.log('Selected IDs123: ' + ids);
    var display_data = document.getElementById('display_data');
    display_data.style.display = 'block'; //or

    table = $('#tbl').DataTable( {  
            dom: 'Bfrtip',
            searching:false,
            ajax: 
            {
                "url": "../../api/wholesale/fetch_items_row_for_sales_order.php",
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
var i=1;
    // $('#add_new_line').click(function() {
    function get_new_line() {
        //alert('new line');
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
        var pono = '<input type="text" readonly id="pono-'+i+'" class="form-control" value="" />';  
            
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
    };
$(document).ready(function()
{ 

//   document.getElementById("branch_error").style.display = "none";
//   document.getElementById("po_no_error").style.display = "none";
//   document.getElementById("customer_error").style.display = "none";
//   document.getElementById("site_error").style.display = "none";
//   document.getElementById("saleman_error").style.display = "none";
//   document.getElementById("transporter_error").style.display = "none";
//   document.getElementById("net_amt_error").style.display = "none";
  ///////////////////////////
});
</script>
<script>

var i=1;
    // $('#add_new_line').click(function() {
        function get_new_line() {
        //alert('new line');
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
        var pono = '<input type="text" readonly id="pono-'+i+'" class="form-control" value="" />';  
            
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
    };



    var table="";
    $(document).ready(function()
    {
        table= $('#tbl').DataTable( {
        
            paginate: false,
            lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            buttons: [],
            searching:false,
            "autoWidth": false,
            pageResize: true,
            // "bAutoWidth": false,
            language : {
            "zeroRecords": " ",
            
        },
} );


// (function(){
// var measurer = $('<span>', {
//    							style: "display:inline-block;word-break:break-word;visibility:hidden;white-space:pre-wrap;"})
//    .appendTo('body');
// function initMeasurerFor(textarea){
//   if(!textarea[0].originalOverflowY){
//   	textarea[0].originalOverflowY = textarea.css("overflow-y");    
//   }  
//   var maxWidth = textarea.css("max-width");
//   measurer.text(textarea.text())
//       .css("max-width", maxWidth == "none" ? textarea.width() + "px" : maxWidth)
//       .css('font',textarea.css('font'))
//       .css('overflow-y', textarea.css('overflow-y'))
//       .css("max-height", textarea.css("max-height"))
//       .css("min-height", textarea.css("min-height"))
//       .css("min-width", textarea.css("min-width"))
//       .css("padding", textarea.css("padding"))
//       .css("border", textarea.css("border"))
//       .css("box-sizing", textarea.css("box-sizing"))
// }
// function updateTextAreaSize(textarea){
// 	textarea.height(measurer.height());
//   var w = measurer.width();
//   if(textarea[0].originalOverflowY == "auto"){
//      	var mw = textarea.css("max-width");
//       if(mw != "none"){
//      		if(w == parseInt(mw)){
//       		textarea.css("overflow-y", "auto");
//      		} else {
//          	textarea.css("overflow-y", "hidden");
//      		}
//       }
//    }
//    textarea.width(w + 2);
// }
// $('textarea.autofit').on({
//     input: function(){      
//       	var text = $(this).val();  
//         if($(this).attr("preventEnter") == undefined){
//       	   text = text.replace(/[\n]/g, "<br>&#8203;");
//         }
//       	measurer.html(text);                       
//         updateTextAreaSize($(this));       
//     },
//     focus: function(){
//      initMeasurerFor($(this));
//     },
//     keypress: function(e){
//     	if(e.which == 13 && $(this).attr("preventEnter") != undefined){
//       	e.preventDefault();
//       }
//     }
// });
// })();



// table.columns.adjust().draw();
   
        
    
        // });
        var i=1;
    
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
                
                var tblamt=table.cell(i,8).nodes().to$().find('input').val()
    
                var amount= parseInt(amount) +parseInt(tblamt);

                var tbl5=table.cell(i,7).nodes().to$().find('input').val()
    
                var discount= parseInt(discount) +parseInt(tbl5);
            
                var tbl2=table.cell(i,3).nodes().to$().find('input').val()
    
                var totalqty= parseInt(totalqty) +parseInt(tbl2);

                var tbl89=table.cell(i,4).nodes().to$().find('input').val()
    
                var totalsqft= parseFloat(totalsqft) +parseFloat(tbl89);

                var tbldisc=table.cell(i,6).nodes().to$().find('input').val()
    
                var totaldisc= parseFloat( totaldisc) +parseFloat(tbldisc);

                var q = table.cell(i,3).nodes().to$().find('input').val();
                var r =  table.cell(i,5).nodes().to$().find('input').val();
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
             var trans = document.getElementById('gross_amt').value;
            var unload = document.getElementById('unload').value;
            var insurance = document.getElementById('insurance').value;
            var tcs = document.getElementById('tcs').value;
            var other = document.getElementById('other').value;
       
                //alert ('enter');
                document.getElementById('final_total').value=parseFloat(amount)+parseFloat( document.getElementById('other').value);
           
        
        },1000
        );
  
            var trans = document.getElementById('gross_amt').value;
            var unload = document.getElementById('unload').value;
            var insurance = document.getElementById('insurance').value;
            var tcs = document.getElementById('tcs').value;
            var other = document.getElementById('other').value;
            var total=document.getElementById('gross_amt').value;
           // alert(total);
            if(trans == 0 && unload == 0 && insurance == 0 && tcs == 0 && other == 0) {
                //alert ('enter');
                document.getElementById('final_total').value=total;
            }
        
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
        get_new_line();
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

        //get_new_line();
    
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
                // alert("hii");
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
               // document.getElementById(table_discount_per).value=0;
                var table_discount_rs = "table_discount_rs".concat(get_id);
               // document.getElementById(table_discount_rs).value=0;

               


                
            }

            function get_final_amount(e) {

                var total=document.getElementById('gross_amt').value;
                var adjustment_final=document.getElementById('other').value;
                var trans=document.getElementById('trans').value;
                var unload=document.getElementById('unload').value;
                var tcs=document.getElementById('tcs').value;
                var insurance=document.getElementById('insurance').value;
                // var process_amount=document.getElementById('process_amount').value;
                if(adjustment_final==''){
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
            var check_count = 0;
            var posupplier = "";
            var transporter_select = document.getElementById("transporter_select").value;
            //alert("transporter :"+transporter_select);
            table.rows().eq(0).each( function ( index ) 
            { 
                var row = table.row( index );
                var data = row.data();

                var prodect_category =table.cell(i,0).nodes().to$().find('input').val();
                var item_id_fk =table.cell(i,13).nodes().to$().find('input').val();
                var size=table.cell(i,2).nodes().to$().find('input').val();
                var quantity =table.cell(i,3).nodes().to$().find('input').val();
                var sqrft=table.cell(i,4).nodes().to$().find('input').val();
                var rate =table.cell(i,5).nodes().to$().find('input').val();
                var discount_per=table.cell(i,6).nodes().to$().find('input').val();
                var discount_rs =table.cell(i,7).nodes().to$().find('input').val();
                var amount=table.cell(i,8).nodes().to$().find('input').val();
                var remark=table.cell(i,9).nodes().to$().find('input').val();
                var checkbox_val = table.cell(i,10).nodes().to$().find('input:checkbox').val();
                var posupp = table.cell(i,11).nodes().to$().find('select').val();
                var pono_tbl = table.cell(i,12).nodes().to$().find('input').val();
                var checkbbx = document.getElementById("myCheck-"+i);
                //alert("item_id_fk:"+item_id_fk);
                if(checkbbx.checked == true)
                {
                    check_count = check_count+1;
                    checkbox_val = "po_yes";
                }
                else
                {
                    check_count = check_count - 1;
                    checkbox_val = "po_no";
                }
                //alert("check_count:"+check_count);
                if(item_id_fk != null)
                {
                    rawItemArray.push({
                        prodect_category : prodect_category,
                        item_id_fk : item_id_fk,
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
                }
                
            });
            var newRawItemArray = JSON.stringify(rawItemArray);
            console.log("newRawItemArray:"+newRawItemArray);
            var branch = document.getElementById("branch").value;
            var pono = document.getElementById("pono_final1").value;
            var customer = document.getElementById("customer").value;
            var final_total = document.getElementById("final_total").value;
            var customer_site = document.getElementById("customer_site").value;
            var salesman = document.getElementById("salesman").value;
            var transporter_select = document.getElementById("transporter_select").value;
            var check_count = document.querySelectorAll('input[type="checkbox"]:checked').length;
            // alert("whole check:"+document.querySelectorAll('input[type="checkbox"]:checked').length);
            // alert(" whole check_count:"+check_count);

            if(check_count != 0)
            {
                if(pono != "")
                {
                    if(salesman != "" && customer!="" && final_total!=0 && transporter_select!="101")
                    {
                        $.ajax(
                        {

                            url: "../../api/wholesale/add_work_order.php",
                            type: 'POST',
                            data : $('#form1').serialize() + "&newRawItemArray=" 
                            + newRawItemArray + '&transporter=' +transporter_select,
                            dataType:'text',  
                            success: function(data)
                            { 
                                //alert("data:"+data);
                                console.log(data);
                                if(data == "100")
                                {
                                    $.toast({
                                        heading: 'Success',
                                        text: 'Purchase Order And Work Order Added!',
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
                                   
                                    $.toast({
                                        heading: 'Success',
                                        text: 'Work Order Added!',
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
                            }
                            if(customer == "")
                            {
                                //document.getElementById("customer_error").style.display = "block";
                                $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Customer',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                            }
                            if(final_total == "")
                            {
                                //document.getElementById("net_amt_error").style.display = "block";
                                $.toast({
                                    heading: 'Error',
                                    text: 'Please Check Net Amount',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                            }
                            if(customer_site == "")
                            {
                               // document.getElementById("site_error").style.display = "block";
                                $.toast({
                                heading: 'Error',
                                text: 'Please Select Site',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                                })
                            }
                            if(salesman == "")
                            {
                                //document.getElementById("saleman_error").style.display = "block";
                                $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Salesman',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                            }
                            if(transporter_select == "")
                            {
                                //document.getElementById("transporter_error").style.display = "block";
                                $.toast({
                                heading: 'Error',
                                text: 'Please Select Transporter',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                                })
                            }
                    }   
                }
                else
                {
                    if(pono == "")
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter PO No.',
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
                if(salesman != "" && customer!="" && final_total!=0 && transporter_select!="101")
                {
                    $.ajax(
                    { 

                        url: "../../api/wholesale/add_work_order.php",
                        type: 'POST',
                        data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&transporter=' +transporter_select,
                        dataType:'text',  
                        success: function(data)
                        { 
                            //alert("data:"+data);
                            console.log(data);
                            if(data == "100")
                            {
                                $.toast({
                                        heading: 'Success',
                                        text: 'Purchase Order And Work Order Added!',
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
                                // alert("Work Order Added!")
                                // window.location.href="view_wholesale_work_order.php";
                                $.toast({
                                        heading: 'Success',
                                        text: 'Work Order Added!',
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
                        
                    });

                }
                else
                {
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
                        }
                        if(customer == "")
                        {
                          //  document.getElementById("customer_error").style.display = "block";
                            $.toast({
                                heading: 'Error',
                                text: 'Please Select Customer',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                        }
                        if(final_total == "")
                        {
                           // document.getElementById("net_amt_error").style.display = "block";
                            $.toast({
                                heading: 'Error',
                                text: 'Please Check Net Amount',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                        }
                        if(customer_site == "")
                        {
                            //document.getElementById("site_error").style.display = "block";
                            $.toast({
                            heading: 'Error',
                            text: 'Please Select Site',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                            })
                        }
                        if(salesman == "")
                        {
                            //document.getElementById("saleman_error").style.display = "block";
                            $.toast({
                                heading: 'Error',
                                text: 'Please Select Salesman',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'error'
                            })
                        }
                        if(transporter_select == "")
                        {
                            //document.getElementById("transporter_error").style.display = "block";
                            $.toast({
                            heading: 'Error',
                            text: 'Please Select Transporter',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                            })
                        }
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

  //var checkBox = document.getElementById("checkBox");
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
    $('#pono-'+ds[1]).val('');
    $('#posupplier-'+ds[1]).html(null);
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
                               // alert("inside  search index");
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