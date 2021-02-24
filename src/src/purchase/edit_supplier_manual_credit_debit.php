<?php include('../../partials/header.php');?>

<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT dc.*, ms.supplier_id_fk, ms.name, mt.tax_id_pk , mt.tax_name FROM supplier_manual_debit_credit dc, mstr_supplier ms, mstr_tax mt WHERE dc.supplier_id_fk = ms.supplier_id_fk and mt.tax_id_pk = dc.tax_id_fk and id='$edit_id'";
    $result_charges = mysqli_query($db, $sql_charges);
    while ($row=mysqli_fetch_row($result_charges))
    {

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
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Supplier Manual Credit Debit</h4>
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
                                            <label class="col-md-3 label-control" for="userinput1" >Type</label>
                                            <?php 
                                                                if($row[1] == 'debit' )
                                                                {?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="type" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="debit" checked >&nbsp; Debit
                                                                    </div>
                                                            <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="type" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="debit" >&nbsp; Debit
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($row[1] == 'credit' )
                                                                {
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="type" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="credit" checked>&nbsp; Credit
                                                                    </div>
                                                                    <?php

                                                                }
                                                                else{
                                  
                                                            ?>
                                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                <input type="radio" class="form-control " name="type" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="credit" >&nbsp; Credit
                                                            </div>
                                                        <?php } ?>
				                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-9">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo  $row['3'] ?>">
											</div>
                                    </div>
                                    </div>
                                </div>
                         
                                <div class="row">
	                    			<div class="col-md-6">
                                    <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Supplier</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier">
                                                <option value="<?php echo  $row['20'] ?>" disabled selected><?php echo  $row['20'] ?></option>
                                                <?php

                                                    $sql = "SELECT * FROM mstr_supplier";
                                                    $result1 = mysqli_query($db,$sql);
                                                    while($row1 = mysqli_fetch_array($result1))
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
                                        	<label class="col-md-3 label-control" for="userinput1">Debit/Credit No.</label>
				                        	<div class="col-md-9">
												<input type="text" id="credit_debit_no" class="form-control " placeholder="" name="credit_debit_no" value="<?php echo  $row['2'] ?>" />
											</div>
											
			                       	</div>
                                       </div>
									<div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                    <option value="<?php echo  $row['6'] ?>" disabled selected><?php echo  $row['6'] ?></option>
                                                    <option value="abcd">abcd</option>
                                                    <option value="abcd1">abcd1</option>
                                                    <option value="abcd">abcd2</option>
                                                </select>
                                            </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 text" for="userinput1">Branch </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch">
                                                    <option value="<?php echo  $row['5'] ?>" disabled selected><?php echo  $row['5'] ?></option>
                                                    <option value="Signature Concepts">Signature Concepts LLP</option>
                                                    <option value="NKS Aromas">NKS Aromas</option>
                                                    
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Transaction Amount</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="transaction_amount" class="form-control " placeholder="Transaction Amount" name="transaction_amount" value="<?php echo  $row['8'] ?>" onkeyup="get_amount(this.value);" />
											
                                                </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
                                    <!-- <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Amount</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="amount" class="form-control " placeholder="Amount" name="amount" value="<?php echo  $row['7'] ?>" />
											
                                                </div>
                                        </div> -->
				                    </div>
                                    
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Total</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="total" class="form-control " placeholder="Total" name="total" value="<?php echo  $row['9'] ?>" />
											
                                                </div>
                                        </div>
				                    </div>
                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Tax</label>
                                                <div class="col-md-9">
                                                <select class="select2 form-control block" id="tax" class="select2" data-toggle="select2" name="tax" onchange="gettaxamount(this.value)">
                                                    <option value="<?php echo  $row['9'] ?>" disabled selected><?php echo  $row['9'] ?></option>
                                                    <?php

                                                        $sql = "SELECT * FROM mstr_tax where active_status='1'";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row2['0'];?>"><?php echo  $row2['1']?></option>
                                                            <?php
                                                        }
                                                        ?>
												</select>
											
                                                </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Tax Amount</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="tax_amount" class="form-control " placeholder="Total" name="tax_amount" value="<?php echo  $row['11'] ?>">
											
                                                </div>
                                        </div>
				                    </div>
                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Other(+/-)</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="other" class="form-control " placeholder="Other(+/-)" name="other" value="<?php echo  $row['12'] ?>" onkeyup="getotheramount(this.value);">
											
                                                </div>
                                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Final Amount</label>
                                                <div class="col-md-9">
                                                
												<input type="text" id="final_amount" class="form-control " placeholder="Final Amount" name="final_amount" value="<?php echo  $row['13'] ?>">
											
                                                </div>
                                        </div>
				                    </div>
                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                                <label class="col-md-2 label-control" for="userinput1">Remark</label>
                                                <div class="col-md-9">
                                                
                                                <textarea type="text" class="form-control" name="remark" id="remark" value="<?php echo  $row['14'] ?>"><?php echo  $row['14'] ?></textarea>
											
                                                </div>
                                        </div>
				                    </div>
                                   
                     
                                    </div>
		                        </div>
		                       
							</div>
	                        <div class="form-actions right">
								
								<button type="button" name="add_supplier" class="btn btn-primary" onclick="submit_data();">
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
           
        "columnDefs": 
        [ 
          
          {
              "targets": 1,
              "data": null,
              "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn action-icon mdi mdi-delete\"></button>"
          } 
        ],
    destroy:true,
  });

  window.setInterval(function()
        {
            var count=table.rows().count();


            var amount=0;
            var act_qty=0;

            for(var i=0;i<count;i++)
            {
            
                var tbl4=table.cell(i,10).nodes().to$().find('input').val()
        
                var amount= parseInt(amount) +parseInt(tbl4);

                var tbl5=table.cell(i,8).nodes().to$().find('input').val()
        
                var act_qty= parseInt(act_qty) +parseInt(tbl5);
        
        
            }

        
        document.getElementById('total').value=amount;
        
        document.getElementById('act_qty_final').value=act_qty;
        // document.getElementById('final_total').value=amount;


        
        },1000);


  //hide all error span
  
  document.getElementById("supplier_error").style.display = "none";
  document.getElementById("po_no_error").style.display = "none";
  document.getElementById("address_error").style.display = "none";
  document.getElementById("mobile_error").style.display = "none";
  document.getElementById("remark_error").style.display = "none";
  document.getElementById("work_no_error").style.display = "none";
  document.getElementById("challan_no_error").style.display = "none";
  ///////////////////////////
});

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

    alert(po_no);
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
            var account=`<p>${data[index].account}</p>`;
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
                    account,
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
    var process_amount = document.getElementById('process_amount').value;
    var final_total = document.getElementById('final_total').value;

    if(supplier == '')
    {
        document.getElementById("supplier_error").style.display = "block";
        return;
    }
    else
        document.getElementById("supplier_error").style.display = "none";
    
    if(po_no == '')
    {
        document.getElementById("po_no_error").style.display = "block";
        return;
    }
    else
        document.getElementById("po_no_error").style.display = "none";

    if(address == '')
    {
        document.getElementById("address_error").style.display = "block";
        return;
    }
    else
        document.getElementById("address_error").style.display = "none";

    if(challan_no == '')
    {
        document.getElementById("challan_no_error").style.display = "block";
        return;
    }
    else
        document.getElementById("challan_no_error").style.display = "none";

    if(mobile_no == '')
    {
        document.getElementById("mobile_error").style.display = "block";
        return;
    }
    else
        document.getElementById("mobile_error").style.display = "none";

    if(work_no == '')
    {
        document.getElementById("work_no_error").style.display = "block";
        return;
    }
    else
        document.getElementById("work_no_error").style.display = "none";

    if(Remark == '')
    {
        document.getElementById("remark_error").style.display = "block";
        return;
    }
    else
        document.getElementById("remark_error").style.display = "none";

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
    var account = table.cell(i,4).nodes().to$().find('p').text();
    var quantity = table.cell(i,5).nodes().to$().find('p').text();
    var rate = table.cell(i,6).nodes().to$().find('p').text();
    var amount = table.cell(i,7).nodes().to$().find('p').text();
    var act_quantity = table.cell(i,8).nodes().to$().find('input').val();
    var act_rate = table.cell(i,9).nodes().to$().find('input').val();
    var act_amount = table.cell(i,10).nodes().to$().find('input').val();


    rawItemArray.push({
        grn_id_fk : grn_id_fk,
        item_detail: item_detail,
        account: account,  
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
            'process_amount': process_amount,
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
<?php } ?>