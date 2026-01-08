<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e(\Carbon\Carbon::parse($data->date)->format("d-M-Y")); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_customer_name($data->buyers_id)); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_customer_address($data->buyers_id)); ?></td>
        <td>BA</td>
        <td><?php echo e($data->sku); ?></td>
        <td><?php echo e($data->product_barcode); ?></td>
        <td><?php echo e($data->product_name); ?></td>
        <td><?php echo e(\App\Helpers\CommonHelper::get_brand_by_id($data->brand_id)); ?></td>
        <td><?php echo e($data->qty); ?></td>
        <td><?php echo e($data->purchase_price); ?></td>
        <td><?php echo e($data->amount); ?></td>
        <td>1</td>
        <td><?php echo e($data->mrp_price); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>