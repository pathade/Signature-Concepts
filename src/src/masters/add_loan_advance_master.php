<?php include('../../partials/header.php');?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body"><!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">Loan Advance Master</h4>
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
                                                                                    <label class="col-md-3 label-control" for="userinput1">Name<span style="color:red;"> *</span></label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                                                                                        <!-- <span id="name_error" style="color:red;"></span> -->
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 label-control" for="remark">Address<span style="color:red;"> *</span></label>
                                                                                    <div class="col-md-8">
                                                                                        <textarea style="height: 110px;" id="address" rows="3" class="form-control" name="address" placeholder="Address"></textarea>
                                                                                        <!-- <span id="address_error" style="color:red;">Address is Required</span> -->
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1" >Phone Number<span style="color:red;"> *</span></label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="number"class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number">
                                                                                        <!-- <span id="phone_number_error" style="color:red;">Phone Number is Required </span> -->
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 label-control" for="userinput1">Email Id</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" placeholder="Email Id" name="email" id="email">
                                                                                        <!-- <span id="email_error" style="color:red;"></span> -->
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 label-control" for="userinput1">City<span style="color:red;"> *</span></label>
                                                                                    <div class="col-md-8">
                                                                                        <select class="select2 form-control" id="city" name="city">
                                                                                            <optgroup>  
                                                                                                <option value="pune">Pune</option>
                                                                                                <option value="mumbai">Mumbai</option>
                                                                                                <option value="hadapsar">Hadapsar</option>
                                                                                            </optgroup>
                                                                                        </select>
                                                                                        <!-- <span id="city_error" style="color:red;">Branch is Required</span> -->
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 label-control" for="userinput1">Contact person</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control" placeholder="Contact person" name="contact_person" id="contact_person">
                                                                                        <!-- <span id="contact_person_error" style="color:red;"></span> -->
                                                                                    </div>
                                                                                </div>

                                                                                


                                                                                
                                                                            </div>

                                                                            <div class="col-md-6">


                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1">Branch</label>
                                                                                <div class="col-md-8">
                                                                                    <select class="select2 form-control" id="branch" name="branch">
                                                                                        <optgroup>  
                                                                                            <option value="signature-concept-llp">Signature Concept LLP</option>
                                                                                            <option value="nks-aromas">NKS Aromas</option>
                                                                                            <option value="stn">STN</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                    <!-- <span id="branch_error" style="color:red;">Branch is Required</span> -->
                                                                                </div>
                                                                            </div>  

                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1">Ledger Balance <span style="color:red;"> *</span></label>
                                                                                <div class="col-md-8">
                                                                                    <input type="number" class="form-control" placeholder="Ledger Balance" name="ledger_balance" id="ledger_balance" >
                                                                                    <!-- <span id="ledger_balance_error" style="color:red;"></span> -->
                                                                                </div>
                                                                            </div> 

                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1">Check Name<span style="color:red;"> *</span></label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" placeholder="Check Name" name="check_name" id="check_name">
                                                                                    <!-- <span id="check_name_error" style="color:red;"></span> -->
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1">PAN Number</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" placeholder="PAN Number" name="pan_number" id="pan_number" >
                                                                                    <!-- <span id="pan_number_error" style="color:red;"></span> -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1" >Contact Number</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="number"class="form-control" name="contact_number" id="contact_number"  placeholder="Contact Number">
                                                                                        <!-- <span id="contact_number_error" style="color:red;">Contact Number is Required </span> -->
                                                                                    </div>
                                                                            </div>

                                                                            <!-- <div class="form-group row">
                                                                                <label class="col-md-3 label-control" for="userinput1">TIN Number</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" placeholder="TIN Number" name="tin_number" id="tin_number" onkeyup="written(this.id);">
                                                                                    <span id="tin_number_error" style="color:red;"></span>
                                                                                </div>
                                                                            </div> -->

                                                                           

                                                                            <div class="form-group row mt-2">
                                                                                <label class="col-md-3 label-control" for="userinput1" >Status</label>
                                                                                <div class="col-md-4">
                                                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                        <input type="radio" name="status" id="active" value="1" checked>
                                                                                        <label for="input-radio-15">Active</label>
                                                                                    </div>
                                                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                                                        <input type="radio" name="status" id="inactive" value="0">
                                                                                        <label for="input-radio-16">In Active</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                                
                                                                    </div>
                                                                        
                                                                       
                                                                </div>
                                                                
                                                            </div>
                                                    <div class="form-actions right">
                                                        <button type="button" class="btn btn-warning mr-1">
                                                            <i class="ft-x"></i> Cancel
                                                        </button>
                                                    
                                                        <button type="button" class="btn btn-primary" name="addRow" id="btn" onclick="submit_data();">
                                                            <i class="fa fa-check-square-o" ></i> Save
                                                        </button>
                                                    </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <br />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php include('../../partials/footer.php');?>
