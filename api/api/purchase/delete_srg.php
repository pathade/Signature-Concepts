<?php 
    include('../../database/dbconnection.php');

    $edit_item = $_GET['id'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    

    

    $sql = "UPDATE `supplier_return_good` SET `delete_status`='1' WHERE `id_pk`='$edit_item'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res== 1)
    {
        echo "1";
        ?>
    <script>
    alert("Data Deleted!");
    window.location.href="../../src/purchase/view_supplier_return_good.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }


?>