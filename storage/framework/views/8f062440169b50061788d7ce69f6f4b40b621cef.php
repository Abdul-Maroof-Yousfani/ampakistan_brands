
<?php use App\Helpers\CommonHelper; ?>

<div>
<h3 style="text-align: center">Quarantine Stock</h2>
<table id="data" class="table table-bordered table-responsive">
       


            <thead>
            <th class="text-center">S.No</th>
            <th class="text-center">Item</th>
            <th class="text-center">UOM</th>
            <th class="text-center">Stock</th>

            </thead>
            <tbody id="filterDemandVoucherList">
            <?php
            $counter=1;
            ?>
            <?php $__currentLoopData = $quarintine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($counter++); ?></td>
                <td><?php echo e($data->sub_ic); ?></td>
                <td><?php echo e(CommonHelper::get_uom_name($data->uom)); ?></td>
                <td><?php echo e(number_format($data->qty)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

</div>