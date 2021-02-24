<?php 

header('Content-Type: application/json'); 

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';

    $sql = "SELECT rqi.*
    from retail_quotation_items rqi
    WHERE rqi.rq_id_fk='$itemId'";


    $data = array();
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $count=0;
    $start = 0;

    while ($row = mysqli_fetch_array($result))
    { 

        $obj = array();
        $obj['0'] = ++$start;          
        
        $obj['1'] = '<input type="text" class="form-control" value="'.$row['product_design'].'" style="border: white;background-color: white;" />';

        $obj['2'] = '<input type="text" class="form-control" value="'.$row['size'].'" style="border: white;background-color: white;" />';
        
        $obj['3'] = '<select class="form-control"><option>'.$row['uom'].'</option><option>PCS</option><option>BOX</option><option>SQFT</option><option>BAGS</option></select>';

        $obj['4'] = '<input type="text" class="form-control" id="quantity-'.$count.'" value="'.$row['qty'].'" style="border: white;background-color: white;" onkeyup="get_quantity_value(this.id);" />';
        
        $obj['5'] = '<input type="text" class="form-control" id="sqft-'.$count.'" value="'.$row['sqfit'].'" style="border: white;background-color: white;" />';

        $obj['6'] = '<input type="text" class="form-control" id="rate-'.$count.'" value="'.$row['rate'].'" style="border: white;background-color: white;" onkeyup="rate_enter(this.id)" />';

        $obj['7'] = '<input type="text" class="form-control" id="box_quantity-'.$count.'" value="'.$row['box_quantity'].'" style="border: white;background-color: white;" />';

        $obj['8'] = '<input type="text" class="form-control" id="box_rate-'.$count.'" value="'.$row['box_rate'].'" style="border: white;background-color: white;" />';

        $obj['9'] = '<input type="text" class="form-control" id="table_discount_per-'.$count.'" value="'.$row['disc_per'].'" style="border: white;background-color: white;" onkeyup="get_row_discount_value1(this.id);" />';

        $obj['10'] = '<input type="text" class="form-control" id="table_discount_rs-'.$count.'" value="'.$row['disc_rs'].'" style="border: white;background-color: white;" onkeyup="get_row_discount_value(this.id);" />';

        $obj['11'] = '<input type="text" class="form-control" id="amount-'.$count.'" value="'.$row['amount'].'" style="border: white;background-color: white;"/>';

        $obj['12'] = '<input type="text" class="form-control" id="reamrk-'.$count.'" value="'.$row['remark'].'" style="border: white;background-color: white;"/>';

        $obj['13'] = '<input type="text" class="form-control d-none" id="product_id-'.$count.'" value="'.$row['product_cat'].'" style="border: white;background-color: white;" />';
        
        array_push($data, $obj);
        $count++;
    }
    $response['data'] = $data;
}
else
    $response['error'] = "Data Not Found...!!!";  
echo json_encode($response); 




















    // header('Content-Type: application/json'); 

    // $response = array();

    // if($_SERVER['REQUEST_METHOD']=='POST')
    // {
    //     extract($_POST);
    //     include '../../database/dbconnection.php';

    //     $sql = "SELECT rqi.*
    //     from retail_quotation_items rqi
    //     WHERE rqi.rq_id_fk='$itemId'";


    //     $data = array();
    //     $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    //     $count=1;
    //     $start = 0;

    //     while ($row = mysqli_fetch_array($result))
    //     { 
    //         // select item category
    //         $select_cat = "SELECT item_type, final_product_code FROM mstr_item WHERE item_id_pk='".$row['product_design']."'";
    //         $result1 = mysqli_fetch_array(mysqli_query($db, $select_cat));

    //         $obj = array();
    //         // $obj['0'] = $start++;          
                    
            
    //         // $obj['1'] = "<p>".$row['id']."</p>";
    //         $obj['0'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['product_cat']."'>".$row['product_cat']."</option></select>";
    //         $obj['1'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['product_design']."'>".$result1['1']."</option></select>";
    //         $obj['2'] = "<input type='text' class='form-control' value=".$row['size']." readonly />";
    //         $obj['6'] = "<input type='number' class='form-control' id='table_discount_per-".$start."' value=".$row['disc_per']." onkeyup='get_row_discount_value1(this.id)' />";
    //         $obj['7'] = "<input type='number' class='form-control' id='table_discount_rs-".$start."' value=".$row['disc_rs']." onkeyup='get_row_discount_value(this.id)' />";
    //         $obj['4'] = "<input type='text' class='form-control' readonly value=".$row['sqfit']." />";
    //         $qty= $row['qty'];
    //         $rate= $row['rate'];
    //         $amount= $row['amount'];
    //         $obj['3'] = '<input type="number" class="form-control" min="0" style="width:auto" id="quantity-'.$start.'" value="'.$qty.'" oninput="get_quantity_value(this.id)"; />';
    //         $obj['5'] ='<input type="number" class="form-control" min="0" style="width:auto" id="rate-'.$start.'" value="'.$rate.'" oninput="get_quantity_value(this.id)" />';
    //         $obj['8'] ='<input type="text" class="form-control" readonly style="width:auto" id="amount-'.$start.'" value="'.$amount.'" />';
    //         $obj['9'] ='<input type="text" class="form-control" readonly style="width:auto" id="gst_per-'.$start.'" value="'.$row['gst_per'].'" />';
    //         $obj['10'] ='<input type="text" class="form-control" readonly style="width:auto" id="cgst-'.$start.'" value="'.$row['cgst'].'" />';
    //         $obj['11'] ='<input type="text" class="form-control" readonly style="width:auto" id="sgst-'.$start.'" value="'.$row['sgst'].'" />';
    //         $obj['12'] ='<input type="text" class="form-control" readonly style="width:auto" id="igst-'.$start.'" value="'.$row['igst'].'" />';
    //         $obj['13'] ='<input type="text" class="form-control" style="width:auto" id="remark'.$start.'" value="'.$row['remark'].'" />';
            
    //         array_push($data, $obj);
    //         $count++;
    //         $start++;
    //     }
    //     $response['data'] = $data;
    // }
    // else
    //     $response['error'] = "Data Not Found...!!!";  
    // echo json_encode($response); 


?>   


