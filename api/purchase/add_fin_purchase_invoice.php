<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $pi_date1 = date("d-m-Y", strtotime($pi_date));

    $flag = $_SESSION['flag'];

    if($flag==0)
    {
 $sql = "INSERT INTO `fin_purchase_invoice`(`fin_pi_no`, `branch`, `pi_date`, `fin_yr`, `supplier_id_fk`, `grn_no_fk`, `bill_date`, `bill_no`, `authorized_by`, `remark`, `disc_rs`, `trans_amt`, `unload`, `gross_amt`, `tax_amt`, `insurance_amt`, `tcs`, `others`, `net_amt`, `status`, `flag`) VALUES ('$pi_no','$branch','$pi_date1','$fin_yr','$supplier',0,'$bill_date','$bill_no','$authorised_by','$remark','$disc_amt','$trans_amt','$unload','$gross_amt','$tax_amt','$insurance','$tcs','$other','$net_amt',0, '$flag')";
    }
    else
    {
 $sql = "INSERT INTO `fin_purchase_invoice`(`fin_pi_no`, `branch`, `pi_date`, `fin_yr`, `supplier_id_fk`, `grn_no_fk`, `bill_date`, `bill_no`, `authorized_by`, `remark`, `disc_rs`, `trans_amt`, `unload`, `gross_amt`, `tax_amt`, `insurance_amt`, `tcs`, `others`, `net_amt`, `status`, `flag`) VALUES ('$pi_no','$branch','$pi_date1','$fin_yr','$supplier',0,'$bill_date','$bill_no','$authorised_by','$remark','$disc_amt','$trans_amt','$unload','$gross_amt',0,'$insurance','$tcs','$other','$net_amt',0, '$flag')";
    }
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    if($result)
    {
      $fpi_id_fk = mysqli_insert_id($db);
     
          $itemArray = json_decode($newRawItemArray, true);
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
              
              if($flag==0)
              {
               $sql = "INSERT INTO `fin_purchase_invoice_items`(`fpi_id_fk`, `grn_id_fk`, `grn_item_id_fk`, `item_id_fk`, `item_type`, `size`, `qty`, `sqfit`, `rate`, `amount`, `process_amt`, `bill_disc`, `bill_amt`, `tax`, `tax_amt`, `net_amt`, `trans/oct`, `italian_sqfit`, `italian_slides`, `gst_per`, `cgst`, `sgst`, `igst`) VALUES ('$fpi_id_fk','$grn_id','$grn_item_id_fk','$item_id_fk','$product_type','$size','$quantity','$sqfit','$rate','$amount','$pro_amount','$bill_per','$bill_amt','$tax','$tax_amt','$net_amt','$trans_oct','$italian_sqfit','$italian_slides','$gst_per','$cgst','$sgst','$igst')";
              }
              else
              {
               $sql = "INSERT INTO `fin_purchase_invoice_items`(`fpi_id_fk`, `grn_id_fk`, `grn_item_id_fk`, `item_id_fk`, `item_type`, `size`, `qty`, `sqfit`, `rate`, `amount`, `process_amt`, `bill_disc`, `bill_amt`, `tax`, `tax_amt`, `net_amt`, `trans/oct`, `italian_sqfit`, `italian_slides`, `gst_per`, `cgst`, `sgst`, `igst`) VALUES ('$fpi_id_fk','$grn_id','$grn_item_id_fk','$item_id_fk','$product_type','$size','$quantity','$sqfit','$rate','$amount','$pro_amount','$bill_per','$bill_amt',0,0,'$net_amt','$trans_oct','$italian_sqfit','$italian_slides',0,0,0,0)";
              }

               $update_status = "UPDATE grn SET pi_added='1' WHERE grn_id_pk='$grn_id'";
               $res_update = mysqli_query($db, $update_status) or die(mysqli_error($db));

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));

               $insert_ledger = "INSERT INTO purchase_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time)
                VALUES('$supplier', 0, '$net_amt', 'purchase invoice', '$net_amt', '$udate', '$utime')";
              $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));


            }
         
                $pi_no = substr($pi_no, 6);
                $sno=$pi_no+1;
               $sql12 = "update mstr_data_series set sr_no= '$sno' where name='finance_purchase_invoice' ";
                $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
                echo "1";
            }
            
            
          }
          else
           echo "02";
    }else
      echo "03";

?>