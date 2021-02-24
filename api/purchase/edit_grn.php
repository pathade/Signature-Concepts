<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    // $sql = "UPDATE `grn` SET `branch`='$branch',`address`='$address',`prepared_by`='$prepared_by',`grn_no`='$grn_no',`po_id_fk`='$po_no',`work_no`='$work_no',`mobile_no`='$mobile_no',`unloaded_by`='$unloaded_by',`challan_no`='$challan_no',`grn_date`='$date',`remark`='$Remark',`stock_point`='$stock_point',`supplier`='$supplier',`subtotal`='$total',`total_qty`='$act_qty_final',`others`='$adjustment_final',`process_amt`=`$process_amount`,`total`='$final_total' WHERE `grn_id_pk`='$grn_id'";

    $sql = "UPDATE `grn` SET `subtotal`='$total',`total_qty`='$act_qty_final',`others`='$adjustment_final',`total`='$final_total' WHERE `grn_id_pk`='$grn_id'";
    $result = mysqli_query($db, $sql);

    if($result)
    {
          $grn_id_fk = mysqli_insert_id($db);
     
          $itemArray = json_decode($rawItemArray, true);
          // delete all grn items before updating
          if(!empty($itemArray))
          {
            foreach($itemArray as $itemObj)
            {
              $delete_grn_item = "DELETE FROM grn_items WHERE grn_id_fk='$grn_id'";
              if(mysqli_query($db, $delete_grn_item))
               continue;
              else
                echo "Delete grn item error";
            }
          }


          if(!empty($itemArray))
          {
            foreach($itemArray as $itemObj) 
            {
              // var_dump($itemArray);
              // $grn_id_fk = $itemObj['grn_id_fk'];
              $item_detail = $itemObj['item_detail'];
              $design_code=$itemObj['design_code'];
              $size=$itemObj['size'];
              $quantity = $itemObj['quantity'];
              $rate = $itemObj['rate'];
              $amount = $itemObj['amount'];
              $act_quantity = $itemObj['act_quantity'];
              $act_rate = $itemObj['act_rate'];
              $act_amount = $itemObj['act_amount'];
                
              // update grn item 
                $sql = "INSERT INTO `grn_items`(`grn_id_fk`, `item_detail`, `design_code`, `size`, `quantity`, `rate`, `amount`, `act_quantity`, `act_rate`, `act_amount`) VALUES ('$grn_id','$item_detail','$design_code','$size','$quantity','$rate','$amount','$act_quantity','$act_rate','$act_amount')";

                $resquery=mysqli_query($db, $sql);
                // if($resquery) 
                //     echo "Inserted grn item";
                // else
                //     echo "Error in grn item";
              }


            }
         
              
              //  $sno=$grn_no+1;
              //  $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='grn' ";
              //  $res = mysqli_query($db,$sql12);

               echo "1";
            
          }
          else
           echo "02";
    }
    else
      echo "03";

?>