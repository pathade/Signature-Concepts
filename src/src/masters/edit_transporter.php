<?php include('../../partials/header.php');?>
<?php 

$edit_id = $_GET['id'];
$sql_charges="SELECT * FROM mstr_transporter where t_id_pk='$edit_id'";
$result_charges = mysqli_query($db, $sql_charges);
while ($row=mysqli_fetch_row($result_charges))
{

?>

<style>
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
	
<!-- <form > -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Edit Transporter</h4>
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
                                    <form class="form form-horizontal" method="post" id="form1" data-toggle="validator" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" role="form">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 text" for="userinput1">T Id </label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" readonly id="t_id" name="t_id" value="<?php echo $_GET['id'] ?>">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        $sql = "SELECT * FROM mstr_transporter WHERE t_id_pk='".$_GET['id']."'";
                                                        $result = mysqli_query($db,$sql);
                                                        $row = mysqli_fetch_array($result);
                                                        $_SESSION['UpdateTVid']=$row['t_id_pk'];

                                                        ?>

                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="bank_name" >Type </label>
                                                        
                                                        <?php 
                                                            if($row[6] == 1 )
                                                            { ?>
                                                            <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="transporter_type" id="transporter" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; 
                                                            <label class="label-control" for="active">Transporter</label>
                                                        </div>
                                                        <?php
                                                            }
                                                            else{
                                                                ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="transporter_type" id="transporter" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" >&nbsp; 
                                                            <label class="label-control" for="active">Transporter</label>
                                                        </div>
                                                        <?php
                                                            }
                                                            if($row[6] == 0 )
                                                            {
                                                                ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="transporter_type" id="courier" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" checked>&nbsp; 
                                                            <label class="label-control" for="inactive">Courier</label>
                                                        </div>
                                                        <?php
                                                            }
                                                            else{
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="transporter_type" id="courier" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;">&nbsp; 
                                                            <label class="label-control" for="inactive">Courier</label>
                                                        </div>
                                                        <?php } 
                                                            ?>
                                                    </div>
                                               

                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="bank_name" >Name <span class="text-danger">*<span></label>
                                                        <div class="col-md-10 divcol">
                                                            <input type="text" class="form-control"  placeholder="Name" name="name" id="name" value="<?php echo $row[1];?>">
                                                            <!-- <div id="name_error">
                                                                <span class="alert alert-danger p-0">Name is Require</span> 
                                                            </div> -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="acc_no" >Address <span class="text-danger">*<span></label>
                                                        <div class="col-md-10 divcol">
                                                        <input type="text" class="form-control"  placeholder="Address" name="address" id="address" value="<?php echo $row[2];?>"/>
                                                        <!-- <div id="account_no_error">
                                                            <span class="alert alert-danger p-0">Address is Require</span> 
                                                        </div> -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="bank_address" >Contact Person <span class="text-danger">*<span></label>
                                                        <div class="col-md-10 divcol">
                                                            <textarea type="text" class="form-control"  placeholder="Contact Person" name="cp" id="cp"><?php echo $row[7];?></textarea>
                                                            <!-- <div id="address_error">
                                                                <span class="alert alert-danger p-0">Contact Person Require</span> 
                                                            </div> -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="phone_no1">Phone No <span class="text-danger">*<span></label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control"  placeholder="0" name="phone_no1" id="phone_no1" value="<?php echo $row[3];?>"/>
                                                            <!-- <div id="phone_no1_error">
                                                                <span class="alert alert-danger p-0">Phone No Require</span> 
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="phone_no2">Mobile No <span class="text-danger">*<span></label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control"  placeholder="0" name="phone_no2" id="phone_no2" value="<?php echo $row[4];?>"/>
                                                            <!-- <div id="phone_no2_error">
                                                                <span class="alert alert-danger p-0">Phone No Require</span> 
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="ifsc_code">PAN <span class="text-danger">*<span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"  placeholder="Pan" name="pan" id="pan" value="<?php echo $row[5];?>"/>
                                                            <!-- <div id="ifsc_error">
                                                                <span class="alert alert-danger p-0">PAN Require</span> 
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" >Status</label>
                                                        <?php 
                                                            if($row[8] == 1 )
                                                            { ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; 
                                                            <label class="label-control" for="active">Active</label>
                                                        </div>
                                                        <?php
                                                            }
                                                            else{
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="status" id="active" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1">&nbsp; 
                                                            <label class="label-control" for="active">Active</label>
                                                        </div>
                                                        <?php
                                                        }
                                                        if($row[8] == 0 )
                                                        {
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="status" id="inactive" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" checked>&nbsp; 
                                                            <label class="label-control" for="inactive">Inactive</label>
                                                        </div>
                                                        <?php
                                                            }
                                                            else{
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="status" id="inactive" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;">&nbsp; 
                                                            <label class="label-control" for="inactive">Inactive</label>
                                                        </div>
                                                            <?php } ?>


                                                    </div>
                                                </div>
                                                <!-- <hr> -->
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="phone_no1">Vehicle Number No</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"  placeholder="Vehicle Number" name="vehicle_number" id="vehicle_number" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="phone_no2">Vehicle Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"  placeholder="Vehicle Name" name="vehicle_name" id="vehicle_name" />

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="ifsc_code">Description</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"  placeholder="Description" name="des" id="des" />
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group row">
                                                        <label class="col-md-3 label-control" >Status</label>
                                                        <?php 
                                                        if($row[12] == 1 )
                                                        { ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="vstatus" id="vactive_status" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" checked>&nbsp; 
                                                            <label class="label-control" for="active">Active</label>
                                                        </div>
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="vstatus" id="vactive_status" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" value="1" >&nbsp; 
                                                            <label class="label-control" for="active">Active</label>
                                                        </div>
                                                        <?php
                                                        }
                                                        if($row[12] == 0 )
                                                        {
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="vstatus" id="vinactive_status" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;" checked>&nbsp; 
                                                            <label class="label-control" for="inactive">Inactive</label>
                                                        </div>
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                        <div class="col-md-4" style="display: flex;font-size: 16px;">
                                                            <input type="radio" class="form-control " name="vstatus" id="vinactive_status" value="0" style="height: calc(2.75rem + -23px);width: 20px;margin-top:3px;">&nbsp; 
                                                            <label class="label-control" for="inactive">Inactive</label>
                                                        </div>
                                                        <?php }
                                                            ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions center">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Reset
                                            </button>
                                        
                                            <button type="button" class="btn btn-primary" name="addRow" id="addRow">
                                                <i class="fa fa-check-square-o" ></i> Add Row
                                            </button>
                                        </div>
                                        <!-- <hr/> -->
                                        <div class="row m-1">
                                            <div class="table-responsive">
                                            <table id="tbl" class="table display compact nowrap">
                                                <tbody>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>ID</th>
                                                        <th>Vehicle Number</th>
                                                        <th>Vehicle Name</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                </tbody id="tbody">
                                            </table>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-actions right">
                                            
                                            <button type="button" name="add_bank" class="btn btn-primary" onclick="submit_date();">
                                                <i class="fa fa-check-square-o"></i> Save
                                            </button>
                                            
                                            <button type="reset" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- </form> -->
            </section>
        </div>
    </div>
</div>
<?php include('../../partials/footer.php');?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


<script language="javascript">
var table="";
$(document).ready(function()
{
  
  
    var UpdateTVid='<?php echo $_SESSION['UpdateTVid']; ?>';

    // alert(UpdateTVid);
    table = $('#tbl').DataTable( {

    searching:true,
    
    ajax: {
            "url": "../../api/transporter/get_tv_table.php",
            "type": "POST",
            data : 
             {
             'tv_id' : UpdateTVid
             },
          
     
           },
        deferRender: true,
           
        "columnDefs": 
        [ 
          
        //   {
        //       "targets": 1,
        //       "data": null,
        //       "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn action-icon mdi mdi-delete\"></button>"
        //   }
          {
              "targets": 1,
              "data": null,
              "defaultContent": "<button type=\"button\" name=\"delete\" class=\"btn btn-danger btn-sm\"><i class='fa fa-trash' aria-hidden='true'></i></button>"
          } 
        ],
    destroy:true,
  });


        //hide all error span

        // document.getElementById("name_error").style.display = "none";
        // document.getElementById("account_no_error").style.display = "none";
        // document.getElementById("address_error").style.display = "none";
        // document.getElementById("phone_no1_error").style.display = "none";
        // document.getElementById("phone_no2_error").style.display = "none";
        // document.getElementById("ifsc_error").style.display = "none";
        ///////////////////////////
});


function submit_date()
{
    // console.log('submit data');
    var t_id = document.getElementById('t_id').value;
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var cp = document.getElementById("cp").value;
    var phone_no1 = document.getElementById("phone_no1").value;
    var phone_no2 = document.getElementById("phone_no2").value;
    var pan = document.getElementById("pan").value;
    // var transporter_type = document.getElementById("transporter_type").value;
    // var status = document.getElementById("status").value;
    var expression = /^[0]*[789]{1}[0-9]{9}$/;
// alert(t_id);
    // Add table data to JS array

    var rawItemArray = [];
    var count=table.rows().count();               
    var i=0;
  
  table.rows().eq(0).each( function ( index ) 
  { 
        var row = table.row( index );
        var data = row.data();
        var t_id_fk = table.cell(i,2).nodes().to$().find('p').text();
        var vehicle_number= table.cell(i,3).nodes().to$().find('input').val();
        var vehicle_name= table.cell(i,4).nodes().to$().find('input').val();
        var Description= table.cell(i,5).nodes().to$().find('input').val();
        var v_status=table.cell(i,6).nodes().to$().find('input').val();


      rawItemArray.push({
        t_id_fk : t_id_fk,
        vehicle_number : vehicle_number,
        vehicle_name:vehicle_name,  
        Description:Description,
        v_status:v_status
      });

      i++;
  });

  var newrawItemArray = JSON.stringify(rawItemArray);
    if(name!="" && address!="" && pan!="" && phone_no1!="" && expression.test(phone_no1))
    {
        //alert("hiiiiiiiiiiiiii");
        $.ajax(
        {
            url: "../../api/transporter/edit_transporter.php",
            type: 'POST',
            // "dataSrc": ""
            data : 
             $('#form1').serialize() + "&rawItemArray=" + newrawItemArray +'&t_id='+<?php echo $edit_id;?>,
            
            dataType:'text',  
            success: function(data)
            { 
                console.log(data);
                if(data == "1")
                {
                    $.toast({
                    heading: 'Success',
                    text: 'Transporter Edited',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                    window.location.href = 'view_transporter.php';    
                }, 5000);
                
                }
                else
                {
                    alert("Please Enter Valid Details");
                }
            
            },
        });
    }
    else
    {
        //alert("Byeee");
        if(name == "")
        {
            // document.getElementById("name_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Name Require..!!',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
            
        }
        else 
            document.getElementById("name_error").style.display = "none";

        if(address == "")
        {
            //document.getElementById("account_no_error").style.display = "block";
            //return false;
            $.toast({
                        heading: 'Error',
                        text: 'Address Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        else 
            document.getElementById("account_no_error").style.display = "none";

        if(cp == "")
        {
            // document.getElementById("address_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Contact Person Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })

        }
        else 
            document.getElementById("address_error").style.display = "none";

        if(phone_no1 == "" || !expression.test(phone_no1))
        {
            // document.getElementById("phone_no1_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Phone1 Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        else
            document.getElementById("phone_no1_error").style.display = "none";

        if(phone_no2 == "" || !expression.test(phone_no2))
        {
            // document.getElementById("phone_no2_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'Phone2 Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        else
            document.getElementById("phone_no2_error").style.display = "none";

        if(pan == "")
        {
            // document.getElementById("ifsc_error").style.display = "block";
            // return false;
            $.toast({
                        heading: 'Error',
                        text: 'PAN Require',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        hideAfter: 5000,
                        icon: 'error'
                    })
        }
        else
            document.getElementById("ifsc_error").style.display = "none";
        }
   // }
    
        
}
</script>

<?php } ?>