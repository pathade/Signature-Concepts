<?php 
session_start();
$flag=$_SESSION['flag'];
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST') 
{

    extract($_POST);
    include '../../database/dbconnection.php';

     $sql = "SELECT * FROM `retail_tax_invoice_items` 
    WHERE rti_id_fk='".$_POST['pur_order_no']."' 
    ORDER BY `id_pk` ASC";

    $k123 = mysqli_query($db,$sql);
    while($klrw = mysqli_fetch_array($k123))
    {
        $rti_id_fk = $klrw['rti_id_fk'];
        $sql1 = "SELECT * FROM retail_proforma WHERE id_pk='$rti_id_fk'";
        $kli1 = mysqli_query($db,$sql1);
        while($klrw1 = mysqli_fetch_array($kli1))
        {
            $customer_id = $klrw1['customer'];
        }
        $get_igst = "SELECT igst_app FROM mstr_retail_customer 
        WHERE retail_cust_idpk='$customer_id'";
        $res_igst = mysqli_fetch_row(mysqli_query($db, $get_igst));
        $data = array();
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        $i=1;
        //echo "PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPpp";



        //echo "kkkkkkkkkkkkkkkkkkkkkk";
        $get_product_design = "SELECT final_product_code 
        FROM mstr_item WHERE item_id_pk='".$klrw['product_design']."'";
        $res = mysqli_fetch_array(mysqli_query($db, $get_product_design));
  
        if($flag==1)
        {
            $gst_per = 0;
            $cgst = 0;
            $sgst = 0;
            $igst = 0;
        }
        else if($flag==0)
        {      
        if($res_igst[0] == 1)
        {
          $gst_per = 18;
          $cgst = ($klrw['amount'] * 18 / 100)/2;
          $sgst = ($klrw['amount'] * 18 / 100)/2;
          $igst = $cgst + $sgst;
        }
        else 
        {
          $gst_per = 18;
          $cgst = 0.00;
          $sgst = 0.00;
          $igst = $klrw['amount'] * 18 / 100;
        }
        }
     
        $obj = array();
       
        $obj['start'] = $i++;
        $obj['id'] = $klrw['id_pk'];
        $obj['product_category'] = $klrw['product_cat'];
        $obj['item_id_fk'] = $klrw['product_design'];
        $obj['product_design'] = $res['0'];
        $obj['size'] = $klrw['size'];
        $obj['qty'] = $klrw['qty'];
        $obj['rate'] = $klrw['rate'];
        $obj['amount'] = $klrw['amount'];
        $obj['gst_per'] = $gst_per;
        $obj['cgst'] = $cgst;
        $obj['sgst'] = $sgst;
        $obj['igst'] = $igst;
        $obj['remark'] = $klrw['remark'];
        $obj['disc_per'] = $klrw['disc_per'];
        $obj['disc_rs'] = $klrw['disc_rs'];
        $obj['sqfit'] = $klrw['sqfit'];
        $obj['orderqty'] = $klrw['qty'];
        $obj['rpid'] = $klrw['id_pk'];
       
        array_push($response, $obj);
    }
    //echo "mmmmmmmmmm";
    //}

    
    // while($row=mysqli_fetch_array($k123))
    // {
    //     echo "kkkkkkkkkkkkkkkkkkkkkk";
    //     echo $get_product_design = "SELECT final_product_code 
    //     FROM mstr_item WHERE item_id_pk='".$row['product_design']."'";
    //     $res = mysqli_fetch_array(mysqli_query($db, $get_product_design));
  
        
    //     if($res_igst[0] == 1)
    //     {
    //       $gst_per = 18;
    //       $cgst = ($row['amount'] * 18 / 100)/2;
    //       $sgst = ($row['amount'] * 18 / 100)/2;
    //       $igst = $cgst + $sgst;
    //     }
    //     else 
    //     {
    //       $gst_per = 18;
    //       $cgst = 0.00;
    //       $sgst = 0.00;
    //       $igst = $row['amount'] * 18 / 100;
    //     }
     
    //     $obj = array();
       
    //     $obj['start'] = $i++;
    //     $obj['id'] = $row['id_pk'];
    //     $obj['product_category'] = $row['product_cat'];
    //     $obj['item_id_fk'] = $row['product_design'];
    //     $obj['product_design'] = $res['0'];
    //     $obj['size'] = $row['size'];
    //     $obj['qty'] = $row['qty'];
    //     $obj['rate'] = $row['rate'];
    //     $obj['amount'] = $row['amount'];
    //     $obj['gst_per'] = $gst_per;
    //     $obj['cgst'] = $cgst;
    //     $obj['sgst'] = $sgst;
    //     $obj['igst'] = $igst;
    //     $obj['remark'] = $row['remark'];
    //     $obj['disc_per'] = $row['disc_per'];
    //     $obj['disc_rs'] = $row['disc_rs'];
    //     $obj['sqfit'] = $row['sqfit'];
    //     $obj['orderqty'] = $row['qty'];
    //     $obj['rpid'] = $row['id_pk'];
       
    //     array_push($response, $obj);
    // }
    // echo "mmmmmmmmmm";
}
else
{
    $response['error'] = "Data Not Found...!!!"; 
} 
echo json_encode($response);
  
  
?>
  