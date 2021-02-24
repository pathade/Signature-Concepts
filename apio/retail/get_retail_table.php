<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{

  extract($_POST);
  include '../../database/dbconnection.php';
  
//   $sql = "SELECT * FROM retail_proforma_items WHERE rpi_id_fk='".$_POST['po_no']."'";

  $sql = "SELECT rpi.*, rti.qty as rti_qty FROM retail_proforma_items rpi, retail_tax_invoice_items rti, retail_tax_invoice rt 
            WHERE rt.po_no_fk='$po_no'
            AND rpi.rpi_id_fk='$po_no'  
            AND rti.rti_id_fk=rt.id_pk";



  $data = array();
  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
   
  $i=1;
  while($row=mysqli_fetch_assoc($result))
  {
      $get_product_design = "SELECT final_product_code FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
      $res = mysqli_fetch_array(mysqli_query($db, $get_product_design));

   
      $obj = array();
     
      $obj['start'] = $i++;
      $obj['pono'] = $_POST['po_no'];
      $obj['item_name'] = $res['0'];
      $obj['size'] = $row['size'];
      $obj['oqty'] = $row['qty'];
      $obj['pqty'] = $row['rti_qty'];
      $obj['dqty'] = 0;
      $obj['process'] = 'N';
      $obj['final_amt'] = $row['amount'];
      $obj['reduced_amt'] = 0;
     
      array_push($response, $obj);
  }

  }
  else
    $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response);
  
  
?>
  