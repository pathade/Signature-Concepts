<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $sql = "UPDATE `retail_proforma` 
            SET `qty`='$total_qty', `sqfit`='$total_sqfit', 
                `gross_amt`='$gross_amt', `total`='$total', 
                `discount_per`='$disc_percent', `discount_rs`='$discount_final', 
                `others`='$adjustment_final', `process_amt`='$process_amount',
                `net_amt`='$final_total' 
            WHERE id_pk='$order_id'";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    if($result)
    {
        $itemArray = json_decode($newRawItemArray, true);
        if(!empty($itemArray))
        {
            if(!empty($itemArray))
            {
                foreach($itemArray as $itemObj)
                {
                    $delete_purchase_item = "DELETE FROM retail_proforma_items WHERE rpi_id_fk='$order_id'";
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
                $remark = $itemObj['remark'];
                $checkbox_val = $itemObj['checkbox_val'];
                $posupp = $itemObj['posupp'];
                $pono_tbl = $itemObj['pono_tbl'];
                $sql = "INSERT INTO `retail_proforma_items`
                        (`rpi_id_fk`, `item_id_fk`, `qty`, `size`, `sqfit`, `rate`, 
                        `disc_per`, `disc_rs`, `amount`, `product_category`, 
                        `remark`, `checkbo_valtbl`, `po_suppliertbl`, `po_notbl`) 
                        VALUES ('$order_id','$item_id_fk','$quantity','$size',
                        '$sqfit','$rate','$discount_per','$discount_rs','$amount',
                        '$product_category','$remark','$checkbox_val','$posupp',
                        '$po_notbl')";

                $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));
            }
            $sno=$order_no+1;
            $sql12 = "UPDATE mstr_data_series 
                        set sr_no= '$sno' 
                        where name='retail_proforma' ";
            $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
        }
        
            
            // $sno=$order_no+1;
            // $sql12 = "update mstr_data_series set sr_no= '$sno' where name='retail_proforma' ";
            // $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
            echo "1";
        }
    }
    else
    {
        echo "02";
    }
}
else
{
    echo "03";
}
      

?>