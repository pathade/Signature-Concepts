<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM fin_cheque_print WHERE pay_type='0'";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier_name']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));
            $obj['supp'] = $res_supp['name'];

            $obj['cheque_no'] = $row['cheque_no1'];
            $obj['cheque_date'] = $row['cheque_date'];

            $get_bank = "SELECT bank_name FROM mstr_bank WHERE bank_idpk='".$row['bank_name1']."'";
            $res_bank = mysqli_fetch_assoc(mysqli_query($db, $get_bank));
            $obj['bank'] = $res_bank['bank_name'];

            $amt = 0;
            $get_amount = "SELECT amount FROM fin_cheque_print_table WHERE fin_cheque_print_idfk='".$row['id_pk']."'";
            $res_amount=mysqli_query($db, $get_amount) or die(mysqli_error($db));
            while($amt_row = mysqli_fetch_assoc($res_amount))
            {
                $amt += $amt_row['amount'];
            }
            $obj['amount'] = $amt;

            if($row['status'] == 0)
                $obj['status'] = 'A';
            else
                $obj['status'] = 'C';

            $obj['type'] = 'Cheque';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>