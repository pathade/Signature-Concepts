<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  session_start();
  $flag = $_SESSION['flag'];
  $sql= '';
  if($flag == 0) {
    $sql = "SELECT account_no,bank_idpk FROM mstr_bank where bank_idpk='$bank_name' and flag='0' order by bank_name asc";
  }
  else {
    $sql = "SELECT account_no,bank_idpk FROM mstr_bank where bank_idpk='$bank_name' and flag='1' order by bank_name asc";
  }
  $result = mysqli_query($db, $sql);
  if($result)
  {
    echo '<option>--Select Account Number--</option>';
    while ($row = mysqli_fetch_array($result))
    {
      echo '<option value="'.$row['account_no'].'">'.$row['account_no'].'</option>';
    }
  }
}
//echo json_encode($response);
?>