<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('Y-m-d');
    $cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $flag_ok = 0;
    $flag=$_SESSION['flag'];

    
    if(is_numeric($transporter))
    {  
        // return **TRUE** if it is numeric
        //echo "The input is numeric";
        $transporter_id = $transporter;
        if(is_numeric($vehicle_select))
        {
            $vehicle_id = $vehicle_select;
            //echo "vehicle  numeric";
        }
        else
        {
            //echo "vehicle not numeric";
            $vsql = "INSERT INTO `mstr_transporter_vehicle`(`v_no`, `t_id_fk`) VALUES ('$vehicle_select','$transporter_id')";
            $g = mysqli_query($db,$vsql) or die(mysqli_error($db));
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
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        // }
        $t_last_id = mysqli_insert_id($db);

        // if($flag==0)
        // {
        $vsql = "INSERT INTO `mstr_transporter_vehicle`(`v_no`, `t_id_fk`) VALUES ('$vehicle_select','$t_last_id')";
        $g = mysqli_query($db,$vsql) or die(mysqli_error($db));
        // }
        $v_last_id =  mysqli_insert_id($db);

        $transporter_id = $t_last_id;
        $vehicle_id = $v_last_id;
        

    }
    
    // if($flag==0)
    // {
    $sql = "INSERT INTO `wholesale_delivery_challan`(`challan_no`, `wh_wo_id_fk`, `prepared_by`, 
    `t_id_fk`, `v_id_fk`, `qty`, `sq_ft`, `gross_amt`, `total`, `disc_per`, `disc_rs`, `other`, `process_amt`, 
    `net_amt`, `add_date`, `add_time`, `added_by`,`cust_id_fk`, `flag`) VALUES ('$challan_no','$work_no_select',
    '$prepared_by',
    '$transporter_id','$vehicle_id','$total_qty','$total_sqfit',
    '$gross_amt','$total','$disc_percent','$discount_final','$adjustment_final','$process_amount',
    '$final_total','$cur_date','$cur_time','admin@gmail.com','$customer', '$flag')";
    // }

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_delivery_challan'";
        $res_ds = mysqli_query($db,$select_data_series) or die(mysqli_error($db));
        while($drw = mysqli_fetch_array($res_ds))
        {
            $sr_no = $drw['sr_no'];
            // $sr_no = substr($sr_no, 6);
            $update_no = $sr_no + 1;
            $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_delivery_challan'";
            $update_res = mysqli_query($db,$data_series_update_sql) or die(mysqli_error($db));
            $final_remain_qty = 0;
        }

        $length1 = count($newRawItemArray1);
        for($j = 0;$j<$length1;$j++)
        {   
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
            $total_qty =  $newRawItemArray1[$j]['total_qty'];
            $work_order_item_id =  $newRawItemArray1[$j]['work_order_item_id'];

            $remaining_qty = (int)($total_qty) - (int)($quantity);
            $final_remain_qty = $final_remain_qty + $remaining_qty;

            $select_data_series = "SELECT * FROM wholesale_work_order WHERE work_order_id='$work_no_select'";
            $res_ds = mysqli_query($db,$select_data_series) or die(mysqli_error($db));
            while($drw = mysqli_fetch_array($res_ds))
            {
                $cust_id_fk = $drw['cust_id_fk'];
            }
            $sql = "INSERT INTO `wholsale_delivery_challan_items`(`product_category`, `item_id_fk`, 
            `size`, `deliverd_qty`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `remark`, `dc_id_fk`,
            `total_wty`,`remaining_qty`,`work_order_id_fk`,`work_order_item_id_fk`,`cust_id_fk`) 
             VALUES ('$product_category','$item_id_fk','$size','$quantity','$sqrft','$rate','$discount_per'
            ,'$discount_rs','$amount','$remark','$last_id','$total_qty','$remaining_qty','$work_no_select',
            '$work_order_item_id','$cust_id_fk')";
            $res1 = mysqli_query($db,$sql) or die(mysqli_error($db));
            if($res1 == 1)
            {
                $check_p = "SELECT * FROM wholesale_work_order_pending_qty 
                WHERE work_order_id_fk='$work_no_select' AND `work_order_item_id_fk`='$work_order_item_id'";

                //echo "\n\n\n";
                $jrs = mysqli_query($db,$check_p) or die(mysqli_error($db));
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
                            $b = "UPDATE wholesale_work_order SET delivery_challan_status='1' WHERE work_order_id='$work_no_select'";
                            $bres = mysqli_query($db,$b) or die(mysqli_error($db));
                        }
                        else
                        {

                        }
                        //echo "\n\n\n";
                        $up = "UPDATE `wholesale_work_order_pending_qty` 
                                SET `remain_qty`='$new_remain_qty',`delivered_qty`='$new_deliver_qty'
                                WHERE `work_order_id_fk`='$work_no_select' 
                                AND `work_order_item_id_fk`='$work_order_item_id'";
                                echo "\n\n\n";
                        $lj = mysqli_query($db,$up) or die('WPQ1: '.mysqli_error($db));
                        if($lj == 1)
                        {
                            $flag_ok = 1;
                        }
                    }
                }
                else
                {
                    $d = "SELECT * FROM wholesale_work_order_items WHERE woi_id_fk='$work_order_item_id'";
                    $k = mysqli_query($db,$d) or die(mysqli_error($db));
                    while($m = mysqli_fetch_array($k))
                    {
                        $order_qty = $m['qty'];
                    }
                    
                    // if($flag==0)
                    // {
                    $delete_sql = "INSERT INTO `wholesale_work_order_pending_qty`(`work_order_id_fk`,
                    `work_order_item_id_fk`, `order_qty`, `delete_qty`, `remain_qty`,`delivered_qty`, `add_date`, `add_time`, 
                    `item_id_fk`, `size`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `product_category`, `remark`, `flag`) 
                    VALUES ('$work_no_select','$work_order_item_id','$order_qty','0','$remaining_qty','$quantity','$cur_date'
                    ,'$cur_time','$item_id_fk','$size','$sqrft','$rate','$discount_per','$discount_rs','$amount','$product_category',
                    '$remark', '$flag')";
                    $dres = mysqli_query($db,$delete_sql) or die('WPQ2: '.mysqli_error($db));
                    // }
                    if($dres == 1)
                    {
                        $flag_ok = 1;
                    }
                }
            }
            else
            {
                $flag_ok = 0;
            }

        }
         //$flag_ok;
    }
    else
    {
        $flag_ok = 0;
    }
    echo $flag_ok;
?>