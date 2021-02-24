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

    $sc_no1 = $first."-".$second."/".$sc_no;
    
    if($flag == 0) {
        $sql = "INSERT INTO `fin_skip_cheque`(`bank_name`, `account_no`, `cheque_no`, `authorised_by`, `remark`,
        `sc_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$account_no1',
        '$account_no1','$cheque_no1','$authorised_by', '$remark', '$sc_no1' ,
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
        $sql = "INSERT INTO `fin_skip_cheque`(`bank_name`, `account_no`, `cheque_no`, `authorised_by`, `remark`,
        `sc_no`,
        `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$account_no1',
        '$account_no1','$cheque_no1','$authorised_by', '$remark', '$sc_no1' ,
        '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {

        $sno=$sc_no+1;
        if($flag == 0) {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='fin_skip_cheque' AND flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='fin_skip_cheque' AND flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>