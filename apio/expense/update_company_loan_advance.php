<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $transaction_date1 = date("d-m-Y", strtotime($transaction_date));
    $cheque_date1 = date("d-m-Y", strtotime($cheque_date));

   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

     $sql = "UPDATE `exp_company_loan_advance` 
    SET`type`= '$type', `branch`='$branch',`vendor_id_fk`='$name',`pay_mode`='$pay_mode',
    `transaction_date`='$transaction_date1',`bank_id_fk` = '$account_no', `account_no`='$account_no',
    `cheque_no`= '$cheque_no', `cheque_date`='$cheque_date1', `amount` = '$amount', `against_ref`= '$against_ref',
    `remark`='$remark',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `com_id_pk`='$edit_id'";

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