<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A'); 
    $sql = "SELECT work_order_id,work_no FROM `wholesale_work_order` 
    WHERE cust_id_fk='$cust_id'  AND delivery_challan_status='1'
    ORDER BY `work_order_id`  DESC";
    $res = mysqli_query($db,$sql);

    if(mysqli_num_rows($res)>0)
    {
        echo "<option  disabled selected>Select Work No</option>";
        while($rw = mysqli_fetch_array($res))
        {
            echo "<option value='".$rw['work_order_id']."'>".$rw['work_no']."</option>";
        }
    }
    else
    {
        echo "<option value=''>No Data Available</option>";
    }
    
?>