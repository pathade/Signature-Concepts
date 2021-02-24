<?php 
    include '../../database/dbconnection.php';
    extract($_POST);
    session_start();  
    $flag=$_SESSION['flag'];
    $sql='';
    
    if($flag == 0) {
    $sql = "SELECT account_no FROM mstr_bank WHERE bank_idpk='$id' and flag='0' ";
    }
    else {
       $sql = "SELECT account_no FROM mstr_bank WHERE bank_idpk='$id' and flag='1' "; 
    }
    $res = mysqli_fetch_array(mysqli_query($db, $sql));


    echo '<option value="'.$res['0'].'">'.$res['0'].'</option>';

?>