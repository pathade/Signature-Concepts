<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';

    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());

    $sql = "UPDATE `fin_purchase_invoice` SET `disc_rs`='$disc_amt', `trans_amt`='$trans_amt', `unload`='$unload', `gross_amt`='$gross_amt', `tax_amt`='$tax_amt', `insurance_amt`='$insurance', `tcs`='$tcs', `others`='$other',`net_amt`='$net_amt' WHERE `id_pk`='$edit_id'";
    $result = mysqli_query($db, $sql);

    if($result)
    {
        $itemArray = json_decode($newRawItemArray, true);
        // delete all grn items before updating
        if(!empty($itemArray))
        {
        foreach($itemArray as $itemObj)
            {
                $delete_purchase_item = "DELETE FROM fin_purchase_invoice_items WHERE fpi_id_fk='$edit_id'";
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
              $grn_item_id_fk = $itemObj['grn_item_id'];
              $item_id_fk = $itemObj['item_id_fk'];
              $product_type = $itemObj['product_type'];
              $size = $itemObj['size'];
              $quantity = $itemObj['quantity'];
              $sqfit = $itemObj['sqfit'];
              $rate = $itemObj['rate'];
              $amount = $itemObj['amount'];
              $pro_amount = $itemObj['pro_amount'];
              $bill_per = $itemObj['bill_per'];
              $bill_amt = $itemObj['bill_amt'];
              $tax = $itemObj['tax'];
              $tax_amt = $itemObj['tax_amt'];
              $net_amt = $itemObj['net_amt'];
              $trans_oct = $itemObj['trans_oct'];
              $italian_sqfit = $itemObj['italian_sqfit'];
              $italian_slides = $itemObj['italian_slides'];
              $gst_per = $itemObj['gst_per'];
              $cgst = $itemObj['cgst'];
              $sgst = $itemObj['sgst'];
              $igst = $itemObj['igst'];
              $grn_id = $itemObj['grn_id'];
              
            
               $sql = "INSERT INTO `fin_purchase_invoice_items`(`fpi_id_fk`, `grn_id_fk`, `grn_item_id_fk`, `item_id_fk`, `item_type`, `size`, `qty`, `sqfit`, `rate`, `amount`, `process_amt`, `bill_disc`, `bill_amt`, `tax`, `tax_amt`, `net_amt`, `trans/oct`, `italian_sqfit`, `italian_slides`, `gst_per`, `cgst`, `sgst`, `igst`) VALUES ('$edit_id','$grn_id','$grn_item_id_fk','$item_id_fk','$product_type','$size','$quantity','$sqfit','$rate','$amount','$pro_amount','$bill_per','$bill_amt','$tax',$tax_amt,'$net_amt','$trans_oct','$italian_sqfit','$italian_slides','$gst_per','$cgst','$sgst','$igst')";

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));
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