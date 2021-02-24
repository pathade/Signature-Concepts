<?php
    session_start();
    include '../../database/dbconnection.php';
 extract($_POST);
 $supplier = $_POST['supplier'];

 $res = array();

     $sql_item = "SELECT id,purchase_order_no FROM `purchase_order` where supplier_id_fk='$supplier' AND grn_added!='1' AND delete_status!='1'";
    $res_item = mysqli_query($db,$sql_item);

    while ($row = mysqli_fetch_assoc($res_item)) {

      $row1 = array();
      $row1['id'] = $row['id'];
      $row1['name'] = $row['purchase_order_no'];
      array_push($res, $row1);
    }
    echo json_encode($res);


?>
