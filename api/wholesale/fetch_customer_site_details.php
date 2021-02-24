<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $sql = "SELECT * FROM tbl_wholesale_customer_site_details WHERE site_id_pk='$site_id'";
    $res = mysqli_query($db,$sql);
    while($rw = mysqli_fetch_array($res))
    {
        echo $rw['site_address'];
    
    echo "#";
    echo "Site Landline: ".$rw['site_landline']."\n"."Site Contact Person: ".$rw['site_person_name'];
    }
?>