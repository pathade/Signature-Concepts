
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
                                            Employee Rights
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
                    <div class="card-body" style="padding-top: 1.5rem">
                        <div class="row" style="margin: 0;">
                            <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pay_advice_reprint_form">
                                <div class="form-body">
                                    <div class="row" style="margin: 0;">
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
                                                <div class="col-md-1 mt-1"></div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Employee</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="emp" class="select2" data-toggle="select2" name="emp">
                                                                <option value="" disabled selected>Select </option>
                                                                 <?php

                                                                    $sql = "SELECT * FROM mstr_employee
                                                                        WHERE emp_id_pk  IN (SELECT DISTINCT employee_id_fk  FROM mstr_authorisation)";
                                                                    $result = mysqli_query($db,$sql);
                                                                    while($row1 = mysqli_fetch_array($result))
                                                                    {   
                                                                        ?>
                                                                        <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'];?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-1">
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
                            <li class="nav-item">
                            <a class="nav-link active" id="baseIcon-tabmaster" data-toggle="tab" aria-controls="tabmaster" href="#tabmaster" aria-expanded="true">Master</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabretail" data-toggle="tab" aria-controls="tabretail" href="#tabretail" aria-expanded="false">Retail</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabwholesale" data-toggle="tab" aria-controls="tabwholesale" href="#tabwholesale" aria-expanded="false">Wholesale</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabpurchase" data-toggle="tab" aria-controls="tabpurchase" href="#tabpurchase" aria-expanded="false">Purchase</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabfinance" data-toggle="tab" aria-controls="tabfinance" href="#tabfinance" aria-expanded="false">Finance</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabexpense" data-toggle="tab" aria-controls="tabexpense" href="#tabexpense" aria-expanded="false">Expense</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabreport" data-toggle="tab" aria-controls="tabreport" href="#tabreport" aria-expanded="false">Report</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseIcon-tabimportexcel" data-toggle="tab" aria-controls="tabimportexcel" href="#tabimportexcel" aria-expanded="false">Import Excel</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="tab-content px-1 mt-3" style="width: -webkit-fill-available;">
                                <div role="tabpanel" class="tab-pane active" id="tabmaster" aria-expanded="true" aria-labelledby="baseIcon-tabmaster">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        <th>Save</th>
                                                        <th>Delete</th>
                                                        <th>Modify</th>
                                                        <th>Print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Wholesale Customer</td>
                                                        <td>
                                                            <input type="checkbox" id="view_wholesale" name="view_wholesale" value="view_wholesale" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_wholesale" name="save_wholesale" value="save_wholesale" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_wholesale" name="delete_wholesale" value="delete_wholesale" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_wholesale" name="modify_wholesale" value="modify_wholesale" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_wholesale" name="print_wholesale" value="print_wholesale" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Employee</td>
                                                        <td>
                                                            <input type="checkbox" id="view_emp" name="view_emp" value="view_emp" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_emp" name="save_emp" value="save_emp" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_emp" name="delete_emp" value="delete_emp" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_emp" name="modify_emp" value="modify_emp" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_emp" name="print_emp" value="print_emp" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Product</td>
                                                        <td>
                                                            <input type="checkbox" id="view_product" name="view_product" value="view_product" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_product" name="save_product"  value="save_product" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_product" name="delete_product" value="delete_product" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_product" name="modify_product" value="modify_product" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_product" name="print_product" value="print_product" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Bank</td>
                                                        <td>
                                                            <input type="checkbox" id="view_bank" name="view_bank" value="view_bank"  />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_bank" name="save_bank"  value="save_bank"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_bank" name="delete_bank" value="delete_bank" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_bank" name="modify_bank"  value="modify_bank"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_bank" name="print_bank" value="print_bank" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Supplier</td>
                                                        <td>
                                                            <input type="checkbox" id="view_supplier" name="view_supplier" value="view_supplier" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_supplier" name="save_supplier" value="save_supplier"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_supplier" name="delete_supplier" value="delete_supplier"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_supplier" name="modify_supplier" value="modify_supplier"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_supplier" name="print_supplier" value="print_supplier"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Tax</td>
                                                        <td>
                                                            <input type="checkbox" id="view_tax" name="view_tax" value="view_tax" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_tax" name="save_tax" value="save_tax" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_tax" name="delete_tax" value="delete_tax" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_tax" name="modify_tax"  value="modify_tax" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_tax" name="print_tax" value="print_tax"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Transporter</td>
                                                        <td>
                                                            <input type="checkbox" id="view_transporter" name="view_transporter" value="view_transporter" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_transporter" name="save_transporter"  value="save_transporter"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_transporter" name="delete_transporter" value="delete_transporter"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_transporter" name="modify_transporter" value="modify_transporter" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_transporter" name="print_transporter" value="print_transporter" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Retail Customer</td>
                                                        <td>
                                                            <input type="checkbox" id="view_retail" name="view_retail" value="view_retail" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_retail" name="save_retail"  value="save_retail"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_retail" name="delete_retail" value="delete_retail" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_retail" name="modify_retail" value="modify_retail"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_retail" name="print_retail"  value="print_retail"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Vendor</td>
                                                        <td>
                                                            <input type="checkbox" id="view_vendor" name="view_vendor"  value="view_vendor"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_vendor" name="save_vendor" value="save_vendor"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_vendor" name="delete_vendor"  value="delete_vendor"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_vendor" name="modify_vendor" value="modify_vendor" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_vendor" name="print_vendor" value="print_vendor" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Cheque Master</td>
                                                        <td>
                                                            <input type="checkbox" id="view_cheque" name="view_cheque" value="view_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_cheque" name="save_cheque" value="save_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_cheque" name="delete_cheque" value="delete_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_cheque" name="modify_cheque" value="modify_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_cheque" name="print_cheque" value="print_cheque"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Expense Head</td>
                                                        <td>
                                                            <input type="checkbox" id="view_exp_head" name="view_exp_head" value="view_exp_head" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_exp_head" name="save_exp_head"  value="save_exp_head"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_exp_head" name="delete_exp_head" value="delete_exp_head" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_exp_head" name="modify_exp_head" value="modify_exp_head"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_exp_head" name="print_exp_head" value="print_exp_head" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Loan advance</td>
                                                        <td>
                                                            <input type="checkbox" id="view_loan_adv" name="view_loan_adv" value="view_loan_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_loan_adv" name="save_loan_adv" value="save_loan_adv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_loan_adv" name="delete_loan_adv" value="delete_loan_adv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_loan_adv" name="modify_loan_adv" value="modify_loan_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_loan_adv" name="print_loan_adv" value="print_loan_adv" />
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabretail" aria-labelledby="baseIcon-tabretail">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl1">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        <th>Save</th>
                                                        <th>Delete</th>
                                                        <th>Modify</th>
                                                        <th>Print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Retail Proforma Invoice</td>
                                                        <td>
                                                            <input type="checkbox" id="view_rel_performa_inv" name="view_rel_performa_inv" value="view_rel_performa_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_rel_performa_inv" name="save_rel_performa_inv"  value="save_rel_performa_inv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_rel_performa_inv" name="delete_rel_performa_inv" value="delete_rel_performa_inv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_rel_performa_inv" name="modify_rel_performa_inv"  value="modify_rel_performa_inv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_rel_performa_inv" name="print_rel_performa_inv" value="print_rel_performa_inv" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Retail Tax Invoice</td>
                                                        <td>
                                                            <input type="checkbox" id="view_rel_tax_inv" name="view_rel_tax_inv" value="view_rel_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_rel_tax_inv" name="save_rel_tax_inv" value="save_rel_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_rel_tax_inv" name="delete_rel_tax_inv"  value="delete_rel_tax_inv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_rel_tax_inv" name="modify_rel_tax_inv" value="modify_rel_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_rel_tax_inv" name="print_rel_tax_inv" value="print_rel_tax_inv" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Retail Receipt</td>
                                                        <td>
                                                            <input type="checkbox" id="view_rel_receipt" name="view_rel_receipt" value="view_rel_receipt"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_rel_receipt" name="save_rel_receipt" value="save_rel_receipt" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_rel_receipt" name="delete_rel_receipt" value="delete_rel_receipt"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_rel_receipt" name="modify_rel_receipt" value="modify_rel_receipt"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_rel_receipt" name="print_rel_receipt" value="print_rel_receipt" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Retail Return Goods</td>
                                                        <td>
                                                            <input type="checkbox" id="view_rel_return_good" name="view_rel_return_good"  value="view_rel_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_rel_return_good" name="save_rel_return_good" value="save_rel_return_good"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_rel_return_good" name="delete_rel_return_good" value="delete_rel_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_rel_return_good" name="modify_rel_return_good" value="modify_rel_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_rel_return_good" name="print_rel_return_good" value="modify_rel_return_good"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Retail Quotation</td>
                                                        <td>
                                                            <input type="checkbox" id="view_rel_quatation" name="view_rel_quatation"  value="view_rel_quatation" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_rel_quatation" name="save_rel_quatation"  value="save_rel_quatation"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_rel_quatation" name="delete_rel_quatation"  value="delete_rel_quatation"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_rel_quatation" name="modify_rel_quatation" value="modify_rel_quatation"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_rel_quatation" name="print_rel_quatation" value="print_rel_quatation"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Delete Retail Pending Quantity</td>
                                                        <td>
                                                            <input type="checkbox" id="view_rel_del_pen_qua" name="view_rel_del_pen_qua" value="view_rel_del_pen_qua" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_rel_del_pen_qua" name="save_rel_del_pen_qua"  value="save_rel_del_pen_qua"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_rel_del_pen_qua" name="delete_rel_del_pen_qua" value="delete_rel_del_pen_qua" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_rel_del_pen_qua" name="modify_rel_del_pen_qua" value="modify_rel_del_pen_qua" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_rel_del_pen_qua" name="print_rel_del_pen_qua" value="print_rel_del_pen_qua" />
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabwholesale" aria-labelledby="baseIcon-tabwholesale">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl2">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        <th>Save</th>
                                                        <th>Delete</th>
                                                        <th>Modify</th>
                                                        <th>Print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Sales Order</td>
                                                        <td>
                                                            <input type="checkbox" id="view_who_sale_order" name="view_who_sale_order" value="view_who_sale_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_who_sale_order" name="save_who_sale_order" value="save_who_sale_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_who_sale_order" name="delete_who_sale_order" value="delete_who_sale_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_who_sale_order" name="modify_who_sale_order" value="modify_who_sale_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_who_sale_order" name="print_who_sale_order" value="print_who_sale_order" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Challan</td>
                                                        <td>
                                                            <input type="checkbox" id="view_who_delivery_cha" name="view_who_delivery_cha" value="view_who_delivery_cha" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_who_delivery_cha" name="save_who_delivery_cha" value="save_who_delivery_cha" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_who_delivery_cha" name="delete_who_delivery_cha" value="delete_who_delivery_cha" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_who_delivery_cha" name="modify_who_delivery_cha" value="modify_who_delivery_cha" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_who_delivery_cha" name="print_who_delivery_cha"  value="print_who_delivery_cha"/>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Tax Invoice</td>
                                                        <td>
                                                            <input type="checkbox" id="view_who_tax_inv" name="view_who_tax_inv" value="view_who_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_who_tax_inv" name="save_who_tax_inv" value="save_who_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_who_tax_inv" name="delete_who_tax_inv" value="delete_who_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_who_tax_inv" name="modify_who_tax_inv" value="modify_who_tax_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_who_tax_inv" name="print_who_tax_inv"  value="print_who_tax_inv" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Receipt</td>
                                                        <td>
                                                            <input type="checkbox" id="view_who_receipt" name="view_who_receipt" value="view_who_receipt" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_who_receipt" name="save_who_receipt" value="save_who_receipt" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_who_receipt" name="delete_who_receipt" value="delete_who_receipt" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_who_receipt" name="modify_who_receipt" value="modify_who_receipt" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_who_receipt" name="print_who_receipt" value="print_who_receipt" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Customer Manual Debit / Credit</td>
                                                        <td>
                                                            <input type="checkbox" id="view_whocust_man_decr" name="view_whocust_man_decr" value="view_whocust_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_whocust_man_decr" name="save_whocust_man_decr" value="save_whocust_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_whocust_man_decr" name="delete_whocust_man_decr"  value="delete_whocust_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_whocust_man_decr" name="modify_whocust_man_decr" value="modify_whocust_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_whocust_man_decr" name="print_whocust_man_decr" value="print_whocust_man_decr" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Return Goods</td>
                                                        <td>
                                                            <input type="checkbox" id="view_who_return_good" name="view_who_return_good" value="view_who_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_who_return_good" name="save_who_return_good" value="save_who_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_who_return_good" name="delete_who_return_good" value="delete_who_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_who_return_good" name="modify_who_return_good" value="modify_who_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_who_return_good" name="print_who_return_good" value="print_who_return_good" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Delete Pending Quantity</td>
                                                        <td>
                                                            <input type="checkbox" id="view_whodel_pen_qty" name="view_whodel_pen_qty" value="view_whodel_pen_qty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_whodel_pen_qty" name="save_whodel_pen_qty"  value="save_whodel_pen_qty"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_whodel_pen_qty" name="delete_whodel_pen_qty" value="delete_whodel_pen_qty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_whodel_pen_qty" name="modify_whodel_pen_qty" value="modify_whodel_pen_qty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_whodel_pen_qty" name="print_whodel_pen_qty" value="print_whodel_pen_qty" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Customer Advance</td>
                                                        <td>
                                                            <input type="checkbox" id="view_who_cust_adv" name="view_who_cust_adv" value="view_who_cust_adv"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_who_cust_adv" name="save_who_cust_adv" value="save_who_cust_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_who_cust_adv" name="delete_who_cust_adv" value="delete_who_cust_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_who_cust_adv" name="modify_who_cust_adv" value="modify_who_cust_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_who_cust_adv" name="print_who_cust_adv"  value="print_who_cust_adv"/>
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabpurchase" aria-labelledby="baseIcon-tabpurchase">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl3">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        <th>Save</th>
                                                        <th>Delete</th>
                                                        <th>Modify</th>
                                                        <th>Print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Supplier PO</td>
                                                        <td>
                                                            <input type="checkbox" id="view_pur_supplier_po" name="view_pur_supplier_po" value="view_pur_supplier_po"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_pur_supplier_po" name="save_pur_supplier_po"  value="save_pur_supplier_po" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_pur_supplier_po" name="delete_pur_supplier_po"  value="delete_pur_supplier_po"  />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_pur_supplier_po" name="modify_pur_supplier_po" value="modify_pur_supplier_po" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_pur_supplier_po" name="print_pur_supplier_po" value="print_pur_supplier_po" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Supplier PO</td>
                                                        <td>
                                                            <input type="checkbox" id="view_pur_supplier_po" name="view_pur_supplier_po" value="view_pur_supplier_po" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_pur_supplier_po" name="save_pur_supplier_po" value="save_pur_supplier_po" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_pur_supplier_po" name="delete_pur_supplier_po" value="delete_pur_supplier_po" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_pur_supplier_po" name="modify_pur_supplier_po" value="modify_pur_supplier_po" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_pur_supplier_po" name="print_pur_supplier_po" value="print_pur_supplier_po" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Goods Received Note</td>
                                                        <td>
                                                            <input type="checkbox" id="view_pur_grn" name="view_pur_grn"  value="view_pur_grn" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_pur_grn" name="save_pur_grn" value="save_pur_grn" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_pur_grn" name="delete_pur_grn" value="delete_pur_grn" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_pur_grn" name="modify_pur_grn"  value="modify_pur_grn" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_pur_grn" name="print_pur_grn" value="print_pur_grn" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Purchase Invoice</td>
                                                        <td>
                                                            <input type="checkbox" id="view_pur_inv" name="view_pur_inv" value="view_pur_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_pur_inv" name="save_pur_inv" value="save_pur_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_pur_inv" name="delete_pur_inv" value="delete_pur_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_pur_inv" name="modify_pur_inv" value="modify_pur_inv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_pur_inv" name="print_pur_inv" value="print_pur_inv" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Supplier Manual Debit/Credit</td>
                                                        <td>
                                                            <input type="checkbox" id="view_pur_supp_man_decr" name="view_pur_supp_man_decr" value="view_pur_supp_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_pur_supp_man_decr" name="save_pur_supp_man_decr" value="save_pur_supp_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_pur_supp_man_decr" name="delete_pur_supp_man_decr" value="delete_pur_supp_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_pur_supp_man_decr" name="modify_pur_supp_man_decr" value="modify_pur_supp_man_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_pur_supp_man_decr" name="print_pur_supp_man_decr" value="print_pur_supp_man_decr" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Supplier Return Goods</td>
                                                        <td>
                                                            <input type="checkbox" id="view_pur_supp_return_good" name="view_pur_supp_return_good" value="view_pur_supp_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_pur_supp_return_good" name="save_pur_supp_return_good" value="save_pur_supp_return_good"/>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_pur_supp_return_good" name="delete_pur_supp_return_good" value="delete_pur_supp_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_pur_supp_return_good" name="modify_pur_supp_return_good" value="modify_pur_supp_return_good" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_pur_supp_return_good" name="print_pur_supp_return_good" value="print_pur_supp_return_good" />
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabfinance" aria-labelledby="baseIcon-tabfinance">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl4">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        <th>Save</th>
                                                        <th>Delete</th>
                                                        <th>Modify</th>
                                                        <th>Print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Payment Advice(Fin)</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_pay_adv" name="view_fin_pay_adv" value="view_fin_pay_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_pay_adv" name="save_fin_pay_adv" value="save_fin_pay_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_pay_adv" name="delete_fin_pay_adv" value="delete_fin_pay_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_pay_adv" name="modify_fin_pay_adv" value="modify_fin_pay_adv" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_pay_adv" name="print_fin_pay_adv" value="print_fin_pay_adv" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Advice Cancellation</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_pay_adv_cancel" name="view_fin_pay_adv_cancel"  value="view_fin_pay_adv_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_pay_adv_cancel" name="save_fin_pay_adv_cancel" value="save_fin_pay_adv_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_pay_adv_cancel" name="delete_fin_pay_adv_cancel" value="delete_fin_pay_adv_cancel"  />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_pay_adv_cancel" name="modify_fin_pay_adv_cancel" value="modify_fin_pay_adv_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_pay_adv_cancel" name="print_fin_pay_adv_cancel" value="print_fin_pay_adv_cancel" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Reprint Debit/Credit Note</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_reprint_decr" name="view_fin_reprint_decr" value="view_fin_reprint_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_reprint_decr" name="save_fin_reprint_decr" value="save_fin_reprint_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_preprint_decr" name="delete_fin_reprint_decr" value="delete_fin_reprint_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_reprint_decr" name="modify_fin_reprint_decr" value="modify_fin_reprint_decr" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_reprint_decr" name="print_fin_reprint_decr" value="print_fin_reprint_decr" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Cheque Printing(Fin)</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_cheque_print" name="view_fin_cheque_print" value="view_fin_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_cheque_print" name="save_fin_cheque_print" value="save_fin_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_cheque_print" name="delete_fin_cheque_print" value="delete_fin_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_cheque_print" name="modify_fin_cheque_print" value="modify_fin_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_cheque_print" name="print_fin_cheque_print" value="print_fin_cheque_print" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Skip Cheque</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_skip_cheque" name="view_fin_skip_cheque" value="view_fin_skip_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_skip_cheque" name="save_fin_skip_cheque" value="save_fin_skip_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_skip_cheque" name="delete_fin_skip_cheque" value="delete_fin_skip_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_skip_cheque" name="modify_fin_skip_cheque"  value="modify_fin_skip_cheque" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_skip_cheque" name="print_fin_skip_cheque" value="print_fin_skip_cheque" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Bank Transaction</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_bank_transaction" name="view_fin_bank_transaction" value="view_fin_bank_transaction" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_bank_transaction" name="save_fin_bank_transaction" value="save_fin_bank_transaction" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_bank_transaction" name="delete_fin_bank_transaction"value="delete_fin_bank_transaction" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_bank_transaction" name="modify_fin_bank_transaction" value="modify_fin_bank_transaction" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_bank_transaction" name="print_fin_bank_transaction" value="print_fin_bank_transaction" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Bank Reconciliation</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fin_bank_reconcil" name="view_fin_bank_reconcil" value="view_fin_bank_reconcil" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fin_bank_reconcil" name="save_fin_bank_reconcil" value="save_fin_bank_reconcil" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fin_bank_reconcil" name="delete_fin_bank_reconcil" value="delete_fin_bank_reconcil" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fin_bank_reconcil" name="modify_fin_bank_reconcil" value="modify_fin_bank_reconcil" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fin_bank_reconcil" name="print_fin_bank_reconcil" value="print_fin_bank_reconcil" />
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabexpense" aria-labelledby="baseIcon-tabexpense">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl5">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        <th>Save</th>
                                                        <th>Delete</th>
                                                        <th>Modify</th>
                                                        <th>Print</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Daily Petty Expense</td>
                                                        <td>
                                                            <input type="checkbox" id="view_daily_petty" name="view_daily_petty" value="view_daily_petty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_daily_petty" name="save_daily_petty" value="save_daily_petty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_daily_petty" name="delete_daily_petty" value="delete_daily_petty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_daily_petty" name="modify_daily_petty" value="modify_daily_petty" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_daily_petty" name="print_daily_petty" value="print_daily_petty" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Fixed Payment</td>
                                                        <td>
                                                            <input type="checkbox" id="view_fixed_pay" name="view_fixed_pay" value="view_fixed_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_fixed_pay" name="save_fixed_pay"  value="save_fixed_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_fixed_pay" name="delete_fixed_pay" value="delete_fixed_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_fixed_pay" name="modify_fixed_pay" value="modify_fixed_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_fixed_pay" name="print_fixed_pay" value="print_fixed_pay" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Company Loan And Advance</td>
                                                        <td>
                                                            <input type="checkbox" id="view_company" name="view_company" value="view_company" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_company" name="save_company" value="save_company" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_company" name="delete_company" value="delete_company" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_company" name="modify_company" value="modify_company" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_company" name="print_company" value="print_company" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Vendor Purchase Order</td>
                                                        <td>
                                                            <input type="checkbox" id="view_vendor_pur_order" name="view_vendor_pur_order" value="view_vendor_pur_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_vendor_pur_order" name="save_vendor_pur_order" value="save_vendor_pur_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_vendor_pur_order" name="delete_vendor_pur_order" value="delete_vendor_pur_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_vendor_pur_order" name="modify_vendor_pur_order"  value="modify_vendor_pur_order" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_vendor_pur_order" name="print_vendor_pur_order" value="print_vendor_pur_order" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Bill Entry</td>
                                                        <td>
                                                            <input type="checkbox" id="view_bill_entry" name="view_bill_entry" value="view_bill_entry" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_bill_entry" name="save_bill_entry"  value="save_bill_entry" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_bill_entry" name="delete_bill_entry" value="delete_bill_entry" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_bill_entry" name="modify_bill_entry" value="modify_bill_entry" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_bill_entry" name="print_bill_entry" value="print_bill_entry" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Advance Payment</td>
                                                        <td>
                                                            <input type="checkbox" id="view_exp_adv_pay" name="view_exp_adv_pay" value="view_exp_adv_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_exp_adv_pay" name="save_exp_adv_pay" value="save_exp_adv_pay" /> 
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_exp_adv_pay" name="delete_exp_adv_pay" value="delete_exp_adv_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_exp_adv_pay" name="modify_exp_adv_pay" value="modify_exp_adv_pay" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_exp_adv_pay" name="print_exp_adv_pay" value="print_exp_adv_pay" /> 
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Advance Payment Cancellation</td>
                                                        <td>
                                                            <input type="checkbox" id="view_exp_adv_pay_cancel" name="view_exp_adv_pay_cancel" value="view_exp_adv_pay_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_exp_adv_pay_cancel" name="save_exp_adv_pay_cancel" value="save_exp_adv_pay_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_exp_adv_pay_cancel" name="delete_exp_adv_pay_cancel" value="delete_exp_adv_pay_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_exp_adv_pay_cancel" name="modify_exp_adv_pay_cancel" value="modify_exp_adv_pay_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_exp_adv_pay_cancel" name="print_exp_adv_pay_cancel" value="print_exp_adv_pay_cancel" /> 
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Advice</td>
                                                        <td>
                                                            <input type="checkbox" id="view_exp_pay_advice" name="view_exp_pay_advice" value="view_exp_pay_advice" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_exp_pay_advice" name="save_exp_pay_advice" value="save_exp_pay_advice" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_exp_pay_advice" name="delete_exp_pay_advice" value="delete_exp_pay_advice" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_exp_pay_advice" name="modify_exp_pay_advice" value="modify_exp_pay_advice" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_exp_pay_advice" name="print_exp_pay_advice" value="print_exp_pay_advice" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Advice Cancellation</td>
                                                        <td>
                                                            <input type="checkbox" id="view_exp_pay_advice_cancel" name="view_exp_pay_advice_cancel" value="view_exp_pay_advice_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_exp_pay_advice_cancel" name="save_exp_pay_advice_cancel" value="save_exp_pay_advice_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_exp_pay_advice_cancel" name="delete_exp_pay_advice_cancel" value="delete_exp_pay_advice_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_exp_pay_advice_cancel" name="modify_exp_pay_advice_cancel" value="modify_exp_pay_advice_cancel" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_exp_pay_advice_cancel" name="print_exp_pay_advice_cancel" value="print_exp_pay_advice_cancel" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Advice Reprint</td>
                                                        <td>
                                                            <input type="checkbox" id="view_exp_pay_advice_reprint" name="view_exp_pay_advice_reprint"value="view_exp_pay_advice_reprint" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_exp_pay_advice_reprint" name="save_exp_pay_advice_reprint" value="save_exp_pay_advice_reprint" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_exp_pay_advice_reprint" name="delete_exp_pay_advice_reprint" value="delete_exp_pay_advice_reprint" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_exp_pay_advice_reprint" name="modify_exp_pay_advice_reprint" value="modify_exp_pay_advice_reprint" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_exp_pay_advice_reprint" name="print_exp_pay_advice_reprint" value="print_exp_pay_advice_reprint" />
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Cheque Printing Expense</td>
                                                        <td>
                                                            <input type="checkbox" id="view_cheque_print" name="view_cheque_print" value="view_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="save_cheque_print" name="save_cheque_print" value="save_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="delete_cheque_print" name="delete_cheque_print"  value="delete_cheque_print"/> 
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="modify_cheque_print" name="modify_cheque_print" value="modify_cheque_print" />
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" id="print_echeque_print" name="print_cheque_print" value="print_cheque_print" />
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabreport" aria-labelledby="baseIcon-tabreport">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl6">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Retail Report</td>
                                                        <td>
                                                            <input type="checkbox" id="retail_report" name="retail_report" value="retail_report" />
                                                        </td>
                                                     
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>Wholesale Report</td>
                                                        <td>
                                                            <input type="checkbox" id="wholesale_report" name="wholesale_report" value="wholesale_report" />
                                                        </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>Purchase Report</td>
                                                        <td>
                                                            <input type="checkbox" id="purchase_report" name="purchase_report" value="purchase_report" />
                                                        </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>Finance Report</td>
                                                        <td>
                                                            <input type="checkbox" id="finance_report" name="finance_report" value="finance_report" />
                                                        </td>
                                                      
                                                    </tr>
                                                    <tr>
                                                        <td>Expense Report</td>
                                                        <td>
                                                            <input type="checkbox" id="expense_report" name="expense_report" value="expense_report" />
                                                        </td>
                                                       
                                                    </tr>
                                                  
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabimportexcel" aria-labelledby="baseIcon-tabimportexcel">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl7">
                                                <thead>
                                                    <tr >
                                                        <th>Form Name</th>
                                                        <th>Form View</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Import Product Excel</td>
                                                        <td>
                                                            <input type="checkbox" id="product_excel" name="product_excel" value="product_excel" />
                                                        </td>
                                                     
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>Wholesale Customer Excel</td>
                                                        <td>
                                                            <input type="checkbox" id="wholesale_customer_excel" name="wholesale_customer_excel" value="wholesale_report" />
                                                        </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>Retail Customer Excel</td>
                                                        <td>
                                                            <input type="checkbox" id="retail_customer_excel" name="retail_customer_excel" value="retail_customer_excel" />
                                                        </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>Supplier Excel</td>
                                                        <td>
                                                            <input type="checkbox" id="supplier_excel" name="supplier_excel" value="supplier_excel" />
                                                        </td>
                                                      
                                                    </tr>
                                              
                                                  
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-actions right text-center">
                                    
                                    <button type="button" class="btn btn-primary" name="add" onClick="save_data()">
                                        <i class="fa fa-check-square-o"></i> Update
                                    </button>
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
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ 
            // { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
            ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
    });
    $('#tbl1').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
        //drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
    $('#tbl2').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
        //drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
    $('#tbl3').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
        //drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
    $('#tbl4').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
        //drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
    $('#tbl5').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
       // drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });

    $('#tbl6').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
       // drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });

    $('#tbl7').DataTable( {
        dom: '',
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
     
   
        columnDefs: [ ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        destroy:false,
       // drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
});
			
		
</script>
<script>

function show_data()
{
    var emp_id=document.getElementById('emp').value;
// alert(emp_id);
    $.ajax({
              type: "POST",
              url:"../../api/authorisation/get_authorisation.php",
              data:'emp_id='+emp_id,
              dataType: 'json',
              success:function(data){
               

                for (var i = 0; i < data.length; i++) {

var check_id=data[i]["name"];
                  console.log(  data[i]["name"]);

                  $('#'+check_id).prop('checked', true);
                //   var option = document.createElement("option");
                //   option.setAttribute("value", data[i]["id"]);
                //   option.text = data[i]["name"];
                //   comboSalesOrderLineNo.appendChild(option);
                 }
              }
            });
}

  function save_data()
{
      
var rawItemArray=[];
    var searchIDs = $("input:checkbox:checked").map(function(){
        var abcd=$(this).val();

   
   
      rawItemArray.push({
   

   name :abcd
  
 
 });
    }); // <----
 
    var newRawItemArray = JSON.stringify(rawItemArray);

 console.log(newRawItemArray);
 var emp_id=document.getElementById('emp').value;
//  alert(emp_id);
    //alert("branch:"+branch);
    if(emp_id!=''){
  $.ajax(
          {

          url: "../../api/authorisation/update_authorisation.php",
          type: 'POST',
          data : '&newRawItemArray='+newRawItemArray+'&emp_id='+emp_id,
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              
                $.toast({
                        heading: 'Success',
                        text: 'Data Added Successfully!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'success'
                    })
                    setTimeout(() => 
                    {
                        window.location.href="view_authorisation.php";    
                    }, 5000);
                // alert("Data Added Successfully!");
                // window.location.href="view_advance_payment_cancellation.php";
              
          
          }
          
          });
    }
    else{
        alert("Please Select Employee");
    }
}
</script>
