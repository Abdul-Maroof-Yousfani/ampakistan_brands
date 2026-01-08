<?php $__currentLoopData = $sales_report_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center"><?php echo e($loop->iteration); ?></td>
        <td><?php echo e(\App\Helpers\CommonHelper::territory_name($data->territory_id)); ?></td>
        <td><?php echo e(\App\Helpers\CommonHelper::get_city_name_by_id($data->city)->name ?? "N/A"); ?></td>
        <td><?php echo e(\App\Helpers\CommonHelper::get_name_warehouse($data->warehouse_from) ?? "N/A"); ?></td>
        <td><?php echo e(\App\Helpers\CommonHelper::get_buyer_detail($data->buyers_id)->name); ?></td>
        <td class="text-center"><?php echo e($data->brand_name); ?></td>
        <td class="text-center"><?php echo e($data->main_ic ?? "N/A"); ?></td>
        <td class="text-center"><?php echo e($data->gi_no); ?></td>
        <td class="text-center"><?php echo e(App\Helpers\CommonHelper::get_company_group_by($data->group_id)); ?></td>
        <td class="text-center"><?php echo e($data->hs_code); ?></td>
        <td class="text-center"><?php echo e(\Carbon\Carbon::parse($data->despacth_document_date)->format("d-M-Y")); ?></td>
        <td><?php echo e(number_format($data->retail_value)); ?></td>
        <td><?php echo e($data->qty); ?></td>
        <td><?php echo e(number_format($data->amount - $data->tax_amount + $data->discount_amount, 2)); ?></td>
        <td class="text-center"><?php echo e(number_format($data->discount_amount, 2) ?? 0); ?></td>
        <td class="text-center"><?php echo e(number_format($data->tax_amount, 2) ?? 0); ?></td>
        <?php
            $additional_st = App\Helpers\CommonHelper::get_additional_sales_tax($data->so_no) ? App\Helpers\CommonHelper::get_additional_sales_tax($data->so_no)->sale_taxes_amount_rate : 0;
        ?>
        <td class="text-center"><?php echo e($additional_st); ?></td>
        <td class="text-center"><?php echo e(number_format($data->net_amount + $additional_st, 2)); ?></td>
        
        
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
