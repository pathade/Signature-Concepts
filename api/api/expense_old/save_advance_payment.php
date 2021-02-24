<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
   
    //print_r($newRawItemArray);
    
    $sql = "INSERT INTO `exp_advance_payment`(`type`, `cheque_date`, `payment_type`, `vendor_id_fk`, `manual_credit_no`,
    `manual_credit_amt`, `po_id_fk`, `amount`, `bank_id_fk`, `cheque_no`, `authorised_by`, `remark`, `branch`,`ap_no`,
    `add_date`, `add_time`,`added_by`) VALUES ('$type',
    '$cheque_date','$payment_type','$vendor_id_fk', '$manual_credit_no', '$manual_credit_amt' ,'$po_no', '$amount', '$account_no',
    '$cheque_no','$authorised_by', '$remark', 'Signature Concepts LLP','$ap_no',
    '$cur_date','$cur_time','admin@gmail.com')";
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        $sno=$ap_no+1;
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_advance_payment' ";
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>