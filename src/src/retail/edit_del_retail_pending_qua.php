<?php include('../../partials/header.php');?>
<?php

    $id = $_GET['id'];
    $s = "SELECT * FROM retail_delete_pending_qty WHERE d_id_pk='$id'";
    $m = mysqli_query($db,$s);
    while($drow = mysqli_fetch_array($m))
    {
        $pay_back_type = $drow['pay_back_type'];
        $customer_id = $drow['customer_id'];
        $po_no = $drow['po_no'];
        $bank = $drow['bank'];
        $account_no = $drow['account_no'];
        $cheque_no = $drow['cheque_no'];
        $outstanding = $drow['outstanding'];
        $delete_amt = $drow['delete_amt'];

        $sql3 = "SELECT * FROM retail_proforma WHERE id_pk='$po_no'";
        $lk3 = mysqli_query($db,$sql3);
        while($m3 = mysqli_fetch_array($lk3))
        {
            $order_no = $m3['order_no'];
        }

        $sql2 = "SELECT * FROM mstr_retail_customer WHERE retail_cust_idpk='$customer_id'";
        $lk2 = mysqli_query($db,$sql2);
        while($m2 = mysqli_fetch_array($lk2))
        {
            $retail_cust_name = $m2['retail_cust_name'];
        }

        if($bank != 0)
        {
            $sql1 = "SELECT * FROM mstr_bank WHERE bank_idpk='$bank'";
            $lk1 = mysqli_query($db,$sql1);
            while($m1 = mysqli_fetch_array($lk1))
            {
                $bank_name = $m1['bank_name'];
            }
        }
        else
        {
            $bank_name = "";
        }
        
    }

?>

