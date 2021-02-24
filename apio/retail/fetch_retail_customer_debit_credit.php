<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('Y-m-d');
    $cur_time = date('H:i:s A');

    echo "#";
    $k = "SELECT * FROM customer_manual_debit_credit 
        WHERE  customer_id_fk='$customer_id' AND 
        used_status!='1' AND cust_type='Retailer'";
    $kl = mysqli_query($db,$k);
    $i = 0;
    if(mysqli_num_rows($kl) > 0)
    {
        while($lki = mysqli_fetch_array($kl))
        {
            //echo '<input type="checkbox" id="ad-'.$i.'" name="dc" onchange="doalert(this.id)" value="'.$lki['adv_id_pk'].'">&nbsp; '.$lki['advance_no'];echo"<br>";
            echo '<tr>
            <td><input type="checkbox" class="form-control" id="return-'.$lki['id_pk'].'" name="advance_no" onchange="return_click1(this.id)" style="height: 20px;width: 20px;" /></td>
            <td><input type="text" class="form-control" value="'.$lki['return_no'].'" id="return_no_p-'.$lki['id_pk'].'"></td>
            <td><input type="text" class="form-control" value="'.$lki['total'].'" id="return_amount-'.$lki['id_pk'].'"></td>
            <td><input type="text" class="form-control" value="'.$lki['total'].'" id="return_balance-'.$lki['id_pk'].'"></td>
            </tr>';
            $i++;
        }
    }
    else
    {
        echo "Return Goods Not Available";
    }
    echo "#";
    $k = "SELECT * FROM customer_manual_debit_credit 
        WHERE  customer_id_fk='$customer_id' AND 
        used_status!='1'";
    $kl = mysqli_query($db,$k);
    $i = 0;
    if(mysqli_num_rows($kl) > 0)
    {
        while($lki = mysqli_fetch_array($kl))
        {   
                echo '<tr>
                <td><input type="checkbox" class="form-control"  id="crdt-'.$lki['id'].'" name="advance_no" onchange="crdt_click(this.id)" style="height: 20px;width: 20px;" /></td>
                <td><input type="text" class="form-control" id="crdt_no-'.$lki['id'].'" value="'.$lki['debit_credit_no'].'"></td>
                <td><input type="text" class="form-control" id="crdt_amt-'.$lki['id'].'" value="'.$lki['final_amount'].'"></td>
                <td><input type="text" class="form-control" id="cr_amt-'.$lki['id'].'" value="0"></td>
                <td><input type="text" class="form-control" id="dt_amt-'.$lki['id'].'" value="'.$lki['final_amount'].'"></td>
                <td><input type="text" class="form-control" id="crdt_bal-'.$lki['id'].'" value="'.$lki['final_amount'].'"></td>
                </tr>';
                $i++;
        }
    }
    else
    {
        echo "Manual Debit Credit Not Available";
    }
    
?>