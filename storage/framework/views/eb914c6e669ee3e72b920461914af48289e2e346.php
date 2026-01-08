<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($data->branch ?? "N/A"); ?></td>
        <td><?php echo e($data->territory_name); ?></td>
        <td><?php echo e(\App\Helpers\CommonHelper::get_name_warehouse($data->warehouse_from)); ?></td>
        <td><?php echo e($data->customer_code); ?></td>
        <td><?php echo e($data->name); ?></td>
        <td><?php echo e($data->address); ?></td>
        <td><?php echo e(1); ?></td>
        <td><?php echo e($data->gi_no); ?></td>
        <td><?php echo e($data->brand_id ? \App\Helpers\CommonHelper::get_brand_by_id($data->brand_id) : "N/A"); ?></td>
        <td><?php echo e(\Carbon\Carbon::parse($data->gd_date)->format("d-M-y")); ?></td>
        <td><?php echo e($data->sales_person ?? "N/A"); ?></td>
        <td><?php echo e(number_format($data->invoice_amount)); ?></td>
        <td><?php echo e($data->rv_no ? $data->rv_no : "N/A"); ?></td>
        <td><?php echo e(number_format($data->receipt_amount)); ?></td>
        <td>
            <?php if($data->pay_mode == 1): ?>
                Cheque
            <?php elseif($data->pay_mode == 2): ?>
                Cash
            <?php elseif($data->pay_mode == 3): ?>
                Online Transfer
            <?php else: ?>
                N/A
            <?php endif; ?>
        </td>
        <td><?php echo e($data->cr_no ?? "-"); ?></td>
        <td><?php echo e(number_format($data->sale_return_amount)); ?></td>
        <td>Adjustment Doc No</td>
        <td><?php echo e(number_format($data->sale_return_amount)); ?></td>
        <td>Remarks</td>
        <td>0</td>
        <td><?php echo e(number_format($data->sale_return_amount)); ?></td>
        <td>Outstanding</td>
        <td>Difference</td>
        <td><?php echo e(number_format($data->more_than_one_eighty_days_due)); ?></td>
        <td><?php echo e(number_format($data->ninety_one_to_one_seventy_nine_days_due)); ?></td>
        <td><?php echo e(number_format($data->fourty_five_to_ninety_days_due)); ?></td>
        <td><?php echo e(number_format($data->one_to_fourty_five_days_due)); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>