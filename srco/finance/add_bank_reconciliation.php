
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>
<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

.modal-header {
    background-color: #f7f7f7;
    padding: 20px;
}

.select1 .select2-container {
    width: -webkit-fill-available !important;
}

.green-text {
    color: #28a745!important;
}

.dataTables_wrapper table {
    display: block;
    width: 100%;
    min-height: .01%;
    overflow-x: auto;
}

.table td, .table th {
    border-bottom: 0px solid #E3EBF3;
}

@media (min-width: 320px) and (max-width: 600px) {
    .mobile-width {
        width: 33%;
    }
}

@media screen and (max-width: 640px) {
    div.dt-buttons {
        display: table;
    }
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
        <div class="content-body">
            <!-- <div class="row" id="main">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.475rem;">
                        <div class="card-content">
                            <div class="card-body" style="padding: 0.5rem;">
                                <div class="row" style="margin: 0;">
                                    <div class="col-lg-2 col-md-2 col-sm-2 mobile-width border-right-blue-grey border-right-lighten-5">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-lg dropdown-toggle pl-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                                All Bank Reconciliation
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                        <a href="add_bank_reconciliation.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

<section id="horizontal-form-layouts">
	
<form method="post" id="form1" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="col-md-12">
	        <div class="card">
				<div class="card-header">
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Bank Reconciliation</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="bank_rec_form">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                <div class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                                <?php
                                                if ($flag == 0){
                                                    $sql = "SELECT * FROM mstr_data_series where name='fin_bank_reconciliation' and flag='0' ";
                                                }
                                               else {
                                                $sql = "SELECT * FROM mstr_data_series where name='fin_bank_reconciliation' and flag='1' ";
                                               }
                                                $result = mysqli_query($db,$sql);
                                                $row = mysqli_fetch_array($result);
                                                ?>
                                            <label class="col-md-3 label-control" for="userinput1">Bank Reconciliation</label>
                                            <div class="col-md-9">
                                            <input type="text" id="br_no" class="form-control " placeholder="" name="br_no" readonly value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Bank Name<span style="color:red;">*</span> </label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control block select21" id="bank_name1" class="select2" onchange="getAccountNo123()" data-toggle="select2" name="bank_name1">
                                                    <?php
                                                        $option="<option value=''>Select Bank</option>";
                                                        echo $option;
                                                        if ($flag == 0){
                                                        $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank where flag='0' order by bank_name asc";  // Use select query here 
                                                        }
                                                        else {
                                                            $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank where flag='1' order by bank_name asc";
                                                        }
                                                        $result = mysqli_query($db, $sql);
                                                        while($row2 = mysqli_fetch_array($result))
                                                        {
                                                            $option="<option value='".$row2['bank_idpk']."'>".$row2['bank_name']."</option>";
                                                            echo $option;
                                                        }
                                                    ?>  												
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Account No <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                            <select class="select2 form-control block select21" id="account_no1" class="select2" data-toggle="select2" name="account_no1">
                                                <!-- --><option value=''>Select </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">From Date <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" id="from_date" class="form-control " name="from_date" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">To Date <span style="color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" id="to_date" class="form-control " name="to_date" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group " style="text-align: center;">
                                            <button type="button" name="purchase_invoice_show" class="btn btn-primary" id="purchase_invoice_show" onclick="show_data();">
                                                    <i class="fa fa-check-square-o"></i> Show
                                            </button>
                                        </div>
							</div>


                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- <div class="form-group row"> -->
                                                    <div class="table-responsive">
                                                    <table class="display " id="tbl" style="width: 100%;font-size: smaller;">
                                                    <!-- <table class="border-bottom-0 table table-hover" id="tbl" > -->
                                                                <thead>
                                                                    <tr>
                                                                        <th><input type="checkbox"></th>
                                                                        <!-- <th>Action &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th> -->
                                                                        <th>Id &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Date &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Dr/Cr &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Particulars &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Voucher Type&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </th>
                                                                        <th>Trans. No. &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Debit &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</th>
                                                                        <th>Credit&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </th>
                                                                        <th>Reconcile Date&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </th>  
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <br /><br /> -->




	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_order" class="btn btn-primary" id="add_purchase_order" onclick="save_data();" >
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
// 	$(document).ready(function()
//   {
//     table= $('#tbl').DataTable( {
                                    
//                                     paginate: false,
//                                     lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
//                                     buttons: [],
//                                     searching:false,
//                                     language : {
//                                     "zeroRecords": " "             
//                                 },
                                
                            
                                
//                                 });
// });
			
		
</script>

<script>

 

function show_data()
{
    //alert("hiii");
    var bank_name1 = document.getElementById("bank_name1").value;
    var account_no1 = document.getElementById("account_no1").value;
    var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;
    
//     alert("bank_name1:"+bank_name1);
//  alert("account_no1:"+account_no1);
//      alert("from_date:"+from_date);
//     alert("to_date:"+to_date);
    
        //var updateItemId = "<?php //echo $_GET['id'] ?>";
        table = $('#tbl').DataTable( {  
                dom: 'Bfrtip',
                searching:false,
                ajax: 
                {
                    "url": "../../api/finance/get_bank_transaction.php",
                    "type": "POST",
                    data : 
                    {
                        'bank_name1' : bank_name1,
                        'account_no1' : account_no1,
                        'from_date' : from_date,
                        'to_date' : to_date
                    },
                    // dataType: 'json',
                    // success: function(data)
                    // { 
                    //     console.log(data);
                    //     alert("data is:"+data);
                    // },
                },
                deferRender: true,
            
                destroy:true,
            });
}
</script>
<script>
    function getAccountNo123()
    {
        //alert("bank click");
//         function getAccountNo1()
//   {
     
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
//   }
    }
</script>
<script>
function save_data()
{
    rawItemArray =[];
        $("#tbl input[type=checkbox]:checked").each(function () 
        {
            var row = $(this).closest("tr")[0];
            bank_tansaction_pk = row.cells[0].childNodes[0].value;
            chdt = row.cells[2].childNodes[0].value;
            db_cr = row.cells[3].childNodes[0].value;
            //alert("vendor_name:"+vendor_name);
            perticualr = row.cells[4].childNodes[0].value;
            //alert("bill_no:"+bill_no);
            vouchertype = row.cells[5].childNodes[0].value;
            //alert("bill_date:"+bill_date);
            transactionno = row.cells[6].childNodes[0].value;
            //alert("bill_amt:"+bill_amt);
            debit = row.cells[7].childNodes[0].value;
            //alert("addition:"+addition);
            credit = row.cells[8].childNodes[0].value;
            //alert("deduction:"+deduction);
            reconciledt = row.cells[9].childNodes[0].value;
            

            rawItemArray.push({
                bank_tansaction_pk : bank_tansaction_pk,
                chdt:chdt,
                db_cr:db_cr,
                perticualr:perticualr,   
                vouchertype:vouchertype,
                transactionno:transactionno,
                debit:debit, 
                credit:credit, 
                reconciledt:reconciledt, 
            });
            // i++;
     
        });
        var newRawItemArray = JSON.stringify(rawItemArray);
        console.log(newRawItemArray);

    // if(paid_amt != "" && payable_amt!= 0 && vendor_id_fk !="" 
    // && authorised_by!="" && pay_date!="" )
    // {
        $.ajax(
        {

            url: "../../api/finance/add_bank_reconcilation.php",
            type: 'POST',
            // data : $('#payment_advice_form').serialize()+ "&newRawItemArray="+ newRawItemArray+ "&vendor_id_fk=" + vendor_id_fk+
            // "&type_vari=" + type_vari+ "&authorised_by=" + authorised_by,
            data :"&newRawItemArray="+ newRawItemArray,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data); 
                if(data == "1")
                {
                    $.toast({
                            heading: 'Success',
                            text: 'Data Reconcile Successfully!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => 
                        {
                            window.location.href="view_bank_reconciliation.php";    
                        }, 5000);
                    // alert("Data Added Successfully!");
                    // window.location.href="view_exp_payment_advice.php";
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
    // }
    // else
    // {
    //     if(count == 0)
    //     {
    //         $.toast({
    //                 heading: 'Error',
    //                 text: 'Please Select Vendor And click show button',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //     }
    //     if(pay_date == "")
    //     {
    //         $.toast({
    //                 heading: 'Error',
    //                 text: 'Please Select Date',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //     }
    //     if(authorised_by == "")
    //     {
    //         $.toast({
    //                 heading: 'Error',
    //                 text: 'Please Select Authorised By',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //     }
    //     if(vendor_id_fk == "")
    //     {
    //         $.toast({
    //                 heading: 'Error',
    //                 text: 'Please Select Vendor',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //     }
    //     if(paid_amt == "")
    //     {
    //         $.toast({
    //                 heading: 'Error',
    //                 text: 'Total Paid Amount Required',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //     }
    //     if(payable_amt == "")
    //     {
    //         $.toast({
    //                 heading: 'Error',
    //                 text: 'Total Payable Amount Required',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //     }
    // }

    

}
</script>