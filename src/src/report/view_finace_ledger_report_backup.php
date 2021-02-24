
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
                                                Ledger Register Report
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
                                                        <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="branch" name="branch" readonly>
                                                                <option value="Signature Concepts LLP" selected disabled>Signature Concepts LLP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content col-md-6 px-1">
                                                    <div role="tabpanel" class="tab-pane active" id="comapny" aria-expanded="true" aria-labelledby="baseIcon-tabcomapny">
                                                        <div class="col-md-6"></div>
                                                    </div>
                                                    <div class="tab-pane" id="wholesale" aria-labelledby="baseIcon-tabwholesale">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Customer</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        <?php 
                                                                            $get_wcustomer = "SELECT * FROM tbl_wholesale_customer WHERE del_status!=1";
                                                                            $res_wcustomer = mysqli_query($db, $get_wcustomer);

                                                                            while($row1 = mysqli_fetch_row($res_wcustomer))
                                                                            {
                                                                                echo '<option value="W'.$row1[0].'">'.$row1[1].'</option>';
                                                                            }


                                                                        ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="retail" aria-labelledby="baseIcon-tabretail">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Retail Cust</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="retail_cust" class="select2" data-toggle="select2" name="retail_cust" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        <?php 
                                                                            $get_rcustomer = "SELECT * FROM mstr_retail_customer WHERE status=1";
                                                                            $res_rcustomer = mysqli_query($db, $get_rcustomer);

                                                                            while($row2 = mysqli_fetch_row($res_rcustomer))
                                                                            {
                                                                                echo '<option value="R'.$row2[0].'">'.$row2[1].'</option>';
                                                                            }


                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="supplier" aria-labelledby="baseIcon-tabsupplier">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Supplier</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="supplier_name" class="select2" data-toggle="select2" name="supplier_name" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        <?php 
                                                                            $get_supp = "SELECT * FROM mstr_supplier WHERE status=1";
                                                                            $res_supp = mysqli_query($db, $get_supp);

                                                                            while($row3 = mysqli_fetch_row($res_supp))
                                                                            {
                                                                                echo '<option value="S'.$row3[0].'">'.$row3[1].'</option>';
                                                                            }


                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="vendor" aria-labelledby="baseIcon-tabvendor">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Vendor</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="vendor_name" class="select2" data-toggle="select2" name="vendor_name" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        <?php 
                                                                            $get_vendor = "SELECT * FROM mstr_vendor WHERE delete_status!=1";
                                                                            $res_vendor = mysqli_query($db, $get_vendor);

                                                                            while($row4 = mysqli_fetch_row($res_vendor))
                                                                            {
                                                                                echo '<option value="V'.$row4[0].'">'.$row4[2].'</option>';
                                                                            }


                                                                        ?>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="transport" aria-labelledby="baseIcon-tabtransport">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Transporter</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="transporter" class="select2" data-toggle="select2" name="transporter" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="labour" aria-labelledby="baseIcon-tablabour">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Labour</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="labour_name" class="select2" data-toggle="select2" name="labour_name" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="loans" aria-labelledby="baseIcon-tabloans">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 label-control" for="userinput1">Loan Account</label>
                                                                <div class="col-md-9" style="display: grid;">
                                                                    <select class="select2 form-control block" id="loan_account" class="select2" data-toggle="select2" name="loan_account" >
                                                                        <option value="" disabled selected>Select </option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                    <label class="col-md-3 label-control" for="userinput1">To Date</label>
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
                    <ul class="nav nav-tabs nav-underline">
                            <li class="nav-item d-none">
                            <a class="nav-link active" id="baseIcon-tabcomapny" data-toggle="tab" aria-controls="comapny" href="#comapny" aria-expanded="false" >Company</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabwholesale" data-toggle="tab" aria-controls="wholesale" href="#wholesale" aria-expanded="true">Wholesale Cust</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabretail" data-toggle="tab" aria-controls="retail" href="#retail" aria-expanded="false">Retail Cust</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabsupplier" data-toggle="tab" aria-controls="supplier" href="#supplier" aria-expanded="false">Supplier</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabvendor" data-toggle="tab" aria-controls="vendor" href="#vendor" aria-expanded="false">Vendor</a>
                            </li>
                            <li class="nav-item d-none">
                            <a class="nav-link" id="baseIcon-tabtransport" data-toggle="tab" aria-controls="transport" href="#transport" aria-expanded="false">Transport</a>
                            </li>
                            <li class="nav-item d-none">
                            <a class="nav-link" id="baseIcon-tablabour" data-toggle="tab" aria-controls="labour" href="#labour" aria-expanded="false">Labour</a>
                            </li>
                            <li class="nav-item d-none">
                            <a class="nav-link" id="baseIcon-tabloans" data-toggle="tab" aria-controls="loans" href="#loans" aria-expanded="false">Loans</a>
                            </li>
                        </ul>
                        <div class="row mt-2">
                        <div class="table-responsive">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Date</th>
                                        <th>Other Details</th>
                                        <th>Against </th>
                                        <th>Opening Balance</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Closing Details</th>
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
  title: ' Retail PO Report',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions: {
     columns: [ 1,2,3, 4, 5, 6]
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

        // var wcust = document.getElementById('customer').value;
        // var rcust = document.getElementById('retail_cust').value;
        // var supp = document.getElementById('supplier_name').value;
        // var vend = document.getElementById('vendor_name').value;

        // alert('Wcust: '+wcust);
        // alert('Rcust: '+rcust);
        // alert('Supp: '+supp);
        // alert('Vend: '+vend);

        var tabs = document.querySelectorAll('[data-toggle="tab"]');

        tabs.forEach((tab)=>{
            alert(tab.aria-expanded);
        });

        return;


        $.ajax({
            url: '../../api/report/ledger_report.php',
            type: 'POST',
            data: {
                'wcust': wcust, 
                'rcust': rcust, 
                'supp': supp, 
                'vend': vend, 
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                // $.each(data, function(index) 
                // {
                //     var select = '';
                //     var id=`<p>${data[index].id}</p>`;
                //     var date=`<p>${data[index].date}</p>`;
                //     var pono=`<p>${data[index].pono}</p>`;
                //     var salesman=`<p>${data[index].salesman}</p>`;
                //     var product=`<p>${data[index].product}</p>`;
                //     var quantity=`<p>${data[index].qty}</p>`;
                //     var customer=`<p>${data[index].customer}</p>`;
                //     // var sqft= `<p>${data[index].sqft}</p>`;
                //     // var net_amount= `<p>${data[index].net_amt}</p>`;
                //     // var redeem_amount= `<p>${data[index].redeem_amt}</p>`;
                //     // var balance= `<p>${data[index].balance}</p>`;
                //     // var status= `${data[index].status}`;
                //     // var created_by= `<p>${data[index].created_by}</p>`;
                //     // var create_date= `<p>${data[index].create_date}</p>`;

                //     table.row.add( [
                //             select,
                //             date,
                //             pono,
                //             salesman,
                //             product,
                //             quantity,
                //             customer,
                //         ] ).draw( false );
                //     }); 
            }
            
        })


    }

</script>

