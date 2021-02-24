<?php
include('../../database/dbconnection.php');
//echo "hi";
session_start();
$type=$_POST['type'];
$against_ref=$_POST['against_ref'];
$branch=$_POST['branch'];
$date=$_POST['date'];
$to=$_POST['vendor_id_fk'];
$amount=$_POST['amount'];
$expenses_head=$_POST['expense_head_id_fk'];
$authorised_by=$_POST['authorised_by'];
$remark=$_POST['remark'];
$date1 = date("d-m-Y", strtotime($date));
$cur_time = date('H:i:s A');
$flag = $_SESSION['flag'];
$sql= '';

if ($flag == 0) {
$kl = "SELECT * FROM mstr_data_series WHERE name='daily_petty_no' and flag='0' ";
}
else {
  $kl = "SELECT * FROM mstr_data_series WHERE name='daily_petty_no' and flag='1' ";  
}
$hj = mysqli_query($db,$kl);
while($rw = mysqli_fetch_array($hj))
{
	$sr = $rw['sr_no'];
	$new_sr1 = $sr + 1;
	$update_sr = $sr+2;
}

$first = date("y",strtotime("-1 year"));
$second = date("y");

$fy = $first."-".$second."/";
//$fin_yr = date("y",strtotime("-1 year"))."-".date("y")."/";
$new_sr = $fy.$sr;
if ($flag == 0) {
	$sql="INSERT INTO `daily_petty`(`type`,  `branch`, `date`, `to1`, `amount`,
	`expenses_head`, `authorised_by`, `remark`,`dp_no`,`added_date`,`added_time`,`flag`) 
	Values('$type','$branch','$date1','$to','$amount','$expenses_head',
	'$authorised_by','$remark','$new_sr','$date1','$cur_time','$flag')";	
}
else {
   $sql="INSERT INTO `daily_petty`(`type`,  `branch`, `date`, `to1`, `amount`,
	`expenses_head`, `authorised_by`, `remark`,`dp_no`,`added_date`,`added_time`,`flag`) 
	Values('$type','$branch','$date1','$to','$amount','$expenses_head',
	'$authorised_by','$remark','$new_sr','$date1','$cur_time','$flag')"; 
}

$res=mysqli_query($db,$sql) or die(mysqli_error($db));


if($res)
{
	echo "1";
	if($flag == 0) {
	$h = "UPDATE mstr_data_series SET sr_no='$new_sr1' WHERE name='daily_petty_no' and flag='0' ";
	}
	else {
		$h = "UPDATE mstr_data_series SET sr_no='$new_sr1' WHERE name='daily_petty_no' and flag='1' ";
	}
	$nj = mysqli_query($db,$h);


}
else
{
	echo "0";
}
