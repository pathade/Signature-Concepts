<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';

    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());

    $sql = "UPDATE `purchase_order` SET `sub_total`='$total',`discount_rs`='$discount_final',`adjustment`='$adjustment_final',`total`='$final_total' WHERE `id`='$po_id'";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    if($result)
    {
        $itemArray = json_decode($rawItemArray, true);
        // delete all grn items before updating
        if(!empty($itemArray))
        {
        foreach($itemArray as $itemObj)
            {
                $delete_woi = "DELETE FROM wholesale_work_order_items WHERE work_order_no_id_fk='$work_no' AND po_notbl='$po_no'";
                mysqli_query($db, $delete_woi) or die(mysqli_error($db));
            }
        }


        if(!empty($itemArray))
        {
            foreach($itemArray as $itemObj) 
            {
                $item_id_fk = $itemObj['item_id_fk'];
                $design_code=$itemObj['design_code'];
                $size=$itemObj['size'];
                $quantity = $itemObj['quantity'];
                $sqrft = $itemObj['sqrft'];
                $rate = $itemObj['rate'];
                $amount = $itemObj['amount'];
                $discount_per = $itemObj['discount_per'];
                $discount_rs = $itemObj['discount_rs'];
                $remark1 = $itemObj['remark1'];
                $checkbo_valtbl = $itemObj['checkbo_valtbl'];
                $Supplier = $itemObj['Supplier'];
                $pono = $itemObj['pono'];

                // update item 

                $sql = "INSERT INTO `wholesale_work_order_items`(`item_id_fk`, `qty`, `size`, `sqrfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `work_order_no_id_fk`, `product_category`, `remark`, `checkbo_valtbl`, `po_suppliertbl`, `po_notbl`) VALUES ('$item_id_fk', '$quantity','$size', '$sqrft', '$rate','$discount_per','$discount_rs','$amount','$work_no','$design_code','$remark1','$checkbo_valtbl','$Supplier', '$pono')";

                $resquery=mysqli_query($db, $sql) or die(mysqli_error($db));
            
            }

        }


        // $po_no=substr($po_no, 3);
        // $sno=$po_no+1;
        // $sql12 = "UPDATE mstr_data_series SET sr_no = '$sno' WHERE name='purchase_order' ";
        // $res = mysqli_query($db,$sql12);

        echo "1";

    }
    else
        echo "02";
}
else
    echo "03";

?>