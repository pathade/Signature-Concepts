<?php include('../../database/dbconnection.php');


$id=$_GET['id'];
session_start();
$flag = $_SESSION['flag'];
$sql= '';

if($flag == 0) {
 $sql = "UPDATE daily_petty SET delete_status='1' WHERE id='$id' and flag='0' ";
}
else {
	$sql = "UPDATE daily_petty SET delete_status='1' WHERE id='$id' and flag='1' ";
}

//$sql="Delete From `exp_daily_petty` WHERE id='$id'";
$res=mysqli_query($db,$sql);
if($res)
{
	?>
	<script type="text/javascript">
	 alert("Petty Expenses Deleted");
	 window.location.href ="../../src/expense/view_daily_petty_expense.php";
	</script>
<?php
	
}
else
{
	echo "0";
}


?>