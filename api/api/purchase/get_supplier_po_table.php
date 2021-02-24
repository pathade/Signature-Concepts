<?php 
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
        include '../../database/dbconnection.php';

        $sql = "SELECT poi.*
        from purchase_order po,  purchase_order_items poi
        WHERE po.id='$itemId' and po.id=poi.purchase_order_id_fk";


        $data = array();
        $result = mysqli_query($db, $sql);
        $count=1;
        $start = 0;

        while ($row = mysqli_fetch_array($result))
        { 
            // select item category
            $select_cat = "SELECT item_type FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
            $result1 = mysqli_fetch_array(mysqli_query($db, $select_cat));

            $obj = array();
            // $obj['0'] = $start++;          
                    
            
            // $obj['1'] = "<p>".$row['id']."</p>";
            $obj['0'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['item_id_fk']."'>".$result1['0']."</option></select>";
            $obj['1'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['design_code']."'>".$row['design_code']."</option></select>";
            $obj['2'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['size']."'>".$row['size']."</option></select>";
            $obj['6'] = "<input type='number' class='form-control' id='table_discount_per".$start."' value=".$row['discount_per']." onkeyup='get_row_discount_value1(this.id);' />";
            $obj['7'] = "<input type='number' class='form-control' id='table_discount_rs".$start."' value=".$row['discount_rs']." onkeyup='get_row_discount_value(this.id);' />";
            $obj['4'] = "<input type='text' class='form-control' readonly value=".$row['sqrft']." />";
            $qty= $row['quantity'];
            $rate= $row['rate'];
            $amount= $row['amount'];
            $obj['3'] = '<input type="number" class="form-control" min="0" style="width:auto" id="quantity'.$start.'" value="'.$qty.'" oninput="get_quantity_value(this.id)"; />';
            $obj['5'] ='<input type="number" class="form-control" min="0" style="width:auto" id="rate'.$start.'" value="'.$rate.'" oninput="rate_enter(this.id)" />';
            $obj['8'] ='<input type="text" class="form-control" readonly style="width:auto" id="amount'.$start.'" value="'.$amount.'" />';
            $obj['9'] ='<input type="text" class="form-control" style="width:auto" id="remark'.$start.'" value="'.$row['remark'].'" />';
            
            array_push($data, $obj);
            $count++;
            $start++;
        }
        $response['data'] = $data;
    }
    else
        $response['error'] = "Data Not Found...!!!";  
    echo json_encode($response); 
?>   





















