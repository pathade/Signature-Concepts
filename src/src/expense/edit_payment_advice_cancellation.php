<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM exp_payment_advice_cancellation where epa_id_pk = '$edit_id'";
    $result_charges = mysqli_query($db, $sql_charges) or die(mysqli_error($db));
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Update Payment Advice Cancellation</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pay_advice_cancel_form1">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Fin Yr</label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="fin_yr" class="select2" data-toggle="select2" name="fin_yr">
                                                            <option value="<?php echo $row[1]; ?>" disabled selected><?php echo $row[1]; ?> </option>
                                                            <option value="19-20"> 19-20</option>
                                                            <option value="20-21"> 20-21</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly>
                                                            <option value="<?php echo $row[2]; ?>" selected disabled><?php echo $row[2]; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Payment Advice No</label>
                                                    <div class="col-md-9">
                                                    <?php
                                                        $s = "SELECT * FROM exp_pay_advice WHERE pa_id_pk='".$row[3]."'";
                                                        $sres = mysqli_query($db,$s);
                                                        while($srw = mysqli_fetch_array($sres))
                                                        {
                                                            $no1 = $srw['padv_no'];
                                                        }
                                                    ?>
                                                        <select class="select2 form-control block" id="pay_advice_id_fk" class="select2" data-toggle="select2" name="pay_advice_id_fk" onchange = "getadviceno()">
                                                            <option value="<?php echo $row[3]; ?>" disabled selected><?php echo $no1; ?> </option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark </label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" rows="2" id="remark" name="remark" value="<?php echo $row[4]; ?>"><?php echo $row[4]; ?></textarea>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
	                        <!-- <div class="form-actions right">
								
                                <button type="button" class="btn btn-primary" name="add" onClick="save_data()">
                                    <i class="fa fa-check-square-o"></i> Update
                                </button>
								
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            
	                        </div> -->
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
// function getadviceno() {
//     var pay_advice_id_fk = document.getElementById("pay_advice_id_fk").value;
//     $.ajax(
//           {

//           url: "../../api/expense/get_update_cancelstatus.php",
//           type: 'GET',
//           data : '&pay_advice_id_fk='+pay_advice_id_fk+ "&edit_id=" + <?php echo $edit_id;?>,
//           dataType:'text',  
//           success: function(data)
//           { 
//               console.log("console data is:"+data);
//               if(data == "1")
//               {
//                 alert(data);
//               }
//               else
//               {
//                   alert("Please Enter Valid Details");
//               }
          
//           },

          
//           });
// }

  function save_data()
{
    var branch = document.getElementById("branch").value;
  var pay_advice_id_fk = document.getElementById("pay_advice_id_fk").value;
  var fin_yr = document.getElementById("fin_yr").value;
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
  $.ajax(
          {

          url: "../../api/expense/update_payment_advice_cancellation.php",
          type: 'POST',
          data : $('#pay_advice_cancel_form1').serialize()+'&branch='+branch+ 
          '&pay_advice_id_fk='+pay_advice_id_fk + '&fin_yr='+fin_yr+ "&edit_id=" + <?php echo $edit_id;?>,
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
</script>
<?php } ?>