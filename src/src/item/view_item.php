

<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn1 {
  position: absolute;
  top: 100px;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color: black;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Sales stats -->
<div class="row" id="main">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <!-- Small button groups (default and split) -->
                            <div class="btn-group">
                              <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                All Items
                              </button>
                              <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All</a>
                                    <a class="dropdown-item" href="#">Active</a>
                                    <a class="dropdown-item" href="#">Inactive</a>
                                    <a class="dropdown-item" href="#">Sales</a>
                                    <a class="dropdown-item" href="#">Purchases</a>
                                    <a class="dropdown-item" href="#">Services</a>
                              </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-sm-12">
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          
                        
                            <a href="add_item.php"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
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
                                  <button type="button" class="btn btn-default" data-dismiss="modal"><a href="view_item.php">Cancel</a></button>
                                  
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
                    <div id="mySidenav" class="sidenav" style="background-color:white;border-left: 2px solid bisque">
                        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                        <!-- <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#">Clients</a>
                        <a href="#">Contact</a> -->
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-sm-4 ">
                                        <b id="product_name">Product Name</b>
                                        </div>
                                        <div class="col-lg-1 col-sm-4 ">
                                            <b><button class="btn btn-default" id="edit_id1" onclick="edit(this.id);"><i class="fa fa-pencil" aria-hidden="true"></i></button></b>
                                        </div>
                                        <div class="col-lg-2 col-sm-4 ">
                                            <b><button class="btn btn-success">Adjust Stock</i></button></b>
                                        </div>
                                        <div class="col-lg-1 col-sm-4 ">
                                            <!-- <b><button class="btn btn-default">More</i></button></b> -->
                                            <div class="dropdown">
                                            <b>
                                                <button class="btn btn-default" id="edit_id1" onclick="delete_item1(this.id);"><i class="fa fa-trash" aria-hidden="true"></i></button></b>
                                                <!-- <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" onclick="delete_item1();">More -->

                                                <!-- <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                               
                                                <li>
                                                    
                                                    <a href=""  style="font-size: 14px;" onclick="delete_item1();">Delete</a>

                                                </li>
                                                </ul> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-4 ">
                                        <b><a href="javascript:void(0)" class="closebtn btn-default" onclick="closeNav()">&times;</a></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul class="nav nav-tabs nav-underline" >
                                            <li class="nav-item" style="font-size:15px !important;">
                                            <a class="nav-link active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" aria-expanded="true" style="font-size: large !important;">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" aria-expanded="false" style="font-size: large !important;">History</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" aria-expanded="false" style="font-size: large !important;">Adjustments</a>
                                            </li>														
                                        </ul>
                                    </div>
                                    <div class="tab-content px-1 mt-3">
                                        <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <label class="col-md-5 label-control" >Company Name</label>
                                                        <div class="col-md-7">
                                                            <b id="item_type"></b>
                                                            <b id="edit_id" style="display:none;"></b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <label class="col-md-5 label-control" >UOM</label>
                                                        <div class="col-md-7">
                                                            <p id="uom"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <label class="col-md-5 label-control" >Sale Rate</label>
                                                        <div class="col-md-7">
                                                        <!-- &#8377; -->
                                                        <p id="sale_rate"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <label class="col-md-5 label-control" >Purchase Rate</label>
                                                        <div class="col-md-7">
                                                        <!-- &#8377; -->
                                                        <p id="purchase_rate"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane " id="tabIcon22" aria-expanded="true" aria-labelledby="baseIcon-tab22">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <div class="col-md-5">
                                                            Date
                                                        </div>
                                                        <div class="col-md-7">
                                                            Details
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <div class="col-md-5">
                                                            <p id="add_date"></p><p id="add_time"></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <p id="added_by"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane " id="tabIcon23" aria-expanded="true" aria-labelledby="baseIcon-tab23">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        Adjustment Will appear here
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="card-body card-dashboard">
                    
						<table class="table table-striped table-bordered responsive" id="tbl">
							<thead>
								<tr >
									<th></th>
									<th>Company Name </th>
									<th>Item Name</th>
									<th>UOM</th>
									<th>GST Group</th>
									<th>Sale Rate</th>
									<th>Purchase Rate</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
                                //$sql= "SELECT * FROM mstr_item WHERE delete_status='0'order by item_id_pk DESC";
                                echo $sql = "SELECT * FROM mstr_item as i,mstr_customer as c WHERE c.cust_id_pk = i.cust_id_fk AND i.delete_status='0'order by item_id_pk DESC";
                                $res = mysqli_query($db,$sql);
                                while($rw = mysqli_fetch_array($res)){
                            
                            ?>
								<tr id="<?php echo $rw['item_id_pk']; ?>" onclick="openNav(this.id)">
									<td></td>
									<td><?php echo $rw['company_name'];?></td>
									<td><?php echo $rw['item_name'];?></td>
									<td><?php echo $rw['uom'];?></td>
									<td><?php echo $rw['gst_group'];?></td>
									<td><?php echo $rw['sale_rate'];?></td>
									<td><?php echo $rw['purchase_rate'];?></td>
                                </tr>
                                <?php } ?>
                                
							</tbody>
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
<script>
                    function openNav(id) 
                    {
                        //alert("hii:"+id);
                        document.getElementById("mySidenav").style.width = "763px";
                        document.getElementById("main").style.marginLeft = "-13px";
                        $.ajax({
							type: "POST",
							url: '../../api/item/fetch_item_details.php',
							data: "id="+id ,
							success: function(data)
							{ 
                                var d = data.split("#");
                                $('#product_name').text(d[0]);
                                $('#item_type').text(d[1]);
                                $('#uom').text(d[2]);
                                $('#sale_rate').text(d[4]);
                                $('#purchase_rate').text(d[5]);
                                $('#add_date').text(d[6]);
                                $('#add_time').text(d[7]);
                                $('#added_by').text(d[8]);
                                $('#edit_id').text(d[9]);
                                //document.getElementById("edit_id").value = d[9];
							}
			            });
                    }

                    function closeNav() 
                    {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginLeft= "0";
                    }
                    </script>
<?php include('../../partials/footer.php');?>
<script>
function edit()
{
    
    var  edit_id= document.getElementById("edit_id").innerText;
    //alert("id is:"+edit_id);
    window.location = "edit_item.php?id="+edit_id;
}

function delete_item1()
{
    var  edit_id= document.getElementById("edit_id").innerText;
    
    if(confirm("Are you sure you want to delete this item?"))
    {
        //alert("hii");
        $.ajax({
            type: "POST",
            url: '../../api/item/delete_item.php',
            data: "id="+edit_id ,
            success: function(data)
            { 
                //alert(data);
                if(data == 1)
                {
                    alert("Record Deleted");
                    window.location = "view_item.php";
                }
                else
                {

                }
            }
        });
    }
    else
    {
        //alert("bye");
    }
    
}
</script>