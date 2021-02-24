<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $po_date1 = date("d-m-Y", strtotime($po_date));
    //convert json to array
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    //echo ('array is');
    //print_r($newRawItemArray1);
    $first = date("y",strtotime("-1 year"));
    $second = date("y");

    $po_no1 = $first."-".$second."/".$po_no;
    if ($flag == 0) 
    {
     $sql = "INSERT INTO `exp_purchase_order`(`branch`, `po_date`, `expense_head_id_fk`, `vendor_id_fk`, `authorised_by`,
    `total_qty`, `cal_amount`, `discount_per`,`discount_amt`,`amt_after_dis`,
    `tax_per`, `tax_amt`,`net_amt`,`po_no`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$branch',
    '$po_date1','$expense_head_id_fk','$vendor_id_fk', '$authorised_by',
    '$total_qty',
    '$cal_amount', '$discount_per','$discount_amt','$amt_after_dis','$tax_per',
    '$tax_amt','$net_amt','$po_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
          $sql = "INSERT INTO `exp_purchase_order`(`branch`, `po_date`, `expense_head_id_fk`, `vendor_id_fk`, `authorised_by`,
    `total_qty`, `cal_amount`, `discount_per`,`discount_amt`,`amt_after_dis`,
    `tax_per`, `tax_amt`,`net_amt`,`po_no`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$branch',
    '$po_date1','$expense_head_id_fk','$vendor_id_fk', '$authorised_by',
    '$total_qty',
    '$cal_amount', '$discount_per','$discount_amt','$amt_after_dis','$tax_per',
    '$tax_amt','$net_amt','$po_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    $res = mysqli_query($db,$sql);
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        
        //print_r($newRawItemArray1);
        //echo "*********";
        $length1 = count($newRawItemArray1);
        //echo "*********";
        for($j = 0;$j<$length1;$j++)
        {   
            //echo "jjj is:".$j;echo "\n";
            $item_id_fk = $newRawItemArray1[$j]['item'];
            $quantity =  $newRawItemArray1[$j]['quantity'];
            $rate =  $newRawItemArray1[$j]['rate'];
            $amount =  $newRawItemArray1[$j]['amount'];

            if($item_id_fk != "")
            {
                $sql = "INSERT INTO `exp_item_po`(`item_id_fk`,`quantity`,
                `rate`, `amount`, `po_id_fk`) VALUES 
                ('$item_id_fk','$quantity','$rate'
                ,'$amount','$last_id')";

                $res1 = mysqli_query($db,$sql);
                if($res1 == 1)
                {

                    $flag_ok = "1";
                }
                else
                {
                    $flag_ok = "0";
                }
                if ($flag == 0) 
                {
                $insert_ledger = "INSERT INTO expense_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time, flag)
                            VALUES('$vendor_id_fk', 0, '$amount', 'vendor purchase order', '$amount', '$cur_date', '$cur_time','$flag')";
                }
                else {
                    $insert_ledger = "INSERT INTO expense_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time, flag)
                    VALUES('$vendor_id_fk', 0, '$amount', 'vendor purchase order', '$amount', '$cur_date', '$cur_time','$flag')";
                }
                $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));
            }
        }

        $sno=$po_no+1;
        if ($flag == 0) 
        {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_purchase_order' and flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_purchase_order' and flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
        //$flag_ok =1;
        
    }
    else
    {
        $flag_ok = 0;
    }
    echo $flag_ok;
?>