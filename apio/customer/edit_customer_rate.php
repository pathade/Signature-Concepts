<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST); 

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $edit_id = $_POST['edit_id'];

    

    $sql = "UPDATE `mstr_customer_rate` SET `cust_id_fk`='$customer_id',
            `item_id_fk`='$item',
            `rate`='$rate',
            `update_date`='$cur_date',`update_time`='$cur_time',
            `updated_by`='admin@gmail.com' WHERE `customer_rate_id_pk`='$edit_id'";

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