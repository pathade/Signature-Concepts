<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
  session_start();
$flag = $_SESSION['flag'];
$sql = '';

if ($flag == 0) {
  $sql = "SELECT * 
          FROM `mstr_cheque` as c,
                mstr_bank as b 
          where c.bank_id_fk = b.bank_idpk AND 
                c.bank_id_fk = '$bank_id' AND 
                b.account_no='$acc_no' AND 
                c.current_cheque_no<='1000' AND
                c.status='InComplete' and c.flag = '0' and b.flag='0' 
                ";
}
else {
    $sql = "SELECT * 
          FROM `mstr_cheque` as c,
                mstr_bank as b 
          where c.bank_id_fk = b.bank_idpk AND 
                c.bank_id_fk = '$bank_id' AND 
                b.account_no='$acc_no' AND 
                c.current_cheque_no<='1000' AND
                c.status='InComplete' and c.flag = '1' and b.flag='1' 
                ";
}
  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
  if($result)
  {
    while ($row = mysqli_fetch_array($result))
    {
        echo $row['current_cheque_no'];
    }
  }
}
//echo json_encode($response);
?>