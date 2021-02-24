<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    
    session_start();
    $flag= $_SESSION['flag'];
    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $insert_count = 0;
    $duplicate_count = 0;

    //convert json to array
    $product_array = json_decode($product_array, true);
    //print_r($newRawItemArray);

    $length = count($product_array);
    for($i = 0;$i<$length;$i++)
    {
        //echo "iddd:"+$array[$i]['id']; 
        $cust_name = $product_array[$i]['cust_name'];
        $Address =  $product_array[$i]['Address'];
        $Phoneno =  $product_array[$i]['Phoneno']; 
        $mob_no =  $product_array[$i]['mob_no'];
        $mail_id =  $product_array[$i]['mail_id'];
        $pan =  $product_array[$i]['pan'];
        $gno =  $product_array[$i]['gno'];
        $contact_person =  $product_array[$i]['contact_person'];
        
        //$f_product_code = $Sc_Code ."-". $Supplier_Design_Code .'-'. $Size;

        $ch_sql = "SELECT * FROM mstr_supplier 
        WHERE name='$cust_name' AND gst_no='$gno' AND flag='$flag'";

        $jres = mysqli_query($db,$ch_sql);
        if(mysqli_num_rows($jres) > 0)
        {
            $duplicate_count = $duplicate_count + 1;
        }
        else
        {
            $insert_count = $insert_count + 1;

            // $sql = "INSERT INTO `mstr_retail_customer`(`retail_cust_name`, `gst_no`) 
            // VALUES ('$cust_name','$gno')";

            $sql = "INSERT INTO  mstr_supplier (`name`,`gst_no`,`flag`) values('$cust_name'
            ,'$gno','$flag')";

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
    }
    if($duplicate_count == 0)
    {
        echo $flag_ok;
    }
    else if($duplicate_count != 0) 
    {
        echo "duplicate"."#".$duplicate_count."#".$insert_count;
    }
    else
    {
        echo "error";
    }
    
?>