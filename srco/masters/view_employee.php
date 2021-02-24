
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

.redClass {
    background: rgba(255, 0, 0, 0.1) !important;
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

td {
    text-transform: capitalize;
}

@media (min-width: 320px) and (max-width: 600px) {
    .mobile-width {
        width: 31%;
    }
    .mobile-width1 {
        width: 23%;
        display: contents;
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
                                    <div class="col-lg-2 col-md-2 col-sm-2 mobile-width1 border-right-blue-grey border-right-lighten-5">
                                        <!-- Small button groups (default and split) -->
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-lg dropdown-toggle pl-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                                All Employee
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" disabled style="font-weight: 500, color: gray">DEFAULT FILTERS</a>
                                                <a class="dropdown-item" href="#">All</a>
                                                <a class="dropdown-item" href="#">Draft</a>
                                                <a class="dropdown-item" href="#">Pending Approval</a>
                                                <a class="dropdown-item" href="#">Approved</a>
                                                <a class="dropdown-item" href="#">Issued</a>
                                                <a class="dropdown-item" href="#">Billed</a>
                                                <a class="dropdown-item" href="#">Partially Billed</a>
                                                <a class="dropdown-item" href="#">Closed</a>
                                                <a class="dropdown-item" href="#">Canceled</a>
                                                <hr />
                                                <a class="dropdown-item" href="new_custom_purchaseorder.php" style="color: #3BAFDA"><i class="fa fa-plus"></i> &nbsp;New Custom View</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>

                                    <div class="col-lg-1 col-md-2 col-sm-2 mobile-width">                                  
                                        <a href="add_employee.php" style="float: right;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
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
                                    <div class="col-md-1 col-sm-2">
                                        <label>Search</label>
                                    </div>
                                    <div class="col-lg-2 col-md-3 mt-2">
                                    <label>Name</label>
                                        <input type="text" name="name" id="name" style="width: -webkit-fill-available;" />
                                    </div>
                                    <div class="col-lg-2 col-md-3 mt-2">
                                    <label>Phone No</label>
                                        <input type="text" name="phone_no" id="phone_no" style="width: -webkit-fill-available;" />
                                    </div>
                                    <div class="col-lg-2 col-md-3 mt-2">
                                    <label>Mobile No</label>
                                        <input type="text" name="mobile_no" id="mobile_no" style="width: -webkit-fill-available;" />
                                    </div>
                                    <div class="col-lg-2 col-md-3 mt-2">
                                    <label>Reference</label>
                                        <input type="text" name="reference" id="reference" style="width: -webkit-fill-available;" />
                                    </div>
                                    <div class="col-lg-2 col-md-3 mt-2">
                                    <label>Status</label>
                                        <input type="text" name="status" id="status" style="width: -webkit-fill-available;" />
                                    </div>
                                    <div class="col-lg-1 col-md-3 mt-3">
                                        <button type="button" name="show" class="btn btn-primary" id="show" >
	                                        <i class="fa fa-check-square-o"></i> Show
	                                    </button>
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
                            <table class="border-bottom-0 table table-hover table-bordered table-striped responsive" id="tbl">
                                <thead>
                                    <tr >
                                        <th></th>
                                        <th>Action</th>
                                        <th>Company Name</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone No</th>
                                        <th>Mobile No</th>
                                        <th>Reference</th>
                                        <th>Address</th>
                                        <th>Date Of Birth</th>
                                        <th>Joining Date</th>
                                        <th>Salary</th>
                                        <th>Designation</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <?php

                                 $flag=$_SESSION['flag'];

                                if($flag == 0)
                                {
                                    $sql_charges="SELECT * FROM mstr_employee where flag='0'";
                                }
                                else {
                                    $sql_charges="SELECT * FROM mstr_employee where flag='1'";
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
                                            <a href="edit_employee.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                  
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/employee/delete_employee.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row[0];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                  
                                            </a>
                                        </td>
                                        <td><?php echo $row[8]; ?> </td>
                                        <td><a href="#"><?php echo $row[0]; ?></a></td>
                                        <td><?php echo $row[1] ?></td>
                                        <td><?php echo $row[9] ?></td>
                                        <td><?php echo $row[10]; ?> </td>
                                        <td><?php echo $row[4]; ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td><?php echo $row[11] ?></td>
                                        <td><?php echo $row[12]; ?> </td>
                                        <td><?php echo $row[25]; ?></td>
                                        <td><?php echo $row[3] ?></td>
                                        <td><?php if( $row[7] == 1){?><span class="green-text"><?php echo "Active";?></span><?php }else{?><span class="text-danger"><?php echo "Inactive";?></span><?php } ?></td>
                                        <!-- <td  onclick="openNav()"></td> -->
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

<script>
                    function openNav() 
                    {
                        //alert("hii:");
                        window.location.href = 'purchase_account_view.php'; //Will take you to Google.                        
                       
                    }
                    </script>

<?php include('../../partials/footer.php');?>
