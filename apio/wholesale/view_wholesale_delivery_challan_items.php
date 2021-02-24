<?php
    include('../../database/dbconnection.php'); 
    extract($_POST);

    $sql = "SELECT * FROM wholsale_delivery_challan_items as woi,mstr_item as i 
        WHERE woi.item_id_fk= i.item_id_pk AND woi.dc_id_fk='$id'
        ";
        
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

                echo 
                "<tr>
                    <td>".$row['1']."</td>
                    <td>".$row['design_code']."</td>
                    <td>".$row['size']."</td>
                    <td>".$row['deliverd_qty']."</td>
                    <td>".$row['sqrfit']."</td>
                    <td>".$row['rate']."</td>
                    <td>".$row['disc_per']."</td>
                    <td>".$row['disc_rs']."</td>
                    <td>".$row['amount']."</td>
                    <td>".$row['remark']."</td>
                </tr>";
            
        }

    // $sql = "SELECT * FROM wholsale_delivery_challan_items WHERE dc_id_fk='$id'";
    // $res = mysqli_query($db,$sql);
    // while($rw = mysqli_fetch_array($res))
    // {
    //     echo 
    //     "<tr>
    //         <td>category</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //         <td>qty</td>
    //     </tr>";
    // }


?>