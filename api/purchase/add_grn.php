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
    // if($flag==0){
    $sql = "INSERT INTO `grn`(`branch`, `address`, `prepared_by`, `grn_no`, `po_id_fk`, `work_no`, `mobile_no`, `unloaded_by`, `challan_no`, `grn_date`, `remark`, `stock_point`, `supplier`, `subtotal`, `total_qty`, `others`, `total`, `status`,`flag`) VALUES ('$branch','$address','$prepared_by','$grn_no','$po_no','$work_no','$mobile_no','$unloaded_by','$challan_no','$date1','$Remark','$stock_point','$supplier', '$total','$act_qty_final', '$adjustment_final', '$final_total', '$status','$flag')";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    // }
    $grn_id_fk = mysqli_insert_id($db);

    $update_po = "UPDATE purchase_order SET grn_added='1' WHERE id='$po_no'";
    $res_update = mysqli_query($db, $update_po) or die(mysqli_error($db));

    if($result)
    {
     
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
            
               $sql = "INSERT INTO `grn_items`(`grn_id_fk`, `item_detail`, `design_code`, `size`, `quantity`, `rate`, `amount`, `act_quantity`, `act_rate`, `act_amount`) VALUES ('$grn_id_fk','$item_detail','$design_code','$size','$quantity','$rate','$amount','$act_quantity','$act_rate','$act_amount')";

               $resquery=mysqli_query($db,$sql) or die(mysqli_error($db));

               
               $check_item = "SELECT * FROM stock_table WHERE item_id_fk='$item_detail'";
               $res_item = mysqli_query($db, $check_item) or die(mysqli_error($db));
               if(mysqli_num_rows($res_item) < 1)
               {
                $sql1 = "INSERT INTO stock_table(item_id_fk, total_qty, flag) VALUES('$item_detail', '$act_quantity', '$flag')";
                $res = mysqli_query($db, $sql1) or die(mysqli_error($db));
               }
               else
               {
                $sql1 = "UPDATE stock_table SET total_qty='$act_quantity', flag='$flag' WHERE item_id_fk='$item_detail'";
                $res = mysqli_query($db, $sql1) or die(mysqli_error($db));
               }

            }
         
              $grn_no = substr($grn_no, 6);
               $sno=$grn_no+1;
               $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='grn' ";
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