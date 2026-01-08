<?php $__currentLoopData = $outstandings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($data->rv_no); ?></td>
        <td><?php echo e($data->rv_date); ?></td>
        <td><?php echo e(explode("-", $data->description)[0]); ?></td>
        <td><?php echo e($data->description); ?></td>
        <td><?php echo e($data->brand_id ? \App\Helpers\CommonHelper::get_brand_by_id($data->brand_id) : 'N/A'); ?></td>
        <td><?php echo e($data->territory_id ? \App\Helpers\CommonHelper::territory_name($data->territory_id) : "N/A"); ?></td>
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
    
        <td>Deposit To</td>
        <td><?php echo e($data->cheque_no); ?></td>
        <td><?php echo e($data->bank ? \App\Helpers\CommonHelper::get_bank_account_by_id($data->bank)->bank_name : "N/A"); ?></td>
        <td><?php echo e($data->cheque_date); ?></td>
        <td><?php echo e(number_format($data->amount)); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>