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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Supplier Purchase Order</h4>
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

                                            $sql = "SELECT * FROM purchase_order WHERE id='".$_GET['id']."'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);

                                            ?>
                                            <div class="col-md-3 d-none">
												<input type="text" id="po_id" class="form-control" readonly value="<?php echo $_GET['id']; ?>" >
											</div>
                                        	<label class="col-md-3 label-control" for="userinput1">PO No.</label>
				                        	<div class="col-md-3">
												<input type="text" readonly id="po_no" class="form-control " placeholder="" name="po_no" value="<?php echo $row['3']; ?>" >
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
                                                <?php
                                                    $select_supplier = "SELECT ms.supplier_id_fk, name FROM mstr_supplier ms, purchase_order po WHERE ms.supplier_id_fk=po.supplier_id_fk AND po.id='".$_GET['id']."'";
                                                    $res_supp = mysqli_fetch_array(mysqli_query($db, $select_supplier));

                                                ?>
                                                <option value="<?php echo $res_supp['0'] ?>"><?php echo $res_supp['1'] ?></option>
                                                
												</select>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Proforma Inv. No.</label>
				                        	<div class="col-md-9">
                                                <input type="number" readonly id="pro_no" class="form-control " value="<?php echo $row['7'] ?>" name="pro_no" >
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" readonly id="mobile_no" class="form-control" name="mobile_no" value="<?php echo $row['5'] ?>">
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1"> Work No</label>
				                        	<div class="col-md-9">

                                                <input type="text" readonly id="work_no" class="form-control " name="work_no" value="<?php echo $row['6']; ?>" >
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Address</label>
				                        	<div class="col-md-10 divcol">
												<input type="text" readonly class="form-control"  name="address" id="address" value="<?php echo $row['8'] ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Remark </label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" readonly class="form-control" name="Remark" id="Remark"><?php echo $row['9'] ?></textarea>
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
                                                    $edit_id = $_GET['id'];
                                                    $m = "SELECT * FROM mstr_item";
                                                    $k = mysqli_query($db,$m);
                                                    while($kl = mysqli_fetch_array($k))
                                                    {
                                                        $m1 = "SELECT * FROM purchase_order_items WHERE purchase_order_id_fk='$edit_id'";
                                                        $k1 = mysqli_query($db,$m1);
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

                            <div class="row">
                                                <div class="col-md-12" style="margin-top: 25px;">
                                                    <!-- <div class="form-group row"> -->
                                                        
                                                    <div class="table-responsive">
                                                    <table class="display table" id="tbl" style="width: 100%;font-size: smaller;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>CATEGORY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DESIGN CODE &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Size &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>QUANTITY &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Sqrft &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>RATE &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>DISCOUNT %</th>
                                                                        <th>DISCOUNT Rs</th>
                                                                        <th>AMOUNT &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>REMARK &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <script>
                                                                            if(document.getElementById('work_no').value != '' || document.getElementById('pro_no').value != '')
                                                                            {
                                                                                document.write('<th></th>');
                                                                                document.write('<th></th>');
                                                                                document.write('<th></th>');
                                                                            }   
                                                                        </script>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                       
                                                    <!-- </div> -->
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
                                                                    <label class="col-md-9 label-control" for="userinput1" style="font-size: 18px;">Gross amt</label>
                                                                    <div class="col-md-3">
                                                                    <input type="text" class="form-control " placeholder="" name="total" id="total" value="<?php echo $row['10'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row" id="discount_row_hide">
                                                                    <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Discount</label>
                                                                    <div class="col-md-5">
                                                                  
                                                                   </div>
                                                                        
                                                                     
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="discount_final" id="discount_final" value="<?php echo $row['11'] ?>" readonly>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-group row">
                                                                <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Other +/-</label>
                                                                  
                                                                    <div class="col-md-5">
                                                                        
                                                                    </div>
                                                                 
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="adjustment_final" id="adjustment_final" value="<?php echo $row['12'] ?>" onkeyup='get_final_amount(this.value);' >
                                                                    </div>
                                                                
                                                                </div>

                                                                <!-- <div class="form-group row">
                                                                <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Process Amount</label>
                                                                  
                                                                    <div class="col-md-5">
                                                                        
                                                                    </div>
                                                                 
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="process_amount" id="process_amount" value="<?php echo $row['14'] ?>" onkeyup='get_final_amount(this.value);' >
                                                                    </div>
                                                                
                                                                </div> -->
                                                                <div class="form-group row">
                                                                    <div class="col-md-9 ">
                                                                        <b style="font-size: 22px;">Total</b>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="final_total" id="final_total" readonly>
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

    $('.select2-original').select2({
    	placeholder: "Choose elements",
      width: "100%"
    })
  

  //hide all error span
  
//   document.getElementById("supplier_name_error").style.display = "none";
//   document.getElementById("supplier_address_error").style.display = "none";
//   document.getElementById("phone_no1_error").style.display = "none";
//   document.getElementById("phone_no2_error").style.display = "none";
//   document.getElementById("contact_person_error").style.display = "none";
//   document.getElementById("pan_error").style.display = "none";
//   document.getElementById("gst_no_error").style.display = "none";
  ///////////////////////////
});


	
</script>


