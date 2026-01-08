<?php
$accType = Auth::user()->acc_type;
if($accType == 'client'){
    $m = $_GET['m'];
}else{
    $m = Auth::user()->company_id;
}
?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
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
                                    <span class="subHeadingLabelClass">Add New Warehouse</span>
                                </div>
                            </div>
                            <div class="lineHeight">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php echo Form::open(array('url' => 'pad/addWareHouseDetail?m='.$m.'','id'=>'addCategoryForm'));?>
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="hidden" name="pageType"
                                                    value="<?php echo $_GET['pageType']?>">
                                                <input type="hidden" name="parentCode"
                                                    value="<?php echo $_GET['parentCode']?>">

                                                <!--
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label>Account Head</label>
                                                    <select name="account_head" id="account_head" class="form-control select2">
                                                        <option value="">Select Account</option>
                                                        @ foreach($accounts as $key => $y)
                                                            <option value="{ { $y->code}}">{ { $y->code .' ---- '. $y->name}}</option>
                                                        @ endforeach
                                                    </select>
                                                </div>
                                                <!-->
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label>Warehouse :</label>
                                                    <span class="rflabelsteric"><strong>*</strong></span>
                                                    <input autofocus type="text" name="warehouse" id="warehouse"
                                                        value="" class="form-control requiredField" />
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label>Territory :</label>
                                                    <select name="territory_id" id="territory_id" class="form-control select2">
                                                        <?php $__currentLoopData = App\Helpers\CommonHelper::get_all_territories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $territory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($territory->id); ?>" selected><?php echo e($territory->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label>Warehouse Type:</label>
                                                    <span class="rflabelsteric"></span>
                                                    </br>
                                                    <input type="radio" id="virtual"
                                                        name="is_virtual" value="1" />
                                                    <label for="contactChoice1">Virtual</label>
                                                    </br>
                                                    <input type="radio" checked id="non-virtual" name="is_virtual"
                                                        value="0" />
                                                    <label for="contactChoice2">Non Virtual</label>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success'])); ?>

                                                    <button type="reset" id="reset" class="btn btn-danger">Clear
                                                        Form</button>

                                                    <?php
                                                    //echo Form::submit('Click Me!');
                                                    ?>
                                                </div>
                                                <?php
                                                echo Form::close();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".select2").select2();
    $(".btn-success").click(function(e) {
        var category = new Array();
        var val;
        //$("input[name='chartofaccountSection[]']").each(function(){
        category.push($(this).val());
        //});
        var _token = $("input[name='_token']").val();
        for (val of category) {

            jqueryValidationCustom();
            if (validate == 0) {
                //return false;
            } else {
                return false;
            }
        }
    });
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>