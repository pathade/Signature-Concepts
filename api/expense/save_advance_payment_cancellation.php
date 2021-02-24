<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $flag = $_SESSION['flag'];
    $sql= '';

    $first = date("y",strtotime("-1 year"));
    $second = date("y");

    $apc_no1 = $first."-".$second."/".$apc_no;
    if ($flag == 0) 
    {
        $sql = "INSERT INTO `exp_advance_payment_cancellation`(`type`, `branch`, `adv_pay_id_fk`, `amount`, `vendor_id_fk`,
        `pay_type_cancel_reason`,`apc_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
        '$branch','$adv_pay_id_fk','$amount', '$vendor_id_fk', '$pay_type_cancel_reason' ,'$apc_no',
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
        $sql = "INSERT INTO `exp_advance_payment_cancellation`(`type`, `branch`, `adv_pay_id_fk`, `amount`, `vendor_id_fk`,
        `pay_type_cancel_reason`,`apc_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
        '$branch','$adv_pay_id_fk','$amount', '$vendor_id_fk', '$pay_type_cancel_reason' ,'$apc_no',
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        if($flag == 0) {
        $sql1 = "UPDATE `exp_advance_payment` 
        SET`del_status`= '1',
        `update_date`='$cur_date',`update_time`='$cur_time',
        `updated_by`='admin@gmail.com' WHERE `id_pk`='$adv_pay_id_fk' AND flag='0' ";
        }
        else {
            $sql1 = "UPDATE `exp_advance_payment` 
        SET`del_status`= '1',
        `update_date`='$cur_date',`update_time`='$cur_time',
        `updated_by`='admin@gmail.com' WHERE `id_pk`='$adv_pay_id_fk' AND flag='1' ";
        }
            $res1 = mysqli_query($db,$sql1);
        // $sql1 = "UPDATE `exp_advance_payment` 
        // SET`adv_pay_cancel_status`= '1' where `id_pk` = '$adv_pay_id_fk'";
            $res1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
            if($res1)
            {
                //echo "1";
                $sno=$apc_no+1;
                if($flag == 0) {
                $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_advance_pay_cancel' AND flag='0' ";
                }
                else {
                    $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_advance_pay_cancel' AND flag='1' "; 
                }
                $res = mysqli_query($db,$sql12);
                echo "1";
            }
            else
            {
                echo "0";
            }
        
      }
      else
      {
          echo "0";
      }
 
?>