
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>
<style>
/* .select2-container {
    width: -webkit-fill-available !important;
} */

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
                                                All Reprint Debit/Credit Note
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
                    <div class="card-body" style="padding-top: 1.5rem">
                        <div class="row" style="margin: 0;">
                            <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="pay_advice_reprint_form">
                                <div class="form-body">
                                    <div class="row" style="margin: 0;">
                                        <div class="col-md-12">
                                            <div class="form-group row" style="margin-left: 0px;">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <input type="radio" class="form-control " name="type" id="type1" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" checked >&nbsp; Debit Note &nbsp; &nbsp; &nbsp; 
                                                        <input type="radio" class="form-control " name="type" id="type2" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="0" >&nbsp; Credit Note &nbsp; &nbsp; &nbsp;
                                                        <input type="radio" class="form-control " name="type" id="type3" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="2" >&nbsp; Purchase Invoice 
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="branch" name="branch" readonly>
                                                                <option value="Signature Concepts LLP" selected disabled>Signature Concepts LLP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Financial Yr</label>
                                                        <div class="col-md-9">
                                                            <?php
                                                                if (date('m') > 6) {
                                                                    $year = date('Y')."-".(date('Y') +1);
                                                                }
                                                                else {
                                                                    $year = (date('Y')-1)."-".date('Y');
                                                                }
                                                                
                                                            ?>
                                                            <select class="form-control" id="fin_yr"  name="fin_yr">
                                                                <option value="<?php echo $year; ?>" selected disabled><?php echo $year; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 debit_row">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Debit No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="debit_no" class="select2" data-toggle="select2" name="debit_no">
                                                                <option value="" disabled selected>Select Debit No </option>
                                                                <?php
                                                                if($flag == 0) {
                                                                $sql = "SELECT id FROM customer_manual_debit_credit WHERE credit_debit_type = 'Debit' and flag='0' ";
                                                                }
                                                                else {
                                                                    $sql = "SELECT id FROM customer_manual_debit_credit WHERE credit_debit_type = 'Debit' and flag='1' ";
                                                                }
                                                                $result = mysqli_query($db,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row['0'];?>"><?php echo  $row['0']?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 credit_row">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Credit No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="credit_no" class="select2" data-toggle="select2" name="credit_no">
                                                                <option value="" disabled selected>Select Credit No</option>
                                                                <?php
                                                                if($flag == 0) {
                                                                $sql = "SELECT id FROM customer_manual_debit_credit WHERE credit_debit_type = 'Credit' and flag='0' ";
                                                                }
                                                                else {
                                                                    $sql = "SELECT id FROM customer_manual_debit_credit WHERE credit_debit_type = 'Credit' and flag='1' ";
                                                                }
                                                                $result = mysqli_query($db,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row['0'];?>"><?php echo  $row['0']?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pi_row">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput1">Purchase Invoice No</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control block" id="purchase_invoice_no" class="select2" data-toggle="select2" name="purchase_invoice_no">
                                                                <option value="" disabled selected>Select Purchase No</option>
                                                                <?php
                                                                if($flag == 0) {
                                                                $sql = "SELECT id_pk FROM fin_purchase_invoice where flag='0' ";
                                                                }
                                                                else {
                                                                    $sql = "SELECT id_pk FROM fin_purchase_invoice where flag='1' ";
                                                                }
                                                                $result = mysqli_query($db,$sql);
                                                                while($row = mysqli_fetch_array($result))
                                                                {   
                                                                    ?>
                                                                    <option value="<?php  echo $row['0'];?>"><?php echo  $row['0']?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
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
    $(document).ready(function()
{
    $('.credit_row').hide(); 
    $('.pi_row').hide(); 
    $('.debit_row').show(); 
    $('input[type="radio"]').click(function(){
            var type = $('input[name=type]:checked').val();
            //alert(type);
            if(type == "1") {
                    $('.credit_row').hide(); 
                    $('.pi_row').hide();
                    $('.debit_row').show(); 
                }
                else if(type == "0") {
                    $('.debit_row').hide(); 
                    $('.pi_row').hide(); 
                    $('.credit_row').show();
                }
                else if(type == "2") {
                    $('.credit_row').hide(); 
                    $('.debit_row').hide(); 
                    $('.pi_row').show();
                }
        });
});

function show_data()
{

  //console.log(newRawItemArray);
  var fin_yr = document.getElementById("fin_yr").value;
  var debit_no = document.getElementById("debit_no").value;
  var credit_no = document.getElementById("credit_no").value;
  var purchase_invoice_no = document.getElementById("purchase_invoice_no").value;
  var type = $('input[name=type]:checked').val();
 // alert ('fin-yr'+ fin_yr + 'supp' + supplier + 'no'+paymentadvice_no );
  if (type == "1") 
    {
        if (debit_no != "") 
        {
            window.location = '../../fpdf/api/customer_manual_debit.php?45dfdcfdfghg78454hjkkhjk&id=' + debit_no ;
        }
        else {
            $.toast({
                heading: 'Error',
                text: 'Please Select Debit No..!!',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
    }
  
    else if (type == "0") 
    {
        if (credit_no != "") {
            window.location = '../../fpdf/api/customer_manual_credit.php?45dfdcfdfgh6780ghjkkhjk&id=' + credit_no ;
        }
        else {
            $.toast({
                heading: 'Error',
                text: 'Please Select Credit No..!!',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
    }
  
    else if (type == "2" ) 
    {
        if (purchase_invoice_no != "")
        {
            window.location = '../../fpdf/api/purchase_invoice1.php?45dfdcfdfg4657ghghghghjkkhjk&id=' + purchase_invoice_no ;
        }
        else {
            $.toast({
                heading: 'Error',
                text: 'Please Select Purchase Invoice No..!!',
                showHideTransition: 'slide',
                position: 'top-right',
                hideAfter: 5000,
                icon: 'error'
            })
        }
    }
  
    else if (type == "") 
    {
        $.toast({
            heading: 'Error',
            text: 'Please Select Type..!!',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
    }
} 
</script>