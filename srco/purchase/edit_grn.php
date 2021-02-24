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
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Good Received Note</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
                                    <div class="col-md-6 d-none">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">GRN Id </label>
				                        	<div class="col-md-9">
												<input class="form-control" readonly id="grn_id" name="grn_id" value="<?php echo $_GET['id'] ?>" />   
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Branch </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch">
                                                <option value="NKS Aromas">NKS Aromas</option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                    <?php

                                        // $sql = "SELECT * FROM mstr_data_series where name='grn'";
                                        $sql = "SELECT * FROM grn WHERE grn_id_pk='".$_GET['id']."'";
                                        $result = mysqli_query($db,$sql);
                                        $row = mysqli_fetch_array($result);
                                        $_SESSION['updateItemId']=$row['grn_id_pk'];
                                        $po_id=$row['po_id_fk'];

                                        $sql1 = "SELECT * FROM purchase_order WHERE id='$po_id'";
                                        $result1 = mysqli_query($db,$sql1);
                                        $row1 = mysqli_fetch_array($result1);
                                       
                                        $_SESSION['supplier_id_fk']=$row1['supplier_id_fk'];
                                        

                                        ?>
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">GRN No.</label>
				                        	<div class="col-md-3">
												<input type="text" readonly id="grn_no" class="form-control" name="grn_no" value="<?php echo $row[4]; ?>"/>
											</div>
											<label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>"/>
											</div>
			                       		</div>
                                    </div>                                    
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Supplier <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier" onchange="getPurchaseOrderNo()">
                                                <option value="" disabled selected>Select Supplier </option>
                                                <?php


                                              $supplier_id_fk=$_SESSION["supplier_id_fk"];
                                            $sql11 = "SELECT * FROM mstr_supplier where supplier_id_fk=$supplier_id_fk ";
                                                    $result11 = mysqli_query($db,$sql11);
                                                    $row11 = mysqli_fetch_assoc($result11);
                                                    ?>
                                                    <option value="<?php echo $row11['supplier_id_fk'];?>" <?php echo "selected"; ?> > <?php  echo $row11["name"];?></option>
                                            </select>
                                            <!-- <div id="supplier_error">
                                                <span class="alert alert-danger p-0">Supplier is Required</span>
                                            </div> -->
                                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">PO No. <span style="color:red;"> *</span></label>
				                        	<div class="col-md-3">
                                                <?php
                                                $select_po = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier_id_fk'";
                                                $result12 = mysqli_query($db, $select_po);
                                                ?>
                                                <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no" onchange="getPurchaseOrderDetails()">
                                                <?php
                                                $row12 = mysqli_fetch_array($result12)
                                                ?>
                                                    <option value="<?php echo $row12['id'] ?>"><?php echo $row12['purchase_order_no'] ?></option>
                                                 
                                                </select>
                                                <!-- <div id="po_no_error">
                                                    <span class="alert alert-danger p-0">PO no. is Required</span>
                                                </div> -->
											</div>
											<label class="col-md-2 label-control" for="userinput1">Reference No</label>
				                        	<div class="col-md-4">
                                                <input type="text" readonly id="work_no" class="form-control" name="work_no" value="<?php echo $row[6] ?>" />
                                                
                                            </div>

			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <textarea type="text" readonly class="form-control" rows="4" name="address" id="address" style="height: auto;"><?php echo $row[2] ?></textarea>
                                                <!-- <div id="address_error">
                                                    <span class="alert alert-danger p-0">Address is Required</span>
                                                </div> -->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="text" readonly class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $row[7] ?>" />
                                                <!-- <div id="mobile_error">
                                                    <span class="alert alert-danger p-0">Mobile no. is Required</span>
                                                </div> -->
                                            </div>
                                            
			                       		</div>
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">UnLoaded By</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="unloaded_by" class="select2" data-toggle="select2" name="unloaded_by">
                                                    <?php
                                                    $get_emp = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='$row[8]'";
                                                    $res1 = mysqli_fetch_array(mysqli_query($db, $get_emp));
                                                     ?>
                                                    <option value="<?php echo $row[8] ?>"> <?php echo $res1['0'] ?> </option>
                                                    <!-- <option value="abcd">abcd </option>
                                                    <option value="ghjk">ghjk </option>
                                                    <option value="kiug">kiug </option> -->
                                                    
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
                                                <select class="select2 form-control block" id="prepared_by" class="select2" data-toggle="select2" name="prepared_by">
                                                    <?php
                                                    $get_emp = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='$row[3]'";
                                                    $res1 = mysqli_fetch_array(mysqli_query($db, $get_emp));
                                                     ?>
                                                    <option value="<?php echo $row[3] ?>"> <?php echo $res1['0'] ?> </option>
                                                    <!-- <option value="abcd">abcd </option>
                                                    <option value="ghjk">ghjk </option>
                                                    <option value="kiug">kiug </option> -->
                                                    
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Challan No <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <input type="text" readonly class="form-control" name="challan_no" id="challan_no" value="<?php echo $row[9] ?>" />
                                                <!-- <div id="challan_no_error">
                                                    <span class="alert alert-danger p-0">Challan no. is Required</span>
                                                </div> -->
                                            </div>
                                            
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Remark <span style="color:red;"> *</span></label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" readonly class="form-control" name="Remark" id="Remark"><?php echo $row[11] ?></textarea>
                                                <!-- <div id="remark_error">
                                                    <span class="alert alert-danger p-0">Remark is Required</span>
                                                </div> -->
                                            </div>
                                            
				                        </div>
									</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Stock Point</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="stock_point" class="select2" data-toggle="select2" name="stock_point">
                                                    <option value="Signature LLP">Signature LLP</option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>

                            <div class="col-lg-12 mt-3" id="table_1">
            <div class="col-lg-12" style="overflow-x:auto;">
              <table id="tbl" class="table table-centered display compact nowrap">
                
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th></th>
                      <th></th>
                      <th>Item Details</th>
                      <th></th>
                      <th>Size</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Actual Qty</th> 
                      <th>Actual Rate</th>
                      <th>Actual Amount</th>
                    </tr>
                  </thead>
                  <tbody id="tbody"></tbody>
              </table>
            </div>
           
        </div>

        <!-- Vertical table -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <!-- <label class="col-md-2 label-control" for="userinput1">Customer Notes</label> -->
                            <div class="col-md-12">
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                    <div class="card" style="background: #fbfafa;">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-9 label-control" for="userinput1" style="font-size: 18px;">Gross amount</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control " placeholder="" name="total" id="total" value="0.00">
                                </div>
                            </div>
                            <div class="form-group row" id="act_qty_row_hide">
                                <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Total Quantity</label>
                                <div class="col-md-5">
                                
                                </div>
                                    
                                    
                                    <div class="col-md-3">
                                    <input type="text" class="form-control " name="act_qty_final" id="act_qty_final" value="" readonly>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                            <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Other +/-</label>
                                
                                <div class="col-md-5">
                                    
                                </div>
                                
                                <div class="col-md-3">
                                    <input type="text" class="form-control " name="adjustment_final" id="adjustment_final" value="<?php echo $row[16] ?>" onkeyup='get_final_amount(this.value);' >
                                </div>
                            
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 ">
                                    <b style="font-size: 22px;">Total <span style="color:red;"> *</span></b>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control " name="final_total" id="final_total" value="<?php echo $row[18] ?>" readonly>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

	                        <div class="form-actions right">
                           
								<button type="button" name="add_supplier" class="btn btn-primary" onclick="submit_data();">
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
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>
<script>
var table="";
$(document).ready(function()
{
    var updateItemId='<?php echo $_SESSION['updateItemId']; ?>'
    table = $('#tbl').DataTable( {
    searching:true,   
    ajax: {
            "url": "../../api/purchase/get_grn_table.php",
            "type": "POST",
            data : 
             {
             'itemId' : updateItemId
             },
           },
        deferRender: true,
           
        // "columnDefs": 
        // [ 
          
        //   {
        //       "targets": 1,
        //       "data": null,
        //       "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn action-icon mdi mdi-delete\"></button>"
        //   } 
        // ],
    destroy:true,
  });

  window.setInterval(function()
        {
            var count=table.rows().count();


            var amount=0;
            var act_qty=0;

            for(var i=0;i<count;i++)
            {
            
                var tbl4=table.cell(i,11).nodes().to$().find('input').val()
        
                var amount= parseInt(amount) +parseInt(tbl4);

                var tbl5=table.cell(i,9).nodes().to$().find('input').val()
        
                var act_qty= parseInt(act_qty) +parseInt(tbl5);
        
        
            }

        
        document.getElementById('total').value=amount;
        
        document.getElementById('act_qty_final').value=act_qty;
        document.getElementById('final_total').value=parseFloat(amount)+parseFloat(document.getElementById('adjustment_final').value);


        
        },1000);


  //hide all error span
  
//   document.getElementById("supplier_error").style.display = "none";
//   document.getElementById("po_no_error").style.display = "none";
//   document.getElementById("address_error").style.display = "none";
//   document.getElementById("mobile_error").style.display = "none";
//   document.getElementById("remark_error").style.display = "none";
//   document.getElementById("challan_no_error").style.display = "none";
  ///////////////////////////
});

