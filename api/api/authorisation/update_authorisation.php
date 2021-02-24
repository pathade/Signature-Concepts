<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    
    $emp_id=$_POST['emp_id'];

    $sql_delete="DELETE FROM `mstr_authorisation` WHERE employee_id_fk='$emp_id'";
    $result_delete = mysqli_query($db, $sql_delete);
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    if(!empty($newRawItemArray1))
    {
      foreach($newRawItemArray1 as $itemObj1) 
      {
   

              
                  $name = $itemObj1['name'];
                
                  
                
               
                        
                        echo $query1 = "INSERT INTO `mstr_authorisation`( `employee_id_fk`, `name`, `uid`,`udate`,`utime`,`d`) 
                         VALUES ('$emp_id','$name','1','$cur_date','$cur_time','1')";
                           $result1 = mysqli_query($db,$query1);
                          
                           
     
        
    }}


   

?>