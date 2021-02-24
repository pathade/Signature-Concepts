<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM daily_petty";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $get_exp_head = "SELECT expense_head FROM mstr_expense WHERE expense_idpk='".$row['expenses_head']."'";
            $res_exp_head = mysqli_fetch_assoc(mysqli_query($db, $get_exp_head));
            $obj['exp'] = $res_exp_head['expense_head'];

            $obj['date'] = $row['added_date'];

            $get_vendor = "SELECT first_name FROM mstr_vendor WHERE vendor_id_pk='".$row['to1']."'";
            $res_vendor = mysqli_fetch_assoc(mysqli_query($db, $get_vendor));
            $obj['to'] = $res_vendor['first_name'];

            $obj['amount'] = $row['amount'];

            $get_emp = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['authorised_by']."'";
            $res_emp = mysqli_fetch_assoc(mysqli_query($db, $get_emp));
            $obj['emp'] = $res_emp['emp_name'];
            $obj['prepared_by'] = $res_emp['emp_name'];


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>