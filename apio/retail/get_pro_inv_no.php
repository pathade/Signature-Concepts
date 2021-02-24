<?php
    session_start();
    include '../../database/dbconnection.php';
    extract($_POST);
    $name = $_POST['name'];

    $res = array();

        $sql_item = "SELECT id_pk,order_no 
        FROM retail_proforma WHERE customer='$name' AND tax_invoice_added!='1' AND status!='1'";
        $res_item = mysqli_query($db,$sql_item);

        while ($row = mysqli_fetch_assoc($res_item)) {

        $row1 = array();
        $row1['id'] = $row['id_pk'];
        $row1['name'] = $row['order_no'];
        array_push($res, $row1);
        }
        echo json_encode($res); 


?>
