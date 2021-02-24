<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag= $_SESSION['flag'];
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $insert_count = 0;
    $duplicate_count = 0;

    //convert json to array
    $product_array = json_decode($product_array, true);
    //print_r($newRawItemArray);

    $length = count($product_array);
    for($i = 0;$i<$length;$i++)
    {
        //echo "iddd:"+$array[$i]['id']; 
        $cust_name = $product_array[$i]['cust_name'];
        $purchase_name =  $product_array[$i]['purchase_name'];
        $office_aadress =  $product_array[$i]['office_aadress']; 
        $mob_no =  $product_array[$i]['mob_no'];
        $purhase_mail_id =  $product_array[$i]['purhase_mail_id'];
        $Pan =  $product_array[$i]['Pan'];
        $active_status =  $product_array[$i]['active_status'];
        $sales_executive =  $product_array[$i]['sales_executive'];
        $GSTno =  $product_array[$i]['GSTno'];
        $site_name =  $product_array[$i]['site_name'];
        $site_address =  $product_array[$i]['site_address'];
        $site_landline =  $product_array[$i]['site_landline'];
        $site_person_name =  $product_array[$i]['site_person_name'];
        $account_person_name =  $product_array[$i]['account_person_name'];
        $account_landline_number =  $product_array[$i]['account_landline_number'];

        

        //query for getting supplier id
        $sup_sql = "SELECT * FROM `mstr_employee` WHERE emp_name like '%$sales_executive%' AND flag='$flag'";
        $sup_res = mysqli_query($db,$sup_sql);
        if(mysqli_num_rows($sup_res) > 0)
        {
            while($sup_row = mysqli_fetch_array($sup_res))
            {
                $emp_id_pk = $sup_row['emp_id_pk'];
                $emp_id_pk = $emp_id_pk;
            }
        }
        else
        {
            $save_supp = "INSERT INTO `mstr_employee`(`emp_name`,`flag`) VALUES ('$sales_executive','$flag')";
            // $save_supp = "INSERT INTO `mstr_supplier`(`name`, `add_date`, `add_time`, `added_by`) 
            // VALUES 
            // ('$Supplier_Name','$cur_date','$cur_time','excel')";

            $save_res = mysqli_query($db,$save_supp);
            $last_id = mysqli_insert_id($db);
            $emp_id_pk = $last_id;
        }
        
        //$f_product_code = $Sc_Code ."-". $Supplier_Design_Code .'-'. $Size;

        $ch_sql = "SELECT * FROM tbl_wholesale_customer WHERE cust_name='$cust_name' AND gst_no='$GSTno'";

        $jres = mysqli_query($db,$ch_sql);
        if(mysqli_num_rows($jres) > 0)
        {
            $duplicate_count = $duplicate_count + 1;
        }
        else
        {
            $insert_count = $insert_count + 1;
            echo $sql = "INSERT INTO `tbl_wholesale_customer`(`cust_name`, `purchase_name`, `office_address`, 
            `mob_number`, `purchase_mail_id`, `pan`, 
            `active_status`, `sales_executive`, `igst_app`, `gst_no`,`flag`) 
            VALUES ('$cust_name','$purchase_name','$office_aadress','$mob_no','$purhase_mail_id','$Pan',
            '$active_status','$emp_id_pk','0','$GSTno','$flag')";

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