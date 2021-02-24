<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
    // $newRawItemArray = json_decode($newRawItemArray, true);
    //print_r($newRawItemArray);

    // $acive_status="1";
    // $sales_executive="1";
    // $igst_app="1";

    // $sql = "UPDATE `tbl_wholesale_customer` 
    // SET `cust_name`='$customer_name',`purchase_name`='$purchase_name',`office_address`='$office_address',
    // `mob_number`='$mobile_no',`office_landline`='$olandline_no',`cust_credit_limit`='$customer_credit_limit',
    // `purchase_mail_id`='$purchase_mail_id',
    // `cust_credit_days`='$customer_credit_days',`pan`='$pan',`active_status`='$status',`ledger_balance`='$ledger_balance',
    // `sales_executive`='$saleexecutive',`account_mail_id`='$account_mail_id',`igst_app`='$igst',`gst_no`='$gst_no',
    // `add_date`='$cur_date',`update_date`='$cur_date',
    // `update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `wc_id_pk`='$edit_id'";


    $sql = "UPDATE `mstr_transporter_vehicle` 
    SET `v_no`='$vehicle_number',`v_name`='$vehicle_name',`v_des`='$des',
    `v_status`='$vstatus' 
    WHERE `t_id_fk`='$edit_id'";

    $res = mysqli_query($db,$sql);
    //$last_id = mysqli_insert_id($db);

    if($res == 1)
    {
        // $delete_query = "DELETE FROM tbl_wholesale_customer_site_details WHERE wc_id_fk='$edit_id'";
        // $g = mysqli_query($db,$delete_query);
        // $length = count($newRawItemArray);
        // for($i = 0;$i<$length;$i++)
        // {
        //     //echo "iddd:"+$array[$i]['id']; 
        //     $site_name = $newRawItemArray[$i]['site_name'];
        //     $site_address =  $newRawItemArray[$i]['site_address'];
        //     $site_landline_number =  $newRawItemArray[$i]['site_landline_number'];
        //     $account_mobile =  $newRawItemArray[$i]['account_mobile'];
        //     $site_person_name =  $newRawItemArray[$i]['site_person_name'];
        //     $site_mobile_number =  $newRawItemArray[$i]['site_mobile_number'];
        //     $Account_person_name =  $newRawItemArray[$i]['Account_person_name'];
        //     $Account_landline_number =  $newRawItemArray[$i]['Account_landline_number'];
        //     $second_authority =  $newRawItemArray[$i]['second_authority'];
        //     $mobile_number1 =  $newRawItemArray[$i]['mobile_number1'];
        //     $final_authority =  $newRawItemArray[$i]['final_authority'];
        //     $mobile_number2 =  $newRawItemArray[$i]['mobile_number2'];

        //     $sql = "INSERT INTO `tbl_wholesale_customer_site_details`
        //     (`site_name`, `site_address`, `site_landline`, 
        //     `account_mobile`, `site_person_name`, `site_mobile`, 
        //     `account_person_name`, `account_landline`, `second_authority`, 
        //     `mob_no1`, `final_authority`, `mob_no2`, `wc_id_fk`) 
        //     VALUES ('$site_name','$site_address','$site_landline_number','$account_mobile',
        //     '$site_person_name','$site_mobile_number','$Account_person_name','$Account_landline_number','$second_authority','$mobile_number1',
        //     '$final_authority','$mobile_number2','$edit_id')";
        //     $res = mysqli_query($db,$sql);
        //     if($res == 1)
        //     {
        //         $flag_ok = "1";
        //     }
        //     else
        //     {
        //         $flag_ok = "0";
        //     }

        // }
        echo "1";
    }
    else{
        echo "0";
    }
?>