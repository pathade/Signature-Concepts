<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    session_start();
    $flag=$_SESSION['flag'];
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    if($flag == 0) {
     $sql = "UPDATE `mstr_vendor` SET `first_name`='$first_name',`company_name`='$company_name',
    `cust_email`='$Customer_email',`cust_phone`='$Customer_work_phone',
    `cust_mobile`='$Customer_mobile',`type`='$type',`currency`='$comboCustomerOrderingCurrency',
    `opening_balance`='$Customer_opening_balance',
    `payment_terms`='$payment_terms',`bill_address_line1`='$txtCustomerBillingAddressLine1',
    `bill_address_line2`='$txtCustomerBillingAddressLine2',`bill_address_line3`='$txtCustomerBillingAddressLine3',
    `bill_country`='$comboBillingCountry',`bill_city`='$txtCustomerBillingCity',`bill_state`='$comboBillingState',
    `bill_pin`='$txtCustomerBillingPin',`ship_address_line1`='$txtCustomerShippingAddressLine1',
    `ship_address_line2`='$txtCustomerShippingAddressLine2',`ship_address_line3`='$txtCustomerShippingAddressLine3',
    `ship_country`='$comboShippingCountry',`ship_city`='$txtCustomerShippingCity',`ship_state`='$comboShippingState',
    `ship_pin`='$txtCustomerShippingPin',`remarks`='$ember2513',`update_date`='$cur_date',
    `update_time`='$cur_time',`updated_by`='admin@gmail.com',
    `gstin`='$gstin',`party`='' WHERE `vendor_id_pk`='$edit_id' and `flag`='$flag' ";
    }
    else {
        $sql = "UPDATE `mstr_vendor` SET `first_name`='$first_name',`company_name`='$company_name',
    `cust_email`='$Customer_email',`cust_phone`='$Customer_work_phone',
    `cust_mobile`='$Customer_mobile',`type`='$type',`currency`='$comboCustomerOrderingCurrency',
    `opening_balance`='$Customer_opening_balance',
    `payment_terms`='$payment_terms',`bill_address_line1`='$txtCustomerBillingAddressLine1',
    `bill_address_line2`='$txtCustomerBillingAddressLine2',`bill_address_line3`='$txtCustomerBillingAddressLine3',
    `bill_country`='$comboBillingCountry',`bill_city`='$txtCustomerBillingCity',`bill_state`='$comboBillingState',
    `bill_pin`='$txtCustomerBillingPin',`ship_address_line1`='$txtCustomerShippingAddressLine1',
    `ship_address_line2`='$txtCustomerShippingAddressLine2',`ship_address_line3`='$txtCustomerShippingAddressLine3',
    `ship_country`='$comboShippingCountry',`ship_city`='$txtCustomerShippingCity',`ship_state`='$comboShippingState',
    `ship_pin`='$txtCustomerShippingPin',`remarks`='$ember2513',`update_date`='$cur_date',
    `update_time`='$cur_time',`updated_by`='admin@gmail.com',
    `gstin`='$gstin',`party`='' WHERE `vendor_id_pk`='$edit_id' and `flag`='$flag' "; 
    }

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        //$last_id = mysqli_insert_id($db);
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
        $delete_query = "DELETE FROM mstr_vendor_contact_person WHERE vendor_id_fk='$edit_id'";
        $g = mysqli_query($db,$delete_query);
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
                VALUES ('$edit_id','$sat','$fname','$last_namecp','$workph','$phone','$emailcp')";
                $f = mysqli_query($db,$sql);
            $res = mysqli_query($db,$sql);
            if($res == 1)
            {
                $flag_ok = "1";
            }
            else
            {
                $flag_ok = "0";
            }

        }
        $flag_ok = "1";
    }
    else
    {
        $flag_ok = "0";
    }

echo $flag_ok;
?>