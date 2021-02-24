<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    // $sql = "SELECT * FROM mstr_data_series WHERE name='customer_manual_credit_debit'";
    // $k = mysqli_query($db,$sql);
    // while($kj = mysqli_fetch_array($k))
    // {
    //     $srno = $kj['sr_no'];
    //     $next_sr = $srno + 1;
    // }

    $amount = trim($amount);

     $sql = "UPDATE `customer_manual_debit_credit` SET 
    `credit_debit_type`='$type',`cust_type`='$customer_type',
    `date`='$date',`customer_id_fk`='$customer_name',
    `branch`='$branch',`authorised_by`='$authorised_by',`amount`='$amount',
    `total`='$total',`tax_id_fk`='$tax',`tax_amount`='$tax_amt',
    `other`='$other',`final_amount`='$net_amt',`reason`='$reason' WHERE `id`='$edit_id'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res == 1)
    {   
            echo "1";
    }
    else
    {
        echo "0";
    }
    
?>