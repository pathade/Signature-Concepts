<?php
   include('./dbconnection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select emp_username from mstr_employee where emp_username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['emp_username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: ../src/item/index1.php");
      die();
   }
?>