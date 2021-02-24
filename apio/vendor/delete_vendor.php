<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    session_start();
    $flag=$_SESSION['flag'];
    if ($flag == 0) {
    $sql = "UPDATE mstr_vendor SET delete_status=1 WHERE vendor_id_pk='$delete_id' and flag='0' ";
    }
    else {
       $sql = "UPDATE mstr_vendor SET delete_status=1 WHERE vendor_id_pk='$delete_id' and flag='1' "; 
    }
    $d1 = mysqli_query($db,$sql) or die('V: '.mysqli_error($db));

    $sql = "UPDATE mstr_vendor_contact_person SET del_status=1 WHERE vendor_id_fk='$delete_id'";
    $d = mysqli_query($db,$sql) or die('VC: '.mysqli_error($db));

    if($d == 1 && $d1== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Vendor Deleted!");
    window.location.href="../../src/masters/view_vendor.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>