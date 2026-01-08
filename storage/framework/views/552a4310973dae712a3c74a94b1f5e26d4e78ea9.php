<?php
use App\Helpers\CommonHelper;
use App\Helpers\SalesHelper;
$counter = 1;
$total = 0; ?>

<?php $__currentLoopData = $sale_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $data = SalesHelper::get_so_amount($row->id); ?>
    <?php $customer = CommonHelper::byers_name($row->buyers_id); ?>
    <tr <?php if($row->so_type == 1): ?> style="background-color: lightyellow" <?php endif; ?> title="<?php echo e($row->id); ?>"
        id="<?php echo e($row->id); ?>">
        <td class="text-center"><?php echo e($counter++); ?></td>
        <td title="<?php echo e($row->id); ?>" class="text-center">
            <?php if($row->so_type == 0): ?>
                <?php echo e(strtoupper($row->so_no)); ?>

            <?php else: ?>
                <?php echo e(strtoupper($row->so_no . ' (' . $row->description . ')')); ?>

            <?php endif; ?>
        </td>
        <td class="nowrap">
    
      <?php echo e(\Carbon\Carbon::parse($row->timestamp)->format('d-M-Y')); ?><br>
                            <?php echo e(\Carbon\Carbon::parse($row->timestamp)->format('h:i:s A')); ?>

    
    </td>

        <td class="text-center"><strong><?php echo e($customer->name); ?></strong></td>
        <!-- <?php
            $total_tax_ammount = ($data->amount / 100) * $data->sales_tax_rate;

        ?> -->

        <?php
            $lineTotal = $row->total_amount_after_sale_tax + $row->sale_taxes_amount_rate;
            $total += $lineTotal;
        ?>
        <td class="text-right"><?php echo e(number_format($lineTotal, 0)); ?></td>

        <td style="text-align:left;" class="text-center">
            <?php echo e(!empty($row->remark) ? $row->remark : '-'); ?>

        </td>

        <td class="text-center">
            <div class="dropdown">
                <button class="drop-bt dropdown-toggle"type="button" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu">
                    <li>
                        <button
                            onclick="showDetailModelOneParamerter('selling/viewSaleOrderPrint/<?php echo e($row->id); ?>',<?php echo e($row->id); ?>,'View Sale Order ')"
                            type="button" style="width:100%;" class="btn btn-success btn-xs">View</button>
                        <button onclick="delivery_note('<?php echo $row->id; ?>','<?php echo $m; ?>')"type="button"
                            class="btn btn-success btn-xs">Create Delivery Note</button>
        </td>
        </li>
        </ul>
        </div>



    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



