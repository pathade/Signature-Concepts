<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
   
    //print_r($newRawItemArray);
     $sql = "INSERT INTO `exp_bill_entry`(`type`, `against`, `po_date`, `po_id_fk`, `branch`,
    `expense_head_id_fk`, `authorised_by`, `vendor_id_fk`, `po_amount`, `bill_no`, `bill_date`,`paid_amt`,
    `due_date` ,`bill_amt`,`discount_per`,`discount_amt`,`amt_after_dis`,`tax_per`,`tax_amt`,`net_amt`,`tds_per`,`tds_amt`,
    `actual_bal`, `remark`,`be_no`,
    `add_date`, `add_time`,`added_by`) VALUES ('$type',
    '$against','$po_date','$po_no', '$branch', '$expense_head_id_fk' ,'$authorised_by', '$vendor_id_fk',
    '$po_amount','$bill_no','$bill_date','$paid_amt','$due_date','$bill_amt','$discount_per','$discount_amt','$amt_after_dis',
    '$tax_per', '$tax_amt','$net_amt', '$tds_per', '$tds_amt','$actual_bal',
    '$remark','$be_no',
    '$cur_date','$cur_time','admin@gmail.com')";
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        $sno=$be_no+1;
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_bill_entry' ";
        $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>