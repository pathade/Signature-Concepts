<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $bill_date1 = date("d-m-Y", strtotime($bill_date));
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $flag=$_SESSION['flag'];

    if($flag==0)
    {
    $sql = "INSERT INTO `wholesale_tax_invoice`(`Tax_inv_no`,`cust_id_fk`, 
    `work_id_fk`, `bill_date`, `remark`, `dc_no_list`, `discount_amt`,`other_disc_amt`, 
    `transaction_amt`, `load_unload`, `other`, `gross_amt`, `tax_amt`, 
    `net_amt`, `add_time`, `added_by`, `delete_status`, `receipt_status`,
    `billing_name`,`financial_year`, `flag`) 
    VALUES ('$tax_inv_no','$customer','$work_no_select_hidden','$bill_date1','$remark','123',
    '$final_disc_amt','$other_disc_amt','$final_trans_amt','$load_unload','$other','$gross_amt',
    '$tax_amt','$net_amt','$cur_time','admin@gmail.com','0','0','$billing_name','$fin_yr', '$flag')";
    }
    else
    {
    $sql = "INSERT INTO `wholesale_tax_invoice`(`Tax_inv_no`,`cust_id_fk`, 
    `work_id_fk`, `bill_date`, `remark`, `dc_no_list`, `discount_amt`,`other_disc_amt`, 
    `transaction_amt`, `load_unload`, `other`, `gross_amt`, `tax_amt`, 
    `net_amt`, `add_time`, `added_by`, `delete_status`, `receipt_status`,
    `billing_name`,`financial_year`, `flag`) 
    VALUES ('$tax_inv_no','$customer','$work_no_select_hidden','$bill_date1','$remark','123',
    '$final_disc_amt','$other_disc_amt','$final_trans_amt','$load_unload','$other','$gross_amt',
    0,'$net_amt','$cur_time','admin@gmail.com','0','0','$billing_name','$fin_yr', '$flag')";
    }

    $res = mysqli_query($db,$sql) or die('WTI: '.mysqli_error($db));
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        $length1 = count($newRawItemArray1);
        for($j = 0;$j<$length1;$j++)
        {   
            $qty=0;
            $product_category = $newRawItemArray1[$j]['product_category'];
            $item_id_fk = $newRawItemArray1[$j]['item_id_fk_s'];
            $size =  $newRawItemArray1[$j]['size'];
            $quantity =  $newRawItemArray1[$j]['quantity'];
            $sqrft =  $newRawItemArray1[$j]['sqrft'];
            $rate =  $newRawItemArray1[$j]['rate'];
            $discount_per =  $newRawItemArray1[$j]['discount_per'];
            $discount_rs =  $newRawItemArray1[$j]['discount_rs'];
            $amount =  $newRawItemArray1[$j]['amount'];
            $remark =  $newRawItemArray1[$j]['remark'];
            $gst_per =  $newRawItemArray1[$j]['gst_per'];
            $sgst_amt =  $newRawItemArray1[$j]['sgst_amt'];
            $cgst_amt =  $newRawItemArray1[$j]['cgst_amt'];
            $igst_amt =  $newRawItemArray1[$j]['igst_amt'];
            $dc_id =  $newRawItemArray1[$j]['dc_id'];

            if($flag==0)
            {
            $sql = "INSERT INTO `wholesale_tax_invoice_items`( 
            `tax_id_fk`, `category`, `item_id_fk`, `size`, `qty`, 
            `sqrfit`, `rate`,`disc_per`, `disc_rs`, `amount`, `remark`, 
            `gst_per`, `sgst_amt`, `cgst_amt`, `igst_amt`, `dc_id_fk`) 
            VALUES ('$last_id','$product_category','$item_id_fk',
            '$size','$quantity','$sqrft','$rate','$discount_per','$discount_rs',
            '$amount','$remark','$gst_per','$sgst_amt','$cgst_amt',
            '$igst_amt','$dc_id')";
            }
            else
            {
            $sql = "INSERT INTO `wholesale_tax_invoice_items`( 
            `tax_id_fk`, `category`, `item_id_fk`, `size`, `qty`, 
            `sqrfit`, `rate`,`disc_per`, `disc_rs`, `amount`, `remark`, 
            `gst_per`, `sgst_amt`, `cgst_amt`, `igst_amt`, `dc_id_fk`) 
            VALUES ('$last_id','$product_category','$item_id_fk',
            '$size','$quantity','$sqrft','$rate','$discount_per','$discount_rs',
            '$amount','$remark',0,0,0,0,'$dc_id')";
            }

            
            $res1 = mysqli_query($db,$sql) or die(mysqli_error($db));

            $check_item = "SELECT * FROM stock_table WHERE item_id_fk='$item_id_fk'";
            $res_item = mysqli_query($db, $check_item) or die(mysqli_error($db));
            $fetch_item = mysqli_fetch_row($res_item);
            if(mysqli_num_rows($res_item) < 1)
            {
                // if($flag==0)
                // {
                $sql1 = "INSERT INTO stock_table(item_id_fk, total_qty, flag) VALUES('$item_id_fk', '$quantity', '$flag')";
                // }
                $res = mysqli_query($db, $sql1) or die(mysqli_error($db));
            }
            else
            {
                $qty = $quantity - $fetch_item[2];
                $sql1 = "UPDATE stock_table SET total_qty='$quantity', flag='$flag' WHERE item_id_fk='$item_id_fk'";
                $res = mysqli_query($db, $sql1) or die(mysqli_error($db));
            }

            if($res1 == 1)
            {
                $flag_ok = "1";
                
                //query for updating status of work order delivery status
                $dcus_sql = "UPDATE wholesale_delivery_challan SET 
                tax_invoice_status='1' WHERE wd_ch_id_pk='$dc_id' ";
                $dcus= mysqli_query($db,$dcus_sql);

                $first = date("y",strtotime("-1 year"));
                $second = date("y");

                // $update_no1 = $first."".$second."/".$update_no1;

                $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_tax_invoice'";
                $res_ds = mysqli_query($db,$select_data_series);
                while($drw = mysqli_fetch_array($res_ds))
                {
                    $sr_no = $drw['sr_no'];
                }
                // $sr_no = substr($sr_no, 6);
                $update_no = $sr_no + 1;
                $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_tax_invoice'";
                $update_res = mysqli_query($db,$data_series_update_sql);
            }
            else
            {
                echo "0";
            }

        }
        echo $flag_ok ;
    }
    else
    {
        echo "0";
    }
    
?>