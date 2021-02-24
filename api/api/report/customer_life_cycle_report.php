<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql_supplier = "SELECT * FROM tbl_wholesale_customer";
        $res_supp = mysqli_query($db, $sql_supplier);

        while($row = mysqli_fetch_row($res_supp))
        {
            $obj = array();
            
            $sql = "SELECT so.work_no, so.add_date, wdc.challan_no, wdc.add_date, wti.Tax_inv_no, wti.bill_date 
                    FROM wholesale_work_order so, wholesale_delivery_challan wdc, wholesale_tax_invoice wti 
                    WHERE so.cust_id_fk='$row[0]' 
                    AND wdc.cust_id_fk='$row[0]' 
                    AND wti.cust_id_fk='$row[0]'";

            $res = mysqli_query($db, $sql);

            while($row1 = mysqli_fetch_row($res))
            {
                $obj['customer'] = $row[1];
                $obj['sono'] = $row1[0];
                $obj['so_date'] = $row1[1];
                $obj['dc_no'] = $row1[2];
                $obj['dc_date'] = $row1[3];
                $obj['invno'] = $row1[4];
                $obj['inv_date'] = $row1[5];

                array_push($response, $obj);
            }

            // array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>