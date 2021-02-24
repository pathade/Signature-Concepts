<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);

  $sql = "SELECT * FROM wholesale_work_order_items as woi,mstr_item as i WHERE woi.item_id_fk= i.item_id_pk AND work_order_no_id_fk='$edit_id'
  ";
  $data = array();
  $result = mysqli_query($db, $sql);
  $start = 1;

  while($row = mysqli_fetch_row(result))
  {
    $data[] = $row;
    $obj['item_id_fk'] = $row['item_id_fk'];
    $obj['qty'] = $row['qty'];
    $obj['breadth'] = $row['breadth'];

    array_push($data, $obj);
  }
  
  
  $results = ["sEcho" => 1,
              "iTotalRecords" => count($data),
              "iTotalDisplayRecords" => count($data),
              "aaData" => $data ];
  
  
  echo json_encode($results);
}
else
  $response['error'] = "Data Not Found...!!!";  
//echo json_encode($response);
?>