<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag = $_SESSION['flag'];
    $delete= '';

    if($flag == 0) {
    $delete = "UPDATE fin_skip_cheque SET status = 1 WHERE id_pk = '$delete_id' and flag='0' ";
    }
    else {
        $delete = "UPDATE fin_skip_cheque SET status = 1 WHERE id_pk = '$delete_id' and flag='1' ";
    }

    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        ?>
        <script>
        window.location.href="../../src/finance/view_skipcheque.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>