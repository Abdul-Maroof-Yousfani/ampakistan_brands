<?php $__env->startSection('content'); ?>

<div class="row well_N align-items-center">
    <div class="col-md-4">
        <ul class="cus-ul">
            <li><h1>Inventory Master</h1></li>
            <li>
                <h3>
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    &nbsp;Principal Group
                </h3>
            </li>
        </ul>
    </div>

    <div class="col-md-8 text-right">
        <a href="<?php echo e(route('createProductsPrincipalGroup')); ?>" class="btn btn-primary">
            Create New
        </a>
    </div>
</div>

<div class="well_N">
    <div class="dp_sdw2">

        <div class="panel">
            <div class="panel-body">

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="subHeadingLabelClass">Products Principal Group List</h3>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table cus-tab table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="60">S.No</th>
                                <th>Products Principal Group</th>
                                <th width="120">Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>

                        <tbody id="data">
                            <?php $i = 1; ?>

                            <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i); ?></td>

                                <td><?php echo e($response->products_principal_group); ?></td>

                                <td>
                                    <?php if($response->status == 1): ?>
                                        <span class="label label-success">Active</span>
                                    <?php else: ?>
                                        <span class="label label-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm dropdown-toggle"
                                                type="button" data-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo e(route('editProductsPrincipalGroup', $response->id)); ?>" 
                                                   class="dropdown-item">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a href="<?php echo e(route('deleteProductsPrincipalGroup', $response->id)); ?>" 
                                                   class="dropdown-item text-danger"
                                                   onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>