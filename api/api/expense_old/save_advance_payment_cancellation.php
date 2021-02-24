<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    
    $sql = "INSERT INTO `exp_advance_payment_cancellation`(`type`, `branch`, `adv_pay_id_fk`, `amount`, `vendor_id_fk`,
    `pay_type_cancel_reason`,`apc_no`,
    `add_date`, `add_time`,`added_by`) VALUES ('$type',
    '$branch','$adv_pay_id_fk','$amount', '$vendor_id_fk', '$pay_type_cancel_reason' ,'$apc_no',
    '$cur_date','$cur_time','admin@gmail.com')";
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
        $sno=$apc_no+1;
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_advance_pay_cancel' ";
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>