<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{

  extract($_POST);
  include '../../database/dbconnection.php';
  
  // $sql = "SELECT poi.id, mi.final_product_code,poi.account,poi.quantity,poi.rate,poi.amount
  // FROM purchase_order po, purchase_order_items poi,mstr_item mi
  // WHERE po.id='$po_no' and po.id=poi.purchase_order_id_fk and poi.item_id_fk=mi.item_id_pk";
    
  $sql = "SELECT * FROM grn_items WHERE grn_id_fk='".$_POST['grn_no']."'";

  $data = array();
  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
   
  $i=1;
  while($row=mysqli_fetch_assoc($result))
  {
      $gst_per = 18;
      $cgst = ($row['quantity']*$row['amount']) * 18 / 100;
      $sgst = ($row['quantity']*$row['amount']) * 18 / 100;
      $igst = $cgst + $sgst;
      
      $obj = array();
     
      $obj['start'] = $i++;
      $obj['id'] = $row['id_pk'];
      $obj['item_detail'] = $row['item_detail'];
      $obj['design_code'] = $row['design_code'];
      $obj['size'] = $row['size'];
      $obj['quantity'] = $row['quantity'];
      $obj['rate'] = $row['rate'];
      $obj['amount'] = $row['amount'];
      $obj['act_quantity'] = $row['quantity'];
      $obj['act_rate'] = $row['rate'];
      $obj['act_amount'] = $row['amount'];
      $obj['gst_per'] = $gst_per;
      $obj['cgst'] = $cgst;
      $obj['sgst'] = $sgst;
      $obj['igst'] = $igst;
     
      array_push($response, $obj);
  }

  }
  else
    $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response);
  
  
?>
  