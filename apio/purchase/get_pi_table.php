<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  
 $sql = "SELECT fpi.* 
        from fin_purchase_invoice fp, fin_purchase_invoice_items fpi
        WHERE fp.id_pk='$itemId' and fp.id_pk=fpi.fpi_id_fk";


  $data = array();
  $result = mysqli_query($db, $sql);
  $count=1;
  $start = 1;
  

  while ($row = mysqli_fetch_array($result))
  { 
      $obj = array();
      $obj['0'] = $start++;

      $item="SELECT nks_code, design_code, uom FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
      $res_item = mysqli_fetch_row(mysqli_query($db, $item));

      $design_code = $res_item[0].'-'.$res_item[1];
     
      $obj['1'] = "<p class='d-none>".$row['id_pk']."</p>";
      $obj['2'] = '<select><option value="'.$row['item_id_fk'].'">'.$design_code.'</option></select>';
      $obj['3'] = '<input type="text" style="width:auto" id="" value="'.$row['item_type'].'" />';
      $obj['4'] = '<input type="text" style="width:auto" id="" value="'.$row['size'].'" />';
      $obj['5'] = '<input type="text" style="width:auto" id="" value="'.$row['qty'].'" />';
      $obj['6'] = '<input type="text" style="width:auto" id="" value="'.$row['sqfit'].'" />';
      $obj['7'] = '<input type="text" style="width:auto" id="" value="'.$row['rate'].'" />';
      $obj['8'] = '<input type="text" style="width:auto" id="" value="'.$row['amount'].'" />';
      $obj['9'] = '';
      $obj['10'] = '<input type="text" style="width:auto" id="" value="'.$row['bill_disc'].'" />';
      $obj['11'] = '<input type="text" style="width:auto" id="" value="'.$row['bill_amt'].'" />';
      $obj['12'] = '';
      $obj['13'] = '';
      $obj['14'] = '<input type="text" style="width:auto" id="" value="'.$row['net_amt'].'" />';
      $obj['15'] = '';
      $obj['16'] = '';
      $obj['17'] = '';
      $obj['18'] = '<input type="text" style="width:auto" id="" value="'.$row['gst_per'].'" />';
      $obj['19'] = '<input type="text" style="width:auto" id="" value="'.$row['cgst'].'" />';
      $obj['20'] = '<input type="text" style="width:auto" id="" value="'.$row['sgst'].'" />';
      $obj['21'] = '<input type="text" style="width:auto" id="" value="'.$row['igst'].'" />';
      $obj['22'] = '';

      array_push($data, $obj);
      $count++;
  }
  $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response); 
?>   
   
   



















