<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
    $date1 = date("d-m-Y", strtotime($date));
    if($tax == null )
      $tax = 0;
      $sql='';
      $flag=$_SESSION['flag'];
      // if($flag==0){
 $sql = "INSERT INTO `supplier_manual_debit_credit`( `credit_debit_type`, `debit_credit_no`,`date`, `supplier_id_fk`, 
        `branch`, `authorised_by`, `transaction_amount`, `total`, `tax_id_fk`,`tax_amount`, `other`, `final_amount`,
         `reason`, `adv_pay_no`, `advance_amount`, `balance amount`,`flag`)
          VALUES ('$type','$credit_debit_no','$date1','$supplier','$branch',
          '$authorised_by','$transaction_amount','$total','$tax','$tax_amount','$other','$final_amount',
          '$remark','0','0','0','$flag')";
      // }
      
    $result = mysqli_query($db, $sql);
    if($result)
    {

        $credit_debit_no=substr("$credit_debit_no",6);
                $sno=$credit_debit_no+1;
                $sql12 = "update mstr_data_series set sr_no= '$sno' where name='supplier_manual_credit_debit' ";
                $res = mysqli_query($db,$sql12);
      echo "1";
            
            
          }
          else
           echo "02";
    }else
      echo "03";

?>