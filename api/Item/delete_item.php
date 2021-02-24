<?php 
    include('../../database/dbconnection.php');

    $edit_item = $_GET['id'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    
    session_start();
    $flag = $_SESSION['flag'];
    
    // if($flag == 0) {
    $sql = "UPDATE `mstr_item` SET `delete_status`=1 WHERE `item_id_pk`='$edit_item' ";
    // }
    // else {
    //   $sql = "UPDATE `mstr_item` SET `delete_status`='1' WHERE `item_id_pk`='$edit_item' and flag='1' ";  
    // }

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Item Deleted!");
    window.location.href="../../src/masters/view_item.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }


?>