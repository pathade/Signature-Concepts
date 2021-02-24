<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $date1 = date("d-m-Y", strtotime($cheque_date)); 
    $flag_check=0;
    $flag = $_SESSION['flag'];
    $sql= '';

    //convert json to array
     //print_r($newRawItemArray);
     $first = date("y",strtotime("-1 year"));
     $second = date("y");
 
     $ap_no1 = $first."-".$second."/".$ap_no;
   
    //print_r($newRawItemArray);
    if ($flag == 0) 
    {
        $sql = "INSERT INTO `exp_advance_payment`(`type`, 
    `cheque_date`, `payment_type`, `vendor_id_fk`, `manual_credit_no`,
    `manual_credit_amt`, `po_id_fk`, `amount`, `bank_id_fk`, `cheque_no`,
     `authorised_by`, `remark`, `branch`,`ap_no`,
    `add_date`, `add_time`,`added_by`,`account_no`,`flag`) VALUES ('$paytype',
    '$cheque_date','$payment_type','$vendor_id_fk', '$manual_credit_no', 
    '$manual_credit_amt' ,'$po_no', '$amount', '$bank_name',
    '$cheque_no','$authorised_by', '$remark', 'Signature Concepts LLP','$ap_no1',
    '$cur_date','$cur_time','admin@gmail.com','$account_no','$flag')";
    }
    else {
         $sql = "INSERT INTO `exp_advance_payment`(`type`, 
    `cheque_date`, `payment_type`, `vendor_id_fk`, `manual_credit_no`,
    `manual_credit_amt`, `po_id_fk`, `amount`, `bank_id_fk`, `cheque_no`,
     `authorised_by`, `remark`, `branch`,`ap_no`,
    `add_date`, `add_time`,`added_by`,`account_no`,`flag`) VALUES ('$paytype',
    '$cheque_date','$payment_type','$vendor_id_fk', '$manual_credit_no', 
    '$manual_credit_amt' ,'$po_no', '$amount', '$bank_name',
    '$cheque_no','$authorised_by', '$remark', 'Signature Concepts LLP','$ap_no1',
    '$cur_date','$cur_time','admin@gmail.com','$account_no','$flag')";
    }
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {

        if($payment_type == "Cheque")
        {
            //query for bank transaction 
            if($flag == 0) {
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

            if($paytype == "Finance")
            {
                $flag_check = 1;
                $party_from = "S";
            }
            else if($paytype == "Expense")
            {
                $party_from = "V";
            }
            else
            {
                $party_from = "";
            }

            if($flag == 0) {
             $sqlb = "INSERT INTO `fin_bank_transaction`( 
            `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
            `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
            `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
            `fin_yr`, `status`, `party_from`, `against`,`flag`)
            VALUES ('Receipt','$payment_type','$bank_name','$account_no',
            '$cheque_date','','$amount','$vendor_id_fk','$remark','$bank_sr_no1',
            '$cheque_no','$cheque_date','$cur_date','$cur_time','N','00-00-0000',
            '$fin_yr','','$party_from','Advance Payment','$flag')";
            }
            else {
                $sqlb = "INSERT INTO `fin_bank_transaction`( 
                    `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
                    `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
                    `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
                    `fin_yr`, `status`, `party_from`, `against`,`flag`)
                    VALUES ('Receipt','$payment_type','$bank_name','$account_no',
                    '$cheque_date','','$amount','$vendor_id_fk','$remark','$bank_sr_no1',
                    '$cheque_no','$cheque_date','$cur_date','$cur_time','N','00-00-0000',
                    '$fin_yr','','$party_from','Advance Payment','$flag')";
            }

            $sql_res = mysqli_query($db,$sqlb); 
            
            if($sql_res == 1)
            {
                if($flag == 0) {
                $bn = "UPDATE mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction' and flag='0'";
                }
                else {
                    $bn = "UPDATE mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction' and flag='1'";
                }
                $bn_res = mysqli_query($db,$bn);
            }
        }
        $sno=$ap_no+1;
        if($flag == 0) {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' 
        WHERE name='exp_advance_payment' and flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' 
        WHERE name='exp_advance_payment' and flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
        if($flag == 0) {
        $insert_ledger = "INSERT INTO purchase_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, add_time, flag)
        VALUES('$vendor_id_fk', '$bank_name', '$account_no', '$amount', 0, 'advance payment', '$amount', '$cur_date', '$cur_time','$flag')";
        }
        else {
            $insert_ledger = "INSERT INTO purchase_ledger_main(customer_id_fk, bank_id_fk, account_no, debit, credit, against, opening_balance, date, add_time, flag)
            VALUES('$vendor_id_fk', '$bank_name', '$account_no', '$amount', 0, 'advance payment', '$amount', '$cur_date', '$cur_time','$flag')";
        }
        $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>