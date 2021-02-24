<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');


   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

     $sql = "UPDATE `exp_advance_payment_cancellation` 
    SET`type`= '$type', `branch`='$branch',`adv_pay_id_fk`='$adv_pay_id_fk',`amount`='$amount',`vendor_id_fk`='$vendor_id_fk',
    `pay_type_cancel_reason`='$pay_type_cancel_reason',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `pay_cancel_id_pk`='$edit_id'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        // $sql1 = "UPDATE `exp_advance_payment` 
        // SET`adv_pay_cancel_status`= '1' where `id_pk` = '$adv_pay_id_fk'";
        //     $res1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
        //     if($res1)
        //     {
        //         echo "1";
        //     }
        //     else
        //     {
        //         echo "0";
        //     }
        echo "1";
    }
    else
    {
        echo "0";
    }
?>