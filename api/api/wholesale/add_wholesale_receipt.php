<?php

    session_start();
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A'); 
    $bill_date1 = date("d-m-Y", strtotime($bill_date));
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    //$length="";$width="";$po_amt=0;$s_total=0;$supplier_po_amt=0;$s_dicount_rs=0;
    $po_item_save_flag_ok=0;
    $work_order_item_save_flag  = 0;
    $flag=$_SESSION['flag'];

    $flag_check=0;

    // $get_no = "SELECT sr_no FROM mstr_data_series WHERE name='wholesale_receipt'";
    // $res_no = mysqli_fetch_row(mysqli_query($db, $get_no));
    
    //$work_order_item_save_flag = 0;
    //error_reporting(0);
    //echo "transporter is:".$transporter;
    if($payment_method == "Cash/Card")
    {
        // if($flag==0)
        // {
        $sql = "INSERT INTO `wholesale_receipt`(`cust_id_fk`, `branch`, 
        `bank_name`, `account_no`, `remark`, `payment_type`, `cash_amount`, 
        `card_amount`, `card_no`,`receipt_date`, `add_time`, `flag`) VALUES ('$customer','$branch123','$bank_name',
        '$account_no','$remark','$payment_method','$cash_amt','$card_amt','$card_no',
        '$bill_date1','$cur_time', '$flag')";
        // }

    }
    else if($payment_method == "Cheque")
    {
        // if($flag==0)
        // {
       $sql = "INSERT INTO `wholesale_receipt`(`cust_id_fk`, `branch`, 
        `bank_name`, `account_no`, `remark`, `payment_type`,`cheque_amt`, `cheque_no`, `cheque_dt`, 
        `receipt_date`, `add_time`, `flag`) 
        VALUES ('$customer','$branch123','$bank_name',
        '$account_no','$remark','$payment_method','$cheque_amt','$cheque_no','$cheque_date','$bill_date','$cur_time', '$flag')";
        // }

        $uchno = $cheque_no + 1;
        $g = "UPDATE `mstr_cheque` 
                SET current_cheque_no = '$uchno' 
                WHERE bank_id_fk='$bank_name' AND account_no='$account_no'";
                $flag_check=1;
            $resg = mysqli_query($db,$g);


        //   $sql_select="select amount from ledger_sub_total";
        //   $res_select =  mysqli_query($db,$sql_select);
        //   $row_select = mysqli_fetch_array($res_select);

        //   $last_amount=$row_select['amount'];
        //   $amount1=$last_amount+$cheque_amt;

        //   $sql_ledger_update ="UPDATE `ledger_sub_total` SET`amount`='$amount1',`last_amount_type`='debit'";
        //    mysqli_query($db,$sql_ledger_update);
    }
    else
    {

    }
    
    
      $res = mysqli_query($db,$sql) or die(mysqli_error($db));
     $last_id = mysqli_insert_id($db);
    //  $resg = mysqli_query($db,$g);
    //echo "\n";
    // $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_work_order'";
    // $res_ds = mysqli_query($db,$select_data_series);
    // while($drw = mysqli_fetch_array($res_ds))
    // {
    //     $sr_no = $drw['sr_no'];
    // }
    // $update_no = $sr_no + 1;
    // $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_work_order'";
    // $update_res = mysqli_query($db,$data_series_update_sql);

    
    if($res == 1)
    {
        
        //echo "inside";
        $length1 = count($newRawItemArray1);
        //echo "length is:".$length1;
        for($j = 0;$j<$length1;$j++)
        {   
            //echo "jjj is:".$j;echo "\n";
             
            $invoice_id_pk = $newRawItemArray1[$j]['invoice_id_pk'];
            $invoice_no = $newRawItemArray1[$j]['invoice_no'];
            $invoice_date =  $newRawItemArray1[$j]['invoice_date'];
            $fin_yr =  $newRawItemArray1[$j]['fin_yr'];
            $Amount =  $newRawItemArray1[$j]['Amount'];
            $previous_paid =  $newRawItemArray1[$j]['previous_paid'];
            $balance_amt =  $newRawItemArray1[$j]['balance_amt'];
            $advance =  $newRawItemArray1[$j]['advance'];
            $credit_amt =  $newRawItemArray1[$j]['credit_amt'];
            $debit_amt =  $newRawItemArray1[$j]['debit_amt'];
            $ret_good_amt =  $newRawItemArray1[$j]['ret_good_amt'];
            $discount =  $newRawItemArray1[$j]['discount'];
            $tot_bal =  $newRawItemArray1[$j]['tot_bal'];
            $paid_amt =  $newRawItemArray1[$j]['paid_amt'];
            $outstanding =  $newRawItemArray1[$j]['outstanding'];
            $advance_no =  $newRawItemArray1[$j]['advance_no'];
            $credit_no =  $newRawItemArray1[$j]['credit_no'];
            $debit_no =  $newRawItemArray1[$j]['debit_no'];
            $branch =  $newRawItemArray1[$j]['branch'];
            $ret_no =  $newRawItemArray1[$j]['ret_no'];
            $bank_charge =  $newRawItemArray1[$j]['bank_charge'];

             $sql = "INSERT INTO `wholesale_receipt_items`(
            `receipt_id_fk`, `tax_invoice_fk`, `tax_inv_dt`, `fin_yr`, `amount`, 
            `prev_paid`, `bal_amount`, `advance_amt`, `credit_amt`, `debit_amt`, 
            `return_good_amt`, `discount`, `total_balance`, `paid_amt`, `outstanding`, 
            `advance_no`, `credit_no`, `debit_no`, `branch`, `return_no`, `bank_charges`) 
            VALUES ('$last_id','$invoice_id_pk','$invoice_date','$fin_yr','$Amount',
            '$previous_paid','$balance_amt','$advance','$credit_amt','$debit_amt','$ret_good_amt'
            ,'$discount','$tot_bal','$paid_amt','$outstanding','$advance_no','$credit_no',
            '$debit_no','$branch','$ret_no','$bank_charge')";
        
            $res1 = mysqli_query($db,$sql);

            if($flag_check==1)
            {
            $sql_select1="select opening_balance from wholesale_ledger_main 
            ORDER BY id DESC LIMIT 1";
            $res_select1 =  mysqli_query($db,$sql_select1);
            $row_select1 = mysqli_fetch_array($res_select1);
    $count1=mysqli_num_rows($res_select1);
            $amount1='';
            if($count1>0)
  {
            $last_amount=$row_select1['opening_balance'];
          $amount1=$last_amount+$paid_amt;
  }
  
  
  else{
      $last_amount='0';
      $amount1=$paid_amt;
  }
  

    // if($flag==0)
    // {
        $sql_ledger1 = "INSERT INTO `wholesale_ledger_main`( `bank_id_fk`, `customer_id_fk`,`account_no`, `debit`, `credit`,
          `against`, `opening_balance`, `date`,`add_time`, `flag`) 
        VALUES ('$bank_name','$customer','$account_no','$paid_amt',
        '0','wholesale Tax Invoice','$amount1','$bill_date','$cur_time', '$flag')";
    // }
        $res_ledger1 = mysqli_query($db,$sql_ledger1);

        }

    //    echo   $sql_ledger_update ="UPDATE `ledger_sub_total` SET`amount`='$amount1',`last_amount_type`='debit'";
    //        mysqli_query($db,$sql_ledger_update);

            if($res1 == 1)
            {
                
        
                
                $hsql = "SELECT * FROM wholesale_receipt_items_final 
                WHERE tax_invoice_fk='$invoice_id_pk'";
                $hres =  mysqli_query($db,$hsql);
                $hcount = mysqli_num_rows($hres);
                if($hcount > 0)
                {
                    $new_prev_paid = 0;
                    $new_advance_amt = 0;
                    $new_credit_amt = 0;
                    $new_debit_amt = 0;
                    $new_return_good_amt = 0;
                    while($Kd = mysqli_fetch_array($hres))
                    {
                        $prev_paid = $Kd['prev_paid'];
                        $advance_amt = $Kd['advance_amt'];
                        $credit_amt1 = $Kd['credit_amt'];
                        $debit_amt1 = $Kd['debit_amt'];
                        $return_good_amt1 = $Kd['return_good_amt'];
                        $discount1 = $Kd['discount'];
                        $paid_amt1 = $Kd['paid_amt'];

                        $new_prev_paid = $paid_amt + $prev_paid;
                        $new_advance_amt = $advance + $advance_amt;
                        $new_credit_amt = $credit_amt + $credit_amt1;
                        $new_debit_amt = $debit_amt + $debit_amt1;
                        $new_return_good_amt = $return_good_amt1 + $ret_good_amt;
                        $new_discount = $discount1 + $discount;
                        $new_paid_amt = $paid_amt1 + $paid_amt;
                        
                    }
                    $sql88 = "UPDATE `wholesale_receipt_items_final` 
                    SET `amount`='$Amount',`prev_paid`='$new_prev_paid',
                    `bal_amount`='$balance_amt',
                    `advance_amt`='$new_advance_amt',
                    `credit_amt`='$new_credit_amt'
                    ,`debit_amt`='$new_debit_amt',
                    `return_good_amt`='$new_return_good_amt',
                    `discount`='$new_discount',
                    `total_balance`='$tot_bal',
                    `paid_amt`='$new_paid_amt',
                    `outstanding`='$outstanding'
                    WHERE `tax_invoice_fk`='$invoice_id_pk'";
                    $sql88_res = mysqli_query($db,$sql88);
                    
                }
                else
                {
                    $hjk_sql = "INSERT INTO `wholesale_receipt_items_final`( 
                    `receipt_id_fk`, `tax_invoice_fk`, `tax_inv_dt`, `fin_yr`, `amount`, `prev_paid`, `bal_amount`, 
                    `advance_amt`, `credit_amt`, `debit_amt`, `return_good_amt`, `discount`, `total_balance`, `paid_amt`, 
                    `outstanding`, `advance_no`, `credit_no`, `debit_no`, `branch`, `return_no`, `bank_charges`) 
                    VALUES ('$last_id','$invoice_id_pk','$invoice_date','$fin_yr','$Amount',
                    '$paid_amt','$balance_amt','$advance','$credit_amt','$debit_amt','$ret_good_amt'
                    ,'$discount','$tot_bal','$paid_amt','$outstanding','$advance_no','$credit_no',
                    '$debit_no','$branch','$ret_no','$bank_charge')";

                    $hjk_res = mysqli_query($db,$hjk_sql);

                    
                }
                if($outstanding == 0)
                {
                    $usql = "UPDATE wholesale_tax_invoice SET receipt_status= '1' WHERE tax_id_pk='$invoice_id_pk'";
                    $ures = mysqli_query($db,$usql);

                    $usql = "UPDATE wholesale_receipt_items_final SET receipt_status= '1' WHERE tax_invoice_fk='$invoice_id_pk'";
                    $ures = mysqli_query($db,$usql);

                }
                //$flag_ok = "1";
                if($advance_no != "")
                {
                    $ad_id = explode(',',$advance_no );
                    $l = sizeof($ad_id);
                    for($i = 0;$i<$l;$i++)
                    {
                        $eid = $ad_id[$i];
                        $ad_sql = "UPDATE `wholesale_customer_advance` 
                        SET `used_status`='1' 
                        WHERE `advance_no`='$eid'";
                        $w = mysqli_query($db,$ad_sql);

                    }
                }
                if($credit_no != "")
                {
                    $ad_id = explode(',',$credit_no );
                    $l = sizeof($ad_id);
                    for($i = 0;$i<$l;$i++)
                    {
                        $eid = $ad_id[$i];
                        $ad_sql = "UPDATE `customer_manual_debit_credit` 
                        SET `used_status`='1' 
                        WHERE `debit_credit_no`='$eid'";
                        $w = mysqli_query($db,$ad_sql);

                    }
                }
                if($debit_no != "")
                {
                    $ad_id = explode(',',$debit_no );
                    $l = sizeof($ad_id);
                    for($i = 0;$i<$l;$i++)
                    {
                        $eid = $ad_id[$i];
                        $ad_sql = "UPDATE `customer_manual_debit_credit` 
                        SET `used_status`='1' 
                        WHERE `debit_credit_no`='$eid'";
                        $w = mysqli_query($db,$ad_sql);

                    }
                }
                if($ret_no != "")
                {
                    $ad_id = explode(',',$ret_no );
                    $l = sizeof($ad_id);
                    for($i = 0;$i<$l;$i++)
                    {
                        $eid = $ad_id[$i];
                        $ad_sql = "UPDATE `wholesale_return_good` 
                        SET `used_status`='1' 
                        WHERE `ret_no`='$eid'";
                        $w = mysqli_query($db,$ad_sql);

                    }
                }
                
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
        // echo "inside else";
    }

    if($flag_check==1){
        $sql_select="select opening_balance from wholesale_ledger_main ORDER BY id DESC LIMIT 1";
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
$sql_ledger = "INSERT INTO `wholesale_ledger_main`(`bank_id_fk`,`customer_id_fk`, `account_no`, `debit`, `credit`,
 `against`, `opening_balance`, `date`,`add_time`, `flag`) 
