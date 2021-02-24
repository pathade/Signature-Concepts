
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

.redClass{
    background-color: rgba(255,0,0,.1) !important;
    color: #333 !important; 
}

.modal-header {
    background-color: #f7f7f7;
    padding: 20px;
}

.select1 .select2-container {
    width: -webkit-fill-available !important;
}

.green-text {
    color: #28a745!important;
}

.dataTables_wrapper table {
    display: block;
    width: 100%;
    min-height: .01%;
    overflow-x: auto;
}

.table td, .table th {
    border-bottom: 0px solid #E3EBF3;
}

@media (min-width: 320px) and (max-width: 600px) {
    .mobile-width {
        width: 33%;
    }
}

@media screen and (max-width: 640px) {
    div.dt-buttons {
        display: table;
    }
}
</style>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row" id="main">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.475rem;">
                        <div class="card-content">
                            <div class="card-body" style="padding: 0.5rem;">
                                <div class="row" style="margin: 0;">
                                    <div class="col-lg-2 col-md-2 col-sm-2 mobile-width border-right-blue-grey border-right-lighten-5">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-lg dropdown-toggle pl-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                                All Sales Order
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="add_work_order.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
                                    </div>
                                    <div class="modal fade" id="Item_Search_modal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header select1">
                                                <!-- <div class="row"> -->
                                                    <div class="col-lg-2 col-sm-4">
                                                        <h5 class="modal-title" style="float: right;">Search</h5>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        
                                                    </div>

                                                    <div class="col-lg-4 col-sm-4">
                                                        
                                                    </div>
                                                    <div class="col-lg-1 col-sm-4">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered responsive" id="tbl">
                                <thead>
                                    <tr >
                                        
                                        <th></th>
                                        <th>Action</th>
                                        <th>Sale Order Id</th>
                                        <th>PO Number</th>
                                        <th>Customer Name </th>
                                        <th>Customer Site</th>
                                        <th>Salesman</th>
                                        <th>Quantity</th>
                                        <th>Discount(%)</th>                                        
                                        <th>Other Charges</th>
                                        <th>Process Amount</th>
                                        <th>Net Amount</th>
                                        <th>Add Date Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <?php
                                    $flag=$_SESSION['flag'];
                                    // if($flag == 0)
                                    // {
                                    $sql_charges="SELECT * FROM wholesale_work_order as wo,
                                    tbl_wholesale_customer as wc,tbl_wholesale_customer_site_details 
                                    as wcsd WHERE wo.cust_id_fk = wc.wc_id_pk AND
                                    wo.site_id_fk = wcsd. site_id_pk ORDER BY wo.work_order_id DESC
                                    ";

                                    $result_charges = mysqli_query($db, $sql_charges);
                                    // }
                                    
                                    ?>
                                <tbody>
                                <?php
                                if($result_charges != "")
                                {
                                    while ($row=mysqli_fetch_array($result_charges))
                                    {
                                        $work_order = $row['0'];
                                    ?>
                                    <tr style="cursor: pointer">
                                        <td></td>
                                        <td style="display: flex;">
                                            <?php 
                                                $sql = "SELECT * FROM wholesale_work_order WHERE work_order_id='$work_order' 
                                                AND delivery_challan_status='0' AND flag='$flag' limit 1";
                                                $rres = mysqli_query($db,$sql);
                                                while($tr = mysqli_fetch_array($rres))
                                                {
                                                    if(mysqli_num_rows($rres) > 0) 
                                                    {
                                                        $num = mysqli_num_rows($rres);
                                                        //echo 'found!';
                                                    
                                            
                                            ?>
                                            <a href="edit_wholesale_work_order.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </a>
                                            <a onclick="return confirm('Are you sure to want to delete?')" href="../../api/wholesale/delete_wholesale_work_order.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <?php

                                                } 
                                                else 
                                                { }
                                            }
                                        ?>
                                        <?php
                                        if($flag==0)
                                        {?>
                                        <a href="../../fpdf/api/sales_order_signature.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </a>
                                        <a onclick="return confirm('Confirm send mail?')" href="../../fpdf/api/sales_order_signature_mail.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </a>
                                        <?php } 
                                        else {
                                        ?>
                                        <a href="../../fpdf/api/sales_order_signature_raw.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </a>
                                        <?php } ?>
                                        </td>
                                        <td><?php echo $row['work_no']; ?> </td>
                                        <td><?php echo $row['pono']; ?></td>
                                        <td><?php echo $row['cust_name']; ?></td>
                                        <td><?php echo $row['site_name']; ?></td>
                                        <td><?php echo $row['site_name']; ?></td>
                                        <td><?php echo $row['qty']; ?></td>
                                        <td><?php echo $row['disc_per']." %"; ?></td>
                                        <td>₹ <?php echo $row['other']; ?></td>
                                        <td>₹<?php echo $row['process_amt']; ?></td>
                                        <td>₹<?php echo $row['net_amt']; ?></td>
                                        <td><?php echo $row['add_date']." ".$row['add_time']; ?></td>
                                        <td>
                                        <?php 
                                            if($row['delete_status']==0)
                                                echo '<span class="text-success">Active</span>';
                                            else
                                                echo '<span class="text-danger">InActive</span>';
                                        ?>
                                        </td>
                                    </tr>
                                                    <?php
                                    }
                                }              ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
// $(document).ready(function(){
//     $('[data-toggle="popover"]').popover();   
// });
$(document).ready(function() {
  $('[data-toggle="popover"]').popover({
    html: true,
    content: function() {
      return $('#popover-content').html();
    }
  });
});
</script>
<script>
	$(document).ready(function()
  {
    $('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {extend: 'pdf', exportOptions: { columns: ''}}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
        searching:true,
        
        "createdRow": function(row, data, dataIndex){
            if(data[13]==`<span class="text-danger">InActive</span>`)
                $(row).addClass('redClass');
        },
   
        columnDefs: [ 
            { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
            ],      
        select: { style: 'multi', selector: 'td:nth-child(0)'},
        select: { style: 'multi'},
        destroy:false,
        drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
});
			
		
</script>

<script>
                    function openNav() 
                    {
                        //alert("hii:");
                        window.location.href = 'purchase_account_view.php'; //Will take you to Google.                        
                       
                    }
                    </script>

<?php include('../../partials/footer.php');?>
