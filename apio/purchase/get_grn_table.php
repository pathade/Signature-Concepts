<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
 $sql = "SELECT gi.* 
        from grn g, grn_items gi
        WHERE g.grn_id_pk='$itemId' and g.grn_id_pk=gi.grn_id_fk";


  $data = array();
  $result = mysqli_query($db, $sql);
  $count=1;
  $start = 1;
  

  while ($row = mysqli_fetch_array($result))
  { 
      $obj = array();
      $obj['0'] = $start++;
     
      $obj['1'] = "<p class='d-none'>".$row['id_pk']."</p>";
      $obj['2'] = "<p class='d-none'>".$row['id_pk']."</p>";
      $obj['3'] = '<select><option value="'.$row['item_detail'].'">'.$row['design_code'].'</option></select>';
      $obj['4'] = "<p class='d-none'>".$row['design_code']."</p>";
      $obj['5'] = "<p>".$row['size']."</p>";
      $obj['6'] = "<p>".$row['quantity']."</p>";
      $obj['7'] = "<p>".$row['rate']."</p>";
      $obj['8'] = "<p>".$row['amount']."</p>";
      $act_qty= $row['act_quantity'];
      $act_rate= $row['act_rate'];
      $act_amount= $row['act_amount'];
      $obj['9'] = '<input type="number" min="0" style="width:auto" id="act_quantity" value="'.$act_qty.'" oninput="show_amount()" />';
      $obj['10'] ='<input type="number" min="0" style="width:auto" id="act_rate" value="'.$act_rate.'" oninput="show_amount()"  />';
      $obj['11'] ='<input type="text" readonly style="width:auto" id="amt" value="'.$act_amount.'" />';

      array_push($data, $obj);
      $count++;
  }
  $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response); 
?>   
   
   



















