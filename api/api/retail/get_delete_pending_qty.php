<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{

  extract($_POST);
  include '../../database/dbconnection.php';
  $sql = "SELECT * FROM `retail_delete_pending_qty_items` as rp ,
  mstr_item as i where rp.item_id_fk = i.item_id_pk AND d_id_fk='$id'";
  $k = mysqli_query($db,$sql); 




  $data = array();
  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
   
  $i=1;
  while($row=mysqli_fetch_assoc($result))
  {
    //echo "1111111111111111".$item123 = $row['item_id_fk'];
     $get_product_design = "SELECT final_product_code FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
      $res = mysqli_fetch_array(mysqli_query($db, $get_product_design));

      /*$d = "SELECT * FROM retail_proforma WHERE id_pk='$po_no'";
      $kl = mysqli_query($db,$d);
      while($hjk = mysqli_fetch_array($kl))
      {
          $net_amt = $hjk['net_amt'];
          $order_no = $hjk['order_no'];
      }
      $rproforma_item_id_fk = $row['rproforma_item_id_fk'];
      $d = "SELECT * FROM retail_proforma_items WHERE  id_pk='$rproforma_item_id_fk'";
      $kl = mysqli_query($db,$d);
      while($hjk = mysqli_fetch_array($kl))
      {
          $rate = $hjk['rate'];
      }*/

      

   
      $obj = array();
     
      $obj['start'] = $row['po_no_id_fk'];
      $obj['pono_item_id_fk'] = $row['pono_item_id_fk'];
      $obj['item_name'] = $row['item_name'];
      $obj['size'] = $row['size'];
      $obj['oqty'] = $row['order_qty'];
      $obj['pqty'] = $row['pending_qty'];
      $obj['dqty'] = $row['delete_qty'];
      $obj['rate'] = $row['rate'];
      $obj['final_amt'] = $row['final_net_amt'];
      $obj['reduced_amt'] = $row['reduce_amt'];
      $obj['item_id_fk'] = $row['item_id_fk'];
     
      array_push($response, $obj);
  }

  }
  else
    $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response);
  
  
?>
  