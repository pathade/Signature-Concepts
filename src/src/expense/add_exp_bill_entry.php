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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Bill Entry</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="bill_entry_form">
	                    	<div class="form-body">
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <?php
                                            if ($flag == 0) {
                                            $sql = "SELECT * FROM mstr_data_series where name='exp_bill_entry' and flag = '0' ";
                                            }
                                            else {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_bill_entry' and flag = '1' ";
                                            }
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Bill Entry No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="be_no" class="form-control " placeholder="" name="be_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 d-none">
                                        <div class="form-group row d-none">
                                            <label class="col-md-2 label-control" for="userinput1"></label>
                                            <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="variable" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" checked>&nbsp; Variable 
                                            </div>
                                            <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="type" id="fixed_variable" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0">&nbsp; Fixed-Variable
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1">Type<span style="color:red;">*</span></label>
                                            <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="against" onchange="getVendorSupplier(this.value)" id="direct" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" checked>&nbsp; <label for="direct">Direct </label>
                                            </div>
                                            <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="against" onchange="getVendorSupplier(this.value)" id="against_po" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0">&nbsp; <label for="against_po">Against PO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 label-control" for="userinput1">PO Date</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="po_date" name="po_date" />
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">PO NO </label>
				                        	<div class="col-md-8">
                                                <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
                                                        if ($flag == 0) {
                                                        $sql = "SELECT * FROM exp_purchase_order where flag = '0' ";
                                                        }
                                                        else {
                                                            $sql = "SELECT * FROM exp_purchase_order where flag = '1' ";
                                                        }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['0'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div> -->
                                    <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">Branch <span style="color:red;">*</span></label>
				                        	<div class="col-md-8">
												<select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="Signature Concepts LLP" selected>Signature Concepts LLP</option>
                                                    <!-- <option value="Shree">Shree </option>  -->
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">Expense Head <span style="color:red;">*</span></label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="expense_head_id_fk" class="select2" data-toggle="select2" name="expense_head_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
                                                        if ($flag == 0) {
                                                        $sql = "SELECT * FROM mstr_expense where flag = '0' ";
                                                        }
                                                        else {
                                                            $sql = "SELECT * FROM mstr_expense where flag = '1' ";
                                                        }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row2['0'];?>"><?php echo  $row2['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 label-control" for="userinput1">Authorised By <span style="color:red;">*</span></label>
                                            <div class="col-md-8">
                                                <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                <option value="" disabled selected>Select Authorised By</option>
                                                <?php 
                                                if ($flag == 0) {
                                                    $h = "SELECT * FROM mstr_employee where flag = '0' ";
                                                }
                                                else {
                                                    $h = "SELECT * FROM mstr_employee where flag = '1' ";
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
                                    <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">Vendor <span style="color:red;">*</span></label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php
                                                        if ($flag == 0) {
                                                        $sql = "SELECT  * FROM mstr_vendor where flag = '0' ";
                                                        }
                                                        else {
                                                            $sql = "SELECT  * FROM mstr_vendor where flag = '1' ";
                                                        }
                                                        $result = mysqli_query($db,$sql);
                                                        while($row3 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row3['0'];?>"><?php echo  $row3['1'].". ".$row3['2']." ".$row3['3'];?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">PO Amount <span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="po_amount" class="form-control " value= "0" name="po_amount" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Bill No<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="bill_no" class="form-control " placeholder="0" name="bill_no"/>
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Bill Date<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="date" id="bill_date" class="form-control " value="<?php echo date('Y-m-d'); ?>" name="bill_date" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Paid<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="paid_amt" class="form-control " value= "0" name="paid_amt" onkeyup="get_paid_value(this.id);" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-lg-4"></div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Due Date<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="date" id="due_date" class="form-control " value="<?php echo date('Y-m-d'); ?>" name="due_date" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Bill Amount<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="bill_amt" class="form-control " value= "0" name="bill_amt" readonly />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Discount (%)<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="discount_per" class="form-control " value= "0" name="discount_per" onkeyup="get_discount_per_value(this.id);" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Discount Amt<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="discount_amt" class="form-control " value= "0"  name="discount_amt" onkeyup="get_discount_amt_value(this.id);" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Amt After Disc.<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="amt_after_dis" class="form-control " value= "0" name="amt_after_dis" readonly />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Tax (%)<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="tax_per" class="form-control " value= "0" placeholder="0" name="tax_per" onkeyup="get_tax_per_value(this.id);"  />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Tax Amt<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="tax_amt" class="form-control " value= "0" placeholder="0" name="tax_amt" onkeyup="get_tax_amt_value(this.id);" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Net Amt<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="net_amt" class="form-control " value= "0" placeholder="0" name="net_amt" readonly />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">T.D.S (%)<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="tds_per" class="form-control " value= "0" placeholder="0" name="tds_per" onkeyup="get_tds_per_value(this.id);" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">T.D.S Amt<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="tds_amt" class="form-control " value= "0" placeholder="0" name="tds_amt" onkeyup="get_tds_amt_value(this.id);" />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Actual Bal<span style="color:red;">*</span></label>
											<div class="col-md-8">
											    <input type="text" id="actual_bal" class="form-control " value= "0" placeholder="0" name="actual_bal" readonly />
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark</label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" id="remark" name="remark"></textarea>
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

function getVendorSupplier(val)
{
    $.ajax({
        url: '../../api/expense/get_supp_vend_name.php',
        type: 'POST',
        data: { 'val': val },
        success: function(data){
            $('#vendor_id_fk').html(data);
        }
    })
}

function get_paid_value(e) {
    var po_amount_value = document.getElementById("po_amount").value;
    var paid_value = document.getElementById(e).value;
    var tax_amt = document.getElementById("tax_amt").value;
    var discount_amt = document.getElementById("discount_amt").value;
    var tds_amt = document.getElementById("tds_amt").value;

    if (tax_amt == 0 && discount_amt == 0 && tds_amt == 0 ) {
        var bill_amt = parseFloat(po_amount_value)-parseFloat(paid_value);
        document.getElementById("bill_amt").value = bill_amt;
        document.getElementById("net_amt").value = bill_amt;
        document.getElementById("actual_bal").value = bill_amt;
    }
    else {
        document.getElementById("net_amt").value = 0;
        document.getElementById("actual_bal").value = 0;
    }

}

function get_discount_per_value(e) {                                                
            var discount_value = document.getElementById(e).value;
            // alert('disc'+discount_value);
            var bill_amt = document.getElementById("bill_amt").value;
            var tax_amt = document.getElementById("tax_amt").value;
            var tds_amt = document.getElementById("tds_amt").value;
            //alert (tax_amt + tds_amt);
            if (tax_amt == 0 && tds_amt == 0) {
                var discount_amt = parseFloat(bill_amt)*parseFloat(discount_value)/100;
                // alert(discount_amt);
            document.getElementById("discount_amt").value = discount_amt;

            var discount_after_amt = parseFloat(bill_amt)-parseFloat(discount_amt);
            document.getElementById("amt_after_dis").value = discount_after_amt;

                document.getElementById("net_amt").value = discount_after_amt;
                document.getElementById("actual_bal").value = discount_after_amt;
        }
        else{
            var discount_amt = parseFloat(bill_amt)*parseFloat(discount_value)/100;
                // alert(discount_amt);
            document.getElementById("discount_amt").value = discount_amt;

            var discount_after_amt = parseFloat(bill_amt)-parseFloat(discount_amt);
            document.getElementById("amt_after_dis").value = discount_after_amt;

            document.getElementById("net_amt").value = discount_after_amt + parseFloat(tax_amt);
            document.getElementById("actual_bal").value = discount_after_amt + parseFloat(tax_amt)- parseFloat(tds_amt);
           
            }

    }

    function get_discount_amt_value(e) {
        var bill_amt = document.getElementById("bill_amt").value;
        var discount_amt = document.getElementById("discount_amt").value;
        var tax_amt = document.getElementById("tax_amt").value;
        var tds_amt = document.getElementById("tds_amt").value;

        var discount_per = document.getElementById("discount_per").value;
            if (discount_per != 0) {
                document.getElementById("discount_per").value = 0;
            }
       
        if (tax_amt == 0 && tds_amt == 0) {
       
            var discount_after_amt = parseFloat(bill_amt)-parseFloat(discount_amt);
            document.getElementById("amt_after_dis").value = discount_after_amt;
            //alert(discount_after_amt+"1");
                document.getElementById("net_amt").value = discount_after_amt;
                document.getElementById("actual_bal").value = discount_after_amt;
        }
        else{
            var discount_after_amt = parseFloat(bill_amt)-parseFloat(discount_amt) ;
            document.getElementById("amt_after_dis").value = discount_after_amt;
            //alert(discount_after_amt);
            document.getElementById("net_amt").value = discount_after_amt + parseFloat(tax_amt);
            document.getElementById("actual_bal").value = discount_after_amt + parseFloat(tax_amt)- parseFloat(tds_amt);

            }
    }    

    function get_tax_per_value(e) {  
        var tax_value = document.getElementById(e).value;
        var disc_after_value = document.getElementById("amt_after_dis").value;
        var bill_amt = document.getElementById("bill_amt").value;
        var tds_amt = document.getElementById("tds_amt").value;

        if (disc_after_value != 0) {
        var tax_amt = parseFloat(disc_after_value)*parseFloat(tax_value)/100;
            // alert(tax_amt);
        document.getElementById("tax_amt").value = tax_amt;

        var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;
        document.getElementById("actual_bal").value = net_amt- parseFloat(tds_amt);

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 && tds_amt == 0 ){
                if (disc_after_value != 0) {
                    var tax_amt = parseFloat(disc_after_value)*parseFloat(tax_value)/100;
                    document.getElementById("tax_amt").value = tax_amt;
                    var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
                    document.getElementById("net_amt").value = net_amt;
                    document.getElementById("actual_bal").value = net_amt - parseFloat(tds_amt);
                
                }
                else {
                    document.getElementById("net_amt").value = bill_amt;
                    document.getElementById("actual_bal").value = bill_amt;
                }
            }
     } 
     else {
        var tax_amt = parseFloat(bill_amt)*parseFloat(tax_value)/100;
        
        document.getElementById("tax_amt").value = tax_amt;

        var net_amt = parseFloat(bill_amt)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;
        document.getElementById("actual_bal").value = net_amt- parseFloat(tds_amt);

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 && tds_amt == 0 ){
                document.getElementById("net_amt").value = net_amt;
                document.getElementById("actual_bal").value = net_amt;
            }
     }
    }

    function get_tax_amt_value(e) { 
        var disc_after_value = document.getElementById("amt_after_dis").value;
        var tax_amt = document.getElementById("tax_amt").value;
        var bill_amt = document.getElementById("bill_amt").value;
        var tds_amt = document.getElementById("tds_amt").value;

        var tax_per = document.getElementById("tax_per").value;
            if (tax_per != 0) {
                document.getElementById("tax_per").value = 0;
            }

        if (disc_after_value != 0) {
        var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;
        document.getElementById("actual_bal").value = net_amt - parseFloat(tds_amt);

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;

            if(discount_amt == 0 && discount_per == 0 && tds_amt == 0){
                if (disc_after_value != 0) {
                    var net_amt = parseFloat(disc_after_value)+parseFloat(tax_amt);
                        document.getElementById("net_amt").value = net_amt;
                        document.getElementById("actual_bal").value = net_amt - parseFloat(tds_amt);
                }
                else {
                document.getElementById("net_amt").value = bill_amt;
                document.getElementById("actual_bal").value = bill_amt;
                 }
            }
        }
        else {
        var net_amt = parseFloat(bill_amt)+parseFloat(tax_amt);
        document.getElementById("net_amt").value = net_amt;
        document.getElementById("actual_bal").value = net_amt - parseFloat(tds_amt);

        var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 && tds_amt == 0){
                document.getElementById("net_amt").value = net_amt;
                document.getElementById("actual_bal").value = net_amt - parseFloat(tds_amt);

            }
     }
    }


    function get_tds_per_value(e) {  
        var tds_value = document.getElementById(e).value;
        var net_amt = document.getElementById("net_amt").value;
        var disc_after_value = document.getElementById("amt_after_dis").value;
        var discount_amt = document.getElementById("discount_amt").value;
        var tax_amt = document.getElementById("tax_amt").value;

        if (net_amt != 0) {
            var tds_amt = parseFloat(net_amt)*parseFloat(tds_value)/100;
            document.getElementById("tds_amt").value = tds_amt;

            var actual_bal = parseFloat(net_amt)-parseFloat(tds_amt);
            document.getElementById("actual_bal").value = actual_bal;

            var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 && tax_amt == 0 ){
                if (net_amt != 0) {
                    var tds_amt = parseFloat(net_amt)*parseFloat(tds_value)/100;
                    document.getElementById("tds_amt").value = tds_amt;
                    var actual_bal = parseFloat(net_amt)-parseFloat(tds_amt);
                    document.getElementById("actual_bal").value = actual_bal;
                
                }
                else {
                    document.getElementById("actual_bal").value = disc_after_value;
                }
            }

        }
        else {

            var tds_amt = parseFloat(disc_after_value)*parseFloat(tds_value)/100;
            
            document.getElementById("tds_amt").value = tds_amt;

            var actual_bal = parseFloat(disc_after_value)-parseFloat(tds_amt);
            document.getElementById("actual_bal").value = actual_bal;

            var discount_per = document.getElementById("discount_per").value;
                var discount_amt = document.getElementById("discount_amt").value;
            

                if(discount_amt == 0 && discount_per == 0 && tds_amt == 0 ){
                    document.getElementById("actual_bal").value = actual_bal;
                }

        }
    }
    function get_tds_amt_value(e) {
        var tds_value = document.getElementById(e).value;
        var net_amt = document.getElementById("net_amt").value;
        var disc_after_value = document.getElementById("amt_after_dis").value;
        var discount_amt = document.getElementById("discount_amt").value;
        var tax_amt = document.getElementById("tax_amt").value; 

        var tds_per = document.getElementById("tds_per").value;
            if (tds_per != 0) {
                document.getElementById("tds_per").value = 0;
            }

        if (net_amt != 0) {
        var actual_bal = parseFloat(net_amt)-parseFloat(tds_value);
        document.getElementById("actual_bal").value = actual_bal;

            var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;

            if(discount_amt == 0 && discount_per == 0 && tax_amt == 0){
                if (net_amt != 0) {
                    var actual_bal = parseFloat(net_amt)-parseFloat(tds_value);
                        document.getElementById("actual_bal").value = actual_bal;
                }
                else {
                document.getElementById("actual_bal").value = disc_after_value;
                 }
            }
        }
        else {
        var actual_bal = parseFloat(disc_after_value)-parseFloat(tds_value);
        document.getElementById("actual_bal").value = actual_bal;

            var discount_per = document.getElementById("discount_per").value;
            var discount_amt = document.getElementById("discount_amt").value;
           

            if(discount_amt == 0 && discount_per == 0 && tax_amt == 0){
                document.getElementById("actual_bal").value = actual_bal;
            }
     } 
    }
