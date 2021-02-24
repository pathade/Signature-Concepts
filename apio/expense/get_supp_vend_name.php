<?php 
    include('../../database/dbconnection.php');

    extract($_POST);
    session_start();
  $flag = $_SESSION['flag'];
  $sql= '';
    // works for two files expense adv. payment & bill entry
    //echo 'val: '.$val;
    if($val == "Finance" || $val == '0')
    {
        if($flag == 0) {
            $sql = "SELECT * FROM mstr_supplier where flag='0' ";
        }
        else {
            $sql = "SELECT * FROM mstr_supplier where flag='1' ";
        }
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_row($res))
        {
            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
        }
    }
    else if($val == "Expense" || $val == '1')
    {
        if($flag == 0) {
            $sql = "SELECT * FROM mstr_vendor where flag='0' ";
        }
        else {
            $sql = "SELECT * FROM mstr_vendor where flag='1' ";
        }
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_row($res))
        {
            echo '<option value="'.$row[0].'">'.$row[2].'</option>';
        }
    }

    

?>