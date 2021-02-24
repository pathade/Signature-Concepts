<?php
    include('../../database/dbconnection.php');
    extract($_GET);

    $sql = "UPDATE grn SET del_status=1 WHERE grn_id_pk='$id'";
    $res = mysqli_query($db, $sql) or die('GRN: '.mysqli_error($db));

    if($res== 1)
    {
        $select_item="SELECT po_id_fk FROM grn WHERE grn_id_pk='$id'";
        $res_item = mysqli_query($db, $select_item) or die(mysqli_error($db));
        while($row1=mysqli_fetch_row($res_item))
        {
            $update_grn = "UPDATE purchase_order SET grn_added='0' WHERE id='$row1[0]'";
            mysqli_query($db, $update_grn) or die('PO: '.mysqli_error($db));
        }
        echo "1";
        ?>
    <script>
    alert("GRN Deleted!");
    window.location.href="../../src/purchase/view_grn.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>