<?php
    session_start();
    include '../../database/dbconnection.php';
 extract($_POST);
 $supplier = $_POST['supplier'];

 $res = array();

     $sql_item = "SELECT DISTINCT grn_id_pk,grn_no FROM grn where supplier='$supplier' AND pi_added!='1' AND status='1' AND del_status!='1' ";
    $res_item = mysqli_query($db,$sql_item);

    $num_rows=mysqli_num_rows($res_item);

    if($num_rows)
    {
    while ($row = mysqli_fetch_assoc($res_item)) {

        echo '<input type="checkbox" value="'.$row['grn_id_pk'].'" id="grn_check" name="grn" /> '.$row['grn_no'].'</br>';
        
    }
    }
    else
        echo '<p class="text-danger">No GRN Available</p>';


?>
