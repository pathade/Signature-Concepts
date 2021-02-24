
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>

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
                                                All Bank Transaction
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                        <a href="add_bank_transaction.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
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
                                        <th>Action</th>
                                        <th>Id</th>
                                        <th>Particulars/Party &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Cheque No</th>
                                        <th>Cheque Date</th>
                                        <th>Amount</th>
                                        <th>Bank Name &nbsp;&nbsp;&nbsp;</th>
                                        <th>Account No &nbsp;&nbsp;&nbsp;</th>
                                        <th>Against &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
                                        <!-- <th>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                        <!-- <th>No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                        <th>FinYr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <!-- <th>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                        <th>Vendor/Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Remark &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Recon Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Recon Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Mode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Entry Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>

                                <?php
                                if($flag == 0){
                                    $sql_charges="SELECT * FROM fin_bank_transaction where flag='0' ";
                                }
                                else {
                                    $sql_charges="SELECT * FROM fin_bank_transaction where flag='1' ";
                                }
                                    $result_charges = mysqli_query($db, $sql_charges);
                                    ?>
                                <tbody>
                                <?php
                                if($result_charges != "")
                                {
                                    while ($row=mysqli_fetch_array($result_charges))
                                    {
                                    ?>
                                    <tr style="cursor: pointer">
                                        
                                        <td></td>
                                        <td style="display: flex;">
                                            <a href="edit_bank_transaction.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <!-- <a onclick="return confirm('Are you want to delete?')" href="../../api/finance/delete_bank_transaction.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a> -->
                                        </td>
                                        <!--bank transaction id-->
                                        <td><?php echo $row['bt_no']; ?> </td>
                                        <!--Party-->
                                        <?php 
                                            $party_from = $row['party_from'];
                                            $particular_party = $row['particular_party'];

                                            if($party_from == "WC")
                                            {
                                                if($flag== 0){
                                                    $sql = "SELECT * FROM tbl_wholesale_customer 
                                                    WHERE wc_id_pk='$particular_party' and flag='0' ";
                                                }
                                                else {
                                                    $sql = "SELECT * FROM tbl_wholesale_customer 
                                                WHERE wc_id_pk='$particular_party' and flag='1' ";
                                                }
                                                $res = mysqli_query($db,$sql);
                                                while($rw = mysqli_fetch_array($res))
                                                {
                                                    $party_name = $rw['cust_name'];
                                                }

                                            }
                                            else if($party_from == "RC")
                                            {
                                                if($flag == 0){
                                                    $sql = "SELECT * FROM mstr_retail_customer 
                                                    WHERE retail_cust_idpk='$particular_party' and flag='0' ";
                                                }
                                                else {
                                                    $sql = "SELECT * FROM mstr_retail_customer 
                                                WHERE retail_cust_idpk='$particular_party' and flag='1' ";
                                                }
                                                $res = mysqli_query($db,$sql);
                                                while($rw = mysqli_fetch_array($res))
                                                {
                                                    $party_name = $rw['retail_cust_name'];
                                                }
                                            }
                                            else if($party_from == "V")
                                            {
                                                if ($flag == 0)
                                                {
                                                    $sql = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$particular_party' and flag='0' ";
                                                }
                                                else {
                                                    $sql = "SELECT * FROM mstr_vendor WHERE vendor_id_pk='$particular_party' and flag='1' ";
                                                }
                                                $res = mysqli_query($db,$sql);
                                                while($rw = mysqli_fetch_array($res))
                                                {
                                                    $party_name = $rw['first_name']." ".$rw['last_name'];
                                                }
                                            }
                                            else if($party_from == "S")
                                            {
                                                if ($flag == 0)
                                                {
                                                $sql = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$particular_party' and flag='0' ";
                                                }
                                                else {
                                                    $sql = "SELECT * FROM mstr_supplier WHERE supplier_id_fk='$particular_party' and flag='1' ";
                                                }
                                                $res = mysqli_query($db,$sql);
                                                while($rw = mysqli_fetch_array($res))
                                                {
                                                    $party_name = $rw['name'];
                                                }

                                            }
                                            else
                                            {

                                            }
                                        ?>
                                        <td><?php echo $row['particular_party']; ?></td>
                                        <!--Cheque no-->
                                        <?php 
                                        if($row['cheque_no'] != "")
                                        {
                                            ?>
                                            <td><?php echo $row['cheque_no']; ?></td>
                                            <?php
                                        } 
                                        else
                                        {
                                            ?>
                                            <td></td>
                                            <?php
                                        }
                                        ?>
                                        
                                        <?php 
                                        if($row['cheque_date'] != "")
                                        {
                                            ?>
                                            <td><?php echo $row['cheque_date']; ?></td>
                                            <?php
                                        } 
                                        else
                                        {
                                            ?>
                                            <td></td>
                                            <?php
                                        }
                                        ?>
                                        
                                        
                                        
                                        <!--Amount-->
                                        <td><?php echo $row['amount']; ?></td>
                                        
                                        <!--bank Name-->
                                        <?php 
                                        if($flag == 0) {
                                            $sql1 = "SELECT DISTINCT bank_name, account_no 
                                            FROM mstr_bank 
                                            WHERE bank_idpk = '".$row['bank_name']."' and flag='0' ";
                                        }
                                        else {
                                            $sql1 = "SELECT DISTINCT bank_name, account_no 
                                        FROM mstr_bank 
                                        WHERE bank_idpk = '".$row['bank_name']."' and flag='1' ";
                                        }
                                        $result1 = mysqli_query($db, $sql1);
                                        $row1=mysqli_fetch_row($result1);
                                            if($row1 != "")
                                        {
                                            ?>
                                        <!--Bank Name-->
                                        <td><?php echo $row1[0]; ?> </td>
                                        <!--Account No -->
                                        <td><?php echo $row1[1]; ?></td>
                                        <?php
                                        } 
                                        else 
                                        {
                                           ?>
                                           <td> </td>
                                           <td> </td>
                                           <?php
                                        }
                                         ?>
                                        
                                        <td><?php echo $row['against'];?></td>
                                        <td ><?php echo $row['fin_yr'];?></td>
                                        <!-- <td><?php echo $row['19']; ?></td> -->
                                        <td><?php echo $row['party_from']; ?> </td>
                                        <td><?php echo $row['remark']; ?></td>
                                        <td><?php echo $row['recon_status']; ?></td>
                                        <td><?php echo $row['recon_date']; ?></td>
                                        <td><?php echo $row['mode']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
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
            // alert(data[10])
            if( data[10] ==  `<span class="text-danger">Inactive</span>`){
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

<?php include('../../partials/footer.php');?>
