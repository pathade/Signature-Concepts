<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{

  extract($_POST);
  include '../../database/dbconnection.php';
  
$sql = "SELECT poi.id, mi.final_product_code,mi.item_id_pk,poi.design_code,poi.size,poi.quantity,poi.rate,poi.amount,po.work_no,po.retail_proforma_no
        FROM purchase_order po, purchase_order_items poi,mstr_item mi
        WHERE po.id='$po_no' AND po.id=poi.purchase_order_id_fk AND poi.item_id_fk=mi.item_id_pk";
    
  $data = array();
  $result = mysqli_query($db, $sql);
   
  $i=1;
  while($row=mysqli_fetch_assoc($result))
  {
   
      $obj = array();
     $obj['work_no']=$row['work_no'];
     $obj['rpo_no']=$row['retail_proforma_no'];
      $obj['start'] = $i++;
      $obj['id'] = $row['id'];
      $obj['item_id_pk'] = $row['item_id_pk'];
      $obj['final_product_code'] = $row['final_product_code'];
      $obj['design_code'] = $row['design_code'];
      $obj['size'] = $row['size'];
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
  