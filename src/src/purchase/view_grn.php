
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

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
                                                All GRN
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="add_grn.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
                                    </div>
                                  
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
                                        <th>Purchase_order_no</th>
                                        <th>GRN_no</th>
                                        <th>Supplier </th>
                                        <th>Branch</th>
                                        <th>Date</th>
                                        <th>Mobile No</th>
                                        <th>Refernce No</th>                                        
                                        <th>Address</th>
                                        <th>Remark</th>
                                        <th>Challan_no</th>
                                        <th>Prepared by</th>
                                        <th>Unloaded by</th>
                                        <th>Stock Point</th>
                                        <th>Gross Amt.</th>
                                        <th>Total Quantity</th>
                                        <th>Others</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        
                                        <!-- <th type="button" aria-expanded="true" data-toggle="modal" data-target="#Item_Search_modal">
                                            <i class="fa fa-search cursor-pointer" ARIA-hidden="TRUE"></i>
                                        </th> -->
                                    </tr>
                                </thead>

                                <?php
                                  $flag=$_SESSION['flag'];
                                    $sql_charges="SELECT * FROM grn where flag='$flag'";
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
                                            <a href="edit_grn.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                  
                                            </a>
                                            <?php
                                            if($flag==0)
                                            {?>
                                            <a href="../../fpdf/api/grn.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                            <a onclick="return confirm('Confirm send mail?')" href="../../fpdf/api/grn_mail.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </a>
                                            <?php }
                                            else {?>
                                                <a href="../../fpdf/api/grn_raw.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                            <?php }
                                            ?>
                                            
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/purchase/delete_grn.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                  
                                            </a>
                                        </td>
                                        <td><?php echo $row[0]; ?> </td>
                                        <?php
                                            $get_pono = "SELECT purchase_order_no FROM purchase_order WHERE id='$row[5]'";
                                            $res_pono = mysqli_fetch_array(mysqli_query($db, $get_pono));
                                        ?>
                                        <td><?php echo $res_pono['0']; ?></td>
                                        <td><?php echo $row[4]; ?></td>
                                        <?php
                                            $get_supplier = "SELECT name FROM mstr_supplier WHERE supplier_id_fk='$row[13]'";
                                            $res1 = mysqli_fetch_array(mysqli_query($db, $get_supplier));
                                        ?>
                                        <td><?php echo $res1['0']; ?></td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[10]; ?></td>
                                        <td><?php echo $row[7]; ?></td>
                                        <td><?php echo $row[6]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[11]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <?php
                                            $get_emp1 = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='$row[3]'";
                                            $res3 = mysqli_fetch_array(mysqli_query($db, $get_emp1));
                                        ?>
                                        <td><?php echo $res3['0']; ?></td>
                                        <?php
                                            $get_emp = "SELECT emp_name FROM mstr_employee WHERE emp_id_pk='$row[8]'";
                                            $res2 = mysqli_fetch_array(mysqli_query($db, $get_emp));
                                        ?>
                                        <td><?php echo $res2['0']; ?></td>
                                        <td><?php echo $row[12]; ?></td>

                                        <td><?php echo $row[14]; ?></td>
                                        <td><?php echo $row[15]; ?></td>
                                        <td><?php echo $row[16]; ?></td>
                                        <td><?php echo $row[17]; ?></td>
                                        <td>
                                        <?php 
                                        if($row[19]==0)
                                            echo '<span class="text-success">Active</span>';
                                        else
                                            echo '<span class="text-danger">InActive</span>';
                                        ?>
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
        
        "createdRow": function(row, data, dataIndex){
            if(data[20] == `<span class="text-danger">InActive</span>`){
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

<script>
    function openNav() 
    {
        //alert("hii:");
        window.location.href = 'purchase_account_view.php'; //Will take you to Google.                        
        
    }
</script>

<?php include('../../partials/footer.php');?>