<script>
$(document).ready(function()
{
    //hide all error span
  
//   document.getElementById("name_error").style.display = "none";
//   document.getElementById("address_error").style.display = "none";
//   document.getElementById("phone_number_error").style.display = "none";
//   document.getElementById("email_error").style.display = "none";
//   document.getElementById("city_error").style.display = "none";
//   document.getElementById("contact_person_error").style.display = "none";
//   document.getElementById("branch_error").style.display = "none";
//   document.getElementById("ledger_balance_error").style.display = "none";
//   document.getElementById("check_name_error").style.display = "none";
//   document.getElementById("pan_number_error").style.display = "none";
// //   document.getElementById("tin_number_error").style.display = "none";
//   document.getElementById("contact_number_error").style.display = "none";

  ///////////////////////////
});
  function submit_data()
{
 // alert("submit");

//   var tax_percentage1 = document.getElementById("tax_percentage1").value;
//   alert("tax_percentage"+tax_percentage1);

  var name = document.getElementById("name").value;
  var address = document.getElementById("address").value;
  var phone_number = document.getElementById("phone_number").value;
  var email = document.getElementById("email").value;
  var city = document.getElementById("city").value;
  var contact_person = document.getElementById("contact_person").value;
  var branch = document.getElementById("branch").value;
  var ledger_balance = document.getElementById("ledger_balance").value;
  var check_name = document.getElementById("check_name").value;
  var pan_number = document.getElementById("pan_number").value;
  var contact_number = document.getElementById("contact_number").value;

if (name != "" && address != "" && phone_number != "" && city != "" && ledger_balance != "" && check_name != ""
    ) {
  $.ajax(
          {

          url: "../../api/loan_advance_master/add_loan_advance_master.php",
          type: 'POST',
          data : $('#form1').serialize() ,
          dataType:'text',  
          success: function(data)
          { 
              console.log("console data is:"+data);
              if(data == "1")
              {
                $.toast({
                    heading: 'Success',
                    text: 'Loan Advance Added Successfully...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'success'
                })
                setTimeout(() => {
                    window.location.href="view_loan_advance.php"; 
                }, 5000);
                $('#btn').attr('disabled', true);
                // alert("Loan Advance Master Added!");
                // window.location.href="view_loan_advance_master.php";
              }
              else
              {
                $.toast({
                    heading: 'Error',
                    text: 'Something went wrong...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
                //   alert("Please Enter Valid Details");
              }
          
          },
          
          });
        }
        else {
      if(name == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'Name is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //  document.getElementById("name_error").style.display = "block";
      }
      if(address == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'Address is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
       //   document.getElementById("address_error").style.display = "block";
      }
      if(phone_number == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'Phone Number is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //  document.getElementById("phone_number_error").style.display = "block";
      }
    //   if(email == "")
    //   {
    //     $.toast({
    //                 heading: 'Error',
    //                 text: 'Email is Required...!!',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //      // document.getElementById("email_error").style.display = "block";
    //   }
      if(city == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'City is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
         // document.getElementById("city_error").style.display = "block";
      }
 
      if(ledger_balance == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'Ledger Balance is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
         // document.getElementById("ledger_balance_error").style.display = "block";
      }
      if(check_name == "")
      {
        $.toast({
                    heading: 'Error',
                    text: 'Check Name is Required...!!',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    hideAfter: 5000,
                    icon: 'error'
                })
        //  document.getElementById("check_name_error").style.display = "block";
      }
    //   if(pan_number == "")
    //   {
    //     $.toast({
    //                 heading: 'Error',
    //                 text: 'PAN Name is Required...!!',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //      // document.getElementById("pan_number_error").style.display = "block";
    //   }
    //   if(tin_number == "")
    //   {
    //       document.getElementById("tin_number_error ").style.display = "block";
    //   }
    //   if(contact_number == "")
    //   {
    //     $.toast({
    //                 heading: 'Error',
    //                 text: 'Contact Number is Required...!!',
    //                 showHideTransition: 'slide',
    //                 position: 'top-right',
    //                 hideAfter: 5000,
    //                 icon: 'error'
    //             })
    //      // document.getElementById("contact_number_error").style.display = "block";
    //   }  
    } 

}
</script>
