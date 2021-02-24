
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

.radio {
    width: 17px;
    height: 17px;
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
                                                Supplier Debit Credit Advance Dettail Report
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
                                            <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1"> </label>
                                                        <div class="col-md-8">
                                                            <input class="radio" type="radio" id="debit" name="type2" value="1" checked /> &nbsp;Debit &nbsp;&nbsp;
                                                            <input class="radio" type="radio" id="credit" name="type2" value="2" /> &nbsp;Credit &nbsp;&nbsp;
                                                            <input class="radio" type="radio" id="advance" name="type2" value="3" /> &nbsp;Advance 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                        <div class="col-md-8" style="margin-left: -23px;">
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
                                                        <label class="col-md-3 label-control" for="userinput1">Transaction No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="transaction_no" class="select2" data-toggle="select2" name="transaction_no">
                                                                <option value="" disabled selected>Select </option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
                                                    <div class="form-group row">
                                                        <input class="checkbox" type="checkbox" id="all_transaction_no" name="all_transaction_no" />&nbsp;&nbsp;All
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
                        <div class="table-responsive" id="debittable">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Supplier</th>
                                        <th>Debit No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>PaymentAdv No.</th>
                                        <th>PaymentAdv Date</th>
                                        <th>Redeem Amt</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive" id="credittable">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl1">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Supplier</th>
                                        <th>Credit No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>PaymentAdv No.</th>
                                        <th>PaymentAdv Date</th>
                                        <th>Redeem Amt</th>
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
                                        <td><?php echo $row[5]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                    </tr>
                                <?php } ?>
                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive" id="dadvancetable">
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl2">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Supplier</th>
                                        <th>Advance No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>PaymentAdv No.</th>
                                        <th>PaymentAdv Date</th>
                                        <th>Redeem Amt</th>
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
                                        <td><?php echo $row[5]; ?></td>
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
var table="";
	$(document).ready(function()
  {


    document.getElementById("dadvancetable").style.display = "none";
    document.getElementById("credittable").style.display = "none";
    document.getElementById("debittable").style.display = "block";
    $('input[type=radio][name=type2').change(function() {
    var type = $("input[name='type2']:checked").val();
    // alert(type);
   if(type == "2") {
    document.getElementById("dadvancetable").style.display = "none";
    document.getElementById("credittable").style.display = "block";
    document.getElementById("debittable").style.display = "none";
   }
   else if(type == "3") {
    document.getElementById("dadvancetable").style.display = "block";
    document.getElementById("credittable").style.display = "none";
    document.getElementById("debittable").style.display = "none";
   }
   else {
    document.getElementById("dadvancetable").style.display = "none";
    document.getElementById("credittable").style.display = "none";
    document.getElementById("debittable").style.display = "block";
   }
});



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



    $('#tbl2').DataTable( {
        dom: '',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'excel', exportOptions: { columns: ''}}, {
  extend: 'pdfHtml5',
  title: ' Supplier Debit Credit Advance Dettail Report',
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
        table.clear().draw();

        $.ajax({
            url: '../../api/report/fin_supplier_dbcr_report.php',
            type: 'POST',
            data: {
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                $.each(data, function(index) 
                {
                    var select = '';
                    var supp=`<p>${data[index].supp}</p>`;
                    var debit_no=`<p>${data[index].debit_no}</p>`;
                    var date=`<p>${data[index].date}</p>`;
                    var amount=`<p>${data[index].amount}</p>`;
                    var adv_pay_no=`<p>${data[index].adv_pay_no}</p>`;
                    var pay_date=`<p>${data[index].pay_date}</p>`;
                    var redeem_amt=`<p>${data[index].redeem_amt}</p>`;

                    table.row.add( [
                            select,
                            supp,
                            debit_no,
                            date,
                            amount,
                            adv_pay_no,
                            pay_date,
                            redeem_amt

                        ] ).draw( false );
                    }); 
                }
            
        })


    }

</script>