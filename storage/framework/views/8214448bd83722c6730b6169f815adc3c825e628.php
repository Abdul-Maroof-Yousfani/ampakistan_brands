<?php 
    $count = 1;
?>    

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="tr<?php echo e($count); ?>">
    <td><?php echo e(str_replace('_', ' ', $value->type)); ?></td>
    <td><?php echo e($value->name); ?></td>
    <td><?php echo e($value->limit); ?></td>
    <td><?php echo e($value->limit_utilized); ?></td>
    <td><?php echo e($value->un_utilized); ?></td>
    <td><?php echo e($value->remaining_percentage); ?></td>
     
    </tr>
    <?php 
    $count ++;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

