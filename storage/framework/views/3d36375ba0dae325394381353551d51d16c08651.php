<?php $__currentLoopData = $net_sales_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e(++$index); ?></td>
        <td><?php echo e($data->product_name); ?></td>
        <td><?php echo e($data->brand_name); ?></td>
        <td><?php echo e($data->customer_name); ?></td>
        <td><?php echo e($data->territory_name); ?></td>
        <td><?php echo e($data->customer_code); ?></td>
        <td><?php echo e($data->sku); ?></td>
        <td><?php echo e($data->product_type); ?></td>
        <td>0</td>
        <td><?php echo e($data->barcode); ?></td>
        <td><?php echo e(number_format($data->qty, 0)); ?></td>
        <td><?php echo e(number_format($data->qty, 0)); ?></td>
        <td><?php echo e($data->cog); ?></td>
        <td><?php echo e(number_format($data->amount, 2)); ?></td>
        <td><?php echo e(number_format($data->discount_amount, 2)); ?></td>
        <td><?php echo e(number_format($data->tax_amount, 2)); ?></td>
        <td><?php echo e(number_format($data->net_amount, 2)); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>