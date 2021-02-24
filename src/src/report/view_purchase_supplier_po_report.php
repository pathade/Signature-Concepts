
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
                                            Supplier PO Report
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
                            <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="form1">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row" style="margin-left: 0px;">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="branch" name="branch" readonly>
                                                                <option value="Signature Concepts LLP" selected disabled>Signature Concepts LLP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Supplier</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier">
                                                                <option value="" disabled selected>Select </option>
                                                                <?php 
                                                                    $get_supplier_id = "SELECT DISTINCT supplier_id_fk FROM purchase_order";
                                                                    $res_supplier_id = mysqli_query($db, $get_supplier_id) or die(mysqli_error($db));
                                                                    while($row1 = mysqli_fetch_row($res_supplier_id))
                                                                    {
                                                                        $get_supplier_name = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='$row1[0]'";
                                                                        $res_supplier_name = mysqli_fetch_row(mysqli_query($db, $get_supplier_name));

                                                                        echo '<option value="'.$row1[0].'">'.$res_supplier_name[0].'</option>';
                                                                    }
                                                                ?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_supplier" name="all_supplier" />&nbsp;&nbsp;All
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group row">
                                                    <label class="col-md-5 label-control" for="userinput1">From Date</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="date" id="from_date" name="from_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">To</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" type="date" id="to_date" name="to_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_date" name="all_date" />&nbsp;&nbsp;All
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">PO No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no">
                                                                <option value="" disabled selected>Select </option>
                                                                <?php
                                                                    $get_pono = "SELECT id, purchase_order_no FROM purchase_order";
                                                                    $res_pono = mysqli_query($db, $get_pono) or die(mysqli_error($db));

                                                                    while($row2 = mysqli_fetch_row($res_pono))
                                                                    {
                                                                        echo '<option value="'.$row2[0].'">'.$row2[1].'</option>';
                                                                    }
                                                                ?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_no" name="all_no" />&nbsp;&nbsp;All
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Pending Qty</label>
                                                        <div class="col-md-9">
                                                            <input class="checkbox" type="checkbox" id="pending_qty" name="pending_qty" />&nbsp;Pending &nbsp;&nbsp;
                                                            <input class="checkbox" type="checkbox" id="completed_qty" name="completed_qty" />&nbsp;Completed
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Status</label>
                                                        <div class="col-md-9">
                                                            <input class="checkbox" type="checkbox" id="active_status" name="status" />&nbsp;Active &nbsp;&nbsp;
                                                            <input class="checkbox" type="checkbox" id="cancel_status" name="status" />&nbsp;Cancel
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right text-center">
                                    
                                    <button type="button" class="btn btn-primary" name="show" onclick="show_data()">
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
                                        <th>Sr No.</th>
                                        <th>Supplier Name</th>
                                        <th>PO Number</th>
                                        <th>Date</th>
                                        <th>Qty</th>
                                        <th>Pending Qty</th>
                                        <th>Total Sqft</th>
                                        <th>Net Amt.</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>                                   
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
var table = "";
	$(document).ready(function()
  {
    table = $('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'excel', exportOptions: { columns: ''}}, {
  extend: 'pdfHtml5',
  title: ' Supplier PO Report',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions: {
     columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
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

<script>
    function show_data()
    {
        table.clear().draw();
        var supplier = document.getElementById('supplier').value;
        var all_supplier = document.getElementById('all_supplier'); // all supplier checkbox
        var from_date = document.getElementById('from_date').value;
        var to_date = document.getElementById('to_date').value;
        var all_date = document.getElementById('all_date'); // all date checkbox
        var po_no = document.getElementById('po_no').value;
        var all_no = document.getElementById('all_no'); // all pono checkbox
        var a_status = document.getElementById('active_status');
        var c_status = document.getElementById('cancel_status');
        var p_qty = document.getElementById('pending_qty');
        var c_qty = document.getElementById('completed_qty');

        $.ajax({
            url: '../../api/report/supplier_po_report.php',
            type: 'POST',
            data: {
                'supplier': supplier,
                'po_no': po_no
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                $.each(data, function(index) 
                {
                    var id=`<p class="d-none">${data[index].id}</p>`;
                    var select = '';
                    var supplier=`<p>${data[index].supplier}</p>`;
                    var pono=`<p>${data[index].pono}</p>`;
                    var date=`<p>${data[index].date}</p>`;
                    var quantity=`<p>${data[index].qty}</p>`;
                    var p_quantity=`<p>${data[index].p_qty}</p>`;
                    var sqft= `<p>${data[index].sqft}</p>`;
                    var net_amount= `<p>${data[index].net_amt}</p>`;
                    var status= `${data[index].status}`;
                    var created_by= `<p>${data[index].created_by}</p>`;
                    var create_date= `<p>${data[index].create_date}</p>`;

                    table.row.add( [
                            select,
                            index+1,
                            supplier,
                            pono,
                            date,
                            quantity,
                            p_quantity,
                            sqft,
                            net_amount,
                            status,
                            created_by,
                            create_date,
                        ] ).draw( false );
                    }); 
                }
            
        })


    }

</script>

