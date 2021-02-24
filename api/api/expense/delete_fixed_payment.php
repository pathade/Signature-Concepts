<?php
include('../../database/dbconnection.php');

$id=$_GET['id'];
//echo $id;
session_start();
$flag = $_SESSION['flag'];
$sql= '';

if($flag == 0) {
$sql="DELETE FROM `exp_fixed_payment` WHERE id='$id' and flag='0' ";
}
else {
	$sql="DELETE FROM `exp_fixed_payment` WHERE id='$id' and flag='1' ";
}
$res=mysqli_query($db,$sql);

if($res)
{
	?>
	<script type="text/javascript">
		alert('Data Deleted Successfully');
		window.location.href = '../../src/expenses1/view_fixed_payment.php';
	</script>
<?php
}
else
{
	echo '0';
}
?>