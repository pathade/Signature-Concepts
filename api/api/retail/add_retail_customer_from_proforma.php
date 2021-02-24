<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $date1 = date("d-m-Y", strtotime($date));

    $flag=$_SESSION['flag'];
    if($flag==0)
    {
        $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
        `retail_cust_address`, `retail_cust_mobile`, `gst_no`, `flag`)
        VALUES ('$name','$address','$mobile_no','$gst_no', '$flag')";

        $res = mysqli_query($db,$sql) or die(mysqli_error($db));    
    }
    else
    {
        $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
        `retail_cust_address`, `retail_cust_mobile`, `gst_no`, `flag`)
        VALUES ('$name','$address','$mobile_no','$gst_no', '$flag')";

        $res = mysqli_query($db,$sql) or die(mysqli_error($db));    
    }

    // $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
    // `retail_cust_address`, `retail_cust_mobile`, `gst_no`)
    //  VALUES ('$name','$address','$mobile_no','$gst_no')";

    // $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    echo  $last_id = mysqli_insert_id($db);
       
?>