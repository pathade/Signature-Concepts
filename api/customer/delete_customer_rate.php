<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $delete = "UPDATE `mstr_customer_rate` 
    SET `delete_status`= '1' WHERE customer_rate_id_pk='$delete_id' and flag='0' ";
    }
    else {
      $delete = "UPDATE `mstr_customer_rate` 
    SET `delete_status`= '1' WHERE customer_rate_id_pk='$delete_id' and flag='1' ";   
    }
    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        echo "1";
        ?>
        <script>
        window.location.href="../../src/masters/view_customer_rate.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>