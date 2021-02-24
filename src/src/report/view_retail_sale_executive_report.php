
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
                                            Sales Executivewise sale Report
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
                                                        <label class="col-md-3 label-control" for="userinput1">Sales Executive</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="sale_executive" class="select2" data-toggle="select2" name="sale_executive">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_sale_executive" name="all_sale_executive" />&nbsp;&nbsp;All
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
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <input class="checkbox" type="checkbox" id="with_po" name="only_summary" />&nbsp;With PO &nbsp;&nbsp;
                                                            <input class="checkbox" type="checkbox" id="without_po" name="without_po" />&nbsp;Without PO &nbsp;&nbsp;
                                                            <input class="checkbox" type="checkbox" id="with_po_without_pi" name="with_po_without_pi" />&nbsp;With PO without Pur. Invoice
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right text-center">
                                    
                                    <button type="button" class="btn btn-primary" name="add" onclick="show_data()">
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
                        
                        <ul class="nav nav-tabs nav-underline">
                            <li class="nav-item">
                            <a class="nav-link active" id="baseIcon-tabdetail" data-toggle="tab" aria-controls="tabdetail" href="#tabdetail" aria-expanded="true">Detail</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabsummary" data-toggle="tab" aria-controls="tabsummary" href="#tabsummary" aria-expanded="false">Summary</a>
                            </li>
                        </ul>
                        <div class="row">
                        <div class="tab-content px-1 mt-3" style="width: -webkit-fill-available;">
                        <div role="tabpanel" class="tab-pane active" id="tabdetail" aria-expanded="true" aria-labelledby="baseIcon-tabdetail">
                        <div class="row">
                        <div class="table-responsive">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Type</th>
                                        <th>Branch</th>
                                        <th>Sales Executive</th>
                                        <th>Challan No</th>
                                        <th>Challan Date</th>
                                        <th>Final Product</th>
                                        <th>Qty</th>
                                        <th>Sqft</th>
                                        <th>Rate</th>
                                        <th>Sale Amt.</th>
                                        <th>PO Id</th>
                                        <th>Pur Qty</th>
                                        <th>Pur Sqft</th>
                                        <th>Pur Rate</th>
                                        <th>Purchase Amt</th>
                                        <!-- <th>PI No.</th>
                                        <th>Bill No</th>
                                        <th>Bill Date</th>
                                        <th>SPI No</th>
                                        <th>Pur. Against Sale</th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        </div>

                        <div class="tab-pane" id="tabsummary" aria-labelledby="baseIcon-tabsummary">
						<div class="row mr-1 ml-1 text-left">
                        <div class="table-responsive">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl1">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Type</th>
                                        <th>Company</th>
                                        <th>Sales Executive</th>
                                        <th>Sale</th>
                                        <th>Purchase</th>
                                        <th>Pur. Against Sale</th>
                                        <th>Profit</th>
                                        <th>Profit %</th>
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
        </div>
    </div>
</div>

<?php include('../../partials/footer.php');?>
<script>
var table1="";
var table2="";
	$(document).ready(function()
  {
      table1=$('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'excel', exportOptions: { columns: ''}}, {
  extend: 'pdfHtml5',
  title: ' Sales Executivewise sale Report Detail',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions: {
     columns: [ 1,2,3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
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
	$(document).ready(function()
  {
    table2=$('#tbl1').DataTable( {
        dom: '',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'excel', exportOptions: { columns: ''}}, {
  extend: 'pdfHtml5',
  title: ' Sales Executivewise sale Report Summary',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions: {
     columns: [ 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
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
        table1.clear().draw();

        $.ajax({
            url: '../../api/report/retail_sale_ewise_summary_report.php',
            type: 'POST',
            data: {
                
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                $.each(data, function(index) 
                {
                    var select = '';
                    var type=`<p>${data[index].type}</p>`;
                    var branch=`<p>${data[index].branch}</p>`;
                    var salesman=`<p>${data[index].salesman}</p>`;
                    var challan_no=`<p>${data[index].challan_no}</p>`;
                    var challan_date=`<p>${data[index].challan_date}</p>`;
                    var product=`<p>${data[index].product}</p>`;
                    var qty=`<p>${data[index].qty}</p>`;
                    var sqft=`<p>${data[index].sqft}</p>`;
                    var rate=`<p>${data[index].rate}</p>`;
                    var amt=`<p>${data[index].amt}</p>`;
                    var po_id=`<p>${data[index].po_id}</p>`;
                    var bill_no=`<p>${data[index].bill_no}</p>`;
                    var bill_date=`<p>${data[index].bill_date}</p>`;
                    var spi_no=`<p>${data[index].spi_no}</p>`;
                    var pur_against_sale=`<p>${data[index].pur_against_sale}</p>`;

                    table1.row.add( [
                            select,
                            type,
                            branch,
                            salesman,
                            challan_no,
                            challan_date,
                            product,
                            qty,
                            sqft,
                            rate,
                            amt,
                            po_id,
                            bill_no,
                            bill_date,
                            spi_no,
                            pur_against_sale
                        ] ).draw( false );
                    }); 
                }
            
        })


    }

</script>


