<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    session_start();

    $flag = $_SESSION['flag'];
    $sql= '';

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('Y-m-d');
	$cur_time = date('H:i:s A');
    $flag=$_SESSION['flag'];

    if($flag==0){

   $sql = "INSERT INTO `mstr_expense`(`expense_head`, `expense_name`, `expense_desc`, `add_date`, `add_time`,
     `added_by`, `update_date`, `update_time`, `updated_by`,`flag`) 
     VALUES ('$exphead','$expname','$expdescription',null,null,null,null,null,null,'$flag')";
    }
    else {
         $sql = "INSERT INTO `mstr_expense`(`expense_head`, `expense_name`, `expense_desc`, `add_date`, `add_time`,
     `added_by`, `update_date`, `update_time`, `updated_by`,`flag`) 
     VALUES ('$exphead','$expname','$expdescription',null,null,null,null,null,null,'$flag')";
    }
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