<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $emp_birth_date1 = date("d-m-Y", strtotime($emp_birth_date));
    $emp_joining_date1 = date("d-m-Y", strtotime($emp_joining_date));
    //convert json to array
   
    //print_r($newRawItemArray);

    $emp_status="1";
  $flag= $_SESSION['flag'];
    $sql=' ';

    if($flag== '0'){
   $sql = "INSERT INTO `mstr_employee`(`emp_name`, `emp_address`, `emp_designation`, `emp_reference`, 
    `emp_attend_code`, `est_no`, `emp_status`, `branch`, `employee_phone_no`, `employee_mobile_no`, `emp_birth_date`, 
    `emp_joining_date`, `emp_username`, `emp_passwd`, `emp_shift`, `emp_weeklyoff`, `emp_bank_acc_no`, 
    `emp_pf_no`, `remark`, `basic`, `da`, `hra`, `sp_allowance`, 
    `other`, `gross_salary`,`add_date`, `add_time`,`added_by`,`flag`) VALUES ('$emp_name',
    '$emp_address','$emp_designation','$emp_reference','$emp_attend_code','$est_no',
    '$emp_status','$branch','$employee_phone_no','$employee_mobile_no',
    '$emp_birth_date1','$emp_joining_date1','$emp_username','$emp_passwd','$emp_shift'
    ,'$emp_weeklyoff','$emp_bank_acc_no','$emp_pf_no','$remark','$basic','$da','$hra','$sp_allowance',
    '$other','$total','$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
         $sql = "INSERT INTO `mstr_employee`(`emp_name`, `emp_address`, `emp_designation`, `emp_reference`, 
    `emp_attend_code`, `est_no`, `emp_status`, `branch`, `employee_phone_no`, `employee_mobile_no`, `emp_birth_date`, 
    `emp_joining_date`, `emp_username`, `emp_passwd`, `emp_shift`, `emp_weeklyoff`, `emp_bank_acc_no`, 
    `emp_pf_no`, `remark`, `basic`, `da`, `hra`, `sp_allowance`, 
    `other`, `gross_salary`,`add_date`, `add_time`,`added_by`,`flag`) VALUES ('$emp_name',
    '$emp_address','$emp_designation','$emp_reference','$emp_attend_code','$est_no',
    '$emp_status','$branch','$employee_phone_no','$employee_mobile_no',
    '$emp_birth_date1','$emp_joining_date1','$emp_username','$emp_passwd','$emp_shift'
    ,'$emp_weeklyoff','$emp_bank_acc_no','$emp_pf_no','$remark','$basic','$da','$hra','$sp_allowance',
    '$other','$total','$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>