<?php $__env->startSection('content'); ?>
<?php echo $__env->make('number_formate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
.select2-container { font-size: 11px; }
.table-scroll { max-height: 500px; overflow: auto; display: block; }
.table thead th { position: sticky; top: 0; background: #f9f9f9; }
input.discount-cell { width: 80px; }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="well_N">
            <span class="subHeadingLabelClass">Brand Discount</span>
            <div class="lineHeight">&nbsp;</div>

            <?php echo Form::open(['url' => 'sales/assignDicount','id'=>'assignDicount']); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="m" value="<?php echo e($_GET['m'] ?? ''); ?>">

            <div class="row">
                <!-- Store Selection -->
                <div class="col-lg-4">
                    <label class="sf-label">Store: <span class="rflabelsteric">*</span></label>
                    <select class="form-control requiredField select2" name="store_id[]" id="store_id" multiple>
                        <option value="all">All Stores</option>
                        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Brand Selection -->
                <div class="col-lg-4">
                    <label class="sf-label">Brand: <span class="rflabelsteric">*</span></label>
                    <select class="form-control requiredField select2" name="brand_id[]" id="brand_id" multiple>
                        <option value="all">All Brands</option>
                        <?php $__currentLoopData = $Brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Load Button -->
                <div class="col-lg-4 d-flex align-items-end">
                    <button type="button" id="loadMatrix" style="margin-top: 39px;" class="btn btn-primary">Load Data</button>
                </div>
            </div>

            <div class="lineHeight">&nbsp;</div>

            <!-- Dynamic Excel-style table -->
            <div id="discountTableContainer"></div>

            <!-- Submit Button (hidden by default, shown after Load Data) -->
             <br><br>
            <div class="row mt-3">
                <div class="col-lg-12 text-center" style="margin-left: 22%;">
                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'submitBtn', 'style' => 'display:none;'])); ?>

                </div>
            </div>

            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.select2').select2();

    $('#loadMatrix').click(function() {
        let selectedStores = $('#store_id').val();
        let selectedBrands = $('#brand_id').val();

        if(!selectedStores || !selectedBrands) {
            alert('Please select at least one store and one brand.');
            return;
        }

        // Replace "all" with actual IDs
        if(selectedStores.includes('all')) {
            selectedStores = <?php echo json_encode($stores->pluck('id'), 15, 512) ?>;
        }
        if(selectedBrands.includes('all')) {
            selectedBrands = <?php echo json_encode($Brands->pluck('id'), 15, 512) ?>;
        }

        let table = '<div class="table-scroll"><table class="table table-bordered"><thead><tr><th>Store</th>';
        
        // Table headers
        selectedBrands.forEach(function(brandId) {
            let brandName = $('option[value="'+brandId+'"]', '#brand_id').text();
            table += '<th>'+brandName+'</th>';
        });
        table += '</tr></thead><tbody>';

        // Table rows
        selectedStores.forEach(function(storeId) {
            let storeName = $('option[value="'+storeId+'"]', '#store_id').text();
            table += '<tr><td>'+storeName+'<input type="hidden" name="stores[]" value="'+storeId+'"></td>';

            selectedBrands.forEach(function(brandId) {
                // Check if discount exists for this store+brand
                let discountValue = 0;
                if(<?php echo json_encode($discounts, 15, 512) ?>) {
                    let key = storeId + '_' + brandId;
                    discountValue = <?php echo json_encode($discounts, 15, 512) ?>[key]?.discount ?? 0;
                }
                table += '<td><input type="number" step="0.01" class="form-control discount-cell" name="discounts['+storeId+']['+brandId+']" value="'+discountValue+'"></td>';
            });

            table += '</tr>';
        });

        table += '</tbody></table></div>';

        // Add table inside container
        $('#discountTableContainer').html(table);

        // Show submit button after loading table
        $('#submitBtn').show();
    });
});
</script>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>