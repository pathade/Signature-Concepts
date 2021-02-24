<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  include('../../database/dbconnection.php');
  extract($_POST);

  
    $sql = "SELECT * FROM `wholesale_tax_invoice_items` 
    where tax_id_fk = '$tax_id'";
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
  
    while ($row = mysqli_fetch_array($result))
    {
        $sname = "";
        //$tax_id_pk = $row['tax_id_pk'];

          $obj = array();
          //delete
          //$obj['0'] = $row['tax_id_pk'];////$row['tax_id_pk']
          $obj['0'] = '<input type="checkbox" value="'.$row['tax_id_fk'].'" class="form-control invoice_checkbox" id="invoice-'.$i.'" name="advance_no" onchange="tax_invoice_click(this.id)" style="height: 20px;width: 20px;" />';
          //category
          $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['category'].'" style="border: white;background-color: white;">';
          //Design
          $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['item_id_fk'].'" style="border: white;background-color: white;">';
          //size
          $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['size'].'" readonly="" style="border: white;background-color: white;width:auto;">';
          //qty
          $obj['4'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="'.$row['qty'].'" onkeyup="get_quantity_value(this.id);" >';
          //Sq ft
          $obj['5'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['sqrfit'].' " style="border: white;background-color: white;">';
          //rate
          $obj['6'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['rate'].'" style="border: white;background-color: white;">';
          //disc per
          $obj['7'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['disc_per'].'" style="border: white;background-color: white;">';
          //disc rs
          $obj['8'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['disc_rs'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
          //Amount
          $obj['9'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="'.$row['amount'].'" >';
          //remark
          $obj['10'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['remark'].'" >';
          //hidden item
          $obj['11'] = '<input type="text" id="hidden_id-'.$i.'" class="form-control" value="'.$row['item_id_fk'].'" >';
          //GST %
          $obj['12'] = '<input type="text" id="gst_per-'.$i.'" class="form-control" value="'.$row['gst_per'].'" >';
          //cgst Amount
          $obj['13'] = '<input type="text" id="cgst_amt-'.$i.'" class="form-control" value="'.$row['cgst_amt'].'" onkeyup="paid_amt(this.id);">';
          //sgst amt
          $obj['14'] = '<input type="text" id="agst_amt-'.$i.'" class="form-control" value="'.$row['sgst_amt'].'" >';
          //igst amt 
          $obj['15'] = '<input type="text" id="igst_amt-'.$i.'" class="form-control" value="'.$row['igst_amt'].'" >';
          //dc id hidden
          $obj['16'] = '<input type="text" id="dc_id_hidden-'.$i.'" class="form-control" value="'.$row['dc_id_fk'].'" >';
         
          $i++;
          array_push($data, $obj);
        
    }
    $response['data'] = $data;
}
  


  echo json_encode($response);
?>