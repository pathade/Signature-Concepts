
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
                                                Fixed Payment
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                     
                                            <a href="add_fixed_payment.php" style="float: left;"><button type="button"class="btn btn-success"><i class="fa fa-plus"></i> NEW</button></a>
                                    
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
                                        <th>Branch</th>
                                        <th>Exp Head</th>
                                        <th>Vendor</th>
                                        <th>Amount</th>
                                        <th>Service Tax(%)</th>
                                        <th>Service Tax</th>
                                        <th>Other Add</th>
                                        <th>Other Deduction</th>
                                        <th>TDS(%)</th>
                                        <th>TDS Amount</th>
                                        <th>Net Amount</th>
                                        <th>Recurrance</th>
                                        <th>From Period</th>
                                        <th>To Period</th>
                                        <th>Chq Date</th>
                                        <th>Remark</th>
                                        <th>Auth By Level1</th>
                                        <th>Auth By Level2</th>
                                        

                                        <!-- <th type="button" aria-expanded="true" data-toggle="modal" data-target="#Item_Search_modal">
                                            <i class="fa fa-search cursor-pointer" ARIA-hidden="TRUE"></i>
                                        </th> -->
                                    </tr>
                                </thead>
                                
                                <?php
                                    $sql="SELECT * FROM `exp_fixed_payment`";
                                    $res = mysqli_query($db, $sql);
                                ?>
                                <tbody>
                                <?php
                                //$vendor_name="";
                                if($res!= "")
                                {
                                    while ($row=mysqli_fetch_array($res))
                                    {
                                         $vendor=$row['vendor'];
                                         $exp_head=$row['exp_head'];

                                        $sql1="SELECT DISTINCT vendor_id_pk,saturation,first_name,last_name FROM mstr_vendor WHERE vendor_id_pk='$vendor'";
                                        $res1=mysqli_query($db,$sql1);
                                        $vendor_name='';
                                        while($row1=mysqli_fetch_array($res1))
                                        {
                                        $vendor_name= $row1['saturation']."&nbsp".$row1['first_name']."&nbsp".$row1['last_name'];
                                        }

                                       $sq="SELECT * FROM mstr_expense
                                       where expense_idpk='$exp_head'";
                                        $rs=mysqli_query($db,$sq);
                                        if (!$rs) 
                                        {
                                            printf("Error: %s\n", mysqli_error($db));
                                            exit();
                                        }
                                        $expense_head_name="";
                                    while($rw=mysqli_fetch_array($rs))
                                        {
                                        $expense_head_name=$rw['expense_head'];
                                        }

                                    ?>
                                    <tr style="cursor: pointer">
                                        
                                        <td></td>
                                        <td style="display: flex;">
                                            <a href="edit_fixed_payment.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['id'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                  
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/expenses/delete_fixed_payment.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=
                                            <?php echo $row['id'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                  
                                            </a>
                                        </td>
                                        <td><?php echo $row['id']; ?> </td>
                                        <td><?php echo $row['branch'];?></td>
                                        <td><?php echo $expense_head_name; ?></td>
                                        <td><?php echo $vendor_name; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['service_tax1']; ?></td>
                                        <td><?php echo $row['service_tax2']; ?></td>
                                        <td><?php echo $row['other_add']; ?></td>
                                        <td><?php echo $row['other_deduction']; ?></td>
                                        <td><?php echo $row['tds']; ?></td>
                                        <td><?php echo $row['tds_amt']; ?></td>
                                        <td><?php echo $row['net_amt']; ?></td>
                                        <td><?php echo $row['recurrance'];?></td>
                                        <td><?php echo $row['from_period'];?></td>
                                        <td><?php echo $row['to_period'];?></td>
                                        <td><?php echo $row['chq_date']; ?></td>
                                        <td><?php echo $row['remark']; ?></td>
                                        <td><?php echo $row['auth_by_level1']; ?></td>
                                        <td><?php echo $row['auth_by_level2']; ?></td>
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
                                ?>
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
