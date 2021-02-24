<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    session_start();
    $flag = $_SESSION['flag'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    if($flag == 0) {
    $sql = "SELECT * FROM mstr_item WHERE delete_status='0' AND item_id_pk = '$id' AND flag='0' order by item_id_pk DESC";
    }
    else {
        $sql = "SELECT * FROM mstr_item WHERE delete_status='0' AND item_id_pk = '$id' AND flag='1' order by item_id_pk DESC";
    }
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    $rw = mysqli_fetch_array($res);
    
 
        $purchase_rate =  $rw['purchase_rate'];
        $size = $rw['size'];
        
    
    
    echo $purchase_rate."#";
    echo $size;
?>