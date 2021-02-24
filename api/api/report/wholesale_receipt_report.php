<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        $sql = "SELECT * FROM wholesale_receipt";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['rec_id_pk'];

            $get_customer = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$row['cust_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['cust_name'];

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
                $obj['amount'] = $row['cash_amount'];
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

            $tot_adv = "SELECT * FROM wholesale_receipt_items WHERE receipt_id_fk='".$row['rec_id_pk']."'";
            $res_adv = mysqli_query($db, $tot_adv) or die(mysqli_error($db));

            $tot_adv_amt = 0;
            $tot_de_amt = 0;
            $tot_cr_amt = 0;
            $disc = 0;
            while($row1 = mysqli_fetch_assoc($res_adv))
            {
                $tot_adv_amt += $row1['advance_amt'];
                $tot_de_amt += $row1['debit_amt'];
                $tot_cr_amt += $row1['credit_amt'];
                $disc += $row1['discount'];
            }

            $obj['tot_adv'] = $tot_adv_amt;
            $obj['tot_de'] = $tot_de_amt;
            $obj['tot_cr'] = $tot_cr_amt;
            $obj['disc'] = $disc;

            if($row['status'] != '1')
                $obj['status'] = '<p class="text-success">A</p>';
            else
                $obj['status'] = '<p class="text-danger">C</p>';


            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>