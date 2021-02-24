<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM stock_table";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];
            $get_item = "SELECT final_product_code FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
            $res_item = mysqli_fetch_assoc(mysqli_query($db, $get_item));
            $obj['item'] = $res_item['final_product_code'];

            $obj['qty'] = $row['total_qty'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>