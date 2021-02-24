<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');


   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

     $sql = "UPDATE `exp_payment_advice_cancellation` 
    SET`fin_yr`= '$fin_yr', `branch`='$branch',`pay_advice_id_fk`='$pay_advice_id_fk',
    `remark`='$remark',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `epa_id_pk`='$edit_id'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        $sql1 = "UPDATE `exp_pay_advice` 
        SET`cancel_status`= 1,
        `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `pa_id_pk`='$pay_advice_id_fk'";
            $res1 = mysqli_query($db,$sql1);
            
        echo "1";
    }
    else
    {
        echo "0";
    }
?>