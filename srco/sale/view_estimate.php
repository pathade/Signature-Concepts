

<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Sales stats -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <!-- Small button groups (default and split) -->
                            <div class="btn-group">
                              <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                All Estimates
                              </button>
                              <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All Estimates</a>
                                    <a class="dropdown-item" href="#">Active Estimates</a>
                                    <a class="dropdown-item" href="#">Inactive Estimates</a>
                                    <a class="dropdown-item" href="#">Overdue Estimates</a>
                                    <a class="dropdown-item" href="#">Unpaid Estimates</a>
                              </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-sm-12">
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          
                        
                            <a href="add_estimate.php"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                        </div>
                        <div class="col-lg-1 ">
                           
                            
                        <div class="content-header-right col-md-4 col-12">
                            <div class="btn-group float-md-right show">
                                 <button class="btn btn-light btn-min-width link bounce-out-on-hover " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ft-menu" style="color: black;"></i></button>
                                    <div class="dropdown-menu arrow " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 1px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#"> Name</a>
                                        <a class="dropdown-item" href="#"> Date</a>
                                        <a class="dropdown-item" href="#">Last Modified Time <i class="fa fa-sort" aria-hidden="true"></i></a>

                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="import_item.php"><i class="fa fa-download" aria-hidden="true"></i> Import Items</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-download" aria-hidden="true"></i>  Export Items</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="fa fa-download" aria-hidden="true"></i> Export Current View</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="fa fa-download" aria-hidden="true"></i> Refresh List</a>
                                     </div>
                            </div>
                        </div>
                                    
                            
                        </div>
                    
                        <div class="col-lg-2">
                        <div class="btn-group mr-1 mb-1 show">
                            
                            <button type="button" class="btn btn-light btn-min-width link bounce-out-on-hover"  aria-expanded="true" data-toggle="modal" data-target="#Item_Search_modal">
                                            
                                            
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            
                            </button>
                              
  
                        </div>
                        <div class="modal fade" id="Item_Search_modal" role="dialog">
                            <div class="modal-dialog modal-lg">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <div class="row"> -->
                                        <div class="col-lg-2 col-sm-4">
                                            <h5 class="modal-title">Search</h5>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <select class="form-control">
                                              <option>Items</option>
                                              <option>Customer</option>
                                              <option>Estimates</option>
                                              <option>Sale Order</option>
                                              <option>Delivery Challan</option>
                                              <option>Invoices</option>
                                              <option>Payment Received</option>
                                              <option>Vendor</option>
                                              <option>Expenses</option>
                                              <option>Purchase Order</option>
                                              <option>Bill</option>
                                              <option>Payments Made</option>
                                            </select>

                                        </div>

                                        <div class="col-lg-4 col-sm-4">
                                            
                                        </div>
                                        <div class="col-lg-1 col-sm-4">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                    <!-- </div> -->
                                  
                                  
                                  
                                  
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-4">
                                            Item Name
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input type="text" class="form-control" name="">
                                        </div>
                                        <div class="col-lg-2 col-sm-4">
                                            Description
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input type="text" class="form-control" name="">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-4">
                                            Rate
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input type="text" class="form-control" name="">
                                        </div>
                                        <div class="col-lg-2 col-sm-4">
                                            Status
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input type="text" class="form-control" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <center>
                                    <button type="button" class="btn btn-success" >Search</button>
                                  </center>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  
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
</div>
<section id="checkbox">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					
					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show">
					<div class="card-body card-dashboard">
						
						<table class="table table-striped table-bordered responsive" id="tbl">
							<thead>
								<tr>
									<th></th>
									<th>Date</th>
									<th>Estimate Number</th>
									<th>Reference Number</th>
									<th>Customer Name</th>
									<th>Status</th>
                                    <th>Amount</th>
                                    
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>20/11/2020</td>
									<td>EST-000001</td>
									<td>11002</td>
									<td>Aroma Perfumes</td>
									<td>Invoiced</td>
                                    <td>500000</td>
                                </tr>
							</tbody>
							<tfoot>
								<tr>
                                    <th></th>
									<th>Date</th>
									<th>Estimate Number</th>
									<th>Reference Number</th>
									<th>Customer Name</th>
									<th>Status</th>
                                    <th>Amount</th>
								</tr>
							</tfoot>
						</table>				
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
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


//     $('#tbl').on('click', 'tbody td', function(){
//    window.location = $(this).closest('tr').find('td:eq(0) a').attr('import');
// });
	});
			
		
</script>
<?php include('../../partials/footer.php');?>