<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{

  extract($_POST);
  include '../../database/dbconnection.php';
  
$sql = "SELECT poi.id, mi.final_product_code,poi.account,poi.quantity,poi.rate,poi.amount
FROM purchase_order po, purchase_order_items poi,mstr_item mi
WHERE po.id='$po_no' and po.id=poi.purchase_order_id_fk and poi.item_id_fk=mi.item_id_pk";
    
  $data = array();
  $result = mysqli_query($db, $sql);
   
  $i=1;
  while($row=mysqli_fetch_assoc($result))
  {
   
      $obj = array();
     
      $obj['start'] = $i++;
      $obj['id'] = $row['id'];
      $obj['final_product_code'] = $row['final_product_code'];
      $obj['account'] = $row['account'];
      $obj['quantity'] = $row['quantity'];
      $obj['rate'] = $row['rate'];
      $obj['amount'] = $row['amount'];
      $obj['act_quantity'] = $row['quantity'];
      $obj['act_rate'] = $row['rate'];
      $obj['act_amount'] = $row['amount'];
     


     
      array_push($response, $obj);
  }

  }
  else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);
  ?>
  