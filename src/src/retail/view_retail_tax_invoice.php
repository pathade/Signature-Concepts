
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

<?php
    $flag=$_SESSION['flag'];
    // if($flag==0)
    // {
        $view_retail_tax_invoice = "SELECT * FROM retail_tax_invoice WHERE flag='$flag'";
        $res_retail_tax_invoice = mysqli_query($db, $view_retail_tax_invoice) or die(mysqli_error($db));
    // }
    // $view_retail_tax_invoice = "SELECT * FROM retail_tax_invoice";
    // $res_retail_tax_invoice = mysqli_query($db, $view_retail_tax_invoice) or die(mysqli_error($db));
?>

<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

.redClass{
    background-color: rgba(255,0,0,0.1) !important;
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
                                                All Retail Tax Invoice
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="add_retail_tax_invoice.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
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
                                <?php 
                                if($flag==0)
                                {
                                    echo '<tr>
                                        <th></th>
                                        <th>Action &nbsp;</th>
                                        
                                        <th>PI No</th>
                                        <th>PO No</th>
                                        <th>Branch</th>
                                        <th>Customer</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Transporter</th>
                                        <th>Vehicle</th>
                                        <th>Prepared By</th>
                                        <th>Stock Point</th>
                                        <th>Date</th>
                                        <th>Ledger Bal.</th>
                                        <th>Gross amt.</th>
                                        <th>Discount</th>
                                        <th>Adjustment</th>
                                        
                                        <th>Tax Amount</th>
                                        <th>Net Amount</th>
                                        <th>Status</th>
                                    </tr>';
                                }
                                else
                                {
                                echo '<tr>
                                        <th></th>
                                        <th>Action &nbsp;</th>
                                        
                                        <th>PI No</th>
                                        <th>PO No</th>
                                        <th>Branch</th>
                                        <th>Customer</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Transporter</th>
                                        <th>Vehicle</th>
                                        <th>Prepared By</th>
                                        <th>Stock Point</th>
                                        <th>Date</th>
                                        <th>Ledger Bal.</th>
                                        <th>Gross amt.</th>
                                        <th>Discount</th>
                                        <th>Adjustment</th>
                                        <th>Tax Amount</th>
                                        <th>Net Amount</th>
                                        <th>Status</th>
                                    </tr>';
                                }
                                ?>
                                </thead>

                                
                                <tbody>
                                <?php
                                    if($flag==0)
                                    {
                                        while($row =  mysqli_fetch_row($res_retail_tax_invoice))
                                        { ?>
                                            <tr style="cursor: pointer">
                                                
                                                <td></td>
                                                <td style="display: flex;">
                                                    <a href="edit_retail_tax_invoice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                          
                                                    </a>
                                                    <a href="../../fpdf/api/retail_tax_invoice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                        <i class="fa fa-print" aria-hidden="true"></i>
                                                          
                                                    </a>
                                                    
                                                    
                                                    <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/retail/delete_retail_tax_invoice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                          
                                                    </a>
                                                </td>
                                                <!--<td><?php //echo $row[0]; ?></td>-->
                                                <td><?php echo $row[1]; ?></td>
                                                <?php
                                                    $get_pro_no ="SELECT order_no FROM retail_proforma WHERE id_pk='$row[2]'";
                                                    $res_pro_no = mysqli_fetch_row(mysqli_query($db, $get_pro_no));
                                                ?>
                                                <td><?php echo $res_pro_no[0]; ?></td>
                                                <td><?php echo $row[6]; ?></td>
                                                <?php
                                                $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='$row[3]'";
                                                $res_customer = mysqli_fetch_array(mysqli_query($db, $get_customer));
                                                ?>
                                                <td><?php echo $res_customer['0']; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[5]; ?></td>
                                                <?php 
                                                $get_transporter = "SELECT name FROM mstr_transporter WHERE t_id_pk='$row[7]'";
                                                $res_transporter = mysqli_fetch_array(mysqli_query($db, $get_transporter));
                                                ?>
                                                <td><?php echo $res_transporter['0']; ?></td>
                                                <?php 
                                                $get_tvehicle = "SELECT v_name FROM mstr_transporter_vehicle WHERE tv_id_pk='$row[8]'";
                                                $res_tvehicle = mysqli_fetch_array(mysqli_query($db, $get_tvehicle));
                                                ?>
                                                <td><?php echo $res_tvehicle['0']; ?></td>
                                                <td><?php echo $row[9]; ?></td>
                                                <td><?php echo $row[12]; ?></td>
                                                <td><?php echo $row[10]; ?></td>
                                                <td><?php echo $row[11]; ?></td>
                                                <td><?php echo $row[15]; ?></td>
                                                <td><?php echo $row[18]; ?></td>
                                                <td><?php echo $row[19]; ?></td>
                                                <td><?php echo $row[20]; ?></td>
                                                <!--<td><?php //echo $row[21]; ?></td>-->
                                                <td><?php echo $row[22]; ?></td>
                                                <td>
                                                <?php 
                                                    if($row[23] == 0) 
                                                        echo '<span class="text-success">Active</span>';
                                                    else
                                                        echo '<span class="text-danger">InActive</span>';
                                                ?>
                                                
                                                </td>
                                                <!-- <td></td> -->
                                            </tr>
                                        <?php }
                                    }
                                    else
                                    {
                                        while($row =  mysqli_fetch_row($res_retail_tax_invoice))
                                        { ?>
                                            <tr style="cursor: pointer">
                                                
                                                <td></td>
                                                <td style="display: flex;">
                                                    <a href="edit_retail_tax_invoice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                          
                                                    </a>
                                                    <a href="../../fpdf/api/retail_tax_invoice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                        <i class="fa fa-print" aria-hidden="true"></i>
                                                          
                                                    </a>
                                                    
                                                    <a onclick="return confirm('Are you sure you want to delete')" href="../../api/retail/delete_retail_tax_invoice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                          
                                                    </a>
                                                </td>
                                                <!--<td><?php //echo $row[0]; ?></td>-->
                                                <td><?php echo $row[1]; ?></td>
                                                <?php
                                                    $get_pro_no ="SELECT order_no FROM retail_proforma WHERE id_pk='$row[2]'";
                                                    $res_pro_no = mysqli_fetch_row(mysqli_query($db, $get_pro_no));
                                                ?>
                                                <td><?php echo $res_pro_no[0]; ?></td>
                                                <td><?php echo $row[6]; ?></td>
                                                <?php
                                                $get_customer = "SELECT retail_cust_name FROM mstr_retail_customer WHERE retail_cust_idpk='$row[3]'";
                                                $res_customer = mysqli_fetch_array(mysqli_query($db, $get_customer));
                                                ?>
                                                <td><?php echo $res_customer['0']; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[5]; ?></td>
                                                <?php 
                                                $get_transporter = "SELECT name FROM mstr_transporter WHERE t_id_pk='$row[7]'";
                                                $res_transporter = mysqli_fetch_array(mysqli_query($db, $get_transporter));
                                                ?>
                                                <td><?php echo $res_transporter['0']; ?></td>
                                                <?php 
                                                $get_tvehicle = "SELECT v_name FROM mstr_transporter_vehicle WHERE tv_id_pk='$row[8]'";
                                                $res_tvehicle = mysqli_fetch_array(mysqli_query($db, $get_tvehicle));
                                                ?>
                                                <td><?php echo $res_tvehicle['0']; ?></td>
                                                <td><?php echo $row[9]; ?></td>
                                                <td><?php echo $row[12]; ?></td>
                                                <td><?php echo $row[10]; ?></td>
                                                <td><?php echo $row[11]; ?></td>
                                                <td><?php echo $row[15]; ?></td>
                                                <td><?php echo $row[18]; ?></td>
                                                <td><?php echo $row[19]; ?></td>
                                                <td><?php echo $row[20]; ?></td>
                                                <!--<td><?php //echo $row[21]; ?></td>-->
                                                <td><?php echo $row[22]; ?></td>
                                                <td>
                                                <?php 
                                                    if($row[23] == 0) 
                                                        echo '<span class="text-success">Active</span>';
                                                    else
                                                        echo '<span class="text-danger">InActive</span>';
                                                ?>
                                                
                                                </td>
                                                <!-- <td></td> -->
                                            </tr>
                                        <?php }
                                    } 
                                ?>
                                   
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
            if(data[21]==`<span class="text-danger">InActive</span>` || data[20]==`<span class="text-danger">InActive</span>`){
                $(row).addClass('redClass');
            }
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