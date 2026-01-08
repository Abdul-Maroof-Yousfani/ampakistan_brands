<?php
use App\Helpers\CommonHelper;
$total_amount = 0;

$buyer_detail = CommonHelper::get_buyer_detail($sale_order->buyers_id);
$m = Input::get('m');
?>

<style>
 p{margin:0;padding:0;font-size:13px;font-weight:500;}
input.form-control.form-control2{margin:0!important;}
.table-bordered > thead > tr > th,.table-bordered > tbody > tr > th,.table-bordered > tfoot > tr > th{vertical-align:inherit !important;text-align:left !important;padding:7px 5px !important;}
.table > caption + thead > tr:first-child > th,.table > colgroup + thead > tr:first-child > th,.table > thead:first-child > tr:first-child > th,.table > caption + thead > tr:first-child > td,.table > colgroup + thead > tr:first-child > td,.table > thead:first-child > tr:first-child > td{padding:8px 8px !important;background:#ddd;}

.totlas p{font-weight:bold;}
.psds p{font-weight:bold;}
.userlittab > thead > tr > td,.userlittab > tbody > tr > td,.userlittab > tfoot > tr > td{padding:10px 5px !important;}
.totlass{display:inline;background:transparent;margin-top:-25px;width:68%;float:left;}
.totlass h2{font-size:13px !important;}
.vomp{text-align:left;}
.userlittab > thead > tr > td,.userlittab > tbody > tr > td,.userlittab > tfoot > tr > td{font-weight:300 !important;}
.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{color:#333 !important;border:1px solid #428bca!important;background-color:white;background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#fff),color-stop(100%,#dcdcdc));background:-webkit-linear-gradient(top,#fff 0%,#dcdcdc 100%);background:-moz-linear-gradient(top,#fff 0%,#dcdcdc 100%);background:-ms-linear-gradient(top,#fff 0%,#dcdcdc 100%);background:-o-linear-gradient(top,#fff 0%,#dcdcdc 100%);background:#428bca !important;width:25px !important;height:30px!important;line-height:15px;color:#fff !important;}
  .totals3{width:37%;float:right;}
    .psds{display:flex;font-weight:bold;justify-content:space-between;}
    .totlas{display:flex;background:#ddd;justify-content:space-between;}

</style>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php if($sale_order->status == 0): ?>
                                <div class="">
                                    <?php echo Form::open(array('url' => 'selling/approveSaleOrder?m='.$m.'','id='.$sale_order->id.'','id'=>'approveSaleOrder','class'=>'stop'));?>
                                    <!-- <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success'])); ?> -->
                                    <input type="hidden" name="id" value="<?php echo e($sale_order->id); ?>">
                                    <input type="hidden" name="pageType"
                                        value="<?php // echo $_GET['pageType']?>">
                                    <input type="hidden" name="parentCode"
                                        value="<?php // echo $_GET['parentCode']?>">
                                    <?php echo e(Form::submit('Approve', ['class' => 'btn btn-success btn-xs btn-abc hidden-print'])); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right hidden-print">
                                <!-- <?php CommonHelper::newdisplayPrintButtonInView('printReport', '', 1);?> -->

                                   <div class="no-print">
                                    <button class="btn btn-primary prinn pritns" onclick="printSection()">🖨️ Print</button>
                                    </div>

                            </div>
                        </div>
                        <div class="mt-top" id="printsale-order">
                            <div class="sales_or2">
                                <div class="contra">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="contr">
                                                <h2 class="subHeadingLabelClass">Brands Unlimited (Pvt) Ltd</h2>
                                                <p>301-305, 3rd Floor, Kavish Crown Plaza
                                                    Sharah-e-Faisal, karachi.</p>
                                                <p>S.T.R.N #: 3277876156235</p>
                                                <p>N.T.N #:5098058-8 </p>
                                                <br>
                                                <p style="margin-top:-13px;">Bill To:</p>
                                                <br>
                                                <p style="margin-top:-12px;">
                                                    <strong><?php echo e($buyer_detail->name); ?></strong><br>
                                                    <?php echo e($buyer_detail->address); ?><br>
                                                    <?php echo e(CommonHelper::get_all_country_by_id($buyer_detail->country)->name ?? '-'); ?><br>
                                                    <!-- <?php echo e($buyer_detail->phone_1); ?><br> -->
                                                    N.T.N #:<?php echo e(isset($buyer_detail->cnic_ntn) ? $buyer_detail->cnic_ntn : "-"); ?><br>
                                                    S.T.R.N #: <?php echo e(isset($buyer_detail->strn) ? $buyer_detail->strn : "-"); ?>

                                                </p>
                                              
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  text-right">
                                            <div class="contr2">
                                                <h2 class="subHeadingLabelClass">Sale Order</h2>
                                                <br>
                                                <p>Document # <?php echo e($sale_order->so_no); ?></p>
                                                <p style="margin-bottom: -23px !important;">Date: <?php echo e(\Carbon\Carbon::parse($sale_order->so_date)->format('d-M-Y')); ?></p>
                                                <br>
                                                <?php if($buyer_detail->display_pending_payment_invoice == 1): ?>
                                                <?php endif; ?>
                                                <div class="table-responsive">
                                                    <table class="sale-list userlittab table table-bordered sf-table-list" style="border:1px solid #000;width:56% !important;margin: 5px 0px;float:right;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border:1px solid #000 !important;border-right:none !important;padding: 5px 8px !important;">Amount Limit</td>
                                                                <td style="text-align: right; border:1px solid #000 !important;border-left:none !important;padding: 5px 8px !important;">
                                                                    <?php echo e(number_format($sale_order->credit_limit, 0)); ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border:1px solid #000 !important;border-right:none !important;padding: 5px 8px !important;">Balance Amount</td>
                                                                <td style="text-align: right; border:1px solid #000 !important;border-left:none !important;padding: 5px 8px !important;">
                                                                    <?php echo e(number_format($sale_order->balance_amount, 0)); ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="border:1px solid #000 !important;border-right:none !important;padding: 5px 8px !important;">Current Balance Due</td>
                                                                <td style="text-align: right; border:1px solid #000 !important;border-left:none !important;padding: 5px 8px !important;">
                                                                    <?php echo e(number_format($sale_order->current_balance_due, 0)); ?>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                $buyers_warehouse_name = null;
                                                ?>
                                                <div class="row">
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                        <div class="term">
                                                            <p>SO Date: <?php echo e($sale_order->so_date); ?></p>
                                                             <?php
                                                                $warehouse_name = null;
                                                                if(!$sale_order->warehouse_from) {
                                                                    $warehouse_name = \App\Helpers\CommonHelper::get_name_warehouse($buyer_detail->warehouse_from);
                                                                } else {
                                                                    $warehouse_name = \App\Helpers\CommonHelper::get_name_warehouse($sale_order->warehouse_from);
                                                                }
                                                            ?>
                                                            <p>Warehouse: <?php echo e($warehouse_name); ?></p>
                                                            <p>Payment Terms: 30 Days</p>
                                                            <p>Salesperson Mobile #</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <div class="term">
                                                            <p>SO #: <?php echo e($sale_order->so_no); ?></p>
                                                            <p>GDN #:</p>
                                                            <p>Branch: <?php echo e($sale_order->branch); ?></p>
                                                            <p>Salesperson: <?php echo e($buyer_detail->SaleRep); ?></p>
                                                            <p><strong></strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <!-- <h2 class="subHeadingLabelClass">Item Details</h2> -->
                                            <div class="table-responsive">
                                                <table class="table sale_older_tab userlittab table table-bordered sf-table-list sale-list">
                                                    <thead>
                                                        <tr>
                                                            <th style="background: #000 !important; color:#fff !important;text-align: center !important;width: 10px !important;">S.No</th>
                                                            <th style="background: #000 !important; color:#fff !important;width: 27% !important;">Product</th>
                                                            
                                                            <th style="background: #000 !important; color:#fff !important;    text-align: center !important;">Barcode</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Qty</th>
<!--                                                             
                                                            <th style="background: #000 !important; color:#fff !important;">FOC</th> -->
                                                            <th style="background: #000 !important; color:#fff !important;">MRP</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Rate</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Gross Amount</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Disc%</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Disc Amount</th>
                                                            
                                                            
                                                            <th style="background: #000 !important; color:#fff !important;">Tax%</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Tax Amount</th>
                                                            <th style="background: #000 !important; color:#fff !important;">Total Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data">
                                                        <?php $total_discount_amount = 0; ?>
                                                        <?php $total_foc = 0; $total_qty_get =0; ?>

                                                        <?php $__currentLoopData = $sale_order_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale_order_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                    
                                                        $product = CommonHelper::get_product_name($sale_order_item->item_id);
                                                        $productid = CommonHelper::get_product_sku($sale_order_item->item_id);
                                                        $productbarcode = CommonHelper::product_barcode($sale_order_item->item_id);

                                                        $total_qty_get += $sale_order_item->qty;
                                                        
                                                        ?>
                                                        <tr>
                                                           <td style="text-align: center !important;">
                                                                <?php echo e($loop->iteration); ?>

                                                            </td>

                                                            <td style="width: 20%;"  >
                                                                <strong> (<?php echo e($productid ?? ""); ?>)-<?php echo e($product ?? "----"); ?></strong>
                                                            </td>
                                                            <td  style="text-align: center !important;" class="wsale2">
                                                                <p> <?php echo e($productbarcode ?? "--"); ?></p>
                                                            </td>
                                                            <td  style="text-align: center !important;" class="wsale2">
                                                                <p><?php echo e(number_format($sale_order_item->qty)); ?></p>
                                                            </td>
                                                            
                                                            <!-- <td  style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->foc)); ?>

                                                            </td> -->
                                                            <td style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->mrp_price)); ?></td>
                                                            <td  style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->rate)); ?></td>
                                                            <td style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->sub_total)); ?></td>
                                                            <td  style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->discount_percent_1,0)); ?>


                                                            </td>
                                                            
                                                            <td style="text-align: center !important;">
                                                            <?php echo e(number_format(round($sale_order_item->discount_amount_1))); ?>



                                                            <?php $total_discount_amount += $sale_order_item->discount_amount_1; ?>
                                                            <?php $total_foc += $sale_order_item->foc; ?>

                                                            </td>
                                                        
                                                            <td  style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->tax)); ?>%</td>
                                                            <td  style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->tax_amount)); ?></td>
                                                            <td style="text-align: center !important;">
                                                                <?php echo e(number_format($sale_order_item->amount)); ?></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th colspan="2" style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;font-size:13px!important;font-weight:400!important;">Sub Total</th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;"></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;text-align: center !important;"><p id="total_qty"><?php echo e($sale_order->total_qty); ?></p></th>
                                                            <!-- <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;"text-align: center !important;><p style="text-align: center !important;" id="total-fac"><?php echo e(number_format($total_foc,2)); ?></p></th> -->
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;"></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;"></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important; text-align: center !important;"><p id="total_gross_amount"><?php echo e(number_format( round($sale_order->total_amount),0)); ?></p></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;"><p></p></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important; text-align: center !important;"><p  style="text-align: center !important;" id="disc"><?php echo e(number_format(round($total_discount_amount),0)); ?></p></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;"></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;text-align: center !important;"><p id="total_sales_tax"><?php echo e(number_format(round($sale_order->sales_tax_rate),0)); ?></p></th>
                                                            <th style="background: transparent; border-bottom: 1px solid #000 !important;  padding:0px 5px !important; margin:0 !important;text-align: center !important;"><p id="total_amount_after_sale_tax"><?php echo e(number_format(round($sale_order->total_amount_after_sale_tax),0)); ?></p></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row align-items-top">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                               
                                                <br>
                                                <br>
                                                <br>
                                             <div class="totlass">
                                                <h2><strong>Note:</strong></h2>
                                                <p><strong><?php echo e($sale_order->remark ?? 'N/A'); ?></strong></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <br>
                                               
                                            <div class="totals3">
                                                <div class="psds">
                                                    <?php echo e(CommonHelper::get_sale_tax_persentage_by_id($sale_order->sale_taxes_id)); ?>

                                                    <p id="sale_taxes_amount_rate" style="margin:0 !important;padding:0 !important;font-size:13px !important;font-weight:500 !important;"><?php echo e(number_format(round($sale_order->sale_taxes_amount_rate),0)); ?></p>
                                                </div>
                                                <div class="totlas">
                                                    <p>Total</p>
                                                    <p><?php echo e(number_format($sale_order->total_amount_after_sale_tax + $sale_order->sale_taxes_amount_rate)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-top">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                       
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                            <div class="sgnature2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm4 col-xs-4">
                                            <p><strong>Prepared By</strong> </p>
                                            <p><strong><?php echo e($sale_order->username); ?></strong> </p>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm4 col-xs-4">
    
                                            <p><strong>Approved By</strong> </p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm4 col-xs-4">
                                            <p><strong>Received By</strong> </p>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="vomp">
                                        <p><strong>
                                            Creation Time :
                                            <?php echo e(\Carbon\Carbon::parse($sale_order->timestamp)->format('d-M-Y h:i A')); ?>

                                        </strong></p>

                                        <!-- <p><strong>Creation Time :<?php echo e(\Carbon\Carbon::parse($sale_order->so_date)->format('d-M-Y')); ?></strong> </p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="contra">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="contraA">
                                            <h2>Date: </h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="con_rewB">
                                            <h2><?php echo e(date('d-M-Y', strtotime($sale_order->so_date))); ?></h2>

                                        </div>    
                                    </div>
                                </div>
                            </div> -->

                    <!--  -->
                    <!-- <div class="col-md-12 padtb text-right printHide">
                        <div class="col-md-9"></div>
                        <div class="col-md-3 my-lab">
                            <button type="submit" class="btn btn-primary mr-1" data-dismiss="modal">Approve</button>
                            <a type="button" href="<?php echo e(url('selling/listSaleOrder')); ?>"
                                class="btnn btn-secondary" data-dismiss="modal">Close</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- printView sale order -->
<!-- <script>
    function printView(divId) {
        var element = document.getElementById(divId);
        if (!element) {
            alert("Element with ID '" + divId + "' not found!");
            return;
        }

        var content = element.innerHTML;
        var mywindow = window.open('', 'PRINT', 'height=800,width=1200');

        mywindow.document.write('<html><head><title>Print</title>');

        // ✅ Bootstrap CSS include
        mywindow.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">');


        mywindow.document.write(`
            <style>
 

            </style>
        `);
        mywindow.document.write('</head><body>');
        mywindow.document.write(content);
        mywindow.document.write('</body></html>');
        mywindow.document.close();
        mywindow.focus();
        mywindow.print();
    }

    
</script> -->




<script>
  function printSection() {
    // ✅ Print CSS dynamically add karna
    const printStyle = `
      @media  print {
            @page{size:A4;margin:6mm 6mm 6mm 6mm !important;}
            .table-responsive .sale_older_tab > caption + thead > tr:first-child > th,.sale_older_tab > colgroup + thead > tr:first-child > th,.sale_older_tab > thead:first-child > tr:first-child > th,.sale_older_tab > caption + thead > tr:first-child > td,.sale_older_tab > colgroup + thead > tr:first-child > td,.sale_older_tab > thead:first-child > tr:first-child > td{border-top:0;font-size:10px !important;padding:9px 5px !important;}
            .table-responsive .sale_older_tab > thead > tr > th,.sale_older_tab > tbody > tr > th,.sale_older_tab > tfoot > tr > th,.sale_older_tab > thead > tr > td,.sale_older_tab > tbody > tr > td,.table > tfoot > tr > td{padding:2px 5px !important;font-size:11px !important;border-top:1px solid #000000 !important;border-bottom:1px solid #000000 !important;border-left:1px solid #000000 !important;border-right:1px solid #000000 !important;}
            .table-responsive{height:inherit !important;}
            .sales_or{position:relative !important;height:100% !important;}
            .sgnature{position:absolute !important;bottom:0px !important;}
            p{margin:0;padding:0;font-size:13px !important;font-weight:500;}
            .mt-top{margin-top:-72px !important;}
            .sale-list.userlittab > thead > tr > td,.sale-list.userlittab > tbody > tr > td,.sale-list.userlittab > tfoot > tr > td{font-size:12px !important;text-align:left !important;}
            .sale-list.table-bordered > thead > tr > th,.sale-list.table-bordered > tbody > tr > th,.sale-list.table-bordered > tfoot > tr > th{font-size:12px !important;margin:0 !important;vertical-align:inherit !important;padding:0px 17px !important;text-align:left !important;}
            input.form-control.form-control2{margin:0 !important;}
            .totlas p{font-weight:bold !important;}
            .psds p{font-weight:bold !important;}
            .totlass h2{font-size:13px !important;}
            .totlass{display:inline!important;background:transparent!important;margin-top:-25px!important;width:68%;float:left;}
            .col-lg-6{width:50% !important;}
            .col-lg-12{width:100% !important;}
            .col-lg-4{width:33.33333333% !important;}
            .totals3{width:37%;float:right;}
            .psds{display:flex;font-weight:bold;justify-content:space-between;}
            .totlas{display:flex;background:#ddd;justify-content:space-between;}
            .term{text-align:right;}
            .contr2{text-align:right;}


      }
    `;

    // ✅ Select element to print
    const printContent = document.getElementById('printsale-order').innerHTML;
    // ✅ Open new window for print
    const printWindow = window.open('', '', 'width=900,height=700');
    // ✅ Bootstrap 5 CSS link
    const bootstrapCSS = `<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">`;
    // ✅ Write content to print window
    printWindow.document.write(`
      <html>
      <head>
        <title>Print Preview</title>
        ${bootstrapCSS}
        <style>${printStyle}</style>
      </head>
      <body>
        ${printContent}
      </body>
      </html>
    `);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    // printWindow.close(); // optional
  }

  
    document.addEventListener("keydown", function(e) {
    if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === "p") {
        e.preventDefault();   // Stop default Print
        e.stopPropagation();  // Stop bubbling
        printView("printsale-order");  // Apna DIV ID yahan likho
    }
}, true);  // <-- CAPTURE MODE ENABLED (very important)
</script>
<!-- </head>
<body> -->
