<?php include('../../partials/header.php');?>

<?php
    $sql = "SELECT * FROM supplier_return_good";
    $row = mysqli_fetch_assoc(mysqli_query($db, $sql));

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
    .dt-center{
        text-align: center
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Supplier Return Good</h4>
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
                                        
			                        	<div class="form-group row">
                                            <!-- fetch return no. -->
                                            <?php 
                                                $return_no = "SELECT * FROM mstr_data_series WHERE name='supplier_return_good'";
                                                $return_no_res = mysqli_fetch_array(mysqli_query($db, $return_no));
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">Return No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="return_no" readonly class="form-control " name="return_no" value="<?php echo $row['return_no'] ?>" />
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
                                            <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier">
                                            <?php
                                                $get_supp = "SELECT supplier_id_fk,name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier']."'";
                                                $res_supp = mysqli_fetch_row(mysqli_query($db, $get_supp));
                                                echo '<option value="'.$res_supp[0].'">'.$res_supp[1].'</option>';
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
                                        	<label class="col-md-3 label-control" for="userinput1">GRN No. <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="grn_no" class="select2" data-toggle="select2" name="grn_no" >

                                            <?php
                                                $get_grn = "SELECT grn_id_pk,grn_no FROM grn WHERE grn_id_pk='".$row['grn_no']."'";
                                                $res_grn = mysqli_fetch_row(mysqli_query($db, $get_grn));
                                                echo '<option value="'.$res_grn[0].'">'.$res_grn[1].'</option>';
                                            ?>
                                                  
                                                </select>
                                                <!-- <div id="grn_no_error">
                                                    <span class="alert alert-danger p-0">GRN no. is Required</span>
                                                </div> -->
											</div>

			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Address <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <textarea type="text" class="form-control" rows="4" placeholder="Address" name="address" id="address" style="height: auto;" readonly><?php echo $row['address'] ?></textarea>
                                                <!-- <div id="address_error">
                                                    <span class="alert alert-danger p-0">Address is Required</span>
                                                </div> -->
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mobile No <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control" readonly placeholder="Mobile No" name="mobile_no" id="mobile_no" value="<?php echo $row['mobile_no'] ?>" />
                                                <!-- <div id="mobile_error">
                                                    <span class="alert alert-danger p-0">Mobile no. is Required</span>
                                                </div> -->
                                            </div>
                                            
			                       		</div>
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Transporter</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block js-example-tags" id="transporter" class="select2" data-toggle="select2" name="transporter">
                                                <?php
                                                $get_trans = "SELECT t_id_pk,name FROM mstr_transporter WHERE t_id_pk='".$row['transporter']."'";
                                                $res_trans = mysqli_fetch_row(mysqli_query($db, $get_trans));
                                                echo '<option value="'.$res_trans[0].'">'.$res_trans[1].'</option>';
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
                                                <?php
                                                $get_emp = "SELECT emp_id_pk,emp_name FROM mstr_employee WHERE emp_id_pk='".$row['prepared_by']."'";
                                                $res_emp = mysqli_fetch_row(mysqli_query($db, $get_emp));
                                                echo '<option value="'.$res_emp[0].'">'.$res_emp[1].'</option>';
                                            ?>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Vehicle</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block js-example-tags" id="vehicle" class="select2" data-toggle="select2" name="vehicle">
                                                    <?php
                                                    $get_vehicle = "SELECT tv_id_pk,v_name FROM mstr_transporter_vehicle WHERE tv_id_pk='".$row['vehicle']."'";
                                                    $res_vehicle = mysqli_fetch_row(mysqli_query($db, $get_vehicle));
                                                    echo '<option value="'.$res_vehicle[0].'">'.$res_vehicle[1].'</option>';
                                                    ?>
                                                    
												</select>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
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
                      <th>Item Detail</th>
                      <th></th>
                      <th>Size</th>
                      <th>Qunatity</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Actual Qty</th>
                      <th>Actual Rate</th> 
                      <th>Actual Amt</th>
                      <th>GST %</th>
                      <th>CGST</th>
                      <th>SGST</th>
                      <th>IGST</th>
                    </tr>
                  </thead>
                  <tbody id="tbody"></tbody>
              </table>
            </div>
           
        </div>

        <div class="row mt-2">
            <div class="col-md-12 right-border">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="label-control" for="userinput1" >Gross Amount</label>&nbsp;
                        <input type="text" class="form-control " placeholder="" name="total" id="total" value="0.00" />
                    </div>
                    <div class="col-md-2">
                        <label class="label-control" for="userinput1" >Total Quantity</label>&nbsp;
                        <input type="text" class="form-control " name="act_qty_final" id="act_qty_final" value="" readonly />
                    </div>
                    <div class="col-md-2">
                        <label class="label-control" for="userinput1" >Disc Amt.</label>
                        <input type="text" class="form-control"  placeholder="0" name="discount_amt" id="discount_amt" value="0" onkeyup="get_discount_amt_value(this.id);" />
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
                    <div class="col-md-2 mt-1">
                        <label class="label-control" for="userinput1" >Others +/-</label>&nbsp;
                        <input type="text" class="form-control " name="adjustment_final" id="adjustment_final" value="0" onkeyup='get_final_amount(this.value);' >
                    </div>
                    <div class="col-md-2 mt-1">
                        <label class="label-control" for="userinput1" >TCS</label>&nbsp;
                        <input type="text" class="form-control"  placeholder="0" name="tcs" id="tcs" style="" value="0">
                    </div>
                    <div class="col-md-2 mt-1">
                        <label class="label-control" for="userinput1" >Tax Amount</label>&nbsp;
                        <input type="text" class="form-control" name="tax_amt" id="tax_amt" value="0" >
                    </div>
                    <div class="col-md-2 mt-1">
                        <label class="label-control" for="userinput1" >Total <span style="color:red;"> *</span></label>&nbsp;
                        <input type="text" class="form-control " name="final_total" id="final_total" value="" readonly>
                    </div>
                </div>
            </div>

        </div>
        <hr>


	                        <div class="form-actions right">
                           
								<button type="button" name="add_supplier" id="btn" class="btn btn-primary" onclick="submit_data();">
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(".js-example-tags").select2({
  tags: true
});
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

    window.setInterval(function()
        {
            var count=table.rows().count();


            var amount=0;
            var act_qty=0;
            var tax=0;

            for(var i=0;i<count;i++)
            {
            
                var tbl4=table.cell(i,11).nodes().to$().find('input').val()
        
                var amount= parseInt(amount) +parseInt(tbl4);

                var tbl5=table.cell(i,9).nodes().to$().find('input').val()
        
                var act_qty= parseInt(act_qty) +parseInt(tbl5);

                var tbl15=table.cell(i,15).nodes().to$().find('p').text();

                var tax = parseFloat(tax) + parseFloat(tbl15);
        
        
            }

        
        document.getElementById('total').value=amount;
        
        document.getElementById('act_qty_final').value=act_qty;

        document.getElementById('tax_amt').value=tax;


        
    },1000);

});
//   //hide all error span
  
