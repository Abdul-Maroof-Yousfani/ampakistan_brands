<?php
use App\Helpers\FinanceHelper;
use App\Helpers\CommonHelper;
$accType = Auth::user()->acc_type;
if($accType == 'client'){
    $m = $_GET['m'];
}else{
    $m = Auth::user()->company_id;
}
?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::open(array('url' => 'fad/add_role?m='.$m,'id'=>'createSalesOrder'));?>
    <div class="well_N">
    <div class="dp_sdw">    
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="display: none;">
                        <?php echo $__env->make('Purchase.'.$accType.'purchaseMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="headquid">
                                    <span class="subHeadingLabelClass">Users Rights Screen</span>
                                    </div>
                                </div>
                            </div>
                            <div class="lineHeight">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                <select name="users" id="users" class="form-control">
                                                    <option>Select</option>
                                                   <?php $__currentLoopData = CommonHelper::get_all_users(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <option value="<?php echo e($row->emp_code); ?>"><?php echo e($row->name); ?></option>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <?php $Comp =  DB::table('company')->where('status',1)->get();?>

                                                <select name="CompanyId" id="CompanyId" class="form-control">
                                                    <option value="0">Select Company</option>
                                                    <?php foreach($Comp as $F):?>
                                                    <option value="<?php echo $F->id?>"><?php echo $F->name?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                            
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <button type="button" class="btn btn-primary" id="BtnRight" onclick="get_rights()">Get All Menu's</button>
                                            </div>
                                        </div>
                                    </div>

                                    <span id="rights"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php echo Form::close();?>
    <script>
        $(document).ready(function(){
            $('#MainModuelCode').select2();
        });
        function get_rights()
        {

            var users=    $('#users').val();
            var MainModuelCode=    $('#MainModuelCode').val();
            var company_id=    $('#CompanyId').val();
            $('#rights').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div>');
                $.ajax({
                    url: '<?php echo e(url('fdc/get_rights?m='.$m)); ?>',
                    type: 'Get',
                    data: {users: users,MainModuelCode:MainModuelCode,company_id:company_id},

                    success: function (response)
                    {
                        $('#rights').html(response);
                    }
                });


        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>