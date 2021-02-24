<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $length="";$width=""; $transporter="";
    $s_add = '';
    $smobile_no = 0;
    $po_item_save_flag_ok = 0;
    $work_order_item_save_flag = 0;
    $date1 = date("d-m-Y", strtotime($date));

    $flag = $_SESSION['flag'];

    //$work_order_item_save_flag = 0;
    //echo "cust is:".$customer;
    if(is_int($customer) == true)
    {
        //is_int($page) == false
        echo "hiii";
        $customer_id = $customer;
    }
    else
    {
        //echo "buyeeee";
        if($flag==0)
        {
            $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
            `retail_cust_address`, `retail_cust_mobile`, `gst_no`, `flag`)
            VALUES ('$customer_name123','$address','$mobile_no','$gst_no', '$flag')";
    
            $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        }
        else
        {
            $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
            `retail_cust_address`, `retail_cust_mobile`, `gst_no`, `flag`)
            VALUES ('$customer_name123','$address','$mobile_no','$gst_no', '$flag')";
    
            $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        }

        // $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
        // `retail_cust_address`, `retail_cust_mobile`, `gst_no`)
        //  VALUES ('$customer_name123','$address','$mobile_no','$gst_no')";
    
        // $res = mysqli_query($db,$sql) or die(mysqli_error($db));
         $last_id_c = mysqli_insert_id($db);
        $customer_id = $last_id_c;
    }

    if($flag==0)
    {
        $sql = "INSERT INTO `retail_proforma`(`branch`, `order_no`, `customer`, `mobile_no`, `address`, 
    `gst_no`, `salesman`, `remark`, `date`, `qty`, `sqfit`, `gross_amt`, `total`, `discount_per`, 
    `discount_rs`, `others`, `process_amt`, `net_amt`, `payment_mode`, `ch_no`, `ch_date`, `advance_amt`, `balance_amt`, `flag`) 
    VALUES ('$branch','$order_no','$customer_id','$mobile_no','$address','$gst_no','$saleman',
    '$remark','$date1','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final'
    ,'$adjustment_final','$process_amount','$final_total','$payment_mode','$advance_cheque_no','$advance_cheque_date','$advance_amt','$balance_amt', '$flag')";

     $res = mysqli_query($db,$sql) or die(mysqli_error($db));    
    }
    else
    {
        $sql = "INSERT INTO `retail_proforma`(`branch`, `order_no`, `customer`, `mobile_no`, `address`, 
    `gst_no`, `salesman`, `remark`, `date`, `qty`, `sqfit`, `gross_amt`, `total`, `discount_per`, 
    `discount_rs`, `others`, `process_amt`, `net_amt`, `payment_mode`, `ch_no`, `ch_date`, `advance_amt`, `balance_amt`, `flag`) 
    VALUES ('$branch','$order_no','$customer_id','$mobile_no','$address',0,'$saleman',
    '$remark','$date1','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final'
    ,'$adjustment_final','$process_amount','$final_total','$payment_mode','$advance_cheque_no','$advance_cheque_date','$advance_amt','$balance_amt', '$flag')";

     $res = mysqli_query($db,$sql) or die(mysqli_error($db));    
    }

    // $sql = "INSERT INTO `retail_proforma`(`branch`, `order_no`, `customer`, `mobile_no`, `address`, 
    // `gst_no`, `salesman`, `remark`, `date`, `qty`, `sqfit`, `gross_amt`, `total`, `discount_per`, 
    // `discount_rs`, `others`, `process_amt`, `net_amt`, `payment_mode`, `ch_no`, `ch_date`, `advance_amt`, `balance_amt`) 
    // VALUES ('$branch','$order_no','$customer_id','$mobile_no','$address','$gst_no','$saleman',
    // '$remark','$date1','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final'
    // ,'$adjustment_final','$process_amount','$final_total','$payment_mode','$advance_cheque_no','$advance_cheque_date','$advance_amt','$balance_amt')";

    //  $res = mysqli_query($db,$sql) or die(mysqli_error($db));
     $last_id = mysqli_insert_id($db);
    //echo "\n";
    $select_data_series = "SELECT * FROM mstr_data_series WHERE name='retail_proforma'";
    $res_ds = mysqli_query($db,$select_data_series) or die(mysqli_error($db));
    while($drw = mysqli_fetch_array($res_ds))
    {
        $sr_no123 = $drw['sr_no'];
    }
    $sr_no= substr($sr_no123, 6);
    $update_no123 = (int)$sr_no123 + (int)1;
    $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no123' WHERE name='retail_proforma'";
    $update_res = mysqli_query($db,$data_series_update_sql) or die(mysqli_error($db));
        
    //Query for insert data to purchase order
         
    //echo "*********";
    $length1 = count($newRawItemArray1);
    //echo "*********";
    for($j = 0;$j<$length1;$j++)
    {   
        //echo "jjj is:".$j;echo "\n";
        $prodect_category = $newRawItemArray1[$j]['prodect_category'];
        $item_id_fk = $newRawItemArray1[$j]['item_id_fk'];
        $size =  $newRawItemArray1[$j]['size'];
        $quantity =  $newRawItemArray1[$j]['quantity'];
        $sqrft =  $newRawItemArray1[$j]['sqrft'];
        $rate =  $newRawItemArray1[$j]['rate'];
        $discount_per =  $newRawItemArray1[$j]['discount_per'];
        $discount_rs =  $newRawItemArray1[$j]['discount_rs'];
        $amount =  $newRawItemArray1[$j]['amount'];
        $remark1 =  $newRawItemArray1[$j]['remark'];
        //$process1 =  $newRawItemArray1[$j]['process1'];
        $checkbox_val =  $newRawItemArray1[$j]['checkbox_val'];
        //$poamt =  $newRawItemArray1[$j]['poamt'];
        $posupp =  $newRawItemArray1[$j]['posupp'];
        $pono_tbl =  $newRawItemArray1[$j]['pono_tbl'];

        /////////////////////////////////////////////
        if($checkbox_val == "po_yes")
        {
            //query for checking po no exist or not
            $poexist_sql = "SELECT * FROM purchase_order WHERE purchase_order_no='$pono_tbl'";
            $poexist_res = mysqli_query($db,$poexist_sql) or die(mysqli_error($db));
            if(mysqli_num_rows($poexist_res)>0)
            {
                //echo exist
                while($porwww = mysqli_fetch_array($poexist_res))
                {
                    $po_last_id = $porwww['id'];
                }
            }
            else
            {
                //not exist
                $s_select = "SELECT * FROM `mstr_supplier` WHERE supplier_id_fk='$posupp'";
                $pselect_sql_res = mysqli_query($db,$s_select) or die(mysqli_error($db));
                while($s_row = mysqli_fetch_array($pselect_sql_res))
                {
                    $smobile_no = $s_row['mobile_no'];
                    $s_add = $s_row['address'];
                
                }

                if($flag==0)
                {
                    $posql = "INSERT INTO `purchase_order`(`date`,`branch`,`purchase_order_no`, 
                    `supplier_id_fk`, `mobile_no`, `retail_proforma_no`, `address`, `remark`, `sub_total`, 
                    `discount_rs`, `adjustment`, `total`, `process_amount`,`status`, `add_time`, 
                    `added_by`, `flag`) 
                    VALUES ('$cur_date','$branch','$pono_tbl','$posupp','$smobile_no','$last_id',
                    '$s_add','$remark','$total','$discount_final','$adjustment_final','$final_total',
                    '$process_amount','0','$cur_time','admin@gmail.com', '$flag')";

                    $po_save_res = mysqli_query($db,$posql) or die(mysqli_error($db));
                }
                else
                {
                    $posql = "INSERT INTO `purchase_order`(`date`,`branch`,`purchase_order_no`, 
                    `supplier_id_fk`, `mobile_no`, `retail_proforma_no`, `address`, `remark`, `sub_total`, 
                    `discount_rs`, `adjustment`, `total`, `process_amount`,`status`, `add_time`, 
                    `added_by`, `flag`) 
                    VALUES ('$cur_date','$branch','$pono_tbl','$posupp','$smobile_no','$last_id',
                    '$s_add','$remark','$total','$discount_final','$adjustment_final','$final_total',
                    '$process_amount','0','$cur_time','admin@gmail.com', '$flag')";

                    $po_save_res = mysqli_query($db,$posql) or die(mysqli_error($db));
                }

                // $posql = "INSERT INTO `purchase_order`(`date`,`branch`,`purchase_order_no`, 
                // `supplier_id_fk`, `mobile_no`, `retail_proforma_no`, `address`, `remark`, `sub_total`, 
                // `discount_rs`, `adjustment`, `total`, `process_amount`,`status`, `add_time`, 
                // `added_by`) 
                // VALUES ('$cur_date','$branch','$pono_tbl','$posupp','$smobile_no','$last_id',
                // '$s_add','$remark','$total','$discount_final','$adjustment_final','$final_total',
                // '$process_amount','0','$cur_time','admin@gmail.com')";

                // $po_save_res = mysqli_query($db,$posql) or die(mysqli_error($db));
                $po_last_id = mysqli_insert_id($db);
                
                //update purchase order data series
                $srnofinal = substr($pono_tbl,6) + 1;
                $u_po_data_sql = "UPDATE mstr_data_series SET sr_no='$srnofinal' WHERE name='purchase_order'";
                $pods_res = mysqli_query($db,$u_po_data_sql);


            }
            //////////////////////////////////////////////
            $sql_fetch_design_code = "SELECT * FROM mstr_item WHERE item_id_pk='$item_id_fk'";
            $res_fetch_design_code = mysqli_query($db,$sql_fetch_design_code) or die(mysqli_error($db));
            while($f_d_row = mysqli_fetch_array($res_fetch_design_code))
            {
                $fetch_design_code = $f_d_row['final_product_code'];
            }

            $po_order_item_save_sql = "INSERT INTO `purchase_order_items`( 
            `purchase_order_id_fk`, `item_id_fk`, `design_code`, `size`, 
            `quantity`, `sqrft`, `rate`, `amount`, `discount_per`, `discount_rs`,`remark`, `status`) 
            VALUES ('$po_last_id','$item_id_fk','$fetch_design_code','$size','$quantity','$sqrft'
            ,'$rate','$amount','$discount_per','$discount_rs','$remark1','0')";

            $res1_po= mysqli_query($db,$po_order_item_save_sql) or die(mysqli_error($db));
            if($res1_po == 1)
            {
                $po_item_save_flag_ok = "1";
            }
            else
            {
                $po_item_save_flag_ok = "0";
            }
        }
    }
    if($res == 1)
    {

        $sql = "INSERT INTO `retail_proforma`(`branch`, `order_no`, `customer`, `mobile_no`, `address`, 
    `gst_no`, `salesman`, `remark`, `date`, `qty`, `sqfit`, `gross_amt`, `total`, `discount_per`, 
    `discount_rs`, `others`, `process_amt`, `net_amt`, `payment_mode`, `ch_no`, `ch_date`, `advance_amt`, `balance_amt`, `flag`) 
    VALUES ('$branch','$order_no','$customer_id','$mobile_no','$address','$gst_no','$saleman',
    '$remark','$date1','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final'
    ,'$adjustment_final','$process_amount','$final_total','$payment_mode','$advance_cheque_no',
    '$advance_cheque_date','$advance_amt','$balance_amt', '$flag')";

    if($payment_mode == "Cheque")
    {
        //query for bank transaction 
        $data_sql ="SELECT * FROM mstr_data_series WHERE name='fin_bank_transaction'";
        $res_data = mysqli_query($db,$data_sql);
        while($drw = mysqli_fetch_array($res_data))
        {
            $bank_sr_no = $drw['sr_no']; 
            $next_bank_no = $bank_sr_no + 1;
        }
        $first = date("y",strtotime("-1 year"));
        $second = date("y");
        $bank_sr_no1 = $first."-".$second."/".$bank_sr_no;
        $fin_yr = $first."-".$second;
        $sqlb = "INSERT INTO `fin_bank_transaction`( 
        `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
        `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
         `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
          `fin_yr`, `status`, `party_from`, `against`, `flag`)
           VALUES ('Receipt','$payment_mode','','',
           '$advance_cheque_date','','$advance_amt','$customer_id','$remark','$bank_sr_no1',
           '$advance_cheque_no','$advance_cheque_date','$date1','$cur_time','N','00-00-0000','$fin_yr','','RC','Retail Proforma Invoice', '$flag')";

        $sql_res = mysqli_query($db,$sqlb);
        
        if($sql_res == 1)
        {
            $bn = "Update mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction'";
            $bn_res = mysqli_query($db,$bn);
        }
    }
        $length1 = count($newRawItemArray1);
        // var_dump($newRawItemArray1);
        for($j = 0;$j<$length1;$j++)
        {    
            $prodect_category = $newRawItemArray1[$j]['prodect_category'];
            $item_id_fk = $newRawItemArray1[$j]['item_id_fk'];
            $uom =  $newRawItemArray1[$j]['uom'];
            $size =  $newRawItemArray1[$j]['size'];
            $quantity =  $newRawItemArray1[$j]['quantity'];
            $sqrft =  $newRawItemArray1[$j]['sqrft'];
            $rate =  $newRawItemArray1[$j]['rate'];
            $discount_per =  $newRawItemArray1[$j]['discount_per'];
            $discount_rs =  $newRawItemArray1[$j]['discount_rs'];
            $amount =  $newRawItemArray1[$j]['amount'];
            $remark1 =  $newRawItemArray1[$j]['remark'];
            $checkbox_val =  $newRawItemArray1[$j]['checkbox_val'];
            $posupp =  $newRawItemArray1[$j]['posupp'];
            $pono_tbl =  $newRawItemArray1[$j]['pono_tbl'];

            $sql = "INSERT INTO `retail_proforma_items`(`rpi_id_fk`, `item_id_fk`, `qty`, `uom`, `size`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `product_category`, `remark`,`checkbo_valtbl`, `po_suppliertbl`, `po_notbl`) 
            VALUES ('$last_id','$item_id_fk','$quantity','$uom','$size','$sqrft','$rate','$discount_per','$discount_rs','$amount','$prodect_category','$remark1','$checkbox_val','$posupp','$pono_tbl')";
            $res1 = mysqli_query($db,$sql) or die(mysqli_error($db));
            if($res1 == 1)
            {
                //$flag_ok = "1";
                $work_order_item_save_flag = 1;
            }
            else
            {
                //$flag_ok = "0";
                $work_order_item_save_flag = 0;
            }
            
            //$sqlchupdate = ""
        }
    }
    else
    {
        //echo $work_order_item_save_flag;
    }
    if($po_item_save_flag_ok == 1 && $work_order_item_save_flag==1)
    {
        echo "100";
    }
    else if($po_item_save_flag_ok == 0 && $work_order_item_save_flag==1)
    {
        echo "200";
    }
    
?>