VALUES ('$bank_name','$customer','$account_no','0','$cheque_amt',
'wholesale Receipt','$amount1','$bill_date','$cur_time', '$flag')";
// }
          $sql_ledger = mysqli_query($db,$sql_ledger);


    }
    
    echo $work_order_item_save_flag;






//     session_start();
//     include('../../database/dbconnection.php');
//     extract($_POST);
//     date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
//     $cur_date = date('d-m-Y');
//     $cur_time = date('H:i:s A'); 
//     $bill_date1 = date("d-m-Y", strtotime($bill_date));
//     $newRawItemArray1 = json_decode($newRawItemArray, true);
//     //$length="";$width="";$po_amt=0;$s_total=0;$supplier_po_amt=0;$s_dicount_rs=0;
//     $po_item_save_flag_ok=0;
//     $work_order_item_save_flag  = 0;
//     $flag=$_SESSION['flag'];

//     $flag_check=0;

//     // $get_no = "SELECT sr_no FROM mstr_data_series WHERE name='wholesale_receipt'";
//     // $res_no = mysqli_fetch_row(mysqli_query($db, $get_no));
    
//     //$work_order_item_save_flag = 0;
//     //error_reporting(0);
//     //echo "transporter is:".$transporter;
//     if($payment_method == "Cash/Card")
//     {
//         // if($flag==0)
//         // {
//         $sql = "INSERT INTO `wholesale_receipt`(`cust_id_fk`, `branch`,
//         `bank_name`, `account_no`, `remark`, `payment_type`, `cash_amount`, 
//         `card_amount`, `card_no`,`receipt_date`, `add_time`, `flag`) VALUES ('$customer','$branch123','$bank_name',
//         '$account_no','$remark','$payment_method','$cash_amt','$card_amt','$card_no',
//         '$bill_date1','$cur_time', '$flag')";
//         // }

