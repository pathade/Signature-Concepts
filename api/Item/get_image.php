<?php
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "SELECT product_image FROM mstr_item WHERE item_id_pk='$pid' and flag='0' ";
    }
    else {
       $sql = "SELECT product_image FROM mstr_item WHERE item_id_pk='$pid' and flag='1' "; 
    }
    $res = mysqli_fetch_row(mysqli_query($db, $sql)) or die(mysqli_error($db));

    if($res)
    {
        // if($res[0] == null)
        //     echo ''
        echo json_encode(array('image'=>$res[0]));
    }
    else
    {
        echo '0';
        echo mysqli_error($db);
    }

?>