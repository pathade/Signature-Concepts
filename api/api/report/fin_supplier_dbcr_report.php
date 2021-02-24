<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM supplier_manual_debit_credit";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier_id_fk']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));
            $obj['supp'] = $res_supp['name'];

            $obj['debit_no'] = $row['debit_credit_no'];
            $obj['date'] = $row['date'];
            $obj['amount'] = $row['final_amount'];
            $obj['adv_pay_no'] = $row['adv_pay_no'];
            $obj['pay_date'] = $row['date'];
            $obj['redeem_amt'] = '';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>