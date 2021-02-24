<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $flag_ok = 0;
    

     $sql = "UPDATE `wholesale_work_order` SET `work_no`='$work_no',
    `branch`='$branch123',`pono`='$pono',`length`='$length',`width`='$width',
    `cust_id_fk`='$customer1',`site_id_fk`='$customer_site1',`remark`='$remark',
    `salesman_id_fk`='$salesman1',`transporter_id_fk`='$transporter1',`qty`='$total_qty',
    `sq_ft`='$total_sqfit',`gross_amt`='$gross_amt',`total`='$total',
    `disc_per`='$disc_percent',`disc_rs`='$discount_final',`other`='$adjustment_final',
    `process_amt`='$process_amount',`net_amt`='$final_total'
    WHERE `work_order_id`='$edit_id'";

     $res = mysqli_query($db,$sql);
     //$last_id = mysqli_insert_id($db);


     if($res == 1)
    {
        $del_sql = "DELETE FROM wholesale_work_order_items WHERE work_order_no_id_fk='$edit_id'";
        $del_res = mysqli_query($db,$del_sql);
        
       // print_r($newRawItemArray1);
        //echo "*********";
        $length1 = count($newRawItemArray1);
        //echo "*********";
        for($j = 0;$j<$length1;$j++)
        {   
            //echo "jjj is:".$j;echo "\n";
            $item_id_fk = $newRawItemArray1[$j]['item_id_fk'];
            $account =  $newRawItemArray1[$j]['account'];
            $quantity =  $newRawItemArray1[$j]['quantity'];
            $rate =  $newRawItemArray1[$j]['rate'];
            $discount_rs =  $newRawItemArray1[$j]['discount_rs'];
            $discount_per =  $newRawItemArray1[$j]['discount_per'];
            $amount =  $newRawItemArray1[$j]['amount'];
            $length =  $newRawItemArray1[$j]['length'];
            $breath =  $newRawItemArray1[$j]['breath'];
            $sqrft =  $newRawItemArray1[$j]['sqrft'];
            
             $sql = "INSERT INTO `wholesale_work_order_items`(`item_id_fk`, `account`, `qty`, 
            `length`, `breadth`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `work_order_no_id_fk`) 
            VALUES ('$item_id_fk','$account','$quantity','$length','$breath','$sqrft','$rate','$discount_per'
            ,'$discount_rs','$amount','$edit_id')";
            $res1 = mysqli_query($db,$sql);
            if($res1 == 1)
            {
                $flag_ok = "1";
            }
            else
            {
                $flag_ok = "0";
            }

        }
        echo $flag_ok;
    }
    else{
        echo $flag_ok;
    }
    
?>