//   document.getElementById("supplier_error").style.display = "none";
//   document.getElementById("grn_no_error").style.display = "none";
//   document.getElementById("address_error").style.display = "none";
//   document.getElementById("mobile_error").style.display = "none";
//   ///////////////////////////
// });

function get_final_amount(e) {                                      
    var total=document.getElementById('total').value;
    var adjustment_final=document.getElementById('adjustment_final').value;
    var tax_amt=document.getElementById('tax_amt').value;
    // var process_amount=document.getElementById('process_amount').value;

    if(adjustment_final==''){
        var final_amount=parseFloat(total) + parseFloat(tax_amt);
        document.getElementById("final_total").value=final_amount;
    }
                    
    else{
        var final_amount=parseFloat(total)+parseFloat(adjustment_final) + parseFloat(tax_amt);
        document.getElementById("final_total").value=final_amount;
    }
                
}


function show_amount() 
{
    var amt = document.querySelectorAll('#amt');
    var rate = document.querySelectorAll('#act_rate');
    var quantity = document.querySelectorAll('#act_quantity');
    var gst_per = document.querySelectorAll('#gst_per');
    var cgst = document.querySelectorAll('#cgst');
    var sgst = document.querySelectorAll('#sgst');
    var igst = document.querySelectorAll('#igst');

    for(var i=0; i<rate.length; i++)
    {
        amt[i].value = rate[i].value * quantity[i].value;
        var gst = amt[i].value * parseInt(gst_per[i].innerText)/100;
        cgst[i].innerText = gst;
        sgst[i].innerText = gst;
        igst[i].innerText = gst + gst;

    }
}


