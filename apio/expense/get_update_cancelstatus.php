<?php 
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
        include '../../database/dbconnection.php';
        session_start();
        $flag = $_SESSION['flag'];
        $sql= '';

          if($flag == 0) {
         $sql = "SELECT pa.cancel_status 
         from exp_pay_advice pa, exp_payment_advice_cancellation pac 
         WHERE pa.pa_id_pk = pac.pay_advice_id_fk and pac.epa_id_pk = '$edit_id' and pa.flag='0' and pac='0' ";
          }
          else {
            $sql = "SELECT pa.cancel_status 
         from exp_pay_advice pa, exp_payment_advice_cancellation pac 
         WHERE pa.pa_id_pk = pac.pay_advice_id_fk and pac.epa_id_pk = '$edit_id' and pa.flag='1' and pac='1' ";
          }

        //$data = array();
        $result = mysqli_query($db, $sql);
       $row = mysqli_fetch_array($result);
      if($result != "")
      {
        if($flag == 0) {
        $sql1 = "UPDATE `exp_pay_advice` 
        SET`cancel_status`= 0,
        `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `pa_id_pk`='$pay_advice_id_fk' and `flag`='0' ";
        }
        else {
          $sql1 = "UPDATE `exp_pay_advice` 
        SET`cancel_status`= 0,
        `update_date`='$cur_date',`update_time`='$cur_time',`updated_by`='admin@gmail.com' WHERE `pa_id_pk`='$pay_advice_id_fk' and `flag`='1' ";
        }
           $res1 = mysqli_query($db,$sql1);
            echo "1";
      }
     
        
        
        // $response['data'] = $data;
     
    }
    else 
    {
      echo "0";
    }
    // else
    //     $response['error'] = "Data Not Found...!!!";  
    // echo json_encode($response); 
?>   