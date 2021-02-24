<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $sql = "INSERT INTO `mstr_budget`(`branch`, `expense_head`, `for_month`, `amt_per_month`, `remark`, `add_date`, `add_time`, `added_by`, `update_date`, `update_time`, `updated_by`) VALUES ('$branch','$exphead','$month','$amt_per_month','$remark', null ,null ,null , null, null, null)";

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