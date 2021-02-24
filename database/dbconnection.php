<?php
	// $db=mysqli_connect("192.168.0.101","stn","root","nks2");
	// $db = mysqli_connect("localhost","root","","nks2");
	$db=mysqli_connect("localhost","NKS","gSIUWxcV%o;L","NKS_Perfume");
	if(!$db)
	{
	?>
		<script language="javascript">
		alert("Error: Unable to Connect Database"); 
		</script>
	<?php 	
	} 
?>