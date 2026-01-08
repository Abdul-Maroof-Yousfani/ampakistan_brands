<?php
use App\Helpers\ReuseableCode;
use App\Helpers\CommonHelper;
use App\Helpers\FinanceHelper;
use App\Models\Transactions;
?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">


    </div>

    <?php
    $grand_total_invoice=0;
    $grand_total_balance=0;
    $main_count=0;
    $table_count=1;
    ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <table class="table table-bordered sf-table-list" id="EmpExitInterviewList<?php echo e($table_count); ?>">


        <?php if($row->bal>0): ?>


                        <thead>
                            <tr>
                                <td colspan="5"><h4> <?php echo e('Vendor :'.$row->name); ?></h4>
                                <button class="btn btn-sm btn-warning" onclick="exportView('EmpExitInterviewList<?php echo e($table_count); ?>','','1')" style="">
                                    <span class="glyphicon glyphicon-print"> Export to CSV</span>
                                </button>
                                </td>

                            </tr>
                            <tr>
                                <th class="text-center">S.No</th>
                                <th class="text-center">PI</th>
                                <th class="text-center">PO</th>
                                <th class="text-center">Invoice Amount</th>
                                <th class="text-center">Balance Amount</th>
                                <th class="text-center">Exists</th>
                            </tr>
                        </thead>



                        <tbody id="filterContraVoucherList">
                        <?php
                        $counter=1;
                        $total_balance_amount=0;
                        $total_invoice_amount=0;
                        ?>
                        <?php $__currentLoopData = ReuseableCode::get_vendor_opening_by_vendor_id($row->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $count=DB::Connection('mysql2')->table('new_purchase_voucher')->where('status',1)->where('slip_no',$row1->pi_no)->count(); ?>
                         <tr class="text-center">
                             <td><?php echo e($counter++.' ('.$main_count++.')'); ?></td>
                             <td><?php echo e($row1->pi_no); ?></td>
                             <td><?php echo e($row1->po_no); ?></td>
                             <td><?php echo e(number_format($row1->invoice_amount,2)); ?></td>
                             <td><?php echo e(number_format($row1->balance_amount,2)); ?></td>
                             <td><?php if($count>0): ?>Exists <?php else: ?> Not Exists <?php endif; ?></td>
                             <?php $total_balance_amount+=$row1->balance_amount;
                                  $total_invoice_amount+=$row1->invoice_amount;
                                  $grand_total_invoice+=$row1->invoice_amount;
                                  $grand_total_balance+=$row1->balance_amount;

                             ?>

                         </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center" style="font-size: large;font-weight: bold">
                            <td colspan="3">Total</td>
                            <td><?php echo e(number_format($total_invoice_amount,2)); ?></td>
                            <td><?php echo e(number_format($total_balance_amount,2)); ?></td>
                        </tr>

                        </tbody>
                


        <?php endif; ?>
        <?php $table_count++; ?>

    </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  <div style="text-align: right;font-size: large;font-weight: bolder">
      <p>Grand Total Of Invoices : <?php echo e(number_format($grand_total_invoice,2)); ?></p>
      <p>Grand Total Of Balance : <?php echo e(number_format($grand_total_balance,2)); ?></p>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>