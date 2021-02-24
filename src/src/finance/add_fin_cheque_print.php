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
    .table td, .table th {
    border-bottom: 1px solid #E3EBF3;
    padding: .75rem 1rem;
}

.dc_box {
    height: 125px;
    overflow-y: auto;
    border: 1px solid #c0c0c0;
    padding: 10px;
}

@media (min-width:768px) {
    .right-border {
        border-right: 3px solid #787878;
    }
}

.disabled-select {
    background-color: #d5d5d5;
    opacity: 0.5;
    border-radius: 3px;
    cursor: not-allowed;
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
}

#tbl thead tr th {
        padding: 0px 7px;
    }

    div.container {
        width: 80%;
    }

    td .input1 {
        max-width: 100px;
    min-width: 50px;
    width: 50px;
    }

    td .input {
    width: 50px;
    height: calc(2.45rem + 0px);
    padding: 0.5rem 0.5rem;
    font-size: 17px;
    line-height: 1.25;
    color: #4E5154;
    background-color: #FFF;
    border: 1px solid #ADB5BD;
    border-radius: .21rem;
    /* min-width:50px;
    width:50px;
    max-width:100px;
    resize:none;
    font-size:15px;
    overflow-x:hidden;
    overflow-y:auto;    
    min-height:1.2em;
    height:2.2em;
    padding:2px;
    max-height:5em;  */
    }
</style>
<div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
	
