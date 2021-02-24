<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM customer_manual_debit_credit WHERE cust_type='Retailer'";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $obj['against'] = $row['credit_debit_type'];
            $obj['dcno'] = $row['debit_credit_no'];

            $obj['date'] = $row['date'];
            $obj['net_amt'] = $row['final_amount'];
            $status = $row['used_status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">Active</p>';
            else
                $obj['status'] = '<p style="color: red">Cancel</p>';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>