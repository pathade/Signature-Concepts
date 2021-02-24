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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Good Received Note</h4>
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

                                        $sql = "SELECT * FROM mstr_data_series where name='grn'";
                                        $result = mysqli_query($db,$sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">GRN No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="grn_no" readonly class="form-control " placeholder="" name="grn_no" value="<?php echo date('y',strtotime('-1 year')).'-'.date('y').'/'.$row['2']; ?>"/>
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

                                                    $sql = "SELECT DISTINCT supplier_id_fk FROM purchase_order";
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='".$row['0']."'";
                                                        $res_supplier = mysqli_fetch_array(mysqli_query($db, $get_supplier));
                                                        ?>
                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $res_supplier['1']?></option>
                                                        <?php
                                                    }
                                                    ?>
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
                                                <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no" onchange="getPurchaseOrderDetails()">
                                                  
                                                </select>
                                                <!-- <div id="po_no_error">
                                                    <span class="alert alert-danger p-0">PO no. is Required</span>
                                                </div> -->
											</div>
											<label class="col-md-2 label-control" for="userinput1">Reference No</label>
				                        	<div class="col-md-4">
                                                <input type="text" readonly id="work_no" class="form-control " placeholder="" name="work_no" />
                                                
                                            </div>

			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Address</label>
				                        	<div class="col-md-9">
                                                <textarea type="text" class="form-control" rows="4" placeholder="Address" name="address" id="address" style="height: auto;"></textarea>
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
                                                <input type="text" class="form-control" placeholder="Mobile No" name="mobile_no" id="mobile_no" />
                                                <!-- <div id="mobile_error">
                                                    <span class="alert alert-danger p-0">Mobile no. is Required</span>
                                                </div> -->
                                            </div>
                                            
			                       		</div>
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">UnLoaded By</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="unloaded_by" class="select2" data-toggle="select2" name="unloaded_by">
                                                    <option value="" disabled selected>Select</option>
                                                    <?php 
                                                        $get_emp = "SELECT emp_id_pk, emp_name FROM mstr_employee WHERE emp_status=1";
                                                        $res_emp = mysqli_query($db, $get_emp) or die(mysqli_error($db));
                                                        while($row1=mysqli_fetch_row($res_emp))
                                                        {
                                                            echo '<option value="'.$row1[0].'">'.$row1[1].'</option>';
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
                                            <label class="col-md-3 label-control" for="userinput1">Prepared By</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="prepared_by" class="select2" data-toggle="select2" name="prepared_by">
                                                    <option value="" disabled selected>Select</option>
                                                    <?php 
                                                        $get_emp = "SELECT emp_id_pk, emp_name FROM mstr_employee WHERE emp_status=1";
                                                        $res_emp = mysqli_query($db, $get_emp) or die(mysqli_error($db));
                                                        while($row1=mysqli_fetch_row($res_emp))
                                                        {
                                                            echo '<option value="'.$row1[0].'">'.$row1[1].'</option>';
                                                        }
                                                    ?>
                                                    
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Challan No <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="" name="challan_no" id="challan_no" />
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
                                                <textarea type="text" class="form-control"  placeholder="Remark" name="Remark" id="Remark"></textarea>
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
              <!-- <table id="tbl" class="table table-centered display compact nowrap"> -->
              <table class="display table" id="tbl" style="width: 100%;font-size: smaller;">
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

        <div class="row mt-2">
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
                                <label class="col-md-9 label-control" for="userinput1" style="font-size: 18px;">Gross Amount</label>
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
                            <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Others +/-</label>
                                
                                <div class="col-md-5">
                                    
                                </div>
                                
                                <div class="col-md-3">
                                    <input type="text" class="form-control " name="adjustment_final" id="adjustment_final" value="0" onkeyup='get_final_amount(this.value);' >
                                </div>
                            
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 ">
                                    <b style="font-size: 22px;">Total</b> <span style="color:red;"> *</span>
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
        </div>
        <!-- <hr> -->


        <div class="form-actions right">
        
            <button type="button" name="add_supplier" class="btn btn-primary" id="btn" onclick="submit_data();">
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
  
    table= $('#tbl').DataTable( {
    
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
        language : {
        "zeroRecords": " "             
    }
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
    document.getElementById('po_no').innerHTML = null;

    // po_no.html = 


    fetchSupplierData(supplier);

    $.ajax({
        type: "POST",
        url:"../../api/purchase/get-purchase-order-no.php",
        data:'supplier='+supplier,
        dataType: 'json',
        success:function(data)
        {
            console.log(data);
            document.getElementById('po_no').options[0]=new Option("select po","")
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
 
// fetch suppler data
function fetchSupplierData(supplier)
{
    $.ajax({
        url: '../../api/supplier/fetch_supplier_data.php',
        type: 'POST',
        data: { 'supplier': supplier },
        success: function (data) {
            var d = JSON.parse(data);
            $('#mobile_no').val(d.phone);
            $('#address').val(d.address);
        }
    });
}

function getPurchaseOrderDetails ()
{   
    
    var po_no=document.getElementById('po_no').value; 
    getRefernceNo(po_no);

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
            var id=`<p class="d-none">${data[index].id}</p>`;
            var final_product_code=`<select class="form-control"><option value="${data[index].item_id_pk}" selected>${data[index].design_code}</option></select>`;
            var design_code=`<p class="d-none">${data[index].design_code}</p>`;
            var size=`<p>${data[index].size}</p>`;
            var quantity=`<p>${data[index].quantity}</p>`;
            var rate= `<p>${data[index].rate}</p>`;
            var amount= `<p>${data[index].rate}</p>`;
            var act_quantity=`<input type="number" min=0 id="act_quantity" class="form-control" value="${data[index].act_quantity}" oninput="show_amount()" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
            var act_rate=`<input type="number" min=0 id="act_rate" class="form-control" value="${data[index].act_rate}" oninput="show_amount()" onkeypress="this.style.width = ((this.value.length +  3) * 10) + 'px';" />`;
            var act_amount= `<input type="text" readonly id="amt" class="form-control" value="${data[index].quantity*data[index].rate}" />`;

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

function getRefernceNo(po_no)
{
    var yr = '<?php echo date('y', strtotime('-1 year')).'-'.date('y').'/' ?>';
    $.ajax({
        url: '../../api/purchase/get_reference_no.php',
        type: 'POST',
        data: { 'po_no': po_no },
        success: function (data) {
            data = JSON.parse(data);
            if(data.work_no == null && data.rpo_no != null)
            {
                $('#work_no').val('R-'+data.rpo_no);
            }
            else if(data.rpo_no == null && data.work_no != null)
            {
                $('#work_no').val('SO-'+data.work_no);
            }
            else 
            {
                $('#work_no').val('M-'+yr+$('#po_no').val());
            }
        }
    })
}

function submit_data()
{

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
    // vertical table value
    var total = document.getElementById('total').value;
    var act_qty_final = document.getElementById('act_qty_final').value;
    var adjustment_final = document.getElementById('adjustment_final').value;
    // var process_amount = document.getElementById('process_amount').value;
    var final_total = document.getElementById('final_total').value;

    if(supplier == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Supplier is required..',
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
                    text: 'PO No is required..',
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
                    text: 'Address is required..',
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
                    text: 'Challan No is required..',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
       // document.getElementById("challan_no_error").style.display = "block";
        return;
    }

    if(mobile_no == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Mobile No is required..',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //document.getElementById("mobile_error").style.display = "block";
        return;
    }


    if(Remark == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Remark is required..',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      //  document.getElementById("remark_error").style.display = "block";
        return;
    }

    // Add table data to JS array
    var rawItemArray = [];
    var count=table.rows().count();

    
    var i=0;
    table.rows().eq(0).each( function ( index ) 
    { 


    
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
    var status = confirm('Approve GRN') ? 1 : 0;    

    $.ajax(
        {

        url: "../../api/purchase/add_grn.php",
        type: 'POST',
        data : 
        {
            'rawItemArray' : newRawItemArray,
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
            'status': status
        },
        dataType:'text',  
        success: function(data)
        { 
            console.log(data);
            if(data == "1")
            {
                $.toast({
                    heading: 'Success',
                    text: 'GRN Added Sussesfully',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                    window.location.href = 'view_grn.php';    
                }, 5000);
                // disable button after inserting to avoid re-submission

                $('#btn').attr('disabled', true);
                // alert('GRN Added Successfully!');
                // window.location.href = "view_grn.php";
            
            }
            else
            {
                $.toast({
                    heading: 'Error',
                    text: 'Someting went wrong',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
                // alert('Something went wrong!');
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