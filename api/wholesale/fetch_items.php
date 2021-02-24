<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    $sql = "SELECT * FROM mstr_item WHERE delete_status='0' AND item_type = '$category_name' order by item_id_pk DESC";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    
    while($rw = mysqli_fetch_array($res))
    {
        echo "<option value='".$rw['item_id_pk']."'>".$rw['final_product_code']."</option>";
    }
?>