<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
   
    //print_r($newRawItemArray);
    
    $sql = "INSERT INTO `exp_company_loan_advance`(`type`, `branch`, `vendor_id_fk`, `pay_mode`, `transaction_date`,
    `bank_id_fk`, `account_no`, `cheque_no`, `cheque_date`, `amount`, `against_ref`, `remark`,`cla_no`,
    `add_date`, `add_time`,`added_by`) VALUES ('$type',
    '$branch','$name','$pay_mode', '$transaction_date', '$account_no' ,'0', '$cheque_no', '$cheque_date',
    '$amount','$against_ref', '$remark','$cla_no',
    '$cur_date','$cur_time','admin@gmail.com')";
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        $sno=$cla_no+1;
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_company_loan_advance' ";
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>