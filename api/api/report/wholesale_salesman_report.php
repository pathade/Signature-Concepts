<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT wt.*, so.salesman_id_fk, so.branch, so.qty, so.sq_ft
                FROM wholesale_tax_invoice wt, wholesale_work_order so
                WHERE wt.work_id_fk=so.work_order_id";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['tax_id_pk'];

            $obj['company'] = $row['branch'];

            $obj['bill_no'] = $row['Tax_inv_no'];

            $get_customer = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$row['cust_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['cust_name'];

            $obj['qty'] = $row['qty'];
            $obj['sqft'] = $row['sq_ft'];


            $get_salesman = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['salesman_id_fk']."'";
            $res_sales = mysqli_fetch_assoc(mysqli_query($db, $get_salesman)) or die(mysqli_error($db));
            $obj['salesman'] = $res_sales['emp_name'];

            $obj['net_amt'] = $row['net_amt'];


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>