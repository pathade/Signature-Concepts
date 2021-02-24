<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  session_start();
    $flag=$_SESSION['flag'];
    
    if($flag == 0) {
    $sql = "SELECT tv.*
    from mstr_transporter t, mstr_transporter_vehicle tv
    WHERE t.t_id_pk='$tv_id' and t.t_id_pk=tv.t_id_fk and t.flag='0' ";
    }
    else {
        $sql = "SELECT tv.*
    from mstr_transporter t, mstr_transporter_vehicle tv
    WHERE t.t_id_pk='$tv_id' and t.t_id_pk=tv.t_id_fk and t.flag='1' ";
    }

  $data = array();
  $result = mysqli_query($db, $sql);
  $count=1;
  $start = 1;
  

  while ($row = mysqli_fetch_array($result))
  { 
      $obj = array();
      $obj['0'] = $start++;
     
      $obj['2'] = $row['tv_id_pk'];
     // $obj['2'] = $row['tv_id_pk'];
      $v_no = $row['v_no'];
      $v_name = $row['v_name'];
      $v_des = $row['v_des'];
      $v_status = $row['v_status'];
      $obj['3'] = '<input type="text" min="0" style="width:auto" name="vehicle_number" id="vehicle_number" value="'.$v_no.'" />';
      $obj['4'] = '<input type="text" min="0" style="width:auto" name="vehicle_name" id="vehicle_name" value="'.$v_name.'" />';
      $obj['5'] = '<input type="text" min="0" style="width:auto" name="Description" id="Description" value="'.$v_des.'" />';
      $obj['6'] = '<input type="text" min="0" style="width:auto" name="v_status" id="v_status" value="'.$v_status.'" />';
      
      
      array_push($data, $obj);
      $count++;
  }
  $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);
?>