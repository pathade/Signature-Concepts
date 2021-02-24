<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{

  extract($_POST);
  include '../../database/dbconnection.php';
  
  $sql = "SELECT grni.*, mi.final_product_code,mi.item_id_pk,mi.uom
        FROM  grn g, grn_items grni,mstr_item mi
        WHERE grni.grn_id_fk='$grn_id' AND g.grn_id_pk=grni.grn_id_fk AND g.supplier='$supplier' AND grni.item_detail=mi.item_id_pk";
    
  // $sql = "SELECT grni.*, mi.final_product_code,mi.item_id_pk,mi.item_type
  //       FROM  grn g, grn_items grni,mstr_item mi
  //       WHERE grni.grn_id_fk='$grn_id' AND g.grn_id_pk=grni.grn_id_fk AND g.supplier='$supplier'";
  $data = array();
  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
   
  $i=1;
  while($row=mysqli_fetch_assoc($result))
  {

      $check_supp_igst = "SELECT igst_app FROM mstr_supplier WHERE supplier_id_fk='$supplier'";
      $res_igst = mysqli_fetch_row(mysqli_query($db, $check_supp_igst));

      $gst = $row['act_amount']*18/100;
      $cgst = 0;
      $sgst = 0;
      $igst = 0;
      if($res_igst[0] == 0)
      {
        $igst = $gst;
      }
      else
      {
        $cgst = $gst/2;
        $sgst = $gst/2;
        $igst = $cgst+$sgst;
      }
   
      $obj = array();
     
      $obj['start'] = $i;
      $obj['id'] = $row['id_pk'];
      $obj['grn_id'] = $row['grn_id_fk'];
      $obj['item_id_pk'] = $row['item_id_pk'];
      $obj['final_product_code'] = $row['design_code'];
      // $obj['item_id'] = $row['item_detail'];
      $obj['item_type'] = $row['uom'];
      $obj['length'] = 0;
      $obj['breadth'] = 0;
      $obj['size'] = $row['size'];
      $obj['act_quantity'] = $row['act_quantity'];
      $obj['sqfit'] = 0;
      $obj['act_rate'] = $row['act_rate'];
      $obj['act_amount'] = $row['act_amount'];
      $obj['process_amount'] = 0;
      $obj['bill_disc'] = 0;
      $obj['bill_amt'] = 0;
      $obj['tax'] = 0;
      $obj['tax_amt'] = 0;
      $obj['net_amt'] = $row['act_amount'];
      $obj['trans_oct'] = 0;
      $obj['italian_sqfit'] = 0;
      $obj['italian_slides'] = '';
      $obj['gst_per'] = 18;
      $gst = $gst;    
      $obj['cgst'] = $cgst;
      $obj['sgst'] = $sgst;
      $obj['igst'] = $igst;
      $obj['cess_per'] = 0;
      $obj['cess_amt'] = 0;
      
      $i++;
      array_push($response, $obj);
  }

  }
  else
    $response['error'] = "Data Not Found...!!!";  
    echo json_encode($response);
  ?>
  