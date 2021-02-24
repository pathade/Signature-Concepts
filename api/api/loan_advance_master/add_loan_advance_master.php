<?php 
    include('../../database/dbconnection.php');
    session_start();
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    $flag=$_SESSION['flag'];
    if($flag==0){
    $sql= "INSERT INTO `mstr_loan_advance_master`(`name`, `address`, `phone_number`, `email`, `city`, `contact_person`, `branch`,
    `ledger_balance`, `check_name`, `pan_number`, `tin_number`, `contact_number`, `active_status`, `add_date`, `add_time`,
    `added_by`,`flag`) 
    VALUES ('$name','$address','$phone_number','$email','$city','$contact_person','$branch','$ledger_balance','$check_name','$pan_number','',
    '$contact_number','$status','$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
        $sql= "INSERT INTO `mstr_loan_advance_master`(`name`, `address`, `phone_number`, `email`, `city`, `contact_person`, `branch`,
    `ledger_balance`, `check_name`, `pan_number`, `tin_number`, `contact_number`, `active_status`, `add_date`, `add_time`,
    `added_by`,`flag`) 
    VALUES ('$name','$address','$phone_number','$email','$city','$contact_person','$branch','$ledger_balance','$check_name','$pan_number','',
    '$contact_number','$status','$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    $res = mysqli_query($db,$sql) or die('LAM: '.mysqli_error($db));

    if($res == 1)
    {
        echo "1";
    }
    else{
        echo "0";
    }
?>