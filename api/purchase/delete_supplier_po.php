<?php 
    include('../../database/dbconnection.php');

    extract($_GET);

    $sql = "UPDATE purchase_order SET delete_status=1 WHERE id='$id'";
    $res = mysqli_query($db, $sql) or die(mysqli_error($db));

    $sql1 = "UPDATE purchase_order_items SET status=1 WHERE purchase_order_id_fk='$id'";
    $res1 = mysqli_query($db, $sql1) or die(mysqli_error($db));

    if($res && $res1)
    if($res== 1 && $res1 == 1)
    {
        echo "1";
        ?>
    <script>
    alert("Purchase Order Deleted!");
    window.location.href="../../src/purchase/view_supplier_po.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>