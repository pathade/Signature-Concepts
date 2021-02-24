<?php 
session_start();
$flag=$_SESSION['flag'];
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
        include '../../database/dbconnection.php';

        $sql = "SELECT rti.*
        from retail_tax_invoice_items rti
        WHERE rti.rti_id_fk='$itemId'";


        $data = array();
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        $count=1;
        $start = 0;

        while ($row = mysqli_fetch_array($result))
        { 
            // select item category
            $select_cat = "SELECT item_type, final_product_code FROM mstr_item WHERE item_id_pk='".$row['product_design']."'";
            $result1 = mysqli_fetch_array(mysqli_query($db, $select_cat));

            $obj = array();
            // $obj['0'] = $start++;          
                    
            
            // $obj['1'] = "<p>".$row['id']."</p>";
            $obj['0'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['product_cat']."'>".$row['product_cat']."</option></select>";
            $obj['1'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['product_design']."'>".$result1['1']."</option></select>";
            $obj['2'] = "<input type='text' class='form-control' value=".$row['size']." readonly />";
            $obj['3'] = "<select class='form-control'><option>".$row['uom']."</option><option>PCS</option><option>BOX</option><option>SQFT</option><option>BAGS</option></select>";
            $obj['7'] = "<input type='number' class='form-control' id='table_discount_per-".$start."' value=".$row['disc_per']." onkeyup='get_row_discount_value1(this.id)' />";
            $obj['8'] = "<input type='number' class='form-control' id='table_discount_rs-".$start."' value=".$row['disc_rs']." onkeyup='get_row_discount_value(this.id)' />";
            $obj['5'] = "<input type='text' class='form-control' readonly value=".$row['sqfit']." />";
            $qty= $row['qty'];
            $rate= $row['rate'];
            $amount= $row['amount'];
            $obj['4'] = '<input type="number" class="form-control" min="0" style="width:auto" id="quantity-'.$start.'" value="'.$qty.'" oninput="get_quantity_value(this.id)"; />';
            $obj['6'] ='<input type="number" class="form-control" min="0" style="width:auto" id="rate-'.$start.'" value="'.$rate.'" oninput="get_quantity_value(this.id)" />';
            $obj['9'] ='<input type="text" class="form-control" readonly style="width:auto" id="amount-'.$start.'" value="'.$amount.'" />';
            if($flag==0)
            {
            $obj['10'] ='<input type="text" class="form-control" readonly style="width:auto" id="gst_per-'.$start.'" value="'.$row['gst_per'].'" />';
            $obj['11'] ='<input type="text" class="form-control" readonly style="width:auto" id="cgst-'.$start.'" value="'.$row['cgst'].'" />';
            $obj['12'] ='<input type="text" class="form-control" readonly style="width:auto" id="sgst-'.$start.'" value="'.$row['sgst'].'" />';
            $obj['13'] ='<input type="text" class="form-control" readonly style="width:auto" id="igst-'.$start.'" value="'.$row['igst'].'" />';
            }
            else
            {
            $obj['10'] ='<input type="text" class="form-control d-none" readonly style="width:auto" id="gst_per-'.$start.'" value="'.$row['gst_per'].'" />';
            $obj['11'] ='<input type="text" class="form-control d-none" readonly style="width:auto" id="cgst-'.$start.'" value="'.$row['cgst'].'" />';
            $obj['12'] ='<input type="text" class="form-control d-none" readonly style="width:auto" id="sgst-'.$start.'" value="'.$row['sgst'].'" />';
            $obj['13'] ='<input type="text" class="form-control d-none" readonly style="width:auto" id="igst-'.$start.'" value="'.$row['igst'].'" />';
            }
            $obj['14'] ='<input type="text" class="form-control" style="width:auto" id="remark'.$start.'" value="'.$row['remark'].'" />';
            
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





















