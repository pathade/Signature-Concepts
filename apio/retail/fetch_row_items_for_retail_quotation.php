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
            $ii = $i+1;
            $obj['0'] = '<p>'.$ii.'</p>';
            // $ds = $row['nks_code']."-".$row['design_code'];
            $ds = $row['nks_code'];
            // $obj['1'] = '<input type="checkbox" id="show_image-'.$i.'" onchange="showImage(this.id)" />';
            //product category
            $obj['1'] = '<div id="desc-'.$i.'"><input readonly="" type="text" id="category-'.$i.'" class="form-control" value="'.$ds.'" style="border: white;background-color: white;"></div>';
            //Size
            $obj['2'] = '<input readonly="" type="text" id="size-'.$i.'" class="form-control" value="'.$row['size'].'" style="border: white;background-color: white;">';
            // uom
            $obj['3'] = '<select id="uom-'.$i.'" class="form-control"><option>PCS</option><option>BOX</option><option>SQFT</option><option>BAGS</option></select>';
            //Qty
            $obj['4'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="0" onkeyup="get_quantity_value(this.id);">';
            //Sqft
            $obj['5'] = '<input type="text" id="sqft-'.$i.'" class="form-control" value="0"  style="border: white;background-color: white;">';
            //Rate
            $obj['6'] = '<input type="text" id="rate-'.$i.'"  class="form-control" value="'.$row['sale_rate'].'" onkeyup="rate_enter(this.id);" >';//$row['3'];//qty
            
            //Qty
            $obj['7'] = '<input type="text" id="box_quantity-'.$i.'" class="form-control" value="0" style="border: white;background-color: white;">';
            //Rate
            $obj['8'] = '<input type="text" id="box_rate-'.$i.'"  class="form-control" value="0" >';//$row['3'];//qty
            //Discount %
            $obj['9'] = '<input type="text" id="table_discount_per-'.$i.'" class="form-control" value="0" onkeyup="get_row_discount_value1(this.id);">';//$row['3'];//qty
            //Discount Rs.
            $obj['10'] = '<input type="text" id="table_discount_rs-'.$i.'" class="form-control" readonly value="0" style="border: white;background-color: white;" onkeyup="get_row_discount_value(this.id);">';//$row['4'];//length
            //Amount
            $obj['11'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="0" style="border: white;background-color: white;">';//$row['5'];//breadth
            //Remark
            $obj['12'] = '<input type="text" onkeyup="" id="remark-'.$i.'" class="form-control" value="">';//
            //hidden product id
            $obj['13'] = '<input type="text" id="product_id-'.$i.'" class="form-control" value="'.$row['item_id_pk'].'" style="display:none">';//
            $i++;
            array_push($data, $obj);
            
        }
    }
    $response['data'] = $data;
    echo json_encode($response);
?>