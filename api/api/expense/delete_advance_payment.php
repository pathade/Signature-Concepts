<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag = $_SESSION['flag'];
    $delete= '';

    if($flag == 0) {
    $delete = "UPDATE exp_advance_payment SET del_status='1' WHERE id_pk='$delete_id' and flag='0' ";
    }
    else {
        $delete = "UPDATE exp_advance_payment SET del_status='1' WHERE id_pk='$delete_id' and flag='1' ";
    }
    //$delete = "DELETE FROM exp_advance_payment WHERE id_pk ='$delete_id'";
    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        ?>
        <script>
        window.location.href="../../src/expense/view_advance_payment.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>