<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    $sql = "SELECT * FROM mstr_transporter_vehicle WHERE t_id_fk='$transporter_id'";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if(mysqli_num_rows($res) > 0)
    {
        echo "<option value=''>--Select Vehicle--</option>";
        while($rw = mysqli_fetch_array($res))
        {
            echo '<option value="'.$rw['tv_id_pk'].'">'.$rw['v_no'].'</option>';
        }
    }
    else
    {
        echo "<option value=''>Record Not Found</option>";
    }
    
?>