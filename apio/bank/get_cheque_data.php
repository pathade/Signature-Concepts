<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);
    session_start();  
    $flag=$_SESSION['flag'];
    $sql='';
    
    if($flag == 0) {
    $sql = "SELECT *,c.status as ss FROM `mstr_cheque` as c,mstr_bank as b where c.bank_id_fk = b.bank_idpk and c.flag='0' and b.flag='0'
    ";
    }
    else {
        $sql = "SELECT *,c.status as ss FROM `mstr_cheque` as c,mstr_bank as b where c.bank_id_fk = b.bank_idpk and c.flag='1' and b.flag='1'
    ";
    }
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
    while ($row = mysqli_fetch_array($result))
    {
        $obj = array();
        //delete
        //$obj['0'] = $row['tax_id_pk'];////$row['tax_id_pk']
        $obj['0'] = '<input type="checkbox" value="'.$row['cheque_id_pk'].'" class="form-control invoice_checkbox" id="invoice-'.$i.'" name="advance_no" onchange="tax_invoice_click(this.id)" style="height: 20px;width: 20px;" />';
        //Invoice No
        $obj['1'] = '<input readonly="" type="text" id="invoice_no-"'.$i.'" class="form-control" value="'.$row['cheque_id_pk'].'" style="border: white;background-color: white;">';
        //invoice Date
        $obj['2'] = '<input readonly="" type="text" id="invoice_date-"'.$i.'" class="form-control" value="'.$row['bank_name'].'" style="border: white;background-color: white;">';
        //Financial Yr
        $obj['3'] = '<input type="text" id="yr-'.$i.'" class="form-control" value="'.$row['account_no'].'" readonly="" style="border: white;background-color: white;">';
        //Amount
        $obj['4'] = '<input type="text" id="amt-'.$i.'" class="form-control" value="'.$row['from_series'].'" onkeyup="get_quantity_value(this.id);" >';
        //Previous Paid
        $obj['5'] = '<input type="text" id="prev_paid-'.$i.'" class="form-control" value="'.$row['to_series'].'" style="border: white;background-color: white;">';
        //balance Amount
        $obj['6'] = '<input type="text" id="balamt-'.$i.'" class="form-control" value="'.$row['current_cheque_no'].'" style="border: white;background-color: white;">';
        $obj['7'] = '<input type="text" id="balamt-'.$i.'" class="form-control" value="'.$row['ss'].'" style="border: white;background-color: white;">';
        
        $i++;
        array_push($data, $obj);
    }
    $response['data'] = $data;
} 
echo json_encode($response);
?>