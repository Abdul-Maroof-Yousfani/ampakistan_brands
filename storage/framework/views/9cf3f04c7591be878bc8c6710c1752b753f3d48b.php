<?php $__env->startSection('content'); ?>
    <div class="well_N">
        <div class="dp_sdw">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    	<?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                            
                            </div>
                        <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="subHeadingLabelClass">Create New User</span>
                        </div>
                    </div>
                    <div class="lineHeight">&nbsp;</div>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <?php
                                echo Form::open(['url' => 'users/storeNewUser', 'id' => 'addMainMenuTitleForm']);
                                ?>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value=""
                                        class="form-control" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" value=""
                                        class="form-control" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" value=""
                                        class="form-control" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        value="" class="form-control" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Acount Type</label>
                                    <select onchange="checkUserForCategory(this.value)" type="text" name="acc_type"
                                        id="acc_type" class="form-control" />
                                    <option value="client">Client</option>
                                    <option value="user">User</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Role</label>
                                    <select type="text" name="role_id" id="role_id" class="form-control">
                                        <option value="">Select Role</option>

                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Territory</label>
                                <br>
                              <select name="territory_id[]" id="territory_id" multiple class="form-control select2" size="8">
                                    <option value="all">-- Select All --</option>
                                    <?php $__currentLoopData = $territories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $territory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($territory->id); ?>"><?php echo e($territory->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>




                            </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 category">
                                    <label>Categories</label>
                                    <br>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input id="checkbox<?php echo e($value->id); ?>" type="checkbox" checked
                                                name="category[]" value="<?php echo e($value->id); ?>">
                                            <label for="checkbox<?php echo e($value->id); ?>"><?php echo e($value->main_ic); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 dashboard">
                                    <label>dashboard Access</label>
                                    <br>

                                    <div class="form-check">
                                        <input id="checkboxDash1" type="checkbox" name="dashboard_access[]"
                                            value="dashboard">
                                        <label for="checkboxDash1">DashBoard</label>
                                    </div>

                                    <div class="form-check">
                                        <input id="checkboxDash2" type="checkbox" name="dashboard_access[]"
                                            value="dashboard_production">
                                        <label for="checkboxDash2">Production Dashboard </label>
                                    </div>

                                    <div class="form-check">
                                        <input id="checkboxDash3" type="checkbox" name="dashboard_access[]"
                                            value="dashboard_management">
                                        <label for="checkboxDash3">Management Dashboard</label>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success'])); ?>

                                    <button type="reset" id="reset" class="btn btn-primary">Clear Form</button>
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
    

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#territory_id').select2({
         
        });
    });
</script>

<script>

    function checkUserForCategory(value) {

        let checkboxes = document.querySelectorAll('input[type="checkbox"]');
        if (value == 'client') {

            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        } else {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }

    }
</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>