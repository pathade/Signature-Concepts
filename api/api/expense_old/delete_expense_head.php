<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    
    
    $sql = "DELETE FROM mstr_expense WHERE expense_idpk='$delete_id'";
    $d = mysqli_query($db,$sql);


    if($d == 1)
    {
        //echo "1";
        ?>
    <script>
    // alert("Expense head Deleted!");
    window.location.href="../../src/masters/view_expense_head.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>