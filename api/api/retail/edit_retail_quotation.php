<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    
 $sql = "UPDATE `retail_quotation` SET `qty`='$total_qty', `sqfit`='$total_sqft', `gross_amt`='$gross_amt', `transport`='$trans', `unload`='$unload', `total`='$total', `disc_per`='$disc_percent', `disc_rs`='$discount_final', `adjustment`='$adjustment_final', `net_amt`='$final_total' WHERE id_pk='$rq_id'";
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
                $delete_purchase_item = "DELETE FROM retail_quotation_items WHERE rq_id_fk='$rq_id'";
                mysqli_query($db, $delete_purchase_item) or die(mysqli_error($db));
            }
        }

        foreach($itemArray as $itemObj) 
        {
            
            $item_id_fk = $itemObj['item_id_fk'];
            $design_code = $itemObj['design_code'];
            $size = $itemObj['size'];
            $uom = $itemObj['uom'];
            $quantity = $itemObj['quantity'];
            $sqft = $itemObj['sqft'];
            $rate = $itemObj['rate'];
            $box_quantity = $itemObj['box_quantity'];
            $box_rate = $itemObj['box_rate'];
            $discount_rs = $itemObj['discount_rs'];
            $discount_per = $itemObj['discount_per'];
            $amount = $itemObj['amount'];
            $remark = $itemObj['remark'];
            
        
            $sql = "INSERT INTO `retail_quotation_items`(`rq_id_fk`, `product_cat`, `product_design`, `size`, `uom`, `qty`,`sqfit`, `rate`, `box_quantity`, `box_rate`, `disc_per`, `disc_rs`, `amount`, `remark`) VALUES ('$rq_id','$item_id_fk','$design_code','$size','$uom','$quantity','$sqft','$rate','$box_quantity','$box_rate','$discount_per','$discount_rs','$amount','$remark')";
            $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));


        }
        
            
            // $sno=$order_no+1;
            // $sql12 = "update mstr_data_series set sr_no= '$sno' where name='retail_quotation' ";
            // $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
            echo "1";
        }
        
        
        }
        else
        echo "02";
    }else
      echo "03";

?>