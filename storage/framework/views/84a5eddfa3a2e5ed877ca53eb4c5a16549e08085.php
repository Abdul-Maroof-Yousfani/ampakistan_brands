<?php $__currentLoopData = $sales_order_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center"><?php echo e($data->product_name); ?></td>
        <td><?php echo e($data->name); ?></td>
        <td class="text-center"><?php echo e($data->sku_code); ?></td>
        <td class="text-center"><?php echo e(App\Helpers\CommonHelper::get_group_by($data->group_id)); ?></td>
        <td class="text-center"><?php echo e($data->product_barcode); ?></td>
        <td class="text-center"><?php echo e($data->qty); ?></td>
        <td class="text-center"><?php echo e($data->qty); ?></td>
        <td><?php echo e($data->sub_total); ?></td>
        <td><?php echo e($data->discount_amount_2 + $data->discount_amount_1); ?></td>
        <td><?php echo e($data->tax_amount); ?></td>
        <td class="text-center"><?php echo e($data->amount); ?></td>
        <td class="text-center"><?php echo e($data->cogs); ?></td>
        <td class="text-center"></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>