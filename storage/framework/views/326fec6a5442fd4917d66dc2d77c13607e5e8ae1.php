<?php $__env->startSection('content'); ?>
<div class="well_N">
    <h1>List of Brands</h1>

    <table class="table table-bordered sf-table-list">
        <thead >
            <tr class="text-center">
                <th class="text-center">SR No</th>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th>Principal Group</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <td><?php echo e(++$key); ?></td>
                    <td><?php echo e($brand->name); ?></td>
                    <td><?php echo e($brand->description); ?></td>
                      <td><?php echo e($brand->principalGroup->products_principal_group ?? '-'); ?></td>
                    <td><a href="<?php echo e(route('brands.edit', $brand->id)); ?>">Edit</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>