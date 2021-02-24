<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
    session_start();
    $flag = $_SESSION['flag'];
    $get_supplier= '';
    $count=1;
    $start = 1;
  
    if($flag == 0) {
       $get_supplier = "SELECT *
        FROM fin_bank_transaction
        WHERE bank_name='$bank_name1' AND 
                account_no='$account_no1' AND 
                cheque_date BETWEEN '$from_date' AND '$to_date' AND recon_status='N' AND flag='0'";
    }
   else {
    $get_supplier = "SELECT *
    FROM fin_bank_transaction
    WHERE bank_name='$bank_name1' AND 
            account_no='$account_no1' AND 
            cheque_date BETWEEN '$from_date' AND '$to_date' AND recon_status='N' AND flag='1' ";
   }

    $res_supplier = mysqli_query($db, $get_supplier);

  while ($row = mysqli_fetch_array($res_supplier))
  { 
        if($row['type'] == "Receipt")
        {
            $dbcr = 'Db';
            $dbamt = $row['amount'];
            $cramt = "";
        }
        else if($row['type'] == "Payment")
        {
            $dbcr = 'Cr';
            $dbamt = "";
            $cramt = $row['amount'];
        }
        else
        {

        }

        $party_from = $row['party_from'];
        $particular_party = $row['particular_party'];

        if($party_from == "WC")
        {
            if($flag == 0) {
           $sql = "SELECT * FROM tbl_wholesale_customer WHERE wc_id_pk='$particular_party' and flag='0' ";
            }
            else {
                $sql = "SELECT * FROM tbl_wholesale_customer WHERE wc_id_pk='$particular_party' and flag='1' ";
            }
            $res = mysqli_query($db,$sql);
            while($rw = mysqli_fetch_array($res))
            {
                $party_name = $rw['cust_name'];
            }

        }
        else if($party_from == "RC")
        {
            if($flag == 0) {
           $sql = "SELECT * FROM mstr_retail_customer WHERE retail_cust_idpk='$particular_party' and flag='0' ";
            }
            else {
                $sql = "SELECT * FROM mstr_retail_customer WHERE retail_cust_idpk='$particular_party' and flag='1' ";
            }
            $res = mysqli_query($db,$sql);
            while($rw = mysqli_fetch_array($res))
            {
                $party_name = $rw['retail_cust_name'];
            }
        }
        else if($party_from == "V")
        {
            if($flag == 0) {
            $sql = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$particular_party' and flag='0' ";
            }
            else {
                $sql = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$particular_party' and flag='1' ";
            }
            $res = mysqli_query($db,$sql);
            while($rw = mysqli_fetch_array($res))
            {
                $party_name = $rw['first_name']." ".$rw['last_name'];
            }
        }
        else if($party_from == "S")
        {
            if($flag == 0) {
            $sql = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$particular_party' and flag='0' ";
            }
            else {
                $sql = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$particular_party' and flag='1' ";
            }
            $res = mysqli_query($db,$sql);
            while($rw = mysqli_fetch_array($res))
            {
                $party_name = $rw['name'];
            }

        }
        else
        {

        }


        $obj = array();
        //action 
        $obj['0'] = '<input type="checkbox" checked="" value="'.$row['bankt_id_pk'].'">';
        //id
        $obj['1'] = '<input type="text" value="'.$row['bt_no'].'">';//$row['bt_no'];
        //date
        $obj['2'] = '<input type="text" value="'.$row['cheque_date'].'">';//$row['cheque_date'];
        //dr-db
        $obj['3'] = '<input type="text" value="'.$dbcr.'">';//$dbcr;
        //perticulars
        $obj['4'] = '<input type="text" value="'.$party_name.'">';//$party_name;
        //voucher type
        $obj['5'] = '<input type="text" value="'.$row['type'].'">';//$row['type'];
        //transaction no
        $obj['6'] = '<input type="text" value="'.$row['trans_no'].'">';//$row['trans_no'];
        //debit
        $obj['7'] ='<input type="text" value="'.$dbamt.'">';// $dbamt;
        //credit
        $obj['8'] = '<input type="text" value="'.$cramt.'">';//$cramt; 
        //reconcile date
        if($row['recon_date'] == "00-00-0000")
        {
            $obj['9'] = '<input type="date" class="form-control" style="border:none;">';
        }
        else
        {
            $obj['9'] = '<input type="text" class="form-control" style="border:none;" value="'.$row['recon_date'].'">';
        }
        
        //reconcile date
        // $obj['10'] = "reconcile dt";


        array_push($response, $obj);
        $count++;
  }
  $response['data']=$response;
}
else
  $response['error'] = "Data Not Found...!!!";  
  echo json_encode($response); 
?>   
   
   



















