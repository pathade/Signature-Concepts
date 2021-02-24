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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Bank Transaction</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="bank_trans_form">
	                    	<div class="form-body">
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <?php
                                            if ($flag == 0){
                                            $sql = "SELECT * FROM mstr_data_series where name='fin_bank_transaction' and flag='0' ";
                                            }
                                            else {
                                                $sql = "SELECT * FROM mstr_data_series where name='fin_bank_transaction' and flag='1' ";
                                            }
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Skip Cheque No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="bt_no" class="form-control " placeholder="" name="bt_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Type <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <select class="select2 form-control block select21" id="type" class="select2" data-toggle="select2" name="type">
                                                        <option value='' selected disabled>Select </option>
                                                        <option value='Receipt'>Receipt </option>
                                                        <option value='Payment'>Payment </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Mode <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <select class="select2 form-control block select21" id="mode" class="select2" data-toggle="select2" name="mode">
                                                        <option value='' selected disabled>Select </option>
                                                        <option value='Cash'>Cash </option>
                                                        <option value='Cheque'>Cheque </option>
                                                        <option value='Credit'>Credit </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Bank </label>
                                                <div class="col-md-9">
                                                    <select class="select2 form-control block select21" id="bank_name1" class="select2" onchange="getAccountNo1()" data-toggle="select2" name="bank_name1">
                                                        <?php
                                                            $option="<option value=''>Select Bank</option>";
                                                            echo $option;
                                                            if ($flag == 0){
                                                            $sql =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank WHERE flag='0' order by bank_name asc";  // Use select query here 
                                                            }
                                                            else {
                                                                $sql =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank WHERE flag='1' order by bank_name asc";
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
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Ac No </label>
                                                <div class="col-md-9">
                                                <select class="select2 form-control block select21" id="account_no1" class="select2" onchange="getAccountNo1()" data-toggle="select2" name="account_no1">
                                                    <!-- --><option value=''>Select </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Date <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <input type="date" id="date" class="form-control " name="date" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Trans No</label>
                                                <div class="col-md-9">
                                                <input type="text" id="trans_no" class="form-control " placeholder="" name="trans_no" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Amount <span style="color:red;"> *</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="amount" class="form-control " placeholder="" name="amount" >
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Cheque No</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="cheque_no" class="form-control " placeholder="" name="cheque_no" >
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Cheque Date</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="cheque_date" class="form-control " value="<?php echo date('Y-m-d');?>" name="cheque_date" >
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="userinput1" >Particulars/Praty <span style="color:red;"> *</span></label>
                                            <div class="col-md-10 divcol">
                                                <input type="text" class="form-control" id="particular_party" name="particular_party" />
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
  var type = document.getElementById("type").value;
  var mode = document.getElementById("mode").value;
  var bt_no = document.getElementById("bt_no").value;
  var particular_party = document.getElementById("particular_party").value;
  var date = document.getElementById("date").value;
  var amount = document.getElementById("amount").value;
 // alert(bank_name1);
    //alert(authorised_by + account_no + po_no+ manual_credit_no+ vendor_id_fk+ payment_type);
    if(type != "" && mode !="" && date != "" && amount != "" && particular_party != "")
    {
        $.ajax(
          {

          url: "../../api/finance/save_bank_transaction.php",
          type: 'POST',
          data : $('#bank_trans_form').serialize()+'&bank_name1='+bank_name1+ 
          '&account_no1='+account_no1 + '&type='+type+ '&mode='+ mode,
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
                            window.location.href="view_bank_transaction.php";                                
                        }, 5000);
               // alert("Data Added Successfully!");
               // window.location.href="view_bank_transaction.php";
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
    else {
        if (type == ""){
            $.toast({
                heading: 'Error',
                text: 'Please Select Type',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (mode == ""){
            $.toast({
                heading: 'Error',
                text: 'Please Select Mode',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (date == ""){
            $.toast({
                heading: 'Error',
                text: 'Please Select Date',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (amount == ""){
            $.toast({
                heading: 'Error',
                text: 'Please Enter Amount',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
        if (particular_party == ""){
            $.toast({
                heading: 'Error',
                text: 'Please Enter Particular/Party',
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