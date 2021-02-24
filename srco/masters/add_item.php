<?php
	include('../../partials/header.php');
?>
<?php $flag = $_SESSION['flag']; ?>
<style>
	 @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
    }  
	
</style>

</div>
<div class="app-content content">

      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Item</h4>
                    <hr>
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
	            <div class="card-content collpase show">
	                <div class="card-body">
						<div class="card-text">
						</div>
	                    <form class="form form-horizontal" id="form" action="<?php $_SERVER['PHP_SELF'] ?>" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">
	                    	<div class="form-body">
								
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Category <span class="text-danger">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="item_type" class="select2" data-toggle="select2" name="item_type" onchange="get_company_name()" >
													<option value="NA" selected disabled>Select</option>
													<option value="Tiles">Tiles</option>
													<option value="CP Sanitary">CP Sanitary</option>
													<option value="Others">Others</option>
													
												</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Supplier Name <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="supplier_name" class="select2" data-toggle="select2" name="supplier_name" onchange="get_company_name();" >
													<option value="" selected disabled>Select</option>
													<?php
													    if($flag == 0) {
														$get_supplier = "SELECT * FROM mstr_supplier WHERE status=1 and flag='0' ";
													    }
													    else {
													        $get_supplier = "SELECT * FROM mstr_supplier WHERE status=1 and flag='1' ";
													    }
														$res_supplier = mysqli_query($db, $get_supplier);

														while($row1 = mysqli_fetch_row($res_supplier))
														{
															echo '<option value="'.$row1[0].'">'.$row1[1].'</option>';

														}
													?>

												</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">SC Code <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="text"  name="sc_code" id="sc_code" class="form-control" value="NA" onkeyup="get_company_name();">
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Size <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="text"  class="form-control" name="size" id="size" value="NA" onkeyup="get_company_name();" />
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Supplier Design Code<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="text"  class="form-control" name="supply_design_code" value="NA" id="supply_design_code" onkeyup="get_company_name();" />
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>   
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">HSN Code <span class="text-danger">*</span></label>
											<div class="col-md-9">
											<input type="text" id="hsn_code"  class="form-control " placeholder="" value="NA" name="hsn_code" onkeyup="get_company_name();">
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Packing <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="pcs_box" class="select2" data-toggle="select2" name="pcs_box" onchange="get_company_name();" >
												    <option value="NA" selected disabled>Select</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>

												</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
									   </div>
									   <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">GST Group <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<!-- <input type="text" id="gst_group" name="gst_group" class="form-control"> -->
												<select class="select2 form-control block" id="gst_group" class="select2" data-toggle="select2" name="gst_group" >
													<option value="">select</option>
													<option value="18">18 %</option>
													<option value="20">20 %</option>
													<option value="28">28 %</option>
												</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
		                        </div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
				                        	<label class="col-md-2 label-control" for="userinput1" >Final Product </label>
				                        	<div class="col-md-10 divcol">
												<input type="text" class="form-control" name="final_product" id="final_product" readonly>
				                            </div>
				                        </div>
									</div>
		                        </div>
								<div class="row">
									<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >UOM <span class="text-danger">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="uom" class="select2" data-toggle="select2" name="uom" >
													<option value="">--Select UOM--</option>
													<!-- <option value="ML">ML</option>
													<option value="DZ">DZ</option> -->
													<option value="PCS">PCS</option>
													<!-- <option value="KGS">KGS</option> 
													<option value="GRAMS">GRAMS</option> -->
													<option value="BOX">BOX</option> 
													<option value="SQFT">SQFT</option>
													<option value="BAGS">BAGS</option>
												</select>
												<span id="uom_error" style="color:red;"></span>
				                            </div>

				                        </div>
				                    </div>
									<div class="col-md-6">
										<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >Discount Lock</label>
				                        	<div class="col-md-8">
												<input type="text" class="form-control" placeholder="0" name="disc_lock" id="disc_lock">
				                            </div>
				                        </div>
									</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Purchase Rate</label>
				                        	<div class="col-md-4">
												<input type="text" id="purchase_rate" class="form-control " value="0" name="purchase_rate" >
												<!-- <span id="purchase_rate_error" style="color:red;"></span> -->
											</div>
											<label class="col-md-2 label-control" for="userinput1">Sale Rate</label>
				                        	<div class="col-md-3">
												<input type="text" id="sale_rate" class="form-control " value="0" name="sale_rate" >
												<!-- <span id="sale_rate_error" style="color:red;"></span> -->
											</div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 label-control" for="userinput1" >Status</label>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
												<input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" checked value="0">&nbsp; Active
											</div>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
												<input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1">&nbsp; InActive
											</div>
										</div>
									</div>
		                        </div>
								<div class="row">
									<div class="col-md-6">
			                        <div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Upload photo</label>
				                        	<div class="col-md-9">
												<input type="file" id="upload_photo" class="form-control " name="upload_photo" >
												<span id="image_error" style="color:red;">
													Supported format('png','jpg','jpeg','gif','pdf')
												</span>
											</div>
											
			                       		</div>
			                       	</div>
								</div>
							</div>
	                        <div class="form-actions right">
								
								<button type="submit" class="btn btn-primary" id="btn" name="save_item">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
								
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            
	                        </div>
	                    </form>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>
