<?php 

$directoryURI = $_SERVER['REQUEST_URI'];
/*/perfume1/pixinvent.com/html/ltr/vertical-menu-template/items.php*/

//if($uri == "http://localhost/perfume1/pixinvent.com/html/ltr/vertical-menu-template/items.php")
 $path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[4];

$second_part=$components[3];

?>
<style type="text/css">
  .main-menu.menu-dark .navigation>li.active>a {
    /*color: #DCDCDC;*/
    /*font-weight: 700;*/
    /* background: seagreen; */
    border-right: 4px solid #3BAFDA;
    color: #1abc9c!important;
    background-color: #2f2f38 !important;
}
.btn btn-success{
  color: #fff !important;
    background-color: #1abc9c !important;
    border-color: #1abc9c !important;

}

.btn-group-sm>.btn, .btn-sm {
    padding: 0.5rem 0.75rem !important;
    font-size: 0.875rem !important;
    line-height: 0 !important;
    border-radius: .18rem !important;
}

</style>
  <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
      <div class="main-menu-content">
  
</ul> 
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item">
            <a href="../../index.php">
              <i class="fa fa-tachometer" aria-hidden="true"></i>
              <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">5</span>
            </a>
          </li>
     
          
          <li class=" nav-item <?php if ($second_part=="masters") {echo "open"; } else  {echo "";}?>"><a href="#"><i class="icon-options-vertical"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Masters</span></a>
            <ul class="menu-content">
              <li class=" nav-item <?php if ($first_part=="view_wholesale_customer.php"|| $first_part=="add_wholesale_customer.php"|| $first_part=="edit_wholesale_customer.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_wholesale_customer.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Wholesale Customer</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_employee.php"|| $first_part=="add_employee.php" || $first_part=="edit_employee.php" ) {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_employee.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Employee</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_item.php"|| $first_part=="add_item.php" || $first_part=="edit_item.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_item.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Product</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_bank.php"|| $first_part=="add_bank.php" || $first_part=="edit_bank.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_bank.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Bank</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_customer_rate.php"|| $first_part=="add_customer_rate.php"|| $first_part=="edit_customer_rate.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_customer_rate.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Customer Rate</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_supplier.php"|| $first_part=="add_supplier.php" || $first_part=="edit_supplier.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_supplier.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Supplier</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_tax.php"|| $first_part=="add_tax.php"|| $first_part=="edit_tax.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_tax.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Tax</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_transporter.php"|| $first_part=="add_transporter.php"|| $first_part=="edit_transporter.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_transporter.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Transporter</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_retail_customer.php"|| $first_part=="add_retail_customer.php" || $first_part=="edit_retail_customer.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_retail_customer.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Retail Customer</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_budget.php"|| $first_part=="add_budget.php"|| $first_part=="edit_budget.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_budget.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Budget</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_vendor.php"|| $first_part=="add_vendor.php"|| $first_part=="edit_vendor.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_vendor.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Vendor</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_cheque.php"|| $first_part=="add_cheque.php" || $first_part=="edit_cheque.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_cheque.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Cheque</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_expense_head.php"|| $first_part=="add_expense_head.php" || $first_part=="edit_expense_head.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_expense_head.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Expense Head</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_loan_advance.php"|| $first_part=="add_loan_advance.php" || $first_part=="edit_loan_advance.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_loan_advance.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Loan advance</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_term_condition.php"|| $first_part=="add_term_condition.php" || $first_part=="edit_term_condition.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_term_condition.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Terms And Condition</span>
                </a>
              </li>
              <!-- <li class=" nav-item <?php if ($first_part=="view_professional_head.php"|| $first_part=="add_professional_head.php"|| $first_part=="edit_professional_head.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_professional_tax.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Professional Head</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_professional_tax.php"|| $first_part=="add_professional_tax.php"|| $first_part=="edit_professional_tax.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_professional_tax.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Professional Tax</span>
                </a>
              </li>
              
              <li class=" nav-item <?php if ($first_part=="view_product_rate.php"|| $first_part=="add_product_rate.php"|| $first_part=="edit_product_rate.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_product_rate.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Product Rate Master</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_tax_group.php"|| $first_part=="add_tax_group.php" || $first_part=="edit_tax_group.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_tax_group.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Tax Group Master</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_data_update.php"|| $first_part=="add_data_update.php" || $first_part=="edit_data_update.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_data_update.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Data Update</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_product_import.php"|| $first_part=="add_product_import.php" || $first_part=="edit_product_import.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_product_import.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Product Import</span>
                </a>
              </li> -->
            
            </ul>
          </li>
          
          <li class=" nav-item <?php if ($second_part=="purchase") {echo "open"; } else  {echo "";}?>"><a href="#"><i class="icon-options-vertical"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Purchase</span></a>
            <ul class="menu-content">
              <li class=" nav-item <?php if ($first_part=="view_supplier_po.php"|| $first_part=="add_supplier_po.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../purchase/view_supplier_po.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Supplier PO</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_grn.php"|| $first_part=="add_grn.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../purchase/view_grn.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Goods Received Note</span>
                </a>
              </li>
            <li class=" nav-item <?php if ($first_part=="view_supplier_manual_credit_debit.php"|| $first_part=="add_supplier_manual_credit_debit.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../purchase/add_supplier_manual_credit_debit.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Supplier Manual Debit/Credit</span>
                </a>
              </li>
                <li class=" nav-item <?php if ($first_part=="view_supplier_return_good.php"|| $first_part=="add_supplier_return_good") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../purchase/view_supplier_return_good.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Supplier Return Goods</span>
                </a>
              </li>
              
         <!--  <li class=" nav-item <?php if ($first_part=="view_stock_transfer.php"|| $first_part=="add_stock_transfer.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_stock_transfer.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Stock Transfer</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_dc_ac.php"|| $first_part=="add_dc_ac.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_dc_ac.php">
                  <span class="menu-title" data-i18n="nav.dash.main">DC Acknowledgement</span>
                </a>
              </li>
             
              
              <li class=" nav-item <?php if ($first_part=="view_scrap_transaction.php"|| $first_part=="add_scrap_transaction.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_scrap_transaction.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Scrap Transaction</span>
                </a>
              </li>
            
              <li class=" nav-item <?php if ($first_part=="view_inter_branch_po.php"|| $first_part=="add_inter_branch_po.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../masters/view_inter_branch_po.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Inter Branch PO</span>
                </a>
              </li> -->
            </ul>
          </li>
          <li class=" nav-item <?php if ($second_part=="wholesale") {echo "open"; } else  {echo "";}?>"><a href="#"><i class="icon-options-vertical"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Wholesale</span></a>
            <ul class="menu-content">
              <li class=" nav-item <?php if ($first_part=="view_wholesale_work_order.php"|| $first_part=="add_work_order.php" || $first_part=='edit_wholesale_work_order.php') {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_wholesale_work_order.php"> 
                  <span class="menu-title" data-i18n="nav.dash.main">Work Order</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_wholesale_delivery_challan.php"|| $first_part=="wholesale_delivery_challan.php" || $first_part=='edit_wholesale_delivery_challan.php') {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_wholesale_delivery_challan.php"> 
                  <span class="menu-title" data-i18n="nav.dash.main">Delivery Challan</span>
                </a>
              </li>
               <li class=" nav-item <?php if ($first_part=="view_wholesale_tax_invoice.php"|| $first_part=="add_wholesale_tax_invoice.php" || $first_part=="edit_wholesale_tax_invoice.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_wholesale_tax_invoice.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Tax Invoice</span>
                </a>
              </li>
             <li class=" nav-item <?php if ($first_part=="view_wholesale_receipt.php"|| $first_part=="add_wholesale_receipt.php" || $first_part=="edit_wholesale_receipt.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_wholesale_receipt.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Receipt</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_wholesale_cust_manual_drcr.php"|| $first_part=="add_wholesale_cust_manual_drcr.php" || $first_part=="edit_wholesale_cust_manual_drcr.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_wholesale_cust_manual_drcr.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Customer Manual Debit / Credit</span>
                </a>
              </li>
              
            <li class=" nav-item <?php if ($first_part=="view_wholesale_return_good.php"|| $first_part=="add_wholesale_return_good.php" || $first_part=="edit_wholesale_return_good.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_wholesale_return_good.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Return Goods</span>
                </a>
              </li>
             <li class=" nav-item <?php if ($first_part=="view_delete_pending_qua.php"|| $first_part=="add_delete_pending_qua.php" || $first_part=="edit_delete_pending_qua.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_delete_pending_qua.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Delete Pending Quantity</span>
                </a>
              </li>
            <li class=" nav-item <?php if ($first_part=="view_customer_advance.php"|| $first_part=="add_customer_advance.php" || $first_part=="edit_customer_advance.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../wholesale/view_customer_advance.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Customer Advance</span>
                </a>
              </li>
            </ul>
          </li>

          <li class=" nav-item <?php if ($second_part=="retail") {echo "open"; } else  {echo "";}?>"><a href="#"><i class="icon-options-vertical"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Retail</span></a>
            <ul class="menu-content">
              <li class=" nav-item <?php if ($first_part=="view_retail_proforma_invoice.php"|| $first_part=="add_retail_proforma_invoice.php" || $first_part=="edit_retail_proforma_invoice.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../retail/view_retail_proforma_invoice.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Retail Proforma Invoice</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_retail_tax_invoice.php"|| $first_part=="add_retail_tax_invoice.php" || $first_part=="edit_retail_tax_invoice.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../retail/view_retail_tax_invoice.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Retail Tax Invoice</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_retail_receipt.php"|| $first_part=="add_retail_receipt.php" || $first_part=="edit_retail_receipt.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../retail/view_retail_receipt.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Retail Receipt</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_retail_return_goods.php"|| $first_part=="add_retail_return_goods.php" || $first_part=="edit_retail_return_goods.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../retail/view_retail_return_goods.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Retail Return Goods</span>
                </a>
              </li>
             <li class=" nav-item <?php if ($first_part=="view_retail_quotation.php"|| $first_part=="add_retail_quotation.php" || $first_part=="edit_retail_quotation.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../retail/view_retail_quotation.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Quotation</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_del_retail_pending_qua.php"|| $first_part=="add_del_retail_pending_qua.php" || $first_part=="edit_del_retail_pending_qua.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../retail/view_del_retail_pending_qua.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Delete Retail Pending Quantity</span>
                </a>
              </li>
            </ul>
          </li>

          <li class=" nav-item <?php if ($second_part=="expense") {echo "open"; } else  {echo "";}?>"><a href="#"><i class="icon-options-vertical"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Expense</span></a>
            <ul class="menu-content">
              <li class=" nav-item <?php if ($first_part=="view_daily_petty_expense.php"|| $first_part=="add_daily_petty_expense.php" || $first_part=="edit_daily_petty_expense.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_daily_petty_expense.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Daily Petty Expense</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_company_loan_advance.php"|| $first_part=="add_company_loan_advance.php" || $first_part=="edit_company_loan_advance.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_company_loan_advance.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Company Loan And Advance</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_exp_purchase_order.php"|| $first_part=="add_exp_purchase_order.php" || $first_part=="edit_exp_purchase_order.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_exp_purchase_order.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Purchase Order</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_exp_bill_entry.php"|| $first_part=="add_exp_bill_entry.php" || $first_part=="edit_exp_bill_entry.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_exp_bill_entry.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Bill Entry</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_advance_payment.php"|| $first_part=="add_advance_payment.php" || $first_part=="edit_advance_payment.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_advance_payment.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Advance Payment</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_advance_payment_cancellation.php"|| $first_part=="add_advance_payment_cancellation.php" || $first_part=="edit_advance_payment_cancellation.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_advance_payment_cancellation.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Advance Payment Cancellation</span>
                </a>
              </li>
              <!-- <li class=" nav-item <?php if ($first_part=="view_fixed_payment.php"|| $first_part=="add_fixed_payment.php" || $first_part=="edit_fixed_payment.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_fixed_payment.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Fixed Payment</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_payment_advice.php"|| $first_part=="add_payment_advice.php" || $first_part=="edit_payment_advice.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_payment_advice.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Payment Advice</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_payment_advice_cancellation.php"|| $first_part=="add_payment_advice_cancellation.php" || $first_part=="edit_payment_advice_cancellation.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_payment_advice_cancellation.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Payment Advice Cancellation</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_payment_advice_reprint.php"|| $first_part=="add_payment_advice_reprint.php" || $first_part=="edit_payment_advice_reprint.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_payment_advice_reprint.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Payment Advice Reprint</span>
                </a>
              </li>
              <li class=" nav-item <?php if ($first_part=="view_cheque_printing_expense.php"|| $first_part=="add_cheque_printing_expense.php" || $first_part=="edit_cheque_printing_expense.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../expense/view_cheque_printing_expense.php">
                  <span class="menu-title" data-i18n="nav.dash.main" style="display: inline;">Cheque Printing Expense</span>
                </a>
              </li> -->
            </ul>
          </li>

          <li class=" nav-item <?php if ($second_part=="finance") {echo "open"; } else  {echo "";}?>"><a href="#"><i class="icon-options-vertical"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Finance</span></a>
            <ul class="menu-content">
              <li class=" nav-item <?php if ($first_part=="view_fin_purchase_invoice.php"|| $first_part=="add_finance_purchase_invoice.php" || $first_part=="edit_finance_purchase_invoice.php") {echo "active open"; } else  {echo "noactive";}?>">
                <a href="../finance/view_finance_purchase_invoice.php">
                  <span class="menu-title" data-i18n="nav.dash.main">Purchase Invoice</span>
                </a>
              </li>
            </ul>
          </li>
          
        <!-- <li class=" nav-item">
          <a href="#">
          
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            <span class="menu-title" data-i18n="nav.data_tables.main">Sales</span>
          </a>
          <ul class="menu-content">
            <li>
              <a class="menu-item" href="../sale/view_customer.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Customers
              </a>
            </li>
            <li>
              <a class="menu-item" href="../sale/view_estimate.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Estimates
              </a>
            </li>
            <li>
              <a class="menu-item" href="../sale/view_sale_order.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Sale Order
              </a>
            </li>
            <li>
              <a class="menu-item" href="../sale/view_delivery_challan.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Delivery Challans
              </a>
            </li>
            <li>
              <a class="menu-item" href="../sale/view_invoice.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Invoices
              </a>
            </li>
            <li>
              <a class="menu-item" href="../sale/view_invoice.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Payment Received
              </a>
            </li>
          </ul>
        </li> -->
        <!-- <li class=" nav-item">
          <a href="#">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <span class="menu-title" data-i18n="nav.data_tables.main">Purchases</span>
          </a>
          <ul class="menu-content">
            <li>
              <a class="menu-item <?php if ($first_part=="view_vendor.php") {echo "active"; } else  {echo "noactive";}?>" href="../purchase/view_vendor.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Vendors
              </a>
            </li>
            <li>
              <a class="menu-item <?php if ($first_part=="view_expenses.php") {echo "active"; } else  {echo "noactive";}?>" href="../purchase/view_expenses.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Exepenses
              </a>
            </li>
            <li>
              <a class="menu-item <?php if ($first_part=="view_purchase_order.php") {echo "active"; } else  {echo "noactive";}?>" href="../purchase/view_purchase_order.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Purchase Orders
              </a>
            </li>
            <li>
              <a class="menu-item <?php if ($first_part=="view_bill.php") {echo "active"; } else  {echo "noactive";}?>" href="../purchase/view_bill.php" data-i18n="nav.data_tables.dt_advanced_initialization">
              Bills
              </a>
            </li>
          </ul>
        </li>
        <li class=" nav-item">
            <a href="index.php">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
              <span class="menu-title" data-i18n="nav.dash.main">Reports</span>
            </a>
        </li> -->
          <!-- <li class=" navigation-header"><span data-i18n="nav.category.tables">Tables</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Tables"></i>
          </li>
         
          <li class=" nav-item"><a href="#"><i class="icon-share-alt"></i><span class="menu-title" data-i18n="nav.data_tables.main">DataTables</span></a>
            <ul class="menu-content">
             
              <li><a class="menu-item" href="dt-advanced-initialization.php" data-i18n="nav.data_tables.dt_advanced_initialization">Advanced initialisation</a>
              </li>
              
            </ul>
          </li> -->
        </ul>
      </div>
    </div>
    <style>
    body{
      font-size: 15px !important;
    }
    </style>
    <style>
      form.form-horizontal .form-group .label-control {
          text-align: left !important;
      }
      .form-control {
          display: block;
          width: 100%;
          height: -webkit-calc(2.75rem + 2px);
          height: -moz-calc(1.75rem + 13px) !important;
          height: calc(1.75rem + 13px);
          padding: .75rem 1rem;
          font-size: 17px;
          line-height: 1.25;
          color: #4E5154;
          background-color: #FFF;
          border: 1px solid #ADB5BD;
          border-radius: .21rem;
          -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
          -o-transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
          -moz-transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
          transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
          transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
      }
    </style>