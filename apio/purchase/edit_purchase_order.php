<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';

    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());

    $sql = "UPDATE `purchase_order` SET `sub_total`='$total',`discount_rs`='$discount_final',`adjustment`='$adjustment_final',`total`='$final_total' WHERE `id`='$po_id'";
    $result = mysqli_query($db, $sql);

    if($result)
    {
        $itemArray = json_decode($rawItemArray, true);
        // delete all grn items before updating
        if(!empty($itemArray))
        {
        foreach($itemArray as $itemObj)
            {
                $delete_purchase_item = "DELETE FROM purchase_order_items WHERE purchase_order_id_fk='$po_id'";
                if(mysqli_query($db, $delete_purchase_item))
                    continue;
                else
                    echo "Delete grn item error";
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

                // update grn item 
                $sql = "INSERT INTO `purchase_order_items`(`purchase_order_id_fk`, `item_id_fk`, `design_code`, `size`, `quantity`, `sqrft`, `rate`, `amount`, `discount_per`, `discount_rs`, `remark`) VALUES ('$po_id','$item_id_fk','$design_code','$size','$quantity', '$sqrft', '$rate','$amount','$discount_per','$discount_rs','$remark1')";

                $resquery=mysqli_query($db, $sql);
            }

        }


        // $po_no=substr($po_no, 3);
        // $sno=$po_no+1;
        // $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='purchase_order' ";
        // $res = mysqli_query($db,$sql12);

        echo "1";

    }
    else
        echo "02";
}
else
    echo "03";

?>