<script>
$(document).ready(function(){
  //alert("hii");
  var cn = "NA";
  var sn = "NA";
  var sc = "NA";
  var si = "NA";
  var hsn = "NA";
  var des = "NA";
  var pcs = "NA"

  $temp_final_code = sc+"-"+des+"-"+si;

  document.getElementById("final_product").value = $temp_final_code;
});
function get_company_name() {
	var cn = document.getElementById("item_type").value;  
	var sn=document.getElementById("supplier_name").value;
	var sc=document.getElementById("sc_code").value;
	var si=document.getElementById("size").value;
	var des =document.getElementById("supply_design_code").value;
	var hsn = document.getElementById("hsn_code").value;
	var pcs = document.getElementById("pcs_box").value;

	if(cn != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
	else if(sn != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
	else if(sc != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
	else if(si != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
	else if(des != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
	else if(hsn != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
	else if(pcs != "")
	{
		$temp_final_code = sc+"-"+des+"-"+si;;
		document.getElementById("final_product").value = $temp_final_code;
	}
}
</script>
<script>
	$('form').on('submit', function(e){
		e.preventDefault();
		// alert('ajsk');
		var type = document.getElementById("item_type").value;
		var hsn_code = document.getElementById("hsn_code").value;
		var uom = document.getElementById("uom").value;
		var gst_group = document.getElementById("gst_group").value;
		var sale_rate = document.getElementById("sale_rate").value;
		var purchase_rate = document.getElementById("purchase_rate").value;
		var item_name = document.getElementById("final_product").value;
		var supplier_name=document.getElementById("supplier_name").value;
		var supply_design_code=document.getElementById("supply_design_code").value;
		var sc_code=document.getElementById("sc_code").value;
		var size=document.getElementById("size").value;
		var pcs_box=document.getElementById("pcs_box").value;
		var status = $('input[name=status]:checked').val();
		var photo = document.getElementById('upload_photo').value;
		var disc_lock = document.getElementById('disc_lock').value;

		var formData = new FormData(this);
		console.log(formData);
		if(type!="NA" && supplier_name!="" && sc_code!="NA" && size!="NA" && supply_design_code!="NA" && hsn_code!="NA"
		&& pcs_box!="NA" && gst_group!="" && uom!=""
		)
		{

			//alert("inside")
		
			$.ajax({
							type: "POST",
							url: '../../api/Item/save_item.php',
							data: formData,
							contentType: false,
							processData: false,
							success: function(data)
							{ 
								console.log(data);

								if(data == "1")
								{
									// alert('Record Save!');
									$.toast({
										heading: 'Success',
										text: 'Item Added Successfully',
										showHideTransition: 'slide',
										icon: 'success',
										position: 'top-right',
										hideAfter: 5000
									});
									setTimeout(() => {
										window.location.href = "view_item.php";	
									}, 5000);
									$('#btn').attr('disabled', true);
									
								}
								else if(data == "invalid_image")
								{
									$('#image_error').text('Invalid image extension')
								}
								else if(data == "exists")
								{
									// alert('something went wrong');
									$.toast({
										heading: 'Warning',
										text: 'Product code already exists!',
										showHideTransition: 'slide',
										icon: 'warning',
										position: 'top-right',
										hideAfter: 5000
									});
								}
								else
								{
									// alert('something went wrong');
									$.toast({
										heading: 'Error',
										text: 'Something went wrong!',
										showHideTransition: 'slide',
										icon: 'error',
										position: 'top-right',
										hideAfter: 5000
									});
								}
							}
			});
		}
		else
		{
			//alert("please fill required feilds");
			if(type == "NA")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'Category Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(supplier_name == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'Supplier Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(sc_code == "NA" || sc_code == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'SC Code Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(size == "NA" || size == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'Size Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(supply_design_code == "NA" || supply_design_code == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'Supplier Design Code Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(hsn_code == "NA" || hsn_code == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'HSN Code Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(pcs_box == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'Packing Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(gst_group == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'GST Group Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			if(uom == "")
			{
				//$("#type_error").text( "Type Require" );
				$.toast({
                  heading: 'Error',
                  text: 'UOM Require.',
                  showHideTransition: 'slide',
                  position: 'top-right',
                  hideAfter: 5000,
                  icon: 'error'
              	})
			}
			
		}
	});
</script>