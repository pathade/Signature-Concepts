<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $emp_birth_date1 = date("d-m-Y", strtotime($emp_birth_date));
    $emp_joining_date1 = date("d-m-Y", strtotime($emp_joining_date));

   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

    $sql = "UPDATE `mstr_employee` 
    SET `emp_name`='$emp_name',`emp_address`='$emp_address',`emp_designation`='$emp_designation',
    `emp_reference`='$emp_reference',`emp_attend_code`='$emp_attend_code',`est_no`='$est_no',
    `emp_status`='$emp_status1',`branch`='$branch',`employee_phone_no`='$employee_phone_no',
    `employee_mobile_no`='$employee_mobile_no',`emp_birth_date`='$emp_birth_date1',
    `emp_joining_date`='$emp_joining_date1',`emp_username`='$emp_username',`emp_passwd`='$emp_passwd',`emp_shift`='$emp_shift', 
    `emp_weeklyoff`='$emp_weeklyoff',`emp_bank_acc_no`='$emp_bank_acc_no',`emp_pf_no`='$emp_pf_no',`remark`='$remark',
    `basic`='$basic',`da`='$da',`hra`='$hra',`sp_allowance`='$sp_allowance',`other`='$other',`gross_salary`='$total',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `emp_id_pk`='$edit_id'";

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