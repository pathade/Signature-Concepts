
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

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
.pdf {
    max-height: 300px;
    overflow-y: auto;
    width: 100%;
}

form {
    width: 100%;
}

.checkbox {
    margin-top: 3px;
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
                                                GST Report
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <!-- <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                        <a href="add_payment_advice_cancellation.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                    </div> -->
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
                            <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pay_advice_reprint_form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row" style="margin-left: 0px;">
                                                <div class="col-md-3">
                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">From Date</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="date" id="from_date" name="from_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">To</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="date" id="to_date" name="to_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Type </label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="type" class="select2" data-toggle="select2" name="type">
                                                                <option value="" disabled selected>Select </option>
                                                                <option value="sale" >Sale </option>
                                                                <option value="sale_return" >Sale Return</option>
                                                                <option value="purchase" >Purchase </option>
                                                                <option value="purchase_return" >Purchase Return</option>
                                                                <option value="sale_summary" >Sale Summary</option>
                                                                <option value="purchase_summary" >Purchase Summary</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="branch" name="branch" readonly>
                                                                <option value="" disabled selected>Select </option>
                                                                <option value="Shree" >SHREE</option>
                                                                <option value="Signature Concepts LLP" >Signature Concepts LLP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="grand_total" name="grand_total" />&nbsp;Grand Totals &nbsp;&nbsp;
                                                        <input class="checkbox" type="checkbox" id="sub_total" name="sub_total" />&nbsp;Sub Totals &nbsp;&nbsp;
                                                        <input class="checkbox" type="checkbox" id="compact_rows" name="compact_rows" />&nbsp;Compact Style Rows&nbsp;&nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right text-center">
                                    
                                    <button type="button" class="btn btn-primary" name="add" onClick="show_data()">
                                        <i class="fa fa-check-square-o"></i> Show
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                        <div class="table-responsive">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Type</th>
                                        <th>Branch</th>
                                        <th>Invoice No </th>
                                        <th>Item Name</th>
                                        <th>Item Type</th>
                                        <th>ASupplier Name</th>
                                        <th>CM Code</th>
                                        <th>Size</th>
                                        <th>Supplier Design Code</th>
                                        <th>PCS Box</th>
                                        <th>HSN Code</th>
                                        <th>Invoice Date</th>
                                        <th>Sale Amt</th>
                                        <th>Taxable Value</th>
                                        <th>GST Per</th>
                                        <th>GST Amt</th>
                                        <th>SGST Amt</th>
                                        <th>IGST Amt</th>
                                        <th>Customer</th>
                                        <th>Branch Id</th>
                                        <th>GST No</th>
                                        <th>Cust GST No</th>
                                        <th>Qty</th>
                                        <th>Place Of Supplier</th>
                                    </tr>
                                </thead>

                                <?php
                                    $view_retail_tax_invoice = "SELECT * FROM retail_tax_invoice WHERE status!='1'";
                                    $res_retail_tax_invoice = mysqli_query($db, $view_retail_tax_invoice) or die(mysqli_error($db));
                                ?>
                                <tbody>
                                <?php while($row =  mysqli_fetch_row($res_retail_tax_invoice))
                                { ?>
                                    <tr style="cursor: pointer">
                                        
                                        <td></td>
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
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                    </tr>
                                <?php } ?>
                                   
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

<?php include('../../partials/footer.php');?>
<script>
	$(document).ready(function()
  {
    $('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'excel', exportOptions: { columns: ''}}, {
  extend: 'pdfHtml5',
  title: ' GST Report',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions: {
     columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21,22,23,24]
  },
  //-------------------------- 
  customize : function(doc) {
     doc.styles['td:nth-child(2)'] = { 
       width: '100px',
       'max-width': '100px',
       margin: '0px 20px'
     }
  }
}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
        searching:false,
     
   
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

