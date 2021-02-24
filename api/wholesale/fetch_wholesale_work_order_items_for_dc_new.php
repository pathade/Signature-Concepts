<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);

    //$check_status_sql = "SELECT * FROM `wholesale_work_order_pending_qty`
    //WHERE work_order_id_fk='$edit_id'";
    $check_status_sql = "SELECT * FROM `wholesale_work_order_pending_qty` as p,mstr_item as i
    WHERE work_order_id_fk='$edit_id' AND p.item_id_fk = i.item_id_pk";
    $check_status_res = mysqli_query($db,$check_status_sql);
    $count1 = mysqli_num_rows($check_status_res);

    $data = array();
    $start = 1;
    $i = 1;

    if($count1>0)
    {
        //display records from wholesale_work_order_pending_qty table
        while($row = mysqli_fetch_array($check_status_res))
        {
            $design_code = $row['nks_code']."-". $row['design_code'];
            //$delivery_challan_status = $chck_rw['delivery_challan_status'];
            $obj = array();
            //delete
            //'<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['work_order_item_id_fk'].'" style="border: white;background-color: white;">'
            $obj['0'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['work_order_item_id_fk'].'" style="border: white;background-color: white;">';
            //product category
            $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['product_category'].'" style="border: white;background-color: white;">';
            //selected item
            $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$design_code.'" style="border: white;background-color: white;">';
            //size
            $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['size'].'" readonly="" style="border: white;background-color: white;">';//account
            //actual qty
            $obj['4'] = '<input type="text" id="actual_qty-'.$i.'" class="form-control" value="'.$row['remain_qty'].'" readonly="" style="border: white;background-color: white;">';//account
            //qty
            $obj['5'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="0" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
            //sqft
            $obj['6'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['sqrfit'].'" style="border: white;background-color: white;">';//$row['4'];//length
            //rate
            $obj['7'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['rate'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
            //discount
            $obj['8'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['disc_per'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
            //disc rs
            $obj['9'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['disc_rs'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
            //amt
            $obj['10'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="0" >';//$row['8'];//dis_per
            //remark
            $obj['11'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['remark'].'" >';//$row['9'];//dic_rs
            //hidden item id
            $obj['12'] = '<input type="text" style="display:none;" id="hidden_id-'.$i.'" class="form-control" value="'.$row['item_id_fk'].'" >';//$row['9'];//dic_rs
            //hidden work order item id
            $obj['13'] = '<input type="text" style="display:none;" id="hidden_remain_qty-'.$i.'" class="form-control" value="'.$row['order_qty'].'" >';//$row['9'];//dic_rs
            $i++;
            array_push($data, $obj);
        }
        $response['data'] = $data;
    }
    else
    {
        //display records from work order table table
        $sql = "SELECT * FROM wholesale_work_order_items as woi,mstr_item as i 
        WHERE woi.item_id_fk= i.item_id_pk AND work_order_no_id_fk='$edit_id' 
        ";
        $data = array();
        $result = mysqli_query($db, $sql);
        $start = 1;
        $i = 1;
    
        while ($row = mysqli_fetch_array($result))
        {
            $des_code = $row['nks_code']."-".$row['design_code'];
            $sname = "";
            $sup_sql ='SELECT * FROM mstr_supplier WHERE supplier_id_fk="'.$row['14'].'"';
            $s_res = mysqli_query($db,$sup_sql);
            while($srw = mysqli_fetch_array($s_res))
            {
                $sname = $srw['name'];
            }
            $obj = array();
            //delete
            //<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['0'].'" >
            $obj['0'] = '<input style="display:none;" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['0'].'" >';
            //product category
            $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['11'].'" style="border: white;background-color: white;">';
            //selected item
            $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$des_code.'" style="border: white;background-color: white;">';
            //size
            $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['4'].'" readonly="" style="border: white;background-color: white;">';//account
            //actual qty
            $obj['4'] = '<input type="text" id="actual_qty-'.$i.'" class="form-control" value="'.$row['qty'].'" readonly="" style="border: white;background-color: white;">';//account
            //qty
            $obj['5'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="0" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
            //sqft
            $obj['6'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['5'].'" style="border: white;background-color: white;">';//$row['4'];//length
            //rate
            $obj['7'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['6'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
            //discount
            $obj['8'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['7'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
            //disc rs
            $obj['9'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['8'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
            //amt
            $obj['10'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="'.$row['9'].'" >';//$row['8'];//dis_per
            //remark
            $obj['11'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['12'].'" >';//$row['9'];//dic_rs
            //hidden item id
            $obj['12'] = '<input type="text" style="display:none;" id="hidden_id-'.$i.'" class="form-control" value="'.$row['1'].'" >';//$row['9'];//dic_rs
            //hidden hidden_remain_qty
            $obj['13'] = '<input type="text" style="display:none;" id="hidden_remain_qty-'.$i.'" class="form-control" value="'.$row['3'].'" >';//$row['9'];//dic_rs
            //hidden work order item id
            //$obj['13'] = '<input type="text" id="hidden_remain_qty-'.$i.'" class="form-control" value="'.$row['0'].'" >';//$row['9'];//dic_rs
            $i++;
            array_push($data, $obj);
        }
        $response['data'] = $data;
    }


  /*if($delivery_challan_status == 1)
  {
    $wsql = "SELECT  max(wd_ch_id_pk) FROM wholesale_delivery_challan WHERE wh_wo_id_fk='$edit_id'";
    $wrsql = mysqli_query($db,$wsql);
    while($tre = mysqli_fetch_array($wrsql))
    {
      $max_dc = $tre['max(wd_ch_id_pk)'];
    }
    $sql = "SELECT * FROM wholsale_delivery_challan_items as woi,mstr_item as i 
    WHERE woi.item_id_fk= i.item_id_pk AND woi.work_order_id_fk='$edit_id'  AND woi.dc_id_fk='$max_dc'
    ";
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
    while ($row = mysqli_fetch_array($result))
    {
      $sname = "";
      $amt_custom = $row['remaining_qty'] * $row['rate'];
        $sup_sql ='SELECT * FROM mstr_supplier WHERE supplier_id_fk="'.$row['supplier_id_fk'].'"';
        $s_res = mysqli_query($db,$sup_sql);
        while($srw = mysqli_fetch_array($s_res))
        {
          $sname = $srw['name'];
        }
        $obj = array();
        //delete
        $obj['0'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['work_order_item_id_fk'].'" style="border: white;background-color: white;">';
        //product category
        $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['1'].'" style="border: white;background-color: white;">';
        //selected item
        $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['design_code'].'" style="border: white;background-color: white;">';
        //size
        $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['size'].'" readonly="" style="border: white;background-color: white;">';//account
        //qty
        $obj['4'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="'.$row['remaining_qty'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
        //sqft
        $obj['5'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['sqrfit'].'" style="border: white;background-color: white;">';//$row['4'];//length
        //rate
        $obj['6'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['rate'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
        //discount
        $obj['7'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['disc_per'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
        //disc rs
        $obj['8'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['disc_rs'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
        //amt
        $obj['9'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="'.$amt_custom.'" >';//$row['8'];//dis_per
        //remark
        $obj['10'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['remark'].'" >';//$row['9'];//dic_rs
        //hidden item id
        $obj['11'] = '<input type="text" id="hidden_id-'.$i.'" class="form-control" value="'.$row['item_id_fk'].'" >';//$row['9'];//dic_rs
        //hidden work order item id
        $obj['12'] = '<input type="text" id="hidden_remain_qty-'.$i.'" class="form-control" value="'.$row['remaining_qty'].'" >';//$row['9'];//dic_rs
        $i++;
        array_push($data, $obj);
    }
    $response['data'] = $data;
  }
  else
  {
    $sql = "SELECT * FROM wholesale_work_order_items as woi,mstr_item as i 
    WHERE woi.item_id_fk= i.item_id_pk AND work_order_no_id_fk='$edit_id' 
    ";
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
  
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
        //delete
        $obj['0'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['0'].'" >';
        //product category
        $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['11'].'" style="border: white;background-color: white;">';
        //selected item
        $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['20'].'" style="border: white;background-color: white;">';
        //size
        $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['22'].'" readonly="" style="border: white;background-color: white;">';//account
        //qty
        $obj['4'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="'.$row['3'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
        //sqft
        $obj['5'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['5'].'" style="border: white;background-color: white;">';//$row['4'];//length
        //rate
        $obj['6'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['6'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
        //discount
        $obj['7'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['7'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
        //disc rs
        $obj['8'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['8'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
        //amt
        $obj['9'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="'.$row['9'].'" >';//$row['8'];//dis_per
        //remark
        $obj['10'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['12'].'" >';//$row['9'];//dic_rs
        //hidden item id
        $obj['11'] = '<input type="text" id="hidden_id-'.$i.'" class="form-control" value="'.$row['1'].'" >';//$row['9'];//dic_rs
        //hidden hidden_remain_qty
        $obj['12'] = '<input type="text" id="hidden_remain_qty-'.$i.'" class="form-control" value="'.$row['3'].'" >';//$row['9'];//dic_rs
        //hidden work order item id
        //$obj['13'] = '<input type="text" id="hidden_remain_qty-'.$i.'" class="form-control" value="'.$row['0'].'" >';//$row['9'];//dic_rs
        $i++;
        array_push($data, $obj);
    }
    $response['data'] = $data;
  }*/
  
}
else
{
  $response['error'] = "Data Not Found...!!!";  
}
  


  echo json_encode($response);
?>