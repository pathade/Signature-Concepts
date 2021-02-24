<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    session_start();
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    $flag=$_SESSION['flag'];
    if($flag==0){
    $sql = "INSERT INTO `mstr_transporter`(`name`, `address`, `phone1`, `phone2`, `pan`,`type`, `cp`,
     `tactive_status`, `add_date`, `add_time`, `added_by`,`flag`) VALUES 
     ('$name','$address','$phone_no1','$phone_no2','$pan','$transporter_type','$cp','$status',
     '$cur_date','$cur_time','admin@gmail.com','$flag')";
     }
     else {
        $sql = "INSERT INTO `mstr_transporter`(`name`, `address`, `phone1`, `phone2`, `pan`,`type`, `cp`,
     `tactive_status`, `add_date`, `add_time`, `added_by`,`flag`) VALUES 
     ('$name','$address','$phone_no1','$phone_no2','$pan','$transporter_type','$cp','$status',
     '$cur_date','$cur_time','admin@gmail.com','$flag')"; 
     }
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res)
    {
        //echo "1";
        $last_id = mysqli_insert_id($db);
        $contact_person_array = $_POST['contact_person_array'];

        
        $contact_person_array = json_decode($contact_person_array, true);
        $length = count($contact_person_array);
        for($i = 0;$i<$length;$i++)
        {
            $vehicle_number = $contact_person_array[$i]['vehicle_number'];
            $vehicle_name =  $contact_person_array[$i]['vehicle_name'];
            $Description =  $contact_person_array[$i]['Description'];
            $v_status =  $contact_person_array[$i]['v_status'];
            

            $sql1 = "INSERT INTO `mstr_transporter_vehicle`(`v_no`, `v_name`, `v_des`, `v_status`,`t_id_fk`) 
            VALUES ('$vehicle_number','$vehicle_name','$Description','$v_status','$last_id')";


            $res1 = mysqli_query($db,$sql1);
            if($res1 == 1)
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        //echo "1";
       // echo "1";
    }
    else
    {
       echo "0";
       //$flag_ok = "0";
    }

// echo $flag_ok;
?>