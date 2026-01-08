<style>
.table-responsive { overflow-y: auto; }
.totals-row { font-weight: bold; background-color: #f5f5f5; }
.table-bordered > thead > tr > th {
    white-space: nowrap !important;
    position: sticky;
    top: 0;
    z-index: 2;
}
.table-wrapper { max-height: 900px; overflow-y: auto; }
</style>

<?php
    $warehouseTotals = [];
    foreach ($warehouses as $id => $name) {
        $warehouseTotals[$id] = 0;
    };
    $grandTotal = 0;
     $transitTotal = 0; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h3>Closing Stock Report</h3>
            <h5><?php echo e(date('d-M-Y', strtotime($to_date))); ?></h5>
            <!-- <h5><?php echo e(date('d-M-Y', strtotime($from_date))); ?> to <?php echo e(date('d-M-Y', strtotime($to_date))); ?></h5> -->
        </div>
    </div>

    <div class="table-responsive table-wrapper">
        <table class="table table-bordered table-striped" id="exportTable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>SKU Code</th>
                    <th>Item Name</th>
                    <th>Barcode</th>
                    <th>Item Type</th>
                    <th>Brand</th>
                    <th>Packing</th>
                     <th>Stock in Transit (Pcs)</th>

                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouseName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($warehouseName); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <th>Total</th> 
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $rowTotal = 0;

                           $transitVal = (int)($row['transit_stock'] ?? 0); // New field
                        $transitTotal += $transitVal;
                    ?>
                    <tr>
                        <td><?php echo e($counter++); ?></td>
                        <td><?php echo e($row['sku_code']); ?></td>
                        <td><?php echo e($row['product_name']); ?></td>
                        <td><?php echo e($row['barcode']); ?></td>
                        <td><?php echo e($row['item_type'] ?? 'N/A'); ?></td>

                        <!-- <td><?php echo e($row['item_type'] != 1 ? 'Commercial' : 'Non-Commercial'); ?></td> -->
                        <td><?php echo e($row['brand'] ?? 'N/A'); ?></td>
                        <td><?php echo e($row['packing']); ?></td>
                         <td><?php echo e(($transitVal)); ?></td>

                        <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $wName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $val = (int)($row[$wName] ?? 0);  // use warehouse name, not ID
                                $warehouseTotals[$id] += $val;
                                $rowTotal += $val;
                            ?>
                            <td><?php echo e(($val)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <td><?php echo e(($rowTotal)); ?></td>
                        <?php $grandTotal += $rowTotal; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            
            <tfoot>
                <tr class="totals-row">
                    <td colspan="7" class="text-end">Total</td>
                      <td><?php echo e(($transitTotal)); ?></td> 

                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $wName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(($warehouseTotals[$id])); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <td><?php echo e(($grandTotal)); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
