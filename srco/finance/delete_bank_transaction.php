<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    
    if($flag == 0) {
        $sql = "UPDATE fin_bank_transaction SET status = 1 WHERE bankt_id_pk='$delete_id' and flag='0' ";
    }
   else {
    $sql = "UPDATE fin_bank_transaction SET status = 1 WHERE bankt_id_pk='$delete_id' and flag='1' ";
   }
    $d = mysqli_query($db,$sql);


    if($d == 1)
    {
        echo "1";
        ?>
    <script>
   // alert("Deleted!Bank status set to Inactive");
    window.location.href="../../src/finance/view_bank_transaction.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>