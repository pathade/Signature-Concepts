<?php 
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
        include '../../database/dbconnection.php';
        session_start();
        $flag = $_SESSION['flag'];
        $sql= '';

        if($flag == 0) {
        $sql = "SELECT * 
                FROM `exp_pay_advice` as e,
                      mstr_vendor as v 
                where e.vendor_id_fk = v.vendor_id_pk and e.flag='0' and v.flag='0'
        ";
        }
        else {
            $sql = "SELECT * 
                FROM `exp_pay_advice` as e,
                      mstr_vendor as v 
                where e.vendor_id_fk = v.vendor_id_pk and e.flag='1' and v.flag='1'
        ";
        }

        $data = array();
        $result = mysqli_query($db, $sql);
        $count=1;
        $i = 0;

        while ($row = mysqli_fetch_array($result))
        {  
            $obj = array();
              $obj['0'] = '<input type="checkbox" value="'.$row['pa_id_pk'].'" class="form-control invoice_checkbox" id="invoice-'.$i.'" name="advance_no"  style="height: 20px;width: 20px;" />';
              //payment advice id
              $obj['1'] = '<input readonly="" type="text" id="invoice_no-"'.$i.'" class="form-control" value="'.$row['pa_id_pk'].'" style="border: white;background-color: white;">';
              //payment advice Date
              $obj['2'] = '<input readonly="" type="text" id="invoice_date-"'.$i.'" class="form-control" value="'.$row['pay_date'].'" style="border: white;background-color: white;">';
              //vendor Name
              $obj['3'] = '<input type="text" id="yr-'.$i.'" class="form-control" value="'.$row['saturation'].".".$row['first_name']." ".$row['first_name'].'" readonly="" style="border: white;background-color: white;">';
              //expense type
              $obj['4'] = '<input type="text" id="amt-'.$i.'" class="form-control" value="'.$row['type_vari'].'" onkeyup="get_quantity_value(this.id);" >';
              //expense Head
              $obj['5'] = '<input type="text" id="prev_paid-'.$i.'" class="form-control" value="'.$row['type_vari'].'" style="border: white;background-color: white;">';
              //Amount
              $obj['6'] = '<input type="text" id="balamt-'.$i.'" class="form-control" value="'.$row['total_payable_amt'].'" style="border: white;background-color: white;">';
              
            array_push($data, $obj);
            // $count++;
            // $start++;
            $i++;
        }
        $response['data'] = $data;
    }
    else
        $response['error'] = "Data Not Found...!!!";  
    echo json_encode($response); 
?>   





















