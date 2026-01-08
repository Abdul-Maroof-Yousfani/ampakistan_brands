<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($item->sku); ?></td>
        <td><?php echo e($item->barcode); ?></td>
        <td><?php echo e($item->subitem_id); ?> <?php echo e($item->name); ?></td>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td>
                <?php echo e(isset($stocks[$item->subitem_id][$brand->id]) 
                        ? $stocks[$item->subitem_id][$brand->id] 
                        : 0); ?>

            </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>