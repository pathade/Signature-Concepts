<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM exp_advance_payment";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $obj['amount'] = $row['amount'];

            $get_name = "SELECT first_name FROM mstr_vendor WHERE vendor_id_pk='".$row['vendor_id_fk']."'";
            $res_name = mysqli_fetch_assoc(mysqli_query($db, $get_name));
            $obj['bal_detail'] = $res_name['first_name']; 
 


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>