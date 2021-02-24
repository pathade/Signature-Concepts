<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  session_start();
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    $sql='';
    $flag=$_SESSION['flag'];
    // if($flag==0){

    $sql = "INSERT INTO `purchase_order`( `date`, `branch`, `purchase_order_no`, `supplier_id_fk`,
                                      `mobile_no`, `address`, `remark`, `sub_total`, `discount_rs`, `adjustment`, `total`, `process_amount`, 
                                      `status`, `add_time`, `added_by`, `updated_date`, `update_time`, `updated_by`, `delete_status`,`flag`) 
                                          VALUES ('$date1','$branch','$purchase_order_no','$supplier_id','$mobile_no','$address','$Remark','$total','$discount_final','$adjustment_final','$final_total','0','0','$utime','','$udate','$utime','','0','$flag')";
    // }
    
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    if($result)
    {
      $purchase_order_id_fk = mysqli_insert_id($db);
     
          $itemArray = json_decode($rawItemArray, true);
          if(!empty($itemArray))
          {
            foreach($itemArray as $itemObj) 
            {
              
              $item_id_fk = $itemObj['item_id_fk'];
              $design_code = $itemObj['design_code'];
              $size = $itemObj['size'];
              $quantity = $itemObj['quantity'];
              $sqft = $itemObj['sqrft'];
              $rate = $itemObj['rate'];
              $discount_rs = $itemObj['discount_rs'];
              $discount_per = $itemObj['discount_per'];
              $amount = $itemObj['amount'];
              $remark1 = $itemObj['remark1'];
              
            
                            
               $sql = "INSERT INTO `purchase_order_items`(`purchase_order_id_fk`, `item_id_fk`, `design_code`, `size`, `quantity`, `sqrft`, `rate`,`amount`, `discount_per`, `discount_rs`, `remark`)
                                      VALUES ('$purchase_order_id_fk','$item_id_fk','$design_code', '$size', '$quantity','$sqft','$rate','$amount','$discount_per','$discount_rs', '$remark1')";
               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));


            }
         
                $purchase_order_no=substr("$purchase_order_no",6);
                $sno=$purchase_order_no+1;
                $sql12 = "update mstr_data_series set sr_no= '$sno' where name='purchase_order' ";
                $res = mysqli_query($db,$sql12);
                echo "1";
            }
            
            
          }
          else
           echo "02";
    }else
      echo "03";

?>