<style>
td {
    width: 0 !important;
}
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
    .table td, .table th {
    border-bottom: 1px solid #E3EBF3;
    padding: .75rem 1rem;


    }

    .radio-row {
        font-size: 14px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    td {
        width: 100%;
    }
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form1">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Add Delete Retail Pending Quantity<?php echo $id;?></h4>
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
	                    <form class="form form-horizontal" id="form1" data-toggle="validator" role="form" method="POST">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
			                        	<div class="form-group row ">
                                            <label class="col-md-3 label-control" for="userinput1">Pay Back<span style="color:red;">*</span></label>
                                            <?php 
                                                if($pay_back_type == "cash_back")
                                                {
                                                    ?>
                                                        <input type="radio" name="pay_type" value="cash_back" checked id="pay_type" style="height: 14px;width: 14px;" onclick="type_click(this);"/> &nbsp;Cash Back  &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                        <input type="radio" name="pay_type" value="cash_back" id="pay_type" style="height: 14px;width: 14px;" onclick="type_click(this);"/> &nbsp;Cash Back  &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                }
                                            ?>
                                            <?php 
                                                if($pay_back_type == "cheque_back")
                                                {
                                                    ?>
                                                        <input type="radio" name="pay_type" value="cheque_back" checked id="pay_type" style="height: 14px;width: 14px;" onclick="type_click(this);"/> &nbsp;Cheque Back  &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                        <input type="radio" name="pay_type" value="cheque_back" id="pay_type" style="height: 14px;width: 14px;" onclick="type_click(this);"/> &nbsp;Cheque Back  &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                }
                                            ?>
                                        </div>											
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">OutStanding Amt:</label>
				                        	<div class="col-md-3">
												<input type="text" id="outstanding_amt" class="form-control " placeholder="0" name="outstanding_amt" value="" style="height: calc(2.75rem + -6px);background: #000;color: #1ec20a;" />
											</div>
                                            <label class="col-md-3 label-control" for="userinput1">Deleted Amt:</label>
				                        	<div class="col-md-3">
												<input type="text" id="deleted_amt" class="form-control " value="0" placeholder="0" name="deleted_amt" value="" style="height: calc(2.75rem + -6px);background: #000;color: #1ec20a;" />
											</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="supplier" name="supplier" readonly>
                                                <option value="NKS Aromas" selected>NKS Aromas</option>
                                               
												</select>
                                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Date</label>
				                        	<div class="col-md-5">
												<input type="date" id="date" class="form-control " placeholder="" name="date" value="<?php echo date('Y-m-d'); ?>" >
											</div>
				                        </div>
				                    </div>
                                </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer<span style="color:red;">*</span></label>
				                        	<div class="col-md-9">

                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onchange="getProInvNo(this.value);">
                                                <option value="<?php echo $customer_id;?>"><?php echo $retail_cust_name;?></option>
                                                <?php 
                                                    $get_customer_id = "SELECT customer FROM retail_proforma WHERE tax_invoice_added!='1'";
                                                    $res_customer_id = mysqli_fetch_row(mysqli_query($db, $get_customer_id));

                                                    $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='$res_customer_id[0]'";
                                                    $res_customer = mysqli_query($db, $get_customer);

                                                    while($row = mysqli_fetch_row($res_customer))
                                                    {
                                                        echo '<option value="'.$res_customer_id[0].'">'.$row[0].'</option>';
                                                    }

                                                ?>
                                               
												</select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">PO NO<span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no" onchange="pono_select();">
                                                <option value="<?php echo $po_no;?>"><?php echo $po_no;?> </option>
                                               
												</select>
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Bank<span style="color:red;">*</span></label>
				                        	<div class="col-md-9 ">
                                                <select class="form-control" id="bank" name="bank" onchange="getAccountNo()">
                                                <option value="<?php echo $bank;?>"><?php echo $bank_name;?></option>
                                                <?php 
                                                    echo $sql = "SELECT * FROM mstr_bank";
                                                    $res = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($res))
                                                    {
                                                
                                                ?>
                                                    <option value="<?php echo $row['bank_idpk']; ?>" >
                                                        <?php echo $row['bank_name']; ?> 
                                                    </option>
                                                <?php } ?>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Account No.<span style="color:red;">*</span></label>
				                        	<div class="col-md-9 ">
                                                <select class="form-control" id="account_no" name="account_no" onchange="account_click();">
                                                <option value="<?php echo $account_no;?>"><?php echo $account_no;?> </option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Cheque No.<span style="color:red;">*</span></label>
				                        	<div class="col-md-9 ">
                                                <input type="text" id="cheque_no" class="form-control " placeholder="0" name="cheque_no" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
		                        </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group row radio-row">
                                            <!-- <input type="checkbox" name="transOth" id="transOth" style="height: 14px;width: 14px;" /> &nbsp; Transport / Other Charges -->
                                        </div>
                                    </div>
		                        </div>
							</div>
                            <hr />
                            <!-- <br /> -->
                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row m-0"> -->
                                                        <!-- <input type="checkbox" name="all" id="all" style="height: 14px;width: 14px;" /> &nbsp; All -->
                                                    <div class="table-responsive">
                                                    <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                             <!-- <table class="border-bottom-0 table table-hover" id="tbl"> -->
                                                                <thead>
                                                                    <tr>
                                                                        <th>Select </th>
                                                                        <th>PONO. </th>
                                                                        <th>Item Name </th>
                                                                        <th>Size</th>
                                                                        <th>OrderQty</th>
                                                                        <th>PendingQty</th>
                                                                        <th>DeleteQty </th>
                                                                        <th>Rate </th>
                                                                        <th>FInalNetAmt </th>
                                                                        <th>ReducedAmt </th>
                                                                        <th>Item_id_fk </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        <!-- </div> -->
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <br /><br /> -->
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
    var table = "";
    $(document).ready(function()
    { 
        $("#bank").prop("disabled", true);
        $("#account_no").prop("disabled", true);
        table = $('#tbl').DataTable( {
        
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
        language : {
        "zeroRecords": " ",
        
        },
    
       });

       $.ajax({
            url: '../../api/retail/get_delete_pending_qty.php',
            type: "POST",
            data : 
            {
                'id' : <?php echo $id;?>,
                //'customer_id': customer_id
            },
            dataType:'json',

            success:function(data){
                var i=0;
        table.clear().draw();
            console.log('Data: '+data);
            $.each(data, function(index)  
            {
                var select = `<input type="checkbox" checked id="check-${i}" value="${data[index].start}" onchange="tax_invoice_click(this.id)"/>`;
                var pono=`<input type="text" id="pono-${i}" value="${data[index].pono_item_id_fk}" class="form-control" />`; 
                var item_name=`<input type="text" id="item-${i}" value="${data[index].item_name}" class="form-control" />`; 
                var size=`<input type="text" id="size-${i}" value="${data[index].size}" class="form-control" />`; 
                var oqty=`<input type="text" id="oquantity-${i}" value="${data[index].oqty}" class="form-control" />`; 
                var pqty=`<input type="text" id="pquantity-${i}" value="${data[index].pqty}" class="form-control" />`; 
                var dqty=`<input type="text" id="dquantity-${i}" value="${data[index].dqty}" class="form-control" onkeyup="denter(this.id);"/>`;
                var rate=`<input type="text" id="rate-${i}" value="${data[index].rate}" class="form-control" />`;
                var amount=`<input type="text" id="amount-${i}" value="${data[index].final_amt}" class="form-control" />`; 
                var reduced_amt=`<input type="text" id="ramount-${i}" value="${data[index].reduced_amt}" class="form-control" />`; 
                var item_id_fk=`<input type="text" id="item_id-${i}" value="${data[index].item_id_fk}" class="form-control" />`; 

                
                i++;
                table.row.add( [
                        select,
                        pono,
                        item_name,
                        size,
                        oqty,
                        pqty,
                        dqty,
                        rate,
                        amount,
                        reduced_amt,
                        item_id_fk
                        ] ).draw( false );
                }); 
                
            }
        });

    });

