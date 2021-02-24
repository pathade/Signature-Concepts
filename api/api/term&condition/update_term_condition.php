<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');


   // $emp_status="1";
    $edit_id = $_POST['edit_id'];

    $sql = "UPDATE `mstr_term_condition` 
    SET `branch`='$branch',`applicable_for`='$applicable_for',`details`='$details',
    `status`='$status1',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `SrNo`='$edit_id'";

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