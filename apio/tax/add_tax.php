<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $effective_date1 = date("d-m-Y", strtotime($effective_date));
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "INSERT INTO `mstr_tax`(`tax_name`, `tax_percentagfe`,`remark`, `add_date`, `add_time`, `added_by`, 
    `effective_date`,`active_status`,`flag`) 
    VALUES ('$tax_name','$tax_percentage','$remark','$cur_date','$cur_time','admin@gmail.com','$effective_date1','$status','$flag')";
    }
    else {
        $sql = "INSERT INTO `mstr_tax`(`tax_name`, `tax_percentagfe`,`remark`, `add_date`, `add_time`, `added_by`, 
    `effective_date`,`active_status`,`flag`) 
    VALUES ('$tax_name','$tax_percentage','$remark','$cur_date','$cur_time','admin@gmail.com','$effective_date1','$status','$flag')";
    }

    $res = mysqli_query($db,$sql);
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
?>