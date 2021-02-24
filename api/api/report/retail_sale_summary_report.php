<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT rt.*, rp.salesman
                FROM retail_tax_invoice rt, retail_proforma rp
                WHERE rt.po_no_fk=rp.id_pk";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $obj['date'] = $row['date'];

            $obj['inv_no'] = $row['pi_no'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $obj['qty'] = $row['qty'];

            $obj['gross_amt'] = $row['gross_amt'];
            $obj['net_amt'] = $row['net_amt'];

            $get_salesman = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['salesman']."'";
            $res_sales = mysqli_fetch_assoc(mysqli_query($db, $get_salesman)) or die(mysqli_error($db));
            $obj['salesman'] = $res_sales['emp_name'];


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>