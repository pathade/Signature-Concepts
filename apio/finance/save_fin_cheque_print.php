<?php

    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
     $cheque_date1 =  date("d-m-Y", strtotime($cheque_date));
    $first = date("y",strtotime("-1 year"));
    $second = date("y");

     $cheque_print_no1 = $first."-".$second."/".$cheque_print_no;
  
    if ($flag == 0) {
        $sql = "INSERT INTO `fin_cheque_print` (supplier_name, cheque_no, cheque_date, bank_name, account_no, pay_type,
        bank_name1,account_no1, cheque_no1, reason, cheque_print_no, add_date, add_time, added_by,flag) 
       Values ('$supplier', '$cheque_no', '$cheque_date1', '$bank_name', '$account_no', '$type','$bank_name1',
        '$account_no1','$cheque_no1','$reason','$cheque_print_no1','$cur_date','$cur_time', 'admin@gmail.com','$flag')";
    }
    else {
          $sql = "INSERT INTO `fin_cheque_print` (supplier_name, cheque_no, cheque_date, bank_name, account_no, pay_type,
        bank_name1,account_no1, cheque_no1, reason, cheque_print_no, add_date, add_time, added_by,flag) 
       Values ('$supplier', '$cheque_no', '$cheque_date1', '$bank_name', '$account_no', '$type','$bank_name1',
        '$account_no1','$cheque_no1','$reason','$cheque_print_no1','$cur_date','$cur_time', 'admin@gmail.com','$flag')";
    }
    

    $res = mysqli_query($db, $sql);

    if($res == 1)
    {
        $fin_cheque_print_idfk=mysqli_insert_id($db);

        $itemArray = json_decode($newRawItemArray, true);
        if(!empty($itemArray))
        {
            foreach($itemArray as $itemObj) 
            {

                $pa_no = $itemObj['pa_no']; 
                $fin_yr = $itemObj['fin_yr']; 
                $supplier_id = $itemObj['supplier_id']; 
                $supplier_name = $itemObj['supplier_name']; 
                $amount = $itemObj['amount']; 
                $id = $itemObj['id'];

                $sql1 = "INSERT INTO `fin_cheque_print_table`(`pay_advice_no`, `fin_yr`, `supplier_id`,
                `supplier_name`, `amount`, `id`, `fin_cheque_print_idfk`,`flag`) 
                VALUES ('$pa_no','$fin_yr','$supplier_id','$supplier_name','$amount','$id','$fin_cheque_print_idfk','$flag')";

                $res1 = mysqli_query($db, $sql1);
            }
        }

        $sno=$cheque_print_no+1;
        if($flag == 0) {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_cheque_printing' AND flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_cheque_printing' AND flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
        echo 1;
    }
    else
        echo 0;

?>