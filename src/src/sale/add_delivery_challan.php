<?php include('../../partials/header.php');?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body"><!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;"><i class="fa fa-truck" aria-hidden="true"></i>New Delivery Challan</h4>
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
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="userinput1" style="color:red;">Customer Name *</label>
                                                        <div class="col-md-7">
                                                        <select class="select2 form-control block" id="Salutation" class="select2" data-toggle="select2" >
                                                            <option value="" disabled selected>Select Customer </option>
                                                            <option value="PCS">Aroma Perfumes</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="userinput1" style="color:red;">Delivery Challan#*</label>
                                                        <div class="col-md-3">
                                                        <input type="text" class="form-control " placeholder="EST-000002" name="company_name" id="company_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="userinput1" >Reference#</label>
                                                        <div class="col-md-3">
                                                        <input type="text" class="form-control " placeholder="" name="company_name" id="company_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="userinput1" style="color:red;">Delivery Challan Date *</label>
                                                        <div class="col-md-3">
                                                        <input type="date" class="form-control " placeholder="" name="company_name" id="company_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-2 label-control" for="userinput1" style="color:red;">Challan Type *</label>
                                                        <div class="col-md-3">
                                                        <select class="select2 form-control block" id="Salutation" class="select2" data-toggle="select2" >
                                                            <option value="" disabled selected>Choose a proper challan type</option>
                                                            <option value="" disabled selected>Choose a proper challan type</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        
                                                        <div class="col-md-12 table-responsive">
                                                            
                                                            <table id="tblCustomers" cellpadding="0" cellspacing="0" border="1" style="border: beige;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item Details</th>
                                                                        <th>Quantity</th>
                                                                        <th>Rate</th>
                                                                        <th>Discount</th>
                                                                        <th>Amount</th>
                                                                        <th>Add</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <td><input type="text" id="txtSalutation" /></td>
                                                                        <td><input type="text" id="txtFirstName" /></td>
                                                                        <td><input type="text" id="txtLastName" /></td>
                                                                        <td><input type="text" id="txtEmail" /></td>
                                                                        <td><input type="text" id="txtWorkPhone" /></td>
                                                                        <td><input type="button" onclick="Add()" value="Add" /></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-5">
                                                            <div class="form-group row">
                                                                <!-- <label class="col-md-2 label-control" for="userinput1">Customer Notes</label> -->
                                                                <div class="col-md-12">
                                                                Customer Notes
                                                                <textarea class="form-control" cols="5" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-10 label-control" for="userinput1">Subtotal</label>
                                                                    <div class="col-md-2">
                                                                        0.00
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-3">
                                                                        <input type="text" class="form-control " placeholder="" name="" id="company_name">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="text" class="form-control " placeholder="" name="" id="company_name">
                                                                    </div>
                                                                    <div class="col-md-5">

                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        0.00
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-10">
                                                                        <b>Total</b>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        0.00
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-8">
                                                            <div class="form-group row">
                                                                <!-- <label class="col-md-2 label-control" for="userinput1">Customer Notes</label> -->
                                                                <div class="col-md-12">
                                                                Terms & Conditions
                                                                <textarea class="form-control" cols="3" rows="3" placeholder="Enter the terms and conditions of your business to be displayed in your transaction"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-1"></div> -->
                                                        <div class="col-md-3">
                                                            Attach File(s) to Estimate
                                                       
                                                             <input type="file" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4> -->

                                        </div>

                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include('../../partials/footer.php');?>
            <script>

                function getStates()
                {
                    var cid = document.getElementById("comboBillingCountry");

                    document.getElementById("comboBillingState").length = 0;
                    $.ajax(
                    {
                        url: "../../api/global/get-states-by-country.php",
                        type: 'GET',
                        data : 
                        {
                        'country_id' : cid.value
                        },
                        dataType:'json',
                        success: function(data)
                        {
                        $.each(data, function(index) 
                        {
                            var newOption = new Option(data[index].text, data[index].id, false, false);
                            $('#comboBillingState').append(newOption).trigger('change.select2');
                        });
                        },
                        error : function(request,error)
                        {}
                    }
                    );
                }

                function getStates1()
                {
                    var chk = document.getElementById("chkSameAddress");
                    if(chk.checked != true)
                    {
                    var cid = document.getElementById("comboShippingCountry");    
                    document.getElementById("comboShippingState").length = 0;
                    $.ajax(
                        {
                        url: "../../api/global/get-states-by-country.php",
                        type: 'GET',
                        data : 
                        {
                            'country_id' : cid.value
                        },
                        dataType:'json',
                        success: function(data)
                        {
                            $.each(data, function(index) 
                            { 
                            var newOption = new Option(data[index].text, data[index].id, false, false);
                            $('#comboShippingState').append(newOption).trigger('change.select2');
                            });
                        },
                        error : function(request,error)
                        {}
                        }
                    );
                    }
                }

                function setSameAddress(chk)
                {
                    var saddr2 = document.getElementById("txtCustomerShippingAddressLine2");
                    var saddr3 = document.getElementById("txtCustomerShippingAddressLine3");
                    var saddr1 = document.getElementById("txtCustomerShippingAddressLine1");
                    var scity = document.getElementById("txtCustomerShippingCity");
                    var spin = document.getElementById("txtCustomerShippingPin");
                    alert(saddr2);
                    var scountry = document.getElementById("comboShippingCountry");
                    var sstate = document.getElementById("comboShippingState");

                    if(chk.checked == true)
                    {
                    var baddr1 = document.getElementById("txtCustomerBillingAddressLine1");
                    var baddr2 = document.getElementById("txtCustomerBillingAddressLine2");
                    var baddr3 = document.getElementById("txtCustomerBillingAddressLine3");
                    var bcountry = document.getElementById("comboBillingCountry");
                    var bstate = document.getElementById("comboBillingState");
                    var bcity = document.getElementById("txtCustomerBillingCity");
                    var bpin = document.getElementById("txtCustomerBillingPin");

                    saddr1.value = baddr1.value;
                    saddr2.value = baddr2.value;
                    saddr3.value = baddr3.value;
                    scity.value = bcity.value;;
                    spin.value = bpin.value;;

                    var temp = bcountry.value;
                    $('#comboShippingCountry').val(temp).trigger('change.select2');

                    var temp1 = bstate.value;
                    $.ajax(
                    {
                        url: "../../api/global/get-states-by-country.php",
                        type: 'GET',
                        data : 
                        {
                        'country_id' : temp
                        },
                        dataType:'json',
                        success: function(data)
                        {
                        $.each(data, function(index) 
                        {
                            if(data[index].id == temp1)
                            {
                            var newOption = new Option(data[index].text, data[index].id, true, true);
                            $('#comboShippingState').append(newOption).trigger('change.select2');
                            }
                            else
                            {
                            var newOption = new Option(data[index].text, data[index].id, false, false);
                            $('#comboShippingState').append(newOption).trigger('change.select2');
                            }
                        });
                        },
                        error : function(request,error)
                        {}
                    }
                    );

                
                    }
                    else
                    {
                    
                    }
                }
            
            </script>
            <script type="text/javascript">
                                                    window.onload = function () {
                                                        //Build an array containing Customer records.
                                                        var customers = new Array();
                                                        // customers.push(["John Hammond", "United States"]);
                                                        // customers.push(["Mudassar Khan", "India"]);
                                                        // customers.push(["Suzanne Mathews", "France"]);
                                                        // customers.push(["Robert Schidner", "Russia"]);
                                             
                                                        //Add the data rows.
                                                        for (var i = 0; i < customers.length; i++) {
                                                            AddRow(customers[i][0], customers[i][1],customers[i][2],customers[i][3],customers[i][4]);
                                                        }
                                                    };
                                             
                                                    function Add() {
                                                        var txtSalutation = document.getElementById("txtSalutation");
                                                        var txtFirstName = document.getElementById("txtFirstName");
                                                        var txtLastName = document.getElementById("txtLastName");
                                                        var txtEmail = document.getElementById("txtEmail");
														var txtWorkPhone = document.getElementById("txtWorkPhone");
														//var txtMobile = document.getElementById("txtMobile");
														
                                                        AddRow(txtSalutation.value,txtFirstName.value, txtLastName.value,txtEmail.value,txtWorkPhone.value);
                                                        txtSalutation.value = "";
                                                        txtFirstName.value = "";
                                                        txtLastName.value = "";
                                                        txtEmail.value = "";
														txtWorkPhone.value = "";
														txtMobile.value = "";
                                                    };
                                             
                                                    function Remove(button) {
                                                        //Determine the reference of the Row using the Button.
                                                        var row = button.parentNode.parentNode;
                                                        var name = row.getElementsByTagName("TD")[0].innerHTML;
                                                        if (confirm("Do you want to delete: " + name)) {
                                             
                                                            //Get the reference of the Table.
                                                            var table = document.getElementById("tblCustomers");
                                             
                                                            //Delete the Table row using it's Index.
                                                            table.deleteRow(row.rowIndex);
                                                        }
                                                    };
                                             
                                                    function AddRow(sr,name, country,fromdate,todate) {
                                                        //Get the reference of the Table's TBODY element.
                                                        var tBody = document.getElementById("tblCustomers").getElementsByTagName("TBODY")[0];
                                             
                                                        //Add Row.
                                                        row = tBody.insertRow(-1);

                                                        //Add sr cell.
                                                        var cell = row.insertCell(-1);
                                                        cell.innerHTML = txtSalutation.value;
                                             
                                                        //Add Name cell.
                                                        var cell = row.insertCell(-1);
                                                        cell.innerHTML = txtFirstName.value;
                                             
                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
                                                        cell.innerHTML = txtLastName.value;

                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
                                                        cell.innerHTML = txtEmail.value;

                                                        //Add Country cell.
                                                        cell = row.insertCell(-1);
														cell.innerHTML = txtWorkPhone.value;
														
														// cell = row.insertCell(-1);
                                                        // cell.innerHTML = txtMobile.value;
                                             
                                                        //Add Button cell.
                                                        cell = row.insertCell(-1);
                                                        var btnRemove = document.createElement("INPUT");
                                                        btnRemove.type = "button";
                                                        btnRemove.value = "Remove";
                                                        btnRemove.setAttribute("onclick", "Remove(this);");
														cell.appendChild(btnRemove);
														

                                                    }
                                                </script>