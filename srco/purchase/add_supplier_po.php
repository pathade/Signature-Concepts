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
												<input type="text" id="po_no" class="form-control " readonly name="po_no" value="<?php echo date('y',strtotime('-1 year')).'-'.date('y').'/'.$row['2']; ?>" >
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
				                        	<label class="col-md-3 label-control" for="userinput1">Supplier <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier" onchange="fetchSupplierData(this.value)">
                                                <option value="" disabled selected>Select Supplier </option>
                                                <?php

                                                    $sql = "SELECT * FROM mstr_supplier WHERE status=1";
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
				                        	<label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" class="form-control " placeholder="0" name="mobile_no" >
                                            </div>
				                        </div>
				                    </div>	


                                </div>
                                
                                <div class="row ">
                                    <div class="col-md-6 d-none">
                                        <div class="form-group row ">
                                            <label class="col-md-3 label-control" for="userinput1">Proforma Inv. No.</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="pro_no" class="form-control " placeholder="0" name="pro_no" readonly >
                                            </div>
                                        </div>
                                    </div>
				                    <div class="col-md-6 d-none">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1"> Work No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="work_no" class="form-control " placeholder="0" name="work_no" readonly>
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
                                
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                        <label class="col-md-2 label-control" for="userinput1">Product List <span style="color:red;"> *</span></label>
                                        <div class="col-md-10 divcol">
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
                                            <button type="button" onClick="get_data123();" name="" class="btn btn-primary" id="" >
                                                <i class="fa fa-check-square-o"></i> Get Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>




							</div>
                            <div class="row" id="display_data">
                                <div class="col-md-12" style="margin-top: 25px;">
                                    <!-- <div class="form-group row"> -->
                                        
                                    <div class="table-responsive">
                                    <table class="display table" id="tbl" style="width: 100%;font-size: smaller;">
                                            <thead>
                                                <tr >
                                                    <th>CATEGORY </th>
                                                    <th>DESIGN CODE </th>
                                                    <th>Size  </th>
                                                    <th>QUANTITY </th>
                                                    <th>Sqrft </th>
                                                    <th>RATE </th>
                                                    <th>DISCOUNT %</th>
                                                    <th>DISCOUNT Rs</th>
                                                    <th>AMOUNT </th>
                                                    <th>REMARK </th>
                                                    <th></th>
                                                
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    <!-- </div> -->
                                    <!-- <div class="row">
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add another line</button>
                                        </div>
                                    </div> -->
                                </div>
                                            </div>
                                            <div class="row mt-3">
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
                                                                <div class="form-group row" id="discount_row_hide">
                                                                    <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Discount</label>
                                                                    <div class="col-md-5">
                                                                  
                                                                   </div>
                                                                        
                                                                     
                                                                        <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="discount_final" id="discount_final" value="" readonly>
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

                                                                <!-- <div class="form-group row">
                                                                <label class="col-md-4 label-control" for="userinput1" style="font-size: 18px;">Process Amount</label>
                                                                  
                                                                    <div class="col-md-5">
                                                                        
                                                                    </div>
                                                                 
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " name="process_amount" id="process_amount" value="0" onkeyup='get_final_amount(this.value);' >
                                                                    </div>
                                                                
                                                                </div> -->
                                                                <div class="form-group row">
                                                                    <div class="col-md-9 ">
                                                                        <b style="font-size: 22px;">Total <span style="color:red;"> *</span></b>
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
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="btn" onclick="save_click();">
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
                "url": "../../api/purchase/fetch_row_items_for_po.php",
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
                                    function get_new_line() {  
                                    <?php 
                                        $sql = 'SELECT item_id_pk,item_type FROM mstr_item';
                                        $result = mysqli_query($db,$sql);
                                        $sql1 = 'SELECT size FROM mstr_item';
                                        $result1 = mysqli_query($db,$sql1);
                                    ?>
                                    var item="<select class='form-control'  id='category item_id"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
                                    var design_code="<select class='form-control' id='design_code"+i+"'><option value='' disabled selected>Select Code</option></select>";
                                    var size="<select class='form-control block' id='size"+i+"'  ><option value='' disabled selected>Select Size</option><?php while($row = mysqli_fetch_array($result1)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['0'];?></option><?php } ?></select>";
                                    var quantity="<input type='text' id='quantity"+i+"' class='form-control' value='1.00' onkeyup='get_quantity_value(this.id);'>"
                                    var rate= "<input type='text' id='rate"+i+"' readonly class='form-control' value='0.00' onkeyup='get_quantity_value(this.id)'>";
                                    var discount_per="<div class='input-group'><input type='text' class='form-control' id='table_discount_per"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';></div>";
                                    var discount_rs="<div class='input-group'><input type='text' class='form-control' id='table_discount_rs"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';></div>";
                                    var amount="<input type='text' id='amount"+i+"' class='form-control' value='0.00'>";
                                    var sqrft="<input type='text' id='sqrft"+i+"' class='form-control' value='0.00' />";
                                    var remark1="<input type='text' id='remark"+i+"' class='form-control' placeholder='Remark' />";
                                                             
                                    table.row.add( [
  
                                        item,
                                        design_code,
                                        size,  
                                        quantity,
                                        sqrft,
                                        rate,
                                        discount_per ,
                                        discount_rs ,
                                        amount ,
                                        remark1 ,
                                    
                                        ] ).draw( false );

                                        i++; 
                                  };
                                var table="";
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

                                  
                                var i=1;
                                // $('#add_new_line').click(function() {
                                  
                                // });

                                  


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
                                    // document.getElementById('adjustment_final').value
                                    document.getElementById('final_total').value=parseFloat(amount)+parseFloat(document.getElementById('adjustment_final').value);


                                  
                                    },1000
                                    );
                                });


                                
                                      function get_item(e) {
                                      var id=document.getElementById(e).value;
                                      getDesignCode(e);
                                     
                                     
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
                                    get_new_line();
                                  
                                    } 

                                //  get design code

                                    function getDesignCode(e) {
                                        var id=document.getElementById(e).value;
                                        var get_id= e.slice(e.length - 1);
                                        var design_code = document.getElementById(`design_code${get_id}`);
                                        var size = document.getElementById(`size${get_id}`);

                                        
                                        $.ajax({
                                            url: '../../api/item/get_design_code.php',
                                            type: 'POST',
                                            data: { 'id': id },
                                            success: function(data) {
                                                datas = data.split('#');
                                                $(design_code).html(datas[0]);
                                                $(size).html(datas[1]);
                                            }
                                        })
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

                                                    function get_final_amount(e) {
                                      
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
        function save_click()
        {
            var purchase_order_no = document.getElementById('po_no').value;
            var date = document.getElementById('date').value;
            var supplier_id = $("#supplier").val(); 
            var mobile_no=document.getElementById('mobile_no').value; 
            var work_no=document.getElementById('work_no').value; 
            var branch=document.getElementById('branch').value; 
            var address=document.getElementById('address').value; 
            var Remark=document.getElementById('Remark').value;
            var total = document.getElementById('total').value;
            var discount_final = document.getElementById('discount_final').value;
            var adjustment_final = document.getElementById('adjustment_final').value;
            var final_total = document.getElementById('final_total').value;
            // var process_amount = document.getElementById('process_amount').value;
            var sel03 = document.getElementById('sel-03').value;

            // Add table data to JS array
            var rawItemArray = [];
            var count=table.rows().count();

            
            var i=0;
            table.rows().eq(0).each( function ( index ) 
            { 
  
            // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
            
            var row = table.row( index );
            var data = row.data();
            var item_id_fk =table.cell(i,10).nodes().to$().find('input').val();
            var design_code =table.cell(i,1).nodes().to$().find('input').val();
            var size=table.cell(i,2).nodes().to$().find('input').val();
            var quantity =table.cell(i,3).nodes().to$().find('input').val();
            var sqrft=table.cell(i,4).nodes().to$().find('input').val();
            var rate =table.cell(i,5).nodes().to$().find('input').val();
            // var main_discount_type1=document.getElementById('main_discount_type1').innerHTML;
            var discount_per=table.cell(i,6).nodes().to$().find('input').val();
            var discount_rs =table.cell(i,7).nodes().to$().find('input').val();
            var amount=table.cell(i,8).nodes().to$().find('input').val();
            var remark1=table.cell(i,9).nodes().to$().find('input').val();


            rawItemArray.push({
                item_id_fk : item_id_fk,
                design_code:design_code,  
                size:size,  
                quantity:quantity,
                rate:rate,
                discount_rs:discount_rs,
                discount_per:discount_per,
                amount:amount,
                sqrft:sqrft,
                remark1:remark1
        
            
            });
            i++;
            });

            var newRawItemArray = JSON.stringify(rawItemArray);

            console.log(newRawItemArray);
            if (supplier_id != "" && total != "0" && sel03 != "" )
            {
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
                    'work_no':work_no,
                    'mobile_no':mobile_no,
                    'total':total,
                    'discount_final':discount_final,
                    'adjustment_final':adjustment_final,
                    'final_total':final_total,
                    'Remark':Remark,
                    'address':address,
                    // 'process_amount':process_amount,
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
                            icon: 'success'
                        })
                        setTimeout(() => {
                            window.location.href="view_supplier_po.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
                        // alert('Purchase Order Added Successfully');
                        // window.location.href = "view_supplier_po.php";
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

                        // alert('Something went wrong!');
                    }
                
                },
                
            });
            }
            else {
                    $.toast({
                            heading: 'Error',
                            text: 'Supplier, Product List and Total is Required!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
            }
        }
        
        function fetchSupplierData()
        {
            let supplier = $('#supplier').val();
            $.ajax({
                url: '../../api/supplier/fetch_supplier_data.php',
                type: 'POST',
                data: { 'supplier': supplier },
                success: function(data) {
                    var d = JSON.parse(data);
                    $('#mobile_no').val(d.phone);
                    $('#address').val(d.address);
                }
            });     
        }
</script>