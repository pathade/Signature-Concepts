<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    $sql = "SELECT * FROM mstr_tax WHERE tax_id_pk=$id";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    $rw = mysqli_fetch_array($res);
    
 
     $tax_percentagfe =  $rw['tax_percentagfe'];

    //   echo $total; 
         $tax_amount=$total* $tax_percentagfe /100;
   
        $final_amount=$total+$tax_amount;
    
   
    echo $tax_amount."#";
    
    echo $final_amount;
?>