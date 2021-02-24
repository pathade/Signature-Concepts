<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $date1 = date("d-m-Y", strtotime($date));

    $sql = "SELECT * FROM mstr_data_series WHERE name='customer_manual_credit_debit'";
    $k = mysqli_query($db,$sql);
    while($kj = mysqli_fetch_array($k))
    {
        $srno = $kj['sr_no'];
        $next_sr = $srno + 1;
    }

    $sql = "INSERT INTO `customer_manual_debit_credit`(`credit_debit_type`, 
    `cust_type`,`debit_credit_no`, `date`, `customer_id_fk`, `branch`, 
    `authorised_by`,`amount`, `total`, `tax_id_fk`, 
    `tax_amount`, `other`, `final_amount`,`reason`) VALUES ('$type','$customer_type','$srno',
    '$date1','$customer_name','$branch','$authorised_by','$amount','$total','$tax'
    ,'$tax_amt','$other','$net_amt','$reason')";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res == 1)
    {
        
        $sql = "UPDATE  mstr_data_series SET sr_no='$next_sr' WHERE name='customer_manual_credit_debit'";
        $k = mysqli_query($db,$sql);
        if($k==1)
        {
            if(strcasecmp($type, 'debit')==0)
            {
                $insert_ledger = "INSERT INTO wholesale_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time)
                VALUES('$customer_name', '$net_amt', 0, 'Debit', '$net_amt', '$cur_date', '$cur_time')";
                $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));
            }
            else if(strcasecmp($type, 'debit')==0)
            {
                $insert_ledger = "INSERT INTO wholesale_ledger_main(customer_id_fk, debit, credit, against, opening_balance, date, add_time)
                VALUES('$customer_name', 0, '$net_amt', 'Credit', '$net_amt', '$cur_date', '$cur_time')";
                $res = mysqli_query($db, $insert_ledger) or die(mysqli_error($db));
            }
            echo "1";
        }
    }
    else
    {
        echo "0";
    }


    /*$sql = "SELECT * FROM mstr_retail_customer";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if(mysqli_num_rows($res) > 0)
    {
        echo "<option value=''>--Select Retail Customer--</option>";
        while($rw = mysqli_fetch_array($res))
        {
            echo '<option value="'.$rw['retail_cust_idpk'].'">'.$rw['retail_cust_name'].'</option>';
        }
    }
    else
    {
        echo "<option value=''>Record Not Found</option>";
    }*/
    
    
?>