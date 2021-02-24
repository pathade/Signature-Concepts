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
    
    if($flag == 0) {
        $sql = "INSERT INTO `fin_payment_advice_cancellation`(`fin_yr`, `dde_no`, `reason`, `pac_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$fin_yr',
        '$dde_no','$reason','$pac_no1',
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
         $sql = "INSERT INTO `fin_payment_advice_cancellation`(`fin_yr`, `dde_no`, `reason`, `pac_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$fin_yr',
        '$dde_no','$reason','$pac_no1',
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        if($flag == 0) {
          $update = "UPDATE fin_payment_advice SET status = 1 WHERE id_pk='$dde_no' AND flag='0' ";
        }
        else {
            $update = "UPDATE fin_payment_advice SET status = 1 WHERE id_pk='$dde_no' AND flag='1' ";
          }
          $res_update = mysqli_query($db, $update) or die(mysqli_error($db));

        $sno=$pac_no+1;
        if($flag == 0) {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='fin_pay_advice_cancel' AND flag='0' ";
        }
         else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='fin_pay_advice_cancel' AND flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>