//     }
//     else if($payment_method == "Cheque")
//     {
//         // if($flag==0)
//         // {
//       $sql = "INSERT INTO `wholesale_receipt`(`cust_id_fk`, `branch`, 
//         `bank_name`, `account_no`, `remark`, `payment_type`,`cheque_amt`, `cheque_no`, `cheque_dt`, 
//         `receipt_date`, `add_time`, `flag`) 
//         VALUES ('$customer','$branch123','$bank_name',
//         '$account_no','$remark','$payment_method','$cheque_amt','$cheque_no','$cheque_date','$bill_date','$cur_time', '$flag')";
//         // }

//         $uchno = $cheque_no + 1;
//         $g = "UPDATE `mstr_cheque` 
//                 SET current_cheque_no = '$uchno' 
//                 WHERE bank_id_fk='$bank_name' AND account_no='$account_no'";
//                 $flag_check=1;



//         //   $sql_select="select amount from ledger_sub_total";
//         //   $res_select =  mysqli_query($db,$sql_select);
//         //   $row_select = mysqli_fetch_array($res_select);

//         //   $last_amount=$row_select['amount'];
//         //   $amount1=$last_amount+$cheque_amt;

//         //   $sql_ledger_update ="UPDATE `ledger_sub_total` SET`amount`='$amount1',`last_amount_type`='debit'";
//         //    mysqli_query($db,$sql_ledger_update);
//     }
//     else
//     {

