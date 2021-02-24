<?php include('../../partials/header.php');?>
<?php 
	$edit_id = $_GET['id'];
	$sql_charges="SELECT * FROM mstr_item as i,mstr_supplier as s 
				where s.supplier_id_fk=i.supplier_id_fk AND
				i.item_id_pk='$edit_id'
				" ;
	$result_charges = mysqli_query($db, $sql_charges);
	while($row = mysqli_fetch_row($result_charges))
	{

	
?>
<style>
	 @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
    }  
</style>

<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Item</h4>
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
									<div style="display: none">
										<label for="p_id">ID</label>
										<input type="text" id="p_id" name="p_id" value="<?php echo $edit_id ?>" readonly>
									</div>
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Category<span class="text-danger">*</span> </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="item_type" class="select2" data-toggle="select2" name="item_type" onchange="get_company_name()" required="">
													<option value="<?php echo $row['1'] ?>"> <?php echo $row['1'] ?></option>
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
                                        <label class="col-md-3 label-control" for="userinput1">Supplier Name<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="supplier_name" class="select2" onchange="get_company_name()" data-toggle="select2" name="supplier_name" required="">
												<option value="<?php echo $row['23'] ?>"><?php echo $row['24'] ?></option>

												</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">SC Code<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="sc_code" id="sc_code" value="<?php echo $row['3'] ?>" onkeyup="get_company_name();">	
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Size<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="size" id="size" value="<?php echo $row['6'] ?>" onkeyup="get_company_name();">
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Supply Design Code<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="supply_design_code" id="supply_design_code" value="<?php echo $row['4'] ?>" onkeyup="get_company_name();">
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">HSN Code<span class="text-danger">*</span></label>
											<div class="col-md-9">
											<input type="text" id="hsn_code" value="<?php echo $row['2'] ?>" class="form-control " placeholder="" name="hsn_code" onkeyup="get_company_name();">
				                            </div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Packing<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" id="pcs_box" class="select2" data-toggle="select2" name="pcs_box" onchange="get_company_name()" required="">
												    <option value="<?php echo $row['7'] ?>"><?php echo $row['7'] ?></option>
											
													

												</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
			                       		</div>
									   </div>
									   <div class="col-md-6">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">GST Group<span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="select2 form-control block" value="<?php echo $row['9'] ?>" id="gst_group" class="select2" data-toggle="select2" name="gst_group" required="">
													<option value="<?php echo $row['9'] ?>"><?php echo $row['9'] ?></option>
													<option value="1">gst group</option>
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
												<input type="text" class="form-control" value="<?php echo $row['5'] ?>" name="final_product" id="final_product" readonly>
				                            </div>
				                        </div>
									</div>
		                        </div>
								<div class="row">
									<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" >UOM <span class="text-danger">*</span></label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="uom" class="select2" data-toggle="select2" name="uom">
													<option value="<?php echo $row['8'] ?>"><?php echo $row['8'] ?></option>
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
												<input type="text" class="form-control" value="<?php echo $row['21'] ?>" name="disc_lock" id="disc_lock">
				                            </div>
				                        </div>
									</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	<div class="form-group row">
                                        	<label class="col-md-3 label-control" for="userinput1">Purchase Rate</label>
				                        	<div class="col-md-4">
												<input type="text" id="purchase_rate" class="form-control " value="<?php echo $row['11'] ?>" placeholder="" name="purchase_rate" >
												<span id="purchase_rate_error" style="color:red;"></span>
											</div>
											<label class="col-md-2 label-control" for="userinput1">Sale Rate</label>
				                        	<div class="col-md-3">
												<input type="text" id="sale_rate" class="form-control " value="<?php echo $row['10'] ?>" placeholder="" name="sale_rate" >
												<span id="sale_rate_error" style="color:red;"></span>
											</div>
			                       		</div>
			                       	</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 label-control" for="userinput1" >Status</label>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
											<?php 
												if($row['18'] == 0)
												{
													echo '<input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" checked>&nbsp; Active';
												}
												else
												{
													echo '<input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0">&nbsp; Active';
												}
												
											 ?>
												
											</div>
											<div class="col-md-4" style="display: flex;font-size: 16px;">
											<?php
												if($row['18']==1)
												{
													echo '<input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; InActive'; 
												}
												else
												{
													echo '<input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1">&nbsp; InActive';
												}
											?>
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
								
								<button type="submit" class="btn btn-primary">
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

  $temp_final_code = sc+"-"+des+"-"+si;;

  //document.getElementById("final_product").value = $temp_final_code;
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
		$temp_final_code = sc+"-"+des+"-"+si;
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
	$('#form').on('submit', function(e){
		e.preventDefault();

		var type = document.getElementById("item_type").value;
		var hsn_code = document.getElementById("hsn_code").value;
 		/*var nks_code = document.getElementById("nks_code").value;
 		var design_code = document.getElementById("design_code").value;
 		var final_product = document.getElementById("final_product").value;
		var size = document.getElementById("size").value;
		var pcs = document.getElementById("responsive_single5").value;*/
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

		var formData = new FormData(this);

		// alert("hii");
        //&& size!="" && pcs!=""
		// if(type!="" && HSN!="" && item_name!=""  && uom!="" && gst_group!="" && sale_rate!="" && purchase_rate!="" && item_name!="")
		if(type!="NA" && supplier_name!="" && sc_code!="NA" && size!="NA" && supply_design_code!="NA" && hsn_code!="NA"
		&& pcs_box!="NA" && gst_group!="" && uom!="")
		{

			// alert("inside")
		
			$.ajax({
							url: '../../api/Item/update_item.php',
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
							success: function(data)
							{ 
								console.log(data);

								if(data == "1")
								{
									// alert('Record Updated!');
									$.toast({
										heading: 'Success',
										text: 'Item Updated!',
										showHideTransition: 'slide', 
										position: 'top-right',
										icon: 'success'
									})
									setTimeout(() => {
										window.location.href = "view_item.php";		
									}, 5000);
								
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
										text: 'Product Code already exists!',
										showHideTransition: 'slide',
										position: 'top-right',
										icon: 'warning'
									})
								}
								else
								{
									// alert('something went wrong');
									$.toast({
										heading: 'Error',
										text: 'Something went wrong!',
										showHideTransition: 'slide',
										position: 'top-right',
										icon: 'error'
									})
								}
							}
			});
		}
		else
		{
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
	function written(id)
	{
		//alert("id is:"+id);
		if(id == "item_name")
		{
			$("#iname_error").text( "" );
		}
		if(id == "HSN")
		{
			$("#hsn_error").text( "" );
		}
		if(id == "nks_code")
		{
			$("#nkscode_error").text( "" );
		}
		if(id == "design_code")
		{
			$("#designcode_error").text( "" );
		}
		if(id == "final_product")
		{
			$("#finalcode_error").text( "" );
		}
		if(id == "size")
		{
			$("#size_error").text( "" );
		}
		if(id == "gst_group")
		{
			$("#GST_error").text( "" );
		}
		if(id == "sale_rate")
		{
			$("#sale_error").text( "" );
		}
		if(id == "purchase_rate")
		{
			$("#purchase_error").text( "" );
		}
		
		
		if(id == "HSN")
		{
			$("#hsn_error").text( "" );
		}if(id == "HSN")
		{
			$("#hsn_error").text( "" );
		}
	}
</script>
<?php } ?>