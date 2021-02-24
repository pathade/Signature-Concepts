<?php include('../../partials/header.php');?>
<?php 
$edit_id=$_GET['id'];
$sql_charges="SELECT * FROM mstr_tax where tax_id_pk='$edit_id'";
$result_charges = mysqli_query($db, $sql_charges);
while ($row=mysqli_fetch_row($result_charges))
{

?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body"><!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit TAX</h4>
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
                                    <div class="card-text"></div>
                                            <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" id="form1">
                                                    <div class="form-body">
                                                            <div class="row">
                                                                            <div class="col-md-6">

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 label-control" for="effective_date">Effective Date<span style="color:red;"> *</span> </label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" id="effective_date" name="effective_date" value="<?php echo $row[11];?>" readonly>
                                                                                        <!-- <span id="effective_date_error" style="color:red;">Effective Data Required</span> -->
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="userinput1" >Tax Name <span style="color:red;"> *</span></label>
                                                                                        <div class="col-md-8">
                                                                                            <input type="text" class="form-control " placeholder="Tax Name" name="tax_name" id="tax_name" onkeyup="written(this.id);" value="<?php echo $row[1];?>">
                                                                                            <!-- <span id="tax_name_error" style="color:red;"></span> -->
                                                                                        </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1" >Tax Percentage<span style="color:red;"> *</span></label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="number"class="form-control" name="tax_percentage" id="tax_percentage1" onkeyup="written(this.id);" placeholder="Tax Percentage"value="<?php echo $row[2];?>">
                                                                                        <!-- <span id="tax_percentage_error" style="color:red;">Tax Percentage is Required </span> -->
                                                                                    </div>
                                                                                </div>

                                                                               

                                                                                <!-- <div class="form-group row">
                                                                                    <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                                                                    
                                                                                    <div class="col-md-4">
                                                                                    <?php 
                                                                                        // if($row[12] == 1 )
                                                                                        // { 
                                                                                            ?>
                                                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                            <input type="radio" name="status" id="active" value="1" checked>
                                                                                            <label for="input-radio-15">Active</label>
                                                                                        </div>
                                                                                        <?php
                                                                                        // }
                                                                                        // else{
                                                                                            ?>
                                                                                        
                                                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                            <input type="radio" name="status" id="active" value="1">
                                                                                            <label for="input-radio-15">Active</label>
                                                                                        </div>
                                                                                        <?php
                                                                                        // }
                                                                                        // if($row[12] == 0 )
                                                                                        // {
                                                                                            ?>
                                                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                            <input type="radio" name="status" id="inactive" value="0" checked>
                                                                                            <label for="input-radio-16">In Active</label>
                                                                                        </div>
                                                                                        <?php
                                                                                        // }
                                                                                        // else{
                                                                                        ?>
                                                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                            <input type="radio" name="status" id="inactive" value="0">
                                                                                            <label for="input-radio-16">In Active</label>
                                                                                        </div>
                                                                                        <?php 
                                                                                        // } 
                                                                                        ?>


                                                                                    </div>
                                                                                </div> -->



                                                                                <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                                                                        <?php 
                                                                                            if($row[12] == 1 )
                                                                                            {?>
                                                                                                <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                                                    <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" checked>&nbsp; Active
                                                                                                </div>
                                                                                        <?php
                                                                                            }
                                                                                            else{
                                                                                                ?>
                                                                                                <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                                                    <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;"  value="1" >&nbsp; Active
                                                                                                </div>
                                                                                                <?php
                                                                                            }
                                                                                            if($row[12] == 0 )
                                                                                            {
                                                                                                ?>
                                                                                                <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                                                    <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" checked>&nbsp; InActive
                                                                                                </div>
                                                                                                <?php

                                                                                            }
                                                                                            else{

                                                                                            
                                                                                        
                                                                                        ?>
                                                                                        
                                                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                                                            <input type="radio" class="form-control " name="status" id="inactive" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="0" >&nbsp; InActive
                                                                                        </div>
                                                                                            <?php } ?>
                                                                                </div>
                                                                        
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control" for="remark">Remark</label>
                                                                        <div class="col-md-8">
                                                                            <textarea style="height: 150px;" id="remark" rows="3" class="form-control" name="remark"  onkeyup="written(this.id);" placeholder="Remark"><?php echo $row[3];?></textarea>
                                                                            <!-- <span id="remark_error" style="color:red;">Remark is Required</span> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions right">
                                                        <button type="button" class="btn btn-warning mr-1">
                                                            <i class="ft-x"></i> Cancel
                                                        </button>
                                                    
                                                        <button type="button" class="btn btn-primary" name="addRow" id="" onclick="submit_data();">
                                                            <i class="fa fa-check-square-o" ></i> Save
                                                        </button>
                                                    </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php include('../../partials/footer.php');?>

<script>
    // function check(e,value){
    // //Check Charater
    //     var unicode=e.charCode? e.charCode : e.keyCode;
    //     if (value.indexOf(".") != -1)if( unicode == 46 )return false;
    //     if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
    //     }
    //     function checkLength(len,ele){
    //     var fieldLength = ele.value.length;
    //     if(fieldLength <= len){
    //         return true;
    //     }
    //     else
    //         {
    //         var str = ele.value;
    //         str = str.substring(0, str.length - 1);
    //         ele.value = str;
    //         }
    //     }
        document.getElementById("tax_percentage1").onkeyup = function() {
        var input = parseInt(this.value);
        if (input < 0 || input > 100)
        $.toast({
            heading: 'Error',
            text: 'Percentage Value should be between 0 - 100',
            showHideTransition: 'slide',
            position: 'top-right',
            hideAfter: 5000,
            icon: 'error'
        })
       // alert("Percentage Value should be between 0 - 100");
        return;
        }
</script>
<script>
$(document).ready(function()
{
    //hide all error span
  
//   document.getElementById("effective_date_error").style.display = "none";
//   document.getElementById("tax_name_error").style.display = "none";
//   document.getElementById("tax_percentage_error").style.display = "none";
//   document.getElementById("remark_error").style.display = "none";

  ///////////////////////////
});
  function submit_data()
{
//   alert("submit");

  var effective_date = document.getElementById("effective_date").value;
  var tax_name = document.getElementById("tax_name").value;
  var tax_percentage1 = document.getElementById("tax_percentage1").value;
//   alert("tax_percentage"+tax_percentage1);
  var remark = document.getElementById("remark").value;

if(effective_date!="" && tax_name!="" && tax_percentage1!="")
{
    $.ajax(
          {

          url: "../../api/tax/update_tax.php",
          type: 'POST',
          data : $('#form1').serialize() +'&edit_id='+<?php echo $edit_id;?>,
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              if(data == "1")
              {
                // alert("Tax Updated!");
                // window.location.href="view_tax.php";
                $.toast({
                            heading: 'Success',
                            text: 'Tax Updated!',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'success'
                        })
                        setTimeout(() => {
                            window.location.href = "view_tax.php";    
                        }, 5000);
              }
              else
              {
                  //alert("Please Enter Valid Details");
                  $.toast({
                            heading: 'Error',
                            text: 'Something Went Wrong',
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
        if(effective_date == "")
        {
            //document.getElementById("effective_date_error").style.display = "block";
            $.toast({
                            heading: 'Error',
                            text: 'Effective Date Require',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
        }
        if(tax_name == "")
        {
            //document.getElementById("tax_name_error").style.display = "block";
            $.toast({
                            heading: 'Error',
                            text: 'Tax Name Require',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
        }
        if(tax_percentage1 == "")
        {
            //document.getElementById("tax_percentage_error ").style.display = "block";
            $.toast({
                            heading: 'Error',
                            text: 'Tax Percentage Require',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            hideAfter: 5000,
                            icon: 'error'
                        })
        }
    }
}
</script>
<?php
}
?>