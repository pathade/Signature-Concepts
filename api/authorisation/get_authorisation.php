<?php
header('Content-Type: application/json');
$arr = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	extract($_POST);
    include('../../database/dbconnection.php');
	$emp_id=$_POST['emp_id'];
	$sql = "SELECT  * FROM mstr_authorisation
WHERE employee_id_fk=$emp_id";
	$result = mysqli_query($db, $sql);
	if($result)
	{
		while ($row = mysqli_fetch_array($result))
		{
			$obj = array();
			
			$obj['name'] = $row['name'];
			array_push($arr, $obj);
		}
	}
}
echo json_encode($arr);
?>