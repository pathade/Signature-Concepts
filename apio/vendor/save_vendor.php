<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    
session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $flag=$_SESSION['flag'];
if($flag==0){
    $sql = "INSERT INTO `mstr_vendor`(`saturation`, `first_name`, `last_name`, `company_name`, 
    `cust_display_name`, `cust_email`, `cust_phone`, `cust_mobile`, `type`, `currency`, `opening_balance`, 
    `payment_terms`, `bill_address_line1`, `bill_address_line2`, `bill_address_line3`, `bill_country`, `bill_city`, 
    `bill_state`, `bill_pin`, `ship_address_line1`, `ship_address_line2`, `ship_address_line3`, `ship_country`, 
    `ship_city`, `ship_state`, `ship_pin`, `remarks`, `add_date`, `add_time`,`added_by`,`gstin`,`pan_no`,`party`, `flag`) 
    VALUES ('','$first_name','','$company_name','','$Customer_email',
    '$Customer_work_phone','$Customer_mobile','$type','$comboCustomerOrderingCurrency','$Customer_opening_balance',
    '$payment_terms','$txtCustomerBillingAddressLine1','$txtCustomerBillingAddressLine2','$txtCustomerBillingAddressLine3'
    ,'$comboBillingCountry','$txtCustomerBillingCity','$comboBillingState','$txtCustomerBillingPin','$txtCustomerShippingAddressLine1'
    ,'$txtCustomerShippingAddressLine2','$txtCustomerShippingAddressLine3','$comboShippingCountry','$txtCustomerShippingCity','$comboShippingState','$txtCustomerShippingPin','$ember2513',
    '$cur_date','$cur_time','admin@gmail.com','$gstin','$pan_no','', '$flag')";
}
else {
     $sql = "INSERT INTO `mstr_vendor`(`saturation`, `first_name`, `last_name`, `company_name`, 
    `cust_display_name`, `cust_email`, `cust_phone`, `cust_mobile`, `type`, `currency`, `opening_balance`, 
    `payment_terms`, `bill_address_line1`, `bill_address_line2`, `bill_address_line3`, `bill_country`, `bill_city`, 
    `bill_state`, `bill_pin`, `ship_address_line1`, `ship_address_line2`, `ship_address_line3`, `ship_country`, 
    `ship_city`, `ship_state`, `ship_pin`, `remarks`, `add_date`, `add_time`,`added_by`,`gstin`,`pan_no`,`party`, `flag`) 
    VALUES ('','$first_name','','$company_name','','$Customer_email',
    '$Customer_work_phone','$Customer_mobile','$type','$comboCustomerOrderingCurrency','$Customer_opening_balance',
    '$payment_terms','$txtCustomerBillingAddressLine1','$txtCustomerBillingAddressLine2','$txtCustomerBillingAddressLine3'
    ,'$comboBillingCountry','$txtCustomerBillingCity','$comboBillingState','$txtCustomerBillingPin','$txtCustomerShippingAddressLine1'
    ,'$txtCustomerShippingAddressLine2','$txtCustomerShippingAddressLine3','$comboShippingCountry','$txtCustomerShippingCity','$comboShippingState','$txtCustomerShippingPin','$ember2513',
    '$cur_date','$cur_time','admin@gmail.com','$gstin','$pan_no','', '$flag')";
}
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        $last_id = mysqli_insert_id($db);
        $contact_person_array = $_POST['contact_person_array'];

        /*$new_array = explode(",#,",$contact_person_array);
        //print_r($new_array);
        $len = sizeof($new_array);

        for($i=0;$i<=$len-1;$i++)
        {
            //echo"explode array:". $new_array[$i];
            $new_length = sizeof($new_array[$i]);

            $new_array1 = explode(",",$new_array[$i]);
           // print_r($new_array1);
            $len1 = sizeof($new_array1);
            // if($len1>4)
            // {
                for($e = 0;$e<=$len1-1;$e++)
                {
                    $salutaion = $new_array1[0];
                    $first_name = $new_array1[1];
                    $last_name = $new_array1[2];
                    $email = $new_array1[3];
                    $work_phone = $new_array1[4];
                    $mobile_phone = $new_array1[5];
                }
                echo $sql = "INSERT INTO `mstr_vendor_contact_person`(`vendor_id_fk`, `cp_salution`, `cp_first_name`, 
                `cp_last_name`, `cp_work_phone`, `cp_mobile_phone`,`cp_email`) 
                VALUES ('$last_id','$salutaion','$first_name','$last_name','$work_phone','$mobile_phone','$email')";
                $f = mysqli_query($db,$sql);
            // }

        }
        echo "1";*/
        $contact_person_array = json_decode($contact_person_array, true);
        $length = count($contact_person_array);
        for($i = 0;$i<$length;$i++)
        {
            //echo "iddd:"+$array[$i]['id']; 
            $sat = $contact_person_array[$i]['sat'];
            $fname =  $contact_person_array[$i]['fname'];
            $last_namecp =  $contact_person_array[$i]['last_name'];
            $emailcp =  $contact_person_array[$i]['email'];
            $workph =  $contact_person_array[$i]['workph'];
            $phone =  $contact_person_array[$i]['phone'];
            

            $sql = "INSERT INTO `mstr_vendor_contact_person`(`vendor_id_fk`, `cp_salution`, `cp_first_name`, 
                `cp_last_name`, `cp_work_phone`, `cp_mobile_phone`,`cp_email`) 
                VALUES ('$last_id','$sat','$fname','$last_namecp','$workph','$phone','$emailcp')";
                // $f = mysqli_query($db,$sql);
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
        //echo "1";

    }
    else
    {
       // echo "0";
    }

echo $flag_ok;
?>