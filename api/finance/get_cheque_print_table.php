<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  session_start();
  $flag = $_SESSION['flag'];
  $get_supplier= '';
  $count=1;
  $start = 1;
  
  if ($flag == 0){
    $get_supplier = "SELECT pai.fpa_id_fk , pa.fin_yr,pa.supplier_id_fk, pai.supplier_name, pai.amount, pai.id_pk
    FROM fin_payment_advice pa, fin_payment_advice_items pai
    WHERE pa.supplier_id_fk='$supplier' AND pa.id_pk = pai.fpa_id_fk AND flag='0' ";
  }
  else {
    $get_supplier = "SELECT pai.fpa_id_fk , pa.fin_yr,pa.supplier_id_fk, pai.supplier_name, pai.amount, pai.id_pk
    FROM fin_payment_advice pa, fin_payment_advice_items pai
    WHERE pa.supplier_id_fk='$supplier' AND pa.id_pk = pai.fpa_id_fk AND flag='1' ";
  }
 
    $res_supplier = mysqli_query($db, $get_supplier);

  while ($row = mysqli_fetch_row($res_supplier))
  { 
        $obj = array();
        $obj['start'] = $start++;
        $obj['pa_no'] = $row[0];
        $obj['fin_yr'] = $row[1];
        $obj['supplier_id'] = $row[2];
        $obj['supplier_name'] = $row[3];
        $obj['amount'] = $row[4];
        $obj['id'] = $row[5];
       


        array_push($response, $obj);
        $count++;
  }
}
else
  $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response); 
?>   
   
   



















