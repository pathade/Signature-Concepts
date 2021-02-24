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
    $sql='';
    $flag=$_SESSION['flag'];
    if($flag==0){
    $sql = "INSERT INTO `supplier_return_good`(`branch`, `supplier`, `return_no`, `grn_no`, `mobile_no`, `address`, `transporter`, `vehicle`, `prepared_by`, `stock_point`, `date`, `subtotal`, `final_quantity`, `tax_amt`, `adjustment`, `total`,`flag`) VALUES ('$branch','$supplier','$return_no','$grn_no','$mobile_no','$address','$transporter','$vehicle','$prepared_by','$stock_point','$date1','$total','$final_quantity','$tax_amt','$adjustment','$final_total','$flag')";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    else{
      $sql = "INSERT INTO `supplier_return_good`(`branch`, `supplier`, `return_no`, `grn_no`, `mobile_no`, `address`, `transporter`, `vehicle`, `prepared_by`, `stock_point`, `date`, `subtotal`, `final_quantity`, `tax_amt`, `adjustment`, `total`,`flag`) VALUES ('$branch','$supplier','$return_no','$grn_no','$mobile_no','$address','$transporter','$vehicle','$prepared_by','$stock_point','$date1','$total','$final_quantity',0,'$adjustment','$final_total','$flag')";
      $result = mysqli_query($db, $sql) or die(mysqli_error($db));
      }
    if($result)
    {
          $srg_id_fk = mysqli_insert_id($db);
     
          $itemArray = json_decode($rawItemArray, true);
          if(!empty($itemArray))
          {
            foreach($itemArray as $itemObj) 
            {
              // var_dump($itemArray);
          //     $grn_id_fk = $itemObj['grn_id_fk'];
              $item_detail = $itemObj['item_detail'];
              $design_code=$itemObj['design_code'];
              $size=$itemObj['size'];
              $quantity = $itemObj['quantity'];
              $rate = $itemObj['rate'];
              $amount = $itemObj['amount'];
              $act_quantity = $itemObj['act_quantity'];
              $act_rate = $itemObj['act_rate'];
              $act_amount = $itemObj['act_amount'];
              $gst_per = $itemObj['gst_per'];
              $cgst = $itemObj['cgst'];
              $sgst = $itemObj['sgst'];
              $igst = $itemObj['igst'];
 
            
              if($flag==0)
              {
               $sql = "INSERT INTO `supplier_return_good_items`(`srg_id_fk`, `item_detail`, `design_code`, `size`, `quantity`, `rate`, `amount`, `act_quantity`, `act_rate`, `act_amount`, `gst_per`, `cgst`, `sgst`, `igst`) VALUES ('$srg_id_fk','$item_detail','$design_code','$size','$quantity','$rate','$amount','$act_quantity','$act_rate','$act_amount','$gst_per','$cgst','$sgst','$igst')";
              }
              else
              {
               $sql = "INSERT INTO `supplier_return_good_items`(`srg_id_fk`, `item_detail`, `design_code`, `size`, `quantity`, `rate`, `amount`, `act_quantity`, `act_rate`, `act_amount`, `gst_per`, `cgst`, `sgst`, `igst`) VALUES ('$srg_id_fk','$item_detail','$design_code','$size','$quantity','$rate','$amount','$act_quantity','$act_rate','$act_amount',0,0,0,0)";
              }

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));

              $insert_ledger = "INSERT INTO purchase_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time)
                VALUES('$supplier', 0, '$actual_amt', 'supplier return good', '$actual_amt', '$udate', '$utime')";
              $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));

            }
         
                $return_no = substr($return_no, 6);
               $sno=$return_no+1;
               $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='supplier_return_good' ";
               $res = mysqli_query($db,$sql12) or die(mysqli_error($db));

               echo "1";
            
          }
          else
           echo "02";
    }
    else
      echo "03";
}
?>