<script>
    var table="";
    
    $(document).ready(function()
    {
        var url = '';
        var updateItemId = '';
        var test = $('#sel-03');
        var ids = $(test).val(); // works
        console.log('Selected IDs123: ' + ids);
        if(document.getElementById('work_no').value != '')
        {
            url = "../../api/wholesale/get_woi_table_items_for_po.php";
            updateItemId = document.getElementById('work_no').value;
        }
        else if(document.getElementById('pro_no').value != '') 
        {
            url = "../../api/retail/get_rpi_table_items.php";
            updateItemId = document.getElementById('pro_no').value;
        }
        else 
        {
            url = "../../api/purchase/get_supplier_po_table.php";
            updateItemId = '<?php echo $_GET['id']; ?>';
        }
        var po_notbl = document.getElementById('po_no').value; 
        table = $('#tbl').DataTable( {
        searching:false,   
        ajax: {
                "url": url,
                "type": "POST",
                data : 
                {
                'itemId' : updateItemId,
                'po_notbl': po_notbl,
                'ids': ids
                },
            },
            deferRender: true,
        destroy:true,
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        
        language : {
        "zeroRecords": " ",
        }
    });                           

            window.setInterval(function()
            {
                var count=table.rows().count();
                var amount=0;
                var discount=0;

                for(var i=0;i<count;i++)
                {
                
                    var tbl4=table.cell(i,8).nodes().to$().find('input').val()
            
                    var amount= parseFloat(amount) +parseFloat(tbl4);

                    var tbl5=table.cell(i,7).nodes().to$().find('input').val()
            
                    var discount= parseFloat(discount) +parseFloat(tbl5);
            
            
                }

                                  
                document.getElementById('total').value=amount;
                
                document.getElementById('discount_final').value=discount;
                // document.getElementById('final_total').value=amount;


                
            },1000 );
    });


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
                    "url": "../../api/retail/get_rpi_table_items.php",
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

    function rate_enter(e)
    {
        var get_id = e.slice(e.length-1);
        var quantity = "quantity".concat(get_id);
        var quantity_value=document.getElementById(quantity).value;
        var rate = "rate".concat(get_id);
        var rate_value=document.getElementById(rate).value;
        var final_amt = parseInt(quantity_value) * parseInt(rate_value);
        var amt = "amount".concat(get_id);
        document.getElementById(amt).value = final_amt;
    }


                                
        function get_item(e) {
            var id=document.getElementById(e).value;
            getDesignCode(id);
            
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
                                        
                                        
        function get_row_discount_value(e) 
        {

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
                                                 

        function get_row_discount_value1(e) 
        {

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

        function get_final_amount(e) 
        {

            var total=document.getElementById('total').value;
            var adjustment_final=document.getElementById('adjustment_final').value;
            // var process_amount=document.getElementById('process_amount').value;
            if(adjustment_final==''){
                var final_amount=parseFloat(total);
                document.getElementById("final_total").value=final_amount;
            }
            else if(adjustment_final=='')
            {
                var final_amount=parseFloat(total);
                document.getElementById("final_total").value=final_amount;
            }
                                                
            else{
                var final_amount=parseFloat(total)+parseFloat(adjustment_final);
                document.getElementById("final_total").value=final_amount;
            }
                                  
        }      

                                                    
</script>


<script>
        $('#add_purchase_order').on('click', function () {
        
        var po_id = document.getElementById('po_id').value; 
        var purchase_order_no = document.getElementById('po_no').value;
        var total = document.getElementById('total').value;
        var discount_final = document.getElementById('discount_final').value;
        var adjustment_final = document.getElementById('adjustment_final').value;
        var final_total = document.getElementById('final_total').value;
        // var process_amount = document.getElementById('process_amount').value;

        

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
        var design_code =table.cell(i,1).nodes().to$().find('select').val();
        var size=table.cell(i,2).nodes().to$().find('select').val();
        var quantity =table.cell(i,3).nodes().to$().find('input').val();
        var sqrft=table.cell(i,4).nodes().to$().find('input').val();
        var rate =table.cell(i,5).nodes().to$().find('input').val();
        // var main_discount_type1=document.getElementById('main_discount_type1').innerHTML;
        var discount_rs =table.cell(i,7).nodes().to$().find('input').val();
        var discount_per=table.cell(i,6).nodes().to$().find('input').val();
        var amount=table.cell(i,8).nodes().to$().find('input').val();
        var remark1=table.cell(i,9).nodes().to$().find('input').val();
        var Supplier = '';
        var pono = ''
        var checkbo_valtbl = '';
        if(document.getElementById('work_no').value != '' || document.getElementById('pro_no').value != '')
        {
            checkbo_valtbl = table.cell(i,10).nodes().to$().find('input:checkbox').val();
            Supplier = table.cell(i,11).nodes().to$().find('input').val();
            pono = table.cell(i,12).nodes().to$().find('input').val();
        }


        rawItemArray.push({
            item_id_fk : item_id_fk,
            design_code:design_code,  
            size:size,  
            quantity:quantity,
            sqrft:sqrft,
            rate:rate,
            discount_rs:discount_rs,
            discount_per:discount_per,
            amount:amount,
            sqrft:sqrft,
            remark1:remark1,
            checkbo_valtbl: checkbo_valtbl,
            Supplier: Supplier,
            pono: pono
        });
        i++;
    });

        var newRawItemArray = JSON.stringify(rawItemArray);
        
        var work_no = document.getElementById('work_no').value;
        var pro_no = document.getElementById('pro_no').value;
        var url ='';

        // work_no == '' ? url='../../api/purchase/edit_purchase_order.php' : url='../../api/wholesale/edit_woi.php';

        if(work_no != '' && pro_no == '')
        {
            url = '../../api/wholesale/edit_woi.php';
        }
        else if(pro_no != '' && work_no == '')
        {
            url = '../../api/retail/edit_rpi.php';
        }
        else
        {
            url = '../../api/purchase/edit_purchase_order.php';
        }

        if(final_total == '')
        {
            alert('Please check total amount');
        }
        else
        {
        $.ajax({
            url: url,
            type: 'POST',
            data : {
                'rawItemArray': newRawItemArray,
                'work_no': work_no,
                'pro_no': pro_no,
                'po_id': po_id,
                'po_no': purchase_order_no,
                'total':total,
                'discount_final':discount_final,
                'adjustment_final':adjustment_final,
                'final_total':final_total,

            },  
            dataType: 'text',
            success: function(data)
            { 
                console.log(data);
                if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Purchase Order Updated Sussesfully',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })

                        setTimeout(() => {
                            window.location.href='view_supplier_po.php';
                        }, 5000);

                        // alert('Purchase Order Updated!');
                        // window.location.href='view_supplier_po.php';
                    }
                    else
                    {       
                        alert("Something went wrong!");
                    }
            
            },
            
            });
        }

        }); 
</script>