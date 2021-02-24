<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";
    session_start();
    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $flag=$_SESSION['flag'];

    if($flag==0){
    $sql = "INSERT INTO `mstr_bank`(`account_no`, `bank_name`, `bank_address`, `phone_1`, `phone_2`, `ifsc_code`, `status`, `add_date`,
    `add_time`, `added_by`, `update_date`, `update_time`, `updated_by`,`flag`) VALUES ('$account_no','$bank_name','$bank_address',
    '$phone_no1','$phone_no2','$ifsc_code', '$status', null, null, null, null, null, null,'$flag')";
    }
    else {
        $sql = "INSERT INTO `mstr_bank`(`account_no`, `bank_name`, `bank_address`, `phone_1`, `phone_2`, `ifsc_code`, `status`, `add_date`,
    `add_time`, `added_by`, `update_date`, `update_time`, `updated_by`,`flag`) VALUES ('$account_no','$bank_name','$bank_address',
    '$phone_no1','$phone_no2','$ifsc_code', '$status', null, null, null, null, null, null,'$flag')";
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