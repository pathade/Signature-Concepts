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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Upload Product Excel</h4>
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
                                            <input type="file" id="excelfile" />  
                                            <input type="button" id="viewfile" value="Export To Table" onclick="ExportToTable()" class="btn btn-success"/>  
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="button" id="show" value="Save Data"  class="btn btn-primary"/>  
                                            <!-- <button id='show'>Import</button> -->
                                                <br />  
                                                <br />  
                                            
                                        </div>
									</div>
		                        </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                              
                                            <!-- <table id="exceltable" class="form-control">  
                                            </table>  -->
                                            <table class="table table-bordered" id="exceltable">
                                                
                                            </table>
                                        </div>
									</div>
		                        </div>
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
<!-- <script src="jquery-1.10.2.min.js" type="text/javascript"></script>   -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>  
<script>
function ExportToTable() 
{  
     var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#excelfile").val().toLowerCase())) 
     {  
        var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
        if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) 
        {  
            xlsxflag = true;  

        }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") 
         {  
             //alert("support");
             var reader = new FileReader();  
             reader.onload = function (e) 
             {  
                 var data = e.target.result; 

                 /*Converts the excel data in to object*/
                 //alert("data  :"+data);
                 //alert("xlsxflag  :"+xlsxflag);
                 if(xlsxflag) 
                 {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else 
                 {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) 
                 { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) 
                     {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else 
                     {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     //alert(" exceljson lengthhh:"+exceljson.length);
                     if (exceljson.length > 0 && cnt == 0) 
                     {  
                         BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
                 $('#exceltable').show();  
             }  
             if (xlsxflag) 
             {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
             }  
             else 
             {  
                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
             }  
         }  
         else 
         {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else 
     {  
         alert("Please upload a valid Excel file!");  
     }  
 } 

 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
     for (var i = 0; i < jsondata.length; i++) {  
         var row$ = $('<tr/>');  
         for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
             var cellValue = jsondata[i][columns[colIndex]];  
             if (cellValue == null)  
                 cellValue = "";  
             row$.append($('<td/>').html(cellValue));  
         }  
         $(tableid).append(row$);  
     }  
 }  
 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
     var columnSet = [];  
     var headerTr$ = $('<tr/>');  
     for (var i = 0; i < jsondata.length; i++) {  
         var rowHash = jsondata[i];  
         for (var key in rowHash) {  
             if (rowHash.hasOwnProperty(key)) {  
                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                     columnSet.push(key);  
                     headerTr$.append($('<th/>').html(key));  
                 }  
             }  
         }  
     }  
     $(tableid).append(headerTr$);  
     return columnSet;  
 }
 $('#show').click(function(){
        var TableData;
        var check_flag = 1;
        //alert("checkflag:"+check_flag);
        TableData = storeTblValues();
        var TableData1 = JSON.stringify(TableData);
        console.log(" TableData:"+TableData1);
        

        function storeTblValues()
        {
            var TableData = new Array();
            
            $('#exceltable tr').each(function(row, tr){

                var category = $(tr).find('td:eq(1)').text();
                var sup_name = $(tr).find('td:eq(2)').text();
                var sc_code = $(tr).find('td:eq(3)').text();
                var des_code = $(tr).find('td:eq(4)').text();
                var size = $(tr).find('td:eq(5)').text();
                var box = $(tr).find('td:eq(6)').text();
                var hsn = $(tr).find('td:eq(7)').text();
                var gst = $(tr).find('td:eq(8)').text();
                //alert("sc_code:"+sc_code);

                if(category!="" && sup_name!="" && sc_code!="" && des_code!="" && size!="" 
                && box!="" && hsn!="" && gst!="")
                {
                    //alert("row:"+row);
                    TableData[row]=
                    {
                        "category" : category
                        , "Supplier_Name" :sup_name
                        , "Sc_Code" : sc_code
                        , "Supplier_Design_Code" : des_code
                        , "Size" : size
                        , "PCS/BOX" : box
                        , "HSN_Code" : hsn
                        , "GST" : gst
                    }  
                   // check_flag = 1; 
                }
                else
                {
                    //alert("row  beeeee:"+row);
                    if(row!=0)
                    {
                        //alert("Please check row " + row);
                        $.toast({
                            heading: 'Error',
                            text: 'Please check row '+row,
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                        check_flag = 0;
                    }
                    
                } 
                
            }); 
            TableData.shift();  // first row will be empty - so remove
            //alert("checkflag:"+check_flag);
                if(check_flag == 0)
                {
                    //alert("noo");
                } 
                else if(check_flag == 1)
                {
                    // alert("ajax call");
                    // alert("ajax call:"+TableData);
                    var TableData1 = JSON.stringify(TableData);
                    console.log(" TableData:"+TableData1);
                    
                    $.ajax(
                    {
                        url: "../../api/global/add_product_excel.php",
                        type: 'POST',
                        data : 
                        {
                            'product_array' : TableData1,
                        },
                        //dataType:'text',  
                        success: function(data)
                        { 
                            console.log(data);
                            if(data == "1")
                            {
                                $.toast({
                                heading: 'Success',
                                text: 'Excel Uploaded!',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'success'
                                })
                                setTimeout(() => {
                                window.location.href = 'view_item.php';    
                                }, 5000);
                            
                            }
                            else if(data == "0" || data == "error")
                            {
                                alert("Please Enter Valid Details");
                                $.toast({
                                    heading: 'error',
                                    text: 'Please Enter Valid Details',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                });
                            }
                            else if(data != "1" || data != "0" || data != "error" )
                            {
                                var jd = data.split("#");
                                var dc = jd[1];
                                var ic = jd[2];
                                $.toast({
                                heading: 'Success',
                                text: dc + ' duplicate products Not uploaded '+ ic + ' products uploaded ',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                hideAfter: 5000,
                                icon: 'success'
                                })
                                setTimeout(() => {
                                window.location.href = 'view_item.php';    
                                }, 5000);
                            }
                        
                        },
                    });
                } 
                else
                {
                    alert("error");
                }  
            return TableData;
            
        }
        
    });
</script>
