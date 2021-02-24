<?php 
    include('../../database/dbconnection.php');

    extract($_GET);

    $sql="UPDATE fin_purchase_invoice SET status=1 WHERE id_pk='$id'";

    $res = mysqli_query($db, $sql) or die('PI: '.mysqli_error($db));
 
    if($res== 1)
    {
        $select_item="SELECT grn_id_fk FROM fin_purchase_invoice_items WHERE fpi_id_fk='$id'";
        $res_item = mysqli_query($db, $select_item) or die(mysqli_error($db));
        while($row1=mysqli_fetch_row($res_item))
        {
            $update_grn = "UPDATE grn SET pi_added='0' WHERE grn_id_pk='$row1[0]'";
            mysqli_query($db, $update_grn) or die('GRN: '.mysqli_error($db));
        }
        echo "1";
        ?>
    <script>
    alert("Purchase Invoice Deleted!");
    window.location.href="../../src/purchase/view_finance_purchase_invoice.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }



?>