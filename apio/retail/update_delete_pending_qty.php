<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST); 
    include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    if($pay_type != "cheque_back")
    {
        $bank = 0;
        $account_no = 0;
    }

    // $sql = "INSERT INTO `retail_delete_pending_qty`(`pay_back_type`, 
    // `branch`, `customer_id`, `po_no`, `bank`, `account_no`, `cheque_no`, `add_date`,
    // `add_time`, `outstanding`, `delete_amt`) 
    // VALUES ('$pay_type','$supplier','$customer','$po_no','$bank','$account_no',
    // '$cheque_no','$date1','$utime','$outstanding_amt','$deleted_amt')";

    $sql = "UPDATE `retail_delete_pending_qty` SET `pay_back_type`='$pay_type',`branch`='$supplier',
    `customer_id`='$customer',`po_no`='$po_no',`bank`='$bank',`account_no`='$account_no',`cheque_no`='$cheque_no',
    `add_date`='$date1',`add_time`='$utime',`outstanding`='$outstanding_amt',`delete_amt`='$deleted_amt' WHERE `d_id_pk`='$id' ";

    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    //$rti_id_fk = mysqli_insert_id($db);

    $h = "DELETE FROM retail_delete_pending_qty_items WHERE d_id_fk='$id'";
    $nj = mysqli_query($db,$h);
    if($result)
    {
        $itemArray = json_decode($newRawItemArray, true);
        if(!empty($itemArray))
        {
            foreach($itemArray as $itemObj) 
            {
              
              $retail_pending_item_id_fk = $itemObj['retail_pending_item_id_fk'];
              $retail_pending_proforma_id_fk = $itemObj['retail_pending_proforma_id_fk'];
              $item = $itemObj['item'];
              $size = $itemObj['size'];
              $order_qty = $itemObj['order_qty'];
              $pending_qty = $itemObj['pending_qty'];
              $delete_qty = $itemObj['delete_qty'];
              $rate = $itemObj['rate'];
              $final_net_amt = $itemObj['final_net_amt'];
              $reduced_amt = $itemObj['reduced_amt'];
              $item_id_fk = $itemObj['item_id_fk'];

              $sql = "INSERT INTO `retail_delete_pending_qty_items`( 
              `po_no_id_fk`,`d_id_fk`, `pono_item_id_fk`, `item_name`, `item_id_fk`, `size`, 
              `order_qty`, `pending_qty`, `delete_qty`, `rate`, `final_net_amt`, 
              `reduce_amt`) VALUES ('$retail_pending_item_id_fk','$id','$retail_pending_proforma_id_fk',
              '$item','$item_id_fk','$size','$order_qty','$pending_qty',
              '$delete_qty','$rate','$final_net_amt','$reduced_amt')";

                $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            }
                echo "1";
            }
        }
        else
        echo "02";
    }
    else
    echo "03";

?>