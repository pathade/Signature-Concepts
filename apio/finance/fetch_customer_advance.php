<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	$cur_date = date('d-m-Y');
    $cur_time = date('H:i:s A');
    session_start();
    $flag = $_SESSION['flag'];
    $get_supplier= '';
    
    if($flag == 0) {
    $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$supplier_id' and flag='0' ";
    }
    else {
        $get_supplier = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$supplier_id' and flag='1' ";
    }
    $res_supplier = mysqli_fetch_row(mysqli_query($db, $get_supplier));

    if($flag == 0) {
    $k = "SELECT * FROM supplier_return_good 
        WHERE  supplier='$supplier_id' AND 
        status!='1' and flag='0' ";
    }
    else {
        $k = "SELECT * FROM supplier_return_good 
        WHERE  supplier='$supplier_id' AND 
        status!='1' and flag='1' ";
    }
    $kl = mysqli_query($db,$k);
    $i = 0;
    if(mysqli_num_rows($kl) > 0)
    {
        while($lki = mysqli_fetch_array($kl))
        {
            //echo '<input type="checkbox" id="ad-'.$i.'" name="dc" onchange="doalert(this.id)" value="'.$lki['adv_id_pk'].'">&nbsp; '.$lki['advance_no'];echo"<br>";
            echo '<tr>
            <td><input type="checkbox" class="form-control" id="return-'.$lki['id_pk'].'" name="advance_no" onchange="return_click1(this.id)" style="height: 20px;width: 20px;" /></td>
            <td><input type="text" class="form-control" value="'.$res_supplier[1].'" id="supplier_no_p-'.$lki['id_pk'].'"></td>
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
    if($flag == 0) {
    $k = "SELECT * FROM supplier_manual_debit_credit 
        WHERE  supplier_id_fk='$supplier_id' AND 
        status!='1' and flag='0' ";
    }
    else {
        $k = "SELECT * FROM supplier_manual_debit_credit 
        WHERE  supplier_id_fk='$supplier_id' AND 
        status!='1' and flag='1' ";
    }
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
        echo "Supplier Debit Credit Not Available";
    }
    echo '#';
    if($flag == 0) {
    $k = "SELECT * FROM exp_advance_payment 
        WHERE  vendor_id_fk='$supplier_id' AND
        type='1' AND 
        cancel_status!='1' and flag='0' ";
    }
    else {
        $k = "SELECT * FROM exp_advance_payment 
        WHERE  vendor_id_fk='$supplier_id' AND
        type='1' AND 
        cancel_status!='1' and flag='1' ";
    }
    $kl = mysqli_query($db,$k);
    $i = 0;
    if(mysqli_num_rows($kl) > 0)
    {
        while($lki = mysqli_fetch_array($kl))
        {
            //echo '<input type="checkbox" id="ad-'.$i.'" name="dc" onchange="doalert(this.id)" value="'.$lki['adv_id_pk'].'">&nbsp; '.$lki['advance_no'];echo"<br>";
            echo '<tr>
            <td><input type="checkbox" class="form-control" id="ad-'.$lki['id_pk'].'" name="advance_no" onchange="advance_clicked(this.id)" style="height: 20px;width: 20px;" /></td>
            <td><input type="text" class="form-control" id="sname-'.$lki['id_pk'].'" value="'.$res_supplier[1].'" name="sname" /></td>
            <td><input type="text" class="form-control" id="adno-'.$lki['id_pk'].'" value="'.$lki['id_pk'].'"></td>
            <td><input type="text" class="form-control" id="ad_amt-'.$lki['id_pk'].'" value="'.$lki['amount'].'"></td>
            <td><input type="text" class="form-control" id="ad_bal-'.$lki['id_pk'].'" value="'.$lki['amount'].'"></td>
            </tr>';
            $i++;
        }
    }
    else
    {
        echo "Advance Payment Not Available";
    }

    
?>