<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM wholesale_delivery_challan";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['wd_ch_id_pk'];

            $get_customer = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$row['cust_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['cust_name'];

            $obj['chno'] = $row['challan_no'];

            $obj['date'] = $row['add_date'];

            $obj['qty'] = $row['qty'];
            $obj['sqft'] = $row['sq_ft'];
            $obj['net_amt'] = $row['net_amt'];
            $status = $row['delete_status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">A</p>';
            else
                $obj['status'] = '<p style="color: red">C</p>';
            $obj['created_by'] = $row['prepared_by'];
            $obj['create_date'] = $row['add_date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>