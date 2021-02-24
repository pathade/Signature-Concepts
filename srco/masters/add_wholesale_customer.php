<?php include('../../partials/header.php');?>
<style>
  .alert-danger {
    background-color: #E6808A!important;
    color: #5A1219!important;
    padding: 1px;
}
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Wholesale Customer</h4>
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
	                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="form1">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                               
	                    		<div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Customer Name<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Customer Name" name="customer_name" id="customer_name">
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Purchase Name<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Purchase Name" name="purchase_name" id="purchase_name">
                                    <!--<div id="purchase_name_error">-->
                                    <!--  <span class="alert alert-danger">Purchase Name Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                              </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Office Address<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <textarea type="text" class="form-control " placeholder="Office Address" name="office_address" id="office_address"></textarea>
                                   
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Office Landline No</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Office Landline no" name="olandline_no" id="olandline_no" value="0">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Purchase Mail ID<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Purchase Mail ID" name="purchase_mail_id" id="purchase_mail_id">
                                   
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >PAN<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="PAN" name="pan" id="pan">
                                   
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Ledger Balance</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " value="0" placeholder="Ledger Balance" name="ledger_balance" id="ledger_balance">
                                    
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Mail ID</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Account Mail ID" name="account_mail_id" id="account_mail_id">
                                   
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >GST No<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="GST No" name="gst_no" id="gst_no">
                                   
                                  </div>
                                </div>
			                       	</div>

                              <div class="col-md-6">                                
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Mobile No<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Mobile no" name="mobile_no" id="mobile_no">
                                    
                                  </div>
                                </div>                                
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Customer Credit Limit</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control "  value="0" placeholder="Customer Credit Limit" name="customer_credit_limit" id="customer_credit_limit">
                                  </div>
                                </div>                                                                  
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Customer Credit Days</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " value="0" placeholder="Customer Credit Days" name="customer_credit_days" id="customer_credit_days">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Status<span style="color:red;">*</span></label>
                                  <div class="col-md-4" style="display: flex;font-size: 16px;">
                                    <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="1" checked>&nbsp; Active
                                    
                                  </div>
                                  <div class="col-md-4" style="display: flex;font-size: 16px;">
                                    <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="0">&nbsp; InActive
                                  </div>
                                  
                                </div>
                                
                                <div class="form-group row mt-3">
                                  <label class="col-lg-3 col-md-3 label-control" for="userinput1" >Sales Executive<span style="color:red;">*</span></label>
                                  <div class="col-lg-9 col-md-9">
                                    <select class="select2 form-control block" id="saleexecutive" name="saleexecutive" class="select2" data-toggle="select2" >
																				<option value="" selected disabled> Select Sales Executive</option>
                                        <?php 
                                        $flag=$_SESSION['flag'];
                                        if($flag==0)
                                        {
                                          $get_sales = "SELECT emp_id_pk, emp_name FROM mstr_employee WHERE emp_designation='sales executive' and flag='0'";
                                        }
                                        else {
                                            $get_sales = "SELECT emp_id_pk, emp_name FROM mstr_employee WHERE emp_designation='sales executive' and flag='1'";
                                        }
                                          $res_sales = mysqli_query($db, $get_sales) or die(mysqli_error($db));
                                          while($row = mysqli_fetch_row($res_sales))
                                          {
                                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                          }
                                        ?>
                    								</select>
                                  
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >IGST App </label>
                                  <div class="col-md-6" style="display: flex;font-size: 16px;">
                                    <input type="checkbox" class="form-control " name="igst" id="igst" style="height: calc(2.75rem + -11px);width: 16px" value=1 >&nbsp; Applicable
                                   
                                  </div>
                                </div>
                              </div>
		                        </div>
                            <hr>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-md-2 label-control" for="userinput1" >Site Name <span class="text-danger">*</span></label>
                                  <div class="col-md-10 divcol">
                                    <input type="text" class="form-control " placeholder="Site Name" name="site_name" id="site_name">
                                    
                                  </div>
                                  
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-2 label-control" for="userinput1" >Site Address <span class="text-danger">*</span></label>
                                  <div class="col-md-10 divcol">
                                    <textarea type="text" class="form-control " placeholder="Site Address" name="site_address" id="site_address"></textarea>
                                   
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Site Landline No <span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Site Landline No" name="site_landline_no" id="site_landline_no">
                                   
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Person Name <span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Account Person Name" name="account_person_name" id="account_person_name">
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Site Person Name <span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Site Person Name" name="site_person_name" id="site_person_name">
                                    
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Landline No <span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Account Landline No" name="account_landline_no" id="account_landline_no">
                                    
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Mobile No</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Mobile No" name="smobile_no" id="smobile_no">
                                  </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Mobile No</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Mobile No" name="fmobile_no" id="fmobile_no">
                                  </div>
                                </div> -->
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
                                      <th>Site Name</th>
                                      <th>Site Address</th>
                                      <th>Site Landline No</th>
                                      <!-- <th>Account Mobile No</th> -->
                                      <th>Site Person Name</th>
                                      <!-- <th>Site Mobile No</th> -->
                                      <th>Account Person Name</th>
                                      <th>Account Landline No</th>
                                      <!-- <th>Second Authority</th> -->
                                      <!-- <th>Mobile No</th> -->
                                      <!-- <th>Final Authority</th> -->
                                      <!-- <th>Mobile No</th> -->
                                    </tr>
                                  </thead>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="form-actions center">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
                              
	                            <button type="button" class="btn btn-primary" name="addRow" id="btn" onclick="submit_data();">
	                                <i class="fa fa-check-square-o" ></i> Save
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php include('../../partials/footer.php');?>
    <script>
