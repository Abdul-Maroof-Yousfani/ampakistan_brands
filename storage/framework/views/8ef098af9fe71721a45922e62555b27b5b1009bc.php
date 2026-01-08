<?php 
use App\Helpers\CommonHelper;
use App\Helpers\FinanceHelper;
use App\Helpers\ReuseableCode;

$accType = Auth::user()->acc_type;
if($accType == 'client'){
    $m = Session::get('run_company');
}else{
    $m = Session::get('run_company');
}
?>


<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center"><?php echo e(++$key); ?></td>
        <td class="text-center"><?php echo e($payment->payment_no); ?></td>
        <td class="text-center"><?php echo e($payment->cheque_no ?? "N/A"); ?></td>
        <td class="text-center"><?php echo e(CommonHelper::get_customer_name($payment->customer_id)); ?></td>
        <td class="text-center"><?php echo e(CommonHelper::get_account_name($payment->account_recieve_id) ?? '----'); ?></td>
        <td class="text-center"><?php echo e($payment->amount ?? '--'); ?></td>
        <td class="text-center"><?php echo e($payment->adv_date ?? '--'); ?></td>
        <td class="text-center"><?php echo e($payment->amount_recieved_no ?? '--'); ?></td>
        <td class="text-center"><?php echo e($payment->amount_issued_no ?? '--'); ?></td>
        <td class="text-center"><?php echo e($payment->description ?? '--'); ?></td>
        <td class="text-center">
            <?php echo $payment->parent_id != null
            ? '-'
            : ($payment->amount_issued_status == 1
                ? "<span style='color:green'>Issued</span>"
                : "<span style='color:red'>Not Issued</span>"
            ); ?>

        </td>
        <td>
               <a onclick="showDetailModelOneParamerter('finance/showadvancepayment','<?php echo e($payment->id); ?>','View Advance Payment Detail','<?php echo e(Session::get('run_company')); ?>','')" 
               class="btn btn-xs btn-success">View</a>                                                                          
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>