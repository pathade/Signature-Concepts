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
    $flag_check = 0;
    if($cheque_no != 0)
    {

      $inc_cheque = $cheque_no+1;
      $update_status_cheque = "UPDATE mstr_cheque SET current_cheque_no='$inc_cheque' WHERE bank_id_fk='$bank' AND account_no='$account_no'";
      $res_update_cheque = mysqli_query($db, $update_status_cheque) or die(mysqli_error($db));
    } 
    
    if($flag==0)
    {
      $sql = "INSERT INTO `retail_return_goods`(`return_no`, `branch`, `customer`, `rp_id_fk`, `mobile_no`, 
    `address`, `transporter`, `vehicle`, `work_no`, `date`, `time`, `bank`, `ac_no`, `cheque_no`, `trans_amt`, 
    `option_btn`, `stock_point`, `remark`, `qty`, `sqfit`, `gross_amt`, `total`, `disc_per`, `disc_rs`, 
    `adjustment`, `process_amt`, `tax_amt`, `net_amt`, `add_date`, `add_time`, `added_by`, `update_date`, 
    `update_time`, `updated_by`, `flag`) VALUES ('$return_no','$branch','$customer','$po_no','$mobile_no','$address',
    '$transporter','$vehicle',null,'$date1',null,'$bank','$account_no','$cheque_no','$trans_amt','$bank_type',
    '$stock_point','$remark','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final',
    '$adjustment_final','$process_amount','$tax_amt','$final_total','$date',null,null,null,null,null, '$flag')";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    else
    {
      $sql = "INSERT INTO `retail_return_goods`(`return_no`, `branch`, `customer`, `rp_id_fk`, `mobile_no`, 
    `address`, `transporter`, `vehicle`, `work_no`, `date`, `time`, `bank`, `ac_no`, `cheque_no`, `trans_amt`, 
    `option_btn`, `stock_point`, `remark`, `qty`, `sqfit`, `gross_amt`, `total`, `disc_per`, `disc_rs`, 
    `adjustment`, `process_amt`, `tax_amt`, `net_amt`, `add_date`, `add_time`, `added_by`, `update_date`, 
    `update_time`, `updated_by`, `flag`) VALUES ('$return_no','$branch','$customer','$po_no','$mobile_no','$address',
    '$transporter','$vehicle',null,'$date1',null,'$bank','$account_no','$cheque_no','$trans_amt','$bank_type',
    '$stock_point','$remark','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final',
    '$adjustment_final','$process_amount',0,'$final_total','$date',null,null,null,null,null, '$flag')";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }


    // $sql = "INSERT INTO `retail_return_goods`(`return_no`, `branch`, `customer`, `rp_id_fk`, `mobile_no`, 
    // `address`, `transporter`, `vehicle`, `work_no`, `date`, `time`, `bank`, `ac_no`, `cheque_no`, `trans_amt`, 
    // `option_btn`, `stock_point`, `remark`, `qty`, `sqfit`, `gross_amt`, `total`, `disc_per`, `disc_rs`, 
    // `adjustment`, `process_amt`, `tax_amt`, `net_amt`, `add_date`, `add_time`, `added_by`, `update_date`, 
    // `update_time`, `updated_by`) VALUES ('$return_no','$branch','$customer','$po_no','$mobile_no','$address',
    // '$transporter','$vehicle',null,'$date1',null,'$bank','$account_no','$cheque_no','$trans_amt','$bank_type',
    // '$stock_point','$remark','$total_qty','$total_sqfit','$gross_amt','$total','$disc_percent','$discount_final',
    // '$adjustment_final','$process_amount','$tax_amt','$final_total','$date',null,null,null,null,null)";
    // $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $rrg_id_fk = mysqli_insert_id($db);

    $update_status = "UPDATE retail_proforma SET return_good_added='1' WHERE id_pk='$po_no'";
    $res_update = mysqli_query($db, $update_status) or die(mysqli_error($db));

    if($result)
    {
          if($bank_type == "Cheque Back")
          {
              $flag_check = 1;
              //query for bank transaction 
              $data_sql ="SELECT * FROM mstr_data_series WHERE name='fin_bank_transaction'";
              $res_data = mysqli_query($db,$data_sql);
              while($drw = mysqli_fetch_array($res_data)) 
              {
                  $bank_sr_no = $drw['sr_no']; 
                  $next_bank_no = $bank_sr_no + 1;
              }
              $first = date("y",strtotime("-1 year"));
              $second = date("y");
              $bank_sr_no1 = $first."-".$second."/".$bank_sr_no;
              $fin_yr = $first."-".$second;
              if($flag==0)
              {
              $sqlb = "INSERT INTO `fin_bank_transaction`( 
              `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
              `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
              `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
              `fin_yr`, `status`, `party_from`, `against`, `flag`)
              VALUES ('Payment','$bank_type','$bank','$account_no',
              '$date','','$final_total','$customer','$remark','$bank_sr_no1',
              '$cheque_no','$date','$date','$utime','N','00-00-0000','$fin_yr','','RC','Retail Return Goods', '$flag')";
              }

              $sql_res = mysqli_query($db,$sqlb);
              
              if($sql_res == 1)
              {
                  $bn = "Update mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction'";
                  $bn_res = mysqli_query($db,$bn);
              }
          }
     
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
              $return_qty = $itemObj['return_qty'];
              $sqfit = $itemObj['sqfit'];
              $rate = $itemObj['rate'];
              $discount_rs = $itemObj['discount_rs'];
              $discount_per = $itemObj['discount_per'];
              $amount = $itemObj['amount'];
              $return_amt = $itemObj['return_amt'];
              $gst_per = $itemObj['gst_per'];
              $cgst = $itemObj['cgst'];
              $sgst = $itemObj['sgst'];
              $igst = $itemObj['igst'];
              $remark = $itemObj['remark'];
              
              
              if($flag==0)
              {
               $sql = "INSERT INTO `retail_return_goods_items`(`rrg_id_fk`, `product_cat`, `product_design`, `size`, `uom`, `qty`, `return_qty`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `return_amt`, `gst_per`,`cgst`,`sgst`,`igst`, `remark`) VALUES ('$rrg_id_fk','$product_category','$item_id_fk','$size','$uom','$quantity','$return_qty','$sqfit','$rate','$discount_per','$discount_rs','$amount','$return_amt','$gst_per','$cgst','$sgst','$igst','$remark')";

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));
              }
              else
              {
               $sql = "INSERT INTO `retail_return_goods_items`(`rrg_id_fk`, `product_cat`, `product_design`, `size`, `uom`, `qty`, `return_qty`, `sqfit`, `rate`, `disc_per`, `disc_rs`, `amount`, `return_amt`, `gst_per`,`cgst`,`sgst`,`igst`, `remark`) VALUES ('$rrg_id_fk','$product_category','$item_id_fk','$size','$uom','$quantity','$return_qty','$sqfit','$rate','$discount_per','$discount_rs','$amount','$return_amt',0,0,0,0,'$remark')";

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));
              }

               // ledger query
            if($flag_check==1)
            {
              // if($flag==0)
              // {
                $sql_ledger1 = "INSERT INTO `retail_ledger_main`( `customer_id_fk`,`bank_id_fk`, `account_no`, `debit`,`credit`, `against`, `opening_balance`, `date`,`add_time`, `flag`) 
                                VALUES ('$customer','$bank','$account_no','$return_amt','0','retail return good','$return_amt','$date1','$utime', '$flag')";
              // }
                $res_ledger1 = mysqli_query($db,$sql_ledger1) or die('INSERT LEDGER: '.mysqli_error($db));

            }


            }
         
              $return_no = substr($return_no, 6);
                $sno=$return_no+1;
               $sql12 = "update mstr_data_series set sr_no= '$sno' where name='retail_return_goods' ";
                $res = mysqli_query($db,$sql12) or die(mysqli_error($db));
                echo "1";
            }
            
            
          }
          else
           echo "02";
    }else
      echo "03";

?>