function getGRNNo()
{   
    
    var supplier=document.getElementById('supplier').value; 
    fetchSupplierData(supplier);

    $.ajax({
        type: "POST",
        url:"../../api/purchase/get_grn_no.php",
        data:'supplier='+supplier,
        dataType: 'json',
        success:function(data)
        {
            console.log("Data: "+data);
            document.getElementById('grn_no').options[0]=new Option("select grn","")
            for (var i = 0; i < data.length; i++) 
            {
                var option = document.createElement("option");
                option.setAttribute("value", data[i]["id"]);
                option.text = data[i]["name"];
                document.getElementById('grn_no').appendChild(option);
            }
        }
    });
    
    
}

// fetch supplier data
function fetchSupplierData (supplier) 
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



function getGrnDetails ()
{   
    
    var grn_no=$('#grn_no').val(); 
    table.clear().draw();
    $.ajax({
        url: '../../api/purchase/get-grn-table-by-grn-no.php',
        type: "POST",
        data : 
        {
            'grn_no' : grn_no

        },
        dataType:'json',

        success:function(data){
            
        console.log('Data: '+data);
        $.each(data, function(index) 
        {
    
            var start=`<p class="dt-center">${data[index].start}</p>`; 
            var select='';   
            var id=`<p class="dt-center d-none">${data[index].id}</p>`;
            var item_detail=`<p class="dt-center">${data[index].item_detail}</p>`;
            var design_code=`<p class="dt-center d-none">${data[index].design_code}</p>`;
            var size=`<p class="dt-center">${data[index].size}</p>`;
            var quantity=`<p class="dt-center">${data[index].quantity}</p>`;
            var rate= `<p class="dt-center">${data[index].rate}</p>`;
            var amount= `<p class="dt-center">${data[index].rate}</p>`;
            var act_quantity=`<input type="number" class="dt-center" min=0 id="act_quantity" value="${data[index].act_quantity}" oninput="show_amount()" />`;
            var act_rate=`<input type="number" class="dt-center" min=0 id="act_rate" value="${data[index].act_rate}" oninput="show_amount()" />`;
            var act_amount= `<input type="text" class="dt-center" readonly id="amt" value="${data[index].quantity*data[index].rate}" />`;
            var gst_per= `<p id="gst_per" class="dt-center">${data[index].gst_per}</p>`;
            var cgst= `<p id="cgst" class="dt-center">${data[index].cgst}</p>`;
            var sgst= `<p id="sgst" class="dt-center">${data[index].sgst}</p>`;
            var igst= `<p id="igst" class="dt-center">${data[index].igst}</p>`;

            table.row.add( [
                    start,
                    select,
                    id,
                    item_detail,
                    design_code,
                    size,
                    quantity,
                    rate,
                    amount,
                    act_quantity,
                    act_rate,
                    act_amount,
                    gst_per,
                    cgst,
                    sgst,
                    igst,
                    ] ).draw( false );
            }); 
        }
    });

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function submit_data()
{

    var branch = document.getElementById('branch').value;
    var address = document.getElementById('address').value;
    var grn_no = document.getElementById('grn_no').value;
    var date = document.getElementById('date').value;
    var return_no = document.getElementById('return_no').value;
    var supplier = document.getElementById('supplier').value;
    var prepared_by = document.getElementById('prepared_by').value;
    var stock_point = document.getElementById('stock_point').value;
    var transporter = document.getElementById('transporter').value;
    var vehicle = document.getElementById('vehicle').value;
    var mobile_no = document.getElementById('mobile_no').value;

    var total = document.getElementById('total').value;
    var act_qty_final = document.getElementById('act_qty_final').value;
    var adjustment_final = document.getElementById('adjustment_final').value;
    var tax_amt = document.getElementById('tax_amt').value;
    var final_total = document.getElementById('final_total').value;

    if(supplier == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Please Select Supplier.',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //document.getElementById("supplier_error").style.display = "block";
        return;
    }
    
    if(grn_no == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Please Enter GRN No.',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //document.getElementById("grn_no_error").style.display = "block";
        return;
    }

    if(address == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Address is Required.',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
       // document.getElementById("address_error").style.display = "block";
        return;
    }

    if(mobile_no == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Please Enter Mobile No.',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
      //  document.getElementById("mobile_error").style.display = "block";
        return;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    var item_detail = table.cell(i,3).nodes().to$().find('p').text();
    var design_code = table.cell(i,4).nodes().to$().find('p').text();
    var size = table.cell(i,5).nodes().to$().find('p').text();
    var quantity = table.cell(i,6).nodes().to$().find('p').text();
    var rate = table.cell(i,7).nodes().to$().find('p').text();
    var amount = table.cell(i,8).nodes().to$().find('p').text();
    var act_quantity = table.cell(i,9).nodes().to$().find('input').val();
    var act_rate = table.cell(i,10).nodes().to$().find('input').val();
    var act_amount = table.cell(i,11).nodes().to$().find('input').val();
    var gst_per = table.cell(i,12).nodes().to$().find('p').text();
    var cgst = table.cell(i,13).nodes().to$().find('p').text();
    var sgst = table.cell(i,14).nodes().to$().find('p').text();
    var igst = table.cell(i,15).nodes().to$().find('p').text();


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
        act_amount: act_amount,
        gst_per: gst_per,
        cgst: cgst,
        sgst: sgst,
        igst: igst,
    });

    i++;
    
});

    var newRawItemArray = JSON.stringify(rawItemArray);

    console.log(newRawItemArray);    
    if(final_total == '')
    {
        $.toast({
                    heading: 'Error',
                    text: 'Please Check total amount.',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //alert('Please check total amount');
        return;
    }    
    $.ajax(
        {

        url: "../../api/purchase/add_supplier_return_good.php",
        type: 'POST',
        data : 
        {
            'rawItemArray' : newRawItemArray,
            'date': date,
            'return_no': return_no,
            'supplier': supplier,
            'mobile_no': mobile_no,
            'address': address,
            'branch': branch,
            'grn_no': grn_no,
            'prepared_by': prepared_by,
            'stock_point': stock_point,
            'transporter': transporter,
            'vehicle': vehicle,
            'total': total,
            'final_quantity': act_qty_final,
            'adjustment': adjustment_final,
            'tax_amt': tax_amt,
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
                text: 'Supplier Return goods Added Sussesfully',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'success'
            })
            setTimeout(() => {
                window.location.href = 'view_supplier_return_good.php';    
            }, 5000);
                $('#btn').attr('disabled', true);
                // alert('Supplier Return Goods Added!');
                // window.location.href="view_supplier_return_good.php";
            
            }
            else
            {
                $.toast({
                    heading: 'Error',
                    text: 'Something went wrong',
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
</script>