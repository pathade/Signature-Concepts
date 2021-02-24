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
    
    if($flag == 0) {
    $sql = "SELECT nks_code,design_code,size FROM mstr_item WHERE item_id_pk = '$id' and flag='0' ";
    }
    else {
        $sql = "SELECT nks_code,design_code,size FROM mstr_item WHERE item_id_pk = '$id' and flag='1' ";
    }
    // $sql = "SELECT * FROM mstr_item WHERE delete_status='0' AND item_id_pk = '$id' order by item_id_pk DESC";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    $rw = mysqli_fetch_array($res);
    
    $final_pro_code = $rw[0].'-'.$rw[1];
    
    echo '<option value="'.$final_pro_code.'">'.$final_pro_code.'</option>';
    echo '#';
    echo '<option value="'.$rw[2].'">'.$rw[2].'</option>';
?>