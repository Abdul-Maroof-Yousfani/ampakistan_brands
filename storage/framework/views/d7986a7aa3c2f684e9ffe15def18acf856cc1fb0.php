<?php
   use App\Helpers\CommonHelper;
   use App\Helpers\DashboardHelper;
   use App\Helpers\ReuseableCode;
  $accYear =  ReuseableCode::get_account_year_from_to(Session::get('run_company'));
  $from = $accYear[0];
  $to = $accYear[1];

    // receivable
$receiable = CommonHelper::get_parent_and_account_amount(Session::get('run_company'),$from,$to,'1-2-2','1',1,0);
$payable = CommonHelper::get_parent_and_account_amount(Session::get('run_company'),$from,$to,'2-2-2','1',0,1);

   use   Illuminate\Support\Carbon;
         $m = '';
      if(isset($_GET['m']))
      {
         $m = $_GET['m'];
      }
      else
      {
         $m = '';
      }
   $UserId = Auth::user()->id;

   ?>

<?php $__env->startSection('content'); ?>



   
      
         
            
               
               
               
                  
                  
                  
                  
                  
                  
               
               
            
         
      
   

<?php $count=0;
   if(Auth::user()->id == 104)
   {
   $companiesList = DB::table('company')->select(['name','id','dbName'])->where('status','=','1')->get();


   }
         else{
   $companiesList = DB::table('company')->select(['name','id','dbName'])->where('id','!=',4)->where('status','=','1')->get();

         }

   ?>
<?php if(Session::get('run_company')==''): ?>:
<div id="companyListModel" class="modal fade in" role="dialog" aria-hidden="false" style="display: block;">
   <div class="modal-dialog modalWidth dply">
      <!-- Modal content-->
      <div class="model-n modal-content">
         <div class="modal-body">
            <div class="mdel-bx">
               <img class="circle" src="../assets/img/animation/circledot.png">
               <div class="model-logo">
                  <img src="assets/img/logos/logo.png">
                  <h4 class="modal-title">Select Company</h4>
               </div>
               <?php $__currentLoopData = $companiesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cRow1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="row">
                  <ul class="ban-list">
                     <li>
                        <div class="banq-box">
                           <a href="<?php echo e(url('set_user_db_id?company='.$cRow1->id)); ?>">
                              <span class="companyLetr theme-bg theme-f-m">D</span>
                              <h3 class="item-model-company theme-f-m"><?php echo e($cRow1->name); ?></h3>
                           </a>
                        </div>
                     </li>
                     
                  </ul>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
               <a href="<?php echo e(url('/logout')); ?>" class="btn-b">Sign Out</a>
            </div>
         </div>
      </div>
   </div>
   <div class="modal-backdrop fade in"></div>
