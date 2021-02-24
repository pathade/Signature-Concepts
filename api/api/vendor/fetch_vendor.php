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
  
  while($rw = mysqli_fetch_array($result))
  {
    
    //data.push({'1':'1'});
    array_push($data, ['cp_salution' => $rw['cp_salution'],'cp_first_name'=>$rw['cp_first_name']]);
  }
  $response['data'] = $data;
  echo json_encode($response);
  echo $data;
}
else
{

}
 
?>