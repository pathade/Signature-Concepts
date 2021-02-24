<?php 
//header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  extract($_POST);
  include '../../database/dbconnection.php';
   session_start();
$flag = $_SESSION['flag'];

  if($action == "Wholesale Customer")
  {
    //echo "jjj";
    if($flag == 0) {
    $sql = "SELECT cust_name,gst_no,wc_id_pk FROM tbl_wholesale_customer where flag='0' order by wc_id_pk DESC";
    }
    else {
        $sql = "SELECT cust_name,gst_no,wc_id_pk FROM tbl_wholesale_customer where flag='1' order by wc_id_pk DESC";
    }
    $result = mysqli_query($db, $sql);

    echo '<thead>
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
    }
  }
  else if($action == "Supplier")
  {

  }
  else if($action == "Produt")
  {

  }
  else if($action == "Retail Customer")
  {

  }
  else
  {

  }
  
}
//echo json_encode($response);
?>