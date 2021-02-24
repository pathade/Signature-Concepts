<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag=$_SESSION['flag'];
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
   
    //print_r($newRawItemArray);

    $acive_status="1";
    $sales_executive="1";
    $igst_app="1";

  $customer_id_fk=$_POST['customer_id'];

    $newRawItemArray = json_decode($rawItemArray, true);

  
        $length = count($newRawItemArray);
        for($i = 0;$i<$length;$i++)
        {
            //echo "iddd:"+$array[$i]['id']; 
            $item_id_fk = $newRawItemArray[$i]['item_id_fk'];
            $rate =  $newRawItemArray[$i]['rate'];
            if($flag == 0) {
           $sql = "INSERT INTO `mstr_customer_rate`( `cust_id_fk`, `item_id_fk`, `rate`,
           `add_date`, `add_time`, `added_by`,`flag`) 
           VALUES ('$customer_id_fk','$item_id_fk','$rate','$cur_date','$cur_time','admin@gmail.com','$flag')";
            }
            else {
                 $sql = "INSERT INTO `mstr_customer_rate`( `cust_id_fk`, `item_id_fk`, `rate`,
           `add_date`, `add_time`, `added_by`,`flag`) 
           VALUES ('$customer_id_fk','$item_id_fk','$rate','$cur_date','$cur_time','admin@gmail.com','$flag')";
            }
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
        echo "1";
 
?>