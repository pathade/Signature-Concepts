<?php 
    include('../../database/dbconnection.php');

    $edit_item = $_GET['id'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');


    $sql = "UPDATE `wholesale_work_order` SET `delete_status`='1' WHERE `work_order_id`='".$_GET['id']."'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Deleted!");
    window.location.href="../../src/wholesale/view_wholesale_work_order.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }


?>