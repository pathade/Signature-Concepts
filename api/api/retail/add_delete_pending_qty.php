<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    include '../../database/dbconnection.php';

    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    $flag=$_SESSION['flag'];

    if ($pay_type != "cheque_back") {
        $bank = 0;
        $account_no = 0;
    }

    if($flag==0)
    {
        $sql = "INSERT INTO `retail_delete_pending_qty`(`pay_back_type`,
        `branch`, `customer_id`, `po_no`, `bank`, `account_no`, `cheque_no`, `add_date`,
        `add_time`, `outstanding`, `delete_amt`, `flag`)
        VALUES ('$pay_type','$supplier','$customer','$po_no','$bank','$account_no',
        '$cheque_no','$date1','$utime','$outstanding_amt','$deleted_amt', '$flag')";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    else
    {
        $sql = "INSERT INTO `retail_delete_pending_qty`(`pay_back_type`,
        `branch`, `customer_id`, `po_no`, `bank`, `account_no`, `cheque_no`, `add_date`,
        `add_time`, `outstanding`, `delete_amt`, `flag`)
        VALUES ('$pay_type','$supplier','$customer','$po_no','$bank','$account_no',
        '$cheque_no','$date1','$utime','$outstanding_amt','$deleted_amt', '$flag')";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    }

    // $sql = "INSERT INTO `retail_delete_pending_qty`(`pay_back_type`,
    // `branch`, `customer_id`, `po_no`, `bank`, `account_no`, `cheque_no`, `add_date`,
    // `add_time`, `outstanding`, `delete_amt`)
    // VALUES ('$pay_type','$supplier','$customer','$po_no','$bank','$account_no',
    // '$cheque_no','$date1','$utime','$outstanding_amt','$deleted_amt')";
    // $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $rti_id_fk = mysqli_insert_id($db);
    if ($result) 
    {

        //
        if($pay_type == "cheque_back")
        {
            //query for bank transaction 
            $data_sql ="SELECT * FROM mstr_data_series WHERE name='fin_bank_transaction'";
            $res_data = mysqli_query($db,$data_sql) or die(mysqli_error($db));
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
            VALUES ('Payment','Cheque','$bank','$account_no',
            '$date1','','$deleted_amt','$customer','','$bank_sr_no1',
            '$cheque_no','$date1','$date1','$utime','N','00-00-0000','$fin_yr','','RC','Retail Pending Quantity', '$flag')";
            }
            else
            {
            $sqlb = "INSERT INTO `fin_bank_transaction`( 
            `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
            `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
            `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
            `fin_yr`, `status`, `party_from`, `against`, `flag`)
            VALUES ('Payment','Cheque','$bank','$account_no',
            '$date1','','$deleted_amt','$customer','','$bank_sr_no1',
            '$cheque_no','$date1','$date1','$utime','N','00-00-0000','$fin_yr','','RC','Retail Pending Quantity', '$flag')";
            }

            $sql_res = mysqli_query($db,$sqlb) or die(mysqli_error($db));
            
            if($sql_res == 1)
            {
                $bn = "Update mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction'";
                $bn_res = mysqli_query($db,$bn) or die('FIN: '.mysqli_error($db));
            }
        }
        $itemArray = json_decode($newRawItemArray, true);
        if (!empty($itemArray)) {
            foreach ($itemArray as $itemObj) {

                $retail_pending_item_id_fk = $itemObj['retail_pending_item_id_fk'];
                $retail_pending_proforma_id_fk = $itemObj['retail_pending_proforma_id_fk'];
                $item = $itemObj['item'];
                $size = $itemObj['size'];
                $uom = $itemObj['uom'];
                $order_qty = $itemObj['order_qty'];
                $pending_qty = $itemObj['pending_qty'];
                $delete_qty = $itemObj['delete_qty'];
                $rate = $itemObj['rate'];
                $final_net_amt = $itemObj['final_net_amt'];
                $reduced_amt = $itemObj['reduced_amt'];
                $item_id_fk = $itemObj['item_id_fk'];

                $sql = "INSERT INTO `retail_delete_pending_qty_items`(
              `po_no_id_fk`,`d_id_fk`, `pono_item_id_fk`, `item_name`, `item_id_fk`, `size`, `uom`,
              `order_qty`, `pending_qty`, `delete_qty`, `rate`, `final_net_amt`,
              `reduce_amt`) VALUES ('$retail_pending_item_id_fk','$rti_id_fk','$retail_pending_proforma_id_fk',
              '$item','$item_id_fk','$size','$uom','$order_qty','$pending_qty',
              '$delete_qty','$rate','$final_net_amt','$reduced_amt')";

                $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            }
            echo "1";
        }
    } else {
        echo "02";
    }

} else {
    echo "03";
}
