<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);
  
  $sql = "SELECT * FROM mstr_vendor_contact_person WHERE vendor_id_fk='$edit_id'";
  $data = array();
  $result = mysqli_query($db, $sql);
  $start = 1;

  while ($row = mysqli_fetch_array($result))
  {
      $obj = array();
      //$obj['0'] = $row['0'];
      $obj['0'] = $row['0'];
      $obj['1'] = $row['0'];
      $obj['2'] = $row['1'];
      $obj['3'] = $row['2'];
      $obj['4'] = $row['3'];
      $obj['5'] = $row['4'];
      $obj['6'] = $row['7'];
      $obj['7'] = $row['5'];
      $obj['8'] = $row['6'];
      //$obj['9'] = $row['8'];
    //   $obj['10'] = $row['8'];
    //   $obj['11'] = $row['9'];
    //   $obj['12'] = $row['10'];
    //   $obj['13'] = $row['11'];
    //   $obj['14'] = $row['12'];
    //   $obj['15'] = $row['13'];
      
      array_push($data, $obj);
  }
  $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);
?>