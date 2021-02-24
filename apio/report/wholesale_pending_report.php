<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM wholesale_work_order_pending_qty";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $get_sono = "SELECT work_no, cust_id_fk FROM wholesale_work_order WHERE work_order_id='".$row['work_order_id_fk']."'";
            $res_sono = mysqli_fetch_assoc(mysqli_query($db, $get_sono));
            $obj['sono'] = $res_sono['work_no'];

            $obj['date'] = $row['add_date'];

            $get_customer = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$res_sono['cust_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['cust_name'];

            $get_item = "SELECT final_product_code FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
            $res_item = mysqli_fetch_assoc(mysqli_query($db, $get_item));
            $obj['item'] = $res_item['final_product_code'];

            $obj['o_qty'] = $row['order_qty'];
            $obj['p_qty'] = $row['remain_qty'];

            $obj['process'] = '';
            $obj['sides'] = '';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>