var t="";
$(document).ready(function()
{
  

  //hide all error span
  
//   document.getElementById("cust_name_error").style.display = "none";
//   document.getElementById("purchase_name_error").style.display = "none";
//   document.getElementById("office_add_error").style.display = "none";
//   document.getElementById("mobile_error").style.display = "none";
//   document.getElementById("purchase_mail_error").style.display = "none";
//   document.getElementById("pan_error").style.display = "none";
//   document.getElementById("sales_executive_error").style.display = "none";
//   document.getElementById("account_mail_error").style.display = "none";
//   document.getElementById("gstno_error").style.display = "none";
//   document.getElementById("igst_error").style.display = "none";
//   document.getElementById("site_name_error").style.display = "none";
//   document.getElementById("site_address_error").style.display = "none";
//   document.getElementById("site_landline_error").style.display = "none";
//   document.getElementById("sperson_name_error").style.display = "none";
//   document.getElementById("acperson_name_error").style.display = "none";
//   document.getElementById("aclandline_error").style.display = "none";
//   ///////////////////////////

  //var table="";
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


//     $('#tbl').on('click', 'tbody td', function(){
//    window.location = $(this).closest('tr').find('td:eq(0) a').attr('import');
// });

  $('#addRow').on( 'click', function () {
      //alert("hii");
      
      var saleexecutive = document.getElementById('saleexecutive');
      var customer_name = document.getElementById('customer_name');
      if(saleexecutive.value != "")
      { 
        if(customer_name.value!="")
        {
          //alert("hii123");
                var td0 = document.getElementById('site_name').value;
                var td1 = document.getElementById('site_address').value;
                var td2 = document.getElementById('site_landline_no').value;
                var td4 = document.getElementById('site_person_name').value;
                var td6 = document.getElementById('account_person_name').value;
                var td7 = document.getElementById('account_landline_no').value;
               
              if(td0!="" && td1!="" && td2!="" && td4!="" && td6!="" && td7)
              {

              
                t.row.add( [
                          td0,
                          td1,
                          td2,
                          td4,
                          td6,
                          td7,

                ] ).draw( false );
                resetData();
              }
              else
              {
                if(td0 == "")
                {
                  //site_name
                  $.toast({
                      heading: 'Error',
                      text: 'Site Name Require',
                      showHideTransition: 'slide',
                      position: 'top-right',
                        hideAfter: false,
                      icon: 'error'
                  })
                }
                if(td1 == "")
                {
                  //site_name
                  $.toast({
                      heading: 'Error',
                      text: 'Site Address Require',
                      showHideTransition: 'slide',
                      position: 'top-right',
                        hideAfter: false,
                      icon: 'error'
                  })
                }
                if(td2 == "")
                {
                  //site_name
                  $.toast({
                      heading: 'Error',
                      text: 'Site Landline Require',
                      showHideTransition: 'slide',
                      position: 'top-right',
                        hideAfter: false,
                      icon: 'error'
                  })
                }
                if(td4 == "")
                {
                  //site_name
                  $.toast({
                      heading: 'Error',
                      text: 'Site Person Name Require',
                      showHideTransition: 'slide',
                      position: 'top-right',
                        hideAfter: false,
                      icon: 'error'
                  })
                }
                if(td6 == "")
                {
                  //site_name
                  $.toast({
                      heading: 'Error',
                      text: 'Account Person Name Require',
                      showHideTransition: 'slide',
                      position: 'top-right',
                        hideAfter: false,
                      icon: 'error'
                  })
                }
                if(td7 == "")
                {
                  //site_name
                  $.toast({
                      heading: 'Error',
                      text: 'Account Landline Require',
                      showHideTransition: 'slide',
                      position: 'top-right',
                        hideAfter: false,
                      icon: 'error'
                  })
                }
                
              }
        }
        else
        {
          $.toast({
                    heading: 'Error',
                    text: 'Please Specify Customer Name !!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                      hideAfter: false,
                    icon: 'error'
                })
        }
      }
      else
      {
        $.toast({
                  heading: 'Error',
                  text: 'Please select Valid  Sale Executive..!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: false,
                  icon: 'error'
              })
      }
    } );

    function resetData()
  {
    
   // $('#saleexecutive').val('Select').trigger('change.select2');
    document.getElementById('site_name').value = '';
    document.getElementById('site_address').value = '';
    document.getElementById('site_landline_no').value = '';
    // document.getElementById('account_mobile_no').value = '';
    document.getElementById('site_person_name').value = '';
    // document.getElementById('site_mobile_no').value = '';
    document.getElementById('account_person_name').value = '';
    document.getElementById('account_landline_no').value = '';
    // document.getElementById('second_authority').value = '';
    // document.getElementById('smobile_no').value = '';
    // document.getElementById('final_authority').value = '';
    // document.getElementById('fmobile_no').value = '';
  }
});

