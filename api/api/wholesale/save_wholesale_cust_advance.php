<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    //$cheque_date1 = date("d-m-Y", strtotime($cheque_date));
    //$date1 = date("d-m-Y", strtotime($date));
    $flag_check=0;
    $sql = "SELECT * FROM mstr_data_series WHERE name='wholesale_customer_advance'";
    $k = mysqli_query($db,$sql);
    while($kj = mysqli_fetch_array($k))
    {
        $srno = $kj['sr_no'];
        $next_sr = $srno + 1;
    }

    if($bank_name == "")
    {
        $bank_name = 0;
    }
    if($account_no == "")
    {
        $account_no = 0;
    }
    if($cheque_no == "")
    {
        $cheque_no = 0;
    }
    $sql = "INSERT INTO `wholesale_customer_advance`( `advance_no`, 
    `cust_id_fk`, `branch`, `pay_mode`, `add_date`, `manual_debit_no`, 
    `manual_debit_amt`, `amount`, `remark`, `bank_name`, `account_no`, 
    `cheque_no`, `cheque_date`, `add_time`) 
    VALUES ('$srno','$customer','$branch','$pay_mode','$date','0',
    '0','$amount','$remark','$bank_name','$account_no','$cheque_no',
    '$cheque_date','$cur_time')";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    $last_id = mysqli_insert_id($db);
    if($res == 1)
    {
        // $uchno = $cheque_no + 1;
        // $g = "UPDATE `mstr_cheque` 
        //       SET current_cheque_no = '$uchno' 
        //       WHERE bank_id_fk='$bank_name' AND account_no='$account_no'";
        
        // $l = mysqli_query($db,$g);
        if($pay_mode == "Cheque")
        {
            $flag_check=1;
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

        $sqlb = "INSERT INTO `fin_bank_transaction`( 
        `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
        `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
         `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
          `fin_yr`, `status`, `party_from`, `against`)
           VALUES ('Receipt','$pay_mode','$bank_name','$account_no',
           '$date','','$amount','$customer','$remark','$bank_sr_no1',
           '$cheque_no','$cheque_date','$date','$cur_time','N',
           '00-00-0000','$fin_yr','','WC','Wholesale Customer Advance')";

        $sql_res = mysqli_query($db,$sqlb);
        
        if($sql_res == 1)
        {
            $bn = "Update mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction'";
            $bn_res = mysqli_query($db,$bn);
        }

        }
        
        $sql = "UPDATE  mstr_data_series SET sr_no='$next_sr' WHERE name='wholesale_customer_advance'";
        $k = mysqli_query($db,$sql);
        if($k==1)
        {
            if($flag_check == 1)
            {
                $insert_ledger = "INSERT INTO wholesale_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, time)
                VALUES('$customer_name', '$bank_name', '$account_no', '$amount', 0, 'customer advance', '$amount', '$cur_date', '$cur_time')";
                $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));
            }
            echo "1";
        }
    }
    else
    {
        echo "0";
    }
    
?>