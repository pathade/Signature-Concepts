<?php 

header('Content-Type: application/json'); 
$response = array();
session_start();
$flag = $_SESSION['flag'];
$sql = '';

if($_SERVER['REQUEST_METHOD']=='GET')
{
  extract($_GET);
  include '../../database/dbconnection.php';
  if ($flag == 0) {
    $sql = "SELECT account_no,bank_idpk FROM mstr_bank 
    where bank_idpk='$bank_name' and flag= '0' order by bank_name asc";
  }
  else {
    $sql = "SELECT account_no,bank_idpk FROM mstr_bank 
    where bank_idpk='$bank_name' and flag= '1' order by bank_name asc";
  }
  
  $result = mysqli_fetch_row(mysqli_query($db, $sql));
  if($result)
  {
      echo '<option value="'.$result[0].'">'.$result[0].'</option>';
  }
}
?>