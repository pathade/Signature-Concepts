
<?php include('../../partials/header.php');?>

<?php
    $edit_id = $_GET['id'];
    $get_reatil_quotation = "SELECT * FROM retail_quotation WHERE id_pk='".$_GET['id']."'";
    $res_retail_quotation = mysqli_query($db, $get_reatil_quotation) or die(mysqli_error($db));
    $row = mysqli_fetch_array($res_retail_quotation);
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
    .table td {
    border-bottom: 1px solid #E3EBF3;
    padding: .75rem 1rem;
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
    
#myImg {
  border-radius: 5px;
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Retail Quotation</h4>
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
                                    <?php 
                                        $get_order_no = "SELECT sr_no FROM mstr_data_series WHERE name='retail_quotation'";
                                        $res1 = mysqli_fetch_row(mysqli_query($db, $get_order_no)); 
                                    ?>
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Order No.</label>
				                        	<div class="col-md-3">
												<input type="text" id="order_no" class="form-control " name="order_no" readonly value="<?php echo $row['order_no'] ?>" >
											</div>
                                            <label class="col-md-2 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-4">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>">
											</div>											
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                            <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                <?php
                                                    $get_customer = "SELECT retail_cust_idpk, retail_cust_name FROM mstr_retail_customer mrc, retail_quotation rq WHERE id_pk='".$row['id_pk']."' AND rq.customer=mrc.retail_cust_idpk";
                                                    $res2 = mysqli_query($db, $get_customer);
                                                    while($row1 = mysqli_fetch_row($res2))
                                                    { ?>
                                                        <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                                                    <?php }
                                                ?>

                                               
												</select>
                                                <!-- <span id="customer_error" style="color:red;">Customer is required!</span> -->
                                            </div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
				                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mobile No</label>
				                        	<div class="col-md-9">
                                                <input type="number" id="mobile_no" class="form-control " placeholder="0" name="mobile_no" readonly value="<?php echo $row['mobile_no'] ?>">
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Address </label>
                                            <div class="col-md-9 ">
                                                <textarea type="text" class="form-control" rows="4"  placeholder="Address" name="address" id="address" style="height: auto;" readonly><?php echo $row['address'] ?></textarea>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly >
                                                    <option value="NKS Aromas" selected>NKS Aromas</option>
												</select>
                                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
<!-- 
                            <div class="row">
                            <label class="col-md-3 label-control" for="userinput1">Quotation for: </label>
                            <div class="col-md-9">
                                <input type="radio" id="active" name="quotation" checked value="1"> 
                                <input type="radio" id="inactive" name="quotation" value="2"> 
                            </div>
                            </div> -->

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
                                                        $m1 = "SELECT * FROM retail_quotation_items WHERE rq_id_fk='$edit_id'";
                                                        $k1 = mysqli_query($db,$m1);
                                                        while($kl1 = mysqli_fetch_array($k1))
                                                        {
                                                            $item = $kl1['product_cat'];
                                                        

                                                        
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
                            <div class="col-md-12">
                            <!-- <div class="form-group row"> -->
                                            <div class="table-responsive">
                                            <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                        <!-- <table class="border-bottom-0 table table-hover table-responsive" id="tbl" > -->
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sr no </th>
                                                                            <!-- <th>SHOW IMAGE</th> -->
                                                                            <th>DESCRIPTION</th>
                                                                            <th>SIZE </th>
                                                                            <th>UOM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                                                            <th>QUANTITY </th>
                                                                            <th>SQFT</th>
                                                                            <th>RATE </th>
                                                                            <th>BOX QUANTITY </th>
                                                                            <th>BOX RATE </th>
                                                                            <th>DISCOUNT %</th>
                                                                            <th>DISCOUNT Rs</th>
                                                                            <th>AMOUNT</th>
                                                                            <th>REMARK</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                    <tfoot>
                                                                       
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                           
                                                        </div>
                                                        <!-- <div class="row">
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add Row</button>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <br /><br />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-1">
                                                                <label class=" label-control" for="userinput1"><b>Quantity</b></label>
                                                                <input type="text" class="form-control" value="0" id="total_qty" name="total_qty" readonly="">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label class=" label-control" for="userinput1"><b>Sq.ft.</b></label>
                                                                <input type="text" class="form-control" value="0" id="total_sqfit" name="total_sqfit" readonly="">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class=" label-control" for="userinput1"><b>Gross Amt.</b></label>
                                                                <input type="text" class="form-control" value="0" id="gross_amt" name="gross_amt" readonly="">
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
                                                                <label class=" label-control" for="userinput1"><b>Transportation</b></label>
                                                                <input type="text" class="form-control" id="trans" name="trans" value="<?php echo $row['transport'] ?>">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label class="label-control" for="userinput1"><b>Load/Unload</b></label>
                                                                <input type="text" class="form-control" id="unload" name="unload" value="<?php echo $row['unload'] ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class=" label-control" for="userinput1"><b>Total</b></label>
                                                                <input type="text" class="form-control" value="0" id="total" name="total" readonly="">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class=" label-control" for="userinput1"><b>Other(+/-)</b></label>
                                                                <input type="text" class="form-control" value="<?php echo $row['adjustment'] ?>" id="adjustment_final" name="adjustment_final" onkeyup='get_final_amount(this.value);' >
                                                            </div>
                                                            <!-- <div class="col-md-2">
                                                                <label class=" label-control" for="userinput1"><b>Pro Amt.</b></label>
                                                                <input type="text" class="form-control" value="0" id="process_amount" name="process_amount" onkeyup='get_final_amount(this.value);'>
                                                            </div> -->
                                                            <!-- <div class="col-md-2">
                                                                <label class=" label-control" for="userinput1"><b>Tax Amt.</b></label>
                                                                <input type="text" class="form-control" value="0" id="tax_amount" name="tax_amount" readonly>
                                                            </div> -->
                                                            <!-- <div class="col-md-2">
                                                                <label class=" label-control" for="userinput1"><b>Net Amt</b> <span style="color:red;">*</span> </label>
                                                                <input type="text" class="form-control" placeholder="0" id="final_total" name="final_total" readonly="">
                                                                <span id="net_amt_error" style="color:red;">Net Amt is Required</span>
                                                            </div> -->
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
                                    
                                    <button type="button" name="add_retail_quotation" class="btn btn-primary" id="add_retail_quotation" >
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
        // var display_data = document.getElementById('display_data');
        // display_data.style.display = 'none'; //or
        //link.style.visibility = 'hidden';

        $('.select2-original').select2({
            placeholder: "Choose elements",
        width: "100%"
        })
        var test = $('#sel-03');
        $(test).change(function() {
            var ids = $(test).val(); // works
            var selections = ( JSON.stringify($(test).select2('data')) );
            console.log('Selected IDs: ' + ids);
            console.log('Selected options: ' + selections);
            $('#selectedText').text(selections);
        });
    });
    </script>
    <script>
        var table="";
        var i=1;

        $(document).ready(function()
        {
            var updateItemId = '<?php echo $edit_id; ?>';
            var test = $('#sel-03');
            var ids = $(test).val(); // works
            console.log('Selected IDs123: ' + ids);
            table = $('#tbl').DataTable( {
                searching:false,   
                ajax: {
                        "url": '../../api/retail/get_rqi_table.php',
                        "type": "POST",
                        data : 
                        {
                        'itemId' : updateItemId,
                        'ids' : ids
                        },
                    },
                    deferRender: true,
                    destroy:true,
            });
    
            window.setInterval(function()
            {
                var count=table.rows().count();
    
    
                var amount=0;
                var discount=0;
                var discount_per=0;
                var totalqty=0;
                var totaldisc = 0;
                var gross = 0;
                var tgross = 0;
                var sqft = 0;
    
                
                for(var i=0;i<count;i++)
                {
                    
                    var tblamt=table.cell(i,11).nodes().to$().find('input').val()
        
                    var amount= parseFloat(amount) +parseFloat(tblamt);
    
                    var tbl5=table.cell(i,10).nodes().to$().find('input').val()
        
                    var discount= parseFloat(discount) +parseFloat(tbl5);
                
                    var tbl2=table.cell(i,4).nodes().to$().find('input').val()
        
                    var totalqty= parseFloat(totalqty) +parseFloat(tbl2);

                    var tbl7=table.cell(i,9).nodes().to$().find('input').val()
                    var discount_per= parseFloat(discount_per) +parseFloat(tbl7);

                    var tbl4=table.cell(i,5).nodes().to$().find('input').val()
                    var sqft= parseFloat(sqft) +parseFloat(tbl4);
    
    
                }        
            
                document.getElementById('gross_amt').value=amount;
                document.getElementById('discount_final').value=discount;
                document.getElementById('disc_percent').value=discount_per;
                document.getElementById('total_qty').value=totalqty;
                document.getElementById('total_sqfit').value=sqft;

                var trans = document.getElementById('trans').value;
                var unload = document.getElementById('unload').value;

                document.getElementById('total').value = amount+parseFloat(trans)+parseFloat(unload);
                document.getElementById('final_total').value=parseFloat(document.getElementById('total').value)+parseFloat(document.getElementById('adjustment_final').value);
            
            },1000
            );
        });
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
                    var quantity_value =document.getElementById(quantity).value;
    
                    $('#'+rate).val(d[0]);
                    var amount_value=d[0]*quantity_value;
                    var amount="amount-".concat(get_id);
                    $('#'+amount).val(amount_value);
    
                    //assign size to textbox
                    var size = "size-".concat(get_id);
                    $('#'+size).val(d[1]);
    
                    // gst calculation
                    var gst_per = "gst_per-".concat(get_id);
                    var cgst = "cgst-".concat(get_id);
                    var sgst = "sgst-".concat(get_id);
                    var igst = "igst-".concat(get_id);
    
                    var gst = amount_value * $('#'+gst_per).val()/100;
                    gst = gst.toFixed(2);  // show 2 digits after decimal point
                    $('#'+cgst).val(gst);
                    $('#'+sgst).val(gst);
                    var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val());
                    igst_val = igst_val.toFixed(2);
                    $('#'+igst).val(igst_val);
    
    
                } 
            });
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
            // alert(table_discount_per);
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
                var gst_per = "gst_per-".concat(get_id);
                var cgst = "cgst-".concat(get_id);
                var sgst = "sgst-".concat(get_id);
                var igst = "igst-".concat(get_id);
    
                var gst = total * $('#'+gst_per).val()/100;
                gst = gst.toFixed(2);  // show 2 digits after decimal point
                $('#'+cgst).val(gst);
                $('#'+sgst).val(gst);
                var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
                igst_val = igst_val.toFixed(2);
                $('#'+igst).val(igst_val);
    
    
            }

            function showImage(e)
            {
                var get_id = e.split('-');
                get_id = get_id[1];
                
                var product_id = $(`#product_id-${get_id}`).val();
                var desc = document.getElementById(`desc-${get_id}`);

                if(document.getElementById(e).checked == false)
                {
                    desc.removeChild(desc.childNodes[1]);
                    return;
                }

                $.ajax({
                    url: '../../api/item/get_image.php',
                    type: 'POST',
                    data: { 'pid': product_id },
                    success: function(data){
                        var d = JSON.parse(data)

                        var img = document.createElement('img');
                        img.src = d.image;
                        img.id = "myImg";
                        img.alt = 'No Image';

                        img.style.width = "102px";

                        desc.appendChild(img);

                    }
                })

            }
                
    
                function get_row_discount_value1(e) {
    
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
    
                    // gst calculation
                    var gst_per = "gst_per-".concat(get_id);
                    var cgst = "cgst-".concat(get_id);
                    var sgst = "sgst-".concat(get_id);
                    var igst = "igst-".concat(get_id);
    
                    var gst = total * $('#'+gst_per).val()/100;
                    gst = gst.toFixed(2);  // show 2 digits after decimal point
                    $('#'+cgst).val(gst);
                    $('#'+sgst).val(gst);
                    var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
                    igst_val = igst_val.toFixed(2);
                    $('#'+igst).val(igst_val);
    
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
    
                    // gst calculation
                    var gst_per = "gst_per-".concat(get_id);
                    var cgst = "cgst-".concat(get_id);
                    var sgst = "sgst-".concat(get_id);
                    var igst = "igst-".concat(get_id);
    
                    var gst = amount_value * $('#'+gst_per).val()/100;
                    gst = gst.toFixed(2);  // show 2 digits after decimal point
                    $('#'+cgst).val(gst);
                    $('#'+sgst).val(gst);
                    var igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
                    igst_val = igst_val.toFixed(2);
                    $('#'+igst).val(igst_val);
    
                    
                }
    
                function get_final_amount(e) {
    
                    var total=document.getElementById('total').value;
                    // var tax_amt=document.getElementById('tax_amount').value;
                    var adjustment_final=document.getElementById('adjustment_final').value;
                    var trans=document.getElementById('trans').value;
                    var unload=document.getElementById('unload').value;
                    // var process_amount=document.getElementById('process_amount').value;
                    
                    if(adjustment_final=='')
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
        $(document).ready(function(){
            $('#add_retail_quotation').click(function () {
            // Add table data to JS array
            var rawItemArray = [];
            var count=table.rows().count();
            var i=0;
            var check_count = 0;
            var posupplier = "";
            table.rows().eq(0).each( function ( index ) 
            { 
                var row = table.row( index );
                var data = row.data();
                
                // do not delete this comment section

                // var product_category =table.cell(i,0).nodes().to$().find('select').val();
                // var item_id_fk =table.cell(i,1).nodes().to$().find('select').val();
                // var size=table.cell(i,2).nodes().to$().find('input').val();
                // var quantity =table.cell(i,3).nodes().to$().find('input').val();
                // var sqfit=table.cell(i,4).nodes().to$().find('input').val();
                // var rate =table.cell(i,5).nodes().to$().find('input').val();
                // var discount_per=table.cell(i,6).nodes().to$().find('input').val();
                // var discount_rs =table.cell(i,7).nodes().to$().find('input').val();
                // var amount=table.cell(i,8).nodes().to$().find('input').val();
                // var gst_per=table.cell(i,9).nodes().to$().find('input').val();
                // var cgst=table.cell(i,10).nodes().to$().find('input').val();
                // var sgst=table.cell(i,11).nodes().to$().find('input').val();
                // var igst=table.cell(i,12).nodes().to$().find('input').val();
                // var remark=table.cell(i,13).nodes().to$().find('input').val();

                var design_code =table.cell(i,1).nodes().to$().find('input').val();
                var size=table.cell(i,2).nodes().to$().find('input').val();
                var uom=table.cell(i,3).nodes().to$().find('select').val();
                var quantity =table.cell(i,4).nodes().to$().find('input').val();
                var sqft =table.cell(i,5).nodes().to$().find('input').val();
                var rate =table.cell(i,6).nodes().to$().find('input').val();
                var box_quantity =table.cell(i,7).nodes().to$().find('input').val();
                var box_rate =table.cell(i,8).nodes().to$().find('input').val();
                var discount_per=table.cell(i,9).nodes().to$().find('input').val();
                var discount_rs =table.cell(i,10).nodes().to$().find('input').val();
                var amount=table.cell(i,11).nodes().to$().find('input').val();
                var remark=table.cell(i,12).nodes().to$().find('input').val();
                var product_id=table.cell(i,13).nodes().to$().find('input').val();

            
    
                rawItemArray.push({
                    design_code: design_code,
                    size:size,
                    uom:uom,
                    quantity:quantity,
                    sqft:sqft,
                    rate:rate,
                    box_quantity:box_quantity,
                    box_rate:box_rate,
                    discount_per:discount_per,
                    discount_rs:discount_rs,
                    amount:amount,
                    remark:remark,
                    item_id_fk: product_id
                    
                });
                i++;
            });
            //alert("posupp baher:"+posupp);
            var newRawItemArray = JSON.stringify(rawItemArray);
            console.log(newRawItemArray);
    
            var branch = document.getElementById('branch').value;
            var order_no = document.getElementById('order_no').value;
            var date = document.getElementById('date').value;
            var customer = document.getElementById('customer').value;
            var mobile_no = document.getElementById('mobile_no').value;
            var address = document.getElementById('address').value;
    
            var total_qty = document.getElementById('total_qty').value;
            var total_sqft = document.getElementById('total_sqfit').value;
            var gross_amt = document.getElementById('gross_amt').value;
            var total = document.getElementById('total').value;
            var disc_percent = document.getElementById('disc_percent').value;
            var discount_final =document.getElementById('discount_final').value;
            var adjustment_final = document.getElementById('adjustment_final').value;
            var final_total =document.getElementById('final_total').value;
            var trans =document.getElementById('trans').value;
            var unload =document.getElementById('unload').value;
            var updateItemId = '<?php echo $edit_id; ?>';
            $.ajax(
            {
    
                url: "../../api/retail/edit_retail_quotation.php",
                type: 'POST',
                data : {
                    'rq_id': updateItemId,
                    "newRawItemArray": newRawItemArray,
                    "branch": branch,
                    "order_no": order_no,
                    "date": date,
                    "customer": customer,
                    "mobile_no": mobile_no,
                    "address": address,
                    "total_qty": total_qty,
                    "total_sqft": total_sqft,
                    "gross_amt": gross_amt,
                    "total": total,
                    "disc_percent": disc_percent,
                    "discount_final": discount_final,
                    "adjustment_final": adjustment_final,
                    "final_total": final_total, 
                    "trans": trans, 
                    "unload": unload, 
                },
                dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data);
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Retail Quotation Updated!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_retail_quotation.php";    
                        }, 5000);
                        // alert("Retail Quotation Added!")
                        // window.location.href="view_retail_quotation.php";
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid Details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        // alert("Please Enter Valid Details");
                    }
                
                },
                
                });
    
            var branch = document.getElementById("branch").value;
            var customer = document.getElementById("customer").value;
            var final_total = document.getElementById("final_total").value;
    
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
                //document.getElementById("branch_error").style.display = "block";
            }
            if(customer == "")
            {
                $.toast({
                        heading: 'Error',
                        text: 'Please Select Customer',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
               // document.getElementById("customer_error").style.display = "block";
            }
            if(final_total == "")
            {
                $.toast({
                        heading: 'Error',
                        text: 'Please Enter Net Amt.',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                //document.getElementById("net_amt_error").style.display = "block";
            }
    
            }); 
        });
    </script>                           
    <script>
        function rate_enter(e)
        {
            var get_id = e.split("-");
            var get_id = get_id[1];
            var quantity = "quantity-".concat(get_id);
            var quantity_value=document.getElementById(quantity).value;
            var rate = "rate-".concat(get_id);
            var rate_value=document.getElementById(rate).value;
            var final_amt = parseFloat(quantity_value) * parseFloat(rate_value);
            var amt = "amount-".concat(get_id);
            document.getElementById(amt).value = final_amt;
        }

        function fetchCustomerData(name)
        {
            $.ajax({
                url: '../../api/customer/fetch_customer_data.php',
                type: 'POST',
                data: { 'name': name },
                success: function (data) {
                    console.log(data);
                    var d = JSON.parse(data);
                    $('#mobile_no').val(d.phone);
                    $('#address').val(d.address);
                    $('#gst_no').val(d.gst_no);
                }
            })
        }
    

    </script>
    <script>
    $(".js-example-tags").select2({
      tags: true
    });
    </script>
<script>
    function get_data123()
{
    var test = $('#sel-03');
    var ids = $(test).val(); // works
    if(ids == '')
    {
        alert('select products');
        return;
    }
    console.log('Selected IDs123: ' + ids);
    // var display_data = document.getElementById('display_data');
    // display_data.style.display = 'block'; //or

    table = $('#tbl').DataTable( {  
            dom: 'Bfrtip',
            searching:false,
            ajax: 
            {
                "url": "../../api/retail/fetch_row_items_for_retail_quotation.php",
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