<form method="post" id="form1" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Cheque Print</h4>
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
                        <form class="form form-horizontal" method="post" id="cheque_print_form" data-toggle="validator" role="form" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <?php
                                                if($flag == 0) {
                                                $sql = "SELECT * FROM mstr_data_series where name='exp_cheque_printing' and flag='0' ";
                                                }
                                                else {
                                                    $sql = "SELECT * FROM mstr_data_series where name='exp_cheque_printing' and flag='1' ";
                                                }
                                                $result = mysqli_query($db,$sql);
                                                $row = mysqli_fetch_array($result);
                                                ?>
                                            <label class="col-md-3 label-control" for="userinput1">Cheque Print Id</label>
                                            <div class="col-md-9">
                                            <input type="text" id="cheque_print_no" class="form-control " placeholder="" name="cheque_print_no" readonly value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Supplier Name <span style="color:red;"> *</span></label>
                                            <div class="col-md-9">
                                            <select class="form-control" id="supplier" name="supplier" >
                                                <option value="" selected disabled>Select</option>
                                                <?php
                                                    if($flag == 0) {
                                                    $sql = "SELECT  * FROM mstr_supplier where flag='0' ";
                                                    }
                                                    else {
                                                        $sql = "SELECT  * FROM mstr_supplier where flag='1' ";
                                                    }
                                                    $result = mysqli_query($db,$sql);
                                                    while($row1 = mysqli_fetch_array($result))
                                                    {   
                                                        ?>
                                                        <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'];?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row ">
                                            <button style="height: fit-content;" type="button" name="purchase_invoice_show" class="btn btn-primary" id="purchase_invoice_show" onclick="show_data();">
                                                    <i class="fa fa-check-square-o"></i> Show
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Cheque Date</label>
                                            <div class="col-md-9">
                                                <input type="date" id="cheque_date" class="form-control " name="cheque_date" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <input type="radio" class="form-control " name="type" id="Cash" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="1" checked onkeyUp="getpaymode(this.value);">&nbsp; Cash &nbsp; &nbsp; &nbsp; 
                                            <input type="radio" class="form-control " name="type" id="Cheque" style="height: calc(2.75rem + -23px);width: 20px;margin-top: 3px;"  value="0" onkeyUp="getpaymode(this.value);">&nbsp; Cheque
                                        </div>
                                    </div>
                                    <div class="col-md-4">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Bank Name </label>
				                        	<div class="col-md-9">
												<select class="select2 form-control block select21" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                                    <?php
                                                        $option="<option value=''>Select Bank</option>";
                                                        echo $option;
                                                        if($flag == 0) {
                                                        $sql1 =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank where flag='0' order by bank_name asc";  // Use select query here 
                                                        }
                                                        else {
                                                            $sql1 =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank where flag='1' order by bank_name asc"; 
                                                        }
                                                        $result1 = mysqli_query($db, $sql1);
                                                        while($row2 = mysqli_fetch_array($result1))
                                                        {
                                                            $option="<option value='".$row2['bank_idpk']."'>".$row2['bank_name']."</option>";
                                                            echo $option;
                                                        }
                                                    ?>  												
												</select>
				                            </div>
				                        </div>
				                    </div>
                                    <div class="col-md-4">
			                        	<div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Account No </label>
											<div class="col-md-9">
												<select class="select2 form-control block select21" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" >
                                                <!-- --><option value=''>Select </option>
                                                </select>
				                            </div>
			                       		</div>
			                       	</div>
                                    <div class="col-md-4">
			                        	<div class="form-group row">
                                    		<label class="col-md-3 label-control" for="userinput1">Cheque No</label>
											<div class="col-md-9">
											<input type="number" id="cheque_no" class="form-control " placeholder="" name="cheque_no" >
				                            </div>
			                       		</div>
                                    </div>
                                </div>
							</div>
                            <br />
                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                     <div class="table-responsive">
                                                     <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                    <!-- <table class="border-bottom-0 table table-hover" id="tbl" > -->
                                                                <thead>
                                                                    <tr>
                                                                        <!-- <th></th> -->
                                                                        <th>Select </th>
                                                                        <th>Payment Advice No </th>
                                                                        <th>Financial Year </th>
                                                                        <th>Supplier Id </th>
                                                                        <th>Supplier Name </th>
                                                                        <th>Amount</th>
                                                                        <th>ID</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        <!-- </div> -->
                                                       
                                                    </div>
                                                    <!-- <div class="row">
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-success btn-block" id="add_new_line"><i class="fa fa-plus" aria-hidden="true"></i>Add Row</button>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <br /><br />

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Bank Name  <span style="color:red;"> *</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control block" id="bank_name1" onchange="getAccountNo1()" name="bank_name1">
                                                <?php
                                                    $option="<option value=''>Select Bank</option>";
                                                    echo $option;
                                                    if($flag == 0) {
                                                    $sql3 =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank where flag='0' order by bank_name asc";  // Use select query here 
                                                    }
                                                    else {
                                                        $sql3 =  "SELECT distinct bank_idpk, bank_name FROM mstr_bank where flag='1' order by bank_name asc"; 
                                                    }
                                                    $result3 = mysqli_query($db, $sql3);
                                                    while($row3 = mysqli_fetch_array($result3))
                                                    {
                                                        $option="<option value='".$row3['bank_idpk']."'>".$row3['bank_name']."</option>";
                                                        echo $option;
                                                    }
                                                ?>  												
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Account No  <span style="color:red;"> *</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control block select21" id="account_no1" name="account_no1" data-placeholder="Select Account No" >
                                            <!-- --><option value=''>Select </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Cheque No  <span style="color:red;"> *</span></label>
                                        <div class="col-md-9">
                                        <input type="number" id="cheque_no1" class="form-control " placeholder="" name="cheque_no1" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control" for="userinput1">Reason</label>
                                        <div class="col-md-10 divcol">
                                        <textarea type="text" id="reason" rows="2" class="form-control " placeholder="" name="reason" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            


	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="add_purchase_order" onclick="save_data();" >
	                                <i class="fa fa-check-square-o"></i>  Print Cheque
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

function readonly_select(objs, action) {
    if (action===true)
        objs.prepend('<div class="disabled-select"></div>');

    else 
        $(".disabled-select", objs).remove();
    
}
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

var type = $('input[name=type]:checked').val();
// alert(type);
  if(type == "1") {
            readonly_select($(".select2"), true);
            document.getElementById("cheque_no").readOnly = true;
            document.getElementById("cheque_date").readOnly = true;
        }
        else {
            readonly_select($(".select2"), false);
            document.getElementById("cheque_no").readOnly = false;
            document.getElementById("cheque_date").readOnly = false;
        }

$('input[type="radio"]').click(function(){
            var type = $('input[name=type]:checked').val();
            //alert(type);
            if(type == "1") {
                readonly_select($(".select2"), true);
                    document.getElementById("cheque_no").readOnly = true;
                    document.getElementById("cheque_date").readOnly = true;
                }
                else if(type == "0") {
                    readonly_select($(".select2"), false);
                    document.getElementById("cheque_no").readOnly = false;
                    document.getElementById("cheque_date").readOnly = false;
                }
        });
});
                              
</script>

<script>  
	function getAccountNo()
  {
     
    var bid = document.getElementById("bank_name").value;
    document.getElementById("account_no").length = 0;
    $.ajax(
      {
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid
        },
        dataType:'text',
        success: function(data)
        {
          //alert(data);
          $('#account_no').html(data);
          // $.each(data, function(index) 
          // {
          //   var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
          //   $('#account_no').append(newOption).trigger('change.select2');
           
          // });
        },
        error : function(request,error)
        {}
      }
    );
  }

  function getAccountNo1()
  {
    var bid1 = document.getElementById("bank_name1").value;
    document.getElementById("account_no1").length = 0;
    $.ajax(
      {
        url: "../../api/global/get_account_by_bank.php",
        type: 'GET',
        data : 
        {
          'bank_name' : bid1
        },
        dataType:'text',
        success: function(data)
        {
          //alert(data);
          $('#account_no1').html(data);
          // $.each(data, function(index) 
          // {
          //   var newOption = new Option(data[index].account_no, data[index].bank_idpk, false, false);
          //   $('#account_no').append(newOption).trigger('change.select2');
           
          // });
        },
        error : function(request,error)
        {}
      }
    );
  }
