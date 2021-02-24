<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    //echo $dc_id_array;

    
    $cgst_amt = 0;
    $igst_amt_final = 0;

    
    
    //echo "*********";
    

    $sql = "SELECT * FROM wholsale_delivery_challan_items as woi,mstr_item as i 
    WHERE woi.item_id_fk= i.item_id_pk AND woi.dc_id_fk='$dc_id'
    ";
    $data = array();
    $result = mysqli_query($db, $sql);
    $start = 1;
    $i = 1;
    while ($row = mysqli_fetch_array($result))
    {
        //echo "i is :".$i;
        //echo "<br>";
        $sname = "";
        $cust_id_fk = $row['cust_id_fk'];
        //$amt_custom = $row['remaining_qty'] * $row['rate'];
        $sup_sql ='SELECT * FROM mstr_supplier WHERE supplier_id_fk="'.$row['supplier_id_fk'].'"';
        $s_res = mysqli_query($db,$sup_sql);
        while($srw = mysqli_fetch_array($s_res))
        {
            $sname = $srw['name'];
        }

        $sup_sql ='SELECT * FROM tbl_wholesale_customer WHERE wc_id_pk="'.$row['cust_id_fk'].'"';
        $s_res = mysqli_query($db,$sup_sql);
        while($srw = mysqli_fetch_array($s_res))
        {
            $igst_app = $srw['igst_app'];

            


        }

            $sup_sql1 ='SELECT * FROM mstr_item WHERE item_id_pk="'.$row['item_id_fk'].'"';
            $s_res1 = mysqli_query($db,$sup_sql1);
            while($srw1 = mysqli_fetch_array($s_res1))
            {
                $gst_group1 = $srw1['gst_group'];
            }

            if($igst_app == 1)
            {
                //calculate IGST
                $igst_amt = $gst_group1 * $row['amount'];
                $igst_amt_final = $igst_amt / 100;
            }
            else
            {
                //calculate cgst and sgst
                $gst_amt = $gst_group1 * $row['amount'];
                $gst_amt_final = $gst_amt / 100;
                $cgst_amt = $gst_amt_final /2;
                
            }

        
        $obj = array();
        //delete
        $obj['0'] = $row['0'];
        //product category
        $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['1'].'" style="border: white;background-color: white;">';
        //selected item
        $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['design_code'].'" style="border: white;background-color: white;">';
        //size
        $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['size'].'" readonly="" style="border: white;background-color: white;">';//account
        //qty
        $obj['4'] = '<input type="text" readonly="" id="quantity-'.$i.'" class="form-control" value="'.$row['deliverd_qty'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
        // //return Qty
        // $obj['5'] = '<input type="text" id="return_quantity-'.$i.'"  class="form-control" value="0" onkeyup="return_qty(this.id);" >';//$row['3'];//qty
        // //remain qty
        // $obj['6'] = '<input type="text" id="remain_quantity-'.$i.'" class="form-control" value="'.$row['deliverd_qty'].'" readonly="" >';//$row['3'];//qty
        //sqft
        $obj['5'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['sqrfit'].'" style="border: white;background-color: white;">';//$row['4'];//length
        //rate
        $obj['6'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['rate'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
        //discount
        $obj['7'] = '<input type="text" onkeyup="get_row_discount_value1(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['disc_per'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
        //disc rs
        $obj['8'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['disc_rs'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
        //amt
        $obj['9'] = '<input type="text" id="amount-'.$i.'" readonly="" class="form-control" value="'.$row['amount'].'" >';//$row['8'];//dis_per
        //return amount
        //$obj['12'] = '<input type="text" id="return_amt-'.$i.'" class="form-control" value="0" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
        //remark
        $obj['10'] = '<input type="text" id="remark-'.$i.'" readonly = "" class="form-control" value="'.$row['remark'].'" >';//$row['9'];//dic_rs
        //hidden item id
        $obj['11'] = '<input type="text" id="hidden_id-'.$i.'" class="form-control" value="'.$row['item_id_fk'].'" >';//$row['9'];//dic_rs
        //GST %
        // $obj['15'] = '<input type="text" id="gst_per-'.$i.'" class="form-control" value="'.$gst_group1.'" >';//$row['9'];//dic_rs
        // //cGST amt
        // $obj['16'] = '<input type="text" id="cgst_amt-'.$i.'" class="form-control" value="'.$cgst_amt.'" >';//$row['9'];//dic_rs
        // //sGST %
        // $obj['17'] = '<input type="text" id="agst_amt-'.$i.'" class="form-control" value="'.$cgst_amt.'" >';//$row['9'];//dic_rs
        // //igst amt
        // $obj['18'] = '<input type="text" id="igst_amt-'.$i.'" class="form-control" value="'.$igst_amt_final.'" >';//$row['9'];//dic_rs
        // //dc id pk
        // $obj['19'] = '<input type="text" id="dc_id_hidden-'.$i.'" class="form-control" value="'.$dc_id.'" >';//$row['9'];//dic_rs
        $i++;
        array_push($data, $obj);
        
    }
    //echo "dataaa is:";print_r($data);echo "<br>";
    $response['data'] = $data;
        
    
    echo json_encode($response);
    

?>