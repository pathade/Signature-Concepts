<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT wti.cust_id_fk, so.qty,  
                FROM wholesale_work_order so, wholesale_tax_invoice wti
                WHERE wti.work_id_fk=so.work_order_id";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>