function get_final_amount(e) {                                      
    var total=document.getElementById('total').value;
    var adjustment_final=document.getElementById('adjustment_final').value;
    // var process_amount=document.getElementById('process_amount').value;

    if(adjustment_final==''){
        var final_amount=parseFloat(total);
        document.getElementById("final_total").value=final_amount;
    }
    else{
        var final_amount=parseFloat(total)+parseFloat(adjustment_final);
        document.getElementById("final_total").value=final_amount;
    }
                
}      



function getPurchaseOrderNo()
{   
    
    var supplier=document.getElementById('supplier').value; 


    $.ajax({
        type: "POST",
        url:"../../api/purchase/get-purchase-order-no.php",
        data:'supplier='+supplier,
        dataType: 'json',
        success:function(data)
        {
            console.log(data);
            document.getElementById('po_no').options[0]=new Option("select po","1")
            for (var i = 0; i < data.length; i++) 
            {
                var option = document.createElement("option");
                option.setAttribute("value", data[i]["id"]);
                option.text = data[i]["name"];
                po_no.appendChild(option);
            }
        }
    });
    
    
}

function getPurchaseOrderDetails ()
{   
    
    var po_no=document.getElementById('po_no').value; 

   // alert(po_no);
    table.clear().draw();

    $.ajax({
        type: "POST",
        url:"../../api/purchase/get-purchase-order-table-by-purchase-no.php",
        data : 
        {
            'po_no' : po_no

        },
        dataType:'json',

        success:function(data){
            
        console.log(data);
        $.each(data, function(index) 
        {
    
            var start=`<p>${data[index].start}</p>`; 
            var select='';   
            var id=`<p>${data[index].id}</p>`;
            var final_product_code=`<p>${data[index].final_product_code}</p>`;
            var design_code=`<p>${data[index].design_code}</p>`;
            var size=`<p>${data[index].size}</p>`;
            var quantity=`<p>${data[index].quantity}</p>`;
            var rate= `<p>${data[index].rate}</p>`;
            var amount= `<p>${data[index].rate}</p>`;
            var act_quantity=`<input type="number" min=0 id="act_quantity" value="${data[index].act_quantity}" oninput="show_amount()" />`;
            var act_rate=`<input type="number" min=0 id="act_rate" value="${data[index].act_rate}" oninput="show_amount()" />`;
            var act_amount= `<input type="text" id="amt" value="${data[index].quantity*data[index].rate}" />`;

            table.row.add( [
                    start,
                    select,
                    id,
                    final_product_code,
                    design_code,
                    size,
                    quantity,
                    rate,
                    amount,
                    act_quantity,
                    act_rate,
                    act_amount,
                    ] ).draw( false );
            }); 
        }
    });

}

