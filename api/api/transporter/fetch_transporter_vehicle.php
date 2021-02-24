<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);
  session_start();
    $flag=$_SESSION['flag'];
  
  if($flag == 0) {
  $sql = "SELECT * FROM mstr_transporter_vehicle WHERE t_id_fk='$edit_id' AND flag='0' ";
  }
  else {
   $sql = "SELECT * FROM mstr_transporter_vehicle WHERE t_id_fk='$edit_id' AND flag='1' ";   
  }
  $data = array();
  $result = mysqli_query($db, $sql);
  $start = 1;

  while ($row = mysqli_fetch_array($result))
  {
      $obj = array();
      //$obj['0'] = $row['0'];
      $obj['0'] = $row['0'];
      $obj['1'] = $row['0'];
      $obj['2'] = $row['0'];
      $obj['3'] = $row['1'];
      $obj['4'] = $row['2'];
      $obj['5'] = $row['3'];
      $obj['6'] = $row['4'];
      
      array_push($data, $obj);
  }
  $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);
?>