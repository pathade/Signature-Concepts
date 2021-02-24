<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';
  
    date_default_timezone_set('Asia/Kolkata');
    $cur_date = date('d/m/y ', time());
    $cur_time = date('H:i:s', time());
    session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql="UPDATE `mstr_transporter` SET `name`='$name',`address`='$address',`phone1`='$phone_no1',
    `phone2`='$phone_no2',`pan`='$pan',`type`='$transporter_type',`cp`='$cp',`tactive_status`='$status',`add_date`='$cur_date',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com'
    WHERE `t_id_pk`='$t_id' and `flag`='$flag' ";
    }
    else {
       $sql="UPDATE `mstr_transporter` SET `name`='$name',`address`='$address',`phone1`='$phone_no1',
    `phone2`='$phone_no2',`pan`='$pan',`type`='$transporter_type',`cp`='$cp',`tactive_status`='$status',`add_date`='$cur_date',
    `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com'
    WHERE `t_id_pk`='$t_id' and `flag`='$flag' "; 
    }
    $result = mysqli_query($db, $sql);

    if($result)
    {
          $t_id_fk = mysqli_insert_id($db);
     
          $rawItemArray = json_decode($rawItemArray, true);
          if(!empty($rawItemArray))
          {
            foreach($rawItemArray as $vObj) 
            {
              // var_dump($rawItemArray);
              // $grn_id_fk = $itemObj['grn_id_fk'];
              $vehicle_number = $vObj['vehicle_number'];
              $vehicle_name=$vObj['vehicle_name'];
              $Description = $vObj['Description'];
              $v_status = $vObj['v_status'];
                
              $delete_t_vehicle = "DELETE FROM mstr_transporter_vehicle WHERE t_id_fk='$t_id'";

              if(mysqli_query($db, $delete_t_vehicle))
              {            
                $sql = "INSERT INTO `mstr_transporter_vehicle`( `v_no`, `v_name`, `v_des`, `v_status` , `t_id_fk`) 
                VALUES ('$vehicle_number','$vehicle_name','$Description','$v_status','$t_id')";

                $resquery=mysqli_query($db, $sql);
                if($resquery) 
                    echo "1";
                else
                    echo "Error in Transport Vehicle";
              }
              else
                echo "Delete Transport Vehicle error";


            }
         
              
            //    $grn_no=substr($grn_no, 4);
            //    $sno=$grn_no+1;
            //    $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='grn' ";
            //    $res = mysqli_query($db,$sql12);

             //  echo "01";
            
          }
          else
           echo "02";
    }
    else
      echo "03";
}
?>