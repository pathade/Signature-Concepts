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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Skip Cheque</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="skip_cheque_form">
	                    	<div class="form-body">
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <?php
                                            if($flag == 0) {
                                            $sql = "SELECT * FROM mstr_data_series where name='fin_skip_cheque' and flag='0' ";
                                            }
                                            else {
                                                $sql = "SELECT * FROM mstr_data_series where name='fin_skip_cheque' and flag='1' ";
                                            }
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Skip Cheque No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="sc_no" class="form-control " placeholder="" name="sc_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1">Bank Name <span style="color:red;"> *</span></label>
                                                    <div class="col-md-10 divcol">
                                                        <select class="select2 form-control block select21" id="bank_name1" class="select2" onchange="getAccountNo1()" data-toggle="select2" name="bank_name1">
                                                            <?php
                                                                $option="<option value=''>Select Bank</option>";
                                                                echo $option;
                                                                if($flag == 0) {
                                                                $sql =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank where flag='0' order by bank_name asc";  // Use select query here 
                                                                }
                                                                else {
                                                                    $sql =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank where flag='1' order by bank_name asc"; 
                                                                }
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
                                                <label class="col-md-2 label-control" for="userinput1">Account No <span style="color:red;"> *</span></label>
                                                    <div class="col-md-10 divcol">
                                                    <select class="select2 form-control block select21" id="account_no1" class="select2" data-toggle="select2" name="account_no1">
                                                        <!-- --><option value=''>Select </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Cheque No <span style="color:red;"> *</span></label>
                                                    <div class="col-md-9">
                                                    <input type="number" id="cheque_no1" class="form-control " placeholder="" name="cheque_no1" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Authorised By </label>
                                                    <div class="col-md-9">
                                                        <select class="select2 form-control block" id="authorised_by" class="select2" data-toggle="select2" name="authorised_by">
                                                            <option value="" disabled selected>Select Authorised By </option>
                                                            <?php
                                                                if($flag == 0) {
                                                                $sql = "SELECT * FROM mstr_employee WHERE emp_status = 1 and flag='0' ";
                                                                }
                                                                else {
                                                                    $sql = "SELECT * FROM mstr_employee WHERE emp_status = 1 and flag='1' ";
                                                                }
                                                                $result = mysqli_query($db,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
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
    var bank_name1 = document.getElementById("bank_name1").value;
  var account_no1 = document.getElementById("account_no1").value;
  var authorised_by = document.getElementById("authorised_by").value;
  var cheque_no1 = document.getElementById("cheque_no1").value;
  var sc_no = document.getElementById("sc_no").value;
//   alert(sc_no);
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
    if(bank_name1 != "" && account_no1 != "" && cheque_no1 != "")
    {
        $.ajax(
        {

          url: "../../api/finance/save_skipcheque.php",
          type: 'POST',
          data : $('#skip_cheque_form').serialize()+'&bank_name1='+bank_name1+ 
          '&account_no1='+account_no1 + '&authorised_by='+authorised_by,
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
                //  alert("Please Enter Valid Details");
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