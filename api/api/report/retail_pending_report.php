<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();
    
    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM retail_delete_pending_qty";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['d_id_pk'];

            $get_salesman = "SELECT order_no FROM retail_proforma WHERE id_pk='".$row['po_no']."'";
            $res_sales = mysqli_fetch_assoc(mysqli_query($db, $get_salesman)) or die(mysqli_error($db));
            $obj['pono'] = $res_sales['order_no'];

            $obj['date'] = $row['add_date'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer_id']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $obj['item_name'] = '';

            $item_sql = "SELECT order_qty, pending_qty FROM retail_delete_pending_qty_items WHERE d_id_fk='".$row['d_id_pk']."'";
            $res_item = mysqli_query($db, $item_sql) or die(mysqli_error($db));

            $oqty = 0;
            $pqty = 0;

            while($row1 = mysqli_fetch_row($res_item))
            {
                $oqty += $row1[0];
                $pqty += $row1[1];
            }

            $obj['oqty'] = $oqty;
            $obj['pqty'] = $pqty;

            $obj['process'] = '';
            $obj['sides'] = '';


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>