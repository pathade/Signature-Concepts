<?php
	// $db=mysqli_connect("192.168.0.101","stn","root","nks2");
	// $db = mysqli_connect("localhost","root","","nks2");
	//$db=mysqli_connect("localhost","NKS","gSIUWxcV%o;L","NKS_Perfume");

// 	$myServer = "10.85.80.229";
// $myUser = "root";
// $myPass = "pass";
// $myDB = "testdb";

// $dbhandle = mssql_connect($myServer, $myUser, $myPass)
//   or die("Couldn't connect to SQL Server on $myServer"); 

$db=mysqli_connect("103.195.83.104
","root","","signature_concepts");
	if(!$db)
	{
	?>
		<script language="javascript">
		alert("Error: Unable to Connect Database"); 
		</script>
	<?php 	
	} 
?>