<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $date1 = date("d-m-Y", strtotime($date));
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $flag_ok = 0;

    
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
            $g = mysqli_query($db,$vsql);
            $v_last_id =  mysqli_insert_id($db);
            $vehicle_id = $v_last_id;
        }
        
        
    }
    else
    {
        //echo "The input is not numeric";
        $sql = "INSERT INTO `mstr_transporter`(`name`) VALUES ('$transporter')";
        $res = mysqli_query($db,$sql);
        $t_last_id = mysqli_insert_id($db);

        $vsql = "INSERT INTO `mstr_transporter_vehicle`(`v_no`, `t_id_fk`) VALUES ('$vehicle_select','$t_last_id')";
        $g = mysqli_query($db,$vsql);
        $v_last_id =  mysqli_insert_id($db);

        $transporter_id = $t_last_id;
        $vehicle_id = $v_last_id;
        

    }
   
     $sql = "INSERT INTO `wholesale_delivery_challan`(`challan_no`, `wh_wo_id_fk`, `prepared_by`, 
     `t_id_fk`, `v_id_fk`, `qty`, `sq_ft`, `gross_amt`, `total`, `disc_per`, `disc_rs`, `other`, `process_amt`, 
     `net_amt`, `add_date`, `add_time`, `added_by`,`cust_id_fk`) VALUES ('$challan_no','$work_no_select',
     '$prepared_by',
     '$transporter_id','$vehicle_id','$total_qty','$total_sqfit',
     '$gross_amt','$total','$disc_percent','$discount_final','$adjustment_final','$process_amount',
     '$final_total','$cur_date','$cur_time','admin@gmail.com','$customer')";

     $res = mysqli_query($db,$sql);
     $last_id = mysqli_insert_id($db);

    $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_delivery_challan'";
    $res_ds = mysqli_query($db,$select_data_series);
    while($drw = mysqli_fetch_array($res_ds))
    {
        $sr_no = $drw['sr_no'];
    }

    

    
    $update_no = $sr_no + 1;
    $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_delivery_challan'";
    $update_res = mysqli_query($db,$data_series_update_sql);
    $final_remain_qty = 0;

     if($res == 1)
    {
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
            $res_ds = mysqli_query($db,$select_data_series);
            while($drw = mysqli_fetch_array($res_ds))
            {
                $cust_id_fk = $drw['cust_id_fk'];
            }

            $sql = "INSERT INTO `wholsale_delivery_challan_items`(`product_category`, `item_id_fk`, 
            `size`, `deliverd_qty`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `remark`, `dc_id_fk`,
            `total_wty`,`remaining_qty`,`work_order_id_fk`,`work_order_item_id_fk`,`cust_id_fk`) 
             VALUES ('$product_category','$item_id_fk','$size','$quantity','$sqrft','$rate','$discount_per'
            ,'$discount_rs','$amount','$remark','$last_id','$total_qty','$remaining_qty','$work_no_select','$work_order_item_id','$cust_id_fk')";
            $res1 = mysqli_query($db,$sql);

            if($total_qty != 0 && $remaining_qty==0)
            {
                $k = "UPDATE wholesale_delivery_challan SET dc_complete_status='1' WHERE wd_ch_id_pk='$last_id'";
                $kres = mysqli_query($db,$k);

                
            }

            $d = "SELECT * FROM wholesale_work_order_items WHERE woi_id_fk='$work_order_item_id'";
            $k = mysqli_query($db,$d);
            while($m = mysqli_fetch_array($k))
            {
                $remain_qty = $m['remain_qty'];
                $delivered_qty = $m['delivered_qty'];
            }
            
            (int)$new_delivered_qty = (int)$delivered_qty + (int)$quantity;
            $sql = "UPDATE wholesale_work_order_items SET delivered_qty='$new_delivered_qty' ,remain_qty='$remaining_qty'  WHERE woi_id_fk='$work_order_item_id'";
            $lki = mysqli_query($db,$sql) or die(mysqli_error($db));

            
            if($res1 == 1)
            {
                $flag_ok = "1";

                $rqty_sql = "UPDATE wholesale_work_order SET remaining_qty='$final_remain_qty' WHERE work_order_id='$work_no_select'";
                $rqty_res = mysqli_query($db,$rqty_sql);
            }
            else
            {
                $flag_ok = "0";
            }

        }
        echo $flag_ok;
        //query for updating status of work order delivery status
        $dcus_sql = "UPDATE wholesale_work_order SET 
        delivery_challan_status='1' WHERE work_order_id='$work_no_select' ";
        $dcus= mysqli_query($db,$dcus_sql);
    }
    else
    {
        echo $flag_ok;
    }
    
?>