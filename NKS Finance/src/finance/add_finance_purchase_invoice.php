<?php include('../../partials/header.php');?>

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
	                <h4 class="card-title" id="horz-layout-colored-controls" style="font-size:40px;">New Purchase Invoice</h4>
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
	                    <form class="form form-horizontal" id="form" data-toggle="validator" role="purchase_invocie_form">
	                    	<div class="form-body">
                                <!-- <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4> -->
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Fin Yr</label>
                                                    <?php
                                                        if (date('m') > 6) {
                                                            $year = date('Y')."-".(date('Y') +1);
                                                        }
                                                        else {
                                                            $year = (date('Y')-1)."-".date('Y');
                                                        }
                                                        
                                                    ?>
                                                    <div class="col-md-9">
                                                    <select class="select2 form-control block" id="fin_yr" class="select2" data-toggle="select2" name="fin_yr" >
                                                        <option value="<?php echo $year; ?>" selected disabled><?php echo $year; ?></option>
                                                    </select>
                                                    </div>											
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Branch</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="branch" name="branch" readonly >
                                                            <option value="Signature Concepts LLP" disabled selected>Signature Concepts LLP </option>
                                                        </select>
                                                    </div>										
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                        <?php

                                                        $sql = "SELECT * FROM mstr_data_series where name='finance_purchase_invoice'";
                                                        $result = mysqli_query($db,$sql);
                                                        $row = mysqli_fetch_array($result);
                                                        ?>
                                                    <label class="col-md-3 label-control" for="userinput1">PI Id</label>
                                                    <div class="col-md-9">
                                                    <input type="text" id="pi_no" class="form-control " placeholder="" name="pi_no" readonly value="<?php echo $row['2']; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Supplier</label>
                                                    <div class="col-md-9">
                                                    <select class="select2 form-control block" id="supplier" class="select2" data-toggle="select2" name="supplier" onchange="getGrnNo(this.value)">
                                                        <option value="" selected disabled>Select</option>
                                                        <?php

                                                            $sql = "SELECT  * FROM mstr_supplier";
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bill Date</label>
                                                    <div class="col-md-9">
                                                        <input type="date" id="bill_date" class="form-control " name="bill_date" value="<?php echo date('Y-m-d');?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput1">Bill No</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="bill_no" class="form-control " name="bill_no">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-md-2 label-control" for="userinput1">Remarks</label>
                                                    <div class="col-md-10 divcol">
                                                        <textarea type="text" id="remark" rows="2" class="form-control " name="remark"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">PI Date</label>
                                            <div class="col-md-9">
                                                <input type="date" id="pi_date" class="form-control " name="pi_date" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">GRN No.</label>
				                        	<div class="col-md-9">
                                                <div id="grn_no" class="dc_box" name="grn_no" >
                                                </div>
                                            </div>
				                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Authorised By </label>
                                            <div class="col-md-9">
                                                <select class="form-control block" id="authorised_by" name="authorised_by">
                                                        <option value="" disabled selected>Select </option>
                                                        <option value="abcd">abcd</option>
                                                        <option value="abcd1">abcd1</option>
                                                        <option value="abcd">abcd2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group " style="text-align: center;">
                                            <button style="height: fit-content;" type="button" name="purchase_invoice_show" class="btn btn-primary" id="purchase_invoice_show" onclick="getGrnTable();">
                                                    <i class="fa fa-check-square-o"></i> Show
                                            </button>
                                        </div>
							</div>
                            <br />
                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        
                                                    <div class="table-responsive">
                                                    <table class="border-bottom-0 table table-hover" id="tbl" >
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>NO</th>
                                                                        <th>Final Product &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Type &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <!-- <th>Length &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;</th>
                                                                        <th>Breath &nbsp;  &nbsp;  &nbsp;  &nbsp; </th> -->
                                                                        <th>Size &nbsp;  &nbsp;  &nbsp; </th>
                                                                        <th>Qty &nbsp;  &nbsp;  &nbsp; </th>
                                                                        <th>Sqrft &nbsp;  &nbsp;  &nbsp;  &nbsp; </th>
                                                                        <th>Rate &nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Amount&nbsp;  &nbsp;  &nbsp;  &nbsp; </th>
                                                                        <th>Process Amt&nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Bill Disc&nbsp;  &nbsp;  &nbsp;  &nbsp;</th>
                                                                        <th>Bill Amt&nbsp;  &nbsp;  &nbsp;  &nbsp; </th>
                                                                        <th>Tax&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Tax Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Net Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Trans/Oct&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Italian Sqrft&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>Italian Sides&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>GST&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>CGST Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>SGST Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>IGST Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>CESS Per&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th>CESS Amt&nbsp;  &nbsp;  &nbsp;  &nbsp;  </th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-md-12 right-border">
                                                    <div class="form-group row">
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Total Qty</label>
												            <input type="text" class="form-control"  placeholder="0" name="total_qty" id="total_qty" readonly value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Total Sqft</label>
												            <input type="text" class="form-control"  placeholder="0" name="total_sqft" id="total_sqft" readonly value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Total Amt</label>
												            <input type="text" class="form-control"  placeholder="0" name="total_amt" id="total_amt" readonly value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Proc. Amt</label>
												            <input type="text" class="form-control"  placeholder="0" name="proc_amt" id="proc_amt" readonly value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1" >
                                                            <label class="label-control" for="userinput1" >Discount</label><br />
                                                            <input type="text" placeholder="0" name="discount_per" id="discount_per" style="height: calc(2.75rem + 12px);width: 70px;" value="0" onkeyup="get_discount_per_value(this.id);" />
                                                            <input type="text" placeholder="0" name="discount_amt" id="discount_amt" style="height: calc(2.75rem + 12px); width: 150px" value="0" onkeyup="get_discount_amt_value(this.id);" />
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Trans</label>
												            <input type="text" class="form-control"  placeholder="0" name="trans" id="trans" value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Unload</label>
												            <input type="text" class="form-control"  placeholder="0" name="unload" id="unload" value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Octroi</label>
												            <input type="text" class="form-control"  placeholder="0" name="octrioi" id="octroi" value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Gross Amt</label>
												            <input type="text" class="form-control"  placeholder="0" name="gross_amt" id="gross_amt" readonly value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1" >
                                                            <label class="label-control" for="userinput1" >Excise</label><br />
                                                            <input type="text" placeholder="0" name="excise_per" id="excise_per" style="height: calc(2.75rem + 12px);width: 70px;" value="0" />
                                                            <input type="text" placeholder="0" name="excise_amt" id="excise_amt" style="height: calc(2.75rem + 12px); width: 150px" value="0" />
                                                        </div>
                                                        <div class="col-md-3 mt-1" >
                                                            <label class="label-control" for="userinput1" >Ex EDU</label><br />
                                                            <input type="text" placeholder="0" name="exedu_per" id="exedu_per" style="height: calc(2.75rem + 12px);width: 70px;" value="0"  />
                                                            <input type="text" placeholder="0" name="exedu_amt" id="exedu_amt" style="height: calc(2.75rem + 12px); width: 150px" value="0"  />
                                                        </div>
                                                        <div class="col-md-3 mt-1" >
                                                            <label class="label-control" for="userinput1" >Ex H.EDU</label><br />
                                                            <input type="text" placeholder="0" name="exhedu_per" id="exhedu_per" style="height: calc(2.75rem + 12px);width: 70px;" value="0"  />
                                                            <input type="text" placeholder="0" name="exhedu_amt" id="exhedu_amt" style="height: calc(2.75rem + 12px); width: 150px" value="0" />
                                                        </div>
                                                        <div class="col-md-3 mt-1" >
                                                            <label class="label-control" for="userinput1" >Tax</label><br />
                                                            <input type="checkbox" name="tax_check" id="tax_check" style="height: 20px;width: 20px;"  />
                                                            <select style="height: calc(2.75rem + 12px); width: 150px" name="tax_select" id="tax_select">
                                                            <option value="18">18</option>
                                                            </select>
                                                            <input type="text" placeholder="0" name="tax_amt" id="tax_amt" style="height: calc(2.75rem + 12px); width: 70px" value="0"  />
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Freight</label>
												            <input type="text" class="form-control"  placeholder="0" name="freight" id="freight" value="0"/>
                                                        </div>
                                                        <div class="col-md-3 mt-1" >
                                                            <label class="label-control" for="userinput1" >Insurance</label><br />
                                                            <input type="text" placeholder="0" name="insurance_per" id="insurance_per" style="height: calc(2.75rem + 12px);width: 70px;" value="0" />
                                                            <input type="text" placeholder="0" name="insurance_amt" id="insurance_amt" style="height: calc(2.75rem + 12px); width: 150px" value="0" />
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Other +/-</label>
												            <input type="text" class="form-control"  placeholder="0" name="other" id="other" value="0" onkeyup="get_final_amount(this.value);"/>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 right-border">
                                                    <div class="form-group row">
                                                        <div class="col-md-9">
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label class="label-control" for="userinput1" >Net Amount</label>
												            <input type="text" class="form-control"  placeholder="0" name="net_amt" id="net_amt" value="0" style="background: #000;color: #1ec20a;"/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

	                        <div class="form-actions right">
								
								<button type="button" name="add_purchase_invoice" class="btn btn-primary" id="add_purchase_invoice" >
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

        window.setInterval(function()
        {
            var count=table.rows().count();


            var amount=0;
            var total_amount=0;
            var process_amount=0;
            var bill_discount_rs=0;
            var bill_discount_per=0;
            var totalqty=0;
            var totalsqft = 0;
            // var totaldisc = 0;
            // var gross = 0;
            // var tgross = 0;
            var tax_amt = 0;

            for(var i=0;i<count;i++)
            {
                // amount
                var col_amt=table.cell(i,8).nodes().to$().find('input').val()
                var amount= parseFloat(amount) +parseFloat(col_amt);

                // net amount
                var col_net_amt=table.cell(i,14).nodes().to$().find('input').val()
                var total_amount= parseFloat(total_amount) +parseFloat(col_net_amt);

                // process amount
                var col_pamt=table.cell(i,9).nodes().to$().find('input').val()
                var process_amount= parseFloat(process_amount) +parseFloat(col_pamt);

                // discount amt
                var col_disc=table.cell(i,11).nodes().to$().find('input').val()
                var bill_discount_rs= parseFloat(bill_discount_rs) +parseFloat(col_disc);

                // discount per
                var col_disc_per=table.cell(i,10).nodes().to$().find('input').val()
                var bill_discount_per= parseFloat(bill_discount_per) +parseFloat(col_disc_per);
                bill_discount_per = bill_discount_per.toFixed(4);
            
                // quantity
                var col_qty=table.cell(i,5).nodes().to$().find('input').val()
                var totalqty= parseInt(totalqty) +parseInt(col_qty);

                // sqfit
                var col_sqfit=table.cell(i,6).nodes().to$().find('input').val()
                var totalsqft= parseFloat(totalsqft) +parseFloat(col_sqfit);

                // tax
                var tax_amt = amount*18/100;

                // var tbldisc=table.cell(i,6).nodes().to$().find('input').val()
    
                // var totaldisc= parseFloat( totaldisc) +parseFloat(tbldisc);

                // var q = table.cell(i,3).nodes().to$().find('input').val();
                // var r =  table.cell(i,5).nodes().to$().find('input').val();
                // var gross = parseFloat(q) * parseFloat(r);
                // var tgross= parseFloat( tgross) +parseFloat(gross);

                // var tbl12 = table.cell(i, 12).nodes().to$().find('input').val();
                // var tax_amt = parseFloat(tax_amt) + parseFloat(tbl12);


            }

        
            document.getElementById('gross_amt').value=amount;
            document.getElementById('total_amt').value=total_amount;
            document.getElementById('proc_amt').value=process_amount;
            document.getElementById('discount_amt').value=bill_discount_rs;
            document.getElementById('discount_per').value=bill_discount_per;
            document.getElementById('total_qty').value=totalqty;
            document.getElementById('total_sqft').value=totalsqft;
            document.getElementById('tax_amt').value=tax_amt;
            // document.getElementById('disc_percent').value=totaldisc;
            // document.getElementById('gross_amt').value=tgross;
            // document.getElementById('tax_amount').value=tax_amt;
            // document.getElementById('final_total').value=amount;


        
        },1000
        );
    });
