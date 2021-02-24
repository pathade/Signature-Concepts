<?php include('../../partials/header.php');
      include('../../database/dbconnection.php');
?>
<style>
     .alert-danger {
        background-color: #E6808A!important;
        color: #5A1219!important;
        padding: 1px;
    }
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
    
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Fixed Payment</h4>
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
                                <div class="row" style="display:none;">
                                    <div class="col-md-6">
                                        <?php

                                            $sql = "SELECT * FROM mstr_data_series where name='exp_fix_payment'";
                                            $result = mysqli_query($db,$sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">fp No.</label>
                                            <div class="col-md-3">
                                                <input type="text" id="fp_no" class="form-control " placeholder="" name="fp_no" value="<?php echo $row['2']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <?php 
                                        $id= $_GET['id'];
                                        $sql="SELECT * FROM `exp_fixed_payment` WHERE id='$id'";
                                        $res=mysqli_query($db,$sql);
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $branch=$row['branch'];
                                            $exp_head=$row['exp_head'];
                                            $vendor=$row['vendor'];
                                            $amount=$row['amount'];
                                            $service_tax1=$row['service_tax1'];
                                            $service_tax2=$row['service_tax2'];
                                            $other_add=$row['other_add'];
                                            $other_deduction=$row['other_deduction'];
                                            $tds=$row['tds'];
                                            $tds_amt=$row['tds_amt'];
                                            $net_amt=$row['net_amt'];
                                            $recurrance=$row['recurrance'];
                                            $from_period=$row['from_period'];
                                            $to_period=$row['to_period'];
                                            $chq_date=$row['chq_date'];
                                            $remark=$row['remark'];
                                            $auth_by_level1=$row['auth_by_level1'];
                                            $auth_by_level2=$row['auth_by_level2'];

                                            
                                            
                                            // $sql_exp_head="SELECT * from mstr_expense WHERE expense_idpk='$exp_head'";
                                            // $res_exp=mysqli_query($db,$sql_exp_head);
                                            // while($row_exp=mysqli_fetch_array($res_exp))
                                            // {
                                            //     $exp_head_name=$row_exp['expense_head'];
                                            // }

                                        }
                                        ?>
                                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

                                            <label class="col-md-3 label-control" for="userinput1">Branch </label>
                                            <div class="col-md-9">
                                                <select class=" select2 form-control"name="branch"id="branch">
                                                    <option value="<?php echo $branch; ?>"><?php echo $branch; ?></option>
                                                    <option selected="">Signature Concepts LLP</option>
                                                </select>
                                                <div id="branch_error">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Exp Head</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control block" id="expense_head_id_fk" class="select2" data-toggle="select2" 
                                                name="expense_head_id_fk">
                                                <?php
                                                $sq="SELECT * FROM mstr_expense
                                                    where expense_idpk='$exp_head'";
                                                $rs=mysqli_query($db,$sq);
                                                if (!$rs) 
                                                {
                                                    printf("Error: %s\n", mysqli_error($db));
                                                    exit();
                                                }
                                                $expense_head_name="";
                                            while($rw=mysqli_fetch_array($rs))
                                                {
                                                $expense_head_name=$rw['expense_head'];
                                                }?>
                                                    <option value="<?php echo $exp_head; ?>"><?php echo $expense_head_name; ?>
                                                    </option>
                                                    <?php

                                                        $sql = "SELECT * FROM mstr_expense";
                                                        $result = mysqli_query($db,$sql);
                                                        while($row1 = mysqli_fetch_array($result))
                                                        {   
                                                            ?>
                                                            <option value="<?php  echo $row1['0'];?>"><?php echo  $row1['1'] ?></option>
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
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Vendor</label>
                                            <div class="col-md-9">
                                                <select class=" select2 form-control" name="vendor" id="vendor">
                                                <?php
                                                $sql1="SELECT vendor_id_pk,saturation,first_name,last_name FROM mstr_vendor WHERE vendor_id_pk='$vendor'";
                                                $res1=mysqli_query($db,$sql1);
                                             $vendor_name="";
                                            while($row1=mysqli_fetch_array($res1))
                                            {

                                                $vendor_name=$row1['saturation']."&nbsp".$row1['first_name']."&nbsp".$row1['last_name'];
                                            } 
                                            ?>

                                                    <option value="<?php echo $vendor_id_pk; ?>"><?php echo $vendor_name; ?></option>

                                                <?php
                                               echo $vendor_sql="SELECT DISTINCT 
                                                vendor_id_pk,saturation,first_name,last_name FROM mstr_vendor";
                                                $vendor_res=mysqli_query($db,
                                                    $vendor_sql);
                                                while($vendor_row=mysqli_fetch_array($vendor_res))
                                                {
                                                    ?>
                                                    <option value="<?php echo 
                                                    $vendor_row['vendor_id_pk'];?>"><?php echo
                                                    $vendor_row['saturation']."&nbsp".$vendor_row['first_name']."&nbsp".$vendor_row['last_name'];?></option>
                                                <?php
                                                }
                                                ?>
                                                    
                                                </select>
                                                <div id="vendor_error">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Amount</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="amount" id="amount" value="<?php echo $amount; ?>"/>
                                               <div id="amount_error">
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Service Tax(%)</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="service_tax1" id="service_tax1"  value="<?php echo $service_tax1; ?>" />
                                                <div id="service_tax1_error">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Service Tax </label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"
                                                placeholder="0"name="service_tax2"id="service_tax2"  value="<?php echo $service_tax2; ?>" />
                                                <div id="service_tax2_error">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Other Add</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="other_add" id="other_add" value="<?php echo $other_add; ?>" />
                                                <div id="other_add_error">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Other Deduction<span style = "color:red;">*</span></label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" id="other_deduction"
                                                name="other_deduction"placeholder="0" value="<?php echo $other_deduction; ?>"/>
                                                <div id="other_deduction_error">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">TDS%</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name ="tds" id = "tds" value="<?php echo $tds; ?>" />
                                                <div id="tds_error">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">TDS Amount</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"
                                                placeholder="0"  value="<?php echo $tds_amt; ?>"
                                                 id="tds_amt" name="tds_amt" />
                                                <div id="tds_amt_error">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Net Amount</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"  placeholder="0" name="net_amt" id="net_amt" value="<?php echo $net_amt; ?>" />
                                                <div id="net_amt_error">
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Recurrance</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control"
                                                placeholder="0" value="<?php echo $recurrance; ?>" 
                                                name="recurrance" 
                                                id="recurrance" min="1" max="12" style="width: 65%;" />
                                                <span class="float-right" style="margin-top: -39px">     No of Months(1-12)
                                                </span>
                                                <div id="recurrance_error">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">From Period</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="from_period" id="from_period" value="<?php echo date('Y-m-d'); ?>"/>
                                                <div id="from_period_error">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">To Period</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="to_period" id="to_period" value="<?php echo date('Y-m-d');?>" />
                                                <div id="to_period_error">

                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Chq Print Date</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="chq_date" id="chq_date" value="<?php echo $chq_date; ?>"min="1" max="31" style="width: 60%;" />
                                                <span class="float-right" style="margin-top: -39px">     Dt of Months(1-31)
                                                </span>
                                                <div id="chq_date_error">
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Remark</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="remark" name="remark" value="<?php echo $remark; ?>"/>
                                                
                                                <div id="remark_error">

                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1"> Auth By Level1</label>
                                            <div class="col-md-9">
                                                <select class=" select2 form-control" 
                                                id="auth_by_level1" name="auth_by_level1">
                                                    <option value="<?php echo 
                                                    $auth_by_level1; ?>"><?php echo $auth_by_level1; ?></option>
                                                    <option>Chetan</option>
                                                    <option>Admin</option>
                                                    <option>Kamlesh</option>
                                                </select>
                                                <div id="auth_by_level1_error">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1"> Auth By Level2</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control" 
                                                id="auth_by_level2" name="auth_by_level2">
                                                    <option value="<?php echo $auth_by_level2; ?>"><?php echo 
                                                    $auth_by_level2; ?></option>
                                                    <option>Chetan</option>
                                                    <option>Admin</option>
                                                    <option>Kamlesh</option>
                                                </select>
                                                <div id="auth_by_level2_error">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>

                            </div>
                            <div class="form-actions right">
                                
                                <button type="button" name="add_fixed_payment"class="btn btn-primary" onClick="submit1();" style="display: none;">
                                    <i class="fa fa-check-square-o"></i> Add
                                </button>
                                
                                <a href="view_fixed_payment.php"><button type="button" class="btn btn-warning mr-1">Cancel</button></a>

                                
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
$(document).ready(function()
{
    //hide all error
  document.getElementById("branch_error").style.display = "none";
  document.getElementById("exp_head_error").style.display = "none";
  document.getElementById("vendor_error").style.display = "none";
  document.getElementById("amount_error").style.display = "none";
  document.getElementById("service_tax1_error").style.display = "none";
  document.getElementById("service_tax2_error").style.display = "none";
  document.getElementById("other_add_error").style.display = "none";
  document.getElementById("other_deduction_error").style.display = "none";
  document.getElementById("tds_error").style.display = "none";
  document.getElementById("tds_amt_error").style.display = "none";
  document.getElementById("net_amt_error").style.display = "none";
  document.getElementById("recurrance_error").style.display = "none";
  document.getElementById("from_period_error").style.display = "none";
  document.getElementById("to_period_error").style.display = "none";
  document.getElementById("chq_date_error").style.display = "none";
  document.getElementById("remark_error").style.display = "none";
  document.getElementById("auth_by_level1_error").style.display = "none";
  document.getElementById("auth_by_level2_error").style.display = "none";
});

function submit1()
{
    // var branch = document.getElementById("branch").value;
    // // alert(branch);
    // var exp_head = document.getElementById("exp_head").value;
    // var vendor = document.getElementById("vendor").value;
    // var service_tax1 = document.getElementById("service_tax1").value;
    // var service_tax2 = document.getElementById("service_tax2").value;
    // var other_add = document.getElementById("other_add").value;
    // var other_deduction = document.getElementById("other_deduction").value;
    // var tds = document.getElementById("tds").value;
    // var tds_amt = document.getElementById("tds_amt").value;
    // var net_amt = document.getElementById("net_amt").value;
    // var recurrance = document.getElementById("recurrance").value;
    // var from_period = document.getElementById("from_period").value;
    // var to_period = document.getElementById("to_period").value;
    // var chq_date = document.getElementById("chq_date").value;
    // //alert(chq_date);
    // var remark = document.getElementById("remark").value;
    // var auth_by_level1 = document.getElementById("auth_by_level1").value;
    // var auth_by_level2 = document.getElementById("auth_by_level2").value;
    
    // if(branch == "")
    // {
    //     document.getElementById("branch_error").style.display = "block";
    //     //alert('hi');
    //     return;
    // }
    // if(exp_head == "")
    // {
    //     document.getElementById("exp_head_error").style.display = "block";
    //     return;
    // }
    // if(vendor == "")
    // {
    //     document.getElementById("vendor_error").style.display = "block";
    //     return;
    // }
    // if(amount == "")
    // {
    //     document.getElementById("amount_error").style.display = "block";
    //     return;
    // }
    // if(service_tax1 == "")
    // {
    //     document.getElementById("service_tax1_error").style.display = "block";
    //     return;
    // }
    // if(service_tax2 == "")
    // {
    //     document.getElementById("service_tax2_error").style.display = "block";
    //     return;
    // }
    // if(other_add == "")
    // {
    //     document.getElementById("other_add_error").style.display = "block";
    //     return;
    // }
    // if(other_deduction == "")
    // {
    //     document.getElementById("other_deduction_error").style.display = "block";
    //     return;
    // }
    // if(tds == "")
    // {
    //     document.getElementById("tds_error").style.display = "block";
    //     return;
    // }
    // if(tds_amt == "")
    // {
    //     document.getElementById("tds_amt_error").style.display = "block";
    //     return;
    // }
    // if(net_amt == "")
    // {
    //     document.getElementById("net_amt_error").style.display = "block";
    //     return;
    // }
    // if(recurrance == "")
    // {
    //     document.getElementById("recurrance_error").style.display = "block";
    //     return;
    // }
    // if(from_period == "")
    // {
    //     document.getElementById("from_period_error").style.display = "block";
    //     return;
    // }
    // if(to_period == "")
    // {
    //     document.getElementById("to_period_error").style.display = "block";
    //     return;
    // }
    // if(chq_date == "")
    // {
    //     document.getElementById("chq_date_error").style.display = "block";
    //     return;
    // }
    // if(remark == "")
    // {
    //     document.getElementById("remark_error").style.display = "block";
    //     return;
    // }
    // if(auth_by_level1 == "")
    // {
    //     document.getElementById("auth_by_level1_error").style.display = "block";
    //     return;
    // }
    // if(auth_by_level2 == "")
    // {
    //     document.getElementById("auth_by_level2_error").style.display = "block";
    //     return;
    // }


    $.ajax({
        url: '../../api/expenses/update_fixed_payment.php',
        type: "POST",
        data: $('#form').serialize(),
        success: function(data)
        {
            console.log(data);
            if(data ="1")
            {
                alert('Record updated!');
                // $.toast({
                //     heading: 'Error',
                //     text: 'Fixed Payment Updated Successfully...!!',
                //     showHideTransition: 'slide',
                //     position: 'top-right',
                //     hideAfter: 5000,
                //     icon: 'error'
                // })
               window.location.href = "view_fixed_payment.php";
            }
            else
            {
                alert('something went wrong');
                // $.toast({
                //     heading: 'Error',
                //     text: 'Something went wrong...!!',
                //     showHideTransition: 'slide',
                //     position: 'top-right',
                //     hideAfter: 5000,
                //     icon: 'error'
                // })
            }
        }
    });
}
    
</script>
<script>

function calservicetax()
{
    //alert('hii');
    var amount=parseFloat(document.getElementById("amount").value);
    var service_tax1=parseFloat(document.getElementById("service_tax1").value);
    var val1=(amount * service_tax1)/100;
    console.log(val1)
    document.getElementById("service_tax2").value=val1;

    var net_amount= amount + val1;
    document.getElementById("net_amt").value=net_amount;
}
function calotheradd()
{   
    //function calservicetax();
    var result=0;
    var net_amount=document.getElementById("net_amt").value;
    var other_add1=document.getElementById("other_add").value;

    result=parseFloat(other_add1) + parseFloat(net_amount);
    console.log(result);
    if(other_add1 == 0)
    {
        result=parseFloat(net_amount);    
    }
    else if(net_amount == 0)
    {
        result=parseFloat(other_add1);
    }
    else(other_add1!==0 && net_amount!==0)
    {
    document.getElementById("net_amt").value = result;
    }
}

function caldeduction()
{
    var net_amount=document.getElementById("net_amt").value;
    var other_deduction_val=document.getElementById("other_deduction").value;
    var other_deduction1=parseFloat(net_amount) - parseFloat(other_deduction_val);
    document.getElementById("net_amt").value=other_deduction1;

}
function caltds()
{
    //alert("hi");
    var tds=document.getElementById("tds").value;
    //alert(tds);
    var net_amount1=document.getElementById("net_amt").value;
    //alert(net_amount1);
    var result1=((parseFloat(tds) * parseFloat(net_amount1))/100);
    console.log(result1);
    document.getElementById("tds_amt").value=result1;

    var total_net_amount= parseFloat(net_amount1) - parseFloat(result1);
    console.log(total_net_amount);
    //document.getElementById("net_amt").value=total_net_amount;

}
    
</script>
<script>

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