<?php $__currentLoopData = $sales_report_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($data->cr_no); ?></td>
        <td><?php echo e($data->customer_name); ?></td>
        <td><?php echo e($data->product_name); ?></td>
        <td><?php echo e($data->brand_name); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_company_group_by($data->group_id)); ?></td>
        <td><?php echo e($data->hs_code); ?></td>
        <td><?php echo e($data->qty); ?></td>
        <td><?php echo e($data->qty); ?></td>
        <td><?php echo e($data->packing); ?></td>
        <td><?php echo e($data->qty); ?>;</td>
        <td><?php echo e($data->sale_price); ?></td>
        <?php
            $gross_amount = $data->amount - $data->tax_amount + $data->discount_amount + $data->second_discount_amount;
       ?>
        <td><?php echo e($gross_amount); ?></td>
        <td><?php echo e(($data->discount_amount / $gross_amount) * 100); ?></td>
        <td><?php echo e($data->discount_amount); ?></td>
        <td><?php echo e(($data->second_discount_amount / $gross_amount) * 100); ?></td>
        <td><?php echo e($data->second_discount_amount ?? 0); ?></td>
        <td><?php echo e(round(($data->tax_amount / $gross_amount) * 100)); ?></td>
        <td><?php echo e($data->tax_amount); ?></td>
        <td><?php echo e($data->amount); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>