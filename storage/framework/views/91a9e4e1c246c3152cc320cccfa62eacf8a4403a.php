<?php
$accType = Auth::user()->acc_type;
// if($accType == 'client'){ $m = $_GET['m']; }
// else{ $m = Auth::user()->company_id; }
if($accType == 'client') { $get_m= $m; }
else{ $get_m= Auth::user()->company_id; }

use App\Helpers\CommonHelper;
use App\Helpers\FinanceHelper;

use App\Helpers\ReuseableCode;


$edit=ReuseableCode::check_rights(146);
$delete=ReuseableCode::check_rights(147);
$export=ReuseableCode::check_rights(223);


$company=ReuseableCode::get_account_year_from_to(Session::get('run_company'));

$from_date = $company[0];
$to_date = $company[1];
?>
<table id="myTable" class="userlittab table table-bordered sf-table-list">
    <thead>
    <th class="text-center col-sm-1">S.No</th>
    <th class="text-center col-sm-1">Code</th>
    <th class="text-center">Account Name</th>
    <th class="text-center">Nature Of Account</th>
    <th class="text-center">Current Balance</th>
    <th class="text-center col-sm-1 hidden-print">Edit</th>
    <th class="text-center col-sm-1 hidden-print">Delete</th>
    </thead>
    <tbody >
    <?php $counter = 1;?>
    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



        <?php


        $array = explode('-',$y->code);
        $level = count($array);
        $nature = $array[0];
        ?>

        <tr title="<?php echo e($y->id); ?>" <?php if($y->type==1): ?>style="background-color:lightblue" <?php endif; ?>
        <?php if($y->type==4): ?>style="background-color:lightgray"  <?php endif; ?>
        id="<?php echo e($y->id); ?>">
            <td class="text-center"><?php echo $counter++;?></td>
            <td><?php echo e('`'.$y->code); ?></td>
            <td style="cursor: pointer" onclick="newTabOpen('<?php echo $from_date?>','<?php echo $to_date?>','<?php echo $y->code?>')">
                <?php if($level == 1): ?>
                    <b style="font-size: 15px;font-weight: 600"><?php echo e(strtoupper($y->name)); ?></b>
                <?php elseif($level == 2): ?>
                    <?php echo e('&emsp;&emsp;'. $y->name); ?>

                <?php elseif($level == 3): ?>
                    <?php echo e('&emsp;&emsp;&emsp;&emsp;'. $y->name); ?>

                <?php elseif($level == 4): ?>
                    <?php echo e('&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'. $y->name); ?>

                <?php elseif($level == 5): ?>
                    <?php echo e('&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'. $y->name); ?>

                <?php elseif($level == 6): ?>
                    <?php echo e('&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'. $y->name); ?>

                <?php elseif($level == 7): ?>
                    <?php echo e('&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'. $y->name); ?>

                <?php endif; ?>


            </td>
            <td>
                <?php if($nature == 01): ?>
                    Assets
                <?php elseif($nature == 02): ?>
                Liabilties
                <?php elseif($nature == 03): ?>
                Equity
                <?php elseif($nature == 04): ?>
                Expenses
                <?php elseif($nature == 05): ?>
                Revenue
                <?php elseif($nature == 06): ?>
                    Cost Of Sales
                <?php elseif($nature == 7): ?>
                    COGS
                <?php elseif($nature == 8): ?>
                    CAPITALS
                <?php endif; ?>
            </td>
            <td class="text-right"><?php 
            // echo number_format(FinanceHelper::ChartOfAccountCurrentBalance($m,$level,$y->code),2);get_m
            echo number_format(FinanceHelper::ChartOfAccountCurrentBalance($get_m,$level,$y->code),2);
            ?></td>

            <td class="text-center hidden-print">
                <?php if($y->type!=0):?>
                    <span class="badge badge-success" style="background-color: #428bca !important">Link To Master</span>
                <?php endif?>
                <?php if($y->id!=1 && $y->id!=2 && $y->id!=1 && $y->id!=3 && $y->id!=4 && $y->id!=5 && $y->type!=2): ?>
                <?php if($edit == true):?>
                    <button    onclick="showDetailModelOneParamerter('fdc/editChartOfAccountForm/<?php echo $y->id ?>')" class="btn btn-primary btn-xs">Edit</button>
                <?php endif;?>
                <?php endif; ?>
            </td>
            <td class="hidden-print text-center">
                <?php if($y->type==0 && $y->id!=1  && $y->id!=2 && $y->id!=1 && $y->id!=3 && $y->id!=4 && $y->id!=5): ?>
                    <?php if($delete == true):?>
                    <button onclick="delete_record('<?php echo e($y->id); ?>')" type="button" class="btn btn-danger btn-xs">Delete</button>
                    <?php endif;?>
                <?php endif; ?>


            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>