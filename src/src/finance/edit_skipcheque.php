<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM fin_skip_cheque where id_pk = '$edit_id'";
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Skip Cheque</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="skip_cheque_form1">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1">Bank Name </label>
                                                    <div class="col-md-10 divcol">
                                                        <select class="select2 form-control block select21" id="bank_name1" class="select2" onchange="getAccountNo1()" data-toggle="select2" name="bank_name1">
                                                            <?php 
                                                            $sql1 = "SELECT DISTINCT bank_idpk, bank_name FROM mstr_bank WHERE account_no = $row[2]";
                                                            $result1 = mysqli_query($db, $sql1);
                                                            if($result1 != "")
                                                            {
                                                                $row6=mysqli_fetch_row($result1);
                                                                ?>
                                                            <option value="<?php echo $row[1]; ?>" selected disabled><?php echo $row6[1]; ?></option>
                                                                <?php
                                                                } 
                                                                else {
                                                                    ?>
                                                                    <option value='' selected disabled>Select Bank</option>
                                                                    <?php
                                                                }
                                                                    ?>
                                                            <?php
                                                                $sql =  "SELECT distinct bank_name FROM mstr_bank order by bank_name asc";  // Use select query here 
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
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                <label class="col-md-2 label-control" for="userinput1">Account No </label>
                                                    <div class="col-md-10 divcol">
                                                    <select class="select2 form-control block select21" id="account_no1" class="select2" data-toggle="select2" name="account_no1">
                                                        <?php 
                                                            $sql1 = "SELECT DISTINCT bank_idpk, account_no FROM mstr_bank WHERE account_no = $row[2]";
                                                            $result1 = mysqli_query($db, $sql1);
                                                            if($result1 != "")
                                                            {
                                                                $row7=mysqli_fetch_row($result1);
                                                                ?>
                                                            <option value="<?php echo $row[2]; ?>" selected disabled><?php echo $row7[1]; ?></option>
                                                                <?php
                                                                } 
                                                                else {
                                                                    ?>
                                                                    <option value='' selected disabled>Select Account No</option>
                                                                    <?php
                                                                }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Cheque No</label>
                                                    <div class="col-md-9">
                                                    <input type="number" id="cheque_no1" class="form-control " value="<?php echo $row[3]; ?>" name="cheque_no1" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Authorised By </label>
                                                    <div class="col-md-9">
                                                        <?php 
                                                            $sql2 = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk = $row[4]";
                                                            $result2 = mysqli_query($db, $sql2);
                                                            $row2=mysqli_fetch_row($result2);
                                                            ?>
                                                        <select class="select2 form-control block select21" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                                <option value="<?php echo $row[4]; ?>" disabled selected><?php echo $row2[0]; ?> </option>
                                                                <?php
                                                                    $sql33 = "SELECT * FROM mstr_employee WHERE emp_status = 1";
                                                                    $result33 = mysqli_query($db,$sql33);
                                                                    while($row33 = mysqli_fetch_array($result33))
                                                                    {   
                                                                        ?>
                                                                        <option value="<?php  echo $row33['0'];?>"><?php echo  $row33['1']?></option>
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
				                        	<label class="col-md-2 label-control" for="userinput1" >Remark </label>
				                        	<div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control" rows="2" id="remark" name="remark" value="<?php echo $row[5]; ?>"><?php echo $row[5]; ?></textarea>
				                            </div>
				                        </div>
                                    </div>
                                </div>
							</div>
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
  function save_data()
{
    var bank_name1 = document.getElementById("bank_name1").value;
  var account_no1 = document.getElementById("account_no1").value;
  var authorised_by = document.getElementById("authorised_by").value;
//   alert(sc_no);
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
    if(bank_name1 != "" && account_no1 != "" && cheque_no1 != "")
    {
  $.ajax(
          {

          url: "../../api/finance/update_skipcheque.php",
          type: 'POST',
          data : $('#skip_cheque_form1').serialize()+'&bank_name1='+bank_name1+ 
          '&account_no1='+account_no1 + '&authorised_by='+authorised_by + "&edit_id=" + <?php echo $edit_id;?>,
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
                            window.location.href="view_skipcheque.php";                                
                        }, 5000);
                // alert("Data Added Successfully!");
                // window.location.href="view_skipcheque.php";
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
        if (bank_name1 == "") {
            $.toast({
                heading: 'Error',
                text: 'Please Select Bank',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (cheque_no1 == "") {
            $.toast({
                heading: 'Error',
                text: 'Please Enter Cheque No',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (account_no1 == "") {
            $.toast({
                heading: 'Error',
                text: 'Please Select Account No',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
    }
}


function getAccountNo1()
  {
     
    var bid1 = document.getElementById("bank_name1").value;
    document.getElementById("account_no1").length = 0;
    $.ajax(
      {
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid1
        },
        dataType:'text',
        success: function(data)
        {
          //alert(data);
          $('#account_no1').html(data);
          // $.each(data, function(index) 
          // {
          //   var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
          //   $('#account_no').append(newOption).trigger('change.select2');
           
          // });
        },
        error : function(request,error)
        {}
      }
    );
  }
</script>
<?php } ?>