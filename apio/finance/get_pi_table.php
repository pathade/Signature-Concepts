<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  session_start();
  $flag = $_SESSION['flag'];
  $sql= '';
  
  if($flag == 0) {
        $sql = "SELECT * FROM 
        fin_purchase_invoice fp,
        fin_purchase_invoice_items fpi   
        WHERE fp.supplier_id_fk='$supplier' AND
        fpi.fpi_id_fk=fp.id_pk AND flag='0'
      ";
  }
 else {
  $sql = "SELECT * FROM 
        fin_purchase_invoice fp,
        fin_purchase_invoice_items fpi   
        WHERE fp.supplier_id_fk='$supplier' AND
        fpi.fpi_id_fk=fp.id_pk AND flag='1'
      ";
 }


  $data = array();
  $result = mysqli_query($db, $sql);
  $count=1;
  $start = 1;
  
  if($flag == 0) {
    $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$supplier' AND flag='0' ";
  }
  else {
    $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$supplier' AND flag='1' ";
  }
    $res_supplier = mysqli_fetch_row(mysqli_query($db, $get_supplier));

  while ($row = mysqli_fetch_assoc($result))
  { 
        $obj = array();
        $obj['start'] = $start++;

        $obj['pi_id'] = $row['id_pk'];
        $obj['supplier'] = $res_supplier[1];
        $obj['bill_no'] = $row['bill_no'];
        $obj['bill_amt'] = $row['net_amt'];
        $obj['prev_paid'] = 0;
        $obj['total'] = $row['net_amt'];
        $obj['grr_id'] = 0;
        $obj['grr'] = 0;
        $obj['netpayto_supplier'] = $row['net_amt'];
        $obj['manual_drid'] = 0;
        $obj['manual_dr'] = 0;
        $obj['manual_crid'] = 0;
        $obj['manual_cr'] = 0;
        $obj['adv_payment'] = 0;
        $obj['amount'] = $row['net_amt'];
        $obj['discount'] = 0;
        $obj['total_pay'] = $row['net_amt'];
        $obj['other'] = 0;
        $obj['pay_amount'] = 0;
        $obj['remark'] = '';
        $obj['grr_date'] = '';
        $obj['grr_disp_no'] = '';
        $obj['grr_disp_amt'] = '';
        $obj['pi_drper'] = '';



        array_push($response, $obj);
        $count++;
  }
}
else
  $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response); 
?>   
   
   



















