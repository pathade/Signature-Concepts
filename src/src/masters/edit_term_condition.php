<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM mstr_term_condition where SrNo = '$edit_id'";
    $result_charges = mysqli_query($db, $sql_charges);
    while ($row=mysqli_fetch_row($result_charges))
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Terms & Conditions</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="termform1">
	                    	<div class="form-body">
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Company <span style="color:red;"> *</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="branch" class="select2" data-toggle="select2" name="branch">
                                                    <option selected disabled value="<?php echo $row[1];?>"><?php echo $row[1];?> </option> 
                                                    <option value="Signature Concepts LLP">Signature Concepts LLP</option>
                                                    <option value="Shree">Shree </option>  												
												</select>
                                                <span id="branch_error" style="color:red;">Company Name is required.</span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Applicable For <span style="color:red;"> *</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="applicable_for" class="select2" data-toggle="select2" name="applicable_for">
                                                    <option selected disabled value="<?php echo $row[2];?>"><?php echo $row[2];?> </option>
                                                    <option value="Quotation">Quotation</option>
                                                    <option value="Retail Work Order">Retail Work Order </option>
                                                    <option value="Retail Tax Invoice">Retail Tax Invoice</option>
                                                    <option value="WholeSale Work Order">WholeSale Work Order </option>
                                                    <option value="Delivery Challan">Delivery Challan</option>
                                                    <option value="WholeSale Tax Invoice">WholeSale Tax Invoice </option>
                                                    <option value="General">General</option>
                                                </select>
                                                <span id="applicable_for_error" style="color:red;">Applicable is Required.</span>
				                            </div>
			                       		</div>
			                       	</div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Details <span style="color:red;"> *</span></label>
                                            <div class="col-md-8">
                                                <textarea type="text" class="form-control" rows="3" placeholder="" name="details" id="details" style="height:auto;"><?php echo $row[3];?></textarea>
                                                <span id="detail_error" style="color:red;">Details Required.</span>
                                            </div>
                                        </div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                            <?php 
                                                                if($row[4] == 1 )
                                                                {?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                        <input type="radio" class="form-control " name="status1" id="active" style="height: calc(2.75rem + -13px);width: 20px"  value="1" checked>&nbsp; Active
                                                                    </div>
                                                            <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                        <input type="radio" class="form-control " name="status1" id="active" style="height: calc(2.75rem + -13px);width: 20px"  value="1" >&nbsp; Active
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($row[4] == 0 )
                                                                {
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                        <input type="radio" class="form-control " name="status1" id="inactive" style="height: calc(2.75rem + -13px);width: 20px" value="0" checked>&nbsp; Inactive
                                                                    </div>
                                                                    <?php

                                                                }
                                                                else{
                                  
                                                            ?>
                                                            <div class="col-md-4" style="display: flex;font-size: 18px;">
                                                                <input type="radio" class="form-control " name="status1" id="inactive" style="height: calc(2.75rem + -13px);width: 20px" value="0" >&nbsp; Inactive
                                                            </div>
                                            <?php } ?>
			                       		</div>
                                    </div>
                                </div>
							</div>
                            <br/>
	                        <div class="form-actions right">
								<button type="button" class="btn btn-primary" name="add" onClick="save_data()">
	                                <i class="fa fa-check-square-o"></i> Update
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
$(document).ready(function()
{
  
  //hide all error span
  
  document.getElementById("branch_error").style.display = "none";
  document.getElementById("applicable_for_error").style.display = "none";
  document.getElementById("detail_error").style.display = "none";

  ///////////////////////////
});
</script>
<script>

  function save_data()
{
  //console.log(newRawItemArray);
  var branch = document.getElementById("branch").value;
  var applicable_for = document.getElementById("applicable_for").value;
  var details = document.getElementById("details").value;
  var status1 = $('input[name=status1]:checked').val();
   // alert("status1:"+ status1);
   if(branch != '' && applicable_for != '' && details != '') {
  $.ajax(
          {

          url: "../../api/term&condition/update_term_condition.php",
          type: 'POST',
          data : "&branch=" + branch + '&applicable_for='+ applicable_for + '&details=' + details + '&status1='+ status1 +"&edit_id=" + <?php echo $edit_id;?>,
          dataType:'text',  
          success: function(data)
          { 
            //alert("result is:"+data);
              //console.log("console data is:"+data);
              if(data == "1")
              {
                alert("Data Updated Successfully!");
                window.location.href="view_term_condition.php";
              }
              else
              {
                  alert("Please Enter Valid Details");
              }
          
          },
          
          });
   }
        if(branch == "")
        {
            document.getElementById("branch_error").style.display = "block";
        }
        if(applicable_for == "")
        {
            document.getElementById("applicable_for_error").style.display = "block";
        }
        if(details == "")
        {
            document.getElementById("detail_error").style.display = "block";
        }
}
</script>
<?php } ?>