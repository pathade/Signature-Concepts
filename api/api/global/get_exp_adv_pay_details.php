<?php 
header('Content-Type: application/json'); 
//$response = array();    
// echo "kkkkk";
 session_start();
$flag = $_SESSION['flag'];
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  $v = $_POST['adv_pay_id_fk'];
  include '../../database/dbconnection.php';

  /*$sql = "SELECT ap.vendor_id_fk,ap.amount,ap.payment_type,ap.bank_id_fk,
  ap.type,ap.id_pk ,v.first_name,v.last_name 
  FROM exp_advance_payment as ap ,
  mstr_vendor as v 
  where id_pk='$v' AND ap.vendor_id_fk = v.vendor_id_pk AND adv_pay_cancel_status!='1'";*/

  // $sql = "SELECT ap.vendor_id_fk,ap.amount,ap.payment_type,ap.bank_id_fk,ap.type,ap.id_pk 
  // FROM exp_advance_payment as ap 
  // where id_pk='$adv_pay_id_fk'";
  if ($flag == 0) {
  $sql = "SELECT * FROM exp_advance_payment WHERE id_pk='$v' and flag = '0' ";
  }
  else {
    $sql = "SELECT * FROM exp_advance_payment WHERE id_pk='$v' and flag = '1' ";
  }
  $result = mysqli_query($db, $sql);
  if($result)
  {
    while ($row = mysqli_fetch_array($result))
    {
      $vendor_id_fk = $row['vendor_id_fk'];
      // $first_name = $row['first_name'];
      // $last_name = $row['last_name'];
      $amount=$row['amount'];
      $type=$row['type'];
      $payment_type= $row['payment_type'];
      if($type == "Finance")
      {
         if ($flag == 0) {
        $k = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$vendor_id_fk' and flag = '0' ";
         }
         else {
              $k = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$vendor_id_fk' and flag = '1' ";
          }
        $lk = mysqli_query($db,$k);
        while($klrw = mysqli_fetch_array($lk))
        {
          $vname = $klrw['name'];
        }
      }
      else if($type == "Expense")
      {
          if ($flag == 0) {
         $k = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$vendor_id_fk' and flag = '0' ";
          }
           else {
             $k = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$vendor_id_fk' and flag = '1' ";  
           }
        $lk = mysqli_query($db,$k);
        while($klrw = mysqli_fetch_array($lk))
        {
          $vname = $klrw['first_name']."".$klrw['last_name'];
        } 
      }
      else
      {
        $vname = "Record Not Found";
      }
    }
    echo '<option value="'.$vendor_id_fk.'">'.$vname.'</option>';
    echo "#";
    echo $amount;
    echo "#";
    echo $payment_type;
    
  }
}

?>