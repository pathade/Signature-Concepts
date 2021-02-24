<?php 
    include('../../database/dbconnection.php');
    session_start();
    $flag = $_SESSION['flag'];
    $sql='';
    $delete_cheque = $_GET['id'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    if($flaag== 0){
    $sql = "UPDATE mstr_cheque SET delete_status = 1 WHERE cheque_id_pk='$delete_cheque' and flag='0' ";
    }
    else {
        $sql = "UPDATE mstr_cheque SET delete_status = 1 WHERE cheque_id_pk='$delete_cheque' and flag='1' ";
    }
    $d = mysqli_query($db,$sql);
    if($res)
    {
        echo "1";
        header('location:view_cheque.php?deleted=true');
    }
    else
    {
        echo "0";
        header('location:view_cheque.php?deleted=false');
    }

?>