<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    //$cheque_date1 = date("d-m-Y", strtotime($cheque_date));

   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

    if($cheque_no == "")
    {
        $cheque_no = 0;
    }

     $sql = "UPDATE `exp_advance_payment` 
    SET`type`= '$paytype', `cheque_date`='$cheque_date',`payment_type`='$payment_type',`vendor_id_fk`='$vendor_id_fk',
    `manual_credit_no`='$manual_credit_no',`manual_credit_amt` = '$manual_credit_amt', `po_id_fk`='$po_no',
    `amount`= '$amount', `bank_id_fk`='$account_no', `cheque_no` = '$cheque_no', `authorised_by`= '$authorised_by',
    `remark`='$remark',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `id_pk`='$edit_id'";

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