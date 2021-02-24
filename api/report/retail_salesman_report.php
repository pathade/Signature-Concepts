<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT *
                FROM retail_proforma rp";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $get_salesman = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['salesman']."'";
            $res_sales = mysqli_fetch_assoc(mysqli_query($db, $get_salesman)) or die(mysqli_error($db));
            $obj['salesman'] = $res_sales['emp_name'];

            $get_bill_no = "SELECT pi_no FROM retail_tax_invoice WHERE po_no_fk='".$row['id_pk']."'";
            $res_bill = mysqli_fetch_assoc(mysqli_query($db, $get_bill_no)) or die(mysqli_error($db));
            $obj['bill_no'] = $res_bill['pi_no'];

            $obj['qty'] = $row['qty'];
            $obj['net_amt'] = $row['net_amt'];
            $obj['company_name'] = $row['branch'];



            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>