<?php
use App\Helpers\CommonHelper;
use App\Helpers\SalesHelper;
$counter = 1;$total=0;?>

<?php $__currentLoopData = $sale_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $data=SalesHelper::get_so_amount($row->id); ?>
    <?php $customer=CommonHelper::byers_name($row->buyers_id); ?>
    <tr <?php if($row->so_type==1): ?> style="background-color: lightyellow" <?php endif; ?> title="<?php echo e($row->id); ?>" id="<?php echo e($row->id); ?>">
        <td class="text-center"><?php echo e($counter++); ?></td>
        <td title="<?php echo e($row->id); ?>" class="text-center"><?php if($row->so_type==0): ?> <?php echo e(strtoupper($row->so_no)); ?> <?php else: ?> <?php echo e(strtoupper($row->so_no.' ('.$row->description.')')); ?><?php endif; ?></td>
        <td class="text-center"><?php echo e($row->packing_list_no); ?></td>
        <td class="text-center"><?php  echo CommonHelper::changeDateFormat($row->so_date);?></td>
        <td class="text-center"><?php echo e($row->model_terms_of_payment); ?></td>
        <td class="text-center"><?php echo e($customer->name); ?></td>
        <?php
        $total_tax_ammount = $data->amount/100*$data->sales_tax_rate;


        ?>
    

        <td class="text-center"><button
                    onclick="showDetailModelOneParamerter('selling/viewSaleOrderPrint/<?php echo e($row->id); ?>',<?php echo e($row->id); ?>,'View Sale Order ')"
                    type="button" class="btn btn-success btn-xs">View</button></td>

        <td class="text-center"><button
                    onclick="delivery_challan('<?php echo $row->id?>','<?php echo $row->packing_id?>','<?php echo $row->qc_packing_id?>','<?php echo $m ?>')"
                    type="button" class="btn btn-primery btn-xs">Create Delivery Note</button></td>
    </tr>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>