function submit_data()
{
  //alert("submit");
  
  // Add table data to JS array
  
  var rawItemArray = [];
  var count=t.rows().count();               
  var i=0;
  // alert(t.fnGetData().length);
  // t.
  
  t.rows().eq(0).each( function ( index ) 
  { 
      // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
      var row = t.row( index );
      var data = row.data();
      var site_name =data[0];
      var site_address =data[1];
      var site_landline_number =data[2];
      var site_person_name =data[3];
      var Account_person_name =data[4];
      var Account_landline_number =data[5];
      rawItemArray.push({
          site_name : site_name,
          site_address:site_address,  
          site_landline_number:site_landline_number,
          site_person_name:site_person_name,
          Account_person_name:Account_person_name,
          Account_landline_number:Account_landline_number,
      });
      i++;
  });
  var newRawItemArray = JSON.stringify(rawItemArray);
  console.log(newRawItemArray);
  //alert("newRawItemArray:"+newRawItemArray);
  // var al123 = newRawItemArray.length;
  // alert("al:"+al123);
  // //if (Array.isArray(newRawItemArray) && newRawItemArray.length) 
  // if(newRawItemArray.length==0)
  // {
  //   //output = true; 
  //   alert(" empty");
  // }
  // else
  // {
  //   //output = false; 
  //   alert("not empty");
  // }
                
            //else 
               
  var customer_name = document.getElementById("customer_name").value;
  var purchase_name = document.getElementById("purchase_name").value;
  var office_address = document.getElementById("office_address").value;
  var mobile_no = document.getElementById("mobile_no").value;
  var olandline_no = document.getElementById("olandline_no").value;
  var customer_credit_limit = document.getElementById("customer_credit_limit").value;
  var purchase_mail_id = document.getElementById("purchase_mail_id").value;
  var customer_credit_days = document.getElementById("customer_credit_days").value;
  var pan = document.getElementById("pan").value;
  var ledger_balance = document.getElementById("ledger_balance").value;
  var saleexecutive = document.getElementById("saleexecutive").value;
  var account_mail_id = document.getElementById("account_mail_id").value;
  var gst_no = document.getElementById("gst_no").value;
  var igst = document.getElementById("igst");
  // //alert("igst:"+igst);
  if (igst.checked)
  {  
    igst.value = "1";
  }  
  else
  {
    igst.value = "0";
  }

  //alert("igst:"+igst);
  if(customer_name!="" && purchase_name!="" && office_address!="" 
  && mobile_no!="" && pan!="" && saleexecutive!=""  && gst_no!="" && count>0)
  {
      $.ajax(
              {

              url: "../../api/customer/add_wholesale_customer.php",
              type: 'POST',
              data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&saleexecutive='+saleexecutive + '&igst=' + igst.value,
              dataType:'text',  
              success: function(data)
              { 
                  console.log("console data is:"+data);
                  if(data == "1")
                  {
                            //alert("Wholesale Customer Added!");
                            //window.location.href="add_wholesale_customer.php";

                            $.toast({
                                heading: 'Success',
                                text: 'Wholesale Customer Added',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'success'
                            })
                            setTimeout(() => 
                            {
                                window.location.href="view_wholesale_customer.php";    
                            }, 5000);
                            $('#btn').atrr('disabled', true);
                  }
                  else
                  {
                      // alert("Please Enter Valid Details");
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
      if(customer_name == "")
      {
          //document.getElementById("cust_name_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Customer Name Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(purchase_name == "")
      {
          //document.getElementById("purchase_name_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Purchase Name Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(office_address == "")
      {
          //document.getElementById("office_add_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Office Address Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(mobile_no == "")
      {
          //document.getElementById("mobile_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Mobile Number Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(purchase_mail_id == "")
      {
          //document.getElementById("purchase_mail_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Purchase Mail Id Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })

      }
      if(pan == "")
      {
          //document.getElementById("pan_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Pan Number Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(saleexecutive == "")
      {
          //document.getElementById("sales_executive_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Sales Executive Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })

      }
      /*if(account_mail_id == "")
      {
          //document.getElementById("account_mail_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Account Mail Id Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }*/
      if(igst == "")
      {
          //document.getElementById("igst_error").style.display = "block";
      }
      if(gst_no == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'GST Number Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(site_name_error == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Site name Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(site_address_error == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Site address Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(site_landline_error == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Site Landline no. Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(acperson_name_error == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Ac. person name Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(aclandline_error == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Ac. Landline no. Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(sperson_name_error == "")
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Site person name Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }
      if(count<=0)
      {
          //document.getElementById("gstno_error").style.display = "block";
          $.toast({
                  heading: 'Error',
                  text: 'Site Details Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
      }



      if(!$('#mobile_no').val().match('[7-9]{1}[0-9]{9}'))  
      {
        $.toast({
                  heading: 'Error',
                  text: 'Please put 10 digit valid mobile number...!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
        return;
      } 
      if(!$('#account_mail_id').val().match('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$') && !$('#purchase_mail_id').val().match('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'))  
      {
        $.toast({
                  heading: 'Error',
                  text: 'Please enter valid Account Email Address and Purchase Email Address...!!',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              })
        return;
      }
  }

     
}
  
</script>
