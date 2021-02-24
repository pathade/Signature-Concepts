<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    session_start();
    $flag=$_SESSION['flag'];

    if(isset($igst_app))
        $igst = 1;
    else
        $igst = 0;
    
    if($flag== 0) {
    $sql = "UPDATE `mstr_supplier` SET `name`='$supplier_name',
    `address`='$supplier_address',`phone_1`='$phone_no_1',`phone_2`='$phone_no_2',`mobile_no`='$mobile_no',
    `contact_person`='$contact_person',`email`='$email',`pan`='$pan',`gst_no`='$gst_no',
    `status`='$status',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
    `igst_app`='$igst' WHERE `supplier_id_fk`='$edit_id' and `flag`='$flag' ";
    }
    else {
        $sql = "UPDATE `mstr_supplier` SET `name`='$supplier_name',
    `address`='$supplier_address',`phone_1`='$phone_no_1',`phone_2`='$phone_no_2',`mobile_no`='$mobile_no',
    `contact_person`='$contact_person',`email`='$email',`pan`='$pan',`gst_no`='$gst_no',
    `status`='$status',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
    `igst_app`='$igst' WHERE `supplier_id_fk`='$edit_id' and `flag`='$flag' ";
    }

    $res = mysqli_query($db,$sql);

    if($res == 1)
    {
        
        echo "1";
    }
    else{
        echo "0";
    }
?>