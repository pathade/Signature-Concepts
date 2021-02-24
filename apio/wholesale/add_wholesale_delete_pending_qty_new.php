<?php
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('Y-m-d');
    $cur_time = date('H:i:s A'); 
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $flag=$_SESSION['flag'];
    //echo "hii";
    $length1 = count($newRawItemArray1);
    //echo "length:".$length1;
    for($j = 0;$j<$length1;$j++)
    {   
        //echo "jjj is:".$j;echo "\n";
            
        $work_no = $newRawItemArray1[$j]['work_no'];
        $pending_po_no = $newRawItemArray1[$j]['pending_po_no'];
        $order_qty =  $newRawItemArray1[$j]['order_qty'];
        $pending_qty =  $newRawItemArray1[$j]['pending_qty'];
        $delete_qty =  $newRawItemArray1[$j]['delete_qty'];
        $remain_qty =  $newRawItemArray1[$j]['remain_qty'];
        $work_order_item_id_fk = $newRawItemArray1[$j]['work_order_item_id_fk'];
    
        // if($flag==0)
        // {
        $sql = "INSERT INTO `wholesale_delete_pending_qty`( 
        `work_order_id_fk`, `work_order_item_id_fk`, `order_qty`, `pending_qty`, 
        `delete_qty`, `remain_qty`, `add_date`, `add_time`,`pending_po_no`, `flag`) 
        VALUES ('$work_no','$work_order_item_id_fk','$order_qty','$pending_qty','$delete_qty','$remain_qty',
        '$cur_date','$cur_time','$pending_po_no', '$flag')";
        // }
        
        $res1 = mysqli_query($db,$sql);
        if($res1 == 1)
        {
            $j1 = "SELECT * FROM wholesale_work_order_pending_qty 
                    WHERE work_order_id_fk='$work_no' AND work_order_item_id_fk='$work_order_item_id_fk'";
                    

            $jres = mysqli_query($db,$j1);
            while($m = mysqli_fetch_array($jres))
            {
                $delivered_qty = $m['delivered_qty'];
            }
            $new_order_qty = (int)$order_qty - (int)$delete_qty;
            $new_remain_qty = (int)$new_order_qty - (int)$delivered_qty;

            //echo "\n\n\n\n";
            $update_sql = "UPDATE wholesale_work_order_pending_qty 
                            SET delete_qty='$delete_qty',remain_qty='$new_remain_qty' 
                            WHERE work_order_id_fk='$work_no' AND work_order_item_id_fk='$work_order_item_id_fk'";
            $g = mysqli_query($db,$update_sql);
            if($g == 1)
            {
                 $work_order_item_save_flag = 1;
            }
        }
        else
        {
            //$flag_ok = "0";
             $work_order_item_save_flag = 0;
        }

    }
    
    echo $work_order_item_save_flag;

    
?>