//     }
    
    
//       $res = mysqli_query($db,$sql) or die('1: '.mysqli_error($db));
//      $last_id = mysqli_insert_id($db);
//      $resg = mysqli_query($db,$g) or die('2: '.mysqli_error($db));
//     //echo "\n";
//     // $select_data_series = "SELECT * FROM mstr_data_series WHERE name='wholesale_work_order'";
//     // $res_ds = mysqli_query($db,$select_data_series);
//     // while($drw = mysqli_fetch_array($res_ds))
//     // {
//     //     $sr_no = $drw['sr_no'];
//     // }
//     // $update_no = $sr_no + 1;
//     // $data_series_update_sql = "UPDATE mstr_data_series SET sr_no='$update_no' WHERE name='wholesale_work_order'";
//     // $update_res = mysqli_query($db,$data_series_update_sql);

    
//     if($res == 1)
//     {
        
//         //echo "inside";
//         $length1 = count($newRawItemArray1);
//         //echo "length is:".$length1;
//         for($j = 0;$j<$length1;$j++)
//         {   
//             //echo "jjj is:".$j;echo "\n";
             
//             $invoice_id_pk = $newRawItemArray1[$j]['invoice_id_pk'];
//             $invoice_no = $newRawItemArray1[$j]['invoice_no'];
//             $invoice_date =  $newRawItemArray1[$j]['invoice_date'];
//             $fin_yr =  $newRawItemArray1[$j]['fin_yr'];
//             $Amount =  $newRawItemArray1[$j]['Amount'];
//             $previous_paid =  $newRawItemArray1[$j]['previous_paid'];
//             $balance_amt =  $newRawItemArray1[$j]['balance_amt'];
//             $advance =  $newRawItemArray1[$j]['advance'];
//             $credit_amt =  $newRawItemArray1[$j]['credit_amt'];
//             $debit_amt =  $newRawItemArray1[$j]['debit_amt'];
//             $ret_good_amt =  $newRawItemArray1[$j]['ret_good_amt'];
//             $discount =  $newRawItemArray1[$j]['discount'];
//             $tot_bal =  $newRawItemArray1[$j]['tot_bal'];
//             $paid_amt =  $newRawItemArray1[$j]['paid_amt'];
//             $outstanding =  $newRawItemArray1[$j]['outstanding'];
//             $advance_no =  $newRawItemArray1[$j]['advance_no'];
//             $credit_no =  $newRawItemArray1[$j]['credit_no'];
//             $debit_no =  $newRawItemArray1[$j]['debit_no'];
//             $branch =  $newRawItemArray1[$j]['branch'];
//             $ret_no =  $newRawItemArray1[$j]['ret_no'];
//             $bank_charge =  $newRawItemArray1[$j]['bank_charge'];

