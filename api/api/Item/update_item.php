<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    session_start(); 
    $flag=$_SESSION['flag'];

    // check if product code exist
    $check_product = "SELECT * FROM mstr_item WHERE final_product_code='$final_product' AND item_id_pk!='$p_id'";
    $check_rows = mysqli_num_rows(mysqli_query($db, $check_product));
    if($check_rows > 0)
    {
        echo "exists";
        return;
    }
    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $photo = $_FILES['upload_photo'];

    $filename = $photo['name'];
    $tmp_name = $photo['tmp_name'];
    $folder = '../../product_images/';

    if($filename == null && $tmp_name == null)
    {
  
        if($flag == 0) {
        $sql = "UPDATE `mstr_item` SET `item_type`='$item_type',`hsn`='$hsn_code',
        `nks_code`='$sc_code',`design_code`='$supply_design_code',`final_product_code`='$final_product',`size`='$size',`pcs`='$pcs_box',`uom`='$uom',`gst_group`='$gst_group',`sale_rate`='$sale_rate',
        `purchase_rate`='$purchase_rate',`update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
        `supplier_id_fk`='$supplier_name', `delete_status`='$status', `discount_lock`='$disc_lock' WHERE `item_id_pk`='$p_id' and `flag`='$flag' ";
        }
        else {
             $sql = "UPDATE `mstr_item` SET `item_type`='$item_type',`hsn`='$hsn_code',
        `nks_code`='$sc_code',`design_code`='$supply_design_code',`final_product_code`='$final_product',`size`='$size',`pcs`='$pcs_box',`uom`='$uom',`gst_group`='$gst_group',`sale_rate`='$sale_rate',
        `purchase_rate`='$purchase_rate',`update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
        `supplier_id_fk`='$supplier_name', `delete_status`='$status', `discount_lock`='$disc_lock' WHERE `item_id_pk`='$p_id' and `flag`='$flag' ";
        }

        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        if($res)
        {
            echo "1";
            return;
        }
        else
        {
            echo "0";
            return;
        }
    }

    $valid_ext = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    

    if(in_array($ext, $valid_ext))
    {
        move_uploaded_file($tmp_name, $folder.$filename);
        $folder .= $filename;
        if($flag == 0) {
        $sql = "UPDATE `mstr_item` SET `item_type`='$item_type',`hsn`='$hsn_code',
        `nks_code`='$sc_code',`design_code`='$supply_design_code',`final_product_code`='$final_product',`size`='$size',`pcs`='$pcs_box',`uom`='$uom',`gst_group`='$gst_group',`sale_rate`='$sale_rate',
        `purchase_rate`='$purchase_rate',`update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
        `supplier_id_fk`='$supplier_name', `delete_status`='$status', `product_image`='$folder', `discount_lock`='$disc_lock' 
        WHERE `item_id_pk`='$p_id' and `flag`='$flag' ";
        }
        else {
            $sql = "UPDATE `mstr_item` SET `item_type`='$item_type',`hsn`='$hsn_code',
        `nks_code`='$sc_code',`design_code`='$supply_design_code',`final_product_code`='$final_product',`size`='$size',`pcs`='$pcs_box',`uom`='$uom',`gst_group`='$gst_group',`sale_rate`='$sale_rate',
        `purchase_rate`='$purchase_rate',`update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
        `supplier_id_fk`='$supplier_name', `delete_status`='$status', `product_image`='$folder', `discount_lock`='$disc_lock' 
        WHERE `item_id_pk`='$p_id' and `flag`='$flag' ";
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
    }
    else {
        echo "invalid_image";
    }



?>