<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

    //convert json to array
   
    //print_r($newRawItemArray);

    $status="1";

    
    $sql = "INSERT INTO `mstr_term_condition`(`branch`, `applicable_for`, `details`, `status`, 
    `add_date`, `add_time`,`added_by`) VALUES ('$branch',
    '$applicable_for','$details','$status', '$cur_date','$cur_time','admin@gmail.com')";
     $res = mysqli_query($db,$sql) or die(mysqli_error($db));
      if($res)
      {
          echo "1";
      }
      else
      {
          echo "0";
      }
 
?>