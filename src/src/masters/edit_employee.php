<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php 

    $edit_id = $_GET['id'];
    $sql_charges="SELECT * FROM mstr_employee where emp_id_pk = '$edit_id'";
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
                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Employee</h4>
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
                    <div class="card-text"></div>
                    <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="employeeform1">
                        <div class="form-body">
                                <div class="row">
                                                 <div class="col-md-6">
                                                    <!-- <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput1" >ID</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control " placeholder="ID" name="emp_id_pk" id="emp_id_pk" value="<?php echo $row[0];?>" readonly>
                                                                <span id="emp_id_error" style="color:red;"></span>
                                                            </div>
                                                    </div> -->

                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1" >Employee Name<span style="color:red;"> *</span></label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control " placeholder="Employee Name" name="emp_name" id="emp_name" value="<?php echo $row[1];?>">
                                                            <!--<span id="employee_name_error" style="color:red;"> Employee Name is Required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Employee Mobile</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control " placeholder="Work Phone" name="employee_mobile_no" id="employee_mobile_no" value="<?php echo $row[10];?>">
                                                            <!--<span id="employee_mobile_no_error" style="color:red;">Employee Mobile required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="joining_date">Joining Date<span style="color:red;"> *</span> </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="emp_joining_date" name="emp_joining_date" value="<?php echo $row[12];?>" readonly>
                                                            <!--<span id="joining_date_error" style="color:red;">Joining Data Required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Designation<span style="color:red;"> *</span></label>
                                                        <div class="col-md-8">
                                                            <select class="select2 form-control" id="emp_designation" name="emp_designation" value="<?php echo $row[3];?>">
                                                                <optgroup> 
                                                                    <?php 
                                                                        $get_emp_des = "SELECT emp_designation FROM mstr_employee WHERE emp_id_pk='$row[0]'";
                                                                        $res_emp_des = mysqli_fetch_row(mysqli_query($db, $get_emp_des));
                                                                        
                                                                    ?> 
                                                                    <option value="<?php echo $res_emp_des[0] ?>"><?php echo $res_emp_des[0] ?></option>
                                                                    <option value="sales executive">Sales executive</option>
                                                                    <option value="labour">Labour</option>
                                                                    <option value="office boy">Office boy</option>
                                                                    <option value="accounts">Accounts</option>
                                                                </optgroup>
                                                            </select>
                                                            <!--<span id="designation_error" style="color:red;"> Designation is Required</span>-->
                                                        </div>
                                                    </div>                                                    

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Attend Code</label>
                                                        <div class="col-md-8">
                                                        <input type="number " class="form-control" placeholder="Attend Code" name="emp_attend_code" id="emp_attend_code" value="<?php echo $row[5];?>">
                                                            <!-- <span id="attend_code_error" style="color:red;">Attent Code is Required</span> -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="username">User Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" placeholder="User Name" name="emp_username" id="emp_username" value="<?php echo $row[13];?>" readonly>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1" >Branch<span style="color:red;"> *</span></label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" id="branch" name="branch" value="<?php echo $row[8];?>" readonly>
                                                                    <option value="signature" selected>Signature Concepts LLP</option>
                                                                    <!-- <option value="aromas">Aromas</option> -->
                                                            </select>
                                                            <!--<span id="branch_error" style="color:red;">Branch is Required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="weeklyoff" >WeeklyOff<span style="color:red;"> *</span></label>
                                                        <div class="col-md-8">
                                                            <select class="select2 form-control" id="emp_weeklyoff" name="emp_weeklyoff">
                                                                <optgroup>
                                                                    <option value="<?php echo $row[16];?>"><?php echo $row[16];?> </option> 
                                                                    <option value="sunday">Sunday</option>
                                                                    <option value="monday">Monday</option>
                                                                    <option value="tuesday">Tuesday</option>
                                                                    <option value="wednesday">Wednesday</option>
                                                                    <option value="thursday">Thursday</option>
                                                                    <option value="friday">Friday</option>
                                                                    <option value="saturday">Saturday</option>
                                                                </optgroup>
                                                            </select>
                                                              <!--<span id="weeklyoff_error" style="color:red;">Weekly Off is Required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="bank_acc_no">Bank A/C No</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control " placeholder="Bank A/C No" name="emp_bank_acc_no" id="emp_bank_acc_no" value="<?php echo $row[17];?>">
                                                            <!--<span id="bank_acc_no_error" style="color:red;"></span>-->
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1" >Employee Address<span style="color:red;"> *</span></label>
                                                        <div class="col-md-8">
                                                            <textarea rows="3" class="form-control" name="emp_address" id="emp_address" placeholder="Employee Address" ><?php echo $row[2];?></textarea>
                                                            <!--<span id="employee_addr_error" style="color:red;">Employee Address Required </span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Employee Phone<span style="color:red;"> *</span> </label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control " placeholder="Phone" name="employee_phone_no" id="employee_phone_no" value="<?php echo $row[9];?>">
                                                            <!--<span id="employee_phone_no_error" style="color:red;">Employee Phone is Required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="birth_date">Birth Date</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="emp_birth_date" name="emp_birth_date" value="<?php echo $row[11];
                                                            ?> 
                                                            " readonly>  
                                                            <!--<span id="birth_date_error" style="color:red;"></span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                                        <?php 
                                                                if($row[7] == 1 )
                                                                {?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="emp_status1" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" checked>&nbsp; Active
                                                                    </div>
                                                            <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="emp_status1" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" >&nbsp; Active
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($row[7] == 0 )
                                                                {
                                                                    ?>
                                                                    <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                        <input type="radio" class="form-control " name="emp_status1" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" checked>&nbsp; Inactive
                                                                    </div>
                                                                    <?php

                                                                }
                                                                else{
                                  
                                                            ?>
                                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                <input type="radio" class="form-control " name="emp_status1" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" >&nbsp; Inactive
                                                            </div>
                                                                <?php } ?>
                                                    </div>

                                                    <div class="form-group row mt-4">
                                                    <label class="col-md-3 label-control" for="userinput1">Reference</label>
                                                        <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Reference" name="emp_reference" id="emp_reference" value="<?php echo $row[4];?>">
                                                            <!-- <span id="reference_error" style="color:red;">Reference is required.</span> -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">EST No</label>
                                                        <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="EST No" name="est_no" id="est_no" value="<?php echo $row[6];?>">
                                                            <!--<span id="est_no_error" style="color:red;"></span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                                                                                
                                                        <label class="col-md-3 label-control" for="passwd">Password </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" placeholder="Password" name="emp_passwd" id="emp_passwd" value="<?php echo $row[14];?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="shift">Shift<span style="color:red;"> *</span></label>
                                                        <div class="col-md-8">
                                                            <select class="select2 form-control" id="emp_shift" name="emp_shift">
                                                                <optgroup>
                                                                <option value="<?php echo $row[15];?>"><?php echo $row[15];?> </option>  
                                                                    <option value="night_shift">Night Shift</option>
                                                                    <option value="mornoing_shift">Morning Shift</option>
                                                                </optgroup>
                                                            </select>
                                                              <!--<span id="shift_error" style="color:red;">Shift is Required</span>-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="pf_no">PF. No</label>
                                                          <div class="col-md-8">
                                                              <input type="number" class="form-control " placeholder="PF. No" name="emp_pf_no" id="emp_pf_no" value="<?php echo $row[18];?>">
                                                              <!--<span id="pf_no_error" style="color:red;"></span>-->
                                                          </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                              <div class='col-md-12'>
                                                <div class="form-group row">
                                                      <label class="col-md-2 label-control" for="remark">Remark<span style="color:red;"> *</span></label>
                                                      <div class="col-md-10 divcol">
                                                          <textarea style="height: auto" id="remark" rows="2" class="form-control" name="remark" id="remark" placeholder="Remark"><?php echo $row[19];?></textarea>
                                                          <!--<span id="remark_error" style="color:red;">Remark is Required</span>-->
                                                      </div>
                                                </div>
                                              </div>
                                            </div>

                                            <br/>
                                              <div class="row">
                                                <div class="col-md-2">
                                                        <div class="form-group mb-1 col-md-12">
                                                            <label for="basic">Basic</label>
                                                            <input type="number" class="form-control" name="basic" id="basic" placeholder="0" value="<?php echo $row[20];?>" onkeyup="AutoCalc(this)">
                                                        </div>
                                                </div>
                                                <label class="mt-3" for="plus">+</label>

                                                <div class="col-md-2">
                                                      <div class="form-group mb-1 col-md-12">
                                                          <label for="da">DA</label>
                                                          <input type="number" class="form-control" name="da" id="da" placeholder="0" onkeyup="AutoCalc(this)" value="<?php echo $row[21];?>">
                                                      </div>
                                                </div>
                                                <label class="mt-3" for="plus">+</label>

                                                <div class="col-md-2">
                                                      <div class="form-group mb-1 col-md-12">
                                                          <label for="hra">HRA</label>
                                                          <input type="number" class="form-control" name="hra" id="hra" placeholder="0" onkeyup="AutoCalc(this)" value="<?php echo $row[22];?>">
                                                      </div>
                                                </div>
                                                <label class="mt-3" for="plus">+</label>

                                                <div class="col-md-2">
                                                      <div class="form-group mb-1 col-md-12">
                                                          <label for="sp-allowance">Sp.Allowance</label>
                                                          <input type="number" class="form-control" name="sp_allowance" id="sp_allowance" placeholder="0" onkeyup="AutoCalc(this)" value="<?php echo $row[23];?>">
                                                      </div>
                                                </div>
                                                <label class="mt-3" for="plus">+</label>

                                                <div class="col-md-2">
                                                      <div class="form-group mb-1 col-md-12">
                                                          <label for="other">Others</label>
                                                          <input type="number" class="form-control" name="other" id="other" placeholder="0" onkeyup="AutoCalc(this)" value="<?php echo $row[24];?>">
                                                      </div>
                                                </div>
                                                <label class="mt-3" for="equal">=</label>

                                                <div class="col-xl-1">
                                                      <div class="form-group mb-1 col-md-12">
                                                          <label style="width: 136px;"  for="Total">Gross Salary</label>
                                                          <input style="width: 136px;" type="number" class="form-control" name="total" id="total" placeholder="0" value="<?php echo $row[25];?>" readonly>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                            
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>



<?php include('../../partials/footer.php');?>
<script>
$(document).ready(function()
{
  
  //hide all error span
  
//   document.getElementById("employee_name_error").style.display = "none";
//   document.getElementById("employee_addr_error").style.display = "none";
//   document.getElementById("designation_error").style.display = "none";
// //   document.getElementById("attend_code_error").style.display = "none";
//   document.getElementById("branch_error").style.display = "none";
//   document.getElementById("employee_phone_no_error").style.display = "none";
//   document.getElementById("employee_mobile_no_error").style.display = "none";
//   document.getElementById("joining_date_error").style.display = "none";
//   document.getElementById("shift_error").style.display = "none";
//   document.getElementById("weeklyoff_error").style.display = "none";
//   document.getElementById("remark_error").style.display = "none";
// //   document.getElementById("reference_error").style.display = "none";
  

  ///////////////////////////
});

function save_data()
{
    var emp_name = document.getElementById("emp_name").value;
    var emp_address = document.getElementById("emp_address").value;
    var employee_mobile_no = document.getElementById("employee_mobile_no").value;
    var emp_designation = document.getElementById("emp_designation").value;
    var emp_attend_code = document.getElementById("emp_attend_code").value;
    var emp_joining_date = document.getElementById("emp_joining_date").value;
    var emp_username = document.getElementById("emp_username").value;
    var emp_weeklyoff = document.getElementById("emp_weeklyoff").value;
    var emp_bank_acc_no = document.getElementById("emp_bank_acc_no").value;
    var employee_phone_no = document.getElementById("employee_phone_no").value;
    var branch = document.getElementById("branch").value;
    var emp_birth_date = document.getElementById("emp_birth_date").value;
    var emp_reference = document.getElementById("emp_reference").value;
    var est_no = document.getElementById("est_no").value;
    var emp_passwd = document.getElementById("emp_passwd").value;
    var emp_shift = document.getElementById("emp_shift").value;
    var emp_pf_no = document.getElementById("emp_pf_no").value;
    var remark = document.getElementById("remark").value;
    var basic = document.getElementById("basic").value;
    var da = document.getElementById("da").value;
    var hra = document.getElementById("hra").value;
    var sp_allowance = document.getElementById("sp_allowance").value;
    var other = document.getElementById("other").value;
    var total = document.getElementById("total").value;
    //var emp_status1 = document.getElementById("emp_status1").value;
    var emp_status1 = $('input[name=emp_status1]:checked').val();
    if(emp_name != "" && emp_address != "" && employee_phone_no !="" && emp_joining_date != "" && emp_designation != "" && branch !="" && emp_weeklyoff != "" && 
    emp_shift != "") 
    {
        if(!$('#employee_phone_no').val().match('[7-9]{1}[0-9]{9}'))  
        {
            $.toast({
                      heading: 'Error',
                      text: 'Please put 10 digit valid mobile number...!!',
                      showHideTransition: 'slide',
                      position: 'top-right',
                      hideAfter: 5000,
                      icon: 'error'
            })
            //alert('Please put 10 digit valid mobile number (eg.9689045678)...!!');
        }
        else
        {
			$.ajax({
							type: "POST",
							url: '../../api/employee/edit_employee.php',
							data: "&emp_name=" + emp_name + '&emp_address='+ emp_address + '&employee_mobile_no=' + employee_mobile_no + '&emp_designation=' + emp_designation +
                            "&emp_attend_code=" + emp_attend_code + '&emp_joining_date='+ emp_joining_date + '&emp_username=' + emp_username + '&emp_weeklyoff=' + emp_weeklyoff +
                            "&emp_bank_acc_no=" + emp_bank_acc_no + '&employee_phone_no='+ employee_phone_no + '&branch=' + branch + '&emp_birth_date=' + emp_birth_date +
							"&emp_reference=" + emp_reference + '&est_no='+ est_no + '&emp_passwd=' + emp_passwd + '&emp_shift=' + emp_shift +
                            "&emp_pf_no=" + emp_pf_no + '&remark='+ remark + '&basic=' + basic + '&da=' + da + '&hra=' + hra + '&sp_allowance=' + sp_allowance +
                            "&other=" + other + '&total='+ total + '&emp_status1='+ emp_status1 +"&edit_id=" + <?php echo $edit_id;?>,
                            dataType:'text',  
                            success: function(data)
							{ 
								if(data == "1")
								{
                                    $.toast({
                                        heading: 'Success',
                                        text: 'Employee Updated Sucessfully!!',
                                        showHideTransition: 'slide',
                                        position: 'top-right',
                                        hideAfter: 5000,
                                        icon: 'success'
                                    })
                                    setTimeout(() => {
                                    window.location.href="view_employee.php";
                                    }, 5000);
									//alert('Employee Updated Sucessfully!');
								//window.location.href = "view_employee.php";
								}
								else
								{
                                    $.toast({
                                            heading: 'Error',
                                            text: 'Something Went Wrong...!!',
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
    }
    else
    {
            if(!$('#employee_phone_no').val().match('[7-9]{1}[0-9]{9}'))  
            {
                    $.toast({
                            heading: 'Error',
                            text: 'Please put 10 digit valid mobile number...!!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                    })
            }
            if(emp_name == "")
            {
                //document.getElementById("employee_name_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Name Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            if(employee_phone_no == "")
            {
                //document.getElementById("employee_phone_no_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Phone Number Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            if(employee_mobile_no == "")
            {
                //document.getElementById("employee_phone_no_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Phone Number Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            if(emp_address == "")
            {
                //document.getElementById("employee_addr_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Address Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            if(emp_designation == "")
            {
                //document.getElementById("designation_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Designation Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            // if(emp_attend_code == "")
            // {
            //     //document.getElementById("attend_code_error").style.display = "block";
            //     $.toast({
            //                 heading: 'Error',
            //                 text: 'Attend Code Require.',
            //                 showHideTransition: 'slide',
            //                 position: 'top-right',
            //                 hideAfter: 5000,
            //                 icon: 'error'
            //     })
            // }
            if(emp_joining_date == "")
            {
                //document.getElementById("joining_date_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Joining Date Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            if(emp_shift == "")
            {
                //document.getElementById("shift_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Employee Shift Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            if(emp_weeklyoff == "")
            {
                //document.getElementById("weeklyoff_error").style.display = "block";
                $.toast({
                            heading: 'Error',
                            text: 'Weekly Off Require.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                })
            }
            // if(emp_reference == "")
            // {
            //     //document.getElementById("reference_error").style.display = "block";
            //     $.toast({
            //                 heading: 'Error',
            //                 text: 'Employee Reference Require.',
            //                 showHideTransition: 'slide',
            //                 position: 'top-right',
            //                 hideAfter: 5000,
            //                 icon: 'error'
            //     })
            // }
    }
}
</script>

<script>

function AutoCalc(obj) {
           var total = 0;

           if (isNaN(obj.value)) {
               alert("Please enter a number :(");
               obj.value = '';
               return false;
           }
           else {

               var textBox = new Array();
               textBox = document.getElementsByTagName('input')

               for (i = 0; i < textBox.length; i++) {
                   if (textBox[i].type == 'number') {
                       var inputVal = textBox[i].value;
                       if (inputVal == '')
                           inputVal = 0;
                           if ((textBox[i].id == 'basic') || (textBox[i].id == 'da') || (textBox[i].id == 'hra') || (textBox[i].id == 'sp_allowance') || (textBox[i].id == 'other')) {
                           total = total + parseInt(inputVal);
                       }
                   }
               }
               document.getElementById('total').value = total;
           }
       }
</script>
<?php } ?>