</script>


<script>

        $('#add_purchase_invoice').on('click', function(){
            // Add table data to JS array
            var rawItemArray = [];
            var count=table.rows().count();
            var i=0;
            table.rows().eq(0).each( function ( index ) 
            { 
                var row = table.row( index );
                var data = row.data();

                var grn_item_id =table.cell(i,1).nodes().to$().find('p').text(); 
                var item_id_fk =table.cell(i,2).nodes().to$().find('select').val();
                var product_type =table.cell(i,3).nodes().to$().find('p').text();
                var size=table.cell(i,4).nodes().to$().find('p').text();
                var quantity =table.cell(i,5).nodes().to$().find('input').val();
                var sqfit=table.cell(i,6).nodes().to$().find('input').val();
                var rate =table.cell(i,7).nodes().to$().find('input').val();
                var amount=table.cell(i,8).nodes().to$().find('input').val();
                var pro_amount=table.cell(i,9).nodes().to$().find('input').val();
                var bill_per=table.cell(i,10).nodes().to$().find('input').val();
                var bill_amt =table.cell(i,11).nodes().to$().find('input').val();
                var tax =table.cell(i,12).nodes().to$().find('input').val();
                var tax_amt =table.cell(i,13).nodes().to$().find('input').val();
                var net_amt =table.cell(i,14).nodes().to$().find('input').val();
                var trans_oct =table.cell(i,15).nodes().to$().find('input').val();
                var italian_sqfit =table.cell(i,16).nodes().to$().find('input').val();
                var italian_slides =table.cell(i,17).nodes().to$().find('input').val();
                var gst_per=table.cell(i,18).nodes().to$().find('input').val();
                var cgst=table.cell(i,19).nodes().to$().find('input').val();
                var sgst=table.cell(i,20).nodes().to$().find('input').val();
                var igst=table.cell(i,21).nodes().to$().find('input').val();
                var cess_per=table.cell(i,22).nodes().to$().find('input').val();
                var cess_amt=table.cell(i,23).nodes().to$().find('input').val();
                var grn_id=table.cell(i,24).nodes().to$().find('p').text();
            

                rawItemArray.push({
                    grn_item_id: grn_item_id,
                    item_id_fk : item_id_fk,
                    product_type : product_type,
                    size:size,
                    quantity:quantity,
                    sqfit:sqfit,
                    rate:rate,
                    amount:amount,
                    pro_amount:pro_amount,
                    bill_per:bill_per,
                    bill_amt:bill_amt,
                    tax:tax,
                    tax_amt:tax_amt,
                    net_amt:net_amt,
                    trans_oct:trans_oct,
                    italian_sqfit:italian_sqfit,
                    italian_slides:italian_slides,
                    gst_per:gst_per,
                    cgst:cgst,
                    sgst:sgst,
                    igst:igst,
                    cess_per:cess_per,
                    cess_amt:cess_amt,
                    grn_id: grn_id
                });
                i++;
            });
            //alert("posupp baher:"+posupp);
            var newRawItemArray = JSON.stringify(rawItemArray);
            // console.log(newRawItemArray);

            var fin_yr = document.getElementById('fin_yr').value;
            var branch = document.getElementById('branch').value;
            var pi_no = document.getElementById('pi_no').value;
            var pi_date = document.getElementById('pi_date').value;
            var supplier = document.getElementById('supplier').value;
            var bill_date = document.getElementById('bill_date').value;
            var bill_no = document.getElementById('bill_no').value;
            var authorised_by = document.getElementById('authorised_by').value;
            var remark = document.getElementById('remark').value;
            
            var total_qty = document.getElementById('total_qty').value;
            var total_sqfit = document.getElementById('total_sqft').value;
            var total_amt = document.getElementById('total_amt').value;
            var process_amt = document.getElementById('proc_amt').value;
            var disc_per = document.getElementById('discount_per').value;
            var disc_amt =document.getElementById('discount_amt').value;
            var trans_amt =document.getElementById('trans').value;
            var unload =document.getElementById('unload').value;
            var octroi =document.getElementById('octroi').value;
            var gross_amt =document.getElementById('gross_amt').value;
            var excise_per =document.getElementById('excise_per').value;
            var excise_amt =document.getElementById('excise_amt').value;
            var exedu_per =document.getElementById('exedu_per').value;
            var exedu_amt =document.getElementById('exedu_amt').value;
            var exhedu_per =document.getElementById('exhedu_per').value;
            var exhedu_amt =document.getElementById('exhedu_amt').value;
            var tax_select = document.getElementById('tax_select').value;
            var tax_amt = document.getElementById('tax_amt').value;
            var freight =document.getElementById('freight').value;
            var insurance_per =document.getElementById('insurance_per').value;
            var insurance_amt =document.getElementById('insurance_amt').value;
            var other =document.getElementById('other').value;
            var net_amt =document.getElementById('net_amt').value;
            
            $.ajax({
                url: '../../api/finance/add_fin_purchase_invoice.php',
                type: 'POST',
                data : {
                    "newRawItemArray": newRawItemArray,
                    "branch": branch,
                    "pi_no": pi_no,
                    "fin_yr": fin_yr,
                    "pi_date": pi_date,
                    "supplier": supplier,
                    "bill_date": bill_date,
                    "bill_no": bill_no,
                    "authorised_by": authorised_by,
                    "remark": remark,
                    "total_qty": total_qty,
                    "total_sqfit": total_sqfit,
                    "total_amt": total_amt,
                    "process_amt": process_amt,
                    "disc_per": disc_per,
                    "disc_amt": disc_amt,
                    "trans_amt": trans_amt,
                    "unload": unload,
                    "octroi": octroi,
                    "gross_amt": gross_amt,
                    "excise_per": excise_per,
                    "excise_amt": excise_amt,
                    "exedu_per": exedu_per,
                    "exedu_amt": exedu_amt,
                    "exhedu_per": exhedu_per,
                    "exhedu_amt": exhedu_amt,
                    "tax_select": tax_select,
                    "tax_amt": tax_amt,
                    "freight": freight,
                    "insurance_per": insurance_per,
                    "insurance_amt": insurance_amt,
                    "other": other,
                    "net_amt": net_amt
                },  
                success: function(data)
                { 
                    console.log(data);
                    if(data == "1")
                    {
                        // $.toast({
                        // heading: 'Success',
                        // text: 'Retail Order Added Sussesfully',
                        // showHideTransition: 'slide',
                        // position: 'top-right',
                        // hideAfter: 5000,
                        // icon: 'error'
                        // })
                        alert("Purchase Invoice Added!")
                        
                        // window.location.href="view_retail_tax_invoice.php";
                    }
                    else
                    {
                        alert("Please Enter Valid Details");
                    }
                
                },
                
            });

        });

    function getGrnNo(val)
    {
        $.ajax({
            url: '../../api/purchase/get_grn_no_for_pi.php',
            type: 'POST',
            data: { 'supplier': val },
            success: function (data) {
                console.log(data);
                $('#grn_no').html(data)
            }
        })
    }

    function getGrnTable()
    {
        var grn = document.querySelectorAll('#grn_check');
        var supplier = document.getElementById('supplier').value;
        if(supplier == '')
        {
            alert('select supplier');
            return;
        }
        for(i=0; i<grn.length; i++)
        {
            var cnt = 1;  
            if(grn[i].checked)
            {
                table.clear().draw();

                $.ajax({
                    type: "POST",
                    url:"../../api/purchase/get_grn_table_for_pi.php",
                    data : 
                    {
                        'grn_id' : grn[i].value,
                        'supplier': supplier

                    },
                    dataType:'json',

                    success:function(data){
                        
                    console.log(data);
                    // var cnt = 1;  
                    $.each(data, function(index) 
                    {
                         
                        var start=`<p>${cnt}</p>`;    
                        var grn_id=`<p class="d-none">${data[index].grn_id}</p>`;    
                        var id=`<p>${data[index].id}</p>`;
                        var final_product_code=`<select class="form-control"><option value="${data[index].item_id_pk}" selected>${data[index].final_product_code}</option></select>`;
                        var item_type=`<p>${data[index].item_type}</p>`;
                        // var length=`<p>${data[index].length}</p>`;
                        // var breadth=`<p>${data[index].breadth}</p>`;
                        var size=`<p>${data[index].size}</p>`;
                        var sqfit=`<input type="text" class="form-control" id="sqfit-${cnt}" value="${data[index].sqfit}" />`;
                        var act_quantity=`<input type="number" class="form-control" min=0 id="quantity-${cnt}" value="${data[index].act_quantity}" onkeyup="get_quantity_value(this.id);" />`;
                        var act_rate=`<input type="number" class="form-control" min=0 id="rate-${cnt}" value="${data[index].act_rate}" />`;
                        var act_amount= `<input type="text" class="form-control" readonly id="amount-${cnt}" value="${data[index].act_quantity*data[index].act_rate}" />`;
                        var process_amount= `<input type="text" class="form-control" id="process_amt-${cnt}" value="${data[index].process_amount}" />`;
                        var bill_disc= `<input type="text" class="form-control" id="table_discount_per-${cnt}" onkeyup="get_row_discount_value1(this.id);" value="${data[index].bill_disc}" />`;
                        var bill_amt= `<input type="text" class="form-control" id="table_discount_rs-${cnt}" onkeyup="get_row_discount_value(this.id);" value="${data[index].bill_amt}" />`;
                        var tax= `<input type="text" class="form-control" id="tax-${cnt}" value="${data[index].tax}" />`;
                        var tax_amt= `<input type="text" class="form-control" id="tax_amt-${cnt}" value="${data[index].tax_amt}" />`;
                        var net_amt= `<input type="text" class="form-control" readonly id="net_amt-${cnt}" value="${data[index].net_amt}" />`;
                        var trans_oct= `<input type="text" class="form-control" id="trans_oct-${cnt}" value="${data[index].trans_oct}" />`;
                        var italian_sqfit= `<input type="text" class="form-control" id="italian_sqfit-${cnt}" value="${data[index].italian_sqfit}" />`;
                        var italian_slide= `<input type="text" class="form-control" id="italian_slide-${cnt}" value="" />`;
                        var gst_per= `<input type="text" class="form-control" readonly id="gst_per-${cnt}" value="${data[index].gst_per}" />`;
                        var cgst= `<input type="text" class="form-control" readonly id="cgst-${cnt}" value="${data[index].cgst}" />`;
                        var sgst= `<input type="text" class="form-control" readonly id="sgst-${cnt}" value="${data[index].sgst}" />`;
                        var igst= `<input type="text" class="form-control" readonly id="igst-${cnt}" value="${data[index].igst}" />`;
                        var cess_per= `<input type="text" class="form-control" id="cess_per-${cnt}" value="${data[index].cess_per}" />`;
                        var cess_amt= `<input type="text" class="form-control" id="cess_amt-${cnt}" value="${data[index].cess_amt}" />`;

                        table.row.add( [
                                start,
                                id,
                                final_product_code,
                                item_type,
                                size,
                                act_quantity,
                                sqfit,
                                act_rate,
                                act_amount,
                                process_amount,
                                bill_disc,
                                bill_amt,
                                tax,
                                tax_amt,
                                net_amt,
                                trans_oct,
                                italian_sqfit,
                                italian_slide,
                                gst_per,
                                cgst,
                                sgst,
                                igst,
                                cess_per,
                                cess_amt,
                                grn_id
                                ] ).draw( false );
                            cnt++;
                        }); 
                    }
                });
            }
        }
    }


