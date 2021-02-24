<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  include('../../database/dbconnection.php');
  extract($_POST);

  //$newRawItemArray = 
  // $newRawItemArray1 = json_decode($newRawItemArray, true);
  // $length1 = count($newRawItemArray1);
  // //echo "length is:".$length1;
  // for($j = 0;$j<$length1;$j++)
  // {   
  //     //echo "jjj is:".$j;echo "\n";
       
  //     $invoice_id_pk = $newRawItemArray1[$j]['invoice_id_pk'];

  //     $s = "SELECT * FROM wholesale_receipt_items_final WHERE tax_invoice_fk='$invoice_id_pk'";
  //     $sres = mysqli_query($db,$s);
  //     $scount = mysqli_num_rows($sres);
  //     if($scount > 0)
  //     {
  //       while($srw = mysqli_query($sres))
  //       {
  
  //       }
  //     }
  //     else
  //     {
        $sql = "SELECT * FROM `wholesale_receipt_items` 
        where receipt_id_fk = '$receipt_id'";
        $data = array();
        $result = mysqli_query($db, $sql);
        $start = 1;
        $i = 1;
      
        while ($row = mysqli_fetch_array($result))
        {
            $sname = "";
            //$tax_id_pk = $row['tax_id_pk'];
    
           
            // else
            // {
              $obj = array();
              //delete
              //$obj['0'] = $row['tax_id_pk'];////$row['tax_id_pk']
              $obj['0'] = '<input type="checkbox" checked value="'.$row['tax_invoice_fk'].'" class="form-control invoice_checkbox" id="invoice-'.$i.'" name="advance_no" onchange="tax_invoice_click(this.id)" style="height: 20px;width: 20px;" />';
              //Invoice No
              $obj['1'] = '<input readonly="" type="text" id="invoice_no-"'.$i.'" class="form-control" value="'.$row['tax_invoice_fk'].'" style="border: white;background-color: white;">';
              //invoice Date
              $obj['2'] = '<input readonly="" type="text" id="invoice_date-"'.$i.'" class="form-control" value="'.$row['tax_inv_dt'].'" style="border: white;background-color: white;">';
              //Financial Yr
              $obj['3'] = '<input type="text" id="yr-'.$i.'" class="form-control" value="'.$row['fin_yr'].'" readonly="" style="border: white;background-color: white;">';
              //Amount
              $obj['4'] = '<input type="text" id="amt-'.$i.'" class="form-control" value="'.$row['amount'].'" onkeyup="get_quantity_value(this.id);" >';
              //Previous Paid
              $obj['5'] = '<input type="text" id="prev_paid-'.$i.'" class="form-control" value="'.$row['prev_paid'].'" style="border: white;background-color: white;">';
              //balance Amount
              $obj['6'] = '<input type="text" id="balamt-'.$i.'" class="form-control" value="'.$row['bal_amount'].'" style="border: white;background-color: white;">';
              //Advance
              $obj['7'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="advance-'.$i.'" class="form-control" value="'.$row['advance_amt'].'" style="border: white;background-color: white;">';
              //credit
              $obj['8'] = '<input type="text" id="credit-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['credit_amt'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
              //debit
              $obj['9'] = '<input type="text" id="debit-'.$i.'" class="form-control" value="'.$row['debit_amt'].'" >';
              //return Goods
              $obj['10'] = '<input type="text" id="returngood-'.$i.'" class="form-control" value="'.$row['return_good_amt'].'" >';
              //Discount
              $obj['11'] = '<input type="text" id="discount-'.$i.'" class="form-control" value="'.$row['discount'].'" >';
              //Total Balance
              $obj['12'] = '<input type="text" id="total_bal-'.$i.'" class="form-control" value="'.$row['total_balance'].'" >';
              //Paid Amount
              $obj['13'] = '<input type="text" id="paid_amt-'.$i.'" class="form-control" value="'.$row['paid_amt'].'" onkeyup="paid_amt(this.id);">';
              //Out standing
              $obj['14'] = '<input type="text" id="outstanding-'.$i.'" class="form-control" value="'.$row['outstanding'].'" >';
              //Advance No
              $obj['15'] = '<input type="text" id="advance_no-'.$i.'" class="form-control" value="'.$row['advance_no'].'" >';
              //credit no
              $obj['16'] = '<input type="text" id="credit_no-'.$i.'" class="form-control" value="'.$row['credit_no'].'" >';
              //debit no
              $obj['17'] = '<input type="text" id="debit_no-'.$i.'" class="form-control" value="'.$row['debit_no'].'" >';
              //branch
              $obj['18'] = '<input type="text" id="branch-'.$i.'" class="form-control" value="branch" >';
             /* //Advance Amt
              $obj['19'] = '<input type="text" id="advance_amt-'.$i.'" class="form-control" value="0" >';
              //credit Amt
              $obj['20'] = '<input type="text" id="credit_amt-'.$i.'" class="form-control" value="0" >';
              //debit Amt
              $obj['21'] = '<input type="text" id="debit_amt-'.$i.'" class="form-control" value="0" >';*/
              //return no
              $obj['19'] = '<input type="text" id="return_no-'.$i.'" class="form-control" value="0" >';
              //return Amt
              //$obj['23'] = '<input type="text" id="return_amt-'.$i.'" class="form-control" value="0" >';
              //Bank Charges
              $obj['20'] = '<input type="text" id="hidden_remain_qty-'.$i.'" class="form-control" value="0" >';
              $i++;
              array_push($data, $obj);
            // }
        }
        $response['data'] = $data;
  //     }
      
  // }

  
    
}
  


  echo json_encode($response);
?>