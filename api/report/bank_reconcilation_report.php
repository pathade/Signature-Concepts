<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM fin_bank_transaction";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();

            $obj['cheque_date'] = $row['cheque_date']; 

            if($row['type'] == 'Receipt')
                $obj['drcr'] = 'Debit';
            else if($row['type']=='Payment')
                $obj['drcr'] = 'Credit';

            if($row['party_from'] == 'WC')
            {
                $get_name = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$row['particular_party']."'";
                $res_name = mysqli_fetch_assoc(mysqli_query($db, $get_name));
                $obj['particular'] = $res_name['cust_name']; 
            }

            else if($row['party_from'] == 'RC')
            {
                $get_name = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['particular_party']."'";
                $res_name = mysqli_fetch_assoc(mysqli_query($db, $get_name));
                $obj['particular'] = $res_name['retail_cust_name']; 
            }

            else if($row['party_from'] == 'S')
            {
                $get_name = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['particular_party']."'";
                $res_name = mysqli_fetch_assoc(mysqli_query($db, $get_name));
                $obj['particular'] = $res_name['name']; 
            }

            else if($row['party_from'] == 'V')
            {
                $get_name = "SELECT first_name FROM mstr_vendor WHERE vendor_id_pk='".$row['particular_party']."'";
                $res_name = mysqli_fetch_assoc(mysqli_query($db, $get_name));
                $obj['particular'] = $res_name['first_name']; 
            }

            $obj['type'] = $row['type'];

            $obj['trans_no'] = $row['trans_no'];
            
            if($row['type'] == 'Receipt')
            {
                $obj['debit'] = $row['amount'];
                $obj['credit'] = 0;
            }
            else if($row['type']=='Payment')
            {
                $obj['debit'] = 0;
                $obj['credit'] = $row['amount'];
            }

            $obj['reconcile_date'] = $row['add_date'];
            $obj['o_bal'] = $row['amount'];

            if($row['type'] == 'Receipt')
            {
                $obj['debit1'] = $row['amount'];
                $obj['credit1'] = 0;
            }
            else if($row['type']=='Payment')
            {
                $obj['debit1'] = 0;
                $obj['credit1'] = $row['amount'];
            }
            $obj['c_bal'] = $row['amount'];
 


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>