<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT *
                FROM retail_proforma"; 
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $get_salesman = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['salesman']."'";
            $res_salesman = mysqli_fetch_assoc(mysqli_query($db, $get_salesman));
            $obj['salesman'] = $res_salesman['emp_name'];

            $get_taxamt = "SELECT gross_amt, tax_amt, net_amt, date FROM retail_tax_invoice WHERE po_no_fk='".$row['id_pk']."'";
            $res_tax = mysqli_fetch_assoc(mysqli_query($db, $get_taxamt));
            
            $obj['date'] = $res_tax['date'];
            $obj['gross_amt'] = $res_tax['gross_amt'];
            $obj['gst'] = $res_tax['tax_amt'];
            $obj['net_amt'] = $row['net_amt'];

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>