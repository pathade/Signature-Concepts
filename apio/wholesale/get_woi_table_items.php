<?php 
    header('Content-Type: application/json'); 

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        extract($_POST);
        include '../../database/dbconnection.php';
        //echo "selected id ttrgrtg:".print_r($ids);
        $count_id = sizeof($ids);
        $data = array();
        $count=1;
        $start = 0;
        $i=0;
        for($ik = 0;$ik<$count_id;$ik++)
        {
          $select_item_id = $ids[$ik];

           $sql = "SELECT woi.*
          from wholesale_work_order_items woi
          WHERE woi.work_order_no_id_fk='$itemId' AND woi.item_id_fk='$select_item_id'";
          $result = mysqli_query($db, $sql) or die(mysqli_error($db));
          
          if(mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_array($result))
            { 
                // select item category
                $select_cat = "SELECT item_type, final_product_code,discount_lock,item_id_pk, nks_code, design_code 
                FROM mstr_item WHERE item_id_pk='".$row['item_id_fk']."'";
                $result1 = mysqli_fetch_array(mysqli_query($db, $select_cat));
                $ds = $result1['nks_code']."-".$result1['design_code'];
                $obj = array();
                // $obj['0'] = $start++;          
                $qty= $row['qty'];
                $rate= $row['rate'];
                $amount= $row['amount'];
                $amount= $row['amount'];
                $amount= $row['amount'];

                //$row['po_suppliertbl'] != "" || 

                if($row['po_suppliertbl'] != 0)
                {
                  $sup_s = "SELECT * 
                  FROM mstr_supplier 
                  WHERE supplier_id_fk='".$row['po_suppliertbl']."'";
                  $sred = mysqli_query($db,$sup_s);
                  while($mlk = mysqli_fetch_array($sred))
                  {
                    $sup_n = $mlk['name'];
                  }
                }
                else
                {
                  $sup_n = "";
                }

                $obj['0'] = '';
                //product category
                $obj['1'] = '<input readonly="" type="text" id="category-"'.$start.'" class="form-control" value="'.$result1['0'].'" style="border: white;background-color: white;">';
                //product Design
                $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$start.'" class="form-control" value="'.$ds.'" style="border: white;background-color: white;">';
                //Size
                // $obj['2'] = "<select class='form-control select2' data-toggle='select2'><option value='".$row['size']."'>".$row['size']."</option></select>";
                // '<input type="number" class="form-control" min="0" style="width:auto" id="size-'.$start.'" value="'.$row['size'].'" oninput="get_quantity_value(this.id)"; />
                // ';
                $obj['3'] = '<input type="text" class="form-control" min="0" id="size-'.$start.'" value="'.$row['size'].'" oninput=""; style="border: white;background-color: white;width:auto;"/>
                ';
                //Qty
                $obj['4'] = '<input type="number" class="form-control" min="0"  style="border: white;background-color: white;width:auto;width:auto;" id="quantity-'.$start.'" value="'.$qty.'" oninput="get_quantity_value(this.id)"; />';
                //Sqft
                $obj['5'] = "<input type='text' class='form-control' readonly value=".$row['sqrfit']." style='border: white;background-color: white;width:auto;width:auto;'/>";
                //Rate
                $obj['6'] ='<input type="number" class="form-control" min="0" style="border: white;background-color: white;width:auto;width:auto;" id="rate-'.$start.'" value="'.$rate.'" onkeyup="rate_enter(this.id);" />';
                //Discount %
                $obj['7'] = "<input type='number' class='form-control' id='table_discount_per-".$start."' value=".$row['disc_per']." onkeyup='get_row_discount_value1(this.id)' style='border: white;background-color: white;width:auto;width:auto;'/>";
                //Discount Rs.
                $obj['8'] = "<input type='number' class='form-control' id='table_discount_rs-".$start."' value=".$row['disc_rs']." onkeyup='get_row_discount_value(this.id)' style='border: white;background-color: white;width:auto;width:auto;'/>";
                //Amount
                $obj['9'] ='<input type="text" class="form-control" readonly  id="amount-'.$start.'" value="'.$amount.'" style="border: white;background-color: white;width:auto;width:auto;"/>';
                //Remark
                $obj['10'] ='<input type="text" class="form-control"  id="remark'.$start.'" value="'.$row['remark'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';
                if($row['checkbo_valtbl'] == 'po_yes')
                {
                    $checkbox = '<input type="checkbox" class="d-non"  checked id="myCheck-'.$start.'" value="'.$row['checkbo_valtbl'].'" onclick="myFunction(this.id)"/>';
                }
                else
                {
                    $checkbox = '<input type="checkbox" class="d-non"  id="myCheck-'.$start.'" value="'.$row['checkbo_valtbl'].'" onclick="myFunction(this.id)"/>';
                }
                //$obj['10'] = '<input type="checkbox" name="po_yes" value="po_yes" id="myCheck-'.$start.'" onclick="myFunction(this.id)">';//$row['7'];//rate
                //PO checkbox
                $obj['11'] = $checkbox;
                //Supplier Dropdown
                //$obj['11'] ='<input type="text" readonly class="form-control d-non" id="posupplier-'.$start.'" value="'.$row['po_suppliertbl'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';
                $obj['12'] = '<select class="form-control" id="posupplier-'.$start.'" onchange="Supplier_select_po_generation(this.id)">
                <option value="'.$row['po_suppliertbl'].'">'.$sup_n.'</option>
                </select>';
                //PO No
                $obj['13'] ='<input type="text" readonly class="form-control d-non" id="pono-'.$start.'" value="'.$row['po_notbl'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';
                //Product Locks
                $obj['15'] = '<input type="text" id="discount_lock-'.$i.'" class="form-control" value="'.$result1['discount_lock'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';//$row['3'];//qty
                //Product Id
                $obj['14'] = '<input type="text" id="product_id-'.$i.'" class="form-control" value="'.$result1['item_id_pk'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';//$row['3'];//qty
                array_push($data, $obj);
                $count++;
                $start++;
            }
          }
          else
          {
             $sql = "SELECT * FROM mstr_item WHERE item_id_pk='$select_item_id'";
            $g = mysqli_query($db,$sql);
            while($row = mysqli_fetch_array($g))
            {
                $obj['0'] = '';
                $ds = $row['nks_code']."-".$row['design_code'];
                //product category
                $obj['1'] = '<input readonly="" type="text" id="category-"'.$start.'" class="form-control" value="'.$row['item_type'].'" style="border: white;background-color: white;">';
                //product Design
                $obj['2'] = '<input readonly="" type="text" id="item_id-"'.$start.'" class="form-control" value="'.$ds.'" style="border: white;background-color: white;">';
                //Size
                $obj['3'] = '<input readonly="" type="text" id="size-"'.$start.'" class="form-control" value="'.$row['size'].'" style="border: white;background-color: white;">';
                //Qty
                $obj['4'] = '<input type="text" id="quantity-'.$start.'" class="form-control" value="0" onkeyup="get_quantity_value(this.id);"  style="border: white;background-color: white;">';//account
                //Sqft
                $obj['5'] = '<input type="text"  id="sqrft-'.$start.'" class="form-control" value="0" onkeyup="" style="border: white;background-color: white;width:auto;width:auto;">';//$row['3'];//qty
                //Rate
                $obj['6'] = '<input type="text" id="rate-'.$start.'"  class="form-control" value="'.$row['sale_rate'].'" onkeyup="rate_enter(this.id);" style="border: white;background-color: white;width:auto;width:auto;">';
                //Discount %
                $obj['7'] = '<input type="text" id="table_discount_per-'.$start.'" class="form-control" value="0" onkeyup="get_row_discount_value1(this.id);" style="border: white;background-color: white;width:auto;width:auto;">';
                //Discount Rs.
                $obj['8'] = '<input type="text" id="table_discount_rs-'.$start.'" class="form-control" value="0" style="border: white;background-color: white;" onkeyup="get_row_discount_value(this.id);" style="border: white;background-color: white;width:auto;width:auto;">';//$row['4'];//length
                //Amount
                $obj['9'] = '<input type="text" id="amount-'.$start.'" class="form-control" value="0" style="border: white;background-color: white;">';//$row['5'];//breadth
                //Remark
                $obj['10'] = '<input type="text" onkeyup="" id="remark-'.$start.'" class="form-control" value="" style="border: white;background-color: white;">';//$row['6'];//sqft
                //PO checkbox
                $obj['11'] = '<input type="checkbox" name="po_yes" value="po_yes" id="myCheck-'.$start.'" onclick="myFunction(this.id)">';//$row['7'];//rate
                //Supplier Dropdown
                $obj['12'] = '<select class="form-control" id="posupplier-'.$start.'" onchange="Supplier_select_po_generation(this.id)">
                </select>';//$row['8'];//dis_per
                //PO No
                $obj['13'] = '<input type="text" id="pono-'.$start.'" class="form-control" value="" style="border: white;background-color: white;width:auto;width:auto;"/>';//$row['3'];//qty
                //Product Locks
                $obj['15'] = '<input type="text" id="discount_lock-'.$start.'" class="form-control" value="'.$row['discount_lock'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';//$row['3'];//qty
                //Product Id
                $obj['14'] = '<input type="text" id="product_id-'.$start.'" class="form-control" value="'.$row['item_id_pk'].'" style="border: white;background-color: white;width:auto;width:auto;"/>';//$row['3'];//qty
                $i++;
                $start++;
                array_push($data, $obj);
                
            }
          }
          $response['data'] = $data;
        }
        
    }
    else
        $response['error'] = "Data Not Found...!!!";  
    echo json_encode($response); 


?>   





















