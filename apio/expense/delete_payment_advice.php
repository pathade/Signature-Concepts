<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag = $_SESSION['flag'];
    $s= '';

    if($flag == 0) {
    $s = "UPDATE exp_pay_advice SET cancel_status='1' WHERE pa_id_pk='$delete_id' and flag='0' ";
    }
    else {
        $s = "UPDATE exp_pay_advice SET cancel_status='1' WHERE pa_id_pk='$delete_id' and flag='1' ";
    }
    //$sql = "DELETE FROM exp_pay_advice WHERE pa_id_pk='$delete_id'";
    $d = mysqli_query($db,$s);


    if($d == 1)
    {
        //echo "1";
        ?>
    <script>
    // alert("Expense head Deleted!");
    window.location.href="../../src/expense/view_payment_advice.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>