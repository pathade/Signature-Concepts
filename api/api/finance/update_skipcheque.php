<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
      session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');


   // $emp_status="1";
    $edit_id = $_POST['edit_id'];
   
    $flag = $_SESSION['flag'];
    $sql= '';

    if($flag == 0) {
     $sql = "UPDATE `fin_skip_cheque` 
    SET`bank_name`= '$account_no1', `account_no`='$account_no1',`cheque_no`='$cheque_no1',
   `authorised_by`= '$authorised_by', `remark`='$remark',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `id_pk`='$edit_id' and `flag`='$flag' ";
    }
    else {
        $sql = "UPDATE `fin_skip_cheque` 
    SET`bank_name`= '$account_no1', `account_no`='$account_no1',`cheque_no`='$cheque_no1',
   `authorised_by`= '$authorised_by', `remark`='$remark',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `id_pk`='$edit_id' and `flag`='$flag' ";
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