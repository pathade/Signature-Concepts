<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
 $sql = "INSERT INTO `fin_purchase_invoice`(`fin_pi_no`, `branch`, `pi_date`, `fin_yr`, `supplier_id_fk`, `grn_no_fk`, `bill_date`, `bill_no`, `authorized_by`, `remark`, `total_qty`, `total_sqfit`, `total_amt`, `proc_amt`, `disc_per`, `disc_rs`, `trans_amt`, `unload`, `octroi`, `gross_amt`, `excise_per`, `excise_amt`, `exedu_per`, `exedu_amt`, `exhedu_per`, `exhedu_amt`, `tax_applicable`, `tax_per`, `tax_amt`, `freight`, `insurance_per`, `insurance_amt`, `others`, `net_amt`, `status`) VALUES ('$pi_no','$branch','$pi_date','$fin_yr','$supplier',0,'$bill_date','$bill_no','$authorised_by','$remark','$total_qty','$total_sqfit','$total_amt','$process_amt','$disc_per','$disc_amt','$trans_amt','$unload','$octroi','$gross_amt','$excise_per','$excise_amt','$exedu_per','$exedu_amt','$exhedu_per','$exhedu_amt','yes','$tax_select','$tax_amt','$freight','$insurance_per','$insurance_amt','$other','$net_amt',0)";
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
              $cess_per = $itemObj['cess_per'];
              $cess_amt = $itemObj['cess_amt'];
              $grn_id = $itemObj['grn_id'];
              
            
               $sql = "INSERT INTO `fin_purchase_invoice_items`(`fpi_id_fk`, `grn_id_fk`, `grn_item_id_fk`, `item_id_fk`, `item_type`, `size`, `qty`, `sqfit`, `rate`, `amount`, `process_amt`, `bill_disc`, `bill_amt`, `tax`, `tax_amt`, `net_amt`, `trans/oct`, `italian_sqfit`, `italian_slides`, `gst_per`, `cgst`, `sgst`, `igst`, `cess_per`, `cess_amt`) VALUES ('$fpi_id_fk','$grn_id','$grn_item_id_fk','$item_id_fk','$product_type','$size','$quantity','$sqfit','$rate','$amount','$pro_amount','$bill_per','$bill_amt','$tax',$tax_amt,'$net_amt','$trans_oct','$italian_sqfit','$italian_slides','$gst_per','$cgst','$sgst','$igst','$cess_per','$cess_amt')";

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));


            }
         
              
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