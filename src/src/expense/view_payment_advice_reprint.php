
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
.pdf {
    max-height: 300px;
    overflow-y: auto;
    width: 100%;
}
</style>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row" id="main">
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.475rem;">
                        <div class="card-content">
                            <div class="card-body" style="padding: 0.5rem;">
                                <div class="row" style="margin: 0;">
                                    <div class="col-lg-2 col-md-2 col-sm-2 mobile-width border-right-blue-grey border-right-lighten-5">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-lg dropdown-toggle pl-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;background-color: white;color: black;font-weight: bold;">
                                                All Payment Advice Reprint
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <!-- <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                        <a href="add_payment_advice_cancellation.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-body" style="padding-top: 1.5rem; !important">
                        <div class="row" style="margin: 0;">
                            <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pay_advice_reprint_form" style="width: 100%;">
                                <div class="form-body">
                                    <div class="row" style="margin: 0;">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Financial Yr</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="fin_yr" class="select2" data-toggle="select2" name="fin_yr">
                                                                <option value="" disabled selected>Select </option>
                                                                <option value="19-20"> 19-20</option>
                                                                <option value="20-21"> 20-21</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Vendor <span style="color:red;"> *</span></label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="vendor_id_fk" name="vendor_id_fk">
                                                                <option value=" " selected disabled>Select</option>
                                                                <?php
                                                                    if($flag == 0) {
                                                                    $sql = "SELECT  * FROM mstr_vendor where flag= '0' ";
                                                                    }
                                                                    else {
                                                                         $sql = "SELECT  * FROM mstr_vendor where flag= '1' ";
                                                                    }
                                                                    $result = mysqli_query($db,$sql);
                                                                    while($row1 = mysqli_fetch_array($result))
                                                                    {   
                                                                        ?>
                                                                        <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'].". ".$row1['2']." ".$row1['3'];?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Payment Advice No <span style="color:red;"> *</span></label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="pay_advice_id_fk" class="select2" data-toggle="select2" name="pay_advice_id_fk">
                                                                <option value="" disabled selected>Select </option>
                                                                <?php
                                                                    if($flag == 0) {
                                                                    $sql = "SELECT * FROM exp_pay_advice where flag='0' ";
                                                                    }
                                                                    else {
                                                                        $sql = "SELECT * FROM exp_pay_advice where flag='1' ";
                                                                    }
                                                                    $result = mysqli_query($db,$sql);
                                                                    while($row2 = mysqli_fetch_array($result))
                                                                    {   
                                                                        ?>
                                                                        <option value="<?php  echo $row2['0'];?>"><?php echo  $row2['padv_no'] ?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Cheque No </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="cheque_no" name="cheque_no">
                                                                <option value=" " selected disabled>Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right text-center">
                                    
                                    <button type="button" class="btn btn-primary" name="add" onClick="show_data()">
                                        <i class="fa fa-check-square-o"></i> Show
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <object data="../pdf/payment_advice/#toolbar=0" type="application/pdf" id="pdf_path" class="pdf">
                                <p><b style="font-size: 18px;">Your web browser doesn't have a PDF plugin.
                                Instead you can click on Download Button to
                                download the PDF file.</b></p>
                            </object>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php include('../../partials/footer.php');?>


<script>
function show_data()
{

  //console.log(newRawItemArray);
  var fin_yr = document.getElementById("fin_yr").value;
  var vendor_id_fk = document.getElementById("vendor_id_fk").value;
  var pay_advice_id_fk = document.getElementById("pay_advice_id_fk").value;
 // alert ('fin-yr'+ fin_yr + 'supp' + supplier + 'no'+paymentadvice_no );
  if (vendor_id_fk != "" && pay_advice_id_fk != "") {
   // $().redirect('../../fpdf/api/payment_advice.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=&t', {'arg1': 'supplier', 'arg2': 'paymentadvice_no'});
    window.location = '../../fpdf/api/exp_payment_advice.php?45dfdcfdfghghjkkhjk&id=' + vendor_id_fk+ "&paymentno="+ pay_advice_id_fk ;
  }
  else {
    $.toast({
        heading: 'Error',
        text: 'Please Select Vendor And Payment Advice No..!!',
        showHideTransition: 'slide',
        position: 'top-right',
        hideAfter: 5000,
        icon: 'error'
    })
  }
} 
</script>