</script>
<script>

function save_data()
{
    var type="";
    var branch = document.getElementById("branch").value;
    var expense_head_id_fk = document.getElementById("expense_head_id_fk").value;
    var authorised_by = document.getElementById("authorised_by").value;
    var vendor_id_fk = document.getElementById("vendor_id_fk").value;
    var po_amount = document.getElementById("po_amount").value;
    var bill_no = document.getElementById("bill_no").value;
    var bill_date = document.getElementById("bill_date").value;
    var paid_amt = document.getElementById("paid_amt").value;
    var due_date = document.getElementById("due_date").value;
    var bill_amt = document.getElementById("bill_amt").value;
    var discount_per = document.getElementById("discount_per").value;
    var discount_amt = document.getElementById("discount_amt").value;
    var amt_after_dis = document.getElementById("amt_after_dis").value;
    var tax_per = document.getElementById("tax_per").value;
    var tax_amt = document.getElementById("tax_amt").value;
    var net_amt = document.getElementById("net_amt").value;
    var tds_per = document.getElementById("tds_per").value;
    var tds_amt = document.getElementById("tds_amt").value;
    var actual_bal = document.getElementById("actual_bal").value;

    if(expense_head_id_fk!= "" && authorised_by!="" && vendor_id_fk!="" 
    && po_amount!="" && bill_no!="" && bill_date!="" )
    {
        $.ajax(
        {

            url: "../../api/expense/save_exp_bill_entry.php",
            type: 'POST',
            data : $('#bill_entry_form').serialize(),
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
                            window.location.href="view_exp_bill_entry.php";    
                        }, 5000);
                // alert("Data Added Successfully!");
                // window.location.href="view_exp_bill_entry.php";
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
        if(expense_head_id_fk == "")
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
        if(po_amount == "")
        {
            $.toast({
                heading: 'Error',
                text: 'Please Enter PO Amount',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if(bill_no == "")
        {
            $.toast({
                heading: 'Error',
                text: 'Please Enter Bill Number',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if(bill_date == "")
        {
            $.toast({
                heading: 'Error',
                text: 'Please Enter Bill Date',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        
        
        
    }
    

}
</script>