<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';

    date_default_timezone_set('Asia/Kolkata');
    $cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $po_date1 = date("d-m-Y", strtotime($po_date));
    $sql = "UPDATE `exp_purchase_order` SET `po_date`='$po_date1',`expense_head_id_fk`='$exp_headexpense_head_id_fk',
    `vendor_id_fk`='$vendor_id_fk',`authorised_by`='$authorised_by',`total_qty`='$total_qty',`cal_amount`='$cal_amount', 
    `discount_per`='$discount_per',`discount_amt`='$discount_amt',`amt_after_dis`='$amt_after_dis',`tax_per`='$tax_per',
    `tax_amt`='$tax_amt',`net_amt`='$net_amt', `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com'
    WHERE `Id`='$epo_id'";
    $result = mysqli_query($db, $sql);

    if($result)
    {
        $itemArray = json_decode($newRawItemArray, true);
        // delete all grn items before updating
        if(!empty($itemArray))
        {
        foreach($itemArray as $itemObj)
            {
                $delete_purchase_item = "DELETE FROM exp_item_po WHERE po_id_fk='$epo_id'";
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
                $quantity = $itemObj['quantity'];
                $rate = $itemObj['rate'];
                $amount = $itemObj['amount'];

                // update grn item 
              $sql = "INSERT INTO `exp_item_po`(`po_id_fk`, `item_id_fk`, `quantity`, `rate`, `amount`) 
                VALUES ('$epo_id','$item_id_fk','$quantity', '$rate','$amount')";

                $resquery=mysqli_query($db, $sql);
            }

        }

        echo "1";

    }
    else
        echo "02";
}
else
    echo "03";

?>