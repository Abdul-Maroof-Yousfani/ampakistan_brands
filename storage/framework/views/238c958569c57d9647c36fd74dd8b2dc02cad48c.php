<?php
// use App\Helpers\App\Helpers\CommonHelper;
// use App\Helpers\FinanceHelper;
// $from = Input::get('fromDate');
// $to = Input::get('toDate');
// $acc_id = explode(',', Input::get('accountName'));
// $acc_id = $acc_id[0];

// // paid to
// $cost_center = Input::get('paid_to');

// if ($cost_center != 0):
//     $clause = 'and sub_department_id="' . $cost_center . '"';
// else:
//     $clause = '';
// endif;

// // end
// $m = Input::get('m');

?>
<style>
    .hov:hover {
        background-color: yellow;
    }
</style>



<div id="">
    <div class="row">
       
    </div>
    <div class="row">
     
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 style="text-align: center;">Unit Activity List</h3>
        </div>
    </div>
    <div style="line-height:5px;">&nbsp;</div>
    <table class="table table-bordered sf-table-th sf-table-list" id="table_export1">
     
        <thead>

            <tr>
                <th style="width: 100px" class="text-center">S.No</th>
                <th style="width: 120px" class="text-center">Item ID</th>
                <th style="width: 120px" class="text-center">Date</th>
                <th style="width: 120px" class="text-center">Item Description</th>
                <th style="width: 120px" class="text-center">Transaction Type</th>
                <th class="text-center" style="width:100px;">Warehouse</th>
                <th class="text-center" style="width:100px;">User</th>
                <th class="text-center" style="width:100px;">Ref</th>
                <th class="text-center" style="width:100px;">Received Qty</th>
                <th class="text-center" style="width:100px;">Issued Qty</th>
                <th class="text-center" style="width:100px;">Stock in transit</th>
            </tr>
        </thead>
        <?php
            $received_qty = 0;
            $issued_qty = 0;
        ?>
        <tbody id="<?php // echo $member_id;
        ?>">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Opening Balance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo e(number_format($received_opening_bal)); ?></td>
                    <td><?php echo e(number_format($issued_opening_bal)); ?></td>
                    <td><?php echo e(number_format($transit_bal)); ?></td>
                </tr>
            <?php $__currentLoopData = $unit_activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $unit_activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($unit_activity->sub_item_id); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($unit_activity->voucher_date)->format("d-M-Y")); ?></td>
                    <td><?php echo e($unit_activity->product_name); ?></td>
                    <?php if($unit_activity->voucher_type == 1): ?>
                        <td>GRN</td>
                    <?php elseif($unit_activity->voucher_type == 2): ?>
                        <td>Purchase Return</td>
                    <?php elseif($unit_activity->voucher_type == 3): ?>
                        <td>Stock Transfer</td>
                    <?php elseif($unit_activity->voucher_type == 4): ?>
                        <td>Stock Received</td>
                    <?php elseif($unit_activity->voucher_type == 5 || $unit_activity->voucher_type == 50): ?>
                        <td>Sales</td>
                    <?php elseif($unit_activity->voucher_type == 7): ?>
                        <td>Issuance</td>
                    <?php endif; ?>
                    <td><?php echo e($unit_activity->warehouse_name); ?></td>
                    <td><?php echo e($unit_activity->username); ?></td>
                    <td>
                        <?php
                        
                            $m = $_GET['m'];
                            $url = "";
                            $text = "";
                            $voucher_no =  strtolower($unit_activity->voucher_no);
                            if(str_contains($voucher_no, "tr")) {
                                $url = "stdc/viewStockTransferDetail?m=".$m;
                                $text = "View Stock Transfer Detail";
                            } 
                            if(str_contains($voucher_no, "dn")) {
                                $delivery_note = App\Models\DeliveryNote::select("id")->where("gd_no", $voucher_no)->first();
                                $url = 'sales/viewDeliveryNoteDetail/' . ($delivery_note ? $delivery_note->id : '');
                                $text = "View Delivery Note";
                            }
                            if(str_contains($voucher_no, "SO")) {
                                $sale_order = App\Models\Sales_Order::select("id")->where("so_no", $voucher_no)->first();
                                $url = 'selling/viewSaleOrderPrint/' . $voucher_no;
                                $text = "View Sale Order";
                            }
                            // 'selling/viewSaleOrderPrint/{{ $sale_order->id }}'
                            // 
                        ?>
                        <a onclick="showDetailModelOneParamerter('<?php echo e($url); ?>', '<?php echo e($unit_activity->voucher_no); ?>','<?php echo e($text); ?>')" target="_blank"><?php echo e($unit_activity->voucher_no); ?></a>

                    </td>
                    <?php if($unit_activity->voucher_type == 2 || $unit_activity->voucher_type == 3 || $unit_activity->voucher_type == 4): ?>
                        <td><?php echo e(number_format($unit_activity->qty, 0)); ?></td>
                        <?php
                            $received_qty += $unit_activity->qty;
                        ?>
                    <?php else: ?>
                        <?php
                            $received_qty += 0;
                        ?>
                        <td>0</td>
                    <?php endif; ?>
                    <?php if($unit_activity->voucher_type == 1 || $unit_activity->voucher_type == 5 || $unit_activity->voucher_type == 7 || $unit_activity->voucher_type == 50): ?>
                        <?php
                            $issued_qty += $unit_activity->qty;
                        ?>
                        <td><?php echo e(number_format($unit_activity->qty, 0)); ?></td>
                    <?php else: ?>
                        <?php
                            $issued_qty += 0;
                        ?>
                        <td>0</td>
                    <?php endif; ?>
                    <td></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

            <tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo e($received_qty); ?></td>
                <td><?php echo e($issued_qty); ?></td>
                <td></td>
            </tr>

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(e) {
        $('#print2').click(function() {
            $("div").removeClass("table-responsive");
            $("div").removeClass("well");
            $("a").removeAttr("href");
            //$("a.link_hide").contents().unwrap();
            var content = $("#content").html();
            document.body.innerHTML = content;
            //var content = document.getElementById('header').innerHTML;
            //var content2 = document.getElementById('content').innerHTML;
            window.print();
            location.reload();
        });
    });
</script>
