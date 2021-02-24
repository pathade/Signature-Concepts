<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT *
                FROM fin_purchase_invoice";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier_id_fk']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));
            $obj['supplier'] = $res_supp['name'];
            $obj['bill_no'] = $row['bill_no'];
            $obj['bill_date'] = $row['bill_date'];
            $obj['qty'] = $row['total_qty'];
            $obj['sqft'] = $row['total_sqfit'];
            $obj['gross_amt'] = $row['gross_amt'];
            $obj['discount'] = $row['disc_rs'];
            $obj['unload'] = $row['unload'];
            $obj['tax_amt'] = $row['tax_amt'];
            $obj['others'] = $row['others'];
            $obj['net_amt'] = $row['net_amt'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>