<?php 
    include('../../database/dbconnection.php');
    session_start();
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
    $newRawItemArray = json_decode($newRawItemArray, true);
    //print_r($newRawItemArray);

    $acive_status="1"; 
    $sales_executive="1";
    // $igst_app="1";
    $flag=$_SESSION['flag'];

    // if(isset($igst))
    //     $igst_app=1;
    // else
    //     $igst_app=0;

    if($flag==0){
        $sql ="INSERT INTO `tbl_wholesale_customer`(`cust_name`, `purchase_name`, 
        `office_address`, `mob_number`, `office_landline`, `cust_credit_limit`, 
        `purchase_mail_id`, `cust_credit_days`, `pan`, `active_status`, 
        `ledger_balance`, `sales_executive`, `account_mail_id`, `igst_app`, 
        `gst_no`, `add_date`, `add_time`, `added_by`,`flag`) VALUES ('$customer_name','$purchase_name',
        '$office_address','$mobile_no','$olandline_no','$customer_credit_limit',
        '$purchase_mail_id','$customer_credit_days','$pan','$status',
        '$ledger_balance','$saleexecutive','$account_mail_id','$igst','$gst_no',
        '$cur_date','$cur_time','admin@gmail.com','$flag')"; 
    }
    else {
        $sql ="INSERT INTO `tbl_wholesale_customer`(`cust_name`, `purchase_name`, 
        `office_address`, `mob_number`, `office_landline`, `cust_credit_limit`, 
        `purchase_mail_id`, `cust_credit_days`, `pan`, `active_status`, 
        `ledger_balance`, `sales_executive`, `account_mail_id`, `igst_app`, 
        `gst_no`, `add_date`, `add_time`, `added_by`,`flag`) VALUES ('$customer_name','$purchase_name',
        '$office_address','$mobile_no','$olandline_no','$customer_credit_limit',
        '$purchase_mail_id','$customer_credit_days','$pan','$status',
        '$ledger_balance','$saleexecutive','$account_mail_id','$igst','$gst_no',
        '$cur_date','$cur_time','admin@gmail.com','$flag')"; 
    }

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    $last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        $length = count($newRawItemArray);
        for($i = 0;$i<$length;$i++)
        {
            //echo "iddd:"+$array[$i]['id']; 
            $site_name = $newRawItemArray[$i]['site_name'];
            $site_address =  $newRawItemArray[$i]['site_address'];
            $site_landline_number =  $newRawItemArray[$i]['site_landline_number']; 
            $site_person_name =  $newRawItemArray[$i]['site_person_name'];
            $Account_person_name =  $newRawItemArray[$i]['Account_person_name'];
            $Account_landline_number =  $newRawItemArray[$i]['Account_landline_number'];

            $sql = "INSERT INTO `tbl_wholesale_customer_site_details`
            (`site_name`, `site_address`, `site_landline`, 
            `site_person_name`, 
            `account_person_name`, `account_landline`, 
            `wc_id_fk`) 
            VALUES ('$site_name','$site_address','$site_landline_number',
            '$site_person_name','$Account_person_name','$Account_landline_number',
            '$last_id')";
            $res = mysqli_query($db,$sql) or die(mysqli_error($db));
            if($res == 1)
            {
                $flag_ok = "1";
            }
            else
            {
                $flag_ok = "0";
            }

        }
        echo "1";
    }
    else{
        echo "0";
    }
?>