<?php
   use App\Helpers\CommonHelper;
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
    <div class="row">
        <div class="col-lg-3">
            <div class="prodDashBox">
                <div>
                    <h6>Printing Machine</h6>
                    <span class="greenBadge">Running</span>
                </div>
                <ul>
                    <li>
                        <ul>
                            <li>Job Card No.</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Customer Name</li>
                            <li>Jerome Bell</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Capacity Utilzation</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Today's Utilization</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Quantity Produced</li>
                            <li>50,000</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="prodDashBox">
                <div>
                    <h6>Lamination Machine</h6>
                    <span class="greenBadge">Running</span>
                </div>
                <ul>
                    <li>
                        <ul>
                            <li>Job Card No.</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Customer Name</li>
                            <li>Jerome Bell</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Capacity Utilzation</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Today's Utilization</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Quantity Produced</li>
                            <li>50,000</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="prodDashBox">
                <div>
                    <h6>WAX Machine</h6>
                    <span class="redBadge">Not Running</span>
                </div>
                <ul>
                    <li>
                        <ul>
                            <li>Job Card No.</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Customer Name</li>
                            <li>Jerome Bell</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Capacity Utilzation</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Today's Utilization</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Quantity Produced</li>
                            <li>50,000</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="prodDashBox">
                <div>
                    <h6>WAX Machine</h6>
                    <span class="redBadge">Not Running</span>
                </div>
                <ul>
                    <li>
                        <ul>
                            <li>Job Card No.</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Customer Name</li>
                            <li>Jerome Bell</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Capacity Utilzation</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Today's Utilization</li>
                            <li>JC-#001</li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Quantity Produced</li>
                            <li>50,000</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div id="printBankPaymentVoucherList">
                <div class="panel">
                    <div id="PrintPanel">
                        <div id="ShowHide">
                            <div class="table-responsive dashTable">
                                <div class="dashTableHeading printListBtn">
                                    <h6>Job Card List</h6>
                                    <a class="btn btn-primary" target="_blank" id="myBtn"
                                        href="<?php echo e(url('/sales/viewSalesOrderList?pageType=view&&parentCode=89&&m=1#Rototec')); ?>">View
                                        All Orders</a>
                                </div>
                                <table class="userlittab table table-bordered sf-table-list" id="TableExportToCsv">
                                    <thead class="bgPurpleofTd noPaddingLeft">
                                        <tr>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Job Card No</th>
                                            <th class="text-center">Deadline</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data" class="dashTableBody ">
                                   
                                        <tr>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                        </tr>
                                      

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-lg-3">
            <div class="card barChartHead2">
                <div
                    class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                    <div class="cashSection prodHeading">
                        <h4 class="card-subtitle text-muted mb-25">Productivity</h4>
                    </div>
                    <ul class="proFilter">
                        <li>Filter</li>
                        <li>Today</li>
                        <li>This Week</li>
                        <li>This Month</li>
                    </ul>
                </div>
                <div class="card-body">
                    <div id="bar-chart"></div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="ordersDis">
                <div id="printBankPaymentVoucherList">
                    <div class="panel">
                        <div id="PrintPanel">
                            <div id="ShowHide">
                                <div class="table-responsive dashTable">
                                    <div class="dashTableHeading printListBtn">
                                        <h6>Orders Dispatched</h6>
                                    </div>
                                    <table class="userlittab table table-bordered sf-table-list" id="TableExportToCsv">
                                        <thead class="bgBlueofTd noPaddingLeft">
                                            <tr>
                                                <th class="text-center">SO No</th>
                                                <th class="text-center">Customer Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data" class="dashTableBody ">
                                 
                                            <tr>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                            </tr>
                                        

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dipatchImage">
                </div>
            </div>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>