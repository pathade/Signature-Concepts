<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $delete_id = $_GET['id'];
     $sql='';
    $flag=$_SESSION['flag'];
    
    if($flag==0){
    $delete = "UPDATE mstr_employee SET emp_status='0' WHERE emp_id_pk='$delete_id' and flag='0' ";
    }
    else {
        $delete = "UPDATE mstr_employee SET emp_status='0' WHERE emp_id_pk='$delete_id' and flag='1' ";
    }
    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        echo "1";
        ?>
        <script>
        window.location.href="../../src/masters/view_employee.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>