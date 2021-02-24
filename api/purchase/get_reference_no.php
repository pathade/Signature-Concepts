<?php
    include '../../database/dbconnection.php';
    extract($_POST);

    $get_id = "SELECT work_no, retail_proforma_no FROM purchase_order WHERE id='$po_no'";
    $res = mysqli_fetch_row(mysqli_query($db, $get_id));

    if($res)
    {
    $work_no = $res[0];
    $rpi_no = $res[1];

    if($work_no == null && $rpi_no != null)
    {
        $get_rpi_no = "SELECT order_no FROM retail_proforma rp WHERE rp.id_pk='$res[1]' ";
        $res_rpi_no = mysqli_fetch_row(mysqli_query($db, $get_rpi_no));
        echo json_encode(array('work_no'=>$res[0], 'rpo_no'=>$res_rpi_no[0]));
    }

    else if($work_no != null && $rpi_no == null)
    {
        $get_work_no = "SELECT work_no FROM wholesale_work_order so WHERE so.work_order_id='$res[0]' ";
        $res_work_no = mysqli_fetch_row(mysqli_query($db, $get_work_no));
        echo json_encode(array('work_no'=>$res_work_no[0], 'rpo_no'=>$res[1]));
    }

    else
        echo json_encode(array('work_no'=>null, 'rpo_no'=>null));
    }
    else
        echo "Fetch no error";

?>