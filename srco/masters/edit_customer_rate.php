<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT cr.*,wc.cust_name, i.final_product_code FROM mstr_customer_rate cr, tbl_wholesale_customer wc, mstr_item i where cr.item_id_fk = i.item_id_pk and cr.cust_id_fk = wc.wc_id_pk and customer_rate_id_pk = '$edit_id'";
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Customer Rate</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="customerrateform1">
	                    	<div class="form-body">
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="customer_id" class="select2" data-toggle="select2" name="customer_id">
                                                    <option selected value="<?php echo $row[1];?>"><?php echo $row[11];?></option>                                  
                                                     <?php 
													$sql = " SELECT wc_id_pk,cust_name FROM tbl_wholesale_customer ";
													$res = mysqli_query($db,$sql);
													while($rw = mysqli_fetch_array($res))
													{
												?>
													
													<option value="<?php echo $rw['wc_id_pk'];?>"><?php echo $rw['cust_name'];?></option>
																									
												
													<?php } ?>										 
												</select>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Product</label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="item" class="select2" data-toggle="select2" name="item">
                                                        <option selected value="<?php echo $row[2];?>"><?php echo $row[12];?></option>
                                                        <?php 
                                                                $sql = " SELECT item_id_pk,final_product_code FROM mstr_item ";
                                                                $res = mysqli_query($db,$sql);
                                                                while($rw1 = mysqli_fetch_array($res))
                                                                {
                                                            ?>
                                                                
                                                                <option value="<?php echo $rw1['item_id_pk'];?>"><?php echo $rw1['final_product_code'];?></option>
                                                                                                                
												
													<?php } ?>	
                                                </select>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Rate</label>
											<div class="col-md-9">
											<input type="text" id="rate" class="form-control " placeholder="" name="rate" value="<?php echo $row[3];?>">
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
  var customer_id = document.getElementById("customer_id").value;
  var item = document.getElementById("item").value;
  var rate = document.getElementById("rate").value;
  if(customer_id != '' &&  item != '' && rate!="") 
  {
    $.ajax({
        type: "POST",
        url: '../../api/customer/edit_customer_rate.php',
        data: '&customer_id='+ customer_id + '&item=' + item + '&rate=' +rate + "&edit_id=" + <?php echo $edit_id;?> ,
        success: function(data)
        { 
           // console.log("result is:"+data);
            //console.log("result is:"+result);
            //$("#result").html(data);
            if(data == "1")
            {
                //alert('Record Updated!');
                //window.location.href = "view_customer_rate.php";

                $.toast({
                    heading: 'Success',
                    text: 'Customer Rate Updated...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                    window.location.href = "view_customer_rate.php";    
                }, 5000);
            }
            else
            {
                //alert('something went wrong');
                $.toast({
                        heading: 'Error',
                        text: 'Something went wrong...!!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
            }
        }
    });
  }
  else
  {
    if (item == '') 
    {
        //alert('Please Select Item!');
        $.toast({
            heading: 'Error',
            text: 'Please Select Item!',
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'error'
        })
    }
    if (customer_id == '') 
    {
        //alert('Please Select Customer!');
        $.toast({
            heading: 'Error',
            text: 'Please Select Customer!',
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'error'
        })
    }
  }
}

</script>
<?php } ?>