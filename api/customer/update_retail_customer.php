<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    
    if(isset($igst))
        $igst_app = 1;
    else
        $igst_app = 0;

    $sql = "UPDATE `mstr_retail_customer` SET `retail_cust_name`='$name',`retail_cust_address`='$address',`retail_cust_phone`='$phone_no',`retail_cust_mobile`='$mobile_no',`retail_cust_email`='$email',`retail_cust_balance`='$leadger_balance',`igst_app`='$igst_app',`gst_no`='$gst_no',`status`='$status',`add_date`=null,`add_time`=null,`added_by`=null,`update_date`=null,`update_time`=null,`updated_by`=null WHERE retail_cust_idpk='$retail_id'";

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