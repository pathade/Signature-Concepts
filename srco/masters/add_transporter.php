<?php include('../../partials/header.php');?>

<?php 
  if (isset($_POST['add_bank']))
  {
    extract($_POST);
    $flag = $_SESSION['flag'];
    // $uid = $_SESSION['user_id'];
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    // check if account no already exists
    if($flag == 0) {
    $select = "SELECT * FROM `mstr_bank` WHERE account_no='$account_no' and flag='0' ";
    }
    else {
        $select = "SELECT * FROM `mstr_bank` WHERE account_no='$account_no' and flag='1' ";
    }
    if(mysqli_num_rows(mysqli_query($db, $select)) < 1)
    {
     if($flag == 0) {   
    $sql = "INSERT INTO `mstr_bank`
    (`account_no`, `bank_name`, `bank_address`, `phone_1`, `phone_2`, `ifsc_code`, `status`, `add_date`, `add_time`, `added_by`,
    `update_date`, `update_time`, `updated_by`,`flag`) VALUES ('$account_no','$bank_name','$bank_address','$phone_no1','$phone_no2','$ifsc_code',
    '$status', null, null, null, null, null, null,'$flag')";
     }
     else {
         $sql = "INSERT INTO `mstr_bank`
    (`account_no`, `bank_name`, `bank_address`, `phone_1`, `phone_2`, `ifsc_code`, `status`, `add_date`, `add_time`, `added_by`,
    `update_date`, `update_time`, `updated_by`,`flag`) VALUES ('$account_no','$bank_name','$bank_address','$phone_no1','$phone_no2','$ifsc_code',
    '$status', null, null, null, null, null, null,'$flag')";
     }
    $result = mysqli_query($db, $sql);
    if($result)
    {
      ?>
      <script>alert('Bank Added Successfully');</script>
        <!-- <script language="javascript">
          $.toast({
                  heading: 'Success',
                  text: 'Bank Added successfully..!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: false,
                  icon: 'success'
              })
        </script> -->
      <?php
    }
    else
    {
      ?>
      <script>alert('Bank not added');</script>
        <!-- <script language="javascript">
        $.toast({
                heading: 'Error',
                text: 'Please try Again..!!',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: false,
                icon: 'error'
            })
        </script> -->
      <?php
    }
  }
}
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
	
