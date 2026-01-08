<?php

use App\Helpers\CommonHelper;
$costing_counter=1; ?>
<?php $__currentLoopData = $costing_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $dept_total=0;
    $cost_total=0;
    ?>

    <div style="display: none" id="costing<?php echo e($costing_counter); ?>" class="row costing">
        <p style="color: #e2a0a0;text-align: center" id="paragraph<?php echo e($costing_counter); ?>"><?php echo 'This Allocation Against '.CommonHelper::get_account_name($row2->acc_id); ?> </p>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">

            <table  id="cost_center_table" class="table table-bordered">

                <tbody class="cost_center_addrows" id="">
                <input type="hidden" name="" class="form-control requiredField" id="demandDataSection_" value="1" />

                <?php $__currentLoopData = CommonHelper::department_allocation_data($row2->id,$type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td>
                            <?php echo e(CommonHelper::get_dept_name(ucfirst($row1->dept_id))); ?>

                        </td>
                        <td>
                            <?php echo e(number_format($row1->percent)); ?>

                        </td>
                        <td class="text-right">

                            <?php echo e(number_format($row1->amount,2)); ?>

                            <?php $dept_total+=$row1->amount ?>
                        </td><!-->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
                <?php   $check= CommonHelper::department_allocation_data($row2->id,$type); ?>
                <?php if(!empty($check)): ?>
                    <tr>
                        <td colspan="1">Total</td>
                        <td   style="text-align: right" id="cost_center_dept_amount"></td>
                        <td style="background-color: #f3f3b9;" class="text-right" colspan="1"><?php echo e(number_format($dept_total,2)); ?></td>
                    </tr>
                <?php endif; ?>
            </table>

        </div>


        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">

            <table  id="cost_center_table" class="table table-bordered">

                <tbody class="cost_center_addrows" id="">
                <input type="hidden" name="" class="form-control requiredField" id="demandDataSection_" value="1" />

                <?php $__currentLoopData = CommonHelper::cost_center_allocation_data($row2->id,$type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e(CommonHelper::get_cost_name($row1->dept_id)); ?>

                        </td>
                        <td>
                            <?php echo e(number_format($row1->percent)); ?>

                        </td>
                        <td class="text-right">

                            <?php echo e(number_format($row1->amount,2)); ?>

                            <?php $cost_total+=$row1->amount ?>
                        </td><!-->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
                <?php $check= CommonHelper::cost_center_allocation_data($row2->id,$type); ?>
                <?php if(!empty($check)): ?>
                    <tr>
                        <td colspan="1">Total</td>
                        <td   style="text-align: right" id="cost_center_dept_amount">0</td>
                        <td style="background-color: #f3f3b9;" class="text-right" colspan="1"><?php echo e(number_format($cost_total,2)); ?></td>
                    </tr>
                <?php endif; ?>
            </table>

        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    function show_costing()
    {

        if($("#costing").prop('checked') == true)
        {
            $('.costing').fadeIn(500);
        }
        else
        {
            $('.costing').fadeOut(500);
        }
    }
</script>