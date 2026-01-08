<?php $__env->startSection('content'); ?>
<div class="well_N">
    <h2>Create Brand</h2>
    <form action="<?php echo e(route('brands.store')); ?>" method="POST">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="row">

            
            <div class="col-md-6 mb-3">
                <label for="principal_group_id">Principal Group <span class="text-danger">*</span></label>
                <select name="principal_group_id" id="principal_group_id" class="form-control" required>
                    <option value="">-- Select Principal Group --</option>
                    <?php $__currentLoopData = $principalGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->products_principal_group); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            
            <div class="col-md-6 mb-3">
                <label for="name">Brand Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            
            <div class="col-md-12 mb-3">
                <label for="description">Brand Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary px-4">Create</button>
            </div>

        </div>
  

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>