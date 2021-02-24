<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM purchase_order";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id'];
            $get_supp = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['supplier_id_fk']."'";
            $res_supp = mysqli_fetch_assoc(mysqli_query($db, $get_supp));
            $obj['supplier'] = $res_supp['name'];
            $obj['pono'] = $row['purchase_order_no'];
            $obj['date'] = $row['date'];

            $get = "SELECT quantity, sqrft FROM purchase_order_items WHERE purchase_order_id_fk='".$row['id']."'";
            $res1 = mysqli_query($db, $get) or die(mysqli_error($db));
            $qty_calc = 0;
            $sqft_calc = 0;
            while($row1=mysqli_fetch_row($res1))
            {
                $qty_calc += $row1[0];
                $sqft_calc += $row1[1];
            }

            $obj['qty'] = $qty_calc;
            $obj['p_qty'] = '';
            $obj['sqft'] = $sqft_calc;
            $obj['net_amt'] = $row['total'];
            $status = $row['status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">A</p>';
            else
                $obj['status'] = '<p style="color: red">C</p>';
            $obj['created_by'] = 'Creator name';
            $obj['create_date'] = $row['date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>