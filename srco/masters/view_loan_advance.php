
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>
<?php $flag=$_SESSION['flag']; ?>
<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

.redClass {
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
                                                All Loan Advance 
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="add_loan_advance_master.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
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
                                                        <select class="select2 form-control block " data-plugin="select2" id="searchexp" class="select2" data-toggle="select2" >
                                                        <option>Customers</option>
                                                        <option>Vendors</option>
                                                        <option>Banking</option>
                                                        <option>Invoices</option>
                                                        <option>Estimates</option>
                                                        <option>Sales Orders</option>
                                                        </select>

                                                    </div>

                                                    <div class="col-lg-4 col-sm-4">
                                                        
                                                    </div>
                                                    <div class="col-lg-1 col-sm-4">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="modal-body select1">
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-5">
                                                    Purchase Order#
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <input type="text" class="form-control" name="">
                                                    </div>
                                                    <div class="col-lg-2 col-sm-5">
                                                    Reference#
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <input type="text" class="form-control" name="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-5">
                                                        Date Range
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1" style="display: flex;justify-content: space-between;">
                                                        <input type="date" class="form-control" name="" style="width: 48%;">&nbsp;-&nbsp;<input type="date" class="form-control" name="" style="width: 48%;"> 
                                                    </div>
                                                    <div class="col-lg-2 col-sm-5">
                                                        Expected Delivery Date
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1" style="display: flex;justify-content: space-between;">
                                                        <input type="date" class="form-control" name="" style="width: 48%;">&nbsp;-&nbsp;<input type="date" class="form-control" name="" style="width: 48%;"> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-5">
                                                        Status
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <select class="select2 form-control block" id="status" class="select2" data-toggle="select2" >
                                                            <option value="unbill" >Unbilled </option>
                                                            <option value="invoice">Invoiced</option>
                                                            <option value="reim">Reimbursed</option>
                                                            <option value="nonbill">Non-Billable</option>
                                                            <option value="withrece">With Receipts</option>
                                                            <option value="withoutrece">Without Receipts</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-5">
                                                        Item Name
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <select class="select2 form-control block" id="itemname" class="select2" data-toggle="select2" >
                                                            <option value="abc" >ABC </option>
                                                            <option value="abc123">ABC123</option>
                                                            <option value="com">Computer - Monitor</option>
                                                            <option value="eco">Economy Plan</option>
                                                            <option value="standard">Standard Plan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-5">
                                                        Item Description
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <input type="text" class="form-control" name="">
                                                    </div>
                                                    <div class="col-lg-2 col-sm-5">
                                                    Total Range
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1" style="display: flex;justify-content: space-between;">
                                                        <input type="text" class="form-control" name="" style="width: 48%;">&nbsp;-&nbsp;<input type="text" class="form-control" name="" style="width: 48%;"> 
                                                    </div>                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-5">
                                                    Vendor
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <select class="select2 form-control block" id="vendorr" class="select2" data-toggle="select2" >
                                                            <option value="" disabled selected>Select Vendor </option>
                                                                <?php

                                                                    $sql = "SELECT * FROM mstr_vendor";
                                                                    $result = mysqli_query($db,$sql);
                                                                    while($row = mysqli_fetch_array($result))
                                                                    {   
                                                                        ?>
                                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']. "&nbsp"  .$row['2']. "&nbsp" . $row['3']?></option>
                                                                        <?php
                                                                    }
                                                                ?> 
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-5">
                                                    Account
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <select class="select2 form-control block" placeholder="Select Account" id="account" class="select2" data-toggle="select2" >
                                                            <optgroup label="Other Current Asset">                                                                                                
                                                                <option value="advtax">Advance Tax</option>
                                                                <option value="empadv">Employee Advance</option>
                                                                <option value="preexp">Prepaid Expenses</option>
                                                                <option value="tdsrece">TDS Receivables</option>
                                                            </optgroup>
                                                            <optgroup label="Fixed Asset">                                                                                                
                                                                <option value="fur">Furniture and Equipment</option>
                                                            </optgroup>
                                                            <optgroup label="Other Current Liability">                                                                                                
                                                                <option value="emprei">Employee Reimbursements</option>
                                                                <option value="opbal">Opening Balance Adjustments</option>
                                                                <option value="taxpay">Tax Payable</option>
                                                                <option value="tdspay">TDS Payable</option>
                                                                <option value="unearned">Unearned Revenue</option>
                                                            </optgroup>
                                                            <optgroup label="Expense">                                                                                                
                                                                <option value="emprei">Advertising And Marketing</option>
                                                                <option value="opbal">Automobile Expense</option>
                                                                <option value="taxpay">Bad Debt</option>
                                                                <option value="tdspay">Bank Fees And Charges</option>
                                                                <option value="unearned">Consultant Expense</option>
                                                                <option value="taxpay">Contract Assets</option>
                                                                <option value="tdspay">Credit And Charges</option>
                                                                <option value="unearned">Depresiation Amortisation</option>
                                                                <option value="taxpay">Depresiation Expense</option>
                                                                <option value="tdspay">IT And Internet Expenses</option>
                                                                <option value="unearned">Janitorial Expense</option>
                                                                <option value="taxpay">Lodging</option>
                                                                <option value="tdspay">Meals And Entertainment</option>
                                                                <option value="unearned">Merchandise</option>
                                                                <option value="taxpay">Office Supplies</option>
                                                                <option value="tdspay">Other Expenses</option>
                                                                <option value="unearned">Postage</option>
                                                                <option value="Miss">Printing And Stationery</option>
                                                                <option value="Dr">Raw Materials And Consumables</option>
                                                                <option value="Dr">Rent Expense</option>
                                                                <option value="Dr">Repairs And Maintenance</option>
                                                                <option value="Miss">Salaries And Employee Wages</option>
                                                                <option value="Dr">Telephone Expense</option>
                                                                <option value="Dr">Transportation Expense</option>
                                                                <option value="Miss">Travel Expense</option>
                                                                <option value="Miss">Uncategorized</option>
                                                            </optgroup>
                                                            <optgroup label="Cost of Goods Sold">                                                                                                
                                                                <option value="goodsold">Cost of Goods Sold</option>
                                                                <option value="jcost">Job Costing</option>
                                                                <option value="lab">Labor</option>
                                                                <option value="mat">Materials</option>
                                                                <option value="subcontract">Subcontractor</option>
                                                            </optgroup>
                                                            <optgroup label="Stock">                                                                                                
                                                                <option value="fur">Inventory Asset</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-5">
                                                        Project Name
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <select class="select2 form-control block" id="projectname" class="select2" data-toggle="select2" >
                                                            <option value="" disabled selected>Select a Project </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-5">
                                                        Deliver To Customer
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 mb-1">
                                                        <select class="select2 form-control block" id="delivercustomer" class="select2" data-toggle="select2" >
                                                            <option value="" >Desai Bandhu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center" style="justify-content: center;">
                                                <button type="button" class="btn btn-success mr-2" >Search</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><a href="view_loan_advance_master.php">Cancel</a></button>
                                                                                     
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

            <div class="row" id="main">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.475rem;">
                        <div class="card-content">
                            <div class="card-body" style="padding: 1.5rem;">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <label>Search By</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        Name
                                        <input type="text" class="mt-1" name="" id=""  />
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

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Contact Person</th>
                                        <th>Branch </th>
                                        <th>Ledger Balance</th>
                                        <th>PAN Number</th>
                                        <!-- <th>TIN Number</th> -->
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <?php
                                    if($flag == 0) {
                                    $sql_charges="SELECT * FROM mstr_loan_advance_master where flag='0' ";
                                    }
                                    else {
                                        $sql_charges="SELECT * FROM mstr_loan_advance_master where flag='1' ";
                                    }
                                    $result_charges = mysqli_query($db, $sql_charges);
                                    ?>
                                <tbody>
                                <?php
                                if($result_charges != "")
                                {
                                    while ($row=mysqli_fetch_row($result_charges))
                                    {
                                    ?>
                                    <tr style="cursor: pointer">
                                        
                                        <td></td>
                                        <td style="display: flex;">
                                            <a href="edit_loan_advance_master.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/loan_advance_master/delete_loan_advance_master.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $row[0]; ?> </td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[3]; ?></td>
                                        <td><?php echo $row[4]; ?> </td>
                                        <td><?php echo $row[5]; ?></td>
                                        <td><?php echo $row[6]; ?></td>
                                        <td><?php echo $row[7]; ?></td>
                                        <td><?php echo $row[8]; ?> </td>
                                        <!-- <td><?php echo $row[9]; ?></td> -->
                                        <td><?php echo $row[10]; ?></td>
                                        <td><?php echo $row[12]; ?></td>
                                        
                                        <td ><?php if( $row[13] == 1)
                                        {?>
                                        <span class="green-text">Active</span>
                                        <?php }else{?>
                                        <span class="text-danger">Inactive</span>
                                        <?php } ?>
                                        </td>
                                        
                                        <!-- <td></td> -->
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

        "createdRow": function (row, data, dataIndex){
            // alert(data[11])
            if( data[13] ==  `<span class="text-danger">Inactive</span>`){
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

<!-- <script>
    function openNav() 
    {
        //alert("hii:");
        window.location.href = 'purchase_account_view.php'; //Will take you to Google.                        
        
    }
    </script> -->

<?php include('../../partials/footer.php');?>