</script>
<script>
    function get_quantity_value(e) {
        //alert("e is:"+e);
        //var get_id= e.slice(e.length - 1);
        var get_id = e.split("-");
        var get_id = get_id[1];
        var quantity_value=document.getElementById(e).value;
        var rate = "rate-".concat(get_id);
        var table_discount_rs="table_discount_rs-".concat(get_id);
        var rate=document.getElementById(rate).value;
        var table_discount_rs_value=document.getElementById(table_discount_rs).value;
        var amount_value=rate*quantity_value;
        var amount="amount-".concat(get_id);
        var net_amt="net_amt-".concat(get_id);
        $('#'+amount).val(amount_value);
        $('#'+net_amt).val(amount_value);

        
        var count=table.rows().count();
        // var disc_per=(table_discount_rs_value/amount_value) * 100;
        // var disc_per= parseFloat(disc_per).toFixed(2);
        var table_discount_per = "table_discount_per-".concat(get_id);
        document.getElementById(table_discount_per).value=0;
        var table_discount_rs = "table_discount_rs-".concat(get_id);
        document.getElementById(table_discount_rs).value=0;

        var gst_per = "gst_per-".concat(get_id);
        var cgst = "cgst-".concat(get_id);
        var sgst = "sgst-".concat(get_id);
        var igst = "igst-".concat(get_id);
        var gst = 0;
        var igst_val = 0;

        if($('#'+cgst).val() != 0)
        {
            gst = amount_value * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(gst);
            $('#'+sgst).val(gst);
            igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(igst_val);
        }
        else 
        {
            gst = amount_value * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(0.00);
            $('#'+sgst).val(0.00);
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(gst);
        }

        
    }

    function get_row_discount_value(e) 
    {

        //var get_id= e.slice(e.length - 1);
        var get_id = e.split("-");
        var get_id = get_id[1];

        var table_discount=document.getElementById(e).value;
        
        var quantity = "quantity-".concat(get_id);
        var quantity_value=document.getElementById(quantity).value;
        var rate = "rate-".concat(get_id);

        var rate=document.getElementById(rate).value;
        
        var amount_value=rate*quantity_value;
    
        var amount = "net_amt-".concat(get_id);
    
        var disc_per=(table_discount/amount_value) * 100;

        var disc_per= parseFloat(disc_per).toFixed(2)
        var table_discount_per = "table_discount_per-".concat(get_id);
        // alert(table_discount_per);
        if(table_discount==''){
            var total=parseFloat(amount_value)-0;
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_per).value='0'
        }
        else{
            var total=parseFloat(amount_value)-parseFloat(table_discount);
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_per).value=disc_per;
        }

        var gst_per = "gst_per-".concat(get_id);
        var cgst = "cgst-".concat(get_id);
        var sgst = "sgst-".concat(get_id);
        var igst = "igst-".concat(get_id);
        var gst = 0;
        var igst_val = 0;

        if($('#'+cgst).val() != 0)
        {
            gst = total * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(gst);
            $('#'+sgst).val(gst);
            igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(igst_val);
        }
        else 
        {
            gst = total * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(0.00);
            $('#'+sgst).val(0.00);
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(gst);
        }


    }

    function get_row_discount_value1(e) 
    {

        //var get_id= e.slice(e.length - 1);
        var get_id = e.split("-");
        var get_id = get_id[1];

        var table_discount=document.getElementById(e).value;

        var quantity = "quantity-".concat(get_id);
        var quantity_value=document.getElementById(quantity).value;
        var rate = "rate-".concat(get_id);

        var rate=document.getElementById(rate).value;

        var amount_value=rate*quantity_value;

        var amount = "net_amt-".concat(get_id);

        var disc_rs=parseFloat(table_discount)*parseFloat(amount_value)/100;

        var disc_rs= parseFloat(disc_rs).toFixed(2)
        var table_discount_rs = "table_discount_rs-".concat(get_id);
       
        if(table_discount==''){
            var total=parseFloat(amount_value)-0;
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_rs).value='0';
        }
        else{
            var total=parseFloat(amount_value)-parseFloat(disc_rs);
            document.getElementById(amount).value=total;
            document.getElementById(table_discount_rs).value=disc_rs;
        }

        // gst calculation
        var gst_per = "gst_per-".concat(get_id);
        var cgst = "cgst-".concat(get_id);
        var sgst = "sgst-".concat(get_id);
        var igst = "igst-".concat(get_id);
        var gst = 0;
        var igst_val = 0;

        if($('#'+cgst).val() != 0)
        {
            gst = total * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(gst);
            $('#'+sgst).val(gst);
            igst_val = parseFloat($('#'+cgst).val()) + parseFloat($('#'+sgst).val())
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(igst_val);
        }
        else 
        {
            gst = total * $('#'+gst_per).val()/100;
            gst = gst.toFixed(2);  // show 2 digits after decimal point
            $('#'+cgst).val(0.00);
            $('#'+sgst).val(0.00);
            igst_val = igst_val.toFixed(2);
            $('#'+igst).val(gst);
        }

    }

    function get_final_amount(e) {

        var total=document.getElementById('total_amt').value;
        var tax_amt=document.getElementById('tax_amt').value;
        var adjustment_final=document.getElementById('other').value;
        var process_amount=document.getElementById('proc_amt').value;
        var trans=document.getElementById('trans').value;
        var unload=document.getElementById('unload').value;
        var octroi=document.getElementById('octroi').value;
        var insurance=document.getElementById('insurance_amt').value;
        var freight=document.getElementById('freight').value;
        var excise=document.getElementById('excise_amt').value;
        var exedu=document.getElementById('exedu_amt').value;
        var exhedu=document.getElementById('exhedu_amt').value;


        if(adjustment_final=='' && process_amount=='' ){
            var final_amount=parseFloat(total) + parseFloat(tax_amt)+parseFloat(trans) + parseFloat(unload)+parseFloat(octroi) + parseFloat(insurance)+parseFloat(freight) + parseFloat(excise)+parseFloat(exedu) + parseFloat(exhedu);
            document.getElementById("net_amt").value=final_amount;
        }
        else if(adjustment_final=='')
        {
            var final_amount=parseFloat(total)+0+parseInt(process_amount) + parseFloat(tax_amt)+parseFloat(trans) + parseFloat(unload)+parseFloat(octroi) + parseFloat(insurance)+parseFloat(freight) + parseFloat(excise)+parseFloat(exedu) + parseFloat(exhedu);

            document.getElementById("net_amt").value=final_amount;
        }
        else if( process_amount=='' ){
            var final_amount=parseFloat(total)+parseFloat(adjustment_final)+0 + parseFloat(tax_amt)+parseFloat(trans) + parseFloat(unload)+parseFloat(octroi) + parseFloat(insurance)+parseFloat(freight) + parseFloat(excise)+parseFloat(exedu) + parseFloat(exhedu);
            document.getElementById("net_amt").value=final_amount;
        }
                                            
        else{
            var final_amount=parseFloat(total)+parseFloat(adjustment_final)+parseInt(process_amount) + parseFloat(tax_amt)+parseFloat(trans) + parseFloat(unload)+parseFloat(octroi) + parseFloat(insurance)+parseFloat(freight) + parseFloat(excise)+parseFloat(exedu) + parseFloat(exhedu);
            document.getElementById("net_amt").value=final_amount;
        }

    }    

</script>