<?php 
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
        include '../../database/dbconnection.php';
        session_start();
        $flag = $_SESSION['flag'];
        $sql= '';

        if ($flag == 0) {
        $sql = "SELECT eipo.*
        from exp_purchase_order epo, exp_item_po as eipo
        WHERE Id = '$edit_id' and epo.Id = eipo.po_id_fk and epo.flag='0' ";
        }
        else {
            $sql = "SELECT eipo.*
        from exp_purchase_order epo, exp_item_po as eipo
        WHERE Id = '$edit_id' and epo.Id = eipo.po_id_fk and epo.flag='1' ";
        }

        $data = array();
        $result = mysqli_query($db, $sql);
        $count=1;
        $start = 0;

        while ($row = mysqli_fetch_array($result))
        { 
            // select item category
            if ($flag == 0) {
            $select_cat = "SELECT * FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."' and flag='0' ";
            }
            else {
                $select_cat = "SELECT * FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."' and flag='1' ";
            }
            $result1 = mysqli_fetch_array(mysqli_query($db, $select_cat));
           
            $obj = array();
            // $obj['0'] = $start++;          
                    
            
            // $obj['1'] = "<p>".$row['id']."</p>";
            $obj['0'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['item_id_fk']."'>".$result1['final_product_code']."</option></select>";
            // $obj['1'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['design_code']."'>".$row['design_code']."</option></select>";
            
            $qty= $row['quantity'];
            $rate= $row['rate'];
            $amount= $row['amount'];
            $obj['1'] = '<input type="text" class="form-control" min="0"  id="quantity'.$start.'" value="'.$qty.'" oninput="get_quantity_value(this.id)"; />';
            $obj['2'] ='<input type="text" class="form-control" min="0" id="rate'.$start.'" value="'.$rate.'" oninput="get_rate_value(this.id)" />';
            $obj['3'] ='<input type="text" class="form-control" readonly id="amount'.$start.'" value="'.$amount.'" />';
            
            
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





















