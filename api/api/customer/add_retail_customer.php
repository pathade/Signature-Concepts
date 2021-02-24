<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    session_start();

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $flag=$_SESSION['flag'];
    
    if(isset($igst))
        $igst_app = 1;
    else
        $igst_app = 0;

        if($flag==0){

    $sql = "INSERT INTO `mstr_retail_customer`
    (`retail_cust_name`, `retail_cust_address`, `retail_cust_phone`, `retail_cust_mobile`, `retail_cust_email`,
    `retail_cust_balance`, `igst_app`, `gst_no`, `status`, `add_date`, `add_time`, `added_by`, `update_date`,
    `update_time`, `updated_by`,`flag`) VALUES ('$name','$address','$phone_no','$mobile_no','$email',
    '$leadger_balance','$igst_app','$gst_no','$status',null,null,null,null,null,null,'$flag')";
        }
        else {
            $sql = "INSERT INTO `mstr_retail_customer`
    (`retail_cust_name`, `retail_cust_address`, `retail_cust_phone`, `retail_cust_mobile`, `retail_cust_email`,
    `retail_cust_balance`, `igst_app`, `gst_no`, `status`, `add_date`, `add_time`, `added_by`, `update_date`,
    `update_time`, `updated_by`,`flag`) VALUES ('$name','$address','$phone_no','$mobile_no','$email',
    '$leadger_balance','$igst_app','$gst_no','$status',null,null,null,null,null,null,'$flag')";
        }
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }

?>