<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');

   
        echo $sql = "SELECT * FROM mstr_bank WHERE bank_idpk='$bank_name'";
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        if(mysqli_num_rows($res) > 0)
        {
            echo "<option value=''>--Select Bank Account--</option>";
            while($rw = mysqli_fetch_array($res))
            {
                echo '<option value="'.$rw['account_no'].'">'.$rw['account_no'].'</option>';
            }
        }
        else
        {
            echo "<option value=''>Record Not Found</option>";
        }
    
    
?>