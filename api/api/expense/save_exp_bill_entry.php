<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $bill_date1 = date("d-m-Y", strtotime($bill_date));
    $due_date1 = date("d-m-Y", strtotime($due_date));
    $flag = $_SESSION['flag'];
    $sql= '';
    //convert json to array
    $first = date("y",strtotime("-1 year"));
    $second = date("y");
    $be_no1 = $first."".$second."/".$be_no;
    //print_r($newRawItemArray);
    if ($flag == 0) 
    {
     $sql = "INSERT INTO `exp_bill_entry`(`type`, `against`, `po_date`, `po_id_fk`, `branch`,
    `expense_head_id_fk`, `authorised_by`, `vendor_id_fk`, `po_amount`, `bill_no`, `bill_date`,`paid_amt`,
    `due_date` ,`bill_amt`,`discount_per`,`discount_amt`,`amt_after_dis`,`tax_per`,`tax_amt`,`net_amt`,`tds_per`,`tds_amt`,
    `actual_bal`, `remark`,`be_no`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
    '$against','$cur_date','0', '$branch', '$expense_head_id_fk' ,'$authorised_by', '$vendor_id_fk',
    '$po_amount','$bill_no','$bill_date1','$paid_amt','$due_date1','$bill_amt','$discount_per','$discount_amt','$amt_after_dis',
    '$tax_per', '$tax_amt','$net_amt', '$tds_per', '$tds_amt','$actual_bal',
    '$remark','$be_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
        $sql = "INSERT INTO `exp_bill_entry`(`type`, `against`, `po_date`, `po_id_fk`, `branch`,
    `expense_head_id_fk`, `authorised_by`, `vendor_id_fk`, `po_amount`, `bill_no`, `bill_date`,`paid_amt`,
    `due_date` ,`bill_amt`,`discount_per`,`discount_amt`,`amt_after_dis`,`tax_per`,`tax_amt`,`net_amt`,`tds_per`,`tds_amt`,
    `actual_bal`, `remark`,`be_no`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
    '$against','$cur_date','0', '$branch', '$expense_head_id_fk' ,'$authorised_by', '$vendor_id_fk',
    '$po_amount','$bill_no','$bill_date1','$paid_amt','$due_date1','$bill_amt','$discount_per','$discount_amt','$amt_after_dis',
    '$tax_per', '$tax_amt','$net_amt', '$tds_per', '$tds_amt','$actual_bal',
    '$remark','$be_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        $sno=$be_no+1;
        if ($flag == 0) 
        {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_bill_entry' and flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_bill_entry' and flag='1' ";
        }
        $res = mysqli_query($db,$sql12);

        // ledger
        if($against == 1)
        {
            if ($flag == 0) 
        {
            $sql = "INSERT INTO expense_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time,flag)
                    VALUES ('$vendor_id_fk', '$actual_bal', 0, 'expense bill entry', '$actual_bal', '$cur_date', '$cur_time','$flag')";
        }
        else {
            $sql = "INSERT INTO expense_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time,flag)
                    VALUES ('$vendor_id_fk', '$actual_bal', 0, 'expense bill entry', '$actual_bal', '$cur_date', '$cur_time','$flag')";
        }
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        else if($against == 0)
        {
            if ($flag == 0) 
        {
            $sql = "INSERT INTO purchase_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time,flag)
                    VALUES ('$vendor_id_fk', '$actual_bal', 0, 'supplier po bill entry', '$actual_bal', '$cur_date', '$cur_time','$flag')";
        }
        else {
            $sql = "INSERT INTO purchase_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time,flag)
            VALUES ('$vendor_id_fk', '$actual_bal', 0, 'supplier po bill entry', '$actual_bal', '$cur_date', '$cur_time','$flag')";
        }
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }

        echo "1";
      }
      else
      {
          echo "0";
      }
 
?>