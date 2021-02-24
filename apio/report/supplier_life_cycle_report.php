<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql_supplier = "SELECT * FROM mstr_supplier";
        $res_supp = mysqli_query($db, $sql_supplier);

        while($row = mysqli_fetch_row($res_supp))
        {
            $obj = array();
            
            $sql = "SELECT po.purchase_order_no, po.date, g.grn_no, g.grn_date, fp.fin_pi_no, fp.pi_date 
                    FROM purchase_order po, grn g, fin_purchase_invoice fp 
                    WHERE po.supplier_id_fk='$row[0]' 
                    AND g.supplier='$row[0]' 
                    AND fp.supplier_id_fk='$row[0]'";

            $res = mysqli_query($db, $sql);

            while($row1 = mysqli_fetch_row($res))
            {
                $obj['supplier_name'] = $row[1];
                $obj['pono'] = $row1[0];
                $obj['po_date'] = $row1[1];
                $obj['grn_no'] = $row1[2];
                $obj['grn_date'] = $row1[3];
                $obj['pino'] = $row1[4];
                $obj['pi_date'] = $row1[5];

                array_push($response, $obj);
            }

            // array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>