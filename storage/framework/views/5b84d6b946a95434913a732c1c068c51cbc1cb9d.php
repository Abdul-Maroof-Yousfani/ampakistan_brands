<?php $__currentLoopData = $sales_report_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center"><?php echo e($data->product_name); ?></td>
        <td><?php echo e($data->name); ?></td>
        <td><?php echo e($data->main_ic ?? "N/A"); ?></td>
        <td><?php echo e($data->main_ic ?? "N/A"); ?></td>
        <td class="text-center"><?php echo e($data->voucher_no); ?></td>
        <td class="text-center"><?php echo e($data->product_barcode); ?></td>
        <td class="text-center"><?php echo e($data->qty); ?></td>
        <td class="text-center"><?php echo e($data->qty); ?></td>
        <td><?php echo e($data->net_amount); ?></td>
        <td><?php echo e($data->discount_amount); ?></td>
        <td><?php echo e((int)$data->sales_tax + (int)$data->sales_tax_further); ?></td>
        <td class="text-center"><?php echo e($data->amount); ?></td>
        <td class="text-center"><?php echo e($data->cogs); ?></td>
        <td class="text-center"></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>