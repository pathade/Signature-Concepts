<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag==0){
    $sql = "UPDATE mstr_loan_advance_master SET active_status=0 WHERE LAM_id_pk='$delete_id' and flag='0' ";
    }
    else {
     $sql = "UPDATE mstr_loan_advance_master SET active_status=0 WHERE LAM_id_pk='$delete_id' and flag='1' ";   
    }
    $d1 = mysqli_query($db,$sql) or die('LAM: '.mysqli_error($db));

    if($d1 == 1)
    {
        //echo "1";
    ?>

    <script>
    //alert("Loan Advance Master Deleted!");
    window.location.href="../../src/masters/view_loan_advance.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>

