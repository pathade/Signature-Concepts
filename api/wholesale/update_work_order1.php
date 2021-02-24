<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $transporter="";$po_amt=0;$s_total=0;$supplier_po_amt=0;$s_dicount_rs=0;$po_item_save_flag_ok =0;

    //delete purchase order item first
    $psql = "SELECT * FROM `purchase_order` WHERE work_no ='$edit_id'";
    $pres = mysqli_query($db,$psql);
    while($prw = mysqli_fetch_array($pres))
    {
        $purchase_order_no = $prw['id'];
        $dsql = "DELETE from purchase_order_items WHERE purchase_order_id_fk='$purchase_order_no'";
        $dres = mysqli_query($db,$dsql);

        $ds = "DELETE FROM purchase_order WHERE id='$purchase_order_no'";
        $dress = mysqli_query($db,$ds);
    }

    // wholesale_work_order
    $sql = "UPDATE `wholesale_work_order` SET `work_no`='$work_no',
    `branch`='$branch123',`pono`='$pono_final1',
    `cust_id_fk`='$customer1',`site_id_fk`='$customer_site1',`remark`='$remark',
    `salesman_id_fk`='$salesman1',`transporter_id_fk`='$transporter1',`qty`='$total_qty',
    `sq_ft`='$total_sqfit',`gross_amt`='$gross_amt',`total`='$total',
    `disc_per`='$disc_percent',`disc_rs`='$discount_final', `transport`='$trans', `unload`='$unload', `insurance`='$insurance', `tcs`='$tcs',`other`='$adjustment_final',
    `net_amt`='$final_total'
    WHERE `work_order_id`='$edit_id'";

    $res = mysqli_query($db,$sql);
    //if po generated from wholesale
    if($pono_final1 !="")
    {   
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

                //query for checking po no exist or not
                $poexist_sql = "SELECT * FROM purchase_order WHERE purchase_order_no='$pono_tbl'";
                $poexist_res = mysqli_query($db,$poexist_sql);
                if(mysqli_num_rows($poexist_res)>0)
                {
                    while($porwww = mysqli_fetch_array($poexist_res))
                    {
                        $po_last_id = $porwww['id'];
                    }
                }
                else
                {
                    //not exist
                    $s_select = "SELECT * FROM `mstr_supplier` WHERE supplier_id_fk='$posupp'";
                    $pselect_sql_res = mysqli_query($db,$s_select);
                    while($s_row = mysqli_fetch_array($pselect_sql_res))
                    {
                        $smobile_no = $s_row['mobile_no'];
                        $s_add = $s_row['address'];
                        $supplier_po_amt = $supplier_po_amt + $amount;
                        //$s_total = $s_total + $amount;
                        $s_dicount_rs = $s_dicount_rs + $discount_rs;
                        $s_final_total = $supplier_po_amt + $adjustment_final + $process_amount;
                    }
                    if($checkbox_val !="po_no")
                    {
                        $posql = "INSERT INTO `purchase_order`(`date`,`branch`,`purchase_order_no`, 
                        `supplier_id_fk`, `mobile_no`, `work_no`, `address`, `remark`, `sub_total`, 
                        `discount_rs`, `adjustment`, `total`, `process_amount`,`status`, `add_time`, 
                        `added_by`) 
                        VALUES ('$cur_date','$branch123','$pono_tbl','$posupp','$smobile_no',
                        '$edit_id',
                        '$s_add','$remark','$supplier_po_amt','$s_dicount_rs','$adjustment_final','$s_final_total',
                        '$process_amount','0','$cur_time','admin@gmail.com')";

                        $po_save_res = mysqli_query($db,$posql);
                        $po_last_id = mysqli_insert_id($db);

                        //update purchase order data series
                        $srnofinal = (int)$pono_tbl + (int)1;
                        $u_po_data_sql = "UPDATE mstr_data_series SET sr_no='$srnofinal' WHERE name='purchase_order'";
                        $pods_res = mysqli_query($db,$u_po_data_sql);
                    }
                    
                }
                //////////////////////////////////////////////
                $sql_fetch_design_code = "SELECT * FROM mstr_item WHERE item_id_pk='$item_id_fk'";
                $res_fetch_design_code = mysqli_query($db,$sql_fetch_design_code);
                while($f_d_row = mysqli_fetch_array($res_fetch_design_code))
                {
                    $fetch_design_code = $f_d_row['design_code'];
                }

                if($checkbox_val !="po_no")
                {

                    $po_order_item_save_sql = "INSERT INTO `purchase_order_items`( 
                    `purchase_order_id_fk`, `item_id_fk`, `design_code`, `size`, 
                    `quantity`, `sqrft`, `rate`, `amount`, `discount_per`, `discount_rs`,`remark`, `status`) 
                    VALUES ('$po_last_id','$item_id_fk','$fetch_design_code','$size','$quantity','$sqrft'
                    ,'$rate','$amount','$discount_per','$discount_rs','$remark1','1')";

                    $res1_po= mysqli_query($db,$po_order_item_save_sql);
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
    }
    else
    {
        $po_item_save_flag_ok = "0";
    }

    $woi_del = "DELETE FROM wholesale_work_order_items WHERE work_order_no_id_fk='$edit_id'";
            $woi_res = mysqli_query($db,$woi_del);

   
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

            
            if($posupp!= "")
                {
                    $posupp = $posupp;
                }
                else
                {
                    $posupp = 0;
                }
                if($pono_tbl!= "")
                {
                    $pono_tbl = $pono_tbl;
                }
                else
                {
                    $pono_tbl = 0;
                }
                if($checkbox_val!="po_yes")
                {
                    $posupp = 0;
                    $pono_tbl = 0;
                }
                else
                {
                    $posupp = $posupp;
                    $pono_tbl = $pono_tbl;
                }

        

            $sql11 = "INSERT INTO `wholesale_work_order_items`(`item_id_fk`, 
            `qty`, `size`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, 
            `work_order_no_id_fk`, `product_category`, `remark`, `checkbo_valtbl`, `po_suppliertbl`, `po_notbl`) 
            VALUES ('$item_id_fk','$quantity','$size',
            '$sqrft','$rate','$discount_per','$discount_rs','$amount','$edit_id',
            '$prodect_category','$remark1','$checkbox_val','$posupp','$pono_tbl')";
            $res11 = mysqli_query($db,$sql11);
            if($res11 == 1)
            {
                $work_order_item_save_flag = 1;
            }
            else
            {
                $work_order_item_save_flag = 0;
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