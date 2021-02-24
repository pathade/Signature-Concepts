<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php
    $edit_id = $_GET['id'];
     $sql123 = "SELECT * FROM exp_pay_advice WHERE pa_id_pk='$edit_id'";
    $sres = mysqli_query($db,$sql123);
    while($srw = mysqli_fetch_array($sres))
    {

?>
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Update Payment Advice</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="payment_advice_form">
	                    	<div class="form-body">
                                <div class="row" style="visibility: hidden;">
                                    <div class="col-md-6">
                                        <?php

                                            $sql = "SELECT * FROM mstr_data_series where name='exp_payment_advice'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">payment advice No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="padv_no" class="form-control " placeholder="" name="padv_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1">Type<?php //echo $sql123;?><span style="color:red;">*</span></label>
                                            <div class="col-md-5" style="display: flex;font-size: 16px;">
                                            <?php
                                                if($srw['pay_type'] == "1")
                                                {
                                                    ?>
                                                    <input type="radio" class="form-control " name="pay_type" id="full_payment" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="1" checked>&nbsp; Full Payment 
                                                    <?php

                                                }
                                                else
                                                {
                                                    ?>
                                                    <input type="radio" class="form-control " name="pay_type" id="full_payment" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="1">&nbsp; Full Payment 
                                                    <?php

                                                }
                                            ?>
                                                
                                            </div>
                                            <div class="col-md-5" style="display: flex;font-size: 16px;">
                                            <?php
                                                if($srw['pay_type'] == "0")
                                                {
                                                    ?>
                                                    <input type="radio" class="form-control " name="pay_type" id="part_payment" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="0" checked>&nbsp; Part Payment
                                                    <?php

                                                }
                                                else
                                                {
                                                    ?>
                                                    <input type="radio" class="form-control " name="pay_type" id="part_payment" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="0">&nbsp; Part Payment 
                                                    <?php

                                                }
                                            ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 label-control" for="userinput1">Payment Date<span style="color:red;">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php echo $srw['pay_date']; ?>" id="pay_date" name="pay_date" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 label-control" for="userinput1">Authorised By<span style="color:red;">*</span> </label>
                                            <div class="col-md-8">
                                                <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                <?php
                                                   $fg = "SELECT * FROM mstr_employee WHERE emp_id_pk='".$srw['authorised_by']."'";
                                                   $fres = mysqli_query($db,$fg);
                                                   while($frww = mysqli_fetch_array($fres))
                                                   {
                                                       $emp_name = $frww['emp_name'];
                                                   }
                                                ?>
                                                <option value="<?php echo $srw['authorised_by'];?>" disabled selected><?php echo $emp_name;?></option>
                                                        <?php 
                                                            $h = "SELECT * FROM mstr_employee";
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
				                        	<label class="col-md-4 label-control" for="userinput1">Branch<span style="color:red;">*</span> </label>
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
				                        	<label class="col-md-4 label-control" for="userinput1">Type <span style="color:red;">*</span></label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="type_vari" class="select2" data-toggle="select2" name="type_vari">
                                                    <option value="<?php echo $srw['type_vari'];?>" disabled selected><?php echo $srw['type_vari'];?> </option>
                                                    <option value="FIXED" >FIXED </option>
                                                    <option value="FIXEDVARIABLE">FIXEDVARIABLE </option>
                                                    <option value="VARIABLE">VARIABLE </option>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    
                                    <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">Vendor <span style="color:red;">*</span></label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <?php
                                                    $fg = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='".$srw['vendor_id_fk']."'";
                                                    $fres = mysqli_query($db,$fg);
                                                    while($frww = mysqli_fetch_array($fres))
                                                    {
                                                        $v_name = $frww['first_name']."".$frww['last_name'];
                                                    }
                                                    ?>
                                                    <option value="<?php echo $srw['vendor_id_fk'];?>" disabled selected><?php echo $v_name;?> </option>
                                                    <?php

                                                        $sql = "SELECT  * FROM mstr_vendor";
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
                                    <div class="col-md-12">
										<div class="form-group text-center">
                                        <button type="button" class="btn btn-primary" name="show" onClick="getBillDetails()">
                                            <i class="fa fa-check-square-o"></i> Show
                                        </button>
				                        </div>
                                    </div>
                                </div>
							</div>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover" id="tbl">
                                                <thead>
                                                    <tr>
                                                    <th></th>
                                                        <th>Pay Advice </th>
                                                        <th>Vendor Name</th>
                                                        <th>Bill No</th>
                                                        <th>Bill Date</th>
                                                        <th>Bill Amt</th>
                                                        <th>Addition</th>
                                                        <th>Deduction</th>
                                                        <th>Final Payment</th>
                                                        <th>Pay Amount</th>
                                                        <th>vid</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 label-control" for="userinput1">Total Payable Amt<span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control"  id="payable_amt" name="payable_amt" readonly />
                                    </div>              
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 label-control" for="userinput1">Total Paid Amt<span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control"  id="paid_amt" name="paid_amt" readonly />
                                    </div>                    
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-4 label-control" for="userinput1">TDS Amt</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control"  id="tds_amt" value="0" name="tds_amt" readonly />
                                    </div>                  
                                </div>
                            </div>
                            <br />
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
var table="";
    $(document).ready(function()
{
    // table= $('#tbl').DataTable( {
    //     paginate: false,
    //     lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    //     buttons: [],
    //     searching:false,
    //     language : {
    //     "zeroRecords": " "             
    // }
    // }); 
    
    // table= $('#tbl').DataTable( {
    //     // dom: 'Bfrtip',
    //     paginate: false,
    //     lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    //     buttons: ['selectAll', 'selectNone'],
    //     searching:true,
     
   
    //     columnDefs: [ 
    //         { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
    //         ],      
    //     select: { style: 'multi', selector: 'td:nth-child(0)'},
    //     select: { style: 'multi'},
    //     destroy:false,
        
    // });
    table= $('#tbl').DataTable( {
        // dom: 'Bfrtip',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: ['selectAll', 'selectNone'],
        searching:false,
     
   
        columnDefs: [ 
            // { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
            ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:true,
        
    });
    var updateItemId = "<?php echo $_GET['id'] ?>";
        table = $('#tbl').DataTable( {  
                dom: 'Bfrtip',
                searching:false,
                ajax: 
                {
                    "url": "../../api/expense/get_payment_advice_items.php",
                    "type": "POST",
                    data : 
                    {
                        'itemId' : updateItemId,
                        //'ids' : ids
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


    window.setInterval(function()
    {
            var count = table.rows().count();
            var final_pay = 0;
            var total_pay_amt = 0;

            for(var i=0;i<count;i++)
            {
                var tbl5=table.cell(i,8).nodes().to$().find('input').val()

                var final_pay= parseInt(final_pay) + parseInt(tbl5);

                var tbl_pay_amt = table.cell(i,9).nodes().to$().find('input').val()
                var total_pay_amt = parseInt(total_pay_amt) + parseInt(tbl_pay_amt);
            }
            document.getElementById('payable_amt').value = final_pay ;
            document.getElementById('paid_amt').value = total_pay_amt ;

    },1000
        );
});
var i=1;
function getBillDetails()
{   
    
    var vendor = document.getElementById('vendor_id_fk').value; 
    var type_vari = document.getElementById('type_vari').value;

   //alert(vendor + type_vari);
  
   table.clear().draw();
    
    $.ajax({
        url:"../../api/expense/get-bills_by_vendor.php",
        type: "GET",
        data : 
        {
            'vendor_id_fk' : vendor
        },

        success:function(data)
        {
        console.log(data);
        $.each(data, function(index) 
        {
             var select=`<input type="checkbox" value="${data[index].start}" onchange="tax_invoice_click(this.id)">`;  
            var start=`<input type="textbox" value="${data[index].start}">`; 
            // var id=`<p>${data[index].id}</p>`;
            var vendor_name = `<input type="textbox" value="${data[index].vendor_name}">`;
            var bill_no=`<input type="textbox" value="${data[index].bill_no}">`;
            var bill_date=`<input type="textbox" value="${data[index].bill_date}">`;
            var bill_amt=`<input type="textbox" value="${data[index].bill_amt}">`;
            var addition= `<input type="textbox" value="${data[index].addition}">`;
            var deduction= `<input type="textbox" value="${data[index].deduction}">`;
            var final_payment= `<input type="number" value="${data[index].final_payment}" readonly />`;
            var paid_amount=`<input type="number" min=0 id="paid_amount${data[index].start}" value="${data[index].paid_amount}" oninput="show_amount()" />`;
            var vid=`<input type="number" min=0 id="vid${data[index].vid}" value="${data[index].vid}"  />`;
            table.row.add( [
                 select,
                     start,
                    vendor_name,
                    bill_no,
                    bill_date,
                    bill_amt,
                    addition,
                    deduction,
                    final_payment,
                    paid_amount,
                    vid
                    ] ).draw( false );
            }); 
        }

    });

}

function show_amount() 
{

    var count=table.rows().count();
var amount=0;
var final_pay = 0;

for(var i=0;i<count;i++)
{

    var tbl4=table.cell(i,9).nodes().to$().find('input').val()

    var amount= parseInt(amount) + parseInt(tbl4);

  
}

document.getElementById('paid_amt').value = amount ;

}


  function save_data()
{
    var vendor_id_fk = document.getElementById('vendor_id_fk').value; 
    var authorised_by = document.getElementById('authorised_by').value; 
    var type_vari = document.getElementById('type_vari').value; 
    var paid_amt = document.getElementById('paid_amt').value; 
    var payable_amt = document.getElementById('payable_amt').value; 
    var pay_date = document.getElementById('pay_date').value; 
    
    
    
    var count=table.rows('.selected').count();
    var rawItemArray = [];
    //alert("save data:"+count);
          
        // $("#tbl input[type=checkbox]:checked").each(function () 
        // {
        $("#tbl input[type=checkbox]:checked").each(function () 
        {
            var row = $(this).closest("tr")[0];
            // alert("rowww:"+row);
            // invoice_id_pk = row.cells[0].childNodes[0].value;
            // alert("invoice_id_pk:"+invoice_id_pk);
            // invoice_no = row.cells[1].childNodes[0].value;
            // invoice_date = row.cells[2].childNodes[0].value;


            // var row = $(this).closest("tr")[0];
            // alert("row:"+row);
            pay_advice_no = row.cells[1].childNodes[0].value;
            //alert("invoice_id_pk:"+invoice_id_pk);
            vendor_name = row.cells[10].childNodes[0].value;
            //alert("vendor_name:"+vendor_name);
            bill_no = row.cells[3].childNodes[0].value;
            //alert("bill_no:"+bill_no);
            bill_date = row.cells[4].childNodes[0].value;
            //alert("bill_date:"+bill_date);
            bill_amt = row.cells[5].childNodes[0].value;
            //alert("bill_amt:"+bill_amt);
            addition = row.cells[6].childNodes[0].value;
            //alert("addition:"+addition);
            deduction = row.cells[7].childNodes[0].value;
            //alert("deduction:"+deduction);
            final_payment = row.cells[8].childNodes[0].value;
            //alert("final_payment:"+final_payment);
            paid_amount = row.cells[9].childNodes[0].value;
            //alert("paid_amount:"+paid_amount);

            rawItemArray.push({
                pay_advice_no : pay_advice_no,
                vendor_name:vendor_name,
                bill_no:bill_no,
                bill_date:bill_date,   
                bill_amt:bill_amt,
                addition:addition,
                deduction:deduction, 
                final_payment:final_payment, 
                paid_amount:paid_amount, 
            });
            // i++;
     
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

    if(paid_amt != "" && payable_amt!= 0 && vendor_id_fk !="" 
    && authorised_by!="" && pay_date!="" )
    {
        $.ajax(
        {

            url: "../../api/expense/update_exp_payment_advice.php",
            type: 'POST',
            data : $('#payment_advice_form').serialize()+ "&newRawItemArray="+ newRawItemArray+ "&vendor_id_fk=" + vendor_id_fk+
            "&type_vari=" + type_vari+ "&authorised_by=" + authorised_by + '&edit_id='+<?php echo $_GET['id'];?>,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data); 
                if(data == "1")
                {
                    $.toast({
                            heading: 'Success',
                            text: 'Data Updated Successfully!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_payment_advice.php";    
                        }, 5000);
                    // alert("Data Added Successfully!");
                    // window.location.href="view_exp_payment_advice.php";
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
        if(count == 0)
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Vendor And click show button',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(pay_date == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Date',
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
        if(paid_amt == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Total Paid Amount Required',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
        if(payable_amt == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Total Payable Amount Required',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
    }

    

}
function tax_invoice_click(id)
{
    //alert("hii:"+id);
}
</script>
<?php } ?>