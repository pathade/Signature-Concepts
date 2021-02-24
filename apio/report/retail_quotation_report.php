<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // if($supplier!='' || $po_no!='')
    // {
        // $sql = "SELECT * FROM purchase_order WHERE supplier_id_fk='$supplier' OR id='$po_no'";
        $sql = "SELECT * FROM retail_quotation";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['id'] = $row['id_pk'];

            $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_customer));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $obj['order_no'] = $row['order_no'];

            $obj['date'] = $row['date'];

            $obj['qty'] = $row['qty'];
        
            $obj['sqft'] = $row['sqfit'];

            $obj['net_amt'] = $row['net_amt'];

            $obj['created_by'] = $row['added_by'];

            $obj['create_date'] = $row['date'];

            if($row['del_status'] == 0){
                $obj['status'] = '<span class="text-success">A</span>';
            
            }
            else
                $obj['status'] = '<span class="text-danger">C</span>';

            array_push($response, $obj);

        }
        echo json_encode($response);
    // }

?>