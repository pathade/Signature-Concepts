<?php 
include('../../database/dbconnection.php');
extract($_POST);
$id=$_POST['id'];
$branch=$_POST['branch'];
$exp_head=$_POST['expense_head_id_fk'];
$vendor=$_POST['vendor'];
$amount=$_POST['amount'];
$service_tax1=$_POST['service_tax1'];
$service_tax2=$_POST['service_tax2'];
$other_add=$_POST['other_add'];
$other_deduction=$_POST['other_deduction'];
$tds_amt=$_POST['tds_amt'];
$tds=$_POST['tds'];
$net_amt=$_POST['net_amt'];
$recurrance=$_POST['recurrance'];
$from_period=$_POST['from_period'];
$to_period=$_POST['to_period'];
$chq_date=$_POST['chq_date'];
$remark=$_POST['remark'];
$auth_by_level1=$_POST['auth_by_level1'];
$auth_by_level2=$_POST['auth_by_level2'];

echo $sql="UPDATE `exp_fixed_payment` SET branch='$branch',exp_head='$expense_head_id_fk',vendor='$vendor',amount='$amount',service_tax1='$service_tax1',service_tax2='$service_tax2',other_add='$other_add',other_deduction='$other_deduction',tds='$tds',tds_amt='$tds_amt',net_amt='$net_amt',recurrance='$recurrance',from_period='$from_period',to_period='$to_period',chq_date='$chq_date',remark='$remark',auth_by_level1='$auth_by_level1',auth_by_level2='$auth_by_level2' WHERE id='$id'";
$res=mysqli_query($db,$sql);
if($res)
{
	echo'1';
}
else
{
	echo '0';
}


?>