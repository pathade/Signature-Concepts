<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
 $sql = "UPDATE `retail_tax_invoice` SET `qty`='$total_qty', `sqfit`='$total_sqfit', `gross_amt`='$gross_amt', `total`='$total', `discount_per`='$disc_percent', `discount_rs`='$discount_final', `adjustment`='$adjustment_final', `process_amt`='$process_amount',`tax_amt`='$tax_amt', `net_amt`='$final_total' WHERE id_pk='$rti_id'";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    if($result)
    {
        $rti_id_fk = mysqli_insert_id($db);
    
        $itemArray = json_decode($newRawItemArray, true);
        if(!empty($itemArray))
        {
        if(!empty($itemArray))
        {
            foreach($itemArray as $itemObj)
            {
                $delete_purchase_item = "DELETE FROM retail_tax_invoice_items WHERE rti_id_fk='$rti_id'";
                mysqli_query($db, $delete_purchase_item) or die(mysqli_error($db));
            }
        }

        foreach($itemArray as $itemObj) 
        {
            
            $product_category = $itemObj['product_category'];
            $item_id_fk = $itemObj['item_id_fk'];
            $size = $itemObj['size'];
            $quantity = $itemObj['quantity'];
            $sqfit = $itemObj['sqfit'];
            $rate = $itemObj['rate'];
            $discount_rs = $itemObj['discount_rs'];
            $discount_per = $itemObj['discount_per'];
            $amount = $itemObj['amount'];
            $gst_per = $itemObj['gst_per'];
            $cgst = $itemObj['cgst'];
            $sgst = $itemObj['sgst'];
            $igst = $itemObj['igst'];
            $remark = $itemObj['remark'];
            
        
            $sql = "INSERT INTO `retail_tax_invoice_items`(`rti_id_fk`, `product_cat`, `product_design`, `size`, `qty`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`,`gst_per`,`cgst`,`sgst`,`igst`, `remark`) VALUES ('$rti_id','$product_category','$item_id_fk','$size','$quantity','$sqfit','$rate','$discount_per','$discount_rs','$amount','$gst_per','$cgst','$sgst','$igst','$remark')";
            $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));


        }
        
            
            // $sno=$pi_no+1;
            // $sql12 = "update mstr_data_series set sr_no= '$sno' where name='retail_tax_invoice' ";
            // $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
            echo "1";
        }
        
        
        }
        else
        echo "02";
    }else
      echo "03";

?>