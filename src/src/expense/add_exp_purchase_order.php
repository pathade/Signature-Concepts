<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>
<style>
	 @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Vendor Purchase Order</h4> 
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pur_order_form">
	                    	<div class="form-body">
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <?php
                                            if ($flag == 0) {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_purchase_order' and flag = '0' ";
                                            }
                                            else {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_purchase_order' and flag = '1' ";
                                            }
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                        ?>
                                        <div class="form-group row"> 
                                            <label class="col-md-3 label-control" for="userinput1">Purchase Order No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="po_no" class="form-control " placeholder="" name="po_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch </label>
				                        	<div class="col-md-9">
												<select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="Signature Concepts LLP" selected>Signature Concepts LLP</option>
                                                    <!-- <option value="Shree">Shree </option>  -->
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">PO Date  <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="po_date" name="po_date" />
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Expense Head <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="exp_headexpense_head_id_fk" class="select2" data-toggle="select2" name="expense_head_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
                                                     if ($flag == 0) {
                                                        $sql = "SELECT * FROM mstr_expense where flag = '0' ";
                                                     }
                                                     else {
                                                        $sql = "SELECT * FROM mstr_expense where flag = '1' ";
                                                     }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Vendor  <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
                                                        if ($flag == 0) {
                                                        $sql = "SELECT  * FROM mstr_vendor where flag='0' ";
                                                        }
                                                        else {
                                                            $sql = "SELECT  * FROM mstr_vendor where flag='1' ";
                                                        }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row2['0'];?>"><?php echo  $row2['1'].". ".$row2['2']." ".$row2['3'];?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By  <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                <option value="" disabled selected>Select Authorised By</option>
                                                <?php 
                                                if ($flag == 0) {
													$h = "SELECT * FROM mstr_employee where flag='0' ";
                                                }
                                                else {
                                                    $h = "SELECT * FROM mstr_employee where flag='1' ";
                                                }
													$jk = mysqli_query($db,$h);
													while($ml = mysqli_fetch_array($jk))
													{
												?>
                                                        <option value="<?php echo $ml['emp_id_pk']?>"><?php echo $ml['emp_name']?></option>
                                                        
												<?php } ?>
                                                </select>
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
                                                            <th>Item Name &nbsp;&nbsp;&nbsp;</th>
                                                            <th>Quantity</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>   
                                                                <select class="form-control block" id="item_id0" onchange="get_item(this.id)">
                                                                    <option value="" disabled selected>Select Item </option>
                                                                    <?php
                                                                    if ($flag == 0) {
                                                                      $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='0' ";
                                                                    }
                                                                    else {
                                                                        $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='1' ";
                                                                    }
                                                                    $result = mysqli_query($db,$sql);
                                                                    while($row = mysqli_fetch_array($result))
                                                                    {   
                                                                        ?>
                                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="quantity0" class="form-control" value="1" onkeyup="get_quantity_value(this.id);" />
                                                            </td>         
                                                            <td>
                                                                <input type="text" id="rate0" class="form-control" value="0.00" onkeyup="get_rate_value(this.id);" />
                                                            </td>
                                                            <td>
                                                                <input type="text" id="amount0" class="form-control" value="0.00" />
                                                            </td>            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add Item</button>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <hr>
                                <br /> -->
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-4 mt-1">
                                                <label class="label-control" for="userinput1" >Total Qty  <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control"  placeholder="0" name="total_qty" id="total_qty" style="height: calc(2.75rem + -6px);" value="0" readonly/>
                                            </div>
                                            <div class="col-md-4 mt-1">
                                                <label class="label-control" for="userinput1" >Amount  <span style="color:red;">*</span></label>&nbsp;
                                                <input type="text" class="form-control"  placeholder="0" name="cal_amount" id="cal_amount" style="height: calc(2.75rem + -6px);" value="0" readonly/>
                                            </div>
                                            <div class="col-md-4 mt-1" >
                                                <label class="label-control" for="userinput1" >Discount</label><br />
                                                <input type="text" placeholder="0" name="discount_per" id="discount_per" style="height: calc(2.75rem + -6px);width: 70px;" value="0" onkeyup="get_discount_per_value(this.id);" />
                                                <input type="text" placeholder="0" name="discount_amt" id="discount_amt" style="height: calc(2.75rem + -6px); width: 150px" value="0" onkeyup="get_discount_amt_value(this.id);" />
                                            </div>
                                            <div class="col-md-4 mt-1">
                                                <label class="label-control" for="userinput1" >Amt After Dis  <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control"  placeholder="0" name="amt_after_dis" id="amt_after_dis" style="height: calc(2.75rem + -6px);" value="0" readonly/>
                                            </div>
                                            <div class="col-md-4 mt-1" >
                                                <label class="label-control" for="userinput1" >Tax  <span style="color:red;">*</span></label><br />
                                                <input type="text" placeholder="0" name="tax_per" id="tax_per" style="height: calc(2.75rem + -6px);width: 70px; " value="0" onkeyup="get_tax_per_value(this.id);" />
                                                <input type="text" placeholder="0" name="tax_amt" id="tax_amt" style="height: calc(2.75rem + -6px); width: 150px" value="0" onkeyup="get_tax_amt_value(this.id);" />
                                            </div>
                                            <div class="col-md-4 mt-1">
                                                <label class="label-control" for="userinput1" >Net Amount  <span style="color:red;">*</span></label>&nbsp;
                                                <input type="text" class="form-control"  placeholder="0" name="net_amt" id="net_amt" style="height: calc(2.75rem + -6px);background: #000;color: #1ec20a;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
	                        <div class="form-actions right">
                                <button type="button" class="btn btn-primary" name="add" onClick="save_data()">
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

function get_quantity_value(e) {

                                                  
    var get_id=e.slice(8);
  
    var quantity_value=document.getElementById(e).value;

    var rate_id="rate".concat(get_id);
    var rate_value=document.getElementById(rate_id).value;
    var amount=parseFloat(quantity_value)*parseFloat(rate_value)
    var amount_id="amount".concat(get_id);
    document.getElementById(amount_id).value=amount;

    document.getElementById("discount_per").value = 0;
    document.getElementById("discount_amt").value = 0;
    document.getElementById("amt_after_dis").value = 0;
    document.getElementById("tax_per").value = 0;
    document.getElementById("tax_amt").value = 0;
    document.getElementById("net_amt").value = 0;
}

function get_rate_value(e) {
                                          
var get_id=e.slice(4);

var rate_value=document.getElementById(e).value;

var quantity_id="quantity".concat(get_id);
var quantity_value=document.getElementById(quantity_id).value;
var amount=parseFloat(quantity_value)*parseFloat(rate_value)
var amount_id="amount".concat(get_id);
document.getElementById(amount_id).value=amount;

document.getElementById("discount_per").value = 0;
document.getElementById("discount_amt").value = 0;
document.getElementById("amt_after_dis").value = 0;
document.getElementById("tax_per").value = 0;
document.getElementById("tax_amt").value = 0;
document.getElementById("net_amt").value = 0;

}


var table="";
var i=1;
function get_new_line() {
      
    <?php 
    if ($flag == 0) {
    $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='0' ";
    }
    else {
       $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='1' "; 
    }
    $result = mysqli_query($db,$sql);?>
    var item="<select class='form-control block'  id='item_id"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
    var quantity= "<input type='text' id='quantity"+i+"' class='form-control' value='0' onkeyup='get_quantity_value(this.id);'>";
    var rate= "<input type='text' id='rate"+i+"' class='form-control' value='0.00' onkeyup='get_rate_value(this.id);'>";
    var amount= "<input type='text' id='amount"+i+"' class='form-control' value='0.00'>";
    table.row.add( [

        item,
        quantity,
        rate,
        amount,
        ] ).draw( false );

        i++; 
}
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
    
    <?php 
    if ($flag == 0) {
    $sql = "SELECT item_id_pk,final_product_code FROM mstr_item  where flag='0'";
    }
    else {
      $sql = "SELECT item_id_pk,final_product_code FROM mstr_item  where flag='1'";  
    }
    $result = mysqli_query($db,$sql);?>
    var item="<select class='form-control block'  id='item_id"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
    var quantity= "<input type='text' id='quantity"+i+"' class='form-control' value='1' onkeyup='get_quantity_value(this.id);'>";
    var rate= "<input type='text' id='rate"+i+"' class='form-control' value='0.00' onkeyup='get_rate_value(this.id);'>";
    var amount= "<input type='text' id='amount"+i+"' class='form-control' value='0.00'>";
    table.row.add( [

        item,
        quantity,
        rate,
        amount,
        ] ).draw( false );

        i++; 

});
});

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

        get_new_line();
    
    }      
