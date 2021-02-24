<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM retail_proforma";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));


        while($row = mysqli_fetch_assoc($res))
        {
            $sql1 = "SELECT * FROM retail_proforma_items WHERE rpi_id_fk='".$row['id_pk']."'";
            $res1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
            while($row1=mysqli_fetch_assoc($res1))
            {
                $obj = array();
                $obj['id'] = $row['id_pk'];

                $obj['date'] = $row['date'];
                $obj['pono'] = '0';

                $get_salesman = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$row['salesman']."'";
                $res_sales = mysqli_fetch_assoc(mysqli_query($db, $get_salesman)) or die(mysqli_error($db));
                $obj['salesman'] = $res_sales['emp_name'];

                $get_item = "SELECT nks_code, design_code FROM mstr_item WHERE item_id_pk='".$row1['item_id_fk']."'";
                $res_item = mysqli_fetch_row(mysqli_query($db, $get_item)) or die(mysqli_error($db));
                $code = $res_item[0].'-'.$res_item[1];
                $obj['product'] = $code;

                $obj['qty'] = $row1['qty'];

                $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
                $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
                $obj['customer'] = $res_cust['retail_cust_name'];

                array_push($response, $obj);
            }

        }
        echo json_encode($response);
    // }

?>