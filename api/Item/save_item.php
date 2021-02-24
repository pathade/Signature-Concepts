<?php
    session_start(); 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    
    // check if product code exist
    $check_product = "SELECT * FROM mstr_item WHERE final_product_code='$final_product'";
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

    $flag=$_SESSION['flag'];

    if($filename == null && $tmp_name == null)
    {
        if($flag==0)
        {
            $sql = "INSERT INTO `mstr_item`( `item_type`, `hsn`, `nks_code`, `design_code`, `final_product_code`, `size`,`pcs`, `uom`, `gst_group`, `sale_rate`, `purchase_rate`, `add_date`, `add_time`, `added_by`,`delete_status`,`supplier_id_fk`, `discount_lock`, `flag`)    
            VALUES ('$item_type','$hsn_code','$sc_code','$supply_design_code','$final_product','$size','$pcs_box','$uom','$gst_group','$sale_rate','$purchase_rate','$cur_date','$cur_time','admin@gmail.com','$status','$supplier_name','$disc_lock', '$flag')";
        }
        else {
              $sql = "INSERT INTO `mstr_item`( `item_type`, `hsn`, `nks_code`, `design_code`, `final_product_code`, `size`,`pcs`, `uom`, `gst_group`, `sale_rate`, `purchase_rate`, `add_date`, `add_time`, `added_by`,`delete_status`,`supplier_id_fk`, `discount_lock`, `flag`)    
            VALUES ('$item_type','$hsn_code','$sc_code','$supply_design_code','$final_product','$size','$pcs_box','$uom','$gst_group','$sale_rate','$purchase_rate','$cur_date','$cur_time','admin@gmail.com','$status','$supplier_name','$disc_lock', '$flag')";
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

        // if($flag==0)
        // {
        $sql = "INSERT INTO `mstr_item`( `item_type`, `hsn`, `nks_code`, `design_code`, `final_product_code`, `size`,`pcs`, `uom`, `gst_group`, `sale_rate`, `purchase_rate`, `add_date`, `add_time`, `added_by`,`delete_status`,`supplier_id_fk`, `product_image`, `discount_lock`, `flag`) 
        VALUES ('$item_type','$hsn_code','$sc_code','$supply_design_code','$final_product','$size','$pcs_box','$uom','$gst_group','$sale_rate','$purchase_rate','$cur_date','$cur_time','admin@gmail.com','$status','$supplier_name','$folder','$disc_lock', '$flag')";
        // }
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