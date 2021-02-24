<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];
    //$delete = "DELETE FROM exp_company_loan_advance WHERE com_id_pk ='$delete_id'";
    session_start();
    $flag = $_SESSION['flag'];
    $del= '';

    if($flag == 0) {
    $del = "UPDATE exp_company_loan_advance SET del_status = '1' WHERE com_id_pk ='$delete_id' and flag='0' ";
    }
    else {
        $del = "UPDATE exp_company_loan_advance SET del_status = '1' WHERE com_id_pk ='$delete_id' and flag='1' ";
    }
    $res = mysqli_query($db,$del) or die(mysqli_error($db));
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