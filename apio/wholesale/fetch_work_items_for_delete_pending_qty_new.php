<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  include('../../database/dbconnection.php');
  extract($_POST);

 
  
    $sql = "SELECT * FROM wholesale_work_order_pending_qty as woi,mstr_item as i 
    WHERE woi.item_id_fk= i.item_id_pk AND work_order_id_fk='$work_no' 
    ";
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
  
    while ($row = mysqli_fetch_array($result))
    {
        $sname = "";
        $sup_sql ='SELECT * FROM `mstr_data_series`
        WHERE name="wholesale_pending_po"';
        $s_res = mysqli_query($db,$sup_sql); 
        while($srw = mysqli_fetch_array($s_res))
        {
          $sr_no = $srw['sr_no'];
        }
        $obj = array();
        //delete
        $obj['0'] = '<input type="checkbox" id="selected_row" name="selected_row" style="height: 17px;width: 17px;" value="'.$row['pending_id_fk'].'"/>';
        //work no
        $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['work_order_id_fk'].'" style="border: white;background-color: white;">';
        //pending po no
        $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['pending_id_fk'].'" style="border: white;background-color: white;">';
        //item name
        $obj['3'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['design_code'].'" style="border: white;background-color: white;">';
        //size
        $obj['4'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['size'].'" readonly="" style="border: white;background-color: white;">';//account
        //ordered qty qty
        $obj['5'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="'.$row['order_qty'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
        //pending qty
        $obj['6'] = '<input type="text" id="pending_qty-'.$i.'" class="form-control" value="'.$row['remain_qty'].'" style="border: white;background-color: white;">';//$row['4'];//length
        //delete qty
        $obj['7'] = '<input type="text" id="delte_qty-'.$i.'" class="form-control" value="'.$row['delete_qty'].'" style="border: white;background-color: white;" onkeyup="dwl(this.id);"> ';//$row['5'];//breadth
        //remain qty
        $obj['8'] = '<input type="text" id="remain_qty-'.$i.'" class="form-control" value="0" style="border: white;background-color: white;">';
        //work order item id 
        $obj['9'] = '<input type="text" style="display:none;" id="remain_qty-'.$i.'" class="form-control" value="'.$row['work_order_item_id_fk'].'" style="border: white;background-color: white;">';
        $i++;
        array_push($data, $obj);
    }
    $response['data'] = $data;
  
  
}
else
{
  $response['error'] = "Data Not Found...!!!";  
}
  echo json_encode($response);
?>