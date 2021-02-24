<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    $delete = "DELETE FROM exp_company_loan_advance WHERE com_id_pk ='$delete_id'";
    $res = mysqli_query($db,$delete) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        ?>
        <script>
        window.location.href="../../src/expense/view_company_loan_advance.php";
        </script>
            <?php
    }
    else
    {
        echo "0";
       
    }


?>