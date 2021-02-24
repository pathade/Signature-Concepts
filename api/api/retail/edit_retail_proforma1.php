<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');$cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $po_item_save_flag_ok = 0;
    $work_order_item_save_flag = 0;
    $date1 = date("d-m-Y", strtotime($date));

    ///$customer_id = $customer;
    if(is_int((int)$customer) == true)
    {
        //is_int($page) == false
        //echo "hiii";
        $customer_id = $customer;
    }
    else
    {
        //echo "buyeeee";
        $sql = "INSERT INTO `mstr_retail_customer`( `retail_cust_name`, 
        `retail_cust_address`, `retail_cust_mobile`, `gst_no`)
         VALUES ('$customer_name123','$address','$mobile_no','$gst_no')";
    
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        $last_id = mysqli_insert_id($db);
        $customer_id = $last_id;
    }

    $sql = "SELECT * FROM purchase_order WHERE retail_proforma_no='$edit_id'";
    $n = mysqli_query($db,$sql);
    while($b = mysqli_fetch_array($n))
    {
        $pid = $b['id'];

        $d = "DELETE FROM purchase_order_items WHERE purchase_order_id_fk='$pid'";
        $hjk = mysqli_query($db,$d);
    }

    
    $sql = "UPDATE `retail_proforma` 
    SET `branch`='$branch',`order_no`='$order_no',
    `customer`='$customer_id',`mobile_no`='$mobile_no',`address`='$address',
    `gst_no`='$gst_no',`salesman`='$saleman',`remark`='$remark',`date`='$date1',
    `qty`='$total_qty',`sqfit`='$total_sqfit',`gross_amt`='$gross_amt',`total`='$total',
    `discount_per`='$disc_percent',`discount_rs`='$discount_final',`others`='$adjustment_final',
    `process_amt`='$process_amount',`net_amt`='$final_total',`payment_mode`='$payment_mode',
    `ch_no`='$advance_cheque_no',`ch_date`='$advance_cheque_date',`advance_amt`='$advance_amt',`balance_amt`='$balance_amt' 
    WHERE `id_pk`='$edit_id'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    //$last_id = mysqli_insert_id($db);
    if($res == 1)
    {
        $delete_retail_proforma_items_sql = "DELETE FROM retail_proforma_items WHERE rpi_id_fk='$edit_id'";
        $delete_r_items_res = mysqli_query($db,$delete_retail_proforma_items_sql);

        $length1 = count($newRawItemArray1);
        for($j = 0;$j<$length1;$j++)
        {   
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
            $checkbox_val =  $newRawItemArray1[$j]['checkbox_val'];
            $posupp =  $newRawItemArray1[$j]['posupp'];
            $pono_tbl =  $newRawItemArray1[$j]['pono_tbl'];

            //query for deleteing purchase order item data
            

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
                    $s_select = "SELECT * FROM `mstr_supplier` WHERE supplier_id_fk='$posupp'";
                    $pselect_sql_res = mysqli_query($db,$s_select) or die(mysqli_error($db));
                    while($s_row = mysqli_fetch_array($pselect_sql_res))
                    {
                        $smobile_no = $s_row['mobile_no'];
                        $s_add = $s_row['address'];
                    }
                    //echo PO Not exist
                    $posql = "INSERT INTO `purchase_order`(`date`,`branch`,`purchase_order_no`, 
                    `supplier_id_fk`, `mobile_no`, `retail_proforma_no`, `address`, `remark`, `sub_total`, 
                    `discount_rs`, `adjustment`, `total`, `process_amount`,`status`, `add_time`, 
                    `added_by`) 
                    VALUES ('$cur_date','$branch','$pono_tbl','$posupp','$smobile_no','$edit_id',
                    '$s_add','$remark','$total','$discount_final','$adjustment_final','$final_total',
                    '$process_amount','0','$cur_time','admin@gmail.com')";

                    $po_save_res = mysqli_query($db,$posql) or die(mysqli_error($db));
                    $po_last_id = mysqli_insert_id($db);

                    // $u_po_data_sql = "UPDATE mstr_data_series SET sr_no='$po_last_id' WHERE name='purchase_order'";
                    // $pods_res = mysqli_query($db,$u_po_data_sql);

                    $select_data_series = "SELECT * FROM mstr_data_series WHERE name='purchase_order'";
                    $res_ds = mysqli_query($db,$select_data_series) or die(mysqli_error($db));
                    while($drw = mysqli_fetch_array($res_ds))
                    {
                        $sr_no = $drw['sr_no'];
                    }
                    $update_no = $sr_no + 1;
                    $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='purchase_order'";
                    $update_res = mysqli_query($db,$data_series_update_sql) or die(mysqli_error($db));
                }

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
                ,'$rate','$amount','$discount_per','$discount_rs','$remark1','1')";

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

            $sql = "INSERT INTO `retail_proforma_items`(`rpi_id_fk`, `item_id_fk`, `qty`, `size`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `product_category`, `remark`,`checkbo_valtbl`, `po_suppliertbl`, `po_notbl`) 
            VALUES ('$edit_id','$item_id_fk','$quantity','$size','$sqrft','$rate','$discount_per','$discount_rs','$amount','$prodect_category','$remark1','$checkbox_val','$posupp','$pono_tbl')";
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
        }
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