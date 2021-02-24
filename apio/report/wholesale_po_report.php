<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM wholesale_work_order";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['work_order_id'];

            $get_customer = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$row['cust_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['cust_name'];

            $obj['pono'] = $row['pono'];

            $obj['date'] = $row['add_date'];

            $obj['qty'] = $row['qty'];
            $obj['p_qty'] = '0';
            $obj['sqft'] = $row['sq_ft'];
            $obj['net_amt'] = $row['net_amt'];
            $status = $row['delete_status'];
            if($status == 0)
                $obj['status'] = '<p style="color: green">A</p>';
            else
                $obj['status'] = '<p style="color: red">C</p>';
            $obj['created_by'] = 'Creator name';
            $obj['create_date'] = $row['add_date'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>