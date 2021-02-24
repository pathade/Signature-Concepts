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
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Supplier Purchase Order</h4>
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

                                            $sql = "SELECT * FROM mstr_data_series where name='purchase_order'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        	<label class="col-md-3 label-control" for="userinput1">PO No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="po_no" class="form-control " placeholder="" name="po_no" value="<?php echo "PO-".$row['2']; ?>" >
											</div>
											<label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>">
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
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Supplier</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier">
                                                <option value="" disabled selected>Select Supplier </option>
                                                <?php

                                                    $sql = "SELECT * FROM mstr_supplier";
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
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Length</label>
				                        	<div class="col-md-3">
												<input type="text" id="lenght" class="form-control " placeholder="" name="length" >
											</div>
											<label class="col-md-2 label-control" for="userinput1">Width</label>
				                        	<div class="col-md-4">
												<input type="text" id="width" class="form-control " placeholder="" name="width" >
											</div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" class="form-control " placeholder="0" name="mobile_no" >
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1"> Work No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="work_no" class="form-control " placeholder="0" name="work_no" >
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Address</label>
				                        	<div class="col-md-10 divcol">
												<input type="text" class="form-control"  placeholder="Address" name="address" id="address" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Remark </label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control"  placeholder="Remark" name="Remark" id="Remark"></textarea>
                                            </div>
				                        </div>
									</div>
		                        </div>
							</div>
                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        
                                                    <div class="table-responsive">
                                                             <table class="border-bottom-0 table table-hover" id="tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ITEM DETAILS</th>
                                                                        <th>ACCOUNT</th>
                                                                        <th>QUANTITY</th>
                                                                        <th>RATE</th>
                                                                        <th>DISCOUNT %</th>
                                                                        <th>DISCOUNT Rs</th>
                                                                        <th>AMOUNT</th>
                                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                        <td>   <select class="form-control" id="item_id0"  onchange="get_item(this.id)" >
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
                                                             
                                                            </select></td>
                                                                        <td><select class=" form-control block" id="account0">
                                                                 <option value="" disabled selected>Select Account</option>
                                                              
                                                                       <option value="Advance Tax">Advance Tax</option>
                                                                       <option value="Employee">Employee</option>
                                                                       <option value="Prepaid Expenses">Prepaid Expenses</option>
                                                                       <option value="TDS Receivable">TDS Receivable</option>
                                                                  
                                                             
                                                            </select></td>
                                                                        <td><input type="text" id="quantity0" class="form-control" value="1.00" onkeyup="get_quantity_value(this.id);"/></td>
                                                                        <td><input type="text" id="rate0" class="form-control" value="0.00" readonly/></td>
                                                                        
                                                                        <td><div class="input-group">
                                                                                 <input type="text" class="form-control" id="table_discount_per0" value="0"  onkeyup="get_row_discount_value1(this.id);">
                                                                                  
                                                                            </div>
                                                                        </td>
                                                                        <td><div class="input-group">
                                                                                 <input type="text" class="form-control" id="table_discount_rs0" value="0" onkeyup="get_row_discount_value(this.id);">
                                                                                  
                                                                            </div>
                                                                        </td>
                                                                        <td><input type="text" id="amount0" class="form-control" value="0.00" /></td>
                                                                     
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
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
                                            </div>
                                            <hr>
                                          
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
                                    var item="<select class='form-control block'  id='item_id"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
                                    var account="<select class=' form-control block' id='account"+i+"'  ><option value='' disabled selected>Select Account</option><option value='Advance Tax'>Advance Tax</option><option value='Employee'>Employee</option><option value='Prepaid Expenses'>Prepaid Expenses</option><option value='TDS Receivable'>TDS Receivable</optio</select>"
                                    var quantity="<input type='text' id='quantity"+i+"' class='form-control' value='1.00' onkeyup='get_quantity_value(this.id);'>"
                                    var rate= "<input type='text' id='rate"+i+"' class='form-control' value='0.00' readonly>"
                                    var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';></div>";
                                    var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
                                    var amount="<input type='text' id='amount"+i+"' class='form-control' value='0.00'>";
                                    table.row.add( [
  
                                        item,
                                        account,  
                                        quantity,
                                        rate,
                                        discount_per ,
                                        discount_rs ,
                                        amount ,
                                    
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

                                  
                                    document.getElementById('total').value=amount;
                                  
                                    document.getElementById('discount_final').value=discount;
                                    // document.getElementById('final_total').value=amount;


                                  
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
                                      <script>
                                            $(document).ready(function(){
                                                $('#add_purchase_order').on('click', function () {
  
                                                var purchase_order_no = document.getElementById('po_no').value;
                                                var date = document.getElementById('date').value;
                                                var supplier_id = $("#supplier").val();
                                                var length = document.getElementById('lenght').value;
                                                var width=document.getElementById('width').value; 
                                                var mobile_no=document.getElementById('mobile_no').value; 
                                                var work_no=document.getElementById('work_no').value; 
                                                var branch=document.getElementById('branch').value; 
                                                var address=document.getElementById('address').value; 
                                                var Remark=document.getElementById('Remark').value;
                                                var total = document.getElementById('total').value;
                                                var discount_final = document.getElementById('discount_final').value;
                                                var adjustment_final = document.getElementById('adjustment_final').value;
                                                var final_total = document.getElementById('final_total').value;
                                                var process_amount = document.getElementById('process_amount').value;


                                                // Add table data to JS array
                                                var rawItemArray = [];
                                                var count=table.rows().count();

                                                
                                                var i=0;
                                                table.rows().eq(0).each( function ( index ) 
                                                { 

                                                // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
                                                
                                                var row = table.row( index );
                                                var data = row.data();
                                                var item_id_fk =table.cell(i,0).nodes().to$().find('select').val();
                                                var account =table.cell(i,1).nodes().to$().find('select').val();
                                                var quantity =table.cell(i,2).nodes().to$().find('input').val();
                                                var rate =table.cell(i,3).nodes().to$().find('input').val();
                                                // var main_discount_type1=document.getElementById('main_discount_type1').innerHTML;
                                                var discount_rs =table.cell(i,4).nodes().to$().find('input').val();
                                                var discount_per=0;
                                                var amount=table.cell(i,5).nodes().to$().find('input').val();


                                                rawItemArray.push({
                                                    item_id_fk : item_id_fk,
                                                    account:account,  
                                                    quantity:quantity,
                                                    rate:rate,
                                                    discount_rs:discount_rs,
                                                    discount_per:discount_per,
                                                    amount:amount
                                                    

                                                
                                                
                                                });
                                                i++;
                                                });

                                                var newRawItemArray = JSON.stringify(rawItemArray);

                                                console.log(newRawItemArray);

                                                $.ajax(
                                                    {

                                                    url: "../../api/purchase/add_purchase_order.php",
                                                    type: 'POST',
                                                    data : 
                                                    {
                                                        'rawItemArray' : newRawItemArray,
                                                        'purchase_order_no':purchase_order_no,
                                                        'date':date,
                                                        'supplier_id':supplier_id,
                                                        'length':length,
                                                        'width':width,
                                                        'work_no':work_no,
                                                        'mobile_no':mobile_no,
                                                        'total':total,
                                                        'discount_final':discount_final,
                                                        'adjustment_final':adjustment_final,
                                                        'final_total':final_total,
                                                        'Remark':Remark,
                                                        'address':address,
                                                        'process_amount':process_amount,
                                                        'branch':branch



                                                    },

                                              
                                                    
                                                    dataType:'text',  
                                                    success: function(data)
                                                    { 
                                                        console.log(data);
                                                        if(data == "1")
                                                            {
                                                                $.toast({
                  heading: 'Success',
                  text: 'Purchase Order Added Sussesfully',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
                                                            }
                                                            else
                                                            {
                                                                alert("Please Enter Valid Details");
                                                            }
                                                    
                                                    },
                                                    
                                                    });

                                                }); 
                                            });
                                    </script>