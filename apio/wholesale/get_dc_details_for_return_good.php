<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    $k = "SELECT * FROM wholesale_delivery_challan 
        WHERE  wd_ch_id_pk='$dc_id'";

    $kl = mysqli_query($db,$k);
    $i = 0;

    while($lki = mysqli_fetch_array($kl))
    {
        //echo '<input type="checkbox" id="dc-'.$i.'" name="dc" onchange="doalert(this.id)" value="'.$lki['wd_ch_id_pk'].'">&nbsp; '.$lki['challan_no'];echo"<br>";
        //$i++;
        $t_id_fk = $lki['t_id_fk'];
        $v_id_fk = $lki['v_id_fk'];
        $cust_id_fk = $lki['cust_id_fk'];
        $wh_wo_id_fk = $lki['wh_wo_id_fk'];
        $prepared_by = $lki['prepared_by'];
        $net_amt = $lki['net_amt'];
        
        

        $k12 = "SELECT * FROM wholesale_work_order WHERE  work_order_id='$wh_wo_id_fk'";
        $kl12 = mysqli_query($db,$k12);
        while($lki12 = mysqli_fetch_array($kl12))
        {
            $site_id_fk = $lki12['site_id_fk'];
            $work_no = $lki12['work_no'];
            $add_time = $lki12['add_time'];
        }
        
        $k123 = "SELECT * FROM tbl_wholesale_customer_site_details WHERE  site_id_pk='$site_id_fk'";
        $kl123 = mysqli_query($db,$k123);
        while($lki123 = mysqli_fetch_array($kl123))
        {
            $site_name = $lki123['site_name'];
        }

        $k1 = "SELECT * FROM tbl_wholesale_customer WHERE  wc_id_pk='$cust_id_fk'";
        $kl1 = mysqli_query($db,$k1);
        while($lki1 = mysqli_fetch_array($kl1))
        {
            $purchase_name = $lki1['purchase_name'];
            $mob_number = $lki1['mob_number'];
            $office_address = $lki1['office_address'];
            $igst_app = $lki1['igst_app'];
        }

        $k15 = "SELECT * FROM mstr_transporter WHERE  t_id_pk='$t_id_fk'";
        $kl15 = mysqli_query($db,$k15);
        while($lki15 = mysqli_fetch_array($kl15))
        {
            $tname = $lki15['name'];
        ;
        }

        $k156 = "SELECT * FROM mstr_transporter_vehicle WHERE  tv_id_pk='$v_id_fk'";
        $kl156 = mysqli_query($db,$k156);
        while($lki156 = mysqli_fetch_array($kl156))
        {
            $v_no = $lki156['v_no'];
        }
        echo $office_address."#".$mob_number."#".'<option value="'.$t_id_fk.'">'.$tname.'</option>'."#".'<option value="'.$v_id_fk.'">'.$v_no.'</option>'."#".$prepared_by."#".$work_no."#".$add_time."#".$net_amt."#".$igst_app;

    }
    
?>