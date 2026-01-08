<?php

$Counter = 1;
$OverAllTotal = 0;
$total=0;
foreach($StockData as $Fil):
        $OverAllTotal+=$Fil->amount;
$amount=0;
?>
    <tr class="text-center">
        <td><?php echo $Counter++;?></td>
        <td><?php echo $Fil->voucher_no?></td>
        <td><?php echo date_format(date_create($Fil->voucher_date), 'd-m-Y')?></td>
        <td><?php echo number_format($Fil->amount,2)?></td>
        <?php if(Request::get('VoucherType')==1): ?>
        <?php $amount=DB::Connection('mysql2')->table('grn_data')->where('status',1)->where('grn_no',$Fil->voucher_no)->sum('net_amount'); ?>
        <td><?php if($amount!= $Fil->amount): ?>Wrong <?php echo e(number_format($amount,2)); ?> <?php endif; ?></td>
            <?php endif; ?>
        <?php if(Request::get('VoucherType')==6): ?>

            <?php $amount=DB::Connection('mysql2')->table('transactions')->where('status',1)->where('voucher_no',$Fil->voucher_no)->
            where('debit_credit',1)
            ->where('voucher_type',9)
            ->value('amount'); ?>
                <td><?php if($amount!= $Fil->amount && $amount!=0): ?>Wrong <?php echo e(number_format($amount,2)); ?> <?php else: ?> <?php echo e(number_format($amount,2)); ?> <?php endif; ?></td>

            <?php endif; ?>

        <?php if(Request::get('VoucherType')=='work_order_in'): ?>:
        <?php $amount=DB::Connection('mysql2')->table('transactions')->where('status',1)->where('particulars',$Fil->voucher_no)
        ->where('debit_credit',1)
        ->where('voucher_type',4)
        ->sum('amount'); ?>
        <td><?php if($amount!= $Fil->amount && $amount!=0): ?>Wrong <?php echo e(number_format($amount,2)); ?> <?php else: ?> <?php echo e(number_format($amount,2)); ?> <?php endif; ?></td>
            <?php endif; ?>

        <?php if(Request::get('VoucherType')=='work_order_issuence'): ?>:
        <?php $amount=DB::Connection('mysql2')->table('transactions')->where('status',1)->where('voucher_no',$Fil->voucher_no)
            ->where('debit_credit',0)
            ->where('voucher_type',13)
            ->value('amount'); ?>
        <td><?php if($amount!= $Fil->amount && $amount!=0): ?>Wrong <?php echo e(number_format($amount,2)); ?> <?php else: ?> <?php echo e(number_format($amount,2)); ?> <?php endif; ?></td>
    <?php endif; ?>;

        <?php if(Request::get('VoucherType')=='2'): ?>:
        <?php $amount=DB::Connection('mysql2')->table('transactions')->where('status',1)
            ->where('voucher_no',$Fil->voucher_no)
            ->where('debit_credit',0)
            ->where('voucher_type',5)
            ->value('amount'); ?>
        <td><?php if($amount!= $Fil->amount && $amount!=0): ?>Wrong <?php echo e(number_format($amount,2)); ?> <?php else: ?> <?php echo e(number_format($amount,2)); ?> <?php endif; ?></td>
        <?php endif; ?>;

        <?php $total+=$amount; ?>
    </tr>
<?php endforeach;?>
    <tr class="text-center">
        <td colspan="3"><strong>TOTAL</strong></td>
        <td><?php echo number_format($OverAllTotal,2);?></td>
        <td><?php echo number_format($total,2);?></td>
    </tr>
