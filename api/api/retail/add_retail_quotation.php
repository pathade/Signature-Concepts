<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    $flag=$_SESSION['flag'];
    if($flag==0)
    {
      $sql = "INSERT INTO `retail_quotation`(`order_no`, `branch`, `customer`, `mobile_no`, `address`, `date`, `qty`, `sqfit`,`gross_amt`, `transport`, `unload`, `total`, `disc_per`, `disc_rs`, `adjustment`, `process_amt`, `tax_amt`, `net_amt`, `flag`) VALUES ('$order_no','$branch','$customer','$mobile_no','$address','$date1','$total_qty','$total_sqft','$gross_amt', '$trans','$unload','$total','$disc_percent','$discount_final','$adjustment_final',null,null,'$final_total', '$flag')";
    
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));  
    }
    else
    {
      $sql = "INSERT INTO `retail_quotation`(`order_no`, `branch`, `customer`, `mobile_no`, `address`, `date`, `qty`, `sqfit`,`gross_amt`, `transport`, `unload`, `total`, `disc_per`, `disc_rs`, `adjustment`, `process_amt`, `tax_amt`, `net_amt`, `flag`) VALUES ('$order_no','$branch','$customer','$mobile_no','$address','$date1','$total_qty','$total_sqft','$gross_amt', '$trans','$unload','$total','$disc_percent','$discount_final','$adjustment_final',null,null,'$final_total', '$flag')";
    
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));  
    }
    // $sql = "INSERT INTO `retail_quotation`(`order_no`, `branch`, `customer`, `mobile_no`, `address`, `date`, `qty`, `sqfit`,`gross_amt`, `transport`, `unload`, `total`, `disc_per`, `disc_rs`, `adjustment`, `process_amt`, `tax_amt`, `net_amt`) VALUES ('$order_no','$branch','$customer','$mobile_no','$address','$date1','$total_qty','$total_sqft','$gross_amt', '$trans','$unload','$total','$disc_percent','$discount_final','$adjustment_final',null,null,'$final_total')";
    
    // $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    if($result)
    {
      $rq_id_fk = mysqli_insert_id($db);
     
          $itemArray = json_decode($newRawItemArray, true);
          if(!empty($itemArray))
          {
            foreach($itemArray as $itemObj) 
            {
              
              // $product_category = $itemObj['product_category'];
              $design_code = $itemObj['design_code'];
              $item_id_fk = $itemObj['item_id_fk'];
              $size = $itemObj['size'];
              $uom = $itemObj['uom'];
              $quantity = $itemObj['quantity'];
              $sqfit = $itemObj['sqft'];
              $rate = $itemObj['rate'];
              $box_qty = $itemObj['box_quantity'];
              $box_rate = $itemObj['box_rate'];
              $discount_rs = $itemObj['discount_rs'];
              $discount_per = $itemObj['discount_per'];
              $amount = $itemObj['amount'];
              // $gst_per = $itemObj['gst_per'];
              // $cgst = $itemObj['cgst'];
              // $sgst = $itemObj['sgst'];
              // $igst = $itemObj['igst'];
              $remark = $itemObj['remark'];
              
            
               $sql = "INSERT INTO `retail_quotation_items`(`rq_id_fk`, `product_cat`, `product_design`, `size`, `uom`, `qty`, `sqfit`, `rate`, `box_quantity`, `box_rate`, `disc_per`, `disc_rs`, `amount`, `remark`) VALUES ('$rq_id_fk','$item_id_fk','$design_code','$size','$uom','$quantity','$sqfit','$rate','$box_qty','$box_rate','$discount_per','$discount_rs','$amount','$remark')";
               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));


            }
         
              
                $sno=substr($order_no,6)+1;
               $sql12 = "update mstr_data_series set sr_no= '$sno' where name='retail_quotation' ";
                $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
                echo "1";
            }
            
            
          }
          else
           echo "02";
    }else
      echo "03";

?>