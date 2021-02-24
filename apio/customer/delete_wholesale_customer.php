<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    session_start();
    $flag=$_SESSION['flag'];
    
    // if($flag == 0) {
    $sql = "UPDATE tbl_wholesale_customer SET active_status='0' WHERE wc_id_pk='$delete_id'";
    // }
    // else {
    //   $sql = "UPDATE tbl_wholesale_customer SET active_status='0' WHERE wc_id_pk='$delete_id' and flag='1' ";  
    // }
    $d1 = mysqli_query($db,$sql) or die('WC: '.mysqli_error($db));
    
    // if($flag == 0) {
    $sql = "UPDATE tbl_wholesale_customer_site_details SET del_status='1' WHERE wc_id_fk='$delete_id'";
    // }
    // else {
    //   $sql = "UPDATE tbl_wholesale_customer_site_details SET del_status='1' WHERE wc_id_fk='$delete_id' and flag='1' ";  
    // }
    $d = mysqli_query($db,$sql) or die('WCS: '.mysqli_error($db));

    if($d == 1 && $d1== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Customer Deleted!");
    window.location.href="../../src/masters/view_wholesale_customer.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>