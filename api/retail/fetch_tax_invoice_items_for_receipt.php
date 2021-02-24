<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  include('../../database/dbconnection.php');
  extract($_POST);

  
    $sql = "SELECT * FROM `retail_tax_invoice` where customer = '$customer_id'";
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
  
    while ($row = mysqli_fetch_array($result))
    {
        $sname = "";
        $id_pk = $row['id_pk'];
        
        $obj = array();
        //delete
        $obj['0'] = '<input type="checkbox" value="'.$row['id_pk'].'" class="form-control invoice_checkbox" id="invoice-'.$i.'" name="advance_no" onchange="tax_invoice_click(this.id)" style="height: 20px;width: 20px;" />';
        //PI No
        $obj['1'] = '<input readonly="" type="text" id="pi_no-"'.$i.'" class="form-control" value="'.$row['pi_no'].'" style="border: white;background-color: white;">';
        //Date
        $obj['2'] = '<input readonly="" type="text" id="pi_date-"'.$i.'" class="form-control" value="'.$row['date'].'" style="border: white;background-color: white;">';
        //Financial Yr
        $obj['3'] = '<input type="text" id="yr-'.$i.'" class="form-control" value="2020-2021" readonly="" style="border: white;background-color: white;">';
        //Amount
        $obj['4'] = '<input type="text" id="amt-'.$i.'" class="form-control" value="'.$row['net_amt'].'" onkeyup="get_quantity_value(this.id);" >';
        //Previous Paid
        $obj['5'] = '<input type="text" id="prev_paid-'.$i.'" class="form-control" value="0" style="border: white;background-color: white;">';
        //balance Amount
        $obj['6'] = '<input type="text" id="balamt-'.$i.'" class="form-control" value="'.$row['net_amt'].'" style="border: white;background-color: white;">';
        //credit
        $obj['7'] = '<input type="text" id="credit-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="0" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
        //debit
        $obj['8'] = '<input type="text" id="debit-'.$i.'" class="form-control" value="0" >';
        //return Goods
        $obj['9'] = '<input type="text" id="returngood-'.$i.'" class="form-control" value="0" >';
        //Discount
        $obj['10'] = '<input type="text" id="discount-'.$i.'" class="form-control" value="0" >';
        //Total Balance
        $obj['11'] = '<input type="text" id="total_bal-'.$i.'" class="form-control" value="'.$row['net_amt'].'" >';
        //Paid Amount
        $obj['12'] = '<input type="text" id="paid_amt-'.$i.'" class="form-control" value="0" onkeyup="paid_amt(this.id)">';
        //Out standing
        $obj['13'] = '<input type="text" id="outstanding-'.$i.'" class="form-control" value="'.$row['net_amt'].'" >';
        //credit no
        $obj['14'] = '<input type="text" id="credit_no-'.$i.'" class="form-control" value="0" >';
        //debit no
        $obj['15'] = '<input type="text" id="debit_no-'.$i.'" class="form-control" value="0" >';
        //return no
        $obj['16'] = '<input type="text" id="return_no-'.$i.'" class="form-control" value="0" >';
        // //Advance Amt
        // $obj['17'] = '<input type="text" id="advance_amt-'.$i.'" class="form-control" value="0" >';
        // //credit Amt
        // $obj['18'] = '<input type="text" id="credit_amt-'.$i.'" class="form-control" value="0" >';
        // //debit Amt
        // $obj['19'] = '<input type="text" id="debit_amt-'.$i.'" class="form-control" value="0" >';
        // //Bank Charges
        // $obj['20'] = '<input type="text" id="hidden_remain_qty-'.$i.'" class="form-control" value="0" >';
        $i++;
        array_push($data, $obj);
        //}
    }
    $response['data'] = $data;
}
  


  echo json_encode($response);
?>