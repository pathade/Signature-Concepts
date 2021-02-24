<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $pay_date1 = date("d-m-Y", strtotime($pay_date));
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    //convert json to array
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    //echo ('array is');
    //print_r($newRawItemArray1);

    //print_r($newRawItemArray);
    $first = date("y",strtotime("-1 year"));
    $second = date("y");

 $padv_no1 = $first."-".$second."/".$padv_no ;
 if ($flag == 0) 
 {
    $sql = "INSERT INTO `exp_pay_advice`(`pay_type`, `pay_date`, `authorised_by`, 
    `branch`, `type_vari`,`vendor_id_fk`, `total_payable_amt`, `total_paid_amt`,
    `tds_amt`,`padv_no`,`add_date`, `add_time`,`added_by`,`flag`) VALUES ('$pay_type',
    '$pay_date1','$authorised_by','$branch', '$type_vari',
    '$vendor_id_fk',
    '$payable_amt', '$paid_amt','$tds_amt','$padv_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
 }
 else {
      $sql = "INSERT INTO `exp_pay_advice`(`pay_type`, `pay_date`, `authorised_by`, 
    `branch`, `type_vari`,`vendor_id_fk`, `total_payable_amt`, `total_paid_amt`,
    `tds_amt`,`padv_no`,`add_date`, `add_time`,`added_by`,`flag`) VALUES ('$pay_type',
    '$pay_date1','$authorised_by','$branch', '$type_vari',
    '$vendor_id_fk',
    '$payable_amt', '$paid_amt','$tds_amt','$padv_no1',
    '$cur_date','$cur_time','admin@gmail.com','$flag')";
 }
$res = mysqli_query($db,$sql);
$last_id = mysqli_insert_id($db);  

 if($res == 1)
{
    $length1 = count($newRawItemArray1);
    for($j = 0;$j<$length1;$j++)
    {   
        //echo "jjj is:".$j;echo "\n";
        $pay_advice_no = $newRawItemArray1[$j]['pay_advice_no'];
        $vendor_name =  $newRawItemArray1[$j]['vendor_name'];
        $bill_no =  $newRawItemArray1[$j]['bill_no'];
        $bill_date =  $newRawItemArray1[$j]['bill_date'];
        $bill_amt = $newRawItemArray1[$j]['bill_amt'];
        $addition = $newRawItemArray1[$j]['addition'];
        $deduction = $newRawItemArray1[$j]['deduction'];
        $final_payment = $newRawItemArray1[$j]['final_payment'];
        $paid_amount = $newRawItemArray1[$j]['paid_amount'];

        $sql = "INSERT INTO `exp_payadvice_bill_detail_table`(`pay_advice_no`,`vendor_id_fk`,
        `bill_no`, `bill_date`,`bill_amt`,`addition`,`deduction`,`final_payment`,
        `pay_amount`,`pay_advice_id_fk`) 
        VALUES ('$pay_advice_no','$vendor_name','$bill_no'
        ,'$bill_date','$bill_amt','$addition','$deduction','$final_payment',
        '$paid_amount','$last_id')";

        $res1 = mysqli_query($db,$sql);
        if($res1 == 1)
        {

            $flag_ok = "1";
        }
        else
        {
            $flag_ok = "0";
        }

    }

        $sno= $padv_no + 1;
        if ($flag == 0) 
        {
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_payment_advice' and flag='0' ";
        }
        else {
            $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_payment_advice' and flag='1' ";
        }
        $res = mysqli_query($db,$sql12);
        echo "1";
}
else
{
    echo "0";
}
 
?>