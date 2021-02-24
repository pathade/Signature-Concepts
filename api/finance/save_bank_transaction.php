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

    $first = date("y",strtotime("-1 year"));
    $second = date("y");

    $bt_no1 = $first."-".$second."/".$bt_no;
    
    if($flag == 0) {
   $sql = "INSERT INTO `fin_bank_transaction`(`type`, `mode`, `bank_name`, `account_no`, `date`,
    `trans_no`, `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,`cheque_date`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
    '$mode','$bank_name1','$account_no1', '$date1', '$trans_no' ,'$amount' ,'$particular_party' ,
    '$remark' ,'$bt_no1' , '$cheque_no', '$cheque_date',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
         $sql = "INSERT INTO `fin_bank_transaction`(`type`, `mode`, `bank_name`, `account_no`, `date`,
    `trans_no`, `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,`cheque_date`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
    '$mode','$bank_name1','$account_no1', '$date1', '$trans_no' ,'$amount' ,'$particular_party' ,
    '$remark' ,'$bt_no1' , '$cheque_no', '$cheque_date',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {

        $sno=$bt_no+1;
        if($flag == 0) {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='fin_bank_transaction' AND flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='fin_bank_transaction' AND flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>