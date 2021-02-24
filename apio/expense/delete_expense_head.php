<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

    if($flag == 0) {
    $sql = "UPDATE mstr_expense SET del_status=1 WHERE expense_idpk='$delete_id' and flag='0' ";
    }
    else {
        $sql = "UPDATE mstr_expense SET del_status=1 WHERE expense_idpk='$delete_id' and flag='1' ";
    }
    $d = mysqli_query($db,$sql) or die('EH: '.mysqli_error($db));


    if($d == 1)
    {
        //echo "1";
        ?>
    <script>
    alert("Expense head Deleted!");
    window.location.href="../../src/masters/view_expense_head.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>