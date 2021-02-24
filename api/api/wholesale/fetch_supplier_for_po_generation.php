<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    $sql = "SELECT * FROM mstr_supplier WHERE delete_status='0' order by supplier_id_fk DESC";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    echo "<option value='' disabled selected>Select Supplier </option>";
    while($rw = mysqli_fetch_array($res))
    {
        echo "<option value='".$rw['supplier_id_fk']."' >".$rw['name']."</option>";
    }
?>