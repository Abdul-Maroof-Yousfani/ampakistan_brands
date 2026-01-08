<?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>1</td>
        <td><?php echo e(\App\Helpers\CommonHelper::get_territory_name($store->territory_id)); ?></td>
        <td><?php echo e($store->customer_code); ?></td>
        <td><?php echo e($store->name); ?></td>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td>
                <?php echo e(isset($stocks[$store->customer_id][$brand->id]) 
                        ? $stocks[$store->customer_id][$brand->id] 
                        : 0); ?>

            </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>