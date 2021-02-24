<?php
 include('../../database/dbconnection.php');
 session_start();
 extract($_POST);

    $signatureusername = $_SESSION['login_user'];
   // $user_id = $_POST['user_id'];
   $sql = "SELECT * FROM admin WHERE username = '$signatureusername' and employee_mobile_no = '$mobile_no'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);
   if($count > 0) 
   {

    $result = mysqli_query($db,"SELECT * FROM mstr_employee where user_id='" . $_POST['user_id'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['user_id'];
	$email_id=$row['email_id'];
	$password=$row['password'];
	if($user_id==$fetch_user_id) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: password@studentstutorial.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
                }
    }

?>