<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='GET')
{
  extract($_GET);
  include '../../database/dbconnection.php';
  $sql = "SELECT id, name FROM mstr_state where d=1 and country_id=$country_id order by name asc";
  $result = mysqli_query($db, $sql);
  if($result)
  {
    while ($row = mysqli_fetch_array($result))
    {
      $obj = array();
      $obj['id'] = $row['id']; 
      $obj['text'] = $row['name'];
      array_push($response, $obj);
    }
  }
}
echo json_encode($response);
?>