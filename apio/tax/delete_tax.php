<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "UPDATE mstr_tax SET active_status = 0 WHERE tax_id_pk='$delete_id' and flag='0' ";
    }
    else {
        $sql = "UPDATE mstr_tax SET active_status = 0 WHERE tax_id_pk='$delete_id' and flag='1' ";
    }
    $d = mysqli_query($db,$sql);
    if($d)
    {
        echo "1";
        header('location:../../src/masters/view_tax.php?deleted=true');
    }
    else
    {
        echo "0";
        header('location:../../src/masters/view_tax.php?deleted=false');
    }
    
?>