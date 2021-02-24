<?php
    include('../../database/dbconnection.php');

    extract($_POST);

    if(strcasecmp($val, 'wholesale') == 0)
    { 
        $sql = "SELECT * FROM tbl_wholesale_customer WHERE active_status=1";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        echo '<option value="">--Select--</option>';
        while($row=mysqli_fetch_row($res))
        {
            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
        }
    }

    else if(strcasecmp($val, 'retail') == 0)
    { 
        $sql = "SELECT * FROM mstr_retail_customer WHERE status=1";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        echo '<option value="">--Select--</option>';
        while($row=mysqli_fetch_row($res))
        {
            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
        }
    }

    else if(strcasecmp($val, 'supplier') == 0)
    { 
        $sql = "SELECT * FROM mstr_supplier WHERE status=1";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        echo '<option value="">--Select--</option>';
        while($row=mysqli_fetch_row($res))
        {
            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
        }
    }

    else if(strcasecmp($val, 'vendor') == 0)
    { 
        $sql = "SELECT * FROM mstr_vendor WHERE delete_status!=1";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        echo '<option value="">--Select--</option>';
        while($row=mysqli_fetch_row($res))
        {
            echo '<option value="'.$row[0].'">'.$row[2].'</option>';
        }
    }

?>