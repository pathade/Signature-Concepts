<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT  mc.*,mb.account_no,mb.bank_name 
                FROM mstr_cheque mc,mstr_bank mb 
                where cheque_id_pk='$edit_id' and mc.bank_id_fk=mb.bank_idpk";
    $result_charges = mysqli_query($db, $sql_charges);
    while ($row=mysqli_fetch_array($result_charges))
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Cheque</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="chequeform1">
	                    	<div class="form-body">
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Bank Name </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <option selected value="<?php echo $row['bank_id_fk'];?>"><?php echo $row['bank_name'];?></option>                                  
                                                     <?php 
													$sql = " SELECT distinct bank_name,bank_idpk FROM mstr_bank ";
													$res = mysqli_query($db,$sql);
													while($rw = mysqli_fetch_array($res))
													{
												?>
													
													<option value="<?php echo $rw['bank_idpk'];?>"><?php echo $rw['bank_name'];?></option>
																									
												
													<?php } ?>										 
												</select>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Account No</label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" required="">
                                                        <option selected value="<?php echo $row['account_no'];?>"><?php echo $row['account_no'];?></option>
                                                </select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">From Series</label>
											<div class="col-md-9">
											<input type="text" id="from_series" class="form-control " placeholder="" name="from_series" value="<?php echo $row['from_series'];?>">
				                            </div>
			                       		</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >To Series</label>
				                        	<div class="col-md-9">
												<input type="text" class="form-control"  placeholder="" name="to_series" id="to_series" value="<?php echo $row['to_series'];?>">
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

var optionValues =[];
// $('#bank_name option').each(function(){
//    if($.inArray(this.value, optionValues) >-1){
//       $(this).remove()
//    }else{
//       optionValues.push(this.value);
 
//    }
// });
    
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

  function save_data()
{
  //alert("submit");
  
  // Add table data to JS array
  


  //console.log(newRawItemArray);
  var bank_name = document.getElementById("bank_name").value;
  var account_no = document.getElementById("account_no").value;
  var from_series = document.getElementById("from_series").value;
  var to_series = document.getElementById("to_series").value;

  $.ajax({
        type: "POST",
        url: '../../api/bank/edit_cheque.php',
        data: "bank_name=" + bank_name +'&account_no='+ account_no + '&from_series=' + from_series + '&to_series=' +to_series + "&edit_id=" + <?php echo $edit_id;?> ,
        success: function(data)
        { 
         //console.log("result is:"+data);

            if(data == "1")
            {
              $.toast({
                    heading: 'Success',
                    text: 'Record Updated!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                  window.location.href="view_cheque.php";
                }, 5000);
                // alert('Record Updated!');
                // window.location.href = "view_cheque.php";
            }
            else
            {
              $.toast({
                    heading: 'Error',
                    text: 'Something went wrong...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
                //alert('something went wrong');
            }
        }
    });
}
function getAccountNo()
  {
     
    var bid = document.getElementById("bank_name").value;
    document.getElementById("account_no").length = 0;
    //alert("bid:"+bid);
    $.ajax(
      {
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid
        },
        dataType:'text',
        success: function(data)
        {
          //alert(data);
          $('#account_no').html(data);
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