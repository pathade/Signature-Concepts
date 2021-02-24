<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A'); 
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $date1 = date("d-m-Y", strtotime($date));
    
    $length1 = count($newRawItemArray1);
    for($j = 0;$j<$length1;$j++)
    {   
        //echo "jjj is:".$j;echo "\n";
            
        $work_no = $newRawItemArray1[$j]['work_no'];
        $pending_po_no = $newRawItemArray1[$j]['pending_po_no'];
        $order_qty =  $newRawItemArray1[$j]['order_qty'];
        $pending_qty =  $newRawItemArray1[$j]['pending_qty'];
        $delete_qty =  $newRawItemArray1[$j]['delete_qty'];
        $remain_qty =  $newRawItemArray1[$j]['remain_qty'];
    
        $sql = "INSERT INTO `wholesale_delete_pending_qty`( 
        `work_order_id_fk`, `work_order_item_id_fk`, `order_qty`, `pending_qty`, 
        `delete_qty`, `remain_qty`, `add_date`, `add_time`) 
        VALUES ('$work_no','$pending_po_no','$order_qty','$pending_qty','$delete_qty','$remain_qty',
        '$cur_date','$cur_time')";

        
        $res1 = mysqli_query($db,$sql);
        if($res1 == 1)
        {
            //$flag_ok = "1";
            $k = "SELECT max(dci_id_pk) 
                    FROM wholsale_delivery_challan_items 
                    WHERE work_order_item_id_fk='$pending_po_no'";

            $h = mysqli_query($db,$k);
            while($m = mysqli_fetch_array($h))
            {
                $dci_id_pk = $m['max(dci_id_pk)'];
                $b = "SELECT * FROM wholsale_delivery_challan_items 
                WHERE dci_id_pk='$dci_id_pk'";
                $l = mysqli_query($db,$b);
                while($m = mysqli_fetch_array($l))
                {
                    $dqty = $m['delete_pending_qty'];
                }
                $ndq = $dqty + $delete_qty;

                
                $s = "UPDATE wholsale_delivery_challan_items 
                SET delete_pending_qty='$dqty' ,
                `remaining_qty`='$remain_qty'
                WHERE dci_id_pk='$dci_id_pk'";
                $ll = mysqli_query($db,$s);

                //echo $work_order_item_save_flag = 1;
            }

            $k = "SELECT max(woi_id_fk) 
                    FROM wholesale_work_order_items 
                    WHERE woi_id_fk='$pending_po_no'";

            $h = mysqli_query($db,$k);

            
            while($m = mysqli_fetch_array($h))
            {
                $woi_id_fk = $m['max(woi_id_fk)'];
                $b = "SELECT * FROM wholesale_work_order_items WHERE woi_id_fk='$woi_id_fk'";
                $l = mysqli_query($db,$b);
                while($m = mysqli_fetch_array($l))
                {
                    $dqty = $m['delete_qty'];
                }
                $ndq = $dqty + $delete_qty;
                
                $s = "UPDATE wholesale_work_order_items 
                SET delete_qty='$ndq' ,
                `remain_qty`='$remain_qty'
                WHERE woi_id_fk='$woi_id_fk'";
                $ll = mysqli_query($db,$s);

                //echo $work_order_item_save_flag = 1;
            }
            echo $work_order_item_save_flag = 1;
        }
        else
        {
            //$flag_ok = "0";
            echo $work_order_item_save_flag = 0;
        }

    }
    
    
    
?>
