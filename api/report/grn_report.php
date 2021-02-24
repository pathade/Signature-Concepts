<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='' || $grn_no!='')
    // {
        // $sql = "SELECT * FROM grn WHERE supplier='$supplier' OR po_id_fk='$po_no' OR grn_id_pk='$grn_no'";
        $sql = "SELECT * FROM grn";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['grn_id_pk'];
            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));
            $obj['supplier'] = $res_supp['name'];
            $obj['grn_no'] = $row['grn_no'];
            $get_pono = "SELECT purchase_order_no FROM purchase_order WHERE id='".$row['po_id_fk']."'";
            $res_pono = mysqli_fetch_assoc(mysqli_query($db, $get_pono));
            $obj['pono'] = $res_pono['purchase_order_no'];
            $obj['date'] = $row['grn_date'];
            $obj['qty'] = $row['total_qty'];
            $obj['sqft'] = $row['total_qty'];
            $obj['net_amt'] = $row['total'];
            if($row['pi_added']==1)
                $obj['invoice_status'] = 'Y';
            else
                $obj['invoice_status'] = 'N';
            $status = $row['status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">A</p>';
            else
                $obj['status'] = '<p style="color: red">C</p>';
            $obj['created_by'] = $row['prepared_by'];
            $obj['create_date'] = $row['grn_date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>