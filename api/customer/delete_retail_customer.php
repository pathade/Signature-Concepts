<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

     session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "UPDATE mstr_retail_customer SET status=0 WHERE retail_cust_idpk='$delete_id' and flag='0' ";
    }
    else {
        $sql = "UPDATE mstr_retail_customer SET status=0 WHERE retail_cust_idpk='$delete_id' and flag='1' ";
    }
    $d1 = mysqli_query($db,$sql);

    if($d1== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Deleted!Retail Customer status set to Inactive");
    window.location.href="../../src/masters/view_retail_customer.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>