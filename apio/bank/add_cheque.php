<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    $flag=$_SESSION['flag'];

    if($flag==0){

     $sql ="INSERT INTO `mstr_cheque`(`bank_id_fk`,`account_no`,`from_series`, `to_series`, `status`,`current_cheque_no`,`add_date`, `add_time`, `added_by`,`flag`) 
    VALUES ('$bank_name','$account_no','$from_series','$to_series','InComplete','$from_series','$cur_date','$cur_time','admin@gmail.com',$flag)";

    }
    else {
         $sql ="INSERT INTO `mstr_cheque`(`bank_id_fk`,`account_no`,`from_series`, `to_series`, `status`,`current_cheque_no`,`add_date`, `add_time`, `added_by`,`flag`) 
    VALUES ('$bank_name','$account_no','$from_series','$to_series','InComplete','$from_series','$cur_date','$cur_time','admin@gmail.com',$flag)";
    }
    $res = mysqli_query($db,$sql);
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        echo "1";
    }
    else{
        echo "0";
    }
?>