<table class="table table-bordered sf-table-list" id="TableExportToCsv">
    <thead>
    <tr class="text-center">
        <th class="text-center">Ba No</th>
        <th class="text-center">Customer</th>
        <th class="text-center">Employee</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $BAFormations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BAFormation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="text-center">
            <td class="text-center"><?php echo e($BAFormation->ba_no); ?></td>
            <td class="text-center"><?php echo e($BAFormation->customer_name); ?></td>
            <td class="text-center"><?php echo e($BAFormation->employee_name); ?></td>
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
                                <form id="submitadv" action="<?php echo e(route('baFormation.update',$BAFormation->id)); ?>" method="POST">
                                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" id="listRefresh" value="<?php echo e(route('list.baFormation')); ?>">
                                    <div class="mb-3">
                                        <label for="customers" class="form-label">Customers</label>
                                        <select  multiple class="form-select select2" id="customers" name="customer" style="width: 100%;">
                                            <option value="">Select Customers</option>
                                            <?php $__currentLoopData = App\Helpers\SalesHelper::get_all_customer_only_distributors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($BAFormation->customer_id == $row->id ? 'selected' : ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employee" class="form-label">Employee</label>
                                        <select  multiple class="form-select select2" id="employee" name="employee" style="width: 100%;">
                                            <option value="">Select Employee</option>
                                            <?php $__currentLoopData = App\Helpers\SalesHelper::get_all_employees(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($BAFormation->employee_id == $row->id ? 'selected' : ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="brands" class="form-label">Brands</label>
                                        <select multiple class="form-select select2" id="brands<?php echo e($BAFormation->id); ?>" name="brands[]" style="width: 100%;">
                                            <?php $__currentLoopData = App\Helpers\CommonHelper::get_all_brand(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(in_array($item->id, json_decode($BAFormation->brands_ids, true) ?? []) ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select  multiple class="form-select select2" name="status" id="status" style="width: 100%;">
                                            <option  <?php echo e($BAFormation->status == 1 ? 'selected' : ''); ?> value="1">Active</option>
                                            <option  <?php echo e($BAFormation->status == 0 ? 'selected' : ''); ?>  value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button style="margin-top: 10px" type="submit" class="btn btn-primary my-2">Create</button>
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

   <script>
$("#TableExportToCsv").DataTable({
    ordering: true,
    searching: true,
    paging: true,
    info: false,
    autoWidth: false, // prevent DataTables from auto-calculating width
});

</script>