//              $sql = "INSERT INTO `wholesale_receipt_items`(
//             `receipt_id_fk`, `tax_invoice_fk`, `tax_inv_dt`, `fin_yr`, `amount`, 
//             `prev_paid`, `bal_amount`, `advance_amt`, `credit_amt`, `debit_amt`, 
//             `return_good_amt`, `discount`, `total_balance`, `paid_amt`, `outstanding`, 
//             `advance_no`, `credit_no`, `debit_no`, `branch`, `return_no`, `bank_charges`) 
//             VALUES ('$last_id','$invoice_id_pk','$invoice_date','$fin_yr','$Amount',
//             '$previous_paid','$balance_amt','$advance','$credit_amt','$debit_amt','$ret_good_amt'
//             ,'$discount','$tot_bal','$paid_amt','$outstanding','$advance_no','$credit_no',
//             '$debit_no','$branch','$ret_no','$bank_charge')";
        
//             $res1 = mysqli_query($db,$sql) or die('3: '.mysqli_error($db));

//             if($flag_check==1)
//             {
//             $sql_select1="select opening_balance from wholesale_ledger_main 
//             ORDER BY id DESC LIMIT 1";
//             $res_select1 =  mysqli_query($db,$sql_select1)  or die('4: '.mysqli_error($db));
//             $row_select1 = mysqli_fetch_array($res_select1);
//     $count1=mysqli_num_rows($res_select1);
//             $amount1='';
//             if($count1>0)
//   {
//             $last_amount=$row_select1['opening_balance'];
//           $amount1=$last_amount+$paid_amt;
//   }
  
  
//   else{
//       $last_amount='0';
//       $amount1=$paid_amt;
//   }
  

