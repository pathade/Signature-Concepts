<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag==0){
    $sql = "UPDATE `mstr_loan_advance_master` 
    SET `name`='$name',`address`='$address',`phone_number`='$phone_number',`email`='$email',`city`='$city',`contact_person`='$contact_person',
    `branch`='$branch',`ledger_balance`='$ledger_balance',`check_name`='$check_name',`pan_number`='$pan_number',`contact_number`='$contact_number',
    `active_status`='$status',`add_date`='$cur_date',`update_date`='$cur_date',`update_time`='$cur_time',`update_by`='admin@gmail.com' 
    WHERE `LAM_id_pk`='$edit_id' and `flag`='0' ";
    }
    else {
        $sql = "UPDATE `mstr_loan_advance_master` 
    SET `name`='$name',`address`='$address',`phone_number`='$phone_number',`email`='$email',`city`='$city',`contact_person`='$contact_person',
    `branch`='$branch',`ledger_balance`='$ledger_balance',`check_name`='$check_name',`pan_number`='$pan_number',`contact_number`='$contact_number',
    `active_status`='$status',`add_date`='$cur_date',`update_date`='$cur_date',`update_time`='$cur_time',`update_by`='admin@gmail.com' 
    WHERE `LAM_id_pk`='$edit_id' and `flag`='1' ";
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