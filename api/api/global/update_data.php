<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    $newRawItemArray1 = json_decode($newRawItemArray, true);
    $length1 = count($newRawItemArray1);
    for($j = 0;$j<$length1;$j++)
    {   
        $name = $newRawItemArray1[$j]['name'];
        $gst = $newRawItemArray1[$j]['gst'];
        $hiddenid =  $newRawItemArray1[$j]['hiddenid'];

        if($master_value == "Wholesale Customer")
        {   
            if($flag== 0) {
            $sql = "UPDATE `tbl_wholesale_customer` 
            SET `cust_name`='$name',`gst_no`='$gst'
            WHERE `wc_id_pk`='$hiddenid' and flag='0' ";
            }
            else {
                $sql = "UPDATE `tbl_wholesale_customer` 
            SET `cust_name`='$name',`gst_no`='$gst'
            WHERE `wc_id_pk`='$hiddenid' and flag='1' ";
            }
        }
        else if($master_value == "Supplier")
        {
            if($flag== 0) {
            $sql = "UPDATE `mstr_supplier` 
            SET `name`='$name',`gst_no`='$gst'
            WHERE `supplier_id_fk`='$hiddenid' and flag='0' ";
            }
            else {
             $sql = "UPDATE `mstr_supplier` 
            SET `name`='$name',`gst_no`='$gst'
            WHERE `supplier_id_fk`='$hiddenid' and flag='1' ";   
            }
        }
        else if($master_value == "Produt")
        {
            if($flag== 0) {
            $sql = "UPDATE `mstr_item` 
            SET `final_product_code`='$name',`gst_group`='$gst'
            WHERE `item_id_pk`='$hiddenid' and flag='0' ";
            }
            else {
               $sql = "UPDATE `mstr_item` 
            SET `final_product_code`='$name',`gst_group`='$gst'
            WHERE `item_id_pk`='$hiddenid' and flag='1' "; 
            }
        }
        else if($master_value == "Retail Customer")
        {
            if($flag== 0) {
            $sql = "UPDATE `tbl_wholesale_customer` 
            SET `retail_cust_name`='$name',`gst_no`='$gst'
            WHERE `retail_cust_idpk`='$hiddenid' and flag='0'";
            }
            else {
                 $sql = "UPDATE `tbl_wholesale_customer` 
            SET `retail_cust_name`='$name',`gst_no`='$gst'
            WHERE `retail_cust_idpk`='$hiddenid' and flag='1'";
            }
        }
        else
        {

        }
        $res1 = mysqli_query($db,$sql);
        if($res1 == 1)
        {
            $flag_ok = "1";
        }
        else
        {
            $flag_ok = "0";
        }
    }
    echo $flag_ok="1";
?>