//     // if($flag==0)
//     // {
//         $sql_ledger1 = "INSERT INTO `wholesale_ledger_main`( `bank_id_fk`, `customer_id_fk`,`account_no`, `debit`, `credit`,
//           `against`, `opening_balance`, `date`,`add_time`, `flag`) 
//         VALUES ('$bank_name','$customer','$account_no','$paid_amt',
//         '0','wholesale Tax Invoice','$amount1','$bill_date','$cur_time', '$flag')";
//     // }
//         $res_ledger1 = mysqli_query($db,$sql_ledger1) or die('5: '.mysqli_error($db));

//         }

//     //    echo   $sql_ledger_update ="UPDATE `ledger_sub_total` SET`amount`='$amount1',`last_amount_type`='debit'";
//     //        mysqli_query($db,$sql_ledger_update);

//             if($res1 == 1)
//             {
                
        
                
//                 $hsql = "SELECT * FROM wholesale_receipt_items_final 
//                 WHERE tax_invoice_fk='$invoice_id_pk'";
//                 $hres =  mysqli_query($db,$hsql) or die('6: '.mysqli_error($db));
//                 $hcount = mysqli_num_rows($hres);
//                 if($hcount > 0)
//                 {
//                     $new_prev_paid = 0;
//                     $new_advance_amt = 0;
//                     $new_credit_amt = 0;
//                     $new_debit_amt = 0;
//                     $new_return_good_amt = 0;
//                     while($Kd = mysqli_fetch_array($hres))
//                     {
//                         $prev_paid = $Kd['prev_paid'];
//                         $advance_amt = $Kd['advance_amt'];
//                         $credit_amt1 = $Kd['credit_amt'];
//                         $debit_amt1 = $Kd['debit_amt'];
//                         $return_good_amt1 = $Kd['return_good_amt'];
//                         $discount1 = $Kd['discount'];
//                         $paid_amt1 = $Kd['paid_amt'];

//                         $new_prev_paid = $paid_amt + $prev_paid;
//                         $new_advance_amt = $advance + $advance_amt;
//                         $new_credit_amt = $credit_amt + $credit_amt1;
//                         $new_debit_amt = $debit_amt + $debit_amt1;
//                         $new_return_good_amt = $return_good_amt1 + $ret_good_amt;
//                         $new_discount = $discount1 + $discount;
//                         $new_paid_amt = $paid_amt1 + $paid_amt;
                        
//                     }
//                     $sql88 = "UPDATE `wholesale_receipt_items_final` 
//                     SET `amount`='$Amount',`prev_paid`='$new_prev_paid',
//                     `bal_amount`='$balance_amt',
//                     `advance_amt`='$new_advance_amt',
//                     `credit_amt`='$new_credit_amt'
//                     ,`debit_amt`='$new_debit_amt',
//                     `return_good_amt`='$new_return_good_amt',
//                     `discount`='$new_discount',
//                     `total_balance`='$tot_bal',
//                     `paid_amt`='$new_paid_amt',
//                     `outstanding`='$outstanding'
//                     WHERE `tax_invoice_fk`='$invoice_id_pk'";
//                     $sql88_res = mysqli_query($db,$sql88) or die('7: '.mysqli_error($db));
                    
//                 }
//                 else
//                 {
//                     $hjk_sql = "INSERT INTO `wholesale_receipt_items_final`( 
//                     `receipt_id_fk`, `tax_invoice_fk`, `tax_inv_dt`, `fin_yr`, `amount`, `prev_paid`, `bal_amount`, 
//                     `advance_amt`, `credit_amt`, `debit_amt`, `return_good_amt`, `discount`, `total_balance`, `paid_amt`, 
//                     `outstanding`, `advance_no`, `credit_no`, `debit_no`, `branch`, `return_no`, `bank_charges`) 
//                     VALUES ('$last_id','$invoice_id_pk','$invoice_date','$fin_yr','$Amount',
//                     '$paid_amt','$balance_amt','$advance','$credit_amt','$debit_amt','$ret_good_amt'
//                     ,'$discount','$tot_bal','$paid_amt','$outstanding','$advance_no','$credit_no',
//                     '$debit_no','$branch','$ret_no','$bank_charge')";