<form method="post" id="form1" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" >
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Transporter</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
									<div class="col-md-12">
                                    <div class="form-group row">
                                        
				                        	<label class="col-md-2 label-control" for="bank_name" >Type </label>
				                        	<div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="transporter_type" id="transporter" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; 
                                                <label class="label-control" for="active">Transporter</label>
                                            </div>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="transporter_type" id="courier" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;">&nbsp; <label class="label-control" for="inactive">Courier</label>
                                            </div>
                                        </div>
										<div class="form-group row">
                                        
				                        	<label class="col-md-2 label-control" for="bank_name" >Name<span class="text-danger">*<span></label>
				                        	<div class="col-md-10 divcol">
                                                <input type="text" class="form-control"  placeholder="Name" name="name" id="name"/>
                                                <div id="name_error">
                                                    <!-- <span class="alert alert-danger p-0">Name is Require</span>  -->
                                                </div>
				                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="acc_no" >Address<span class="text-danger">*<span></label>
                                            <div class="col-md-10 divcol">
                                            <input type="text" class="form-control"  placeholder="Address" name="address" id="address" />
                                            <div id="account_no_error">
                                                <!-- <span class="alert alert-danger p-0">Address is Require</span>  -->
                                            </div>
                                            </div>
				                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 label-control" for="bank_address" >Contact Person<span class="text-danger">*<span></label>
                                            <div class="col-md-10 divcol">
                                                <textarea type="text" class="form-control"  placeholder="Contact Person" name="cp" id="cp"></textarea>
                                                <div id="address_error">
                                                    <!-- <span class="alert alert-danger p-0">Contact Person Require</span>  -->
                                                </div>
                                            </div>
				                        </div>
									</div>
		                        </div>
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="phone_no1">Phone No<span class="text-danger">*<span></label>
				                        	<div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="phone_no1" id="phone_no1" />
                                                <div id="phone_no1_error">
                                                    <!-- <span class="alert alert-danger p-0">Phone No Require</span>  -->
                                                </div>
				                            </div>
				                        </div>
				                    </div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="phone_no2">Mobile No<span class="text-danger">*<span></label>
											<div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="phone_no2" id="phone_no2" />
                                                <div id="phone_no2_error">
                                                    <!-- <span class="alert alert-danger p-0">Phone No Require</span>  -->
                                                </div>
                                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="ifsc_code">PAN<span class="text-danger">*<span></label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Pan" name="pan" id="pan" />
                                                <div id="ifsc_error">
                                                    <!-- <span class="alert alert-danger p-0">PAN Require</span>  -->
                                                </div>
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
                                </div>
                                <div class="col-md-6">
										<div class="form-group row">
                                            <label class="col-md-3 label-control" >Status</label>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; 
                                                <label class="label-control" for="active">Active</label>
                                            </div>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="status" id="inactive" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;">&nbsp; <label class="label-control" for="inactive">Inactive</label>
                                            </div>
				                        </div>
									</div>
                                    <hr>
                                    <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="phone_no1">Vehicle Number No</label>
				                        	<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Vehicle Number" name="vehicle_number" id="vehicle_number" />
                                                <!-- <div id="vehicle_no_error">
                                                    <span class="alert alert-danger p-0">Vehicle Number Require</span> 
                                                </div> -->
				                            </div>
				                        </div>
				                    </div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="phone_no2">Vehicle Name</label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Vehicle Name" name="vehicle_name" id="vehicle_name" />
                                                <!-- <div id="vehicle_name_error">
                                                    <span class="alert alert-danger p-0">Phone No Require</span> 
                                                </div> -->
                                            </div>
			                       	    </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="ifsc_code">Description</label>
											<div class="col-md-9">
                                                <input type="text" class="form-control"  placeholder="Description" name="des" id="des" />
                                                <!-- <div id="ifsc_error">
                                                    <span class="alert alert-danger p-0">IFSC code Require</span> 
                                                </div> -->
				                            </div>
			                       		</div>
			                       	</div>
                                    <div class="col-md-6">
                                       <div class="form-group row">
                                            <label class="col-md-3 label-control" >Status</label>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="vstatus" id="vactive_status" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; 
                                                <label class="label-control" for="active">Active</label>
                                            </div>
                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                <input type="radio" class="form-control " name="vstatus" id="vinactive_status" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;">&nbsp; <label class="label-control" for="inactive">Inactive</label>
                                            </div>
				                        </div>
                                    </div>
		                        </div>
                                <div class="form-actions center">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Reset
	                            </button>
                              
	                            <button type="button" class="btn btn-primary" name="addRow" id="addRow">
	                                <i class="fa fa-check-square-o" ></i> Add Row
	                            </button>
	                        </div>
                            <hr />
                          <div class="row m-1">
                            <div class="table-responsive">
                              <table id="tbl" class="table display compact nowrap">
                                <tbody>
                                  <thead>
                                    <tr>
                                      <th>Vehicle Number</th>
                                      <th>Vehicle Name</th>
                                      <th>Description</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                </tbody>
                              </table>
                            </div>
                          </div>
							</div>
                            
	                        <div class="form-actions right">
								
								<button type="button" name="add_trans" class="btn btn-primary" id="btn" onclick="submit_date();">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
								
	                            <button type="reset" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            
	                        </div>
	                    </form>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</form>
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>

