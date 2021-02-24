<?php include('../../partials/header.php');?>

<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	

	<div class="row">
		<div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls">New Item<div id="result"></div></h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form">
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
	                    			<div class="col-md-4">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Company <span style="color:red;"> *</span>
                                            </label>
				                        	<div class="col-md-9">
												<!-- <select class="select2 form-control block" id="responsive_single4" class="select2" data-toggle="select2" name="item_type" required="">
													<option value="ATTAR">ATTAR</option>
													<option value="PERFUME">PERFUME</option>
													<option value="DEODORANT">DEODORANT</option>
													<option value="ROOMFRESHNER">ROOMFRESHNER</option>
													<option value="PKT">POCKET PERFUME</option>
													<option value="SHAMPOO">SHAMPOO</option>
													<option value="DEODORANT">PERFUME+DEODORANT</option>
													<option value="ROOMFRESHNER">TALC</option>
													<option value="PKT">SANITIZER</option>
													<option value="SHAMPOO">SURMA</option>
													<option value="PERFUME GEL">PERFUME GEL</option>													
												</select> -->
												<select class="select2 form-control block" id="responsive_single4" class="select2" data-toggle="select2" name="item_type" required="">
												<?php 
													$sql = "SELECT * FROM mstr_customer";
													$res = mysqli_query($db,$sql);
													while($rw = mysqli_fetch_array($res))
													{
												?>
													
													<option value="<?php echo $rw['cust_id_pk'];?>"><?php echo $rw['company_name'];?></option>
																									
												
													<?php } ?>
													</select>
												<span id="type_error" style="color:red;"></span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-4">
			                        	<div class="form-group row">
                                        <label class="col-md-4 label-control" for="userinput1"><span style="color:red;">* </span>Item Name 
                                            <!-- <i class="fa fa-question-circle-o " data-toggle="tooltip" data-placement="right" title="The Item will be measured in terms of this unit(eg.:kg,dozen)"></i> -->
                                            </label>
				                        	<div class="col-md-8">
												<input type="text" id="item_name" class="form-control " placeholder="" name="item_name" required="" onkeyup="written(this.id);">
												<span id="iname_error" style="color:red;"></span>
											</div>
			                       		</div>
			                       	</div>
				                    <div class="col-md-4">
			                        	<div class="form-group row">
                                        <label class="col-md-4 label-control" for="userinput1"><span style="color:red;">* </span>HSN/SAC 
                                            <!-- <i class="fa fa-question-circle-o " data-toggle="tooltip" data-placement="right" title="The Item will be measured in terms of this unit(eg.:kg,dozen)"></i> -->
                                            </label>
				                        	<div class="col-md-8">
												<input type="text" id="HSN" class="form-control " placeholder="" name="HSN" required="" onkeyup="written(this.id);">
												<span id="hsn_error" style="color:red;"></span>
											</div>
			                       		</div>
			                       	</div>
		                        </div>
	       <!--             		<div class="row">-->
	       <!--             			<div class="col-md-4">-->
				    <!--                    <div class="form-group row">-->
				    <!--                    	<label class="col-md-3 label-control" for="userinput1" ><span style="color:red;">*</span>NKS Code</label>-->
				    <!--                    	<div class="col-md-9">-->
				    <!--                        	<input type="text" id="nks_code" class="form-control " placeholder="" name="nks_code" onkeyup="written(this.id);">-->
								<!--				<span id="nkscode_error" style="color:red;"></span>-->
				    <!--                        </div>-->
				    <!--                    </div>-->
				    <!--                </div>-->
								<!--	<div class="col-md-4">-->
				    <!--                    <div class="form-group row">-->
				    <!--                    	<label class="col-md-4 label-control" for="userinput1" ><span style="color:red;">* </span>Design Code </label>-->
				    <!--                    	<div class="col-md-8">-->
				    <!--                        	<input type="text" id="design_code" class="form-control " placeholder="" name="design_code" onkeyup="written(this.id);">-->
								<!--				<span id="designcode_error" style="color:red;"></span>-->
				    <!--                        </div>-->
				    <!--                    </div>-->
				    <!--                </div>-->
								<!--	<div class="col-md-4">-->
				    <!--                    <div class="form-group row">-->
				    <!--                    	<label class="col-md-5 label-control" for="userinput1" ><span style="color:red;">*</span>Final Product Code </label>-->
				    <!--                    	<div class="col-md-7">-->
				    <!--                        	<input type="text" id="final_product" class="form-control " placeholder="" name="final_product" onkeyup="written(this.id);">-->
								<!--				<span id="finalcode_error" style="color:red;"></span>-->
				    <!--                        </div>-->
				    <!--                    </div>-->
				    <!--                </div>-->
								<!--</div>-->
								<div class="row">
									<!--<div class="col-md-4">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" ><span style="color:red;">* </span>Size </label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="size" class="form-control " placeholder="NA" name="size" onkeyup="written(this.id);">
												<span id="size_error" style="color:red;"></span>
				                            </div>
				                        </div>
				                    </div>
									<div class="col-md-4">
				                        <div class="form-group row">
				                        	<label class="col-md-4 label-control" for="userinput1" ><span style="color:red;">* </span>PCS/BOX </label>
				                        	<div class="col-md-8">
												<select class="select2 form-control block" id="responsive_single5" class="select2" data-toggle="select2" name="pcs_box" >
												<option value="PCS">PCS</option>
												<option value="DZN">DZN</option>
												<option value="ML">ML</option>
												<option value="GMS">GMS</option>
												<option value="PKT">PKT</option>
												<option value="SET">SET</option>
												</select>
												<span id="pcs_error" style="color:red;"></span>
				                            </div>
				                        </div>
				                    </div>-->
									<div class="col-md-4">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1" ><span style="color:red;">* </span>UOM </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block" id="responsive_single3" class="select2" data-toggle="select2" name="uom">
												<option value="PCS">PCS</option>
												<option value="DZN">DZN</option>
												<option value="ML">ML</option>
												<option value="GMS">GMS</option>
												<option value="PKT">PKT</option>
												<option value="SET">SET</option>
												</select>
												<span id="uom_error" style="color:red;"></span>
				                            </div>
				                        </div>
				                    </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-4">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1"><span style="color:red;">* </span>GST Group(%)
                                            <!-- <i class="fa fa-question-circle-o " data-toggle="tooltip" data-placement="right" title="The Item will be measured in terms of this unit(eg.:kg,dozen)"></i> -->
                                            </label>
				                        	<div class="col-md-9">
												<input type="text" id="gst_group" class="form-control " placeholder="" name="gst_group" onkeyup="written(this.id);">
												<span id="GST_error" style="color:red;"></span>
											</div>
			                       		</div>
			                       	</div>
									<div class="col-md-4">
			                        	<div class="form-group row">
                                        <label class="col-md-4 label-control" for="userinput1"><span style="color:red;">* </span>Sale Rate
                                            <!-- <i class="fa fa-question-circle-o " data-toggle="tooltip" data-placement="right" title="The Item will be measured in terms of this unit(eg.:kg,dozen)"></i> -->
                                            </label>
				                        	<div class="col-md-8">
												<input type="text" id="sale_rate" class="form-control " placeholder="" name="sale_rate" onkeyup="written(this.id);">
												<span id="sale_error" style="color:red;"></span>
											</div>
			                       		</div>
			                       	</div>
									<div class="col-md-4">
			                        	<div class="form-group row">
                                        <label class="col-md-5 label-control" for="userinput1"><span style="color:red;">* </span>Purchase Rate
                                            <!-- <i class="fa fa-question-circle-o " data-toggle="tooltip" data-placement="right" title="The Item will be measured in terms of this unit(eg.:kg,dozen)"></i> -->
                                            </label>
				                        	<div class="col-md-7">
												<input type="text" id="purchase_rate" class="form-control " placeholder="" name="purchase_rate" onkeyup="written(this.id);">
												<span id="purchase_error" style="color:red;"></span>
											</div>
			                       		</div>
			                       	</div>
		                        </div>
                                <!-- <hr> -->

		                        <!-- <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4> -->

		                        <!-- <div class="row">
		                        	<div class="col-md-6">
		                        		<div class="form-group row">
				                        	<label class="col-md-5 label-control" for="userinput5"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">&nbsp; Sales Information</label>
					                    </div>

					                    <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput6">Selling Price *</label>
				                        	<div class="col-md-9">
												<input class="form-control " type="text"  id="userinput6">
											</div>
										</div>

										<div class="form-group row">
				                        	<label class="col-md-3 label-control">Account *</label>
				                        	<div class="col-md-9">
											<select class="select2 form-control block" id="responsive_single">
											    <optgroup label="Income">
													<option value="Discount">Discount</option>
													<option value="General Income">General Income</option>
													<option value="Discount">Interest Income</option>
													<option value="General Income">Late fee Income</option>
													<option value="Discount">Other Charges</option>
													<option value="General Income">Sales</option>
													<option value="Discount">Shipping Charges</option>
												
												<optgroup>
								
											</select>
											</div>
				                        </div>
										<div class="form-group row">
				                        	<label class="col-md-3 label-control">Description </label>
				                        	<div class="col-md-9">
											<textarea id="userinput8" rows="6" class="form-control " name="bio" ></textarea>
											</div>
				                        </div>
		                        	</div>
		                        	<div class="col-md-6">
		                        		<div class="form-group row">
				                        	<label class="col-md-5 label-control" for="userinput5"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">&nbsp; Purchase Information</label>
				                        	
					                    </div>

					                    <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput6">Cost Price *</label>
				                        	<div class="col-md-9">
												<input class="form-control " type="text"  id="userinput6">
											</div>
										</div>

										<div class="form-group row">
				                        	<label class="col-md-3 label-control">Account *</label>
				                        	<div class="col-md-9">
											<select class="select2 form-control block" id="responsive_single1" class="select2" data-toggle="select2" >
						
													<option value="Repairs and Maintenance">Repairs and Maintenance</option>
													<option value="Salaries and Employee Wages">Salaries and Employee Wages</option>
													<option value="Telephone Expense">Telephone Expense</option>
													<option value="Transportation Expense">Transportation Expense</option>
													<option value="Travel Expense">Travel Expense</option>
													<option value="Uncategorized">Uncategorized</option>
								
								
											</select>
											</div>
				                        </div>
										<div class="form-group row">
				                        	<label class="col-md-3 label-control">Description </label>
				                        	<div class="col-md-9">
											<textarea id="userinput8" rows="6" class="form-control " name="bio" ></textarea>
											</div>
				                        </div>
		                        	</div>
		                        </div> -->
							</div>
							<!--<hr>-->
	                        <div class="form-actions right">
								
								<button type="button" class="btn btn-primary" onClick="Save_data();">
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
<?php include('../../partials/footer.php');?>
<script>
	function Save_data()
	{
		var type = document.getElementById("responsive_single4").value;
		var HSN = document.getElementById("HSN").value;
 		/*var nks_code = document.getElementById("nks_code").value;
 		var design_code = document.getElementById("design_code").value;
 		var final_product = document.getElementById("final_product").value;
		var size = document.getElementById("size").value;
		var pcs = document.getElementById("responsive_single5").value;*/
		var uom = document.getElementById("responsive_single3").value;
		var gst_group = document.getElementById("gst_group").value;
		var sale_rate = document.getElementById("sale_rate").value;
		var purchase_rate = document.getElementById("purchase_rate").value;
		var item_name = document.getElementById("item_name").value;
        //&& size!="" && pcs!=""
		if(type!="" && HSN!="" && item_name!=""  && uom!="" && gst_group!="" && sale_rate!="" && purchase_rate!="" && item_name!="")
		{
		
			$.ajax({
							type: "POST",
							url: '../../api/item/save_item.php',
							data: $('#form').serialize() ,
							success: function(data)
							{ 
								//alert("result is:"+data);
								//console.log("result is:"+result);
								//$("#result").html(data);
								if(data == "1")
								{
									alert('Record Save!');
								window.location.href = "view_item.php";
								}
								else
								{
									alert('something went wrong');
								}
							}
			});
		}
		else
		{
			//alert("please fill required feilds");
			if(type == "")
			{
				$("#type_error").text( "Type Require" );
			}
			if(HSN == "")
			{
				$("#hsn_error").text( "HSN Require" );
			}
			/*if(nks_code == "")
			{
				$("#nkscode_error").text( "NKS Code Require" );
			}
			if(design_code == "")
			{
				$("#designcode_error").text( "Design Code Require" );
			}
			if(final_product == "")
			{
				$("#finalcode_error").text( "Final Code Require" );
			}
			if(size == "")
			{
				$("#size_error").text( "Size Require" );
			}
			if(pcs == "")
			{
				$("#pcs_error").text( "PCS/Box Require" );
			}*/
			if(uom == "")
			{
				$("#uom_error").text( "UOM Require" );
			}
			if(gst_group == "")
			{
				$("#GST_error").text( "GST Group Require" );
			}
			if(sale_rate == "")
			{
				$("#sale_error").text( "Sale Rate Require" );
			}
			if(purchase_rate == "")
			{
				$("#purchase_error").text( "Purchase Rate Require" );
			}
			if(item_name == "")
			{
				$("#iname_error").text( "Item Name Require" );
			}
		}
	}
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