</script>
<script>

    // get pro inv no.
    function getProInvNo(name)
    {   
        $.ajax({
            type: "POST",
            url:"../../api/retail/get_pro_inv_no.php",
            data: { 'name': name },
            dataType: 'json',
            success:function(data)
            {
                console.log("Data: "+data);
                document.getElementById('po_no').options[0]=new Option("select","")
                for (var i = 0; i < data.length; i++) 
                {
                    var option = document.createElement("option");
                    option.setAttribute("value", data[i]["id"]);
                    option.text = data[i]["name"];
                    document.getElementById('po_no').appendChild(option);
                }
            }
        });
    
    
    }

    // get table
    function pono_select()
    {
        //alert("hiii123");

        //var po_no=$('#po_no').val(); 
        var po_no = document.getElementById("po_no").value;
        //alert("po_no:"+po_no);
        var customer_id=$('#customer').val(); 
        var i=0;
        table.clear().draw();
        $.ajax({
            url: '../../api/retail/get_retail_pending_qty_table.php',
            type: "POST",
            data : 
            {
                'po_no' : po_no,
                //'customer_id': customer_id
            },
            dataType:'json',

            success:function(data){
                
            console.log('Data: '+data);
            $.each(data, function(index)  
            {
                var select = `<input type="checkbox" id="check-${i}" value="${data[index].start}" onchange="tax_invoice_click(this.id)"/>`;
                var pono=`<input type="text" id="pono-${i}" value="${data[index].pono}" class="form-control" />`; 
                var item_name=`<input type="text" id="item-${i}" value="${data[index].item_name}" class="form-control" />`; 
                var size=`<input type="text" id="size-${i}" value="${data[index].size}" class="form-control" />`; 
                var oqty=`<input type="text" id="oquantity-${i}" value="${data[index].oqty}" class="form-control" />`; 
                var pqty=`<input type="text" id="pquantity-${i}" value="${data[index].pqty}" class="form-control" />`; 
                var dqty=`<input type="text" id="dquantity-${i}" value="${data[index].dqty}" class="form-control" />`;
                var rate=`<input type="text" id="rate-${i}" value="${data[index].rate}" class="form-control" />`;
                var amount=`<input type="text" id="amount-${i}" value="${data[index].final_amt}" class="form-control" />`; 
                var reduced_amt=`<input type="text" id="ramount-${i}" value="${data[index].reduced_amt}" class="form-control" />`; 
                var item_id_fk=`<input type="text" id="item_id-${i}" value="${data[index].item_id_fk}" class="form-control" />`; 

                
                i++;
                table.row.add( [
                        select,
                        pono,
                        item_name,
                        size,
                        oqty,
                        pqty,
                        dqty,
                        rate,
                        amount,
                        reduced_amt,
                        item_id_fk
                        ] ).draw( false );
                }); 
                
            }
        });
    }

</script>


