<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Session::get('run_company') == 1 || Session::get('run_company') == 1): ?>
        <?php echo Form::open(['url' => 'stad/insert_opening_data', 'id' => 'subm', 'class' => 'stop']); ?>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="well_N">
            <div class="dp_sdw">
                <div class="panel">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-9 col-md-9  col-sm-9 col-xs-12" style="">

                                <label class="sf-label">Item</label>
                                <select class="form-control select2" name="sub_1" id="sub_1">
                                    <option>Select Item</option>
                                    <?php $__currentLoopData = App\Helpers\CommonHelper::get_all_subitem(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>">
                                            <?php echo e($value->sub_ic); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                            </div> 

                                <div class="col-lg-3 col-md-3  col-sm-3 col-xs-12" style="">

                                    <button onclick="get_data_opening()" style="margin-top:30px" type="button"
                                        class="btn btn-success">Show</button>
                                </div>
                            </div>
                            <div class="row">
                                <span id="data"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php echo Form::close(); ?>
        <script>
            $(function() {
                $('select').select2();
            });


            function get_data_opening() {
                var item = $('#sub_1').val();
                if (item == '') {
                    alert('Required Valid item');
                    return false;
                }
                $('#data').html(
                    '<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="loader"></div></div></div>'
                    );
                $.ajax({
                    url: '<?php echo e(url('/pdc/get_data_opening')); ?>',
                    data: {
                        item: item
                    },
                    type: 'GET',
                    success: function(response) {

                        $('#data').html(response);
                    }
                })



            }
            
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>