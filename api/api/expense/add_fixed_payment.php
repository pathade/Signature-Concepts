<?php 
include('../../database/dbconnection.php');

extract($_POST);
session_start();
$branch=$_POST['branch'];
$exp_head=$_POST['expense_head_id_fk'];
$vendor=$_POST['vendor_id_fk'];
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
$flag = $_SESSION['flag'];
$sql='';

if($flag == 0) {
$sql="INSERT INTO `exp_fixed_payment`(`branch`,`exp_head`,`vendor`,`amount`,`service_tax1`,`service_tax2`,`other_add`,`other_deduction`,`tds`,`tds_amt`,`net_amt`,`recurrance`,`from_period`,`to_period`,`chq_date`,`remark`,`auth_by_level1`,`auth_by_level2`,`flag`)
  VALUES('$branch','$exp_head','$vendor_id_fk','$amount','$service_tax1','$service_tax2','$other_add','$other_deduction','$tds','$tds_amt','$net_amt','$recurrance','$from_period','$to_period','$chq_date','$remark','$auth_by_level1','$auth_by_level2','$flag')";
}
$res=mysqli_query($db,$sql);
if($res)
{
	echo '1';
}
else
{
	echo "0";
}

