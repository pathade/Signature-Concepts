<?php

    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

    // $sql = "INSERT INTO fin_payment_advice (fin_yr, date, supplier_id_fk, branch, authorised_by, status) 
    // Values ('$fin_yr', '$date', '$supplier', '$branch','$authorised_by', '0')";

    // $res = mysqli_query($db, $sql);

    // if($res == 1)
    // {
    //     $fpa_id_fk=mysqli_insert_id($db);

        $itemArray = json_decode($newRawItemArray, true);
        if(!empty($itemArray))
        {
            foreach($itemArray as $itemObj) 
            {

                $bank_tansaction_pk = $itemObj['bank_tansaction_pk']; 
                $chdt = $itemObj['chdt']; 
                $db_cr = $itemObj['db_cr']; 
                $perticualr = $itemObj['perticualr']; 
                $vouchertype = $itemObj['vouchertype']; 
                $transactionno = $itemObj['transactionno']; 
                $debit = $itemObj['debit']; 
                $credit = $itemObj['credit']; 
                $reconciledt = $itemObj['reconciledt'];

                if($reconciledt != "")
                {
                    if ($flag == 0) {
                        $sql1 = "UPDATE fin_bank_transaction SET recon_date='$reconciledt',
                        recon_status='Y' WHERE bankt_id_pk='$bank_tansaction_pk' and flag= '0' ";
                    }
                   else {
                    $sql1 = "UPDATE fin_bank_transaction SET recon_date='$reconciledt',
                    recon_status='Y' WHERE bankt_id_pk='$bank_tansaction_pk' and flag= '1' ";
                   }
                    $res1 = mysqli_query($db, $sql1);
                }

                

                //$sql1 = "INSERT INTO `fin_payment_advice_items`(`fpa_id_fk`, `fpi_id_fk`, `supplier_name`, `bill_no`, `bill_amt`, `prev_paid`, `total`, `grr_id`, `grr_amt`, `net_payto_supp`, `manual_dr_id`, `manual_dr_amt`, `manual_cr_id`, `manual_cr_amt`, `adv_payment`, `amount`, `discount`, `total_pay`, `other`, `pay_amount`, `apply_cr`, `remark`, `grr_date`, `grr_disp_no`, `drr_disp_amt`, `pi_dr_per`) VALUES ('$fpa_id_fk','$pi_id','$supplier_name','$bill_no','$bill_amt','$prev_paid','$total','$grr_id','$grr_amt','$net_payto_supp','$dr_id','$dr_amt','$cr_id','$cr_amt','$adv_payment','$amount','$discount','$total_pay','$other','$pay_amt','0','$remark','0','0','0','0')";

                
            }
        }
        if($res1 == 1)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

        
    // }
    // else
    //     echo 0;

?>