<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $selected_id = $edit_id;
    //print_r($selected_id);
    //$id = explode(",",$selected_id);
    $count = sizeof($selected_id);echo "\n";
    $data = array();
    $i = 0;
    $l = $count - 1;
    for($if=0;$if<$count;$if++)
    {
        //echo "if is:".$if;echo "\n";
        $selected_id = $edit_id;
        $ids = $selected_id[$if];
        $sql = "SELECT * FROM mstr_item WHERE item_id_pk='$ids'";
        $g = mysqli_query($db,$sql);
        while($row = mysqli_fetch_array($g))
        {
            
            $ds = $row['nks_code']."-".$row['design_code'];
            //product category
            $obj['0'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['item_type'].'" style="border: white;background-color: white;">';
            //product Design
            $obj['1'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$ds.'" style="border: white;background-color: white;">';
            //Size
            $obj['2'] = '<input readonly="" type="text" id="size"'.$i.'" class="form-control" value="'.$row['size'].'" style="border: white;background-color: white;">';
            //Qty
            $obj['3'] = '<input type="text" id="quantity'.$i.'" class="form-control" value="0" onkeyup="get_quantity_value(this.id);"  style="border: white;background-color: white;">';//account
            //Sqft
            $obj['4'] = '<input type="text"  id="sqrft'.$i.'" class="form-control" value="0" onkeyup="" >';//$row['3'];//qty
            //Rate
            $obj['5'] = '<input type="text" id="rate'.$i.'"  class="form-control" value="'.$row['sale_rate'].'" onkeyup="rate_enter(this.id);" >';//$row['3'];//qty
            //Discount %
            $obj['6'] = '<input type="text" id="table_discount_per'.$i.'" class="form-control" value="0" onkeyup="get_row_discount_value1(this.id);">';//$row['3'];//qty
            //Discount Rs.
            $obj['7'] = '<input type="text" id="table_discount_rs'.$i.'" class="form-control" value="0" style="border: white;background-color: white;" onkeyup="get_row_discount_value(this.id);">';//$row['4'];//length
            //Amount
            $obj['8'] = '<input type="text" id="amount'.$i.'" class="form-control" value="0" style="border: white;background-color: white;">';//$row['5'];//breadth
            //Remark
            $obj['9'] = '<input type="text" onkeyup="" id="remark'.$i.'" class="form-control" value="" style="border: white;background-color: white;">';//$row['6'];//sqft
            //Product Id
            $obj['10'] = '<input type="text" id="product_id-'.$i.'" class="form-control" value="'.$row['item_id_pk'].'"/>';//$row['3'];//qty
            //PO checkbox
            // $obj['10'] = '<input type="checkbox" name="po_yes" value="po_yes" id="myCheck-'.$i.'" onclick="myFunction(this.id)">';//$row['7'];//rate
            // //Supplier Dropdown
            // $obj['11'] = '<select class="form-control" id="posupplier-'.$i.'" onchange="Supplier_select_po_generation(this.id)">
            // </select>';//$row['8'];//dis_per
            // //PO No
            // $obj['12'] = '<input type="text" id="pono-'.$i.'" class="form-control" value=""/>';//$row['3'];//qty
            // //Product Locks
            // $obj['13'] = '<input type="text" id="discount_lock-'.$i.'" class="form-control" value="'.$row['discount_lock'].'"/>';//$row['3'];//qty
            $i++;
            array_push($data, $obj);
            
        }
    }
    $response['data'] = $data;
    echo json_encode($response);
?>