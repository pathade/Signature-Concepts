<?php

include('../../database/dbconnection.php');
$id=$_POST['id'];
//echo $id;die;
$type=$_POST['type'];
$against_ref=$_POST['against_ref'];
$branch=$_POST['branch'];
$date=$_POST['date'];
$to=$_POST['to1'];
$amount=$_POST['amount'];
$expenses_head=$_POST['expense_head_id_fk'];
$authorised_by=$_POST['authorised_by'];
$remark=$_POST['remark1'];

// echo $sql="UPDATE `expenses_data` SET 'type'=$type,'against_ref'=$against_ref,'branch'=$branch,'to'=$to,'amount'=$amount,'expenses_head'=$expenses_head,'authorised_by'=$authorised_by,'remark'=$remark";

$sql="UPDATE `daily_petty` SET type='$type',branch='$branch',`date`='$date',to1='$to',amount='$amount',
expenses_head='$expenses_head',authorised_by='$authorised_by',remark='$remark' WHERE id='$id'";
$res=mysqli_query($db,$sql);
if($res)
{
	echo"1";
}
else
{
	echo "0";
}
?>