<script language="javascript">
var t="";
$(document).ready(function()
{
  //hide all error span
  
//   document.getElementById("name_error").style.display = "none";
//   document.getElementById("account_no_error").style.display = "none";
//   document.getElementById("address_error").style.display = "none";
//   document.getElementById("phone_no1_error").style.display = "none";
//   document.getElementById("phone_no2_error").style.display = "none";
//   document.getElementById("ifsc_error").style.display = "none";
  ///////////////////////////
  t= $('#tbl').DataTable( {
     
     paginate: true,
     lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
     buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {extend: 'pdf', exportOptions: { columns: ''}}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
     searching:true,
  
     select: { style: 'multi', selector: 'td:nth-child(0)'},
     select: { style: 'multi'},
     destroy:false,
     drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
 });
 $('#addRow').on( 'click', function () {
                var td0 = document.getElementById('vehicle_number').value;
                var td1 = document.getElementById('vehicle_name').value;
                var td2 = document.getElementById('des').value;
                var td3 = document.getElementById('vactive_status').value;
                
                
               
              if(td0!="" && td1!="" )
              {

              
                t.row.add( [
                          td0,
                          td1,
                          td2,
                          td3,

                ] ).draw( false );
                resetData();
              }
        
    } );

    function resetData()
  {
    
   // $('#saleexecutive').val('Select').trigger('change.select2');
    document.getElementById('vehicle_number').value = '';
    document.getElementById('vehicle_name').value = '';
    document.getElementById('des').value = '';
    document.getElementById('vactive_status').value = '';
  }
});

function submit_date()
{
    //console.log('submit data');
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var cp = document.getElementById("cp").value;
    var phone_no1 = document.getElementById("phone_no1").value;
    var phone_no2 = document.getElementById("phone_no2").value;
    var pan = document.getElementById("pan").value;
    var expression = /^[0]*[789]{1}[0-9]{9}$/;

    var rawItemArray = [];
    var count=t.rows().count();               
    var i=0;
  
    t.rows().eq(0).each( function ( index )  
    { 
        // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
        var row = t.row( index );
        var data = row.data();
        var vehicle_number =data[0];
        var vehicle_name =data[1];
        var Description =data[2];
        var v_status =data[3];
        rawItemArray.push({
            vehicle_number : vehicle_number,
            vehicle_name:vehicle_name,  
            Description:Description,
            v_status:v_status,
        });
        i++;
    });
    var newRawItemArray = JSON.stringify(rawItemArray);
    if(name!="" && address!="" && pan!="" && phone_no1!="" && expression.test(phone_no1) && phone_no2 != "" && expression.test(phone_no2)
    && cp != "")
    {
        //alert("hii");
        $.ajax(
        {

            url: "../../api/transporter/add_transporter.php",
            type: 'POST',
            data : $('#form1').serialize() + "&contact_person_array=" + newRawItemArray ,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data);
                if(data == "1")
                {
                    //alert("Transporter Added!");
                    //window.location.href="view_transporter.php";
                    $.toast({
                        heading: 'Success',
                        text: 'Transporter Added!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'success'
                    })
                    setTimeout(() => {
                        window.location.href = "view_transporter.php";    
                    }, 5000);
                    $('#btn').attr('disabled', true);
                }
                else
                {
                    //alert("Please Enter Valid Details");
                    $.toast({
                        heading: 'Error',
                        text: 'Something went wrong...!!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
                }
            
            },
          
        });
    }
    else
    {
        //alert("Byeee");
        if(name == "")
        {
            // document.getElementById("name_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Name Require..!!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
            
        }
         
         //   document.getElementById("name_error").style.display = "none";

        if(address == "")
        {
            //document.getElementById("account_no_error").style.display = "block";
            //return false;
            $.toast({
                        heading: 'Error',
                        text: 'Address Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        
          //  document.getElementById("account_no_error").style.display = "none";

        if(cp == "")
        {
            // document.getElementById("address_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Contact Person Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })

        }
       
           // document.getElementById("address_error").style.display = "none";

        if(phone_no1 == "" || !expression.test(phone_no1))
        {
            // document.getElementById("phone_no1_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Phone No Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        
           // document.getElementById("phone_no1_error").style.display = "none";

        if(phone_no2 == "" || !expression.test(phone_no2))
        {
            // document.getElementById("phone_no2_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Mobile No Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        
           // document.getElementById("phone_no2_error").style.display = "none";

        if(pan == "")
        {
            // document.getElementById("ifsc_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'PAN Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        
           // document.getElementById("ifsc_error").style.display = "none";
        }
    }

            

</script>


