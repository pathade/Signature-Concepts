

<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

<style>

.redClass {
    background-color: rgba(255,0,0,.1) !important;
    color: #333 !important;
}
    @media screen and (max-width: 640px) {
    div.dt-buttons {
        display: table;
    }
}
</style>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body"><!-- Sales stats -->
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.475rem;">
                        <div class="card-content">
                            <div class="card-body" style="padding: 0.5rem;">
                                <div class="row" style="margin: 0;">
                        <div class="col-lg-2 col-md-2 col-sm-2 mobile-width border-right-blue-grey border-right-lighten-5">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-lg dropdown-toggle pl-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                    All Vendor
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                <a href="add_vendor.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                            
                        </div>
                        
                        </div>
                    
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
<!-- <section id="checkbox"> -->
	<!-- <div class="row">
		<div class="col-12"> -->
			<div class="card">
				<div class="card-content ">
					<div class="card-body ">
                    <div class="row" style="margin: 0;">
						<table class="table table-striped table-bordered responsive" id="tbl">
							<thead>
								<tr>
									<th></th>
                                    <th>Action</th>
                                    <th>ID</th>
									<th>Name</th>
                                    <th>Type</th>
									<th>Company Name</th>
									<th>Email</th>
									<th>Work Phone</th>
									<th>Work Mobile</th>
									<th>Status</th>

								</tr>
							</thead>
							<tbody>
                            <?php 
                            $flag=$_SESSION['flag'];
                            if($flag == 0) {
                                $sql= "SELECT * FROM mstr_vendor where flag=$flag ";
                            }
                            else {
                                   $sql= "SELECT * FROM mstr_vendor where flag=$flag ";
                            }
                                $res = mysqli_query($db,$sql);
                                while($rw = mysqli_fetch_array($res)){
                            
                            ?>
								<tr>
                                    <td></td>
                                    <td style="display: flex;">
                                            <a href="edit_vendor.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $rw['vendor_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                  
                                            </a>
                                            
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/vendor/delete_vendor.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $rw['vendor_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                  
                                            </a>
                                    </td>
                                    <td><?php echo $rw['vendor_id_pk']; ?> </td>
									<td><?php echo $rw['first_name'];?></td>
									<td><?php echo $rw['type'];?></td>
                                    <td><?php echo $rw['company_name'];?></td>
									<td><?php echo $rw['cust_email'];?></td>
									<td><?php echo $rw['cust_phone'];?></td>
									<td><?php echo $rw['cust_mobile'];?></td>
                                    <td>
                                    <?php 
                                        if($rw['delete_status'] == 0)
                                            echo '<span class="text-success">Active</span>';
                                        else
                                            echo '<span class="text-danger">InActive</span>';
                                    ?>  
                                    </td>
                                    
                                </tr>
                                <?php } ?>
							</tbody>
						</table>				
					</div>
				</div>
            </div>
            </div>
		<!-- </div>
	</div> -->
<!-- </section> -->
<!--/ most selling products-->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
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
            // alert(data[9])
            if( data[9] ==  `<span class="text-danger">InActive</span>`){
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