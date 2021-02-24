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
    $a=array();
    
    if($flag == 0) {
    $sql = "SELECT * FROM mstr_customer_contact_persons WHERE cust_id_fk='$edit_id' and flag='0' ";
    }
    else {
        $sql = "SELECT * FROM mstr_customer_contact_persons WHERE cust_id_fk='$edit_id' and flag='1' ";
    }
    $res = mysqli_query($db,$sql);
    while($rw = mysqli_fetch_array($res))
    {
        array_push($a,$rw['cp_salution']);
        array_push($a,$rw['cp_first_name']);
        array_push($a,$rw['cp_last_name']);
        array_push($a,$rw['cp_work_phone']);
        array_push($a,$rw['cp_mobile_phone']);
        array_push($a,$rw['cp_email']);
    }

    print_r($a);


?>