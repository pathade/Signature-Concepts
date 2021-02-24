<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $sql = "UPDATE `mstr_bank` SET `account_no`='$account_no', `bank_name`='$bank_name', `bank_address`='$bank_address', `phone_1`='$phone_no1', `phone_2`='$phone_no2', `ifsc_code`='$ifsc_code', `status`='$status', `add_date`=null,`add_time`=null,`added_by`=null,`update_date`=null,`update_time`=null,`updated_by`=null WHERE bank_idpk='$bank_id'";

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