<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $k = "SELECT * FROM wholesale_delivery_challan 
        WHERE  cust_id_fk='$cust_id'";

    $kl = mysqli_query($db,$k);
    $i = 0;

    if(mysqli_num_rows($kl) > 0)
    {
        echo '<option value="">--Select Challan Number--</option>';
        while($lki = mysqli_fetch_array($kl))
        {
            
            echo '<option value="'.$lki['wd_ch_id_pk'].'">"'.$lki['challan_no'].'"</option>';
        }
    }
    else
    {
        echo "Delivery Challan Not Available";
    }
    
?>