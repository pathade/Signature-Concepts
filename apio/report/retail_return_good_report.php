<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM retail_return_goods";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $get_pono = "SELECT order_no FROM retail_proforma WHERE id_pk='".$row['rp_id_fk']."'";
            $res_pono = mysqli_fetch_assoc(mysqli_query($db, $get_pono));
            $obj['pono'] = $res_pono['order_no'];

            $obj['date'] = $row['date'];

            $obj['qty'] = $row['qty'];
            $obj['sqft'] = $row['sqfit'];
            $obj['net_amt'] = $row['net_amt'];
            $obj['redeem_amt'] = '0';
            $obj['balance'] = $row['net_amt'];
            $status = $row['status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">A</p>';
            else
                $obj['status'] = '<p style="color: red">C</p>';
            $get_creator = "SELECT prepared_by FROM retail_tax_invoice WHERE po_no_fk='".$row['rp_id_fk']."'";
            $res_creator=mysqli_fetch_assoc(mysqli_query($db, $get_creator));
            $obj['created_by'] = $res_creator['prepared_by'];
            $obj['create_date'] = $row['date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>