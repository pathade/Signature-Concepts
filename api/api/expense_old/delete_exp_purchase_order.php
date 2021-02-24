<?php 
    include('../../database/dbconnection.php');
    extract($_POST);
    $delete_id = $_GET['id'];

    
    
    $sql = "DELETE exp_purchase_order , exp_item_po  FROM exp_purchase_order  INNER JOIN exp_item_po  
   WHERE exp_purchase_order.Id= exp_item_po.po_id_fk and exp_purchase_order.Id = '$delete_id'";
            
    $d = mysqli_query($db,$sql);


    if($d == 1)
    {
        //echo "1";
        ?>
    <script>
    // alert("Purchase Order Deleted!");
    window.location.href="../../src/expense/view_exp_purchase_order.php";
    </script>
        <?php
    }
    else{
        echo "0";
    }

?>