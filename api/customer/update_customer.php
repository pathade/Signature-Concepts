<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    

    

    echo $sql = "UPDATE `mstr_customer` SET `saturation`='$Salutation',`first_name`='$first_name',
    `last_name`='$last_name',`company_name`='$company_name',`cust_display_name`='$Company_display_name',
    `cust_email`='$Customer_email',
    `cust_phone`='$Customer_work_phone',`cust_mobile`='$Customer_mobile',`website`='$Customer_website',`currency`='$comboCustomerOrderingCurrency',`opening_balance`='$Customer_opening_balance',
    `payment_terms`='$payment_terms',`bill_address_line1`='$txtCustomerBillingAddressLine1',`bill_address_line2`='$txtCustomerBillingAddressLine2',
    `bill_address_line3`='$txtCustomerBillingAddressLine3',`bill_country`='$comboBillingCountry',`bill_city`='$txtCustomerBillingCity',`bill_state`='$comboBillingState',
    `bill_pin`='$txtCustomerBillingPin',`ship_address_line1`='$txtCustomerShippingAddressLine1',`ship_address_line2`='$txtCustomerShippingAddressLine2',
    `ship_address_line3`='$txtCustomerShippingAddressLine3',`ship_country`='$comboShippingCountry',`ship_city`='$txtCustomerShippingCity',`ship_state`='$comboShippingState',
    `ship_pin`='$txtCustomerShippingPin',`remarks`='$ember2513',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com',
    `gstin`='$gstin' WHERE `cust_id_pk`='$edit_id'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        
        echo "1";

    }
    else
    {
        echo "0";
    }


?>