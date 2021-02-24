

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
  padding: none;
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

/* 
@media screen and (max-width: 320px) {
    #mySidenav{
        width: 390px;
    }
}

@media screen and (max-width: 375px) {
    #mySidenav{
        width: 390px;
    }
} */

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
                          
                        
                            <a href="add_customer.php"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
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
                                    <div class="row p-0 mb-2">
                                        <div class="col-lg-3 p-0 mt-1">
                                        <h6 id="product_name">Product Name</h6>
                                        </div>
                                        <div class="col-lg-1 mr-2">
                                        <button class="btn btn-default" id="edit_id1" onclick="edit(this.id);"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="col-lg-3 p-0">
                                        <button class="btn btn-success">Adjust Stock</i></button>   
                                        </div>
                                        <div class="col-lg-1 p-0">
                                            <!-- <b><button class="btn btn-default">More</i></button></b> -->
                                            <!-- <div class="dropdown"> -->
                                                <button class="btn btn-default" id="edit_id1" onclick="delete_item1(this.id);"><i class="fa fa-trash" aria-hidden="true"></i></button></b>
                                                <!-- <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" onclick="delete_item1();">More -->
                                                <!-- <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                               
                                                <li>
                                                    
                                                    <a href=""  style="font-size: 14px;" onclick="delete_item1();">Delete</a>

                                                </li>
                                                </ul> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-lg-2">
                                        <b><a href="javascript:void(0)" class="closebtn btn-default mt-0" onclick="closeNav()">&times;</a></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul class="nav nav-tabs nav-underline" >
                                            <li class="nav-item" style="font-size:15px !important;">
                                            <a class="nav-link active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" aria-expanded="true" style="font-size: large !important;">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" aria-expanded="false" style="font-size: large !important;">Comments</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" aria-expanded="false" style="font-size: large !important;">Sales</a>
                                            </li>														
                                        </ul>
                                    </div>
                                    <div class="tab-content px-1 mt-3">
                                        <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
                                        
        <div class="col-lg-12">
			<div class="mb-2 mt-2">
				<h6 class="mb-0 text-uppercase">Desai Bandhu</h6><hr>
				<p>There is no primary contact information. Add New</p>
			</div>
			<div id="accordionWrap2" role="tablist" aria-multiselectable="true">
				<div class="card collapse-icon accordion-icon-rotate left">
					
                    
                    <div id="h_address21"  class="card-header">
						<a data-toggle="collapse" data-parent="#accordionWrap2" href="#address21" aria-expanded="true" aria-controls="address21" class="card-title lead">ADDRESS</a>
					</div>
					<div id="address21" role="tabpanel" aria-labelledby="h_address21" class="collapse show">

						<div class="card-content">
                        <div class="form-group">
									<h5>Billing Address</h5>
									<p>No Billing Address -</p>
									<!-- Button trigger modal -->
									<button data-toggle="modal" class="btn  " data-backdrop="false" data-target="#primary">
										Add new address
									</button>

									<!-- Modal -->
                                <div class="modal fade text-left mt-5" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary white">
                                        <h4 class="modal-title white" id="myModalLabel8">Billing Address</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form class="form">
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label for="issueinput001">Attention</label>
                                                    <input type="text" id="issueinput001" class="form-control" placeholder="Attention" name="attention" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Attention">
                                                </div>


                                                <div class="form-group">
                                                    <label for="issueinput002">Country / Region</label>
                                                    <select id="issueinput002" name="country-region" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="country-region">
                                                        <option value="india">India</option>
                                                        <option value="us">US</option>
                                                        <option value="uk">UK</option>
                                                        <option value="japan">Japan</option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="issueinput003">Address</label>
                                                    <textarea id="issueinput003" rows="5" class="form-control mb-1" name="address1" placeholder="Street 1" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Address1"></textarea>
                                                    <textarea id="issueinput004" rows="5" class="form-control" name="address2" placeholder="Street 2" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Address2"></textarea>
                                                </div>
                                                

                                                <div class="form-group">
                                                    <label for="issueinput005">City</label>
                                                    <input type="text" id="issueinput005" class="form-control" placeholder="City Name" name="city" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="City">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="issueinput006">State</label>
                                                        <input type="text" id="issueinput006" class="form-control" placeholder="State" name="state" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="State">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="issueinput006">Zip Code</label>
                                                        <input type="text" id="issueinput007" class="form-control" placeholder="Zip Code" name="zip_code" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Zip Code">
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="issueinput008">Phone</label>
                                                        <input type="number" id="issueinput008" class="form-control" placeholder="Phone" name="phone" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Phone">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label for="issueinput009">Fax</label>
                                                        <input type="text" id="issueinput009" class="form-control" placeholder="Fax" name="fax" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Fax">
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>

                                
                                        </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-outline-primary">Save changes</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    
                                    <div id="h_other_detail22"  class="card-header">
                                        <a data-toggle="collapse" data-parent="#accordionWrap2" href="#other_detail22" aria-expanded="false" aria-controls="other_detail22" class="card-title lead collapsed">OTHER DETAILS</a>
                                    </div>
                                    <div id="other_detail22" role="tabpanel" aria-labelledby="h_other_detail22" class="collapse" aria-expanded="false">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                        Currency Code
                                                        </div>
                                                        <div class="col-sm-6">
                                                        INR
                                                        </div>
                                                        <div class="col-sm-6">
                                                        Portal Status
                                                        </div>
                                                        <div class="col-sm-6">
                                                        Disable - Enable
                                                        </div>
                                                        <div class="col-sm-6">
                                                        Portal Language
                                                        </div>
                                                        <div class="col-sm-6">
                                                        English
                                                        </div>
                                                    </div>  
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>


                                    <div id="h_contact_p23"  class="card-header">
                                        <a data-toggle="collapse" data-parent="#accordionWrap2" href="#contact_p23" aria-expanded="false" aria-controls="contact_p23" class="card-title lead collapsed">CONTACT PERSONS </a>
                                    </div>
                                    <div id="contact_p23" role="tabpanel" aria-labelledby="h_contact_p23" class="collapse" aria-expanded="false">
                                        <div class="card-content">
                                            <div class="card-body">
                                            <div class="row">
                                                    <div class="col-sm-4">
                                                    
                                                    </div>
                                                    <div class="col-sm-8">
                                                    <div>Mrs. Soft The Next</div>
                                                    <div>softthenext@gmail.com</div>
                                                    <div><i class="fa fa-phone mr-1" aria-hidden="true"></i>020 54544554</div>
                                                    <div><i class="fa fa-mobile mr-1" aria-hidden="true"></i>+91 5454784554</div>
                                                    </div>
                                                    
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
			</div>
		</div>
                                        



                                        </div>
                                        <div role="tabpanel" class="tab-pane " id="tabIcon22" aria-expanded="true" aria-labelledby="baseIcon-tab22">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    
                                                <div class="form-group row">
                                                                <label class="col-sm-3 form-control-label" for="inputMessage1"></label>
                                                                        <div class="col-sm-9">
                                                                            <div class="position-relative has-icon-left">
                                                                                <textarea class="form-control" id="inputMessage1" rows="6" placeholder="(For Internal Use)"></textarea>
                                                                                <div class="form-control-position pl-1"><i class="fa fa-comments"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 mb-1">
                                                                        <button class="btn btn-info float-right" type="button"><i class="fa fa-paper-plane"></i>Add Comment</button>
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
                                                                <div class="col-lg-12 col-xl-12">
                                                            
                                                            <div id="accordionWrap2" role="tablist" aria-multiselectable="true">
                                                                <div class="card collapse-icon accordion-icon-rotate left">
                                                                    <div id="heading21"  class="card-header">
                                                                        <a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion21" aria-expanded="true" aria-controls="accordion21" class="card-title lead">Invoice</a>
                                                                    </div>
                                                                    <div id="accordion21" role="tabpanel" aria-labelledby="heading21" class="collapse show">
                                                                        <section id="compact-style">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="card">
                                                                                        <div class="card-contentz">
                                                                                            <div class="card-body card-dashboard table-responsive">
                                                                                                <table class="table table-striped table-bordered compact">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Date</th>
                                                                                                            <th>Invoice#</th>
                                                                                                            <th>Reference#</th>
                                                                                                            <th>Amount</th>
                                                                                                            <th>Balance Due</th>
                                                                                                            <th>Status</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody> 
                                                                                                        <tr>
                                                                                                            <td>20/11/2020</td>
                                                                                                            <td>INV-21344</td>
                                                                                                            <td>SO-99342</td>
                                                                                                            <td><i class="fa fa-rupee"></i>61</td>
                                                                                                            <td>2011/04/25</td>
                                                                                                            <td class="text-success">Paid</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>				
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                    <div id="heading22"  class="card-header">
                                                                        <a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion22" aria-expanded="false" aria-controls="accordion22" class="card-title lead collapsed">Customer Payment</a>
                                                                    </div>
                                                                    <div id="accordion22" role="tabpanel" aria-labelledby="heading22" class="collapse" aria-expanded="false">
                                                                    <section id="compact-style">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="card">
                                                                                    <div class="card-contentz">
                                                                                        <div class="card-body card-dashboard table-responsive">
                                                                                            <table class="table table-striped table-bordered compact">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Date</th>
                                                                                                        <th>Invoice#</th>
                                                                                                        <th>Reference#</th>
                                                                                                        <th>Amount</th>
                                                                                                        <th>Balance Due</th>
                                                                                                        <th>Status</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody> 
                                                                                                    <tr>
                                                                                                        <td>20/11/2020</td>
                                                                                                        <td>INV-21344</td>
                                                                                                        <td>SO-99342</td>
                                                                                                        <td><i class="fa fa-rupee"></i>61</td>
                                                                                                        <td>2011/04/25</td>
                                                                                                        <td class="text-success">Paid</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>				
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    </div>
                                                                    <div id="heading23"  class="card-header">
                                                                        <a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion23" aria-expanded="false" aria-controls="accordion23" class="card-title lead collapsed">Estimate</a>
                                                                    </div>
                                                                    <div id="accordion23" role="tabpanel" aria-labelledby="heading23" class="collapse" aria-expanded="false">
                                                                    <section id="compact-style">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="card">
                                                                                        <div class="card-contentz">
                                                                                            <div class="card-body card-dashboard table-responsive">
                                                                                                <table class="table table-striped table-bordered compact">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Date</th>
                                                                                                            <th>Invoice#</th>
                                                                                                            <th>Reference#</th>
                                                                                                            <th>Amount</th>
                                                                                                            <th>Balance Due</th>
                                                                                                            <th>Status</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody> 
                                                                                                        <tr>
                                                                                                            <td>20/11/2020</td>
                                                                                                            <td>INV-21344</td>
                                                                                                            <td>SO-99342</td>
                                                                                                            <td><i class="fa fa-rupee"></i>61</td>
                                                                                                            <td>2011/04/25</td>
                                                                                                            <td class="text-success">Paid</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>				
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </section>
                                                                    </div>
                                                                    <div id="heading24"  class="card-header">
                                                                        <a data-toggle="collapse" data-parent="#accordionWrap2" href="#accordion24" aria-expanded="false" aria-controls="accordion24" class="card-title lead collapsed">Sales Order</a>
                                                                    </div>
                                                                    <div id="accordion24" role="tabpanel" aria-labelledby="heading24" class="collapse" aria-expanded="false" style="height: 0px;">
                                                                    <section id="compact-style">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="card">
                                                                                    <div class="card-contentz">
                                                                                        <div class="card-body card-dashboard table-responsive">
                                                                                            <table class="table table-striped table-bordered compact">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Date</th>
                                                                                                        <th>Invoice#</th>
                                                                                                        <th>Reference#</th>
                                                                                                        <th>Amount</th>
                                                                                                        <th>Balance Due</th>
                                                                                                        <th>Status</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody> 
                                                                                                    <tr>
                                                                                                        <td>20/11/2020</td>
                                                                                                        <td>INV-21344</td>
                                                                                                        <td>SO-99342</td>
                                                                                                        <td><i class="fa fa-rupee"></i>61</td>
                                                                                                        <td>2011/04/25</td>
                                                                                                        <td class="text-success">Paid</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>				
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
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
					<div class="card-body card-dashboard">
                    
						<table class="table table-striped table-bordered responsive" id="tbl">
							<thead>
								<tr >
									<th></th>
									<th>Name </th>
									<th>Company Name</th>
									<th>Email</th>
									<th>Work Phone</th>
									<th>Receivable</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
                                $sql= "SELECT * FROM mstr_item WHERE delete_status='0'order by item_id_pk DESC";
                                $res = mysqli_query($db,$sql);
                                while($rw = mysqli_fetch_array($res)){
                            
                            ?>
								<tr id="<?php echo $rw['item_id_pk']; ?>" onclick="openNav(this.id)">
									<td></td>
									<td><?php echo $rw['item_type'];?></td>
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
                        document.getElementById("mySidenav").style.width = "900px";
                        document.getElementById("main").style.marginLeft = "-13px";
                        // $.ajax({
						// 	type: "POST",
						// 	url: '../../api/item/fetch_item_details.php',
						// 	data: "id="+id ,
						// 	success: function(data)
						// 	{ 
                        //         var d = data.split("#");
                        //         $('#product_name').text(d[0]);
                        //         $('#item_type').text(d[1]);
                        //         $('#uom').text(d[2]);
                        //         $('#sale_rate').text(d[4]);
                        //         $('#purchase_rate').text(d[5]);
                        //         $('#add_date').text(d[6]);
                        //         $('#add_time').text(d[7]);
                        //         $('#added_by').text(d[8]);
                        //         $('#edit_id').text(d[9]);
                        //         //document.getElementById("edit_id").value = d[9];
						// 	}
			            // });
                        if(window.matchMedia('(max-width: 375px)').matches)
                        {
                            document.getElementById("mySidenav").style.width = "450px";
                            document.getElementById("main").style.marginLeft = "-13px";
                        }

                        else if(window.matchMedia('(max-width: 320px)').matches)
                        {
                            document.getElementById("mySidenav").style.width = "390px";
                            document.getElementById("main").style.marginLeft = "-13px";
                        }
                        else(window.matchMedia('(max-width: 411px)').matches)
                        {
                            document.getElementById("mySidenav").style.width = "500px";
                            document.getElementById("main").style.marginLeft = "-13px";
                        }
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

// function delete_item1()
// {
//     var  edit_id= document.getElementById("edit_id").innerText;
    
//     if(confirm("Are you sure you want to delete this item?"))
//     {
//         //alert("hii");
//         $.ajax({
//             type: "POST",
//             url: '../../api/item/delete_item.php',
//             data: "id="+edit_id ,
//             success: function(data)
//             { 
//                 //alert(data);
//                 if(data == 1)
//                 {
//                     alert("Record Deleted");
//                     window.location = "view_item.php";
//                 }
//                 else
//                 {

//                 }
//             }
//         });
//     }
//     else
//     {
//         //alert("bye");
//     }
    
// }
</script>


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
                                All Items
                              </button>
                              <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All Customer</a>
                                    <a class="dropdown-item" href="#">Active Customer</a>
                                    <a class="dropdown-item" href="#">Inactive Customer</a>
                                    <a class="dropdown-item" href="#">Overdue Customer</a>
                                    <a class="dropdown-item" href="#">Unpaid Customer</a>
                              </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-sm-12">
                        </div>
                        <div class="col-lg-2 col-sm-12">
                          
                        
                            <a href="add_customer.php"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
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
									<th>Name</th>
									<th>Company Name</th>
									<th>Email</th>
									<th>Work Phone</th>
									<th>Receivable</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>Priyank Mehta</td>
									<td>Aroma Perfumes</td>
									<td>aroma@gmail.com</td>
									<td>9878765676</td>
									<td>0.00</td>
                                </tr>
                                <tr>
                                    <td></td>
									<td>Priyank Mehta</td>
									<td>Aroma Perfumes</td>
									<td>aroma@gmail.com</td>
									<td>9878765676</td>
									<td>0.00</td>
                                </tr>
                                <tr>
                                    <td></td>
									<td>Priyank Mehta</td>
									<td>Aroma Perfumes</td>
									<td>aroma@gmail.com</td>
									<td>9878765676</td>
									<td>0.00</td>
                                </tr>
								
							</tbody>
							<tfoot>
								<tr>
                                <th></th>
									<th>Name</th>
									<th>Company Name</th>
									<th>Email</th>
									<th>Work Phone</th>
									<th>Receivable</th>
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
