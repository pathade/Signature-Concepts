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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Payment Advice Cancellation</h4>
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
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <?php
                                            if ($flag == 0) {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_pay_advice_cancel' and flag = '0'";
                                            }
                                           else {
                                            $sql = "SELECT * FROM mstr_data_series where name='exp_pay_advice_cancel' and flag = '1'";
                                           }
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
                                                    <label class="col-md-3 label-control" for="userinput1">Fin Yr<span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="fin_yr" class="select2" data-toggle="select2" name="fin_yr">
                                                            <option value="" disabled selected>Select </option>
                                                            <option value="19-20"> 19-20</option>
                                                            <option value="20-21"> 20-21</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch <span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly>
                                                            <option value="Signature Concepts LLP" selected disabled>Signature Concepts LLP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Payment Advice No<span style="color:red;">*</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="pay_advice_id_fk" class="select2" data-toggle="select2" name="pay_advice_id_fk">
                                                            <option value="" disabled selected>Select </option>
                                                            <?php
                                                                if ($flag== 0) {
                                                                    $sql = "SELECT * FROM exp_pay_advice where cancel_status != '1' and flag = '0' ";
                                                                }
                                                                else {
                                                                    $sql = "SELECT * FROM exp_pay_advice where cancel_status != '1' and flag = '1' ";
                                                                }
                                                                $result = mysqli_query($db,$sql);
                                                                while($row2 = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row2['0'];?>"><?php echo  $row2['padv_no'] ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark <span style="color:red;">*</span></label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" rows="2" id="remark" name="remark"></textarea>
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
    var branch = document.getElementById("branch").value;
    var pay_advice_id_fk = document.getElementById("pay_advice_id_fk").value;
    var fin_yr = document.getElementById("fin_yr").value;
    var remark = document.getElementById("remark").value;
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
    if(remark !="")
    {
        $.ajax(
        {

          url: "../../api/expense/save_payment_advice_cancellation.php", 
          type: 'POST',
          data : $('#pay_advice_cancel_form').serialize()+'&branch='+branch+ 
          '&pay_advice_id_fk='+pay_advice_id_fk + '&fin_yr='+fin_yr,
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
                        window.location.href="view_payment_advice_cancellation.php";    
                    }, 5000);
                // alert("Data Added Successfully!");
                // window.location.href="view_payment_advice_cancellation.php";
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
        if(remark == "")
        {
            $.toast({
                    heading: 'Error',
                    text: 'Remark Required',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        }
    }
    
}
</script>