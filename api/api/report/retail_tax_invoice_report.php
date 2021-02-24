<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM retail_tax_invoice";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $obj['pino'] = $row['pi_no'];

            $get_pono = "SELECT order_no FROM retail_proforma WHERE id_pk='".$row['po_no_fk']."'";
            $res_pono = mysqli_fetch_assoc(mysqli_query($db, $get_pono));
            $obj['pono'] = $res_pono['order_no'];

            $obj['date'] = $row['date'];

            $get_transporter = "SELECT name FROM mstr_transporter WHERE t_id_pk='".$row['transporter']."'";
            $res_trans = mysqli_fetch_assoc(mysqli_query($db, $get_transporter));
            $obj['transporter'] = $res_trans['name'];

            $get_vehicle = "SELECT DISTINCT v_no FROM mstr_transporter_vehicle WHERE tv_id_pk='".$row['vehicle']."'";
            $res_vehicle = mysqli_fetch_assoc(mysqli_query($db, $get_vehicle));
            $obj['vehicle'] = $res_vehicle['v_no'];

            $obj['qty'] = $row['qty'];
            $obj['sqft'] = $row['sqfit'];
            $obj['net_amt'] = $row['net_amt'];
            $status = $row['status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">A</p>';
            else
                $obj['status'] = '<p style="color: red">C</p>';
            $obj['created_by'] = $row['prepared_by'];
            $obj['create_date'] = $row['date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>