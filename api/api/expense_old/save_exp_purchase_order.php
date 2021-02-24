<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    //echo ('array is');
    //print_r($newRawItemArray1);
    
     $sql = "INSERT INTO `exp_purchase_order`(`branch`, `po_date`, `expense_head_id_fk`, `vendor_id_fk`, `authorised_by`,
    `total_qty`, `cal_amount`, `discount_per`,`discount_amt`,`amt_after_dis`,
    `tax_per`, `tax_amt`,`net_amt`,`po_no`,
    `add_date`, `add_time`,`added_by`) VALUES ('$branch',
    '$po_date','$expense_head_id_fk','$vendor_id_fk', '$authorised_by',
    '$total_qty',
    '$cal_amount', '$discount_per','$discount_amt','$amt_after_dis','$tax_per','$tax_amt','$net_amt','$po_no',
    '$cur_date','$cur_time','admin@gmail.com')";

$res = mysqli_query($db,$sql);
$last_id = mysqli_insert_id($db);

 if($res == 1)
{
    
   //print_r($newRawItemArray1);
    //echo "*********";
    $length1 = count($newRawItemArray1);
//echo "*********";
    for($j = 0;$j<$length1;$j++)
    {   
        //echo "jjj is:".$j;echo "\n";
        $item_id_fk = $newRawItemArray1[$j]['item'];
        $quantity =  $newRawItemArray1[$j]['quantity'];
        $rate =  $newRawItemArray1[$j]['rate'];
        $amount =  $newRawItemArray1[$j]['amount'];
        
        

        $sql = "INSERT INTO `exp_item_po`(`item_id_fk`,`quantity`,
        `rate`, `amount`, `po_id_fk`) VALUES ('$item_id_fk','$quantity','$rate'
        ,'$amount','$last_id')";

        $res1 = mysqli_query($db,$sql);
        if($res1 == 1)
        {

            $flag_ok = "1";
        }
        else
        {
            $flag_ok = "0";
        }

    }

        $sno=$po_no+1;
        $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='exp_purchase_order' ";
        $res = mysqli_query($db,$sql12);
    echo $flag_ok;
}
else{
    echo $flag_ok;
}
 
?>