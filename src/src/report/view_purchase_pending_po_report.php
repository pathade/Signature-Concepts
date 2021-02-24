
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
                                                Pending PO Report
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
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Company</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="company" class="select2" data-toggle="select2" name="company">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_company" name="all_company" />&nbsp;&nbsp;All
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">PO No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="po_no" class="select2" data-toggle="select2" name="po_no">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <!-- <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_po_no" name="all_po_no" />&nbsp;&nbsp;All
                                                    </div> -->
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Item</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="item" class="select2" data-toggle="select2" name="item">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_item" name="all_item" />&nbsp;&nbsp;All
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Supplier</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier">
                                                                <option value="" disabled selected>Select </option>
                                                                
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
                                        <th>PoNo.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Supplier</th>
                                        <th>Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Sqft</th>
                                        <th>Quantity</th>
                                        <th>Net Amt.</th>
                                        <th>PendingQty</th>
                                        <th>Branch</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   
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

        $.ajax({
            url: '../../api/report/purchase_pending_po_report.php',
            type: 'POST',
            data: {
                // 'supplier': supplier,
                // 'po_no': po_no
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                $.each(data, function(index) 
                {
                    var select = '';
                    var id=`<p>${data[index].id}</p>`;
                    var pono=`<p>${data[index].pono}</p>`;
                    var date=`<p>${data[index].date}</p>`;
                    var supplier=`<p>${data[index].supplier}</p>`;
                    var product=`<p>${data[index].product}</p>`;
                    var sqft=`<p>${data[index].sqft}</p>`;
                    var quantity=`<p>${data[index].qty}</p>`;
                    var net_amt=`<p>${data[index].net_amt}</p>`;
                    var p_qty=`<p>${data[index].p_qty}</p>`;
                    var branch=`<p>${data[index].branch}</p>`;
                    var status=`<p>${data[index].status}</p>`;

                    table.row.add( [
                            select,
                            pono,
                            date,
                            supplier,
                            product,
                            sqft,
                            quantity,
                            net_amt,
                            p_qty,
                            branch,
                            status

                        ] ).draw( false );
                    }); 
                }
            
        })


    }

</script>
