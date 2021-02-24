<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

    if($flag == 0) {
    $sql = "UPDATE fin_payment_advice SET status = 1 WHERE id_pk = '$delete_id' and flag='0' ";
    }
    else {
        $sql = "UPDATE fin_payment_advice SET status = 1 WHERE id_pk = '$delete_id' and flag='1' ";
    }
    $d = mysqli_query($db,$sql);
    if($d == 1)
    {
        echo "1";
        ?>
    <script>
   // alert("Deleted!Bank status set to Inactive");
    window.location.href="../../src/finance/view_finance_payment_advice.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>