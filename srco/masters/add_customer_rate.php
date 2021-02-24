<?php include('../../partials/header.php');?>

<?php $flag = $_SESSION['flag']; ?>
<style>
    @media (min-width:768px) {
        .divcol {
            margin-left: -4%!important;
        }
    }

    .alert-danger {
        background-color: #E6808A!important;
        color: #5A1219!important;
        padding: 1px;
    }
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Customer Rate</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="form">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Customer</label>
				                        	<div class="col-md-9">
                                                <select class="select2 form-control block" id="customer" class="select2" data-toggle="select2" name="customer">
                                                <option value="" disabled selected>Select Customer </option>
                                                <?php
                                                    if($flag== 0) {
                                                    $sql = "SELECT * FROM tbl_wholesale_customer where flag='0' ";
                                                    }
                                                    else {
                                                        $sql = "SELECT * FROM tbl_wholesale_customer where flag='1' ";
                                                    }
                                                    $result = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row['0'];?>"><?php echo  $row['1'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
                                            </div>
				                        </div>
				                    </div>
                                </div>
							</div>
                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        
                                                    <div class="table-responsive">
                                                             <table class="border-bottom-0 table table-hover" id="tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Final Product</th>
                                                                        <th>Rate</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                        <td>   <select class="form-control block" id="item_id0" >
                                                                            <option value="" disabled selected>Select Item </option>
                                                                            <?php
                                                                            if($flag== 0) {
                                                                            $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='0' ";
                                                                            }
                                                                            else {
                                                                                $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='1' ";
                                                                            }
                                                                            $result = mysqli_query($db,$sql);
                                                                            while($row = mysqli_fetch_array($result))
                                                                            {   
                                                                                ?>
                                                                                <option value="<?php  echo $row['0'];?>"><?php echo  $row['1']?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        
                                                                        </select></td>
                                                                      
                                                                        <td><input type="text" id="rate0" class="form-control" value="0.00" /></td>
                                                                     
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                   
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add another line</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                          
	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="btn add_purchase_order" >
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
</form>
</section>
</div>
	    </div>
	</div>
<?php include('../../partials/footer.php');?>

<script>
var table="";
    $(document).ready(function()
{
    table= $('#tbl').DataTable( {
    
        paginate: false,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [],
        searching:false,
        language : {
        "zeroRecords": " "             
    },
    

    
    });

    
var i=1;
$('#add_new_line').click(function() {
    
    <?php 
    if($flag== 0) { 
        $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='0' ";
    }
    else {
        $sql = "SELECT item_id_pk,final_product_code FROM mstr_item where flag='1' ";
    }
    $result = mysqli_query($db,$sql);?>
    var item="<select class='form-control block'  id='item_id"+i+"' onchange='get_item(this.id)'><option value='' disabled selected>Select Item </option><?php while($row = mysqli_fetch_array($result)){   ?><option value='<?php  echo $row['0']?>'><?php echo $row['1'];?></option><?php } ?></select>";
    var rate= "<input type='text' id='rate"+i+"' class='form-control' value='0.00'>";
    table.row.add( [

        item,
        rate,
    
        ] ).draw( false );

        i++; 

});


});
</script>
<script>
    $(document).ready(function(){
        $('#add_purchase_order').on('click', function () {
            var customer = document.getElementById("customer").value;
            var item_id0 = document.getElementById("item_id0").value;
            var customer_id = $("#customer").val();

            // Add table data to JS array
            var rawItemArray = [];
            var count=table.rows().count();

        
            var i=0;
            table.rows().eq(0).each( function ( index ) 
            { 

                // var tbl11 =t1.cell(i,20).nodes().to$().find('input').val()
                
                var row = table.row( index );
                var data = row.data();
                var item_id_fk =table.cell(i,0).nodes().to$().find('select').val();
                var rate =table.cell(i,1).nodes().to$().find('input').val();

                rawItemArray.push({
                    item_id_fk : item_id_fk,
                    rate:rate,
                
                });
                i++;
            });

            var newRawItemArray = JSON.stringify(rawItemArray);

            console.log(newRawItemArray);
            
            if(customer != '' &&  item_id0 != '') 
            {
                    $.ajax(
                    {
                        url: "../../api/customer/add_customer_rate.php",
                        type: 'POST',
                        data : 
                        {
                            'rawItemArray' : newRawItemArray,
                            'customer_id':customer_id,
                        },
                        dataType:'text',  
                        success: function(data)
                        { 
                            console.log(data);
                            if(data == "1")
                            {
                                //alert('Record Save!');
                                window.location.href = "view_customer_rate.php";
                                $.toast({
                                    heading: 'Success',
                                    text: 'Customer Rate Added Successfully...!!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'success'
                                })
                                setTimeout(() => {
                                    window.location.href = "view_customer_rate.php";    
                                }, 5000);
                                $('#btn').attr('disabled', true);
                            }
                            else
                            {
                                //alert("Please Enter Valid Details");
                                $.toast({
                                    heading: 'Error',
                                    text: 'Something went wrong...!!',
                                    showHideTransition: 'slide',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    icon: 'error'
                                })
                            }
                        
                        },
                    
                    });
            }
            else
            {
                if (item_id0 == '') 
                {
                    //alert('Please Select Item!');
                    $.toast({
                        heading: 'Error',
                        text: 'Please Select Item!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
                }
                if (customer == '') 
                {
                    //alert('Please Select Customer!');
                    $.toast({
                        heading: 'Error',
                        text: 'Please Select Customer!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'error'
                    })
                }
            }

        }); 
    });
</script>