<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $bill_date1 = date("d-m-Y", strtotime($bill_date));
    $due_date1 = date("d-m-Y", strtotime($due_date));
    //convert json to array
   
    

    $sql = "UPDATE `exp_bill_entry` SET `type`='$against',`against`='$against',
    `po_date`='$cur_date',`po_id_fk`='0',`branch`='$branch',
    `expense_head_id_fk`='$expense_head_id_fk',`authorised_by`='$authorised_by',
    `vendor_id_fk`='$vendor_id_fk',`po_amount`='$po_amount',`bill_no`='$bill_no',
    `bill_date`='$bill_date1',`paid_amt`='$paid_amt',`due_date`='$due_date1',
    `bill_amt`='$bill_amt',`discount_per`='$discount_per',`discount_amt`='$discount_amt',
    `amt_after_dis`='$amt_after_dis',`tax_per`='$tax_per',`tax_amt`='$tax_amt',
    `net_amt`='$net_amt',`tds_per`='$tds_per',`tds_amt`='$tds_amt',
    `actual_bal`='$actual_bal',`remark`='$remark',`add_date`='$cur_date',
    `add_time`='$cur_time' 
    WHERE `bill_id_pk`='$edit_id'";
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
        // $sno=$be_no+1;
        // $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_bill_entry' ";
        // $res = mysqli_query($db,$sql12);
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>