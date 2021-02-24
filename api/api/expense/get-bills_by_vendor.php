<?php 
header('Content-Type: application/json'); 
$response = array();    
if($_SERVER['REQUEST_METHOD']=='GET')
{
  extract($_GET);
  include '../../database/dbconnection.php';
  session_start();
  $flag = $_SESSION['flag'];
  $sql= '';

  if($flag == 0) {
   $sql = "SELECT * FROM exp_bill_entry WHERE vendor_id_fk = '$vendor_id_fk' and flag='0' ";
  }
  else {
    $sql = "SELECT * FROM exp_bill_entry WHERE vendor_id_fk = '$vendor_id_fk' and flag='1' ";
  }
    
   $data = array();
    $result1 = mysqli_query($db, $sql);
    if($result1)
    {
    $i=1;
    while($row=mysqli_fetch_assoc($result1))
    {
      if($flag == 0) {
      $m = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$vendor_id_fk' and flag='0' ";
      }
      else {
        $m = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$vendor_id_fk' and flag='1' ";
      }
      $mres = mysqli_query($db,$m);
      while($mrow = mysqli_fetch_array($mres))
      {
        $vname = $mrow['first_name']."".$mrow['last_name'];
      }
   
     $obj = array();
     $obj['start'] = $i++;
      $obj['vendor_name'] = $vname;
      $obj['bill_no'] = $row['bill_no'];
      $obj['bill_date'] = $row['bill_date'];
      $obj['bill_amt'] = $row['actual_bal'];
      $obj['addition'] = '0';
      $obj['deduction'] = '0';
      $obj['final_payment'] = $row['actual_bal'];
      $obj['paid_amount'] = '0';
      $obj['vid'] = $row['vendor_id_fk'];
      
      array_push($response, $obj);
  }
}

  }
    echo json_encode($response);
  ?>
  