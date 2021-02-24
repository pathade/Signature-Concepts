<?php include '../../database/dbconnection.php'; ?>

<?php
    extract($_POST);
     session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) 
    {
        $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='$name' and flag='0' ";
    }
    else 
    {
        $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='$name' and flag='1' ";
    }
    $res_customer = mysqli_fetch_array(mysqli_query($db, $get_customer));

     if($flag == 0) 
     {
        $select = "SELECT retail_cust_mobile, retail_cust_address, gst_no FROM mstr_retail_customer WHERE retail_cust_name='".$res_customer['0']."' and flag='0' ";
     }
     else 
     {
         $select = "SELECT retail_cust_mobile, retail_cust_address, gst_no FROM mstr_retail_customer WHERE retail_cust_name='".$res_customer['0']."' and flag='1' ";
     }
     
    $resselect = mysqli_query($db, $select); 

    $data = array();

    if($resselect)
    {
        $row = mysqli_fetch_array($resselect);
        // $data[0] = $row[0];
        // $data[1] = $row[1];

        print json_encode(array("phone"=>$row[0],"address"=>$row[1],"gst_no"=>$row[2]));
    }
    else
        echo "02";


?>