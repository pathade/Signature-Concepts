<?php 
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
        include '../../database/dbconnection.php';

        $sql = "SELECT rpi.*
        from retail_proforma_items rpi
        WHERE rpi.rpi_id_fk='$itemId' AND po_notbl='$po_notbl'";


        $data = array();
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        $count=1;
        $start = 0;

        while ($row = mysqli_fetch_array($result))
        { 
            // select item category
            $select_cat = "SELECT nks_code,design_code,item_type FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
            $result1 = mysqli_fetch_array(mysqli_query($db, $select_cat));

            $final_design_code = $result1['0'].'-'.$result1['1'];

            $obj = array();
            // $obj['0'] = $start++;          
                    
            
            // $obj['1'] = "<p>".$row['id']."</p>";
            $obj['0'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['item_id_fk']."'>".$result1['2']."</option></select>";
            $obj['1'] = "<select class='form-control select2' data-toggle='select2'><option value='".$final_design_code."'>".$final_design_code."</option></select>";
            $obj['2'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['size']."'>".$row['size']."</option></select>";
            $obj['6'] = "<input type='number' class='form-control' id='table_discount_per".$start."' value=".$row['disc_per']." onkeyup='get_row_discount_value1(this.id)' />";
            $obj['7'] = "<input type='number' class='form-control' id='table_discount_rs".$start."' value=".$row['disc_rs']." onkeyup='get_row_discount_value(this.id)' />";
            $obj['4'] = "<input type='text' class='form-control' readonly value=".$row['sqfit']." />";
            $qty= $row['qty'];
            $rate= $row['rate'];
            $amount= $row['amount'];
            $obj['3'] = '<input type="number" class="form-control" min="0" style="width:auto" id="quantity'.$start.'" value="'.$qty.'" oninput="get_quantity_value(this.id)"; />';
            $obj['5'] ='<input type="number" class="form-control" min="0" style="width:auto" id="rate'.$start.'" value="'.$rate.'" oninput="get_quantity_value(this.id)" />';
            $obj['8'] ='<input type="text" class="form-control" readonly style="width:auto" id="amount'.$start.'" value="'.$amount.'" />';
            $obj['9'] ='<input type="text" class="form-control" style="width:auto" id="remark'.$start.'" value="'.$row['remark'].'" />';
            if($row['checkbo_valtbl'] == 'po_yes')
            {
                $checkbox = '<input type="checkbox" class="d-none" onclick="return false" checked id="myCheck-'.$start.'" value="'.$row['checkbo_valtbl'].'" />';
            }
            else
            {
                $checkbox = '<input type="checkbox" class="d-none" onclick="return false" id="myCheck-'.$start.'" value="'.$row['checkbo_valtbl'].'" />';
            }
            $obj['10'] = $checkbox;
            $obj['11'] ='<input type="text" readonly class="form-control d-none" id="posupplier-'.$start.'" value="'.$row['po_suppliertbl'].'" />';
            $obj['12'] ='<input type="text" readonly class="form-control d-none" id="pono-'.$start.'" value="'.$row['po_notbl'].'" />';
            
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





















