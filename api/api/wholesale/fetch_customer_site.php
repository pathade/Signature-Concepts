<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $sql = "SELECT * FROM tbl_wholesale_customer_site_details WHERE wc_id_fk='$cust_id'";
    $res = mysqli_query($db,$sql);
    echo '<option value="">Select Site</option>';
    while($rw = mysqli_fetch_array($res))
    {
        echo '<option value="'.$rw['site_id_pk'].'">'.$rw['site_name'].'</option>';
    }
    echo "#";
    $sql = "SELECT * FROM tbl_wholesale_customer WHERE wc_id_pk='$cust_id'";
    $res = mysqli_query($db,$sql);

    while($rw = mysqli_fetch_array($res))
    {
        echo $rw['mob_number'];echo "#";
        echo $rw['office_address'];echo "#";
    }
?>