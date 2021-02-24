<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM purchase_order_items";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id'];

            $get_pono = "SELECT purchase_order_no, date, supplier_id_fk, branch, delete_status FROM purchase_order WHERE id='".$row['purchase_order_id_fk']."'";
            $res_pono = mysqli_fetch_assoc(mysqli_query($db, $get_pono));
            $obj['pono'] = $res_pono['purchase_order_no'];

            $obj['date'] = $res_pono['date'];

            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$res_pono['supplier_id_fk']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));

            $obj['supplier'] = $res_supp['name'];

            $obj['product'] = $row['design_code'];

            $obj['sqft'] = $row['sqrft'];
            $obj['qty'] = $row['quantity'];

            $obj['net_amt'] = $row['amount'];

            $obj['p_qty'] = '';

            $obj['branch'] = $res_pono['branch'];

            if($res_pono['delete_status'] == 0)
                $obj['status'] = '<span class="text-success">A</span>';
            else
                $obj['status'] = '<span class="text-danger">C</span>';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>