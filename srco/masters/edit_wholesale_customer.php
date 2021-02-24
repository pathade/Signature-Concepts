<?php include('../../partials/header.php');?>
<?php 

    $edit_id = $_GET['id'];
    //$sql_charges="SELECT * FROM tbl_wholesale_customer where wc_id_pk='$edit_id'";
    // $sql_charges = "SELECT * 
    //                 FROM `retail_proforma` as rp,mstr_employee as e 
    //                 where rp.customer = e.emp_id_pk AND id_pk='$edit_id' ";

    $sql_charges = "SELECT * FROM `tbl_wholesale_customer` as rp,mstr_employee as e where rp.sales_executive = e.emp_id_pk AND wc_id_pk='$edit_id'";
    $result_charges = mysqli_query($db, $sql_charges);
    while ($row=mysqli_fetch_row($result_charges))
    {
      

?> 
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Wholesale Customer</h4>
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
                                    <input type="text" class="form-control " placeholder="Customer Name" name="customer_name" id="customer_name" value="<?php echo $row[1];?>">
                                    <!--<div id="cust_name_error">-->
                                    <!--  <span class="alert alert-danger">Customer Name Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Purchase Name<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Purchase Name" name="purchase_name" id="purchase_name" value="<?php echo $row[2];?>">
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
                                    <textarea type="text" class="form-control " placeholder="Office Address" name="office_address" id="office_address"><?php echo $row[3];?></textarea>
                                    <!--<div id="office_add_error">-->
                                    <!--  <span class="alert alert-danger">Office Address Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Office Landline No</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Office Landline no" name="olandline_no" id="olandline_no" value="<?php echo $row[5];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Purchase Mail ID<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Purchase Mail ID" name="purchase_mail_id" id="purchase_mail_id" value="<?php echo $row[7];?>">
                                    <!--<div id="purchase_mail_error">-->
                                    <!--  <span class="alert alert-danger">Purchase Mail Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >PAN<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="PAN" name="pan" id="pan" value="<?php echo $row[9];?>">
                                    <!--<div id="pan_error">-->
                                    <!--  <span class="alert alert-danger">Pan Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Ledger Balance</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Ledger Balance" name="ledger_balance" id="ledger_balance" value="<?php echo $row[11];?>">
                                    
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Mail ID</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Account Mail ID" name="account_mail_id" id="account_mail_id" value="<?php echo $row[13];?>">
                                    <!--<div id="account_mail_error">-->
                                    <!--  <span class="alert alert-danger">Account Mail Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >GST No<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="GST No" name="gst_no" id="gst_no" value="<?php echo $row[15];?>">
                                    <!--<div id="gstno_error">-->
                                    <!--  <span class="alert alert-danger">GST No Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
			                       	</div>

                              <div class="col-md-6">                                
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Mobile No<span style="color:red;">*</span></label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Mobile no" name="mobile_no" id="mobile_no" value="<?php echo $row[4];?>">
                                    <!--<div id="mobile_error">-->
                                    <!--  <span class="alert alert-danger">Mobile Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>                                
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Customer Credit Limit</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Customer Credit Limit" name="customer_credit_limit" id="customer_credit_limit" value="<?php echo $row[6];?>">
                                  </div>
                                </div>                                                                  
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Customer Credit Days</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Customer Credit Days" name="customer_credit_days" id="customer_credit_days" value="<?php echo $row[8];?>">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Status<span style="color:red;">*</span></label>
                                  <?php 
                                    if($row[10] == 1 )
                                    {?>
                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="1" checked>&nbsp; Active
                                        </div>
                                  <?php
                                    }
                                    else{
                                        ?>
                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="1" >&nbsp; Active
                                        </div>
                                        <?php
                                    }
                                    if($row[10] == 0 )
                                    {
                                        ?>
                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                            <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="0" checked>&nbsp; InActive
                                        </div>
                                        <?php

                                    }
                                    else{

                                    
                                  
                                  ?>
                                  
                                  <div class="col-md-4" style="display: flex;font-size: 16px;">
                                    <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;" value="0" >&nbsp; InActive
                                  </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="form-group row mt-3">
                                  <label class="col-lg-3 col-md-3 label-control" for="userinput1" >Sales Executive<span style="color:red;">*</span></label>
                                  <div class="col-lg-9 col-md-9">
                                    <select class="select2 form-control block" id="saleexecutive" name="saleexecutive" class="select2" data-toggle="select2" >
																				<option value="<?php echo $row[24];?>" > <?php echo $row[25];?> </option>
																				<!-- <option value="1" > ABC </option> -->
                    								</select>
                                    <!--<div id="sales_executive_error">-->
                                    <!--  <span class="alert alert-danger">Sales Executive Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >IGST App </label>
                                  <div class="col-md-6" style="display: flex;font-size: 16px;">
                                  <?php 
                                    if($row[14]==1)
                                    {
                                  ?>
                                    <input type="checkbox" class="form-control " value="1" name="igst" id="igst" style="height: calc(2.75rem + -11px);width: 16px" checked>&nbsp; Applicable
                                    <?php }
                                    else{
                                        ?>
                                        <input type="checkbox" class="form-control " value="1" name="igst" id="igst" style="height: calc(2.75rem + -11px);width: 16px">&nbsp; Applicable
                                        <?php
                                    }
                                    ?>
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
                                    <!--<div id="site_name_error">-->
                                    <!--  <span class="alert alert-danger">Site name Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-2 label-control" for="userinput1" >Site Address<span class="text-danger">*</span></label>
                                  <div class="col-md-10 divcol">
                                    <textarea type="text" class="form-control " placeholder="Site Address" name="site_address" id="site_address"></textarea>
                                    <!--<div id="site_address_error">-->
                                    <!--  <span class="alert alert-danger">Site address Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Site Landline No<span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Site Landline No" name="site_landline_no" id="site_landline_no">
                                    <!--<div id="site_landline_error">-->
                                    <!--  <span class="alert alert-danger">Site Landline no. Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Mobile No</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Account Mobile No" name="account_mobile_no" id="account_mobile_no">
                                  </div>
                                </div> -->
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Person Name<span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Account Person Name" name="account_person_name" id="account_person_name">
                                    <!--<div id="acperson_name_error">-->
                                    <!--  <span class="alert alert-danger">Ac. person name Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Second Authority</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Second Authority" name="second_authority" id="second_authority">
                                  </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Final Authority</label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Final Authority" name="final_authority" id="final_authority">
                                  </div>
                                </div> -->
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Site Person Name<span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Site Person Name" name="site_person_name" id="site_person_name">
                                    <!--<div id="sperson_name_error">-->
                                    <!--  <span class="alert alert-danger">Site person name Require</span> -->
                                    <!--</div>-->
                                  </div>
                                </div>
                                <!-- <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Site Mobile No</label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Site Mobile No" name="site_mobile_no" id="site_mobile_no">
                                  </div>
                                </div> -->
                                <div class="form-group row">
                                  <label class="col-md-3 label-control" for="userinput1" >Account Landline No<span class="text-danger">*</span></label>
                                  <div class="col-md-9">
                                    <input type="number" class="form-control " placeholder="Account Landline No" name="account_landline_no" id="account_landline_no">
                                    <!--<div id="aclandline_error">-->
                                    <!--  <span class="alert alert-danger">Ac. landline Require</span> -->
                                    <!--</div>-->
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
                              <table id="tbl" class="table table-striped table-bordered responsive">
                                <tbody>
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                      <th>Site Name</th>
                                      <th>Site Address</th>
                                      <th>Site Landline No</th>
                                      <th>Site Person Name</th>
                                      <th>Account Person Name</th>
                                      <th>Account Landline No</th>
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
                              
	                            <button type="button" class="btn btn-primary" name="addRow" id="" onclick="submit_data();">
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
    <script type="application/javascript">
 var x =0;
var t="";
  $(document).ready(function()
  {
    var edit_id='<?php echo $edit_id; ?>';  

     t = $('#tbl').DataTable( {
    dom: 'Bfrtip',
    searching:true,
    ajax: {
            "url": "../../api/customer/fetch_wholesale_customer_site_details.php",
            "type": "POST",
            data : 
             {
             'edit_id' : edit_id
             },
             
           },
         

        deferRender: true,
   
        "columnDefs": 
        [ 
          {
          "targets": 1,
          "data": null,
          "defaultContent": "<button type=\"button\" name=\"edit\" class=\"btn btn-success btn-sm\"><i class='fa fa-pencil' aria-hidden='true'></i></button>"
          },
          {
              "targets": 2,
              "data": null,
              "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
          },
        //    {
        //   "targets": [ 5 ],
        //         "visible": false
        //   },
        //   {
        //   "targets": [ 6 ],
        //         "visible": false
        //   },
        //   {
        //   "targets": [ 7 ],
        //         "visible": false
        //   },
        //   {
        //   "targets": [ 8],
        //         "visible": false
        //   },
        ],
    destroy:true,
    /*"fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            },*/
 });

 $('#tbl tbody').on( 'click', 'button', function () 
    {
      var action = this.name;
      if(action=="edit")
      {
        var data = t.row( $(this).parents('tr') ).data();
        //alert("data is:"+data);
        // var newOption = new Option(data[3], data[2], true, true);
        // $('#comboItemCode').append(newOption).trigger('change');

          document.getElementById('site_name').value = data[3];
          document.getElementById('site_address').value = data[4];
          document.getElementById('site_landline_no').value = data[5];
          // document.getElementById('account_mobile_no').value = data[6];
          document.getElementById('site_person_name').value = data[6];
          // document.getElementById('site_mobile_no').value = data[8];
          document.getElementById('account_person_name').value = data[7];
          document.getElementById('account_landline_no').value = data[8];
          // document.getElementById('second_authority').value = data[11];
          // document.getElementById('smobile_no').value = data[12];
          // document.getElementById('final_authority').value = data[13];
          
          // document.getElementById('fmobile_no').value = data[14];

        
        
        t.row( $(this).parents('tr') ).remove().draw();
        
   
      }
      else if(action=="delete")
      {
        t.row( $(this).parents('tr') ).remove().draw();
      }
    } );

  });
 </script>
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
//   document.getElementById("site_name_error").style.display = "none";
//   document.getElementById("site_address_error").style.display = "none";
//   document.getElementById("site_landline_error").style.display = "none";
//   document.getElementById("sperson_name_error").style.display = "none";
//   document.getElementById("acperson_name_error").style.display = "none";
//   document.getElementById("aclandline_error").style.display = "none";
  ///////////////////////////

  //var table="";
//  t= $('#tbl').DataTable( {
     
//       paginate: true,
//       lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
//       buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {extend: 'pdf', exportOptions: { columns: ''}}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
//       searching:true,
   
//       select: { style: 'multi', selector: 'td:nth-child(0)'},
//       select: { style: 'multi'},
//       destroy:false,
//       drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
//   });


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
                // var td3 = document.getElementById('account_mobile_no').value;
                var td4 = document.getElementById('site_person_name').value;
                // var td5 = document.getElementById('site_mobile_no').value;
                var td6 = document.getElementById('account_person_name').value;
                var td7 = document.getElementById('account_landline_no').value;
                // var td8 = document.getElementById('second_authority').value;
                // var td9 = document.getElementById('smobile_no').value;
                // var td10 = document.getElementById('final_authority').value;
                // var td11 = document.getElementById('fmobile_no').value;
               
              if(td0!="" && td1!="" && td2!="" && td4!="" && td6!="" && td7)
              {

              
                t.row.add( [
                          '',
                          '',
                          '',
                          td0,
                          td1,
                          td2,
                          // td3,
                          td4,
                          // td5,
                          td6,
                          td7,
                          // td8,
                          // td9,
                          // td10,
                          // td11


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
  
  t.rows().eq(0).each( function ( index ) 
  { 
      // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
      var row = t.row( index );
      var data = row.data();
      var site_name =data[3];
      var site_address =data[4];
      var site_landline_number =data[5];
      // var account_mobile =data[6];
      var site_person_name =data[6];
      // var site_mobile_number =data[8];
      var Account_person_name =data[7];
      var Account_landline_number =data[8];
      // var second_authority =data[11];
      // var mobile_number1 =data[12];
      // var final_authority =data[13];
      // var mobile_number2 =data[14];
      rawItemArray.push({
          site_name : site_name,
          site_address:site_address,  
          site_landline_number:site_landline_number,
          // account_mobile:account_mobile,
          site_person_name:site_person_name,
          // site_mobile_number:site_mobile_number,
          Account_person_name:Account_person_name,
          Account_landline_number:Account_landline_number,
          // second_authority:second_authority,
          // mobile_number1:mobile_number1,
          // final_authority:final_authority,
          // mobile_number2:mobile_number2
      });
      i++;
  });
  var newRawItemArray = JSON.stringify(rawItemArray);
  //console.log(newRawItemArray);
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
  var igst = document.getElementById("igst").value;
  if (igst.checked)
  { 
    igst.value = "1";
  }  
  else
  {
    igst.value = "0";
  }
  //alert(igst);
  if(customer_name!="" && purchase_name!="" && office_address!="" 
  && mobile_no!="" && pan!="" && saleexecutive!="" && gst_no!=""  && count>0)
  {
      $.ajax(
          {

          url: "../../api/customer/update_wholesale_customer.php",
          type: 'POST',
          data : $('#form1').serialize() + "&newRawItemArray=" + newRawItemArray + '&saleexecutive='+saleexecutive + '&edit_id='+<?php echo $edit_id;?> + '&igst='+igst,
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              if(data == "1")
              {
                //alert("Wholesale Customer Updated!");
                //window.location.href="view_wholesale_customer.php";

                $.toast({
                                heading: 'Success',
                                text: 'Wholesale Customer Updated!',
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
                  alert("Please Enter Valid Details");
              }
          
          },
          
      });
  }
  else
  {
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
      // if(account_mail_id == "")
      // {
      //     //document.getElementById("account_mail_error").style.display = "block";
      //     $.toast({
      //             heading: 'Error',
      //             text: 'Account Mail Id Require.',
      //             showHideTransition: 'slide',
      //             position: 'top-right',
      //             hideAfter: 5000,
      //             icon: 'error'
      //         })
      // }
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
<?php } ?>
