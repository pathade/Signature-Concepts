<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Cheque Printing Expenses</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pay_advice_cancel_form">
	                    	<div class="form-body">
                                <div class="row" style="visibility: hidden;">
                                    <div class="col-md-6">
                                        <?php

                                            $sql = "SELECT * FROM mstr_data_series where name='exp_pay_advice_cancel'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Payment Advice Cancel No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="pac_no" class="form-control " placeholder="" name="pac_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Vendor</label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="vendor_name" class="select2" data-toggle="select2" name="vendor_name">
                                                        <option value="" disabled selected>Select </option>
                                                        <?php 
                                                            $d = "SELECT vendor_id_fk,saturation,first_name,last_name FROM `exp_pay_advice` as e,mstr_vendor as v where e.vendor_id_fk = v.vendor_id_pk";
                                                            $f = mysqli_query($db,$d);
                                                            while($j = mysqli_fetch_array($f))
                                                            {
                                                                
                                                            
                                                        ?>
                                                            
                                                            <option value="<?php echo $j['vendor_id_fk'];?>"><?php echo $j['saturation'].".".$j['first_name']." ".$j['last_name'];?></option>
                                                            
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bank </label>
                                                    <div class="col-md-9">
                                                    <select class="select2 form-control block select21" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                        <?php
                                                            $option="<option value=''>Select Bank</option>";
                                                            echo $option;
                                                            $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                            $result = mysqli_query($db, $sql);
                                                            while($row2 = mysqli_fetch_array($result))
                                                            {
                                                                $option="<option value='".$row2['bank_idpk']."'>".$row2['bank_name']."</option>";
                                                                echo $option;
                                                            }
                                                        ?>  												
												    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Account No</label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block select21" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" >
                                                            <option value=''>Select </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Cheque No </label>
				                        	<div class="col-md-2 divcol">
                                                <textarea type="number" class="form-control" rows="2" id="cheque_no" name="cheque_no"></textarea>
				                            </div>
                                            <label class="col-md-2 label-control" for="userinput1" >Cheque Date </label>
				                        	<div class="col-md-2 divcol">
                                                <input type="date" class="form-control" rows="2" id="cheque_dt" name="cheque_dt">
				                            </div>
                                            <label class="col-md-1 label-control" for="userinput1" > </label>
                                            <div class="col-md-2 divcol">
                                            <button type="button" class="btn btn-primary" name="add" onClick="show_data()">
                                                <i class="fa fa-check-square-o"></i> SHOW
                                            </button>
				                            </div>
				                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12" id="show_table">
                                                        <div class="table-responsive">
                                                            <table class="border-bottom-0 table table-hover" id="tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Payment Advice Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Payment Advice Date  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Vendor Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Expense Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Expense Head &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Amount&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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
  function save_data()
{
    // var branch = document.getElementById("branch").value;
    // var pay_advice_id_fk = document.getElementById("pay_advice_id_fk").value;
    // var fin_yr = document.getElementById("fin_yr").value;
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);

    var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            alert("rowww:"+row);
            //payment_advice_id = row.cells[0].childNodes[0].value;
            payment_advice_id = row.cells[1].childNodes[0].value;
            payment_advice_date = row.cells[2].childNodes[0].value;
            vendor_name = row.cells[3].childNodes[0].value;
            expense_type = row.cells[4].childNodes[0].value;
            expense_head = row.cells[5].childNodes[0].value;
            Amount = row.cells[6].childNodes[0].value;

            rawItemArray.push({
                payment_advice_id : payment_advice_id,
                payment_advice_date : payment_advice_date,
                vendor_name:vendor_name,
                expense_type:expense_type,
                expense_head:expense_head,
                Amount:Amount
            });
            
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);
  $.ajax(
          {

          url: "../../api/expense/save_cheque_printing_expense.php",
          type: 'POST',
          data : $('#pay_advice_cancel_form').serialize(),
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              if(data == "1")
              {
                alert("Data Added Successfully!");
                window.location.href="view_payment_advice_cancellation.php";
              }
              else
              {
                  alert("Please Enter Valid Details");
              }
          
          },
          
          });
}
function getAccountNo()
{ 
     
    var bid = document.getElementById("bank_name").value;
    document.getElementById("account_no").length = 0;
    $.ajax(
      {
        url: "../../api/wholesale/get_account_by_bank.php",
        type: 'POST',
        data : 
        {
          'bank_name' : bid
        }, 
        dataType:'Text',
        success: function(data)
        {
            //alert("data is:"+data);
            $("#account_no").html(data);
        },
        error : function(request,error)
        {}
      }
    );
}
</script>
<script>
    function show_data()
    {
        alert("hiii");
        var vendor_name = document.getElementById("vendor_name").value;
        var cheque_dt = document.getElementById("cheque_dt").value;
        if(vendor_name!="" && cheque_dt!="")
        {
            /*$.ajax(
            {
                url: "../../api/expense/get_cheque_printing_expense.php",
                type: 'POST',
                data : 
                {
                'vendor_name' : vendor_name,
                'cheque_dt' : cheque_dt
                },
                dataType:'Text',
                success: function(data)
                {
                    alert("data:"+data);
                },
                error : function(request,error)
                {}
            }
            );*/
            //alert("showww");
            table = $('#tbl').DataTable( { 
            dom: 'Bfrtip',
            searching:true,
            ajax: 
            {
                    "url": "../../api/expense/get_cheque_printing_expense.php",
                    "type": "POST",
                    data : 
                    {
                        'vendor_name' : vendor_name,
                        'cheque_dt' : cheque_dt
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
        else
        {

        }

    }
</script>