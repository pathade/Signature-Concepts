<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM exp_purchase_order";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['Id'];

            $get_vendor = "SELECT first_name FROM mstr_vendor WHERE vendor_id_pk='".$row['vendor_id_fk']."'";
            $res_vendor = mysqli_fetch_assoc(mysqli_query($db, $get_vendor));
            $obj['vendor'] = $res_vendor['first_name'];

            $obj['po_no'] = $row['po_no'];

            $obj['date'] = $row['add_date'];

            $get_exp = "SELECT expense_head FROM mstr_expense WHERE expense_idpk='".$row['expense_head_id_fk']."'";
            $res_exp = mysqli_fetch_assoc(mysqli_query($db, $get_exp));
            $obj['exp_head'] = $res_exp['expense_head'];

            $obj['qty'] = $row['total_qty'];
            $obj['net_amt'] = $row['net_amt'];
            $obj['bal_amt'] = '';
            $obj['status'] = '';
            // if($status == 0)
            //     $obj['status'] = '<p style="color: green">A</p>';
            // else
            //     $obj['status'] = '<p style="color: red">C</p>';
            $obj['created_by'] = $row['authorised_by'];
            $obj['create_date'] = $row['add_date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>