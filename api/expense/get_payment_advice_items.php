<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

if ($flag == 0) {
    $sql = "SELECT * FROM  `exp_payadvice_bill_detail_table` where pay_advice_id_fk='$itemId' and flag='0' ";
}
else {
    $sql = "SELECT * FROM  `exp_payadvice_bill_detail_table` where pay_advice_id_fk='$itemId' and flag='1' ";
}

  /*$sql = "SELECT * FROM SELECT * FROM `exp_payadvice_bill_detail_table`
 as woi,mstr_item as i 
  WHERE woi.item_id_fk= i.item_id_pk AND work_order_no_id_fk='$edit_id'
  ";*/
  $data = array();
  $result = mysqli_query($db, $sql);
  $start = 1;
  $i = 1;

  while ($row = mysqli_fetch_array($result))
  {
    $sname = "";
    if ($flag == 0) {
      $sup_sql ="SELECT * FROM mstr_vendor WHERE vendor_id_pk='.$row['vendor_id_fk'].' and flag='0' ";
    }
    else {
      $sup_sql ="SELECT * FROM mstr_vendor WHERE vendor_id_pk='.$row['vendor_id_fk'].' and flag='1' ";
    }
      $s_res = mysqli_query($db,$sup_sql);
      while($srw = mysqli_fetch_array($s_res))
      {
        $sname = $srw['first_name']." ".$srw['last_name'];
      }
      $obj = array();
      //checkbox
      $obj['0'] = '<input type="checkbox" value="'.$start.'" class="form-control" checked>';
      //pay advice
      $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$start++.'" style="border: white;background-color: white;">';
      //vendor
      $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$sname.'" style="border: white;background-color: white;">';
      //bill no
      $obj['3'] = '<input type="text" id="size-'.$row[0].'" class="form-control" value="'.$row['bill_no'].'" readonly="" style="border: white;background-color: white;">';//account
      //bill date
      $obj['4'] = '<input type="text" id="quantity-'.$row[0].'" class="form-control" value="'.$row['bill_date'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
      //bill amt
      $obj['5'] = '<input type="text" id="sqrft-'.$row[0].'" class="form-control" value="'.$row['bill_amt'].'" style="border: white;background-color: white;">';//$row['4'];//length
      //addition
      $obj['6'] = '<input type="text" id="rate-'.$row[0].'" class="form-control" value="'.$row['addition'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
      //diduction
      $obj['7'] = '<input type="text" onkeyup="get_row_discount_value12(this.id)" id="table_discount_per-'.$row[0].'" class="form-control" value="'.$row['deduction'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
      //final payment
      $obj['8'] = '<input type="text" id="table_discount_rs-'.$row[0].'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['final_payment'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
      //pay amt
      $obj['9'] = '<input type="text" id="amount-'.$row[0].'" class="form-control" value="'.$row['pay_amount'].'" >';//$row['8'];//dis_per
      //vid
      $obj['10'] = '<input type="text" id="remark-'.$row[0].'" class="form-control" value="'.$row['vendor_id_fk'].'" >';//$row['9'];//dic_rs
      
      $i++;
      array_push($data, $obj);
  }
   $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);
?>