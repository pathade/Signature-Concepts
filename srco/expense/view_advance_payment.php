
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
                                                All Advance Payment
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="add_advance_payment.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
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
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        From Date <input type="date" class="mt-1" name="from_date" id="from_date"  />&nbsp;&nbsp;&nbsp;
                                        To <input type="date" class="mt-1" name="to_date" id="to_date"  />&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" class="mt-1" name="all_date" id="all_date" checked />&nbsp; All &nbsp;&nbsp;
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 mt-1">
                                        status <input type="radio" name="status" id="active" style="height: calc(2.75rem + -22px);width: 20px" checked />&nbsp;Active &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="status" id="inactive" style="height: calc(2.75rem + -22px);width: 20px" />&nbsp;InActive &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-1">
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
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <table class="table table-striped table-bordered responsive" id="tbl">
                                <thead>
                                    <tr >
                                        
                                        <th></th>
                                        <th>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Adv Pay ID</th>
                                        <th>Type </th>
                                        <th>Branch</th>
                                        <th>Supplier Name</th>
                                        <th>Cheque No</th>
                                        <th>Cheque Date</th>
                                        <th>Amount</th>
                                        <th>Bank</th>
                                        <th>Payment Type</th>
                                        <th>Authorised By</th>
                                        <th>Remark</th>
                                        
                                    </tr>
                                </thead>

                                <?php
                                    if ($flag == 0) {
                                    $sql_charges="SELECT  * 
                                    FROM exp_advance_payment where adv_pay_cancel_status != '1' and flag='0'";
                                    }
                                    else {
                                        $sql_charges="SELECT  * 
                                        FROM exp_advance_payment where adv_pay_cancel_status != '1' and flag='1'";
                                    }
                                    $result_charges = mysqli_query($db, $sql_charges);
                                    ?>
                                <tbody>
                                <?php
                                if($result_charges != "")
                                {
                                    while ($row=mysqli_fetch_row($result_charges))
                                    {
                                        $dwl_status = $row[23];
                                        if($dwl_status == 1)
                                        {
                                            ?>
                                            <tr style="cursor: pointer;background-color: mistyrose;">
                                        
                                        <td></td>
                                        <td style="display: flex;"> 
                                            <a href="edit_advance_payment.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a onclick="return confirm('Are you want to delete?')" href="../../api/expense/delete_advance_payment.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $row[0]; ?> </td>
                                        <!--<td ><?php //if( $row[1] == 1){?><span class="green-text"><?php //echo "Finance";?></span><?php //}else{?><span class="text-success"><?php //echo "Expenses";?></span><?php //} ?></td>-->
                                        <td ><?php echo $row[1] ?></td>
                                        <td><?php echo $row[13]; ?></td>
                                        <?php 
                                            if($row[1] == "Expense")
                                            {
                                                if($flag == 0){
                                                    $sql1 = "SELECT DISTINCT vendor_id_pk,saturation, first_name, last_name 
                                                    FROM mstr_vendor WHERE vendor_id_pk = $row[4] and flag='0'";
                                                }
                                                else {
                                                    $sql1 = "SELECT DISTINCT vendor_id_pk,saturation, first_name, last_name 
                                                    FROM mstr_vendor WHERE vendor_id_pk = $row[4] and flag='1'";
                                                }
                                                    $result1 = mysqli_query($db, $sql1);
                                                    if($result1 != "")
                                                    {
                                                        $row1=mysqli_fetch_row($result1);
                                                ?>
                                                    <td><?php echo  $row1['1'].". ".$row1['2']." ".$row1['3'];?></td>
                                                <?php
                                                    } 
                                                    else 
                                                    {
                                                ?>
                                                        <td> </td>
                                                <?php
                                                    }
                                            }
                                            else if($row[1] == "Finance" )
                                            {
                                                if ($flag == 0) {
                                                $sql1 = "SELECT supplier_id_fk,name 
                                                FROM mstr_supplier WHERE supplier_id_fk = $row[4] and flag = '0'";
                                                }
                                                else {
                                                    $sql1 = "SELECT supplier_id_fk,name 
                                                FROM mstr_supplier WHERE supplier_id_fk = $row[4] and flag = '1'";
                                                }
                                                $result1 = mysqli_query($db, $sql1);
                                                if($result1 != "")
                                                    {
                                                        $row1=mysqli_fetch_row($result1);
                                                ?>
                                                    <td><?php echo  $row1['1'];?></td>
                                                <?php
                                                    } 
                                                    else 
                                                    {
                                                ?>
                                                        <td> </td>
                                                <?php
                                                    }
                                            }
                                         ?>
                                        <td><?php echo $row[10]; ?> </td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[8]; ?></td>
                                        <?php 
                                        if($flag == 0) {
                                            $sql1 = "SELECT DISTINCT bank_idpk, bank_name FROM mstr_bank WHERE bank_idpk = $row[9] and flag='0'";
                                        }
                                        else {
                                            $sql1 = "SELECT DISTINCT bank_idpk, bank_name FROM mstr_bank WHERE bank_idpk = $row[9] and flag='1'";
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
                                        <td><?php echo $row[3]; ?></td>
                                        <td><?php echo $row[11]; ?></td>
                                        <td><?php echo $row[12]; ?> </td>
                                    </tr>
                                            <?php

                                        }
                                        else
                                        {
                                            ?>
                                        <tr style="cursor: pointer">
                                        
                                        <td></td>
                                        <td style="display: flex;"> 
                                            <a href="edit_advance_payment.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a onclick="return confirm('Are you want to delete?')" href="../../api/expense/delete_advance_payment.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $row[0]; ?> </td>
                                        <!--<td ><?php //if( $row[1] == 1){?><span class="green-text"><?php //echo "Finance";?></span><?php //}else{?><span class="text-success"><?php //echo "Expenses";?></span><?php //} ?></td>-->
                                        <td ><?php echo $row[1] ?></td>
                                        <td><?php echo $row[13]; ?></td>
                                        <?php 
                                            if($row[1] == "Expense")
                                            {       
                                                    if ($flag == 0){
                                                        $sql1 = "SELECT DISTINCT vendor_id_pk,saturation, first_name, last_name 
                                                        FROM mstr_vendor WHERE vendor_id_pk = $row[4] and flag = '0'";
                                                    }
                                                    else {
                                                    $sql1 = "SELECT DISTINCT vendor_id_pk,saturation, first_name, last_name 
                                                    FROM mstr_vendor WHERE vendor_id_pk = $row[4] and flag = '1'";
                                                    }
                                                    $result1 = mysqli_query($db, $sql1);
                                                    if($result1 != "")
                                                    {
                                                        $row1=mysqli_fetch_row($result1);
                                                ?>
                                                    <td><?php echo  $row1['1'].". ".$row1['2']." ".$row1['3'];?></td>
                                                <?php
                                                    } 
                                                    else 
                                                    {
                                                ?>
                                                        <td> </td>
                                                <?php
                                                    }
                                            }
                                            else if($row[1] == "Finance" )
                                            {
                                                if ($flag == 0){
                                                    $sql1 = "SELECT supplier_id_fk,name 
                                                    FROM mstr_supplier WHERE supplier_id_fk = $row[4] and flag='0'";
                                                }
                                                else {
                                                    $sql1 = "SELECT supplier_id_fk,name 
                                                FROM mstr_supplier WHERE supplier_id_fk = $row[4] and flag='1'";
                                                }
                                                $result1 = mysqli_query($db, $sql1);
                                                if($result1 != "")
                                                    {
                                                        $row1=mysqli_fetch_row($result1);
                                                ?>
                                                    <td><?php echo  $row1['1'];?></td>
                                                <?php
                                                    } 
                                                    else 
                                                    {
                                                ?>
                                                        <td> </td>
                                                <?php
                                                    }
                                            }
                                         ?>
                                        <td><?php echo $row[10]; ?> </td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[8]; ?></td>
                                        <?php 
                                        if ($flag == 0){
                                        $sql1 = "SELECT DISTINCT bank_idpk, bank_name FROM mstr_bank 
                                        WHERE bank_idpk = $row[9] and flag='0' ";
                                        }
                                        else {
                                            $sql1 = "SELECT DISTINCT bank_idpk, bank_name FROM mstr_bank 
                                        WHERE bank_idpk = $row[9] and flag='1' ";
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
                                        <td><?php echo $row[3]; ?></td>
                                        <td><?php echo $row[11]; ?></td>
                                        <td><?php echo $row[12]; ?> </td>
                                    </tr>
                                            <?php

                                        }

                                    ?>
                                    
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

<!-- <script>
    function openNav() 
    {
        //alert("hii:");
        window.location.href = 'purchase_account_view.php'; //Will take you to Google.                        
        
    }
    </script> -->

<?php include('../../partials/footer.php');?>
