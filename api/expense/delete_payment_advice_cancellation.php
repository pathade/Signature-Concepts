<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

    if($flag == 0) {
    $sql = "DELETE FROM exp_payment_advice_cancellation WHERE epa_id_pk='$delete_id' and flag='0' ";
    }
    else {
        $sql = "DELETE FROM exp_payment_advice_cancellation WHERE epa_id_pk='$delete_id' and flag='1' ";
    }
    $d = mysqli_query($db,$sql);


    if($d == 1)
    {
        //echo "1";
        ?>
    <script>
    // alert("Expense head Deleted!");
    window.location.href="../../src/expense/view_payment_advice_cancellation.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>