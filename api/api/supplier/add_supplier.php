<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $flag=$_SESSION['flag'];

    if(isset($igst))
        $igst_app = 1;
    else
        $igst_app = 0;
      

        $supplier_name = trim($supplier_name);

        if($flag==0){
     $sql ="INSERT INTO `mstr_supplier`(`name`, `address`, `phone_1`, `phone_2`, 
    `mobile_no`, `contact_person`, `email`, `pan`, `gst_no`, `status`, `add_date`, `add_time`, 
    `added_by`,`igst_app`,`flag`) VALUES ('$supplier_name','$supplier_address',
    '$phone_no_1','$phone_no_2','$mobile_no','$contact_person','$email','$pan','$gst_no','$status','$cur_date',
    '$cur_time','admin@gmail.com','$igst_app','$flag')";
        }
        else {
            $sql ="INSERT INTO `mstr_supplier`(`name`, `address`, `phone_1`, `phone_2`, 
    `mobile_no`, `contact_person`, `email`, `pan`, `gst_no`, `status`, `add_date`, `add_time`, 
    `added_by`,`igst_app`,`flag`) VALUES ('$supplier_name','$supplier_address',
    '$phone_no_1','$phone_no_2','$mobile_no','$contact_person','$email','$pan','$gst_no','$status','$cur_date',
    '$cur_time','admin@gmail.com','$igst_app','$flag')";
        }

    $res = mysqli_query($db,$sql);

    if($res == 1)
    {
        
        echo "1";
    }
    else{
        echo "0";
    }
?>