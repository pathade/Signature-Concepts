<?php
    include('../../database/dbconnection.php');

    extract($_POST);
    $response = array();

    // wholesale
    if(strcasecmp($category, 'wholesale')==0)
    {
        if($all_names == 'true')
        {
            $sql = "SELECT * FROM wholesale_ledger_main";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        else
        {
            $sql = "SELECT * FROM wholesale_ledger_main WHERE customer_id_fk='$name'";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['date'] = $row['date'];

            $get_cust = "SELECT cust_name FROM tbl_wholesale_customer WHERE wc_id_pk='".$row['customer_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_cust));
            $obj['customer'] = $res_cust['cust_name'];

            $obj['against'] = $row['against'];
            $obj['o_bal'] = 0.00;
            $obj['debit'] = $row['debit'];
            $obj['credit'] = $row['credit'];
            $obj['closing_detail'] = $row['opening_balance'];

            array_push($response, $obj);

        }
    }

    // retail
    if(strcasecmp($category, 'retail')==0)
    {
        if($all_names == 'true')
        {
            $sql = "SELECT * FROM retail_ledger_main";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        else
        {
            $sql = "SELECT * FROM retail_ledger_main WHERE customer_id_fk='$name'";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['date'] = $row['date'];

            $get_cust = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='".$row['customer_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_cust));
            $obj['customer'] = $res_cust['retail_cust_name'];

            $obj['against'] = $row['against'];
            $obj['o_bal'] = 0.00;
            $obj['debit'] = $row['debit'];
            $obj['credit'] = $row['credit'];
            $obj['closing_detail'] = $row['opening_balance'];
            
            array_push($response, $obj);

        }
    }

    // suppplier
    if(strcasecmp($category, 'supplier')==0)
    {
        if($all_names == 'true')
        {
            $sql = "SELECT * FROM purchase_ledger_main";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        else
        {
            $sql = "SELECT * FROM purchase_ledger_main WHERE customer_id_fk='$name'";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['date'] = $row['date'];

            $get_cust = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='".$row['customer_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_cust));
            $obj['customer'] = $res_cust['name'];

            $obj['against'] = $row['against'];
            $obj['o_bal'] = 0.00;
            $obj['debit'] = $row['debit'];
            $obj['credit'] = $row['credit'];
            $obj['closing_detail'] = $row['opening_balance'];
            
            array_push($response, $obj);

        }
    }

    // vendor
    if(strcasecmp($category, 'vendor')==0)
    {
        if($all_names == 'true')
        {

            $sql = "SELECT * FROM expense_ledger_main";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        else 
        {
            $sql = "SELECT * FROM expense_ledger_main WHERE customer_id_fk='$name'";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        }

        while($row = mysqli_fetch_assoc($res))
        {
            $obj = array();
            $obj['date'] = $row['date'];

            $get_cust = "SELECT first_name FROM mstr_vendor WHERE vendor_id_pk='".$row['customer_id_fk']."'";
            $res_cust = mysqli_fetch_assoc(mysqli_query($db, $get_cust));
            $obj['customer'] = $res_cust['first_name'];

            $obj['against'] = $row['against'];
            $obj['o_bal'] = 0.00;
            $obj['debit'] = $row['debit'];
            $obj['credit'] = $row['credit'];
            $obj['closing_detail'] = $row['opening_balance'];
            
            array_push($response, $obj);

        }
    }


    echo json_encode($response);

?>