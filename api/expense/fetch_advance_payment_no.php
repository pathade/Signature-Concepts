<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';
    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    
   if($flag == 0) {
         $sql = "SELECT * FROM exp_advance_payment WHERE type='$pay_type' and flag='0' ";
   }
   else {
        $sql = "SELECT * FROM exp_advance_payment WHERE type='$pay_type' and flag='1' ";
   }
        $res = mysqli_query($db,$sql) or die(mysqli_error($db));
        if(mysqli_num_rows($res) > 0)
        {
            echo "<option value=''>--Select Advance Number--</option>";
            while($rw = mysqli_fetch_array($res))
            {
                echo '<option value="'.$rw['id_pk'].'">'.$rw['ap_no'].'</option>';
            }
        }
        else
        {
            echo "<option value=''>Record Not Found</option>";
        }
    
    
?>