<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    /*$sql = "SELECT work_order_id,work_no FROM `wholesale_work_order` WHERE cust_id_fk='$cust_id'  AND delivery_challan_status='1'
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
    }*/

    /*$sql = "SELECT distinct work_order_id_fk 
            FROM `wholsale_delivery_challan_items` 
            WHERE remaining_qty='0' AND total_wty!='0'";
    $res = mysqli_query($db,$sql);

    while($rw = mysqli_fetch_array($res))
    {
        $work_order_id_fk = $rw['work_order_id_fk'];

        echo $d = "SELECT cust_id_fk FROM wholesale_work_order WHERE work_order_id='$work_order_id_fk'";
        $k = mysqli_query($db,$d);
        while($rg = mysqli_fetch_array($k))
        {
            $cust_id_fk = $rg['cust_id_fk'];

            $d = "SELECT cust_name,wc_id_pk FROM tbl_wholesale_customer WHERE wc_id_pk='$cust_id_fk'";
            $k = mysqli_query($db,$d);
            while($rg = mysqli_fetch_array($k))
            {
                $wc_id_pk = $rg['wc_id_pk'];
                $cust_name = $rg['cust_name'];

                echo '<option value="'.$wc_id_pk.'">'.$cust_name.'</option>';

                
            }


        }
    }*/

    $k = "SELECT * FROM wholesale_delivery_challan WHERE  cust_id_fk='$cust_id' AND tax_invoice_status!='1'";

    $kl = mysqli_query($db,$k);
    $i = 0;

    if(mysqli_num_rows($kl) > 0)
    {

        while($lki = mysqli_fetch_array($kl))
        {
            echo '<input type="checkbox" id="dc-'.$i.'" name="dc" onchange="doalert(this.id)" value="'.$lki['wd_ch_id_pk'].'">&nbsp; '.$lki['challan_no'];echo"<br>";
            $i++;
        }
    }
    else
    {
        echo "Delivery Challan Not Available";
    }
    
?>