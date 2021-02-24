<?php include('../../partials/header.php');?>
<?php include('../../database/dbconnection.php');?>
<?php $flag = $_SESSION['flag']; ?>
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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Cheque</h4>
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
                <form class="form form-horizontal" method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="chequeform">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="userinput1">Bank Name <span style="color:red;"> *</span></label>
                            <div class="col-md-9">
                              <select class="select2 form-control block" id="bank_name" class="select2" onchange="getAccountNo()" data-toggle="select2" name="bank_name">
                                <?php
                                    $option="<option value=''>Select Bank</option>";
                                    echo $option;
                                    if($flag== 0) {
                                    $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank where flag='0' and status='1' order by bank_name asc";  // Use select query here
                                    }
                                    else {
                                        $sql =  "SELECT distinct bank_name,bank_idpk FROM mstr_bank where flag='1' and status='1' order by bank_name asc";
                                    }
                                    $result = mysqli_query($db, $sql);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $option="<option value='".$row["bank_idpk"]."'>".$row['bank_name']."</option>";
                                        echo $option;
                                    }
                                ?>  												
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="userinput1">Account No <span style="color:red;"> *</span></label>
                          <div class="col-md-9">
                            <select class="select2 form-control block" id="account_no" class="select2" data-toggle="select2" name="account_no" data-placeholder="Select Account No" required="">
                                                    <!-- -->
                            </select>
                            <span id="type_error" style="color:red;"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="userinput1">From Series <span style="color:red;"> *</span></label>
                          <div class="col-md-9">
                            <input type="text" id="from_series" class="form-control " placeholder="" name="from_series" >
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="userinput1" >To Series</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control"  placeholder="" name="to_series" id="to_series">
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
                                        <th></th>
                                          <th>ID</th>
                                          <th>Bank</th>
                                          <th>Account No.</th>
                                          <th>From Series</th>
                                          <th>To Series</th>
                                          <th>Current Cheque No</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody id="tbody"></tbody>
                              </table>
                          </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions right">
                    <button type="button" class="btn btn-primary" name="add" onClick="save_data()">
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
    </section>
  </div>
</div>
</div>
<?php include('../../partials/footer.php');?>
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
  function save_data()
  {
    var bank_name = document.getElementById("bank_name").value;
    var account_no = document.getElementById("account_no").value;
    var from_series = document.getElementById("from_series").value;
    var to_series = document.getElementById("to_series").value;
    if(bank_name != '' && account_no != '' && from_series != ''){
    $.ajax(
            {

            url: "../../api/bank/add_cheque.php",
            type: 'POST',
            data : "bank_name=" + bank_name + '&account_no='+ account_no + '&from_series=' + from_series + '&to_series=' +to_series,
            dataType:'text',  
            success: function(data)
            { 
                console.log("console data is:"+data);
                if(data == "1")
                {
                  $.toast({
                    heading: 'Success',
                    text: 'Cheque Added Successfully...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                  window.location.href="view_cheque.php";
                }, 5000);
                  // alert("Cheque Added!");
                  // window.location.href="view_cheque.php";
                }
                else
                {
                    // alert("Please Enter Valid Details");
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
          else {
            $.toast({
                    heading: 'Error',
                    text: 'Please Select Bank and Account No. and From Series..',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
                //alert("Please Select Bank and Account No..");
          }
  }
</script>
<script>
$(document).ready(function()
{
  table = $('#tbl').DataTable( {
        searching:true,
        ajax: 
        {
            "url": "../../api/bank/get_cheque_data.php",
            "type": "POST",
            data : 
             {
             //'edit_id' : edit_id
             },
        },
        deferRender: true,
        "columnDefs": 
        [
          {
              "targets": 0,
              "data": null,
              "defaultContent": ""
          }
        ],
        destroy:true,
  });
});
</script>