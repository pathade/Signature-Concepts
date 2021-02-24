<?php

    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

    if ($flag == 0) {
        $sql = "INSERT INTO fin_payment_advice (fin_yr, date, supplier_id_fk, branch, authorised_by, status, flag) 
        Values ('$fin_yr', '$date', '$supplier', '$branch','$authorised_by', '0','$flag')";
    }
    else {
         $sql = "INSERT INTO fin_payment_advice (fin_yr, date, supplier_id_fk, branch, authorised_by, status, flag) 
        Values ('$fin_yr', '$date', '$supplier', '$branch','$authorised_by', '0','$flag')";
    }

    $res = mysqli_query($db, $sql);

    if($res == 1)
    {
        $fpa_id_fk=mysqli_insert_id($db);

        $itemArray = json_decode($newRawItemArray, true);
        if(!empty($itemArray))
        {
            foreach($itemArray as $itemObj) 
            {

                $pi_id = $itemObj['pi_id']; 
                $supplier_name = $itemObj['supplier_name']; 
                $bill_no = $itemObj['bill_no']; 
                $bill_amt = $itemObj['bill_amt']; 
                $prev_paid = $itemObj['prev_paid']; 
                $total = $itemObj['total']; 
                $grr_id = $itemObj['grr_id']; 
                $grr_amt = $itemObj['grr_amt']; 
                $net_payto_supp = $itemObj['net_payto_supp']; 
                $dr_id = $itemObj['dr_id']; 
                $dr_amt = $itemObj['dr_amt']; 
                $cr_id = $itemObj['cr_id']; 
                $cr_amt = $itemObj['cr_amt']; 
                $adv_payment = $itemObj['adv_payment']; 
                $amount = $itemObj['amount']; 
                $discount = $itemObj['discount']; 
                $total_pay = $itemObj['total_pay']; 
                $other = $itemObj['other']; 
                $pay_amt = $itemObj['pay_amt']; 
                $remark = $itemObj['remark']; 

                $sql1 = "INSERT INTO `fin_payment_advice_items`(`fpa_id_fk`, `fpi_id_fk`, `supplier_name`, `bill_no`, `bill_amt`, `prev_paid`, `total`, `grr_id`, `grr_amt`, `net_payto_supp`, `manual_dr_id`, `manual_dr_amt`, `manual_cr_id`, `manual_cr_amt`, `adv_payment`, `amount`, `discount`, `total_pay`, `other`, `pay_amount`, `apply_cr`, `remark`, `grr_date`, `grr_disp_no`, `drr_disp_amt`, `pi_dr_per`) VALUES ('$fpa_id_fk','$pi_id','$supplier_name','$bill_no','$bill_amt','$prev_paid','$total','$grr_id','$grr_amt','$net_payto_supp','$dr_id','$dr_amt','$cr_id','$cr_amt','$adv_payment','$amount','$discount','$total_pay','$other','$pay_amt','0','$remark','0','0','0','0')";

                $res1 = mysqli_query($db, $sql1);
            }
        }


        echo 1;
    }
    else
        echo 0;

?>