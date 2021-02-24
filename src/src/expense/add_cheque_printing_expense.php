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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Cheque Printing Expense</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="cheque_print_form">
	                    	<div class="form-body">
                                <div class="row" style="visibility: hidden;">
                                    <div class="col-md-6">
                                        <?php

                                            $sql = "SELECT * FROM mstr_data_series where name='exp_cheque_printing'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">payment advice No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="cheque_print_no" class="form-control " placeholder="" name="cheque_print_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1"></label>
                                            <div class="col-md-5" style="display: flex;font-size: 18px;">
                                                <input type="radio" class="form-control " name="pay_type" id="cash" style="height: calc(2.75rem + -13px);width: 20px"  value="1" checked>&nbsp; Cash 
                                            </div>
                                            <div class="col-md-5" style="display: flex;font-size: 18px;">
                                                <input type="radio" class="form-control " name="pay_type" id="cheque" style="height: calc(2.75rem + -13px);width: 20px" value="0">&nbsp; Cheque
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">Vendor </label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php

                                                        $sql = "SELECT  * FROM mstr_vendor";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'].". ".$row1['2']." ".$row1['3'];?></option>
                                                            <?php
                                                        }
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 col-lg-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">Bank </label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <?php
                                                        $option="<option value=''>Select Bank</option>";
                                                        echo $option;
                                                        $sql =  "SELECT distinct bank_name FROM mstr_bank order by bank_name asc";  // Use select query here 
                                                        $result = mysqli_query($db, $sql);
                                                        while($row3 = mysqli_fetch_array($result))
                                                        {
                                                            $option="<option value='".$row3['bank_name']."'>".$row3['bank_name']."</option>";
                                                            echo $option;
                                                        }
                                                    ?>  												
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                        <label class="col-md-4 label-control" for="userinput1">Account No </label>
											<div class="col-md-8">
												<select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" >
                                                <!-- -->
                                                </select>
				                            </div>
			                       		</div>
			                       	</div>
                                    <div class="col-md-6 col-lg-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-4 label-control" for="userinput1">Cheque No</label>
											<div class="col-md-8">
											<input type="text" id="cheque_no" class="form-control " placeholder="0" name="cheque_no" >
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group row">
                                            <label class="col-md-4 label-control" for="userinput1">Cheque Date</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="pay_date" name="pay_date" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group text-center">
                                        <button type="button" class="btn btn-primary" name="show" onClick="getBillDetails   ()">
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
                                                        <th>Select </th>
                                                        <th>Pay Advice Id</th>
                                                        <th>>Pay Advice Date</th>
                                                        <th>Vendor Name</th>
                                                        <th>Expense Type</th>
                                                        <th>Expense Head</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody"></tbody>
                                            </table>
                                        </div>
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
function getAccountNo()
  {
     
    var bid = document.getElementById("bank_name").value;
    document.getElementById("account_no").length = 0;
    $.ajax(
      {
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid
        },
        dataType:'json',
        success: function(data)
        {
          $.each(data, function(index) 
          {
            var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
            $('#account_no').append(newOption).trigger('change.select2');
           
          });
        },
        error : function(request,error)
        {}
      }
    );
  }

var table="";
    $(document).ready(function()
{
    table= $('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: ['selectAll', 'selectNone'],
        searching:false,
     
   
        columnDefs: [ 
            { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
            ],      
        select: { style: 'multi', selector: 'td:nth-child(0)'},
        select: { style: 'multi'},
        destroy:false,
        drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
});

</script>

<script>

  function save_data()
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
                alert("Data Added Successfully!");
                window.location.href="view_exp_bill_entry.php";
              }
              else
              {
                  alert("Please Enter Valid Details");
              }
          
          },
          
          });

}
</script>