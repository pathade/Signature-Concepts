<?php 
    include('../../database/dbconnection.php'); 
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    $fetch_sql = "SELECT * FROM wholesale_work_order WHERE work_order_id='$selected_work_no'";
    $f = mysqli_query($db,$fetch_sql);
    while($frw = mysqli_fetch_array($f))
    {
        $delivery_challan_status = $frw['delivery_challan_status'];
    }

    if($delivery_challan_status == 1)
    {
        echo "inside if";
        /*$sql = "SELECT work_order_id,work_no,branch,pono,length,width,cust_id_fk,site_id_fk,remark,salesman_id_fk,transporter_id_fk,qty,sq_ft,gross_amt,total, 
                disc_per,disc_rs,other,process_amt , net_amt,cust_name ,site_name ,name ,wo.add_date,wc.mob_number,wc.office_address,wcsd.site_landline,wcsd.site_person_name,
                wo.add_time,wcsd.site_address,wc.ledger_balance
        FROM wholesale_work_order as wo,
             tbl_wholesale_customer as wc,
             tbl_wholesale_customer_site_details as wcsd ,
             mstr_transporter as tr 
        WHERE wo.cust_id_fk = wc.wc_id_pk AND 
            wo.site_id_fk = wcsd.site_id_pk AND 
            wo.work_order_id='$selected_work_no' AND 
            wo.transporter_id_fk = tr.t_id_pk 
        ORDER BY wo.work_order_id DESC";*/

        $sql = "SELECT work_order_id,work_no,branch,pono,length,width,wo.cust_id_fk,site_id_fk,remark,salesman_id_fk,transporter_id_fk,wdc.qty,wdc.sq_ft,wdc.gross_amt,wdc.total, 
        wdc.disc_per,wdc.disc_rs,wdc.other,wdc.process_amt , wdc.net_amt,cust_name ,site_name ,name ,wo.add_date,wc.mob_number,wc.office_address,wcsd.site_landline,wcsd.site_person_name,
        wo.add_time,wcsd.site_address,wc.ledger_balance,wo.remaining_qty
        FROM wholesale_delivery_challan as wdc,
            wholesale_work_order as wo,
            tbl_wholesale_customer as wc,
            tbl_wholesale_customer_site_details as wcsd ,
            mstr_transporter as tr 
        WHERE wo.cust_id_fk = wc.wc_id_pk AND 
            wo.site_id_fk = wcsd.site_id_pk AND 
            wo.work_order_id='$selected_work_no' AND 
            wo.transporter_id_fk = tr.t_id_pk 
        ORDER BY wo.work_order_id DESC";
        $res = mysqli_query($db,$sql);
        
        while($rw = mysqli_fetch_array($res))
        {
            echo $work_order_id = $rw['work_order_id'];echo "#"; //0
            echo $work_no = $rw['work_no'];echo "#"; //1
            echo "<option value='".$rw['branch']."'>".$rw['branch']."</option>";echo "#"; //2
            echo $pono = $rw['pono'];echo "#"; //3
            echo "<option value='".$rw['cust_id_fk']."'>".$rw['cust_name']."</option>";echo "#"; //4
            echo "<option value='".$rw['site_id_fk']."'>".$rw['site_name']."</option>";echo "#"; //5
            echo $remark = $rw['remark'];echo "#"; //6
            //echo $transporter_id_fk = $rw['transporter_id_fk'];echo "#"; //7
            echo "<option value='".$rw['transporter_id_fk']."'>".$rw['name']."</option>";echo "#"; //7
            echo $qty = $rw['remaining_qty'];echo "#"; //8
            echo $sq_ft = $rw['sq_ft'];echo "#"; //9
            echo $gross_amt = $rw['gross_amt'];echo "#"; //10
            echo $total = $rw['total'];echo "#"; //11
            echo $disc_per = $rw['disc_per'];echo "#"; //12
            echo $disc_rs = $rw['disc_rs'];echo "#"; //13
            echo $other = $rw['other'];echo "#"; //14
            echo $process_amt = $rw['process_amt'];echo "#"; //15
            echo $net_amt = $rw['net_amt'];echo "#"; //16
            echo $cust_name = $rw['cust_name'];echo "#"; //17
            echo $site_name = $rw['site_name'];echo "#"; //18
            echo $name = $rw['name'];echo "#"; //19
            echo $mob_number = $rw['mob_number'];echo "#";//20
            echo $office_address = $rw['office_address'];echo "#";//21
            echo $site_landline = $rw['site_landline'];echo "#";//22
            echo $site_person_name = $rw['site_person_name'];echo "#";//23
            echo $add_time=$rw['add_time'];echo "#";//24
            echo $site_address=$rw['site_address'];echo "#";//25
            $transport_id = $rw['transporter_id_fk'] ;
            $ledger_balance = $rw['ledger_balance'];

            $tv_sql = "SELECT * FROM mstr_transporter_vehicle WHERE t_id_fk='$transport_id'";
        $tv_res = mysqli_query($db,$tv_sql);
        echo "<option value=''>select vehicle</option>"; //26
        while($tvrw = mysqli_fetch_array($tv_res))
        {
            echo "<option value='".$tvrw['tv_id_pk']."'>".$tvrw['v_no']."</option>"; //26
        }
        echo "#";
        echo "Ledger Balance: ".$ledger_balance;echo "#";//27
    
        }
        
        

    }
    else
    {
        //echo "inside else"; 
        $sql = "SELECT work_order_id,work_no,branch,pono,cust_id_fk,site_id_fk,remark,salesman_id_fk,transporter_id_fk,qty,sq_ft,gross_amt,total, 
                disc_per,disc_rs,other,process_amt , net_amt,cust_name ,site_name ,name ,wo.add_date,wc.mob_number,wc.office_address,wcsd.site_landline,wcsd.site_person_name,
                wo.add_time,wcsd.site_address,wc.ledger_balance
        FROM wholesale_work_order as wo,
             tbl_wholesale_customer as wc,
             tbl_wholesale_customer_site_details as wcsd ,
             mstr_transporter as tr 
        WHERE wo.cust_id_fk = wc.wc_id_pk AND 
            wo.site_id_fk = wcsd.site_id_pk AND 
            wo.work_order_id='$selected_work_no' AND 
            wo.transporter_id_fk = tr.t_id_pk 
        ORDER BY wo.work_order_id DESC";

        /*$sql = "SELECT work_order_id,work_no,branch,pono,length,width,wo.cust_id_fk,site_id_fk,remark,salesman_id_fk,transporter_id_fk,wdc.qty,wdc.sq_ft,wdc.gross_amt,wdc.total, 
        wdc.disc_per,wdc.disc_rs,wdc.other,wdc.process_amt , wdc.net_amt,cust_name ,site_name ,name ,wo.add_date,wc.mob_number,wc.office_address,wcsd.site_landline,wcsd.site_person_name,
        wo.add_time,wcsd.site_address,wc.ledger_balance
        FROM wholesale_delivery_challan as wdc,
            wholesale_work_order as wo,
            tbl_wholesale_customer as wc,
            tbl_wholesale_customer_site_details as wcsd ,
            mstr_transporter as tr 
        WHERE wo.cust_id_fk = wc.wc_id_pk AND 
            wo.site_id_fk = wcsd.site_id_pk AND 
            wo.work_order_id='$selected_work_no' AND 
            wo.transporter_id_fk = tr.t_id_pk 
        ORDER BY wo.work_order_id DESC";
        $res = mysqli_query($db,$sql);*/
        $res = mysqli_query($db,$sql);
        
        while($rw = mysqli_fetch_array($res))
        {
            echo $work_order_id = $rw['work_order_id'];echo "#"; //0
            echo $work_no = $rw['work_no'];echo "#"; //1
            echo "<option value='".$rw['branch']."'>".$rw['branch']."</option>";echo "#"; //2
            echo $pono = $rw['pono'];echo "#"; //3
            echo "<option value='".$rw['cust_id_fk']."'>".$rw['cust_name']."</option>";echo "#"; //4
            echo "<option value='".$rw['site_id_fk']."'>".$rw['site_name']."</option>";echo "#"; //5
            echo $remark = $rw['remark'];echo "#"; //6
            //echo $transporter_id_fk = $rw['transporter_id_fk'];echo "#"; //7
            echo "<option value='".$rw['transporter_id_fk']."'>".$rw['name']."</option>";echo "#"; //7
            echo $qty = $rw['qty'];echo "#"; //8
            echo $sq_ft = $rw['sq_ft'];echo "#"; //9
            echo $gross_amt = $rw['gross_amt'];echo "#"; //10
            echo $total = $rw['total'];echo "#"; //11
            echo $disc_per = $rw['disc_per'];echo "#"; //12
            echo $disc_rs = $rw['disc_rs'];echo "#"; //13
            echo $other = $rw['other'];echo "#"; //14
            echo $process_amt = $rw['process_amt'];echo "#"; //15
            echo $net_amt = $rw['net_amt'];echo "#"; //16
            echo $cust_name = $rw['cust_name'];echo "#"; //17
            echo $site_name = $rw['site_name'];echo "#"; //18
            echo $name = $rw['name'];echo "#"; //19
            echo $mob_number = $rw['mob_number'];echo "#";//20
            echo $office_address = $rw['office_address'];echo "#";//21
            echo $site_landline = $rw['site_landline'];echo "#";//22
            echo $site_person_name = $rw['site_person_name'];echo "#";//23
            echo $add_time=$rw['add_time'];echo "#";//24
            echo $site_address=$rw['site_address'];echo "#";//25
            $transport_id = $rw['transporter_id_fk'] ;
            $ledger_balance = $rw['ledger_balance'];

            $tv_sql = "SELECT * FROM mstr_transporter_vehicle WHERE t_id_fk='$transport_id'";
            $tv_res = mysqli_query($db,$tv_sql);
            while($tvrw = mysqli_fetch_array($tv_res))
            {
                echo "<option value='".$tvrw['tv_id_pk']."'>".$tvrw['v_no']."</option>"; //26
            }
            echo "#";
            echo "Ledger Balance: ".$ledger_balance;echo "#";//27
    
        }
        
        
    }
    
?>