<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('Y-m-d');
    $cur_time = date('H:i:s A');

    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    
    $flag_ok = 0;
    $flag = $_SESSION['flag'];

    
    if(is_numeric($transporter))
    {  
        // return **TRUE** if it is numeric
        //echo "The input is numeric";
        $transporter_id = $transporter;
        if(is_numeric($vehicle))
        {
            $vehicle_id = $vehicle;
            //echo "vehicle  numeric";
        }
        else
        {
            //echo "vehicle not numeric";
            // if($flag==0)
            // {
            $vsql = "INSERT INTO `mstr_transporter_vehicle`(`v_no`, `t_id_fk`, `flag`) VALUES ('$vehicle','$transporter_id', '$flag')";
            // }
            $g = mysqli_query($db,$vsql);
            $v_last_id =  mysqli_insert_id($db);
            $vehicle_id = $v_last_id;
        }
        
        
    }
    else
    {
        //echo "The input is not numeric";
        // if($flag==0)
        // {
        $sql = "INSERT INTO `mstr_transporter`(`name`, `flag`) VALUES ('$transporter', '$flag')";
        // }
        $res = mysqli_query($db,$sql);
        $t_last_id = mysqli_insert_id($db);

        // if($flag==0)
        // {
        $vsql = "INSERT INTO `mstr_transporter_vehicle`(`v_no`, `t_id_fk`, `flag`) VALUES ('$vehicle','$t_last_id', '$flag')";
        // }
        $g = mysqli_query($db,$vsql);
        $v_last_id =  mysqli_insert_id($db);

        $transporter_id = $t_last_id;
        $vehicle_id = $v_last_id;
        

    }
   
    
    if($flag==0)
    {
        $sql = "INSERT INTO `retail_tax_invoice`(`pi_no`, `po_no_fk`, `customer`, `mobile_no`, `address`, 
        `branch`, `transporter`, `vehicle`, `prepared_by`, `date`, `ledger_bal`, `stock_point`, `qty`, 
        `sqfit`, `gross_amt`, `total`, `discount_per`, `discount_rs`, `adjustment`, `process_amt`,
        `tax_amt`, `net_amt`, `flag`) VALUES ('$pi_no','$po_no','$customer','$mobile_no','$address','$branch',
        '$transporter_id','$vehicle_id','$prepared_by','$date1',0,'$stock_point','$total_qty','$total_sqfit',
        '$gross_amt','$total','$disc_percent','$discount_final','$adjustment_final','$process_amount',
        '$tax_amt','$final_total', '$flag')";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    else
    {
        $sql = "INSERT INTO `retail_tax_invoice`(`pi_no`, `po_no_fk`, `customer`, `mobile_no`, `address`, 
        `branch`, `transporter`, `vehicle`, `prepared_by`, `date`, `ledger_bal`, `stock_point`, `qty`, 
        `sqfit`, `gross_amt`, `total`, `discount_per`, `discount_rs`, `adjustment`, `process_amt`,
        `tax_amt`, `net_amt`, `flag`) VALUES ('$pi_no','$po_no','$customer','$mobile_no','$address','$branch',
        '$transporter_id','$vehicle_id','$prepared_by','$date1',0,'$stock_point','$total_qty','$total_sqfit',
        '$gross_amt','$total','$disc_percent','$discount_final','$adjustment_final','$process_amount',
        0,'$final_total', '$flag')";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }

    // $sql = "INSERT INTO `retail_tax_invoice`(`pi_no`, `po_no_fk`, `customer`, `mobile_no`, `address`, 
    // `branch`, `transporter`, `vehicle`, `prepared_by`, `date`, `ledger_bal`, `stock_point`, `qty`, 
    // `sqfit`, `gross_amt`, `total`, `discount_per`, `discount_rs`, `adjustment`, `process_amt`,
    // `tax_amt`, `net_amt`) VALUES ('$pi_no','$po_no','$customer','$mobile_no','$address','$branch',
    // '$transporter_id','$vehicle_id','$prepared_by','$date1',0,'$stock_point','$total_qty','$total_sqfit',
    // '$gross_amt','$total','$disc_percent','$discount_final','$adjustment_final','$process_amount',
    // '$tax_amt','$final_total')";
    // $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    //echo "\n\n";
    $rti_id_fk = mysqli_insert_id($db);

    $update_status = "UPDATE retail_proforma SET tax_invoice_added='1' WHERE id_pk='$po_no'";
    $res_update = mysqli_query($db, $update_status) or die(mysqli_error($db));

    if($result == 1)
    {
        $select_data_series = "SELECT * FROM mstr_data_series WHERE name='retail_tax_invoice'";
        //echo "\n\n";
        $res_ds = mysqli_query($db,$select_data_series);
        while($drw = mysqli_fetch_array($res_ds))
        {
            $sr_no = $drw['sr_no'];
            // $sr_no = substr($sr_no, 6);
            $update_no = (int)$sr_no + 1;
            $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='retail_tax_invoice'";
            $update_res = mysqli_query($db,$data_series_update_sql);
            $final_remain_qty = 0;
        }
        $itemArray = json_decode($newRawItemArray, true);
        $length1 = count($itemArray);
        for($j = 0;$j<$length1;$j++)
        { 
              $qty=0;
              $product_category = $itemArray[$j]['product_category'];
              $item_id_fk = $itemArray[$j]['item_id_fk'];
              $size = $itemArray[$j]['size'];
              $uom = $itemArray[$j]['uom'];
              $quantity = $itemArray[$j]['quantity'];
              $sqfit = $itemArray[$j]['sqfit'];
              $rate = $itemArray[$j]['rate'];
              $discount_rs = $itemArray[$j]['discount_rs'];
              $discount_per = $itemArray[$j]['discount_per'];
              $amount = $itemArray[$j]['amount'];
              $gst_per = $itemArray[$j]['gst_per'];
              $cgst = $itemArray[$j]['cgst'];
              $sgst = $itemArray[$j]['sgst'];
              $igst = $itemArray[$j]['igst'];
              $remark = $itemArray[$j]['remark'];
              $orderqty = $itemArray[$j]['orderqty'];
              $rpiidpk = $itemArray[$j]['rpiidpk'];
              
              

            $remaining_qty = (int)($orderqty) - (int)($quantity);
            $final_remain_qty = $final_remain_qty + $remaining_qty;

            $select_data_series = "SELECT * FROM retail_proforma WHERE id_pk='$po_no'";
            $res_ds = mysqli_query($db,$select_data_series);
            while($drw = mysqli_fetch_array($res_ds))
            {
                $cust_id_fk = $drw['customer'];
            }
            if($flag==0)
            {
            $sql = "INSERT INTO `retail_tax_invoice_items`(`rti_id_fk`, `retail_proforma_items_id_fk`,`product_cat`, `product_design`, `size`, `uom`, 
            `qty`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`,`gst_per`,`cgst`,`sgst`,`igst`, `remark`) 
            VALUES ('$rti_id_fk','$rpiidpk','$product_category','$item_id_fk','$size','$uom','$quantity','$sqfit','$rate',
            '$discount_per','$discount_rs','$amount','$gst_per','$cgst','$sgst','$igst','$remark')";
            //echo "\n\n";
               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));
            }
            else
            {
            $sql = "INSERT INTO `retail_tax_invoice_items`(`rti_id_fk`, `retail_proforma_items_id_fk`,`product_cat`, `product_design`, `size`, `uom`, 
            `qty`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`,`gst_per`,`cgst`,`sgst`,`igst`, `remark`) 
            VALUES ('$rti_id_fk','$rpiidpk','$product_category','$item_id_fk','$size','$uom','$quantity','$sqfit','$rate',
            '$discount_per','$discount_rs','$amount',0,0,0,0,'$remark')";
            //echo "\n\n";
               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));
            }
               
               $check_item = "SELECT * FROM stock_table WHERE item_id_fk='$item_id_fk'";
               $res_item = mysqli_query($db, $check_item) or die(mysqli_error($db));
               $fetch_item = mysqli_fetch_row($res_item);
               if(mysqli_num_rows($res_item) < 1)
               {
                //    if($flag==0)
                //    {
                $sql1 = "INSERT INTO stock_table(item_id_fk, total_qty, flag) VALUES('$item_id_fk', '$quantity', '$flag')";
                //    }
                $res = mysqli_query($db, $sql1) or die(mysqli_error($db));
               }
               else
               {
                $qty = $quantity - $fetch_item[2];
                $sql1 = "UPDATE stock_table SET total_qty='$quantity', flag='$flag' WHERE item_id_fk='$item_id_fk'";
                $res = mysqli_query($db, $sql1) or die(mysqli_error($db));
               }


            if($resquery == 1)
            {
                //echo "\n\n";
                $check_p = "SELECT * FROM retail_pending_qty 
                WHERE rproforma_id_fk='$po_no' AND `rproforma_item_id_fk`='$rpiidpk'";
                $jrs = mysqli_query($db,$check_p);
                $cnm = mysqli_num_rows($jrs);
                if($cnm > 0)
                {
                    while($t = mysqli_fetch_array($jrs)) 
                    {
                        $order_qty = $t['order_qty'];
                        $delivered_qty = $t['delivered_qty'];
                        $new_deliver_qty = 0;$new_remain_qty=0;

                        $new_deliver_qty = (int)$quantity + (int)$delivered_qty;//echo "\n";
                        $new_remain_qty = (int)$order_qty - (int)$new_deliver_qty;//echo "\n";

                        if($new_remain_qty == 0)
                        {
                            $b = "UPDATE retail_proforma SET tax_invoice_added='1' WHERE id_pk='$po_no'";
                            $bres = mysqli_query($db,$b);
                        }
                        else
                        {

                        }

                         $up = "UPDATE `retail_pending_qty` 
                                SET `remain_qty`='$new_remain_qty',`delivered_qty`='$new_deliver_qty'
                                WHERE `rproforma_id_fk`='$po_no' 
                                AND `rproforma_item_id_fk`='$rpiidpk'";
                                echo "\n\n";
                        $lj = mysqli_query($db,$up);
                        if($lj == 1)
                        {
                            $flag_ok = 1;
                        }
                    }
                }
                else
                {
                    $d = "SELECT * FROM retail_proforma_items WHERE id_pk='$rpiidpk'";
                    $k = mysqli_query($db,$d);
                    while($m = mysqli_fetch_array($k))
                    {
                        $order_qty = $m['qty'];
                    }
                    // if($flag==0)
                    // {
                        $delete_sql = "INSERT INTO `retail_pending_qty`( `rproforma_id_fk`, `rproforma_item_id_fk`, 
                    `order_qty`, `delete_qty`, `remain_qty`, `delivered_qty`, `add_date`, `add_time`, `item_id_fk`, 
                    `size`, 
                    `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `product_category`, `remark`, `flag`) VALUES ('$po_no','$rpiidpk',
                    '$orderqty','0','$remaining_qty','$quantity','$cur_date'
                    ,'$cur_time','$item_id_fk','$size','$sqfit',
                    '$rate','$discount_per','$discount_rs','$amount','$product_category','$remark', '$flag')";
                    // }

                    // $delete_sql = "INSERT INTO `retail_pending_qty`( `rproforma_id_fk`, `rproforma_item_id_fk`, 
                    // `order_qty`, `delete_qty`, `remain_qty`, `delivered_qty`, `add_date`, `add_time`, `item_id_fk`, 
                    // `size`, 
                    // `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `product_category`, `remark`) VALUES ('$po_no','$rpiidpk',
                    // '$orderqty','0','$remaining_qty','$quantity','$cur_date'
                    // ,'$cur_time','$item_id_fk','$size','$sqfit',
                    // '$rate','$discount_per','$discount_rs','$amount','$product_category','$remark')";
                    //echo "\n\n";


                    $dres = mysqli_query($db,$delete_sql);
                    if($dres == 1)
                    {
                        $flag_ok = 1;
                    }
                }
            }
            else
            {
                $flag_ok = "0";
            }

        }
        echo $flag_ok;
    }
    else
    {
        echo $flag_ok;
    }
    
?>