<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $date1 = date("d-m-Y", strtotime($date));
    $flag=$_SESSION['flag'];

    if($flag==0)
    {
    $sql = "INSERT INTO `wholesale_return_good`(`ret_no`, 
    `cust_id_fk`, `t_id_fk`, `v_id_fk`, `prepared_by`, `dc_id_fk`, `work_no`, 
    `stock_point`, `t_amt`, `remark`, `gross_amt`, `total_amt`, `total_tax`, 
    `tax_amt`, `tot_qty`, `tot_sqft`, `total_disc_per`, `total_disc_rs`, `other`, 
    `add_date`, `add_time`, `flag`) VALUES (
    '$return_no','$customer','$transporter','$vehicle','$prepared_by','$pchallan_no',
    '$work_no','$stock_point','$trans_amt','$remark','$gross_amt','$total_cal',
    '$tax_per_cal','$tax_amt_cal','$quantity','$tot_sqrft1','$disc_','$discount',
    '$oth','$cur_date','$cur_time', '$flag')";
    }
    else
    {
    $sql = "INSERT INTO `wholesale_return_good`(`ret_no`, 
    `cust_id_fk`, `t_id_fk`, `v_id_fk`, `prepared_by`, `dc_id_fk`, `work_no`, 
    `stock_point`, `t_amt`, `remark`, `gross_amt`, `total_amt`, `total_tax`, 
    `tax_amt`, `tot_qty`, `tot_sqft`, `total_disc_per`, `total_disc_rs`, `other`, 
    `add_date`, `add_time`, `flag`) VALUES (
    '$return_no','$customer','$transporter','$vehicle','$prepared_by','$pchallan_no',
    '$work_no','$stock_point','$trans_amt','$remark','$gross_amt','$total_cal',
    0,'$tax_amt_cal','$quantity','$tot_sqrft1','$disc_','$discount',
    '$oth','$cur_date','$cur_time', '$flag')";
    }

    /*$sql = "INSERT INTO `wholesale_tax_invoice`(`Tax_inv_no`,`cust_id_fk`, 
    `work_id_fk`, `bill_date`, `remark`, `dc_no_list`, `discount_amt`, 
    `transaction_amt`, `load_unload`, `other`, `gross_amt`, `tax_amt`, 
    `net_amt`, `add_time`, `added_by`, `delete_status`, `receipt_status`,
    `billing_name`,`financial_year`) 
    VALUES ('$tax_inv_no','$customer','$wo_id','$bill_date','$remark','123',
    '$final_disc_amt','$final_trans_amt','$load_unload','$other','$gross_amt',
    '$tax_amt','$net_amt','$cur_time','admin@gmail.com','0','0','$billing_name','$fin_yr')";*/

    $res = mysqli_query($db,$sql);
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        $length1 = count($newRawItemArray1);
        for($j = 0;$j<$length1;$j++)
        {   
            $product_category = $newRawItemArray1[$j]['product_category'];
            $item_id_fk = $newRawItemArray1[$j]['item_id_fk_s'];
            $size =  $newRawItemArray1[$j]['size'];
            $quantity =  $newRawItemArray1[$j]['quantity'];
            $return_quantity =  $newRawItemArray1[$j]['return_quantity'];
            $remain_quantity =  $newRawItemArray1[$j]['remain_quantity'];
            $sqrft =  $newRawItemArray1[$j]['sqrft'];
            $rate =  $newRawItemArray1[$j]['rate'];
            $discount_per =  $newRawItemArray1[$j]['discount_per'];
            $discount_rs =  $newRawItemArray1[$j]['discount_rs'];
            $amount =  $newRawItemArray1[$j]['amount'];
            $return_amount =  $newRawItemArray1[$j]['return_amount'];
            $remark =  $newRawItemArray1[$j]['remark'];
            $gst_per =  $newRawItemArray1[$j]['gst_per'];
            $sgst_amt =  $newRawItemArray1[$j]['sgst_amt'];
            $cgst_amt =  $newRawItemArray1[$j]['cgst_amt'];
            $igst_amt =  $newRawItemArray1[$j]['igst_amt'];
            $dc_id =  $newRawItemArray1[$j]['dc_id'];

            if($flag==0)
            {
            $sql = "INSERT INTO `wholesale_return_good_items`( 
            `return_id_fk`, `product_category`, `item_id_fk`, `size`, `qty`, 
            `return_qty`, `remain_qty`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, 
            `amount`, `return_amount`, `remark`, `dc_id_fk`, `gst_per`, `cgst_amt`, `sgst_amt`, `igst_amt`) 
            VALUES ('$last_id','$product_category','$item_id_fk','$size',
            '$quantity','$return_quantity','$remain_quantity','$sqrft','$rate',
            '$discount_per','$discount_rs','$amount','$return_amount',
            '$remark','$dc_id','$gst_per','$sgst_amt','$cgst_amt','$igst_amt')";

            $res1 = mysqli_query($db,$sql);
            }
            else
            {
            $sql = "INSERT INTO `wholesale_return_good_items`( 
            `return_id_fk`, `product_category`, `item_id_fk`, `size`, `qty`, 
            `return_qty`, `remain_qty`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, 
            `amount`, `return_amount`, `remark`, `dc_id_fk`, `gst_per`, `cgst_amt`, `sgst_amt`, `igst_amt`) 
            VALUES ('$last_id','$product_category','$item_id_fk','$size',
            '$quantity','$return_quantity','$remain_quantity','$sqrft','$rate',
            '$discount_per','$discount_rs','$amount','$return_amount',
            '$remark','$dc_id',0,0,0,0)";

            $res1 = mysqli_query($db,$sql);
            }
            if($res1 == 1)
            {
                $flag_ok = "1";
                
                //query for updating status of work order delivery status
                $dcus_sql = "UPDATE wholesale_delivery_challan SET 
                dc_return_status='1' WHERE wd_ch_id_pk='$dc_id' ";
                $dcus= mysqli_query($db,$dcus_sql);

                $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_return_good'";
                $res_ds = mysqli_query($db,$select_data_series);
                while($drw = mysqli_fetch_array($res_ds))
                {
                    $sr_no = $drw['sr_no'];
                }
                $sr_no = substr($sr_no, 6);
                $update_no = $sr_no + 1;
                $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_return_good'";
                $update_res = mysqli_query($db,$data_series_update_sql);
            }
            else
            {
                $flag_ok = "0";
            }

        }
        echo $flag_ok="1";
    }
    else
    {
        echo $flag_ok="0";
    }
    
?>