</script>
<script>
    function show_data() 
    {
        var supplier = document.getElementById('supplier').value;
        if(supplier == '')
        {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Supplier',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
           // alert('select supplier');
            return;
        }

        table.clear().draw();

$.ajax({
    type: "POST",
    url:"../../api/finance/get_cheque_print_table.php",
    data : 
    {
        'supplier': supplier
    },
    dataType:'json',

    success:function(data){
    console.log(data);
    var i = 1;  
    if (data != "")
    {
    $.each(data, function(index) 
    {
        var start = data[index].start;
        var select = `<input type="checkbox" value="${start}" id="row_check-${index}" />`;
        var pa_no = `<input type="text" value="${data[index].pa_no}" id="pa_no-${index}" class="form-control" />`;
        var fin_yr = `<input type="text" value="${data[index].fin_yr}" id="fin_yr-${index}" class="form-control" />`;
        var supplier_id = `<input type="text" value="${data[index].supplier_id}" id="supplier_id-${index}" class="form-control" />`;
        var supplier_name = `<input type="text" value="${data[index].supplier_name}" id="supplier_name-${index}" class="form-control" />`;
        var amount = `<input type="text" value="${data[index].amount}" id="amount-${index}" class="form-control" />`;
        var id = `<input type="text" value="${data[index].id}" id="id-${index}" class="form-control" />`;

        table.row.add([
            // start,
            select,
            pa_no,
            fin_yr,
            supplier_id,
            supplier_name,
            amount,
            id
        ]).draw(false);
        i++;
        }); 
    }
    else {
        $.toast({
                            heading: 'Error',
                            text: 'No Data Available',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
    }
}
});

    }


function save_data () 
{
    var rawItemArray = [];
        $("#tbl input[type=checkbox]:checked").each(function () {
            var row = $(this).closest("tr")[0];
            //alert("rowww:"+row);
            pa_no = row.cells[1].childNodes[0].value;
            fin_yr = row.cells[2].childNodes[0].value;
            supplier_id = row.cells[3].childNodes[0].value;
            supplier_name = row.cells[4].childNodes[0].value;
            amount = row.cells[5].childNodes[0].value;
            id = row.cells[6].childNodes[0].value;
            rawItemArray.push({
                pa_no: pa_no,
                fin_yr: fin_yr,
                supplier_id: supplier_id,
                supplier_name: supplier_name,
                amount: amount,
                id: id,
                
            });
        });
            var newRawItemArray = JSON.stringify(rawItemArray);
            console.log(newRawItemArray);

            var supplier = document.getElementById('supplier').value;
            var bank_name1 = document.getElementById('bank_name1').value;
            var account_no1 = document.getElementById('account_no1').value;
            var bank_name = document.getElementById('bank_name').value;
            var account_no = document.getElementById('account_no').value;
            var cheque_no1 = document.getElementById('cheque_no1').value;
            var cheque_print_no = document.getElementById('cheque_print_no').value;
            var cheque_date = document.getElementById('cheque_date').value;
            var cheque_no = document.getElementById('cheque_no').value;
            var reason = document.getElementById('reason').value;
            var type = $("input[name='type']:checked").val();
           // alert(cheque_date);
        if (bank_name1 != "" && account_no1 != "" && cheque_no1 != "" && supplier != "" ) 
        {
            $.ajax({
                url: '../../api/finance/save_fin_cheque_print.php',
                type: 'POST',
                data: '&newRawItemArray=' + newRawItemArray + '&supplier=' + supplier +
                '&bank_name1=' + bank_name1 + '&account_no1=' + account_no1 + '&cheque_no1=' + cheque_no1 +
                '&cheque_print_no=' + cheque_print_no + '&bank_name=' + bank_name + '&account_no=' + account_no +
                 '&cheque_date='+cheque_date +'&reason=' + reason +'&cheque_no=' + cheque_no + '&type=' + type ,
                success: function(data){
                    console.log(data);
                    if(data == 1)
                    {
                        $.toast({
                            heading: 'Success',
                        text: 'Data Added Successfully!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'success'
                        })
                        setTimeout(() => {
                            window.location.href="add_fin_cheque_print.php";                                
                        }, 5000);
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
                    }
                }

            })
            
        }
        else 
        {
            if (bank_name1 == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Select Branch',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (account_no1 == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Select Financial Year',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (cheque_no1 == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Enter Date',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
            if (supplier == "") {
                $.toast({
                    heading: 'Error',
                    text: 'Please Select Supplier',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
            }
        }
        // var newRawItemArray = JSON.stringify(rawItemArray);
  
}


</script>