<?php
    include('../../database/dbconnection.php');

    $n = "UPDATE  wholesale_receipt 
    WHERE SET del_status='1' WHERE  rec_id_pk='".$_GET['id']."'";
    $m = mysqli_query($db,$n);
    while($b = mysqli_fetch_array($m))
    { 
        // $wh_wo_id_fk = $b['wh_wo_id_fk'];
        // $n = "SELECT * FROM wholsale_delivery_challan_items WHERE  work_order_id_fk='$wh_wo_id_fk' AND dc_id_fk='".$_GET['id']."'";
        // $m = mysqli_query($db,$n);
        // while($b = mysqli_fetch_array($m))
        // {
        //     $work_order_item_id_fk = $b['work_order_item_id_fk'];
        //     $dc_deliverd_qty = $b['deliverd_qty'];

        //     $n = "SELECT * FROM wholesale_work_order_pending_qty WHERE work_order_id_fk='$wh_wo_id_fk' AND work_order_item_id_fk='$work_order_item_id_fk'";
        // $nres = mysqli_query($db,$n);
        // while($nr = mysqli_fetch_array($nres))
        // {
        //     $p_delivered_qty = $nr['delivered_qty'];
        //     $p_order_qty = $nr['order_qty'];
        //     $p_new_del_qty = (int)$p_delivered_qty - (int)$dc_deliverd_qty;
        //     $new_p_remain_qty =(int)$p_order_qty - (int)$p_new_del_qty;

        //     $usal = "UPDATE wholesale_work_order_pending_qty 
        //             SET delivered_qty='$p_new_del_qty' , remain_qty='$new_p_remain_qty' 
        //             WHERE work_order_id_fk='$wh_wo_id_fk' 
        //             AND work_order_item_id_fk='$work_order_item_id_fk'";
        //     $b = mysqli_query($db,$usal);

        //     if($b == 1)
        //     {
        //         $ditem = "DELETE FROM wholesale_delivery_challan WHERE wd_ch_id_pk='".$_GET['id']."'";
        //         $k = mysqli_query($db,$ditem);

        //         $ditem = "DELETE FROM wholsale_delivery_challan_items WHERE dc_id_fk='".$_GET['id']."'";
        //         $k = mysqli_query($db,$ditem);


        //         if($k)
        //         {
        //             header('location:../../src/wholesale/view_wholesale_delivery_challan.php');
        //         }
        //         else
        //         {
        //             echo 'Delete error';
        //         }
        //     }
        // }
            
        // }
        
       


    }

    
?>