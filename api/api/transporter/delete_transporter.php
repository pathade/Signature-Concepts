<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
session_start();
$flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "UPDATE mstr_transporter SET del_status = 1, tactive_status = 0 WHERE t_id_pk='$delete_id' and flag='0' ";
    }
    else {
        $sql = "UPDATE mstr_transporter SET del_status = 1, tactive_status = 0 WHERE t_id_pk='$delete_id' and flag='1' ";
    }
    $d1 = mysqli_query($db,$sql);

    $sql = "UPDATE mstr_transporter_vehicle SET v_status=0 WHERE t_id_fk='$delete_id'";
    $d = mysqli_query($db,$sql);

    if($d == 1 && $d1 == 1)
    {
        echo "1";
        ?>
    <script>
    //alert("Transporter Deleted!");
    window.location.href="../../src/masters/view_transporter.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>