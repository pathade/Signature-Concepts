<?php 
    include('../../database/dbconnection.php');

    $edit_item = $_GET['id'];

    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	//echo date('Y-m-d H:i:s');
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    

    $sql = "UPDATE `retail_tax_invoice` SET `status`='1' WHERE `id_pk`='".$_GET['id']."'";

    $res = mysqli_query($db,$sql) or die(mysqli_error($db));
    if($res== 1)
    {
        $select_item="SELECT po_no_fk FROM retail_tax_invoice WHERE id_pk='$edit_item'";
        $res_item = mysqli_query($db, $select_item) or die(mysqli_error($db));
        while($row1=mysqli_fetch_row($res_item))
        {
            $update_grn = "UPDATE retail_proforma SET tax_invoice_added='0' WHERE id_pk='$row1[0]'";
            mysqli_query($db, $update_grn) or die('RP: '.mysqli_error($db));
        }
        echo "1";
        ?>
    <script>
    alert("Deleted!");
    window.location.href="../../src/retail/view_retail_tax_invoice.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }


?>