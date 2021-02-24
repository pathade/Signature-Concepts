<?php
    include('../../database/dbconnection.php');
    session_start();
    error_reporting (0);
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // username and password sent from form 
        $flag_check=0;
        $signatureusername = mysqli_real_escape_string($db,$_POST['signature_username']);
        $signaturepassword = mysqli_real_escape_string($db,$_POST['signature_pass']);
     
            //console.log($shreeusername + $shreepassword);
        $sql = "SELECT * FROM admin WHERE username = '$signatureusername' and userpassword = '$signaturepassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
            if($count > 0) 
            {
                if ($signaturepassword ==  'admin123')
                {
                    //echo 'shree login';
                    $flag_check = 1;
                    $_SESSION['flag'] = $flag_check;
                    $_SESSION['login_user'] = $signatureusername;

                $emp_sql="SELECT * FROM `mstr_admin_authorisation` ";
                $result_query = mysqli_query($db,$emp_sql);
                while( $row1=mysqli_fetch_assoc($result_query))
                            {
                             $seestion= $row1['name'];

                            $_SESSION[$seestion] =$seestion;
                            //  echo  $_SESSION[$seestion];
// echo $_SESSION['abcd']=$seestion;

                            }
                }
                else if ( $signaturepassword == 'admin@123') {
                   // echo 'signature login';
                    $flag_check = 0;
                    $_SESSION['flag'] = $flag_check;
                    $_SESSION['login_user'] = $signatureusername;
                    $emp_sql="SELECT * FROM `mstr_admin_authorisation` ";
                    $result_query = mysqli_query($db,$emp_sql);
                    while( $row1=mysqli_fetch_assoc($result_query))
                                {
                                 $seestion= $row1['name'];
    
                                $_SESSION[$seestion] =$seestion;
                                //  echo  $_SESSION[$seestion];
    // echo $_SESSION['abcd']=$seestion;
    
                                }
                }
                
                echo "1";
            }
            else 
            {
                //echo "0";
                $sql = "SELECT * FROM mstr_employee WHERE emp_username = '$signatureusername' and emp_passwd = '$signaturepassword'";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if($count == 1) 
                {
                    //session_register("shreeusername");
                    $_SESSION['login_user'] = $signatureusername;
                    $flag_check = 0;
                    $_SESSION['flag'] = $flag_check;
                   

                    //session_register("shreeusername");
                   // $_SESSION['login_user'] = $signatureusername;

                    $id= $row['emp_id_pk'];

                $emp_sql="SELECT * FROM `mstr_authorisation` where employee_id_fk='$id'";
                    $result_query = mysqli_query($db,$emp_sql);
                    while( $row1=mysqli_fetch_assoc($result_query))
                                {
                                    $seestion= $row1['name'];

                                    $_SESSION[$seestion] =$seestion;
                                //  echo  $_SESSION[$seestion];
                            // echo $_SESSION['abcd']=$seestion;

                                }

                                echo "1";
                    // header("location: ./index.php");
                }
                else 
                {
                    echo "0";
                }
            }
            
        
    }
?>