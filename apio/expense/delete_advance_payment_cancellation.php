<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $delete= '';
    $delete_id = $_GET['id'];

    if($flag == 0) {
    $delete = "DELETE FROM exp_advance_payment_cancellation WHERE pay_cancel_id_pk ='$delete_id' and flag='0' ";
    }
    else {
        $delete = "DELETE FROM exp_advance_payment_cancellation WHERE pay_cancel_id_pk ='$delete_id' and flag='1' ";
    }
    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        ?>
        <script>
        window.location.href="../../src/expense/view_advance_payment_cancellation.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>