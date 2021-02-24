<?php
    include('../../database/dbconnection.php');
    extract($_GET);

    $sql = "UPDATE supplier_manual_debit_credit SET status=1 WHERE id='$id'";
    $res = mysqli_query($db, $sql) or die('DECR: '.mysqli_error($db));

    if($res== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Record Deleted!");
    window.location.href="../../src/purchase/view_supplier_manual_credit_debit.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>