</div>
<?php endif; ?>
<div class="well_N">
    <div>
        <div class="row" style="display: none;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="">
                            <?php $count=0; ?>
                            <?php $__currentLoopData = $companiesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cRow1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($count==0 && $cRow1->id<=5): ?> <h2 style="text-align: center">
                                <p class="">Select Company
                                    </h2>
                                    <?php $count++ ?>
                                    <?php elseif($count==1 && $cRow1->id>5): ?>
                                <h2 style="text-align: center">
                                    <p class="outset">Financial Year :2022-2023
                                </h2>
                                <?php endif; ?>
                                <a href="<?php echo e(url('set_user_db_id?company='.$cRow1->id)); ?>" class="">
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 " style="font-size: 20px;">
                                        
                                        <?php echo CommonHelper::get_company_logo_front($cRow1->id)?> <span
                                            id="Loading<?php echo $cRow1->id?>"></span></i>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(Session::get('run_company')):?>

            <?php

                $currentDate = Carbon::now();
                $monthStartDate = $currentDate->startOfMonth()->toDateString();
                $monthEndDate = $currentDate->endOfMonth()->toDateString();
                $currentMonthYear = $currentDate->year;

            ?>
        <span style="display: block;">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12 priorMainBox2">
                        <a href="#" class="hide" onclick="getDashboardSaleSummary(1,'<?php echo e($monthStartDate); ?>','<?php echo e($monthEndDate); ?>');">
                            <div class="mainDashBox">
                                <div class="title">
                                    <h6>Today's Salesss</h6>
                                    <p><?php echo e($currentMonthYear); ?></p>
                                </div>
                                <img src="assets/img/miniBar.svg" alt="">
                                <h4>
                                    <?php echo e(number_format(CommonHelper::getSaleSummaryAmountF($monthStartDate,$monthEndDate),0)); ?>

                                </h4>

                                <!-- <p>Lorem ipsum dolor sit amet consectetur</p> -->
                            </div>
                        </a>

                        <a href="#" onclick="getDashboardSaleSummary(2,'<?php echo e($monthStartDate); ?>','<?php echo e($monthEndDate); ?>');">
                            <div class="mainDashBox">
                                <div class="title">
                                    <h6>This Month Sales</h6>
                                    <p><?php echo e($currentMonthYear); ?></p>
                                </div>
                                <img src="assets/img/miniBar.svg" alt="">
                                <h4>

                                    <?php echo e(number_format(CommonHelper::getSaleSummaryAmountF($monthStartDate,$monthEndDate),0)); ?>

                                </h4>
                                <!-- <p>Lorem ipsum dolor sit amet consectetur</p> -->
                            </div>
                        </a>
                        <a href="#">
                            <div class="mainDashBox">
                                <div class="title">
                                    <h6>This Month's Collection</h6>
                                </div>
                                <img src="assets/img/miniBar.svg" alt="">
                                <h4><?php echo e(number_format($collection,2)); ?></h4>
                                <!-- <p>Lorem ipsum dolor sit amet consectetur</p> -->
                            </div>
                        </a>
                        <a href="#">
                            <div class="mainDashBox">
                                <div class="title">
                                    <h6>Total Receivables</h6>
                                </div>
                                <img src="assets/img/miniBar.svg" alt="">
                                <h4><?php echo e(number_format($receiable,2)); ?></h4>
                                <!-- <p>Lorem ipsum dolor sit amet consectetur</p> -->
                            </div>
                        </a>
                        <a href="#">
                            <div class="mainDashBox">
                                <div class="title">
                                    <h6>Total Payables</h6>
                                </div>
                                <img src="assets/img/miniBar.svg" alt="">
                                <h4><?php echo e(number_format($payable)); ?></h4>
                                <!-- <p>Lorem ipsum dolor sit amet consectetur</p> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card barChartHead">
                                    <div>
                                        <div>
                                            <h6>Sales  Flow Chart</h6>
                                            <ul class="hidden">
                                                <li>
                                                    <input type="radio" name="" id="" checked stlye="color:red" readonly>
                                                    Sales
                                                </li>
                                                <li>
                                                    <input type="radio" name="" id="" readonly>
                                                    Purchase
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">

                                            <div class="selectOption">
                                                <select id="year" onchange="financeDashboardAjax(this.value)" >
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas class="Business_Flow_Chart chartjs" data-height="320"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div id="printBankPaymentVoucherList">
                                    <div class="panel ">
                                        <div id="PrintPanel">
                                            <div id="ShowHide">
                                                <div class="table-responsive dashTable mhe">
                                                    <div class="dashTableHeading printListBtn">
                                                        <h6>Pending Order Sheet</h6>
                                                        <a class="btn btn-primary" target="_blank" id="myBtn" href="<?php echo e(url('/sales/viewSalesOrderList?pageType=view&&parentCode=89&&m=1#Rototec')); ?>">View All Sales Orders</a>
                                                    </div>
                                                    <table class="userlittab table table-bordered sf-table-list"
                                                        id="TableExportToCsv">
                                                        <thead class="bgBlueofTd">
                                                            <tr>
                                                                <th class="text-center" colspan="2">Customer Name</th>
                                                                <th class="text-center">SO No</th>
                                                                <th class="text-center"> Sales Invoice No.</th>
                                                                <th class="text-center">Sale Qty</th>
                                                                <th class="text-center">Qty Delivered</th>
                                                                <th class="text-center">Pending Qty</th>
                                                                <th class="text-center">Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="data" class="dashTableBody">
                                                            <?php
                                                                $latestSaleOrders = CommonHelper::displayLatestSaleOrdersDetailF();

                                                                $overallSubTotal = 0;
                                                                $overallTaxAmount = 0;
                                                            ?>
                                                            <?php if(!empty($latestSaleOrders)): ?>
                                                            <?php $__currentLoopData = $latestSaleOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lsoKey => $lsoRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    // $sale_order_status = App\Helpers\SalesHelper::approval_status_for_so($lsoRow->so_status,$lsoRow->id);
                                                                  //  $overallSubTotal += $lsoRow->total_amount;
                                                                  //  $overallTaxAmount += $lsoRow->total_amount_after_sale_tax;
                                                                ?>
                                                                <tr>
                                                                    <td class="text-center" colspan="2">
                                                                            <?php echo e(strtoupper($lsoRow->name)); ?>

                                                                    </td>
                                                                    <td class="text-center" >
                                                                            <?php echo e(strtoupper($lsoRow->so_no)); ?>

                                                                    </td>
                                                                    <td class="text-center" >
                                                                            <?php echo e(strtoupper($lsoRow->gi_no)); ?>

                                                                    </td>
                                                                    <td class="text-center">
                                                                            <?php echo e(number_format($lsoRow->sale_qty,0)); ?>

                                                                    </td>
                                                                    <td class="text-center">
                                                                            <?php echo e(number_format($lsoRow->delivery_qty,0)); ?>

                                                                    </td>
                                                                    <td class="text-center">
                                                                            <?php echo e(number_format($lsoRow->remaining_qty,0)); ?>

                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php if($lsoRow->so_status == 0): ?>
                                                                        Pending
                                                                    <?php elseif($lsoRow->so_status ==  2): ?>
                                                                        Draft
                                                                    <?php else: ?>
                                                                      Sale Order Created
                                                                    <?php endif; ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="hide">
                                                                <td colspan="4">Total</td>
                                                                <td class="text-right">
                                                                
                                                                </td>
                                                                <td class="text-right">
                                                                    
                                                                </td>
                                                                <td class="text-right">
                                                                
                                                                </td>
                                                                <td class="text-center">---</td>
                                                            </tr>
                                                            <?php endif; ?>
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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card barChartHead">
                                    <div
                                        class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                                        <div class="cashSection">
                                            <div>
                                                <h4 class="card-subtitle  mb-25"> Total Receipts and Total Payments</h4>
                                                <p class="card-title font-weight-bolder">Cash Coming in and going out
                                                    of
                                                    you business</p>
                                            </div>
                                            <!-- <div class="selectOption">
                                                <select>
                                                    <option value="">Weekly</option>
                                                    <option value="">Monthly</option>
                                                    <option value="">Yearly</option>
                                                </select>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="tr_tp"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="payable pieChartHead">
                                    <div
                                        class="statistics card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                                        <h6 class="card-title mb-sm-0 mb-1">Receivables and Payables</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <h6>Invoice payable to you</h6>
                                            <ul>
                                                <li>
                                                    <p>Due</p>
                                                    <p>$0.00</p>
                                                </li>
                                                <li>
                                                    <p>Due in 1-30 days</p>
                                                    <p>$0.00</p>
                                                </li>
                                                <li>
                                                    <p>Due</p>
                                                    <p>$0.00</p>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h6>Payable bills you owe</h6>
                                            <ul>
                                                <li>
                                                    <p>Due</p>
                                                    <p>$0.00</p>
                                                </li>
                                                <li>
                                                    <p>Due in 1-30 days</p>
                                                    <p>$0.00</p>
                                                </li>
                                                <li>
                                                    <p>Due</p>
                                                    <p>$0.00</p>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mp-20">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="topExport topSelling">
                                    <table class="userlittab table table-bordered sf-table-list">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Account</th>
                                                <th class="text-center">Sanctioned Limit</th>
                                                <th class="text-center">Limit Utilized</th>
                                                <th class="text-center">Un Utilized</th>
                                                <th class="text-center">Remaining %</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportData">

                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="topExport topSelling">
                                    <table class="userlittab table table-bordered sf-table-list">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Bank</th>
                                                <th class="text-center">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php $__currentLoopData = DashboardHelper::BankBalanceReport(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php  ?>
                                                <tr>
                                                    <td><?php echo e($value->name); ?></td>
                                                    <td><?php echo e(number_format($value->balance,2)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 mp-20">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="topExport topSelling">
                                    <table class="userlittab table table-bordered sf-table-list">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Customer Name</th>
                                                <th class="text-center">Sales</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php $__currentLoopData = DashboardHelper::CustomerWiseSales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($value->name); ?></td>
                                                    <td><?php echo e($value->amount); ?></td>
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
            <div class="well" id="ShowHide">
            </div>
    </div>

</div>


<script src="assets/js/charts/chart-chartjs.js"></script>
<script src="assets/js/charts/chart-chartjs.min.js"></script>


<script !src="">
   $(document).ready(function() {
   /*
      var formWidth = $('.sliding_form').width();
      $('.sliding_form').css('right', '-' + formWidth + 'px');
      $("#form_trigger").on('click', function() {

         if ($('.sliding_form').hasClass('slide_out')) {
            $('.sliding_form').removeClass('slide_out').addClass('slide_in')
            $(".sliding_form").animate({ right: 0 + 'px' });

            $('#AjaxDataOnlineUsers').html('<div class="loader"></div>');
            var m = '< ?php echo $m?>';
            $.ajax({
               url: '/pdc/getOnlineUserAjax',
               type: 'Get',
               data: {m:m},

               success: function (response)
               {
                  $('#AjaxDataOnlineUsers').html(response);
               }
            });

         } else {
            $('.sliding_form').removeClass('slide_in').addClass('slide_out')
            $('.sliding_form').animate({ right: '-' + formWidth + 'px' });

         }

      });
      */
   });


   function getDashboardInfo(Type)
   {
      var m = '<?php echo $m?>';
      $('#ShowHide').html('<div class="loader"></div>');

      $.ajax({
         url: '/pdc/get_dashboard_info',
         type: 'Get',
         data: {Type: Type,m:m},

         success: function (response)
         {
            $('#ShowHide').html(response);
         }
      });


   }
</script>


</span>

<script>

         function reportLcLg()
        {

            let rate_date = $('#rate_date').val();
            let to_date = $('#to_date').val();
             $('#reportData').html('<tr><td colspan="12"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div></div></td><tr>');

            $.ajax({
                url: '<?php echo url('/')?>/import/LcAndLg/reportLcLg',
                type: 'Get',
                data: {
                        rate_date:rate_date,
                        to_date:to_date
                    },
                success: function (response) {

                    $('#reportData').html(response);


                }
            });


        }


    </script>



<script>
         $(document).ready(function () {
            reportLcLg();
               var total_tr_tp = '<?php echo $jsonResult; ?>';
                total_tr_tp = JSON.parse(total_tr_tp);

                $('#year').trigger('change');

                var chartData = total_tr_tp;
                tr_tp(chartData);
            });


            function Business_Flow_Chart(data) {

                let labels = [];
                let datas = [];

                // Loop through the array and extract month_name and total_amount
                data.forEach(item => {
                    labels.push(item.month_name);
                    datas.push(item.total_amount);
                });

                let barChartEx = $('.Business_Flow_Chart');

                var barChartExample = new Chart(barChartEx, {
                    type: 'bar',
                    options: {
                        legend: {
                            display: false
                        },
                    },
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                data: datas,
                                barThickness: 15,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)'
                            }
                        ]
                    }
                });
            }

            function tr_tp(data) {
                var barChartEl = document.querySelector('#tr_tp');

                if (typeof barChartEl !== 'undefined' && barChartEl !== null) {
                    console.log('innn');
                    var barChartConfig = {
                        chart: {
                            height: 180,
                            type: 'bar',
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                                barHeight: '30%',
                                endingShape: 'rounded'
                            }
                        },
                        grid: {
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                                top: -15,
                                bottom: -10
                            }
                        },
                        colors: window.colors.solid.info,
                        dataLabels: {
                            enabled: false
                        },
                        series: [
                            {
                                data: data
                            }
                        ],
                        xaxis: {
                            categories: ['TR', 'TP']
                        }
                    };

                    var barChart = new ApexCharts(barChartEl, barChartConfig);
                    barChart.render();
                }
            }

            function financeDashboardAjax(year)
            {
                    $.ajax({
                        url: '/financeDashboardAjax',
                        type: 'Get',
                        data: {
                                year : year
                              },
                        success: function (response) {

                            Business_Flow_Chart(response?.SalesFlowChart?.original)

                        }
                    });

            }
</script>
<?php endif;?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>