<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    if($action=="retail")
    {
        $sql = "SELECT * FROM mstr_retail_customer";
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        if(mysqli_num_rows($res) > 0)
        {
            echo "<option value=''>--Select Retail Customer--</option>";
            while($rw = mysqli_fetch_array($res))
            {
                echo '<option value="'.$rw['retail_cust_idpk'].'">'.$rw['retail_cust_name'].'</option>';
            }
        }
        else
        {
            echo "<option value=''>Record Not Found</option>";
        }
    }
    else if($action=="wholesale")
    {
        $sql = "SELECT * FROM tbl_wholesale_customer";
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        if(mysqli_num_rows($res) > 0)
        {
            echo "<option value=''>--Select Wholesale Customer--</option>";
            while($rw = mysqli_fetch_array($res))
            {
                echo '<option value="'.$rw['wc_id_pk'].'">'.$rw['cust_name'].'</option>';
            }
        }
        else
        {
            echo "<option value=''>Record Not Found</option>";
        }
    }
    else
    {

    }
    
?>