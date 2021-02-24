<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST); 

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

   
        echo $sql = "SELECT * FROM `wholesale_work_order`
        WHERE cust_id_fk='$cust_id' AND delivery_challan_status=0";
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        if(mysqli_num_rows($res) > 0)
        {
            echo "<option value=''>--Select Work Number--</option>";
            while($rw = mysqli_fetch_array($res))
            {
                echo '<option value="'.$rw['work_order_id'].'">'.$rw['work_no'].'</option>';
            }
        }
        else
        {
            echo "<option value=''>Record Not Found</option>";
        }
    
    
?>