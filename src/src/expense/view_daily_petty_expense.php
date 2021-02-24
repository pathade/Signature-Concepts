
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

<?php $flag = $_SESSION['flag']; ?>

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
        width: 23%;
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
                                                Daily Petty Expenses
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                        <a href="add_daily_petty_expense.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
                                    </div>
                                  
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row" id="main">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.475rem;">
                        <div class="card-content">
                            <div class="card-body" style="padding: 1.5rem;">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Search By</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        Exp. Head <input type="text" class="mt-1" name="exp_head" id="exp_head"  />&nbsp;&nbsp;&nbsp;
                                    </div>
                                    
                                    <div class="col-lg-8 col-md-6 col-sm-6">
                                        From Date <input type="date" class="mt-1" name="from_date" id="from_date"  />&nbsp;&nbsp;&nbsp;
                                        To <input type="date" class="mt-1" name="to_date" id="to_date"  />&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" class="mt-1" name="all_date" id="all_date" checked />&nbsp; All &nbsp;&nbsp;
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-1">
                                        status <input type="radio" name="status" id="active" style="height: calc(2.75rem + -22px);width: 20px" checked />&nbsp;Active &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="status" id="cancelled" style="height: calc(2.75rem + -22px);width: 20px" />&nbsp;Cancel &nbsp;&nbsp;&nbsp;
                                        <button type="button" name="show" class="btn btn-primary" id="show" >
	                                        <i class="fa fa-check-square-o"></i> Search
	                                    </button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

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
                                        <th>Type</th>
                                        <!-- <th>Against Ref</th> -->
                                        <th>Branch</th>
                                        <th>Date</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        <th>Expenses Head</th>
                                        <th>Authorised By</th>
                                        <th>Remark</th>
                                        

                                        <!-- <th type="button" aria-expanded="true" data-toggle="modal" data-target="#Item_Search_modal">
                                            <i class="fa fa-search cursor-pointer" ARIA-hidden="TRUE"></i>
                                        </th> -->
                                    </tr>
                                </thead>

                                <?php
                                    //$sql="SELECT * FROM `daily_petty`";
                                    if ($flag == 0) {
                                        $sql = "SELECT *,eh.expense_head as df,d.type as dte,d.delete_status as ds 
                                        FROM `daily_petty` as d,mstr_vendor as v,mstr_employee as e,mstr_expense as eh 
                                        where d.to1 = v.vendor_id_pk AND d.authorised_by = e.emp_id_pk AND v.flag = '0'
                                        AND d.expenses_head = eh.expense_idpk AND d.flag = '0' AND e.flag = '0' AND eh.flag = '0' ";
                                    }
                                    else {
                                        $sql = "SELECT *,eh.expense_head as df,d.type as dte,d.delete_status as ds 
                                        FROM `daily_petty` as d,mstr_vendor as v,mstr_employee as e,mstr_expense as eh 
                                        where d.to1 = v.vendor_id_pk AND d.authorised_by = e.emp_id_pk AND v.flag = '1'
                                        AND d.expenses_head = eh.expense_idpk AND d.flag = '1' AND e.flag = '1' AND eh.flag = '1' ";
                                    }
                                    $res = mysqli_query($db, $sql);
                                    ?>
                                <tbody>
                                <?php
                                if($res!= "")
                                {
                                    while ($row=mysqli_fetch_array($res))
                                    {
                                        $del_status=$row['ds'];
                                        if($del_status == 1)
                                        {
                                            
                                    ?>
                                    <tr style="cursor: pointer;background-color:lavenderblush;">
                                        <td></td>
                                        <td style="display: flex;">
                                            <a href="edit_daily_petty_expense.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['id'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                  
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/expense/delete_daily_petty_expenses.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['id'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                  
                                            </a>
                                        </td>
                                        <td><?php echo $row['dp_no']; ?> </td>
                                        <td><?php echo $row['dte']; ?></td>
                                        <!-- <td><?php echo $row['against_ref']; ?></td> -->
                                        <td><?php echo $row['branch'].$del_status; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['first_name']."".$row['last_name']; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['df']; ?></td>
                                        <td><?php echo $row['emp_name']; ?></td>
                                        <td><?php echo $row['remark']; ?></td>
                                        <!-- <td>
                                            <?php 
                                               // if($row[7]==1) 
                                               //      echo '<p style="color: #37BC9B;">Active</p>';
                                               //  else
                                               //      echo '<p style="color: #DA4453;">Inactive</p>';
                                            ?>
                                        </td>
                                         -->
                                        <!-- <td></td> -->
                                    </tr>
                                                    <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <tr style="cursor: pointer">
                                        <td></td>
                                        <td style="display: flex;">
                                            <a href="edit_daily_petty_expense.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['id'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                  
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/expense/delete_daily_petty_expenses.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['id'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                  
                                            </a>
                                        </td>
                                        <td><?php echo $row['dp_no']; ?> </td>
                                        <td><?php echo $row['dte']; ?></td>
                                        <!-- <td><?php echo $row['against_ref']; ?></td> -->
                                        <td><?php echo $row['branch']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['first_name']."".$row['last_name']; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['df']; ?></td>
                                        <td><?php echo $row['emp_name']; ?></td>
                                        <td><?php echo $row['remark']; ?></td>
                                        <!-- <td>
                                            <?php 
                                               // if($row[7]==1) 
                                               //      echo '<p style="color: #37BC9B;">Active</p>';
                                               //  else
                                               //      echo '<p style="color: #DA4453;">Inactive</p>';
                                            ?>
                                        </td>
                                         -->
                                        <!-- <td></td> -->
                                    </tr>
                                            <?php
                                        }
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
