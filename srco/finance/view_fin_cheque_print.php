
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
                                                All Cheque Print
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                        <a href="add_fin_cheque_print.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
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
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <table class="table table-striped table-bordered responsive" id="tbl">
                                <thead>
                                    <tr >
                                        
                                        <th></th>
                                        <th>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Auto</th>
                                        <th>Particulars/Party &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Cheque No</th>
                                        <th>Cheque Date</th>
                                        <th>Amount</th>
                                        <th>Bank Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Account No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <!-- <th>Against &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                        <th>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>FinYr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <!-- <th>Vendor/Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                        <th>Remark &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Recon Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Recon Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Mode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Entry Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>

                                <?php
                                    if ($flag == 0) {
                                    $sql_charges="SELECT * FROM fin_cheque_print where flag='0' ";
                                    }
                                    else {
                                        $sql_charges="SELECT * FROM fin_cheque_print where flag='1' ";
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
                                            <a href="edit_fin_cheque_print.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a onclick="return confirm('Are you want to delete?')" href="../../api/finance/delete_fin_cheque_print.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $row[0]; ?> </td>
                                        <td><?php echo $row[8]; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $row[7]; ?></td>
                                        <?php 
                                        if ($flag == 0) {
                                        $sql1 = "SELECT DISTINCT bank_idpk, bank_name, account_no FROM mstr_bank WHERE account_no = $row[3] and flag='0' ";
                                        }
                                        else {
                                            $sql1 = "SELECT DISTINCT bank_idpk, bank_name, account_no FROM mstr_bank WHERE account_no = $row[3] and flag='1' ";
                                        }
                                        $result1 = mysqli_query($db, $sql1);
                                        if($result1 != "")
                                        {
                                            $row1=mysqli_fetch_row($result1);
                                            ?>
                                        <td><?php echo $row1[1]; ?> </td>
                                        <td><?php echo $row1[2]; ?></td>
                                        <?php
                                    } 
                                    else {
                                           ?>
                                           <td> </td>
                                           <td> </td>
                                           <?php
                                    }
                                         ?>
                                        
                                        <td></td>
                                        <td><?php echo $row[0];?></td>
                                        <td></td>
                                        <!-- <td> </td> -->
                                        <!-- <td></td> -->
                                        <td></td>
                                        <td><?php echo $row[9];?></td>
                                        <td></td>
                                        <td><?php echo $row[5]; ?> </td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[1]; ?></td>
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

<?php include('../../partials/footer.php');?>
