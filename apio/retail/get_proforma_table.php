<?php 
session_start();
$flag=$_SESSION['flag'];
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST') 
{

  extract($_POST);
  include '../../database/dbconnection.php';

  $s = "SELECT * FROM `retail_proforma` WHERE id_pk='".$_POST['pur_order_no']."'";
  $h = mysqli_query($db,$s);
  while($srw = mysqli_fetch_array($h))
  {
    $tax_invoice_added = $srw['tax_invoice_added'];
  }
  

  if($tax_invoice_added != 1)
  {
    $sql = "SELECT * FROM retail_proforma_items WHERE rpi_id_fk='".$_POST['pur_order_no']."'";
    $get_igst = "SELECT igst_app FROM mstr_retail_customer WHERE retail_cust_idpk='$customer_id'";
    $res_igst = mysqli_fetch_row(mysqli_query($db, $get_igst));
    $data = array();
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $get_product_design = "SELECT final_product_code FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
        $res = mysqli_fetch_array(mysqli_query($db, $get_product_design));
        
        if($flag==1)
        {
            $gst_per = 0;
            $cgst = 0;
            $sgst = 0;
            $igst = 0;
        }
        else if($flag==0)
        {
            if($res_igst[0] == 1)
            {
              $gst_per = 18;
              $cgst = ($row['amount'] * 18 / 100)/2;
              $sgst = ($row['amount'] * 18 / 100)/2;
              $igst = $cgst + $sgst;
            }
            else 
            {
              $gst_per = 18;
              $cgst = 0.00;
              $sgst = 0.00;
              $igst = $row['amount'] * 18 / 100;
            }
        }
     
        $obj = array();
       
        $obj['start'] = $i++;
        $obj['id'] = $row['id_pk'];
        $obj['product_category'] = $row['product_category'];
        $obj['item_id_fk'] = $row['item_id_fk'];
        $obj['product_design'] = $res['0'];
        $obj['size'] = $row['size'];
        $obj['qty'] = $row['qty'];
        $obj['rate'] = $row['rate'];
        $obj['amount'] = $row['amount'];
        $obj['gst_per'] = $gst_per;
        $obj['cgst'] = $cgst;
        $obj['sgst'] = $sgst;
        $obj['igst'] = $igst;
        $obj['remark'] = $row['remark'];
        $obj['disc_per'] = $row['disc_per'];
        $obj['disc_rs'] = $row['disc_rs'];
        $obj['sqfit'] = $row['sqfit'];
        $obj['orderqty'] = $row['qty'];
        $obj['rpid'] = $row['id_pk'];
       
        array_push($response, $obj);
    }
  }
  else
  {

  }
  
    
  

  }
  else
    $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response);
  
  
?>
  