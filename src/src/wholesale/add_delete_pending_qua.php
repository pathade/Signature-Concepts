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
    .table td, .table th {
    border-bottom: 1px solid #E3EBF3;
    padding: .75rem 1rem;
}

    .radio-row {
        font-size: 18px;
        width: 100%;
        display: flex;
        margin-left: 15px;
    }
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" id="form1" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Add Delete Pending Quantity</h4>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Branch</label>
				                        	<div class="col-md-9">
                                                <select class="form-control" id="branch" name="branch" readonly>
                                                    <option value="" disabled selected>Signature Concepts LLP </option>
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
				                        	<label class="col-md-3 label-control" for="userinput1">Customer <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" onchange="cust_select();">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php

                                                        $sql = "SELECT cust_id_fk,cust_name 
                                                                FROM `wholesale_work_order` as w,tbl_wholesale_customer as c 
                                                                where w.cust_id_fk = c.wc_id_pk AND w.delivery_challan_status = 0
                                                        ";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row['cust_id_fk'];?>"><?php echo  $row['cust_name'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Work NO <span style="color:red;">*</span></label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="work_no" class="select2" data-toggle="select2" name="work_no" onchange="select_work();">
                                                <option value="" disabled selected>Select </option>
                                               
												</select>
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group row radio-row">
                                            <!-- <input type="checkbox" name="all" id="all" style="height: 20px;width: 20px;" /> &nbsp; All -->
                                        </div>
                                    </div>
		                        </div>
							</div>
                            <hr />
                            <br />
                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row m-0">
                                                        <!-- <input type="checkbox" name="tbl_all" id="tbl_all" style="height: 20px;width: 20px;" /> &nbsp; All -->
                                                    <div class="table-responsive">
                                                             <table class="border-bottom-0 table table-hover" id="tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Select &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>WorkNo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>PendingPoNo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <!-- <th>Site Name </th> -->
                                                                        <th>Item Name </th>
                                                                        <th>Size</th>
                                                                        <!-- <th>Breath</th> -->
                                                                        <th>OrderQty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>PendingQty&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>DeleteQty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Reamin qty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th style="display:none;">Work order item id fk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>   
                                                                            <input type="checkbox" id="selected_row" name="selected_row" style="height: 17px;width: 17px;"/>
                                                                        </td>
                                                                        <td>1</td>
                                                                        <td>0</td>
                                                                        <!-- <td>0</td>                                                                         -->
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <!-- <td>0</td> -->
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <!-- <td>0</td> -->
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <br /><br />
	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="add_delete_pending_qua" >
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
function cust_select()
{
    var cust_id = document.getElementById("customer").value;
    //alert("cust_id:"+cust_id);
    $.ajax({
                type: "POST",
                url: '../../api/wholesale/fetchwork_no_for_delete_pending_qty.php',
                data: "cust_id="+cust_id ,
                success: function(data)
                { 
                    //alert("result is:"+data);
                    //var d = data.split("#");
                    //var item_id = "item_id-".concat(get_id);
                    //alert("custom id is:"+item_id);
                    //document.getElementById(item_id).html = data;
                    $('#work_no').html(data);
                }
            });

}
function select_work()
{
    var work_no = document.getElementById("work_no").value;
    /*$.ajax({
            type: "POST",
            url: '../../api/wholesale/fetch_work_items_for_delete_pending_qty.php',
            data: "work_no="+work_no ,
            success: function(data)
            { 
                  //$('#work_no').html(data);
            }
        });*/

        table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:true,
            ajax: 
            {
                    "url": "../../api/wholesale/fetch_work_items_for_delete_pending_qty_new.php",
                    "type": "POST",
                    data : 
                    {
                    'work_no' : work_no,
                    },
                    /*dataType: 'text',
                    success: function(data)
                    { 
                        console.log("reverse data:"+data);
                    
                    
                    },*/
                },
                deferRender: true,
                "columnDefs": 
                [ 
                //   {
                //   "targets": 1,
                //   "data": null,
                //   "defaultContent": "<button type=\"button\" name=\"edit\" class=\"btn btn-success btn-sm\"><i class='fa fa-pencil' aria-hidden='true'></i></button>"
                //   },
                // {
                //     "targets": 0,
                //     "data": null,
                //     "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
                // },
                ],
                destroy:true,
                /*"fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;
                },*/
            });
}

