<?php $__currentLoopData = $debits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $rv = null;
    if($debit->rv_no)
        $rv = DB::connection("mysql2")->table("new_rvs")->where("rv_no", $debit->rv_no)->first();
?>
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e(App\Helpers\SalesHelper::get_customer_name($debit->store)); ?></td>
        <td><?php echo e($debit->delivery_man); ?></td>
        <td><?php echo e($debit->details); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_account_name_by_codename($debit->credit)->name ?? "N/A"); ?></td>
        <td><?php echo e($debit->on_record == 1 ? "Yes" : "No"); ?></td>
<td><?php echo e(App\Helpers\CommonHelper::get_vouchers($debit->voucher_type)[0]->name ?? 'N/A'); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_branch_by_id($debit->branch)); ?></td>
        <td class="approve"><?php echo e($debit->is_approved == 1 ? "Approved" : "Pending"); ?></td>
        <td>
            <div class="dropdown">
                <a <?php echo e($debit->is_approved == 1 ? 'disabled' : ''); ?> onclick="approve(this, '<?php echo e($debit->id); ?>')" class="btn btn-success">Approve</a>
                  <a onclick="showDetailModelOneParamerter('/debitNote/view', '<?php echo e($debit->id); ?>')" class="btn btn-primary">View</a>

            </div>
     
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
