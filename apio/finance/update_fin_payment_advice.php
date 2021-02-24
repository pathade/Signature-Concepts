<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    include '../../database/dbconnection.php';

    date_default_timezone_set('Asia/Kolkata');
    $udate = date('d/m/y ', time());
    $utime = date('H:i:s', time());
     session_start();
    $flag = $_SESSION['flag'];
    $sql= '';

    if($flag == 0) {
    $sql = "UPDATE `fin_payment_advice` SET `fin_yr`='$fin_yr',`date`='$date',`supplier_id_fk`='$supplier',
    `authorised_by`='$authorised_by' WHERE `id_pk`='$edit_id' and `flag`='$flag' ";
    }
    else {
         $sql = "UPDATE `fin_payment_advice` SET `fin_yr`='$fin_yr',`date`='$date',`supplier_id_fk`='$supplier',
    `authorised_by`='$authorised_by' WHERE `id_pk`='$edit_id' and `flag`='$flag' ";
    }
    
    $result = mysqli_query($db, $sql) or die('FPA: '.mysqli_error($db));

    if($result)
    {
        $itemArray = json_decode($newRawItemArray, true);
        // delete all grn items before updating
        if(!empty($itemArray))
        {
        foreach($itemArray as $itemObj)
            {
                $delete_purchase_item = "DELETE FROM fin_payment_advice_items WHERE fpa_id_fk='$edit_id'";
                if(mysqli_query($db, $delete_purchase_item))
                    continue;
                else
                    echo "Delete item error";
            }
        }


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

                $sql1 = "INSERT INTO `fin_payment_advice_items`(`fpa_id_fk`, `fpi_id_fk`, `supplier_name`, `bill_no`, `bill_amt`, `prev_paid`, `total`, `grr_id`, `grr_amt`, `net_payto_supp`, `manual_dr_id`, `manual_dr_amt`, `manual_cr_id`, `manual_cr_amt`, `adv_payment`, `amount`, `discount`, `total_pay`, `other`, `pay_amount`, `apply_cr`, `remark`, `grr_date`, `grr_disp_no`, `drr_disp_amt`, `pi_dr_per`) VALUES ('$edit_id','$pi_id','$supplier_name','$bill_no','$bill_amt','$prev_paid','$total','$grr_id','$grr_amt','$net_payto_supp','$dr_id','$dr_amt','$cr_id','$cr_amt','$adv_payment','$amount','$discount','$total_pay','$other','$pay_amt','0','$remark','0','0','0','0')";

                $res1 = mysqli_query($db, $sql1) or die('FPI: '.mysqli_error($db));
            }

        }


        // $po_no=substr($po_no, 3);
        // $sno=$po_no+1;
        // $sql12 = "UPDATE mstr_data_series SET sr_no= '$sno' WHERE name='purchase_order' ";
        // $res = mysqli_query($db,$sql12);

        echo "1";

    }
    else
        echo "02";
}
else
    echo "03";

?>