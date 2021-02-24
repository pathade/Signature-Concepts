<?php include('../../partials/header.php');?>

<?php
    $edit_id = $_GET['id'];
    $fetch_data = "SELECT * FROM retail_receipt WHERE id_pk='$edit_id'";
    $res = mysqli_fetch_row(mysqli_query($db, $fetch_data));
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

    .btn-show {
        padding: 10px 25px;
        font-size: 15px;
        border: 1px solid #787878;
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Retail Receipt</h4>
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
                                    <div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="" disabled selected>Signature Concepts LLP </option>
												</select>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Cust. Name</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                <?php 
                                                    $get_cust = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='$res[1]'";
                                                    $res_cust = mysqli_fetch_row(mysqli_query($db, $get_cust));
                                                    echo '<option value="'.$res[1].'">'.$res_cust[0].'</option>';
                                                ?>
                                               
												</select>
                                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-4">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Receipt Date</label>
				                        	<div class="col-md-9">
												<input type="date" id="date" class="form-control " placeholder="" name="date" readonly>
											</div>											
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Bank</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="bank" name="bank" readonly>
                                                    <?php 
                                                        $get_bank = "SELECT bank_name FROM mstr_bank WHERE bank_idpk='$res[3]'";
                                                        $res_bank = mysqli_fetch_row(mysqli_query($db, $get_bank));
                                                        echo '<option value="'.$res[3].'">'.$res_bank[0].'</option>';
                                                    ?>
												</select>
                                            </div>
				                        </div>
				                    </div>
	                    			<div class="col-md-4">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">A/C No.</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="ac_no" name="ac_no" readonly>
                                                    <option selected><?php echo $res[4] ?></option>
												</select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-4">
                                        <button class="btn btn-show"> Show</button>
                                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-8">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Remark </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" rows="7"  value="<?php echo $res[5] ?>" name="remark" id="remark" readonly />
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-4">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">OutStanding</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control"  value="0" name="out_standing" id="out_standing" style="background: #000;color: #1ec20a;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>                        
                            <hr />
                            <br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <label><b>Payment</b></label>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="radio" name="payment_method" id="cash" style="height: 13px;width: 13px;" selected > &nbsp;Cash/Card
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    
                                                        <label class="col-md-4 label-control" for="userinput1">Cash Amt</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="cash_amt" id="cash_amt" />
                                                        </div>
                                                        <label class="col-md-4 label-control mt-1" for="userinput1">Card No</label>
                                                        <div class="col-md-8 mt-1">
                                                            <input type="text" class="form-control"  placeholder="0" name="card_no" id="card_no" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Card Amt</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="card_amt" id="card_amt" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="payment_method" id="cash" style="height: 13px;width: 13px;" > &nbsp;Cheque
                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Cheque Amt</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="cheque_amt" id="cheque_amt" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 label-control" for="userinput1">Cheque No</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"  placeholder="0" name="cheque_no" id="cheque_no" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row mb-1">
                                                        <label class="col-md-2 label-control" for="userinput1">Date</label>
                                                        <div class="col-md-7">
                                                            <input type="date" class="form-control" name="cheque_date" id="cheque_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <br/>
                            
                            <div class="row">
                            <label><b>Receipt Details</b></label>
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                    <div class="table-responsive">
                                                    <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                             <!-- <table class="border-bottom-0 table table-hover" id="tbl"> -->
                                                                <thead>
                                                                    <tr>
                                                                        <th>Pur.Order No </th>
                                                                        <th>PoDate </th>
                                                                        <th>FinYr </th>
                                                                        <th>PoAmt </th>
                                                                        <th>PreviousPaid </th>
                                                                        <th>BalanceAmt</th>
                                                                        <th>Credit </th>
                                                                        <th>Debit </th>
                                                                        <th>ReturnGoods </th>
                                                                        <th>Discount </th>
                                                                        <th>Total Balance </th>
                                                                        <th>PaidAmt </th>
                                                                        <th>OutStanding</th>
                                                                        <th>Credit No </th>
                                                                        <th>Debit No </th>
                                                                        <th>Branch </th>
                                                                        <th>Advance Amt </th>
                                                                        <th>Credit Amt </th>
                                                                        <th>Debit Amt </th>
                                                                        <th>Bank Charges </th>
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
                                            <hr />
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <label><b>Customer Goods Return (Less)</b></label>
                                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="border-bottom-0 table table-hover" id="tbl1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Select</th>
                                                                                    <th>No</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Balance</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><b>Manual Debit(Add) / Credit(Less) Note</b></label>
                                                            <div class="form-group row mt-1" style="border: 1px solid #ebebeb;padding: 0.5rem;margin-left: 0px;">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="border-bottom-0 table table-hover" id="tbl2">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Select</th>
                                                                                    <th>Debit/Credit No</th>
                                                                                    <th>Dr Cr Amt</th>
                                                                                    <th>Credit Amount</th>
                                                                                    <th>Debit Amount</th>
                                                                                    <th>Balance</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                    var item="<select class='form-control block'  id='item_id"+i+"'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
                                    var type="<select class=' form-control block' id='type"+i+"'  > <option value='' disabled selected>Select Type</option><option value=''>8.Qty(Pcs)</option><option value='12'>12.Boxes qty</option><option value='13'>13.ML</option></select>"
                                    var length="<input type='text' id='length"+i+"' class='form-control' value='0' onkeyup='get_quantity_value(this.id);'>"
                                    var breath= "<input type='text' id='breath"+i+"' class='form-control' value='0' >"
                                    var qty="<input type='text' class='form-control' id='qty"+i+"' value='0' pattern='[0-9]+(\.[0-9]{1,2})?%?' onkeyup='get_row_discount_value1(this.id)';>";
                                    var sqrft="<input type='text' class='form-control' id='sqrft"+i+"' value='0'  onkeyup='get_row_discount_value(this.id)';>";
                                    var rate="<input type='text' id='rate"+i+"' class='form-control' value='0'>";
                                    var amount ="<input type='text' id='amount"+i+"' class='form-control' value='0' />";
                                    var discount = "<input type='text' id='discount"+i+"' class='form-control' value='0' />";
                                    var dis_amt = "<input type='text' id='discamt"+i+"' class='form-control' value='0' />";
                                    var total = "<input type='text' id='total"+i+"' class='form-control' value='0' />";
                                    var process ="<input type='text' id='process"+i+"' class='form-control' value='0' />";
                                    var pro_amt = "<input type='text' id='pro_amt"+i+"' class='form-control' value='0' />";                                    
                                    var bill_disc_per = "<input type='text' id='billdiscper"+i+"' class='form-control' value='0' />";
                                    var bill_disc_amt = "<input type='text' id='billdiscamt"+i+"' class='form-control' value='0' />";
                                    var tax_per = "<input type='text' id='taxper"+i+"' class='form-control' value='0' />";
                                    var tax_amt = "<input type='text' id='taxamt"+i+"' class='form-control' value='0' />";
                                    var net_amt = "<input type='text' id='netamt"+i+"' class='form-control' value='0' />";
                                    var oct_trn_char = "<input type='text' id='octtrnchr"+i+"' class='form-control' value='0' />";
                                    var italian_sqrft = "<input type='text' id='italiansqrft"+i+"' class='form-control' value='0' />";
                                    var italian_side = "<input type='text' id='italianside"+i+"' class='form-control' value='0' />";
                                    var gst ="<input type='text' id='gst"+i+"' class='form-control' value='0' />";
                                    var cgst_amt = "<input type='text' id='cgstamt"+i+"' class='form-control' value='0' />";
                                    var sgst_amt = "<input type='text' id='sgstamt"+i+"' class='form-control' value='0' />";
                                    var igst_amt = "<input type='text' id='igstamt"+i+"' class='form-control' value='0' />";
                                    var cess_per = "<input type='text' id='cessper"+i+"' class='form-control' value='0' />";
                                    var cess_amt = "<input type='text' id='cessamt"+i+"' class='form-control' value='0' />";
                                    table.row.add( [
  
                                        item, type, length, breath,
                                        qty,sqrft,rate, amount ,discount ,
                                        dis_amt ,
                                        total, process,pro_amt,bill_disc_per, bill_disc_amt, tax_per,tax_amt,
                                        net_amt, oct_trn_char, italian_sqrft, italian_side, gst, cgst_amt, sgst_amt, igst_amt, cess_per, cess_amt
                                        
                                    
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
                                    