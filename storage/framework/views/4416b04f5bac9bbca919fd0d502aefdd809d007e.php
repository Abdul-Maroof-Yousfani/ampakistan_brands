<?php $__env->startSection('content'); ?>
<div class="well_N">
    <h2>Edit Brand</h2>
      <form action="<?php echo e(route('brands.update',$brand->id)); ?>" method="POST">

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text" name="name" id="name" value="<?php echo e($brand->name); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Brand Description</label>
            <textarea name="description" id="description" class="form-control"><?php echo e($brand->description); ?></textarea>
        </div>

        <div class="form-group">
            <label for="principal_group_id">Principal Group</label>
            <select name="principal_group_id" id="principal_group_id" class="form-control" required>
                <option value="">-- Select Principal Group --</option>
                <?php $__currentLoopData = $principalGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($group->id); ?>"
                        <?php echo e($brand->principal_group_id == $group->id ? 'selected' : ''); ?>>
                        <?php echo e($group->products_principal_group); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>