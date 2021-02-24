
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>

<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

.redClass{
    background-color: rgba(255, 0,0,.1) !important;
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
                                                All Bill Entry
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="add_exp_bill_entry.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="com_loan_form">
	                    	<div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">From Bill Dt</label>
				                        	<div class="col-md-8">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="bi_from_date" name="bi_from_date" />
				                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-2">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">To</label>
				                        	<div class="col-md-9">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="bi_to_date" name="bi_to_date" />
				                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-1">
										<input type="checkbox" value="<?php echo date('Y-m-d'); ?>" id="all_bill_date" name="all_bill_date" /> All  
                                    </div>
                                    <div class="col-md-3">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1">From Entry Dt</label>
				                        	<div class="col-md-8">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="en_from_date" name="en_from_date" />
				                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-2">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">To</label>
				                        	<div class="col-md-9">
												<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="en_to_date" name="en_to_date" />
				                            </div>
				                        </div>
                                    </div>
                                    <div class="col-md-1">
										<input type="checkbox" value="<?php echo date('Y-m-d'); ?>" id="all_entry_date" name="all_entry_date" /> All  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class=" label-control" for="userinput1">Type</label>
                                        <input type="text" class="form-control" id="type" name="type" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class=" label-control" for="userinput1">Against</label>
                                        <input type="text" class="form-control" id="against" name="against" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class=" label-control" for="userinput1">Vendor</label>
                                        <input type="text" class="form-control" id="vendor" name="vendor" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class=" label-control" for="userinput1">Exp Head</label>
                                        <input type="text" class="form-control" id="expense_head" name="expense_head" />
                                    </div>
                                    <div class="col-md-2">
                                        <label class=" label-control" for="userinput1">Bill No</label>
                                        <input type="text" class="form-control" id="bill_no" name="bill_no" />
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <button type="button" name="show" class="btn btn-primary" id="show" >
	                                        <i class="fa fa-check-square-o"></i> Show Details
	                                    </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->

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
                                        <th>ID</th>
                                        <th>Type </th>
                                        <th>Against</th>
                                        <th>Branch</th>
                                        <th>Vendor/Supplier</th>
                                        <!-- <th>PO Number</th> -->
                                        <th>Expense Head</th>
                                        <th>Bill No</th>
                                        <th>Bill Date</th>
                                        <th>Due Date</th>
                                        <th>Bill Amount</th>
                                        <th>Net Amount</th>
                                        <th>Actual Balance</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <?php
                                    if ($flag == 0) {
                                        $sql_charges="SELECT DISTINCT * FROM exp_bill_entry where flag = '0'";
                                    }
                                    else {
                                        $sql_charges="SELECT DISTINCT * FROM exp_bill_entry where flag = '1'";
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
                                            <a href="edit_exp_bill_entry.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a onclick="return confirm('Are you want to delete?')" href="../../api/expense/delete_exp_bill_entry.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $row[0]; ?> </td>
                                        <td ><?php if( $row[1] == 1){?><span class="green-text"><?php echo "Variable";?></span><?php }else{?><span class="text-success"><?php echo "Fixed-Variable";?></span><?php } ?></td>
                                        <td ><?php if( $row[2] == 1){?><span class="green-text"><?php echo "Direct";?></span><?php }else{?><span class="text-success"><?php echo "Against PO";?></span><?php } ?></td>
                                        <td><?php echo $row[5]; ?></td>
                                        <?php
                                        if($row[2] == 1)
                                        {
                                            if ($flag == 0) {
                                            $sql2 = "SELECT DISTINCT vendor_id_pk, saturation, first_name, last_name FROM mstr_vendor WHERE vendor_id_pk = $row[8] and flag='0'";
                                            }
                                            else {
                                                $sql2 = "SELECT DISTINCT vendor_id_pk, saturation, first_name, last_name FROM mstr_vendor WHERE vendor_id_pk = $row[8] and flag='1'";
                                            }   
                                            $result2 = mysqli_query($db, $sql2);
                                                if($result2 != "")
                                                {
                                                    $row2=mysqli_fetch_row($result2);
                                                ?>
                                                <td><?php echo  $row2['1'].". ".$row2['2']." ".$row2['3'];?></td>
                                                <?php
                                            } 
                                            else {
                                                ?>
                                                <td> </td>
                                             <?php 
                                                }}
                                            elseif($row[2] == 0)
                                                {
                                                    if ($flag == 0) {
                                                    $sql2 = "SELECT name FROM mstr_supplier WHERE supplier_id_fk = $row[8] and flag = '0' ";
                                                    }
                                                    else {
                                                        $sql2 = "SELECT name FROM mstr_supplier WHERE supplier_id_fk = $row[8] and flag = '1' ";
                                                    }
                                                        $result2 = mysqli_query($db, $sql2);
                                                        if($result2 != "")
                                                        {
                                                            $row2=mysqli_fetch_row($result2);
                                                        ?>
                                                        <td><?php echo  $row2['0']?></td>
                                                        <?php
                                                    } 
                                                    else {
                                                        ?>
                                                        <td> </td>
                                                     <?php 
                                                        }}
                                                        if ($flag == 0) {
                                                        $sql1 = "SELECT DISTINCT expense_idpk, expense_head FROM mstr_expense WHERE expense_idpk = $row[6] and flag = '0'";
                                                        }
                                                        else {
                                                            $sql1 = "SELECT DISTINCT expense_idpk, expense_head FROM mstr_expense WHERE expense_idpk = $row[6] and flag = '1'";
                                                        }
                                                $result1 = mysqli_query($db, $sql1);
                                                if($result1 != "")
                                                {
                                                    $row1=mysqli_fetch_row($result1);
                                                    ?>
                                                <td><?php echo $row1[1]; ?></td>
                                                <?php
                                            } 
                                            else {
                                                ?>
                                                <td> </td>
                                                <?php
                                            }
                                            ?>
                                        <td><?php echo $row[10]; ?></td>
                                        <td><?php echo $row[11]; ?></td>
                                        <!-- <td><?php echo $row[11]; ?></td> -->
                                        <td><?php echo $row[13]; ?> </td>
                                        <td><?php echo $row[14]; ?></td>
                                        <td><?php echo $row[20]; ?></td>
                                        <td><?php echo $row[23]; ?></td>
                                        <td><?php echo $row[24]; ?></td>
                                        <td>
                                            <?php 
                                            if($row[32]==0)
                                                echo '<span class="text-success">Active</span>';
                                            else
                                                echo '<span class="text-danger">InActive</span>';
                                            ?>
                                        </td>
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
        "createdRow": function(row, data, dataIndex){
            if(data[15] == `<span class="text-danger">InActive</span>`){
                $(row).addClass('redClass')
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
