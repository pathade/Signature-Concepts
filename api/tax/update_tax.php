<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $effective_date1 = date("d-m-Y", strtotime($effective_date));

    $acive_status="1";
    $sales_executive="1";
    $igst_app="1";
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "UPDATE `mstr_tax` 
    SET `tax_name`='$tax_name',`tax_percentagfe`='$tax_percentage',`remark`='$remark',`add_date`='$cur_date',
    `update_date`='$cur_date',`update_time`='$cur_time',`update_by`='admin@gmail.com',`effective_date`='$effective_date1',`active_status`='$status' 
    WHERE `tax_id_pk`='$edit_id' and `flag`='$flag' ";
    }
    else {
        $sql = "UPDATE `mstr_tax` 
    SET `tax_name`='$tax_name',`tax_percentagfe`='$tax_percentage',`remark`='$remark',`add_date`='$cur_date',
    `update_date`='$cur_date',`update_time`='$cur_time',`update_by`='admin@gmail.com',`effective_date`='$effective_date1',`active_status`='$status' 
    WHERE `tax_id_pk`='$edit_id' and `flag`='$flag' ";
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