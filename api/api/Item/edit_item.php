<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST); 

    session_start();
    $flag = $_SESSION['flag'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $edit_id = $_POST['edit_id'];

    
    if($flag == 0) {
    $sql = "UPDATE `mstr_item` SET `item_type`='$item_type',`hsn`='$HSN',
            `uom`='$uom',
            `gst_group`='$gst_group',`sale_rate`='$sale_rate',`purchase_rate`='$purchase_rate',
            `update_date`='$cur_date',`update_time`='$cur_time',`item_name`='$item_name',
            `updated_by`='admin@gmail.com',`cust_id_fk`='$item_type' WHERE `item_id_pk`='$edit_id' and flag='0' ";
    }
    else {
        $sql = "UPDATE `mstr_item` SET `item_type`='$item_type',`hsn`='$HSN',
            `uom`='$uom',
            `gst_group`='$gst_group',`sale_rate`='$sale_rate',`purchase_rate`='$purchase_rate',
            `update_date`='$cur_date',`update_time`='$cur_time',`item_name`='$item_name',
            `updated_by`='admin@gmail.com',`cust_id_fk`='$item_type' WHERE `item_id_pk`='$edit_id' and flag='1' ";
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