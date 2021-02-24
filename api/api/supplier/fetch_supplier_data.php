<?php include '../../database/dbconnection.php'; ?>

<?php
    extract($_POST);
    session_start();
    $flag=$_SESSION['flag'];
    
    // if($flag== 0) {
    $select = "SELECT phone_1, address FROM mstr_supplier WHERE supplier_id_fk=$supplier and flag='0' ";
    // }
    // else {
    //     $select = "SELECT phone_1, address FROM mstr_supplier WHERE supplier_id_fk=$supplier and flag='1' ";
    // }
    $resselect = mysqli_query($db, $select); 

    $data = array();

    if($resselect)
    {
        $row = mysqli_fetch_array($resselect);
        // $data[0] = $row[0];
        // $data[1] = $row[1];

        print json_encode(array("phone"=>$row[0],"address"=>$row[1]));
    }
    else
        echo "02";


?>