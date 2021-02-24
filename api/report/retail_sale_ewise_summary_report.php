<?php 
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    $sql = "SELECT * FROM retail_tax_invoice";
    $res = mysqli_query($db, $sql);

    while($row=mysqli_fetch_assoc($res))
    {
        $obj=array();

        $obj['type']='';

        $obj['branch']=$row['branch'];

        $get_sales_id = "SELECT salesman FROM retail_proforma WHERE id_pk='".$row['po_no_fk']."'";
        $res_sales_id = mysqli_fetch_assoc(mysqli_query($db, $get_sales_id));

        $get_salesman = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='".$res_sales_id['salesman']."'";
        $res_salesman = mysqli_fetch_assoc(mysqli_query($db, $get_salesman));
        $obj['salesman'] = $res_salesman['emp_name'];

        $obj['challan_no'] = $row['pi_no'];
        $obj['challan_date'] = $row['date'];

        $get_item = "SELECT * FROM retail_tax_invoice_items WHERE rti_id_fk='".$row['id_pk']."'";
        $res_item = mysqli_query($db, $get_item);

        $product = '';
        $rate = '';
        while($item_row=mysqli_fetch_assoc($res_item))
        {
            $product .= $item_row['product_design'].'</br><hr>';
            $rate .= $item_row['rate'].'</br><hr>';
        }

        $obj['product'] = $product;
        $obj['qty']=$row['qty'];
        $obj['sqft']=$row['sqfit'];
        $obj['rate']=$rate;

        $obj['amt'] = $row['net_amt'];

        $obj['po_id']='';
        $obj['bill_no']='';
        $obj['bill_date']='';
        $obj['spi_no']='';
        $obj['pur_against_sale']='';

        array_push($response, $obj);
    }

    echo json_encode($response);


?>