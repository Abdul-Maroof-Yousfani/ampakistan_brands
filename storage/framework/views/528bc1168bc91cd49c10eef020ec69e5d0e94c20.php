<?php
use App\Models\AdvancePayment;
use App\Helpers\FinanceHelper;
use App\Helpers\CommonHelper;

$m = request()->m;
$paymentId = request()->id;

$payment = AdvancePayment::where('status', 1)
            ->where('id', $paymentId)
            ->first();
?>

    <section  id="printCashPaymentVoucherDetail">

        
        <div class="row" style="margin-bottom:20px; align-items:center;">

            
            <div class="col-lg-4 col-md-4 col-sm-4 text-left" style="margin:0;margin-top: 35px;">
                <?php echo CommonHelper::displayPrintButtonInView('printCashPaymentVoucherDetail','','1'); ?>

            </div>

            
            <div class="col-lg-4 col-md-4 col-sm-4 text-center" style="margin:0;margin-top: 35px;">
                <h3 style="margin:0;">View Advance Payment Detail</h3>
            </div>

            
            <div class="col-lg-4 col-md-4 col-sm-4 text-right">
                <?php echo CommonHelper::get_company_logo(Session::get('run_company')); ?>

            </div>

        </div>



        
        <div class="row headquid" >
            <div class="col-lg-12">
                <div class="well">
                    <div class="row">

                        <div class="col-lg-12">
                            <br>

                            <div class="row">

                                
                                <div class="col-lg-6">
                                    <table class="table table-bordered table-striped table-condensed tableMargin">
                                        <tbody>
                                            <tr>
                                                <td style="width:40%;">Payment No</td>
                                                <td><?php echo e($payment->payment_no ?? '-'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Cheque No</td>
                                                <td><?php echo e($payment->cheque_no ?? 'N/A'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment Mode</td>
                                                <td>
                                                    <?php if(!empty($payment->cheque_no)): ?>
                                                        Cheque
                                                    <?php else: ?>
                                                        Cash
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amount</td>
                                                <td><?php echo e(number_format($payment->amount, 2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment Date</td>
                                                <td><?php echo e($payment->adv_date ? FinanceHelper::changeDateFormat($payment->adv_date) : '--'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                
                                <div class="col-lg-6">
                                    <table class="table table-bordered table-striped table-condensed tableMargin">
                                        <tbody>
                                            <tr>
                                                <td style="width:40%;">Customer</td>
                                                <td><?php echo e(CommonHelper::get_customer_name($payment->customer_id)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Account</td>
                                                <td><?php echo e(CommonHelper::get_account_name($payment->account_recieve_id) ?? '----'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Amount Received No</td>
                                                <td><?php echo e($payment->amount_recieved_no ?? '--'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Amount Issued No</td>
                                                <td><?php echo e($payment->amount_issued_no ?? '--'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                
                                <div class="col-lg-12">
                                    <h4>Description: </h4>
                                    <p style="border:1px solid #ddd;padding:13px 9px;border-radius:4px;">
                                        <?php echo e($payment->description ?? 'No description available'); ?>

                                    </p>
                                </div>


                                
                                <div class="col-lg-6">
                                    <table class="table table-bordered table-striped table-condensed tableMargin">
                                        <tbody>
                                            <tr>
                                                <td style="width:40%;">Status</td>
                                                <td>
                                                    <?php if($payment->parent_id != null): ?>
                                                        <span class="label label-info">Child Payment</span>
                                                    <?php elseif($payment->amount_issued_status == 1): ?>
                                                        <span class="label label-success">Issued</span>
                                                    <?php else: ?>
                                                        <span class="label label-warning">Not Issued</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Created By</td>
                                                <td><?php echo e($payment->user_name ?? '--'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="border-bottom:1px solid #000 !important;">
                                        Printed On: <?php echo e(date('Y-m-d')); ?> (<?php echo e(date('D')); ?>)
                                    </label>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>


<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on("click", ".printBtn", function () {

    let printContents = document.getElementById("printCashPaymentVoucherDetail").innerHTML;
    let originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;

});
</script>
<?php $__env->stopSection(); ?>
