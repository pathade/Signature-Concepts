<?php 
header('Content-Type: application/json'); 
$response = array();
session_start();
$flag = $_SESSION['flag'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('../../database/dbconnection.php');
    extract($_POST);

    if($action == "Wholesale Customer")
    {
        //echo "jjj";
        if($flag == 0) {
        $sql = "SELECT cust_name,gst_no,wc_id_pk 
        FROM tbl_wholesale_customer where flag='0' order by wc_id_pk DESC";
        }
        else {
            $sql = "SELECT cust_name,gst_no,wc_id_pk 
        FROM tbl_wholesale_customer where flag='1' order by wc_id_pk DESC";
        }
        $data = array();
        $result = mysqli_query($db, $sql);
        if($result)
        {
            $i=0;
            $s = 1;
            while($k = mysqli_fetch_array($result))
            {
                $obj = array();
                //delete
                $obj['0'] = '<input contenteditable="true" readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$s++.'" style="border: white;background-color: white;">';;
                //cust name
                $obj['1'] = '<input contenteditable="true"  type="text" id="category-"'.$i.'" class="form-control" value="'.$k["cust_name"].'" style="border: white;background-color: white;">';
                //GST no
                $obj['2'] = '<input contenteditable="true"  type="text" id="item_id-"'.$i.'" class="form-control" value="'.$k["gst_no"].'" style="border: white;background-color: white;">';
                //hidden no
                $obj['3'] = '<input contenteditable="true" style="display:none;" type="text" id="size-'.$i.'" class="form-control" value="'.$k["wc_id_pk"].'"  style="border: white;background-color: white;">';//account
                $i++;
                array_push($data, $obj);
                /*echo '<thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Customer Name</th>
                                <th>GST No</th>
                                <th>hidden id</th>
                            </tr>
                        </thead>';
                $sr_no = 1;
                while($k = mysqli_fetch_array($result))
                {
                    echo '
                            <tbody>
                                <tr>
                                    <td contenteditable="true">'.$sr_no++.'</td>
                                    <td contenteditable="true">'.$k["cust_name"].'</td>
                                    <td contenteditable="true">'.$k["gst_no"].'</td>
                                    <td contenteditable="true">'.$k["wc_id_pk"].'</td>
                                </td>
                            </tbody>';
                }*/
                
            }
            $response['data'] = $data;
        }
        else
        {
            $response['error'] = "Data Not Found...!!!";  
        }
        echo json_encode($response);
    }
    else if($action == "Supplier")
    {
        //echo "jjj";
        if($flag == 0) {
        $sql = "SELECT name,gst_no,supplier_id_fk 
        FROM mstr_supplier where flag='0' order by supplier_id_fk DESC";
        }
        else {
            $sql = "SELECT name,gst_no,supplier_id_fk 
        FROM mstr_supplier where flag='1' order by supplier_id_fk DESC";
        }
        $data1 = array();
        $result = mysqli_query($db, $sql);
        if($result)
        {
            $i=0;
            $s = 1;
            while($k = mysqli_fetch_array($result))
            {
                $obj = array();
                //delete
                $obj['0'] = '<input contenteditable="true" readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$s++.'" style="border: white;background-color: white;">';;
                //cust name
                $obj['1'] = '<input contenteditable="true"  type="text" id="category-"'.$i.'" class="form-control" value="'.$k["name"].'" style="border: white;background-color: white;">';
                //GST no
                $obj['2'] = '<input contenteditable="true"  type="text" id="item_id-"'.$i.'" class="form-control" value="'.$k["gst_no"].'" style="border: white;background-color: white;">';
                //hidden no
                $obj['3'] = '<input contenteditable="true" style="display:none;" type="text" id="size-'.$i.'" class="form-control" value="'.$k["supplier_id_fk"].'"  style="border: white;background-color: white;">';//account
                $i++;
                array_push($data1, $obj);
                /*echo '<thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Customer Name</th>
                                <th>GST No</th>
                                <th>hidden id</th>
                            </tr>
                        </thead>';
                $sr_no = 1;
                while($k = mysqli_fetch_array($result))
                {
                    echo '
                            <tbody>
                                <tr>
                                    <td contenteditable="true">'.$sr_no++.'</td>
                                    <td contenteditable="true">'.$k["cust_name"].'</td>
                                    <td contenteditable="true">'.$k["gst_no"].'</td>
                                    <td contenteditable="true">'.$k["wc_id_pk"].'</td>
                                </td>
                            </tbody>';
                }*/
                
            }
            $response['data'] = $data1;
        }
        else
        {
            $response['error'] = "Data Not Found...!!!";  
        }
        echo json_encode($response);
    }
    else if($action == "Produt")
    {
        //echo "jjj";
        if($flag == 0) {
        $sql = "SELECT final_product_code,gst_group,item_id_pk 
        FROM mstr_item order where flag='0' by item_id_pk DESC";
        }
        else {
             $sql = "SELECT final_product_code,gst_group,item_id_pk 
        FROM mstr_item order where flag='1' by item_id_pk DESC";
        }
        $data1 = array();
        $result = mysqli_query($db, $sql);
        if($result)
        {
            $i=0;
            $s = 1;
            while($k = mysqli_fetch_array($result))
            {
                $obj = array();
                //delete
                $obj['0'] = '<input contenteditable="true" readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$s++.'" style="border: white;background-color: white;">';;
                //cust name
                $obj['1'] = '<input contenteditable="true"  type="text" id="category-"'.$i.'" class="form-control" value="'.$k["final_product_code"].'" style="border: white;background-color: white;">';
                //GST no
                $obj['2'] = '<input contenteditable="true"  type="text" id="item_id-"'.$i.'" class="form-control" value="'.$k["gst_group"].'" style="border: white;background-color: white;">';
                //hidden no
                $obj['3'] = '<input contenteditable="true" style="display:none;" type="text" id="size-'.$i.'" class="form-control" value="'.$k["item_id_pk"].'"  style="border: white;background-color: white;">';//account
                $i++;
                array_push($data1, $obj);
                /*echo '<thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Customer Name</th>
                                <th>GST No</th>
                                <th>hidden id</th>
                            </tr>
                        </thead>';
                $sr_no = 1;
                while($k = mysqli_fetch_array($result))
                {
                    echo '
                            <tbody>
                                <tr>
                                    <td contenteditable="true">'.$sr_no++.'</td>
                                    <td contenteditable="true">'.$k["cust_name"].'</td>
                                    <td contenteditable="true">'.$k["gst_no"].'</td>
                                    <td contenteditable="true">'.$k["wc_id_pk"].'</td>
                                </td>
                            </tbody>';
                }*/
                
            }
            $response['data'] = $data1;
        }
        else
        {
            $response['error'] = "Data Not Found...!!!";  
        }
        echo json_encode($response);
    }
    else if($action == "Retail Customer")
    {
        //echo "jjj";
        if($flag == 0) {
        $sql = "SELECT retail_cust_name,gst_no,retail_cust_idpk 
        FROM mstr_retail_customer where flag='0' order by retail_cust_idpk DESC";
        }
        else {
             $sql = "SELECT retail_cust_name,gst_no,retail_cust_idpk 
        FROM mstr_retail_customer where flag='1' order by retail_cust_idpk DESC";
        }
        $data1 = array();
        $result = mysqli_query($db, $sql);
        if($result)
        {
            $i=0;
            $s = 1;
            while($k = mysqli_fetch_array($result))
            {
                $obj = array();
                //delete
                $obj['0'] = '<input contenteditable="true" readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$s++.'" style="border: white;background-color: white;">';;
                //cust name
                $obj['1'] = '<input contenteditable="true"  type="text" id="category-"'.$i.'" class="form-control" value="'.$k["retail_cust_name"].'" style="border: white;background-color: white;">';
                //GST no
                $obj['2'] = '<input contenteditable="true"  type="text" id="item_id-"'.$i.'" class="form-control" value="'.$k["gst_no"].'" style="border: white;background-color: white;">';
                //hidden no
                $obj['3'] = '<input contenteditable="true" style="display:none;" type="text" id="size-'.$i.'" class="form-control" value="'.$k["retail_cust_idpk"].'"  style="border: white;background-color: white;">';//account
                $i++;
                array_push($data1, $obj);
                /*echo '<thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Customer Name</th>
                                <th>GST No</th>
                                <th>hidden id</th>
                            </tr>
                        </thead>';
                $sr_no = 1;
                while($k = mysqli_fetch_array($result))
                {
                    echo '
                            <tbody>
                                <tr>
                                    <td contenteditable="true">'.$sr_no++.'</td>
                                    <td contenteditable="true">'.$k["cust_name"].'</td>
                                    <td contenteditable="true">'.$k["gst_no"].'</td>
                                    <td contenteditable="true">'.$k["wc_id_pk"].'</td>
                                </td>
                            </tbody>';
                }*/
                
            }
            $response['data'] = $data1;
        }
        else
        {
            $response['error'] = "Data Not Found...!!!";  
        }
        echo json_encode($response);
    }
    else
    {

    }
}

  /*$sql = "SELECT * FROM wholesale_work_order_items as woi,mstr_item as i 
  WHERE woi.item_id_fk= i.item_id_pk AND work_order_no_id_fk='$edit_id'
  ";
  $data = array();
  $result = mysqli_query($db, $sql);
  $start = 1;
  $i = 0;

  while ($row = mysqli_fetch_array($result))
  {
    $sname = "";
      $sup_sql ='SELECT * FROM mstr_supplier WHERE supplier_id_fk="'.$row['14'].'"';
      $s_res = mysqli_query($db,$sup_sql);
      while($srw = mysqli_fetch_array($s_res))
      {
        $sname = $srw['name'];
      }
      $obj = array();
      //$obj['0'] = $row['0'];
      // $obj['0'] = $row['0'];
      // $obj['1'] = $row['0'];
      //delete
      $obj['0'] = $row['0'];
      //product category
      $obj['1'] = '<input readonly="" type="text" id="category-"'.$i.'" class="form-control" value="'.$row['11'].'" style="border: white;background-color: white;">';
      //selected item
      $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$i.'" class="form-control" value="'.$row['20'].'" style="border: white;background-color: white;">';
     
      //$obj['3'] = $row['17']; //item name
      //size
      $obj['3'] = '<input type="text" id="size-'.$i.'" class="form-control" value="'.$row['22'].'" readonly="" style="border: white;background-color: white;">';//account
      //qty
      $obj['4'] = '<input type="text" id="quantity-'.$i.'" class="form-control" value="'.$row['3'].'" onkeyup="get_quantity_value(this.id);" >';//$row['3'];//qty
      //sqft
      $obj['5'] = '<input type="text" id="sqrft-'.$i.'" class="form-control" value="'.$row['5'].'" style="border: white;background-color: white;">';//$row['4'];//length
      //rate
      $obj['6'] = '<input type="text" id="rate-'.$i.'" class="form-control" value="'.$row['6'].'" style="border: white;background-color: white;">';//$row['5'];//breadth
      //discount
      $obj['7'] = '<input type="text" onkeyup="get_row_discount_value12(this.id)" id="table_discount_per-'.$i.'" class="form-control" value="'.$row['7'].'" style="border: white;background-color: white;">';//$row['6'];//sqft
      //disc rs
      $obj['8'] = '<input type="text" id="table_discount_rs-'.$i.'" onkeyup="get_row_discount_value(this.id)" class="form-control" value="'.$row['8'].'" style="border: white;background-color: white;" readonly>';//$row['7'];//rate
      //amt
      $obj['9'] = '<input type="text" id="amount-'.$i.'" class="form-control" value="'.$row['9'].'" >';//$row['8'];//dis_per
      //remark
      $obj['10'] = '<input type="text" id="remark-'.$i.'" class="form-control" value="'.$row['12'].'" >';//$row['9'];//dic_rs
      
      //po
      //$obj['11'] = '<input  type="text" id="amount-'.$i.'" class="form-control" value="'.$row['13'].'" style="border: white;background-color: white;" readonly="">';//$row['10'];//amount
      
        if($row['13']==='po_yes')
        {
          $obj['11'] ='<input type="checkbox" id="myCheck-'.$i.'" name="po_yes" value="po_yes"  onclick="myFunction(this.id)" checked>';
        }
        else
        {
            
          $obj['11'] ='<input type="checkbox" name="po_yes" value="po_no" id="myCheck-'.$i.'" onclick="myFunction(this.id)">';
            
        }
      
      
      //supplier
      //$obj['12'] = '<input  type="text" id="posupplier-'.$i.'" class="form-control" value="'.$row['14'].'" style="border: white;background-color: white;" readonly="">';//$row['10'];//amount
      // $d = "SELECT * FROM mstr_supplier order by supplier_id_fk DESC";
      // $dres = mysqli_query($db,$d);
      // while($drw = mysqli_fetch_array($dres))
      // {
      //   $obj['12'] = '<select class="form-control" id="posupplier-'.$i.'" onchange="Supplier_select_po_generation(this.id)"><option value="'.$drw['0'].'">'.$drw['1'].'</option></select>';
      // }
      $obj['12'] = '<select class="form-control" id="posupplier-'.$i.'" onchange="Supplier_select_po_generation(this.id)"><option value="'.$row['14'].'">'.$sname.'</option></select>';
      //$obj['12'] = '<select><option></option></select>';
      //po no
      $obj['13'] = '<input  type="text" id="pono-'.$i.'" class="form-control" value="'.$row['15'].'" style="border: white;background-color: white;" readonly="">';//$row['10'];//amount
      $obj['14'] = '<input  type="text" id="pono-'.$i.'" class="form-control" value="'.$row['1'].'" style="border: white;background-color: white;display:none;" readonly="">';//$row['10'];//amount
      $i++;
      array_push($data, $obj);
  }
   $response['data'] = $data;
}
else
  $response['error'] = "Data Not Found...!!!";  
echo json_encode($response);*/
?>