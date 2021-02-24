<?php
    session_start();
    include '../../database/dbconnection.php';
 extract($_POST);
 $supplier = $_POST['supplier'];

 $res = array();

    $sql_item = "SELECT DISTINCT grn_id_pk,grn_no FROM purchase_order po,grn g where po.supplier_id_fk='$supplier' and g.po_id_fk";
    $res_item = mysqli_query($db,$sql_item);

    while ($row = mysqli_fetch_assoc($res_item)) {

      $row1 = array();
      $row1['id'] = $row['grn_id_pk'];
      $row1['name'] = $row['grn_no'];
      array_push($res, $row1);
    }
    echo json_encode($res);


?>
