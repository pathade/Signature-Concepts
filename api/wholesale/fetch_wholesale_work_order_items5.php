<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);

  $sql = "SELECT * FROM wholesale_work_order_items as woi,mstr_item as i 
  WHERE woi.item_id_fk= i.item_id_pk AND work_order_no_id_fk='$edit_id'
  ";
  $data = array();
  $result = mysqli_query($db, $sql);
  $start = 1;
  $i = 0;

  while ($row = mysqli_fetch_array($result))
  {
    $sname = "";
      $sup_sql ='SELECT * FROM mstr_supplier WHERE supplier_id_fk="'.$row['14'].'"';
      $s_res = mysqli_query($db,$sup_sql);
      while($srw = mysqli_fetch_array($s_res))
      {
        $sname = $srw['name'];
      }
      $obj = array();
      //$obj['0'] = $row['0'];
      // $obj['0'] = $row['0'];
      // $obj['1'] = $row['0'];
      //delete
      $product_design = $row['22']."-".$row['23'];
      $obj['0'] = $row['0'];
      //product category
      $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['11'].'" style="border: white;background-color: white;">';
      //selected item
      $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$product_design.'" style="border: white;background-color: white;">';
      /*<select class='form-control block'  id='item_id".$row['12']."' onchange='get_item(this.id)'>
                    <option value=''>".$row['17']." </option>
                    </select>*/
      //$obj['3'] = $row['17']; //item name
      //size
      $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['5'].'" readonly="" style="border: white;background-color: white;">';//account
      //qty
      $obj['4'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="'.$row['3'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
      //sqft
      $obj['5'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['5'].'" style="border: white;background-color: white;">';//$row['4'];//length
      //rate
      $obj['6'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['6'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
      //discount
      $obj['7'] = '<input type="text" onkeyup="get_row_discount_value12(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['7'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
      //disc rs
      $obj['8'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['8'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
      //amt
      $obj['9'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="'.$row['9'].'" >';//$row['8'];//dis_per
      //remark
      $obj['10'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['12'].'" >';//$row['9'];//dic_rs
      
      //po
      //$obj['11'] = '<input  type="text" id="amount-'.$i.'" class="form-control" value="'.$row['13'].'" style="border: white;background-color: white;" readonly="">';//$row['10'];//amount
      
        if($row['13']==='po_yes')
        {
          $obj['11'] ='<input type="checkbox" id="myCheck-'.$i.'" name="po_yes" value="po_yes"  onclick="myFunction(this.id)" checked>';
        }
        else
        {
            
          $obj['11'] ='<input type="checkbox" name="po_yes" value="po_no" id="myCheck-'.$i.'" onclick="myFunction(this.id)">';
            
        }
      
      
      //supplier
      //$obj['12'] = '<input  type="text" id="posupplier-'.$i.'" class="form-control" value="'.$row['14'].'" style="border: white;background-color: white;" readonly="">';//$row['10'];//amount
      // $d = "SELECT * FROM mstr_supplier order by supplier_id_fk DESC";
      // $dres = mysqli_query($db,$d);
      // while($drw = mysqli_fetch_array($dres))
      // {
      //   $obj['12'] = '<select class="form-control" id="posupplier-'.$i.'" onchange="Supplier_select_po_generation(this.id)"><option value="'.$drw['0'].'">'.$drw['1'].'</option></select>';
      // }
      $obj['12'] = '<select class="form-control" id="posupplier-'.$i.'" onchange="Supplier_select_po_generation(this.id)"><option value="'.$row['14'].'">'.$sname.'</option></select>';
      //$obj['12'] = '<select><option></option></select>';
      //po no
      $obj['13'] = '<input  type="text" id="pono-'.$i.'" class="form-control" value="'.$row['15'].'" style="border: white;background-color: white;" readonly="">';//$row['10'];//amount
      $obj['14'] = '<input  type="text" id="pono-'.$i.'" class="form-control" value="'.$row['1'].'" style="border: white;background-color: white;display:none;" readonly="">';//$row['10'];//amount
      $i++;
      array_push($data, $obj);
  }
   $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);
?>