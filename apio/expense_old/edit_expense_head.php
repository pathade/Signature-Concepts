<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $sql = "UPDATE `mstr_expense` SET `expense_head`='$exphead',`expense_name`='$expname',`expense_desc`='$expdescription',`add_date`=null,`add_time`=null,`added_by`=null,`update_date`=null,`update_time`=null,`updated_by`=null WHERE expense_idpk='$expense_id'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }

?>