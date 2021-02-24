<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A'); 
    $date1 = date("d-m-Y", strtotime($date));
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $length="";$width="";$po_amt=0;$s_total=0;$supplier_po_amt=0;$s_dicount_rs=0;
    $po_item_save_flag_ok=0;
    $work_order_item_save_flag  = 0;
    $flag=$_SESSION['flag'];
    //$work_order_item_save_flag = 0; 
    //error_reporting(0);
    //echo "transporter is:".$transporter;
    if(is_numeric($transporter))
    { 
        //echo "inside if";
        $transporter = $transporter;
    }
    else
    {
        //echo "inside else";
        // if($flag==0)
        // {
         $save_trans_sql = "INSERT INTO `mstr_transporter`( `name`, `flag`) 
        VALUES ('$transporter', '$flag')";
        // }
        $s_t_res = mysqli_query($db,$save_trans_sql) or die(mysqli_error($db));
        $trans_last_id = mysqli_insert_id($db);
        $transporter= $trans_last_id;
    }
    // if($flag==0)
    // {
    $sql = "INSERT INTO `wholesale_work_order`(`work_no`, `branch`, `pono`,
     `cust_id_fk`, `site_id_fk`, `remark`, `salesman_id_fk`, 
     `transporter_id_fk`, `qty`, 
     `sq_ft`, `gross_amt`, `total`, `disc_per`, `disc_rs`, `transport`, `unload`, 
     `insurance`, `tcs`, `other`, 
     `process_amt`, `net_amt`, 
     `add_date`, `add_time`, `added_by`, `flag`) VALUES 
     ('$work_no','$branch123','$pono_final1','$customer','$customer_site',
     '$remark','$salesman','$transporter','$total_qty','$total_sqfit',
     '$gross_amt','$total','$disc_percent','$discount_final','$trans','$unload','$insurance','$tcs',
     '$adjustment_final','0',
     '$final_total','$cur_date','$cur_time','admin@gmail.com', '$flag')"; 

     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    // }
     $last_id = mysqli_insert_id($db);
    //echo "\n";
    $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_work_order'";
    $res_ds = mysqli_query($db,$select_data_series) or die(mysqli_error($db));
    while($drw = mysqli_fetch_array($res_ds))
    {
        $sr_no = $drw['sr_no'];
    }
    $update_no = $sr_no + 1;
    $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_work_order'";
    $update_res = mysqli_query($db,$data_series_update_sql) or die(mysqli_error($db));

    if($pono_final1 !="")
    {
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
                    $s_add = "";$smobile_no ="";$s_final_total ="";
                    $s_select = "SELECT * FROM `mstr_supplier` WHERE supplier_id_fk='$posupp'";
                    $pselect_sql_res = mysqli_query($db,$s_select) or die(mysqli_error($db));
                    while($s_row = mysqli_fetch_array($pselect_sql_res))
                    {
                        $smobile_no = $s_row['mobile_no'];
                        $s_add = $s_row['address'];

                        $smobile_no = $s_row['mobile_no'];
                        $s_add = $s_row['address'];
                        $supplier_po_amt = $supplier_po_amt + $amount;
                        $s_dicount_rs = $s_dicount_rs + $discount_rs;
                        $s_final_total = $supplier_po_amt + $adjustment_final;
                    }
                    
                    if($checkbox_val !="po_no")
                {
                    // if($flag==0)
                    // {
                    $posql = "INSERT INTO `purchase_order`(`date`,`branch`,`purchase_order_no`, 
                    `supplier_id_fk`, `mobile_no`, `work_no`, `address`, `remark`, `sub_total`, 
                    `discount_rs`, `adjustment`, `total`, `process_amount`,`status`, `add_time`, 
                    `added_by`, `flag`) 
                    VALUES ('$cur_date','$branch123','$pono_tbl','$posupp','$smobile_no','$last_id',
                    '$s_add','$remark','$supplier_po_amt','$s_dicount_rs','$adjustment_final','$s_final_total',
                    0,'0','$cur_time','admin@gmail.com', '$flag')";
                    // }

                    $po_save_res = mysqli_query($db,$posql) or die(mysqli_error($db));
                    $po_last_id = mysqli_insert_id($db);
                    
                    //update purchase order data series
                }


                } 
                //////////////////////////////////////////////
                $sql_fetch_design_code = "SELECT * FROM mstr_item WHERE item_id_pk='$item_id_fk'";
                $res_fetch_design_code = mysqli_query($db,$sql_fetch_design_code) or die(mysqli_error($db));
                while($f_d_row = mysqli_fetch_array($res_fetch_design_code))
                {
                    $fetch_design_code = $f_d_row['design_code'];
                }
                $sqlm = "select MAX(purchase_order_no) from purchase_order ";
                $g = mysqli_query($db,$sqlm) or die(mysqli_error($db));
                while($gr = mysqli_fetch_array($g))
                {
                    $max_purchase_id = $gr['MAX(purchase_order_no)'];
                    $fmax = substr($max_purchase_id, 6) + 1;
                    //$srnofinal = $po_last_id + 1;
                    $u_po_data_sql = "UPDATE mstr_data_series SET sr_no='$fmax' WHERE name='purchase_order'";
                    $pods_res = mysqli_query($db,$u_po_data_sql) or die(mysqli_error($db));
                }

                if($checkbox_val !="po_no")
                {
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
            
    }
    else
    {
        $po_item_save_flag_ok = "0";
    }

    if($res == 1)
    {
        $length1 = count($newRawItemArray1);
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

            $sql = "INSERT INTO `wholesale_work_order_items`(`item_id_fk`, 
            `qty`, `size`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, 
            `work_order_no_id_fk`, `product_category`, `remark`, `checkbo_valtbl`, `po_suppliertbl`, `po_notbl`) 
            VALUES ('$item_id_fk','$quantity','$size',
            '$sqrft','$rate','$discount_per','$discount_rs','$amount','$last_id',
            '$prodect_category','$remark1','$checkbox_val','$posupp','$pono_tbl')";
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
    else
    {
        //echo $work_order_item_save_flag;
    }
    if($po_item_save_flag_ok == 1 && $work_order_item_save_flag==1)
    {
        echo "100";
        ////echo $posql;echo "\n";
        //echo $u_po_data_sql;
    }
    else if($po_item_save_flag_ok == 0 && $work_order_item_save_flag==1)
    {
        echo "200";
    }
    
?>
