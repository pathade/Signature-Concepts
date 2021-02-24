<?php 
    include('../../database/dbconnection.php');
    //echo "inside save_item.php";

    extract($_POST);

    session_start();
    $flag = $_SESSION['flag'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
	$cur_time = date('H:i:s A');

    //$sql = "SELECT * FROM mstr_item WHERE item_id_pk = '$id'";
    if($flag == 0) {
    $sql = "SELECT * FROM mstr_item as i,mstr_customer as c WHERE c.cust_id_pk = i.cust_id_fk AND i.delete_status='0' 
    AND item_id_pk = '$id' and i.flag='0' and c.flag='0' order by item_id_pk DESC";
    }
    else {
        $sql = "SELECT * FROM mstr_item as i,mstr_customer as c WHERE c.cust_id_pk = i.cust_id_fk AND i.delete_status='0' 
    AND item_id_pk = '$id' and i.flag='1' and c.flag='1' order by item_id_pk DESC";
    }
    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    while($rw = mysqli_fetch_array($res))
    {
        $nks_code =  $rw['nks_code'];
        $item_type =  $rw['company_name'];
        $uom =  $rw['uom'];
        $gst_group =  $rw['gst_group'];
        $sale_rate =  $rw['sale_rate'];
        $purchase_rate =  $rw['purchase_rate'];
        $add_date =  $rw['add_date'];
        $add_time =  $rw['add_time'];
        $added_by =  $rw['added_by'];
        $item_id_pk =  $rw['item_id_pk'];
        $item_name =  $rw['item_name'];
        
    }
    $sale_rate1 = "<p>&#8377;<p> "+$sale_rate ;
    echo $item_name."#".$item_type."#".$uom."#".$gst_group."#".$sale_rate1."#".$purchase_rate."#".$add_date."#".$add_time."#".$added_by."#".$item_id_pk;
?>