<?php
    include('../../database/dbconnection.php');
   session_start();
   error_reporting (0);
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
        $shreeusername = mysqli_real_escape_string($db,$_POST['shree_username']);
        $shreepassword = mysqli_real_escape_string($db,$_POST['shree_pass']); 

        $sql = "SELECT * FROM admin WHERE username = '$shreeusername' and userpassword = '$shreepassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
            if($count > 0) 
            {
                $_SESSION['login_user'] = $shreeusername;
                echo "1";
            // header("location: ./index.php");
            }
            else 
            {
                
                $sql1 = "SELECT * FROM mstr_employee WHERE emp_username = '$shreeusername' and emp_passwd = '$shreepassword'";
                $result1 = mysqli_query($db,$sql1);
                $count1 = mysqli_num_rows($result1);
                if($count1 == 1) 
                {
                    //session_register("shreeusername");
                    $_SESSION['login_user'] = $shreeusername;
                    echo "1";
                    //header("location: ./index.php");
                }
                else 
                {
                    echo "0";
                }
            } 
    }
?>