<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag== 0) {
    $sql = "UPDATE mstr_supplier SET status=0 WHERE supplier_id_fk='$delete_id' AND flag='0' ";
    }
    else {
        $sql = "UPDATE mstr_supplier SET status=0 WHERE supplier_id_fk='$delete_id' AND flag='1' ";
    }
    $d1 = mysqli_query($db,$sql);

    

    if($d1== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Supplier Deleted!");
    window.location.href="../../src/masters/view_supplier.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>