<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();  
    $flag=$_SESSION['flag'];
    $sql='';
    
    if($flag == 0) {
    $sql = "UPDATE mstr_bank SET status = 0 WHERE bank_idpk='$delete_id' and flag='0' ";
    }
    else {
       $sql = "UPDATE mstr_bank SET status = 0 WHERE bank_idpk='$delete_id' and flag='1' ";  
    }
    $d = mysqli_query($db,$sql);


    if($d == 1)
    {
        echo "1";
        ?>
    <script>
   // alert("Deleted!Bank status set to Inactive");
    window.location.href="../../src/masters/view_bank.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>