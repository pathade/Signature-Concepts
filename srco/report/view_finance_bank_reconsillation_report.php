
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

.radio {
    /* margin-top: 3px; */
    height: 20px;
    width: 17px;
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
                                                Bank Reconsillation Report
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
                                                        <label class="col-md-3 label-control" for="userinput1">Bank Name</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="bank_name" class="select2" data-toggle="select2" name="bank_name">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Account No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group row">
                                                    <label class="col-md-5 label-control" for="userinput1">Chq. From Date</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="date" id="from_date" name="from_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group row">
                                                    <label class="col-md-5 label-control" for="userinput1">To Date</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="date" id="to_date" name="to_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-3"></div>
                                                        <input class="radio" type="radio" id="all" name="type" />&nbsp;All &nbsp;&nbsp;&nbsp;
                                                        <input class="radio" type="radio" id="reconcle" name="type" />&nbsp;Reconcle &nbsp;&nbsp;&nbsp;
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
                                        <th>Chq. Date</th>
                                        <th>DR/ CR</th>
                                        <th>Particulars</th>
                                        <th>Voucher Type</th>
                                        <th>Trans. No.</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Reconcile Date</th>
                                        <th>Opening Balance</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Closing Balance</th>
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
            url: '../../api/report/bank_reconcilation_report.php',
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
                    var cheque_date=`<p>${data[index].cheque_date}</p>`;
                    var drcr=`<p>${data[index].drcr}</p>`;
                    var particular=`<p>${data[index].particular}</p>`;
                    var type=`<p>${data[index].type}</p>`;
                    var trans_no=`<p>${data[index].trans_no}</p>`;
                    var debit=`<p>${data[index].debit}</p>`;
                    var credit=`<p>${data[index].credit}</p>`;
                    var reconcile_date=`<p>${data[index].reconcile_date}</p>`;
                    var o_bal=`<p>${data[index].o_bal}</p>`;
                    var debit1=`<p>${data[index].debit1}</p>`;
                    var credit1=`<p>${data[index].credit1}</p>`;
                    var c_bal=`<p>${data[index].c_bal}</p>`;


                    table.row.add( [
                            select,
                            cheque_date,
                            drcr,
                            particular,
                            type,
                            trans_no,
                            debit,
                            credit,
                            reconcile_date,
                            o_bal,
                            debit1,
                            credit1,
                            c_bal

                        ] ).draw( false );
                    }); 
                }
            
        })


    }

</script>
