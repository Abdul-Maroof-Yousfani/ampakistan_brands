<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="well_N">
			<div class="dp_sdw">	
				<div class="row">
						<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

       
    </div>
<?php endif; ?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<span class="subHeadingLabelClass">Update User</span>
							</div>
						</div>
					

						<div class="lineHeight">&nbsp;</div> 
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									
									<?php
										echo Form::open(array('url' => 'users/editUser','id'=>'addMainMenuTitleForm'));
									?>
										<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
										<input type="hidden" name="id" value="<?php echo e($Users->id); ?>">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Name</label>
											<input type="text" name="name" id="name" value="<?php echo e($Users->name); ?>" class="form-control" />
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Email</label>
											<input type="text" name="email" id="email" value="<?php echo e($Users->email); ?>" class="form-control" />
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Acount Type</label>
											<select onchange="checkUserForCategory(this.value)" type="text" name="acc_type" id="acc_type" class="form-control" />
												<option <?php if($Users->acc_type == 'client'): ?> selected <?php endif; ?> value="client">Client</option>
												<option <?php if($Users->acc_type == 'user'): ?> selected <?php endif; ?> value="user">User</option>
											</select>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Password</label>
											<input type="password" name="password" id="password" class="form-control" placeholder="Enter new password (leave blank to keep old)" />
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Confirm Password</label>
											<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password" />
										</div>

										 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Role</label>
											<select type="text" name="role_id" id="role_id" class="form-control">
												<option value="">Select Role</option>

												<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option <?php echo e($Users->role_id == $role->id ? 'selected' : ''); ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
											<?php
												$selectedTerritories = json_decode($Users->territory_id, true); // Convert to array
											?>

											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<label>Territory</label>
												<select name="territory_id[]" id="territory_id" multiple class="form-control select2" size="8">
													<option value="all">-- Select All --</option>
													<?php $__currentLoopData = $territories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $territory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($territory->id); ?>"
															<?php echo e(is_array($selectedTerritories) && in_array($territory->id, $selectedTerritories) ? 'selected' : ''); ?>>
															<?php echo e($territory->name); ?>

														</option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 category">
											<label>Categories</label>
												<br>
										<?php
											$userCategory = explode(',',$Users->categories_id)
										?>
										 <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										 <label for="checkbox<?php echo e($value->id); ?>"><?php echo e($value->main_ic); ?></label>
										 <input 
										 	<?php $__currentLoopData = $userCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userCategorykey => $userCategoryvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										 
										 	<?php if($value->id == $userCategoryvalue ): ?> checked <?php endif; ?>  
										 
										 		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
										 	id="checkbox<?php echo e($value->id); ?>" type="checkbox" name="category[]" value="<?php echo e($value->id); ?>">
										 <br>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 dashboard">
											<label>dashboard Access</label>
												<br>
										<?php
											$dashboard_access = explode(',',$Users->dashboard_access);

										?>
										 
										 <label for="checkboxDash1">DashBoard</label>
										 <input 
										 	
										 	id="checkboxDash1" <?php if(in_array("dashboard", $dashboard_access)): ?> checked <?php endif; ?> type="checkbox" name="dashboard_access[]" value="dashboard">
										 <br>
										 
										 <label for="checkboxDash2">Production Dashboard </label>
										 <input 
										 	
										 	id="checkboxDash2" <?php if(in_array("dashboard_production", $dashboard_access)): ?> checked <?php endif; ?>  type="checkbox" name="dashboard_access[]" value="dashboard_production">
										 <br>
										 
										 <label for="checkboxDash3">Management Dashboard</label>
										 <input 
										 	
										 	id="checkboxDash3" <?php if(in_array("dashboard_management", $dashboard_access)): ?> checked <?php endif; ?>  type="checkbox" name="dashboard_access[]" value="dashboard_management">
										 <br>
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
		if(value == 'client')
		{
			
			checkboxes.forEach(function (checkbox) {
					checkbox.checked = true;
			});
		}
		else
		{
			checkboxes.forEach(function (checkbox) {
					checkbox.checked = false;
			});
		}
		
	}

</script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>