</script>
<script>

  function save_data()
{

        var exp_headexpense_head_id_fk = document.getElementById('exp_headexpense_head_id_fk').value; 
        var authorised_by = document.getElementById('authorised_by').value; 
        var vendor_id_fk = document.getElementById('vendor_id_fk').value; 
        var po_no = document.getElementById('po_no').value; 
        var rawItemArray = [];
        var count=table.rows().count();
        var i=0;
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();
            var item =table.cell(i,0).nodes().to$().find('select').val();
            var quantity =table.cell(i,1).nodes().to$().find('input').val();
            var rate =table.cell(i,2).nodes().to$().find('input').val();
            var amount=table.cell(i,3).nodes().to$().find('input').val();

            // if(item!="" && quantity==0)
            // {
                rawItemArray.push({
                    item : item,
                    quantity:quantity,
                    rate:rate,
                    amount:amount,       
                });
                i++;
            // }

            
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);
        
            if (exp_headexpense_head_id_fk != "" && vendor_id_fk!="" && authorised_by!="") 
            {
                $.ajax( 
                {
                    url: "../../api/expense/save_exp_purchase_order.php",
                    type: 'POST',
                    data : $('#pur_order_form').serialize()+ "&newRawItemArray=" + newRawItemArray+ "&exp_headexpense_head_id_fk=" + exp_headexpense_head_id_fk+ "&authorised_by=" + authorised_by+
                        "&vendor_id_fk=" + vendor_id_fk,
                    dataType:'text',  
                    success: function(data)
                    { 
                        console.log("console data is:"+data);
                        if(data == "1")
                        {
                            $.toast({
                                    heading: 'Success',
                                    text: 'Data Added Successfully!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_exp_purchase_order.php";    
                                }, 5000);
                        // alert("Data Added Successfully!");
                        // window.location.href="view_exp_purchase_order.php";
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
            }
            else 
            {
                if(exp_headexpense_head_id_fk == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Select Expense Head',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }

                if(vendor_id_fk == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Select Vendor',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }

                
                if(authorised_by == "")
                {
                    $.toast({
                            heading: 'Error',
                            text: 'Please Select Authorised By',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                }
            }
        

}
</script>
<script>
    $(document).ready(function(){
        window.setInterval(function()
                                    {
                                        var count=table.rows().count();


                                        var amount=0;
                                        var quantity=0;

                                     for(var i=0;i<count;i++)
                                    {
                                        
                                        var tbl4=table.cell(i,3).nodes().to$().find('input').val()
                              
                                        var amount= parseInt(amount) +parseInt(tbl4);

                                        var tbl1=table.cell(i,1).nodes().to$().find('input').val()
                              
                                        var quantity= parseInt(quantity) +parseInt(tbl1);
                                    
                                    
                                    }

                                  
                                    document.getElementById('cal_amount').value=amount;
                                  
                                    document.getElementById('total_qty').value=quantity;
                                    // document.getElementById('final_total').value=amount;
                                    // document.getElementById("net_amt").value =amount ;
                                    var tax_amt = document.getElementById("tax_amt").value;
            var tax_per = document.getElementById("tax_per").value;
            var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
                                    var abcd=document.getElementById('cal_amount').value;
                                
            if(discount_amt == 0 && discount_per == 0  && tax_amt == 0 && tax_per == 0){
                document.getElementById("net_amt").value =abcd ;
            }
                                  
                                    },1000
                                    ); 
           
        
   
    });
    function get_discount_per_value(e) {                                                
            var discount_value = document.getElementById(e).value;
            // alert('disc'+discount_value);
            var cal_amount_value = document.getElementById("cal_amount").value;
            var tax_amt = document.getElementById("tax_amt").value;
            // alert('amt'+cal_amount_value);
           // alert (tax_amt);
            if (tax_amt != 0) {
            var discount_amt = parseFloat(cal_amount_value)*parseFloat(discount_value)/100;
                // alert(discount_amt);
            document.getElementById("discount_amt").value = discount_amt;

            var discount_after_amt = parseFloat(cal_amount_value)-parseFloat(discount_amt);
            document.getElementById("amt_after_dis").value = discount_after_amt;

            document.getElementById("net_amt").value = discount_after_amt + parseFloat(tax_amt);
        }
        else{
            var discount_amt = parseFloat(cal_amount_value)*parseFloat(discount_value)/100;
                // alert(discount_amt);
            document.getElementById("discount_amt").value = discount_amt;

            var discount_after_amt = parseFloat(cal_amount_value)-parseFloat(discount_amt);
            document.getElementById("amt_after_dis").value = discount_after_amt;

                document.getElementById("net_amt").value = discount_after_amt;
            }

    }

    function get_discount_amt_value(e) {
        var cal_amount_value = document.getElementById("cal_amount").value;
        var discount_amt = document.getElementById("discount_amt").value;
        var tax_amt = document.getElementById("tax_amt").value;
        //alert (tax_amt);
        if (tax_amt != 0) {
        var discount_after_amt = parseFloat(cal_amount_value)-parseFloat(discount_amt) ;
            document.getElementById("amt_after_dis").value = discount_after_amt;

            document.getElementById("net_amt").value = discount_after_amt + parseFloat(tax_amt);
        }
        else{

            var discount_after_amt = parseFloat(cal_amount_value)-parseFloat(discount_amt);
            document.getElementById("amt_after_dis").value = discount_after_amt;
                document.getElementById("net_amt").value = discount_after_amt;
            }
    }    

    function get_tax_per_value(e) {  
        var tax_value = document.getElementById(e).value;
        var disc_after_value = document.getElementById("amt_after_dis").value;
       // alert(disc_after_value);
        var cal_amount_value = document.getElementById("cal_amount").value;
        //alert(cal_amount_value);
        // alert('amt'+disc_after_value);
        if (disc_after_value != 0) {
        var tax_amt = parseFloat(disc_after_value)*parseFloat(tax_value)/100;
            // alert(tax_amt);
        document.getElementById("tax_amt").value = tax_amt;

        var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 ){
                if (disc_after_value != 0) {
                    var tax_amt = parseFloat(disc_after_value)*parseFloat(tax_value)/100;
            // alert(tax_amt);
        document.getElementById("tax_amt").value = tax_amt;
        var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;
                
                }
                else {
                    document.getElementById("net_amt").value = cal_amount_value;
                }
            }
     } 
     else {
        var tax_amt = parseFloat(cal_amount_value)*parseFloat(tax_value)/100;
         // alert(tax_amt);
        document.getElementById("tax_amt").value = tax_amt;

        var net_amt = parseFloat(cal_amount_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 ){
                document.getElementById("net_amt").value = net_amt;
            }
     }
    }

    function get_tax_amt_value(e) { 
        var disc_after_value = document.getElementById("amt_after_dis").value;
        var tax_amt = document.getElementById("tax_amt").value;
        var cal_amount_value = document.getElementById("cal_amount").value;
        if (disc_after_value != 0) {
        var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;


        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;

            if(discount_amt == 0 && discount_per == 0 ){
                if (disc_after_value != 0) {
                    var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
                        document.getElementById("net_amt").value = net_amt;
                }
                else {
                document.getElementById("net_amt").value = cal_amount_value; }
            }
        }
        else {
        var net_amt = parseFloat(cal_amount_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 ){
                document.getElementById("net_amt").value = net_amt;
            }
     }
    }
</script>