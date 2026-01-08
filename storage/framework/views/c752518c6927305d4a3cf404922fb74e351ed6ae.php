<table class="table table-bordered sf-table-list">
    <thead>
    <tr class="text-center">
        <th class="text-center">Ba No</th>
        <th class="text-center">Customer</th>
        <th class="text-center">Employee</th>
        <th class="text-center">Target Qty</th>
        <th class="text-center">Start Date</th>
        <th class="text-center">End Date</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $BaTargets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$BAFormation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="text-center">
            <td class="text-center"><?php echo e($key+1); ?></td>
            <td class="text-center"><?php echo e($BAFormation->customer_name); ?></td>
            <td class="text-center"><?php echo e($BAFormation->employee_name); ?></td>
            <td class="text-center"><?php echo e($BAFormation->target_qty); ?></td>
            <td class="text-center"><?php echo e($BAFormation->start_date); ?></td>
            <td class="text-center"><?php echo e($BAFormation->end_date); ?></td>
            <td class="text-center"><?php echo e($BAFormation->status == 0 ? 'Inactive' : 'Active'); ?> </td>
            <td class="text-center">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo e($BAFormation->id); ?>">
                    Edit
                </button>
                <div class="modal fade" id="editmodal<?php echo e($BAFormation->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create BA Formation</h5>
                            </div>
                            <div class="modal-body">
                                <form id="submitadv" action="<?php echo e(route('baTargets.update',$BAFormation->id)); ?>" method="POST">
                                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" id="listRefresh" value="<?php echo e(route('list.baTargets')); ?>">
                                    <div class="mb-3">
                                        <label for="customers" class="form-label">Customers</label>
                                        <select class="form-select select2" id="customers" name="customer" style="width: 100%;">
                                            <option value="">Select Customers</option>
                                            <?php $__currentLoopData = App\Helpers\SalesHelper::get_all_customer_only_distributors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($BAFormation->customer_id == $row->id ? 'selected' : ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employee" class="form-label">Employee</label>
                                        <select class="form-select select2" id="employee" name="employee" style="width: 100%;">
                                            <option value="">Select Employee</option>
                                            <?php $__currentLoopData = App\Helpers\SalesHelper::get_all_employees(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($BAFormation->employee_id == $row->id ? 'selected' : ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="brands" class="form-label">Brands</label>
                                        <select multiple class="form-select select2" id="brands<?php echo e($BAFormation->id); ?>" name="brands[]" style="width: 100%;">
                                            <?php $__currentLoopData = App\Helpers\CommonHelper::get_all_subitems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(in_array($item->id, $BAFormation->brands ?? []) ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->product_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="brands" class="form-label">Start Date</label>
                                        <input type="date" value="<?php echo e($BAFormation->start_date); ?>" name="start_date" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="brands" class="form-label">End Date </label>
                                        <input type="date" value="<?php echo e($BAFormation->end_date); ?>" name="end_date" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="brands" class="form-label">Targeted Qty</label>
                                        <input type="number" value="<?php echo e($BAFormation->target_qty); ?>" name="target_qty" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select select2" name="status" id="status" style="width: 100%;">
                                            <option  <?php echo e($BAFormation->status == 1 ? 'selected' : ''); ?> value="1">Active</option>
                                            <option  <?php echo e($BAFormation->status == 0 ? 'selected' : ''); ?>  value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button style="margin-top: 10px" type="submit" class="btn btn-primary my-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div id="paginationLinks">
    <?php echo e($BaTargets->links()); ?>

</div>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        // Attach select2 to elements when the modal is shown
        $('body').on('shown.bs.modal', '.modal', function () {
            $(this).find('.select2').select2({
                width: '100%',
                allowClear: true
            });
        });
    });
</script>
