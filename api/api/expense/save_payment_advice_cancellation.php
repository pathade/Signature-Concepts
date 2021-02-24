<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    $first = date("y",strtotime("-1 year"));
    $second = date("y");

    $pac_no1 = $first."-".$second."/".$pac_no;
    if ($flag == 0) 
    {
        $sql = "INSERT INTO `exp_payment_advice_cancellation`(`fin_yr`, `branch`, `pay_advice_id_fk`,
        `remark`,`pac_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$fin_yr',
        '$branch','$pay_advice_id_fk', '$remark' ,'$pac_no1',
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
         $sql = "INSERT INTO `exp_payment_advice_cancellation`(`fin_yr`, `branch`, `pay_advice_id_fk`,
        `remark`,`pac_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$fin_yr',
        '$branch','$pay_advice_id_fk', '$remark' ,'$pac_no1',
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        if ($flag == 0) 
        {
        $sql1 = "UPDATE `exp_pay_advice` 
        SET`cancel_status`= 1,
        `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `pa_id_pk`='$pay_advice_id_fk' and flag='0' ";
        }
        else {
            $sql1 = "UPDATE `exp_pay_advice` 
        SET`cancel_status`= 1,
        `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `pa_id_pk`='$pay_advice_id_fk' and flag='1' ";
        }
            $res1 = mysqli_query($db,$sql1);
            
        $sno=$pac_no+1;
        if ($flag == 0) 
        {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_pay_advice_cancel' and flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_pay_advice_cancel' and flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>