
<?php include('../../partials/header.php');?>

<?php include('../../database/dbconnection.php');?>

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
                                                All Wholesale Delivery Challan
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 mobile-width">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 mobile-width">                                 
                                            <a href="wholesale_delivery_challan.php" style="float: left;"><button type="button" class="btn btn-success " ><i class="fa fa-plus"></i> NEW</button></a>
                                       
                                    </div>
                                    <div class="modal fade" id="Item_Search_modal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                        
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header select1">
                                                <!-- <div class="row"> -->
                                                    <div class="col-lg-2 col-sm-4">
                                                        <h5 class="modal-title" style="float: right;">Search</h5>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        
                                                    </div>

                                                    <div class="col-lg-4 col-sm-4">
                                                        
                                                    </div>
                                                    <div class="col-lg-1 col-sm-4">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered responsive" id="tbl">
                                <thead>
                                    <tr >
                                        
                                        <th></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Challan No.</th>
                                        <th>Sales Order No</th>
                                        <th>Customer Name </th>
                                        <th>Customer Site</th>
                                        <th>Transport</th>
                                        <th>Quantity</th>
                                        <th>Discount(%)</th>                                        
                                        <th>Other Charges</th>
                                        <th>Process Amount</th>
                                        <th>Net Amount</th>
                                        <th>Add Date Time</th>
                                    </tr>
                                </thead>

                                <?php
                                $flag=$_SESSION['flag'];
                                // if($flag==0)
                                // {
                                    $sql_charges="SELECT *,wdc.add_date as da,
                                    wdc.add_time as dt,
                                    wdc.qty as q,
                                    wdc.disc_per as dp,
                                    wdc.disc_rs as dr,
                                    wdc.other as o,
                                    wdc.process_amt as pa,
                                    wdc.net_amt as na
                                    
                                    FROM `wholesale_delivery_challan` as wdc,
                                        wholesale_work_order as wwo,
                                        mstr_transporter as t,
                                        mstr_transporter_vehicle as v ,
                                        tbl_wholesale_customer as c,
                                        tbl_wholesale_customer_site_details as cs 
                                    WHERE wdc.wh_wo_id_fk = wwo.work_order_id AND 
                                        wdc.t_id_fk = t.t_id_pk AND 
                                        wdc.v_id_fk = v.tv_id_pk AND 
                                        wdc.delete_status!='1' AND
                                        wwo.cust_id_fk = c.wc_id_pk AND 
                                        wwo.site_id_fk = cs.site_id_pk
                                    ORDER BY wdc.wd_ch_id_pk DESC
                                    ";
                                    $result_charges = mysqli_query($db, $sql_charges);
                                // }
                                    // $sql_charges="SELECT *,wdc.add_date as da,
                                    //                 wdc.add_time as dt,
                                    //                 wdc.qty as q,
                                    //                 wdc.disc_per as dp,
                                    //                 wdc.disc_rs as dr,
                                    //                 wdc.other as o,
                                    //                 wdc.process_amt as pa,
                                    //                 wdc.net_amt as na
                                                    
                                    // FROM `wholesale_delivery_challan` as wdc,
                                    //       wholesale_work_order as wwo,
                                    //       mstr_transporter as t,
                                    //       mstr_transporter_vehicle as v ,
                                    //       tbl_wholesale_customer as c,
                                    //       tbl_wholesale_customer_site_details as cs 
                                    // WHERE wdc.wh_wo_id_fk = wwo.work_order_id AND 
                                    //       wdc.t_id_fk = t.t_id_pk AND 
                                    //       wdc.v_id_fk = v.tv_id_pk AND 
                                    //       wdc.delete_status!='1' AND
                                    //       wwo.cust_id_fk = c.wc_id_pk AND 
                                    //       wwo.site_id_fk = cs.site_id_pk
                                    // ORDER BY wdc.wd_ch_id_pk DESC
                                    // ";
                                    // $result_charges = mysqli_query($db, $sql_charges);
                                    ?>
                                <tbody>
                                <?php
                                if($result_charges != "")
                                {
                                    while ($row=mysqli_fetch_array($result_charges))
                                    {
                                    ?>
                                    <tr style="cursor: pointer">
                                        <td></td>
                                        <td><button class="btn btn-success" id="<?php echo $row['wd_ch_id_pk'] ?>" onclick="show_item_details(this.id);" >View Detailes</button></td>
                                        <td style="display: flex;">
                                            <!-- <a href="edit_wholesale_delivery_challan.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['wd_ch_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a> -->
                                            <?php 
                                            if($flag==0)
                                            { ?>
                                            <a href="../../fpdf/api/wholesale_delivery_challan.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['wd_ch_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                            <a onclick="return confirm('Confirm send mail?')" href="../../fpdf/api/wholesale_delivery_challan_mail.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['wd_ch_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </a>
                                            <?php } 
                                            else { ?>
                                                <a href="../../fpdf/api/wholesale_delivery_challan_raw.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['wd_ch_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-success btn-sm">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                            <?php } ?>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="../../api/wholesale/delete_wholesale_delivery_challan.php?bfiirbfr=dnfvibi&njsbuisv=sdmdfuiefb&id=<?php echo $row['wd_ch_id_pk'];?>&dhjsh=efnb&bbdhjrb=esfbehvf&ejgfebf=sdfbuyeg" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $row['challan_no']; ?> </td>
                                        <td><?php echo $row['work_no']; ?></td>
                                        <td><?php echo $row['cust_name']; ?></td>
                                        <td><?php echo $row['site_name']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['q']; ?></td>
                                        <td><?php echo $row['dp']." %"; ?></td>
                                        <td>₹ <?php echo $row['o']; ?></td>
                                        <td>₹<?php echo $row['pa']; ?></td>
                                        <td>₹<?php echo $row['na']; ?></td>
                                        <td><?php echo $row['da']." ".$row['dt']; ?></td>
                                    </tr>
                                                    <?php
                                    }
                                }              ?>
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog modal-lg">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                    <h4 class="modal-title">Wholesale Delivery Challan Items</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="border-bottom-0 table table-hover table-responsive" id="tbl" >
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Item</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Sqrfit</th>
                                                    <th>Rate</th>
                                                    <th>Discount Percent</th>
                                                    <th>Discount Rs.</th>
                                                    <th>Amount</th>
                                                    <th>Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody id="items_fetch">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
  

                        </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
// $(document).ready(function(){
//     $('[data-toggle="popover"]').popover();   
// });
$(document).ready(function() {
  $('[data-toggle="popover"]').popover({
    html: true,
    content: function() {
      return $('#popover-content').html();
    }
  });
});
</script>
<script>
	$(document).ready(function()
  {
    $('#tbl').DataTable( {
        dom: 'Bfrtip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {
  extend: 'pdfHtml5',
  title: ' Purchase Orders',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions: {
     columns: [ 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
  },
  //-------------------------- 
  customize : function(doc) {
     doc.styles['td:nth-child(2)'] = { 
       width: '100px',
       'max-width': '100px',
       margin: '0px 20px'
     }
  }
}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
        searching:true,
     
   
        columnDefs: [ 
            { "orderable": false, "className": 'select-checkbox', 'selectRow': true, "targets": [0]},
            ],      
        select: { style: 'multi', selector: 'td:nth-child(0)'},
        select: { style: 'multi'},
        destroy:false,
        drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
    });
});
			
		
</script>

<script>
                    function openNav() 
                    {
                        //alert("hii:");
                        window.location.href = 'purchase_account_view.php'; //Will take you to Google.                        
                       
                    }
                    </script>
<script>
function show_item_details(id)
{
    //alert("hii:"+id);
    
    $.ajax({
        type: "POST", 
        url: '../../api/wholesale/view_wholesale_delivery_challan_items.php',
        data: "id="+id ,
        success: function(data)
        { 
            //alert("data:"+data);
            $('#items_fetch').html(data);
            $("#myModal1").modal("show");
        }
    });
}
</script>

<?php include('../../partials/footer.php');?>