function dwl(id)
{
    //alert("id is:"+id);
    get_id = id.split("-");
    //alert("kkkkkkk:"+get_id[1]);

    var pending_qty = document.getElementById("pending_qty-"+get_id[1]).value;
    //alert("pending_qty:"+pending_qty);
    

    if(pending_qty == "0")
    {
        //alert("jjj");
        var quantity =  document.getElementById("quantity-"+get_id[1]).value;
        //alert("quantity:"+quantity);
        var delete_qty = document.getElementById(id).value;

        if(parseInt(delete_qty) < parseInt(quantity) )
        {
            var remain_qty = parseInt(quantity) - parseInt(delete_qty);
            document.getElementById("remain_qty-"+get_id[1]).value = remain_qty;
        }
        else
        {
            alert("Delete Quantity cant be greater than Pending Quantity");
        }
    }
    else
    {
        //alert("kkkk");
        var delete_qty = document.getElementById(id).value;

        if(parseInt(delete_qty) < parseInt(pending_qty) )
        {
            var remain_qty = parseInt(pending_qty) - parseInt(delete_qty);
            document.getElementById("remain_qty-"+get_id[1]).value = remain_qty;
        }
        else
        {
            alert("Delete Quantity cant be greater than Pending Quantity");
        }
    }
    // var dq = delete_qty;
    // alert("dq:"+dq);

    
    
}
	
</script>
<script>
//invoice_array
$(document).ready(function () {
    $('#add_delete_pending_qua').on('click', function () {
        //alert("hhhhhhhhhhhhhhhhhh");
        //console.log(invoice_array);
        //Loop through all checked CheckBoxes in GridView.
        var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            //alert("rowww:"+row);
            work_no = row.cells[0].childNodes[0].value;
            work_no = row.cells[1].childNodes[0].value;
            pending_po_no = row.cells[2].childNodes[0].value;
            order_qty = row.cells[5].childNodes[0].value;
            pending_qty = row.cells[6].childNodes[0].value;
            delete_qty = row.cells[7].childNodes[0].value;
            remain_qty = row.cells[8].childNodes[0].value;
            work_order_item_id_fk = row.cells[9].childNodes[0].value;

            rawItemArray.push({
                work_no : work_no,
                pending_po_no : pending_po_no,
                order_qty:order_qty,
                pending_qty:pending_qty,
                delete_qty:delete_qty,
                remain_qty:remain_qty,
                work_order_item_id_fk:work_order_item_id_fk
            });
            
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

        var cust = document.getElementById("customer").value;
        var work_no = document.getElementById("work_no").value;
        //pay type:
        if(cust != "" && work_no!="")
        {
            //alert("hii");
            $.ajax( 
            {
                url: "../../api/wholesale/add_wholesale_delete_pending_qty_new.php",
                type: 'POST',
                data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray ,
                //dataType:'text',  
                success: function(data)
                { 
                    //alert("data:"+data);
                    console.log(data);
                    if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Delete Pending Quantity Added',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_delete_pending_qua.php";    
                        }, 5000);
                        $('#btn').atrr('disabled', true);
                    }
                    else if(data == "0")
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        //alert("Please Enter Valid details");
                        //window.location.href="view_wholesale_work_order.php";
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid details',
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
            //alert("byee");
            if(cust=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Please Select Customer',
                	showHideTransition: 'slide',
                	position: 'top-right',
                	hideAfter: 5000,
                	icon: 'error'
                })
            }
            if(work_no=="")
            {
                $.toast({
                	heading: 'Error',
                	text: 'Please Select Work Number',
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


                        