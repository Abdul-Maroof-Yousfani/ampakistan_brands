<?php
use App\Helpers\FinanceHelper;
$accType = Auth::user()->acc_type;
if($accType == 'client'){
    $m = $_GET['m'];
}else{
    $m = Auth::user()->company_id;
}
?>


<?php $__env->startSection('content'); ?>
    <div class="well_N">
    <div class="dp_sdw">    
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="display: none;">
                        <?php echo $__env->make('Purchase.'.$accType.'purchaseMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="subHeadingLabelClass">View Warehouse List</span>
                                </div>
                            </div>
                            <div class="lineHeight">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <th class="text-center">S.No</th>

                                                            <th class="text-center">Warehouse Name</th>
                                                            <th class="text-center">Territory</th>
                                                            <th class="text-center">Action</th>



                                                            </thead>


                                                            <tbody id="filteredData">
                                                            <?php $count=1; ?>
                                                            <?php $__currentLoopData = \App\Helpers\CommonHelper::get_all_warehouse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo e($count++); ?></td>
                                                                    <td class="text-center"><?php echo e($row->name); ?></td>
                                                                    <td class="text-center"><?php echo e(App\Helpers\CommonHelper::get_territory_name($row->territory_id)); ?></td>
                                                                    <td class="text-center">
                                                                        <a href="<?php echo e(route('warehouse.edit', ['id' => $row->id, 'm' => request()->get("m"), 'pageType' => "1", 'parentCode' => request()->get("parentCode")])); ?>" type="button" class="btn btn-primary">Edit</a>
                                                                        <form style="display: inline-block" method="post" action="<?php echo e(route('warehouse.delete', ['id' => $row->id, 'm' => request()->get("m"), 'pageType' => "1", 'parentCode' => request()->get("parentCode")])); ?>">
                                                                            <?php echo e(csrf_field()); ?>

                                                                            <?php echo e(method_field("DELETE")); ?>

                                                                            <input type="hidden" name="m" value="<?php echo e(request()->get("m")); ?>"/>
                                                                            <input type="hidden" name="pageType" value="1"/>
                                                                            <input type="hidden" name="parentCode" value="<?php echo e(request()->get("parentCode")); ?>"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>