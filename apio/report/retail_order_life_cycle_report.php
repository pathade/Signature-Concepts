<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT rt.id_pk, rt.pi_no, rt.customer, rt.qty, rp.order_no, rp.date, rp.qty
                FROM retail_tax_invoice rt, retail_proforma rp
                WHERE rt.po_no_fk=rp.id_pk";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $get_item = "SELECT * FROM retail_tax_invoice_items WHERE rti_id_fk='".$row['id_pk']."'";
            $res_item = mysqli_query($db, $get_item);
            while($row1 = mysqli_fetch_assoc($res_item))
            {

             
            $obj = array();
            $obj['id'] = $row['id_pk'];
            $obj['pro_no'] = $row['order_no'];
            $obj['tax_no'] = $row['pi_no'];
            $obj['pro_date'] = $row['date'];

            $get_cust = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_cust)) or die(mysqli_error($db));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $get_product = "SELECT final_product_code FROM mstr_item WHERE item_id_pk='".$row1['product_design']."'";
            $res_product = mysqli_fetch_assoc(mysqli_query($db, $get_product)) or die(mysqli_error($db));
            $obj['design_code'] = $res_product['final_product_code'];

            $obj['size'] = $row1['size'];

            $obj['pro_qty'] = $row['qty'];
            $obj['sales_qty'] = $row['qty'];

            $obj['supplier'] = '';
            $obj['supplier_no'] = '';

            $obj['grn'] = '';
            $obj['grn_qty'] = '';

            $obj['pi'] = '';
            $obj['pi_qty'] = '';


            array_push($response, $obj);
            }

        }
        echo json_encode($response);
    // }

?>