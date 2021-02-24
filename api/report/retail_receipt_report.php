<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM retail_receipt";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $obj['receipt_no'] = $row['id_pk'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['cust_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            if(strcasecmp($row['payment_type'], 'cheque') == 0)
            {
                $obj['amount'] = $row['cheque_amt'];
                $obj['cheque_amt'] = $row['cheque_amt'];
                $obj['cheque_no'] = $row['cheque_no'];
                $obj['cash_amt'] = 0;
                $obj['card'] = 0;
            }

            else if(strcasecmp($row['payment_type'], 'cash/card') == 0)
            {
                $obj['amount'] = $row['cash_amount']+$row['card_amount'];
                $obj['cash_amt'] = $row['cash_amount'];
                $obj['card'] = $row['card_amount'];
                $obj['cheque_amt'] = 0;
                $obj['cheque_no'] = 0;
            }
            
            else
            {
                $obj['amount'] = null;
                $obj['cash_amt'] = null;
                $obj['card'] = null;
                $obj['cheque_amt'] = null;
                $obj['cheque_no'] = null;
            }

            $get_totals = "SELECT * FROM retail_receipt_items WHERE receipt_id_fk='".$row['id_pk']."'";
            $res_totals = mysqli_query($db, $get_totals);

            $mdr = 0;
            $mcr = 0;
            $disc = 0;
            while($row1=mysqli_fetch_assoc($res_totals))
            {
                $mdr += $row1['debit_amt'];
                $mcr += $row1['credit_amt'];
                $disc += $row1['discount'];
            }

            $obj['mdr'] = $mdr;
            $obj['mcr'] = $mcr;
            $obj['total_disc'] = $disc;
            $obj['tax_amt'] = "";

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>