<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $transaction_date1 = date("d-m-Y", strtotime($transaction_date));
    $cheque_date1 = date("d-m-Y", strtotime($cheque_date));
    $flag = $_SESSION['flag'];
    $sql= '';
    //convert json to array
   
    //print_r($newRawItemArray);
    $first = date("y",strtotime("-1 year"));
    $second = date("y");

    $cla_no1 = $first."".$second."/".$cla_no;
    if ($flag == 0) 
    {
    $sql = "INSERT INTO `exp_company_loan_advance`(`type`, `branch`, 
    `vendor_id_fk`, `pay_mode`, `transaction_date`,
    `bank_id_fk`, `account_no`, `cheque_no`, `cheque_date`, `amount`, 
    `against_ref`, `remark`,`cla_no`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
    '$branch','$name','$pay_mode', '$transaction_date1','$bank_name' ,'$account_no',

    '$cheque_no', '$cheque_date1',
    '$amount','$against_ref', '$remark','$cla_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
    else {
        $sql = "INSERT INTO `exp_company_loan_advance`(`type`, `branch`, 
    `vendor_id_fk`, `pay_mode`, `transaction_date`,
    `bank_id_fk`, `account_no`, `cheque_no`, `cheque_date`, `amount`, 
    `against_ref`, `remark`,`cla_no`,
    `add_date`, `add_time`,`added_by`,`flag`) VALUES ('$type',
    '$branch','$name','$pay_mode', '$transaction_date1','$bank_name' ,'$account_no',

    '$cheque_no', '$cheque_date1',
    '$amount','$against_ref', '$remark','$cla_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
    }
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {

        if($pay_mode == "Cheque")
        {
            //query for bank transaction 
            if ($flag == 0) 
            {
            $data_sql ="SELECT * FROM mstr_data_series WHERE name='fin_bank_transaction' and flag='0' ";
            }
            else {
                $data_sql ="SELECT * FROM mstr_data_series WHERE name='fin_bank_transaction' and flag='1' ";
            }
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
            if ($flag == 0) 
            {
             $sqlb = "INSERT INTO `fin_bank_transaction`( 
            `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
            `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
            `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
            `fin_yr`, `status`, `party_from`, `against`,`flag`)
            VALUES ('$type','$pay_mode','$bank_name','$account_no',
            '$cheque_date1','','$amount','$name','$remark','$bank_sr_no1',
            '$cheque_no','$cheque_date1','$cur_date','$cur_time','N','00-00-0000',
            '$fin_yr','','V','Company Loan And Advance','$flag')";
            }
            else {
                 $sqlb = "INSERT INTO `fin_bank_transaction`( 
            `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
            `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
            `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
            `fin_yr`, `status`, `party_from`, `against`,`flag`)
            VALUES ('$type','$pay_mode','$bank_name','$account_no',
            '$cheque_date1','','$amount','$name','$remark','$bank_sr_no1',
            '$cheque_no','$cheque_date1','$cur_date','$cur_time','N','00-00-0000',
            '$fin_yr','','V','Company Loan And Advance','$flag')";
            }

            $sql_res = mysqli_query($db,$sqlb); 
            
            if($sql_res == 1)
            {
                if ($flag == 0) 
                {
                $bn = "UPDATE mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction' and flag='0'";
                }
                else {
                    $bn = "UPDATE mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction' and flag='1'";
                }
                $bn_res = mysqli_query($db,$bn);
            }
        }
        $sno=$cla_no+1;
        if ($flag == 0) 
        {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_company_loan_advance' and flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_company_loan_advance' and flag='1' ";
        }
        $res = mysqli_query($db,$sql12);

        if($type == 1)
        {
            if ($flag == 0) 
            {
            $sql = "INSERT INTO expense_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, add_time, flag)
                    VALUES ('$name', '$bank_name', '$account_no', 0, '$amount', 'expense loan advance', '$amount', '$cur_date', '$cur_time','$flag')";
            }
            else {
                $sql = "INSERT INTO expense_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, add_time, flag)
                VALUES ('$name', '$bank_name', '$account_no', 0, '$amount', 'expense loan advance', '$amount', '$cur_date', '$cur_time','$flag')";
            }
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        }

        else if($type == 0)
        {
            if ($flag == 0) {
            $sql = "INSERT INTO expense_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, add_time,flag)
                    VALUES ('$name', '$bank_name', '$account_no', '$amount', 0, 'expense loan advance', '$amount', '$cur_date', '$cur_time','$flag')";
            }
            else {
                $sql = "INSERT INTO expense_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, add_time,flag)
                    VALUES ('$name', '$bank_name', '$account_no', '$amount', 0, 'expense loan advance', '$amount', '$cur_date', '$cur_time','$flag')";
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