<script>
    function pono_select1()
    {
        alert("hii");
        var po_no = document.getElementById("po_no").value;
        // var test = $('#sel-03');
        // var ids = $(test).val(); // works
        // console.log('Selected IDs123: ' + ids);
        // var display_data = document.getElementById('display_data');
        // display_data.style.display = 'block'; //or

        
    }
    var invoice_array = [];
    function tax_invoice_click(id)
    {
        //alert("id:"+id);
        var get_id = id.split("-");
        var get_id = get_id[1];
        var d = document.getElementById(id).value;
        //alert("d:"+d);
        if (invoice_array.filter(item=> item.id == get_id).length == 0)
        {
            invoice_array.push({ id: get_id});
            console.log(invoice_array);
        }
        else
        {
            //alert("index exist");
        }
    } 
</script>                        
<script>
function myfunc(ele) {
 var values = new Array();
       $.each($("input[name='case[]']:checked").parents("td").siblings(), function() {
           values.push($(this).text());
           //alert("val---"+values);
       });
       console.log(values);
           alert("val---"+values);
}
</script>
<script>
$(document).ready(function () {
    $('#add_purchase_order').on('click', function () {

        var pay_type = document.getElementById('pay_type').value;
        var customer = document.getElementById('customer').value;
        var po_no = document.getElementById('po_no').value;
        var deleted_amt = document.getElementById('deleted_amt').value;
        var bank = document.getElementById('bank').value;
        var account_no = document.getElementById('account_no').value;
        var cheque_no = document.getElementById('cheque_no').value;
        //Loop through all checked CheckBoxes in GridView.
        var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            retail_pending_item_id_fk = row.cells[0].childNodes[0].value;
            retail_pending_proforma_id_fk = row.cells[1].childNodes[0].value;
            item = row.cells[2].childNodes[0].value;
            size = row.cells[3].childNodes[0].value;
            order_qty = row.cells[4].childNodes[0].value;
            pending_qty = row.cells[5].childNodes[0].value;
            delete_qty = row.cells[6].childNodes[0].value;
            rate = row.cells[7].childNodes[0].value;
            final_net_amt = row.cells[8].childNodes[0].value;
            reduced_amt = row.cells[9].childNodes[0].value;
            item_id_fk = row.cells[10].childNodes[0].value;

            rawItemArray.push({
                retail_pending_item_id_fk : retail_pending_item_id_fk,
                retail_pending_proforma_id_fk : retail_pending_proforma_id_fk,
                item:item,
                size:size,
                order_qty:order_qty,
                pending_qty:pending_qty,
                delete_qty:delete_qty,
                rate:rate,
                final_net_amt:final_net_amt,
                reduced_amt:reduced_amt,
                item_id_fk:item_id_fk
            });
            
        });
        var newRawItemArray = JSON.stringify(rawItemArray); 
        console.log(newRawItemArray);
        
        if($("input:radio[name='pay_type']").is(":checked") && customer!="" && po_no!="" && deleted_amt!="") 
        {
            var payval = $("input[name='pay_type']:checked").val();
            //alert("payval type:"+payval);
            if(payval == "cheque_back")
            {
                if(bank !="" && account_no!="" && cheque_no!="")
                {
                    $.ajax(
                    {
                        url: "../../api/retail/update_delete_pending_qty.php",
                        type: 'POST',
                        data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&account_no=' +account_no +'&bank='+bank+'&id='+<?php echo $id;?>,
                        dataType:'text',  
                        success: function(data) 
                        { 
                            //alert("data:"+data);
                            console.log(data);
                            if(data == "1")
                            {
                                $.toast({
                                    heading: 'Success',
                                    text: 'Delete Pending Quantity Updated!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => 
                                {
                                    window.location.href="view_del_retail_pending_qua.php";    
                                }, 5000);
                                $('#btn').atrr('disabled', true);
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
                            }
                        
                        },
                        
                    });
                }
                else
                {
                    if(bank=="")
                    {
                        $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Bank',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                    }
                    if(account_no=="")
                    {
                        $.toast({
                                    heading: 'Error',
                                    text: 'Account Number Require',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                    }
                    if(cheque_no=="")
                    {
                        $.toast({
                                    heading: 'Error',
                                    text: 'Cheque Require',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                    }
                }

            }
            else
            {
                $.ajax(
                {
                    url: "../../api/retail/update_delete_pending_qty.php",
                    type: 'POST',
                    data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&account_no=' +account_no +'&bank='+bank +'&id='+<?php echo $id;?>,
                    dataType:'text',  
                    success: function(data) 
                    { 
                        //alert("data:"+data);
                        console.log(data);
                        if(data == "1")
                        {
                            $.toast({
                                heading: 'Success',
                                text: 'Delete Pending Quantity Updated!',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'success'
                            })
                            setTimeout(() => 
                            {
                                window.location.href="view_del_retail_pending_qua.php";    
                            }, 5000);
                            $('#btn').atrr('disabled', true);
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
                        }
                    
                    },
                    
                });
            }
            
        }
        else
        {
            //alert("byeww");
                    //alert("please select type");
                    if(!($("input:radio[name='pay_type']").is(":checked")))
                    {
                        $.toast({
                                    heading: 'Error',
                                    text: 'Please Select Type',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                    }
                    if(customer=="")
                    {
                        $.toast({
                                    heading: 'Error',
                                    text: 'Please select Customer',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                    }
                    if(po_no=="")
                    {
                        $.toast({
                                    heading: 'Error',
                                    text: 'Please Select PO NO.',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                    }
        }
        


        

        

        
    });
});
</script>
<script>
    function type_click(id)
    {
        var type_c = document.getElementById("pay_type").value;
        var alert_val = id.value;
        if(alert_val == "cheque_back")
        {
            //document.getElementById("cheque_no").readOnly = false;
            $("#bank").prop("disabled", false);
            $("#account_no").prop("disabled", false);
        }
        else
        {
            document.getElementById("cheque_no").readOnly = true;
            $("#bank").prop("disabled", true);
            $("#account_no").prop("disabled", true);
        }
    }
    function getAccountNo()
    {
        var bid = document.getElementById("bank").value;
        //document.getElementById("account_no").length = 0;
        $.ajax(
        {
            url: "../../api/wholesale/get_account_by_bank.php",
            type: 'POST',
            data : 
            {
            'bank_name' : bid
            },
            dataType:'text',
            success: function(data)
            {
                $("#account_no").html(data);
            },
            error : function(request,error)
            {}
        }
        );
    }
    function account_click()
    {
        var account_no = document.getElementById("account_no").value;
        var bid = document.getElementById("bank").value;
        //document.getElementById("account_no").length = 0;
        $.ajax(
        {
            url: "../../api/global/get_cheque_no.php",
            type: 'POST',
            data : 
            {
                'bank_id':bid,
                'acc_no' : account_no
            },
            dataType:'text',
            success: function(data)
            {
                //$("#account_no").html(data);
                //alert("data:"+data);
                document.getElementById("cheque_no").value=data;
            },
            error : function(request,error)
            {}
        }
        );
    }

    function denter(idval)
    {
        //alert("idval:"+idval);
        var get_id = idval.split("-");
        var get_id = get_id[1];
        var rate = document.getElementById("rate-"+get_id).value;
        var delete_qty = document.getElementById(idval).value;
        var reduce_amt = parseFloat(rate) * parseFloat(delete_qty);
        document.getElementById("deleted_amt").value = reduce_amt;
        document.getElementById("ramount-"+get_id).value = reduce_amt;

        
        
    }
    window.setInterval(function()
        {
            //alert("hii:");
            var count=table.rows().count();
            //alert("count:"+count);
            //console.log("count:"+count);

            var total_dqty=0;
            var total_rate=0;
            var totalqty=0;
            var totalsqft = 0;
            var totaldisc = 0;
            var gross = 0;
            var total_reduce_amt = 0;

            for(var i=0;i<count;i++)
            {
                
                var dquantity=table.cell(i,6).nodes().to$().find('input').val()
    
                //var total_dqty= parseInt(total_dqty) +parseInt(dquantity);

                var rate=table.cell(i,7).nodes().to$().find('input').val()
    
                //var total_rate= parseInt(total_rate) +parseInt(rate);

                
                //var total_reduce_amt = parseFloat(dquantity) * parseFloat(rate);
                var total_reduce_amt= parseFloat( total_reduce_amt) +parseFloat(dquantity) * parseFloat(rate);
                //console.log("total_reduce_amt:"+total_reduce_amt);

            }

        
            document.getElementById('deleted_amt').value=total_reduce_amt;
        },1000
        );
</script>