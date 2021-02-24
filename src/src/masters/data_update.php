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
                                    <label class="col-md-1 label-control" for="userinput1">Master <span style="color:red;"> *</span></label>
									<div class="col-md-4">
										<div class="form-group row">
                                            <select class="select2 form-control block" name="type" id="type" class="select2" data-toggle="select2" onchange="master_select();" >
                                                  <option value="" disabled selected>Select </option>
                                                  <option value="Wholesale Customer">Wholesale Customer</option>
                                                  <option value="Supplier">Supplier</option>
                                                  <option value="Produt">Produt</option>
                                                  <option value="Retail Customer">Retail Customer</option>
                                            </select>
                                        </div>
									</div>
                                    <div class="col-md-7">
										<div class="form-group row">
                                            <!-- <input type="button" id="viewfile" value="Show" onclick="show()" class="btn btn-success"/>   -->
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="button" id="export" value="Update"  class="btn btn-primary" onclick="Update_data();"/>  
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <!-- <input type="button" id="import" value="Import"  class="btn btn-primary"/>   -->
                                        </div>
                                    </div>
		                        </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                            <div class="table-responsive">
                                                    <table class="border-bottom-0 table table-hover" id="tbl" >
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No.</th>
                                                                <th>Name &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                <th>GST&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                <th style="display:none;">Hidden &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group row">
                                            <div id="table" class="table-editable col-md-12 centered-vertically">
                                                <table class="table table-bordered" id="exceltable">
                                                </table>
                                            </div>
  
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
$(document).ready(function()
{
    $('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {extend: 'pdf', exportOptions: { columns: ''}}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
        searching:true,
        // columnDefs: [ 
        //     { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
        //     ],      
        // select: { style: 'multi', selector: 'td:nth-child(0)'},
        // select: { style: 'multi'},
        //destroy:false,
        drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
 
});	
</script>
<script>
function master_select()
{
    var master_value = document.getElementById("type").value;
    table = $('#tbl').DataTable( {
        searching:true,
        ajax: 
        {
            "url": "../../api/global/get_master_data1.php",
            "type": "POST",
            data : 
            {
                'action' : master_value
            },
            /*dataType: 'text',
            success: function(data)
            { 
                console.log(data);
            },*/
        },
        deferRender: true,
        "columnDefs": 
        [ 

        // {
        //     "targets": 0,
        //     "data": null,
        //     "defaultContent": ""
        // }

        ],
        destroy:true,
    });
}
function Update_data()
{
    var master_value = document.getElementById("type").value;
    if(master_value != "")
    {
        var rawItemArray = [];
        var count=table.rows().count();
        var i=0;
        
        table.rows().eq(0).each( function ( index ) 
        { 
            var row = table.row( index );
            var data = row.data();
            var name =table.cell(i,1).nodes().to$().find('input').val();
            var gst =table.cell(i,2).nodes().to$().find('input').val();
            var hiddenid=table.cell(i,3).nodes().to$().find('input').val();
            rawItemArray.push({
                name : name,
                gst : gst,
                hiddenid:hiddenid,
            });
            i++;
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);
        $.ajax(
        {

            url: "../../api/global/update_data.php",
            type: 'POST',
            data : "newRawItemArray=" + newRawItemArray + '&master_value='+master_value,
            dataType:'text',  
            success: function(data)
            { 
                console.log(data);
                if(data == "1")
                    {
                        $.toast({
                            heading: 'Success',
                            text: 'Data Updated!!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        //alert("Data Updated!");
                        //window.location.href="view_wholesale_work_order.php";
                    }
                    else
                    {
                        $.toast({
                            heading: 'Error',
                            text: 'Please Enter Valid Details',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
                       // alert("Please Enter Valid Details");
                    }
            
            },
            
        });
    }
    else
    {
        $.toast({
            heading: 'Error',
            text: 'Please Select Master',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
    }

}
</script>
<!-- /*$.ajax(
      {
        url: "../../api/global/get_master_data.php",
        type: 'POST',
        data : 
        {
          'action' : master_value
        },
        success: function(data)
        {
            alert("data:"+data);
            $('#exceltable').html(data);
            
        }
      }
    );*/
    //var edit_id='<?php// echo $edit_id; ?>'; -->