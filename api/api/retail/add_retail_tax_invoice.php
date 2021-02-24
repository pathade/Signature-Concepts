<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST); 
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    $sql = "INSERT INTO `retail_tax_invoice`(`pi_no`, `po_no_fk`, `customer`, `mobile_no`, `address`, 
    `branch`, `transporter`, `vehicle`, `prepared_by`, `date`, `ledger_bal`, `stock_point`, `qty`, 
    `sqfit`, `gross_amt`, `total`, `discount_per`, `discount_rs`, `adjustment`, `process_amt`,
    `tax_amt`, `net_amt`) VALUES ('$pi_no','$po_no','$customer','$mobile_no','$address','$branch',
    '$transporter','$vehicle','$prepared_by','$date1',0,'$stock_point','$total_qty','$total_sqfit',
    '$gross_amt','$total','$disc_percent','$discount_final','$adjustment_final','$process_amount',
    '$tax_amt','$final_total')";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    $rti_id_fk = mysqli_insert_id($db);
    
    $update_status = "UPDATE retail_proforma SET tax_invoice_added='1' WHERE id_pk='$po_no'";
    $res_update = mysqli_query($db, $update_status) or die(mysqli_error($db));

    if($result)
    {
     
          $itemArray = json_decode($newRawItemArray, true);
          if(!empty($itemArray))
          {
            foreach($itemArray as $itemObj) 
            {
              
              $product_category = $itemObj['product_category'];
              $item_id_fk = $itemObj['item_id_fk'];
              $size = $itemObj['size'];
              $uom = $itemObj['uom'];
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
              
            
               $sql = "INSERT INTO `retail_tax_invoice_items`(`rti_id_fk`, `product_cat`, `product_design`, `size`, `uom`, `qty`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`,`gst_per`,`cgst`,`sgst`,`igst`, `remark`) VALUES ('$rti_id_fk','$product_category','$item_id_fk','$size','$uom','$quantity','$sqfit','$rate','$discount_per','$discount_rs','$amount','$gst_per','$cgst','$sgst','$igst','$remark')";
               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));


            }
         
              $pi_no = substr($pi_no, 6);
                $sno=$pi_no+1;
               $sql12 = "update mstr_data_series set sr_no= '$sno' where name='retail_tax_invoice' ";
                $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
                echo "1";
            }
            
            
          }
          else
           echo "02";
    }else
      echo "03";

?>