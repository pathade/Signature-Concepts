<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM exp_advance_payment_cancellation where pay_cancel_id_pk = '$edit_id'";
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Advance Payment Cancellation</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="adv_pay_cancel_form">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1"> </label>
                                                    <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                        <?php 
                                                            if($row[1] == "Finance")
                                                            {
                                                                ?>
                                                                    <input type="radio" class="form-control " name="type" id="type" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="Finance" checked>&nbsp; Finance 
                                                                <?php

                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <input type="radio" class="form-control " name="type" id="type" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="Finance">&nbsp; Finance 
                                                                <?php

                                                            }
                                                        
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-md-5" style="display: flex;font-size: 16px;">
                                                        <?php 
                                                            if($row[1] == "Expense")
                                                            {
                                                                ?>
                                                                    <input type="radio" class="form-control " name="type" id="type" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="Expense" checked>&nbsp; Expenses
                                                                <?php

                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <input type="radio" class="form-control " name="type" id="type" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="Expense">&nbsp; Expenses
                                                                <?php

                                                            }
                                                        
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly>
                                                            <option value="<?php echo $row[2]; ?>" selected disabled><?php echo $row[2]; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Advance Payment No</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="adv_pay_id_fk" class="select2" data-toggle="select2" name="adv_pay_id_fk" onchange="getDetails()">
                                                    <?php
                                                        $fg = "SELECT * FROM exp_advance_payment WHERE id_pk='".$row[3]."'";
                                                        $jk = mysqli_query($db,$fg);
                                                        while($hrw = mysqli_fetch_array($jk))
                                                        {
                                                            $no123 = $hrw['ap_no'];
                                                        }
                                                    ?>
                                                    <option value="<?php echo $row[3]; ?>" selected disabled><?php echo $no123; ?></option>
                                                   
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Amount </label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control" placeholder="0" id="amount" name="amount" value="<?php echo $row[4]; ?>" />
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-12">
				                        <div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1">Supplier/Vendor Name </label>
				                        	<div class="col-md-10 divcol">
                                                <select class="select2 form-control block" id="vendor_id_fk" class="select2" data-toggle="select2" name="vendor_id_fk">
                                                    <?php 
                                                        if($row[1] == "Finance")
                                                        {
                                                            $sql1 = "SELECT DISTINCT supplier_id_fk,name FROM mstr_supplier WHERE supplier_id_fk = $row[5]";
                                                            $result1 = mysqli_query($db, $sql1);
                                                            if($result1 != "")
                                                            {
                                                                $row6=mysqli_fetch_row($result1);
                                                            ?>
                                                                        <option value="<?php echo $row[5]; ?>" selected disabled><?php echo  $row6['1'];?></option>
                                                            <?php
                                                                    } 
                                                                    else 
                                                                    {
                                                            ?>
                                                                        <option value="<?php echo $row[5]; ?>" selected disabled></option>
                                                            <?php
                                                            }

                                                        }
                                                        else if($row[1] == "Expense")
                                                        {
                                                            $sql1 = "SELECT DISTINCT vendor_id_pk,saturation, first_name, last_name FROM mstr_vendor WHERE vendor_id_pk = $row[5]";
                                                            $result1 = mysqli_query($db, $sql1);
                                                            if($result1 != "")
                                                            {
                                                                $row6=mysqli_fetch_row($result1);
                                                    ?>
                                                                <option value="<?php echo $row[5]; ?>" selected disabled><?php echo  $row6['1'].". ".$row6['2']." ".$row6['3'];?></option>
                                                    <?php
                                                            } 
                                                            else 
                                                            {
                                                    ?>
                                                                <option value="<?php echo $row[5]; ?>" selected disabled></option>
                                                    <?php
                                                            }
                                                        }
                                                        
                                                    ?>
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Payment Type Cancellation Reason </label>
				                        	<div class="col-md-9 divcol">
                                                <textarea type="text" class="form-control" rows="2" id="pay_type_cancel_reason" name="pay_type_cancel_reason" value="<?php echo $row[6]; ?>"><?php echo $row[6]; ?></textarea>
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
function getDetails()
  {
    var advance_pay_id = document.getElementById("adv_pay_id_fk").value;
    //document.getElementById("amount").length = 0;
    $.ajax(
      {
        url: "../../api/global/get_exp_adv_pay_details.php",
        type: 'GET',
        data : 
        {
          'adv_pay_id_fk' : advance_pay_id
        },
     
        success: function(data)
        {
            console.log(data);
            $.each(data, function(index) 
          {
            var newOption = new Option(data[index].vendor_id_fk1,data[index].id_pk, false, false);
           
           
            $('#vendor_id_fk').val(data[index].vendor_id_fk1);


            for(var i=0; i<data.length;i++)
{
    var option=document.createElement("option");
    option.setAttribute("value",data[i]["vendor_id_fk1"]);
    option.text =data[i]["vendor_id_fk1"];
    vendor_id_fk.appendChild(option);
}          
            $('#amount').val(data[index].amount);
            //alert(data[index].type);
            $('input[name=type][value="'+ data[index].type +'"]').prop('checked', true);
          });
           
        },
        error : function(request,error)
        {}
      }
    );
  }

  function save_data()
{
    var branch = document.getElementById("branch").value;
  var adv_pay_id_fk = document.getElementById("adv_pay_id_fk").value;
  var vendor_id_fk = document.getElementById("vendor_id_fk").value;
  var amount = document.getElementById("amount").value;
  var type = document.getElementById("type").value;
  //alert(type);
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
  $.ajax(
          {

          url: "../../api/expense/update_advance_payment_cancellation.php",
          type: 'POST',
          data : $('#adv_pay_cancel_form').serialize()+'&branch='+branch+ '&adv_pay_id_fk='+adv_pay_id_fk + '&vendor_id_fk='+vendor_id_fk
          + '&amount='+amount+ '&type='+type+ "&edit_id=" + <?php echo $edit_id;?>,
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              if(data == "1")
              {
                alert("Data Added Successfully!");
                window.location.href="view_advance_payment_cancellation.php";
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