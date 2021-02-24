<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    $delete = "DELETE FROM mstr_term_condition WHERE SrNo ='$delete_id'";
    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        echo "1";
        ?>
        <script>
        window.location.href="../../src/masters/view_term_condition.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>