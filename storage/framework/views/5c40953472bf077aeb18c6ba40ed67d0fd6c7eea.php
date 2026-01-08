<?php $__currentLoopData = $credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $rv = null;
    if($credit->rv_no)
        $rv = DB::connection("mysql2")->table("credits_data")->where("rv_no", $credit->rv_no)->first();
?>
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e(App\Helpers\SalesHelper::get_customer_name($credit->store)); ?></td>
        <td><?php echo e($credit->delivery_man); ?></td>
        <td><?php echo e($credit->details); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_account_name_by_codename($credit->debit)->name ?? "N/A"); ?></td>
        <td><?php echo e($credit->on_record == 1 ? "Yes" : "No"); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_vouchers($credit->voucher_type)[0]->name); ?></td>
        <td><?php echo e(App\Helpers\CommonHelper::get_branch_by_id($credit->branch)); ?></td>
        <td class="approve status<?php echo e($credit->rv_no); ?>"><?php echo e($rv && $rv->rv_status == 2 ? "Approved" : "Pending"); ?></td>
        <td>
            <div class="dropdown">
                <a onclick="showDetailModelOneParamerter('sdc/viewReceiptVoucherForDebit','<?php echo $credit->rv_no;?>','View Bank Reciept Voucher Detail','1','')" class="btn btn-xs btn-success">View</a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
