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
                                            if($flag == 0) {
                                            $sql = "SELECT * FROM mstr_data_series where name='fin_pay_advice_cancel' and flag='0' ";
                                            }
                                            else {
                                                $sql = "SELECT * FROM mstr_data_series where name='fin_pay_advice_cancel' and flag='1' ";
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
                                                    <label class="col-md-3 label-control" for="userinput1">Fin Yr</label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="fin_yr" class="select2" data-toggle="select2" name="fin_yr">
                                                            <option value="20-21"> 20-21</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">DDE No <span style="color:red;"> *</span></label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="dde_no" class="select2" data-toggle="select2" name="dde_no">
                                                            <option value="" disabled selected>Select </option>
                                                            <?php
                                                                if($flag == 0) {
                                                                $get_pa = "SELECT id_pk FROM fin_payment_advice WHERE status != 1 and flag='0' ";
                                                                }
                                                                else {
                                                                    $get_pa = "SELECT id_pk FROM fin_payment_advice WHERE status != 1 and flag='1' ";
                                                                }
                                                                $res = mysqli_query($db, $get_pa);

                                                                while($row = mysqli_fetch_row($res))
                                                                {
                                                                    echo '<option>'.$row[0].'</option>';
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
				                        	<label class="col-md-2 label-control" for="userinput1" >Reason <span style="color:red;"> *</span></label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" rows="2" id="reason" name="reason"></textarea>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
	                        <div class="form-actions right">
								
                                <button type="button" class="btn btn-primary" name="add" onClick="save_data();">
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
    var pac_no = document.getElementById("pac_no").value;
  var dde_no = document.getElementById("dde_no").value;
  var fin_yr = document.getElementById("fin_yr").value;
  var reason = document.getElementById("reason").value;
   // alert(fin_yr + pac_no + dde_no + reason);
    if (dde_no != "" && reason != "")
    {
        $.ajax(
          {

          url: "../../api/finance/save_fin_payment_advice_cancellation.php",
          type: 'POST',
          data : $('#pay_advice_cancel_form').serialize(),
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
                    setTimeout(() => {
                        window.location.href="view_finance_payment_advice_cancellation.php";                                
                    }, 5000);
                // alert("Data Added Successfully!");
                // window.location.href="view_finance_payment_advice_cancellation.php";
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
                  //alert("Please Enter Valid Details");
              }
          
          },
          
          });
    }
    else 
    {
        if (dde_no == "" ) {
            $.toast({
                heading: 'Error',
                text: 'Please Select DDE No',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (reason == "" ) {
            $.toast({
                heading: 'Error',
                text: 'Please Enter Reason',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
    }
}
</script>