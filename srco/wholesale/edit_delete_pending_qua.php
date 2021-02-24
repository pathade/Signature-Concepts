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
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Delete Pending Quantity</h4>
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
				                        	<label class="col-md-3 label-control" for="userinput1">Customer</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                    <option value="" disabled selected>Select </option>
                                                    <?php

                                                        $sql = "SELECT * FROM tbl_wholesale_customer";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row['0'];?>"><?php echo  $row['1'] ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Work NO</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="work_no" class="select2" data-toggle="select2" name="work_no">
                                                <option value="" disabled selected>Select </option>
                                               
												</select>
                                            </div>
			                       		</div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group row radio-row">
                                            <input type="checkbox" name="all" id="all" style="height: 20px;width: 20px;" /> &nbsp; All
                                        </div>
                                    </div>
		                        </div>
							</div>
                            <hr />
                            <br />
                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row m-0">
                                                        <input type="checkbox" name="tbl_all" id="tbl_all" style="height: 20px;width: 20px;" /> &nbsp; All
                                                    <div class="table-responsive">
                                                             <table class="border-bottom-0 table table-hover" id="tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Select &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>WorkNo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>PendingPoNo. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Site Name </th>
                                                                        <th>Item Name </th>
                                                                        <th>Length</th>
                                                                        <th>Breath</th>
                                                                        <th>OrderQty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>PendingQty&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>DeleteQty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Process &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>   
                                                                            <input type="checkbox" id="selected_row" name="selected_row" style="height: 17px;width: 17px;"/>
                                                                        </td>
                                                                        <td>1</td>
                                                                        <td>0</td>
                                                                        <td>0</td>                                                                        
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
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


	
</script>


                        