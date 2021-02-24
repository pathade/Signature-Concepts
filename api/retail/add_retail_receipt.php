<?php 
    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A'); 
    $date1 = date("d-m-Y", strtotime($bill_date));
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $length="";$width="";$po_amt=0;$s_total=0;$supplier_po_amt=0;$s_dicount_rs=0;
    $po_item_save_flag_ok=0;
    $work_order_item_save_flag  = 0;

    $flag_check=0;
    $flag=$_SESSION['flag'];

    // if($flag==0)
    // {
        $sql123 = "INSERT INTO `retail_receipt`(`cust_id_fk`, `branch_name`, 
    `bank_name`, `account_no`, `remark`, `payment_type`, `cash_amount`, 
    `card_amount`, `card_no`, `cheque_amt`, `cheque_no`, `cheque_dt`, 
    `receipt_date`, `flag`) VALUES ('$customer','branch','$bank',
    '$ac_no','$remark','$payment_method','$cash_amt','$card_amt','$card_no',
    '$cheque_amt','$cheque_no','$cheque_date','$date1', '$flag')";

     $res123 = mysqli_query($db,$sql123) or die(mysqli_error($db));    
    // }

    // $sql123 = "INSERT INTO `retail_receipt`(`cust_id_fk`, `branch_name`, 
    // `bank_name`, `account_no`, `remark`, `payment_type`, `cash_amount`, 
    // `card_amount`, `card_no`, `cheque_amt`, `cheque_no`, `cheque_dt`, 
    // `receipt_date`) VALUES ('$customer','branch','$bank',
    // '$ac_no','$remark','$payment_method','$cash_amt','$card_amt','$card_no',
    // '$cheque_amt','$cheque_no','$cheque_date','$date1')";

    
    //  $res123 = mysqli_query($db,$sql123) or die(mysqli_error($db));
     $last_id = mysqli_insert_id($db); 

     //echo "jjjjjj".$res123;
    
    if($res123 == 1)
    {

        if($payment_method == "Cheque")
        {
            //query for bank transaction 
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
            // if($flag==0)
            // {
             $sqlb = "INSERT INTO `fin_bank_transaction`( 
            `type`, `mode`, `bank_name`, `account_no`, `date`, `trans_no`, 
            `amount`, `particular_party`, `remark`, `bt_no`, `cheque_no`,
            `cheque_date`, `add_date`, `add_time`, `recon_status`, `recon_date`, 
            `fin_yr`, `status`, `party_from`, `against`, `flag`)
            VALUES ('Receipt','$payment_method','$bank','$ac_no',
            '$cheque_date','','$cheque_amt','$customer','$remark','$bank_sr_no1',
            '$cheque_no','$cheque_date','$date1','$cur_time','N','00-00-0000','$fin_yr','','RC','Retail Receipt', '$flag')";
            // }
            $sql_res = mysqli_query($db,$sqlb);
            
            if($sql_res == 1)
            {
                $bn = "Update mstr_data_series SET sr_no='$next_bank_no' WHERE name='fin_bank_transaction'";
                $bn_res = mysqli_query($db,$bn);
            }
            $flag_check=1;
        }
        $length1 = count($newRawItemArray1);
        for($j = 0;$j<$length1;$j++)
        {   

            $invoice_id_pk = $newRawItemArray1[$j]['invoice_id_pk'];
            $PO_no = $newRawItemArray1[$j]['PO_no'];
            $PO_date =  $newRawItemArray1[$j]['PO_date'];
            $fin_yr =  $newRawItemArray1[$j]['fin_yr'];
            $Amount =  $newRawItemArray1[$j]['Amount'];
            $previous_paid =  $newRawItemArray1[$j]['previous_paid'];
            $balance_amt =  $newRawItemArray1[$j]['balance_amt'];
            //$advance =  $newRawItemArray1[$j]['advance'];
            $credit_amt =  $newRawItemArray1[$j]['credit'];
            $debit_amt =  $newRawItemArray1[$j]['debit'];
            $ret_good_amt =  $newRawItemArray1[$j]['ret_good_amt'];
            $discount =  $newRawItemArray1[$j]['discount'];
            $tot_bal =  $newRawItemArray1[$j]['tot_bal'];
            $paid_amt =  $newRawItemArray1[$j]['paid_amt'];
            $outstanding =  $newRawItemArray1[$j]['outstanding'];
            $credit_no =  $newRawItemArray1[$j]['credit_no'];
            $debit_no =  $newRawItemArray1[$j]['debit_no'];
            $credit =  $newRawItemArray1[$j]['credit'];
            $debit =  $newRawItemArray1[$j]['debit'];
            $return_no =  $newRawItemArray1[$j]['return_no'];
            //$bank_charge =  $newRawItemArray1[$j]['bank_charge'];

            $sql = "INSERT INTO `retail_receipt_items`(
            `receipt_id_fk`, `tax_invoice_fk`, `tax_invoice_dt`, `fin_yr`, `amount`, 
            `prev_paid`, `bal_amount`, `credit`, `debit`, `credit_amt`, `debit_amt`, 
            `return_good_amt`, `discount`, `total_balance`, `paid_amt`, `outstanding`, `credit_no`, `debit_no`,
             `branch`) 
            VALUES ('$last_id','$PO_no','$PO_date','$fin_yr','$Amount',
            '$previous_paid','$balance_amt','$credit','$debit','$credit_amt','$debit_amt','$ret_good_amt'
            ,'$discount','$tot_bal','$paid_amt','$outstanding','$credit_no',
            '$debit_no','$return_no')";
        
            $res1 = mysqli_query($db,$sql) or die(mysqli_error($db)); 
            
            if($res1 == 1)
            {
                $sq = "UPDATE retail_tax_invoice SET receipt_added='1'";
                $sq_res = mysqli_query($db,$sq);
            }

            // ledger query
            if($flag_check==1)
            {
                $sql_select1="SELECT opening_balance FROM retail_ledger_main ORDER BY id DESC LIMIT 1";
                $res_select1 =  mysqli_query($db,$sql_select1) or die(mysqli_error($db));
                $row_select1 = mysqli_fetch_array($res_select1);
                $count1=mysqli_num_rows($res_select1);
                $amount1='';
                if($count1>0)
                {
                    echo $last_amount=$row_select1['opening_balance'];
                    $amount1=$last_amount+$paid_amt;
                }
    
                else
                {
                    $last_amount='0';
                    $amount1=$paid_amt;
                }
    

                // if($flag==0)
                // {
                $sql_ledger1 = "INSERT INTO `retail_ledger_main`( `customer_id_fk`,`bank_id_fk`, `account_no`, `debit`,`credit`, `against`, `opening_balance`, `date`,`add_time`, `flag`) 
                                VALUES ('$customer','$bank','$ac_no','$paid_amt','0','retail Tax Invoice','$amount1','$bill_date','$cur_time', '$flag')";
                // }
                $res_ledger1 = mysqli_query($db,$sql_ledger1) or die('INSERT LEDGER: '.mysqli_error($db));

            }


            if($res1 == 1)
            {
                //$flag_ok = "1";
                $work_order_item_save_flag = 1;
            }
            else
            {
                //$flag_ok = "0";
                $work_order_item_save_flag = 0;
            }

        }
    }
    else
    {
        //echo $work_order_item_save_flag;
    }

    if($flag_check==1)
    {
        $sql_select="SELECT opening_balance FROM retail_ledger_main ORDER BY id DESC LIMIT 1";
        $res_select =  mysqli_query($db,$sql_select);
        $row_select = mysqli_fetch_array($res_select);
        $count=mysqli_num_rows($res_select);
        $amount1='';
        if($count>0)
        {
            $last_amount=$row_select['opening_balance'];
            $amount1=$last_amount-$cheque_amt;
        }


        else{
            $last_amount='0';
            $amount1=$cheque_amt;
        }
        // if($flag==0)
        // {
        $sql_ledger = "INSERT INTO `retail_ledger_main`(`customer_id_fk`, `bank_id_fk`, `account_no`, `debit`, `credit`, `against`, 
        `opening_balance`, `date`,`add_time`, `flag`) 
                        VALUES ('$customer', '$bank','$ac_no','0','$cheque_amt','retail Receipt','$amount1','$bill_date','$cur_time', 
                        '$flag')";
        // }
          $sql_ledger = mysqli_query($db,$sql_ledger) or die('INSERT LEDGER1: '.mysqli_error($db));

    }
    
    echo $work_order_item_save_flag;
?>
