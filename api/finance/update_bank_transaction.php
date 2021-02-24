<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $date1 = date("d-m-Y", strtotime($date));
    $cheque_date1 = date("d-m-Y", strtotime($cheque_date));

   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

if($flag == 0) {
    $sql = "UPDATE `fin_bank_transaction` 
    SET`type`= '$type', `mode`='$mode',`bank_name`='$account_no1',
   `account_no`= '$account_no1',`date`= '$date1', `trans_no`='$trans_no', `amount`='$amount',
    `particular_party`='$particular_party', `remark`='$remark', `cheque_no`='$cheque_no', `cheque_date`='$cheque_date1',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `bankt_id_pk`='$edit_id' and `flag`='$flag' ";
}
else {
     $sql = "UPDATE `fin_bank_transaction` 
    SET`type`= '$type', `mode`='$mode',`bank_name`='$account_no1',
   `account_no`= '$account_no1',`date`= '$date1', `trans_no`='$trans_no', `amount`='$amount',
    `particular_party`='$particular_party', `remark`='$remark', `cheque_no`='$cheque_no', `cheque_date`='$cheque_date1',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `bankt_id_pk`='$edit_id' and `flag`='$flag' ";
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