function submit_data()
{

    var grn_id = document.getElementById('grn_id').value;
    var branch = document.getElementById('branch').value;
    var address = document.getElementById('address').value;
    var grn_no = document.getElementById('grn_no').value;
    var date = document.getElementById('date').value;
    var po_no = document.getElementById('po_no').value;
    var supplier = document.getElementById('supplier').value;
    var Remark = document.getElementById('Remark').value;
    var work_no = document.getElementById('work_no').value;
    var challan_no = document.getElementById('challan_no').value;
    var prepared_by = document.getElementById('prepared_by').value;
    var stock_point = document.getElementById('stock_point').value;
    var unloaded_by = document.getElementById('unloaded_by').value;
    var mobile_no = document.getElementById('mobile_no').value;
    // vertical table vlaues
    var total = document.getElementById('total').value;
    var act_qty_final = document.getElementById('act_qty_final').value;
    var adjustment_final = document.getElementById('adjustment_final').value;
    // var process_amount = document.getElementById('process_amount').value;
    var final_total = document.getElementById('final_total').value;

    if(supplier == '')
    {
        $.toast({
            heading: 'Error',
            text: 'Supplier is require..!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
        //document.getElementById("supplier_error").style.display = "block";
        return;
    }
    
    if(po_no == '')
    {
        $.toast({
            heading: 'Error',
            text: 'PO No is require..!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
        //document.getElementById("po_no_error").style.display = "block";
        return;
    }
    
    if(address == '')
    {
        $.toast({
            heading: 'Error',
            text: 'Address is require..!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
       // document.getElementById("address_error").style.display = "block";
        return;
    }

    if(challan_no == '')
    {
        $.toast({
            heading: 'Error',
            text: 'Challan No is require..!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
        //document.getElementById("challan_no_error").style.display = "block";
        return;
    }

    if(mobile_no == '')
    {
        $.toast({
            heading: 'Error',
            text: 'Mobile No is require..!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
       // document.getElementById("mobile_error").style.display = "block";
        return;
    }

    if(Remark == '')
    {
        $.toast({
            heading: 'Error',
            text: 'Remark is require..!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
        //document.getElementById("remark_error").style.display = "block";
        return;
    }

    // Add table data to JS array
    var rawItemArray = [];
    var count=table.rows().count();

    
    var i=0;
    table.rows().eq(0).each( function ( index ) 
    { 

    // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
    
    var row = table.row( index );
    var data = row.data();
    var grn_id_fk = table.cell(i,2).nodes().to$().find('p').text();
    var item_detail = table.cell(i,3).nodes().to$().find('select').val();
    var design_code = table.cell(i,4).nodes().to$().find('p').text();
    var size = table.cell(i,5).nodes().to$().find('p').text();
    var quantity = table.cell(i,6).nodes().to$().find('p').text();
    var rate = table.cell(i,7).nodes().to$().find('p').text();
    var amount = table.cell(i,8).nodes().to$().find('p').text();
    var act_quantity = table.cell(i,9).nodes().to$().find('input').val();
    var act_rate = table.cell(i,10).nodes().to$().find('input').val();
    var act_amount = table.cell(i,11).nodes().to$().find('input').val();


    rawItemArray.push({
        grn_id_fk : grn_id_fk,
        item_detail: item_detail,
        design_code: design_code,  
        size: size,
        quantity: quantity,
        rate: rate,
        amount: amount,
        act_quantity: act_quantity,
        act_rate: act_rate,
        act_amount: act_amount
    });

    i++;
    
});

    var newRawItemArray = JSON.stringify(rawItemArray);

    // console.log(newRawItemArray);    

    $.ajax(
        {

        url: "../../api/purchase/edit_grn.php",
        type: 'POST',
        data : 
        {
            'rawItemArray' : newRawItemArray,
            'grn_id': grn_id,
            'date': date,
            'supplier': supplier,
            'work_no': work_no,
            'mobile_no': mobile_no,
            'Remark': Remark,
            'address': address,
            'branch': branch,
            'grn_no': grn_no,
            'po_no': po_no,
            'challan_no': challan_no,
            'prepared_by': prepared_by,
            'stock_point': stock_point,
            'unloaded_by': unloaded_by,
            'total': total,
            'act_qty_final': act_qty_final,
            'adjustment_final': adjustment_final,
            // 'process_amount': process_amount,
            'final_total': final_total,
        },
        dataType:'text',  
        success: function(data)
        { 
            console.log(data);
            if(data == "1")
            {
                $.toast({
                    heading: 'Success',
                    text: 'GRN Edited Sussesfully',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                    window.location.href = 'view_grn.php';    
                }, 5000);
            
            }
            else
            {
                $.toast({
                    heading: 'Error',
                    text: 'Something went wrong!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
        
        },
        
    });
}

function show_amount() 
{
    var amt = document.querySelectorAll('#amt');
    var rate = document.querySelectorAll('#act_rate');
    var quantity = document.querySelectorAll('#act_quantity');

    for(var i=0; i<rate.length; i++)
    {
        amt[i].value = rate[i].value * quantity[i].value;
    }
    // console.log(amt);
}

	
</script>