<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    session_start();

   // $emp_status="1";
    $signatureusername = $_SESSION['login_user'];

     $sql = "SELECT * FROM admin WHERE username = '$signatureusername' and userpassword = '$old_pass'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count > 0) 
    {

         $sql1 = "UPDATE `admin` 
        SET `userpassword`= '$userpassword' WHERE `username`='$signatureusername'";

        $res1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
        if($res1)
        {
            echo "1";
        }
    }
    else
    {
        $sql2 = "SELECT * FROM mstr_employee WHERE emp_username = '$signatureusername' and emp_passwd = '$old_pass' ";
    $result2 = mysqli_query($db,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $count2 = mysqli_num_rows($result2);
    if($count2 > 0) 
    {

       $sql3 = "UPDATE `mstr_employee` 
        SET `emp_passwd`= '$userpassword' WHERE `emp_username`='$signatureusername'";
        $res3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
        if($res3)
        {
            echo "1";
        }
        else {
            echo "0";
        }
    }
       
    }
?>