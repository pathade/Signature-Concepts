<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $dc_no!='')
    // {
        // $sql = "SELECT * FROM supplier_manual_debit_credit WHERE supplier_id_fk='$supplier' OR id='$dc_no'";
        $sql = "SELECT * FROM supplier_manual_debit_credit";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id'];
            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier_id_fk']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));
            $obj['supplier'] = $res_supp['name'];
            $obj['against'] = $row['credit_debit_type'];
            $obj['dcno'] = $row['debit_credit_no'];
            $obj['date'] = $row['date'];
            $obj['final_amt'] = $row['final_amount'];
            $status = $row['status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">Active</p>';
            else
                $obj['status'] = '<p style="color: red">Cancel</p>';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>