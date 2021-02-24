<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    $sql = "SELECT sr_no FROM mstr_data_series WHERE name='purchase_order'";
    $res = mysqli_fetch_row(mysqli_query($db,$sql)) or die(mysqli_error($db));
    echo $res[0];
    
    // while($rw = mysqli_fetch_array($res))
    // {
    //     // echo date('y',strtotime('-1 year')).'-'.date('y').'/'.$rw['sr_no'] ;
    //     echo $rw['sr_no'] ;
    // }
?>