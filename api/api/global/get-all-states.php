<?php 
header('Content-Type: application/json'); 
$response = array();
if($_SERVER['REQUEST_METHOD']=='GET')
{
    extract($_GET);
    if(ctype_digit($draw))
    {
        $col = "id";
        switch($order[0]['column'])
        {
            case "2" : $col = "name";
                        break;
            default : $col = "id";
                        break;
        }
        $dir = $order[0]['dir'];
        $search = $search['value'];
        include '../../database/dbconnection.php';
        if($length != "-1")
            $sql = "SELECT name FROM mstr_state where d=1 and name like '%$search%' order by $col $dir limit $start, $length";
        else
            $sql = "SELECT name FROM mstr_state where d=1 and name like '%$search%' order by $col $dir";
        $result = mysqli_query($db, $sql);
        $start++;
        $data = array();
        if($result)
        {
            while ($row = mysqli_fetch_array($result))
            {
                $obj = array();
                $obj['1'] = "";
                $obj['0'] = $start++;
                $obj['2'] = $row['name'];
                array_push($data, $obj);
            }
            $response['draw'] = $draw;
            $result = mysqli_query($db, "SELECT id FROM mstr_state where d=1");
            $response['recordsTotal'] = mysqli_num_rows($result);
            $result = mysqli_query($db, "SELECT id FROM mstr_state where d=1 and name like '%$search%'");
            $response['recordsFiltered'] = mysqli_num_rows($result);
            $response['data'] = $data;
        }
        else
            $response['error'] = "Data Not Found..!!";
    }
    else
        $response['error'] = "Data Not Found...!!!";  
}
echo json_encode($response);
?>