//                     $hjk_res = mysqli_query($db,$hjk_sql);

                    
//                 }
//                 if($outstanding == 0)
//                 {
//                     $usql = "UPDATE wholesale_tax_invoice SET receipt_status= '1' WHERE tax_id_pk='$invoice_id_pk'";
//                     $ures = mysqli_query($db,$usql);

//                     $usql = "UPDATE wholesale_receipt_items_final SET receipt_status= '1' WHERE tax_invoice_fk='$invoice_id_pk'";
//                     $ures = mysqli_query($db,$usql);

//                 }
//                 //$flag_ok = "1";
//                 if($advance_no != "")
//                 {
//                     $ad_id = explode(',',$advance_no );
//                     $l = sizeof($ad_id);
//                     for($i = 0;$i<$l;$i++)
//                     {
//                         $eid = $ad_id[$i];
//                         $ad_sql = "UPDATE `wholesale_customer_advance` 
//                         SET `used_status`='1' 
//                         WHERE `advance_no`='$eid'";
//                         $w = mysqli_query($db,$ad_sql);

//                     }
//                 }
//                 if($credit_no != "")
//                 {
//                     $ad_id = explode(',',$credit_no );
//                     $l = sizeof($ad_id);
//                     for($i = 0;$i<$l;$i++)
//                     {
//                         $eid = $ad_id[$i];
//                         $ad_sql = "UPDATE `customer_manual_debit_credit` 
//                         SET `used_status`='1' 
//                         WHERE `debit_credit_no`='$eid'";
//                         $w = mysqli_query($db,$ad_sql);

//                     }
//                 }
//                 if($debit_no != "")
//                 {
//                     $ad_id = explode(',',$debit_no );
//                     $l = sizeof($ad_id);
//                     for($i = 0;$i<$l;$i++)
//                     {
//                         $eid = $ad_id[$i];
//                         $ad_sql = "UPDATE `customer_manual_debit_credit` 
//                         SET `used_status`='1' 
//                         WHERE `debit_credit_no`='$eid'";
//                         $w = mysqli_query($db,$ad_sql);

//                     }
//                 }
//                 if($ret_no != "")
//                 {
//                     $ad_id = explode(',',$ret_no );
//                     $l = sizeof($ad_id);
//                     for($i = 0;$i<$l;$i++)
//                     {
//                         $eid = $ad_id[$i];
//                         $ad_sql = "UPDATE `wholesale_return_good` 
//                         SET `used_status`='1' 
//                         WHERE `ret_no`='$eid'";
//                         $w = mysqli_query($db,$ad_sql);

//                     }
//                 }
                
//                 $work_order_item_save_flag = 1;
//             }
//             else
//             {
//                 //$flag_ok = "0";
//                 $work_order_item_save_flag = 0;
//             }

//         }
//     }
//     else
//     {
//         echo "inside else";
//     }

//     if($flag_check==1){
//         $sql_select="select opening_balance from wholesale_ledger_main ORDER BY id DESC LIMIT 1";
//           $res_select =  mysqli_query($db,$sql_select);
//           $row_select = mysqli_fetch_array($res_select);
//           $count=mysqli_num_rows($res_select);
//           $amount1='';
//           if($count>0)
// {
//           $last_amount=$row_select['opening_balance'];
//           $amount1=$last_amount-$cheque_amt;
// }


// else{
//     $last_amount='0';
//     $amount1=$cheque_amt;
// }
// // if($flag==0)
// // {
// $sql_ledger = "INSERT INTO `wholesale_ledger_main`(`bank_id_fk`,`customer_id_fk`, `account_no`, `debit`, `credit`,
//  `against`, `opening_balance`, `date`,`add_time`, `flag`) 
// VALUES ('$bank_name','$customer','$account_no','0','$cheque_amt',
// 'wholesale Receipt','$amount1','$bill_date','$cur_time', '$flag')";
// // }
//           $sql_ledger = mysqli_query($db,$sql_ledger);


//     }
    
//     echo $work_order_item_save_flag;
?>
