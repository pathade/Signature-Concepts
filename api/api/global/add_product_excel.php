<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $insert_count = 0;
    $duplicate_count = 0;

    //convert json to array
    $product_array = json_decode($product_array, true);
    //print_r($newRawItemArray);
    
     $flag= $_SESSION['flag'];

    $length = count($product_array);
    for($i = 0;$i<$length;$i++)
    {
        //echo "iddd:"+$array[$i]['id']; 
        $category = $product_array[$i]['category'];
        $Supplier_Name =  $product_array[$i]['Supplier_Name'];
        $Sc_Code =  $product_array[$i]['Sc_Code']; 
        $Supplier_Design_Code =  $product_array[$i]['Supplier_Design_Code'];
        $Size =  $product_array[$i]['Size'];
        $PCS_BOX =  $product_array[$i]['PCS/BOX'];
        $HSN_Code =  $product_array[$i]['HSN_Code'];
        $GST =  $product_array[$i]['GST'];

        //query for getting supplier id
        
        // if($flag== '0')
        // {
        //     $sup_sql = "SELECT * FROM `mstr_supplier` WHERE name like '%$Supplier_Name%' WHERE ";
        //     $sup_res = mysqli_query($db,$sup_sql);
        // }
        // else
        // {
         
        // }
        
        
        if(mysqli_num_rows($sup_res) > 0)
        {
            while($sup_row = mysqli_fetch_array($sup_res))
            {
                $supp_id_pk = $sup_row['supplier_id_fk'];
                $supplier_id = $supp_id_pk;
            }
        }
        else
        {
            $save_supp = "INSERT INTO `mstr_supplier`(`name`, `add_date`, `add_time`, `added_by`,`flag`) 
            VALUES 
            ('$Supplier_Name','$cur_date','$cur_time','excel','$flag')";

            $save_res = mysqli_query($db,$save_supp);
            $last_id = mysqli_insert_id($db);
            $supplier_id = $last_id;
        }
        
        $f_product_code = $Sc_Code ."-". $Supplier_Design_Code .'-'. $Size;

        $ch_sql = "SELECT * FROM mstr_item WHERE item_type='$category' AND hsn='$HSN_Code' AND nks_code='$Sc_Code' 
        AND design_code='$Supplier_Design_Code' AND final_product_code='$f_product_code' AND size='$Size'";

        $jres = mysqli_query($db,$ch_sql);
        if(mysqli_num_rows($jres) > 0)
        {
            $duplicate_count = $duplicate_count + 1;
        }
        else
        {
            $insert_count = $insert_count + 1;
            $sql = "INSERT INTO `mstr_item`(`item_type`, `hsn`, `nks_code`, `design_code`, `final_product_code`, `size`, `pcs`, 
            `gst_group`, `add_date`, `add_time`, `added_by`, `supplier_id_fk`) 
            VALUES ('$category','$HSN_Code','$Sc_Code','$Supplier_Design_Code','$f_product_code','$Size','$PCS_BOX'
            ,'$GST','$cur_date','$cur_time','excel','$supplier_id')";
            $res = mysqli_query($db,$sql) or die(mysqli_error($db));
            if($res == 1)
            {
                $flag_ok = "1";
            }
            else
            {
                $flag_ok = "0";
            }

        }
    }
    if($duplicate_count == 0)
    {
        echo $flag_ok;
    }
    else if($duplicate_count != 0) 
    {
        echo "duplicate"."#".$duplicate_count."#".$insert_count;
    }
    else
    {
        echo "error";
    }
    
?>