<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    extract($_POST);
    if(ctype_digit($draw))
    {
        $col = "tax_id_pk";
        switch($order[0]['column'])
        {
            case "3" : $col = "tax_name";
                        break;
            case "4" : $col = "tax_percentagfe";
                        break;
            case "5" : $col = "remark";
                        break;           
            default : $col = "tax_id_pk";
                        break;
        }
        $dir = $order[0]['dir'];
        $search = $search['value'];
        include '../../database/dbconnection.php';
        if($length != "-1")
          $sql = "SELECT * FROM mstr_tax";
        else
          $sql = "SELECT * FROM mstr_tax ";
        $result = mysqli_query($db, $sql);
        $start++;
        $data = array();
    
        if($result)
        {
           //echo "welcome";
            while ($row = mysqli_fetch_array($result))
            {
                $obj = array();
                $obj['0'] = $start++;
                $obj['1'] = "";
                $obj['2'] = $row['tax_name'];
                $obj['3'] = $row['tax_percentagfe'];
                $obj['4'] = $row['remark'];               
                if($row['d'] == 1)
                    $obj['5'] = "<span class=\"badge badge-success-lighten\">Active</span>";
                else
                    $obj['5'] = "<span class=\"badge badge-success-lighten\">In-Active</span>";
                $obj['6'] = "<form name=\"more\" action=\"update-process.php\" method=\"POST\">
                            <button type=\"submit\" name=\"more\" class=\"btn action-icon mdi mdi-square-edit-outline data-update\" value=".$row['id']."\" </button></form>";
                array_push($data, $obj);
            }
            $response['draw'] = $draw;
            $result = mysqli_query($db, "SELECT * FROM mstr_tax");
            $response['recordsTotal'] = mysqli_num_rows($result);
            $result = mysqli_query($db, "SELECT * FROM mstr_tax");
            $response['recordsFiltered'] = mysqli_num_rows($result);
            $response['data'] = $data;
        }
        else
            $response['error'] = "Data Not Found.1.!!";
    }
    else
        $response['error'] = "Data Not Found...!!!";  
}
echo json_encode($response);


?>