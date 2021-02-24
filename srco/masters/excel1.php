<?php include('../../partials/header.php');?>

<style>
    @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
    }    
</style>
<style>
    /* html {
  text-rendering: optimizeLegibility;
  padding: 0 50px 50px;
  font-family: "Helvetica Neue", sans-serif;
  font-weight: 300;
} */

textarea {
  font-family: monospace;
  display: block;
  width: 100%;
  height: 200px; 
  margin: 1em auto;
}

table {
  line-height: 1.1;
  border-bottom: 1px solid #888;
  margin:1em auto 2em;

  tr {
    border-top: 1px solid #888;
  }
  td, th {
    font-weight: normal;
    padding: .5em 1em;
    text-align: right;
    &:first-child {
      text-align: left;
    }
  }
}

#convert {
  padding: .5em 1em;
  border-radius: .4em;
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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Upload Excel Master</h4>
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
	                    <!-- <form class="form form-horizontal" method="post" id="form" data-toggle="validator" role="form" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>"> -->
	                    	<div class="form-body">
	                    		<!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                        
                                        <textarea name="inney" id="inney" cols="30" rows="10"></textarea>
                                            <button id='convert'>Convert</button>

                                            <p>Copy the code below (just press cmd/ctrl c):</p>

                                            <!-- <textarea id="output" disabled style="display:none;"></textarea>

                                            Sample Output:
                                            <div id="render"></div>
                                             -->
                                        </div>
									</div>
		                        </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                        <!-- <textarea name="inney" id="inney" cols="30" rows="10"></textarea>
                                            <button id='convert'>Convert</button>

                                            <p>Copy the code below (just press cmd/ctrl c):</p> -->

                                            <textarea id="output" disabled style="display:none;"></textarea>

                                            <!-- Sample Output: -->
                                            <div id="render"></div>
                                            
                                            
                                        </div>
									</div>
		                        </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                            <button id='show'>Import</button>
                                        </div>
									</div>
		                        </div>
                               
							</div>
	                        <div class="form-actions" style="margin-left: 85%; margin-bottom: 3rem">
								
								<button type="button" class="btn btn-primary" id="btn" onclick="submit_data()">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
								
	                            <button type="reset" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            
	                        </div>
	                    <!-- </form> -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $('#convert').click(function(){
        
        x = $('#inney').val();
        //x = x.replace(/\r?\n/g, '<br />');
        alert("x is:"+x);
        x = x.split('\t').join('</td style="border:1px solid black;"><td style="border:1px solid black;">');
        x = x.split('\n').join('</td >\n\t</tr>\n\t<tr style="border:1px solid black;">\n\t\t<td>');
        x = '<table style="border:1px solid black;" id="excel_data">\n\t<tr >\n\t\t<td >' + x + '</td>\n\t</tr>\n</table>\n';
        $('#output').text(x).focus().select();
        $('#render').html(x);

        
    });

    $('#show').click(function(){
        var TableData;
        TableData = storeTblValues();
        var TableData1 = JSON.stringify(TableData);
        //TableData = $.toJSON(TableData);
        console.log(" TableData1 ggggggg:"+TableData1);

        function storeTblValues()
        {
            var TableData = new Array();
            $('#excel_data tr').each(function(row, tr){

                var category = $(tr).find('td:eq(0)').text();
                var sup_name = $(tr).find('td:eq(1)').text();
                var sc_code = $(tr).find('td:eq(2)').text();
                var des_code = $(tr).find('td:eq(3)').text();
                var size = $(tr).find('td:eq(4)').text();
                var box = $(tr).find('td:eq(5)').text();
                var hsn = $(tr).find('td:eq(6)').text();
                var gst = $(tr).find('td:eq(7)').text();
                //alert("sc_code:"+sc_code);

                if(category!="" && sup_name!="" && sc_code!="" && des_code!="" && size!="" 
                && box!="" && hsn!="" && gst!="")
                {
                    //alert("row:"+row);
                    TableData[row]=
                    {
                        "category" : category
                        , "Supplier Name" :sup_name
                        , "Sc Code" : sc_code
                        , "Supplier Design Code" : des_code
                        , "Size" : size
                        , "PCS/BOX" : box
                        , "HSN Code" : hsn
                        , "GST" : gst
                    }   
                }
                else
                {
                    //alert("row  beeeee:"+row);
                    alert("cant add row " + row);
                }

                // TableData[row]=
                // {
                //     "category" : $(tr).find('td:eq(0)').text()
                //     , "Supplier Name" :$(tr).find('td:eq(1)').text()
                //     , "Sc Code" : $(tr).find('td:eq(2)').text()
                //     , "Supplier Design Code" : $(tr).find('td:eq(3)').text()
                //     , "Size" : $(tr).find('td:eq(4)').text()
                //     , "PCS/BOX" : $(tr).find('td:eq(5)').text()
                //     , "HSN Code" : $(tr).find('td:eq(6)').text()
                //     , "GST" : $(tr).find('td:eq(7)').text()
                // }    
            }); 
            TableData.shift();  // first row will be empty - so remove
            return TableData;
        }
    });
</script>